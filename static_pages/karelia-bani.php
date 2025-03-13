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

    $title = 'Бани и комплексы в Карелии | Сонный Залив';
    $descr = 'Карельские бани и комплексы, Аренда бани в Карелии на берегу озера, Аренда бани Сортавала, Бани Карелия,Банный комплекс Карелия, Баня на нашей базе в Карелии';
    $keywords = 'Карельские бани и комплексы, Аренда бани в Карелии на берегу озера, Аренда бани Сортавала, Бани Карелия,Банный комплекс Карелия, Баня на нашей базе в Карелии';

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

    <link rel="canonical" href="https://sonniyzaliv.ru/karelia-bani"/>
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
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/articles/201.webp');" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate pb-5 text-center" style="margin-top: 100px;">
              <h1 id="act-form" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Карельские бани и комплексы</h1>
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
                    <h2 class="mb-4"> Карельские бани и комплексы</h2>
                    <p>Информация, которая будет Вам полезна при выборе места для отдыха</p>
                </div>
            </div>
        <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
                <p class="color-black">Когда приехали отдохнуть в Карелию, всегда можно разнообразить отдых, выбрать для здоровья теплую уютную баню</p>
                </div>
                                <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">

<h3 class="mb-4">Баня на Красной горке 22 в Сортавала</h3>
 </div>
 <p align="justify">Новая баня с заслуженным высоким рейтингом 5.0 на Яндексе. Парная с нефритовыми камнями, зона отдыха с мягким диваном, теплый бассейн с видом на закат - хороший вариант для вечернего отдыха. Баня работает круглый год. Стоимость 5000 за два часа для 4 гостей.</p>
                    <img class="col-md-12 ftco-animate" src="images/articles/202.webp" alt="Баня Красная горка 22 Сортавала"data-stellar-background-ratio="0.9"> </br></br></br>
               <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
               <?php echo $initNews; ?><!--вывод Блог ленты  -->
            <h3 class="mb-4">Баня в Карелии на берегу озера</h3>
          </div>
 <p align="justify">Жарко натопленные бани с парилкой являются в Карелии довольно востребованным видом отдыха. Популярны и небольшие бревенчатые баньки, отапливаемые березовыми поленьями, выстроенные на берегу озера с чистой прозрачной водой, и большие банные комплексы с сауной, парилкой и комнатами для отдыха. Особый кайф, напарившись, окунуться в прохладное озеро.
Попариться в русской бане и окунуться в прохладные воды Ладоги можно в отеле «Кружево».
К услугам отдыхающих здесь прекрасные дровяные бани, где с комфортом помещаются 4 человек. Уютные парные, отделанные липой, зоны отдыха с панорамными окнами на озеро – красиво и необычно. Красивый закат, лунная дорожка на воде – зрелище незабываемое.
Здесь обязательно подадут березовые кружевные веники, шапочки, чистые полотенца и простыни, халаты и тапочки, средства для ухода за телом, питьевую бутилированную воду.
Чаепитие между заходами в парную тоже доставит немало удовольствия. Можете заказать чай с карельскими травами и ягодами, с вареньем из майских сосновых шишечек.
К услугам ценителей настоящей бани пармейстер – знаток всех тонкостей и нюансов парной: и парку поддаст, и похлещет душистым березовым веником, и холодной водой окатит. После такой парилки еле живой выкатываешься из бани и окунаешься в озеро.  </p>
  <img class="col-md-12 ftco-animate" src="images/articles/203.webp" alt="Баня Кружево"data-stellar-background-ratio="0.3"> <br><br><br><br>
  <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
<h3 class="mb-4"> Аренда бани в Сортавала</h3>
  </div>
<p align="justify">Арендовать русскую баню с парилкой и купелью в Сортавала не проблема. Такое удовольствие есть почти в каждой загородной базе, отелях. <br>
<p align="justify">Отель-клуб Гардарика, г. Сортавала, Вяртсиля<br></p>
<p align="justify" textcolor black >Отель-клуб предлагает отличную баню у озера. Приятно после парной окунуться в прохладную воду. Озерная вода, как парное молоко, обволакивает и ласкает тело, насыщая каждую клеточку организма кислородом и приятной влагой.
Можно хорошо попариться и отхлестаться березовым карельским веником. После бани приятно попить чаю с ароматными целебными травами в беседке, подышать свежим воздухом, от души полюбоваться прекрасными видами, сделать барбекю, отдохнуть между заходами в парилку.<br>
Стоимость аренды бани:<br>
с 10.00 до 23.00 – 800 рублей за 2 часа с человека;<br>
с 23.00 до 5.00 – 1 200 р. за 2 часа с человека;<br>
березовый веник – 350 р;<br>
дубовый веник – 500 р. <br>
Арендовать баню в Сортавала можно у частников.  <br></p>.







  <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
