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

    $title = 'Новые отели Ленинградской области и Карелии обзор | Сонный Залив Сортавала';
    $descr = 'Отели в Лодейном Поле Ленинградской области, Отель Ламберг Сортавала (официальный сайт), Отель Точка на карте Карелия, Отели в Лодейном Поле, Новая Точка на карте в Лодейном Поле, Отель Петровский в Лодейном Поле, РГК Адмирал';
    $keywords = 'Отель Точка на карте Карелия, Отели в Лодейном Поле, Новая Точка на карте в Лодейном Поле, Отель Петровский в Лодейном Поле, РГК Адмирал, Отели в Лодейном Поле Ленинградской области, Отель Ламберг Сортавала (официальный сайт)';

    $iconBlock = getSubscribeIconBlock();
    $subsMenu = getSubscribeMenu();
    $footer = getFooter();
    $news = getNews(); //переменные Блог ленты
    $initNews = initNews($news);  //переменные Блог ленты

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

    <link rel="canonical" href="https://sonniyzaliv.ru/karelia-new-hotels"/>
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
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/articles/800back.webp');" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate pb-5 text-center" style="margin-top: 100px;">
              <h1 id="act-form" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Новые отели в Ленинградской области и Карелии</h1>
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
                    <h2 class="mb-4">Новые гостиницы в Ленинградской области</h2>
                    <p>Информация, которая будет Вам полезна при выборе места для отдыха</p>
                </div>
            </div>
                    <img class="col-md-12 ftco-animate" src="images/articles/800back.webp" alt="Отели в Ленинградской области">
            <div class="col-md-12 heading-section ftco-animate">
                <p class="color-black">Туристов в Ленинградскую область привлекает умеренный климат с мягкой зимой и нежарким летом. Здесь комфортно заниматься спортом, подолгу гулять по живописным паркам и набережным, знакомиться с достопримечательностями.<br>
                Туристы с удовольствием участвуют в традиционных обрядах, дегустируют местную кухню, знакомятся с фольклором, любуются водопадами, посещают известные архитектурные ансамбли.<br>
                Отчаянные и энергичные прыгают с парашютом, катаются на квадроциклах.<br>
Летом загородные отели организовывают конные прогулки, рафтинг, всевозможные водные развлечения, прокат велосипедов. Зимой популярны горнолыжные трассы.<br>
Новые загородные отели Ленинградской области предлагают все необходимые условия для комфортного проживания и отвечают самым строгим требованиям отдыхающих.<br>
</p>
                <?php echo $initNews; ?><!--вывод Блог ленты  -->
                   <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
                   <h2 class="mb-4">Отели в Лодейном Поле Ленинградской области</h2>
                    </div>
                   <div class="row d-flex pt-3 pb-5">
                    <img class="col-md-12 ftco-animate" src="images/articles/801.webp" alt="Точка на карте в Лодейном поле">
                </div>


                <p class="color-black">Лодейное Поле является популярным направлением в области туризма Карелии и Ленобласти. Наша подборка отелей поможет сориентироваться и забронировать наиболее подходящий вариант.
<br>            </p>
                <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
                   <h2 class="mb-4">Новая «Точка на карте» в Лодейном Поле 3*</h2>
                    </div>
            <div class="row d-flex pt-3 pb-5">
                    <img class="col-md-12 ftco-animate" src="images/articles/802.webp" alt="Точка на карте Лодейное поле ">
                </div>



 <p align="justify">Ленинградская область, Лодейное Поле, территория урочище Мирошкиничи, 2<br>
