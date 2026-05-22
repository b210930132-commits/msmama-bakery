<!DOCTYPE html>
<html lang="mn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Сагс | Ms.Mama Bakery</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

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

        .navbar{
            width:100%;
            padding:20px 8%;
            display:flex;
            justify-content:space-between;
            align-items:center;
            background:white;
            position:sticky;
            top:0;
            z-index:999;
            box-shadow:0 4px 18px rgba(0,0,0,.04);
        }

        .logo{
            font-size:28px;
            font-weight:800;
            color:#b03052;
        }

        .menu-toggle{
            display:none;
            border:none;
            background:#fff0f5;
            color:#b03052;
            width:46px;
            height:46px;
            border-radius:14px;
            font-size:24px;
            cursor:pointer;
        }

        .nav-links{
            display:flex;
            gap:26px;
            align-items:center;
        }

        .nav-links a{
            text-decoration:none;
            color:#333;
            font-weight:600;
            font-size:14px;
        }

        .nav-links a:hover{
            color:#b03052;
        }

        .container{
            max-width:1300px;
            margin:auto;
            padding:50px 8%;
        }

        .top{
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:35px;
            gap:20px;
        }

        h1{
            font-size:52px;
            color:#222;
        }

        .back{
            text-decoration:none;
            background:white;
            color:#b03052;
            padding:14px 22px;
            border-radius:16px;
            font-weight:700;
            box-shadow:0 10px 25px rgba(0,0,0,.05);
        }

        .wrapper{
            display:grid;
            grid-template-columns:2fr 1fr;
            gap:30px;
        }

        .cart-items{
            display:flex;
            flex-direction:column;
            gap:22px;
        }

        .item{
            background:white;
            border-radius:30px;
            padding:20px;
            display:flex;
            gap:22px;
            align-items:center;
            box-shadow:0 12px 30px rgba(0,0,0,.06);
        }

        .item img{
            width:150px;
            height:150px;
            object-fit:cover;
            border-radius:24px;
        }

        .item-content{
            flex:1;
        }

        .item-content h3{
            margin-bottom:10px;
            font-size:26px;
        }

        .price{
            color:#b03052;
            font-size:24px;
            font-weight:800;
            margin-bottom:16px;
        }

        .qty{
            display:flex;
            align-items:center;
            gap:14px;
            margin-bottom:18px;
        }

        .qty-btn{
            width:42px;
            height:42px;
            display:flex;
            align-items:center;
            justify-content:center;
            border-radius:14px;
            text-decoration:none;
            font-size:24px;
            font-weight:700;
        }

        .minus{
            background:#fff0f5;
            color:#b03052;
        }

        .plus{
            background:#b03052;
            color:white;
        }

        .qty strong{
            font-size:20px;
        }

        .remove{
            text-decoration:none;
            background:#111827;
            color:white;
            padding:11px 18px;
            border-radius:14px;
            font-weight:600;
            display:inline-block;
        }

        .summary{
            background:white;
            border-radius:30px;
            padding:32px;
            height:max-content;
            box-shadow:0 12px 30px rgba(0,0,0,.06);
            position:sticky;
            top:110px;
        }

        .summary h2{
            margin-bottom:28px;
            font-size:30px;
        }

        .line{
            display:flex;
            justify-content:space-between;
            margin-bottom:18px;
            color:#555;
            font-size:15px;
        }

        .total{
            border-top:1px solid #eee;
            padding-top:22px;
            margin-top:24px;
            display:flex;
            justify-content:space-between;
            font-size:28px;
            font-weight:800;
        }

        .btn{
            display:block;
            width:100%;
            border:none;
            background:#b03052;
            color:white;
            padding:18px;
            border-radius:18px;
            font-size:16px;
            font-weight:700;
            margin-top:28px;
            text-align:center;
            text-decoration:none;
        }

        .btn-light{
            background:#fff0f5;
            color:#b03052;
        }

        .empty{
            background:white;
            padding:70px;
            border-radius:32px;
            text-align:center;
            box-shadow:0 12px 30px rgba(0,0,0,.06);
        }

        .empty h2{
            margin-bottom:18px;
            font-size:36px;
        }

        .empty p{
            color:#777;
            margin-bottom:26px;
        }

        .shop-btn{
            text-decoration:none;
            background:#b03052;
            color:white;
            padding:16px 24px;
            border-radius:16px;
            font-weight:700;
        }

        @media(max-width:1000px){

            .wrapper{
                grid-template-columns:1fr;
            }

            .summary{
                position:relative;
                top:0;
            }
        }

        @media(max-width:700px){

            .navbar{
                padding:18px 6%;
            }

            .menu-toggle{
                display:block;
            }

            .nav-links{
                display:none;
                position:absolute;
                top:80px;
                left:6%;
                right:6%;
                background:white;
                border-radius:22px;
                padding:18px;
                box-shadow:0 14px 35px rgba(0,0,0,.12);
                flex-direction:column;
                align-items:flex-start;
                gap:14px;
            }

            .nav-links.show{
                display:flex;
            }

            .nav-links a{
                width:100%;
                padding:12px 14px;
                border-radius:12px;
                background:#fffaf7;
            }

            .container{
                padding:40px 6%;
            }

            .top{
                flex-direction:column;
                align-items:flex-start;
            }

            h1{
                font-size:38px;
            }

            .item{
                flex-direction:column;
                align-items:flex-start;
            }

            .item img{
                width:100%;
                height:250px;
            }

            .summary{
                padding:24px;
            }

            .empty{
                padding:45px 24px;
            }
        }

    </style>
