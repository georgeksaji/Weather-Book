<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" href="icon.png" type="image/x-icon">
    <link rel="icon" href="icon.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Atkinson+Hyperlegible+Next:wght@400;700&display=swap" rel="stylesheet">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact</title>
    <style>
        body {
            margin: 0;
            font-family: "Atkinson Hyperlegible Next", Arial, sans-serif;
            background-color: #111010;
            color: #ffffff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            width: 100vw;
        }

        .sidebar {
            width: 50%;
            background-color: #1e1e1e;
            padding: 20px;
            border-radius: 10px;
            display: grid;
            transition: 0.3s ease;
        }

        .sidebar:hover {
            transform: scale(1.02);
        }

        .topbar {
            background-color: #1e1e1e;
            font-size: 10px;
            padding: 10px;
            width:fit-content;
            color: white;
        }

        a {
            color: white;
            text-decoration: none;
        }

        .logo {
            display: flex;
            justify-content: center;
            padding: 1vh;
        }

        .title {
            text-align: center;
            font-weight: bold;
        }

        .login {
            display: flex;
            gap: 17px;
            justify-content: center;
            padding-block: 6%;
        }
        @media screen and (max-width: 600px) {
            .login {
                display: grid;
            }
            
        }

        .icon {
            background-color: white;
            background-size: cover;
            background-position: center;
            height: 6vh;
            width: 6vh;
            border-radius: 50%;
            transition: 0.3s ease;
        }

        .icon:hover {
            transform: scale(1.1);
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <div class="topbar"><a href="/home">Home → Contact</a></div>
        <div class="logo">
            <img src="logo.png" alt="logo" height="100vh" />
        </div>
        <div class="title">Contact</div>
        <div class="login">
            <a href="https://github.com/georgeksaji"><div class="icon" style="background-image:url('github.png')"></div></a>
            <a href="https://www.linkedin.com/in/georgeksaji/"><div class="icon" style="background-image:url('linkedin.png')"></div></a>
            <a href="/feedback"><div class="icon" style="background-image:url('mail.png')"></div></a>
            <a href="https://x.com/georgeksaji"><div class="icon" style="background-image:url('x.png')"></div></a>
            <a href="https://www.instagram.com/georgeksaji/?hl=en"><div class="icon" style="background-image:url('instagram.png')"></div></a>
        </div>
    </div>
</body>
</html>
