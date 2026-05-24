<!DOCTYPE html>
<html lang="mn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Ms.Mama Bakery</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        *{margin:0;padding:0;box-sizing:border-box;}

        body{
            font-family:'Poppins',sans-serif;
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
            transition:.3s;
            font-weight:500;
        }

        .menu a:hover{
            background:rgba(255,255,255,.12);
        }

        .content{
            margin-left:280px;
            width:100%;
            padding:45px;
        }

        .top{
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:35px;
        }

        .title h1{
            font-size:42px;
            margin-bottom:10px;
        }

        .title p{
            color:#777;
        }

        .logout{
            border:none;
            background:white;
            color:#b03052;
            padding:14px 20px;
            border-radius:16px;
            font-weight:600;
            cursor:pointer;
            box-shadow:0 8px 20px rgba(0,0,0,.05);
        }

        .cards{
            display:grid;
            grid-template-columns:repeat(3,1fr);
            gap:24px;
            margin-bottom:35px;
        }

        .card{
            background:white;
            border-radius:28px;
            padding:28px;
            box-shadow:0 12px 30px rgba(0,0,0,.06);
        }

        .card h3{
            color:#777;
            font-size:15px;
            margin-bottom:16px;
        }

        .card .number{
            font-size:34px;
            font-weight:700;
            color:#b03052;
        }

        .grid-two{
            display:grid;
            grid-template-columns:1.5fr 1fr;
            gap:24px;
        }

        .recent{
            background:white;
            border-radius:28px;
            padding:30px;
            box-shadow:0 12px 30px rgba(0,0,0,.06);
            margin-bottom:35px;
        }

        .recent h2{
            margin-bottom:25px;
        }

        table{
            width:100%;
            border-collapse:collapse;
        }

        table th{
            text-align:left;
            padding-bottom:16px;
            color:#777;
            font-weight:600;
        }

        table td{
            padding:18px 0;
            border-top:1px solid #eee;
        }

        .status{
            padding:8px 14px;
            border-radius:12px;
            background:#fff0f5;
            color:#b03052;
            font-size:13px;
            font-weight:600;
            display:inline-block;
        }

        .top-product{
            display:flex;
            justify-content:space-between;
            align-items:center;
            padding:16px 0;
            border-top:1px solid #eee;
        }

        .top-product:first-of-type{
            border-top:none;
        }

        .top-product strong{
            color:#2b2b2b;
        }

        .top-product span{
            background:#fff0f5;
            color:#b03052;
            padding:8px 12px;
            border-radius:12px;
            font-weight:600;
        }

        @media(max-width:1100px){
            .cards{
                grid-template-columns:repeat(2,1fr);
            }

            .grid-two{
                grid-template-columns:1fr;
            }
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

<div class="content">

    <div class="top">

        <div class="title">
            <h1>Admin Dashboard</h1>
            <p>Bakery management analytics overview</p>
        </div>

        <form method="POST" action="/logout">
            @csrf
            <button class="logout" type="submit">Logout</button>
        </form>

    </div>

    <div class="cards">

        <div class="card">
            <h3>Total Products</h3>
            <div class="number">{{ $productCount }}</div>
        </div>

        <div class="card">
            <h3>Total Orders</h3>
            <div class="number">{{ $orderCount }}</div>
        </div>

        <div class="card">
            <h3>Total Sales</h3>
            <div class="number">{{ number_format($totalSales) }}₮</div>
        </div>

        <div class="card">
            <h3>Today Sales</h3>
            <div class="number">{{ number_format($todaySales) }}₮</div>
        </div>

        <div class="card">
            <h3>Monthly Sales</h3>
            <div class="number">{{ number_format($monthlySales) }}₮</div>
        </div>

        <div class="card">
            <h3>Pending Orders</h3>
            <div class="number">{{ $pendingOrders }}</div>
        </div>

    </div>

    <div class="grid-two">

        <div class="recent">

            <h2>Recent Orders</h2>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Customer</th>
                        <th>Total</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($recentOrders as $order)
                        <tr>
                            <td>#{{ $order->id }}</td>
                            <td>{{ $order->customer_name }}</td>
                            <td>{{ number_format($order->total_price) }}₮</td>
                            <td>
                                <div class="status">
                                    {{ $order->status }}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

        <div class="recent">

            <h2>Top Selling Products</h2>

            @forelse($topProducts as $item)

                <div class="top-product">
                    <strong>
                        {{ $item->product->name ?? 'Deleted Product' }}
                    </strong>

                    <span>
                        {{ $item->total_quantity }} sold
                    </span>
                </div>

            @empty

                <p style="color:#777;">
                    No sales data yet.
                </p>

            @endforelse

        </div>

    </div>

    <div class="recent">

        <h2>Daily Sales Chart</h2>

        <canvas id="salesChart" height="100"></canvas>

    </div>
    <div class="recent">

    <h2 style="margin-bottom:25px;">
        Top Selling Products
    </h2>

    @foreach($topProducts as $index => $product)

        <div style="
            display:flex;
            justify-content:space-between;
            align-items:center;
            padding:18px 0;
            border-bottom:1px solid #f3f3f3;
        ">

            <div>

                <div style="
                    font-weight:700;
                    margin-bottom:4px;
                ">
                    #{{ $index + 1 }}
                    {{ $product->name }}
                </div>

                <div style="
                    color:#777;
                    font-size:14px;
                ">
                    {{ $product->category }}
                </div>

            </div>

            <div style="
                background:#fff0f5;
                color:#b03052;
                padding:10px 16px;
                border-radius:12px;
                font-weight:700;
            ">

                {{ $product->total_sold ?? 0 }} sold

            </div>

        </div>

    @endforeach

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>

function toggleMenu(){

    document.querySelector('.sidebar')
        .classList.toggle('active');

}

</script>
<script>
    const ctx = document.getElementById('salesChart');

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: [
                @foreach($dailySales as $sale)
                    '{{ $sale->date }}',
                @endforeach
            ],
            datasets: [{
                label: 'Sales',
                data: [
                    @foreach($dailySales as $sale)
                        {{ $sale->total }},
                    @endforeach
                ],
                borderWidth: 3,
                tension: 0.4
            }]
        },
        options: {
            responsive: true
        }
    });
</script>

</body>
</html>