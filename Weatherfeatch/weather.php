<?php
// Replace with your OpenWeatherMap API Key
$apiKey ="5b57673742f41d4b4d2b3a22136eb05e";  

$weatherData = null;
$error = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $city = trim($_POST["city"]);

    if (!empty($city)) {
        // API URL
        $url = "https://api.openweathermap.org/data/2.5/weather?q=" . urlencode($city) . "&appid=$apiKey&units=metric";

        // Fetch API response
        $response = file_get_contents($url);

        if ($response) {
            $data = json_decode($response, true);

            if ($data["cod"] == 200) {
                $weatherData = [
                    "city" => $data["name"],
                    "country" => $data["sys"]["country"],
                    "temp" => $data["main"]["temp"],
                    "condition" => $data["weather"][0]["description"],
                    "humidity" => $data["main"]["humidity"],
                    "wind" => $data["wind"]["speed"],
                    "icon" => "http://openweathermap.org/img/wn/" . $data["weather"][0]["icon"] . "@2x.png"
                ];
            } else {
                $error = "City not found!";
            }
        } else {
            $error = "Unable to fetch weather data!";
        }
    } else {
        $error = "Please enter a city name!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Weather Info Fetcher</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; padding: 30px; background: #f2f2f2; }
        .card { background: white; padding: 20px; border-radius: 10px; display: inline-block; box-shadow: 0 4px 6px rgba(0,0,0,0.2); }
        input[type=text] { padding: 10px; border-radius: 5px; border: 1px solid #ccc; width: 250px; }
        button { padding: 10px 20px; border: none; border-radius: 5px; background: #007BFF; color: white; cursor: pointer; }
        button:hover { background: #0056b3; }
        img { vertical-align: middle; }
    </style>
</head>
<body>

    <h1>🌤️ Weather Info Fetcher</h1>
    <form method="post">
        <input type="text" name="city" placeholder="Enter city name" required>
        <button type="submit">Get Weather</button>
    </form>

    <?php if ($error): ?>
        <p style="color:red;"><?= $error ?></p>
    <?php endif; ?>

    <?php if ($weatherData): ?>
        <div class="card">
            <h2><?= $weatherData["city"] ?>, <?= $weatherData["country"] ?></h2>
            <p><img src="<?= $weatherData["icon"] ?>"> <?= ucfirst($weatherData["condition"]) ?></p>
            <p>🌡️ Temperature: <?= $weatherData["temp"] ?> °C</p>
            <p>💧 Humidity: <?= $weatherData["humidity"] ?>%</p>
            <p>💨 Wind Speed: <?= $weatherData["wind"] ?> m/s</p>
        </div>
    <?php endif; ?>

</body>
</html>
