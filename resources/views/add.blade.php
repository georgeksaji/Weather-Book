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
            flex-wrap: wrap;
            font-family: Arial, Helvetica, sans-serif;
            height: 100vh;
            width: 100vw;
        }

        .topbar {
            background-color: #1e1e1e;
            width: 100%;
            font-family: Arial, sans-serif;
            font-size: 13px;
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
            display: flow;
            width: 70%;
            background-color: #1e1e1e;
            padding: 20px;
            border-radius: 10px;
            height: 64%;
            flex-wrap: wrap;
            transition: all 0.3s ease;

        }

        .sidebar:hover {
            transform: scale(1.02);
        }

        .login {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 50%;
            width: 100%;
            padding-block: 1%;
        }

        .ad-btn {
            background-color: #007bff;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: bold;
            max-height: fit-content;
            transition: all 0.3s ease;
            margin-inline: 1%;
            display: block;
            align-items: center;
        }

        .ad-btn:hover {
            border: 1px solid #ffffff;
            transform: scale(1.05);
        }

        .buttons {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 38vh;
            margin-block: 0.5%;
        }

        .buttons-inner {
            display: flex;
            justify-content: space-between;
            width: 99%;
        }

        input[type="text"],
        input[type="password"] {
            padding: 10px;
            border-radius: 10px;
            border: none;
            outline: none;
            font-family: Arial, sans-serif;
            font-size: 14px;
        }

        .title {
            color: #ffffff;
            font-size: 30px;
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

        input {
            border: none;
            outline: none;
            font-family: Arial, sans-serif;
            font-size: 14px;
            color: white;
            background-color: #94959538;
        }
    </style>
</head>

<body>

    <div class="sidebar">
        <div class="topbar"><a href="/home">Home->Add City</a></div>
        <div class="logo">
            <img src="logo.png" alt="logo" height="100px" />
        </div>
        <div class="title atkinson-hyperlegible-next-text-font">Add City
            <div class="topbar" style="text-align:center">
                <p><img src="current-location.png" height="15px"
                        alt="">&nbsp{{ $city}},&nbsp{{ $region }},&nbsp{{ $country }}</p>
            </div>
        </div>
        <div class="login">
            <form action="" method="post">
                <input type="text" id="city" name="city" placeholder="City" required />
                <input type="text" id="country" name="country" placeholder="Country" required />
                <div class="buttons">
                    <div class="buttons-inner">
                        <button class="ad-btn logout" id="getcurloc"><img src="current-location.png" height="15px"
                                alt="Curr" />&nbspCurrent Location</button>
                        <button class="ad-btn logout"><img src="save.png" height="15px" alt="Save" />&nbspSave</button>
                    </div>
            </form>
        </div>
    </div>
    </div>
    <script>
        document.getElementById("getcurloc").addEventListener("click", function (event) {
            event.preventDefault(); // Prevent form submission

            // Just set the existing PHP variables to the input fields
            document.getElementById("city").value = "{{ $city }}";
            document.getElementById("country").value = "{{ $country }}";
        });
    </script>

</body>

</html>