<!DOCTYPE html>
<html lang="mn">
<head>
    <meta charset="UTF-8">
    <title>QPay Payment</title>
    <style>
        body{
            margin:0;
            font-family:Arial,sans-serif;
            background:#fff6f8;
            color:#2b2b2b;
        }

        .container{
            max-width:900px;
            margin:auto;
            padding:60px 20px;
            text-align:center;
        }

        .card{
            background:white;
            border-radius:30px;
            padding:40px;
            box-shadow:0 12px 30px rgba(0,0,0,.08);
        }

        h1{
            color:#b03052;
            margin-bottom:15px;
        }

        .qr{
            width:260px;
            height:260px;
            margin:30px auto;
            background:white;
            border:12px solid #f5d7df;
            display:flex;
            align-items:center;
            justify-content:center;
            font-size:18px;
            color:#b03052;
            font-weight:bold;
        }

        .total{
            font-size:32px;
            color:#b03052;
            font-weight:bold;
            margin:25px 0;
        }

        .btn{
            border:none;
            background:#b03052;
            color:white;
            padding:17px 35px;
            border-radius:16px;
            font-size:16px;
            font-weight:bold;
            cursor:pointer;
        }

        .back{
            display:inline-block;
            margin-top:18px;
            color:#b03052;
            text-decoration:none;
            font-weight:bold;
        }
    </style>
</head>
<body>

<div class="container">

    <div class="card">

        <h1>QPay төлбөр</h1>

        <p>
            Доорх QR кодыг уншуулж төлбөрөө төлнө үү.
        </p>

        @php $total = 0; @endphp

        @foreach($cart as $item)
            @php
                $total += $item['price'] * $item['quantity'];
            @endphp
        @endforeach

        <div class="qr">
            QPAY QR<br>
            DEMO
        </div>

        <div class="total">
            {{ number_format($total) }}₮
        </div>

        <form action="/payment/confirm" method="POST">
            @csrf

            <button class="btn" type="submit">
                Төлбөр төлөгдсөн гэж баталгаажуулах
            </button>
        </form>

        <a href="/checkout" class="back">
            Буцах
        </a>

    </div>

</div>

</body>
</html>