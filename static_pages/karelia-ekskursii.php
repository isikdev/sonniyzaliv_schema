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

    $title = 'Экскурсии Сортавала Карелия 2024 маршруты | Сонный Залив Сортавала';
    $descr = 'Экскурсии в Сортавала, Достопримечательности Сортавалы, Замок Кексхольм, Парк "Рускеала, Музей Айянке, Гора Кивач ,Мраморный карьер "Кивач", Хикинг по национальному парку Репошарви, Город Кондопога, Озеро Лососинное, Водопад Кижи,Экскурсии в Сортавала, Музей карельской флоры и фауны, Река Шунда, Парк "Горный парк": ';
    $keywords = 'Достопримечательности Сортавалы, Замок Кексхольм, Парк "Рускеала, Музей Айянке, Гора Кивач ,Мраморный карьер "Кивач", Хикинг по национальному парку Репошарви, Город Кондопога, Водопад Кижи, Музей карельской флоры и фауны, Река Шунда, Парк Горный парк, Озеро Лососинное';

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
    
    <style>
a:link {
  color: bold black;
  background-color: transparent;
  text-decoration: none;
}
a:visited {
  color: blue;
  background-color: transparent;
  text-decoration: none;
}
a:hover {
  color: red;
  background-color: transparent;
  text-decoration: underline;
}
a:active {
  color: yellow;
  background-color: transparent;
  text-decoration: underline;
}
</style>


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
                    <li class="menu-item"><a href="#information">Информация</a></li>
                    <li class="menu-item"><a href="#services">Полезные ресурсы</a></li>
                </ul>
            </nav>
        </div>
    </section>
</header>
<!-- END nav -->
<main role="main">
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/articles/500.webp');" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate pb-5 text-center" style="margin-top: 100px;">
              <h1 id="act-form" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Экскурсии в Сортавала и Карелии</h1>
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
    <section id="information" style="padding-bottom: 0" class="ftco-section services-section">
        
        <div class="container">
            <div class="row d-flex">
                <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
                    <h2 class="mb-4">Погружение в Историю и Природу: Экскурсии по достопримечательностям Сортавала</h2>
                    <p>Информация, которая будет Вам полезна при выборе места для отдыха</p>
                </div>
            </div>
                    <img class="col-md-12 ftco-animate" src="images/articles/501.webp" alt="Достопримечательности Сортавалы">    
                                  
            <div class="col-md-12 heading-section ftco-animate">
                <p class="color-black">Добро пожаловать в Сортавалу - жемчужину северной Карелии, где сливаются культурное наследие и величие природы. Здесь каждый уголок пропитан историей, каждый пейзаж поражает своим великолепием. Готовы ли вы отправиться в увлекательное путешествие по этому уникальному региону? Давайте вместе исследуем прелесть Сортавалы!
</p>
                
                   <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate"> 
                   <h2 class="mb-4">Преимущества нашего ресурса</h2>
                    </div>
                   <div class="row d-flex pt-3 pb-5">
 
                </div>
                
                
                <p class="color-black">Индивидуальный подход: Мы предлагаем экскурсии, разработанные с учетом ваших интересов и предпочтений. Вместе с опытными гидами вы сможете создать свой неповторимый маршрут.<br>
Качество и надежность: Наши экскурсии отличаются высоким уровнем организации и безопасности. Мы гарантируем вам комфортное и запоминающееся путешествие.<br>
Гибкий выбор: У нас вы найдете разнообразие экскурсий - от однодневных туров до индивидуальных путешествий, позволяющих вам полностью погрузиться в атмосферу региона.<br>

<br>            </p>
                <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate"> 
                   <h2 class="mb-4">Достопримечательности Сортавалы</h2>
                    </div>
            <div class="row d-flex pt-3 pb-5">
               <img class="col-md-12 ftco-animate" src="images/articles/502.webp" alt="Замок Кексхольм">   

                </div>       
                  
                  
                  
 <p align="justify">Замок Кексхольм: Исторический замок, являющийся символом города и одним из важнейших архитектурных памятников региона.<br>
Парк "Рускеала": Уникальный мраморный карьер, превратившийся в живописный природный парк с кристально чистыми озерами и водопадами.<br>
Острова Ладожского озера: Посетите красивые острова Ладожского озера, такие как Валаам и Коневец, известные своими природными красотами и древней историей.<br>
Бронирование сейчас: Не упустите шанс отправиться в увлекательное путешествие по Сортавале уже сегодня! Забронируйте экскурсию прямо сейчас и готовьтесь к незабываемым впечатлениям. <br>

