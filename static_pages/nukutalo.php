<?php
require('functions.php');

$LastModified_unix = getlastmod(); // время последнего изменения страницы
$LastModified = gmdate("D, d M Y H:i:s \G\M\T", $LastModified_unix);
$IfModifiedSince = false;

if (isset($_ENV['HTTP_IF_MODIFIED_SINCE']))
    $IfModifiedSince = strtotime(substr($_ENV['HTTP_IF_MODIFIED_SINCE'], 5));

if (isset($_SERVER['HTTP_IF_MODIFIED_SINCE']))
    $IfModifiedSince = strtotime(substr($_SERVER['HTTP_IF_MODIFIED_SINCE'], 5));

if ($IfModifiedSince && $IfModifiedSince >= $LastModified_unix) {
    header($_SERVER['SERVER_PROTOCOL'] . ' 304 Not Modified');
    exit;
}

header('Last-Modified: ' . $LastModified);

$title = 'Nukutalo - снять гостевой дом в республике Карелия. Аренда коттеджа посуточно в республике Карелия г. Сортавала';
$descr = 'Мы предлагаем Вам снять дом Nukutalo со всеми удобствами в Карелии г. Сортавала. Арендовать коттедж Nukutalo на сутки в республике Карелия на Сонный Залив. Уютный дом Nukutalo на берегу озера. Арендуйте дом Nukutalo с панорамным видом на сутки в республике Карелия по цене от 5000 тыс. руб.';
$keywords = 'Nukutalo снять коттедж на сутки в республике Карелия, аренда коттеджа посуточно в республике Карелия, аренда дома, отдых в Карелии, снять дом с видом на озеро, дом с баней Сортавала';

$house_id = 5;

$bookingData = getBookingData($house_id);

$res = getFormatBookingCalendarDates($bookingData);

$dates = $res['dates'];
$oneDayRange = $res['oneDayRange'];

$housesSlider = initHousesSlider($house_id);
$housePhotos = getHousePhotos($house_id);
$iconBlock = getSubscribeIconBlock();
$subsMenu = getSubscribeMenu();
$footer = getFooter();
?>
<!DOCTYPE html>
<html lang="ru" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#" class="tl-html">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?php echo $title; ?></title>
    <meta name="description" content="<?php echo $descr; ?>">
    <meta name="keywords" content="<?php echo $keywords; ?>">

    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Сонный Залив">
    <meta property="og:title" content="<?php echo $title; ?>">
    <meta property="og:description" content="<?php echo $descr; ?>">
    <meta property="og:url" content="https://sonniyzaliv.ru/">
    <meta property="og:locale" content="ru_RU">
    <meta property="og:image" content="images/logo.png">
    <link rel="canonical" href="https://sonniyzaliv.ru/nukutalo"/>

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" as="style" rel="preload"
          onload="this.rel='stylesheet'">

    <link href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" as="style"
          rel="preload" onload="this.rel='stylesheet'">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/t-datepicker.min.css">
    <link rel="stylesheet" href="css/themes/t-datepicker-purple.css">

    <link rel="stylesheet" href="css/aos.css">

    <link href="css/flexslider/flexslider.css" rel="stylesheet">

    <link href="libs/et-line-font/et-line-font.css?v=3.3" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="css/font-awesome.min.css" rel="stylesheet">

    <!-- Favicon -->
    <link rel="shortcut icon" href="https://sonniyzaliv.ru/favicon.ico" type="image/x-icon">
    <link href="favicon.ico" rel="icon" type="image/x-icon">

    <link href="css/ionicons.min.css" as="style" rel="preload" onload="this.rel='stylesheet'">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    <!-- Swiper -->
    <link href="css/swiper.min.css" as="style" rel="preload" onload="this.rel='stylesheet'" type="text/css"/>

    <link rel="stylesheet" href="css/flaticon.css?v=3.4">
    <link rel="stylesheet" href="css/mistral.css">
    <link rel="stylesheet" href="css/monotype_corsiva.css">
    <link href="css/icomoon.css?v=3.4" as="style" rel="preload" onload="this.rel='stylesheet'">
    <link href="css/style.min.css?v=<?php echo VERSION['styles'] ?>" as="style" rel="preload"
          onload="this.rel='stylesheet'">

    <meta name="yandex-verification" content="077ed0cb5ca007c0"/>
    <!-- start TL head script -->
    <script type='text/javascript'>
        (function (w) {
            var q = [
                ['setContext', 'TL-INT-sonniyzaliv_2023-01-11', 'ru'],
                ['embed', 'search-form', {
                    container: 'tl-search-form'
                }]
            ];
            var h = ["ru-ibe.tlintegration.ru", "ibe.tlintegration.ru", "ibe.tlintegration.com"];
            var t = w.travelline = (w.travelline || {}),
                ti = t.integration = (t.integration || {});
            ti.__cq = ti.__cq ? ti.__cq.concat(q) : q;
            if (!ti.__loader) {
                ti.__loader = true;
                var d = w.document, c = d.getElementsByTagName("head")[0] || d.getElementsByTagName("body")[0];

                function e(s, f) {
                    return function () {
                        w.TL || (c.removeChild(s), f())
                    }
                }

                (function l(h) {
                    if (0 === h.length) return;
                    var s = d.createElement("script");
                    s.type = "text/javascript";
                    s.async = !0;
                    s.src = "https://" + h[0] + "/integration/loader.js";
                    s.onerror = s.onload = e(s, function () {
                        l(h.slice(1, h.length))
                    });
                    c.appendChild(s)
                })(h);
            }
        })(window);
        document.addEventListener('DOMContentLoaded', function () {
            var container = document.querySelector(".head-text .col-md-9");
            var searchForm = document.querySelector("#block-search");
            container.appendChild(searchForm);
        });
    </script>
    <link rel="stylesheet" href="css/travelline-style.css">
    <!-- end TL head script -->
</head>
<!-- Google tag (gtag.js) -->
<!--<script async src="https://www.googletagmanager.com/gtag/js?id=G-WS85F05T7W"></script>-->
<!--<script>-->
<!--  window.dataLayer = window.dataLayer || [];-->
<!--  function gtag(){dataLayer.push(arguments);}-->
<!--  gtag('js', new Date());-->
<!---->
<!--  gtag('config', 'G-WS85F05T7W');-->
<!--</script>-->

<script>
    function loadGtag() {
        if (window.gtagLoaded) return;
        window.gtagLoaded = true;

        let script = document.createElement("script");
        script.src = "https://www.googletagmanager.com/gtag/js?id=G-DPVYVNRY2W";
        script.async = true;
        document.body.appendChild(script);

        script.onload = function () {
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }

            window.gtag = gtag;
            gtag("js", new Date());
            gtag("config", "G-DPVYVNRY2W");
        };
    }

    // Ждем действий пользователя
    ["mousemove", "touchstart", "scroll"].forEach(event => {
        document.addEventListener(event, loadGtag, {once: true});
    });

    // Резервная загрузка через 10 сек (если пользователь не шевелился)
    setTimeout(loadGtag, 10000);
