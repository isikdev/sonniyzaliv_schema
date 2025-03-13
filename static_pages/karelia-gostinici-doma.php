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

    $title = 'Гостиницы и дома отдыха в Карелии | Сонный Залив Сортавала';
    $descr = 'Апарт-отель "Кружево" в Сортавале, Карелия Гостиница в Видлице, Олонецкий район, Гостиница в Карелии на берегу Ладожского озера, Гостиница в Лодейном Поле, Гостевой дом "Остров", Гостевой дом "Тихотут", Забронировать домик в Карелии, Загородный отель "Карелия", Загородный отель "Кружево" в Сортавале, Загородный отель в Видлице, Кружево апарт-отель в Карелии (официальный сайт), Ламберг загородный клуб ресторан, Новые загородные отели Ленинградской области, Новые отели в Ленинградской области';
    $keywords = 'Гостиница Альда Сортавала, Новая гостиница Альда Сортавала, Апарт-отель "Кружево" в Сортавале, Карелия Гостиница в Видлице, Олонецкий район, Гостиница в Карелии на берегу Ладожского озера, Гостиница в Лодейном Поле, Гостевой дом "Остров", Гостевой дом "Тихотут", Забронировать домик в Карелии, Загородный отель "Карелия", Загородный отель "Кружево" в Сортавале, Загородный отель в Видлице, Кружево апарт-отель в Карелии (официальный сайт), Ламберг загородный клуб ресторан, Новые загородные отели Ленинградской области, Новые отели в Ленинградской области';

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

    <link rel="canonical" href="https://sonniyzaliv.ru/karelia-gostinici-doma"/>

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
              <h1 id="act-form" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Гостиницы и дома отдыха в Карелии</h1>
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
                    <h2 class="mb-4"> Гостиницы и дома для отдыха в Карелии</h2>
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
                 <p class="color-black">
                  <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
                   <h2 class="mb-4"> Апарт-отель "Кружево" в Сортавале, Карелия</h2>
                    </div>
                     <div class="row d-flex pt-3 pb-5">
                    <img class="col-md-12 ftco-animate" src="images/articles/301.webp" alt="Отель Кружево">
                </div>
 <p align="justify">
Новый отель «Кружево» уютно расположился на самом большом острове Ладоги –Риеккалансаари. Современные коттеджи с панорамными окнами красиво смотрятся среди могучих сосен. Архитекторы при проектировании и строительстве баз отдыха в Карелии делают акцент на сохранении природного ландшафта.
Туристы едут сюда полюбоваться красотой северной природы, белыми ночами, отдохнуть от городских человейников и бешеного темпа современной жизни.
Отдыхающие заселяются в комфортабельных коттеджах и апартаментах. <br>
Танхаус, двухместные апартаменты 55 м2 – от 13 000 р.<br>
Коттедж 86 м2 с двумя спальнями для 4 гостей – 26 000 р. <br>
Коттедж 170 м2 с двумя спальнями для 4 гостей – от 30 000 р <br>
Коттедж 194 м2 с тремя спальнями для 6 гостей – от 40 000 р.<br>
В отеле работает ресторан. Акцент делается на карельские национальные блюда, которые готовятся в дровяной печи. Здесь вы обязательно попробуете форель, запеченную на смокере, копченый борщ, нежные стейки, вареники величиной в блюдце, северную рыбу.
Предложат попариться в бане.
В «Кружево» есть отдельный домик для детских игр: клуб с игровой зоной и лабиринтами, с услугами няня. В наличии детские коляски, кроватки, стульчики, ванночки, стерилизаторы для бутылочек.
От пристани катер доставит вас в самые красивые места озера, в ладожские шхеры. Организуются пешие прогулки по острову, поездки на Валаам. Можно арендовать катер на целый день. Экскурсия в военно-исторический музей «Гора Филина» в бывшем финском бункере внутри скалы, поездка в исторический парк «Бастионъ», горный парк «Рускеала» будут интересны и познавательны как взрослым, так и детям.<br></p>
<?php echo $initNews; ?><!--вывод Блог ленты  -->

<div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
<h3 class="mb-4">Гостиница  "Альда" в Сортавала ул Карельская 11а</h3>
 </div>
<div class="row d-flex pt-3 pb-5">
                    <img class="col-md-12 ftco-animate" src="images/alda/back2sm.webp" alt="Гостиница Альда">
                </div>
              