</head>
<body>

<nav class="navbar">

    <div class="logo">
        Ms.Mama Bakery
    </div>

    <button class="menu-toggle" onclick="toggleMenu()">
        ☰
    </button>

    <div class="nav-links" id="mobileMenu">
        <a href="/">Нүүр</a>
        <a href="/menu">Цэс</a>
        <a href="/custom-cakes">Захиалгын торт</a>
        <a href="/orders">Захиалга шалгах</a>
        <a href="/cart">Сагс</a>
    </div>

</nav>

<div class="container">

    <div class="top">

        <h1>
            Таны сагс
        </h1>

        <a href="/menu" class="back">
            ← Цэс рүү буцах
        </a>

    </div>

    @if(count($cart) > 0)

        @php $total = 0; @endphp

        <div class="wrapper">

            <div class="cart-items">

                @foreach($cart as $item)

                    @php
                        $subtotal = $item['price'] * $item['quantity'];
                        $total += $subtotal;
                    @endphp

                    <div class="item">

                        @if($item['image'])

                            <img src="{{ asset('storage/'.$item['image']) }}">

                        @else

                            <img src="https://images.unsplash.com/photo-1578985545062-69928b1d9587?q=80&w=1200">

                        @endif

                        <div class="item-content">

                            <h3>
                                {{ $item['name'] }}
                            </h3>

                            <div class="price">
                                {{ number_format($item['price']) }}₮
                            </div>

                            <div class="qty">

                                <a href="/cart/update/{{ $item['id'] }}/minus"
                                   class="qty-btn minus">
                                    −
                                </a>

                                <strong>
                                    {{ $item['quantity'] }}
                                </strong>

                                <a href="/cart/update/{{ $item['id'] }}/plus"
                                   class="qty-btn plus">
                                    +
                                </a>

                            </div>

                            <a href="/cart/remove/{{ $item['id'] }}"
                               class="remove">
                                Remove
                            </a>

                        </div>

                    </div>

                @endforeach

            </div>

            <div class="summary">

                <h2>
                    Захиалгын мэдээлэл
                </h2>

                <div class="line">
                    <span>Бүтээгдэхүүн</span>
                    <span>{{ count($cart) }}</span>
                </div>

                <div class="line">
                    <span>Хүргэлт</span>
                    <span>Үнэгүй</span>
                </div>

                <div class="total">
                    <span>Нийт</span>
                    <span>{{ number_format($total) }}₮</span>
                </div>

                <a href="/checkout" class="btn">
                    Захиалга үргэлжлүүлэх
                </a>

                <a href="/cart/clear" class="btn btn-light">
                    Сагс цэвэрлэх
                </a>

            </div>

        </div>

    @else

        <div class="empty">

            <h2>
                Сагс хоосон байна
            </h2>

            <p>
                Цэсээс бүтээгдэхүүн сонгон сагсандаа нэмээрэй.
            </p>

            <a href="/menu" class="shop-btn">
                Цэс үзэх
            </a>

        </div>

    @endif

</div>

<script>

function toggleMenu(){
    document.getElementById('mobileMenu').classList.toggle('show');
}

</script>

</body>
</html>