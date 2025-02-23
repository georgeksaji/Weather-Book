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
            min-width: 300px;
            width: 25%;
            background-color: #1e1e1e;
            padding: 15px;
            border-radius: 10px;
            height: 70%;
            transition: all 0.3s ease;
            display: inline-table;


        }

        .sidebar:hover {
            transform: scale(1.05);
        }

        .login {
            display: flex;
            justify-content: center;
            height: 45%;
            width: 100%;
        }



        .ad-btn {
            background-color: #007bff;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
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
            margin-block: 1vh;
        }

        input {
            margin-block-start: 2vh;
        }

        input[type="text"],
        input[type="password"] {
            width: 83%;
            padding: 10px;
            border-radius: 10px;
            border: none;
            outline: none;
            font-family: Arial, sans-serif;
            font-size: 14px;
        }

        input[type="date"]::-webkit-datetime-edit {
            color: rgb(81, 81, 83);
        }

        #dob {
            width: 30%;
            padding: 10px;
            border-radius: 10px;
            border: none;
            outline: none;
            font-family: Arial, sans-serif;
            margin-inline-end: 5px;
            font-size: 14px;
        }

        #ph {
            width: 45%;
            padding: 10px;
            border-radius: 10px;
            border: none;
            outline: none;
            font-family: Arial, sans-serif;
            margin-inline-start: 5px;
            font-size: 14px;
        }

        .section {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            flex-wrap: nowrap;
        }


        .title {
            color: #ffffff;
            font-size: 30px;
            font-weight: bold;
            text-align: center;
            width: 100%;
        }

        .logo {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        form {
            display: flow;
            justify-content: center;
            align-items: center;
            text-align: center;
            height: 100%;
            width: 100%;
        }

        a {
            color: #ffffff;
            font-size: 10px;
            text-align: center;
            text-decoration: none;
            display: block;
            margin-top: 5px
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <div class="logo">
            <img src="logo.png" alt="logo" height="150px" />
        </div>
        <div class="title atkinson-hyperlegible-next-text-font">Register</div>
        <div class="login">
            <form action="" method="post">
                <input type="text" name="username" placeholder="Username" required />
                <div class="section">
                    <input id="dob" type="date" name="dob" placeholder="Date of Birth" required />
                    <input id="ph" type="number" name="phone" placeholder="Phone" required />
                </div>
                <input type="text" name="location" placeholder="Location" required />
                <input type="password" name="password" placeholder="Password" required />
            </form>
        </div>
        <div class="buttons">
            <button class="ad-btn logout">Register</button>
        </div>
        <a href="/index" class="">Already using Weather Book? Login</a>

    </div>

</body>

</html>