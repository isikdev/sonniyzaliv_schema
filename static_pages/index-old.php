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

$title = 'Гостевые дома "Сонный Залив", г. Сортавала - официальный сайт';
$descr = 'Мы предлагаем Вам снять дома с панорамным видом на озеро и всеми удобствами в Карелии г. Сортавала. Аренда коттеджей на сутки в республике Карелия на Сонный Залив. Уютные большие дома на берегу озера. Арендуйте дома с панорамным видом на сутки в республике Карелия по низким ценам';
$keywords = 'снять коттедж на сутки в республике Карелия, аренда коттеджа посуточно в республике Карелия, аренда дома с панорманым видом на озеро, отдых в Карелии, снять дом с видом на озеро';

$house_id = 3;

$bookingData = getBookingData($house_id);

$res = getFormatBookingCalendarDates($bookingData);

$dates = $res['dates'];
$oneDayRange = $res['oneDayRange'];

$housesSlider = initHousesSlider(-1, "Наши гостевые дома");
$offers = getHotOffers();
$initHotOffers = initHotOffers($offers);
$reviews = getHouseReview();
$reviewBackground = getHouseReviewBackgroundUrl();
$initHouseReviews = initHouseReview($reviews, $reviewBackground);
$news = getNews();
$initNews = initNews($news);
$contactsArr = getSettings([1, 2, 3, 4]);
$initContacts = initMainContacts($contactsArr);
$iconBlock = getSubscribeIconBlock();
$subsMenu = getSubscribeMenu();
$footer = getFooter();

//$infoForSlider = getHousesInfoForSlider();
?> <!DOCTYPE html>
<html lang="ru" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#" class="tl-html">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <title>
        <?php echo $title; ?>
    </title>
    <meta name="description" content="<?php echo $descr; ?>">
    <meta name="keywords" content="<?php echo $keywords; ?>">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Сонный Залив">
    <meta property="og:title" content="<?php echo $title; ?>">
    <meta property="og:description" content="<?php echo $descr; ?>">
    <meta property="og:url" content="https://sonniyzaliv.ru/">
    <meta property="og:locale" content="ru_RU">
    <meta property="og:image" content="images/logo.png">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" as="style" rel="preload" onload='this.rel="stylesheet"'>
    <link href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" as="style" rel="preload" onload='this.rel="stylesheet"'>
    <link href="css/open-iconic-bootstrap.min.css" as="style" rel="preload" onload='this.rel="stylesheet"'>
    <link href="css/animate.css" as="style" rel="preload" onload='this.rel="stylesheet"'>
    <link href="css/owl.carousel.min.css" as="style" rel="preload" onload='this.rel="stylesheet"'>
    <link href="css/owl.theme.default.min.css" as="style" rel="preload" onload='this.rel="stylesheet"'>
    <link href="css/magnific-popup.css" as="style" rel="preload" onload='this.rel="stylesheet"'>
    <link href="css/aos.css" as="style" rel="preload" onload='this.rel="stylesheet"'>
    <link href="css/flexslider/flexslider.css" as="style" rel="preload" onload='this.rel="stylesheet"'>
    <link href="libs/et-line-font/et-line-font.css?v=3.3" as="style" rel="preload" onload='this.rel="stylesheet"'>
    <link href="css/font-awesome.min.css" as="style" rel="preload" onload='this.rel="stylesheet"'>
    <link rel="shortcut icon" href="https://sonniyzaliv.ru/favicon.ico" type="image/x-icon">
    <link href="favicon.ico" rel="icon" type="image/x-icon">
    <link href="css/ionicons.min.css" as="style" rel="preload" onload='this.rel="stylesheet"'>
    <link href="css/bootstrap-datepicker.css" as="style" rel="preload" onload='this.rel="stylesheet"'>
    <link href="css/jquery.timepicker.css" as="style" rel="preload" onload='this.rel="stylesheet"'>
    <link href="css/swiper.min.css" as="style" rel="preload" onload='this.rel="stylesheet"' type="text/css">
    <link href="css/flaticon.css?v=3.4" as="style" rel="preload" onload='this.rel="stylesheet"'>
    <link href="css/mistral.css" as="style" rel="preload" onload='this.rel="stylesheet"'>
    <link href="css/monotype_corsiva.css" as="style" rel="preload" onload='this.rel="stylesheet"'>
    <link href="css/icomoon.css?v=3.4" as="style" rel="preload" onload='this.rel="stylesheet"'>
    <link href="css/style.min.css?v=<?php echo VERSION['styles'] ?>" as="style" rel="preload" onload='this.rel="stylesheet"'>
    <meta name="yandex-verification" content="077ed0cb5ca007c0">
    <script type="text/javascript">!function(r){var e=[["setContext","TL-INT-sonniyzaliv_2023-01-11","ru"],["embed","search-form",{container:"tl-search-form"}]],t=r.travelline=r.travelline||{},n=t.integration=t.integration||{};if(n.__cq=n.__cq?n.__cq.concat(e):e,!n.__loader){n.__loader=!0;var o=r.document,a=o.getElementsByTagName("head")[0]||o.getElementsByTagName("body")[0];!function e(t){if(0!==t.length){var n=o.createElement("script");n.type="text/javascript",n.async=!0,n.src="https://"+t[0]+"/integration/loader.js",n.onerror=n.onload=function(e,t){return function(){r.TL||(a.removeChild(e),t())}}(n,function(){e(t.slice(1,t.length))}),a.appendChild(n)}}(["ru-ibe.tlintegration.ru","ibe.tlintegration.ru","ibe.tlintegration.com"])}}(window),document.addEventListener("DOMContentLoaded",function(){var e=document.querySelector(".head-text .col-md-9"),t=document.querySelector("#block-search");e.appendChild(t)})</script>
    <link rel="stylesheet" href="css/travelline-style.css">