<p align="justify">Гостиница  "Альда" в Сортавала ул Карельская 11а <br>
Удобное "смарт-пространство" с понятной, лаконичной навигацией в самом центре города.
Бесконтактные круглосуточные заезды. Видеонаблюдение в холлах для вашей безопасности.
Гостиница идеально подойдет как для коротких командировок, так и для длительного пребывания в городе.
Для одного-двоих путешественников, для семьи и небольшой компании.<br>
Найди свой зеленый ключ от номера в Сортавала. От утренней "Ласточки" на железнодорожной платформе "Сортавала-Центр" всего несколько минут пешком. 
"Альда" - это уютное и комфортабельное место, где каждый гость найдет свой идеальный номер. <br>
Всего в гостинице 12 номеров (с душевой в номере), каждый из которых оборудован всем необходимым для приятного и беззаботного отдыха. 
Гостиница Альда гордится своим удобным расположением - в шаговой доступности от всех основных достопримечательностей и близко к транспортным узлам. 
Если вы планируете посетить Сортавала в Карелии и не знаете, как провести свой досуг, мы готовы помочь вам с этим вопросом. <br>
Сортавала - это уникальный город, который предлагает множество разнообразных развлечений и активностей для отдыха. 
Мы с радостью поделимся с вами нашими рекомендациями и советами, чтобы вы могли насладиться своим отдыхом в полной мере. 
Приезжайте в гостиницу "Альда" и насладитесь комфортным пребыванием в Карелии!</p>







<div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
<h3 class="mb-4">"Точка на карте" Гостиница в Видлице, Олонецкий район</h3>
 </div>
 <div class="row d-flex pt-3 pb-5">
                    <img class="col-md-12 ftco-animate" src="images/articles/302.webp" alt="Точка на карте">
                </div>

<p class="color-black">Точка на карте. Видлица 3* – современный мини-отель в Видлицком сельском поселении, 2020 г. постройки, в 817 м от Ладожского озера. Ухоженная территория, просторные домики с панорамными окнами, прекрасные виды на озеро, хвойный лес, хорошая песчаная береговая линия. Вас поселят в номера со всем необходимым для комфортного проживания, в отеле работает круглосуточная стойка регистрации. Питание в кафе и ресторане, есть детское меню, работает доставка в номер. Доступен летний отдых на террасе, настольные игры для детей и пазлы, прокат лыж, велосипедов, спортивного инвентаря.<br>
Отапливаемые семейные номера:<br>
Номер-студио с отдельным входом, вторая береговая линия, включен завтрак по системе «шведский стол» – 20 300 – 21 900 р. в сутки; с завтраком, обедом и ужином – 23 100 – 27 500 р.<br>
Студио, первая береговая линия – 24 600 – 30 200 р.<br>
Дети до 5 лет могут проживать бесплатно, до 13 лет дополнительное место с доплатой 3 700 р. в сутки.<br>
Услуги: Wi-fi, кондиционер, фен, сейф. На кухне плита, посуда, обеденный стол, чайник, холодильник.
Гостиница предназначена для семейного отдыха. Сюда приезжают отдохнуть в тишине, в стороне от дорог и промышленных центров.
</p>

<div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
<h3 class="mb-4"> "Гостиница в Карелии на берегу Ладожского озера"</h3>
 </div>
<p align="justify">Карелия – край величественных сосен, чистейших рек и озер. Круглый год здесь отдыхают туристы со всего мира. Арендуют рыбацкие домики, коттеджи с банями, плавучие дома, комфортабельные апартаменты.
Летом особенно популярны отели на берегу Ладоги. Отличные условия проживания, великолепный досуг – рыбалка, походы на байдарках, сплавы по горным речкам, экскурсии по историческим местам – привлекают отдыхающих всех возрастов и национальностей.
Спрос на Ладожское озеро вырос, поэтому гостиницу надо бронировать заранее.</p>
<div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
<h3 class="mb-4"> "Гостиница в Лодейном Поле"</h3>
 </div>



                    <img class="col-md-12 ftco-animate" src="images/articles/303.webp" alt="Гостиница в Лодейном поле">
        <p align="justify">Место популярное. Топ-3 гостиницы на Лодейном Поле.Точка на карте Лодейное Поле 3* в Ленинградской области. Город Лодейное Поле, территория урочище Мирошкиничи.
