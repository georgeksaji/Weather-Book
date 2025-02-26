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
  <title>Weather Book</title>
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
      scrollbar-width: none;
      font-family: Arial, Helvetica, sans-serif;
    }

    .container {
      display: flex;
      width: 95%;
      justify-content: center;
      align-items: center;
    }

    .sidebar {
      width: 25%;
      background-color: #1e1e1e;
      padding: 20px;
      border-radius: 10px;
      height: 90vh;
    }

    .location {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 10vh;
    }

    .weather-content {
      flex: 1;
      padding: 20px;
    }

    .current-weather {
      text-align: center;
    }

    .weather-icon img {
      width: 100%;
      height: auto;
    }

    .weekly-forecast {
      justify-content: flex-start;
      padding: 10px 0;
      gap: 5px;
      overflow-x: auto;
      display: flex;
      flex-wrap: wrap;
    }

    .day {
      background: #333;
      padding: 10px;
      border-radius: 5px;
      margin: 5px;
      max-width: 16.5%;
      overflow-wrap: break-word;
      word-wrap: break-word;
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
      min-width: 50%;
      transition: all 0.3s ease;
    }

    .ad-btn:hover {
      border: 1px solid #ffffff;
      transform: scale(1.05);
    }

    .buttons {
      max-height: 5vh;
      max-width: 100%;
      display: flex;
      align-items: normal;
      justify-content: center;
    }

    .logout {
      background-color: #dc3545;
    }

    .rm-btn {
      background-color: #ffc107;
    }

    input[type="text"] {
      width: 58%;
      padding-block: 0px;
      padding-inline: 10px;
      border-radius: 5px 0px 0px 5px;
      border: none;
      font-weight: 700;
      color: rgb(150, 150, 150);
      background-color: #94959538;
      outline: none;
      font-family: Arial, sans-serif;
      height: 45%;
    }


    .citybutton {
      width: 30%;
      height: 45%;
      border-radius: 0px 5px 5px 0px;
      border: 1px solid #bfbfbf;
      background-color: #595959;
      font-size: 14px;
      color: rgb(255, 255, 255);
      border: none;
    }

    .error_msg {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100%;
      font-family: Arial, Helvetica, sans-serif;
      font-size: 15px;
      color: #ffffff;
    }

    .fav {
      max-height: 18vh;
      overflow-y: scroll;
      overflow-x: hidden;
      padding: 2%;
      scrollbar-width: none;
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
    }

    .favcity {
      background-color: #3a3c3d78;
      color: #ffffffe8;
      border: none;
      padding: 6px;
      margin: 3px;
      width: 95%;
      text-align: center;
      font-weight: bold;
      text-align: left;
      border-radius: 5px;
      transition: all 0.3sease;
    }

    .favcity:hover {
      background-color: #ffffff;
      color: #000000b8;
      transform: scale(1.05);
    }

    form {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100%;
      width: 100%;
    }

        form {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100%;
      width: 100%;
    }


    .buttonouter {
      display: inline-grid;
      justify-content: center;
      align-items: center;
      width: 100%;

    }

    h3 {
      margin-block: 2px;
    }

    .br1 {
      display: flex;
      justify-content: space-evenly;
      align-items: center;
      width: 100%;
    }

    @media (max-width: 768px) {
      .container {
        flex-direction: column;
      }

      .sidebar {
        width: 100%;
        margin-bottom: 20px;
      }

      .buttons {
        flex-direction: column;
      }

      .day {
        background-color: #4d4d4d3d;
      }

      @media screen and (max-width: 600px) {
        .day {
          max-width: 100%;
        }

      }
    }

    .linkstyle,
    .linkstyle:visited,
    .linkstyle:hover,
    .linkstyle:active {
      color: #ffffff;
      text-decoration: none;
    }

    .topbar {
      background-color: #1e1e1e;
      width: 100%;
      font-family: Arial, sans-serif;
      font-size: 15px;
      text-align: center;
      padding-inline: 10px;
      color: white;
    }

  </style>
</head>

