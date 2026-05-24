<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        *{margin:0;padding:0;box-sizing:border-box;}

        body{
            font-family:'Poppins',sans-serif;
            background:#fff6f8;
        }

        .container{
            padding:40px 8%;
        }

        .top{
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:30px;
        }

        .top h1{
            font-size:42px;
            color:#2b2b2b;
        }

        .btn{
            background:#b03052;
            color:white;
            text-decoration:none;
            padding:16px 28px;
            border-radius:14px;
            font-weight:600;
        }

        .filter{
            background:white;
            border-radius:24px;
            padding:22px;
            margin-bottom:30px;
            box-shadow:0 10px 24px rgba(0,0,0,.05);
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
            background:#fffaf7;
            outline:none;
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

        table{
            width:100%;
            background:white;
            border-radius:24px;
            overflow:hidden;
            border-collapse:collapse;
            box-shadow:0 10px 24px rgba(0,0,0,.05);
        }

        th{
            background:#b03052;
            color:white;
            padding:20px;
            text-align:left;
            white-space:nowrap;
        }

        td{
            padding:18px;
            border-bottom:1px solid #f3f3f3;
            vertical-align:middle;
        }

        tr:hover{
            background:#fff7fa;
        }

        img{
            width:70px;
            height:70px;
            object-fit:cover;
            border-radius:14px;
        }

        .badge{
            background:#fff0f5;
            color:#b03052;
            padding:8px 14px;
            border-radius:12px;
            font-size:13px;
            font-weight:600;
        }

        .stock-badge{
            padding:8px 14px;
            border-radius:12px;
            font-size:13px;
            font-weight:600;
            display:inline-block;
        }

        .stock-good{
            background:#dcfce7;
            color:#166534;
        }

        .stock-low{
            background:#fef3c7;
            color:#92400e;
        }

        .stock-out{
            background:#fee2e2;
            color:#991b1b;
        }

        .sold-badge{
            background:#ede9fe;
            color:#5b21b6;
            padding:8px 14px;
            border-radius:12px;
            font-size:13px;
            font-weight:600;
            display:inline-block;
        }

        .actions{
            display:flex;
            gap:10px;
        }

        .edit-btn{
            background:#b03052;
            color:white;
            text-decoration:none;
            padding:10px 16px;
            border-radius:12px;
            font-size:14px;
            font-weight:600;
        }

        .delete-btn{
            background:#111827;
            color:white;
            text-decoration:none;
            padding:10px 16px;
            border-radius:12px;
            font-size:14px;
            font-weight:600;
        }

        .empty{
            text-align:center;
            padding:60px;
            color:#777;
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

    <div class="top">
        <h1>Products</h1>

        <a href="/admin/products/create" class="btn">
            Add Product
        </a>
    </div>

    <div class="filter">

        <form action="/admin/products" method="GET">

            <input
                type="text"
                name="search"
                placeholder="Product нэрээр хайх..."
                value="{{ request('search') }}"
            >

            <select name="category">
                <option value="">All Categories</option>
                <option value="Cakes" {{ request('category') == 'Cakes' ? 'selected' : '' }}>Cakes</option>
                <option value="Desserts" {{ request('category') == 'Desserts' ? 'selected' : '' }}>Desserts</option>
                <option value="Coffee" {{ request('category') == 'Coffee' ? 'selected' : '' }}>Coffee</option>
                <option value="Non Coffee" {{ request('category') == 'Non Coffee' ? 'selected' : '' }}>Non Coffee</option>
                <option value="Smoothies" {{ request('category') == 'Smoothies' ? 'selected' : '' }}>Smoothies</option>
                <option value="Sandwiches" {{ request('category') == 'Sandwiches' ? 'selected' : '' }}>Sandwiches</option>
                <option value="Pizza" {{ request('category') == 'Pizza' ? 'selected' : '' }}>Pizza</option>
                <option value="Bakery" {{ request('category') == 'Bakery' ? 'selected' : '' }}>Bakery</option>
            </select>

            <select name="stock_status">
                <option value="">All Stock</option>
                <option value="available" {{ request('stock_status') == 'available' ? 'selected' : '' }}>In Stock</option>
                <option value="low" {{ request('stock_status') == 'low' ? 'selected' : '' }}>Low Stock</option>
                <option value="out" {{ request('stock_status') == 'out' ? 'selected' : '' }}>Out of Stock</option>
            </select>

            <button type="submit">
                Filter
            </button>

            <a href="/admin/products">
                Reset
            </a>

        </form>

    </div>

    <table>

        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Category</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Sold</th>
            <th>Actions</th>
        </tr>

        @forelse($products as $product)

            <tr>

                <td>
                    @if($product->image)
                        <img src="{{ $product->image }}">
                    @else
                        <img src="https://images.unsplash.com/photo-1578985545062-69928b1d9587?q=80&w=1200">
                    @endif
                </td>

                <td>
                    <strong>{{ $product->name }}</strong>
                </td>

                <td>
                    <span class="badge">
                        {{ $product->category }}
                    </span>
                </td>

                <td>
                    {{ number_format($product->price) }}₮
                </td>

                <td>
                    @if($product->stock <= 0)
                        <span class="stock-badge stock-out">
                            Out of Stock
                        </span>
                    @elseif($product->stock <= 5)
                        <span class="stock-badge stock-low">
                            Low Stock ({{ $product->stock }})
                        </span>
                    @else
                        <span class="stock-badge stock-good">
                            In Stock ({{ $product->stock }})
                        </span>
                    @endif
                </td>

                <td>
                    <span class="sold-badge">
                        {{ $product->total_sold ?? 0 }} sold
                    </span>
                </td>

                <td>
                    <div class="actions">

                        <a href="/admin/products/{{ $product->id }}/edit"
                           class="edit-btn">
                            Edit
                        </a>

                        <a href="/admin/products/{{ $product->id }}/delete"
                           onclick="return confirm('Устгах уу?')"
                           class="delete-btn">
                            Delete
                        </a>

                    </div>
                </td>

            </tr>

        @empty

            <tr>
                <td colspan="7">
                    <div class="empty">
                        <h2>No products found</h2>
                    </div>
                </td>
            </tr>

        @endforelse

    </table>

</div>
<script>

function toggleMenu(){

    document.querySelector('.sidebar')
        .classList.toggle('active');

}

</script>
</body>
</html>