<!DOCTYPE html>
<html lang="mn">
<head>
    <meta charset="UTF-8">
    <title>Create Gift Package</title>

    <style>
        body{
            font-family:Arial,sans-serif;
            background:#fff6f8;
            margin:0;
            padding:50px 8%;
        }

        .card{
            max-width:750px;
            background:white;
            padding:35px;
            border-radius:28px;
            box-shadow:0 12px 30px rgba(0,0,0,.06);
            margin:auto;
        }

        h1{
            color:#b03052;
            margin-bottom:25px;
        }

        .group{
            margin-bottom:20px;
        }

        label{
            display:block;
            margin-bottom:8px;
            font-weight:bold;
        }

        input,
        textarea{
            width:100%;
            padding:15px;
            border-radius:14px;
            border:1px solid #eee;
        }

        textarea{
            height:120px;
        }

        button{
            border:none;
            background:#b03052;
            color:white;
            padding:15px 24px;
            border-radius:14px;
            font-weight:bold;
            cursor:pointer;
        }
    </style>
</head>
<body>

<div class="card">

    <h1>Gift багц нэмэх</h1>

    <form action="/admin/gift-packages/store"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <div class="group">
            <label>Label</label>
            <input type="text" name="label" placeholder="Gift Box / 1+1 / 2+1">
        </div>

        <div class="group">
            <label>Title</label>
            <input type="text" name="title" required>
        </div>

        <div class="group">
            <label>Description</label>
            <textarea name="description"></textarea>
        </div>

        <div class="group">
            <label>Price</label>
            <input type="number" name="price" required>
        </div>

        <div class="group">
            <label>Image</label>
            <input type="file" name="image">
        </div>

        <div class="group">
            <label>
                <input type="checkbox" name="is_active" checked>
                Active
            </label>
        </div>

        <button type="submit">
            Save Gift Package
        </button>

    </form>

</div>

</body>
</html>