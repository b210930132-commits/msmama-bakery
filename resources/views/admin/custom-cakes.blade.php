<!DOCTYPE html>
<html lang="mn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Custom Cakes | Ms.Mama Admin</title>

    <style>
        *{margin:0;padding:0;box-sizing:border-box;}

        body{
            font-family:Arial,sans-serif;
            background:#fff6f8;
            display:flex;
        }

        .sidebar{
            width:280px;
            min-height:100vh;
            background:#b03052;
            color:white;
            padding:40px 30px;
            position:fixed;
            left:0;
            top:0;
        }

        .logo{
            font-size:34px;
            font-weight:700;
            margin-bottom:50px;
        }

        .menu{
            display:flex;
            flex-direction:column;
            gap:16px;
        }

        .menu a{
            text-decoration:none;
            color:white;
            padding:16px 18px;
            border-radius:16px;
            font-weight:500;
        }

        .menu a:hover{
            background:rgba(255,255,255,.12);
        }

        .container{
            margin-left:280px;
            width:100%;
            padding:40px 8%;
        }

        .top{
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:30px;
            gap:20px;
        }

        h1{
            color:#2b2b2b;
        }

        .btn{
            background:#b03052;
            color:white;
            padding:14px 20px;
            border-radius:12px;
            text-decoration:none;
            font-weight:bold;
            white-space:nowrap;
        }

        .table-wrap{
            width:100%;
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
            white-space:nowrap;
        }

        td{
            padding:16px;
            border-bottom:1px solid #eee;
            vertical-align:middle;
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
            display:inline-block;
        }

        .status{
            background:#fff0f5;
            color:#b03052;
            padding:8px 12px;
            border-radius:10px;
            font-weight:bold;
            display:inline-block;
        }

        .mobile-top{
            display:none;
        }

        @media(max-width:850px){
            body{
                flex-direction:column;
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

            .sidebar{
                width:100%;
                left:-100%;
                transition:.3s;
                z-index:999;
                padding-top:90px;
            }

            .sidebar.active{
                left:0;
            }

            .container{
                margin-left:0;
                padding:95px 18px 20px;
            }

            .top{
                flex-direction:column;
                align-items:flex-start;
            }

            h1{
                font-size:28px;
            }

            .table-wrap{
                overflow-x:auto;
            }

            table{
                min-width:700px;
            }
        }
    </style>
</head>
<body>

<div class="mobile-top">
    <div style="font-size:24px;font-weight:700;color:#b03052;">
        Ms.Mama
    </div>

    <div class="menu-btn" onclick="toggleMenu()">
        ☰
    </div>
</div>

<div class="sidebar">
    <div class="logo">Ms.Mama</div>

    <div class="menu">
        <a href="/admin/dashboard">Dashboard</a>
        <a href="/admin/products">Products</a>
        <a href="/admin/orders">Orders</a>
        <a href="/admin/completed-orders">Completed Orders</a>
        <a href="/admin/products/create">Add Product</a>
        <a href="/admin/gift-packages">Gift Packages</a>
        <a href="/admin/custom-cakes">Custom Cakes</a>
    </div>
</div>

<div class="container">

    <div class="top">
        <h1>Захиалгын тортууд</h1>

        <a href="/admin/custom-cakes/create" class="btn">
            Add Custom Cake
        </a>
    </div>

    <div class="table-wrap">
        <table>
            <tr>
                <th>Image</th>
                <th>Label</th>
                <th>Title</th>
                <th>Price</th>
                <th>Status</th>
                <th>Action</th>
            </tr>

            @forelse($customCakes as $cake)
                <tr>
                    <td>
                        @if($cake->image)
                            <img src="{{ $cake->image }}">
                        @else
                            No image
                        @endif
                    </td>

                    <td>{{ $cake->label }}</td>
                    <td>{{ $cake->title }}</td>
                    <td>{{ number_format($cake->price) }}₮</td>

                    <td>
                        <span class="status">
                            {{ $cake->is_active ? 'Active' : 'Hidden' }}
                        </span>
                    </td>

                    <td>
                        <a href="/admin/custom-cakes/{{ $cake->id }}/delete"
                           onclick="return confirm('Устгах уу?')"
                           class="delete">
                            Delete
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align:center;padding:40px;color:#777;">
                        Захиалгын торт байхгүй байна.
                    </td>
                </tr>
            @endforelse
        </table>
    </div>

</div>

<script>
function toggleMenu(){
    document.querySelector('.sidebar').classList.toggle('active');
}
</script>

</body>
</html>