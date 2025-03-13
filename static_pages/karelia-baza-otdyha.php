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

    $title = 'Базы отдыха в Карелии | Сонный Залив Сортавала';
    $descr = 'Базы отдыха в Сортавала, База отдыха в Карелии с чаном и баней, База отдыха в Сортавале на берегу озера,	База отдыха Ламберг Карелия (официальный сайт),	База отдыха Остров Карелия,	База отдыха Черные Камни в Карелии (официальный сайт цены),	Базы отдыха в Сортавале, Карелия Базы отдыха в Сортавале на берегу озера (недорого)';
    $keywords = 'база отдыха Сортавала, база отдыха Карелия, база отдыха на берегу, база отдыха, База отдыха в Карелии с чаном и баней, База отдыха в Сортавале на берегу озера,	База отдыха Ламберг Карелия (официальный сайт),	База отдыха Остров Карелия';

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

    <link rel="canonical" href="https://sonniyzaliv.ru/karelia-baza-otdyha"/>
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
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/articles/back1.webp');" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate pb-5 text-center" style="margin-top: 100px;">
              <h1 id="act-form" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Базы отдыха в Карелии</h1>
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
                    <h2 class="mb-4"> Базы отдыха в Карелии</h2>
                    <p>Информация, которая будет Вам полезна при выборе места для отдыха</p>
                </div>
            </div>
            <div class="col-md-12 heading-section ftco-animate">
                <p class="color-black">Когда ищешь аренду домика в Карелии, всегда задаешься вопросом, что же выбрать: уютный,
                    отдельностоящий гостевой дом в Сортавала или остановиться на небольшой базе?</p>
                <div class="row d-flex pt-3 pb-5">
                    <img class="col-md-12 ftco-animate" src="images/houses/chernika-v-sonnom-zalive/leto/15.webp" alt="Гостевой дом Черника в заливе">
                </div>
                <p class="color-black">Небольшие базы отдыха у нас располагаются у воды, и рассмотреть аренду домика следует в таких местах.
                    Отдых в Карелии должен ассоциироваться с берегом Ладожского озера и уютным, теплым домом.</p>
                <p class="color-black">На фотографии выше - «Черника в Сонном заливе». Три новых дома в скандинавском стиле встретят вас
                    в шикарном месте на большом острове Риеккалансаари в 5 километрах от центра города Сортавала</p>
                    </div>
                <?php echo $initNews; ?><!--вывод Блог ленты  -->
                 <p class="color-black">
                  <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
                   <h2 class="mb-4"> Карельские базы отдыха на берегу</h2>
                    </div>

Карелия – республика с многочисленными голубыми озерами среди первозданных лесов. Особенно их много, крупных и совсем крошечных, на севере, в бассейне Белого моря. Умеренный климат – теплые зимы и нежаркое лето, красота природы, озера, богатые рыбой, базы отдыха вдали от городской суеты и промышленных центров притягивают сюда миллионы туристов. Крупные комфортабельные отели, маленькие базы отдыха без особого изыска – любой вид отдыха востребован и имеет своих почитателей.
<div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
<h2 class="mb-4">База отдыха в Карелии с чаном и баней</h2>
 </div>
 <div class="row d-flex pt-3 pb-5">
                    <img class="col-md-12 ftco-animate" src="images/articles/101.webp" alt="База отдыха с чаном">
                </div>
<p class="color-black">Сказочная Карелия начинается с банного чана. Это чудо сравнивают с геотермальной ванной, его еще называют «молодильным чаном». Это самый шикарный вид отдыха, который предлагает Карелия.</p>

<p class="color-black">Сибирский банный чан совмещает в себе возможность охладиться и погреться, попариться. Он похож на парилку в русской бане, но имеет некоторые отличия и преимущества.
Тепло в чане распределяется снизу вверх, прогревается равномерно, при этом сохраняя голову на свежем воздухе.
Процедура укрепляет иммунитет, восстанавливает силы, повышает настроение.</p>

<p class="color-black">Одна из таких купелей установлена под открытым небом на террасе коттеджа </p>
<div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
<h2 class="mb-4"> "Лунный залив"</h2>

<a href="https://sonniyzaliv.ru/lunniy-zaliv">«Посмотреть подробнее»</a> </p>.

                    <img class="col-md-12 ftco-animate" src="images/articles/106.webp" alt="Лунный залив">

                Вода в купели нагревается до 35 градусов. Жарко будет даже в мороз.

