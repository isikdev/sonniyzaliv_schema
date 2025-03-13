<?php
require ('functions.php');

if(!empty($_POST['house_id']))
{
    $house_id = htmlspecialchars($_POST['house_id']);

    $bookingData = getBookingData($house_id);

    $dates = getFormatBookingCalendarDates($bookingData);
}
    echo json_encode($dates);
?>
