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

<script>

function toggleMenu(){

    document.querySelector('.sidebar')
        .classList.toggle('active');

}

</script>
</body>
</html>