В 2022 году в Ленинградской области открылся новый отель «Точка на карте». Это уже  четвертый отель сети. Он расположен на песчаном берегу реки Свирь, куда не доходят  городской шум и суета. В любое время года в отеле Вас ждет спокойный размеренный отдых, созерцание красот природы.<br>
Отель построен по архитектурному решению, когда воздействие  на окружающую природу минимальное, современные здания из стекла и бетона органично вписаны в ландшафт. В большие панорамные окна заглядывают вековые сосны, вечерами хорошо виден закат на реке.<br>
●	«Точка на карте. Лодейное поле» предлагает гостям стандартные номера по 19 кв. м. с отдельным входом; семейные номера по 39 кв. м. с просторной кухней-гостиной. В номерах есть все необходимое для комфортного проживания и отдыха. <br>
●	Ресторан отеля – точка гастрономического удовольствия. Панорамные окна уютного ресторана сохраняют эффект близости к природе, а теплый камин создает атмосферу уюта, что особенно приятно морозной зимой. <br>
Локальные акценты в дизайне и особенности местной кухни добавляют в приятный отдых новые гастрономические впечатления.<br>
Туроператор «Игора Тур» уверен, что отель станет новой точкой притяжения нового тура «Энергия Ладоги». Концепцию сети отелей разработал финалист Всероссийского проекта «Открой свою Россию».<br>
●	Посещение достопримечательностей Карелии не составит труда, поблизости находятся  Александро-Свирский монастырь, домик-музей Петра Великого, Нижне-Свирский государственный природный заповедник, крепость Орешек и Староладожская крепость.

<br></p>

<div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
<h3 class="mb-4">Отель «Петровский» в Лодейном Поле</h3>
 </div>

<img class="col-md-12 ftco-animate" src="images/articles/803.webp" alt="Отель Петровский Лодейное поле">
<img class="col-md-12 ftco-animate" src="images/articles/804.webp" alt="Отель Петровский Лодейное">

<p class="color-black">Ленинградская область, Лодейное Поле, ул. Коммунаров 5 <br>
Приятный отель с уютными аккуратными номерами, теплой дружеской атмосферой и гостеприимными хозяевами расположен в Лодейном Поле, на берегу реки Свирь
До ближайшего аэропорта Пулково 235 км; ж/д станции Лодейное Поле 1 км<br>
Ближайшие достопримечательности:  300 м до Храма св. апостолов Петра и Павла,  2,8 км до Парка Свирской Победы <br>
●	Номерной фонд:  <br>
– 2-комнатный номер люкс с 1 двуспальной кроватью <br>
– Люкс «Для Влюбленных» <br>
– Номер комфорт с 2 односпальными кроватями <br>
– Номер комфорт с 1 двуспальной кроватью <br>
– 1-местный номер стандарт с 1 односпальной кроватью <br>
– 1-местный номер комфорт с 1 односпальной кроватью <br>
●	В каждом номере: интернет, холодильник, телевизор, фен. Предоставляются бесплатно халат, тапочки  <br>
●	Есть номера для некурящих <br>
●	Услуги и удобства: круглосуточная стойка регистрации, общая кухня, прачечная, отопление, камера хранения <br>
●	Питаться можно в ресторане или кафе. В стоимость включены завтраки (шведский стол) <br>
●	Есть бесплатная парковка <br>
Отзывы об отеле положительные. Гости отмечают, что гостиница в центре города, рядом парк и местная набережная, номера большие. Благодарят за чайник, микроволновку. условия  для самостоятельного приготовления пищи. Рейтинг 4,5 из 5. <br>

</p>




<div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
<h3 class="mb-4">РГК Адмирал</h3>
 </div>

<img class="col-md-12 ftco-animate" src="images/articles/805.webp" alt="РГК Адмирал">

        <p align="justify">Лодейное Поле, Карла Маркса д.1 дом 1 <br>
Размещение в самом центре, в 1265 метрах от ж/д вокзала, 130 км до ближайшего аэропорта.
Тихое, спокойное место для гостей, кто ищет бюджетный вариант размещения на одну ночь. <br>
Гостиница предлагает гостям номера: <br>
– Бюджетный трехместный номер <br>
– Общий 4-местный номер для мужчин и женщин <br>
– Общий номер для мужчин (4 спальных места) <br>
– Дом с двумя спальнями (возможно размещение до 7 человек) <br>
●	К услугам гостей семейные номера, ресторан, бар, общий лаундж и бесплатный Wi-Fi. <br>
Меню в гостинице заказное, предлагаются блюда национальной и европейской кухни. Предусмотрено детское меню. Бар работает круглосуточно.
Предоставляется общая комната отдыха с просмотром кинофильмов, настольными играми. Организуются вечера с диджеем. Рекомендуются пешие проулки на набережную реки. <br>
●	Парковка возле магазина, за дополнительную плату можно воспользоваться частной парковкой. <br>
●	В числе удобств каждого номера платяной шкаф и чайник. <br>
●	Ежедневно в хостеле сервируют завтрак по меню. <br>
●	Бесплатный Wi-Fi


