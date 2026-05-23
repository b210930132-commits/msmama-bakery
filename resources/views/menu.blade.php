<!DOCTYPE html>
<html lang="mn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu | Ms.Mama Bakery</title>

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
            background:white;
            display:flex;
            justify-content:space-between;
            align-items:center;
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

        .nav-links{
            display:flex;
            gap:24px;
        }

        .nav-links a{
            text-decoration:none;
            color:#333;
            font-weight:600;
        }

        .hero{
            padding:70px 8% 30px;
            text-align:center;
        }

        .hero h1{
            font-size:58px;
            margin-bottom:18px;
        }

        .hero p{
            color:#777;
            font-size:17px;
        }

        .products{
            padding:30px 8% 80px;
            display:grid;
            grid-template-columns:repeat(auto-fit,minmax(280px,1fr));
            gap:28px;
        }

        .card{
            background:white;
            border-radius:28px;
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

        .info{
            padding:22px;
        }

        .badge{
            display:inline-block;
            background:#fff0f5;
            color:#b03052;
            padding:7px 12px;
            border-radius:12px;
            font-size:12px;
            font-weight:700;
            margin-bottom:14px;
        }

        .info h3{
            font-size:24px;
            margin-bottom:12px;
        }

        .desc{
            color:#777;
            line-height:1.7;
            margin-bottom:18px;
            font-size:14px;
        }

        .bottom{
            display:flex;
            justify-content:space-between;
            align-items:center;
        }

        .price{
            color:#b03052;
            font-size:24px;
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

        .footer{
            background:#2b2b2b;
            color:white;
            text-align:center;
            padding:40px 20px;
        }

        @media(max-width:700px){

            .nav-links{
                display:none;
            }

            .hero h1{
                font-size:40px;
            }

            .products{
                padding-left:6%;
                padding-right:6%;
            }
        }

    </style>

</head>
<body>

<nav class="navbar">

    <div class="logo">
        Ms.Mama Bakery
    </div>

    <div class="nav-links">
    <a href="/">Нүүр</a>
    <a href="/menu">Цэс</a>
    <a href="/custom-cakes">Захиалгын торт</a>
    <a href="/cart">Сагс</a>
    <a href="/orders">Захиалга</a>
    <a href="/admin/login">Admin</a>
</div>

</nav>

<section class="hero">

    <h1>Our Menu</h1>

    <p>
        Fresh bakery & coffee products everyday
    </p>

</section>

<section class="products">

    @forelse($products as $product)

        <div class="card">

            @if($product->image)
                <img src="{{ asset('storage/'.$product->image) }}">
            @else
                <img src="https://images.unsplash.com/photo-1578985545062-69928b1d9587?q=80&w=1200">
            @endif

            <div class="info">

                <span class="badge">
                    {{ $product->category }}
                </span>

                <h3>
                    {{ $product->name }}
                </h3>

                <div class="desc">
                    {{ $product->description }}
                </div>

                <div class="bottom">

                    <div class="price">
                        {{ number_format($product->price) }}₮
                    </div>

                    <a href="/product/{{ $product->id }}" class="btn">
                        View
                    </a>

                </div>

            </div>

        </div>

    @empty

        <h2>
            Product байхгүй байна
        </h2>

    @endforelse

</section>

<footer class="footer">

    <h3>
        Ms.Mama Bakery
    </h3>

    <p>
        Fresh bakery & coffee
    </p>

</footer>

</body>
</html>