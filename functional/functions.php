<?php
require('db.php');
require('settings/internal_settings.php');

date_default_timezone_set("Europe/Moscow");
//require('classSimpleImage.php');
//set_time_limit(0);

function addBooking($date_in, $date_out, $email, $person_count, $mobileContact, $userName, $userSurname, $payAmount, $preOrderCost, $house_id, $payStatus = 1, $type_id = 1)
{
    if (is_null($email) || empty($email) || is_null($date_in) || empty($date_in) || is_null($date_out) || empty($date_out)
        || is_null($person_count) || empty($person_count) || $person_count <= 0 || is_null($mobileContact) || empty($mobileContact)
        || is_null($userName) || empty($userName) || is_null($userSurname) || empty($userSurname) || $payStatus <= 0
        || is_null($payAmount) || empty($payAmount) || $payAmount <= 0 || is_null($preOrderCost) || empty($preOrderCost) || $preOrderCost <= 0
        || empty($house_id) || $house_id <= 0)
        return false;

    $cur_datetime = date('Y-m-d H:i:s');
    $cr_user_id = 1;

    $max_book_id = getMaxBookingId() + 1;

    if ($house_id == 3)
        $pay_no = "SZ1$max_book_id";

    else if ($house_id == 4)
        $pay_no = "DNB1$max_book_id";

    else if ($house_id == 5)
        $pay_no = "NT1$max_book_id";

    else if ($house_id == 6)
        $pay_no = "ZD1$max_book_id";

    else if ($house_id == 7)
        $pay_no = "SD1$max_book_id";

    else if ($house_id == 8)
        $pay_no = "CHN1$max_book_id";

    else if ($house_id == 9)
        $pay_no = "CHS1$max_book_id";

    else if ($house_id == 10)
        $pay_no = "VOS1$max_book_id";

    else if ($house_id == 12)
        $pay_no = "CHZ1$max_book_id";

    else if ($house_id == 13)
        $pay_no = "CHZ21$max_book_id";

    else if ($house_id == 14)
        $pay_no = "CHZ31$max_book_id";

    else if ($house_id == 15)
        $pay_no = "CHZ41$max_book_id";

    else if ($house_id == 16)
        $pay_no = "CHZ51$max_book_id";

    $pay_expires = date('Y-m-d H:i:s', strtotime("+15 minutes"));

    $book = R::dispense('bookingdata');

    // Заполняем объект свойствами
    $book->user_name = $userName;
    $book->user_surname = $userSurname;
    $book->phone_number = $mobileContact;
    $book->email = $email;
    $book->person_count = $person_count;
    $book->date_in = $date_in;
    $book->date_out = $date_out;
    $book->pay_no = $pay_no;
    $book->pay_amount = $payAmount;
    $book->pay_pre_order_amount = $preOrderCost;
    $book->pay_expires = $pay_expires;
    $book->pay_status_id = $payStatus;
    $book->type_id = $type_id;
    $book->house_id = $house_id;
    $book->create_datetime = $cur_datetime;
    $book->create_user_id = $cr_user_id;

    // Сохраняем объект
    R::store($book);

    return $pay_no;
}

function getMaxBookingId()
{
    $b_id = R::getCell('SELECT MAX(b.id) FROM bookingdata b');

    if (!$b_id)
        return false;

    return $b_id;
}

function getHousesInfoForSlider()
{
    $houses = getHouses();

    $month = date("m");
    $startDate = date('Y-' . $month . '-1');
    $endDate = date('Y-' . $month . '-3');
    $personCount = 2;

    $costResArr = [];

    foreach ($houses as $house) {
        $house_id = $house["id"];
        $costResArr[] = analyzeHouseDaysCost($house_id, $startDate, $endDate, $personCount, 1);
    }

    return $costResArr;
}

function initHousesSlider($excluded_house_id = -1, $header_text = "Другие гостевые дома")
{
    $houses_id = [
        3 => '<div class="swiper-slide">
                            <div class="ftco-animate">
                                <div class="project-wrap">
                                    <a class="img scroll-elem" data-bg="images/houses/sonniy-zaliv/1.webp"></a>
                                    <div class="text p-4">
                                        <span class="days">от 2 суток</span>
                                        <h3><a class="scroll-elem">Сонный Залив</a></h3>
                                        <p class="loc" style="margin-bottom: auto;"><span class="ion-ios-person" style="color: green;"></span> до 6 человек</p>
                                        <p class="loc"><span class="ion-ios-pin" style="color: red;"></span> п.Нукутталахти, ул.Центральная, д.52</p>
                                        <ul>
                                            <li><span class="flaticon-double" title="В доме расположены 2 удобные двуспальные кровати"></span></li>
                                            <li><span class="flaticon-sofa" title="5,6-е место обеспечиваем раскладным диван-кроватью"></span></li>
                                            <li><span class="flaticon-hot" title="Теплые полы"></span></li>
                                            <li><span class="flaticon-panoramic-view" title="Панорамные окна"></span></li>
                                            <li><span class="flaticon-book" title="Библиотека"></span></li>
                                            <li><span class="flaticon-watching-tv" title="Телевизор"></span></li>
                                            <li><span class="flaticon-wifi" title="Wi-Fi"></span></li>
                                            <li><span class="flaticon-sauna" title="Сауна"></span></li>
                                            <li><span class="flaticon-jacuzzi" title="Купель"></span></li>
                                            <li><span class="flaticon-tea-cup" title="Чай"></span></li>
                                            <li><span class="flaticon-orthopedic" title="Ортопедические матрасы"></span></li>
                                            <li><span class="flaticon-washer" title="Стиральная машина"></span></li>
                                            <li><span class="flaticon-refrigerator" title="Холодильник"></span></li>
                                            <li><span class="flaticon-stove" title="Плита"></span></li>
                                            <li><span class="flaticon-microwave" title="Свч-печь с грилем"></span></li>
                                            <li><span class="flaticon-shower" title="Душ"></span></li>
                                            <li><span class="flaticon-bbq" title="Барбекю (мангал)"></span></li>
                                            <li><span class="flaticon-parked-car" title="Парковка"></span></li>
                                            <li><span class="flaticon-air-conditioning" title="Кондиционер"></span></li>
                                        </ul>
                                        <div class="row">
                                            <div class="col-md-12 ftco-animate">
                                                <div class="conf-btn" style="text-align: center;"><a href="/sonniy-zaliv" id="reserve1" style="background:#f9ab30!important;color:#161616!important;border:1px solid #dddddd!important;box-shadow:none!important;font-weight:700" class="btn btn-primary py-3 px-4 ftco-animate"><i class="ion-ios-information-circle"></i> Подробнее</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>',
        17 => '<div class="swiper-slide">
                            <div class="ftco-animate">
                                <div class="project-wrap">
                                    <a class="img scroll-elem" data-bg="images/houses/lunniy-zaliv/23.webp"></a>
                                    <div class="text p-4">
                                        <span class="days">от 2 суток</span>
                                        <h3><a class="scroll-elem">Лунный Залив</a></h3>
                                        <p class="loc" style="margin-bottom: auto;"><span class="ion-ios-person" style="color: green;"></span> до 4 человек</p>
                                        <p class="loc"><span class="ion-ios-pin" style="color: red;"></span> п.Нукутталахти, ул.Центральная, д.52</p>
                                        <ul>
                                            <li><span class="flaticon-double" title="В доме расположены  двуспальная кровать"></span></li>
                                            <li><span class="flaticon-sofa" title="3,4-е место обеспечиваем раскладным диван-кроватью"></span></li>
                                            <li><span class="flaticon-hot" title="Теплые полы"></span></li>
                                            <li><span class="flaticon-panoramic-view" title="Панорамные окна"></span></li>
                                            <li><span class="flaticon-book" title="Библиотека"></span></li>
                                            <li><span class="flaticon-watching-tv" title="Телевизор"></span></li>
                                            <li><span class="flaticon-wifi" title="Wi-Fi"></span></li>
                                            <li><span class="flaticon-sauna" title="Сауна"></span></li>
                                            <li><span class="flaticon-jacuzzi" title="Купель"></span></li>
                                            <li><span class="flaticon-tea-cup" title="Чай"></span></li>
                                            <li><span class="flaticon-orthopedic" title="Ортопедические матрасы"></span></li>
                                            <li><span class="flaticon-washer" title="Стиральная машина"></span></li>
                                            <li><span class="flaticon-refrigerator" title="Холодильник"></span></li>
                                            <li><span class="flaticon-stove" title="Плита"></span></li>
                                            <li><span class="flaticon-microwave" title="Свч-печь с грилем"></span></li>
                                            <li><span class="flaticon-shower" title="Душ"></span></li>
                                            <li><span class="flaticon-bbq" title="Барбекю (мангал)"></span></li>
                                            <li><span class="flaticon-parked-car" title="Парковка"></span></li>
                                            <li><span class="flaticon-air-conditioning" title="Кондиционер"></span></li>
                                        </ul>
                                        <div class="row">
                                            <div class="col-md-12 ftco-animate">
                                                <div class="conf-btn" style="text-align: center;"><a href="/lunniy-zaliv" id="reserve1" style="background:#f9ab30!important;color:#161616!important;border:1px solid #dddddd!important;box-shadow:none!important;font-weight:700" class="btn btn-primary py-3 px-4 ftco-animate"><i class="ion-ios-information-circle"></i> Подробнее</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>',

        12 => '<div class="swiper-slide">
                            <div class="ftco-animate">
                                <div class="project-wrap">
                                    <a class="img scroll-elem" data-bg="images/houses/chernaya-zhemchuzhina/3.webp"></a>
                                    <div class="text p-4">
                                        <span class="days">от 2 суток</span>
                                        <h3><a class="scroll-elem">Черная жемчужина 80м2</a></h3>
                                        <p class="loc" style="margin-bottom: auto;"><span class="ion-ios-person" style="color: green;"></span> до 6 человек</p>
                                        <p class="loc"><span class="ion-ios-pin" style="color: red;"></span> п.Токкарлахти</p>
                                        <ul>
                                            <li><span class="flaticon-double" title="В доме расположены 2 удобные двуспальные кровати"></span></li>
                                            <li><span class="flaticon-sofa" title="2 места доступны в виде дивана в гостиной"></span></li>
                                            <li><span class="flaticon-hot" title="Теплые полы"></span></li>
                                            <li><span class="flaticon-panoramic-view" title="Панорамные окна"></span></li>
                                            <li><span class="flaticon-watching-tv" title="Телевизор"></span></li>
                                            <li><span class="flaticon-wifi" title="Wi-Fi"></span></li>
                                            <li><span class="flaticon-tea-cup" title="Чай"></span></li>
                                            <li><span class="flaticon-washer" title="Стиральная машина"></span></li>
                                            <li><span class="flaticon-refrigerator" title="Холодильник"></span></li>
                                            <li><span class="flaticon-stove" title="Плита"></span></li>
                                            <li><span class="flaticon-microwave" title="Свч-печь"></span></li>
                                            <li><span class="flaticon-shower" title="Душ"></span></li>
                                            <li><span class="flaticon-bbq" title="Барбекю"></span></li>
                                            <li><span class="flaticon-parked-car" title="Парковка"></span></li>
                                        </ul>
                                        <div class="row">
                                            <div class="col-md-12 ftco-animate">
                                                <div class="conf-btn" style="text-align: center;"><a href="/chernaya-zhemchuzhina" id="reserve1" style="background:#f9ab30!important;color:#161616!important;border:1px solid #dddddd!important;box-shadow:none!important;font-weight:700" class="btn btn-primary py-3 px-4 ftco-animate"><i class="ion-ios-information-circle"></i> Подробнее</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>',
        9 => '<div class="swiper-slide">
                            <div class="ftco-animate">
                                <div class="project-wrap">
                                    <a class="img scroll-elem" data-bg="images/houses/chernika-v-sonnom-zalive/leto/4.webp"></a>
                                    <div class="text p-4">
                                        <span class="days">от 2 суток</span>
                                        <h3><a class="scroll-elem">Черника в Заливе</a></h3>
                                        <p class="loc" style="margin-bottom: auto;"><span class="ion-ios-person" style="color: green;"></span> до 6 человек</p>
                                        <p class="loc"><span class="ion-ios-pin" style="color: red;"></span> п.Нукутталахти, ул.Центральная, д.35А</p>
                                        <ul>
                                            <li><span class="flaticon-double" title="1 двуспальная и 3 односпальные кровати"></span></li>
                                            <li><span class="flaticon-sofa" title="Возможно размещение на односпальном раскладном диване"></span></li>
                                            <li><span class="flaticon-hot" title="Теплые полы"></span></li>
                                            <li><span class="flaticon-panoramic-view" title="Вид из окна"></span></li>
                                            <li><span class="flaticon-watching-tv" title="Телевизор"></span></li>
                                            <li><span class="flaticon-wifi" title="Wi-Fi"></span></li>
                                            <li><span class="flaticon-washer" title="Стиральная машина"></span></li>
                                            <li><span class="flaticon-refrigerator" title="Холодильник"></span></li>
                                            <li><span class="flaticon-stove" title="Плита"></span></li>
                                            <li><span class="flaticon-microwave" title="Свч-печь"></span></li>
                                            <li><span class="flaticon-shower" title="Душ"></span></li>
                                            <li><span class="flaticon-bbq" title="Барбекю"></span></li>
                                            <li><span class="flaticon-parked-car" title="Парковка"></span></li>
                                        </ul>
                                        <div class="row">
                                            <div class="col-md-12 ftco-animate">
                                                <div class="conf-btn" style="text-align: center;"><a href="/chernika-v-zalive" id="reserve1" style="background:#f9ab30!important;color:#161616!important;border:1px solid #dddddd!important;box-shadow:none!important;font-weight:700" class="btn btn-primary py-3 px-4 ftco-animate"><i class="ion-ios-information-circle"></i> Подробнее</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>',
        18 => '<div class="swiper-slide">
                            <div class="ftco-animate">
                                <div class="project-wrap">
                                    <a class="img scroll-elem" data-bg="images/houses/shale-siniy-dom/leto/leto-2.webp"></a>
                                    <div class="text p-4">
                                        <span class="days">от 2 суток</span>
                                        <h3><a class="scroll-elem">Полярная станция 160м2</a></h3>
                                        <p class="loc" style="margin-bottom: auto;"><span class="ion-ios-person" style="color: green;"></span>  6 чел. (+4 на доп местах)</p>
                                        <p class="loc"><span class="ion-ios-pin" style="color: red;"></span> п.Нукутталахти, ул.Центральная, д.46Б</p>
                                        <ul>
                                            <li><span class="flaticon-double" title="В доме расположены 2 удобные двуспальные и 2 односпальные кровати"></span></li>
                                            <li><span class="flaticon-sofa" title="доп места доступны в виде диванов в гостиной и зоне отдыха"></span></li>
                                            <li><span class="flaticon-hot" title="Теплые полы"></span></li>
                                            <li><span class="flaticon-panoramic-view" title="Панорамные окна"></span></li>
                                            <li><span class="flaticon-watching-tv" title="Телевизор"></span></li>
                                            <li><span class="flaticon-wifi" title="Wi-Fi"></span></li>
                                            <li><span class="flaticon-sauna" title="Сауна"></span></li>
                                            <li><span class="flaticon-orthopedic" title="Ортопедические матрасы"></span></li>
                                            <li><span class="flaticon-washer" title="Стиральная машина"></span></li>
                                            <li><span class="flaticon-refrigerator" title="Холодильник"></span></li>
                                            <li><span class="flaticon-stove" title="Плита"></span></li>
                                            <li><span class="flaticon-microwave" title="Свч-печь"></span></li>
                                            <li><span class="flaticon-shower" title="Душ"></span></li>
                                            <li><span class="flaticon-bbq" title="Барбекю"></span></li>
                                            <li><span class="flaticon-parked-car" title="Парковка"></span></li>
                                            <li><span class="flaticon-panoramic-view" title="Вид из окна"></span></li>
                                        </ul>
                                        <div class="row">
                                            <div class="col-md-12 ftco-animate">
                                                <div class="conf-btn" style="text-align: center;"><a href="/shale-siniy-dom" id="reserve1" style="background:#f9ab30!important;color:#161616!important;border:1px solid #dddddd!important;box-shadow:none!important;font-weight:700" class="btn btn-primary py-3 px-4 ftco-animate"><i class="ion-ios-information-circle"></i> Подробнее</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>',
        7 => '<div class="swiper-slide">
                            <div class="ftco-animate">
                                <div class="project-wrap">
                                    <a class="img scroll-elem" data-bg="images/houses/siniy-dom/leto/2.webp"></a>
                                    <div class="text p-4">
                                        <span class="days">от 2 суток</span>
                                        <h3><a class="scroll-elem">Синий дом</a></h3>
                                        <p class="loc" style="margin-bottom: auto;"><span class="ion-ios-person" style="color: green;"></span> до 8 человек</p>
                                        <p class="loc"><span class="ion-ios-pin" style="color: red;"></span> п.Нукутталахти, ул.Центральная, д.60</p>
                                        <ul>
                                            <li><span class="flaticon-double" title="В доме расположены 3 двуспальные и 2 односпальные кровати на втором ярусе кровати"></span></li>
                                            <li><span class="flaticon-sofa" title="1 детская кроватка"></span></li>
                                            <li><span class="flaticon-hot" title="Теплые полы"></span></li>
                                            <li><span class="flaticon-panoramic-view" title="Панорамные окна"></span></li>
                                            <li><span class="flaticon-watching-tv" title="Телевизор"></span></li>
                                            <li><span class="flaticon-wifi" title="Wi-Fi"></span></li>
                                            <li><span class="flaticon-sauna" title="Сауна"></span></li>
                                            <li><span class="flaticon-washer" title="Стиральная машина"></span></li>
                                            <li><span class="flaticon-refrigerator" title="Холодильник"></span></li>
                                            <li><span class="flaticon-stove" title="Плита"></span></li>
                                            <li><span class="flaticon-microwave" title="Свч-печь"></span></li>
                                            <li><span class="flaticon-shower" title="Душ"></span></li>
                                            <li><span class="flaticon-bbq" title="Мангал"></span></li>
                                            <li><span class="flaticon-parked-car" title="Парковка"></span></li>
                                        </ul>
                                        <div class="row">
                                            <div class="col-md-12 ftco-animate">
                                                <div class="conf-btn" style="text-align: center;"><a href="/siniy-dom" id="reserve1" style="background:#f9ab30!important;color:#161616!important;border:1px solid #dddddd!important;box-shadow:none!important;font-weight:700" class="btn btn-primary py-3 px-4 ftco-animate"><i class="ion-ios-information-circle"></i> Подробнее</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>',

        8 => '<div class="swiper-slide">
                            <div class="ftco-animate">
                                <div class="project-wrap">
                                    <a class="img scroll-elem" data-bg="images/houses/chernika-v-nukuttalahti/leto/2.webp"></a>
                                    <div class="text p-4">
                                        <span class="days">от 2 суток</span>
                                        <h3><a class="scroll-elem">Черника в Нукутталахти</a></h3>
                                        <p class="loc" style="margin-bottom: auto;"><span class="ion-ios-person" style="color: green;"></span> до 6 человек</p>
                                        <p class="loc"><span class="ion-ios-pin" style="color: red;"></span> п.Нукутталахти, ул.Центральная, д.35</p>
                                        <ul>
                                            <li><span class="flaticon-double" title="1 двуспальная и 3 односпальные кровати"></span></li>
                                            <li><span class="flaticon-sofa" title="Возможно размещение на односпальном раскладном диване"></span></li>
                                            <li><span class="flaticon-hot" title="Теплые полы"></span></li>
                                            <li><span class="flaticon-panoramic-view" title="Вид из окна"></span></li>
                                            <li><span class="flaticon-watching-tv" title="Телевизор"></span></li>
                                            <li><span class="flaticon-wifi" title="Wi-Fi"></span></li>
                                            <li><span class="flaticon-washer" title="Стиральная машина"></span></li>
                                            <li><span class="flaticon-refrigerator" title="Холодильник"></span></li>
                                            <li><span class="flaticon-stove" title="Плита"></span></li>
                                            <li><span class="flaticon-microwave" title="Свч-печь"></span></li>
                                            <li><span class="flaticon-shower" title="Душ"></span></li>
                                            <li><span class="flaticon-bbq" title="Барбекю"></span></li>
                                            <li><span class="flaticon-parked-car" title="Парковка"></span></li>
                                        </ul>
                                        <div class="row">
                                            <div class="col-md-12 ftco-animate">
                                                <div class="conf-btn" style="text-align: center;"><a href="/chernika-v-nukuttalahti" id="reserve1" style="background:#f9ab30!important;color:#161616!important;border:1px solid #dddddd!important;box-shadow:none!important;font-weight:700" class="btn btn-primary py-3 px-4 ftco-animate"><i class="ion-ios-information-circle"></i> Подробнее</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>',

        6 => '<div class="swiper-slide">
                            <div class="ftco-animate">
                                <div class="project-wrap">
                                    <a class="img scroll-elem" data-bg="images/houses/zeleniy-dom/leto/4.webp"></a>
                                    <div class="text p-4">
                                        <span class="days">от 2 суток</span>
                                        <h3><a class="scroll-elem">Зелёный дом</a></h3>
                                        <p class="loc" style="margin-bottom: auto;"><span class="ion-ios-person" style="color: green;"></span> до 8 человек</p>
                                        <p class="loc"><span class="ion-ios-pin" style="color: red;"></span> п.Нукутталахти, ул.Центральная, д.60</p>
                                        <ul>
                                            <li><span class="flaticon-double" title="В доме расположены 3 двуспальные и 2 односпальные кровати во втором ярусе кровати"></span></li>
                                            <li><span class="flaticon-sofa" title="1 детская кроватка"></span></li>
                                            <li><span class="flaticon-hot" title="Теплые полы"></span></li>
                                            <li><span class="flaticon-panoramic-view" title="Панорамные окна"></span></li>
                                            <li><span class="flaticon-watching-tv" title="Телевизор"></span></li>
                                            <li><span class="flaticon-wifi" title="Wi-Fi"></span></li>
                                            <li><span class="flaticon-sauna" title="Сауна"></span></li>
                                            <li><span class="flaticon-washer" title="Стиральная машина"></span></li>
                                            <li><span class="flaticon-refrigerator" title="Холодильник"></span></li>
                                            <li><span class="flaticon-stove" title="Плита"></span></li>
                                            <li><span class="flaticon-microwave" title="Свч-печь"></span></li>
                                            <li><span class="flaticon-shower" title="Душ"></span></li>
                                            <li><span class="flaticon-bbq" title="Мангал"></span></li>
                                            <li><span class="flaticon-parked-car" title="Парковка"></span></li>
                                        </ul>
                                        <div class="row">
                                            <div class="col-md-12 ftco-animate">
                                                <div class="conf-btn" style="text-align: center;"><a href="/zeleniy-dom" id="reserve1" style="background:#f9ab30!important;color:#161616!important;border:1px solid #dddddd!important;box-shadow:none!important;font-weight:700" class="btn btn-primary py-3 px-4 ftco-animate"><i class="ion-ios-information-circle"></i> Подробнее</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>',

        16 => '<div class="swiper-slide">
                            <div class="ftco-animate">
                                <div class="project-wrap">
                                    <a class="img scroll-elem" data-bg="images/houses/chernaya-zhemchuzhina-4/18.webp"></a>
                                    <div class="text p-4">
                                        <span class="days">от 2 суток</span>
                                        <h3><a class="scroll-elem">Черная жемчужина 45м2</a></h3>
                                        <p class="loc" style="margin-bottom: auto;"><span class="ion-ios-person" style="color: green;"></span> до 4 человек</p>
                                        <p class="loc"><span class="ion-ios-pin" style="color: red;"></span> п.Токкарлахти</p>
                                        <ul>
                                            <li><span class="flaticon-double" title="В доме расположены 2 односпальные полуторные кровати"></span></li>
                                            <li><span class="flaticon-sofa" title="2 места доступны в виде дивана в гостиной"></span></li>
                                            <li><span class="flaticon-hot" title="Теплые полы"></span></li>
                                            <li><span class="flaticon-panoramic-view" title="Панорамные окна"></span></li>
                                            <li><span class="flaticon-watching-tv" title="Телевизор"></span></li>
                                            <li><span class="flaticon-wifi" title="Wi-Fi"></span></li>
                                            <li><span class="flaticon-tea-cup" title="Чай"></span></li>
                                            <li><span class="flaticon-washer" title="Стиральная машина"></span></li>
                                            <li><span class="flaticon-refrigerator" title="Холодильник"></span></li>
                                            <li><span class="flaticon-stove" title="Плита"></span></li>
                                            <li><span class="flaticon-microwave" title="Свч-печь"></span></li>
                                            <li><span class="flaticon-shower" title="Душ"></span></li>
                                            <li><span class="flaticon-bbq" title="Барбекю"></span></li>
                                            <li><span class="flaticon-parked-car" title="Парковка"></span></li>
                                        </ul>
                                        <div class="row">
                                            <div class="col-md-12 ftco-animate">
                                                <div class="conf-btn" style="text-align: center;"><a href="/chernaya-zhemchuzhina-5" id="reserve1" style="background:#f9ab30!important;color:#161616!important;border:1px solid #dddddd!important;box-shadow:none!important;font-weight:700" class="btn btn-primary py-3 px-4 ftco-animate"><i class="ion-ios-information-circle"></i> Подробнее</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>'
    ];

    $data = '<section id="all-houses" class="ftco-section services-section bg-light">
                    <div id="tl-reputation-widget"></div>
                    <div class="container">
                        <div class="row justify-content-center pb-4">
                            <div class="col-md-12 heading-section text-center ftco-animate">
                                <h2 class="mb-4">' . $header_text . '</h2>
                                <p>Чтобы посмотреть полную информацию, об интересующем Вас доме, нажмите "Подробнее"</p>
                            </div>
                        </div>
                        <div class="swiper-houses">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">
                                <!-- Slides -->
                        ';

    foreach ($houses_id as $key => $value) {
        if ($excluded_house_id > 0 && $key == $excluded_house_id)
            continue;

        $data .= $value;
    }

    $data .= '          </div>
                            <!-- If we need pagination -->
                            <div class="swiper-pagination"></div>
                            <!-- If we need navigation buttons -->
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                        <div class="row">
                            <div class="conf-btn" style="padding-top: 30px;"><a id="reserve1" href="/catalog" class="btn btn-primary py-3 px-4 ftco-animate"><i class="icon-table"></i> Перейти в каталог</a></div>
                        </div>
                   </div>
                </section>';

    return $data;
}