<h3 class="mb-4"> Дом с купелью "Лунный залив"</h3>

                    <img class="col-md-12 ftco-animate" src="images/articles/106.webp" alt="Лунный залив"data-stellar-background-ratio="0.3">
     </p>.<a href="https://sonniyzaliv.ru/lunniy-zaliv">Посмотреть дом с купелью</a> </p>.
         <p class="color-black">Всегда есть выбор где остановиться, чтобы отдохнуть в Карелии. Останавливайтесь в наших домах. <br>Выбрать даты для аренды дома можно по кнопке ниже</p>
            </div>
     <div class="row d-flex">
                <div class="conf-btn" style="padding-top: 5px;"><a href="#" <?/*id="reserve1" */?> data-tl-booking-open="true" class="btn btn-primary py-3 px-4 ftco-animate"><i class="ion-ios-calendar"></i> Забронировать</a></div>
  <p align="justify">
               Оборудован купелью на террасе. Купель c аэромассажем как джакузи, поможет летом расслабиться с видом на звезды, а осенью согреться, попариться. Купель позволяет телу прогреваться равномерно, при этом голова остается на свежем воздухе. Человек имеет возможность дышать свежим морозным воздухом и одновременно любоваться окружающей природой, звездным небом и снежинками, кружащими над купелью.  Процедура положительно влияет на весь организм, оздоравливает, восстанавливает силы, улучшает настроение.
Вода в ней нагревается до 35 градусов. Жарко будет даже в прохладные осенние вечера.
 Вода в купели нагревается до 35 градусов.

"Лунный залив" предлагает в аренду благоустроенный коттедж площадью 42 м2 с двуспальной кроватью.

Аренда номера на двоих без питания – от 4500 рублей в сутки.

Собственная ванная комната, бесплатный Wi-fi, кондиционер, спутниковое телевидение, терраса. В ванной комнате душевая кабина, стиральная машина. Есть электроплита и посуда, принадлежности для барбекю.</p>
<div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
<h3 class="mb-4">Гостевой дом «Благодать», г. Сортавала </h3>
</div>
<p align="justify">Расположен в лесу на берегу озера. Предлагает арендовать баню на дровах за 1000 р. на человека за 3 часа. Дети до 5 лет бесплатно. Стоимость дополнительных часов рассчитывается по 300 р. за час.
По договоренности за отдельную плату предоставляется все необходимое: веники, полотенца, простыни, чайный набор, бутилированная вода
Баня стоит отдельно, прямо с парилки можно добежать до озера и окунуться, поплавать. Есть небольшая комната отдыха, где можно полежать отдохнуть.
Можно снять номер-эконом на 2 человека за 3 500 р. в сутки без питания. Хороший бюджетный вариант для семьи с детьми.
   </p>
<div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
<h3 class="mb-4">Бани Карелия</h3>
</div>

              <p align="justify">  Не зря в Карелии бане придают такое большое значение. Русская баня с парилкой – это целый ритуал. Распаренное тело хорошо очищается от грязи и шлаков, ускоряется кровообращение и нормализуется давление, успокаиваются нервы. Пар доставляет немало удовольствия и положительных эмоций, поднимает тонус. Простуду, насморк и усталость после охоты или рыбалки в прохладное время как рукой снимает.
В Карелии представлено большое разнообразие бань – от бюджетных до элитных. Есть бани с бассейном, сауной, джакузи и другими удобствами. Можно выбрать уютную комнату отдыха или просторный зал. Некоторые бани располагают летними площадками для отдыха.
Среди популярных вариантов классическая русская парная, инфракрасная сауна, хамам, финская сауна. Многие загородные коттеджи и базы отдыха располагают русской баней с парилкой. Часто банный комплекс располагается прямо у озера. При желании каждый найдет вариант по душе.
Современные базы отдыха оборудованы душем и ванными, но снять коттедж в Карелии и не посетить баню, особенно зимой и поздней осенью – значит лишить себя настоящего отдыха. К бане обязательно прилагается веник с душистыми травами, купание в сибирском чане, возможность прямо из парилки окунуться в Ладогу.
Омолаживающий банный чан – это, вообще, отдельная песня. Чаша с водой стоит прямо на печи под открытым небом. В какой-то момент ощущаешь себя Иванушкой-дурачком в кипящей воде. Чаши обычно вмещают до пяти человек, температура в ней нагревается до 36-40 градусов. Тело в тепле, а голова в холоде. Особо острые ощущения получаешь в чаше зимой. Над головой кружит снег, а снизу идет тепло.
Если приедете в Карелию, обязательно попарьтесь в баньке с чаном – отдохнете и увезете с собой приятные воспоминания об этом чудесном крае с замечательными традициями.
</p>
   <img class="col-md-12 ftco-animate" src="images/articles/204.webp" alt="<Бани в карелии"data-stellar-background-ratio="0.3"> <br><br><br>