</head>
<body>
<header class="header">
    <div itemscope itemtype="https://schema.org/Organization" style="display:none">
        <meta itemprop="name" content="<?php echo $title; ?>">
        <link itemprop="url" href="https://sonniyzaliv.ru/">
        <link itemprop="logo" href="https://sonniyzaliv.ru/images/logo.png">
        <meta itemprop="description" content="<?php echo $descr; ?>">
        <meta itemprop="email" content="sonniyzaliv@yandex.ru">
        <div itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
            <meta itemprop="addressLocality" content="Нукутталахти">
            <meta itemprop="postalCode" content="186790">
            <meta itemprop="streetAddress" content="Центральная, 52">
        </div>
        <meta itemprop="telephone" content="+7 981 187-80-02">
        <meta itemprop="telephone" content="+7 981 750-44-89">
        <link itemprop="sameAs" href="https://t.me/+KmgBetu6NYtlNjcy">
    </div>
    <section class="nav-container">
        <div class="wrapper">
            <a class="brand">Сонный Залив</a>
            <button type="button" class="burger" id="burger">
                <span class="burger-line"></span>
                <span class="burger-line"></span>
                <span class="burger-line"></span>
                <span class="burger-line"></span>
            </button>
            <span class="overlay" id="overlay"></span>
            <nav class="navbar" id="navbar">
                <ul class="menu">
                    <li class="menu-item menu-item-child">
                        <a data-toggle="sub-menu">Главная<i class="expand">
                            </i>
                        </a>
                        <ul class="sub-menu">
                            <li class="menu-item">
                                <a href="#all-houses">Гостевые дома</a>
                            </li>
                            <li class="menu-item">
                                <a href="#houseReviews">Отзывы о домах</a>
                            </li>
                            <li class="menu-item">
                                <a href="#houseBooking">Бронирование домов</a>
                            </li>
                            <li class="menu-item">
                                <a href="#aboutUs">О нас</a>
                            </li>
                            <li class="menu-item">
                                <a href="#faq">Вопрос - ответ</a>
                            </li>
                            <li class="menu-item">
                                <a href="#services">Полезные ресурсы</a>
                            </li>
                            <li class="menu-item">
                                <a href="#news">Новости</a>
                            </li>
                            <li class="menu-item">
                                <a href="#contactData">Контакты</a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item">
                        <a style="color:#f9ab30" href="/catalog">Каталог жилья</a>
                    </li>
                    <li class="menu-item">
                        <a href="<?/*#houseBooking*/?>#" data-tl-booking-open="true">Забронировать</a>
                    </li>
                </ul>
            </nav>
        </div>
    </section>
