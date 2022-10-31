<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Invoice | Barahi Logistics</title>
    <style>
        body {
            position: relative;
            width: 28cm;
            height: 26.2cm;
            margin: 0 auto;
            color: #001028;
            background: #FFFFFF;
            font-family: Arial, sans-serif;
            font-family: Arial;
            padding: 10px;
        }

        .logobox {
            position: relative;
            float: left;
            width: 50%;
        }

        .paymentbox {
            position: relative;
            float: left;
            width: 50%;
        }

        .paymentbox h2 {
            text-align: right;
            font-size: 34px;
        }

        .paymentbox h3 {
            text-align: right;
            font-size: 20px;
        }

        .headbox {
            width: 100%;
            position: relative;
            float: left;
        }

        .headbox h1 {
            text-align: center;
        }

        .shopping {
            width: 100%;
            position: relative;
            float: left;
        }

        .shopping p {
            font-size: 26px;
            margin-bottom: 10px;
            margin-top: 0px;
        }

        .main-content {
            width: 100%;
            position: relative;
            float: left;
        }

        table {
            width: 100%;
            margin-bottom: 1rem;
            background-color: transparent;
            border-collapse: collapse;
        }

        th {
            font-size: 20px;
            color: gray;
        }

        td {
            font-size: 18px;
        }

        td,
        th {
            vertical-align: top;
            border-top: 1.5px solid #dee2e6;
            text-align: left;
            padding: 18px 10px;
        }

        .main-content p {
            font-size: 20px;
            line-height: 14px;
        }

        .footer {
            width: 100%;
            position: relative;
            float: left;
        }

        .footer p {
            text-align: center;
            font-size: 16px;
        }

        a.btn {
            text-decoration: none;
            color: gray;
            background: #e7e2e2;
            padding: 8px;
            border-radius: 3px;
            text-align: center
        }

        @media print {
            a.btn {
                display: none;
            }
        }
    </style>
</head>

<body>

    <header style="margin-top: 3%;margin-bottom: 3%;">
        <div class="logobox">
            <img src="{{asset('logo.png')}}" title="logo" width="80px">
            <p style="font-size: 20px; line-height: 32px;"><b> BARAHI LOGISTICS <br> New Baneshwor, Kathmandu<br>Nepal</b></p>
        </div>

        <div class="paymentbox">
            <h2><b>COD Transfer <br>{{$payment->transfer_id}}</b></h2>
            <h3><b>COD Transfer Date:</b>{{$payment->created_at->format('M d Y, h:i A')}}</h3>
            <h3><b>Payment Method:</b> Cash</h3>
        </div>
        <div class="headbox">
            <h1><b>COD Transfer Statement</b></h1>
        </div>
        <div class="shopping">
            <p>Vendor: <b>{{$payment->vendor->name}}</b></p>
        </div>
    </header>
    <div class="main-content">
        <table>
            <thead>
                <tr>
                    <th>SN</th>
                    <th>Order Id</th>
                    <th>Customer Name</th>
                    <th>COD</th>
                    <th>Delivery Charge</th>
                    <th>Net</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $totla_amount = 0;
                @endphp
                @foreach ($order_ids as $key => $order_id)
                    @php
                        $order = App\Models\Vendor\Order::where('id', $order_id)->first();
                        $totla_amount = $totla_amount + $order->cod_charge - $order->delivery_charge;
                    @endphp
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $order->order_id }}</td>
                        <td>{{ $order->receiver_name }}</td>
                        <td>{{ $order->cod_charge }}</td>
                        <td>{{ $order->delivery_charge }}</td>
                        <td>{{ $order->cod_charge - $order->delivery_charge }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td>
                        <h3 style="margin: 0px;"><b>Total</b></h3>
                    </td>
                    <td colspan="4"></td>
                    <td>
                        <h3 style="margin: 0px;"><b>{{ $totla_amount }}</b></h3>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="main-content">
        <p>Received By: <b>{{$payment->vendor->name}}</b></p>
        <p><b>Shopping Santa</b> | Transfer Date: <b>{{$payment->created_at->format('M d Y, h:i A')}}</b></p>
        <p>Transferred By: <b>Bipin Rijal</b></p>
        <b>*Notes:</b>
        <p style="font-size: 15px;margin-top: 8px;">RTV means Return To Vendor</p>
    </div>
    <div class="footer">
        <p>Barahi Logistics Pvt. Ltd. - 2022</p>
    </div>
    <div class="footer" style="margin-top: 20px; margin-bottom: 40px;text-align: center;">
        <a href="javascript:window.print()" class="btn">Print</a>
    </div>
    <script>
        window.addEventListener("load", window.print());
    </script>
</body>

</html>