function getHotOffers($house_id = false)
{
    $houseWhere = "";

    if ($house_id)
        $houseWhere = " AND hho.house_id = $house_id";

    $deleted = 0;

    $res = R::getAll("SELECT hho.id, hho.house_id, hho.img_url, hho.img_alt, hho.href FROM househotoffers hho WHERE hho.deleted = ?$houseWhere ORDER BY hho.id ASC", array($deleted));

    if (!$res)
        return false;

    return $res;
}

function initHotOffers($offers)
{
    $data = "";

    if ($offers) {
        $data = '<section id="banner" class="ftco-section services-section bg-light" style="padding-bottom: 0; padding-top: 0">
                        <div class="container">
                            <div class="row d-flex">
                                <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
                                    <h2 class="mb-4">Горячие предложения</h2>
                                    <p>Подписывайся на нашу группу Вконтакте, чтобы участвовать в акциях</p>
                                </div>
                    ';

        foreach ($offers as $offer) {
            $offer_img_url = $offer['img_url'];
            $offer_href = $offer['href'];
            $offer_img_alt = $offer['img_alt'];

            $data .= '      <div class="col-md-4 centered-text ftco-animate">
                                    <div class="project-destination" style="padding-bottom: 50px;padding-top: 0px;">
                                        <a target="_blank" rel="nofollow" href="' . $offer_href . '"><img class="img" alt="' . $offer_img_alt . '" style="height: 350px;margin: 0 auto;cursor: pointer;" src="' . $offer_img_url . '"></a>
                                    </div>
                                </div>
                                ';
        }

        $data .= '      </div>
                            <div class="row d-flex">
                                <div class="conf-btn" style="padding-bottom: 50px;"><a rel="nofollow" href="https://vk.com/club212131932" target="_blank" class="btn btn-primary py-3 px-4 ftco-animate"><i class="ion-ios-information-circle"></i>&nbsp;Узнать подробности</a></div>
                            </div>
                        </div>
                    </section>
                    ';
    }

    return $data;
}

function getSettings($settingTypeArr)
{
    $deleted = 0;

    $typeWhere = "";

    if ($settingTypeArr) {
        $settingTypeStr = convertArrToStr($settingTypeArr);
        $typeWhere = " AND s.type_id IN ($settingTypeStr)";
    }

    $res = R::getAll("SELECT s.id, s.type_id, s.value FROM settings s WHERE s.deleted = ?$typeWhere", array($deleted));

    if (!$res)
        return false;

    return $res;
}

function initMainContacts($contactsArr)
{
    $data = "";

    if ($contactsArr) {
        $location = "";
        $phone_number = "";
        $phone_number_replaced = "";
        $email = "";
        $inn = "";

        foreach ($contactsArr as $item) {
            $type_id = $item['type_id'];
            $value = $item['value'];

            if ($type_id == 1) {
                $location = $value;
                continue;
            }

            if ($type_id == 2) {
                $phone_number = $value;
                $phone_number_replaced = preg_replace('/[^0-9+]/', "", $phone_number);
                continue;
            }

            if ($type_id == 3) {
                $email = $value;
                continue;
            }

            if ($type_id == 4) {
                $inn = $value;
                continue;
            }
        }

        if (!$location || !$phone_number || !$email || !$inn)
            return $data;

        $data = '<section id="contactData" class="ftco-section ftco-no-pt ftco-no-pb contact-section bg-light">
                      <div class="container">
                        <div class="row justify-content-center pb-4">
                          <div class="col-md-12 heading-section text-center ftco-animate">
                            <h2 class="mb-4">Контакты</h2>
                            <p>Основная контактная информация для связи с нами</p>
                          </div>
                        </div>
                        <div class="row d-flex contact-info">
                          <div class="col-md-3 d-flex ftco-animate">
                            <div class="align-self-stretch box p-4 text-center">
                                <div class="icon d-flex align-items-center justify-content-center">
                                    <span class="icon-map-signs"></span>
                                </div>
                                <h3 class="mb-2">Местоположение</h3>
                                <p>' . $location . '</p>
                              </div>
                          </div>
                          <div class="col-md-3 d-flex ftco-animate">
                            <div class="align-self-stretch box p-4 text-center">
                                <div class="icon d-flex align-items-center justify-content-center">
                                    <span class="icon-phone2"></span>
                                </div>
                                <h3 class="mb-2">Телефон</h3>
                                <p><a href="tel://' . $phone_number_replaced . '">' . $phone_number . '</a></p>
                              </div>
                          </div>
                          <div class="col-md-3 d-flex ftco-animate">
                            <div class="align-self-stretch box p-4 text-center">
                                <div class="icon d-flex align-items-center justify-content-center">
                                    <span class="icon-paper-plane"></span>
                                </div>
                                <h3 class="mb-2">Email</h3>
                                <p><a href="mailto:' . $email . '">' . $email . '</a></p>
                              </div>
                          </div>
                            <div class="col-md-3 d-flex ftco-animate">
                                <div class="align-self-stretch box p-4 text-center">
                                    <div class="icon d-flex align-items-center justify-content-center">
                                        <span class="icon-info"></span>
                                    </div>
                                    <h3 class="mb-2">ИНН</h3>
                                    <p>' . $inn . '</p>
                                </div>
                            </div>
                        </div>
                      </div>
                    </section>
                    ';
    }

    return $data;
}

function convertArrToStr($arr)
{
    if (!$arr)
        return false;

    $res = "";

    foreach ($arr as $item) {
        if (!$res)
            $res = $item;

        else
            $res .= ", " . $item;
    }

    return $res;
}

function getNews()
{
    $deleted = 0;
    $is_show = 1;

    $res = R::getAll("SELECT n.id, n.title, n.text, n.image_url, n.public_date, n.page_url FROM news n WHERE n.deleted = ? AND n.is_show = ? ORDER BY n.public_date DESC", array($deleted, $is_show));

    if (!$res)
        return false;

    return $res;
}

function translateMonthName($monthName)
{
    if (!$monthName)
        return "";

    $month = [
        'January' => 'Января',
        'February' => 'Февраля',
        'March' => 'Марта',
        'April' => 'Апреля',
        'May' => 'Мая',
        'June' => 'Июня',
        'July' => 'Июля',
        'August' => 'Августа',
        'September' => 'Сентября',
        'October' => 'Октября',
        'November' => 'Ноября',
        'December' => 'Декабря'
    ];

    return $month[$monthName];
}

function initNews($news)
{
    $data = "";

    if ($news) {
        $data = '<section id="news" class="ftco-section bg-light pt-5" style="padding-top: 0">
                      <div class="container">
                        <div class="row justify-content-center pb-4">
                          <div class="col-md-12 heading-section text-center ftco-animate">
                            <h2 class="mb-4">Недавние посты блога о путешествиях</h2>
                            <p>Представляем вашему вниманию полезные статьи нашего блога о путешествиях по Карелии</p>
                          </div>
                        </div>
                        <div class="swiper-news">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">
                            <!-- Slides -->
                    ';

        foreach ($news as $item) {
            $image_url = $item['image_url'];
            $news_title = $item['title'];
            $news_text = $item['text'];
            $public_date = $item['public_date'];
            $page_url = $item['page_url'];

            $converted_date = new DateTime($public_date);

            $day = $converted_date->format('j');
            $month = translateMonthName($converted_date->format('F'));
            $year = $converted_date->format('Y');

//            $data .= '<div class="swiper-slide">
//                               <div class="ftco-animate">
//                                   <div class="blog-entry">
//
//                                        <a href="' . $page_url . '"
//                                            title="' . $news_title . '"
//                                            target="_blank"
//                                            class="block-20"
//                                            style= "background-image:url(' . $image_url . ');">' . $news_title . '
//                                        </a>
//                                        <a img alt="' . $new_title . '"</a>
//
//
//                                      <div class="text mt-3 float-right d-block">
//                                        <div class="d-flex align-items-center mb-4 topp">
//                                            <div class="one">
//                                                <span class="day">' . $day . '</span>
//                                            </div>
//                                            <div class="two">
//                                                <span class="yr">' . $year . '</span>
//                                                <span class="mos">' . $month . '</span>
//                                            </div>
//                                        </div>
//                                        <h3 class="heading"><a>' . $news_title . '</a></h3>
//                                        <p>' . $news_text . '</p>
//                                      </div>
//                                   </div>
//                               </div>
//                           </div>
//                                ';
            $data .= '<div class="swiper-slide">
           <div class="ftco-animate">
               <div class="blog-entry">
                    <a href="' . $page_url . '"
                        title="' . $news_title . '"
                        target="_blank"
                        class="block-20 lazyload"
                        data-background-image="' . $image_url . '">
                    </a>
                    <a img alt="' . $news_title . '"></a>

                  <div class="text mt-3 float-right d-block">
                    <div class="d-flex align-items-center mb-4 topp">
                        <div class="one">
                            <span class="day">' . $day . '</span>
                        </div>
                        <div class="two">
                            <span class="yr">' . $year . '</span>
                            <span class="mos">' . $month . '</span>
                        </div>
                    </div>
                    <h3 class="heading"><a>' . $news_title . '</a></h3>
                    <p>' . $news_text . '</p>
                  </div>
               </div>
           </div>
       </div>';

        }

        $data .= '    </div>
                            <!-- If we need pagination -->
                            <div class="swiper-pagination"></div>

                            <!-- If we need navigation buttons -->
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                      </div>
                    </section>
                    ';
    }

    return $data;
}

function getHouseReview($house_id = false)
{
    $houseWhere = "";

    if ($house_id)
        $houseWhere = " AND hr.house_id = $house_id";

    $deleted = 0;
    $is_show = 1;

    $res = R::getAll("SELECT hr.id, hr.house_id, (SELECT h.name FROM houses h WHERE h.id = hr.house_id) as 'house_name', hr.author, hr.text, hr.review_date FROM housereview hr WHERE hr.deleted = ? AND hr.is_show = ?$houseWhere ORDER BY hr.review_date DESC", array($deleted, $is_show));

    if (!$res)
        return false;

    return $res;
}

function initHouseReview($reviews, $background_url)
{
    if ($reviews) {
        $data = '<section id="houseReviews" style="background: url(' . $background_url . ');" class="ftco-section services-section module bg-dark-60 pb-0 pt-0 parallax-bg testimonial ftco-animate">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-12 heading-section text-center">
                                    <h2 class="pt-5" style="color: #ffdba3">Отзывы о домах</h2>
                                </div>
                            </div>
                        </div>
                        <div class="testimonials-slider pt-3 pb-140">
                            <ul class="slides">
                    ';

        foreach ($reviews as $review) {
            $review_author = $review['author'];
            $review_text = $review['text'];
            $review_date = $review['review_date'];
            $review_house_name = $review['house_name'];

            $converted_date = new DateTime($review_date);
            $converted_date = $converted_date->format('d.m.Y');

            $data .= '      <li>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="module-icon"><span class="icon-quote"></span></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-8 offset-sm-2">
                                                <blockquote class="testimonial-text font-alt">' . $review_text . '</blockquote>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4 offset-sm-4">
                                                <div class="testimonial-author">
                                                    <div class="testimonial-caption font-alt">
                                                        <div class="testimonial-title">' . $review_author . '</div>
                                                        <div class="testimonial-descr">' . $converted_date . ' - "' . $review_house_name . '"</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                ';
        }

        $data .= '      </ul>
                         </div>
                      </section>
                    ';
    } else {
        $data = '<section id="houseReviews" style="background: url(' . $background_url . ');" class="ftco-section services-section module bg-dark-60 pt-0 pb-0 parallax-bg testimonial ftco-animate">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-12 heading-section text-center">
                                    <h2 class="ftco-no-pt" style="color: #ffdba3">Отзывов нет</h2>
                                </div>
                            </div>
                        </div>
                    </section>
                ';
    }

    return $data;
}