<br></p>

<div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate"> 
<h3 class="mb-4">Интересные места</h3>
 </div>
                           <img class="col-md-12 ftco-animate" src="images/articles/508.webp" alt="Озеро Лососинное">   
                            <img class="col-md-12 ftco-animate" src="images/articles/509.webp" alt="Водопад Кижи">   
 


<p class="color-black">Музей Айянке: Уникальный музей под открытым небом, погружающий вас в культуру и традиции карельского народа. <br>
Гора Кивач: Самая высокая гора в Карелии, известная своими живописными видами и водопадом. <br>
Мраморный карьер "Кивач": Еще один мраморный карьер, поражающий своей красотой и разнообразием красок. <br>
Хикинг по национальному парку Репошарви: Насладитесь пешие прогулками по красивым тропам национального парка и его многочисленными озерами и водопадами. <br>
Поселение Валдайских староверов: Посетите этот уникальный музей под открытым небом и узнайте о жизни и традициях староверов. <br>
Отправляйтесь в приключение: Погрузитесь в мир истории и природы вместе с нами! Откройте для себя удивительные достопримечательности Сортавалы и создайте яркие воспоминания. <br>
                      <img class="col-md-12 ftco-animate" src="images/articles/503.webp" alt="Парк Рускеала">   

</p>




<div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate"> 
<h3 class="mb-4">Проверенные маршруты возле Сортавала</h3>
 </div>
                       <img class="col-md-12 ftco-animate" src="images/articles/504.webp" alt="Гора Кивач ">   



        <p align="justify">Город Кондопога: Исторический город с прекрасными парками и набережной, идеальное место для прогулок и отдыха.<br>
Озеро Лососинное: Красивое озеро, окруженное лесами, идеальное место для пикника или рыбалки.<br>
Водопад Кижи: Посетите этот потрясающий водопад на острове Кижи, который входит в список объектов Всемирного наследия ЮНЕСКО.<br>
Город Приозерск: Исторический город с прекрасными парками и набережной, идеальное место для прогулок и отдыха.<br>
Музей карельской флоры и фауны: Погрузитесь в удивительный мир природы Карелии, посетив этот уникальный музей.<br>
Река Шунда: Прекрасная река для каякинга или спокойной прогулки на лодке, окруженная красивыми лесами и скалами.<br>
Эти достопримечательности ожидают вас всего в нескольких часах езды от Сортавалы, готовые подарить вам незабываемые впечатления и вдохновение!<br>
Создайте свой маршрут: Спланируйте свое путешествие с нами и воплотите в жизнь свои самые заветные мечты о незабываемом отдыхе в Сортавале.<br>

</p>
                        <img class="col-md-12 ftco-animate" src="images/articles/505.webp" alt="Мраморный карьер Кивач">   

 <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate"> 
<h3 class="mb-4">Маршрут можно заказать заранее</h3>
 </div>
 
                         <img class="col-md-12 ftco-animate" src="images/articles/506.webp" alt="Хикинг по национальному парку Репошарви">   
 

<p align="justify">Сортавала - это место, где история сливается с природой, создавая уникальную атмосферу великолепия и загадки. Приглашаем вас отправиться в этот увлекательный мир вместе с нами и открыть для себя его множество чудес и секретов. Путешествуйте с нами и окунитесь в волшебство Сортавалы уже сегодня!

</p>
                          <img class="col-md-12 ftco-animate" src="images/articles/507.webp" alt="Город Кондопога">   

 


                </div>
                <p class="color-black">Выбрать даты для аренды индивидуального дома можно по кнопке ниже</p>
            </div>
            <div class="row d-flex">
                <div class="conf-btn" style="padding-top: 5px;"><a href="#" <?/*id="reserve1" */?> data-tl-booking-open="true" class="btn btn-primary py-3 px-4 ftco-animate"><i class="ion-ios-calendar"></i> Забронировать</a></div>
        
         
            
        </div>
    </section>
    <section class="ftco-section module bg-light" id="services">
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
    "url": "https://sonniyzaliv.ru/karelia-ekskursii.php",
    "name": "Экскурсии Сортавала Карелия 2024 маршруты | Сонный Залив Сортавала",
    "description": "Экскурсии в Сортавала, Достопримечательности Сортавалы, Замок Кексхольм, Парк ",
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