</header>
<main role="main">
    <div class="js-fullheight" id="main-photo" style="background:#f9fafb">
        <div class="flexslider">
            <ul class="slides">
                <li style="background-image:url(images/houses/sonniy-zaliv/1.webp)" data-stellar-background-ratio="0.5">
                </li>
                <li style="background-image:url(images/houses/siniy-dom/leto/2.webp)" data-stellar-background-ratio="0.5">
                </li>
                <li style="background-image:url(images/houses/nukutalo/2.webp)" data-stellar-background-ratio="0.5">
                </li>
                <li style="background-image:url(images/houses/chernika-v-nukuttalahti/leto/2.webp)" data-stellar-background-ratio="0.5">
                </li>
            </ul>
            <div class="overlay">
            </div>
            <div class="head-text">
                <div class="container">
                    <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
                        <div class="col-md-9 text text-center ftco-animate" style="margin-top:100px" data-scrollax=" properties: { translateY: '70%' }">
                            <img src="images/logo2.png" style="vertical-align:super" alt="Логотип" title="Логотип">
                            <h1 id="act-form" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Сонный Залив</h1>
                            <h2 class="subtext" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Аренда коттеджей в Карелии с панорамным видом на озеро</h2> <?php echo $iconBlock; ?> </div>
                        <div class="icon-scroll col-md-12">
                            <div class="mouse">
                                <div class="wheel">
                                </div>
                            </div>
                            <div class="icon-arrows"><span></span></div>
                        </div>
                    </div>
                    <div id="block-search">
                        <div id="tl-search-form" class="tl-container">
                            <noindex>
                                <a href="https://www.travelline.ru/products/tl-hotel/" rel="nofollow" target="_blank">TravelLine</a>
                            </noindex>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="ftco-section ftco-animate ftco-counter services-section bg-light pt-5 ftco-no-pb">
        <div class="container">
            <div class="row d-flex">
                <div class="col-md-12">
                    <div class="text-center" style="height:129px;overflow:hidden;">
                        <iframe style="height:100%;border:1px solid #3e4a7b;border-radius:8px;box-sizing:border-box" src="https://yandex.ru/maps-reviews-widget/222502182716?comments"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php echo $housesSlider; ?> <?php echo $initHotOffers; ?> <?php echo $initHouseReviews; ?>
    <section id="aboutUs" class="ftco-section ftco-animate ftco-counter services-section bg-light pt-5 ftco-no-pb">
        <div class="container">
            <div class="row d-flex">
                <div class="col-md-12 pl-md-12 py-5">
                    <div class="row justify-content-start pb-3">
                        <div class="col-md-12 heading-section ftco-animate">
                            <h2 class="mb-4 text-center">О нас</h2>
                            <p class="text-center">Предоставляем Вам информацию о нашем сервисе</p>
                            <div class="col-md-12 justify-content-center counter-wrap ftco-animate" style="padding-top:22px">
                                <div class="block-18 text-center mb-5">
                                    <div class="text">
                                        <strong style="font-size:18px;color:#323232">"Сонный залив". Место вне времени. Аренда домов в Карелии, г. Сортавала.</strong>
                                    </div>
                                </div>
                            </div>
                            <p class="color-black">
                                <b>Кто мы?</b>&nbsp;Сообщество собственников недвижимости - аренда гостевых домов для гостей со всей России. Москва - Сортавала, Санкт-Петербург – Сортавала – самые распространённые маршруты по дороге к нашим гостевым домам.</p>
                            <p class="color-black">Каждый дом уникален и предназначен для гостей с большой или маленькой компанией, для гостей с маленькими детьми, для аренды гостями с животными</p>
                            <p class="color-black">Аренда дома в Сортавала с питомцем возможна без проблем. Большой или не очень, питомец в гостевом доме – символическая плата за уборку.</p>
                            <br>
                            <p class="color-black">
                                <b>Где?</b>&nbsp;Уникальная природная локация, расположенная на большом вулканическом острове покрытым столетним лесом на берегу пролива в 4 километрах от центра г. Сортавала.</p>
                            <p class="color-black">Аренда бани, аренда лодки, аренда дома целиком – это то, что мы предлагаем нашим гостям.</p>
                            <br>
                            <p class="color-black">
                                <b>Наша миссия:</b>&nbsp;Поддерживать баланс между комфортной ценой для гостей и комфортным семейным отдыхом в загородном доме на берегу пролива в уникальном, созданным природой, месте.</p>
                            <p class="color-black">Улучшаем качество отдыха чтобы гости получали больше приятных эмоций от визитов в Карелию.</p>
                            <br>
                            <p class="color-black">
                                <b>Для кого?</b>&nbsp;Кто наши гости: это пары, небольшие компании 4-8 человек и семьи с детьми, гости с домашними питомцами</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center mb-4">
                                <div class="text">
                                    <strong class="number">1</strong>
                                    <span>
