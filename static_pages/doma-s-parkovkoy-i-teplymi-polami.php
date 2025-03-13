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

	$title = 'Сонный Залив - Каталог загородных домов в республике Карелия. Список коттеджей посуточной аренды в республике Карелия г. Сортавала';
	$descr = 'В нашем каталоге домов мы предлагаем Вам снять дома в том числе с панорамным видом на озеро и всеми удобствами в Карелии г. Сортавала. Аренда коттеджей на сутки в республике Карелия на Сонный Залив. Уютные большие дома на берегу озера. Арендуйте дома с панорамным видом на сутки в республике Карелия. На сайте большой выбор недорогого жилья премиум качества от собственников. Забронируйте жилье для отдыха в Карелии по недорогим ценам. дома, с подробным описанием и отзывами';
	$keywords = 'снять коттедж на сутки в республике Карелия, аренда коттеджа посуточно в республике Карелия, аренда дома с панорманым видом на озеро, отдых в Карелии, снять дом с видом на озеро в Сортавала';

	// SEO информация страницы
	$seoInfoArray = getSeoInfo($_SERVER['REQUEST_URI']);
	$title = isset($seoInfoArray['title']) ? $seoInfoArray['title'] : $title;
    $descr = isset($seoInfoArray['description']) ? $seoInfoArray['description'] : $descr;
    $keywords = isset($seoInfoArray['keywords']) ? $seoInfoArray['keywords'] : $keywords;

    $filtersList = isset($seoInfoArray['filters_list']) ? $seoInfoArray['filters_list'] : "";  // список фильтров из БД
    if ($filtersList)
        $filtersArray['filter'] = explode(",", $filtersList);                          // преобразуем в массив

    if (!$filtersList)
        $filtersArray = urlParamsToArray($_SERVER['QUERY_STRING'], ['filter']);                // массив фильров из url

    $housesSlider = initHousesSlider(-1, "Наши гостевые дома");
    $iconBlock = getSubscribeIconBlock();
    $catalog = initCatalogHouses(false, 1, $filtersArray);
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
      </script>
      <link rel="stylesheet" href="css/travelline-style.css">
      <!-- end TL head script -->
  </head>
  <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-WS85F05T7W"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-WS85F05T7W');
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
                        <li class="menu-item"><a href="#contactData">Контакты</a></li>
                    </ul>
                </nav>
            </div>
        </section>
	</header>
    <!-- END nav -->
    <main role="main">
        <section class="ftco-section services-section" style="padding-bottom: 0">
            <div class="container">
                <div class="row justify-content-center pb-4" id="section-catalog">
                    <div class="col-md-12 heading-section text-center ftco-animate">
                        <h2 class="mb-4">Каталог</h2>
                        <p>Чтобы посмотреть полную информацию, об интересующем Вас доме, нажмите "Подробнее"</p>
                    </div>
                </div>
                <!-- start TL Search form script -->
                <div id='block-search-inner'>
                    <div id='tl-search-form' class='tl-container'>
                        <noindex><a href='https://www.travelline.ru/products/tl-hotel/' rel='nofollow' target='_blank'>TravelLine</a></noindex>
                    </div>
                </div>
                <!-- end TL Search form script -->
            </div>
        </section>
        <div class="cd-main-content">
            <div class="cd-tab-filter-wrapper">
                <div class="cd-tab-filter">
                    <ul class="cd-filters" id="catalog-list">
                        <li class="placeholder">
                            <a data-type="all" href="#0">Все</a> <!-- selected option on mobile -->
                        </li>
                        <li class="filter"><a onclick="useFilter(this)" value="0" class="selected" href="#0">Все</a></li>
                        <li class="filter"><a onclick="useFilter(this)" value="1" href="#0">Дома</a></li>
                        <li class="filter"><a onclick="useFilter(this)" value="2" href="#0">Квартиры</a></li>
                    </ul> <!-- cd-filters -->
                </div> <!-- cd-tab-filter -->
            </div> <!-- cd-tab-filter-wrapper -->
            <div class="cd-filter">
                <form>
                    <div class="cd-filter-block">
                        <h4>Дата заезда</h4>
                        <div class="cd-filter-content">
                            <input type="date" placeholder="Выберите дату" class="catalog-date" id="date-in" onchange="useFilter();">
                        </div> <!-- cd-filter-content -->
                    </div> <!-- cd-filter-block -->
                    <div class="cd-filter-block">
                        <h4>Дата выезда</h4>
                        <div class="cd-filter-content">
                            <input type="date" placeholder="Выберите дату" class="catalog-date" id="date-out" onchange="useFilter();">
                        </div> <!-- cd-filter-content -->
                    </div> <!-- cd-filter-block -->
                    <div class="cd-filter-block">
                        <h4>Кол-во гостей</h4>
                        <div class="cd-filter-content">
                            <input type="text" placeholder="Укажите число..." id="person-count" onkeyup="useFilter();">
                        </div> <!-- cd-filter-content -->
                    </div> <!-- cd-filter-block -->
                </form>
                <a href="#0" class="cd-close">Закрыть</a>
            </div> <!-- cd-filter -->
            <a href="#0" class="cd-filter-trigger">Фильтр</a>
        </div>

        <section id="catalog" class="ftco-section services-section bg-light pb-0" style="padding-top: 15px;">
            <?php echo $catalog; ?>
        </section> <!-- cd-gallery -->
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
        <section id="contactData" class="ftco-section ftco-no-pt ftco-no-pb contact-section bg-light">
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
<!--                <div class="col-md-6 d-flex ftco-animate">-->
<!--                    <div style="overflow:hidden;width:100%;height:90%;">-->
<!--                        <a href="https://yandex.ru/maps/110934/sortavalsky-district/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:0px;">Сортавальский район</a>-->
<!--                        <a href="https://yandex.ru/maps/10933/republic-of-karelia/house/tsentralnaya_ulitsa_52/Z0kYcQBiQEMAQFhrfXtxdnRnZw==/?ll=30.773554%2C61.707562&source=wizgeo&utm_medium=mapframe&utm_source=maps&z=16.71" style="color:#eee;font-size:12px;position:absolute;top:14px;">Центральная улица, 52 — Яндекс.Карты</a>-->
<!--                        <iframe src="https://yandex.ru/map-widget/v1/-/CCUYjOXm3A" width="540" height="540" frameborder="0" allowfullscreen="true" style="position:relative;width:100%;"></iframe>-->
<!--                        <iframe src="https://yandex.ru/map-widget/v1/?z=12&ol=biz&oid=222502182716" width="540" height="540" frameborder="0" allowfullscreen="true" style="position:relative;width:100%;"></iframe>-->
<!--                    </div>-->
<!--                </div>-->
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
    "@type": "Product",
    "url": "https://sonniyzaliv.ru/doma-s-parkovkoy-i-teplymi-polami.php",
    "name": "Сонный Залив - Каталог загородных домов в республике Карелия. Список коттеджей посуточной аренды в республике Карелия г. Сортавала",
    "description": "В нашем каталоге домов мы предлагаем Вам снять дома в том числе с панорамным видом на озеро и всеми удобствами в Карелии г. Сортавала. Аренда коттеджей на сутки в республике Карелия на Сонный Залив. Уютные большие дома на берегу озера. Арендуйте дома с панорамным видом на сутки в республике Карелия. На сайте большой выбор недорогого жилья премиум качества от собственников. Забронируйте жилье для отдыха в Карелии по недорогим ценам. дома, с подробным описанием и отзывами",
    "inLanguage": "ru-RU",
    "offers": {
        "@type": "Offer",
        "priceCurrency": "RUB",
        "availability": "https://schema.org/InStock"
    },
    "image": [
        "https://mc.yandex.ru/watch/79760224"
    ],
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