function getHouseReviewBackgroundUrl($house_id = false)
{
    if (!$house_id)
        $house_id = 3;

    $houseWhere = " AND hp.house_id = $house_id";

    $deleted = 0;

    $res = R::getCell("SELECT hp.path FROM housesphoto hp WHERE hp.photo_type_id = 3 AND hp.deleted = ?$houseWhere", array($deleted));

    if (!$res)
        return false;

    return $res;
}

function getSubscribeIconBlock()
{
    return $data = '<ul class="ftco-footer-social list-unstyled">
                              <!--                                        <li class="ftco-animate"><a rel="nofollow" href="https://instagram.com/sonniy_zaliv_sortavala?utm_medium=copy_link" target="_blank"><span class="icon-instagram"></span></a></li>-->
                              <li class="ftco-animate"><a rel="nofollow" style="color: #ffffff;" href="https://t.me/+KmgBetu6NYtlNjcy" target="_blank"><span class="icon-telegram"></span></a></li>
                              <li class="ftco-animate"><a rel="nofollow" style="color: #ffffff;" href="https://wa.me/message/I52QRRPOZYJEG1" target="_blank"><span class="icon-whatsapp"></span></a></li>
                              <li class="ftco-animate"><a rel="nofollow" href="https://www.avito.ru/sortavala/doma_dachi_kottedzhi/2-k._dom_85_m_2443568322?context=H4sIAAAAAAAA_wE_AMD_YToyOntzOjEzOiJsb2NhbFByaW9yaXR5IjtiOjA7czoxOiJ4IjtzOjE2OiIyN0swSGxoSGJYV3BoM3Y3Ijt93N6GZz8AAAA&guestsDetailed=%7B%22version%22%3A1%2C%22totalCount%22%3A2%2C%22adultsCount%22%3A2%2C%22children%22%3A%5B%5D%7D" target="_blank"><img style="width: inherit;margin: 13px 0;padding: 4px;" src="/icons/avito.svg" alt="Avito"></a></li>
                              <div class="row d-flex">
                                  <div class="conf-btn" style="padding-bottom: 20px;"><a href="https://vk.com/public212131932" style="background: #24326a !important;font-weight: bold;border-color: #364372 !important;transition: all .5s ease;" target="_blank" class="btn btn-primary py-3 px-4 ftco-animate"><i class="icon-vk"></i>&nbsp;Акции для подписчиков</a></div>
                                  <div class="conf-btn"><a class="tl-button" href="https://sonniyzaliv.ru/?cert-open=40605">Купить сертификат</a></div>
                              </div>
                          </ul>
                          ';
}

function getArrColumnByString($array, $columnName)
{
    if (!$array || !$columnName)
        return false;

    $res = "";

    foreach ($array as $item) {
        if (!$res)
            $res = $item[$columnName];

        else
            $res .= ", " . $item[$columnName];
    }

    return $res;
}

function getHouses($person_count = 0, $type_id = 0)
{
    $deleted = 0;

    $personWhere = "";
    $typeWhere = "";

    if ($person_count > 0)
        $personWhere = " AND h.person_capacity >= $person_count";

    if ($type_id > 0)
        $typeWhere = " AND h.type_id = $type_id";

    $res = R::getAll("SELECT h.id, h.name, h.address, h.person_capacity, h.person_id, h.owner_text, h.type_id, h.page_url FROM houses h WHERE h.deleted = ? $personWhere $typeWhere ORDER BY h.id ASC", array($deleted));

    if (!$res)
        return false;

    return $res;
}

function getHousesOptions($houses_arr = [])
{
    return array(
        12 => array('teplye-poly', 'panoramnye-okna', 'televizor', 'wi-fi', 'chay', 'stiralnaya-mashina', 'holodilnik', 'svch-pech', 'dush', 'barbekyu', 'kuhonnye-prinadlezhnosti', 'parkovka'),
        18 => array('teplye-poly', 'panoramnye-okna', 'televizor', 'wi-fi', 'sauna', 'ortopedicheskie-matrasy', 'stiralnaya-mashina', 'holodilnik', 'plita', 'svch-pech', 'dush', 'duhovka', 'barbekyu', 'kuhonnye-prinadlezhnosti', 'parkovka', 'vid-na-ozero'),
        17 => array('panoramnye-okna', 'biblioteka', 'televizor', 'wi-fi', 'kupel', 'ortopedicheskie-matrasy', 'stiralnaya-mashina', 'holodilnik', 'svch-pech', 'dush', 'kuhonnye-prinadlezhnosti', 'barbekyu', 'les', 'kondicioner'),
        3 => array('teplye-poly', 'panoramnye-okna', 'biblioteka', 'televizor', 'wi-fi', 'sauna', 'kupel', 'chay', 'ortopedicheskie-matrasy', 'stiralnaya-mashina', 'holodilnik', 'plita', 'svch-pech', 'dush', 'barbekyu', 'kuhonnye-prinadlezhnosti', 'parkovka', 'kondicioner', 'les'),
        10 => array('teplye-poly', 'televizor', 'wi-fi', 'postelnoe-bele', 'stiralnaya-mashina', 'holodilnik', 'plita', 'svch-pech', 'dush', 'barbekyu', 'kuhonnye-prinadlezhnosti', 'parkovka'),
        8 => array('teplye-poly', 'vid-na-ozero', 'televizor', 'wi-fi', 'postelnoe-bele', 'stiralnaya-mashina', 'holodilnik', 'svch-pech', 'plita', 'dush', 'barbekyu', 'kuhonnye-prinadlezhnosti', 'parkovka', 'les'),
        7 => array('teplye-poly', 'panoramnye-okna', 'televizor', 'wi-fi', 'sauna', 'stiralnaya-mashina', 'holodilnik', 'plita', 'svch-pech', 'dush', 'barbekyu', 'parkovka', 'les', 'kondicioner'),
        4 => array('teplye-poly', 'vid-na-ozero', 'televizor', 'wi-fi', 'postelnoe-bele', 'stiralnaya-mashina', 'holodilnik', 'svch-pech', 'plita', 'duhovka', 'dush', 'barbekyu', 'kuhonnye-prinadlezhnosti', 'parkovka', 'les'),
        6 => array('teplye-poly', 'panoramnye-okna', 'televizor', 'wi-fi', 'sauna', 'stiralnaya-mashina', 'holodilnik', 'plita', 'svch-pech', 'dush', 'barbekyu', 'parkovka', 'les', 'kondicioner'),
        9 => array('teplye-poly', 'vid-na-ozero', 'televizor', 'wi-fi', 'postelnoe-bele', 'stiralnaya-mashina', 'holodilnik', 'svch-pech', 'plita', 'dush', 'barbekyu', 'kuhonnye-prinadlezhnosti', 'parkovka', 'les'),
        5 => array('teplye-poly', 'vid-na-ozero', 'televizor', 'wi-fi', 'postelnoe-bele', 'holodilnik', 'svch-pech', 'plita', 'dush', 'barbekyu', 'kuhonnye-prinadlezhnosti', 'parkovka', 'les'),
        16 => array('teplye-poly', 'panoramnye-okna', 'televizor', 'wi-fi', 'chay', 'stiralnaya-mashina', 'holodilnik', 'svch-pech', 'dush', 'barbekyu', 'kuhonnye-prinadlezhnosti', 'parkovka'),
    );
}

function isExistHouseOptions($houseOptionsArray, $checkOptionsArray)
{
    if (!$houseOptionsArray || !$checkOptionsArray)
        return false;

    $optionsIsNotExist = false;

    foreach ($checkOptionsArray as $option) {
        $option = str_replace(" ", "", $option);

        if (!in_array($option, $houseOptionsArray)) {
            $optionsIsNotExist = true;
            break;
        }
    }

    return $optionsIsNotExist ? false : true;
}