"Лунный залив" предлагает в аренду благоустроенный коттедж площадью 42 м2 с двуспальной кроватью.

Аренда номера на двоих без питания – от 4500 рублей в сутки.

Собственная ванная комната, бесплатный Wi-fi, кондиционер, спутниковое телевидение, терраса. В ванной комнате душевая кабина, стиральная машина. Есть электроплита и посуда, принадлежности для барбекю.

<h2 class="mb-4">База отдыха «Сонный залив» в Сортавале </h2>

<p align="justify">тоже предлагает сауну с купелью. Дома расположены на берегу озера в Ладожских шхерах, в 10 минутах от туристического центра Сортавала.

Аренда номера для 4 гостей без питания – 8 830 р. в сутки.
Сауна и купель с фильтрацией оплачиваются отдельно – от 2 500 р.

Есть причал, пирс и пристань, пляж, предлагается аренд лодки. Есть возможность взять гида по Валааму, прогулку на катере по Ладожским шхерам, на остров Валаам.

Едут сюда для смены обстановки, перезагрузки, снятия усталости.

Комфортабельный коттедж с удобствами, рыбалка прямо у дома, дровяная баня с террасой, банным чаном премиум класса – отличный отдых от городской суеты. Лежать в горячей воде под открытым небом, ловить снежинки, любоваться на звезды – что может быть лучше для души и тела.</p>

<h2 class="mb-4">База отдыха в Сортавале на берегу озера <br>
База отдыха «Черная Жемчужина» </h2>

                    <img class="col-md-12 ftco-animate" src="images/articles/103.webp" alt="Черная жемчужина">
              <p align="justify">  расположена в поселке Токкарлахти Сортавальского городского поселения Карелии. Гостям предлагаются уютные коттеджи, оснащенные всем необходимым для комфорта. Домики с панорамными окнами на залив стоят на первой линии. Отдыхающие отмечают изумительно красивые закаты, бездонное звездное небо, вековые сосны, тишину.

На базе можно арендовать уютный домик на берегу озера:

домик 45 м2 для двоих гостей – 3 200 в сутки;
дом 80 м2 с двумя спальнями для четверых – 5 300 р;
В наличии подарочные сертификаты по 5 000 р. (дата заезда открытая);
Внутри домиков приятный минималистический интерьер, посудомойка, стиральная машина. У каждого дома терраса. Есть Wi-fi.

Доступно бронирование, завтраки в ресторане «Ламберг» (100 м от дома). Работает доставка продуктов из магазина «Лента». Есть место для шашлыка, решетка, шампуры прилагаются.

Можно арендовать лодку по приемлемой цене. Рядом клуб, баня и ресторан. Можно сходить на экскурсию в Музей Северного Приладожья.

Бесплатная парковка, до Сортавала ходит Яндекс-такси.

Созданы условия для отдыха с детьми. В домиках тепло, ванные комнаты оборудованы полотенцесушителем. На кухне много всякой посуды, стульчик для кормления и горшок. Есть соль, сахар, крупы, макароны, чай, кофе. Микроволновка, тостер, кофеварка, посудомойка. Стиральная машина, средство для стирки, гель для душа – мелочи, но приятно, заезжай и живи. Рейтинг 5 из 5.</p>

<h2 class="mb-4">База отдыха Ламберг Карелия (официальный сайт)</h2>

                    <img class="col-md-12 ftco-animate" src="images/articles/104.webp" alt="Ламберг">

 <p align="justify">Здесь найдете небольшой комплекс бревенчатых коттеджей с уютным отелем из 12 номеров. База отдыха 2010 г. постройки, до г. Сортавала – 5,6 км, международного аэропорта Бесовец – 246 км.

Отель расположен на первой береговой линии Ладожского озера. Для отдыхающих пирс, песчаный пляж, правда, необорудованный.

На базе имеются конференц-зал, ресторан с баром, банкетный зал, кафе, магазин сувениров, джакузи, сауна, паровая баня, парковка. Созданы все условия для семейного отдыха с детьми, можно заезжать с домашними животными.

