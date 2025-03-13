<?php
require ('functions.php');

if(!empty($_POST['weatherArray']))
{
    if (!empty($_POST['selectedDate']))
        $selectedDate = htmlspecialchars($_POST['selectedDate']);

    if (!empty($_POST['selectedHour']))
        $selectedHour = htmlspecialchars($_POST['selectedHour']);

    $weatherArray = json_decode($_POST['weatherArray'],true);

    $weather = initWeather($weatherArray, $selectedDate, $selectedHour);
}

echo json_encode($weather);
?>