<!DOCTYPE html>
<html  dir="rtl">

<head>
    <title>فاتورة</title>
    <style> 
    body {
        font-family: Arial, sans-serif;
        font-size: 14px;
        line-height: 1.4;
        padding: 20px;
        direction: rtl;
    }

.container {
    max-width: 800px;
    margin: 0 auto;
    bpdfs: 1px solid #ddd;
    padding: 20px;
}

h1 {
    font-size: 24px;
    margin-bottom: 10px;
    text-align: center;
}

h2 {
    font-size: 20px;
    margin-top: 0;
    text-align: right;
}

table {
    width: 100%;
    bpdfs-collapse: collapse;
    margin-top: 20px;
}

th,
td {
    padding: 10px;
    text-align: right;
    bpdfs-bottom: 1px solid #ddd;
}

th {
    background-color: #f2f2f2;
}

.text-right {
    text-align: right;
}

.text-center {
    text-align: center;
}

.total td {
    bpdfs-top: 2px solid #333;
    font-weight: bold;
}

.invoice-details {
    margin-top: 20px;
}

.invoice-details p {
    margin: 0;
    text-align: right;
}

.invoice-details .address {
    margin-top: 10px;
    font-size: 16px;
    font-weight: bold;
    text-align: right;
}

@media print {
    body {
        padding: 0;
    }

    .container {
        bpdfs: none;
    }

    h1 {
        margin-top: 0;
    }

    table {
        margin-top: 10px;
    }

    .invoice-details {
        margin-top: 20px;
    }

    .invoice-details .address {
        font-size: 14px;
    }
}
</style>
</head>

<body>
    <div class="container">
        <h1>فاتورة</h1>
        <h2>تفاصيل الفاتورة</h2>
        <table>
            <thead>
                <tr>
                    <th>اسم المنتج</th>
                    <th>الكميه</th>
                    <th>السعر</th>
                    <th>المجموع</th>
                </tr>
            </thead>





            {{-- <tbody>
                <tr>
                    <td>Product 1</td>
                    <td>1</td>
                    <td>290 AED</td>
                    <td>290 AED</td>
                </tr>
            </tbody> --}}

            @foreach($pdfs->items as $item)
            <tr  >
                <td>{{$item->product_name}} </td> 
            
               
               
                <td>{{$item->quantity}} </td>
                <td>{{$item->product->price}}</td>
                <td>{{$item->product->price * $item->quantity}} </td>
                {{-- <td>  {{$item->options}}  </td> --}}
            
                 
                </tr>
                @endforeach














            <tfoot>
                <tr class="total">
                    <td colspan="3" class="text-right">المجموع الفرعي</td>
                    <td> {{ $pdfs->total + $pdfs->discount - $pdfs->shipping}} AED</td>
                </tr>
                <tr class="total">
                    <td colspan="3" class="text-right">شحن</td>
                    <td>{{$pdfs->shipping}} AED</td>
                </tr>
                <tr class="total">
                    <td colspan="3" class="text-right">الخصم</td>
                    <td>{{ $pdfs->discount}}  AED</td>
                </tr>
                <tr class="total">
                    <td colspan="3" class="text-right">المجموع الإجمالي</td>
                    <td>{{ $pdfs->total}} AED</td>
                </tr>
            </tfoot>
        </table>
        <div class="invoice-details">
            <p><strong>طريقة الدفع  : . </strong>  
            
            
            
            
            
                @if($pdfs->payment_method == "cash")
                الدفع عند الاستلام
                @else
                بطاقة ائتمان
                @if($pdfs->payment )
@if($pdfs->payment->status == 'pending' )                                                                              
<span class="badge bg-primary"> في انتظار الدفع</span>
@elseif($pdfs->payment->status == 'completed')
<span class="badge bg-success">  تم الدفع</span>
@elseif($pdfs->payment->status == 'failed')
<span class="badge bg-danger"> تم الغاء الدفع</span>
@else
<span class="badge bg-danger"> فشل الدفع</span>
@endif
@endif  @endif
            
            
            
            
            
            
            
            
            
            
            </p>



            <div class="address">
                <p><strong>اسم العميل:</strong> {{$pdfs->address->name}}</p>
                <p><strong>البريد الاكتروني:</strong> {{$pdfs->address->email}}</p>
                <p><strong>الاماره:</strong> {{$pdfs->address->area}}</p>
                <p><strong>الشارع:</strong> {{$pdfs->address->street}}</p>
                <p><strong>الجادة:</strong> {{$pdfs->address->Blvd}}</p>
                <p><strong>رقم الهاتف:</strong> {{$pdfs->address->phone}}  </p>
            </div>



        </div>
        <br>
        <br>
        <br>
        <span>
            <img src="{{ asset('assets/img/logom.png') }}" alt="logo-small" width="180px" height="100px">
        </span>
    </div>
    <script>
      window.print();
    </script>

</body>

</html>





{{-- <!DOCTYPE html>
<html dir="rtl">

<head>
    <meta charset="UTF-8">
    <title>فاتورة</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            line-height: 1.4;
            padding: 20px;
            direction: rtl;
        }

       code .container {
            max-width: 800px;
            margin: 0 auto;
            bpdfs: 1px solid #ddd;
            padding: 20px;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 10px;
            text-align: center;
        }

        h2 {
            font-size: 20px;
            margin-top: 0;
            text-align: right;
        }

        table {
            width: 100%;
            bpdfs-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 10px;
            text-align: right;
            bpdfs-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        .text-right {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

        .total td {
            bpdfs-top: 2px solid #333;
            font-weight: bold;
        }

        .invoice-details {
            margin-top: 20px;
        }

        .invoice-details p {
            margin: 0;
            text-align: right;
        }

        .invoice-details .address {
            margin-top: 10px;
            font-size: 16px;
            font-weight: bold;
            text-align: right;
        }

        @media print {
            body {
                padding: 0;
            }

            .container {
                bpdfs: none;
            }

            h1 {
                margin-top: 0;
            }

            table {
                margin-top: 10px;
            }

            .invoice-details {
                margin-top: 20px;
            }

            .invoice-details .address {
                font-size: 14px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>فاتورة</h1>
        <h2>تفاصيل الفاتورة</h2>
        <table>
            <thead>
                <tr>
                    <th>الاسم</th>
                    <th>الكمية</th>
                    <th>السعر</th>
                    <th>الإجمالي</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>المنتج 1</td>
                    <td>1</td>
                    <td>290 درهم</td>
                    <td>290 درهم</td>
                </tr>
            </tbody>
            <tfoot>
                <tr class="total">
                    <td colspan="3" class="text-right">المجموع الفرعي</td>
                    <td>290 درهم</td>
                </tr>
                <tr class="total">
                    <td colspan="3" class="text-right">الشحن</td>
                    <td>20 درهم</td>
                </tr>
                <tr class="total">
                    <td colspan="3" class="text-right">المجموع الكلي</td>
                    <td>
                        310 درهم</td>
                </tr>
            </tfoot>
        </table>
        <div class="invoice-details">
            <p><strong>تفاصيل الفاتورة:</strong></p>
            <p><strong>رقم الفاتورة:</strong> 123456</p>
            <p><strong>تاريخ الفاتورة:</strong> 18 مارس 2023</p>
            <div class="address">
                <p><strong>عنوان الشحن:</strong></p>
                <p>شارع الشيخ زايد، برج خليفة، دبي، الإمارات العربية المتحدة</p>
            </div>
        </div>
    </div>

</body>

</html> --}}
