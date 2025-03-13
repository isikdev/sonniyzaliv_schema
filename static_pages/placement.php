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

	$title = 'Сонный Залив - Заявка на размещение жилья';
	$descr = 'Заполните данную форму и мы разместим ваше жильё на нашем сайте быстро и без регистрации';
	$keywords = 'разместить жилье, сдать дом, сдать квартиру, карелия, сортавала';

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
                        <li class="menu-item"><a href="#contactData">Контакты</a></li>
                    </ul>
                </nav>
            </div>
        </section>
	</header>
    <!-- END nav -->
    <main role="main">
        <section class="ftco-section services-section" style="padding-bottom: 30px">
            <div class="container">
                <div class="row justify-content-center pb-4" id="section-catalog" style="overflow: hidden;">
                    <div class="col-md-12 heading-section text-center ftco-animate">
                        <h1 class="mb-4">Заявка на размещение</h1>
                        <p id="replacementP">Заполните данную форму и мы разместим ваше жилье быстро и без регистрации</p>
                    </div>
                    <!-- multistep form -->
                    <form id="msform">
                        <!-- progressbar -->
                        <ul id="progressbar">
                            <li class="active">Информация</li>
                            <li>Удобства</li>
                            <li>Правила</li>
                            <li>Цены</li>
                        </ul>
                        <!-- fieldsets -->
                        <fieldset>
                            <h2 class="fs-title">Общая информация</h2>
                            <h3 class="fs-subtitle">Обязательный поля отмечены *</h3>
                            <input type="text" name="houseName" placeholder="Уникальное название *" />
                            <input type="text" name="location" placeholder="Местоположение *" />
                            <input type="number" min="1" name="placeCount" placeholder="Кол-во спальных мест *" />
                            <input type="number" min="1" name="subPlaceCount" placeholder="Кол-во доп. спальных мест" />
                            <textarea name="payOptions" placeholder="Платные опции"></textarea>
                            <textarea name="addServices" placeholder="Дополнительные услуги"></textarea>
                            <input type="text" name="reviewLink" placeholder="Ссылка на отзывы" />
                            <input type="text" name="ownerName" placeholder="Имя владельца *" />
                            <input type="email" name="email" placeholder="Email *" />
                            <input type="tel" id="mobileContact" name="phone" placeholder="Телефон *" />
                            <textarea name="ownerWords" placeholder="Слова клиентам от владельца *"></textarea>
                            <input type="button" name="next" class="next action-button" value="Далее" />
                        </fieldset>
                        <fieldset>
                            <h2 class="fs-title">Удобства</h2>
                            <h3 class="fs-subtitle">Выберите из представляенных, нажимая на названия</h3>
                            <div style="width: 100%; margin-bottom: 15px;">
                                <input class="filter" name="cond" type="checkbox" id="cond_1" value="Теплые полы">
                                <label class="checkbox-label" for="cond_1">Теплые полы</label>
                                <input class="filter" name="cond" type="checkbox" id="cond_2" value="Панорамные окна">
                                <label class="checkbox-label" for="cond_2">Панорамные окна</label>
                                <input class="filter" name="cond" type="checkbox" id="cond_3" value="Библиотека">
                                <label class="checkbox-label" for="cond_3">Библиотека</label>
                                <input class="filter" name="cond" type="checkbox" id="cond_4" value="Телевизор">
                                <label class="checkbox-label" for="cond_4">Телевизор</label>
                                <input class="filter" name="cond" type="checkbox" id="cond_5" value="Wi-Fi">
                                <label class="checkbox-label" for="cond_5">Wi-Fi</label>
                                <input class="filter" name="cond" type="checkbox" id="cond_6" value="Сауна">
                                <label class="checkbox-label" for="cond_6">Сауна</label>
                                <input class="filter" name="cond" type="checkbox" id="cond_7" value="Купель">
                                <label class="checkbox-label" for="cond_7">Купель</label>
                                <input class="filter" name="cond" type="checkbox" id="cond_8" value="Чай">
                                <label class="checkbox-label" for="cond_8">Чай</label>
                                <input class="filter" name="cond" type="checkbox" id="cond_9" value="Ортопедические матрасы">
                                <label class="checkbox-label" for="cond_9">Ортопедические матрасы</label>
                                <input class="filter" name="cond" type="checkbox" id="cond_10" value="Стиральная машина">
                                <label class="checkbox-label" for="cond_10">Стиральная машина</label>
                                <input class="filter" name="cond" type="checkbox" id="cond_11" value="Холодильник">
                                <label class="checkbox-label" for="cond_11">Холодильник</label>
                                <input class="filter" name="cond" type="checkbox" id="cond_12" value="Плита">
                                <label class="checkbox-label" for="cond_12">Плита</label>
                                <input class="filter" name="cond" type="checkbox" id="cond_13" value="Свч-печь">
                                <label class="checkbox-label" for="cond_13">Свч-печь</label>
                                <input class="filter" name="cond" type="checkbox" id="cond_14" value="Душ">
                                <label class="checkbox-label" for="cond_14">Душ</label>
                                <input class="filter" name="cond" type="checkbox" id="cond_15" value="Барбекю">
                                <label class="checkbox-label" for="cond_15">Барбекю</label>
                                <input class="filter" name="cond" type="checkbox" id="cond_16" value="Парковка">
                                <label class="checkbox-label" for="cond_16">Парковка</label>
                                <input class="filter" name="cond" type="checkbox" id="cond_17" value="Кондиционер">
                                <label class="checkbox-label" for="cond_17">Кондиционер</label>
                                <input class="filter" name="cond" type="checkbox" id="cond_18" value="Баня">
                                <label class="checkbox-label" for="cond_18">Баня</label>
                                <input class="filter" name="cond" type="checkbox" id="cond_19" value="Джакузи">
                                <label class="checkbox-label" for="cond_19">Джакузи</label>
                                <input class="filter" name="cond" type="checkbox" id="cond_20" value="Кух. принадлежности">
                                <label class="checkbox-label" for="cond_20">Кух. принадлежности</label>
                                <input class="filter" name="cond" type="checkbox" id="cond_21" value="Духовка">
                                <label class="checkbox-label" for="cond_21">Духовка</label>
                                <input class="filter" name="cond" type="checkbox" id="cond_22" value="Вид на озеро">
                                <label class="checkbox-label" for="cond_22">Вид на озеро</label>
                            </div>
                            <input type="button" name="previous" class="previous action-button" value="Назад" />
                            <input type="button" name="next" class="next action-button" value="Далее" />
                        </fieldset>
                        <fieldset>
                            <h2 class="fs-title">Основные правила</h2>
                            <h3 class="fs-subtitle">Обязательный поля отмечены *</h3>
                            <textarea name="timeIn" placeholder="Время заезда *"></textarea>
                            <textarea name="timeOut" placeholder="Время выезда *"></textarea>
                            <textarea name="changeTime" placeholder="Изменить время (заезд/выезд) *"></textarea>
                            <textarea name="bookingRules" placeholder="Особенности бронирования *"></textarea>
                            <textarea name="smoking" placeholder="Курение *"></textarea>
                            <textarea name="trash" placeholder="Мусор *"></textarea>
                            <textarea name="pets" placeholder="Пребывание с животными *"></textarea>
                            <input type="button" name="previous" class="previous action-button" value="Назад" />
                            <input type="button" name="next" class="next action-button" value="Далее" />
                        </fieldset>
                        <fieldset>
                            <h2 class="fs-title">Цены</h2>
                            <h3 class="fs-subtitle">Для добавления новой цены нажмите "Добавить новый период". Для удаления последнего периода нажмите "Удалить последний"</h3>
                            <input type="number" name="oneDayAmount" placeholder="Цена на 1 сут." />
                            <input type="number" name="moreDayAmount" placeholder="Цена 1 сут. (от 2 сут.) *" />
                            <div id="amountFieldset">
                                <div class="amount-input-block" id="input0">
                                    <input type="text" name="periodDatesStart" placeholder="Период дат (с)" />
                                    <input type="text" name="periodDatesEnd" placeholder="Период дат (по)" />
                                    <input type="number" name="amount" placeholder="Стоимость" />
                                    <input type="number" name="personCount" placeholder="Кол-во человек" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <input type="button" onclick="delPlacementBlock()" class="removeOne col-md-6" name="removeOne" value="- Удалить последний">
                                <input type="button" onclick="addPlacementBlock()" class="addOne col-md-6" name="addOne" value="+ Добавить новый период">
                            </div>
                            <input type="button" name="previous" class="previous action-button" value="Назад" />
                            <input type="submit" name="submit" class="submit action-button" onclick="addPlacement()" value="Отправить" />
                        </fieldset>
                    </form>
                </div>
            </div>
        </section>
        <section id="contactData" class="ftco-section ftco-no-pb pt-5 contact-section bg-light">
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
                <div class="col-md-6 d-flex ftco-animate">
                    <div style="overflow:hidden;width:100%;height:90%;">
                        <a href="https://yandex.ru/maps/110934/sortavalsky-district/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:0px;">Сортавальский район</a>
                        <a href="https://yandex.ru/maps/10933/republic-of-karelia/house/tsentralnaya_ulitsa_52/Z0kYcQBiQEMAQFhrfXtxdnRnZw==/?ll=30.773554%2C61.707562&source=wizgeo&utm_medium=mapframe&utm_source=maps&z=16.71" style="color:#eee;font-size:12px;position:absolute;top:14px;">Центральная улица, 52 — Яндекс.Карты</a>