<div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
<h3 class="mb-4">Загородный клуб Авиаретро, Прионежский район, ст. Шуйская</h3>
</div>
<p align="justify">Клуб предоставляет в аренду русскую баню с отличной парилкой, душем, комнатами, где можно передохнуть. В стоимость включены полотенца, банные простыни, гигиенический набор, березовый веник, чайный набор.
Баня арендуется на компанию до 6 человек. Минимальное время аренды – 2 часа.
Стоимость – от 1 500 р за час.
     </p>
     <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
<h3 class="mb-4">База отдыха Salokyla («Хутор Салокюля»), Лахденпохский р-он, п. Харвиа</h3>
</div>
<p align="justify">Загородная коттеджная баз предлагает оригинальную деревянную баню-бочку на полозьях зимой и плавучую летом. По мнению хозяев, их предложение – необходимый вид зимнего отдыха, как лыжи и сноуборд, катание на собачьих упряжках.
Цена зависит от количества человек и продолжительности отдыха. Арендовать домик можно даже на 1 вечер, чтобы попариться и искупнуться в Ладоге.
Размещение в домиках, коттеджах, глэмпинге.
Растопка, простыни, полотенца, шапочки, тапки, настил для полка, чай уже входят в стоимость аренды. Моно взять веники, их и запарят как положено.<br>
Цены:<br>
Баня на воде – от 1 000 р. в час на человека, дубовый веник – 400 р. Минимальное время пребывания – 2 часа, максимум 8 человек.<br>
Молодильный чан – 3 000р. Сдается вместе с баней.<br>
Услуги банщика по предварительному заказу – 3 000 рублей за час, если до 3 человек; 4 000 р., если до 4 человек.<br>
Аренда бани в Карелии подарит незабываемый отдых.<br> </p>

        <img class="col-md-12 ftco-animate" src="images/articles/205.webp" alt="База отдыха Salokyla"data-stellar-background-ratio="0.3">
          <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
<h3 class="mb-4">Банный комплекс Карелия</h3>
</div>
<p align="justify">
Банный комплекс рассчитан на разное число людей. Есть баня, где одновременно могу париться 20 человек, есть баня с отделениями для 8 человек. Все бани оборудованы уютными гостиными, летними открытыми террасами, расположены на берегу чистого озера.
Установлены дровяные печи с топкой в виде камина. В раздевалке имеются шапки для парилки, тапочки, полотенца и простыни.
В комнате отдыха стоит большой стол, деревянные лавки, чайник и посуда для чаепития. Есть спутниковое телевидение. <br>
Стоимость аренды:<br>
Баня с купелью – 8 000 р. за 2 часа + дополнительный час по 2 000 р.<br>
Баня в мысу на 10 человек – 24 000 р. за 4 часа + доп. час 800 р.<br>
Банный комплекс на берегу озера на 8 человек из 2 отделений. Стандарт – 7 000 р. за 2 часа; комфорт – 23 000 р. за 4 часа.<br>
Дополнительно: парение – от 1 500 р. с человека; полотенце – 200 р.; веник березовый – 259, дубовый, липовый или эвкалиптовый – 350 р.<br></p>
  <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
<h3 class="mb-4">Дом для отдыха «Сонный залив» с сауной и купелью в Сортавале</h3>
</div>
                      <img class="col-md-12 ftco-animate" src="images/other/14.webp" alt="Гостевой дом Сонный Залив">
                <p align="justify">        Тоже предлагает сауну с купелью. Дома расположены на берегу озера в Ладожских шхерах, в 10 минутах от туристического центра Сортавала.<br>
Аренда номера для 4 гостей без питания – 8 830 р. в сутки;<br>
купель с аэромассажем оплачиваются отдельно – от 2 500 р.<br></p>

     </div>

                <p class="color-black">Всегда есть выбор где остановиться, чтобы отдохнуть в Карелии. Останавливайтесь в наших домах. <br>Выбрать даты для аренды дома можно по кнопке ниже</p>
            </div>
            </div>
            <div class="row d-flex">
                <div class="conf-btn" style="padding-top: 5px;"><a href="#" <?/*id="reserve1" */?> data-tl-booking-open="true" class="btn btn-primary py-3 px-4 ftco-animate"><i class="ion-ios-calendar"></i> Забронировать</a></div>

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
    "url": "https://sonniyzaliv.ru/karelia-bani",
    "name": "Бани и комплексы в Карелии | Сонный Залив",
    "description": "Карельские бани и комплексы, Аренда бани в Карелии на берегу озера, Аренда бани Сортавала, Бани Карелия,Банный комплекс Карелия, Баня на нашей базе в Карелии",
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
