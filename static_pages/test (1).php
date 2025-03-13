<?php
    require ('functions.php');

    $LastModified_unix = getlastmod(); // время последнего изменения страницы
    $LastModified = gmdate("D, d M Y H:i:s \G\M\T", $LastModified_unix);
    $IfModifiedSince = false;

    if (isset($_ENV['HTTP_IF_MODIFIED_SINCE']))
        $IfModifiedSince = strtotime(substr($_ENV['HTTP_IF_MODIFIED_SINCE'], 5));

    if (isset($_SERVER['HTTP_IF_MODIFIED_SINCE']))
        $IfModifiedSince = strtotime(substr($_SERVER['HTTP_IF_MODIFIED_SINCE'], 5));

    if ($IfModifiedSince && $IfModifiedSince >= $LastModified_unix)
    {
        header($_SERVER['SERVER_PROTOCOL'] . ' 304 Not Modified');
        exit;
    }

    header('Last-Modified: '. $LastModified);

    $title = 'Сонный Залив - кафе "Релакс". Информация о кафе "Релакс" в Сортавала в Карелии. Цены, описание, фотографии, меню, отзывы';
    $descr = 'Захотелось провести вечер в приятном месте, отдохнуть с семьей или друзьями, но не знаете куда позвонить? Кафе "Релакс" то, что Вам нужно. Мы поможем Вам более подробно ознакомиться и узнать: номера телефонов для бронирования, цены ,мню и фотографии заведения в Сортавала';
    $keywords = 'кафе Сортавала, ресторан Сортавала, кафе Релакс, еда в Карелии, поужинать в Соратавала';

    $iconBlock = getSubscribeIconBlock();
    $subsMenu = getSubscribeMenu();
    $footer = getFooter();
?>

<!DOCTYPE html>
<html lang="ru" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#">
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

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" as="style" rel="preload" onload="this.rel='stylesheet'">

    <link href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" as="style" rel="preload" onload="this.rel='stylesheet'">

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
    <link href="css/style.min.css?v=<?php echo VERSION['styles']?>" as="style" rel="preload" onload="this.rel='stylesheet'">

    <meta name="yandex-verification" content="077ed0cb5ca007c0" />

    <!-- start TL head script -->
    <script type='text/javascript'>
        (function(w) {
            var q = [
                ['setContext', 'TL-INT-sonniyzaliv_2023-01-11', 'ru'],
                ['embed', 'search-form', {
                    container: 'tl-search-form'
                }]
            ];
            var h=["ru-ibe.tlintegration.ru","ibe.tlintegration.ru","ibe.tlintegration.com"];
            var t = w.travelline = (w.travelline || {}),
                ti = t.integration = (t.integration || {});
            ti.__cq = ti.__cq? ti.__cq.concat(q) : q;
            if (!ti.__loader) {
                ti.__loader = true;
                var d=w.document,c=d.getElementsByTagName("head")[0]||d.getElementsByTagName("body")[0];
                function e(s,f) {return function() {w.TL||(c.removeChild(s),f())}}
                (function l(h) {
                    if (0===h.length) return; var s=d.createElement("script");
                    s.type="text/javascript";s.async=!0;s.src="https://"+h[0]+"/integration/loader.js";
                    s.onerror=s.onload=e(s,function(){l(h.slice(1,h.length))});c.appendChild(s)
                })(h);
            }
        })(window);
        document.addEventListener('DOMContentLoaded', function(){
            var container = document.querySelector(".hero-wrap .col-md-9");
            var searchForm = document.querySelector("#block-search");
            container.appendChild(searchForm);
        });
    </script>
    <link rel="stylesheet" href="css/travelline-style.css">
    <!-- end TL head script -->