<!--                        <iframe src="https://yandex.ru/map-widget/v1/-/CCUYjOXm3A" width="540" height="540" frameborder="0" allowfullscreen="true" style="position:relative;width:100%;"></iframe>-->
                        <iframe src="https://yandex.ru/map-widget/v1/?z=12&ol=biz&oid=222502182716" width="540" height="540" frameborder="0" allowfullscreen="true" style="position:relative;width:100%;"></iframe>
                    </div>
                </div>
			  <div class="col-md-6 order-md-last d-flex ftco-animate">
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
                        <p>Нажимая на кнопку, я соглашаюсь на&nbsp;
                            <a href="/policy" class="publicPolicy" style="text-decoration: underline;color: #999999;">обработку персональных данных</a>
                        </p>
                    </div>
				  <div class="form-group" style="text-align: center">
					<button type="button" onclick="sendMessage()" class="btn btn-primary py-3 px-5"><i class="ion-ios-send"></i>&nbsp;Отправить письмо</button>
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
    <script defer src="js/modernizr.js"></script> <!-- Modernizr -->
    <script defer src="js/jquery.mixitup.min.js"></script>
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
    "url": "https://sonniyzaliv.ru/placement.php",
    "name": "Сонный Залив - Заявка на размещение жилья",
    "description": "Заполните данную форму и мы разместим ваше жильё на нашем сайте быстро и без регистрации",
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