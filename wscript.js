const apiKey = '5b57673742f41d4b4d2b3a22136eb05e'; // Replace with your actual API key

function getWeather() {
  const city = document.getElementById('city').value;
  if (!city) {
    alert('Please enter a city name');
    return;
  }

  const url = `https://api.openweathermap.org/data/2.5/weather?q=${city}&appid=${apiKey}&units=metric`;

  fetch(url)
    .then(response => {
      if (!response.ok) throw new Error('City not found');
      return response.json();
    })
    .then(data => {
      document.getElementById('city-name').textContent = data.name;
      document.getElementById('description').textContent = data.weather[0].description;
      document.getElementById('temperature').textContent = `${Math.round(data.main.temp)} °C`;
      document.getElementById('humidity').textContent = `${data.main.humidity}%`;
      document.getElementById('wind').textContent = `${data.wind.speed} km/h`;
    })
    .catch(err => {
      alert(err.message);
    });
}