<b>Мы - сообщество собственников жилья напрямую без агентов</b>
</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center mb-4">
                                <div class="text">
                                    <strong class="number">2</strong>
                                    <span>
<b>Оплаты безналично на карту с защитой visa, mastercard и мир</b>
</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center mb-4">
                                <div class="text">
                                    <strong class="number">3</strong>
                                    <span>
<b>Возможность гибкой отмены брони</b>
</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center mb-4">
                                <div class="text">
                                    <strong class="number">4</strong>
                                    <span>
<b>Только новые дома</b>
</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center mb-4">
                                <div class="text">
                                    <strong class="number">5</strong>
                                    <span>
<b>Уникальная природная локация (берег Ладоги и лес)</b>
</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center mb-4">
                                <div class="text">
                                    <strong class="number">6</strong>
                                    <span>
<b>Гостевой дом под ключ от 3000 до 25000 в сутки.</b>
</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center mb-4">
                                <div class="text">
                                    <strong class="number">7</strong>
                                    <span>
<b>Пара из 2-х влюблённых, семья с детьми и питомцами, и компания на 14 человек - все смогут найти для себя качественный, комфортный отдых на нашем ресурсе.</b>
</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center mb-4">
                                <div class="text">
                                    <strong class="number">8</strong>
                                    <span>
<b>Легко выбрать дом в своём бюджете.Быстро выбрать интересующую дату и заполнить данные о своей компании</b>
</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center mb-4">
                                <div class="text">
                                    <strong class="number">9</strong>
                                    <span>
<b>Забронировать, оплатить на сайте бронь, получить договор и чек на электронную почту. Приехать в выбранную дату и насладиться отдыхом.</b>
</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 justify-content-center counter-wrap ftco-animate" style="padding-top:22px">
                            <div class="block-18 text-center mb-4">
                                <div class="text">
                                    <strong style="font-size:22px;color:#f9ab30">Появились вопросы? Хотите разместить свой дом? Напишите нам</strong>
                                    <ul class="ftco-footer-social list-unstyled">
                                        <li class="ftco-animate">
                                            <a rel="nofollow" href="https://t.me/+KmgBetu6NYtlNjcy" target="_blank">
<span class="icon-telegram">
</span>
                                            </a>
                                        </li>
                                        <li class="ftco-animate">
                                            <a rel="nofollow" href="https://wa.me/79811878002" target="_blank">
<span class="icon-whatsapp">
</span>
                                            </a>
                                        </li>
                                        <li class="ftco-animate">
                                            <a rel="nofollow" href="https://www.avito.ru/user/d85b3127cde8be346816977d68ea748a/profile?id=2443568322&src=item&page_from=from_item_card&iid=2443568322" target="_blank">
                                                <img style="width:inherit;margin:13px 0;padding:4px" src="/icons/avito.svg">
                                            </a>
                                        </li>
                                        <div class="row d-flex">
                                            <div class="conf-btn" style="padding-bottom:20px">
                                                <a href="https://vk.com/public212131932" style="background:#4f5e97!important;font-weight:700;border-color:#6c7ebb!important;transition:all .5s ease" target="_blank" class="btn btn-primary py-3 px-4 ftco-animate">
                                                    <i class="icon-vk">
                                                    </i>&nbsp;Подпишись</a>
                                            </div>
                                        </div>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section bg-light ftco-no-pb ftco-no-pt" id="faq">
        <div class="container">
            <div class="row justify-content-center pb-4">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <h2 class="mb-4">Вопросы и ответы</h2>
                    <p>Часто задаваемые вопросы и ответы на них</p>
                </div>
            </div>
            <div class="accordion-faq ftco-animate">
                <div class="accordion-item">
                    <button id="accordion-button-4" aria-expanded="true">
                        <span class="accordion-title">Входит ли постельное белье в стоимость?</span>
                        <span class="icon" aria-hidden="true">
</span>
                    </button>
                    <div class="accordion-content">
                        <p>Да, постельное белье входит в стоимость брони</p>
                    </div>
                </div>
                <div class="accordion-item">
                    <button id="accordion-button-5" aria-expanded="false">
                        <span class="accordion-title">Можно ли проехать на легковой машине на остров?</span>
                        <span class="icon" aria-hidden="true">