function initCatalogHouses($houses_arr, $all = 0, $filtersArray = [])
{
    $houses_id = [
        12 => '<div class="col-md-4">
                                <div class="ftco-animate">
                                    <div class="project-wrap">
                                        <a class="img scroll-elem" style="background-image: url(images/houses/chernaya-zhemchuzhina/3.webp);"></a>
                                        <div class="text p-4">
                                            <span class="days">от 2 суток</span>
                                            <h3><a class="scroll-elem">Черная жемчужина 80м2</a></h3>
                                            <p class="loc" style="margin-bottom: auto;"><span class="ion-ios-person" style="color: green;"></span> до 6 человек</p>
                                            <p class="loc"><span class="ion-ios-pin" style="color: red;"></span> п.Токкарлахти</p>
                                            <ul>
                                                <li><span class="flaticon-double" title="В доме расположены 2 удобные двуспальные кровати"></span></li>
                                                <li><span class="flaticon-sofa" title="2 места доступны в виде дивана в гостиной"></span></li>
                                                <li><span class="flaticon-hot" title="Теплые полы"></span></li>
                                                <li><span class="flaticon-panoramic-view" title="Панорамные окна"></span></li>
                                                <li><span class="flaticon-watching-tv" title="Телевизор"></span></li>
                                                <li><span class="flaticon-wifi" title="Wi-Fi"></span></li>
                                                <li><span class="flaticon-tea-cup" title="Чай"></span></li>
                                                <li><span class="flaticon-washer" title="Стиральная машина"></span></li>
                                                <li><span class="flaticon-refrigerator" title="Холодильник"></span></li>
                                                <li><span class="flaticon-stove" title="Плита"></span></li>
                                                <li><span class="flaticon-microwave" title="Свч-печь"></span></li>
                                                <li><span class="flaticon-shower" title="Душ"></span></li>
                                                <li><span class="flaticon-bbq" title="Барбекю"></span></li>
                                                <li><span class="flaticon-parked-car" title="Парковка"></span></li>
                                            </ul>
                                            <div class="row">
                                                <div class="col-md-12 ftco-animate">
                                                    <div class="conf-btn" style="text-align: center;"><a href="/chernaya-zhemchuzhina" id="reserve1" style="background:#f9ab30!important;color:#161616!important;border:1px solid #dddddd!important;box-shadow:none!important;font-weight:700" class="btn btn-primary py-3 px-4 ftco-animate"><i class="ion-ios-information-circle"></i> Подробнее</a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>',
        18 => '<div class="col-md-4">
                                <div class="ftco-animate">
                                    <div class="project-wrap">
                                        <a class="img scroll-elem" style="background-image: url(images/houses/shale-siniy-dom/leto/leto-2.webp);"></a>
                                        <div class="text p-4">
                                            <span class="days">от 2 суток</span>
                                            <h3><a class="scroll-elem">Полярная станция 160м2</a></h3>
                                            <p class="loc" style="margin-bottom: auto;"><span class="ion-ios-person" style="color: green;"></span> до 6 чел. (+4 чел)</p>
                                            <p class="loc"><span class="ion-ios-pin" style="color: red;"></span> п.Нукутталахти, ул.Центральная, д.46Б</p>
                                            <ul>
                                                <li><span class="flaticon-double" title="В доме расположены 2 удобные двуспальные и 2 односпальные кровати"></span></li>
                                                <li><span class="flaticon-sofa" title="доп места доступны в виде дивана в гостиной"></span></li>
                                                <li><span class="flaticon-hot" title="Теплые полы"></span></li>
                                                <li><span class="flaticon-panoramic-view" title="Панорамные окна"></span></li>
                                                <li><span class="flaticon-watching-tv" title="Телевизор"></span></li>
                                                <li><span class="flaticon-wifi" title="Wi-Fi"></span></li>
                                                <li><span class="flaticon-sauna" title="Сауна"></span></li>
                                                <li><span class="flaticon-orthopedic" title="Ортопедические матрасы"></span></li>
                                                <li><span class="flaticon-washer" title="Стиральная машина"></span></li>
                                                <li><span class="flaticon-refrigerator" title="Холодильник"></span></li>
                                                <li><span class="flaticon-stove" title="Плита"></span></li>
                                                <li><span class="flaticon-microwave" title="Свч-печь"></span></li>
                                                <li><span class="flaticon-shower" title="Душ"></span></li>
                                                <li><span class="flaticon-bbq" title="Барбекю"></span></li>
                                                <li><span class="flaticon-parked-car" title="Парковка"></span></li>
                                                <li><span class="flaticon-panoramic-view" title="Вид из окна"></span></li>
                                            </ul>
                                            <div class="row">
                                                <div class="col-md-12 ftco-animate">
                                                    <div class="conf-btn" style="text-align: center;"><a href="/shale-siniy-dom" id="reserve1" style="background:#f9ab30!important;color:#161616!important;border:1px solid #dddddd!important;box-shadow:none!important;font-weight:700" class="btn btn-primary py-3 px-4 ftco-animate"><i class="ion-ios-information-circle"></i> Подробнее</a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>',
        17 => '<div class="col-md-4">
                                <div class="ftco-animate">
                                    <div class="project-wrap">
                                        <a class="img scroll-elem" style="background-image: url(images/houses/lunniy-zaliv/23.webp);"></a>
                                        <div class="text p-4">
                                            <span class="days">от 2 суток</span>
                                            <h3><a class="scroll-elem">Лунный Залив</a></h3>
                                            <p class="loc" style="margin-bottom: auto;"><span class="ion-ios-person" style="color: green;"></span> до 4 человек</p>
                                            <p class="loc"><span class="ion-ios-pin" style="color: red;"></span> п.Нукутталахти, ул.Центральная, д.52</p>
                                            <ul>
                                                <li><span class="flaticon-double" title="В доме расположены 1 удобная двуспальная кровать"></span></li>
                                                <li><span class="flaticon-sofa" title="3,4-е место обеспечивается раскладным диван-кроватью"></span></li>
                                                <li><span class="flaticon-hot" title="Теплые полы"></span></li>
                                                <li><span class="flaticon-panoramic-view" title="Панорамные окна"></span></li>
                                                <li><span class="flaticon-book" title="Библиотека"></span></li>
                                                <li><span class="flaticon-watching-tv" title="Телевизор"></span></li>
                                                <li><span class="flaticon-wifi" title="Wi-Fi"></span></li>
                                                <li><span class="flaticon-sauna" title="Сауна"></span></li>
                                                <li><span class="flaticon-jacuzzi" title="Купель"></span></li>
                                                <li><span class="flaticon-tea-cup" title="Чай"></span></li>
                                                <li><span class="flaticon-orthopedic" title="Ортопедические матрасы"></span></li>
                                                <li><span class="flaticon-washer" title="Стиральная машина"></span></li>
                                                <li><span class="flaticon-refrigerator" title="Холодильник"></span></li>
                                                <li><span class="flaticon-stove" title="Плита"></span></li>
                                                <li><span class="flaticon-microwave" title="Свч-печь с грилем"></span></li>
                                                <li><span class="flaticon-shower" title="Душ"></span></li>
                                                <li><span class="flaticon-bbq" title="Барбекю (мангал)"></span></li>
                                                <li><span class="flaticon-parked-car" title="Парковка"></span></li>
                                                <li><span class="flaticon-air-conditioning" title="Кондиционер"></span></li>
                                            </ul>
                                            <div class="row">
                                                <div class="col-md-12 ftco-animate">
                                                    <div class="conf-btn" style="text-align: center;"><a href="/lunniy-zaliv" id="reserve1" style="background:#f9ab30!important;color:#161616!important;border:1px solid #dddddd!important;box-shadow:none!important;font-weight:700" class="btn btn-primary py-3 px-4 ftco-animate"><i class="ion-ios-information-circle"></i> Подробнее</a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>',
        3 => '<div class="col-md-4">
                                <div class="ftco-animate">
                                    <div class="project-wrap">
                                        <a class="img scroll-elem" style="background-image: url(images/houses/sonniy-zaliv/1.webp);"></a>
                                        <div class="text p-4">
                                            <span class="days">от 2 суток</span>
                                            <h3><a class="scroll-elem">Сонный Залив</a></h3>
                                            <p class="loc" style="margin-bottom: auto;"><span class="ion-ios-person" style="color: green;"></span> до 6 человек</p>
                                            <p class="loc"><span class="ion-ios-pin" style="color: red;"></span> п.Нукутталахти, ул.Центральная, д.52</p>
                                            <ul>
                                                <li><span class="flaticon-double" title="В доме расположены 2 удобные двуспальные кровати"></span></li>
                                                <li><span class="flaticon-sofa" title="5,6-е место обеспечиваем большим диван-кроватью"></span></li>
                                                <li><span class="flaticon-hot" title="Теплые полы"></span></li>
                                                <li><span class="flaticon-panoramic-view" title="Панорамные окна"></span></li>
                                                <li><span class="flaticon-book" title="Библиотека"></span></li>
                                                <li><span class="flaticon-watching-tv" title="Телевизор"></span></li>
                                                <li><span class="flaticon-wifi" title="Wi-Fi"></span></li>
                                                <li><span class="flaticon-sauna" title="Сауна"></span></li>
                                                <li><span class="flaticon-jacuzzi" title="Купель"></span></li>
                                                <li><span class="flaticon-tea-cup" title="Чай"></span></li>
                                                <li><span class="flaticon-orthopedic" title="Ортопедические матрасы"></span></li>
                                                <li><span class="flaticon-washer" title="Стиральная машина"></span></li>
                                                <li><span class="flaticon-refrigerator" title="Холодильник"></span></li>
                                                <li><span class="flaticon-stove" title="Плита"></span></li>
                                                <li><span class="flaticon-microwave" title="Свч-печь с грилем"></span></li>
                                                <li><span class="flaticon-shower" title="Душ"></span></li>
                                                <li><span class="flaticon-bbq" title="Барбекю (мангал)"></span></li>
                                                <li><span class="flaticon-parked-car" title="Парковка"></span></li>
                                                <li><span class="flaticon-air-conditioning" title="Кондиционер"></span></li>
                                            </ul>
                                            <div class="row">
                                                <div class="col-md-12 ftco-animate">
                                                    <div class="conf-btn" style="text-align: center;"><a href="/sonniy-zaliv" id="reserve1" style="background:#f9ab30!important;color:#161616!important;border:1px solid #dddddd!important;box-shadow:none!important;font-weight:700" class="btn btn-primary py-3 px-4 ftco-animate"><i class="ion-ios-information-circle"></i> Подробнее</a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>',
        10 => '<div class="col-md-4">
                                <div class="ftco-animate">
                                    <div class="project-wrap">
                                        <a class="img scroll-elem" style="background-image: url(images/houses/vostochniy/1.webp);"></a>
                                        <div class="text p-4">
                                            <span class="days">от 2 суток</span>
                                            <h3><a class="scroll-elem">Восточный с камином</a></h3>
                                            <p class="loc" style="margin-bottom: auto;"><span class="ion-ios-person" style="color: green;"></span> до 12 человек</p>
                                            <p class="loc"><span class="ion-ios-pin" style="color: red;"></span> г.Сортавала, ул.Восточная, д.32</p>
                                            <ul>
                                                <li><span class="flaticon-double" title="В доме расположены 12 удобных спальных мест"></span></li>
                                                <li><span class="flaticon-hot" title="Теплые полы"></span></li>
                                                <li><span class="flaticon-watching-tv" title="Телевизор"></span></li>
                                                <li><span class="flaticon-wifi" title="Wi-Fi"></span></li>
                                                <li><span class="flaticon-tea-cup" title="Чай"></span></li>
                                                <li><span class="flaticon-washer" title="Стиральная машина"></span></li>
                                                <li><span class="flaticon-refrigerator" title="Холодильник"></span></li>
                                                <li><span class="flaticon-stove" title="Плита"></span></li>
                                                <li><span class="flaticon-microwave" title="Свч-печь"></span></li>
                                                <li><span class="flaticon-shower" title="Душ"></span></li>
                                                <li><span class="flaticon-bbq" title="Барбекю (мангал)"></span></li>
                                                <li><span class="flaticon-parked-car" title="Парковка"></span></li>
                                            </ul>
                                            <div class="row">
                                                <div class="col-md-12 ftco-animate">
                                                    <div class="conf-btn" style="text-align: center;"><a href="/vostochniy" id="reserve1" style="background:#f9ab30!important;color:#161616!important;border:1px solid #dddddd!important;box-shadow:none!important;font-weight:700" class="btn btn-primary py-3 px-4 ftco-animate"><i class="ion-ios-information-circle"></i> Подробнее</a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>',
        8 => '<div class="col-md-4">
                                <div class="ftco-animate">
                                    <div class="project-wrap">
                                        <a class="img scroll-elem" style="background-image: url(images/houses/chernika-v-nukuttalahti/leto/2.webp);"></a>
                                        <div class="text p-4">
                                            <span class="days">от 2 суток</span>
                                            <h3><a class="scroll-elem">Черника в Нукутталахти</a></h3>
                                            <p class="loc" style="margin-bottom: auto;"><span class="ion-ios-person" style="color: green;"></span> до 6 человек</p>
                                            <p class="loc"><span class="ion-ios-pin" style="color: red;"></span> п.Нукутталахти, ул.Центральная, д.35</p>
                                            <ul>
                                                <li><span class="flaticon-double" title="1 двуспальная и 3 односпальные кровати"></span></li>
                                                <li><span class="flaticon-sofa" title="Возможно размещение на односпальном раскладном диване"></span></li>
                                                <li><span class="flaticon-hot" title="Теплые полы"></span></li>
                                                <li><span class="flaticon-panoramic-view" title="Вид из окна"></span></li>
                                                <li><span class="flaticon-watching-tv" title="Телевизор"></span></li>
                                                <li><span class="flaticon-wifi" title="Wi-Fi"></span></li>
                                                <li><span class="flaticon-washer" title="Стиральная машина"></span></li>
                                                <li><span class="flaticon-refrigerator" title="Холодильник"></span></li>
                                                <li><span class="flaticon-stove" title="Плита"></span></li>
                                                <li><span class="flaticon-microwave" title="Свч-печь"></span></li>
                                                <li><span class="flaticon-shower" title="Душ"></span></li>
                                                <li><span class="flaticon-bbq" title="Барбекю"></span></li>
                                                <li><span class="flaticon-parked-car" title="Парковка"></span></li>
                                            </ul>
                                            <div class="row">
                                                <div class="col-md-12 ftco-animate">
                                                    <div class="conf-btn" style="text-align: center;"><a href="/chernika-v-nukuttalahti" id="reserve1" style="background:#f9ab30!important;color:#161616!important;border:1px solid #dddddd!important;box-shadow:none!important;font-weight:700" class="btn btn-primary py-3 px-4 ftco-animate"><i class="ion-ios-information-circle"></i> Подробнее</a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>',
        7 => '<div class="col-md-4">
                                <div class="ftco-animate">
                                    <div class="project-wrap">
                                        <a class="img scroll-elem" style="background-image: url(images/houses/siniy-dom/leto/2.webp);"></a>
                                        <div class="text p-4">
                                            <span class="days">от 2 суток</span>
                                            <h3><a class="scroll-elem">Синий дом</a></h3>
                                            <p class="loc" style="margin-bottom: auto;"><span class="ion-ios-person" style="color: green;"></span> до 8 человек</p>
                                            <p class="loc"><span class="ion-ios-pin" style="color: red;"></span> п.Нукутталахти, ул.Центральная, д.60</p>
                                            <ul>
                                                <li><span class="flaticon-double" title="В доме расположены 3 двуспальные и 2 односпальные кровати"></span></li>
                                                <li><span class="flaticon-sofa" title="1 детская кроватка"></span></li>
                                                <li><span class="flaticon-hot" title="Теплые полы"></span></li>
                                                <li><span class="flaticon-panoramic-view" title="Панорамные окна"></span></li>
                                                <li><span class="flaticon-watching-tv" title="Телевизор"></span></li>
                                                <li><span class="flaticon-wifi" title="Wi-Fi"></span></li>
                                                <li><span class="flaticon-sauna" title="Сауна"></span></li>
                                                <li><span class="flaticon-washer" title="Стиральная машина"></span></li>
                                                <li><span class="flaticon-refrigerator" title="Холодильник"></span></li>
                                                <li><span class="flaticon-stove" title="Плита"></span></li>
                                                <li><span class="flaticon-microwave" title="Свч-печь"></span></li>
                                                <li><span class="flaticon-shower" title="Душ"></span></li>
                                                <li><span class="flaticon-bbq" title="Мангал"></span></li>
                                                <li><span class="flaticon-parked-car" title="Парковка"></span></li>
                                                <li><span class="flaticon-air-conditioning" title="Кондиционер"></span></li>
                                            </ul>
                                            <div class="row">
                                                <div class="col-md-12 ftco-animate">
                                                    <div class="conf-btn" style="text-align: center;"><a href="/siniy-dom" id="reserve1" style="background:#f9ab30!important;color:#161616!important;border:1px solid #dddddd!important;box-shadow:none!important;font-weight:700" class="btn btn-primary py-3 px-4 ftco-animate"><i class="ion-ios-information-circle"></i> Подробнее</a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>',
        4 => '<div class="col-md-4">
                                <div class="ftco-animate">
                                    <div class="project-wrap">
                                        <a class="img scroll-elem" style="background-image: url(images/houses/na-beregu/leto/2.webp);"></a>
                                        <div class="text p-4">
                                            <span class="days">от 2 суток</span>
                                            <h3><a class="scroll-elem">Хаски</a></h3>
                                            <p class="loc" style="margin-bottom: auto;"><span class="ion-ios-person" style="color: green;"></span> до 5 человек</p>
                                            <p class="loc"><span class="ion-ios-pin" style="color: red;"></span> п.Нукутталахти, ул.Центральная, д.48</p>
                                            <ul>
                                                <li><span class="flaticon-double" title="1 двуспальная и 2 односпальные кровати"></span></li>
                                                <li><span class="flaticon-sofa" title="Возможно размещение на диване в гостиной"></span></li>
                                                <li><span class="flaticon-hot" title="Теплые полы"></span></li>
                                                <li><span class="flaticon-panoramic-view" title="Панорамные окна"></span></li>
                                                <li><span class="flaticon-watching-tv" title="Телевизор"></span></li>
                                                <li><span class="flaticon-wifi" title="Wi-Fi"></span></li>
                                                <li><span class="flaticon-washer" title="Стиральная машина"></span></li>
                                                <li><span class="flaticon-refrigerator" title="Холодильник"></span></li>
                                                <li><span class="flaticon-stove" title="Плита"></span></li>
                                                <li><span class="flaticon-microwave" title="Свч-печь"></span></li>
                                                <li><span class="flaticon-shower" title="Душ"></span></li>
                                                <li><span class="flaticon-bbq" title="Мангал"></span></li>
                                                <li><span class="flaticon-parked-car" title="Парковка"></span></li>
                                            </ul>
                                            <div class="row">
                                                <div class="col-md-12 ftco-animate">
                                                    <div class="conf-btn" style="text-align: center;"><a href="/haski" id="reserve1" style="background:#f9ab30!important;color:#161616!important;border:1px solid #dddddd!important;box-shadow:none!important;font-weight:700" class="btn btn-primary py-3 px-4 ftco-animate"><i class="ion-ios-information-circle"></i> Подробнее</a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>',
        6 => '<div class="col-md-4">
                                <div class="ftco-animate">
                                    <div class="project-wrap">
                                        <a class="img scroll-elem" style="background-image: url(images/houses/zeleniy-dom/leto/4.webp);"></a>
                                        <div class="text p-4">
                                            <span class="days">от 2 суток</span>
                                            <h3><a class="scroll-elem">Зелёный дом</a></h3>
                                            <p class="loc" style="margin-bottom: auto;"><span class="ion-ios-person" style="color: green;"></span> до 8 человек</p>
                                            <p class="loc"><span class="ion-ios-pin" style="color: red;"></span> п.Нукутталахти, ул.Центральная, д.60</p>
                                            <ul>
                                                <li><span class="flaticon-double" title="В доме расположены 3 двуспальные и 2 односпальные кровати"></span></li>
                                                <li><span class="flaticon-sofa" title="1 детская кроватка"></span></li>
                                                <li><span class="flaticon-hot" title="Теплые полы"></span></li>
                                                <li><span class="flaticon-panoramic-view" title="Панорамные окна"></span></li>
                                                <li><span class="flaticon-watching-tv" title="Телевизор"></span></li>
                                                <li><span class="flaticon-wifi" title="Wi-Fi"></span></li>
                                                <li><span class="flaticon-sauna" title="Сауна"></span></li>
                                                <li><span class="flaticon-washer" title="Стиральная машина"></span></li>
                                                <li><span class="flaticon-refrigerator" title="Холодильник"></span></li>
                                                <li><span class="flaticon-stove" title="Плита"></span></li>
                                                <li><span class="flaticon-microwave" title="Свч-печь"></span></li>
                                                <li><span class="flaticon-shower" title="Душ"></span></li>
                                                <li><span class="flaticon-bbq" title="Мангал"></span></li>
                                                <li><span class="flaticon-parked-car" title="Парковка"></span></li>
                                                <li><span class="flaticon-air-conditioning" title="Кондиционер"></span></li>
                                            </ul>
                                            <div class="row">
                                                <div class="col-md-12 ftco-animate">
                                                    <div class="conf-btn" style="text-align: center;"><a href="/zeleniy-dom" id="reserve1" style="background:#f9ab30!important;color:#161616!important;border:1px solid #dddddd!important;box-shadow:none!important;font-weight:700" class="btn btn-primary py-3 px-4 ftco-animate"><i class="ion-ios-information-circle"></i> Подробнее</a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>',
        9 => '<div class="col-md-4">
                                <div class="ftco-animate">
                                    <div class="project-wrap">
                                        <a class="img scroll-elem" style="background-image: url(images/houses/chernika-v-sonnom-zalive/leto/4.webp);"></a>
                                        <div class="text p-4">
                                            <span class="days">от 2 суток</span>
                                            <h3><a class="scroll-elem">Черника в Заливе</a></h3>
                                            <p class="loc" style="margin-bottom: auto;"><span class="ion-ios-person" style="color: green;"></span> до 6 человек</p>
                                            <p class="loc"><span class="ion-ios-pin" style="color: red;"></span> п.Нукутталахти, ул.Центральная, д.35А</p>
                                            <ul>
                                                <li><span class="flaticon-double" title="1 двуспальная и 3 односпальные кровати"></span></li>
                                                <li><span class="flaticon-sofa" title="Возможно размещение на односпальном раскладном диване"></span></li>
                                                <li><span class="flaticon-hot" title="Теплые полы"></span></li>
                                                <li><span class="flaticon-panoramic-view" title="Вид из окна"></span></li>
                                                <li><span class="flaticon-watching-tv" title="Телевизор"></span></li>
                                                <li><span class="flaticon-wifi" title="Wi-Fi"></span></li>
                                                <li><span class="flaticon-washer" title="Стиральная машина"></span></li>
                                                <li><span class="flaticon-refrigerator" title="Холодильник"></span></li>
                                                <li><span class="flaticon-stove" title="Плита"></span></li>
                                                <li><span class="flaticon-microwave" title="Свч-печь"></span></li>
                                                <li><span class="flaticon-shower" title="Душ"></span></li>
                                                <li><span class="flaticon-bbq" title="Барбекю"></span></li>
                                                <li><span class="flaticon-parked-car" title="Парковка"></span></li>
                                            </ul>
                                            <div class="row">
                                                <div class="col-md-12 ftco-animate">
                                                    <div class="conf-btn" style="text-align: center;"><a href="/chernika-v-zalive" id="reserve1" style="background:#f9ab30!important;color:#161616!important;border:1px solid #dddddd!important;box-shadow:none!important;font-weight:700" class="btn btn-primary py-3 px-4 ftco-animate"><i class="ion-ios-information-circle"></i> Подробнее</a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>',
        5 => '<div class="col-md-4">
                                <div class="ftco-animate">
                                    <div class="project-wrap">
                                        <a class="img scroll-elem" style="background-image: url(images/houses/nukutalo/2.webp);"></a>
                                        <div class="text p-4">
                                            <span class="days">от 2 суток</span>
                                            <h3><a class="scroll-elem">Nukutalo</a></h3>
                                            <p class="loc" style="margin-bottom: auto;"><span class="ion-ios-person" style="color: green;"></span> до 4 человек</p>
                                            <p class="loc"><span class="ion-ios-pin" style="color: red;"></span> п.Нукутталахти, ул.Центральная, д.56г</p>
                                            <ul>
                                                <li><span class="flaticon-double" title="1 двуспальная кровать и 1 диван в гостиной"></span></li>
                                                <li><span class="flaticon-sofa" title="4-е место обеспечивается раскладушкой"></span></li>
                                                <li><span class="flaticon-hot" title="Теплые полы"></span></li>
                                                <li><span class="flaticon-panoramic-view" title="Вид из окна"></span></li>
                                                <li><span class="flaticon-watching-tv" title="Телевизор"></span></li>
                                                <li><span class="flaticon-wifi" title="Wi-Fi"></span></li>
                                                <li><span class="flaticon-sauna" title="Баня"></span></li>
                                                <li><span class="flaticon-refrigerator" title="Холодильник"></span></li>
                                                <li><span class="flaticon-stove" title="Плита"></span></li>
                                                <li><span class="flaticon-microwave" title="Свч-печь"></span></li>
                                                <li><span class="flaticon-shower" title="Душ"></span></li>
                                                <li><span class="flaticon-bbq" title="Барбекю"></span></li>
                                                <li><span class="flaticon-parked-car" title="Парковка"></span></li>
                                            </ul>
                                            <div class="row">
                                                <div class="col-md-12 ftco-animate">
                                                    <div class="conf-btn" style="text-align: center;"><a href="/nukutalo" id="reserve1" style="background:#f9ab30!important;color:#161616!important;border:1px solid #dddddd!important;box-shadow:none!important;font-weight:700" class="btn btn-primary py-3 px-4 ftco-animate"><i class="ion-ios-information-circle"></i> Подробнее</a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>',
        16 => '<div class="col-md-4">
                                <div class="ftco-animate">
                                    <div class="project-wrap">
                                        <a class="img scroll-elem" style="background-image: url(images/houses/chernaya-zhemchuzhina-4/18.webp);"></a>
                                        <div class="text p-4">
                                            <span class="days">от 2 суток</span>
                                            <h3><a class="scroll-elem">Черная жемчужина 45м2</a></h3>
                                            <p class="loc" style="margin-bottom: auto;"><span class="ion-ios-person" style="color: green;"></span> до 4 человек</p>
                                            <p class="loc"><span class="ion-ios-pin" style="color: red;"></span> п.Токкарлахти, Центральная д.66</p>
                                            <ul>
                                                <li><span class="flaticon-double" title="В доме расположены 2 односпальные полуторные кровати"></span></li>
                                                <li><span class="flaticon-sofa" title="2 места доступны в виде дивана в гостиной"></span></li>
                                                <li><span class="flaticon-hot" title="Теплые полы"></span></li>
                                                <li><span class="flaticon-panoramic-view" title="Панорамные окна"></span></li>
                                                <li><span class="flaticon-watching-tv" title="Телевизор"></span></li>
                                                <li><span class="flaticon-wifi" title="Wi-Fi"></span></li>
                                                <li><span class="flaticon-tea-cup" title="Чай"></span></li>
                                                <li><span class="flaticon-washer" title="Стиральная машина"></span></li>
                                                <li><span class="flaticon-refrigerator" title="Холодильник"></span></li>
                                                <li><span class="flaticon-stove" title="Плита"></span></li>
                                                <li><span class="flaticon-microwave" title="Свч-печь"></span></li>
                                                <li><span class="flaticon-shower" title="Душ"></span></li>
                                                <li><span class="flaticon-bbq" title="Барбекю"></span></li>
                                                <li><span class="flaticon-parked-car" title="Парковка"></span></li>
                                            </ul>
                                            <div class="row">
                                                <div class="col-md-12 ftco-animate">
                                                    <div class="conf-btn" style="text-align: center;"><a href="/chernaya-zhemchuzhina-5" id="reserve1" style="background:#f9ab30!important;color:#161616!important;border:1px solid #dddddd!important;box-shadow:none!important;font-weight:700" class="btn btn-primary py-3 px-4 ftco-animate"><i class="ion-ios-information-circle"></i> Подробнее</a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>'
    ];

    // получаем массив с опциями удобств в домах
    $housesOptionsArray = getHousesOptions();

    $data = '<div class="container">
                         <div class="row">';

    if ($houses_arr && !$all) {
        foreach ($houses_id as $key => $value) {
            if (in_array($key, $houses_arr)) {
                // првоеряем наличие опции удобств дял конкретного дома, если передан фильтр
                if (isset($filtersArray['filter']) && !isExistHouseOptions($housesOptionsArray[$key], $filtersArray['filter']))
                    continue;

                $data .= $value;
            }
        }
    } else if ($all) {
        foreach ($houses_id as $key => $value) {
            // првоеряем наличие опции удобств дял конкретного дома, если передан фильтр
            if (isset($filtersArray['filter']) && !isExistHouseOptions($housesOptionsArray[$key], $filtersArray['filter']))
                continue;

            $data .= $value;
        }
    } else
        $data .= '<div class="col-md-12">
                               <div class="ftco-animate">
                                   <h2 style="text-align: center;font-style: italic;color: #d54a4a;font-weight: 500;"><i class="icon-not_interested"></i>Ничего не найдено</h2>
                               </div>
                          </div>';

    $data .= '  </div>
                    </div>';

    return $data;
}

