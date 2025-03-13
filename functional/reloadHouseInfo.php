<?php

require ('functions.php');

if(!empty($_POST['house_id']))
{
    $house_id = htmlspecialchars($_POST['house_id']);

    $data = getHouseInfo($house_id);
}

else
    $data = false;

echo json_encode($data);
?>