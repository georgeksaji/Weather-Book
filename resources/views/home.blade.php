<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="shortcut icon" href="icon.png" type="image/x-icon">
<link rel="icon" href="icon.png" type="image/x-icon">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Atkinson+Hyperlegible+Next:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
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
        overflow: hidden;
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
        margin-bottom: 20px;
        height: 3vh;
      }
      .weather-content {
        flex: 1;
        padding: 20px;
      }
      .current-weather {
        text-align: center;
      }
      .weather-icon img {
        width: 100px;
      }
      .hourly-forecast,
      .weekly-forecast {
        display: flex;
        justify-content: space-between;
        padding: 10px 0;
        overflow-x: auto;
      }
      .hour,
      .day {
        background: #333;
        padding: 10px;
        border-radius: 5px;
        margin: 5px;
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
        min-width: 125px;
        transition: all 0.3s ease;
      }
      .ad-btn:hover {
        border: 1px solid #ffffff;
        transform: scale(1.05);
      }
      .buttons {
        max-height: 5vh;
        max-width:100%;
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
        width: 60%;
        padding: 10px;
        border-radius: 5px 0px 0px 5px;
        border: none;
        outline: none;
        font-family: Arial, sans-serif;
      }
      /* .current-weather,.weekly-forecast{


      } */
      .citybutton {
        width: 30%;
        padding-top: 2px;
        border-radius: 0px 5px 5px 0px;
        border: 1px solid #bfbfbf;
        background-color: #1c9fe3;
        color: #353232;
        border: none;
      }
      .error_msg {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 20px;
        color: #ffffff;
        font-weight: bold;
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
      .favcity {
        background-color: #3a3c3d78;
        color: #ffffffe8;
        border: none;
        padding: 6px;
        margin: 3px;
        width: 100%;
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
    form
        {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            width: 100%;
        }
        .buttonouter
        {
          display: inline-grid;
    justify-content: center;
    align-items: center;
    height: 17vh;
    width: 100%;

        }
ul
{
  max-height: 18vh;
    overflow-y: scroll;
    overflow-x: hidden;
    padding: 2%;
    scrollbar-color: black;
    scrollbar-width: thin;
}
.br1
{
  display: flex;
  justify-content: center;
  align-items: center;
  height: 50%;
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
}
    </style>
  </head>
  <body>
    <div class="container">
      <div class="sidebar">
        <div class="logo">
          <img src="logo.png" alt="logo" height="120px" />
        </div>
        <div class="location">
          <form action="" method="post">
            <input type="text" id="city" value="Ernakulam" placeholder="Enter city name">
            <button type="button" class="citybutton" onclick="getWeather(document.getElementById('city').value)">
                <img src="search.png" height="29px" alt="" />
            </button>
        </form>        
        </div>
        <h3><img src="fav.png" height="20px" alt="Fav" />&nbspMy Favorites</h3>
        <div class="fav">
        <ul type="none">
          <li><button class="favcity" value="London" onclick="getWeather(this.value)">London</button></li>
          <li><button class="favcity" value="Tokyo" onclick="getWeather(this.value)">Tokyo</button></li>
          <li><button class="favcity" value="New York" onclick="getWeather(this.value)">New York</button></li>
          <li><button class="favcity" value="Delhi" onclick="getWeather(this.value)">Delhi</button></li>
          <li><button class="favcity" value="Paris" onclick="getWeather(this.value)">Paris</button></li>

        </ul>
      </div>
        <div class="buttonouter">
          <div class="br1">
          <button class="ad-btn" style="background-color: green;"><img src="add.png" height="17px" alt="Fav" />&nbspAdd</button>
          <button class="ad-btn rm-btn"><img src="remove.png" height="17px" alt="Fav" />&nbspRemove</button>
        </div>
        <div class="br1">
          <a href="/feedback"><button class="ad-btn"><img src="send.png" height="15px" alt="Fav" />&nbspFeedback</button></a>
          <button class="ad-btn logout"><img src="logout.png" height="15px" alt="Fav" />&nbspLog Out</button>
      </div>
    </div>
    </div>
      <main class="weather-content">
        <div id="weather" class="current-weather">
          <div class="error_msg">
            <p>Search a city to get the weather details.</p>
          </div>
        </div>
        <div id="forecast" class="weekly-forecast"></div>

        <script>
          // onload = getWeather();

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
                  const iconUrl = `https://openweathermap.org/img/wn/${data.weather[0].icon}@2x.png`;
                  const weatherDate = new Date(data.dt * 1000).toLocaleString();
                  weatherDiv.innerHTML = `
                <h2>Current Weather in ${data.name}, ${data.sys.country}</h2>
                <img src="${iconUrl}" alt="${data.weather[0].description}" class="weather-icon">
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
                    .filter((_, index) => index % 2 === 0)
                    .slice(0, 5);

                  filteredData.forEach((item) => {
                    const iconUrl = `https://openweathermap.org/img/wn/${item.weather[0].icon}@2x.png`;
                    const dateTime = new Date(item.dt * 1000).toLocaleString();

                    forecastHtml += `
                <div class="day">
                <p><strong>${dateTime}</strong></p>
                <center><img src="${iconUrl}" alt="${item.weather[0].description}" class="weather-icon"></center>
                <p><strong>Temperature:</strong> ${item.main.temp}°C</p>
                <p><strong>Weather:</strong> ${item.weather[0].description}</p>
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
      </main>
    </div>
  </body>
</html>