function urlParamsToArray($url, $returnParamsList = [])
{
    if (!$url)
        return [];

    $url = urldecode($url);                              // декодируем url строку, для замены кодируемых символов разделителей

    // формируем массив get параметров
    $arrayParams = explode("&", $url);
    if (!$arrayParams)
        return [];

    $result = [];

    // обход массива get параметров
    foreach ($arrayParams as $param) {
        // формируем массив из параметра и его значений
        $array = explode("=", $param, 2);
        if (!$array || count($array) < 2)
            continue;

        $paramName = $array[0];                          // название параметра
        $paramValues = $array[1];                        // значения параметра

        // если передан список возвращаемых параметров - пропускаем параметр, если он не указан
        if ($returnParamsList && !in_array($paramName, $returnParamsList))
            continue;

        $result[$paramName] = explode(",", $paramValues);
    }

    return $result;
}

function getSubscribeMenu()
{
    return $data = '<div class="set-question">
                            <span>Задать вопрос</span>
                        </div>
                        <div id="menu-toggle">
                            <input type="checkbox" id="menu-toggle-id"/>
                            <ul>
                                <li>
                                    <a rel="nofollow" href="https://vk.com/public212131932" target="_blank"><span class="icon-vk"></span></a>
                                </li>
                                <li>
                                    <a rel="nofollow" href="https://wa.me/message/I52QRRPOZYJEG1" target="_blank"><span class="icon-whatsapp"></span></a>
                                </li>
                                <li>
                                    <a rel="nofollow" href="https://t.me/+KmgBetu6NYtlNjcy" target="_blank"><span class="icon-telegram"></span></a>
                                </li>
                            </ul>
                        </div>
                        ';
}

function getFooter()
{
    return $data = '<footer class="ftco-footer bg-bottom lazyload" data-background-image="images/footer-bg.webp">
                          <div class="container">
                            <div class="row mb-5">
                              <div class="col-md">
                                <div class="ftco-footer-widget mb-4">
                                  <h2 class="ftco-heading-2">Возникли вопросы?</h2>
                                  <p>Звоните нам по указанным на сайте телефонам, пишите на почту и следите за новостями на официальных страницах соц. сетей</p>
                                  <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                    <!--            <li class="ftco-animate"><a rel="nofollow" href="https://instagram.com/sonniy_zaliv_sortavala?utm_medium=copy_link" target="_blank"><span class="icon-instagram"></span></a></li>-->
                                      <li class="ftco-animate"><a rel="nofollow" href="https://vk.com/public212131932" target="_blank"><span class="icon-vk"></span></a></li>
                                      <li class="ftco-animate"><a rel="nofollow" href="https://wa.me/message/I52QRRPOZYJEG1" target="_blank"><span class="icon-whatsapp"></span></a></li>
                                      <li class="ftco-animate"><a rel="nofollow" href="https://t.me/+KmgBetu6NYtlNjcy" target="_blank"><span class="icon-telegram"></span></a></li>
                                      <li class="ftco-animate"><a rel="nofollow" href="https://www.youtube.com/channel/UC3VGSE6WgQujUXpLhHTjH7A" target="_blank"><span class="icon-youtube"></span></a></li>
                                      <li class="ftco-animate"><a rel="nofollow" href="https://www.avito.ru/user/d85b3127cde8be346816977d68ea748a/profile?id=2443568322&src=item&page_from=from_item_card&iid=2443568322" target="_blank"><img style="width: inherit;margin: 13px 0;padding: 4px;" src="/icons/avito.svg" alt="Avito"></a></li>
                                  </ul>
                                </div>
                              </div>
                              <div class="col-md">
                                <div class="ftco-footer-widget mb-4 ml-md-5">
                                  <h2 class="ftco-heading-2">Информация</h2>
                                  <ul class="list-unstyled">
                                    <li><a href="/policy" class="py-2 d-block">Политика конфиденциальности</a></li>
                                    <li><a href="/images/tovarniy_znak.jpg" class="py-2 d-block">Действующий патент товарный знак "Сонный залив"</a></li>
                                    <li><a href="/agreement" class="py-2 d-block">Договор-оферта</a></li>
                                    <li><a href="/karelia-bani" class="py-2 d-block">Бани в Карелии</a></li>
                                    <li><a href="/media/docs/agreement-partners.docx" class="py-2 d-block" target="_blank">Договор-оферта для партнеров</a></li>
                                    <li><a href="/taksi" class="py-2 d-block">Такси Сортавала</a></li>
                                    <li><a href="/kafe-i-restorany" class="py-2 d-block">Кафе и рестораны в Карелии</a></li>
                                    <li><a href="/valaamskiy-monastyr-i-ladozhskie-shery" class="py-2 d-block">Валаамский монастырь и Ладожские "шхеры"</a></li>
                                    <li><a href="/ruskeala-gorniy-park" class="py-2 d-block">Горный парк Рускеала</a></li>
                                    <li><a href="/baza-otdyha-ili-gostevoy-dom" class="py-2 d-block">База отдыха или гостевой дом</a></li>
                                    <li><a href="/karelia-baza-otdyha" class="py-2 d-block">Базы отдыха в Карелии</a></li>
                                    <li><a href="/karelia-gostinici-doma" class="py-2 d-block">Гостиницы и дома отдыха в Карелии</a></li>
                                    <li><a href="/pogoda-v-karelii" class="py-2 d-block">Погода в Карелии</a></li>

                                  </ul>
                                </div>
                              </div>
                              <div class="col-md">
                                <div class="ftco-footer-widget mb-4">
                                    <h2 class="ftco-heading-2">Контактная информация</h2>
                                    <div class="block-23 mb-3">
                                      <ul>
                                        <li><span class="icon icon-map-marker"></span><span class="text">Россия, Республика Карелия, Сортавальское городское поселение, п. Нукутталахти, ул. Центральная, д. 52</span></li>
                                        <li><span class="icon icon-phone_iphone"></span><a href="tel://+79811878002"><span class="text">+7 (981) 187-80-02</span></a></li>
                                        <li><span class="icon icon-envelope-o"></span><a href="mailto:sonniyzaliv@yandex.ru"><span class="text">sonniyzaliv@yandex.ru</span></a></li>
                                      </ul>
                                    </div>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12 text-center">
                                    <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> Все права защищены | "Сонный залив" Официальный сайт</p>
                                    <p><img src="images/banners/pay.png" alt="Visa, MasterCard, МИР" title="Visa, MasterCard, МИР" loading="lazy"></p>
                                     <p><iframe title="Рейтинг Яндекс Сонный залив" src="https://yandex.ru/sprav/widget/rating-badge/222502182716" loading="lazy" width="150" height="50" frameborder="0"></iframe></p>
                              </div>
                            </div>
                          </div>
                        </footer>
                        ';
}
function formatHousesToListStrBotFormat($houses_arr)
{
    $res = "";

    if ($houses_arr) {
        foreach ($houses_arr as $house) {
            if ($res == "")
                $res = $house["id"] . " - " . $house["name"];

            else
                $res .= "\n" . $house["id"] . " - " . $house["name"];
        }
    }

    return $res;
}

function getOpenedDates($cur_dates_arr, $booking_dates)
{
    if (!$cur_dates_arr)
        return false;

    if (!$booking_dates)
        return $cur_dates_arr;

    $res = [];

    foreach ($cur_dates_arr as $curDate) {
        if (in_array($curDate, $booking_dates))
            continue;

        $res[] = $curDate;
    }

    return $res;
}

/// Метод для получения погоды на сегодня/на неделю на указанный город
///
///     -> $appID - API-ключ
///     -> $city  - название города (по-русски)
///     -> $mode  - 1 (на текущий день), 2 - (на неделю)
///
function getWeather($appID, $city, $mode = 1)
{
    // параметры по умолчанию для запроса погоды
    $country = "RU";                              // страна
    $units = "metric";                            // единицы измерения. metric или imperial
    $lang = "ru";                                 // язык

    // формируем урл для запроса
    if ($mode = 2) {
        $url = "http://api.openweathermap.org/data/2.5/forecast?q=$city,$country&lang=$lang&units=$units&appid=$appID";
    } else {
        $url = "http://api.openweathermap.org/data/2.5/weather?q=$city,$country&lang=$lang&units=$units&appid=$appID";
    }

    // делаем запрос к апи
    $weatherJSON = @file_get_contents($url);

    $weather = [];

    // декодируем полученные данные
    $weather = json_decode($weatherJSON);

    return $weather;
}

/// Метод для группировки массива с данными о погоде по дням и часам
///
///     -> $appID - API-ключ
///     -> $city  - название города (по-русски)
///     -> $mode  - 1 (на текущий день), 2 - (на неделю)
///
function groupWeatherArray($weatherArray)
{
    if (!$weatherArray) return [];

    $result = [];

    foreach ($weatherArray as $weather) {
        // дата и время погоды. Преобразуем в нужный формат
        $weatherDateTime = DateTime::createFromFormat('Y-m-d H:i:s', $weather->dt_txt);
        $weatherDate = $weatherDateTime->format('d.m.Y');
        $weatherTime = $weatherDateTime->format('H:i');

        $result[$weatherDate][$weatherTime] = json_decode(json_encode($weather), true);;
    }

    return $result;
}

/// Метод для обработки и преобразований данных о погоде в HTML вид
///
///     -> $weatherArray - массив с данными о погоде
///     -> $selectedDate - выбранная пользователем дата
///     -> $selectedTime - выбранное пользователем время
///
function initWeather($weatherArray, $selectedDate = "", $selectedTime = "")
{
    if (!$weatherArray) return "";

    $todayLabel = "";
    $location = "Сортавала, Карелия";

    // укажем текущую дату, если не пришла
    if (empty($selectedDate))
        $selectedDate = new DateTime();
    else
        $selectedDate = DateTime::createFromFormat('d.m.Y', $selectedDate);

    $selectedDateStr = $selectedDate->format("d.m.Y");
    $selectedDayName = $selectedDate->format("l");
    $selectedDayArray = translateDay($selectedDayName);                     // переводим название дня недели ENG -> RUS
    $selectedDayNameFull = $selectedDayArray['full'];                       // полное название дня
    $selectedDayNameShort = $selectedDayArray['short'];                     // краткое название дня

    $curDateTime = new DateTime();
    $curDateStr = $curDateTime->format("d.m.Y");

    if ($curDateStr == $selectedDateStr) {
        $todayLabel = "Сегодня, ";
        $viewDayName = $selectedDayNameShort;
    } else
        $viewDayName = $selectedDayNameFull;

    if (!empty($selectedTime))
        $weatherItem = $weatherArray[$selectedDateStr][$selectedTime];
    else {
        $keys = array_keys($weatherArray[$selectedDateStr]);
        $selectedTime = $keys[0];

        $weatherItem = $weatherArray[$selectedDateStr][$selectedTime];
    }

    $temp = round($weatherItem["main"]["temp"]);                            // температура на данный момент
    //$tempFeelsLike = round($weatherItem["main"]["feels_like"]);           // как ощущается температура по факту
    $weatherPressure = $weatherItem["main"]["pressure"];                    // давление
    $weatherPressure = round(760 * ($weatherPressure) / 1013);
    $weatherHumidity = $weatherItem["main"]["humidity"];                    // влажность
    $windSpeed = $weatherItem["wind"]["speed"];                             // скорость ветра
    $weatherDesc = ucfirst($weatherItem["weather"][0]["description"]);      // описание погоды (на русском)
    $weatherMain = $weatherItem["weather"][0]["main"];                      // описание погоды (на английском)
    $weatherPicture = getWeatherPicture($weatherMain);                      // фоновая картинка погоды
    $weatherIcon = getWeatherIcon($weatherMain);                            // иконка погоды

    $txtSlideHours = "";
    $txtSlideDays = "";

    foreach ($weatherArray as $key => $value) {
        $keys = array_keys($value);
        $firstHour = $keys[0];

        $avgTempDay = countAverageTemp($value);
        $mainDay = $value[$firstHour]["weather"][0]["main"];                // описание погоды (на английском)
        $iconDay = getWeatherIcon($mainDay);                                // иконка погоды

        // дата и время погоды. Преобразуем в нужный формат
        $dateTimeDay = DateTime::createFromFormat('Y-m-d H:i:s', $value[$firstHour]["dt_txt"]);
        $dayNameDay = $dateTimeDay->format("l");
        $dayArrayDay = translateDay($dayNameDay);                           // переводим название дня недели ENG -> RUS
        $dayNameShortDay = $dayArrayDay['short'];                           // краткое название дня

        $activeDay = "";

        if ($key == $selectedDateStr)
            $activeDay = " active";

        $txtSlideDays .= '<div class="swiper-slide">
                                     <div class="weather-item' . $activeDay . '" date="' . $key . '">
                                         <i class="day-icon" data-feather="' . $iconDay . '"></i>
                                         <span class="day-name">' . $dayNameShortDay . '</span>
                                         <span class="day-temp">' . $avgTempDay . '°C</span>
                                     </div>
                                  </div>
                ';
    }

    foreach ($weatherArray[$selectedDateStr] as $hour => $items) {
        $tempHours = round($items["main"]["temp"]);                     // температура на данный момент
        $mainHours = $items["weather"][0]["main"];                      // описание погоды (на английском)
        $iconHours = getWeatherIcon($mainHours);                        // иконка погоды

        $activeHour = "";

        if ($hour == $selectedTime)
            $activeHour = " active";

        $txtSlideHours .= '<div class="swiper-slide">
                                      <div class="weather-item' . $activeHour . '" date="' . $selectedDateStr . '" hour="' . $hour . '">
                                          <i class="day-icon" data-feather="' . $iconHours . '"></i>
                                          <span class="day-name">' . $hour . '</span>
                                          <span class="day-temp">' . $tempHours . '°C</span>
                                      </div>
                                   </div>
                ';
    }

    return '    <div class="weather-side" style="background-image: url(' . $weatherPicture . ');">
                            <div class="weather-gradient"></div>
                            <div class="date-container ftco-animate">
                                <span class="date-dayname">' . $todayLabel . $viewDayName . '</span>
                                <span class="date-day">' . $selectedDateStr . ' ' . $selectedTime . '</span>
                                <i class="location-icon" data-feather="map-pin"></i>
                                <span class="location">' . $location . '</span>
                            </div>
                            <div class="weather-container ftco-animate">
                                <i class="weather-icon" data-feather="' . $weatherIcon . '"></i>
                                <p class="weather-temp">' . $temp . '°C</p>
                                <p class="weather-desc">' . $weatherDesc . '</p>
                            </div>
                        </div>
                        <div class="info-side">
                            <div class="today-info-container ftco-animate">
                                <div class="today-info">
                                    <div class="precipitation">
                                        <span class="title">ДАВЛЕНИЕ</span>
                                        <span class="value">' . $weatherPressure . ' мм.рт.ст</span>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="humidity">
                                        <span class="title">ВЛАЖНОСТЬ</span>
                                        <span class="value">' . $weatherHumidity . ' %</span>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="wind">
                                        <span class="title">ВЕТЕР</span>
                                        <span class="value">' . $windSpeed . ' м/с</span>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="week-container ftco-animate">
                                <div class="ftco-animate" style="text-align: center; padding-top: 15px">
                                    <span class="title">°C по времени (' . $todayLabel . $viewDayName . ')</span>
                                    <div class="clear"></div>
                                </div>
                                <div class="weather-block">
                                    <div class="swiper-weather-hours ftco-animate">
                                        <!-- Additional required wrapper -->
                                        <div class="swiper-wrapper">
                                            <!-- Slides -->
                                            ' . $txtSlideHours . '
                                            <div class="clear"></div>
                                        </div>
                                        <!-- If we need pagination -->
                                        <div class="swiper-pagination"></div>

                                        <!-- If we need navigation buttons -->
                                        <div class="swiper-button-prev" style="left: 0"></div>
                                        <div class="swiper-button-next" style="right: 0"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="week-container ftco-animate">
                                <div class="ftco-animate" style="text-align: center; padding-top: 15px">
                                    <span class="title">°C на неделю (средняя)</span>
                                    <div class="clear"></div>
                                </div>
                                <div class="weather-block">
                                    <div class="swiper-weather-days ftco-animate">
                                        <!-- Additional required wrapper -->
                                        <div class="swiper-wrapper">
                                            <!-- Slides -->
                                            ' . $txtSlideDays . '
                                            <div class="clear"></div>
                                        </div>
                                        <!-- If we need pagination -->
                                        <div class="swiper-pagination"></div>

                                        <!-- If we need navigation buttons -->
                                        <div class="swiper-button-prev" style="left: 0"></div>
                                        <div class="swiper-button-next" style="right: 0"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
            ';
}

/// Метод для подсчета средней температуры за сутки
///
///     -> $weatherDayArray - массив с температурой по часам для конкретной даты
///
function countAverageTemp($weatherDayArray)
{
    if (!$weatherDayArray) return 0;

    $tempSum = 0;
    $countTemp = 0;

    foreach ($weatherDayArray as $hour => $items) {
        $tempSum += round($items["main"]["temp"]);                         // температура на данный момент
        $countTemp++;
    }

    return round($tempSum / $countTemp);
}

