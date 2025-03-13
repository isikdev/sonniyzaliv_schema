<?php
    require ('functions.php');

    if(isset($_POST['date_in']) && isset($_POST['date_out']) && isset($_POST['type_id']) && isset($_POST['person_count']))
    {
        $date_in = htmlspecialchars($_POST['date_in']);
        $date_out = htmlspecialchars($_POST['date_out']);
        $type_id = htmlspecialchars($_POST['type_id']);
        $person_count = htmlspecialchars($_POST['person_count']);

        $houses = getHouses($person_count, $type_id);

        $houses_arr = [];

        if ($houses)
        {
            if ($date_in != " " && $date_out != " ")
            {
                $cur_dates_arr = createDatesArr($date_in, $date_out);

                foreach ($houses as $house)
                {
                    $house_id = $house['id'];

                    $bookingData = getBookingData($house_id);
                    $dates = getFormatBookingCalendarDates($bookingData)['dates'];
                    $dataContain = checkBookingData($dates, $cur_dates_arr);

                    if (!$dataContain)
                        $houses_arr[] = $house_id;
                }
            }

            else
            {
                foreach ($houses as $house)
                    $houses_arr[] = $house['id'];
            }
        }

        $res = initCatalogHouses($houses_arr);

        if (!$res)
            $res = false;

        echo json_encode($res);
    }
