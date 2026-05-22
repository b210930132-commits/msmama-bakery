<!DOCTYPE html>
<html lang="mn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Цэс | Ms.Mama Bakery</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        *{margin:0;padding:0;box-sizing:border-box;}

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
            box-shadow:0 4px 14px rgba(0,0,0,.04);
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
            padding:70px 8% 35px;
            text-align:center;
        }

        .hero h1{
            font-size:56px;
            margin-bottom:18px;
        }

        .hero p{
            color:#777;
            font-size:18px;
        }

        .filter-box{
            margin:0 8% 40px;
            background:white;
            padding:24px;
            border-radius:26px;
            box-shadow:0 12px 30px rgba(0,0,0,.06);
        }

        .search-row{
            display:grid;
            grid-template-columns:1fr auto;
            gap:14px;
            margin-bottom:20px;
        }

        .search-row input{
            width:100%;
            padding:16px 18px;
            border:1px solid #eee;
            border-radius:16px;
            font-family:'Poppins',sans-serif;
            outline:none;
            background:#fffaf7;
        }

        .search-row button{
            border:none;
            background:#b03052;
            color:white;
            padding:0 28px;
            border-radius:16px;
            font-weight:700;
            cursor:pointer;
        }

        .categories{
            display:flex;
            gap:14px;
            overflow:auto;
        }

        .cat-btn{
            padding:13px 22px;
            background:#fffaf7;
            border-radius:16px;
            text-decoration:none;
            color:#b03052;
            font-weight:600;
            white-space:nowrap;
        }

        .cat-btn.active,
        .cat-btn:hover{
            background:#b03052;
            color:white;
        }

        .products{
            padding:0 8% 80px;
            display:grid;
            grid-template-columns:repeat(auto-fit,minmax(280px,1fr));
            gap:30px;
        }

        .card{
            background:white;
            border-radius:28px;
            overflow:hidden;
            box-shadow:0 12px 30px rgba(0,0,0,.06);
            transition:.3s;
            position:relative;
        }

        .card:hover{
            transform:translateY(-8px);
        }

        .card img{
            width:100%;
            height:270px;
            object-fit:cover;
        }

        .info{
            padding:24px;
        }

        .badge{
            display:inline-block;
            background:#fff0f5;
            color:#b03052;
            padding:7px 12px;
            border-radius:12px;
            font-size:12px;
            font-weight:600;
            margin-bottom:14px;
        }

        .stock-badge{
            display:inline-block;
            background:#ecfdf5;
            color:#166534;
            padding:7px 12px;
            border-radius:12px;
            font-size:12px;
            font-weight:600;
            margin-left:8px;
        }

        .stock-badge.out{
            background:#fee2e2;
            color:#991b1b;
        }

        .info h3{
            margin-bottom:12px;
            font-size:24px;
        }

        .desc{
            color:#777;
            line-height:1.7;
            font-size:14px;
            margin-bottom:18px;
        }

        .bottom{
            display:flex;
            justify-content:space-between;
            align-items:center;
            gap:12px;
        }

        .price{
            color:#b03052;
            font-size:24px;
            font-weight:700;
        }

        .view-btn{
            text-decoration:none;
            background:#b03052;
            color:white;
            padding:12px 18px;
            border-radius:12px;
            font-weight:600;
            border:none;
            white-space:nowrap;
        }

        .out-btn{
            background:#999;
            cursor:not-allowed;
        }

        .empty{
            grid-column:1/-1;
            background:white;
            padding:50px;
            border-radius:28px;
            text-align:center;
            color:#777;
        }

        .footer{
            background:#2b2b2b;
            color:white;
            text-align:center;
            padding:40px 20px;
        }

        @media(max-width:900px){
            .hero h1{font-size:42px;}
            .products{grid-template-columns:1fr;}
            .search-row{grid-template-columns:1fr;}
            .search-row button{padding:16px;}
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

            .hero{
                padding-left:6%;
                padding-right:6%;
            }

            .filter-box{
                margin-left:6%;
                margin-right:6%;
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
    <div class="logo">Ms.Mama Bakery</div>

    <button class="menu-toggle" onclick="toggleMenu()">
        ☰
    </button>

    <div class="nav-links" id="mobileMenu">
        <a href="/">Нүүр</a>
        <a href="/menu">Цэс</a>
        <a href="/custom-cakes">Захиалгын торт</a>
        <a href="/orders">Захиалга шалгах</a>
        <a href="/cart">Сагс</a>
        <a href="/admin/login">Admin</a>
    </div>
</nav>

<section class="hero">
    <h1>Цэс</h1>
    <p>Өдөр бүр шинэхэн бэлтгэгддэг bakery бүтээгдэхүүнүүд</p>
</section>

<div class="filter-box">

    <form action="/menu" method="GET" class="search-row">
        <input
            type="text"
            name="search"
            placeholder="Бүтээгдэхүүн хайх..."
            value="{{ request('search') }}"
        >

        @if(request('category'))
            <input type="hidden" name="category" value="{{ request('category') }}">
        @endif

        <button type="submit">
            Хайх
        </button>
    </form>

    <div class="categories">
        <a href="/menu" class="cat-btn {{ request('category') == null ? 'active' : '' }}">Бүгд</a>
        <a href="/menu?category=Cakes" class="cat-btn {{ request('category') == 'Cakes' ? 'active' : '' }}">Бялуу</a>
        <a href="/menu?category=Desserts" class="cat-btn {{ request('category') == 'Desserts' ? 'active' : '' }}">Дессерт</a>
        <a href="/menu?category=Coffee" class="cat-btn {{ request('category') == 'Coffee' ? 'active' : '' }}">Кофе</a>
        <a href="/menu?category=Non Coffee" class="cat-btn {{ request('category') == 'Non Coffee' ? 'active' : '' }}">Кофегүй уух зүйл</a>
        <a href="/menu?category=Smoothies" class="cat-btn {{ request('category') == 'Smoothies' ? 'active' : '' }}">Смүүти</a>
        <a href="/menu?category=Sandwiches" class="cat-btn {{ request('category') == 'Sandwiches' ? 'active' : '' }}">Сэндвич</a>
        <a href="/menu?category=Pizza" class="cat-btn {{ request('category') == 'Pizza' ? 'active' : '' }}">Пицца</a>
        <a href="/menu?category=Bakery" class="cat-btn {{ request('category') == 'Bakery' ? 'active' : '' }}">Bakery</a>
    </div>

</div>

<section class="products">

    @forelse($products as $product)

        <div class="card">

            @if($product->image)
                <img src="{{ asset('storage/'.$product->image) }}">
            @else
                <img src="https://images.unsplash.com/photo-1578985545062-69928b1d9587?q=80&w=1200">
            @endif

            <div class="info">

                <div>
                    <span class="badge">{{ $product->category }}</span>

                    @if($product->stock > 0)
                        <span class="stock-badge">Үлдэгдэл: {{ $product->stock }}</span>
                    @else
                        <span class="stock-badge out">Дууссан</span>
                    @endif
                </div>

                <h3>{{ $product->name }}</h3>

                <div class="desc">
                    {{ $product->description }}
                </div>

                <div class="bottom">
                    <div class="price">
                        {{ number_format($product->price) }}₮
                    </div>

                    @if($product->stock > 0)
                        <a href="/product/{{ $product->id }}" class="view-btn">
                            Дэлгэрэнгүй
                        </a>
                    @else
                        <span class="view-btn out-btn">
                            Дууссан
                        </span>
                    @endif
                </div>
            </div>

        </div>

    @empty

        <div class="empty">
            <h2>Бүтээгдэхүүн олдсонгүй</h2>
            <p>Өөр нэр эсвэл ангиллаар хайгаад үзээрэй.</p>
        </div>

    @endforelse

</section>

<footer class="footer">
    <h3>Ms.Mama Bakery & Coffee</h3>
    <p>Өдөр бүр шинэхэн амт</p>
</footer>

<script>
function toggleMenu(){
    document.getElementById('mobileMenu').classList.toggle('show');
}
</script>

</body>
</html>