</script>
<body>
<header class="header">
    <div itemscope itemtype="https://schema.org/Organization" style="display:none;">
        <meta itemprop="name" content="<?php echo $title; ?>"/>
        <link itemprop="url" href="https://sonniyzaliv.ru/"/>
        <link itemprop="logo" href="https://sonniyzaliv.ru/images/logo.png"/>
        <meta itemprop="description" content="<?php echo $descr; ?>"/>
        <meta itemprop="email" content="sonniyzaliv@yandex.ru"/>
        <div itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
            <meta itemprop="addressLocality" content="Нукутталахти"/>
            <meta itemprop="postalCode" content="186790"/>
            <meta itemprop="streetAddress" content="Центральная, 52"/>
        </div>
        <meta itemprop="telephone" content="+7 981 187-80-02"/>
        <meta itemprop="telephone" content="+7 981 750-44-89"/>
        <link itemprop="sameAs" href="https://t.me/+KmgBetu6NYtlNjcy"/>
    </div>
    <section class="nav-container">
        <div class="wrapper">
            <a href="/" class="brand">Сонный Залив</a>
            <button type="button" class="burger" id="burger">
                <span class="burger-line"></span>
                <span class="burger-line"></span>
                <span class="burger-line"></span>
                <span class="burger-line"></span>
            </button>
            <span class="overlay" id="overlay"></span>
            <nav class="navbar" id="navbar">
                <ul class="menu">
                    <li class="menu-item"><a href="/">Главная</a></li>
                    <li class="menu-item menu-item-child">
                        <a href="#aboutHome" data-toggle="sub-menu">О доме <i class="expand"></i></a>
                        <ul class="sub-menu">
                            <li class="menu-item"><a href="#housePhoto">Фотографии дома</a></li>
                            <li class="menu-item"><a href="#aboutPartner">О владельце дома</a></li>
                            <li class="menu-item"><a href="#availableBookingOptions">Стоимость брони</a></li>
                            <li class="menu-item"><a href="#paidOptions">Платные опции</a></li>
                            <li class="menu-item"><a href="#availableServices">Дополнительные услуги</a></li>
                            <li class="menu-item"><a href="#houseRules">Список правил</a></li>
                            <li class="menu-item"><a href="#houseReviews">Отзывы</a></li>
                            <li class="menu-item"><a href="#contactData">Контакты</a></li>
                        </ul>
                    </li>
                    <li class="menu-item menu-item-child">
                        <a data-toggle="sub-menu">Еще <i class="expand"></i></a>
                        <ul class="sub-menu">
                            <li class="menu-item"><a href="/catalog">Каталог жилья</a></li>
                            <li class="menu-item"><a href="#all-houses">Другие дома</a></li>
                            <li class="menu-item"><a href="#faq">Вопрос - ответ</a></li>
                            <li class="menu-item"><a href="#services">Полезные ресурсы</a></li>
                            <li class="menu-item"><a href="#news">Новости</a></li>
                        </ul>
                    </li>
                    <li class="menu-item"><a href="<? /*#houseBooking*/ ?>#" data-tl-booking-open="true"
                                             data-tl-room='217926'>Забронировать</a></li>
                </ul>
            </nav>
        </div>
    </section>
