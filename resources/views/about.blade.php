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
        body {
            margin: 0;
            padding-block: 1%;
            background-color: #111010f7;
            color: #ffffff;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            cursor: pointer;
            font-family: Arial, Helvetica, sans-serif;
            height: 100vh;
            width: 100vw;
        }

        .topbar {
            background-color: #1e1e1e;
            width: 100%;
            font-size: 10px;
            padding-inline: 10px;
            color: white;
        }

        a:link,
        a:visited {
            color: white;
            text-decoration: none;
        }

        .sidebar {
            width: 55%;
            background-color: #1e1e1e;
            padding: 20px;
            border-radius: 10px;
            display: inline-grid;
            transition: all 0.3s ease;
        }

        @media screen and (max-width: 600px) {
            .sidebar {
                width: 80%;
            }

        }

        .sidebar:hover {
            transform: scale(1.02);
        }

        .login {
            display: block;
            padding-inline: 2%;
            font-size: 100%;
            text-align: justify;
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

        input[type="text"],
        input[type="password"],
        textarea {
            width: 280px;
            padding: 10px;
            border-radius: 10px;
            border: none;
            outline: none;
            font-size: 14px;
            color: white;
            background-color: #94959538;
        }

        .title {
            margin-block: 1.8%;
            font-weight: bold;
            font-size: 20px;
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
            font-size: 12px;
            text-align: center;
            text-decoration: none;
            display: block;
            margin-top: 5px;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <div class="topbar"><a href="/home">Home->About</a></div>
        <div class="logo">
            <img src="logo.png" alt="logo" height="100px" />
        </div>
        <div class="title">About</div>
        <div class="login">
            Weather Book is a simple and efficient web application designed to provide real-time weather
            updates for any location. Built using Laravel and powered by OpenWeather API,
            this web-app delivers accurate forecasts with a clean and user-friendly interface.
            The goal of Weather Book is to offer a seamless experience where users can quickly check
            current weather conditions, temperature, and more without unnecessary complexity. This
            project was developed by <a href="/contact">me <img src="link.png" alt="" height="14px"> </a> while learning
            Laravel during my MCA program
            at Rajagiri College of Social Sciences, Kalamasserry. It was created with a focus on efficiency,
            and ease of access, ensuring that weather information is presented clearly and concisely.
            By integrating API-driven data with a responsive design, Weather Book aims to make weather
            tracking straightforward for everyone.
        </div>
    </div>
</body>

</html>