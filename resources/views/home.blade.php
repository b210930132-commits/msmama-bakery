<!DOCTYPE html>
<html lang="mn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ms.Mama Bakery</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        *{margin:0;padding:0;box-sizing:border-box;}
        html{scroll-behavior:smooth;}

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

        .nav-links a:hover{color:#b03052;}

        .hero{
            padding:65px 8% 55px;
            display:grid;
            grid-template-columns:1.05fr .95fr;
            gap:46px;
            align-items:center;
        }

        .tag{
            display:inline-block;
            background:#fff0f5;
            color:#b03052;
            padding:10px 16px;
            border-radius:30px;
            font-weight:700;
            margin-bottom:22px;
        }

        .hero h1{
            font-size:62px;
            line-height:1.08;
            margin-bottom:24px;
            color:#262626;
        }

        .hero p{
            color:#666;
            line-height:1.9;
            font-size:17px;
            max-width:620px;
            margin-bottom:34px;
        }

        .hero-buttons{
            display:flex;
            gap:16px;
            flex-wrap:wrap;
        }

        .btn{
            display:inline-block;
            text-decoration:none;
            padding:16px 26px;
            border-radius:16px;
            font-weight:700;
        }

        .primary{
            background:#b03052;
            color:white;
            box-shadow:0 10px 25px rgba(176,48,82,.22);
        }

        .secondary{
            background:white;
            color:#b03052;
            box-shadow:0 10px 25px rgba(0,0,0,.06);
        }

        .hero-card{
            background:white;
            border-radius:34px;
            padding:18px;
            box-shadow:0 18px 50px rgba(176,48,82,.12);
        }

        .hero-card img{
            width:100%;
            height:430px;
            object-fit:cover;
            border-radius:26px;
            display:block;
        }

        .section{
            padding:35px 8% 75px;
        }

        .section-head{
            display:flex;
            justify-content:space-between;
            align-items:end;
            gap:20px;
            margin-bottom:30px;
        }

        .section-head h2{
            font-size:42px;
            color:#262626;
        }

        .section-head p{
            color:#777;
            max-width:540px;
            line-height:1.7;
        }

        .promo-grid{
            display:grid;
            grid-template-columns:repeat(4,1fr);
            gap:24px;
        }

        .promo-card{
            background:white;
            border-radius:28px;
            overflow:hidden;
            box-shadow:0 12px 30px rgba(0,0,0,.06);
            transition:.3s;
        }

        .promo-card:hover{transform:translateY(-6px);}

        .promo-card img{
            width:100%;
            height:220px;
            object-fit:cover;
        }

        .promo-info{
            padding:22px;
        }

        .label{
            display:inline-block;
            background:#fff0f5;
            color:#b03052;
            padding:7px 12px;
            border-radius:12px;
            font-size:12px;
            font-weight:700;
            margin-bottom:12px;
        }

        .promo-info h3{
            font-size:21px;
            margin-bottom:10px;
        }

        .promo-info p{
            color:#777;
            font-size:14px;
            line-height:1.7;
            margin-bottom:16px;
        }

        .card-bottom{
            display:flex;
            justify-content:space-between;
            align-items:center;
            gap:12px;
        }

        .price{
            color:#b03052;
            font-size:20px;
            font-weight:800;
        }

        .order-btn{
            background:#b03052;
            color:white;
            text-decoration:none;
            padding:11px 14px;
            border-radius:12px;
            font-size:13px;
            font-weight:700;
            white-space:nowrap;
        }

        .features{
            padding:0 8% 70px;
            display:grid;
            grid-template-columns:repeat(4,1fr);
            gap:18px;
        }

        .feature{
            background:white;
            padding:24px;
            border-radius:24px;
            box-shadow:0 10px 26px rgba(0,0,0,.05);
        }

        .feature h3{
            color:#b03052;
            margin-bottom:8px;
        }

        .feature p{
            color:#777;
            font-size:14px;
            line-height:1.7;
        }

        .cta{
            margin:20px 8% 80px;
            background:linear-gradient(135deg,#b03052,#8a1538);
            color:white;
            border-radius:34px;
            padding:46px;
            display:flex;
            justify-content:space-between;
            align-items:center;
            gap:25px;
        }

        .cta h2{
            font-size:36px;
            margin-bottom:10px;
        }

        .cta p{
            color:rgba(255,255,255,.85);
            line-height:1.7;
        }

        .cta a{
            background:white;
            color:#b03052;
            text-decoration:none;
            padding:16px 24px;
            border-radius:16px;
            font-weight:800;
            white-space:nowrap;
        }

        .footer{
            background:#2b2b2b;
            color:white;
            padding:38px 8%;
            display:flex;
            justify-content:space-between;
            gap:20px;
            flex-wrap:wrap;
        }

        .footer p{
            color:#ccc;
            margin-top:8px;
        }

        .chat-toggle{
            position:fixed;
            right:25px;
            bottom:25px;
            width:65px;
            height:65px;
            border-radius:50%;
            border:none;
            background:#b03052;
            color:white;
            font-size:28px;
            cursor:pointer;
            box-shadow:0 10px 30px rgba(176,48,82,.35);
            z-index:9999;
        }

        .chat-box{
            position:fixed;
            right:25px;
            bottom:105px;
            width:350px;
            background:white;
            border-radius:26px;
            box-shadow:0 18px 45px rgba(0,0,0,.15);
            overflow:hidden;
            display:none;
            z-index:9999;
        }

        .chat-head{
            background:#b03052;
            color:white;
            padding:18px;
            font-weight:700;
            display:flex;
            justify-content:space-between;
            align-items:center;
        }

        .chat-head button{
            background:none;
            border:none;
            color:white;
            font-size:22px;
            cursor:pointer;
        }

        .chat-body{
            padding:18px;
            height:230px;
            overflow-y:auto;
            background:#fffaf7;
        }

        .bot{
            background:white;
            padding:12px 14px;
            border-radius:16px;
            margin-bottom:12px;
            color:#555;
            line-height:1.6;
            box-shadow:0 6px 16px rgba(0,0,0,.05);
        }

        .quick-questions{
            padding:14px;
            display:grid;
            grid-template-columns:1fr 1fr;
            gap:10px;
        }

        .quick-questions button{
            border:none;
            background:#fff0f5;
            color:#b03052;
            padding:11px;
            border-radius:12px;
            font-weight:700;
            cursor:pointer;
        }

        @media(max-width:1100px){
            .hero{grid-template-columns:1fr;}
            .features,.promo-grid{grid-template-columns:repeat(2,1fr);}
            .hero-card img{height:390px;}
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

            .hero{padding:48px 6%;}
            .hero h1{font-size:40px;}

            .features,.promo-grid{
                grid-template-columns:1fr;
                padding-left:6%;
                padding-right:6%;
            }

            .section{padding-left:6%;padding-right:6%;}

            .section-head{
                flex-direction:column;
                align-items:flex-start;
            }

            .section-head h2{font-size:32px;}

            .cta{
                margin-left:6%;
                margin-right:6%;
                flex-direction:column;
                align-items:flex-start;
                padding:34px;
            }

            .chat-box{
                width:90%;
                right:5%;
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
        <a href="#promo">Gift багц</a>
        <a href="/custom-cakes">Захиалгын торт</a>
        <a href="/orders">Захиалга шалгах</a>
        <a href="/cart">Сагс</a>
    </div>
</nav>

<section class="hero">
    <div class="hero-text">
        <div class="tag">Шинэхэн bakery бүтээгдэхүүн өдөр бүр</div>

        <h1>Амттай мөч бүрийг Ms.Mama-тай</h1>

        <p>
            Dessert, coffee, bakery бүтээгдэхүүн болон бэлгийн багцуудыг онлайнаар сонгож,
            авах өдөр цагтаа тохируулан захиалаарай.
        </p>

        <div class="hero-buttons">
            <a href="/menu" class="btn primary">Цэс харах</a>
            <a href="#promo" class="btn secondary">Gift багц харах</a>
        </div>
    </div>

    <div class="hero-card">
        <img src="https://images.unsplash.com/photo-1551024506-0bccd828d307?q=80&w=1400">
    </div>
</section>

<section class="section" id="promo">
    <div class="section-head">
        <div>
            <h2>Gift багц ба онцлох санал</h2>
        </div>

        <p>
            Найз нөхөд, гэр бүл, хайртай хүндээ бэлэглэхэд тохиромжтой dessert, coffee болон bakery combo багцууд.
        </p>
    </div>

    <div class="promo-grid">

        @forelse($giftPackages as $gift)

            <div class="promo-card">

                @if($gift->image)
                    <img src="{{ $product->image }}">
                @else
                    <img src="https://images.unsplash.com/photo-1519869325930-281384150729?q=80&w=1200">
                @endif

                <div class="promo-info">
                    <span class="label">{{ $gift->label }}</span>
                    <h3>{{ $gift->title }}</h3>
                    <p>{{ $gift->description }}</p>

                    <div class="card-bottom">
                        <div class="price">{{ number_format($gift->price) }}₮</div>
                        <a href="/menu" class="order-btn">Захиалах</a>
                    </div>
                </div>

            </div>

        @empty

            <div class="promo-card">
                <div class="promo-info">
                    <h3>Gift багц одоогоор байхгүй байна</h3>
                    <p>Admin хэсгээс Gift Package нэмнэ үү.</p>
                </div>
            </div>

        @endforelse

    </div>
</section>

<section class="features">
    <div class="feature">
        <h3>Шинэхэн</h3>
        <p>Өдөр бүр шинэ бүтээгдэхүүн бэлтгэж хэрэглэгчид хүргэнэ.</p>
    </div>

    <div class="feature">
        <h3>Онлайн захиалга</h3>
        <p>Цэс харж, сагсанд нэмэн захиалгаа хялбар баталгаажуулна.</p>
    </div>

    <div class="feature">
        <h3>Gift багц</h3>
        <p>Бэлэглэхэд тохиромжтой dessert, coffee, bakery combo багцууд.</p>
    </div>

    <div class="feature">
        <h3>Захиалгын явц</h3>
        <p>Захиалгын төлөвөө онлайнаар шалгах боломжтой.</p>
    </div>
</section>

<section class="cta">
    <div>
        <h2>Өнөөдрийн шинэхэн бүтээгдэхүүнээ захиалаарай</h2>
        <p>
            Цэснээс бүтээгдэхүүнээ сонгоод, авах өдөр болон цагаа тохируулан захиалга өгөх боломжтой.
        </p>
    </div>

    <a href="/menu">Цэс рүү орох</a>
</section>

<footer class="footer">
    <div>
        <h3>Ms.Mama Bakery</h3>
        <p>Шинэхэн амтыг өдөр бүр танд.</p>
    </div>

    <div>
        <h3>Холбоо барих</h3>
        <p>Онлайн захиалга • Gift багц • Бүтэн торт • Bakery & Coffee</p>
    </div>
</footer>

<div class="chat-box" id="chatBox">
    <div class="chat-head">
        Ms.Mama Chatbot 💬
        <button onclick="toggleChat()">×</button>
    </div>

    <div class="chat-body" id="chatBody">
        <div class="bot">
            Сайн байна уу 👋 Та доорх асуултаас сонгоорой.
        </div>
    </div>

    <div class="quick-questions">
        <button onclick="botReply('custom')">Захиалгын торт</button>
        <button onclick="botReply('gift')">Gift багц</button>
        <button onclick="botReply('time')">Ажиллах цаг</button>
        <button onclick="botReply('delivery')">Хүргэлт</button>
        <button onclick="botReply('payment')">Төлбөр</button>
        <button onclick="botReply('track')">Захиалга шалгах</button>
    </div>
</div>

<button class="chat-toggle" onclick="toggleChat()">💬</button>

<script>
function toggleMenu(){
    document.getElementById('mobileMenu').classList.toggle('show');
}

function toggleChat(){
    let box = document.getElementById('chatBox');
    box.style.display = box.style.display === 'block' ? 'none' : 'block';
}

function botReply(type){
    let body = document.getElementById('chatBody');
    let text = '';

    if(type === 'custom'){
        text = 'Захиалгын бүтэн тортыг 7–14 хоногийн өмнө урьдчилан захиална. Төрсөн өдөр, шинэ жил, арга хэмжээний тортуудыг хүссэн загвараар хийдэг 🎂';
    }

    if(type === 'gift'){
        text = 'Gift багцад dessert, cookie, mini cake, coffee combo зэрэг бэлэглэхэд тохиромжтой бүтээгдэхүүнүүд багтана 🎁';
    }

    if(type === 'time'){
        text = 'Захиалга өдөр бүр 09:00–19:00 цагийн хооронд авна ⏰';
    }

    if(type === 'delivery'){
        text = 'Checkout хэсэгт хаягаа бөглөж захиалга өгнө. Мөн авах өдөр, авах цагаа сонгох боломжтой 🚚';
    }

    if(type === 'payment'){
        text = 'Төлбөрийг QPay demo payment хэсгээр баталгаажуулна 💳';
    }

    if(type === 'track'){
        text = 'Захиалгын явцаа “Захиалга шалгах” хэсэгт утасны дугаараараа хайж харна. Pending → Preparing → Ready → Delivered гэсэн төлөвтэй.';
    }

    body.innerHTML += `<div class="bot">${text}</div>`;
    body.scrollTop = body.scrollHeight;
}
</script>

</body>
</html>