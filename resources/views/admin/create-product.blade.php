<!DOCTYPE html>
<html lang="mn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Бүтээгдэхүүн нэмэх</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        *{margin:0;padding:0;box-sizing:border-box;}

        body{
            font-family:'Poppins',Arial,sans-serif;
            background:#fff6f8;
            color:#2b2b2b;
        }

        .container{
            max-width:760px;
            margin:auto;
            padding:45px 20px;
        }

        .top{
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:28px;
        }

        h1{
            font-size:36px;
            color:#2b2b2b;
        }

        .back{
            text-decoration:none;
            color:#b03052;
            background:white;
            padding:13px 18px;
            border-radius:14px;
            font-weight:600;
            box-shadow:0 8px 20px rgba(0,0,0,.05);
        }

        .card{
            background:white;
            border-radius:28px;
            padding:32px;
            box-shadow:0 12px 30px rgba(0,0,0,.06);
        }

        .group{
            margin-bottom:20px;
        }

        label{
            display:block;
            margin-bottom:8px;
            font-weight:600;
            color:#333;
        }

        input, textarea, select{
            width:100%;
            padding:15px 16px;
            border:1px solid #f0d7df;
            border-radius:14px;
            font-size:15px;
            font-family:'Poppins',Arial,sans-serif;
            outline:none;
            background:#fffaf7;
        }

        textarea{
            min-height:120px;
            resize:none;
        }

        input:focus, textarea:focus, select:focus{
            border-color:#b03052;
            background:white;
        }

        .two{
            display:grid;
            grid-template-columns:1fr 1fr;
            gap:18px;
        }

        .check{
            display:flex;
            align-items:center;
            gap:10px;
            margin:8px 0 20px;
            font-weight:500;
        }

        .check input{
            width:auto;
        }

        .btn{
            width:100%;
            border:none;
            background:#b03052;
            color:white;
            padding:16px;
            border-radius:14px;
            font-size:16px;
            font-weight:700;
            cursor:pointer;
        }

        .btn:hover{
            background:#922844;
        }

        @media(max-width:700px){
            .two{grid-template-columns:1fr;}
            h1{font-size:28px;}
            .top{align-items:flex-start;gap:15px;flex-direction:column;}
        }
    </style>
</head>
<body>

<div class="container">

    <div class="top">
        <h1>Бүтээгдэхүүн нэмэх</h1>
        <a href="/admin/products" class="back">Буцах</a>
    </div>

    <div class="card">

        <form action="/admin/products/store" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="group">
                <label>Бүтээгдэхүүний нэр</label>
                <input type="text" name="name" placeholder="Жишээ: Chocolate Cake" required>
            </div>

            <div class="group">
                <label>Тайлбар</label>
                <textarea name="description" placeholder="Бүтээгдэхүүний дэлгэрэнгүй тайлбар"></textarea>
            </div>

            <div class="two">
                <div class="group">
                    <label>Үнэ</label>
                    <input type="number" name="price" placeholder="12000" required>
                </div>

                <div class="group">
                    <label>Үлдэгдэл</label>
                    <input type="number" name="stock" placeholder="10" required>
                </div>
            </div>

            <div class="group">
                <label>Ангилал</label>
                <select name="category" required>
                    <option value="">Ангилал сонгох</option>
                    <option value="Cakes">Cakes</option>
                    <option value="Desserts">Desserts</option>
                    <option value="Coffee">Coffee</option>
                    <option value="Non Coffee">Non Coffee</option>
                    <option value="Smoothies">Smoothies</option>
                    <option value="Sandwiches">Sandwiches</option>
                    <option value="Pizza">Pizza</option>
                    <option value="Bakery">Bakery</option>
                </select>
            </div>

            <div class="group">
                <label>Зураг</label>
                <input type="file" name="image">
            </div>

            <label class="check">
                <input type="checkbox" name="featured" value="1">
                Онцлох бүтээгдэхүүн болгох
            </label>

            <button class="btn" type="submit">
                Хадгалах
            </button>

        </form>

    </div>

</div>

</body>
</html>