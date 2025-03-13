<?php
	require ('functions.php');

    $res = bookingSetDeleted();

    echo json_encode(true);
?>