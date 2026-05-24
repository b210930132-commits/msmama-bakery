<!DOCTYPE html>
<html lang="mn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }} | Ms.Mama Bakery</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        *{margin:0;padding:0;box-sizing:border-box;}

        body{
            font-family:'Poppins',sans-serif;
            background:#fffaf7;
            color:#2b2b2b;
        }

        .container{
            max-width:1250px;
            margin:auto;
            padding:50px 8%;
        }

        .top{
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:35px;
        }

        .back{
            text-decoration:none;
            color:#b03052;
            background:white;
            padding:14px 20px;
            border-radius:14px;
            font-weight:600;
            box-shadow:0 8px 20px rgba(0,0,0,.05);
        }

        .wrapper{
            display:grid;
            grid-template-columns:1fr 1fr;
            gap:45px;
            align-items:start;
        }

        .image-box{
            background:white;
            border-radius:32px;
            overflow:hidden;
            box-shadow:0 15px 35px rgba(0,0,0,.06);
        }

        .image-box img{
            width:100%;
            height:650px;
            object-fit:cover;
            display:block;
        }

        .content{
            background:white;
            border-radius:32px;
            padding:40px;
            box-shadow:0 15px 35px rgba(0,0,0,.06);
        }

        .badge{
            display:inline-block;
            background:#fff0f5;
            color:#b03052;
            padding:8px 14px;
            border-radius:14px;
            font-size:13px;
            font-weight:600;
            margin-bottom:18px;
        }

        .out-badge{
            background:#fee2e2;
            color:#991b1b;
        }

        h1{
            font-size:52px;
            line-height:1.2;
            margin-bottom:20px;
        }

        .price{
            font-size:42px;
            color:#b03052;
            font-weight:700;
            margin-bottom:25px;
        }

        .desc{
            color:#666;
            line-height:1.9;
            margin-bottom:35px;
            font-size:16px;
        }

        .stock{
            margin-bottom:28px;
            font-weight:600;
            color:#333;
        }

        .stock span{
            color:#b03052;
        }

        .stock .out{
            color:#991b1b;
        }

        .qty{
            display:flex;
            align-items:center;
            gap:16px;
            margin-bottom:35px;
        }

        .qty button{
            width:50px;
            height:50px;
            border:none;
            border-radius:14px;
            background:#fff0f5;
            color:#b03052;
            font-size:22px;
            font-weight:700;
            cursor:pointer;
        }

        .qty strong{
            font-size:24px;
            min-width:40px;
            text-align:center;
        }

        .actions{
            display:grid;
            grid-template-columns:1fr 1fr;
            gap:16px;
        }

        .btn{
            width:100%;
            border:none;
            padding:18px;
            border-radius:16px;
            font-size:16px;
            font-weight:700;
            cursor:pointer;
            transition:.3s;
        }

        .btn:hover{
            transform:translateY(-2px);
        }

        .cart{
            background:#b03052;
            color:white;
        }

        .buy{
            background:#fff0f5;
            color:#b03052;
        }

        .disabled{
            background:#999!important;
            color:white!important;
            cursor:not-allowed!important;
        }

        .features{
            margin-top:35px;
            display:grid;
            grid-template-columns:repeat(3,1fr);
            gap:16px;
        }

        .feature{
            background:#fff7fa;
            padding:18px;
            border-radius:18px;
            text-align:center;
        }

        .feature h4{
            margin-bottom:8px;
            color:#2b2b2b;
        }

        .feature p{
            color:#777;
            font-size:13px;
        }

        @media(max-width:950px){
            .wrapper{grid-template-columns:1fr;}
            .image-box img{height:420px;}
            h1{font-size:38px;}
            .actions{grid-template-columns:1fr;}
            .features{grid-template-columns:1fr;}
        }
    </style>
</head>
<body>

<div class="container">

    <div class="top">
        <a href="/menu" class="back">← Буцах</a>
    </div>

    <div class="wrapper">

        <div class="image-box">
            @if($product->image)
                <img src="{{ $product->image }}">
            @else
                <img src="https://images.unsplash.com/photo-1578985545062-69928b1d9587?q=80&w=1200">
            @endif
        </div>

        <div class="content">

            <div>
                <span class="badge">{{ $product->category }}</span>

                @if($product->stock <= 0)
                    <span class="badge out-badge">Out of Stock</span>
                @endif
            </div>

            <h1>{{ $product->name }}</h1>

            <div class="price">
                {{ number_format($product->price) }}₮
            </div>

            <div class="desc">
                {{ $product->description }}
            </div>

            <div class="stock">
                Үлдэгдэл:
                @if($product->stock > 0)
                    <span>{{ $product->stock }}</span>
                @else
                    <span class="out">Дууссан</span>
                @endif
            </div>

            @if($product->stock > 0)

                <div class="qty">
                    <button type="button" onclick="minusQty()">-</button>
                    <strong id="qty">1</strong>
                    <button type="button" onclick="plusQty()">+</button>
                </div>

                <div class="actions">

                    <form action="/cart/add/{{ $product->id }}" method="POST">
                        @csrf

                        <input type="hidden" name="quantity" id="cartQuantity" value="1">

                        <button class="btn cart" type="submit">
                            Сагсанд нэмэх
                        </button>
                    </form>

                    <form action="/buy-now/{{ $product->id }}" method="POST">
    @csrf

    <input type="hidden" name="quantity" id="buyQuantity" value="1">

    <button class="btn buy" type="submit">
        Шууд захиалах
    </button>
</form>

                </div>

            @else

                <div class="actions">
                    <button class="btn disabled" disabled>
                        Үлдэгдэл дууссан
                    </button>

                    <a href="/menu" class="btn buy" style="text-decoration:none;text-align:center;">
                        Цэс рүү буцах
                    </a>
                </div>

            @endif

            <div class="features">

                <div class="feature">
                    <h4>Fresh</h4>
                    <p>Өдөр бүр шинээр бэлтгэнэ</p>
                </div>

                <div class="feature">
                    <h4>Delivery</h4>
                    <p>Хурдан хүргэлт</p>
                </div>

                <div class="feature">
                    <h4>Premium</h4>
                    <p>Дээд зэрэглэлийн орц</p>
                </div>

            </div>

        </div>

    </div>

</div>

<script>
    let qty = 1;
    let maxStock = {{ $product->stock }};

    function updateQuantity(){
        document.getElementById('qty').innerText = qty;

        if(document.getElementById('cartQuantity')){
            document.getElementById('cartQuantity').value = qty;
        }

        if(document.getElementById('buyQuantity')){
            document.getElementById('buyQuantity').value = qty;
        }
    }

    function plusQty(){
        if(qty < maxStock){
            qty++;
            updateQuantity();
        }
    }

    function minusQty(){
        if(qty > 1){
            qty--;
            updateQuantity();
        }
    }
</script>

</body>
</html>