</head>
<body>
<header class="header">
    <div itemscope itemtype="https://schema.org/Organization" style="display:none;">
        <meta itemprop="name" content="<?php echo $title; ?>" />
        <link itemprop="url" href="https://sonniyzaliv.ru/" />
        <link itemprop="logo" href="https://sonniyzaliv.ru/images/logo.png" />
        <meta itemprop="description" content="<?php echo $descr; ?>" />
        <meta itemprop="email" content="sonniyzaliv@yandex.ru" />
        <div itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
            <meta itemprop="addressLocality" content="Нукутталахти" />
            <meta itemprop="postalCode" content="186790" />
            <meta itemprop="streetAddress" content="Центральная, 52" />
        </div>
        <meta itemprop="telephone" content="+7 981 187-80-02" />
        <meta itemprop="telephone" content="+7 981 750-44-89" />
        <link itemprop="sameAs" href="https://instagram.com/sonniy_zaliv_sortavala?utm_medium=copy_link" />
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
                    <li class="menu-item"><a href="#kafePhoto">Основные фото</a></li>
                    <li class="menu-item"><a href="#aboutKafe">О Кафе</a></li>
                    <li class="menu-item"><a href="#kafeMenuPhoto">Меню</a></li>
                    <li class="menu-item"><a href="#kafeReviews">Отзывы</a></li>
                    <li class="menu-item"><a href="#services">Полезные ресурсы</a></li>
                </ul>
            </nav>
        </div>
    </section>
