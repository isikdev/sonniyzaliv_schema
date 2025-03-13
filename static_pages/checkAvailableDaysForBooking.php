<?php
    require ('functions.php');

    if(!empty($_POST['dateIn']) && !empty($_POST['dateOut']) && !empty($_POST['house_id']))
    {
        $date_in = htmlspecialchars($_POST['dateIn']);
        $date_out = htmlspecialchars($_POST['dateOut']);

        $house_id = htmlspecialchars($_POST['house_id']);

        $format_date_start = DateTime::createFromFormat('Y-m-d', $date_in);
        $format_date_end = DateTime::createFromFormat('Y-m-d', $date_out);

        $start_month = $format_date_start->format('m');
        $end_month = $format_date_end->format('m');

        $bookingData = getBookingDataForMonth($start_month, $end_month, $house_id);

        $dates = getFormatBookingCalendarDates($bookingData)['dates'];

        $cur_dates_arr = createDatesArr($date_in, $date_out);

        $res = checkBookingData($dates, $cur_dates_arr);

        if ($res)
            $res = true;

        echo json_encode($res);
    }
