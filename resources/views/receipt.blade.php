<!DOCTYPE html>
<html lang="mn">
<head>
    <meta charset="UTF-8">
    <title>Receipt</title>

    <style>

        body{
            margin:0;
            background:#fff6f8;
            font-family:Arial,sans-serif;
            color:#2b2b2b;
        }

        .container{
            max-width:850px;
            margin:auto;
            padding:60px 20px;
        }

        .card{
            background:white;
            border-radius:30px;
            padding:45px;
            box-shadow:0 12px 30px rgba(0,0,0,.08);
        }

        .success{
            text-align:center;
            margin-bottom:35px;
        }

        .success h1{
            color:#b03052;
            font-size:42px;
            margin-bottom:10px;
        }

        .success p{
            color:#777;
        }

        .section{
            margin-bottom:30px;
        }

        .line{
            margin-bottom:12px;
            color:#555;
        }

        table{
            width:100%;
            border-collapse:collapse;
            margin-top:20px;
        }

        table th{
            text-align:left;
            padding-bottom:14px;
            border-bottom:1px solid #eee;
        }

        table td{
            padding:14px 0;
            border-bottom:1px solid #f5f5f5;
        }

        .total{
            margin-top:30px;
            text-align:right;
            font-size:34px;
            font-weight:bold;
            color:#b03052;
        }

        .buttons{
            display:flex;
            gap:15px;
            margin-top:40px;
        }

        .btn{
            flex:1;
            text-align:center;
            padding:16px;
            border-radius:16px;
            text-decoration:none;
            font-weight:bold;
        }

        .home{
            background:#b03052;
            color:white;
        }

        .print{
            background:#f3f3f3;
            color:#2b2b2b;
        }

    </style>

</head>
<body>

<div class="container">

    <div class="card">

        <div class="success">

            <h1>
                Захиалга амжилттай!
            </h1>

            <p>
                Таны төлбөр амжилттай бүртгэгдлээ.
            </p>

        </div>

        <div class="section">

            <div class="line">
                <strong>Захиалгын дугаар:</strong>
                #{{ $order->id }}
            </div>

            <div class="line">
                <strong>Нэр:</strong>
                {{ $order->customer_name }}
            </div>

            <div class="line">
                <strong>Утас:</strong>
                {{ $order->phone }}
            </div>

            <div class="line">
                <strong>Авах өдөр:</strong>
                {{ $order->pickup_date }}
            </div>

            <div class="line">
                <strong>Авах цаг:</strong>
                {{ $order->pickup_time }}
            </div>

        </div>

        <table>

            <thead>

                <tr>

                    <th>Бүтээгдэхүүн</th>
                    <th>Тоо</th>
                    <th>Үнэ</th>

                </tr>

            </thead>

            <tbody>

                @foreach($order->items as $item)

                    <tr>

                        <td>
                            {{ $item->product->name ?? 'Deleted Product' }}
                        </td>

                        <td>
                            {{ $item->quantity }}
                        </td>

                        <td>
                            {{ number_format($item->price * $item->quantity) }}₮
                        </td>

                    </tr>

                @endforeach

            </tbody>

        </table>

        <div class="total">
            {{ number_format($order->total_price) }}₮
        </div>

        <div class="buttons">

            <a href="/" class="btn home">
                Home
            </a>

            <a href="#" onclick="window.print()" class="btn print">
                Print Receipt
            </a>

        </div>

    </div>

</div>

</body>
</html>