</header>
<!-- END nav -->
<main role="main">
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/kafe-relax/11.jpg');" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate pb-5 text-center">
              <h1 id="act-form" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Кафе "Релакс"</h1>
              <h2 class="subtext" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Приятный отдых с семьей и друзьями</h2>
              <p class="breadcrumbs pt-5" style="font-weight: bold"><span class="mr-2"><a href="/">Главная <i class="ion-ios-arrow-forward"></i></a></span><span>Кафе "Релакс"</span></p>
              <?php echo $iconBlock ?>
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
                  <noindex><a href='https://www.travelline.ru/products/tl-hotel/' rel='nofollow' target='_blank'>TravelLine</a></noindex>
              </div>
          </div>
          <!-- end TL Search form script -->
      </div>
    </section>
    <section id="kafePhoto" class="ftco-section services-section bg-light">
        <div class="container">
            <div class="row justify-content-center pb-4">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <h2 class="mb-4">Основные фото</h2>
                </div>
            </div>
            <!-- Slider main container -->
            <div class="swiper-photo">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    <div class="swiper-slide">
                        <div class="ftco-animate">
                            <div class="project-destination">
                                <a class="img" loading="lazy" style="background-image: url(images/kafe-relax/albom/44.jpg);" href="images/kafe-relax/albom/44.jpg" data-fancybox="gallery-house">
                                    <div class="text">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ftco-animate">
                            <div class="project-destination">
                                <a class="img" loading="lazy" style="background-image: url(images/kafe-relax/albom/45.jpg);" href="images/kafe-relax/albom/45.jpg" data-fancybox="gallery-house">
                                    <div class="text">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ftco-animate">
                            <div class="project-destination">
                                <a class="img" loading="lazy" style="background-image: url(images/kafe-relax/albom/46.jpg);" href="images/kafe-relax/albom/46.jpg" data-fancybox="gallery-house">
                                    <div class="text">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ftco-animate">
                            <div class="project-destination">
                                <a class="img" loading="lazy" style="background-image: url(images/kafe-relax/albom/47.jpg);" href="images/kafe-relax/albom/47.jpg" data-fancybox="gallery-house">
                                    <div class="text">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ftco-animate">
                            <div class="project-destination">
                                <a class="img" loading="lazy" style="background-image: url(images/kafe-relax/albom/48.jpg);" href="images/kafe-relax/albom/48.jpg" data-fancybox="gallery-house">
                                    <div class="text">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ftco-animate">
                            <div class="project-destination">
                                <a class="img" loading="lazy" style="background-image: url(images/kafe-relax/albom/49.jpg);" href="images/kafe-relax/albom/49.jpg" data-fancybox="gallery-house">
                                    <div class="text">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ftco-animate">
                            <div class="project-destination">
                                <a class="img" loading="lazy" style="background-image: url(images/kafe-relax/albom/50.jpg);" href="images/kafe-relax/albom/50.jpg" data-fancybox="gallery-house">
                                    <div class="text">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ftco-animate">
                            <div class="project-destination">
                                <a class="img" loading="lazy" style="background-image: url(images/kafe-relax/albom/1.jpg);" href="images/kafe-relax/albom/1.jpg" data-fancybox="gallery-house">
                                    <div class="text">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ftco-animate">
                            <div class="project-destination">
                                <a class="img" loading="lazy" style="background-image: url(images/kafe-relax/albom/3.jpg);" href="images/kafe-relax/albom/3.jpg" data-fancybox="gallery-house">
                                    <div class="text">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ftco-animate">
                            <div class="project-destination">
                                <a class="img" loading="lazy" style="background-image: url(images/kafe-relax/albom/4.jpg);" href="images/kafe-relax/albom/4.jpg" data-fancybox="gallery-house">
                                    <div class="text">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ftco-animate">
                            <div class="project-destination">
                                <a class="img" loading="lazy" style="background-image: url(images/kafe-relax/albom/5.jpg);" href="images/kafe-relax/albom/5.jpg" data-fancybox="gallery-house">
                                    <div class="text">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ftco-animate">
                            <div class="project-destination">
                                <a class="img" loading="lazy" style="background-image: url(images/kafe-relax/albom/6.jpg);" href="images/kafe-relax/albom/6.jpg" data-fancybox="gallery-house">
                                    <div class="text">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ftco-animate">
                            <div class="project-destination">
                                <a class="img" loading="lazy" style="background-image: url(images/kafe-relax/albom/7.jpg);" href="images/kafe-relax/albom/7.jpg" data-fancybox="gallery-house">
                                    <div class="text">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ftco-animate">
                            <div class="project-destination">
                                <a class="img" loading="lazy" style="background-image: url(images/kafe-relax/albom/8.jpg);" href="images/kafe-relax/albom/8.jpg" data-fancybox="gallery-house">
                                    <div class="text">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ftco-animate">
                            <div class="project-destination">
                                <a class="img" loading="lazy" style="background-image: url(images/kafe-relax/albom/9.jpg);" href="images/kafe-relax/albom/9.jpg" data-fancybox="gallery-house">
                                    <div class="text">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ftco-animate">
                            <div class="project-destination">
                                <a class="img" loading="lazy" style="background-image: url(images/kafe-relax/albom/10.jpg);" href="images/kafe-relax/albom/10.jpg" data-fancybox="gallery-house">
                                    <div class="text">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ftco-animate">
                            <div class="project-destination">
                                <a class="img" loading="lazy" style="background-image: url(images/kafe-relax/albom/11.jpg);" href="images/kafe-relax/albom/11.jpg" data-fancybox="gallery-house">
                                    <div class="text">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ftco-animate">
                            <div class="project-destination">
                                <a class="img" loading="lazy" style="background-image: url(images/kafe-relax/albom/12.jpg);" href="images/kafe-relax/albom/12.jpg" data-fancybox="gallery-house">
                                    <div class="text">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ftco-animate">
                            <div class="project-destination">
                                <a class="img" loading="lazy" style="background-image: url(images/kafe-relax/albom/13.jpg);" href="images/kafe-relax/albom/13.jpg" data-fancybox="gallery-house">
                                    <div class="text">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ftco-animate">
                            <div class="project-destination">
                                <a class="img" loading="lazy" style="background-image: url(images/kafe-relax/albom/14.jpg);" href="images/kafe-relax/albom/14.jpg" data-fancybox="gallery-house">
                                    <div class="text">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ftco-animate">
                            <div class="project-destination">
                                <a class="img" loading="lazy" style="background-image: url(images/kafe-relax/albom/15.jpg);" href="images/kafe-relax/albom/15.jpg" data-fancybox="gallery-house">
                                    <div class="text">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ftco-animate">
                            <div class="project-destination">
                                <a class="img" loading="lazy" style="background-image: url(images/kafe-relax/albom/16.jpg);" href="images/kafe-relax/albom/16.jpg" data-fancybox="gallery-house">
                                    <div class="text">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ftco-animate">
                            <div class="project-destination">
                                <a class="img" loading="lazy" style="background-image: url(images/kafe-relax/albom/17.jpg);" href="images/kafe-relax/albom/17.jpg" data-fancybox="gallery-house">
                                    <div class="text">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ftco-animate">
                            <div class="project-destination">
                                <a class="img" loading="lazy" style="background-image: url(images/kafe-relax/albom/18.jpg);" href="images/kafe-relax/albom/18.jpg" data-fancybox="gallery-house">
                                    <div class="text">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ftco-animate">
                            <div class="project-destination">
                                <a class="img" loading="lazy" style="background-image: url(images/kafe-relax/albom/19.jpg);" href="images/kafe-relax/albom/19.jpg" data-fancybox="gallery-house">
                                    <div class="text">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ftco-animate">
                            <div class="project-destination">
                                <a class="img" loading="lazy" style="background-image: url(images/kafe-relax/albom/20.jpg);" href="images/kafe-relax/albom/20.jpg" data-fancybox="gallery-house">
                                    <div class="text">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ftco-animate">
                            <div class="project-destination">
                                <a class="img" loading="lazy" style="background-image: url(images/kafe-relax/albom/21.jpg);" href="images/kafe-relax/albom/21.jpg" data-fancybox="gallery-house">
                                    <div class="text">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ftco-animate">
                            <div class="project-destination">
                                <a class="img" loading="lazy" style="background-image: url(images/kafe-relax/albom/22.jpg);" href="images/kafe-relax/albom/22.jpg" data-fancybox="gallery-house">
                                    <div class="text">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ftco-animate">
                            <div class="project-destination">
                                <a class="img" loading="lazy" style="background-image: url(images/kafe-relax/albom/23.jpg);" href="images/kafe-relax/albom/23.jpg" data-fancybox="gallery-house">
                                    <div class="text">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ftco-animate">
                            <div class="project-destination">
                                <a class="img" loading="lazy" style="background-image: url(images/kafe-relax/albom/24.jpg);" href="images/kafe-relax/albom/24.jpg" data-fancybox="gallery-house">
                                    <div class="text">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ftco-animate">
                            <div class="project-destination">
                                <a class="img" loading="lazy" style="background-image: url(images/kafe-relax/albom/25.jpg);" href="images/kafe-relax/albom/25.jpg" data-fancybox="gallery-house">
                                    <div class="text">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ftco-animate">
                            <div class="project-destination">
                                <a class="img" loading="lazy" style="background-image: url(images/kafe-relax/albom/26.jpg);" href="images/kafe-relax/albom/26.jpg" data-fancybox="gallery-house">
                                    <div class="text">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ftco-animate">
                            <div class="project-destination">
                                <a class="img" loading="lazy" style="background-image: url(images/kafe-relax/albom/27.jpg);" href="images/kafe-relax/albom/27.jpg" data-fancybox="gallery-house">
                                    <div class="text">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ftco-animate">
                            <div class="project-destination">
                                <a class="img" loading="lazy" style="background-image: url(images/kafe-relax/albom/28.jpg);" href="images/kafe-relax/albom/28.jpg" data-fancybox="gallery-house">
                                    <div class="text">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ftco-animate">
                            <div class="project-destination">
                                <a class="img" loading="lazy" style="background-image: url(images/kafe-relax/albom/29.jpg);" href="images/kafe-relax/albom/29.jpg" data-fancybox="gallery-house">
                                    <div class="text">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ftco-animate">
                            <div class="project-destination">
                                <a class="img" loading="lazy" style="background-image: url(images/kafe-relax/albom/30.jpg);" href="images/kafe-relax/albom/30.jpg" data-fancybox="gallery-house">
                                    <div class="text">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ftco-animate">
                            <div class="project-destination">
                                <a class="img" loading="lazy" style="background-image: url(images/kafe-relax/albom/31.jpg);" href="images/kafe-relax/albom/31.jpg" data-fancybox="gallery-house">
                                    <div class="text">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ftco-animate">
                            <div class="project-destination">
                                <a class="img" loading="lazy" style="background-image: url(images/kafe-relax/albom/32.jpg);" href="images/kafe-relax/albom/32.jpg" data-fancybox="gallery-house">
                                    <div class="text">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ftco-animate">
                            <div class="project-destination">
                                <a class="img" loading="lazy" style="background-image: url(images/kafe-relax/albom/33.jpg);" href="images/kafe-relax/albom/33.jpg" data-fancybox="gallery-house">
                                    <div class="text">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ftco-animate">
                            <div class="project-destination">
                                <a class="img" loading="lazy" style="background-image: url(images/kafe-relax/albom/34.jpg);" href="images/kafe-relax/albom/34.jpg" data-fancybox="gallery-house">
                                    <div class="text">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ftco-animate">
                            <div class="project-destination">
                                <a class="img" loading="lazy" style="background-image: url(images/kafe-relax/albom/35.jpg);" href="images/kafe-relax/albom/35.jpg" data-fancybox="gallery-house">
                                    <div class="text">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ftco-animate">
                            <div class="project-destination">
                                <a class="img" loading="lazy" style="background-image: url(images/kafe-relax/albom/36.jpg);" href="images/kafe-relax/albom/36.jpg" data-fancybox="gallery-house">
                                    <div class="text">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ftco-animate">
                            <div class="project-destination">
                                <a class="img" loading="lazy" style="background-image: url(images/kafe-relax/albom/37.jpg);" href="images/kafe-relax/albom/37.jpg" data-fancybox="gallery-house">
                                    <div class="text">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ftco-animate">
                            <div class="project-destination">
                                <a class="img" loading="lazy" style="background-image: url(images/kafe-relax/albom/38.jpg);" href="images/kafe-relax/albom/38.jpg" data-fancybox="gallery-house">
                                    <div class="text">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ftco-animate">
                            <div class="project-destination">
                                <a class="img" loading="lazy" style="background-image: url(images/kafe-relax/albom/39.jpg);" href="images/kafe-relax/albom/39.jpg" data-fancybox="gallery-house">
                                    <div class="text">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ftco-animate">
                            <div class="project-destination">
                                <a class="img" loading="lazy" style="background-image: url(images/kafe-relax/albom/40.jpg);" href="images/kafe-relax/albom/40.jpg" data-fancybox="gallery-house">
                                    <div class="text">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ftco-animate">
                            <div class="project-destination">
                                <a class="img" loading="lazy" style="background-image: url(images/kafe-relax/albom/41.jpg);" href="images/kafe-relax/albom/41.jpg" data-fancybox="gallery-house">
                                    <div class="text">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ftco-animate">
                            <div class="project-destination">
                                <a class="img" loading="lazy" style="background-image: url(images/kafe-relax/albom/42.jpg);" href="images/kafe-relax/albom/42.jpg" data-fancybox="gallery-house">
                                    <div class="text">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ftco-animate">
                            <div class="project-destination">
                                <a class="img" loading="lazy" style="background-image: url(images/kafe-relax/albom/43.jpg);" href="images/kafe-relax/albom/43.jpg" data-fancybox="gallery-house">
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
        </div>
    </section>
    <section id="aboutKafe" style="padding-top: 0; padding-bottom: 0" class="ftco-section services-section bg-light">
        <div class="container">
            <div class="row d-flex">
                <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
                    <h2 class="mb-4">О кафе "Релакс"</h2>
                    <p>Информация о кафе "Релакс" в Сортавала. Меню, цены, фотографии:</p>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                            <div class="media block-6 services d-block">
                                <div class="icon"><span class="icon-clock-o"></span></div>
                                <div class="media-body">
                                    <h3 class="heading mb-3" style="padding-top: 10px; color: #813333;">Часы работы</h3>
                                    <p style="color: #443e70;;font-weight: 700; text-align: left"><i style="color: #ff5154;" class="icon-calendar-check-o"></i> Воскресенье - четверг<br>
                                        <i style="color: #ff5154;" class="icon-clock-o"></i> 10:00 - 21:00<br>
                                        <i style="color: #ff5154;" class="icon-calendar-check-o"></i> Пятница - суббота<br>
                                        <i style="color: #ff5154;" class="icon-clock-o"></i> 10:00 - 23:00<br>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                            <div class="media block-6 services d-block">
                                <div class="icon"><span class="icon-phone_iphone"></span></div>
                                <div class="media-body">
                                    <h3 class="heading mb-3" style="padding-top: 10px; color: #813333;">Бронирование</h3>
                                    <p style="color: #443e70;font-weight: 700; text-align: left"><i style="color: #ff5154;" class="icon-phone_android"></i> +7 (921) 450-11-11</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                            <div class="media block-6 services d-block">
                                <div class="icon"><span class="icon-wallet"></span></div>
                                <div class="media-body">
                                    <h3 class="heading mb-3" style="padding-top: 10px; color: #813333;">Средний счет</h3>
                                    <p style="color: #443e70;font-weight: 700; text-align: left"><i style="color: #ff5154;" class="icon-ruble"></i> 1200–2000 ₽</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                            <div class="media block-6 services d-block">
                                <div class="icon"><span class="icon-map-marker"></span></div>
                                <div class="media-body">
                                    <h3 class="heading mb-3" style="padding-top: 10px; color: #813333;">Местоположение</h3>
                                    <p style="color: #443e70;font-weight: 700; text-align: left"><i style="color: #ff5154;" class="icon-location-arrow"></i> Карельская ул., 29, Сортавала</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="kafeMenuPhoto" style="padding-top: 0" class="ftco-section services-section bg-light">
        <div class="container">
            <div class="row justify-content-center pb-4">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <h2 class="mb-4">Меню</h2>
                </div>
            </div>
            <!-- Slider main container -->
            <div class="swiper-menu-photo">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    <div class="swiper-slide">
                        <div class="ftco-animate">
                            <div class="project-destination">
                                <a class="img" loading="lazy" style="background-image: url(images/kafe-relax/albom/menu/1.jpg);" href="images/kafe-relax/albom/menu/1.jpg" data-fancybox="gallery-kafe">
                                    <div class="text">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ftco-animate">
                            <div class="project-destination">
                                <a class="img" loading="lazy" style="background-image: url(images/kafe-relax/albom/menu/2.jpg);" href="images/kafe-relax/albom/menu/2.jpg" data-fancybox="gallery-kafe">
                                    <div class="text">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ftco-animate">
                            <div class="project-destination">
                                <a class="img" loading="lazy" style="background-image: url(images/kafe-relax/albom/menu/3.jpg);" href="images/kafe-relax/albom/menu/3.jpg" data-fancybox="gallery-kafe">
                                    <div class="text">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ftco-animate">
                            <div class="project-destination">
                                <a class="img" loading="lazy" style="background-image: url(images/kafe-relax/albom/menu/4.jpg);" href="images/kafe-relax/albom/menu/4.jpg" data-fancybox="gallery-kafe">
                                    <div class="text">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ftco-animate">
                            <div class="project-destination">
                                <a class="img" loading="lazy" style="background-image: url(images/kafe-relax/albom/menu/5.jpg);" href="images/kafe-relax/albom/menu/5.jpg" data-fancybox="gallery-kafe">
                                    <div class="text">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ftco-animate">
                            <div class="project-destination">
                                <a class="img" loading="lazy" style="background-image: url(images/kafe-relax/albom/menu/6.jpg);" href="images/kafe-relax/albom/menu/6.jpg" data-fancybox="gallery-kafe">
                                    <div class="text">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ftco-animate">
                            <div class="project-destination">
                                <a class="img" loading="lazy" style="background-image: url(images/kafe-relax/albom/menu/7.jpg);" href="images/kafe-relax/albom/menu/7.jpg" data-fancybox="gallery-kafe">
                                    <div class="text">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ftco-animate">
                            <div class="project-destination">
                                <a class="img" loading="lazy" style="background-image: url(images/kafe-relax/albom/menu/8.jpg);" href="images/kafe-relax/albom/menu/8.jpg" data-fancybox="gallery-kafe">
                                    <div class="text">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ftco-animate">
                            <div class="project-destination">
                                <a class="img" loading="lazy" style="background-image: url(images/kafe-relax/albom/menu/9.jpg);" href="images/kafe-relax/albom/menu/9.jpg" data-fancybox="gallery-kafe">
                                    <div class="text">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ftco-animate">
                            <div class="project-destination">
                                <a class="img" loading="lazy" style="background-image: url(images/kafe-relax/albom/menu/10.jpg);" href="images/kafe-relax/albom/menu/10.jpg" data-fancybox="gallery-kafe">
                                    <div class="text">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ftco-animate">
                            <div class="project-destination">
                                <a class="img" loading="lazy" style="background-image: url(images/kafe-relax/albom/menu/11.jpg);" href="images/kafe-relax/albom/menu/11.jpg" data-fancybox="gallery-kafe">
                                    <div class="text">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ftco-animate">
                            <div class="project-destination">
                                <a class="img" loading="lazy" style="background-image: url(images/kafe-relax/albom/menu/12.jpg);" href="images/kafe-relax/albom/menu/12.jpg" data-fancybox="gallery-kafe">
                                    <div class="text">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ftco-animate">
                            <div class="project-destination">
                                <a class="img" loading="lazy" style="background-image: url(images/kafe-relax/albom/menu/13.jpg);" href="images/kafe-relax/albom/menu/13.jpg" data-fancybox="gallery-kafe">
                                    <div class="text">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ftco-animate">
                            <div class="project-destination">
                                <a class="img" loading="lazy" style="background-image: url(images/kafe-relax/albom/menu/14.jpg);" href="images/kafe-relax/albom/menu/14.jpg" data-fancybox="gallery-kafe">
                                    <div class="text">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ftco-animate">
                            <div class="project-destination">
                                <a class="img" loading="lazy" style="background-image: url(images/kafe-relax/albom/menu/15.jpg);" href="images/kafe-relax/albom/menu/15.jpg" data-fancybox="gallery-kafe">
                                    <div class="text">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ftco-animate">
                            <div class="project-destination">
                                <a class="img" loading="lazy" style="background-image: url(images/kafe-relax/albom/menu/16.jpg);" href="images/kafe-relax/albom/menu/16.jpg" data-fancybox="gallery-kafe">
                                    <div class="text">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ftco-animate">
                            <div class="project-destination">
                                <a class="img" loading="lazy" style="background-image: url(images/kafe-relax/albom/menu/17.jpg);" href="images/kafe-relax/albom/menu/17.jpg" data-fancybox="gallery-kafe">
                                    <div class="text">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ftco-animate">
                            <div class="project-destination">
                                <a class="img" loading="lazy" style="background-image: url(images/kafe-relax/albom/menu/18.jpg);" href="images/kafe-relax/albom/menu/18.jpg" data-fancybox="gallery-kafe">
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
        </div>
    </section>
    <section id="kafeReviews" style="background: url(images/kafe-relax/albom/45.jpg);" class="ftco-section services-section module bg-dark-60 pt-0 pb-0 parallax-bg testimonial ftco-animate">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 heading-section text-center">
                    <h2 class="pt-5" style="color: #ffdba3">Отзывы о кафе</h2>
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
                                <blockquote class="testimonial-text font-alt">Не плохое кафе, приезжали группой, у нас был тур, большой выбор меню, цены я бы сказала низкие, большой выбор блюд с морепродуктами,
                                    то что я и люблю. Вся группа осталась довольна. Еда вкусная, заведение небольшое, но уютное</blockquote>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 offset-sm-4">
                                <div class="testimonial-author">
                                    <div class="testimonial-caption font-alt">
                                        <div class="testimonial-title">Анастасия Казаринова</div>
                                        <div class="testimonial-descr">30 января 2022</div>
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
                                <blockquote class="testimonial-text font-alt">Очень все вкусно!!! Трудно попасть, часто все занято.</blockquote>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 offset-sm-4">
                                <div class="testimonial-author">
                                    <div class="testimonial-caption font-alt">
                                        <div class="testimonial-title">Наталья Макарова</div>
                                        <div class="testimonial-descr">30 января 2022</div>
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
                                <blockquote class="testimonial-text font-alt">Прекрасное кафе</blockquote>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 offset-sm-4">
                                <div class="testimonial-author">
                                    <div class="testimonial-caption font-alt">
                                        <div class="testimonial-title">Алексей Фролова</div>
                                        <div class="testimonial-descr">29 января 2022</div>
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
                                <blockquote class="testimonial-text font-alt">Всегда здесь обедаем по пути в Рускеалу. Нормальное место.</blockquote>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 offset-sm-4">
                                <div class="testimonial-author">
                                    <div class="testimonial-caption font-alt">
                                        <div class="testimonial-title">Кирилл Винокуров</div>
                                        <div class="testimonial-descr">28 января 2022</div>
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
                                <blockquote class="testimonial-text font-alt">Хорошее вкусное уютное место с нормальными ценами</blockquote>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 offset-sm-4">
                                <div class="testimonial-author">
                                    <div class="testimonial-caption font-alt">
                                        <div class="testimonial-title">Мария</div>
                                        <div class="testimonial-descr">27 января 2022</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <section class="ftco-section module" id="services">
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
                                                <h3 class="heading mb-3" style="padding-top: 10px">Кафе "Релакс"</h3>
                                                <p>Кафе <b>«Релакс»</b> расположено в центре города и состоит из основного зала и кафе-мороженого.<br><br>
                                                    Здесь Вы можете приятно провести время с семьей или друзьями, организовать праздник для детей или устроить небольшое торжество.<br><br>
                                                    На Ваш вкус предлагаются разнообразные блюда классической европейской кухни, большой выбор вин и других алкогольных напитков, ароматный кофе, разнообразный ассортимент чая.<br><br>
                                                    А так же, можно отведать свежую горячую выпечку и тающие во рту пирожные, разнообразные сладкие десерты, мороженое и коктейли.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row d-flex">
                                        <div class="conf-btn" style="padding-bottom: 50px;"><a href="/relaks" target="_blank" class="btn btn-primary py-3 px-4 ftco-animate"><i class="ion-ios-information-circle"></i> Подробнее</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </div>
            </ul>
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
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

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