</header>
<!-- END nav -->
<main role="main">
    <div class="js-fullheight" id="main-photo" style="background: #f9fafb;">
        <div class="flexslider">
            <ul class="slides">
                <li style="background-image: url(images/houses/nukutalo/2.webp);"
                    data-stellar-background-ratio="0.5"></li>
                <li style="background-image: url(images/houses/nukutalo/12.webp);"
                    data-stellar-background-ratio="0.5"></li>
                <li style="background-image: url(images/houses/nukutalo/20.webp);"
                    data-stellar-background-ratio="0.5"></li>
                <li style="background-image: url(images/houses/nukutalo/15.webp);"
                    data-stellar-background-ratio="0.5"></li>
                <li style="background-image: url(images/houses/nukutalo/8.webp);"
                    data-stellar-background-ratio="0.5"></li>
            </ul>
            <div class="overlay"></div>
            <div class="head-text">
                <div class="container">
                    <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center"
                         data-scrollax-parent="true">
                        <div class="col-md-9 text text-center ftco-animate" style="margin-top: 100px;"
                             data-scrollax=" properties: { translateY: '70%' }">
                            <h1 id="act-form" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">
                                Nukutalo</h1>
                            <h2 class="subtext" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Аренда
                                гостевого дома "Nukutalo" в Карелии. Актуальные цены, подробное описание, фотографии,
                                контакты</h2>
                            <?php echo $iconBlock; ?>
                        </div>
                        <div class="icon-scroll col-md-12">
                            <div class="mouse">
                                <div class="wheel"></div>
                            </div>
                            <div class="icon-arrows">
                                <span></span>
                            </div>
                        </div>
                    </div>
                    <!-- start TL Search form script -->
                    <div id='block-search'>
                        <div id='tl-search-form' class='tl-container'>
                            <noindex><a href='https://www.travelline.ru/products/tl-hotel/' rel='nofollow'
                                        target='_blank'>TravelLine</a></noindex>
                        </div>
                    </div>
                    <!-- end TL Search form script -->
                </div>
            </div>
        </div>
    </div>
    <?php echo $housePhotos; ?>
    <section id="aboutPartner" class="ftco-section ftco-animate ftco-counter services-section bg-light ftco-no-pb">
        <div class="container">
            <div class="row d-flex">
                <div class="col-md-6 d-flex">
                    <div class="img d-flex align-self-stretch ftco-animate" loading="lazy"
                         style="background-image:url(images/houses/nukutalo/34.webp);"></div>
                </div>
                <div class="col-md-6 pl-md-5 py-5">
                    <div class="row justify-content-start pb-3">
                        <div class="col-md-12 heading-section ftco-animate">
                            <h2 class="mb-4">Жанна - владелец "Nukutalo"</h2>
                            <p>"Отдых в моём домике - это отдых среди первозданной природы:"</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center mb-4">
                                <div class="text">
                                    <strong class="number">1</strong>
                                    <span><b>Прогулки по лесу</b></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center mb-4">
                                <div class="text">
                                    <strong class="number">2</strong>
                                    <span><b>Купание в Ладоге</b></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center mb-4">
                                <div class="text">
                                    <strong class="number">3</strong>
                                    <span><b>Пикники в беседке</b></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center mb-4">
                                <div class="text">
                                    <strong class="number">4</strong>
                                    <span><b>Дровяная банька с легким паром</b></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center mb-4">
                                <div class="text">
                                    <strong class="number">5</strong>
                                    <span><b>Экскурсии по местным достопримечательностям</b></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center mb-4">
                                <div class="text">
                                    <strong class="number">6</strong>
                                    <span><b>Принимаю гостей круглый год</b></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-start pb-3" style="padding-top: 30px;text-align: center;">
                        <div class="col-md-12 heading-section ftco-animate">
                            <p><b>Добро пожаловать!</b></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="conf-btn" style="padding-top: 60px;"><a href="#" <? /*id="reserve1" */ ?>
                                                                    data-tl-booking-open="true"
                                                                    class="btn btn-primary py-3 px-4 ftco-animate"><i
                            class="ion-ios-calendar"></i> Забронировать</a></div>
            </div>
        </div>
    </section>
    <section id="aboutHome" class="ftco-section services-section bg-light" style="padding-bottom: 0">
        <div class="container">
            <div class="row d-flex">
                <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
                    <h2 class="mb-4">О нашем доме</h2>
                    <p>Готов для встречи гостей круглый год. В доме имеется все необходимое для комфортного проживания и
                        удобства:</p>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                            <div class="media block-6 services d-block">
                                <div class="icon"><span class="flaticon-double"></span></div>
                                <div class="media-body">
                                    <h3 class="heading mb-3">3 спальных места</h3>
                                    <p>В доме расположены: 1 двуспальная кровать и 1 диван в гостиной</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                            <div class="media block-6 services d-block">
                                <div class="icon"><span class="flaticon-sofa"></span></div>
                                <div class="media-body">
                                    <h3 class="heading mb-3">Дополнительное место</h3>
                                    <p>4-е место обеспечивается раскладушкой</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                            <div class="media block-6 services d-block">
                                <div class="icon"><span class="flaticon-hot"></span></div>
                                <div class="media-body">
                                    <h3 class="heading mb-3">Теплые полы</h3>
                                    <p>Теплые полы в коридоре и санузле</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                            <div class="media block-6 services d-block">
                                <div class="icon"><span class="flaticon-panoramic-view"></span></div>
                                <div class="media-body">
                                    <h3 class="heading mb-3">Вид из окна</h3>
                                    <p>Красивый вид на озеро и природу Карелии</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                            <div class="media block-6 services d-block">
                                <div class="icon"><span class="flaticon-watching-tv"></span></div>
                                <div class="media-body">
                                    <h3 class="heading mb-3">Телевизор</h3>
                                    <p>Просмотр телевизора диагональю 32"</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                            <div class="media block-6 services d-block">
                                <div class="icon"><span class="flaticon-wifi"></span></div>
                                <div class="media-body">
                                    <h3 class="heading mb-3">Wi-Fi</h3>
                                    <p>Wi-Fi в вашем распоряжении</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                            <div class="media block-6 services d-block">
                                <div class="icon"><img src="icons/linen.svg"></div>
                                <div class="media-body">
                                    <h3 class="heading mb-3">Постельное белье</h3>
                                    <p>Постельное белье, которое входит в стоимость</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                            <div class="media block-6 services d-block">
                                <div class="icon"><img src="icons/kitchen_accessories.svg"></div>
                                <div class="media-body">
                                    <h3 class="heading mb-3">Кухонные принадлежности</h3>
                                    <p>Все что необходимо для сервировки стола</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                            <div class="media block-6 services d-block">
                                <div class="icon"><span class="flaticon-microwave"></span></div>
                                <div class="media-body">
                                    <h3 class="heading mb-3">СВЧ-печь</h3>
                                    <p>Быстро подогреть готовую еду или напитки</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                            <div class="media block-6 services d-block">
                                <div class="icon"><span class="flaticon-refrigerator"></span></div>
                                <div class="media-body">
                                    <h3 class="heading mb-3">Холодильник</h3>
                                    <p>Для безопасного хранения ваших продуктов и напитков</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                            <div class="media block-6 services d-block">
                                <div class="icon"><span class="flaticon-stove"></span></div>
                                <div class="media-body">
                                    <h3 class="heading mb-3">Плита</h3>
                                    <p>Готовьте еду не отрываясь от отдыха</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                            <div class="media block-6 services d-block">
                                <div class="icon"><span class="flaticon-shower"></span></div>
                                <div class="media-body">
                                    <h3 class="heading mb-3">Душ</h3>
                                    <p>Комфортный душ в вашем распоряжении</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                            <div class="media block-6 services d-block">
                                <div class="icon"><span class="flaticon-bbq"></span></div>
                                <div class="media-body">
                                    <h3 class="heading mb-3">Барбекю</h3>
                                    <p>Для кулинарных шедевров</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                            <div class="media block-6 services d-block">
                                <div class="icon"><span class="flaticon-parked-car"></span></div>
                                <div class="media-body">
                                    <h3 class="heading mb-3">Парковка</h3>
                                    <p>Просторная бесплатная парковка на территории для удобного размещения вашего
                                        транспорта</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                            <div class="media block-6 services d-block">
                                <div class="icon"><span class="flaticon-mountain"></span></div>
                                <div class="media-body">
                                    <h3 class="heading mb-3">Лес</h3>
                                    <p>Лес на расстоянии 200 метров от дома</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="conf-btn"><a href="#" <? /*id="reserve1" */ ?> data-tl-booking-open="true"
                                         class="btn btn-primary py-3 px-4 ftco-animate"><i class="ion-ios-calendar"></i>
                        Забронировать</a></div>
            </div>
        </div>
    </section>
    <!--<section id="availableBookingOptions" class="ftco-section services-section bg-light" style="padding-bottom: 0">
            <div class="container">
                <div class="row justify-content-center pb-4">
                    <div class="col-md-12 heading-section text-center ftco-animate">
                        <h2 class="mb-4">Стоимость бронирования</h2>
                        <p>Ниже ,представлены актуальные цены на бронирование гостевого дома "Nukutalo"</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 ftco-animate">
                        <div class="project-wrap">
                            <a class="img scroll-elem" style="background-image: url(images/karelia-10.webp);"></a>
                            <div class="text p-4">
                                <span class="price">от 6600 руб/сут</span>
                                <span class="days">от 1 суток</span>
                                <h3><a class="scroll-elem">"Лето"</a></h3>
                                <p class="location"><span class="flaticon-settings"></span> ночи: пн-пн</p>
                                <p class="location"><span class="flaticon-settings"></span> 6600 руб/сут - 2 гостя</p>
                                <p class="location"><span class="flaticon-settings"></span> 7700 руб/сут - 3 гостя</p>
                                <p class="location"><span class="flaticon-settings"></span> 8800 руб/сут - 4 гостя</p>
                                <p class="location"><span class="flaticon-settings"></span> Предоплата 30% от стоимости брони</p>
                                <p class="location"><span class="flaticon-settings"></span> Скидка 10% от итоговой стоимости при брони от 10 суток</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 ftco-animate">
                        <div class="project-wrap">
                            <a class="img scroll-elem" style="background-image: url(images/karelia-2.webp);"></a>
                            <div class="text p-4">
                                <span class="price">от 5500 руб/сут</span>
                                <span class="days">от 1 суток</span>
                                <h3><a class="scroll-elem">"Сентябрь - Декабрь"</a></h3>
                                <p class="location"><span class="flaticon-settings"></span> ночи: пн-пн</p>
                                <p class="location"><span class="flaticon-settings"></span> + 550 руб/сут за каждого гостя свыше 2-х человек</p>
                                <p class="location"><span class="flaticon-settings"></span> С 15 сентября акция "Осенние ночи": При бронирование 3-х ночей скидка 10%. При бронировании 4-х ночей - 5-я в подарок</p>
                                <p class="location"><span class="flaticon-settings"></span> Предоплата 30% от стоимости брони</p>
                                <p class="location"><span class="flaticon-settings"></span> Скидка 10% от итоговой стоимости при брони от 10 суток</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row d-flex">
                    <div class="conf-btn"><a href="#" <? /*id="reserve1" */ ?> data-tl-booking-open="true" class="btn btn-primary py-3 px-4 ftco-animate"><i class="ion-ios-calendar"></i> Забронировать</a></div>
                </div>
            </div>
        </section>-->
    <section id="paidOptions" class="ftco-section services-section bg-light" style="padding-bottom: 0">
        <div class="container">
            <div class="row d-flex">
                <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
                    <h2 class="mb-4">Платные опции</h2>
                    <p>Чтобы Ваш отдых был еще более разнообразным и незабываемым, за дополнительную стоимость, гостевой
                        дом "Nukutalo" готов Вам предоставить:</p>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="media block-6 services d-block">
                            <div class="icon"><span class="flaticon-sauna"></span></div>
                            <div class="media-body">
                                <h3 class="heading mb-3">Баня</h3>
                                <p>Полноценная баня в вашем распоряжении</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Slider main container -->
            <div class="swiper-services">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    <div class="swiper-slide">
                        <div class="ftco-animate">
                            <div class="project-destination">
                                <a class="img" style="background-image: url(images/houses/nukutalo/20.webp);"
                                   href="images/houses/nukutalo/20.webp" data-fancybox="gallery-sub">
                                    <div class="text">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ftco-animate">
                            <div class="project-destination">
                                <a class="img" style="background-image: url(images/houses/nukutalo/19.webp);"
                                   href="images/houses/nukutalo/19.webp" data-fancybox="gallery-sub">
                                    <div class="text">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ftco-animate">
                            <div class="project-destination">
                                <a class="img" style="background-image: url(images/houses/nukutalo/23.webp);"
                                   href="images/houses/nukutalo/23.webp" data-fancybox="gallery-sub">
                                    <div class="text">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ftco-animate">
                            <div class="project-destination">
                                <a class="img" style="background-image: url(images/houses/nukutalo/21.webp);"
                                   href="images/houses/nukutalo/21.webp" data-fancybox="gallery-sub">
                                    <div class="text">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ftco-animate">
                            <div class="project-destination">
                                <a class="img" style="background-image: url(images/houses/nukutalo/24.webp);"
                                   href="images/houses/nukutalo/24.webp" data-fancybox="gallery-sub">
                                    <div class="text">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ftco-animate">
                            <div class="project-destination">
                                <a class="img" style="background-image: url(images/houses/nukutalo/25.webp);"
                                   href="images/houses/nukutalo/25.webp" data-fancybox="gallery-sub">
                                    <div class="text">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ftco-animate">
                            <div class="project-destination">
                                <a class="img" style="background-image: url(images/houses/nukutalo/26.webp);"
                                   href="images/houses/nukutalo/26.webp" data-fancybox="gallery-sub">
                                    <div class="text">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ftco-animate">
                            <div class="project-destination">
                                <a class="img" style="background-image: url(images/houses/nukutalo/27.webp);"
                                   href="images/houses/nukutalo/27.webp" data-fancybox="gallery-sub">
                                    <div class="text">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ftco-animate">
                            <div class="project-destination">
                                <a class="img" style="background-image: url(images/houses/nukutalo/28.webp);"
                                   href="images/houses/nukutalo/28.webp" data-fancybox="gallery-sub">
                                    <div class="text">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ftco-animate">
                            <div class="project-destination">
                                <a class="img" style="background-image: url(images/houses/nukutalo/29.webp);"
                                   href="images/houses/nukutalo/29.webp" data-fancybox="gallery-sub">
                                    <div class="text">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ftco-animate">
                            <div class="project-destination">
                                <a class="img" style="background-image: url(images/houses/nukutalo/30.webp);"
                                   href="images/houses/nukutalo/30.webp" data-fancybox="gallery-sub">
                                    <div class="text">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ftco-animate">
                            <div class="project-destination">
                                <a class="img" style="background-image: url(images/houses/nukutalo/31.webp);"
                                   href="images/houses/nukutalo/31.webp" data-fancybox="gallery-sub">
                                    <div class="text">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ftco-animate">
                            <div class="project-destination">
                                <a class="img" style="background-image: url(images/houses/nukutalo/32.webp);"
                                   href="images/houses/nukutalo/32.webp" data-fancybox="gallery-sub">
                                    <div class="text">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ftco-animate">
                            <div class="project-destination">
                                <a class="img" style="background-image: url(images/houses/nukutalo/33.webp);"
                                   href="images/houses/nukutalo/33.webp" data-fancybox="gallery-sub">
                                    <div class="text">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>

                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
            <div class="row">
                <div class="conf-btn" style="padding-top: 30px;"><a href="docs/nukutalo/nukutalo_sauna.docx"
                                                                    target="_blank"
                                                                    class="btn btn-primary py-3 px-4 ftco-animate"><i
                            class="ion-ios-document"></i> Посмотреть правила посещения бани</a></div>
            </div>
        </div>
    </section>
    <section id="availableServices" class="ftco-section services-section bg-light" style="padding-bottom: 0">
        <div class="container">
            <div class="row d-flex">
                <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
                    <h2 class="mb-4">Дополнительные услуги отсутствуют</h2>
                </div>
            </div>
        </div>
    </section>
    <section id="houseRules" class="ftco-section services-section pt-5 bg-light">
        <div class="container">
            <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate" style="padding-top: 60px;">
                <h2 class="mb-4">Список правил</h2>
                <p>Гостевой дом "Nukutalo" предлагает Вам ознакомиться с <b>6-ю</b> основными правилами бронирования,
                    пребывания, заезда и выезда:</p>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                        <div class="media block-6 services d-block">
                            <div class="icon"><span>1</span></div>
                            <div class="media-body">
                                <h3 class="heading mb-3">Бронирование</h3>
                                <p>Бронь производится от 1 суток.</p>
                                <p>Предоплата 30% от стоимости бронирования</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                        <div class="media block-6 services d-block">
                            <div class="icon"><span>2</span></div>
                            <div class="media-body">
                                <h3 class="heading mb-3">Заезд</h3>
                                <p>Стандартное время заезда после 15:00</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                        <div class="media block-6 services d-block">
                            <div class="icon"><span>3</span></div>
                            <div class="media-body">
                                <h3 class="heading mb-3">Выезд</h3>
                                <p>Стандартное время выезда до 12:00</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                        <div class="media block-6 services d-block">
                            <div class="icon"><span>4</span></div>
                            <div class="media-body">
                                <h3 class="heading mb-3">Изменить время</h3>
                                <p>Изменение во времени заезда или выезда обязательно обсуждаются заранее</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                        <div class="media block-6 services d-block">
                            <div class="icon"><span>5</span></div>
                            <div class="media-body">
                                <h3 class="heading mb-3">Домашние животные</h3>
                                <p>С животными заселение по договоренности</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                        <div class="media block-6 services d-block">
                            <div class="icon"><span>6</span></div>
                            <div class="media-body">
                                <h3 class="heading mb-3">Курение</h3>
                                <p>Курение в доме запрещено</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="conf-btn" style="padding-top: 30px;"><a href="#" <? /*id="reserve1" */ ?>
                                                                    data-tl-booking-open="true"
                                                                    class="btn btn-primary py-3 px-4 ftco-animate"><i
                            class="ion-ios-calendar"></i> Забронировать</a></div>
            </div>
        </div>
    </section>
    <section id="specials" class="pt-0 ftco-section services-section bg-light">
        <div class="container">
            <div class="row justify-content-center pb-4">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <h2 class="mb-4">Особенности</h2>
                    <p>Ниже, представлены некоторые интересные особенности гостевого дома "Нукутало"</p>
                </div>
            </div>
            <div class="row">
                <div class="post-wrap ftco-animate">
                    <div class="post-item">
                        <div class="item-content">
                            <div class="item-icon">
                                <strong class="number">1</strong>
                            </div>
                            <div class="item-body">
                                <p>Санузел (душ, туалет, умывальник, бойлер на 100л).</p>
                            </div>
                        </div>
                    </div>
                    <div class="post-item">
                        <div class="item-content">
                            <div class="item-icon">
                                <strong class="number">2</strong>
                            </div>
                            <div class="item-body">
                                <p>Тёплый пол в санузле и коридоре, в гостиной и спальне конвекторные обогреватели</p>
                            </div>
                        </div>
                    </div>
                    <div class="post-item">
                        <div class="item-content">
                            <div class="item-icon">
                                <strong class="number">3</strong>
                            </div>
                            <div class="item-body">
                                <p>Постельное бельё и полотенца входят в стоимость</p>
                            </div>
                        </div>
                    </div>
                    <div class="post-item">
                        <div class="item-content">
                            <div class="item-icon">
                                <strong class="number">4</strong>
                            </div>
                            <div class="item-body">
                                <p>Круглогодичный подъезд, парковка</p>
                            </div>
                        </div>
                    </div>
                    <div class="post-item">
                        <div class="item-content">
                            <div class="item-icon">
                                <strong class="number">5</strong>
                            </div>
                            <div class="item-body">
                                <p>Wi-fi</p>
                            </div>
                        </div>
                    </div>
                    <div class="post-item">
                        <div class="item-content">
                            <div class="item-icon">
                                <strong class="number">6</strong>
                            </div>
                            <div class="item-body">
                                <p>Расстояние до Мраморного Каньона 34 км</p>
                            </div>
                        </div>
                    </div>
                    <div class="post-item">
                        <div class="item-content">
                            <div class="item-icon">
                                <strong class="number">7</strong>
                            </div>
                            <div class="item-body">
                                <p>Прогулки по шхерам и поездки на о. Валаам 500м</p>
                            </div>
                        </div>
                    </div>
                    <div class="post-item">
                        <div class="item-content">
                            <div class="item-icon">
                                <strong class="number">8</strong>
                            </div>
                            <div class="item-body">
                                <p>Исторический парк Бастион 6 км</p>
                            </div>
                        </div>
                    </div>
                    <div class="post-item">
                        <div class="item-content">
                            <div class="item-icon">
                                <strong class="number">9</strong>
                            </div>
                            <div class="item-body">
                                <p>Ближайший продуктовый магазин 5 км</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 heading-section ftco-animate">
                <p class="color-black">Размещение для двоих взрослых на основных местах (двуспальная кровать),
                    размещение на доп местах
                    (раскладной диван, мы рекомендуем детям)</p>
                <p class="color-black">"Нукутало" - гостевой домик 2(+2) расположен в 5-ти километрах от города
                    Сортавала на о.Риеккалансаари,
                    крупнейшем острове Ладожского озера, входящем в шхерную зону.</p>
                <p class="color-black">Из домика вид на залив Ладожского озера с неповторимыми закатами. Рядом вековой
                    лес.</p>
                <p class="color-black">Всё фотографии природы сделаны в шаговой доступности</p>
                <p class="color-black">Кухня-гостиная с холодильником, 2-х конфорочной варочной панелью, электрическим
                    чайником, кофеваркой, свч, необходимой для приготовления пищи и сервировки стола посудой;</p>
                <p class="color-black">Спальня с большой двуспальной кроватью, вместительным шкафом, дополнительно
                    возможно установить раскладушку</p>
                <p class="color-black">В гостиной зоне расположен обеденный стол, несколько стульев, раскладной
                    диван-кровать (двуспальный), телевизор</p>
                <p class="color-black">В распоряжении гостей также беседка и мангал под навесом, шампуры
                    предоставляются, угли, розжиг и решётку при необходимости захватите с собой.</p>
                <p class="color-black">Домик расположен на отдельном участке. До воды около 300 м(смотрите карту), до
                    ближайшего места купания около 3 мин езды, 10 минут пешком, 15 минут прогулочным шагом.</p>
                <p class="color-black">Мы проживаем рядом, расстояние между домами примерно 150 м.</p>
                <p class="color-black">У нас вы можете арендовать отдельностоящую дровяную баньку с комнатой отдыха и
                    открытой верандой, расположенную
                    в глубине нашего участка на опушке леса, информация по аренде бани по запросу</p>
                <p class="color-black">С котами не размещаем</p>
                <p class="color-black">Размещение с собаками обсуждается отдельно. Укажите породу и возраст вашего
                    питомца.</p>
            </div>
            <div class="row d-flex">
                <div class="conf-btn" style="padding-top: 30px;"><a href="#" <? /*id="reserve1" */ ?>
                                                                    data-tl-booking-open="true"
                                                                    class="btn btn-primary py-3 px-4 ftco-animate"><i
                            class="ion-ios-calendar"></i> Забронировать</a></div>
            </div>
        </div>
    </section>
    <section id="houseReviews" style="background: url(images/houses/nukutalo/2.webp);"
             class="ftco-section services-section module bg-dark-60 pt-0 pb-0 parallax-bg testimonial ftco-animate">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 heading-section text-center">
                    <h2 class="pt-5" style="color: #ffdba3">Отзывы о доме</h2>
                </div>
            </div>
        </div>
        <div class="testimonials-slider pt-50 pb-140">
            <ul class="slides">
                <li>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="module-icon"><span class="icon-quote"></span></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-8 offset-sm-2">
                                <blockquote class="testimonial-text font-alt">Красивый вид, отличное месторасположение.
                                    Вокруг очень тихо. Возле дома есть беседка и все для барбекю.
                                    Мы были на велосипедах, из Сортавалы добираться минут 45. Нам очень понравилось.
                                </blockquote>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 offset-sm-4">
                                <div class="testimonial-author">
                                    <div class="testimonial-caption font-alt">
                                        <div class="testimonial-title">Никита</div>
                                        <div class="testimonial-descr">1 октября 2021</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="module-icon"><span class="icon-quote"></span></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-8 offset-sm-2">
                                <blockquote class="testimonial-text font-alt">Состояние коттеджа, практически
                                    новый.Обеспечение всем необходимым (посуда,техника, постельное белье.)
                                    Наличие крытой мангала беседки.
                                </blockquote>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 offset-sm-4">
                                <div class="testimonial-author">
                                    <div class="testimonial-caption font-alt">
                                        <div class="testimonial-title">Sedlovskiy</div>
                                        <div class="testimonial-descr">21 сентября 2021</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="module-icon"><span class="icon-quote"></span></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-8 offset-sm-2">
                                <blockquote class="testimonial-text font-alt">Понравилось все! Домик небольшой, но очень
                                    уютный и достаточно просторный.
                                    Есть все для комфортного отдыха и времяпрепровождения. Красивое окружение, есть где
                                    прогуляться, достаточно близко(на машине 10 мин) город с магазинами можно купить все
                                    необходимое.
                                    Отличное отношение к гостям: радушно встретили, все показали и расказали.
                                </blockquote>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 offset-sm-4">
                                <div class="testimonial-author">
                                    <div class="testimonial-caption font-alt">
                                        <div class="testimonial-title">Ксения</div>
                                        <div class="testimonial-descr">28 августа 2021</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="module-icon"><span class="icon-quote"></span></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-8 offset-sm-2">
                                <blockquote class="testimonial-text font-alt">Уютный домик, все соседи находятся далеко,
                                    большая двуспальная кровать, вид на воду, беседка + площадка для шашлыка
                                </blockquote>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 offset-sm-4">
                                <div class="testimonial-author">
                                    <div class="testimonial-caption font-alt">
                                        <div class="testimonial-title">Артём</div>
                                        <div class="testimonial-descr">19 августа 2021</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="module-icon"><span class="icon-quote"></span></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-8 offset-sm-2">
                                <blockquote class="testimonial-text font-alt">Отличный уютный дом рядом с шикарным лесом
                                    и видом на озеро.
                                    Отдельного внимания заслуживает веселый рыжий компаньон, готовый провести экскурсию
                                    по окрестным лесам и холмам, а также сопроводить на рыбалку.
                                    Жанна, спасибо за комфортный отдых!
                                </blockquote>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 offset-sm-4">
                                <div class="testimonial-author">
                                    <div class="testimonial-caption font-alt">
                                        <div class="testimonial-title">Николай</div>
                                        <div class="testimonial-descr">12 августа 2021</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="module-icon"><span class="icon-quote"></span></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-8 offset-sm-2">
                                <blockquote class="testimonial-text font-alt">Прекрасный дом для отдыха! Очень чисто и
                                    аккуратно. Есть вся необходимая посуда, техника, полотенца, чай, косметические
                                    средства и т.д.
                                    Место очень тихое. Остров прекрасен, а дом находится в самой тихой и уединенной его
                                    части. Хозяйка Жанна - светлый и доброжелательный человек!
                                    Помогала, советовала куда можно сходить на острове, что посмотреть. Остались только
                                    положительные эмоции
                                </blockquote>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 offset-sm-4">
                                <div class="testimonial-author">
                                    <div class="testimonial-caption font-alt">
                                        <div class="testimonial-title">Наталья</div>
                                        <div class="testimonial-descr">2 августа 2021</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>

                <li>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="module-icon"><span class="icon-quote"></span></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-8 offset-sm-2">
                                <blockquote class="testimonial-text font-alt">Невероятно красивое место! Тишина,
                                    волшебные закаты и рассветы, людей мало вокруг, озеро рядом.
                                    В доме все удобно, все предусмотрено под отдых.
                                </blockquote>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 offset-sm-4">
                                <div class="testimonial-author">
                                    <div class="testimonial-caption font-alt">
                                        <div class="testimonial-title">Светлана</div>
                                        <div class="testimonial-descr">15 июля 2021</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="module-icon"><span class="icon-quote"></span></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-8 offset-sm-2">
                                <blockquote class="testimonial-text font-alt">Жанна, спасибо вам огромное за такое
                                    шикарное,уединенное место!мы смогли погрузиться в тишину и спокойствие,вдали от шума
                                    и суеты!
                                    Чистый,новый,уютный,светлый дом,есть все необходимое для проживания! Беседка возле
                                    дома была нашим постоянным местом пребывания с шикарным видом на воду и закаты!
                                    Хороший мангал возле беседки. Рядом парк Рускеала, водопады Ахвенкоски и есть тропа
                                    на полуострове на гору священника, с прекрасным видом!
                                    По поводу подъезда к дому,очень переживали, что не проедем из-за понтонного моста, у
                                    нас очень низкая машина,ниже только спорткары проехали без проблем, там сейчас все
                                    хорошо подсыпали!
                                    в общем мы остались под огромным впечатлением от места, дома и прекрасной
                                    хозяйки!Спасибо вам,Жанна, за созданные для этого условия!Обязательно
                                    вернёмся!Рекомендую!
                                    Умке от нас привет️классная собака!
                                </blockquote>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 offset-sm-4">
                                <div class="testimonial-author">
                                    <div class="testimonial-caption font-alt">
                                        <div class="testimonial-title">Екатерина</div>
                                        <div class="testimonial-descr">21 июня 2021</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="module-icon"><span class="icon-quote"></span></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-8 offset-sm-2">
                                <blockquote class="testimonial-text font-alt">Это был отличный отдых. Дом новый, очень
                                    хорошее расположение, вид из окна прекрасный, каждый вечер смотрите на закат над
                                    озером.
                                    В доме все есть. Природа очень вокруг. Хозяйка супер приветливая, всегда на связи.
                                    Место понравилось, так как тихо, мало домов в округе, отдых от этого очень
                                    спокойный.
                                    На этом же полуострове есть гора священника с потрясным видом, спросите Жанну, она
                                    скажет как туда доехать. Это пять десять мин от домика.
                                    Внимаю тех у кого низкая посадка машины, надо быть внииательным, так как до домика
                                    надо добираться через пантонный мост, если у вас спорт машина, или паркетник, то
                                    лучше не рисковать, там торчит шпала на мосту.
                                    Говорят что шпалу засыпали песком, но проверяйте. В остальном все супер.
                                </blockquote>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 offset-sm-4">
                                <div class="testimonial-author">
                                    <div class="testimonial-caption font-alt">
                                        <div class="testimonial-title">Анна</div>
                                        <div class="testimonial-descr">3 июня 2021</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="module-icon"><span class="icon-quote"></span></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-8 offset-sm-2">
                                <blockquote class="testimonial-text font-alt">Отличное и комфортное место далеко от
                                    всего но достаточно близко к магазинам.
                                    Мангал с крышкой. Беседка есть. Вид на озеро есть. Пространство есть. Место для
                                    костёра есть.
                                </blockquote>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 offset-sm-4">
                                <div class="testimonial-author">
                                    <div class="testimonial-caption font-alt">
                                        <div class="testimonial-title">Louis</div>
                                        <div class="testimonial-descr">7 мая 2021</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="module-icon"><span class="icon-quote"></span></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-8 offset-sm-2">
                                <blockquote class="testimonial-text font-alt">Спасибо за гостеприимство и тёплый уютный
                                    дом. Отличная баня , попарились от души. Дорога почищена , с проездом проблем нет.
                                    Очень рекомендую домик для отдыха
                                </blockquote>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 offset-sm-4">
                                <div class="testimonial-author">
                                    <div class="testimonial-caption font-alt">
                                        <div class="testimonial-title">Анастасия</div>
                                        <div class="testimonial-descr">10 января 2021</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="module-icon"><span class="icon-quote"></span></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-8 offset-sm-2">
                                <blockquote class="testimonial-text font-alt">Все отлично, дом новый, все новое
                                </blockquote>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 offset-sm-4">
                                <div class="testimonial-author">
                                    <div class="testimonial-caption font-alt">
                                        <div class="testimonial-title">Пользователь</div>
                                        <div class="testimonial-descr">6 октября 2020</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="module-icon"><span class="icon-quote"></span></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-8 offset-sm-2">
                                <blockquote class="testimonial-text font-alt">Отдыхали в начале июля 2020, остались
                                    очень довольны. Очень комфортно в домике. Шикарное место. Приветливые хозяева .
                                </blockquote>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 offset-sm-4">
                                <div class="testimonial-author">
                                    <div class="testimonial-caption font-alt">
                                        <div class="testimonial-title">Елена</div>
                                        <div class="testimonial-descr">8 сентября 2020</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="module-icon"><span class="icon-quote"></span></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-8 offset-sm-2">
                                <blockquote class="testimonial-text font-alt">Рекомендую домик для проживания. Тихо, все
                                    новое, необходимые вещи есть, чисто. Жили 2 ночи, только приятные впечатления.
                                </blockquote>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 offset-sm-4">
                                <div class="testimonial-author">
                                    <div class="testimonial-caption font-alt">
                                        <div class="testimonial-title">Влад</div>
                                        <div class="testimonial-descr">19 августа 2020</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="module-icon"><span class="icon-quote"></span></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-8 offset-sm-2">
                                <blockquote class="testimonial-text font-alt">Мы были поражены гостеприимством хозяйки и
                                    песика, который проводил экскурсию на озеро)) Дом НОВЫЙ. И этим все сказано.
                                    Все чистое, свежее. Более того ещё и чай, сахар и ВНИМАНИЕ -фумигатор! Чтобы комары
                                    не сожрали нас)) Это все очень приятно и не может оставить никого равнодушным.
                                    Рекомендую вас друзьям! Большое спасибо!
                                </blockquote>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 offset-sm-4">
                                <div class="testimonial-author">
                                    <div class="testimonial-caption font-alt">
                                        <div class="testimonial-title">Оксана</div>
                                        <div class="testimonial-descr">25 июня 2020</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="module-icon"><span class="icon-quote"></span></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-8 offset-sm-2">
                                <blockquote class="testimonial-text font-alt">отличный дом. приветливая хозяйка. все
                                    понравилось.
                                </blockquote>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 offset-sm-4">
                                <div class="testimonial-author">
                                    <div class="testimonial-caption font-alt">
                                        <div class="testimonial-title">Иван</div>
                                        <div class="testimonial-descr">12 июня 2020</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <section id="houseBooking" class="ftco-section ftco-no-pb pt-5 bg-light" style="background: #f9fafb; z-index: 1">
        <div class="container">
            <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate" style="padding-top: 60px;">
                <h2 class="mb-4">Бронирование дома</h2>
                <p>Для бронирования гостевого дома "Nukutalo" заполните форму ниже</p>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="search-wrap-1 ftco-animate p-4">
                        <form action="#" class="search-property-1">
                            <div class="row">
                                <div class="col-lg-12 align-items-end">
                                    <div class="form-group" style="text-align: center;">
                                        <label for="#">Гостевой дом</label>
                                        <div class="sel sel--black-panther">
                                            <select name="select-profession" id="select-profession">
                                                <option value="" disabled>Выберите дом</option>
                                                <option value="5" name="select-profession-option">Nukutalo</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 align-items-end">
                                    <div class="form-group">
                                        <label for="#">Заезд и выезд</label>
                                        <div class="form-field">
                                            <div class="t-datepicker">
                                                <div class="t-check-in"></div>
                                                <div class="t-check-out"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 align-items-end">
                                    <div class="form-group">
                                        <label for="#">Имя</label>
                                        <div class="form-field">
                                            <div class="icon"><span class="ion-ios-book"></span></div>
                                            <input type="text" id="userName" class="form-control"
                                                   placeholder="Введите здесь">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 align-items-end">
                                    <div class="form-group">
                                        <label for="#">Номер телефона</label>
                                        <div class="form-field">
                                            <div class="icon"><span class="ion-ios-phone-portrait"></span></div>
                                            <input type="tel" id="mobileContact" class="form-control"
                                                   placeholder="Введите здесь">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 align-items-end">
                                    <div class="form-group">
                                        <label for="#">Фамилия</label>
                                        <div class="form-field">
                                            <div class="icon"><span class="ion-ios-book"></span></div>
                                            <input type="text" id="userSurname" class="form-control"
                                                   placeholder="Введите здесь">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 align-items-end">
                                    <div class="form-group">
                                        <label for="#">Адрес эл. почты</label>
                                        <div class="form-field">
                                            <div class="icon"><span class="ion-ios-mail"></span></div>
                                            <input type="email" id="emailContact" class="form-control"
                                                   placeholder="Введите здесь">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 align-items-end">
                                    <div class="form-group">
                                        <label for="#">Количество человек</label>
                                        <div class="form-field">
                                            <div class="icon"><span class="ion-ios-person"></span></div>
                                            <input type="number" min="1" max="5" id="personCount" class="form-control"
                                                   placeholder="Укажите число">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 align-items-end">
                                    <div class="form-group">
                                        <!-- begin toggle markup	 -->
                                        <label class="toggle-item" for="cancelAgreement">
                                            <input type="checkbox" class="toggle-item__input" id="cancelAgreement"/>
                                            <span class="toggle-item-track">
                                                    <span class="toggle-item-indicator">
                                                        <!-- 	This check mark is optional	 -->
                                                        <span class="checkMark-item">
                                                            <svg viewBox="0 0 24 24" id="ghq-svg-check"
                                                                 role="presentation" aria-hidden="true">
                                                                <path
                                                                    d="M9.86 18a1 1 0 01-.73-.32l-4.86-5.17a1.001 1.001 0 011.46-1.37l4.12 4.39 8.41-9.2a1 1 0 111.48 1.34l-9.14 10a1 1 0 01-.73.33h-.01z"></path>
                                                            </svg>
                                                        </span>
                                                    </span>
                                                </span>
                                            Соглашаюсь с правилами отмены бронирования и договором оферты
                                        </label>
                                        <a href="/agreement#cancel" target="_blank" class="publicPolicy"
                                           style="text-decoration: underline;font-style: italic;color: #999999; margin-left: 33px;">посмотреть
                                            правила и договор</a>
                                    </div>
                                </div>
                                <div class="col-lg align-self-end">
                                    <div class="form-group">
                                        <div class="form-field">
                                            <button type="button" id="sendAppBtn" onclick="sendApplication(this)"
                                                    hid="5" class="form-control btn btn-primary"><i
                                                    class="ion-ios-checkmark-circle"></i> Забронировать
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php echo $housesSlider; ?>
    <section class="ftco-section bg-light ftco-no-pb" id="faq">
        <div class="container">
            <div class="row justify-content-center pb-4">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <h2 class="mb-4">Вопросы и ответы</h2>
                    <p>Часто задаваемые вопросы и ответы на них</p>
                </div>
            </div>
            <div class="accordion-faq ftco-animate">
                <div class="accordion-item">
                    <button id="accordion-button-4" aria-expanded="true"><span class="accordion-title">Входит ли постельное белье в стоимость?</span><span
                            class="icon" aria-hidden="true"></span></button>
                    <div class="accordion-content">
                        <p>Да, постельное белье входит в стоимость брони</p>
                    </div>
                </div>
                <div class="accordion-item">
                    <button id="accordion-button-5" aria-expanded="false"><span class="accordion-title">Можно ли проехать на легковой машине на остров?</span><span
                            class="icon" aria-hidden="true"></span></button>
                    <div class="accordion-content">
                        <p>Да, можно. Дороги на острове чистятся</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section module bg-light" id="services" style="padding-bottom: 0">
        <div class="container">
            <div class="row justify-content-center pb-4">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <h2 class="mb-4">Может быть полезно</h2>
                    <p>Мы собрали для вас некоторое количество полезных ресурсов и сервисов, которые упростят Ваше
                        пребывание в Карелии, а также список интересных мест, которые поспособствуют Вашему
                        времяпровождению и разнообразят его.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <ul class="filter font-alt ftco-animate" id="filters">
                        <li><a class="current wow fadeInUp" href="#" data-filter=".illustration" data-wow-delay="0.2s">Сервисы
                                и услуги</a></li>
                        <li><a class="wow fadeInUp" href="#" data-filter=".marketing" data-wow-delay="0.4s">Еда</a></li>
                        <li><a class="wow fadeInUp" href="#" data-filter=".photography" data-wow-delay="0.6s">Интересные
                                места</a></li>
                        <li><a class="wow fadeInUp" href="#" data-filter=".webdesign"
                               data-wow-delay="0.6s">Развлечения</a></li>
                    </ul>
                </div>
            </div>
            <ul class="works-grid works-grid-3 works-grid-gut works-hover-d ftco-animate" id="works-grid">
                <div class="container">
                    <li class="work-item illustration">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex align-self-stretch ftco-animate">
                                        <div class="media block-6 services d-block">
                                            <div class="icon">
                                                <span class="icon-local_taxi"></span>
                                            </div>
                                            <div class="media-body">
                                                <h3 class="heading mb-3" style="padding-top: 10px">Такси в
                                                    Сортавала</h3>
                                                <p>Иногда, во время отдыха в гостевом доме в Сортавала, хочется остаться
                                                    без личного автомобиля. Осмотреть достопримечательности, поужинать в
                                                    хорошей компании.<br><br>
                                                    Качественный отдых в загородном доме <b>«Сонный залив»</b>,
                                                    предполагает возможность отвлечься от ежедневных привычных
                                                    задач.<br><br>
                                                    Остались до глубокой ночи в купели на террасе, были в сауне и бане,
                                                    а утром нужно за руль? Это не всегда удобно.<br><br>
                                                    Хорошо, что под рукой есть телефоны городских служб такси.<br><br>
                                                    Водители такси, которые знают; как быстро доехать <b>"Сортавала -
                                                        Рускеала"</b>, <b>"Сортавала - Чёрные камни"</b>, <b>"Сортавала
                                                        - Карельский зоопарк"</b>
                                                    Всегда приедут отвезти вашу компанию на легковом автомобиле или
                                                    микроавтобусе.<br><br>
                                                    Мы покажем Вам список служб такси города, которые предоставляют
                                                    услуги по минимальным ценам.<br><br>
                                                    Нажав на кнопку <b>"Подробнее"</b>, вы сможете более подробно
                                                    ознакомиться и узнать: номера телефонов для вызова, официальный
                                                    сайт, все тарифы и цены на услуги, а также, контакты.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row d-flex">
                                        <div class="conf-btn" style="padding-bottom: 50px;"><a href="/taksi"
                                                                                               target="_blank"
                                                                                               class="btn btn-primary py-3 px-4 ftco-animate"><i
                                                    class="ion-ios-information-circle"></i> Подробнее</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="work-item marketing">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex align-self-stretch ftco-animate">
                                        <div class="media block-6 services d-block">
                                            <div class="icon">
                                                <span class="icon-restaurant"></span>
                                            </div>
                                            <div class="media-body">
                                                <h3 class="heading mb-3" style="padding-top: 10px">Кафе и
                                                    ресторанов</h3>
                                                <p>Собрали для Вас список рекомендуемых к посещению ресторанов и кафе в
                                                    Карелии</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row d-flex">
                                        <div class="conf-btn" style="padding-bottom: 50px;"><a href="/kafe-i-restorany"
                                                                                               target="_blank"
                                                                                               class="btn btn-primary py-3 px-4 ftco-animate"><i
                                                    class="ion-ios-information-circle"></i> Подробнее</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </div>
            </ul>
        </div>
    </section>
    <section id="news" class="ftco-section bg-light pt-5">
        <div class="container">
            <div class="row justify-content-center pb-4">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <h2 class="mb-4">Недавние посты</h2>
                    <p>Наша новостная лента</p>
                </div>
            </div>
            <div class="swiper-news">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    <div class="swiper-slide">
                        <div class="ftco-animate">
                            <div class="blog-entry">
                                <a class="block-20" style="background-image: url('images/image_3.webp');"></a>
                                <div class="text mt-3 float-right d-block">
                                    <div class="d-flex align-items-center mb-4 topp">
                                        <div class="one">
                                            <span class="day">8</span>
                                        </div>
                                        <div class="two">
                                            <span class="yr">2021</span>
                                            <span class="mos">Мая</span>
                                        </div>
                                    </div>
                                    <h3 class="heading"><a>Карелия входит в число регионов-лидеров по вакцинации от
                                            ковида</a></h3>
                                    <p>Более 33 тысяч жителей Карелии сделали прививку первым компонентом вакцины
                                        «Спутник V». Наша республика входит в топ регионов по охвату иммунизацией.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ftco-animate">
                            <div class="blog-entry justify-content-end">
                                <a class="block-20" style="background-image: url('images/image_2.webp');">
                                </a>
                                <div class="text mt-3 float-right d-block">
                                    <div class="d-flex align-items-center mb-4 topp">
                                        <div class="one">
                                            <span class="day">4</span>
                                        </div>
                                        <div class="two">
                                            <span class="yr">2021</span>
                                            <span class="mos">Мая</span>
                                        </div>
                                    </div>
                                    <h3 class="heading"><a>Карелия вошла в тройку популярных направлений для летнего
                                            отдыха в палатках</a></h3>
                                    <p>Третье место поделили Алтайский край и Республика Алтай – их выбрали 13 процентов
                                        туристов. Следом идут Краснодарский край, озеро Байкал, Башкортостан, Тверская
                                        область и Кавказские Минеральные Воды, Хакасия и Карачаево-Черкесия.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ftco-animate">
                            <div class="blog-entry justify-content-end">
                                <a class="block-20" style="background-image: url('images/image_1.webp');">
                                </a>
                                <div class="text mt-3 float-right d-block">
                                    <div class="d-flex align-items-center mb-4 topp">
                                        <div class="one">
                                            <span class="day">1</span>
                                        </div>
                                        <div class="two">
                                            <span class="yr">2021</span>
                                            <span class="mos">Мая</span>
                                        </div>
                                    </div>
                                    <h3 class="heading"><a>Карелия возобновляет туризм</a></h3>
                                    <p>В Карелии открылась уже треть турбаз, а также знаковые природные парки и
                                        достопримечательности.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>

                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
    </section>
    <section id="contactData" class="ftco-section ftco-no-pt ftco-no-pb contact-section bg-light">
        <div class="container">
            <div class="row justify-content-center pb-4">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <h2 class="mb-4">Контакты</h2>
                    <p>Ниже, представлена актуальная информация для связи с нами</p>
                </div>
            </div>
            <div class="row d-flex contact-info">
                <div class="col-md-3 d-flex ftco-animate">
                    <div class="align-self-stretch box p-4 text-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="icon-map-signs"></span>
                        </div>
                        <h3 class="mb-2">Местоположение</h3>
                        <p>Россия, Республика Карелия, Сортавальское городское поселение, п. Нукутталахти, ул.
                            Центральная, д. 56 г</p>
                    </div>
                </div>
                <div class="col-md-3 d-flex ftco-animate">
                    <div class="align-self-stretch box p-4 text-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="icon-phone2"></span>
                        </div>
                        <h3 class="mb-2">Телефон</h3>
                        <p><a href="tel://+79811878002">+7 (981) 187-80-02</a></p>
                    </div>
                </div>
                <div class="col-md-3 d-flex ftco-animate">
                    <div class="align-self-stretch box p-4 text-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="icon-paper-plane"></span>
                        </div>
                        <h3 class="mb-2">Email</h3>
                        <p><a href="mailto:sonniyzaliv@yandex.ru">sonniyzaliv@yandex.ru</a></p>
                    </div>
                </div>
                <div class="col-md-3 d-flex ftco-animate">
                    <div class="align-self-stretch box p-4 text-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="icon-info"></span>
                        </div>
                        <h3 class="mb-2">ИНН</h3>
                        <p>920453015066</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section contact-section bg-light ftco-no-pt">
        <div class="container">
            <div class="row block-9">
                <div class="col-md-12 order-md-last d-flex ftco-animate">
                    <form action="#" class="bg-light contact-form">
                        <div class="form-group">
                            <input type="text" class="form-control" id="fullName" placeholder="ФИО">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="subject" placeholder="Тема">
                        </div>
                        <div class="form-group">
                            <textarea name="" cols="30" rows="7" class="form-control" id="message"
                                      placeholder="Текст письма"></textarea>
                        </div>
                        <div class="form-group">
                            <p>Нажимая на кнопку, я соглашаюсь на
                                <a href="/policy" class="publicPolicy"
                                   style="text-decoration: underline;color: #999999;">обработку персональных данных</a>
                            </p>
                        </div>
                        <div class="form-group" style="text-align: center">
                            <button type="button" onclick="sendMessage()" class="btn btn-primary py-3 px-5"><i
                                    class="ion-ios-send"></i> Отправить письмо
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <div class="btn-back-to-top bg0-hov" id="myBtn">
			<span class="symbol-btn-back-to-top">
				<i class="fa fa-angle-double-up" aria-hidden="true"></i>
			</span>
    </div>
