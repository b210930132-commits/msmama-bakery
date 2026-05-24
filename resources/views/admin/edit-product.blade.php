<!DOCTYPE html>
<html lang="mn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            background:#fff6f8;
            font-family:'Poppins',sans-serif;
        }

        .container{
            max-width:850px;
            margin:auto;
            padding:60px 20px;
        }

        .card{
            background:white;
            padding:40px;
            border-radius:30px;
            box-shadow:0 12px 30px rgba(0,0,0,.06);
        }

        h1{
            margin-bottom:30px;
            color:#b03052;
        }

        .group{
            margin-bottom:22px;
        }

        label{
            display:block;
            margin-bottom:10px;
            font-weight:600;
        }

        input,
        textarea,
        select{
            width:100%;
            padding:16px;
            border-radius:16px;
            border:1px solid #eee;
            font-family:'Poppins',sans-serif;
            outline:none;
        }

        textarea{
            height:130px;
            resize:none;
        }

        img{
            width:180px;
            border-radius:18px;
            margin-top:15px;
        }

        button{
            border:none;
            background:#b03052;
            color:white;
            padding:16px 28px;
            border-radius:16px;
            font-weight:700;
            cursor:pointer;
        }

@media(max-width:850px){

    body{
        flex-direction:column;
    }

    .sidebar{
        width:100%;
        position:fixed;
        top:0;
        left:-100%;
        height:100vh;
        z-index:999;
        transition:.3s;
        padding-top:90px;
    }

    .sidebar.active{
        left:0;
    }

    .mobile-top{
        position:fixed;
        top:0;
        left:0;
        width:100%;
        height:70px;
        background:white;
        display:flex;
        align-items:center;
        justify-content:space-between;
        padding:0 20px;
        z-index:1000;
        box-shadow:0 4px 20px rgba(0,0,0,.08);
    }

    .menu-btn{
        font-size:30px;
        color:#b03052;
        cursor:pointer;
        font-weight:700;
    }

    .content{
        margin-left:0;
        padding:95px 18px 20px;
    }

    .top{
        flex-direction:column;
        align-items:flex-start;
        gap:20px;
    }

    .title h1{
        font-size:28px;
    }

    .cards{
        grid-template-columns:1fr;
    }

    .grid-two{
        grid-template-columns:1fr;
    }

    .recent{
        padding:20px;
        overflow-x:auto;
    }

    table{
        min-width:650px;
    }
}
    </style>

</head>
<body>

<div class="mobile-top">

    <div style="
        font-size:24px;
        font-weight:700;
        color:#b03052;
    ">
        Ms.Mama
    </div>

    <div class="menu-btn" onclick="toggleMenu()">
        ☰
    </div>

</div>
<div class="container">

    <div class="card">

        <h1>
            Product засах
        </h1>

        <form action="/admin/products/{{ $product->id }}/update"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <div class="group">

                <label>Нэр</label>

                <input type="text"
                       name="name"
                       value="{{ $product->name }}">

            </div>

            <div class="group">

                <label>Тайлбар</label>

                <textarea name="description">{{ $product->description }}</textarea>

            </div>

            <div class="group">

                <label>Үнэ</label>

                <input type="number"
                       name="price"
                       value="{{ $product->price }}">

            </div>

            <div class="group">

                <label>Category</label>

                <select name="category">

                    <option value="Cakes" {{ $product->category == 'Cakes' ? 'selected' : '' }}>
                        Cakes
                    </option>

                    <option value="Desserts" {{ $product->category == 'Desserts' ? 'selected' : '' }}>
                        Desserts
                    </option>

                    <option value="Coffee" {{ $product->category == 'Coffee' ? 'selected' : '' }}>
                        Coffee
                    </option>

                    <option value="Pizza" {{ $product->category == 'Pizza' ? 'selected' : '' }}>
                        Pizza
                    </option>

                    <option value="Bakery" {{ $product->category == 'Bakery' ? 'selected' : '' }}>
                        Bakery
                    </option>

                </select>

            </div>

            <div class="group">

                <label>Stock</label>

                <input type="number"
                       name="stock"
                       value="{{ $product->stock }}">

            </div>

            <div class="group">

                <label>Image</label>

                <input type="file" name="image">

                @if($product->image)

                    <img src="{{ asset('storage/'.$product->image) }}">

                @endif

            </div>

            <button type="submit">
                Update Product
            </button>

        </form>

    </div>

</div>
<script>

function toggleMenu(){

    document.querySelector('.sidebar')
        .classList.toggle('active');

}

</script>
</body>
</html>