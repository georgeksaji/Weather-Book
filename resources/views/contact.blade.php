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

        .topbar {
            background-color: #1e1e1e;
            width: 100%;
            font-family: Arial, sans-serif;
            font-size: 10px;
            padding-inline: 10px;
            color: white;
        }

        a:link {
            color: white;
            text-decoration: none;
        }

        a:visited {
            color: white;
            text-decoration: none;
        }

        .sidebar {
            width: 50%;
            background-color: #1e1e1e;
            padding: 20px;
            border-radius: 10px;
            display: inline-grid;
            transition: all 0.3s ease;
        }

        .sidebar:hover {
            transform: scale(1.02);
        }

        .login {
            flex-wrap: wrap;
    display: flex;
    gap: 17px;
    justify-content: space-evenly;
    align-items: center;
        }

        .ad-btn {
            background-color: #007bff;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
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
            margin-block: 1%;
        }

        input[type="text"],
        input[type="password"] {
            width: 280px;
            padding: 10px;
            border-radius: 10px;
            border: none;
            outline: none;
            font-family: Arial, sans-serif;
            font-size: 14px;
        }

        .title {
            color: #ffffff;
            margin-block: 1.8%;
            font-weight: bold;
            text-align: center;
        }

        .logo {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        form {
            display: grid;
            justify-content: center;
            align-items: center;
            height: 100%;
            width: 100%;
        }

        .linkstyle {
            color: #ffffff;
            font-size: 12px;
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
            text-decoration: none;
            display: block;
            margin-top: 5px;
        }

        textarea {
            padding: 10px;
            border-radius: 10px;
            border: none;
            outline: none;
            font-family: Arial, sans-serif;
            font-size: 14px;
            color: white;
            background-color: #94959538;
        }
        .icon {
            background-color:rgb(255, 255, 255);
            background-size: cover;
            background-position: center;
            height: 6vh;
            width: 6vh;
            border-radius: 50%;
            transition: all 0.3s ease;
        }
        .icon:hover{
            transform: scale(1.1);

        }
    </style>
</head>

<body>

    <div class="sidebar">
        <div class="topbar"><a href="/home">Home->Contact</a></div>
        <div class="logo">
            <img src="logo.png" alt="logo" height="100px" />
        </div>
        <div class="title atkinson-hyperlegible-next-text-font">Contact</div>
        <div class="login">
            <div class="icon" style="background-image:url('github.png')"></div>
            <div class="icon" style="background-image:url('linkedin.png')"></div>
            <div class="icon" style="background-image:url('mail.png')"></div>
            <div class="icon" style="background-image:url('x.png')"></div>
            <div class="icon" style="background-image:url('instagram.png')"></div>
        </div>
    </div>

</body>

</html>