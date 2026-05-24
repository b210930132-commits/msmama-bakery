<!DOCTYPE html>
<html lang="mn">
<head>
    <meta charset="UTF-8">
    <title>Custom Cakes</title>

    <style>
        body{
            font-family:Arial,sans-serif;
            background:#fff6f8;
            margin:0;
            padding:40px 8%;
        }

        .top{
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:30px;
        }

        .btn{
            background:#b03052;
            color:white;
            padding:14px 20px;
            border-radius:12px;
            text-decoration:none;
            font-weight:bold;
        }

        table{
            width:100%;
            background:white;
            border-collapse:collapse;
            border-radius:20px;
            overflow:hidden;
            box-shadow:0 10px 25px rgba(0,0,0,.06);
        }

        th{
            background:#b03052;
            color:white;
            padding:16px;
            text-align:left;
        }

        td{
            padding:16px;
            border-bottom:1px solid #eee;
        }

        img{
            width:80px;
            height:80px;
            object-fit:cover;
            border-radius:14px;
        }

        .delete{
            background:#111827;
            color:white;
            padding:10px 14px;
            border-radius:10px;
            text-decoration:none;
            font-weight:bold;
        }
    </style>
</head>
<body>

<div class="top">
    <h1>Захиалгын тортууд</h1>

    <a href="/admin/custom-cakes/create" class="btn">
        Add Custom Cake
    </a>
</div>

<table>
    <tr>
        <th>Image</th>
        <th>Label</th>
        <th>Title</th>
        <th>Price</th>
        <th>Status</th>
        <th>Action</th>
    </tr>

    @foreach($customCakes as $cake)

        <tr>
            <td>
                @if($cake->image)
                    <img src="{{ $customCake->image }}">
                @else
                    No image
                @endif
            </td>

            <td>{{ $cake->label }}</td>

            <td>{{ $cake->title }}</td>

            <td>{{ number_format($cake->price) }}₮</td>

            <td>{{ $cake->is_active ? 'Active' : 'Hidden' }}</td>

            <td>
                <a href="/admin/custom-cakes/{{ $cake->id }}/delete"
                   onclick="return confirm('Устгах уу?')"
                   class="delete">
                    Delete
                </a>
            </td>
        </tr>

    @endforeach
</table>

</body>
</html>