</main>

<?php echo $footer; ?>

<!-- loader -->
<div id="ftco-loader" class="show fullscreen">
    <svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/>
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                stroke="#F96D00"/>
    </svg>
</div>

<!-- Modal -->
<div class="modal-wrapper">
    <div class="modal-ex">
        <div class="head">
            <a class="btn-close trigger" href="#">
                <i class="fa fa-times" aria-hidden="true"></i>
            </a>
        </div>
        <div class="content">
            <div class="good-job">
                <i class="fa fa-info" aria-hidden="true"></i>
                <h2 id="modalText">...</h2>
            </div>
        </div>
    </div>
</div>

<?php echo $subsMenu; ?>

<script defer src="js/jquery.min.js"></script>
<script defer src="js/jquery-migrate-3.0.1.min.js"></script>
<script defer src="js/popper.min.js"></script>
<script defer src="js/bootstrap.min.js"></script>
<script defer src="js/jquery.easing.1.3.js"></script>
<script defer src="js/jquery.waypoints.min.js"></script>
<script defer src="js/jquery.stellar.min.js"></script>

<!-- blockUI -->
<script defer src="js/jquery.blockUI.js"></script>

<script defer type="text/javascript" src="js/t-datepicker.js?v=<?php echo VERSION['scripts']['datepicker'] ?>"></script>

