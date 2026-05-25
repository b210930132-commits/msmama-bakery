<!DOCTYPE html>
<html lang="mn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gift Packages | Ms.Mama Admin</title>

    <style>
    *{margin:0;padding:0;box-sizing:border-box;}

    body{
        font-family:'Poppins',Arial,sans-serif;
        background:#fff6f8;
        color:#2b2b2b;
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
        width:100%;
        margin-left:280px;
        padding:45px 20px;
    }

    .top{
        display:flex;
        justify-content:space-between;
        align-items:center;
        margin-bottom:28px;
        gap:18px;
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
        white-space:nowrap;
    }

    .card{
        background:white;
        border-radius:28px;
        padding:32px;
        box-shadow:0 12px 30px rgba(0,0,0,.06);
        max-width:760px;
    }

    .group{margin-bottom:20px;}

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

    .check input{width:auto;}

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

    .btn:hover{background:#922844;}

    .mobile-top{display:none;}

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
            height:100vh;
            z-index:999;
            transition:.3s;
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

        .card{
            max-width:100%;
            padding:22px;
        }

        .two{
            grid-template-columns:1fr;
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
        <h1>Gift багцууд</h1>

        <a href="/admin/gift-packages/create" class="btn">
            Add Gift Package
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

            @forelse($giftPackages as $gift)
                <tr>
                    <td>
                        @if($gift->image)
                            <img src="{{ $gift->image }}">
                        @else
                            No image
                        @endif
                    </td>

                    <td>{{ $gift->label }}</td>
                    <td>{{ $gift->title }}</td>
                    <td>{{ number_format($gift->price) }}₮</td>

                    <td>
                        <span class="status">
                            {{ $gift->is_active ? 'Active' : 'Hidden' }}
                        </span>
                    </td>

                    <td>
                        <a href="/admin/gift-packages/{{ $gift->id }}/delete"
                           onclick="return confirm('Устгах уу?')"
                           class="delete">
                            Delete
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align:center;padding:40px;color:#777;">
                        Gift package байхгүй байна.
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