<script defer type="text/javascript" src="js/t-datepicker.js?v=<?php echo VERSION['scripts']['datepicker']?>"></script>

<script defer src="js/swiper.js" type="text/javascript"></script>
<script defer src="js/swiper.min.js" type="text/javascript"></script>
<script defer src="js/swiper-custom.js?v=<?php echo VERSION['scripts']['swiper']?>" type="text/javascript"></script>

<script defer src="js/owl.carousel.min.js"></script>
<script defer src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

<script defer src="https://cdn.jsdelivr.net/npm/jquery.maskedinput@1.4.1/src/jquery.maskedinput.min.js" type="text/javascript"></script>

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
<script defer src="js/main.min.js?v=<?php echo VERSION['scripts']['main']?>"></script>

<script defer src="js/wow.min.js"></script>

<script>
    var dates = [];
    var oneDayRange = [];
</script>

<!-- other scripts -->
<script defer src="js/script.min.js?v=<?php echo VERSION['scripts']['script']?>"></script>

<script defer src="js/cbpFWTabs.js"></script>

<script type="application/ld+json">{
    "@context": "https://schema.org",
    "@type": "WebPage",
    "url": "https://sonniyzaliv.ru/test (1).php",
    "name": "Сонный Залив - кафе ",
    "description": "Захотелось провести вечер в приятном месте, отдохнуть с семьей или друзьями, но не знаете куда позвонить? Кафе ",
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

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-3HP381QVQQ"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-3HP381QVQQ');
</script>

<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
    (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
        m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
    (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

    ym(79760224, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
    });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/79760224" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
</body>
</html>