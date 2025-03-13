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

    $title = 'Сонный Залив - приобрести подарочный сертификат на Новый Год. Подарок под Ёлку в виде отпуска в Карелии от двух суток';
    $descr = 'Сделайте подарок своим близким, родным или друзьям на Новый Год - купите подарочный сертификат Сонный Залив, на отдых в нашем гостевом доме с открытой датой заезда';
    $keywords = 'подарочный сертификат, новый год, подарок, отдых в Карелии, отпуск, выходные, от двух суток, открытая дата, под ёлку';
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

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/t-datepicker.min.css">
    <link rel="stylesheet" href="css/themes/t-datepicker-purple.css">

    <link rel="stylesheet" href="css/aos.css">

    <!-- Font Awesome -->
    <link href="css/font-awesome.min.css" rel="stylesheet">

    <!-- Favicon -->
    <link rel="shortcut icon" href="https://sonniyzaliv.ru/favicon.ico" type="image/x-icon">
    <link href="favicon.ico" rel="icon" type="image/x-icon">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    <!-- Swiper -->
    <link href="css/swiper.min.css" rel="stylesheet" type="text/css"/>


    <link rel="stylesheet" href="css/flaticon.css?v=3.4">
    <link rel="stylesheet" href="css/mistral.css">
    <link rel="stylesheet" href="css/monotype_corsiva.css">
    <link rel="stylesheet" href="css/icomoon.css?v=3.4">
    <link rel="stylesheet" href="css/style.min.css?v=5.2">

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
        <link itemprop="sameAs" href="https://www.instagram.com/sonniyzaliv/?igshid=1s213ld4n27vi" />
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
                    <li class="menu-item"><a href="#cert-form">Приобрести сертификат</a></li>
                </ul>
            </nav>
        </div>
    </section>
    <!--	      <img src="images/logo2.png" alt="Логотип" title="Логотип"></img>-->
</header>
<!-- END nav -->
<main role="main">
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/gift.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate pb-5 text-center">
              <h1 id="act-form" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Подарочный сертификат</h1>
              <h2 class="subtext" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Подарите незабываемый отдых в Карелии, своим родным и близким</h2>
              <p class="breadcrumbs"><span class="mr-2"><a href="/">Главная <i class="ion-ios-arrow-forward"></i></a></span><span>Подарочный сертификат</span></p>
          </div>
        </div>
      </div>
    </section>

    <!-- wish -->
    <div id="wish" class="about-box" style="padding-top: 75px">
        <div class="about-a1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="title-box">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="row align-items-center about-main-info">

                            <div class="col-lg-6 col-md-6 col-sm-12 text_align_center">
                                <div class="full">
                                    <img class="img-responsive" src="images/w1.png" alt="#" />
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <h2><img style="width: 60px;" src="images/head_s.png" alt="#" /> Под ёлочку</h2>
                                <p>Не можете выбрать подарок на Новый Год? Мы сделали это за Вас и для Вас.</p>
                                <p>К вашим услугам - подарочный сертификат на отдых в нашем гостевом доме, с открытой датой</p>
                                <a href="#cert-form" class="hvr-radial-out button-theme">Заполнить заявку</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="about-a1" style="background:#f7f7f7;margin-top: 50px;padding-top: 75px;padding-bottom: 50px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="row align-items-center about-main-info">

                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <h2><img style="width: 60px;" src="images/head_s.png" alt="#" /> Как приобрести?</h2>
                                <p>Все очень просто! Для этого, Вам необходимо всего лишь заполнить форму заявки, расположенную ниже</p>
                                <p>И мы свяжемся с Вами для соглосования всех необходимых деталей</p>
                                <p>Или свяжитесь с нами по контактам, указанным на данной странице</p>
                                <a href="#cert-form" class="hvr-radial-out button-theme">Заполнить заявку</a>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 text_align_center">
                                <div class="full">
                                    <img class="img-responsive" src="images/w2.png" alt="#" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- wish us -->

    <section id="cert-form" class="ftco-section contact-section">
        <div class="container">
            <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
                <h2 class="mb-4">Форма заявки</h2>
                <p>Для того, чтобы приобрести наш подарочный сертификат с открытой датой заезда, Вам необходимо заполнить ФИО, email, телефон и кол-во суток, на которые вы хотите приобрести данный сертификат</p>
            </div>
            <div class="row block-9 centered-text">
                <div class="col-md-12 order-md-last d-flex ftco-animate">
                    <form action="#" class="bg-light p-5 contact-form">
                        <div class="form-group">
                            <input type="text" class="form-control" id="fullName" placeholder="ФИО">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="mobileContact" placeholder="Номер телефона">
                        </div>
                        <div class="form-group">
                            <input type="number" min="2" class="form-control" id="daysCount" placeholder="Кол-во суток">
                        </div>
                        <div class="form-group">
                            <input disabled type="text" class="form-control" id="typeCert" placeholder="Тип" value="Подарочный сертификат">
                        </div>
                        <div class="form-group">
                            <p>Нажимая на кнопку, я соглашаюсь на
                                <a href="/policy" class="publicPolicy" style="text-decoration: underline;color: #999999;">обработку персональных данных</a>
                            </p>
                        </div>
                        <div class="form-group">
                            <button type="button" onclick="sendCert()" class="btn btn-primary py-3 px-5"><i class="ion-ios-send"></i> Отправить заявку</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section id="contactData" class="ftco-section ftco-no-pt contact-section">
        <div class="container">
            <div class="row justify-content-center pb-4">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <h2 class="mb-4">Контакты</h2>
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

    <div class="btn-back-to-top bg0-hov" id="myBtn">
      <span class="symbol-btn-back-to-top">
          <i class="fa fa-angle-double-up" aria-hidden="true"></i>
      </span>
    </div>