</span>
                    </button>
                    <div class="accordion-content">
                        <p>Да, можно. Дороги на острове чистятся</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section module bg-light" id="services" style="padding-bottom:0">
        <div class="container">
            <div class="row justify-content-center pb-4">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <h2 class="mb-4">Может быть полезно</h2>
                    <p>Мы собрали для вас некоторое количество полезных ресурсов и сервисов, которые упростят Ваше пребывание в Карелии, а также список интересных мест, которые поспособствуют Вашему времяпровождению и разнообразят его.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <ul class="filter font-alt ftco-animate" id="filters">
                        <li><a class="current wow fadeInUp" href="#" data-filter=".illustration" data-wow-delay="0.2s">Сервисы и услуги</a></li>
                        <li><a class="wow fadeInUp" href="#" data-filter=".marketing" data-wow-delay="0.4s">Еда</a></li>
                        <li><a class="wow fadeInUp" href="#" data-filter=".photography" data-wow-delay="0.6s">Интересные места</a></li>
                        <li><a class="wow fadeInUp" href="#" data-filter=".webdesign" data-wow-delay="0.6s">Развлечения</a></li>
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
                                                <h3 class="heading mb-3" style="padding-top: 10px">Такси в Сортавала</h3>
                                                <p>Иногда, во время отдыха в гостевом доме в Сортавала, хочется остаться без личного автомобиля. Осмотреть достопримечательности, поужинать в хорошей компании.<br><br>
                                                    Качественный отдых в загородном доме <b>«Сонный залив»</b>, предполагает возможность отвлечься от ежедневных привычных задач.<br><br>
                                                    Остались до глубокой ночи в купели на террасе, были в сауне и бане, а утром нужно за руль? Это не всегда удобно.<br><br>
                                                    Хорошо, что под рукой есть телефоны городских служб такси.<br><br>
                                                    Водители такси, которые знают; как быстро доехать <b>"Сортавала - Рускеала"</b>, <b>"Сортавала - Чёрные камни"</b>, <b>"Сортавала - Карельский зоопарк"</b>
                                                    Всегда приедут отвезти вашу компанию на легковом автомобиле или микроавтобусе.<br><br>
                                                    Мы покажем Вам список служб такси города, которые предоставляют услуги по минимальным ценам.<br><br>
                                                    Нажав на кнопку <b>"Подробнее"</b>, вы сможете более подробно ознакомиться и узнать: номера телефонов для вызова, официальный сайт, все тарифы и цены на услуги, а также, контакты.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row d-flex">
                                        <div class="conf-btn" style="padding-bottom: 50px;"><a href="/taksi" target="_blank" class="btn btn-primary py-3 px-4 ftco-animate"><i class="ion-ios-information-circle"></i> Подробнее</a></div>
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
                                                <h3 class="heading mb-3" style="padding-top: 10px">Кафе и ресторанов</h3>
                                                <p>Собрали для Вас список рекомендуемых к посещению ресторанов и кафе в Карелии</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row d-flex">
                                        <div class="conf-btn" style="padding-bottom: 50px;"><a href="/kafe-i-restorany" target="_blank" class="btn btn-primary py-3 px-4 ftco-animate"><i class="ion-ios-information-circle"></i> Подробнее</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </div>
            </ul>
        </div>
    </section>
    <?php echo $initNews; ?> <?php echo $initContacts; ?>
    <section class="ftco-section contact-section ftco-no-pt bg-light">
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
<textarea name="" cols="30" rows="7" class="form-control" id="message" placeholder="Текст письма">
</textarea>
                        </div>
                        <div class="form-group">
                            <p>Нажимая на кнопку, я соглашаюсь на&nbsp;<a href="/policy" class="publicPolicy" style="text-decoration:underline;color:#999">обработку персональных данных</a>
                            </p>
                        </div>
                        <div class="form-group" style="text-align:center">
                            <button type="button" onclick="sendMessage()" class="btn btn-primary py-3 px-5">
                                <i class="ion-ios-send">
                                </i>&nbsp;Отправить письмо</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <div class="btn-back-to-top bg0-hov" id="myBtn">
<span class="symbol-btn-back-to-top">
<i class="fa fa-angle-double-up" aria-hidden="true">
</i>
</span>
    </div>
</main> <?php echo $footer; ?> <div id="ftco-loader" class="show fullscreen">
    <svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/>
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/>
    </svg>
