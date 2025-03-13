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

	$title = 'Лунный Залив с купелью - снять гостевой дом в Карелии. Аренда коттеджа Лунный Залив посуточно в республике Карелия г. Сортавала';
	$descr = 'Вы можете снять дом Лунный Залив с купелью в Карелии г. Сортавала. Арендовать коттедж Лунный Залив на сутки в республике Карелия на Сонный Залив. Уютный дом Лунный Залив на берегу озера. Арендуйте дом Лунный Залив на сутки в республике Карелия по цене от 7000 тыс. руб.';
	$keywords = 'Лунный залив с купелью снять коттедж на сутки в республике Карелия, джакузи аренда коттеджа посуточно в республике Карелия, аренда дома с джакузи, отдых в Карелии, снять дом с видом на озеро, снять дом с купелью, купель';

    $house_id = 17;

    $bookingData = getBookingData($house_id);

    $res = getFormatBookingCalendarDates($bookingData);

    $dates = $res['dates'];
    $oneDayRange = $res['oneDayRange'];

    $housesSlider = initHousesSlider($house_id);
    $housePhotos = getHousePhotos($house_id);
    $reviews = getHouseReview($house_id);
    $reviewBackground = getHouseReviewBackgroundUrl($house_id);
    $initHouseReviews = initHouseReview($reviews, $reviewBackground);
    $news = getNews();
    $initNews = initNews($news);
    $contactsArr = getSettings([1,2,3,4]);
    $initContacts = initMainContacts($contactsArr);
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

      <link rel="canonical" href="https://sonniyzaliv.ru/lunniy-zaliv"/>

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
    <link href="css/icomoon.css?v=3.4" as="style" rel="preload" onload="this.rel='stylesheet'">
    <link href="css/style.css?v=<?php echo VERSION['styles']?>" as="style" rel="preload" onload="this.rel='stylesheet'">

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
        <script src="//code.jivo.ru/widget/Cpu4LPIQkY" async></script>
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
                        <li class="menu-item"><a href="<?/*#houseBooking*/?>#" data-tl-booking-open="true" data-tl-room='217718'>Забронировать</a></li>
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
                    <li style="background-image: url(images/houses/lunniy-zaliv/23.webp);" data-stellar-background-ratio="0.5"></li>
                    <li style="background-image: url(images/houses/lunniy-zaliv/14.webp);" data-stellar-background-ratio="0.5"></li>
                    <li style="background-image: url(images/houses/lunniy-zaliv/16.webp);" data-stellar-background-ratio="0.5"></li>
                    <li style="background-image: url(images/houses/lunniy-zaliv/22.webp);" data-stellar-background-ratio="0.5"></li>
                    <li style="background-image: url(images/houses/lunniy-zaliv/18.webp);" data-stellar-background-ratio="0.5"></li>
                </ul>
              <div class="overlay"></div>
                <div class="head-text">
                  <div class="container">
                    <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
                      <div class="col-md-9 text text-center ftco-animate" style="margin-top: 100px;" data-scrollax=" properties: { translateY: '70%' }">
                         <h1 id="act-form" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Лунный Залив</h1>
                         <h2 class="subtext" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Аренда гостевого дома "Лунный Залив" в Карелии. Актуальные цены, подробное описание, фотографии, контакты</h2>
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
                <div class="row d-flex" id="aboutUs">
                    <div class="col-md-6 d-flex">
                        <div class="img d-flex align-self-stretch" style="background-image:url(images/houses/sonniy-zaliv/house53.webp);"></div>
                    </div>
                    <div class="col-md-6 pl-md-5 py-5">
                        <div class="row justify-content-start pb-3">
                            <div class="col-md-12 heading-section ftco-animate">
                                <h2 class="mb-4">Александр - владелец "Лунный Залив"</h2>
                                <p class="fs-14"><b>Наша миссия:</b> поддерживать баланс между комфортной ценой для гостей и комфортным семейным отдыхом в загородном доме на берегу пролива в уникальном, созданным природой, месте.</p>
                                <p class="fs-14">Улучшаем качество отдыха для пар, небольших компаний и семей с детьми, чтобы гости получали больше приятных эмоций от визитов в Карелию.</p>
                                <p class="fs-14">Отдых крайне важен и попросту необходим. И мы прекрасно это пониманием.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 centered-text pt-50 heading-section pl-md-5 ftco-animate">
                        <p style="font-size: 22px; color: #323232; font-weight: bold;">Почему необходимо отдохнуть именно у нас:</p>
                    </div>
                    <div class="col-md-12 d-flex">
                        <div class="row">
                        <div class="col-md-4 justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center mb-4">
                                <div class="text">
                                    <strong class="number">1</strong>
                                    <span><b>Мы - сообщество собственников жилья напрямую без агентов</b></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center mb-4">
                                <div class="text">
                                    <strong class="number">2</strong>
                                    <span><b>Оплаты безналично на карту с защитой visa, mastercard и мир</b></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center mb-4">
                                <div class="text">
                                    <strong class="number">3</strong>
                                    <span><b>Возможность гибкой отмены брони</b></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center mb-4">
                                <div class="text">
                                    <strong class="number">4</strong>
                                    <span><b>Только новые дома</b></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center mb-4">
                                <div class="text">
                                    <strong class="number">5</strong>
                                    <span><b>Уникальная природная локация (берег Ладоги и лес)</b></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 justify-content-center counter-wrap ftco-animate" style="padding-top: 22px">
                            <div class="block-18 text-center mb-4">
                                <div class="text">
                                    <strong style="font-size: 22px; color: #f9ab30;">Появились вопросы? Свяжитесь со мной</strong>
                                    <ul class="ftco-footer-social list-unstyled">
                                        <li class="ftco-animate"><a rel="nofollow" href="https://t.me/+KmgBetu6NYtlNjcy" target="_blank"><span class="icon-telegram"></span></a></li>
                                        <li class="ftco-animate"><a rel="nofollow" href="https://wa.me/79811878002" target="_blank"><span class="icon-whatsapp"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
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
                                        <h3 class="heading mb-3">4 спальных места</h3>
                                        <p>В доме расположена 1 удобная двуспальная кровать и 1 диван</p>
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
                                    <div class="icon"><span class="flaticon-book"></span></div>
                                    <div class="media-body">
                                        <h3 class="heading mb-3">Библиотека</h3>
                                        <p>Личная библиотека для спокойного отдыха</p>
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
                                    <div class="icon"><span class="flaticon-jacuzzi"></span></div>
                                    <div class="media-body">
                                        <h3 class="heading mb-3">Купель</h3>
                                        <p>Глубокая купель с аэромассажем для тотального расслабления</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                                <div class="media block-6 services d-block">
                                    <div class="icon"><span class="flaticon-orthopedic"></span></div>
                                    <div class="media-body">
                                        <h3 class="heading mb-3">Ортопедические матрасы</h3>
                                        <p>Ортопедические матрасы для глубокого сна</p>
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
                                    <div class="icon"><span class="flaticon-stove"></span></div>
                                    <div class="media-body">
                                        <h3 class="heading mb-3">Плита</h3>
                                        <p>Готовьте еду не отрываясь от отдыха</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                                <div class="media block-6 services d-block">
                                    <div class="icon"><span class="flaticon-microwave"></span></div>
                                    <div class="media-body">
                                        <h3 class="heading mb-3">СВЧ-печь с грилем</h3>
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
                                        <h3 class="heading mb-3">Барбекю (мангал)</h3>
                                        <p>Для кулинарных шедевров</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                                <div class="media block-6 services d-block">
                                    <div class="icon"><span class="flaticon-mountain"></span></div>
                                    <div class="media-body">
                                        <h3 class="heading mb-3">Лес</h3>
                                        <p>Ну и конечно, природа и красивые виды Карелии</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="conf-btn"><a href="#" <?/*id="reserve1" */?> data-tl-booking-open="true" class="btn btn-primary py-3 px-4 ftco-animate"><i class="ion-ios-calendar"></i> Забронировать</a></div>
                </div>
            </div>
        </section>
        <section id="paidOptions" class="ftco-section services-section bg-light" style="padding-bottom: 0">
            <div class="container">
                <div class="row d-flex">
                    <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
                        <h2 class="mb-4">Платные опции</h2>
                        <p>Чтобы Ваш отдых был еще более разнообразным и незабываемым, за дополнительную стоимость, мы готовы Вам предоставить:</p>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                                <div class="media block-6 services d-block">
                                    <div class="icon"><span class="flaticon-boat"></span></div>
                                    <div class="media-body">
                                        <h3 class="heading mb-3">Лодка</h3>
                                        <p>Вёсельная лодка с жилетами для прогулок по озеру в вашем распоряжении</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                                <div class="media block-6 services d-block">
                                    <div class="icon"><span class="flaticon-hot-tub"></span></div>
                                    <div class="media-body">
                                        <h3 class="heading mb-3">Купель</h3>
                                        <p>Купель с подогревом, аква-массажем, подсветкой, фильтрацией чистым кварцем и ультрафиолетом</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                                <div class="media block-6 services d-block">
                                    <div class="icon"><span class="flaticon-tea-cup"></span></div>
                                    <div class="media-body">
                                        <h3 class="heading mb-3">Чай</h3>
                                        <p>5 видов свежих черного и зеленого чая</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Slider main container -->
                <div class="swiper-paid-options">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        <div class="swiper-slide">
                            <div class="ftco-animate">
                                <div class="project-destination">
                                    <a class="img" style="background-image: url(images/houses/lunniy-zaliv/2.webp);" href="images/houses/lunniy-zaliv/2.webp" data-fancybox="gallery-paid-options">
                                        <div class="text">
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="ftco-animate">
                                <div class="project-destination">
                                    <a class="img" style="background-image: url(images/houses/lunniy-zaliv/15.webp);" href="images/houses/lunniy-zaliv/15.webp" data-fancybox="gallery-paid-options">
                                        <div class="text">
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="ftco-animate">
                                <div class="project-destination">
                                    <a class="img" style="background-image: url(images/houses/lunniy-zaliv/20.webp);" href="images/houses/lunniy-zaliv/20.webp" data-fancybox="gallery-paid-options">
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
                                    <div class="icon"><span class="flaticon-speed-boat"></span></div>
                                    <div class="media-body">
                                        <h3 class="heading mb-3">Прогулки на катере</h3>
                                        <p>Прогулки по Ладожским шхерам на комфортабельном 6-триместном катере. Капитан судна с опытом с 1998 года</p>
                                    </div>
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
                                    <a class="img" style="background-image: url(images/houses/sonniy-zaliv/kater-1.webp);" href="images/houses/sonniy-zaliv/kater-1.webp" data-fancybox="gallery-boat">
                                        <div class="text">
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="ftco-animate">
                                <div class="project-destination">
                                    <a class="img" style="background-image: url(images/houses/sonniy-zaliv/kater-2.webp);" href="images/houses/sonniy-zaliv/kater-2.webp" data-fancybox="gallery-boat">
                                        <div class="text">
                                            <!-- <span>5 Tours</span> -->
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="ftco-animate">
                                <div class="project-destination">
                                    <a class="img" style="background-image: url(images/houses/sonniy-zaliv/kater-3.webp);" href="images/houses/sonniy-zaliv/kater-3.webp" data-fancybox="gallery-boat">
                                        <div class="text">
                                            <!-- <span>5 Tours</span> -->
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="ftco-animate">
                                <div class="project-destination">
                                    <a class="img" style="background-image: url(images/houses/sonniy-zaliv/kater-4.webp);" href="images/houses/sonniy-zaliv/kater-4.webp" data-fancybox="gallery-boat">
                                        <div class="text">
                                            <!-- <span>5 Tours</span> -->
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="ftco-animate">
                                <div class="project-destination">
                                    <a class="img" style="background-image: url(images/houses/sonniy-zaliv/kater-5.webp);" href="images/houses/sonniy-zaliv/kater-5.webp" data-fancybox="gallery-boat">
                                        <div class="text">
                                            <!-- <span>5 Tours</span> -->
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
                <div class="row d-flex">
                    <div class="conf-btn" style="padding-top: 30px;"><a href="#" <?/*id="reserve1" */?> data-tl-booking-open="true" class="btn btn-primary py-3 px-4 ftco-animate"><i class="ion-ios-calendar"></i> Забронировать</a></div>
                </div>
            </div>
        </section>
        <section id="houseRules" style="padding-top: 0; padding-bottom: 0" class="ftco-section services-section bg-light">
            <div class="container">
                <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate" style="padding-top: 60px;">
                    <h2 class="mb-4">Список правил</h2>
                    <p>Предлагаем Вам ознакомиться с <b>6-ю</b> нашими основными правилами бронирования, пребывания, заезда и выезда:</p>
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
                                    <p>Поздний заезд с 19:00 до 0:00 и ранний выезд, до 7:00, обязательно обсуждаются заранее</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                            <div class="media block-6 services d-block">
                                <div class="icon"><span>5</span></div>
                                <div class="media-body">
                                    <h3 class="heading mb-3">Домашние животные</h3>
                                    <p>С животными разрешено. 1500 руб за каждое животное</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                            <div class="media block-6 services d-block">
                                <div class="icon"><span>6</span></div>
                                <div class="media-body">
                                    <h3 class="heading mb-3">Мусор</h3>
                                    <p>Мусор в контейнер вывозят гости самостоятельно</p>
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
        <section id="specials" class="ftco-section services-section bg-light">
            <div class="container">
                <div class="row justify-content-center pb-4">
                    <div class="col-md-12 heading-section text-center ftco-animate">
                        <h2 class="mb-4">Особенности</h2>
                        <p>Ниже, представлены некоторые интересные особенности гостевого дома "Лунный Залив"</p>
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
                                    <p>Комфортный отдых ‍для семей ‍‍‍и пар от работы и шума города</p>
                                </div>
                            </div>
                        </div>
                        <div class="post-item">
                            <div class="item-content">
                                <div class="item-icon">
                                    <strong class="number">2</strong>
                                </div>
                                <div class="item-body">
                                    <p>Прогулки по вулканическому острову к таёжному лесу, тропинки к открытой Ладоге</p>
                                </div>
                            </div>
                        </div>
                        <div class="post-item">
                            <div class="item-content">
                                <div class="item-icon">
                                    <strong class="number">3</strong>
                                </div>
                                <div class="item-body">
                                    <p>Для гостей-подписчиков ВК без автомобиля, трансфер из города к дому бесплатный. Подпишись- прокатись!</p>
                                </div>
                            </div>
                        </div>
                        <div class="post-item">
                            <div class="item-content">
                                <div class="item-icon">
                                    <strong class="number">4</strong>
                                </div>
                                <div class="item-body">
                                    <p>Тёплый, светлый, уютный, скандинавский интерьер дома с панорамными окнами и видом на залив</p>
                                </div>
                            </div>
                        </div>
                        <div class="post-item">
                            <div class="item-content">
                                <div class="item-icon">
                                    <strong class="number">5</strong>
                                </div>
                                <div class="item-body">
                                    <p>Своя безопасная, огороженная территория. Один дом на участке. Сортавала аренда дома</p>
                                </div>
                            </div>
                        </div>
                        <div class="post-item">
                            <div class="item-content">
                                <div class="item-icon">
                                    <strong class="number">6</strong>
                                </div>
                                <div class="item-body">
                                    <p>Свой подход в 70 метрах от дома к своему пирсу с лодкой</p>
                                </div>
                            </div>
                        </div>
                        <div class="post-item">
                            <div class="item-content">
                                <div class="item-icon">
                                    <strong class="number">7</strong>
                                </div>
                                <div class="item-body">
                                    <p>Комфортное размещение для 2-х (+2) человек</p>
                                </div>
                            </div>
                        </div>
                        <div class="post-item">
                            <div class="item-content">
                                <div class="item-icon">
                                    <strong class="number">8</strong>
                                </div>
                                <div class="item-body">
                                    <p>Двуспальные кровати *1 шт</p>
                                </div>
                            </div>
                        </div>
                        <div class="post-item">
                            <div class="item-content">
                                <div class="item-icon">
                                    <strong class="number">9</strong>
                                </div>
                                <div class="item-body">
                                    <p>Диван-кровать (1500*2000) *1 шт</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 heading-section ftco-animate">
                    <p class="color-black">Дом расположен на берегу Ладожского озера на большом острове,
                        в Ладожских шхерах в 10 минутах от туристического центра Сортавала. Рядом живописный сосновый лес с грибами и ягодами.</p>
                    <p class="color-black">Уютный дом для двоих (четверых) гостей. Возможно размещение 2+2 (одна комната-гостиная проходная с двуспальным диваном)</p>
                    <p class="color-black">Дом 42м2 и терраса 24м2 с уличной, открытой, теплой купелью.
                        Любителям банного отдыха с вениками всегда порекомендуем хорошее место -
                        частную баню с вениками в пяти минутах на машине от нас с видом на залив с рейтингом 5.0 на Яндексе</p>
                    <p class="color-black">Wi-fi. smart-TV с новинками кино, спутниковое телевидение 290 каналов, стабильный интернет для работы и учебы,
                        детские книги и настольные игры. Мангал и уличные качели </p>
                    <p class="color-black">С животными возможно по договоренности - плата за доп уборку</p>
                    <p class="color-black">Есть дополнительные платные опции</p>
                    <p class="color-black">Тёплая купель на террасе (доступна весной в сезоне 2023 с 1 мая по 1 ноября). Лодка на берегу</p>
                    <p class="color-black">До зимней туристической изюминки Карелии - горного парка «Рускеала» 37 километров.
                        Карельский зоопарк для семейных прогулок - 56 км. Исторический парк "Бастион" - 10 минут на машине. Встретим на вокзале.
                        Поможем с поездкой в горный парк и на водопады. Дом находится на острове.
                        Проезд к дому через понтонный, круглогодичный, металлический мост. На острове грунтовые дороги.
                        Обратите внимание на фото лестницы, она достаточно высокая</p>
                    <p class="color-black">P.S. Наши гости любят чистоту и не хотят переплачивать за уборку. Поэтому у нас два простых правила.
                        1) Мусор в контейнер вывозят гости самостоятельно. 2) Гости сами моют посуду :)</p>
                </div>
                <div class="row d-flex">
                    <div class="conf-btn" style="padding-top: 30px;"><a href="#" <?/*id="reserve1" */?> data-tl-booking-open="true" class="btn btn-primary py-3 px-4 ftco-animate"><i class="ion-ios-calendar"></i> Забронировать</a></div>
                </div>
            </div>
        </section>
        <?php echo $initHouseReviews; ?>
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
        <section class="ftco-section module bg-light" id="services" style="padding-bottom: 0">
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
                                                    <h3 class="heading mb-3" style="padding-top: 10px">Кафе и рестораны</h3>
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
        <?php echo $initNews; ?>
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
					<p>Россия, Республика Карелия, Сортавальское городское поселение, п. Нукутталахти, ул. Центральная, д. 52</p>
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
    "url": "https://sonniyzaliv.ru/lunniy-zaliv",
    "name": "Лунный Залив с купелью - снять гостевой дом в Карелии. Аренда коттеджа Лунный Залив посуточно в республике Карелия г. Сортавала",
    "description": "Вы можете снять дом Лунный Залив с купелью в Карелии г. Сортавала. Арендовать коттедж Лунный Залив на сутки в республике Карелия на Сонный Залив. Уютный дом Лунный Залив на берегу озера. Арендуйте дом Лунный Залив на сутки в республике Карелия по цене от 7000 тыс. руб.",
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
