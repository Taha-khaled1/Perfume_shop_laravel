<?php

namespace App\Http\Controllers\Admin;
use Dompdf\Dompdf;
use App\Http\Controllers\Controller;
 use App\Models\Notfication;
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
use ZipArchive;
class OrderController extends Controller
{
    public function orders_list() 
    {   $n=Notfication::where('read','0')->get();
        $orders = Order::where('status','1')->with('address')->latest()->get();

        $a = 0;
        if($orders ){
        return view('admin.orders.list',['notf'=>$n])->with('orders', $orders)->with('a', $a);
                }
                return redirect()->back();
    }

    public function sh_orders_list()
    {$n=Notfication::where('read','0')->get();
        $orders = Order::where('status','3')->with('address')->orderBy('id','desc')->get();
        // $orderss = Order::where('status','5')->get();
        // foreach ($orderss as  $o) {
            
        //     if ($o->payment->status=='completed') {
        //         $r=Order::find($o->id);
        //         $r->status=1;
        //         $r->save();
        //     }
        // }
          
        $a = 1;

        if($orders ){
        return view('admin.orders.list',['notf'=>$n])->with('orders', $orders)->with('a', $a);
                }
                return redirect()->back();
    }
 
    public function shs_orders_list()
    {$n=Notfication::where('read','0')->get();
        $orders = Order::where('status','0')->with('address')->orderBy('id','desc')->get();
        $a = 1;
//         $orderss = Order::where('status','5')->get();
// foreach ($orderss as  $o) {
    
//     if ($o->payment->status=='completed') {
//         $r=Order::find($o->id);
//         $r->status=1;
//         $r->save();
//     }
// }
  
        if($orders ){
        return view('admin.orders.list',['notf'=>$n])->with('orders', $orders)->with('a', $a);
                }
                return redirect()->back();
    }



    public function orderss_print_all(Request $request)
    {
        $order = Order::where('status','!=','5')->with('address')->get();
        // $address = OrderAddress::where('order_id', $order->id )->first();
        
    
            return view('admin.print', compact('order'));   
          
      
     
    }


    public function orderss_print_ids(Request $request)
    {
        $ids = $request->input('vehicle', []);
        if ($ids > 0 &&$ids!=null&& $ids != []) {
            
        $order = Order::whereIn('id', $ids)
                       ->with('address')
                       ->get();

            return view('admin.printtt', compact('order'));  
        } else {
           return back();
        }
         
   
     
    }
    // where('status', '2')->
 



public function printll()
{
    $orders = Order::all();
    $zip = new ZipArchive();
    $zipname = 'invoices.zip';

    if ($zip->open($zipname, ZipArchive::CREATE | ZipArchive::OVERWRITE) === true) {
        foreach ($orders as $order) {
            $dompdf = new Dompdf([
                'default_font' => 'Cairo-Regular',
                'font_dir' => public_path('assets/fonts/Cairo-Regular.ttf/'),
                'font_cache' => storage_path('app/dompdf'),
                'font_cache_ttl' => 86400
            ]);

            // Render the view to HTML
            $html = view('admin.printt', compact('order'))->render();
            
            // Load HTML into Dompdf
            $dompdf->loadHtml($html);
            
            // (Optional) Set the paper size and orientation
            $dompdf->setPaper('A4', 'portrait');
            
            // Render the PDF
            $dompdf->render();
            
            // Save the PDF to a file on disk
            $filename = 'invoice-' . $order->id . '.pdf';
            $file_path = public_path('storage/property/' . $filename);
            file_put_contents($file_path, $dompdf->output());

            // Add the file to the zip archive
            $zip->addFile($file_path, $filename);
        }
        $zip->close();

        // Download the zip archive
        return response()->download($zipname, $zipname);
    }
}



    public function orderss_list()
    {
        $n=Notfication::where('read','0')->get();
        $orders = Order::where('status','2')->with('address')->latest()->get();
        $a = 0;
        if($orders ){
        return view('admin.orders.list',['notf'=>$n])->with('orders', $orders)->with('a', $a);
                }
                return redirect()->back();
    }

    public function order_profile($id)
    {
        $n=Notfication::where('read','0')->get();
         
        $order = Order::find($id);
        $address = OrderAddress::where('order_id', $order->id )->first();
        if($order ){
            return view('admin.orders.profile', [
                'order' => $order,  
                'address' => $address ,'notf'=>$n
             ]);   
         }
        return redirect()->back();
    }






    public function exportProducts()
    {
        $products = Product::select('products.name',DB::raw('SUM(order_items.quantity) as total_quantity') , 'products.shope_name')
            ->join('order_items', 'products.id', '=', 'order_items.product_id')
            ->join('orders', 'order_items.order_id', '=', 'orders.id')
            ->where('orders.status', 1)->orwhere('orders.status',2)
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