<script defer src="js/swiper.js" type="text/javascript"></script>
<script defer src="js/swiper.min.js" type="text/javascript"></script>
<script defer src="js/swiper-custom.js?v=<?php echo VERSION['scripts']['swiper'] ?>" type="text/javascript"></script>

<script defer src="js/owl.carousel.min.js"></script>
<script defer src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

<script defer src="https://cdn.jsdelivr.net/npm/jquery.maskedinput@1.4.1/src/jquery.maskedinput.min.js"
        type="text/javascript"></script>

<script defer src="js/jquery.flexslider.js"></script>

<script defer src="js/isotope.pkgd.js"></script>
<script defer src="js/imagesloaded.pkgd.js"></script>
<script defer src="js/masonry.pkgd.js"></script>
<script defer src="js/jquery.mb.YTPlayer.js"></script>
<script defer src="js/jquery.simple-text-rotator.min.js"></script>

<script defer src="js/jquery.magnific-popup.min.js"></script>
<script defer src="js/aos.js"></script>
<script defer src="js/jquery.animateNumber.min.js"></script>
<script defer src="js/bootstrap-datepicker.js"></script>
<script defer src="js/bootstrap-datepicker-ru.js"></script>
<script defer src="js/scrollax.min.js"></script>
<script defer src="js/main.min.js?v=<?php echo VERSION['scripts']['main'] ?>"></script>

