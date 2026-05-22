<!DOCTYPE html>
<html lang="mn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Ms.Mama Bakery</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            font-family:'Poppins',sans-serif;
            height:100vh;
            overflow:hidden;
            background:#fff6f8;
            display:flex;
            align-items:center;
            justify-content:center;
        }

        .wrapper{
            width:100%;
            max-width:1100px;
            background:white;
            border-radius:36px;
            overflow:hidden;
            display:grid;
            grid-template-columns:1fr 1fr;
            box-shadow:0 20px 50px rgba(0,0,0,.08);
        }

        .left{
            background:#b03052;
            color:white;
            padding:70px;
            display:flex;
            flex-direction:column;
            justify-content:center;
        }

        .left h1{
            font-size:58px;
            line-height:1.1;
            margin-bottom:24px;
        }

        .left p{
            line-height:1.9;
            color:rgba(255,255,255,.85);
        }

        .right{
            padding:70px;
            display:flex;
            flex-direction:column;
            justify-content:center;
        }

        .logo{
            font-size:34px;
            font-weight:700;
            color:#b03052;
            margin-bottom:40px;
        }

        .title{
            font-size:34px;
            margin-bottom:10px;
            color:#2b2b2b;
        }

        .sub{
            color:#777;
            margin-bottom:35px;
        }

        .group{
            margin-bottom:22px;
        }

        label{
            display:block;
            margin-bottom:8px;
            font-weight:600;
            color:#444;
        }

        input{
            width:100%;
            padding:17px;
            border-radius:16px;
            border:1px solid #eee;
            background:#fffaf7;
            font-family:'Poppins',sans-serif;
            font-size:15px;
            outline:none;
        }

        input:focus{
            border-color:#b03052;
            background:white;
        }

        .btn{
            width:100%;
            border:none;
            background:#b03052;
            color:white;
            padding:18px;
            border-radius:16px;
            font-size:16px;
            font-weight:700;
            cursor:pointer;
            margin-top:10px;
            transition:.3s;
        }

        .btn:hover{
            background:#922844;
        }

        .footer{
            margin-top:28px;
            text-align:center;
            color:#999;
            font-size:14px;
        }

        .error{
            color:red;
            font-size:14px;
            margin-top:6px;
        }

        @media(max-width:950px){

            body{
                padding:20px;
                overflow:auto;
            }

            .wrapper{
                grid-template-columns:1fr;
            }

            .left{
                display:none;
            }

            .right{
                padding:40px 30px;
            }

            .title{
                font-size:28px;
            }
        }

    </style>
</head>
<body>

<div class="wrapper">

    <div class="left">

        <h1>
            Ms.Mama Bakery
        </h1>

        <p>
            Bakery management system admin panel.
            Manage products, orders and customers easily.
        </p>

    </div>

    <div class="right">

        <div class="logo">
            Ms.Mama
        </div>

        <h2 class="title">
            Admin Login
        </h2>

        <p class="sub">
            Нэвтэрч admin dashboard руу орно уу
        </p>

        <form method="POST" action="/admin/login">

            @csrf

            <div class="group">

                <label>Email</label>

                <input type="email"
                       name="email"
                       required>

                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror

            </div>

            <div class="group">

                <label>Password</label>

                <input type="password"
                       name="password"
                       required>

                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror

            </div>

            <button class="btn" type="submit">
                Login
            </button>

        </form>

        <div class="footer">
            Ms.Mama Bakery Admin Panel
        </div>

    </div>

</div>

</body>
</html>