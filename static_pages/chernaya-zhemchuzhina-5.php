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

	$title = 'Черная жемчужина 45м2 - дом на базе отдыха на берегу озера в республике Карелия. Аренда коттеджа Черная жемчужина 45м2 посуточно в республике Карелия г. Сортавала';
	$descr = 'Предложение отдыха на природе в  доме Черная жемчужина 45м2 Сортавала с видом на озеро и всеми удобствами в Карелии г. Сортавала. Арендовать коттедж Черная жемчужина 45м2 на сутки в республике Карелия на Сонный Залив. Уютный большой дом Черная жемчужина 45м2 на берегу озера. Арендуйте дом Черная жемчужина 45м2 возле озера на сутки в республике Карелия по цене от 6500 тыс. руб.';
	$keywords = 'база отдыха Сортавала, Черная Жемчужина Сортавала, снять коттедж на сутки в республике Карелия, аренда коттеджа посуточно в республике Карелия, аренда дома с видом на озеро, отдых в Карелии, снять дом с видом на озеро, аренда дома сортавала, аренда дачи Сортавала';

    $house_id = 16;

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

      <link rel="canonical" href="https://sonniyzaliv.ru/chernaya-zhemchuzhina-5"/>
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
              function gtag() { dataLayer.push(arguments); }
              window.gtag = gtag;
              gtag("js", new Date());
              gtag("config", "G-DPVYVNRY2W");
          };
      }

      // Ждем действий пользователя
      ["mousemove", "touchstart", "scroll"].forEach(event => {
          document.addEventListener(event, loadGtag, { once: true });
      });

      // Резервная загрузка через 10 сек (если пользователь не шевелился)
      setTimeout(loadGtag, 10000);
  </script>
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
            <link itemprop="sameAs" href="https://t.me/+KmgBetu6NYtlNjcy" />
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
                        <li class="menu-item"><a href="<?/*#houseBooking*/?>#" data-tl-booking-open="true">Забронировать</a></li>
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
                    <li style="background-image: url(images/houses/chernaya-zhemchuzhina-4/zima/1.webp);" data-stellar-background-ratio="0.5"></li>
                    <li style="background-image: url(images/houses/chernaya-zhemchuzhina-4/5.webp);" data-stellar-background-ratio="0.5"></li>
                    <li style="background-image: url(images/houses/chernaya-zhemchuzhina-4/1.webp);" data-stellar-background-ratio="0.5"></li>
                    <li style="background-image: url(images/houses/chernaya-zhemchuzhina-4/16.webp);" data-stellar-background-ratio="0.5"></li>
                    <li style="background-image: url(images/houses/chernaya-zhemchuzhina-4/12.webp);" data-stellar-background-ratio="0.5"></li>
                </ul>
              <div class="overlay"></div>
                <div class="head-text">
                  <div class="container">
                    <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
                      <div class="col-md-9 text text-center ftco-animate" style="margin-top: 100px;" data-scrollax=" properties: { translateY: '70%' }">
                         <h1 id="act-form" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Черная жемчужина 45м2</h1>
                         <h2 class="subtext" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Аренда гостевого дома "Черная жемчужина 45м2" в Карелии. Актуальные цены, подробное описание, фотографии, контакты</h2>
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
                              <noindex><a href='https://www.travelline.ru/products/tl-hotel/' rel='nofollow' target='_blank'>TravelLine</a></noindex>
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
                        <div class="img d-flex align-self-stretch" style="background-image:url(images/houses/chernaya-zhemchuzhina/owner.webp); height: 600px;"></div>
                    </div>
                    <div class="col-md-6 pl-md-5 py-5">
                        <div class="row justify-content-start pb-3">
                            <div class="col-md-12 heading-section ftco-animate">
                                <h2 class="mb-4 text-center">Виктория - владелец "Черная жемчужина"</h2>
                                <div class="col-md-12 justify-content-center counter-wrap ftco-animate" style="padding-top: 22px">
                                    <div class="block-18 text-center mb-4">
                                        <div class="text">
                                            <strong style="font-size: 22px; color: #323232;">"Будем рады встретить гостей в новом туристическом уголке "Черная жемчужина 45м2". Лес, Ладога, лодки, снегоходы. Уютные, теплые дома ждут вас</strong>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-center"><b>Добро пожаловать!</b></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row pt-50">
                    <div class="conf-btn ftco-no-pt"><a href="#" <?/*id="reserve1" */?> data-tl-booking-open="true" class="btn btn-primary py-3 px-4 ftco-animate"><i class="ion-ios-calendar"></i> Забронировать</a></div>
                </div>
            </div>
        </section>
        <section id="aboutHome" class="ftco-section services-section bg-light" style="padding-bottom: 0">
            <div class="container">
                <div class="row d-flex">
                    <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
                        <h2 class="mb-4">О нашем доме</h2>
                        <p>Дом оборудован всей необходимой техникой и инженерным оборудованием для вашего комфортного отдыха:</p>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                                <div class="media block-6 services d-block">
                                    <div class="icon"><span class="flaticon-double"></span></div>
                                    <div class="media-body">
                                        <h3 class="heading mb-3">2 спальных места</h3>
                                        <p>В доме расположены 2 удобные односпальные полуторные кровати</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                                <div class="media block-6 services d-block">
                                    <div class="icon"><span class="flaticon-sofa"></span></div>
                                    <div class="media-body">
                                        <h3 class="heading mb-3">2 дополнительных места</h3>
                                        <p>2 места доступны в виде дивана в гостиной</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                                <div class="media block-6 services d-block">
                                    <div class="icon"><span class="flaticon-hot"></span></div>
                                    <div class="media-body">
                                        <h3 class="heading mb-3">Теплые полы</h3>
                                        <p>Теплые полы во всем доме</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                                <div class="media block-6 services d-block">
                                    <div class="icon"><span class="flaticon-panoramic-view"></span></div>
                                    <div class="media-body">
                                        <h3 class="heading mb-3">Панорамные окна</h3>
                                        <p>Панорамные окна для наслаждения прекрасными видами</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                                <div class="media block-6 services d-block">
                                    <div class="icon"><span class="flaticon-watching-tv"></span></div>
                                    <div class="media-body">
                                        <h3 class="heading mb-3">Телевизор</h3>
                                        <p>Просмотр телевизора со спутниковым телевидением и выходом в интернет на мягком диване</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                                <div class="media block-6 services d-block">
                                    <div class="icon"><span class="flaticon-wifi"></span></div>
                                    <div class="media-body">
                                        <h3 class="heading mb-3">Wi-Fi</h3>
                                        <p>Безлимитный Wi-Fi на всей территории на скорости 20 Мб/сек</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                                <div class="media block-6 services d-block">
                                    <div class="icon"><span class="flaticon-tea-cup"></span></div>
                                    <div class="media-body">
                                        <h3 class="heading mb-3">Чай</h3>
                                        <p>5 видов свежих черного и зеленого чая всегда найдется на полочке в кухне</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                                <div class="media block-6 services d-block">
                                    <div class="icon"><span class="flaticon-washer"></span></div>
                                    <div class="media-body">
                                        <h3 class="heading mb-3">Стиральная машина</h3>
                                        <p>Для сохранения чистоты ваших вещей</p>
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
                                    <div class="icon"><span class="flaticon-microwave"></span></div>
                                    <div class="media-body">
                                        <h3 class="heading mb-3">СВЧ-печь</h3>
                                        <p>Быстро подогреть готовую еду или напитки</p>
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
                                    <div class="icon"><img src="icons/kitchen_accessories.svg"></div>
                                    <div class="media-body">
                                        <h3 class="heading mb-3">Кухонные принадлежности</h3>
                                        <p>Все что необходимо для сервировки стола</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                                <div class="media block-6 services d-block">
                                    <div class="icon"><span class="flaticon-parked-car"></span></div>
                                    <div class="media-body">
                                        <h3 class="heading mb-3">Парковка</h3>
                                        <p>Просторная парковка для удобного размещения вашего транспорта</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="conf-btn"><a href="#" <?/*id="reserve1" */?> data-tl-booking-open="true" class="btn btn-primary py-3 px-4 ftco-animate"><i class="ion-ios-calendar"></i> Забронировать</a></div>
                </div>
            </div>
        </section>
        <!--<section id="availableBookingOptions" class="ftco-section services-section bg-light" style="padding-bottom: 0">
            <div class="container">
                <div class="row justify-content-center pb-4">
                    <div class="col-md-12 heading-section text-center ftco-animate">
                        <h2 class="mb-4">Стоимость бронирования</h2>
                        <p>Ниже, представлены актуальные цены на бронирование гостевого дома "Черная жемчужина 45м2"</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 ftco-animate">
                        <div class="project-wrap">
                            <a class="img scroll-elem" style="background-image: url(images/karelia-5.webp);"></a>
                            <div class="text p-4">
                                <span class="price">от 6000 руб/сут</span>
                                <span class="days">от 1 суток</span>
                                <h3><a class="scroll-elem">Будние и выходные</a></h3>
                                <p class="location"><span class="flaticon-settings"></span> ночи: пн-пн </p>
                                <p class="location"><span class="flaticon-settings"></span> 6000 руб/сут. - до 3 гостей</p>
                                <p class="location"><span class="flaticon-settings"></span> 7000 руб/сут. - 3 гостя</p>
                                <p class="location"><span class="flaticon-settings"></span> 8000 руб/сут. - 4 гостя</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 ftco-animate">
                        <div class="project-wrap">
                            <a class="img scroll-elem" style="background-image: url(images/karelia-3.webp);"></a>
                            <div class="text p-4">
                                <span class="price">8000 руб/сут</span>
                                <span class="days">от 1 суток</span>
                                <h3><a class="scroll-elem">"Новый год"</a></h3>
                                <p class="location"><span class="flaticon-settings"></span> ночи: с 30.12.2022 по 08.01.2023 </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row d-flex">
                    <div class="conf-btn" style="padding-top: 30px;"><a href="#" <?/*id="reserve1" */?> data-tl-booking-open="true" class="btn btn-primary py-3 px-4 ftco-animate"><i class="ion-ios-calendar"></i> Забронировать</a></div>
                </div>
            </div>
        </section>-->
        <section id="paidOptions" class="ftco-section services-section bg-light" style="padding-bottom: 0">
            <div class="container">
                <div class="row d-flex">
                    <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
                        <h2 class="mb-4">Платные опции</h2>
                        <p>Чтобы Ваш отдых был еще более разнообразным и незабываемым, за дополнительную стоимость, гостевой дом "Черная жемчужина" готов Вам предоставить:</p>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="media block-6 services d-block">
                                <div class="icon"><span class="flaticon-sauna"></span></div>
                                <div class="media-body">
                                    <h3 class="heading mb-3">Баня</h3>
                                    <p>Полноценная баня, в комплексе "Ламберг", в 5 минутах пешком от наших домов</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row d-flex">
                    <div class="conf-btn" style="padding-top: 30px;"><a href="#" <?/*id="reserve1" */?> data-tl-booking-open="true" class="btn btn-primary py-3 px-4 ftco-animate"><i class="ion-ios-calendar"></i> Забронировать</a></div>
                </div>
            </div>
        </section>
        <section id="availableServices" class="ftco-section services-section bg-light" style="padding-bottom: 0">
            <div class="container">
                <div class="row d-flex">
                    <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
                        <h2 class="mb-4">Дополнительные услуги</h2>
                        <p>Хотите разнообразить свой отдых? Наполнить его яркими и незабываемыми впечатлениями? В таком случае, рекомендуем обратить внимание на наши следующие предложения:</p>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12 d-flex align-self-stretch ftco-animate">
                                <div class="media block-6 services d-block">
                                    <div class="icon"><span class="ion-ios-snow"></span></div>
                                    <div class="media-body">
                                        <h3 class="heading mb-3">Снегоходы</h3>
                                        <p>Веселые покатушки на снегоходах</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row d-flex">
                    <div class="conf-btn" style="padding-top: 30px;"><a href="#" <?/*id="reserve1" */?> data-tl-booking-open="true" class="btn btn-primary py-3 px-4 ftco-animate"><i class="ion-ios-calendar"></i> Забронировать</a></div>
                </div>
            </div>
        </section>
        <section id="houseRules" style="padding-top: 0" class="ftco-section services-section bg-light" style="padding-bottom: 0">
            <div class="container">
                <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate" style="padding-top: 60px;">
                    <h2 class="mb-4">Список правил</h2>
                    <p>Предлагаем Вам ознакомиться с <b>5-ю</b> нашими основными правилами бронирования, пребывания, заезда и выезда:</p>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                            <div class="media block-6 services d-block">
                                <div class="icon"><span>1</span></div>
                                <div class="media-body">
                                    <h3 class="heading mb-3">Бронирование</h3>
                                    <p>Бронь производится от 1 суток</p>
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
                                    <p>Можно. Обсуждается заранее</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                            <div class="media block-6 services d-block">
                                <div class="icon"><span>5</span></div>
                                <div class="media-body">
                                    <h3 class="heading mb-3">Домашние животные</h3>
                                    <p>Разовый сбор за небольших домашних животных</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row d-flex">
                    <div class="conf-btn" style="padding-top: 30px;"><a href="#" <?/*id="reserve1" */?> data-tl-booking-open="true" class="btn btn-primary py-3 px-4 ftco-animate"><i class="ion-ios-calendar"></i> Забронировать</a></div>
                </div>
            </div>
        </section>
        <section id="specials" class="pt-0 ftco-section services-section bg-light">
            <div class="container">
                <div class="row justify-content-center pb-4">
                    <div class="col-md-12 heading-section text-center ftco-animate">
                        <h2 class="mb-4">Особенности</h2>
                        <p>Ниже, представлены некоторые интересные особенности гостевого дома "Чёрная жемчужина №5"</p>
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
                                    <p>Забронируем для вас баню у воды.</p>
                                </div>
                            </div>
                        </div>
                        <div class="post-item">
                            <div class="item-content">
                                <div class="item-icon">
                                    <strong class="number">2</strong>
                                </div>
                                <div class="item-body">
                                    <p>Также на территории базы есть три коттеджа по 80 м2 на 6 человек</p>
                                </div>
                            </div>
                        </div>
                        <div class="post-item">
                            <div class="item-content">
                                <div class="item-icon">
                                    <strong class="number">3</strong>
                                </div>
                                <div class="item-body">
                                    <p>Есть детский манежик с матрасом и детские стульчики для кормления</p>
                                </div>
                            </div>
                        </div>
                        <div class="post-item">
                            <div class="item-content">
                                <div class="item-icon">
                                    <strong class="number">4</strong>
                                </div>
                                <div class="item-body">
                                    <p>Полы во всем доме с подогревом</p>
                                </div>
                            </div>
                        </div>
                        <div class="post-item">
                            <div class="item-content">
                                <div class="item-icon">
                                    <strong class="number">5</strong>
                                </div>
                                <div class="item-body">
                                    <p>Гриль на улице</p>
                                </div>
                            </div>
                        </div>
                        <div class="post-item">
                            <div class="item-content">
                                <div class="item-icon">
                                    <strong class="number">6</strong>
                                </div>
                                <div class="item-body">
                                    <p>Парковка для машин</p>
                                </div>
                            </div>
                        </div>
                        <div class="post-item">
                            <div class="item-content">
                                <div class="item-icon">
                                    <strong class="number">7</strong>
                                </div>
                                <div class="item-body">
                                    <p>Валаам 40км, недалеко находится - Горный Парк Рускеала 36км</p>
                                </div>
                            </div>
                        </div>
                        <div class="post-item">
                            <div class="item-content">
                                <div class="item-icon">
                                    <strong class="number">8</strong>
                                </div>
                                <div class="item-body">
                                    <p>Есть небольшой пляж с причалом. Отличный отдых от городской суеты</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 heading-section ftco-animate">
                    <p class="color-black">Обратите внимание на важное правило дома: при заезде гость вносит страховой депозит за сохранность имущества в размере 5000.
                        Страховой депозит возвращается при выезде при условии сохранности имущества дома</p>
                    <p class="color-black">Новая небольшая база в Карелии. два уютных новых современных коттеджа по 45 кв.м. с террасой,
                        с панорамными окнами, с видом на озеро,на берегу Ладожского озера на острове Риеккалансаари в пяти минутах от г. Сортавала!</p>
                    <p class="color-black">Кровать в спальной в сдвинутом состоянии как двуспальная. Можно раздвинуть кровати по запросу. Диван в гостиной 1200х2000</p>
                    <p class="color-black">Два уютных НОВЫХ современных коттеджа по 45 м2. с террасой, с панорамными окнами,с видом на озеро,на берегу
                        Ладожского озера на острове Риеккалансаари в пяти минутах от г. Сортавала!</p>
                    <p class="color-black">1 спальня и лофт, полностью оборудованная кухня- гостиная, туалет, душ, телевизор, холодильник, микроволновая печь,
                        посудомоечная машина, стиральная машина, чайник, кофеварка, тостер, утюг. Есть вся посуда</p>
                </div>
                <div class="row d-flex">
                    <div class="conf-btn" style="padding-top: 30px;"><a href="#" <?/*id="reserve1" */?> data-tl-booking-open="true" class="btn btn-primary py-3 px-4 ftco-animate"><i class="ion-ios-calendar"></i> Забронировать</a></div>
                </div>
            </div>
        </section>
        <section id="houseReviews" style="background: url(images/houses/chernaya-zhemchuzhina/zima/4.webp);" class="ftco-section services-section module bg-dark-60 pt-0 pb-0 parallax-bg testimonial ftco-animate">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12 heading-section text-center">
                        <h2 class="ftco-no-pt" style="color: #ffdba3">Отзывов нет</h2>
                    </div>
                </div>
            </div>
        </section>
        <?php echo $housesSlider; ?>
        <section class="ftco-section bg-light" style="padding-bottom: 0" id="faq">
            <div class="container">
                <div class="row justify-content-center pb-4">
                    <div class="col-md-12 heading-section text-center ftco-animate">
                        <h2 class="mb-4">Вопросы и ответы</h2>
                        <p>Часто задаваемые вопросы и ответы на них</p>
                    </div>
                </div>
                <div class="accordion-faq ftco-animate">
                    <div class="accordion-item">
                        <button id="accordion-button-4" aria-expanded="true"><span class="accordion-title">Входит ли постельное белье в стоимость?</span><span class="icon" aria-hidden="true"></span></button>
                        <div class="accordion-content">
                            <p>Да, постельное белье входит в стоимость брони</p>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button id="accordion-button-5" aria-expanded="false"><span class="accordion-title">Можно ли проехать на легковой машине на остров?</span><span class="icon" aria-hidden="true"></span></button>
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
								<h3 class="heading"><a>Карелия входит в число регионов-лидеров по вакцинации от ковида</a></h3>
								<p>Более 33 тысяч жителей Карелии сделали прививку первым компонентом вакцины «Спутник V». Наша республика входит в топ регионов по охвату иммунизацией.</p>
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
								<h3 class="heading"><a>Карелия вошла в тройку популярных направлений для летнего отдыха в палатках</a></h3>
								<p>Третье место поделили Алтайский край и Республика Алтай – их выбрали 13 процентов туристов. Следом идут Краснодарский край, озеро Байкал, Башкортостан, Тверская область и Кавказские Минеральные Воды, Хакасия и Карачаево-Черкесия.</p>
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
								<p>В Карелии открылась уже треть турбаз, а также знаковые природные парки и достопримечательности.</p>
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
					<p>Россия, Республика Карелия, п. Ламберг, д. 1</p>
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
                              <textarea name="" cols="30" rows="7" class="form-control" id="message" placeholder="Текст письма"></textarea>
                          </div>
                          <div class="form-group">
                              <p>Нажимая на кнопку, я соглашаюсь на
                                  <a href="/policy" class="publicPolicy" style="text-decoration: underline;color: #999999;">обработку персональных данных</a>
                              </p>
                          </div>
                          <div class="form-group" style="text-align: center">
                              <button type="button" onclick="sendMessage()" class="btn btn-primary py-3 px-5"><i class="ion-ios-send"></i> Отправить письмо</button>
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
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

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
        var h_id = <?php echo json_encode($house_id)?>

        dates = <?php echo json_encode($dates) ?>;
        oneDayRange = <?php echo json_encode($oneDayRange) ?>;
    </script>

    <!-- other scripts -->
    <script defer src="js/script.min.js?v=<?php echo VERSION['scripts']['script']?>"></script>

    <script defer src="js/cbpFWTabs.js"></script>

    <script type="application/ld+json">{
    "@context": "https://schema.org",
    "@type": "WebPage",
    "url": "https://sonniyzaliv.ru/chernaya-zhemchuzhina-5",
    "name": "Черная жемчужина 45м2 - дом на базе отдыха на берегу озера в республике Карелия. Аренда коттеджа Черная жемчужина 45м2 посуточно в республике Карелия г. Сортавала",
    "description": "Предложение отдыха на природе в  доме Черная жемчужина 45м2 Сортавала с видом на озеро и всеми удобствами в Карелии г. Сортавала. Арендовать коттедж Черная жемчужина 45м2 на сутки в республике Карелия на Сонный Залив. Уютный большой дом Черная жемчужина 45м2 на берегу озера. Арендуйте дом Черная жемчужина 45м2 возле озера на сутки в республике Карелия по цене от 6500 тыс. руб.",
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
