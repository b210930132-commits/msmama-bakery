<!DOCTYPE html>
<html lang="mn">
<head>
    <meta charset="UTF-8">
    <title>Menu</title>
</head>
<body style="font-family:sans-serif;padding:40px">

<h1>MENU PAGE WORKING ✅</h1>

@foreach($products as $product)

    <div style="margin-bottom:20px;padding:20px;border:1px solid #ddd">

        <h2>{{ $product->name }}</h2>

        <p>
            {{ $product->price }}₮
        </p>

    </div>

@endforeach

</body>
</html>