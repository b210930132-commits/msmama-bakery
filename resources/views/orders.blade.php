<!DOCTYPE html>
<html lang="mn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Миний захиалга | Ms.Mama Bakery</title>

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
            max-width:1100px;
            margin:auto;
            padding:50px 8%;
        }

        h1{
            font-size:48px;
            margin-bottom:30px;
            color:#222;
        }

        .search-box{
            background:white;
            padding:34px;
            border-radius:30px;
            box-shadow:0 12px 30px rgba(0,0,0,.06);
            margin-bottom:35px;
        }

        .group{
            margin-bottom:20px;
        }

        label{
            display:block;
            margin-bottom:10px;
            font-weight:700;
        }

        input{
            width:100%;
            padding:17px;
            border-radius:16px;
            border:1px solid #eee;
            background:#fffaf7;
            font-family:'Poppins',sans-serif;
            outline:none;
            font-size:15px;
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
        }

        .order{
            background:white;
            border-radius:30px;
            padding:34px;
            margin-bottom:28px;
            box-shadow:0 12px 30px rgba(0,0,0,.06);
        }

        .top{
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:28px;
            gap:15px;
        }

        .top h2{
            font-size:30px;
        }

        .status{
            padding:12px 18px;
            border-radius:14px;
            font-size:14px;
            font-weight:700;
            background:#fff0f5;
            color:#b03052;
        }

        .timeline{
            display:grid;
            grid-template-columns:repeat(4,1fr);
            gap:14px;
            margin:30px 0;
        }

        .step{
            background:#f3f3f3;
            border-radius:20px;
            padding:18px 12px;
            text-align:center;
            color:#999;
            font-weight:700;
        }

        .step.active{
            background:#fff0f5;
            color:#b03052;
            border:2px solid #b03052;
        }

        .step.done{
            background:#dcfce7;
            color:#166534;
        }

        .step small{
            display:block;
            margin-top:7px;
            font-size:12px;
            font-weight:500;
        }

        .details{
            display:grid;
            grid-template-columns:repeat(2,1fr);
            gap:18px;
            margin-top:25px;
        }

        .detail-box{
            background:#fffaf7;
            padding:18px;
            border-radius:18px;
        }

        .detail-box strong{
            display:block;
            margin-bottom:8px;
            color:#b03052;
        }

        .price{
            font-size:30px;
            color:#b03052;
            font-weight:800;
            margin-top:30px;
        }

        .empty{
            background:white;
            border-radius:30px;
            padding:60px;
            text-align:center;
            color:#777;
            box-shadow:0 12px 30px rgba(0,0,0,.06);
        }

        .empty h2{
            margin-bottom:18px;
            color:#222;
        }

        @media(max-width:900px){

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

            h1{
                font-size:36px;
            }

            .top{
                flex-direction:column;
                align-items:flex-start;
            }

            .timeline{
                grid-template-columns:1fr;
            }

            .details{
                grid-template-columns:1fr;
            }

            .order{
                padding:24px;
            }

            .search-box{
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

    <h1>
        Захиалгын явц шалгах
    </h1>

    <div class="search-box">

        <form action="/orders/search" method="POST">
            @csrf

            <div class="group">

                <label>
                    Утасны дугаар
                </label>

                <input type="text"
                       name="phone"
                       placeholder="99112233"
                       required>

            </div>

            <button class="btn" type="submit">
                Захиалга хайх
            </button>

        </form>

    </div>

    @isset($orders)

        @forelse($orders as $order)

            @php
                $steps = ['Pending', 'Preparing', 'Ready', 'Delivered'];
                $currentIndex = array_search($order->status, $steps);

                if ($currentIndex === false) {
                    $currentIndex = 0;
                }
            @endphp

            <div class="order">

                <div class="top">

                    <h2>
                        Захиалга #{{ $order->id }}
                    </h2>

                    <div class="status">
                        {{ $order->status }}
                    </div>

                </div>

                <div class="timeline">

                    @foreach($steps as $index => $step)

                        @php
                            $class = '';

                            if ($order->status == 'Cancelled') {
                                $class = '';
                            } elseif ($index < $currentIndex) {
                                $class = 'done';
                            } elseif ($index == $currentIndex) {
                                $class = 'active';
                            }
                        @endphp

                        <div class="step {{ $class }}">

                            {{ $step }}

                            @if($step == 'Pending')
                                <small>Захиалга хүлээн авсан</small>
                            @elseif($step == 'Preparing')
                                <small>Бэлтгэж байна</small>
                            @elseif($step == 'Ready')
                                <small>Авахад бэлэн</small>
                            @elseif($step == 'Delivered')
                                <small>Хүлээлгэн өгсөн</small>
                            @endif

                        </div>

                    @endforeach

                </div>

                @if($order->status == 'Cancelled')

                    <div class="status"
                         style="background:#fee2e2;color:#991b1b;margin-bottom:20px;display:inline-block;">

                        Захиалга цуцлагдсан

                    </div>

                @endif

                <div class="details">

                    <div class="detail-box">
                        <strong>Нэр</strong>
                        {{ $order->customer_name }}
                    </div>

                    <div class="detail-box">
                        <strong>Утас</strong>
                        {{ $order->phone }}
                    </div>

                    <div class="detail-box">
                        <strong>Хаяг</strong>
                        {{ $order->address }}
                    </div>

                    <div class="detail-box">
                        <strong>Авах өдөр</strong>
                        {{ $order->pickup_date }}
                    </div>

                    <div class="detail-box">
                        <strong>Авах цаг</strong>
                        {{ $order->pickup_time }}
                    </div>

                    <div class="detail-box">
                        <strong>Тэмдэглэл</strong>
                        {{ $order->note ?? 'Байхгүй' }}
                    </div>

                </div>

                <div class="price">
                    {{ number_format($order->total_price) }}₮
                </div>

            </div>

        @empty

            <div class="empty">

                <h2>
                    Захиалга олдсонгүй
                </h2>

                <p>
                    Өөр утасны дугаараар хайгаад үзээрэй.
                </p>

            </div>

        @endforelse

    @endisset

</div>

<script>

function toggleMenu(){
    document.getElementById('mobileMenu').classList.toggle('show');
}

</script>

</body>
</html>