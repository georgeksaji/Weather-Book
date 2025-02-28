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
        .atkinson-hyperlegible-next-text-font {
            font-family: "Atkinson Hyperlegible Next", serif;
            font-optical-sizing: auto;
            font-weight: bold;
            font-style: normal;
        }

        body {
            margin: 0;
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
            font-size: 12px;
            padding-inline: 10px;
            color: white;
        }
        .topmsg
        {
            width: 100%;
            font-size: 10px;
            color: white;    
        }
        a:link,
        a:visited {
            color: white;
            text-decoration: none;
        }

        .sidebar {
            width: 40%;
            background-color: #1e1e1e;
            padding: 20px;
            border-radius: 10px;
            transition: all 0.3s ease;
        }
        @media screen and (max-width: 600px) {
            .sidebar {
                width: 70%;
            }
            
        }

        .sidebar:hover {
            transform: scale(1.02);
        }

        .login {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 60%;
            padding-block: 1%;
        }

        .logo {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .title {
            color: #ffffff;
            font-size: 30px;
            font-weight: bold;
            text-align: center;
        }

        form {
            overflow-y: scroll;
            gap: 10px;
            justify-content: center;
            overflow-x: hidden;
            scrollbar-width: none;
            height: 100%;
            display: flow;
            width: 50%;
        }

        .favcity {
            background-color: #3a3c3d78;
            color: #ffffffe8;
            border: none;
            padding: 6px;
            margin: 3px;
            width: 90%;
            font-weight: bold;
            text-align: left;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .favcity:hover {
            background-color: rgb(246, 53, 50);
            transform: scale(1.02);
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
        <div class="topbar"><a href="/home">Home → Remove Cities</a></div>
        <div class="logo">
            <img src="logo.png" alt="logo" height="100px" />
        </div>
        <div class="title atkinson-hyperlegible-next-text-font">Remove Cities</div>
        <div class="topmsg" style="text-align:center"><p>Click on the city you want to remove.</p>
        </div>
        <div class="login">
            <form action="/removecity" method="post">
                @csrf
                <input type="hidden" name="city_name" id="selectedCity">
                @if(session()->has('cities') && count(session('cities')) > 0)
        @foreach(session('cities') as $city)
        <button type="submit" class="favcity" onclick="setCityValue(event, '{{ $city->city_name }}')">
            {{ $city->city_name }} , {{ $city->country_name }}
        </button>
        @endforeach
      @else
      <p><center>No cities added to favorites.</center></p>
      @endif
            </form>
        </div>
    </div>
</body>
<script>
    function setCityValue(event, cityName) {
    event.preventDefault(); // Prevent default form submission
    document.getElementById('selectedCity').value = cityName; // Set hidden input value
    event.target.form.submit(); // Submit the form manually
}
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</html>