/// Метод для получения фоновой картинки, соответствующей погоде
///
///     -> $dayName   - полное название дня недели на RUS/ENG
///     -> $direction - направление перевода
///        --> 1 - ENG -> RUS (по умолчанию)
///        --> 2 - RUS -> ENG
///
function translateDay($dayName, $direction = 1)
{
    if (!$dayName)
        return "";

    $result = [];

    if ($direction) {
        switch ($dayName) {
            case "Monday":
                $result = array(
                    "full" => "Понедельник",
                    "short" => "Пн"
                );
                break;
            case "Tuesday":
                $result = array(
                    "full" => "Вторник",
                    "short" => "Вт"
                );
                break;
            case "Wednesday":
                $result = array(
                    "full" => "Среда",
                    "short" => "Ср"
                );
                break;
            case "Thursday":
                $result = array(
                    "full" => "Четверг",
                    "short" => "Чт"
                );
                break;
            case "Friday":
                $result = array(
                    "full" => "Пятница",
                    "short" => "Пт"
                );
                break;
            case "Saturday":
                $result = array(
                    "full" => "Суббота",
                    "short" => "Сб"
                );
                break;
            case "Sunday":
                $result = array(
                    "full" => "Воскресенье",
                    "short" => "Вс"
                );
                break;
        }
    } else {
        switch ($dayName) {
            case "Понедельник":
                $result = array(
                    "full" => "Monday",
                    "short" => "Mon"
                );
                break;
            case "Вторник":
                $result = array(
                    "full" => "Tuesday",
                    "short" => "Tue"
                );
                break;
            case "Среда":
                $result = array(
                    "full" => "Wednesday",
                    "short" => "Wed"
                );
                break;
            case "Четверг":
                $result = array(
                    "full" => "Thursday",
                    "short" => "Thu"
                );
                break;
            case "Пятница":
                $result = array(
                    "full" => "Friday",
                    "short" => "Fri"
                );
                break;
            case "Суббота":
                $result = array(
                    "full" => "Saturday",
                    "short" => "Sat"
                );
                break;
            case "Воскресекье":
                $result = array(
                    "full" => "Sunday",
                    "short" => "Sun"
                );
                break;
        }
    }

    return $result;
}

/// Метод для получения фоновой картинки, соответствующей погоде
///
///     -> $weatherName - название погоды (на английском, см. weather->main в протоколе API)
///
function getWeatherPicture($weatherName)
{
    if ($weatherName == "Clear") return "/images/other/pogoda-v-karelii/clear.webp";
    if ($weatherName == "Clouds") return "/images/other/pogoda-v-karelii/clouds.webp";
    if ($weatherName == "Rain") return "/images/other/pogoda-v-karelii/rain.webp";
    if ($weatherName == "Snow") return "/images/other/pogoda-v-karelii/snow.webp";

    return "";
}

/// Метод для получения фоновой картинки, соответствующей погоде
///
///     -> $weatherName - название погоды (на английском, см. weather->main в протоколе API)
///
function getWeatherIcon($weatherName)
{
    if ($weatherName == "Clear") return "sun";
    if ($weatherName == "Clouds") return "cloud";
    if ($weatherName == "Rain") return "cloud-rain";
    if ($weatherName == "Snow") return "cloud-snow";
    if ($weatherName == "Rainy") return "cloud-drizzle";

    return "";
}

function formatDatesToListStrBot($dates_arr, $oneDayRange, $formatType)
{
    $res = "";

    if ($dates_arr) {
        if ($formatType == 1) {
            foreach ($dates_arr as $date) {
                $convertedDate = new DateTime($date);
                $convertedDate = $convertedDate->format('d.m.Y');

                if ($res == "")
                    $res = "- " . $convertedDate;

                else
                    $res .= "\n" . "- " . $convertedDate;
            }
        } else if ($formatType == 2) {
            $lastAddDate = "";
            $counter = 1;
            $datesArrCount = count($dates_arr);
            $periodArr = [];

            foreach ($dates_arr as $date) {
                $convertedDate = new DateTime($date);
                $convertedDateFirst = new DateTime($date);
                $convertedMonthLastDate = new DateTime($date);

                $convertedDate = $convertedDate->format('d.m.Y');
                $convertedDateFirst = $convertedDateFirst->format('01.m.Y');

                $convertedMonthLastDate->modify('last day of this month');
                $convertedMonthLastDate = $convertedMonthLastDate->format('d.m.Y');

                $convertedLastDate = new DateTime($lastAddDate);
                $convertedLastDate->add(new DateInterval('P1D'));
                $convertedLastDate = $convertedLastDate->format('d.m.Y');

                foreach ($oneDayRange as $datesArr) {
                    $arrDateSt = new DateTime($datesArr['date_start']);
                    $arrDateSt = $arrDateSt->format('d.m.Y');

                    if ($arrDateSt == $convertedDate) {
                        $dateStart = array_shift($periodArr);

                        if (!is_null($dateStart))
                            $res .= "\nс " . $dateStart . " по " . $convertedDate;

                        $periodArr = [];

                        $lastAddDate = "";

                        $counter++;

                        continue 2;
                    }
                }

                if ($convertedDate == $convertedLastDate || empty($lastAddDate))
                    $periodArr[] = $convertedDate;

                if (($convertedDate != $convertedLastDate && !empty($lastAddDate)) || $counter == $datesArrCount) {
                    if (count($periodArr) == 1) {
                        $date = array_shift($periodArr);

                        if ($convertedDateFirst == $date)
                            $res .= "\nдо " . $date;

                        else if ($convertedMonthLastDate == $date)
                            $res .= "\nс " . $date . " и далее";
                    } else {
                        $dateStart = array_shift($periodArr);
                        $dateEnd = array_pop($periodArr);

                        $res .= "\nс " . $dateStart . " по " . $dateEnd;
                    }

                    $periodArr = [];
                    $periodArr[] = $convertedDate;
                }

                $lastAddDate = $convertedDate;

                $counter++;
            }
        }
    }

    return $res;
}

function formatDatesToRangeStrBot($booking_arr)
{
    $res = "";

    if ($booking_arr) {
        $counter = 1;

        foreach ($booking_arr as $book) {
            $convertedDateIn = new DateTime($book["date_in"]);
            $convertedDateOut = new DateTime($book["date_out"]);

            $convertedDateIn = $convertedDateIn->format('d.m.Y');
            $convertedDateOut = $convertedDateOut->format('d.m.Y');

            if ($res == "")
                $res = $counter . ") " . $convertedDateIn . " - " . $convertedDateOut;

            else
                $res .= "\n" . $counter . ") " . $convertedDateIn . " - " . $convertedDateOut;

            $counter++;
        }
    }

    return $res;
}

function getHousePhotos($house_id)
{
    $houses_info = [
        3 => 'Сонный Залив',
        4 => 'Дом на берегу',
        5 => 'Nukutalo',
        6 => 'Зелёный дом',
        7 => 'Синий дом',
        8 => 'Черника в Нукутталахти',
        9 => 'Черника в Заливе',
        10 => 'Восточный с камином',
        11 => 'Солнечный',
        12 => 'Черная жемчужина 80м2',
        13 => 'Черная жемчужина №2',
        14 => 'Черная жемчужина №3',
        15 => 'Черная жемчужина №4',
        16 => 'Черная жемчужина 45м2',
        17 => 'Лунный Залив',
        18 => 'Полярная станция 160м2',
        19 => 'Мини-гостиница Альда'
    ];

    $house_photos = [
        3 => [
            "images/houses/sonniy-zaliv/letonew/IMG_1000.webp",
            "images/houses/sonniy-zaliv/letonew/IMG_1001.webp",
            "images/houses/sonniy-zaliv/letonew/IMG_1002.webp",
            "images/houses/sonniy-zaliv/letonew/IMG_1003.webp",
            "images/houses/sonniy-zaliv/letonew/IMG_1005.webp",
            "images/houses/sonniy-zaliv/letonew/IMG_1006.webp",
            "images/houses/sonniy-zaliv/letonew/IMG_1007.webp",
            "images/houses/sonniy-zaliv/letonew/IMG_1008.webp",
            "images/houses/sonniy-zaliv/letonew/IMG_1009.webp",
            "images/houses/sonniy-zaliv/letonew/IMG_1009a.webp",
            "images/houses/sonniy-zaliv/letonew/IMG_1010.webp",
            "images/houses/sonniy-zaliv/letonew/IMG_1011.webp",
            "images/houses/sonniy-zaliv/letonew/IMG_1012.webp",
            "images/houses/sonniy-zaliv/letonew/IMG_1013.webp",
            "images/houses/sonniy-zaliv/letonew/IMG_1014.webp",
            "images/houses/sonniy-zaliv/letonew/IMG_1015.webp",
            "images/houses/sonniy-zaliv/letonew/IMG_1016.webp",
            "images/houses/sonniy-zaliv/letonew/IMG_1017.webp",
            "images/houses/sonniy-zaliv/letonew/IMG_1018.webp",
            "images/houses/sonniy-zaliv/letonew/IMG_1019.webp",
            "images/houses/sonniy-zaliv/letonew/IMG_1020.webp",
            "images/houses/sonniy-zaliv/letonew/IMG_1021.webp",
            "images/houses/sonniy-zaliv/letonew/IMG_1025.webp",
            "images/houses/sonniy-zaliv/letonew/IMG_1026.webp",
        ],
        4 => [
            "images/houses/na-beregu/leto/5.webp",
            "images/houses/na-beregu/leto/2.webp",
            "images/houses/na-beregu/leto/3.webp",
            "images/houses/na-beregu/leto/6.webp",
            "images/houses/na-beregu/leto/7.webp",
            "images/houses/na-beregu/leto/8.webp",
            "images/houses/na-beregu/1.webp",
            "images/houses/na-beregu/2.webp",
            "images/houses/na-beregu/3.webp",
            "images/houses/na-beregu/4.webp",
            "images/houses/na-beregu/5.webp",
            "images/houses/na-beregu/6.webp",
            "images/houses/na-beregu/7.webp",
            "images/houses/na-beregu/8.webp",
            "images/houses/na-beregu/9.webp",
            "images/houses/na-beregu/28.webp",
            "images/houses/na-beregu/29.webp",
            "images/houses/na-beregu/30.webp",
            "images/houses/na-beregu/31.webp",
            "images/houses/na-beregu/32.webp",
            "images/houses/na-beregu/33.webp",
            "images/houses/na-beregu/34.webp",
            "images/houses/na-beregu/35.webp",
            "images/houses/na-beregu/36.webp",
            "images/houses/na-beregu/37.webp",
            "images/houses/na-beregu/38.webp",
            "images/houses/na-beregu/10.webp",
            "images/houses/na-beregu/11.webp",
            "images/houses/na-beregu/12.webp",
            "images/houses/na-beregu/13.webp",
            "images/houses/na-beregu/14.webp",
            "images/houses/na-beregu/15.webp",
            "images/houses/na-beregu/16.webp",
            "images/houses/na-beregu/17.webp",
            "images/houses/na-beregu/18.webp",
            "images/houses/na-beregu/20.webp",
            "images/houses/na-beregu/21.webp",
            "images/houses/na-beregu/22.webp"
        ],
        5 => [
            "images/houses/nukutalo/2.webp",
            "images/houses/nukutalo/1.webp",
            "images/houses/nukutalo/3.webp",
            "images/houses/nukutalo/4.webp",
            "images/houses/nukutalo/5.webp",
            "images/houses/nukutalo/6.webp",
            "images/houses/nukutalo/7.webp",
            "images/houses/nukutalo/9.webp",
            "images/houses/nukutalo/10.webp",
            "images/houses/nukutalo/11.webp",
            "images/houses/nukutalo/12.webp",
            "images/houses/nukutalo/13.webp",
            "images/houses/nukutalo/14.webp",
            "images/houses/nukutalo/15.webp",
            "images/houses/nukutalo/16.webp",
            "images/houses/nukutalo/17.webp",
            "images/houses/nukutalo/19.webp",
            "images/houses/nukutalo/20.webp",
            "images/houses/nukutalo/21.webp",
            "images/houses/nukutalo/22.webp",
            "images/houses/nukutalo/23.webp"
        ],
        6 => [
            "images/houses/zeleniy-dom/leto/1.webp",
            "images/houses/zeleniy-dom/leto/2.webp",
            "images/houses/zeleniy-dom/leto/5.webp",
            "images/houses/zeleniy-dom/3.webp",
            "images/houses/zeleniy-dom/5.webp",
            "images/houses/zeleniy-dom/6.webp",
            "images/houses/zeleniy-dom/7.webp",
            "images/houses/zeleniy-dom/8.webp",
            "images/houses/zeleniy-dom/10.webp",
            "images/houses/zeleniy-dom/15.webp",
            "images/houses/zeleniy-dom/16.webp",
            "images/houses/zeleniy-dom/17.webp",
            "images/houses/zeleniy-dom/18.webp",
            "images/houses/zeleniy-dom/19.webp",
            "images/houses/zeleniy-dom/23.webp",
            "images/houses/zeleniy-dom/24.webp",
            "images/houses/zeleniy-dom/28.webp",
        ],
        7 => [
            "images/houses/siniy-dom/leto/2.webp",
            "images/houses/siniy-dom/leto/3.webp",
            "images/houses/siniy-dom/leto/5.webp",
            "images/houses/siniy-dom/leto/6.webp",
            "images/houses/siniy-dom/4.webp",
            "images/houses/siniy-dom/7.webp",
            "images/houses/siniy-dom/8.webp",
            "images/houses/siniy-dom/9.webp",
            "images/houses/siniy-dom/10.webp",
            "images/houses/siniy-dom/11.webp",
            "images/houses/siniy-dom/14.webp",
            "images/houses/siniy-dom/16.webp",
            "images/houses/siniy-dom/19.webp",
            "images/houses/siniy-dom/20.webp",
            "images/houses/siniy-dom/22.webp",
            "images/houses/siniy-dom/24.webp",
        ],
        8 => [
            "images/houses/chernika-v-nukuttalahti/leto/12.webp",
            "images/houses/chernika-v-nukuttalahti/leto/13.webp",
            "images/houses/chernika-v-nukuttalahti/leto/14.webp",
            "images/houses/chernika-v-nukuttalahti/leto/15.webp",
            "images/houses/chernika-v-nukuttalahti/leto/16.webp",
            "images/houses/chernika-v-nukuttalahti/leto/17.webp",
            "images/houses/chernika-v-nukuttalahti/leto/18.webp",
            "images/houses/chernika-v-nukuttalahti/leto/10.webp",
            "images/houses/chernika-v-nukuttalahti/leto/1.webp",
            "images/houses/chernika-v-nukuttalahti/leto/2.webp",
            "images/houses/chernika-v-nukuttalahti/leto/3.webp",
            "images/houses/chernika-v-nukuttalahti/leto/4.webp",
            "images/houses/chernika-v-nukuttalahti/leto/7.webp",
            "images/houses/chernika-v-nukuttalahti/leto/8.webp",
            "images/houses/chernika-v-nukuttalahti/leto/9.webp",
            "images/houses/chernika-v-nukuttalahti/leto/10.webp",
            "images/houses/chernika-v-nukuttalahti/leto/11.webp",
            "images/houses/chernika-v-nukuttalahti/5.webp",
            "images/houses/chernika-v-nukuttalahti/6.webp",
            "images/houses/chernika-v-nukuttalahti/7.webp",
            "images/houses/chernika-v-nukuttalahti/8.webp",
            "images/houses/chernika-v-nukuttalahti/9.webp",
            "images/houses/chernika-v-nukuttalahti/10.webp",
            "images/houses/chernika-v-nukuttalahti/11.webp",
            "images/houses/chernika-v-nukuttalahti/12.webp",
            "images/houses/chernika-v-nukuttalahti/13.webp",
            "images/houses/chernika-v-nukuttalahti/leto/5.webp",
            "images/houses/chernika-v-nukuttalahti/15.webp",
            "images/houses/chernika-v-nukuttalahti/16.webp",
            "images/houses/chernika-v-nukuttalahti/leto/6.webp"
        ],
        9 => [
            "images/houses/chernika-v-sonnom-zalive/leto/12.webp",
            "images/houses/chernika-v-sonnom-zalive/leto/13.webp",
            "images/houses/chernika-v-sonnom-zalive/leto/14.webp",
            "images/houses/chernika-v-sonnom-zalive/leto/15.webp",
            "images/houses/chernika-v-sonnom-zalive/leto/16.webp",
            "images/houses/chernika-v-sonnom-zalive/leto/17.webp",
            "images/houses/chernika-v-sonnom-zalive/leto/18.webp",
            "images/houses/chernika-v-sonnom-zalive/leto/2.webp",
            "images/houses/chernika-v-sonnom-zalive/leto/4.webp",
            "images/houses/chernika-v-sonnom-zalive/leto/1.webp",
            "images/houses/chernika-v-sonnom-zalive/leto/3.webp",
            "images/houses/chernika-v-sonnom-zalive/leto/7.webp",
            "images/houses/chernika-v-sonnom-zalive/leto/8.webp",
            "images/houses/chernika-v-sonnom-zalive/leto/9.webp",
            "images/houses/chernika-v-sonnom-zalive/leto/10.webp",
            "images/houses/chernika-v-sonnom-zalive/leto/11.webp",
            "images/houses/chernika-v-sonnom-zalive/5.webp",
            "images/houses/chernika-v-sonnom-zalive/7.webp",
            "images/houses/chernika-v-sonnom-zalive/8.webp",
            "images/houses/chernika-v-sonnom-zalive/9.webp",
            "images/houses/chernika-v-sonnom-zalive/10.webp",
            "images/houses/chernika-v-sonnom-zalive/11.webp",
            "images/houses/chernika-v-sonnom-zalive/12.webp",
            "images/houses/chernika-v-sonnom-zalive/13.webp",
            "images/houses/chernika-v-sonnom-zalive/15.webp",
            "images/houses/chernika-v-sonnom-zalive/16.webp",
            "images/houses/chernika-v-sonnom-zalive/leto/6.webp",
            "images/houses/chernika-v-sonnom-zalive/leto/5.webp"
        ],
        10 => [
            "images/houses/vostochniy/1.webp",
            "images/houses/vostochniy/2.webp",
            "images/houses/vostochniy/3.webp",
            "images/houses/vostochniy/4.webp",
            "images/houses/vostochniy/5.webp",
            "images/houses/vostochniy/6.webp",
            "images/houses/vostochniy/7.webp",
            "images/houses/vostochniy/8.webp",
            "images/houses/vostochniy/9.webp",
            "images/houses/vostochniy/10.webp",
            "images/houses/vostochniy/11.webp",
            "images/houses/vostochniy/12.webp",
            "images/houses/vostochniy/13.webp",
            "images/houses/vostochniy/14.webp",
            "images/houses/vostochniy/15.webp"
        ],
        11 => [
            "images/houses/solnechniy/leto/1.webp",
            "images/houses/solnechniy/leto/2.webp",
            "images/houses/solnechniy/leto/4.webp",
            "images/houses/solnechniy/leto/11.webp",
            "images/houses/solnechniy/leto/14.webp",
            "images/houses/solnechniy/leto/15.webp",
            "images/houses/zeleniy-dom/3.webp",
            "images/houses/zeleniy-dom/5.webp",
            "images/houses/zeleniy-dom/6.webp",
            "images/houses/zeleniy-dom/7.webp",
            "images/houses/zeleniy-dom/8.webp",
            "images/houses/zeleniy-dom/9.webp",
            "images/houses/zeleniy-dom/10.webp",
            "images/houses/zeleniy-dom/12.webp",
            "images/houses/zeleniy-dom/13.webp"
        ],
        12 => [
            "images/houses/chernaya-zhemchuzhina/3.webp",
            "images/houses/chernaya-zhemchuzhina/1.webp",
            "images/houses/chernaya-zhemchuzhina/2.webp",
            "images/houses/chernaya-zhemchuzhina/zima/4.webp",
            "images/houses/chernaya-zhemchuzhina/4.webp",
            "images/houses/chernaya-zhemchuzhina/5.webp",
            "images/houses/chernaya-zhemchuzhina/6.webp",
            "images/houses/chernaya-zhemchuzhina/7.webp",
            "images/houses/chernaya-zhemchuzhina/8.webp",
            "images/houses/chernaya-zhemchuzhina/9.webp",
            "images/houses/chernaya-zhemchuzhina/10.webp",
            "images/houses/chernaya-zhemchuzhina/11.webp",
            "images/houses/chernaya-zhemchuzhina/12.webp",
            "images/houses/chernaya-zhemchuzhina/13.webp",
            "images/houses/chernaya-zhemchuzhina/14.webp",
            "images/houses/chernaya-zhemchuzhina/15.webp",
            "images/houses/chernaya-zhemchuzhina/16.webp",
            "images/houses/chernaya-zhemchuzhina/17.webp",
            "images/houses/chernaya-zhemchuzhina/18.webp",
            "images/houses/chernaya-zhemchuzhina/19.webp",
            "images/houses/chernaya-zhemchuzhina/20.webp",
            "images/houses/chernaya-zhemchuzhina/21.webp",
            "images/houses/chernaya-zhemchuzhina/22.webp",
        ],
        13 => [
            "images/houses/chernaya-zhemchuzhina/zima/1.webp",
            "images/houses/chernaya-zhemchuzhina/zima/2.webp",
            "images/houses/chernaya-zhemchuzhina/zima/3.webp",
            "images/houses/chernaya-zhemchuzhina/zima/4.webp",
            "images/houses/chernaya-zhemchuzhina/zima/5.webp",
            "images/houses/chernaya-zhemchuzhina/zima/6.webp",
            "images/houses/chernaya-zhemchuzhina/zima/7.webp",
            "images/houses/chernaya-zhemchuzhina/zima/8.webp",
            "images/houses/chernaya-zhemchuzhina/1.webp",
            "images/houses/chernaya-zhemchuzhina/2.webp",
            "images/houses/chernaya-zhemchuzhina/3.webp",
            "images/houses/chernaya-zhemchuzhina/4.webp",
            "images/houses/chernaya-zhemchuzhina/5.webp",
            "images/houses/chernaya-zhemchuzhina/6.webp",
            "images/houses/chernaya-zhemchuzhina/7.webp",
            "images/houses/chernaya-zhemchuzhina/8.webp",
            "images/houses/chernaya-zhemchuzhina/9.webp",
            "images/houses/chernaya-zhemchuzhina/10.webp",
            "images/houses/chernaya-zhemchuzhina/11.webp",
            "images/houses/chernaya-zhemchuzhina/12.webp",
            "images/houses/chernaya-zhemchuzhina/13.webp"
        ],
        14 => [
            "images/houses/chernaya-zhemchuzhina/zima/1.webp",
            "images/houses/chernaya-zhemchuzhina/zima/2.webp",
            "images/houses/chernaya-zhemchuzhina/zima/3.webp",
            "images/houses/chernaya-zhemchuzhina/zima/4.webp",
            "images/houses/chernaya-zhemchuzhina/zima/5.webp",
            "images/houses/chernaya-zhemchuzhina/zima/6.webp",
            "images/houses/chernaya-zhemchuzhina/zima/7.webp",
            "images/houses/chernaya-zhemchuzhina/zima/8.webp",
            "images/houses/chernaya-zhemchuzhina/1.webp",
            "images/houses/chernaya-zhemchuzhina/2.webp",
            "images/houses/chernaya-zhemchuzhina/3.webp",
            "images/houses/chernaya-zhemchuzhina/4.webp",
            "images/houses/chernaya-zhemchuzhina/5.webp",
            "images/houses/chernaya-zhemchuzhina/6.webp",
            "images/houses/chernaya-zhemchuzhina/7.webp",
            "images/houses/chernaya-zhemchuzhina/8.webp",
            "images/houses/chernaya-zhemchuzhina/9.webp",
            "images/houses/chernaya-zhemchuzhina/10.webp",
            "images/houses/chernaya-zhemchuzhina/11.webp",
            "images/houses/chernaya-zhemchuzhina/12.webp",
            "images/houses/chernaya-zhemchuzhina/13.webp"
        ],
        15 => [
            "images/houses/chernaya-zhemchuzhina-4/zima/1.webp",
            "images/houses/chernaya-zhemchuzhina-4/zima/2.webp",
            "images/houses/chernaya-zhemchuzhina-4/zima/3.webp",
            "images/houses/chernaya-zhemchuzhina-4/zima/4.webp",
            "images/houses/chernaya-zhemchuzhina-4/zima/5.webp",
            "images/houses/chernaya-zhemchuzhina-4/zima/6.webp",
            "images/houses/chernaya-zhemchuzhina-4/1.webp",
            "images/houses/chernaya-zhemchuzhina-4/2.webp",
            "images/houses/chernaya-zhemchuzhina-4/3.webp",
            "images/houses/chernaya-zhemchuzhina-4/4.webp",
            "images/houses/chernaya-zhemchuzhina-4/5.webp",
            "images/houses/chernaya-zhemchuzhina-4/6.webp",
            "images/houses/chernaya-zhemchuzhina-4/7.webp",
            "images/houses/chernaya-zhemchuzhina-4/8.webp",
            "images/houses/chernaya-zhemchuzhina-4/9.webp",
            "images/houses/chernaya-zhemchuzhina-4/10.webp"
        ],
        16 => [
            "images/houses/chernaya-zhemchuzhina-4/18.webp",
            "images/houses/chernaya-zhemchuzhina-4/1.webp",
            "images/houses/chernaya-zhemchuzhina-4/2.webp",
            "images/houses/chernaya-zhemchuzhina-4/3.webp",
            "images/houses/chernaya-zhemchuzhina-4/4.webp",
            "images/houses/chernaya-zhemchuzhina-4/5.webp",
            "images/houses/chernaya-zhemchuzhina-4/6.webp",
            "images/houses/chernaya-zhemchuzhina-4/7.webp",
            "images/houses/chernaya-zhemchuzhina-4/8.webp",
            "images/houses/chernaya-zhemchuzhina-4/9.webp",
            "images/houses/chernaya-zhemchuzhina-4/10.webp",
            "images/houses/chernaya-zhemchuzhina-4/11.webp",
            "images/houses/chernaya-zhemchuzhina-4/12.webp",
            "images/houses/chernaya-zhemchuzhina-4/13.webp",
            "images/houses/chernaya-zhemchuzhina-4/14.webp",
            "images/houses/chernaya-zhemchuzhina-4/zima/1.webp",
            "images/houses/chernaya-zhemchuzhina-4/15.webp",
            "images/houses/chernaya-zhemchuzhina-4/16.webp",
            "images/houses/chernaya-zhemchuzhina-4/17.webp",
        ],
        17 => [
            "images/houses/lunniy-zaliv/23.webp",
            "images/houses/lunniy-zaliv/14.webp",
            "images/houses/lunniy-zaliv/19.webp",
            "images/houses/lunniy-zaliv/18.webp",
            "images/houses/lunniy-zaliv/20.webp",
            "images/houses/lunniy-zaliv/15.webp",
            "images/houses/lunniy-zaliv/4.webp",
            "images/houses/lunniy-zaliv/3.webp",
            "images/houses/lunniy-zaliv/5.webp",
            "images/houses/lunniy-zaliv/6.webp",
            "images/houses/lunniy-zaliv/7.webp",
            "images/houses/lunniy-zaliv/9.webp",
            "images/houses/lunniy-zaliv/11.webp",
            "images/houses/lunniy-zaliv/12.webp",
            "images/houses/lunniy-zaliv/16.webp",
            "images/houses/lunniy-zaliv/17.webp",
            "images/houses/lunniy-zaliv/22.webp",
            "images/houses/lunniy-zaliv/24.webp",
            "images/houses/sonniy-zaliv/letonew/IMG_1020.webp",
            "images/houses/sonniy-zaliv/letonew/IMG_1021.webp",
            "images/houses/lunniy-zaliv/2.webp"
        ],
        18 => [
            "images/houses/shale-siniy-dom/zima/3.webp",
            "images/houses/shale-siniy-dom/leto/letodetgor.webp",

            "images/houses/shale-siniy-dom/leto/2PUE0aCqwIE.webp",
            "images/houses/shale-siniy-dom/zima/1.webp",
            "images/houses/shale-siniy-dom/zima/2.webp",
            "images/houses/shale-siniy-dom/zima/24.webp",
            "images/houses/shale-siniy-dom/zima/25.webp",
            "images/houses/shale-siniy-dom/zima/4.webp",
            "images/houses/shale-siniy-dom/zima/5.webp",
            "images/houses/shale-siniy-dom/zima/23.webp",
            "images/houses/shale-siniy-dom/zima/19.webp",
            "images/houses/shale-siniy-dom/zima/20.webp",
            "images/houses/shale-siniy-dom/zima/21.webp",
            "images/houses/shale-siniy-dom/zima/22.webp",
            "images/houses/shale-siniy-dom/zima/9.webp",
            "images/houses/shale-siniy-dom/zima/10.webp",
            "images/houses/shale-siniy-dom/zima/11.webp",
            "images/houses/shale-siniy-dom/zima/12.webp",
            "images/houses/shale-siniy-dom/zima/14.webp",
            "images/houses/shale-siniy-dom/zima/6.webp",
            "images/houses/shale-siniy-dom/zima/7.webp",
            "images/houses/shale-siniy-dom/zima/8.webp",
            "images/houses/shale-siniy-dom/zima/26.webp",
            "images/houses/shale-siniy-dom/zima/28.webp",
            "images/houses/shale-siniy-dom/zima/27.webp",
            "images/houses/shale-siniy-dom/zima/18.webp",
            "images/houses/shale-siniy-dom/zima/16.webp"
        ],
        19 => [
            "images/alda/slider/a1.webp",
            "images/alda/slider/a2.webp",

            "images/alda/slider/a3.webp",
            "images/alda/slider/a4.webp",
            "images/alda/slider/a5.webp",
            "images/alda/slider/a6.webp",
            "images/alda/slider/a7.webp",
            "images/alda/slider/a8.webp",
            "images/alda/slider/a9.webp",
            "images/alda/slider/a10.webp"
        ]
    ];

    if (!array_key_exists($house_id, $houses_info) || !array_key_exists($house_id, $house_photos))
        return '<section id="housePhoto" class="ftco-section services-section bg-light ftco-no-pb pt-5">
                        <div class="container">
                            <div class="row justify-content-center pb-4">
                                <div class="col-md-12 heading-section text-center ftco-animate">
                                    <h2 class="mb-4">Фотографии дома отсутствуют</h2>
                                </div>
                            </div>
                        </div>
                    </section>
                    ';

    $data = '<section id="housePhoto" class="ftco-section services-section bg-light ftco-no-pb pt-5">
                    <div class="container">
                        <div class="row justify-content-center pb-4">
                            <div class="col-md-12 heading-section text-center ftco-animate">
                                <h2 class="mb-4">Фотографии</h2>
                                <p>Подробная галерея фотографий "' . $houses_info[$house_id] . '"</p>
                            </div>
                        </div>
                        <!-- Slider main container -->
                        <div class="swiper-photo">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">
                                <!-- Slides -->
                                ';

    // --- Тект заголовка на картинке ---
    //  <div class="text">
    //      <h3>Дом</h3>
    //  </div>
    foreach ($house_photos[$house_id] as $value) {
        $data .= '<div class="swiper-slide">
                           <div class="ftco-animate">
                                <div class="project-destination">
                                    <a class="img" style="background-image: url(' . $value . ');" href="' . $value . '" data-fancybox="gallery-house">
                                    </a>
                                </div>
                           </div>
                       </div>
                       ';
    }

    $data .= '</div>
                    <!-- If we need pagination -->
                    <div class="swiper-pagination"></div>

                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
                <div class="row">
                    <div class="conf-btn" style="padding-top: 30px;"><a href="#" data-tl-booking-open="true" class="btn btn-primary py-3 px-4 ftco-animate"><i class="ion-ios-calendar"></i>&nbsp;Забронировать</a></div>
                </div>
            </div>
        </section>
        ';

    return $data;
}