<body>
  <div class="container">
    <div class="sidebar">
      <div class="topbar" style="text-align:center">

        @if (session('role') === 'admin')
      <p>{{ session('role') }}</p>
    @endif
        @if (session('role') === 'user')
      @if (session('username'))
      <p>{{ session('username') }}</p>
    @else
      <p>username</p>
    @endif
    @endif
      </div>
      <div class="logo">
        <img src="logo.png" alt="logo" height="120px" />
      </div>
      <div class="location">
        <form action="" method="post">
          <input type="text" id="city" value="{{ $city }}" placeholder="Enter city name">
          <button type="button" class="citybutton"
            onclick="getWeather(document.getElementById('city').value)">Search</button>
        </form>
      </div>
      <h3><img src="fav.png" height="20px" alt="Fav" />&nbspMy Favorites</h3>
      <div class="fav">

        <button class="favcity" value="London" onclick="getWeather(this.value)">London</button>
        <button class="favcity" value="Tokyo" onclick="getWeather(this.value)">Tokyo</button>
        <button class="favcity" value="New York" onclick="getWeather(this.value)">New York</button>
        <button class="favcity" value="Delhi" onclick="getWeather(this.value)">Delhi</button>
        <button class="favcity" value="Paris" onclick="getWeather(this.value)">Paris</button>
        <button class="favcity" value="London" onclick="getWeather(this.value)">London</button>
        <button class="favcity" value="Tokyo" onclick="getWeather(this.value)">Tokyo</button>

      </div>
      <div class="buttonouter">
        <div class="br1">
          <a href="/add"><button class="ad-btn rm-btn" style="background-color: #ffffff;color:black">&nbsp&nbsp<img
                src="add.png" height="17px" alt="Fav" />&nbspAdd&nbsp&nbsp</button></a>
          <a href="/remove"><button class="ad-btn rm-btn" style="background-color: #ffffff;color:black"><img
                src="remove.png" height="17px" alt="Fav" />&nbspRemove</button></a>
        </div>
        <div class="br1">
          <a href="/feedback"><button class="ad-btn"><img src="send.png" height="15px"
                alt="Fav" />&nbspFeedback</button></a>
          <form class="logout" action="/userlogout" method="post"><button class="ad-btn logout"><img src="logout.png" height="15px"
                alt="Fav" />&nbspLog
              Out</button>
          </form>
        </div>
        <div class="topbar" style="text-align:center">
          <p><img src="current-location.png" height="15px" alt="">&nbsp{{ $city}},&nbsp{{ $region }},&nbsp{{ $country }}
          </p>
        </div>
      </div>
      <div class="footer" style="width: 100%;height: 2%;display: flex;justify-content: space-evenly;font-size: 12px;">
        <a href="/about" class="linkstyle">About</a>
        <a href="/contact" class="linkstyle">Contact</a>
      </div>
    </div>
    <main class="weather-content">
      <div id="weather" class="current-weather">
        <div class="error_msg">
          <img src="alert.png" height="30px" alt="">
          <p>&nbspSearch a city to get the weather details.</p>
        </div>
      </div>
      <div id="forecast" class="weekly-forecast">
      </div>
    </main>
  </div>
  </div>
</body>


