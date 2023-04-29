<!DOCTYPE html>
<html dir="rtl">

<head>
    <title>bill</title>
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
            border: 1px solid #ddd;
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
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 10px;
            text-align: right;
            border-bottom: 1px solid #ddd;
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
            border-top: 2px solid #333;
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
                border: none;
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



<div class="address">
    <p><strong>Customer Name:</strong> {{ $order->address->name }}</p>
    <p><strong>Email:</strong> {{ $order->address->email }}</p>
    <p><strong>Emirate:</strong> {{ $order->address->area }}</p>
    <p><strong>Street:</strong> {{ $order->address->street }}</p>
    <p><strong>Blvd:</strong> {{ $order->address->Blvd }}</p>
    <p><strong>Phone Number:</strong> {{ $order->address->phone }} </p>
</div>

<br>

<table>
    <thead>
        <tr>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total</th>
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

    @foreach ($order->items as $item)
        <tr>
            <td>{{ $item->product_name }} </td>
            <td>{{ $item->quantity }} </td>
            <td>{{ $item->product->price }}</td>
            <td>{{ $item->product->price * $item->quantity }} </td>
        </tr>
    @endforeach
    <tfoot>
        <tr class="total">
            <td colspan="3" class="text-right">Subtotal</td>
            <td> {{ $order->total + $order->discount - $order->shipping }} AED</td>
        </tr>
        <tr class="total">
            <td colspan="3" class="text-right">Shipping</td>
            <td>{{ $order->shipping }} AED</td>
        </tr>
        <tr class="total">
            <td colspan="3" class="text-right">Discount</td>
            <td>{{ $order->discount }} AED</td>
        </tr>
        <tr class="total">
            <td colspan="3" class="text-right">Total</td>
            <td>{{ $order->total }} AED</td>
        </tr>
    </tfoot>
</table>
<div class="invoice-details">
    <p><strong>Payment Method:</strong>
        @if ($order->payment_method == 'cash')
            Cash on Delivery
        @else
            Credit Card
            @if ($order->payment)
                @if ($order->payment->status == 'pending')
                    <span class="badge bg-primary">Pending</span>
                @elseif($order->payment->status == 'completed')
                    <span class="badge bg-success">Completed</span>
                @elseif($order->payment->status == 'failed')
                    <span class="badge bg-danger">Payment Failed</span>
                @else
                    <span class="badge bg-danger">Payment Failed</span>
                @endif
            @endif
        @endif
        <span>
            <img src="{{ public_path('assets/img/logom.png') }}" alt="logo-small" width="180px" height="100px">
        </span>



    </p>


</div>
<br>
<br>
<br>



<body>

    <script>
        window.print();
    </script>

</body>

</html>