function getBookingData($house_id)
{
    $deleted = 0;
    $cur_date = date('Y-m-d');

    $booking = R::getAll('SELECT b.id, b.email, b.user_name, b.user_surname, b.phone_number, b.pay_no, b.pay_amount, b.pay_pre_order_amount, b.pay_expires, b.pay_status_id, b.person_count, b.date_in, b.date_out, b.house_id, b.create_datetime, b.create_user_id, b.modify_datetime, b.modify_user_id, b.type_id, b.deleted FROM bookingdata b WHERE b.deleted = ? AND b.house_id = ? AND b.date_out >= ? ORDER BY b.date_in ASC', array($deleted, $house_id, $cur_date));

    if (!$booking)
        return false;

    return $booking;
}

function analyzeHouseDaysCost($house_id, $date_start, $date_end, $person_count, $mode)
{
    $totalCost = 0;
    $totalPreorderCost = 0;
    $res = [];

    $dateStart = new DateTime($date_start);
    $dateEnd = new DateTime($date_end);

    $daysCount = getDaysCount($date_start, $date_end); // получаем количество суток в выбранном клиентом диапазоне
    $dayTypeID = getDayType($daysCount); // получаем id тип дня ("1 сутки" или "2 и более")

    $houseCostArr = getHouseCost($house_id, $dayTypeID); // получаем базовые стоимости суток различных периодов дат из базы в виде массива

    if (!$houseCostArr)
        return $res = ['cost' => $totalCost, 'preorderCost' => $totalPreorderCost, 'daysCount' => $daysCount];

    $houseCondCostArr = getHouseCostCond($houseCostArr); // передаем полученый массив с периодами дат для получения соотв. им списка доп. условий

    for ($date = $dateStart; $date < $dateEnd; $date->add(new DateInterval('P1D'))) {
        foreach ($houseCostArr as $item) {
            $hcDateS = $item['date_start'];
            $hcDateE = $item['date_end'];

            $dates_arr = getDatesArr($hcDateS, $hcDateE);

            if ($dates_arr && !in_array($date->format('d.m.Y'), $dates_arr))
                continue;

            $hcID = $item['id'];
            $hcCost = $item['cost'];
            $hcPreorderCost = $item['preorder_cost'];
            $hcPreorderPercentage = $item['preorder_percentage'];

            $filteredArr = getArrRows('house_cost_id', $hcID, $houseCondCostArr);

            $condRes = false;

            if ($filteredArr) {
                foreach ($filteredArr as $condItem) {
                    $condText = $condItem['cond_text'];
                    $condCost = $condItem['cond_cost'];
                    $condPreorderCost = $condItem['preorder_cost'];
                    $condPreorderPercentage = $condItem['preorder_percentage'];

                    $condArr = explode(';', $condText);

                    if (!$condArr)
                        return false;

                    foreach ($condArr as $item) {
                        $cond = explode(':', $item);

                        $operator = $cond[0];

                        if ($operator && (($operator == '&&' && $condRes == false) || ($operator == '||' && $condRes == true)))
                            break;

                        $target = $cond[1];
                        $expression = $cond[2];
                        $val = $cond[3];
                        $addVal = $cond[4];

                        $targetFormatted = "";

                        if ($target == 'daywithmonth') {
                            $val = explode(',', $val);
                            $targetFormatted = $date->format('d.m');
                        } else if ($target == 'person')
                            $targetFormatted = $person_count;

                        $condRes = analyzeCondText($targetFormatted, $expression, $val);

                        if ($condRes && $target == 'person') {
                            $addPersonCost = $addVal;
                            $condCost = ($person_count - $val) * $addPersonCost;
                        }
                    }

                    if ($condRes) {
                        $totalCost += $condCost;

                        if ($condPreorderPercentage)
                            $totalPreorderCost += getPreorderAmount($condCost, $condPreorderCost, $condPreorderPercentage);
                        else
                            $totalPreorderCost = getPreorderAmount($condCost, $condPreorderCost, $condPreorderPercentage);

                        break;
                    }
                }
            }

            if (!$condRes) {
                $totalCost += $hcCost;

                if ($hcPreorderPercentage)
                    $totalPreorderCost += getPreorderAmount($hcCost, $hcPreorderCost, $hcPreorderPercentage);
                else
                    $totalPreorderCost = getPreorderAmount($hcCost, $hcPreorderCost, $hcPreorderPercentage);
            }

            break;
        }

        // вернуть на 1 сутки только стоимость
        if ($mode && $mode == 1)
            return $res = ['cost' => $totalCost, 'preorderCost' => $totalPreorderCost, 'daysCount' => $daysCount];
    }

    return $res = ['cost' => $totalCost, 'preorderCost' => $totalPreorderCost, 'daysCount' => $daysCount];
}

function getPreorderAmount($totalCost, $preorder_cost, $preorder_percentage)
{
    if (!$totalCost)
        return false;

    if ($preorder_cost)
        return $preorder_cost;

    if ($preorder_percentage)
        return ($totalCost * $preorder_percentage) / 100;

    return $totalCost;
}

function analyzeCondText($target, $expression, $val)
{
    if ($expression == 'in')
        return in_array($target, $val);

    else if ($expression == 'not in')
        return !in_array($target, $val);

    else if ($expression == '==')
        return $target == $val;

    else if ($expression == '!=')
        return $target != $val;

    return 0;
}

function getArrRows($columnName, $value, $arr)
{
    $res = [];

    if ($arr) {
        foreach ($arr as $item) {
            if ($item[$columnName] == $value) {
                $res[] = $item;
            }
        }
    }

    return $res;
}

function getHouseCostIdsToString($house_cost_arr)
{
    $houseCostIds = '';

    foreach ($house_cost_arr as $item) {
        if ($houseCostIds) {
            $houseCostIds .= ',' . $item['id'];
            continue;
        }

        $houseCostIds = $item['id'];
    }

    return $houseCostIds;
}

function getHouseCostCond($house_cost_id_arr)
{
    if (!$house_cost_id_arr)
        return false;

    $deleted = 0;

    if (is_array($house_cost_id_arr))
        $house_cost_id_arr = getHouseCostIdsToString($house_cost_id_arr);

    $result = R::getAll('SELECT cc.id, cc.house_cost_id, cc.cond_text, cc.cond_cost, cc.preorder_cost, cc.preorder_percentage, cc.description FROM costcond cc WHERE cc.deleted = ? AND cc.house_cost_id IN (?) ORDER BY cc.house_cost_id ASC', array($deleted, $house_cost_id_arr));

    if (!$result)
        return false;

    return $result;
}

