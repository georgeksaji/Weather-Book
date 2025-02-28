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
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
            width: 25%;
            background-color: #1e1e1e;
            padding: 20px;
            border-radius: 10px;
            display: inline-table;
            transition: all 0.3s ease;
        }
        @media screen and (max-width: 600px) {
            .sidebar {
                width: 90%;
            }
            
        }
        .sidebar:hover {
            transform: scale(1.05);
        }

        .login {
            display: inline-block;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
            height: 35%;
        }

        .ad-btn {
            background-color: #007bff;
            color: #ffffff;
            border: none;
            padding-block: 10px;
            padding-inline: 10px;
            margin: 10px;
            border-radius: 5px;
            width:17vh;
            cursor: pointer;
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
            height: 100%;
        }

        input[type="text"],
        input[type="password"],
        input[type="number"] {
            padding: 10px;
            width:27vh;
            border-radius: 10px;
            border: none;
            outline: none;
            color: rgb(152, 152, 152);
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
            display: inline-grid;
            justify-content: center;
            align-items: center;
            height: 100%;
            width: 100%;
        }

        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
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
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
        <div class="logo">
            <img src="logo.png" alt="logo" height="120px" />
        </div>
        <div class="title atkinson-hyperlegible-next-text-font">Forgot Password</div>
        <div class="login">

            <form action="/verifyusername" method="post">
                @csrf
                <div class="buttons">
                    <input type="text" name="username" value="{{ old('username') }}" placeholder="Username" required />
                    <button class="ad-btn logout">Send OTP</button>
                </div>
            </form>

            @if (session('status') )
            <form action="/verifyotp" method="post">
                @csrf
                <div class="buttons">
                    <input type="hidden" name="username" value="{{ old('username') }}" placeholder="Username" required />
                    <input type="number" name="otp" min="1000" value="{{ old('otp') }}" max="9999" placeholder="Enter OTP" required />
                    <button class="ad-btn logout">Verify</button>
                </div>
            </form>
            @endif

            @if (session('verified') )
            <form action="/changepass" method="post">
                @csrf
                <div class="buttons">
                    <input type="hidden" name="username" value="{{ old('username') }}" placeholder="Username" required />
                    <input type="password" name="password" name="password" placeholder="Password" required />
                    <button class="ad-btn logout">Reset</button>
                </div>
            </form>
            @endif

        </div>
        <div class="footer"><a href="/index" class="">←&nbspBack to Login</a></div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>