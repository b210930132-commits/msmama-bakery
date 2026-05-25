<!DOCTYPE html>
<html lang="mn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Completed Orders</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        *{margin:0;padding:0;box-sizing:border-box;}

        body{
            font-family:'Poppins',sans-serif;
            background:#fff6f8;
        }

        .container{
    width:100%;
    margin-left:280px;
    padding:50px 8%;
}

        h1{
            font-size:46px;
            margin-bottom:30px;
            color:#2b2b2b;
        }

        .filter{
            background:white;
            border-radius:28px;
            padding:24px;
            margin-bottom:30px;
            box-shadow:0 12px 30px rgba(0,0,0,.06);
        }

        .filter form{
            display:grid;
            grid-template-columns:1.5fr 1fr 1fr auto auto;
            gap:14px;
            align-items:center;
        }

        .filter input,
        .filter select{
            width:100%;
            padding:14px 16px;
            border-radius:14px;
            border:1px solid #eee;
            font-family:'Poppins',sans-serif;
            outline:none;
            background:#fffaf7;
        }

        .filter button,
        .filter a{
            border:none;
            background:#b03052;
            color:white;
            padding:14px 18px;
            border-radius:14px;
            font-weight:600;
            cursor:pointer;
            text-decoration:none;
            text-align:center;
            white-space:nowrap;
        }

        .filter a{
            background:#111827;
        }

        .order{
            background:white;
            border-radius:28px;
            padding:32px;
            margin-bottom:28px;
            box-shadow:0 12px 30px rgba(0,0,0,.06);
        }

        .top{
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:25px;
            gap:15px;
        }

        .badges{
            display:flex;
            gap:10px;
            flex-wrap:wrap;
        }

        .status{
            background:#fff0f5;
            color:#b03052;
            padding:10px 16px;
            border-radius:12px;
            font-weight:600;
        }

        .grid{
            display:grid;
            grid-template-columns:1fr 1fr;
            gap:25px;
        }

        .line{
            margin-bottom:14px;
            color:#555;
            line-height:1.7;
        }

        .price{
            font-size:30px;
            color:#b03052;
            font-weight:700;
            margin-top:25px;
        }

        .items{
            margin-top:25px;
            padding-top:20px;
            border-top:1px solid #eee;
        }

        .item{
            margin-bottom:12px;
            color:#444;
        }

        .update-form select{
            padding:12px 14px;
            border-radius:12px;
            border:1px solid #eee;
            font-family:'Poppins',sans-serif;
        }

        .update-form button{
            border:none;
            background:#b03052;
            color:white;
            padding:12px 18px;
            border-radius:12px;
            font-weight:600;
            cursor:pointer;
            margin-left:10px;
        }

        .empty{
            background:white;
            border-radius:28px;
            padding:50px;
            text-align:center;
            color:#777;
            box-shadow:0 12px 30px rgba(0,0,0,.06);
        }

        @media(max-width:850px){

    body{
        flex-direction:column;
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
<div class="sidebar">

    <div class="logo">
        Ms.Mama
    </div>

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
</div>
<div class="container">

    <h1>Дууссан захиалгууд</h1>

    <div class="filter">

        <form action="/admin/completed-orders" method="GET">

            <input
                type="text"
                name="search"
                placeholder="Нэр эсвэл утсаар хайх..."
                value="{{ request('search') }}"
            >

            <select name="status">
                <option value="">Бүх төлөв</option>
                <option value="Delivered" {{ request('status') == 'Delivered' ? 'selected' : '' }}>Delivered</option>
                <option value="Cancelled" {{ request('status') == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
            </select>

            <input
                type="date"
                name="pickup_date"
                value="{{ request('pickup_date') }}"
            >

            <button type="submit">
                Filter
            </button>

            <a href="/admin/completed-orders">
                Reset
            </a>

        </form>

    </div>

    @forelse($orders as $order)

        @php
            $today = date('Y-m-d');
            $tomorrow = date('Y-m-d', strtotime('+1 day'));

            if ($order->pickup_date == $today) {
                $timeBadge = 'Today';
                $timeColor = '#b91c1c';
                $timeBg = '#fee2e2';
            } elseif ($order->pickup_date == $tomorrow) {
                $timeBadge = 'Tomorrow';
                $timeColor = '#92400e';
                $timeBg = '#fef3c7';
            } elseif ($order->pickup_date < $today) {
                $timeBadge = 'Past';
                $timeColor = '#374151';
                $timeBg = '#e5e7eb';
            } else {
                $timeBadge = 'Upcoming';
                $timeColor = '#166534';
                $timeBg = '#dcfce7';
            }
        @endphp

        <div class="order">

            <div class="top">

                <h2>Захиалга #{{ $order->id }}</h2>

                <div class="badges">
                    <div class="status">
                        {{ $order->status }}
                    </div>

                    <div class="status" style="background:{{ $timeBg }};color:{{ $timeColor }};">
                        {{ $timeBadge }}
                    </div>
                </div>

            </div>

            <div class="grid">

                <div>
                    <div class="line">Нэр: {{ $order->customer_name }}</div>
                    <div class="line">Утас: {{ $order->phone }}</div>
                    <div class="line">Хаяг: {{ $order->address }}</div>
                </div>

                <div>
                    <div class="line">Авах өдөр: {{ $order->pickup_date }}</div>
                    <div class="line">Авах цаг: {{ $order->pickup_time }}</div>
                    <div class="line">Тэмдэглэл: {{ $order->note }}</div>
                </div>

            </div>

            <div class="items">

                <h3 style="margin-bottom:15px;">
                    Захиалсан бүтээгдэхүүнүүд
                </h3>

                @foreach($order->items as $item)

                    <div class="item">
                        {{ $item->product->name ?? 'Deleted Product' }}
                        ×
                        {{ $item->quantity }}
                    </div>

                @endforeach

            </div>

            <div class="price">
                {{ number_format($order->total_price) }}₮
            </div>

            <form class="update-form"
                  action="/admin/orders/{{ $order->id }}/status"
                  method="POST"
                  style="margin-top:25px;">

                @csrf

                <select name="status">
                    <option value="Pending" {{ $order->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="Preparing" {{ $order->status == 'Preparing' ? 'selected' : '' }}>Preparing</option>
                    <option value="Ready" {{ $order->status == 'Ready' ? 'selected' : '' }}>Ready</option>
                    <option value="Delivered" {{ $order->status == 'Delivered' ? 'selected' : '' }}>Delivered</option>
                    <option value="Cancelled" {{ $order->status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                </select>

                <button type="submit">
                    Update Status
                </button>

            </form>

        </div>

    @empty

        <div class="empty">
            <h2>Дууссан захиалга олдсонгүй</h2>
            <p>Хайлтын нөхцөлөө өөрчлөөд дахин үзээрэй.</p>
        </div>

    @endforelse

</div>
<script>

function toggleMenu(){

    document.querySelector('.sidebar')
        .classList.toggle('active');

}

</script>
</body>
</html>