<script>

  const customIcons = {
    "01d": "https://cdn-icons-png.flaticon.com/512/869/869869.png", // Clear day
    "01n": "https://cdn-icons-png.flaticon.com/512/869/869869.png", // Clear night
    "02d": "https://cdn-icons-png.flaticon.com/512/1163/1163657.png", // Few clouds day
    "02n": "https://cdn-icons-png.flaticon.com/512/1163/1163657.png", // Few clouds night
    "03d": "https://cdn-icons-png.flaticon.com/512/1163/1163624.png", // Scattered clouds
    "03n": "https://cdn-icons-png.flaticon.com/512/1163/1163624.png",
    "04d": "https://cdn-icons-png.flaticon.com/512/1779/1779806.png", // Broken clouds
    "04n": "https://cdn-icons-png.flaticon.com/512/1779/1779806.png",
    "09d": "https://cdn-icons-png.flaticon.com/512/2204/2204345.png", // Shower rain
    "09n": "https://cdn-icons-png.flaticon.com/512/2204/2204345.png",
    "10d": "https://cdn-icons-png.flaticon.com/512/869/869869.png", // Rain day
    "10n": "https://cdn-icons-png.flaticon.com/512/869/869869.png",
    "11d": "https://cdn-icons-png.flaticon.com/512/1779/1779867.png", // Thunderstorm
    "11n": "https://cdn-icons-png.flaticon.com/512/1779/1779867.png",
    "13d": "https://cdn-icons-png.flaticon.com/512/1163/1163650.png", // Snow
    "13n": "https://cdn-icons-png.flaticon.com/512/1163/1163650.png",
    "50d": "https://cdn-icons-png.flaticon.com/512/2675/2675962.png",//Mist
    "50n": "https://cdn-icons-png.flaticon.com/512/2675/2675962.png",

  };

  onload = getWeather({{ $city }});

  function getWeather(cityName = null) {
    const city = cityName || document.getElementById("city").value;
    if (!city) {
      alert("Please enter a city name.");
      return;
    }

    const apiKey = "88efc61cf31ab2cf85baddc82176c37d";
    const currentWeatherUrl = `https://api.openweathermap.org/data/2.5/weather?q=${city}&appid=${apiKey}&units=metric`;

    // http://api.openweathermap.org/geo/1.0/reverse?lat={lat}&lon={lon}&limit={limit}&appid={API key}

    const forecastUrl = `https://api.openweathermap.org/data/2.5/forecast?q=${city}&appid=${apiKey}&units=metric`;

    fetch(currentWeatherUrl)
      .then((response) => response.json())
      .then((data) => {
        const weatherDiv = document.getElementById("weather");
        if (data.cod === 200) {
          const iconCode = data.weather[0].icon;
          const iconUrl = customIcons[iconCode] || `https://openweathermap.org/img/wn/${iconCode}@2x.png`;
          const weatherDate = new Date(data.dt * 1000).toLocaleString();
          weatherDiv.innerHTML = `
                <h2>Current Weather in ${data.name}, ${data.sys.country}</h2>
                <img src="${iconUrl}" alt="${data.weather[0].description}" class="weather-icon" align="center" height="100vh">
                <p><strong>Temperature:</strong> ${data.main.temp}°C</p>
                <p><strong>Weather:</strong> ${data.weather[0].description}</p>
                <p><strong>Humidity:</strong> ${data.main.humidity}%</p>
                <p><strong>Wind Speed:</strong> ${data.wind.speed} m/s</p>
                <p><strong>Date:</strong> ${weatherDate}</p>
                `;
        } else {
          weatherDiv.innerHTML = `<p>Error: ${data.message}</p>`;
        }
      })
      .catch((error) => {
        console.error("Error fetching current weather data:", error);
        document.getElementById(
          "weather"
        ).innerHTML = `<p>Failed to fetch current weather data. Please try again.</p>`;
      });

    fetch(forecastUrl)
      .then((response) => response.json())
      .then((data) => {
        const forecastDiv = document.getElementById("forecast");
        if (data.cod === "200") {
          let forecastHtml = `<h2></h2>`;
          const filteredData = data.list
            .filter((_, index) => index % 8 === 0) // Adjust the filtering if needed
            .slice(0, 5);

          filteredData.forEach((item) => {
            const iconCode = item.weather[0].icon; // Extract the icon code properly
            const iconUrl = customIcons[iconCode] || `https://openweathermap.org/img/wn/${iconCode}@2x.png`;
            // const dateTime = new Date(item.dt * 1000).toLocaleString();
            const date = new Date(item.dt * 1000).toLocaleDateString();
            const Time = new Date(item.dt * 1000).toLocaleTimeString();


            forecastHtml += `
          <div class="day">
            <center>
            <p><strong>${date}</strong></p>
             <p>${Time}</p>
            <img src="${iconUrl}" alt="${item.weather[0].description}" class="weather-icon" align="center" width="50%">            
            <p><strong>${item.main.temp}°C</strong></p>
            <p>${item.weather[0].description.charAt(0).toUpperCase() + item.weather[0].description.slice(1)}</p>
            </center>
          </div>
        `;
          });

          forecastDiv.innerHTML = forecastHtml;
        } else {
          forecastDiv.innerHTML = `<p>Error: ${data.message}</p>`;
        }
      })
      .catch((error) => {
        console.error("Error fetching forecast data:", error);
        document.getElementById(
          "forecast"
        ).innerHTML = `<p>Failed to fetch forecast data. Please try again.</p>`;
      });
  }
</script>

</html>