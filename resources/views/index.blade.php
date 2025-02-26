<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" href="icon.png" type="image/x-icon">
    <link rel="icon" href="icon.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Atkinson+Hyperlegible+Next:ital,wght@0,200..800;1,200..800&display=swap"
        rel="stylesheet">
    <meta charset="UTF-8" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login:WB</title>
    <style>
        body {
            margin: 0;
            padding-block: 1%;
            font-family: Arial, sans-serif;
            background-color: #111010f7;
            color: #ffffff;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            overflow: hidden;
            height: 100vh;
            width: 100vw;
        }

        .sidebar {
            background-color: #1e1e1e;
            padding: 20px;
            max-width: min-content;
            border-radius: 10px;
            flex-wrap: wrap;
            display: inline-table;
            transition: all 0.3s ease;
        }

        .sidebar:hover {
            transform: scale(1.05);
        }

        .login {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 20%;
        }

        .ad-btn {
            background-color: #007bff;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            margin: 10px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .ad-btn:hover {
            border: 1px solid #ffffff;
            transform: scale(1.05);
        }

        .buttons {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 20%;
        }

        input[type="text"],
        input[type="password"] {
            width: 280px;
            padding: 10px;
            border-radius: 10px;
            border: none;
            outline: none;
            margin-block-start: 20px;
            font-family: Arial, sans-serif;
            color:rgb(152, 152, 152);
            font-size: 14px;
            background-color: #94959538;
        }

        .title {
            color: #ffffff;
            font-size: 30px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }

        .logo {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
        }

        form {
            display: grid;
            justify-content: center;
            align-items: center;
            height: 100%;
            width: 100%;
        }

        a {
            color: #ffffff;
            font-size: 10px;
            text-align: center;
            text-decoration: none;
            display: block;
            margin-top: 5px;
        }
    </style>
</head>

<body>
<div class="sidebar">
@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
    <div class="sidebar">
        <div class="logo">
            <img src="logo.png" alt="logo" height="120vh" />
        </div>
        <div class="title">Login</div>
        <div class="login">
            <form action="/userlogin" method="post">
                @csrf
                <!-- username and password -->
                <input type="text" maxlength="255" value="{{ old('username') }}" name="username" placeholder="Username" required />
                <input type="password" minlength="5" value="{{ old('password') }}" name="password" placeholder="Password" required />
                <div class="buttons">
            <button class="ad-btn logout">Login</button>
        </div>
            
            </form>
        </div>

        <div class="footer_outer">
        <div class="footer"><a href="/register" class="">New to Weather Book? Register Now.</a></div>
        <div class="footer"><a href="/confirmpass" class="">Forgot Password?</a></div>
    </div></div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