</p>

 <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
<h3 class="mb-4">Отель Ламберг Сортавала (официальный сайт)</h3>
 </div>
  <img class="col-md-12 ftco-animate" src="images/articles/806.webp" alt="Ламберг Сортавала">


<p align="justify">р. Карелия, г. Сортавала, поселок Ламберг 44<br>
Отель Ламберг предлагает отдых в красивейшем месте, вдали от шумных городов, на берегу залива Токкарлахти. Вырвавшись из душного города, Вы попадаете в абсолютно другой мир, наполненный гармонией, спокойствием и умиротворением. База отдыха уютно расположилась на берегу живописного солнечного залива между скалами.<br>
●	К услугам гостей 14 комфортабельных благоустроенных коттеджа: семь одноэтажных, два двухэтажных, пять с мансардами. <br>
– Первый большой коттедж — это минигостиница со стандартными номерами на двоих или семейными, номером-люкс. В каждом номере есть балкон, санузел, душевая кабина. Номера оборудованы теплыми полами.<br>
– Остальные коттеджи, одноэтажные и двухэтажные, на берегу залива или у самой кромки леса, рассчитаны на различное количество проживающих. Отдельные коттеджи оборудованы кухней. Есть небольшие уютные домики для романтических путешествий или для семейного уикенда, а также на 5-6 гостей. <br>
Стоимость проживания в гостинице – от 4 800 до 8 000 р, в высокий сезон – от 8 00 до 11 800 р; <br>
аренда коттеджа – от 5 800 до 28 000 р (в сутки), в высокий сезон – от 11 800 до 36 000 р. (Взимается оплата за доп. место, за размещение животных)<br>
●	База предлагает разнообразный досуг:  рыбалку с арендой снаряжения, прокат моторных и весельных лодок, сафари на снегоходах зимой и туры на квадроциклах летом, прокат санборда. <br>
●	Есть возможность взять экскурсию и посетить исторические места, насладиться конными  прогулками, устроить пикник у озера. <br>
●	Вода, лес, плавучая баня – все рядом. СПА-комплекс имеет финскую сауну, турецкую парную, русскую баню, купель, ванну с гидромассажем и зону отдыха.<br>
●	Завтраки включены в цену аренды. <br>
●	На территории комплекса к услугам гостей ресторан. Большой уютный каминный зал на 50 человек, открытая мансарда на 25 человек. Есть летняя терраса, где приятно отдохнуть и полюбоваться видом, открывающимся на залив. Ресторан славится карело-финской кухней и карельской выпечкой. Вам предложат широкий выбор деликатесов из экологически чистых продуктов. По Вашему желанию организуют доставку Вашего заказа в коттеджи.<br>
●	Дополнительные услуги: фотограф, бильярд, прогулки на 3-местном катере, поездка на остров Валаам.<br>
Рейтинг клуба - 5 из 5.<br>

</p>


 <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
<h2 class="mb-4">Отель Точка на карте Карелия</h2>
 </div>
  <img class="col-md-12 ftco-animate" src="images/articles/807.webp" alt="Точка на карте в Карелии">
<p align="justify">Сеть отелей «Точка на карте» – это размеренный отдых вдали от городской суеты в Карелии и Ленинградской области. Ничто не будет отвлекать вас от единения с природой. Хвойный лес в сочетании с уникальной архитектурой и яркими впечатлениями понравится каждому. Предлагаются номера в отелях и аренда коттеджей в Приозерске, Сортавале, Видлие, Лодейном поле.
</p>
 <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
<h3 class="mb-4">Точка на карте Сортавала</h3>
 </div>
  <img class="col-md-12 ftco-animate" src="images/articles/808.webp" alt="Точка на карте в Сортавала">
