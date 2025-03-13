<?php
/**
 * Created by PhpStorm.
 * User: alexey
 * Date: 20.06.18
 * Time: 7:01
 */

require ('functions.php');

require 'paymasterSdk/lib/Client.php';
require 'paymasterSdk/lib/Client/CommonProtocol.php';

use PaymasterSdkPHP\Client;

if(!empty($_GET['payno']))
{
    $pay_no = htmlspecialchars($_GET['payno']);

    $booking = getBookingDataByPayNo($pay_no)[0];

    if (!$booking || $booking['pay_status_id'] != 1)
    {
        header('Location: /');
        die();
    }

    $protocol = new Client('common');

    $pay = $booking['pay_pre_order_amount'];
    $date_in = $booking['date_in'];
    $date_out = $booking['date_out'];

    // Какие параметры обязательные
    // protected $required = array('LMI_MERCHANT_ID', 'LMI_PAYMENT_AMOUNT', 'LMI_CURRENCY', 'LMI_PAYMENT_DESC', 'KEYPASS');

    $protocol->client->set('LMI_MERCHANT_ID', '3af08266-265a-4926-bbed-eed639824c64');
    $protocol->client->set('LMI_PAYMENT_AMOUNT', $booking['pay_pre_order_amount']);
    $protocol->client->set('LMI_PAYMENT_NO', $booking['pay_no']);
    $protocol->client->set('LMI_PAYER_PHONE_NUMBER', preg_replace('/[^0-9]/', '', $booking['phone_number']));
    $protocol->client->set('LMI_PAYER_EMAIL', $booking['email']);
    $protocol->client->set('LMI_EXPIRES', date('Y-m-d\TH:i:s', strtotime("+15 minutes")));
    $protocol->client->set('LMI_CURRENCY', 'RUB');
    $protocol->client->set('LMI_PAYMENT_DESC', "$date_in - $date_out: Предоплата за бронирование гостевого дома");
    $protocol->client->set('KEYPASS', 'sonniyzalivpaysecret');

    echo $protocol->client->getForm();
}
else
    header('Location: /');