Здесь созданы хорошие условия для комфортного проживания.
В гостинице работает ресторан. Можно взять на прокат велосипед.
Действует круглосуточная стойка регистрации, для людей с особенностями здоровья доступны необходимые условия.<br>
Размещение от 7 000 р в сутки.</p>
 <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
<h3 class="mb-4"> "Гостиница Петровский 3* в 500 м. от центра"</h3>
 </div>
<p align="justify"> Размещение от 2 500 р в сутки.</p>
 <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
<h3 class="mb-4">База отдыха «Гостиница Провинция, в 250 м. от центра</h3>
 </div>
<p align="justify">
Размещение от 4 000 р. в сутки. В наличии номера с односпальной и двуспальной кроватью, стандартные 3-местные номера от 5 600 р. в сутки.
Номера с панорамными окнами. В стоимость входят завтраки. Парковка бесплатная. До озера меньше километра.</p>
 <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
<h3 class="mb-4">Гостевой дом "Тихотут", Сортавальский район, п. Токкарлахти</h3>
 </div>
  <img class="col-md-12 ftco-animate" src="images/articles/304.webp" alt="Гостиница в Лодейном поле">
<p align="justify">
Условия в гостевом доме созданы достойные. Есть сауна, баня, общая площадка для пикника с мангалом и крытой беседкой, сад для прогулок. Есть хорошие места для рыбалки
Номера на 1 ночь:<br>
Хижина – 4 500 р. без питания;<br>
Однокомнатный домик с видом на озеро, 8 м2, санузел с душевой и горячей водой в отдельном блоке, рядом с Тревел-хижиной, есть кондиционер, обогреватель, балкон. Двуспальный диван-кровать, постельное белье, полотенца. Вайфая нет. Питание надо везти с собой.
На период проживания при заезде вносится залог 1000 рублей
Подойдет для кратковременного отдыха на природе.</p>
 <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
<h3 class="mb-4">Забронировать домик в Карелии</h3>
 </div>
<p align="justify">
В сети интернет можно недорого забронировать домик в Карелии. Всегда найдутся подходящие предложения для желающих уехать подальше от городского бурного потока жизни. Например:</p>
 <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
<h3 class="mb-4">База отдыха «Глэмпинг Lago Ladoga», Кондопога, п. Нигозеро</h3>
 </div>
<p align="justify">
До центра 33 км, Сортавала. Домик 50м2 для гостей от 1 до 5; 2 спальни от 1 500 р. за ночь<br>
База отдыха «Лубяной домик», Петрозаводск – от 1 500 р. за ночь<br>
Дом 52 м2 с 1 спальней в Ляскеля – от 2 900 р. ночь<br>
Дом 30 м2 в Беломорске от 3 000 р. за ночь <br>
Это отдых в тишине на лоне природы для 1-4 человек. Рыбалка, охота, отдых у костра помогает вернуть душевное равновесие, набраться сил, зарядиться энергией на предстоящую рабочую неделю. </p>
 <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
<h3 class="mb-4">Загородный отель "Карелия"</h3>
 </div>
<p align="justify">


Парк-отель «Карелия» – современная база отдыха, расположена на живописном берегу Онежского озера в 85 километрах от города Петрозаводска. Большая ухоженная территория 4 га, отличная инфраструктура, удачное расположение выделяют парк-отель среди других загородных гостиниц.
Песчаный пляж – один из лучших в округе. Организуются водные прогулки на рафтах с мотором по Онежскому озеру. Есть прокат велосипедов, прогулочных лодок, спортивного инвентаря. Популярны ежедневные конные прогулки и сафари на собачьих упряжках. В высокий сезон организуется ежедневная анимация для детей и взрослых.
Доступен заказ экскурсий в любую точку Карелии. <br>
Трехразовое питание в кафе на 100 мест организовано на хорошем уровне. К услугам отдыхающих две русские дровяные бани. <br>
Проживание в стандартных двухместных номерах в двухэтажном комплексе. Номерной фонд состоит из 36 номеров. <br>
Туры предлагаются на 7-10 дней. Стоимость необходимо уточнять у менеджера отеля.</p>
 <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
<h3 class="mb-4">Загородный отель в Видлице</h3>
 </div>