<script defer src="js/wow.min.js"></script>

<script>
    var dates = [];
    var oneDayRange = [];
    var h_id = <?php echo json_encode($house_id)?>

        dates = <?php echo json_encode($dates) ?>;
    oneDayRange = <?php echo json_encode($oneDayRange) ?>;
</script>

<!-- other scripts -->
<script defer src="js/script.min.js?v=<?php echo VERSION['scripts']['script'] ?>"></script>

<script defer src="js/cbpFWTabs.js"></script>

<script type="application/ld+json">{
    "@context": "https://schema.org",
    "@type": "WebPage",
    "url": "https://sonniyzaliv.ru/nukutalo",
    "name": "Nukutalo - снять гостевой дом в республике Карелия. Аренда коттеджа посуточно в республике Карелия г. Сортавала",
    "description": "Мы предлагаем Вам снять дом Nukutalo со всеми удобствами в Карелии г. Сортавала. Арендовать коттедж Nukutalo на сутки в республике Карелия на Сонный Залив. Уютный дом Nukutalo на берегу озера. Арендуйте дом Nukutalo с панорамным видом на сутки в республике Карелия по цене от 5000 тыс. руб.",
    "inLanguage": "ru-RU",
    "publisher": {
        "@type": "Organization",
        "name": "Сонный Залив",
        "logo": {
            "@type": "ImageObject",
            "url": "https://sonniyzaliv.ru/images/logo.png"
        },
        "address": {
            "@type": "PostalAddress",
            "addressLocality": "Нукутталахти",
            "postalCode": "186790",
            "streetAddress": "Центральная, 52"
        },
        "contactPoint": [
            {
                "@type": "ContactPoint",
                "telephone": "+7 981 187-80-02",
                "contactType": "Александр"
            },
            {
                "@type": "ContactPoint",
                "telephone": "+7 981 750-44-89",
                "contactType": "Юлия"
            }
        ]
    }
}</script>

<!--  <script src="//code-ya.jivosite.com/widget/vEPLFIAKHV" async></script>-->


<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (m, e, t, r, i, k, a) {
        m[i] = m[i] || function () {
            (m[i].a = m[i].a || []).push(arguments)
        };
        m[i].l = 1 * new Date();
        k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
    })
    (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

    ym(79760224, "init", {
        clickmap: true,
        trackLinks: true,
        accurateTrackBounce: true,
        webvisor: true
    });
</script>
<noscript>
    <div><img src="https://mc.yandex.ru/watch/79760224" style="position:absolute; left:-9999px;" alt=""/></div>
</noscript>
<!-- /Yandex.Metrika counter -->

</body>
</html>
