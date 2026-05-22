<!DOCTYPE html>
<html lang="mn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout | Ms.Mama Bakery</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            font-family:'Poppins',sans-serif;
            background:#fffaf7;
            color:#2b2b2b;
        }

        .container{
            max-width:1200px;
            margin:auto;
            padding:50px 8%;
        }

        .top{
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:35px;
        }

        h1{
            font-size:46px;
        }

        .back{
            text-decoration:none;
            background:white;
            color:#b03052;
            padding:14px 20px;
            border-radius:14px;
            font-weight:600;
            box-shadow:0 8px 20px rgba(0,0,0,.05);
        }

        .wrapper{
            display:grid;
            grid-template-columns:1.5fr 1fr;
            gap:30px;
        }

        .form-box,
        .summary{
            background:white;
            border-radius:28px;
            padding:32px;
            box-shadow:0 12px 30px rgba(0,0,0,.06);
        }

        .form-box h2,
        .summary h2{
            margin-bottom:28px;
        }

        .group{
            margin-bottom:20px;
        }

        label{
            display:block;
            margin-bottom:8px;
            font-weight:600;
        }

        input,
textarea,
select{
    width:100%;
    padding:16px;
    border-radius:14px;
    border:1px solid #eee;
    font-family:'Poppins',sans-serif;
}
            outline:none;
        }

        textarea{
            resize:none;
            min-height:110px;
        }

        .two{
            display:grid;
            grid-template-columns:1fr 1fr;
            gap:18px;
        }

        .line{
            display:flex;
            justify-content:space-between;
            margin-bottom:16px;
            color:#555;
        }

        .total{
            border-top:1px solid #eee;
            padding-top:20px;
            margin-top:20px;
            display:flex;
            justify-content:space-between;
            font-size:24px;
            font-weight:700;
        }

        .btn{
            width:100%;
            border:none;
            background:#b03052;
            color:white;
            padding:18px;
            border-radius:16px;
            font-size:16px;
            font-weight:700;
            cursor:pointer;
            margin-top:28px;
        }

        .btn:hover{
            background:#922844;
        }

        @media(max-width:950px){

            .wrapper{
                grid-template-columns:1fr;
            }

            .two{
                grid-template-columns:1fr;
            }

            h1{
                font-size:36px;
            }
        }

    </style>
</head>
<body>

<div class="container">

    <div class="top">

        <h1>
            Checkout
        </h1>

        <a href="/cart" class="back">
            ← Back to Cart
        </a>

    </div>

    @php $total = 0; @endphp

    @foreach($cart as $item)

        @php
            $total += $item['price'] * $item['quantity'];
        @endphp

    @endforeach

    <div class="wrapper">

        <div class="form-box">

            <h2>
                Customer Information
            </h2>

            <form action="/payment" method="POST">

                @csrf

                <div class="group">

                    <label>Нэр</label>

                    <input type="text"
                           name="customer_name"
                           required>

                </div>

                <div class="group">

                    <label>Утас</label>

                    <input type="text"
                           name="phone"
                           required>

                </div>

                <div class="group">

                    <label>Хаяг</label>

                    <textarea name="address"
                              required></textarea>

                </div>

                <div class="two">

                    <div class="group">

                        <label>Авах өдөр</label>

                        <input type="date"
       name="pickup_date"
       min="{{ date('Y-m-d') }}"
       required>

                    </div>

                    <div class="group">

                        <label>Авах цаг</label>

                        <select name="pickup_time" required>

    <option value="">
        Цаг сонгох
    </option>

    <option value="09:00">09:00</option>
    <option value="10:00">10:00</option>
    <option value="11:00">11:00</option>
    <option value="12:00">12:00</option>
    <option value="13:00">13:00</option>
    <option value="14:00">14:00</option>
    <option value="15:00">15:00</option>
    <option value="16:00">16:00</option>
    <option value="17:00">17:00</option>
    <option value="18:00">18:00</option>
    <option value="19:00">19:00</option>

</select>
                    </div>

                </div>

                <div class="group">

                    <label>Нэмэлт тайлбар</label>

                    <textarea name="note"></textarea>

                </div>

                <button class="btn" type="submit">
                    Order Now
                </button>

            </form>

        </div>

        <div class="summary">

            <h2>
                Order Summary
            </h2>

            @foreach($cart as $item)

                <div class="line">

                    <span>
                        {{ $item['name'] }}
                        ×
                        {{ $item['quantity'] }}
                    </span>

                    <span>
                        {{ number_format($item['price'] * $item['quantity']) }}₮
                    </span>

                </div>

            @endforeach

            <div class="total">

                <span>Total</span>

                <span>
                    {{ number_format($total) }}₮
                </span>

            </div>

        </div>

    </div>

</div>

</body>
</html>