function getHouseCost($house_ids, $day_type = "")
{
    $deleted = 0;

    $houseWhere = "";
    $dayTypeWhere = "";

    if ($house_ids)
        $houseWhere = " AND hc.house_id IN ($house_ids)";

    if ($day_type)
        $dayTypeWhere = " AND hc.day_type_id = $day_type";

    $result = R::getAll("SELECT hc.id, hc.house_id, hc.day_type_id, hc.date_start, hc.date_end, hc.cost, hc.preorder_cost, hc.preorder_percentage, hc.description FROM housecost hc WHERE hc.deleted = ?$houseWhere$dayTypeWhere ORDER BY hc.date_start ASC", array($deleted));

    if (!$result)
        return false;

    return $result;
}

function getDayType($days_sum)
{
    if ($days_sum === 1)
        return 1;

    return 2;
}

function checkOneDayPeriod($days_sum)
{
    return $days_sum === 1;
}

function getDaysCount($date_start, $date_end)
{
    $dateStart = new DateTime($date_start);
    $dateEnd = new DateTime($date_end);

    $daysSum = 0;

    for ($i = $dateStart; $i < $dateEnd; $i->add(new DateInterval('P1D'))) {
        $daysSum++;
    }

    return $daysSum;
}

function getDatesArr($date_start, $date_end)
{
    if (!$date_start || !$date_end)
        return [];

    $dateStart = new DateTime($date_start);
    $dateEnd = new DateTime($date_end);

    $dates = [];

    for ($date = $dateStart; $date < $dateEnd; $date->add(new DateInterval('P1D'))) {
        $val = $date->format('d.m.Y');

        if (!in_array($val, $dates))
            $dates[] = $val;
    }

    return $dates;
}

function getBookingDataByPayNo($pay_no)
{
    $deleted = 0;

    $booking = R::getAll('SELECT b.id, b.email, b.user_name, b.user_surname, b.phone_number, b.pay_no, b.pay_amount, b.pay_pre_order_amount, b.pay_expires, b.pay_status_id, b.person_count, b.date_in, b.date_out, b.house_id, (SELECT h.address FROM houses h WHERE h.id = b.house_id) AS `house_address`, b.create_datetime, b.create_user_id, b.modify_datetime, b.modify_user_id, b.deleted FROM bookingdata b WHERE b.deleted = ? AND b.pay_no = ?', array($deleted, $pay_no));

    if (!$booking)
        return false;

    return $booking;
}

function getBookingDataForMonth($startMonth, $endMonth, $house_id)
{
    if (!$startMonth || !$endMonth || !$house_id)
        return false;

    $deleted = 0;

    // $firstDayDate = date('Y-'.$startMonth.'-1');
    // $firstDayOfEndDate = date('Y-'.$endMonth.'-1');

    // $lastDayDate = new DateTime($firstDayOfEndDate);
    // $lastDayDate->modify('last day of this month');
    // $lastDayDate = $lastDayDate->format('Y-m-d');

    $booking = R::getAll('SELECT b.id, b.email, b.user_name, b.user_surname, b.phone_number, b.pay_no, b.pay_amount, b.pay_pre_order_amount, b.pay_expires, b.pay_status_id, b.person_count, b.date_in, b.date_out, b.house_id, b.create_datetime, b.create_user_id, b.modify_datetime, b.modify_user_id, b.deleted FROM bookingdata b WHERE b.deleted = ? AND ((MONTH(b.date_in) >= ? AND MONTH(b.date_in) <= ?) || (MONTH(b.date_out) >= ? && MONTH(b.date_out) <= ?)) AND b.house_id = ? AND b.type_id != 2 AND b.pay_status_id != 3 ORDER BY b.date_in ASC', array($deleted, $startMonth, $endMonth, $startMonth, $endMonth, $house_id));

    // $booking = R::getAll('SELECT b.id, b.email, b.user_name, b.user_surname, b.phone_number, b.pay_no, b.pay_amount, b.pay_pre_order_amount, b.pay_expires, b.pay_status_id, b.person_count, b.date_in, b.date_out, b.house_id, b.create_datetime, b.create_user_id, b.modify_datetime, b.modify_user_id, b.deleted FROM bookingdata b WHERE b.deleted = ? AND b.date_in >= ? AND b.date_out <= ? AND b.house_id = ? ORDER BY b.date_in ASC', array($deleted, $firstDayDate, $lastDayDate, $house_id));

    if (!$booking)
        return false;

    return $booking;
}

function checkBookingData($date_arr, $cur_date_arr)
{
    if (!$date_arr || !$cur_date_arr)
        return false;

    foreach ($cur_date_arr as $date) {
        if (in_array($date, $date_arr))
            return true;
    }

    return false;
}

function createDatesArr($date_in, $date_out)
{
    if (!$date_in || !$date_out)
        return false;

    $dateStart = new DateTime($date_in);
    $dateEnd = new DateTime($date_out);

    $dates = [];

    for ($i = $dateStart; $i <= $dateEnd; $i->add(new DateInterval('P1D'))) {
        $dates[] = $i->format('Y-m-d');
    }

    return $dates;
}

function getMonthLastDate($month)
{
    $firstDayDate = date('Y-' . $month . '-1');

    $lastDayDate = new DateTime($firstDayDate);
    $lastDayDate->modify('last day of this month');
    $lastDayDate = $lastDayDate->format('Y-m-d');

    return $lastDayDate;
}

function createDatesArrOnMonth($start_month, $end_month)
{
    if (!$start_month || !$end_month)
        return false;

    $firstDayDate = date('Y-' . $start_month . '-1');

    $lastDayDate = new DateTime($firstDayDate);
    $lastDayDate->modify('last day of this month');
    $lastDayDate = $lastDayDate->format('Y-m-d');

    $format_date_start = DateTime::createFromFormat('Y-m-d', $firstDayDate);
    $format_date_end = DateTime::createFromFormat('Y-m-d', $lastDayDate);

    $dates = [];

    for ($i = $format_date_start; $i <= $format_date_end; $i->add(new DateInterval('P1D'))) {
        $dates[] = $i->format('Y-m-d');
    }

    return $dates;
}

function createDatesArrFromDb($bookingData)
{
    if (!$bookingData)
        return false;

    $dates = [];

    foreach ($bookingData as $item) {
        $dateStart = new DateTime($item['date_in']);
        $dateEnd = new DateTime($item['date_out']);

        for ($i = $dateStart; $i <= $dateEnd; $i->add(new DateInterval('P1D'))) {
            $dates[] = $i->format('Y-m-d');
        }
    }

    return $dates;
}

function getFormatBookingCalendarDates($bookingData)
{
    $dates = [];
    $oneDayRange = [];

    if ($bookingData) {
        $lastDateEnd = new DateTime();
        $lastDateEndFormatted = $lastDateEnd->format('Y-m-d');

        foreach ($bookingData as $item) {
            if ($item['type_id'] == 2 || $item['pay_status_id'] == 3)
                continue;

            $dateStart = new DateTime($item['date_in']);
            $dateEnd = new DateTime($item['date_out']);

            if ($lastDateEnd) {
                $subOneDayDate = new DateTime($item['date_in']);
                $subTwoDaysDate = new DateTime($item['date_in']);

                $OneDayStart = new DateTime($item['date_in']);
                $OneDayEnd = new DateTime($item['date_out']);

                $dateStartFormatted = $dateStart->format("Y-m-d");

                if ($OneDayStart->add(new DateInterval('P1D'))->format('Y-m-d') === $OneDayEnd->format('Y-m-d')) {
                    $oneDayRange[] = ['date_start' => $dateStart->format('Y-m-d'), 'date_end' => $dateEnd->format('Y-m-d')];

                    if ($dateStart->format('Y-m-d') === $lastDateEnd->format('Y-m-d'))
                        $dates[] = $dateStart->format('Y-m-d');
                }

                $today = new DateTime();

                $subOneDayDate->sub(new DateInterval('P1D'));
                $subTwoDaysDate->sub(new DateInterval('P2D'));

                $todayFormatted = $today->format('Y-m-d');
                $subOneDayDateFormatted = $subOneDayDate->format('Y-m-d');
                $subTwoDaysDateFormatted = $subTwoDaysDate->format('Y-m-d');

                if ($dateStartFormatted != $todayFormatted) {
//                        if ($subOneDayDateFormatted == $lastDateEndFormatted)
//                        {
//                            if (!in_array($subOneDayDateFormatted, $dates))
//                                $dates[] = $subOneDayDateFormatted;
//                        }

                    if ($subTwoDaysDateFormatted == $lastDateEndFormatted || $dateStartFormatted != $lastDateEndFormatted)
                        $dateStart->add(new DateInterval('P1D'));
                }
            }

            for ($i = $dateStart; $i < $dateEnd; $i->add(new DateInterval('P1D'))) {
                if (!in_array($i->format('Y-m-d'), $dates))
                    $dates[] = $i->format('Y-m-d');
            }

            $lastDateEnd = $dateEnd;
            $lastDateEndFormatted = $dateEnd->format('Y-m-d');
        }
    }

    return compact('dates', 'oneDayRange');
}

function addBookingDetails($booking_id, $array)
{
    if (!$booking_id || $booking_id <= 0 || !$array)
        return false;

    $cur_datetime = date('Y-m-d H:i:s');
    $cr_user_id = 1;

    $pay_date = new DateTime($array['LMI_SYS_PAYMENT_DATE']);
    $pay_date_formatted = $pay_date->format('Y-m-d H:i:s');

    $book = R::dispense('bookingpaydetails');

    // Заполняем объект свойствами
    $book->booking_id = $booking_id;
    $book->lmi_sys_payment_id = $array['LMI_SYS_PAYMENT_ID'];
    $book->lmi_sys_payment_date = $pay_date_formatted;
    $book->lmi_paid_amount = $array['LMI_PAID_AMOUNT'];
    $book->lmi_paid_currency = $array['LMI_PAID_CURRENCY'];
    $book->lmi_payment_method = $array['LMI_PAYMENT_METHOD'];
    $book->lmi_hash = $array['LMI_HASH'];
    $book->lmi_payer_ip_address = $array['LMI_PAYER_IP_ADDRESS'];
    $book->lmi_payment_system = $array['LMI_PAYMENT_SYSTEM'];
    $book->create_datetime = $cur_datetime;
    $book->create_user_id = $cr_user_id;

    // Сохраняем объект
    return R::store($book);
}

function updateBookingPayStatus($booking_id, $pay_status_id)
{
    if (!$booking_id || $booking_id <= 0 || !$pay_status_id || $pay_status_id < 1 || $pay_status_id > 3)
        return false;

    $cur_datetime = date('Y-m-d H:i:s');
    $mod_user_id = 1;

    $book = R::load('bookingdata', $booking_id);

    // Обращаемся к свойству объекта и назначаем ему новое значение
    $book->pay_status_id = $pay_status_id;
    $book->modify_user_id = $mod_user_id;
    $book->modify_datetime = $cur_datetime;

    // Сохраняем объект
    return R::store($book);
}

function deleteBooking($date_in, $date_out, $house_id)
{
    if (!$date_in || !$date_out || $house_id < 1)
        return false;

    $cur_datetime = date('Y-m-d H:i:s');
    $mod_user_id = 1;

    $book = R::findOne('bookingdata', 'date_in = :date_in AND date_out = :date_out AND house_id = :house_id', [':date_in' => $date_in, ':date_out' => $date_out, ':house_id' => $house_id]);

    // Обращаемся к свойству объекта и назначаем ему новое значение
    $book->deleted = 1;
    $book->modify_user_id = $mod_user_id;
    $book->modify_datetime = $cur_datetime;

    // Сохраняем объект
    return R::store($book);
}

function openBooking($date_in, $date_out, $house_id)
{
    if (!$date_in || !$date_out || $house_id < 1)
        return false;

    $cur_datetime = date('Y-m-d H:i:s');
    $mod_user_id = 1;

    $pay_status_id = 3;
    $deleted = 0;

    $res = checkNotDeletedBooking($date_in, $date_out, $house_id);

    if ($res)
        deleteBooking($date_in, $date_out, $house_id);

    $book = R::findOne('bookingdata', 'date_in = :date_in AND date_out = :date_out AND house_id = :house_id AND pay_status_id != :pay_status_id', [':date_in' => $date_in, ':date_out' => $date_out, ':house_id' => $house_id, ':pay_status_id' => $pay_status_id]);

    // Обращаемся к свойству объекта и назначаем ему новое значение
    $book->pay_status_id = $pay_status_id;
    $book->deleted = $deleted;
    $book->modify_user_id = $mod_user_id;
    $book->modify_datetime = $cur_datetime;

    // Сохраняем объект
    return R::store($book);
}

function checkNotDeletedBooking($date_in, $date_out, $house_id)
{
    $deleted = 0;

    $book = R::findOne('bookingdata', 'date_in = :date_in AND date_out = :date_out AND house_id = :house_id AND deleted = :deleted', [':date_in' => $date_in, ':date_out' => $date_out, ':house_id' => $house_id, ':deleted' => $deleted]);

    if (!$book)
        return false;

    return $book;
}

function getChatIds()
{
    $deleted = 0;

    $ids = R::getAll('SELECT cb.id, cb.chat_id, cb.house_id FROM chatbot cb WHERE cb.deleted = ?', array($deleted));

    if (!$ids)
        return false;

    return $ids;
}

function bookingSetDeleted()
{
    $deleted = 0;
    $cur_datetime = date('Y-m-d');

    R::exec('UPDATE bookingdata b SET b.deleted = 1 WHERE b.date_in < ? AND b.deleted = ?', array($cur_datetime, $deleted));

    return 1;
}

function getHouseInfo($house_id)
{
    $deleted = 0;

    $house = R::getAll('SELECT h.id, h.name, h.address, h.page_url FROM houses h WHERE h.deleted = ? AND h.id = ?', array($deleted, $house_id));

    if (!$house)
        return false;

    return $house;
}

function addLastText($chat_id, $text)
{
    $cur_datetime = date('Y-m-d H:i:s');
    $mod_user_id = 1;

    $chatbot = R::findOne('chatbot', 'chat_id = ?', [$chat_id]);

    $db_tex = $chatbot->last_text;

    // Обращаемся к свойству объекта и назначаем ему новое значение
    if ($text != ' ')
        $text = trim($text);

    if ($text == ' ' || (empty($chatbot->last_text) || $chatbot->last_text == " " || $chatbot->last_text == "" || is_null($chatbot->last_text)))
        $chatbot->last_text = $text;

    else
        $chatbot->last_text = $db_tex . ' ' . $text;

    $chatbot->modify_user_id = $mod_user_id;
    $chatbot->modify_datetime = $cur_datetime;

    // Сохраняем объект
    return R::store($chatbot);
}

function addLastCommand($chat_id, $command)
{
    $cur_datetime = date('Y-m-d H:i:s');
    $mod_user_id = 1;

    $chatbot = R::findOne('chatbot', 'chat_id = ?', [$chat_id]);

    // Обращаемся к свойству объекта и назначаем ему новое значение
    $chatbot->last_comm = $command;
    $chatbot->modify_user_id = $mod_user_id;
    $chatbot->modify_datetime = $cur_datetime;

    // Сохраняем объект
    return R::store($chatbot);
}

function getLastCommand($chat_id)
{
    $deleted = 0;

    $com = R::getAll('SELECT cb.id, cb.last_comm FROM chatbot cb WHERE cb.deleted = ? AND cb.chat_id = ?', array($deleted, $chat_id));

    if (!$com)
        return false;

    return $com;
}

function getLastText($chat_id)
{
    $deleted = 0;

    $com = R::getAll('SELECT cb.id, cb.last_text FROM chatbot cb WHERE cb.deleted = ? AND cb.chat_id = ?', array($deleted, $chat_id));

    if (!$com)
        return false;

    return $com;
}

function getHouseId($chat_arr, $chat_id)
{
    foreach ($chat_arr as $item) {
        if ($item['chat_id'] == $chat_id)
            return $item['house_id'];
    }

    return false;
}

function checkAvailableBookingDate($date_in, $date_out, $house_id)
{
    $date_in_new = new DateTime($date_in);
    $date_out_new = new DateTime($date_out);

    $start_month = date_format($date_in_new, 'm');
    $end_month = date_format($date_out_new, 'm');

    $bookingData = getBookingDataForMonth($start_month, $end_month, $house_id);

    if (!$bookingData)
        return false;

    $dates = getFormatBookingCalendarDates($bookingData)['dates'];

    $cur_dates_arr = createDatesArr($date_in, $date_out);

    $res = checkBookingData($dates, $cur_dates_arr);

    if ($res)
        $res = true;

    else
        $res = false;

    return $res;
}

function addPlacement($houseName, $location, $placeCount, $subPlaceCount, $payOptions, $addServices, $reviewLink, $ownerName, $email, $phone, $ownerWords, $conditions, $timeIn, $timeOut, $changeTime, $bookingRules, $smoking, $trash, $pets, $oneDayAmount, $moreDayAmount, $amountArr)
{
    $cur_datetime = date('Y-m-d H:i:s');
    $cr_user_id = 1;

    $housePlacement = R::dispense('houseplacement');

    // Заполняем объект свойствами
    $housePlacement->house_name = $houseName;
    $housePlacement->location = $location;
    $housePlacement->place_count = $placeCount;
    $housePlacement->sub_place_count = $subPlaceCount;
    $housePlacement->pay_options = $payOptions;
    $housePlacement->add_services = $addServices;
    $housePlacement->review_link = $reviewLink;
    $housePlacement->owner_name = $ownerName;
    $housePlacement->email = $email;
    $housePlacement->phone = $phone;
    $housePlacement->owner_words = $ownerWords;
    $housePlacement->conditions = $conditions;
    $housePlacement->time_in = $timeIn;
    $housePlacement->time_out = $timeOut;
    $housePlacement->change_time = $changeTime;
    $housePlacement->booking_rules = $bookingRules;
    $housePlacement->smoking = $smoking;
    $housePlacement->trash = $trash;
    $housePlacement->pets = $pets;
    $housePlacement->one_day_amount = $oneDayAmount;
    $housePlacement->more_day_amount = $moreDayAmount;
    $housePlacement->amount_arr = $amountArr;

    $housePlacement->create_datetime = $cur_datetime;
    $housePlacement->create_user_id = $cr_user_id;

    // Сохраняем объект
    R::store($housePlacement);

    return true;
}

function getSeoInfo($uri)
{
    if (!$uri)
        return [];

    $seoInfo = R::getAll('SELECT si.id, si.uri, si.uri_humanized, si.title, si.description, si.keywords, si.filters_list FROM seoinfo si WHERE si.uri = ? AND si.deleted = ? LIMIT 1', array($uri, 0));
    if (!$seoInfo)
        return [];

    return $seoInfo[0];
}

?>
