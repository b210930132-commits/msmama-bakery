<!DOCTYPE html>
<html lang="mn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Захиалгын торт | Ms.Mama Bakery</title>

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

        .hero{
            padding:70px 8% 40px;
            text-align:center;
        }

        .tag{
            display:inline-block;
            background:#fff0f5;
            color:#b03052;
            padding:10px 18px;
            border-radius:30px;
            font-weight:700;
            margin-bottom:24px;
        }

        .hero h1{
            font-size:58px;
            margin-bottom:22px;
            line-height:1.1;
        }

        .hero p{
            max-width:850px;
            margin:auto;
            color:#666;
            line-height:1.9;
            font-size:17px;
        }

        .notice{
            margin:0 8% 40px;
            background:#fff0f5;
            border:1px solid #ffd5e3;
            color:#8a1538;
            padding:22px;
            border-radius:24px;
            font-weight:700;
            text-align:center;
            font-size:17px;
        }

        .cakes{
            padding:0 8% 80px;
            display:grid;
            grid-template-columns:repeat(4,1fr);
            gap:26px;
        }

        .card{
            background:white;
            border-radius:30px;
            overflow:hidden;
            box-shadow:0 12px 30px rgba(0,0,0,.06);
            transition:.3s;
        }

        .card:hover{
            transform:translateY(-8px);
        }

        .card img{
            width:100%;
            height:260px;
            object-fit:cover;
        }

        .content{
            padding:24px;
        }

        .label{
            display:inline-block;
            background:#fff0f5;
            color:#b03052;
            padding:8px 14px;
            border-radius:12px;
            font-size:12px;
            font-weight:700;
            margin-bottom:14px;
        }

        .content h3{
            font-size:24px;
            margin-bottom:12px;
        }

        .content p{
            color:#777;
            line-height:1.7;
            font-size:14px;
            margin-bottom:20px;
        }

        .bottom{
            display:flex;
            justify-content:space-between;
            align-items:center;
            gap:12px;
        }

        .price{
            color:#b03052;
            font-size:22px;
            font-weight:800;
        }

        .btn{
            background:#b03052;
            color:white;
            text-decoration:none;
            padding:12px 16px;
            border-radius:14px;
            font-size:13px;
            font-weight:700;
        }

        .empty{
            grid-column:1/-1;
            background:white;
            border-radius:28px;
            padding:50px;
            text-align:center;
            color:#777;
            box-shadow:0 12px 30px rgba(0,0,0,.06);
        }

        .footer{
            background:#2b2b2b;
            color:white;
            padding:40px 8%;
            text-align:center;
        }

        .footer p{
            color:#ccc;
            margin-top:10px;
        }

        @media(max-width:1100px){

            .cakes{
                grid-template-columns:repeat(2,1fr);
            }
        }

        @media(max-width:700px){

            .navbar{
                padding:18px 6%;
                position:sticky;
            }

            .menu-toggle{
                display:block;
            }

            .nav-links{
                display:none;
                position:absolute;
                top:78px;
                left:6%;
                right:6%;
                background:white;
                border-radius:22px;
                padding:18px;
                box-shadow:0 14px 35px rgba(0,0,0,.12);
                flex-direction:column;
                align-items:flex-start;
                gap:14px;
                z-index:9999;
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

            .hero h1{
                font-size:40px;
            }

            .cakes{
                grid-template-columns:1fr;
                padding-left:6%;
                padding-right:6%;
            }

            .hero{
                padding-left:6%;
                padding-right:6%;
            }

            .notice{
                margin-left:6%;
                margin-right:6%;
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

<section class="hero">

    <div class="tag">
        Premium Custom Cakes
    </div>

    <h1>
        Захиалгын бүтэн торт
    </h1>

    <p>
        Төрсөн өдөр, шинэ жил, хурим, байгууллагын арга хэмжээ болон онцгой баярт зориулсан
        premium бүтэн тортуудыг таны хүссэн загвар, өнгө, хэмжээгээр урьдчилан захиалгаар бэлтгэнэ.
    </p>

</section>

<div class="notice">
    Анхааруулга: Захиалгын бүтэн тортыг 7–14 хоногийн өмнө урьдчилан захиална уу.
</div>

<section class="cakes">

    @forelse($customCakes as $cake)

        <div class="card">

            @if($cake->image)
                <img src="{{ asset('storage/'.$cake->image) }}">
            @else
                <img src="https://images.unsplash.com/photo-1578985545062-69928b1d9587?q=80&w=1200">
            @endif

            <div class="content">

                <span class="label">
                    {{ $cake->label }}
                </span>

                <h3>
                    {{ $cake->title }}
                </h3>

                <p>
                    {{ $cake->description }}
                </p>

                <div class="bottom">

                    <div class="price">
                        {{ number_format($cake->price) }}₮
                    </div>

                    <a href="/menu" class="btn">
                        Захиалах
                    </a>

                </div>

            </div>

        </div>

    @empty

        <div class="empty">
            <h2>Захиалгын торт одоогоор байхгүй байна</h2>
            <p>Admin хэсгээс Custom Cake нэмнэ үү.</p>
        </div>

    @endforelse

</section>

<footer class="footer">

    <h3>
        Ms.Mama Bakery
    </h3>

    <p>
        Premium custom cakes & bakery
    </p>

</footer>

<script>
function toggleMenu(){
    document.getElementById('mobileMenu').classList.toggle('show');
}
</script>

</body>
</html>