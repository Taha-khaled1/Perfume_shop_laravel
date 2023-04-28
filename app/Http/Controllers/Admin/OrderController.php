<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
 use App\Models\Order;
use App\Models\OrderAddress;
use App\Models\Product;
use App\Notifications\AcceptRequest;
use App\Notifications\CancelRequest;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PDF;
class OrderController extends Controller
{
    public function orders_list()
    {
        $orders = Order::where('status','1')->with('address')->latest()->get();
        $a = 0;
        if($orders ){
        return view('admin.orders.list')->with('orders', $orders)->with('a', $a);
                }
                return redirect()->back();
    }

    public function sh_orders_list()
    {
        $orders = Order::where('status','3')->with('address')->orderBy('id','desc')->get();
        $a = 1;

        if($orders ){
        return view('admin.orders.list')->with('orders', $orders)->with('a', $a);
                }
                return redirect()->back();
    }
 
    public function shs_orders_list()
    {
        $orders = Order::where('status','0')->with('address')->orderBy('id','desc')->get();
        $a = 1;

        if($orders ){
        return view('admin.orders.list')->with('orders', $orders)->with('a', $a);
                }
                return redirect()->back();
    }



    public function orderss_print_all()
    {
        $orders = Order::with('address')->get();

        foreach ($orders as $order) {
            $pdf = PDF::loadView('admin.print', compact('order'));
    
            // Optional: Set paper size and orientation
            $pdf->setPaper('A4', 'portrait');
    
            // Optional: Set the download filename and disposition
            $filename = 'invoice-' . $order->id . '.pdf';
            $headers = [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'attachment; filename="' . $filename . '"',
            ];
    
            // Return the PDF as a response
            return $pdf->download($filename, $headers);
        }
        return "back()";
    }
    // where('status', '2')->
 







    public function orderss_list()
    {
        $orders = Order::where('status','2')->with('address')->latest()->get();
        $a = 0;
        if($orders ){
        return view('admin.orders.list')->with('orders', $orders)->with('a', $a);
                }
                return redirect()->back();
    }

    public function order_profile($id)
    {
         
        $order = Order::find($id);
        $address = OrderAddress::where('order_id', $order->id )->first();
        if($order ){
            return view('admin.orders.profile', [
                'order' => $order,  
                'address' => $address, 
             ]);   
         }
        return redirect()->back();
    }






    public function exportProducts()
    {
        $products = Product::select('products.name',DB::raw('SUM(order_items.quantity) as total_quantity') , 'products.shope_name')
            ->join('order_items', 'products.id', '=', 'order_items.product_id')
            ->join('orders', 'order_items.order_id', '=', 'orders.id')
            ->where('orders.status', 1)
            ->groupBy('products.name', 'products.shope_name')     ->orderBy('products.shope_name') 
            ->get();

        return Excel::download(new ProductsExport($products), 'products.xlsx');
    }









    public function shipping($id)
    {
         
        $order = Order::find($id);
        $address = OrderAddress::where('order_id', $order->id )->first();

        if($order ){
             foreach($order->items as $item ){
                if($item->product->quantity == 0){
                    $msg = " نفذت كمية المنتج " .  $item->product->name;
                    notify()->success($msg );
                    return redirect()->back( ); 
                }else{
                    $prod = Product::find($item->product->id);
                    $prod->quantity = $prod->quantity  - $item->quantity ;
                    $prod->save();
                }
             }
            $order->status = 2 ;
            $order->save();
            $email = $address->email;
            if($email){
                Notification::route('mail' ,$email)->notify(new AcceptRequest($order));
            } 
            notify()->success(' تم اضافة المنتج بقائمة الطلبات المشحونة  واراسل ايميل !');
          return redirect()->route('admin.orders');
         }
        return redirect()->back();
    }
     public function cancel($id)
    {
         
        $order = Order::find($id);
 
        if($order ){
            
            $order->status = 0;
            $order->save(); 
            
             $address = OrderAddress::where('order_id', $order->id )->first();
             $email = $address->email;
            if($email){
                Notification::route('mail' ,$email)->notify(new CancelRequest($order));
            }
            notify()->success(' تم الغاء الطلب وارسال ايميل للعميل يفيد بإلغاء الطلب');
          return redirect()->route('admin.orders');
         }
        return redirect()->back();
    }
    public function order_delete(Request $request){

        $data = Order::find($request->id);  
        if( $data){

            $data->delete();
      
            return response()->json([
                'status' => true,
                'msg' => 'deleted!',
                'id' =>  $request -> id
            ]);
        } 
 }
}









class ProductsExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles, WithColumnFormatting
{
    private $products;

    public function __construct( $products)
    {
        $this->products = $products;
    }

    public function collection()
    {
        return $this->products;
    }

    public function headings(): array
    {
        return [
           'اسم المنتج',
            'الكميه',
            'اسم المتجر',
            // 'product purchase price'
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => [
                'font' => [
                    'bold' => true,
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
                    'rotation' => 90,
                    'startColor' => [
                        'argb' => 'FFA0A0A0',
                    ],
                    'endColor' => [
                        'argb' => 'FFFFFFFF',
                    ],
                ],
            ],
        ];
    }

    public function columnFormats(): array
    {
        return [
            'B' => '#,##0',
        ];
    }
}