<p align="justify"> Комплекс Villa Vitele 3* расположен в поселке Устье-Видлицы, в 21 км от реки Видлицы.
Современный загородный отель в живописном месте, территория отлично вписалась в природный ландшафт. Интересно прогуляться к Ладоге по берегу реки. Популярна рыбалка на реке, вылазки в лес, велосипедные прогулки. В поселке есть Храм, рынок, магазины с карельскими продуктами.
Заселение в двухместных и одноместных номерах стандарт, в номере полулюкс с балконом, двухуровневом номере люкс, бунгало на 6 мест, номере под сосной – выбрать есть из чего. Номерной фонд современный, комфортабельный, внутри обшитый теплым деревом и современными материалами. В отеле созданы хорошие условия для удобного отдыха.
В гостинице есть ресторан, сауна, отличная дровяная баня, теплый бассейн на улице, хамам. Завтраки входят в стоимость номера. Обед и ужин по заказу. Гостиница расположена на берегу реки, в ней удобно отогреться, просушить лодки после сплава. На территории есть мангал.
Очень ограниченная зона доступа Вай-фай, мобильный интернет отсутствует.</p>
 <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
<h3 class="mb-4">Новые загородные отели Ленинградской области</h3>
 </div>
<p align="justify">


Умеренный климат с мягкой зимой и нежарким летом привлекает в Ленинградскую область тысячи туристов. Можно с комфортом заниматься спортом, совершать пешие прогулки по живописным местам, знакомиться с достопримечательностями. Туристы с удовольствием участвуют в традиционных обрядах, дегустируют местную кухню, знакомятся с фольклором, любуются водопадами, посещают известные архитектурные ансамбли.  Самые отчаянные прыгают с парашютом, катаются на квадроциклах.
Летом загородные отели предлагают конные прогулки, рафтинг, всевозможные водные развлечения, прокат велосипедов. Зимой популярны горнолыжные курорты.
Новые загородные отели Ленинградской области предлагают все необходимые условия для комфортного проживания и отвечают самым строгим требованиям отдыхающих.</p>
 <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
<h3 class="mb-4">Давинчи Парк 5*. В Борисово</h3>
 </div>
<p align="justify"> Загородный комплекс на берегу голубого озера среди сосновых лесов подойдет и для семейного отдыха с детьми, и романтичного времяпровождения молодых пар. Каждый сможет здесь найти занятие по интересам.
Гостей ждут пейнтбольный клуб, веревочный парк, мини-зоопарк, тренажерный зал. Зимой популярны квадроциклы и снегоходы.
На берегу озера расположен панорамный ресторан.
</p>
 <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
<h3 class="mb-4">Новые отели в Ленинградской области</h3>
 </div>
<p align="justify">

Ежегодно в Ленинградской области появляются новые современные отели. Комфортабельные гостиницы предлагают обновленные меблированные номера, широкий спектр услуг. Среди них есть гостиницы 3, 4, 5 звезд, спа-комплексы, в том числе недорогие отели, предлагающие проживание с завтраком. Широко представлены бюджетные хостелы, довольно уютные</p>
 <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
<h3 class="mb-4">Отель izzzi 3* у Владимирской в Санкт-Петербурге, в 2,8 км от центра</h3>
 </div>
  <img class="col-md-12 ftco-animate" src="images/articles/305.webp" alt="Гостиница Izzzi"
<p align="justify">
Отель расположен очень удачно: в центре города, рядом 3 проспекта – Невский, Владимирский, Загородный. До Литейного проспекта рукой подать, до Московского вокзала 15 минут пешком. Рядом музей Достоевского, магазины, кафе<br>
Цена номера-студио  – от 4 930 р в сутки;<br>
Двухместный номер с кондиционером – от 5 100;<br>
Завтраки платные – 450 р с человека.<br>


                </div>
                <p class="color-black">Выбрать даты для аренды дома можно по кнопке ниже</p>
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
    "@type": "Product",
    "url": "https://sonniyzaliv.ru/karelia-gostinici-doma",
    "name": "Гостиницы и дома отдыха в Карелии | Сонный Залив Сортавала",
    "description": "Апарт-отель ",
    "inLanguage": "ru-RU",
    "offers": {
        "@type": "Offer",
        "priceCurrency": "RUB",
        "availability": "https://schema.org/InStock"
    },
    "image": [
        "https://sonniyzaliv.ru/images/houses/chernika-v-sonnom-zalive/leto/15.webp",
        "https://sonniyzaliv.ru/images/articles/301.webp",
        "https://sonniyzaliv.ru/images/alda/back2sm.webp",
        "https://sonniyzaliv.ru/images/articles/302.webp",
        "https://sonniyzaliv.ru/images/articles/303.webp"
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
