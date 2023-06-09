<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Notfication;
use App\Models\Order;
use App\Models\Payment;
use App\Repositories\Cart\CartRepository;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class PaymentsController extends Controller
{   protected $cart;
  
    public function __construct(CartRepository $cart)
    {
        $this->cart = $cart;
    }
    public function create(Order $order)
    {
        
        return view('site.payments.create', [
            'order' => $order,        
            'cart' => $this->cart,
        ]);
    }

    public function createStripePaymentIntent(Request $request)
    {
         // $amount = $order->items->sum(function($item) {
        //     return $item->price * $item->quantity;
        // });

        /**
         * @var \Stripe\StripeClient
         */
         $amount =$request->total * 100 ;
         $stripe = new \Stripe\StripeClient(config('services.stripe.secret_key'));
         $paymentIntent = $stripe->paymentIntents->create([
             'amount' => $amount, 
             'currency' => 'aed',
             'payment_method_types' => ['card'],
         ]);

         try {
            // Create payment
            $payment = new Payment();
            $payment->forceFill([
                'order_id' => $request->id,
                'amount' => $paymentIntent->amount/100,
                'currency' => $paymentIntent->currency,
                'method' => 'stripe',
                'status' => 'pending',
                'transaction_id' => $paymentIntent->id,
                'transaction_data' => json_encode($paymentIntent),
            ])->save();
        } catch (QueryException $e) {
            echo $e->getMessage();
            return;
        }
         
        return [
            'clientSecret' => $paymentIntent->client_secret,
        ];
    }

    public function confirm(Request $request, Order $order)
    {
        
        /**
         * @var \Stripe\StripeClient
         */
        $stripe = new \Stripe\StripeClient(config('services.stripe.secret_key'));

        $paymentIntent = $stripe->paymentIntents->retrieve(
            $request->query('payment_intent'),
            []
        );
       
        
        if ($paymentIntent->status == 'succeeded') {
            try {
                // Update payment
                $payment = Payment::where('order_id', $order->id)->get();
                foreach ($payment as $payment) {
                    $payment->update([
                        'status' => 'completed',
                        'transaction_data' => json_encode($paymentIntent),
                    ]);
                }
           





                $r=Order::find($order->id)->first();
                $r->status = 1;         
                $r->save();

                $noty = new Notfication();
                $noty->title="طلب جديد";
                $user = auth()->user();
                if ($user) {
                    $name = $user->fname;
                    $noty->message="تم انشاء طلب جديد بواسطة ".$name ??"لم يتم ادخال الاسم" ;
                }else{
                    $noty->message="تم انشاء طلب جديد بواسطة "."لم يتم ادخال الاسم" ;
                }

                $noty->save();








            } catch (QueryException $e) {
                echo $e->getMessage();
                return;
            }

            event('payment.created', $payment->id);

            notify()->success('');
            return redirect()->route('viewHomePage');
        }
        notify()->error('');
        return redirect()->route('orders.payments.create', [
            'order' => $order->id,
            'status' => $paymentIntent->status,
        ]);
        
    }
}
