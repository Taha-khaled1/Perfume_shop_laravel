<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notfication;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class PaymentsController extends Controller
{
    public function index()
    {     $n=Notfication::where('read','0')->get();
        $payments = Payment::all();
        return view('admin.payment.index', [
            'payments' => $payments,    ,['notf'=>$n]   
        ]);
    }

}