</main>

<footer class="ftco-footer bg-bottom" style="background-image: url(images/footer-bg.webp);">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Возникли вопросы?</h2>
                    <p>Звоните нам по указанным на сайте телефонам, пишите на почту и следите за новостями на официальных страницах соц. сетей</p>
                    <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                        <li class="ftco-animate"><a href="https://instagram.com/sonniyzaliv?igshid=1s213ld4n27vi" target="_blank"><span class="icon-instagram"></span></a></li>
                        <li class="ftco-animate"><a href="https://www.youtube.com/channel/UC3VGSE6WgQujUXpLhHTjH7A" target="_blank"><span class="icon-youtube"></span></a></li>
                        <li class="ftco-animate"><a href="https://wa.me/79811878002" target="_blank"><span class="icon-whatsapp"></span></a></li>
                        <li class="ftco-animate"><a href="https://www.avito.ru/sortavala/doma_dachi_kottedzhi/kottedzh_80_m_na_uchastke_125_sot._2154093436" target="_blank"><img style="width: inherit;margin: 13px 0;padding: 4px;" src="/icons/avito.svg"></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4 ml-md-5">
                    <h2 class="ftco-heading-2">Информация</h2>
                    <ul class="list-unstyled">
                        <li><a href="/policy" class="py-2 d-block">Политика конфиденциальности</a></li>
                        <li><a href="/agreement" class="py-2 d-block">Договор оферты</a></li>
                        <li><a href="/cert-gift" class="py-2 d-block">Подарочный сертификат</a></li>
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
                <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> Все права защищены | Сонный залив</p>
                <p><img src="images/pay.png" alt="Visa, MasterCard, МИР" title="Visa, MasterCard, МИР"></img></p>
                <p><a href="http://info.paymaster.ru/" target="_blank"><img src="/images/banners/paymaster.png" alt="PayMaster | Прием платежей"></a></p>
                <p><iframe src="https://yandex.ru/sprav/widget/rating-badge/222502182716" width="150" height="50" frameborder="0"></iframe></p>
            </div>
        </div>
    </div>
</footer>

<!-- LOADER -->
<div id="preloader">
    <div class="loader">
        <div class="box-loader"></div>
        <div class="box-loader"></div>
    </div>
</div><!-- end loader -->
<!-- END LOADER -->

<script src="js/jquery.min.js"></script>
<script src="js/jquery-migrate-3.0.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/jquery.waypoints.min.js"></script>
<script src="js/jquery.stellar.min.js"></script>

<!-- blockUI -->
<script src="js/jquery.blockUI.js"></script>

<script type="text/javascript" src="js/t-datepicker.js?v=5.2"></script>

<script src="js/swiper.js" type="text/javascript"></script>
<script src="js/swiper.min.js" type="text/javascript"></script>
<script src="js/swiper-custom.js" type="text/javascript"></script>

<script src="js/owl.carousel.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery.maskedinput@1.4.1/src/jquery.maskedinput.min.js" type="text/javascript"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/aos.js"></script>
<script src="js/jquery.animateNumber.min.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/bootstrap-datepicker-ru.js"></script>
<script src="js/scrollax.min.js"></script>
<script src="js/main.min.js?v=5.2"></script>

<script src="js/wow.min.js"></script>

<script>
    var dates = [];
    var oneDayRange = [];
</script>

<!-- other scripts -->
<script src="js/script.min.js?v=5.2"></script>

<script src="js/cbpFWTabs.js"></script>

<script>
    $(window).on('load', function() {
        $('.preloader').fadeOut();
        $('#preloader').delay(550).fadeOut('slow');
        $('body').delay(450).css({'overflow':'visible'});
    });
</script>
<!--<script src="//code-ya.jivosite.com/widget/vEPLFIAKHV" async></script>-->

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

<script type="application/ld+json">{
    "@context": "https://schema.org",
    "@type": "WebPage",
    "url": "https://sonniyzaliv.ru/cert-gift.php",
    "name": "Сонный Залив - приобрести подарочный сертификат на Новый Год. Подарок под Ёлку в виде отпуска в Карелии от двух суток",
    "description": "Сделайте подарок своим близким, родным или друзьям на Новый Год - купите подарочный сертификат Сонный Залив, на отдых в нашем гостевом доме с открытой датой заезда",
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
</body>
</html>