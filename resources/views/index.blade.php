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
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login:WB</title>
    <style>
        .atkinson-hyperlegible-next-text-font {
            font-family: "Atkinson Hyperlegible Next", serif;
            font-optical-sizing: auto;
            font-weight: bold;
            font-style: normal;
        }

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
            font-family: Arial, Helvetica, sans-serif;
            height: 100vh;
            width: 100vw;
        }

        .sidebar {
            width: 25%;
            background-color: #1e1e1e;
            padding: 20px;
            border-radius: 10px;
            flex-wrap: wrap;
            display: inline-table;
            height: 60%;
            transition: all 0.3s ease;
        }

        .sidebar:hover {
            transform: scale(1.05);
        }

        .login {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
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
        <div class="logo">
            <img src="logo.png" alt="logo" height="150px" />
        </div>
        <div class="title atkinson-hyperlegible-next-text-font">Login</div>
        <div class="login">
            <form action="" method="post">
                <!-- username and password -->
                <input type="text" name="username" placeholder="Username" required />
                <br>
                <input type="password" name="password" placeholder="Password" required />
            </form>
        </div>
        <div class="buttons">
            <button class="ad-btn logout">Login</button>
        </div>
        <div class="footer_outer">
        <div class="footer"><a href="/register" class="">New to Weather Book? Register Now.</a></div>
        <div class="footer"><a href="/confirmpass" class="">Forgot Password?</a></div>
    </div></div>

</body>

</html>