Для развлечений предлагается рыбалка, охота, катание на снегоходах, квадроциклах, дартс, экскурсии. Есть детская площадка, настольный теннис, бильярд, аренда велосипедов, прокат горнолыжного снаряжения, аренда яхт и катеров.</p>
<p>
Стандартные номера – от 6 400 р за ночь.<br>
Ванные комнаты с косметическими принадлежностями, детские кроватки – бесплатно.<br>
Катание на снегоходах – от 2000 р.<br>
Катание на квадроциклах – 3 600 р.<br>
Летняя рыбалка – от 3 000 р.<br>
Охота – от 15 000 р. </p>
 <p align="justify">Отличное место для отдыха в любое время года. Номера отапливаются, во многих полы с подогревом, санузел, камин, телевизор, холодильник, кухонный уголок с чайником, мини-баром, сейф в каждом номере. Очень красивое уединенное место, присутствует национальный колорит. Оценка – 5 из 5 (480 отзывов).</p>

<h2 class="mb-4">База отдыха Остров Карелия</h2>

<img class="col-md-12 ftco-animate" src="images/articles/107.webp" alt="База Остров">

 <p align="justify">Туристический комплекс расположен на Острове Риеккалансаари под горой Ворсунмяки, прямо на побережье Ладожского озера, окружен хвойными лесами. Здесь начинаются Шхеры. Первая линия домов с мансардными окнами позволяет наслаждаться прекрасными закатами и звездным небом.
</p>
2-этажный домик мансардного типа стоит от 5100 до 14800 р;<br>
Столько же стоит квартира «В гостях у бабы Поли» на ул. Карельская 50;<br>
Коттедж (Дом художника) – 14 800 руб. без питания.<br>
Возможно проживание с животными, есть площадки для пикника (одна на два домика), интернет. Дома отапливаются, оборудованы теплыми полами, камином. Есть отдельный санузел, душ, кухонный уголок, холодильник, плита. Доставка еды по заказу.

В наличии берег Ладоги, оздоровительные процедуры.<br>

Из развлечений предлагается прокат квадроциклов, снегоходов, лодок, оборудование для водных видов спорта, снорклинг, виндсерфинг, йога, бадминтон, ферма животных. Можно заняться рыбалкой, покататься на лыжах, лошадях.

Парковка бесплатная. Сосновый лес для прогулок. Можно заказать трансфер из ж/д вокзала, автовокзала.

База подходит для семейного отдыха. Но много отрицательных отзывов. В основном жалуются на отсутствие сервиса, на несоответствие ожидаемого с реальными условиями проживания. </p>

<h2 class="mb-4">База отдыха Черные Камни в Карелии (официальный сайт цены)</h2>
  <img class="col-md-12 ftco-animate" src="images/articles/105.webp" alt="Черные камни">
 <p align="justify">База на берегу озера Янисъярви (п. Киркколахти) среди завораживающих лесов отличается ухоженной территорией. Озеро образовалось на месте падения метеорита. <br>К услугам гостей:

27 коттеджей комфорт-класса у озера;
двухместные номера гостиницы «Атлантика» (территория Карельского зоопарка и берег озера);
панорамный ресторан с карельской кухней;
120 метров до Карельского зоопарка, 12 км до Горного парка «Рускеала»,
банные комплексы, бассейн, услуги массажа;<br>
однокомнатный номер гостиницы «Атлантика» на двоих – 10 тыс. в сутки; номер делюкс – 13 тыс.; люкс – 15 тыс;<br>
номер стандарт Экогостиницы можно забронировать за 7 800 р в сутки; семейный – 15 440 р; семейный люкс – 17 500 р;<br>
коттеджи: шестиместный – от 32 000 р; делюкс – 38 400 р; 8-местный – 43 600.<br>
6-местный дом рыбака – 44 200;<br> дом охотника – 51 200;<br> коттедж на воде «Михаил Светлофф» – 54 000; <br>10-местный с камином – 59 100, <br>с камином и сауной – 59 100; <br>12-местный – 67 200; <br>делюкс – 93 600 р; <br>10-местный коттедж плюс СПА – 93 600, <br>14-местный люкс – 107 600 р.<br>

Условия предлагаются на разный вкус и кошелек. Баня и сауна, рыбалка и охота, экскурсии и вылазки в лес, отдых вдвоем, с детьми и большой компанией – разнообразие отдыха впечатляет.</p>