<p align="justify">Республика Карелия, Сортавальский район, Кааламское сельское поселение, посёлок Рюттю, <br>
Отель очень удобно расположен в прекрасном живописном месте. Рядом озеро, лес.<br>
Здесь созданы все условия для комфортного проживания: есть кондиционер, холодильник, телевизор, фен, утюг, чай/кофе в номерах, посуда, чайник, микроволновая печь, посудомойка, кухонная плита, кофеварка, сейф, отопление, терраса.<br>
●	К услугам гостей: круглосуточная стойка регистрации, камера хранения, парковка, можно заказать трансфер. У каждого гостя доступ в интернет.<br>
●	Номера располагаются в 3 корпусах на берегу лесного озера Пюёрялампи. Из каждого открывается панорамный вид.<br>
– Номер «Стандарт» на двоих с одним доп. местом (20 м2)<br>
– Номер для маломобильных групп населения (2 основных места)<br>
●	Есть панорамная сауна с видом на озеро,  беседки для барбекю.<br>
●	Завтрак в одноименном кафе-бистро, до которого можно прогуляться пешком по живописной эко-тропе.<br>
●	На въезде в отель есть пункт центра активного отдыха «Терра Нордика», где можно выбрать активности по душе: прокат велосипеда, лодки, SUP-бордов, каяков, снегоходов, квадроциклов.<br>
Отдыхающие отмечают недостатки: нет ресторана, питание в близлежащем кафе с очень высокими ценами. Рейтинг 5 из 5.<br>

 </p>
 <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
<h3 class="mb-4">Отель «Точка на карте» Видлица</h3>
 </div>
  <img class="col-md-12 ftco-animate" src="images/articles/809.webp" alt="Точка на карте Видлица">
  <img class="col-md-12 ftco-animate" src="images/articles/810.webp" alt="Точка на карте с. Видлица">

<p align="justify">Республика Карелия, Олонецкий район, с. Видлица<br>
Отель сети «Точка на карте» в Олонецком районе Карелии демонстрирует бережное отношение к экосистеме. Номера построены по модульной технологии.<br>
Сосновый лес, протяженный песчаный пляж и само Ладожское озеро, крупнейшее пресноводное озеро в Европе, по масштабу и характеру родственное морю – главный козырь базы отдыха. Отель органично встроен в природный ландшафт соснового бора.
Здесь будет комфортно гостям, которых привлекает красота природы, живописное место вдали от городской суеты и шума. <br>
●	Предлагаются 15 благоустроенных номеров «Студия» с отдельным входом, красивым дизайном помещений, стоящие друг от друга на почтительном расстоянии. <br>
- Из них 7 номеров расположены на первой береговой линии, максимально близко к берегу Ладожского озера и 8 номеров – на второй береговой линии, в лесной зоне.<br>
– Каждый номер сконфигурирован из 2 модулей, вмещающих до 4 гостей, куда входит  обширная терраса. Обстановка погружает в атмосферу загородной жизни, чему способствует мягкое освещение, панорамные окна и близость природы.<br>
●	На территории действует кафе, зоны созерцания. Питание согласно тарифу «полный пансион»)В пешей доступности – песчаный берег Ладожского озера и лесное озеро (2 км от отеля)<br>
●	Есть Wi-Fi<br>
●	Работает пункт проката спортивного инвентаря, принадлежностей для рыбалки (спиннинг, катушка), палок для скандинавской ходьбы, бадминтона, сап-сёрфа, каяков, квадроциклов, зимой ватрушек, санок.<br>
●	Предлагаются туры на квадроциклах «Ладожские барханы» (10 км,  продолжительность 1 час); «Устье Тулоксы» (18 км., продолжительность 2 часа) — живописный маршрут по сосновому бору с элементами погружения в историю Карелии, с панорамным видом на место впадения реки Тулокса в Ладожское озеро.<br>

<br></p>



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
    "url": "https://sonniyzaliv.ru/karelia-new-hotels",
    "name": "Новые отели Ленинградской области и Карелии обзор | Сонный Залив Сортавала",
    "description": "Отели в Лодейном Поле Ленинградской области, Отель Ламберг Сортавала (официальный сайт), Отель Точка на карте Карелия, Отели в Лодейном Поле, Новая Точка на карте в Лодейном Поле, Отель Петровский в Лодейном Поле, РГК Адмирал",
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
