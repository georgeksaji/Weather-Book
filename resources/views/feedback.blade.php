<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" href="icon.png" type="image/x-icon">
    <link rel="icon" href="icon.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Atkinson+Hyperlegible+Next:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
    <meta charset="UTF-8" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
            background-color: #111010f7;
            color: #ffffff;
            display: flex;
            justify-content: center;
            align-items: center;
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
        a:link, a:visited {
            color: white;
            text-decoration: none;
        }
        .sidebar {
            max-width: 50%;
            background-color: #1e1e1e;
            padding: 20px;
            border-radius: 10px;
            display: inline-grid;
            transition: all 0.3s ease;
        }
        @media screen and (max-width: 600px) {
            .sidebar {
                max-width: 80%;
            }
            
        }
        .sidebar:hover {
            transform: scale(1.02);
        }
        .login {
            display: flex;
            justify-content: center;
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
        textarea {
            padding: 10px;
            border-radius: 10px;
            border: none;
            outline: none;
            font-size: 14px;
            color: white;
            background-color: #94959538;
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

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="topbar"><a href="/home">Home->Feedback</a></div>
        <div class="logo">
            <img src="logo.png" alt="logo" height="100px" />
        </div>
        <div class="title atkinson-hyperlegible-next-text-font">Feedback
            <a class="linkstyle" href="register.html">Kindly let us know what you think about Weather Book!</a>
        </div>
        <div class="login">
            <form action="/sendfeedbackmail" method="post">
                @csrf
                <textarea name="feedback" id="feedback" cols="50" rows="10" placeholder="Enter your feedback here..."></textarea>
        </div>
        <div class="buttons">
            <button class="ad-btn logout"><img src="send.png" height="15px" alt="Fav" />&nbspSend</button>
        </div>
        </form>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>