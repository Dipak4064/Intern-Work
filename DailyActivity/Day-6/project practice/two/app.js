const apiKey = "bdf7620fe0164775b14637c296bb5ecf";
const apiUrl = "https://api.openweathermap.org/data/2.5/weather?&units=metric&q=";
const searchBox = document.querySelector(".search-input input");
const searchBtn = document.querySelector(".search-input button");
const weatherIcon = document.querySelector(".wheather-icon");

async function checkWheather(city) {
    const response = await fetch(apiUrl + city + `&appid=${apiKey}`);
    var data = await response.json();
    if (response.status == 404) {
        document.querySelector(".city").innerHTML = "Invalid country name";
    } else {
        document.querySelector(".city").innerHTML = data.name;
    }
    document.querySelector(".tempreture").innerHTML = Math.round(data.main.temp) + " °C";
    document.querySelector(".Humidity").innerHTML = data.main.humidity + "%";
    document.querySelector(".wind").innerHTML = data.wind.speed + " km/h";

    if (data.weather[0].main == "Clouds") {
        console.log(data.weather[0].main);
        weatherIcon.src = "images/clouds.png";
    } else if (data.weather[0].main == "Clear") {
        console.log(data.weather[0].main);
        weatherIcon.src = "images/clear.png";
    } else if (data.weather[0].main == "Rain") {
        console.log(data.weather[0].main);
        weatherIcon.src = "images/rain.png";
    } else if (data.weather[0].main == "Drizzle") {
        console.log(data.weather[0].main);
        weatherIcon.src = "images/drizzle.png";
    } else if (data.weather[0].main == "Mist") {
        console.log(data.weather[0].main);
        weatherIcon.src = "images/mist.png";
    }
}
searchBtn.addEventListener("click", () => {
    checkWheather(searchBox.value);
})