</div>
<div class="modal-wrapper">
    <div class="modal-ex">
        <div class="head">
            <a class="btn-close trigger" href="#">
                <i class="fa fa-times" aria-hidden="true">
                </i>
            </a>
        </div>
        <div class="content">
            <div class="good-job">
                <i class="fa fa-info" aria-hidden="true">
                </i>
                <h2 id="modalText">...</h2>
            </div>
        </div>
    </div>
</div> <?php echo $subsMenu; ?> <script defer="defer" src="js/jquery.min.js">
</script>
<script defer="defer" src="js/jquery-migrate-3.0.1.min.js">
</script>
<script defer="defer" src="js/popper.min.js">
</script>
<script defer="defer" src="js/bootstrap.min.js">
</script>
<script defer="defer" src="js/jquery.easing.1.3.js">
</script>
<script defer="defer" src="js/jquery.waypoints.min.js">
</script>
<script defer="defer" src="js/jquery.stellar.min.js">
</script>
<script defer="defer" src="js/jquery.blockUI.js">
</script>
<script defer="defer" src="js/swiper.js" type="text/javascript">
</script>
<script defer="defer" src="js/swiper.min.js" type="text/javascript">
</script>
<script defer="defer" src="js/swiper-custom.js?v=<?php echo VERSION['scripts']['swiper'] ?>" type="text/javascript">
</script>
<script defer="defer" src="js/owl.carousel.min.js">
</script>
<script defer="defer" src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js">
</script>
<script defer="defer" src="https://cdn.jsdelivr.net/npm/jquery.maskedinput@1.4.1/src/jquery.maskedinput.min.js" type="text/javascript">
</script>
<script defer="defer" src="js/jquery.flexslider.js">
</script>
<script defer="defer" src="js/isotope.pkgd.js">
</script>
<script defer="defer" src="js/imagesloaded.pkgd.js">
</script>
<script defer="defer" src="js/masonry.pkgd.js">
</script>
<script defer="defer" src="js/jquery.mb.YTPlayer.js">
</script>
<script defer="defer" src="js/jquery.simple-text-rotator.min.js">
</script>
<script defer="defer" src="js/jquery.magnific-popup.min.js">
</script>
<script defer="defer" src="js/aos.js">
</script>
<script defer="defer" src="js/jquery.animateNumber.min.js">
</script>
<script defer="defer" src="js/bootstrap-datepicker.js">
</script>
<script defer="defer" src="js/bootstrap-datepicker-ru.js">
</script>
<script defer="defer" src="js/scrollax.min.js">
</script>
<script defer="defer" src="js/main.min.js?v=<?php echo VERSION['scripts']['main'] ?>">
</script>
<script defer="defer" src="js/wow.min.js">
</script>
<script defer="defer" src="js/script.min.js?v=<?php echo VERSION['scripts']['script'] ?>">
</script>
<script defer="defer" src="js/cbpFWTabs.js">
</script>
<script type="application/ld+json">{
    "@context": "https://schema.org",
    "@type": "WebPage",
    "url": "https://sonniyzaliv.ru/index-old.php",
    "name": "Гостевые дома ",
    "description": "Мы предлагаем Вам снять дома с панорамным видом на озеро и всеми удобствами в Карелии г. Сортавала. Аренда коттеджей на сутки в республике Карелия на Сонный Залив. Уютные большие дома на берегу озера. Арендуйте дома с панорамным видом на сутки в республике Карелия по низким ценам",
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
<script async src="https://www.googletagmanager.com/gtag/js?id=G-3HP381QVQQ">
</script>
<script>function gtag(){dataLayer.push(arguments)}window.dataLayer=window.dataLayer||[],gtag("js",new Date),gtag("config","G-3HP381QVQQ")</script>
<script type="text/javascript">!function(e,t,a,n,c,m,r){e.ym=e.ym||function(){(e.ym.a=e.ym.a||[]).push(arguments)},e.ym.l=1*new Date,m=t.createElement(a),r=t.getElementsByTagName(a)[0],m.async=1,m.src="https://mc.yandex.ru/metrika/tag.js",r.parentNode.insertBefore(m,r)}(window,document,"script"),ym(79760224,"init",{clickmap:!0,trackLinks:!0,accurateTrackBounce:!0,webvisor:!0})</script>
<noscript>
    <div>
        <img src="https://mc.yandex.ru/watch/79760224" style="position:absolute;left:-9999px" alt="">
    </div>
</noscript>
</body>
</html>