<h2 class="mb-4">Базы отдыха в Сортавале, Карелия
База отдыха «Арсенал» </h2>(п. Вяртсиля, 6 км от автодороги на Суйстамо) расположена в 6 км от центра Сортавале, 150 м от озера Янисъярви. Кругом первозданная северная природа с вековыми лесами, 5 км до границы с Финляндией

 <p align="justify">Для отдыха предлагаются деревянные домики и коттеджи:<br>

Трехместный однокомнатный номер – от 5 000 р (с завтраком);<br>
3-комнатный номер на 4 чел. – от 7 500 р;<br>
3-комнатный люкс с камином и сауной – 5 300 р.<br>
В номере телевизор, ванная комната с современной сантехникой, полноценная кухня, оборудованная бытовой техникой, посудой, обеденным столом. Теплый пол, горячая вода создают комфорт и уют. Есть зона барбекю с беседкой, мангалом, кострищем, бесплатными дровами.

Можно посетить баню с парной, полотенца и простыни выдаются.

Кругом лес, возможна аренда снегоходов. Заядлые рыбаки будут довольны уловом, охотники – дичью, любители тихой охоты насладятся обилием грибов и ягод.

Есть все необходимое для отдыха: пирс, спуск лодок, оборудованные места для безопасного купания, водных развлечений, аренда велосипедов для прогулок вдоль озера.

Можно купить экскурсии на Валаам и Рускеальский мраморный каньон

Из плюсов отмечают наличие завтраков, из минусов – плохая звукоизоляция домиков. Рейтинг 9,8 из 10. </p>

<h2 class="mb-4">Базы отдыха в Сортавале на берегу озера (недорого)</h2>
 <p align="justify">В окрестностях Сортавала немало недорогих баз отдыха. Обычно они расположены у маленьких природных водоемов, каких в Карелии тысячи, запрятанных среди первозданных лесов. Предлагаются домики для тихого семейного отдыха вдали от городского шума.

База Аласари (Кааламо, 1,3 км. от Петрозаводской губы) расположена на берегу озера Сиесманъярви, вблизи нет населенных пунктов. Это райское место для рыбаков, мечтающих о богатом улове карельской щуки, окуня, леща.<br>

Предлагаются домики по 3 000 – 3 400 р. за ночь (без питания).<br>

Уютные домики стоят у берега среди берез. Есть удобная мебель, необходимое оборудование для приготовления пищи, ванная комната, душ, работает телевизор, холодильник.

Пляж, лодки предоставляются бесплатно. Доступны пешие прогулки, на велосипедах, в окрестных лесах поражает обилие белых грибов, разных ягод.

Вечером приятно посидеть у костра, полюбоваться белыми ночами, приготовить рыбу.

Интересно посетить Мраморный каньон, водопады, остров Валаам. Для любителей активного отдыха организуются сплавы по горным рекам, охота.

От Сортавала заказывается трансфер – 1 300 р машина на 4 чел.

От ж/д станции Кааламо тоже трансфер возможен.</p>

Туризм на северо-западе России развивается. Карельские базы отдыха на берегу прекрасных озер, гостевые дома, экскурсии по историческим местам и достопримечательностям на любой вкус и кошелек ждут гостей в новом сезоне. </p>
            </div>
            <div class="row d-flex">
                <div class="conf-btn" style="padding-top: 5px;"><a href="#" <?/*id="reserve1" */?> data-tl-booking-open="true" class="btn btn-primary py-3 px-4 ftco-animate"><i class="ion-ios-calendar"></i> Забронировать</a></div>
            </div>

            <div class="col-md-12 heading-section ftco-animate pt-5">
                <p class="color-black" align="center">Всегда есть выбор где остановиться, чтобы отдохнуть в Карелии. Останавливайтесь в наших домах.</p>
            </div>
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
    "url": "https://sonniyzaliv.ru/karelia-baza-otdyha",
    "name": "Базы отдыха в Карелии | Сонный Залив Сортавала",
    "description": "Базы отдыха в Сортавала, База отдыха в Карелии с чаном и баней, База отдыха в Сортавале на берегу озера,\tБаза отдыха Ламберг Карелия (официальный сайт),\tБаза отдыха Остров Карелия,\tБаза отдыха Черные Камни в Карелии (официальный сайт цены),\tБазы отдыха в Сортавале, Карелия Базы отдыха в Сортавале на берегу озера (недорого)",
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
