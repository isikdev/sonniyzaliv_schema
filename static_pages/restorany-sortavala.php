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

    $title = 'Рестораны в Сортавала  | Сонный Залив Сортавала';
    $descr = 'Рестораны Сортавала и заведения питания Ресторан, Густав Винтер Сортавала,  Дача Винтера, усадьба Винтера, Кафе Дом Берга отзывы, Ресторан Кружево Сортавала меню и цены, Ресторан Саари Черные Камни,  Ресторан Точка на Карте, Рестораны в Рускеале Кафе-магазин «Акуловка», Русколка – кафе';
    $keywords = 'Отзывы Рестораны Сортавала и заведения питания Ресторан, Густав Винтер Сортавала,  Дача Винтера, усадьба Винтера, Кафе Дом Берга отзывы, Ресторан Кружево Сортавала меню и цены, Ресторан Саари Черные Камни,  Ресторан Точка на Карте, Рестораны в Рускеале Кафе-магазин «Акуловка», Русколка – кафе';

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

    <link rel="canonical" href="https://sonniyzaliv.ru/restorany-sortavala"/>

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
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/articles/13back.webp');" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate pb-5 text-center" style="margin-top: 100px;">
              <h1 id="act-form" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Рестораны Сортавала</h1>
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
                    <h2 class="mb-4">Рестораны Сортавала</h2>
                    <p>Информация, которая будет Вам полезна при выборе места для отдыха</p>
                </div>
            </div>

            <div class="col-md-12 heading-section ftco-animate">
                <p class="color-black">Гастрономические путешествия стали модными в России. Тем, кто хочет попробовать необычные блюда из рыбы и мяса, стоит посетить Карелию. В этой республике годами создавалась традиционная кухня, аналогов которой нет больше в мире. В этой местности много рыбы, дичи и ягод, а рецепты их приготовления удивят даже опытных гурманов. Калакукко, какрискукка, майтокалакейтто звучит экзотичнее, чем фуа-гра, эскамолес, сарсуэла. А вкус этих «достопримечательностей» местной кухни значительно отличается от аналогов, приготовленных в других городах страны.<br> </p>
                 <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
<h3 class="mb-4">Ресторан Густав Винтер Сортавала </h3>
</div>
<img class="col-md-12 ftco-animate" src="images/articles/1301.webp" alt="Ресторан Густав Винтер Сортавала">
 <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
     </div>
     </div>

  <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
<p class="color-black"align="justify">Вот где проникаешься атмосферой Карелии, среди огромных сосен за окнами, полюбоваться пламенем камина, а летом вдыхать свежий воздух на веранде. Через прозрачные стены открывается живописный вид на Ладожское озеро, которое меняется, в зависимости от погоды и времени суток.<br>

Ресторан входит в состав парк-отеля «Дача Винтера». Густав Винтер был не только известным хирургом, но и основоположником туризма в Карелии. Он обладал разносторонними знаниями и постоянно их совершенствовал. Обучившись ландшафтному дизайну в Италии, хирург создал дендропарк на мысе Таруниеми. Ему первым удалось вырастить уникальные деревья и растения из Японии, США, Китая. Многие из них доставались врачу от благодарных пациентов. Густаву удалось их приспособить к холодному климату и размножить.<br>
Когда врач уехал за границу, его дачу высоко оценили супруги Дурхман. С этого момента начал развиваться туризм Карелии. <br>
Сегодня усадьба Винтера является музеем с 1992 года. Попасть в него может любой желающий, заказав экскурсию. Здание находится на территории парка, основанного этим хирургом. Там же располагаются отели, пищевые заведения, одно из которых названо в честь создателя парка.<br>
В ресторане «Густав Винтер» представлены традиционные и современные изыски кухни северных народов России. Благодаря своей уникальности, красивому дизайну, он получил следующие премии:<br>
•	Национальная гостиничная 2021 в номинации «лучший ресторан при отеле 2021»<br>
•	Russian hospitality awards «лучший ресторан при отеле 2021 и 2022»<br>
•	Travel time awards «лучший ресторан при отеле 2022»<br>
•	Russian hospitality awards «лучший шеф-повар 2023».<br>

В меню используются традиционные карельские блюда и с местными ингредиентами. Несмотря на то, что состав и названия постоянно меняется и дополняется, их основу составляют:<br>
•	Грибы;<br>
•	Местная рыба и морепродукты (налим, форель, корюшка, судак, креветки, раковые шейки, икра);<br>
•	Дичь: кролик, оленина, кабан, телятина;<br>
•	Кедровые орешки;<br>
•	Валаамские сыры;<br>
•	Местные ягоды: брусника, морошка, черника, клюква и другие.<br>
Кроме экзотических, есть и традиционные русские лакомства, как картошка фри, овощи гриль, котлеты, супы. Но тем, кто посещает Карелию, стоит обратить внимание на местные деликатесы. Их готовят по мотивам современных блюд, аналогов которых не существует в мире.<br>
Парк-отель «Дача Винтера» находится в Карелии на территории посёлка Тарулинна. Добраться до неё можно на поезде, автомобиле, такси от ДЖ вокзала Сортавала. <br>
</p>
</div>
<?php echo $initNews; ?><!--вывод Блог ленты  -->
                <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
                    <h3 class="mb-4">Кафе Дом Берга</h3>
<img class="col-md-12 ftco-animate" src="images/articles/1302.webp" alt="Кафе Дом Берга">
 <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
     </div>

<p class="color-black"align="justify">Кафе Дом Берга<br>

Туристы ценят кафе за вкусную выпечку и десерты. Здесь продают знаменитые карельские калитки с начинкой из редких северных ягод: морошки, княженики, брусники, малины. На выбор представлены фермерские сыры. Из несладких блюд самое экзотическое лохикейтто: сливочный суп с лососем. Можно попробовать пельмени с красной рыбой, дичью, бутерброды с сёмгой на масле.<br>

Из десертов посетители оценили мороженое, сладости, разнообразие чая, кофе и алкогольных напитков. В кофейне продаются коробки конфет, мелкие сувениры, которые берут с собой на память.</p>
</div>
                <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
                    <h3 class="mb-4">Ресторан Кружево Сортавала меню и цены</h3>
<img class="col-md-12 ftco-animate" src="images/articles/1303.webp" alt="Ресторан Кружево Сортавала меню и цены">
 <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
     </div>
<div class="col-md-12 heading-section ftco-animate">
                <p class="color-black"align="justify">Кружева всегда символизировали Россию, её искусство, народное творчество. Вот почему ресторан с таким названием воплотил атмосферу страны, сочетав её с современными традициями. В этом заведении представлены лучшие кулинарные изыски Карелии, сделанные по старинным рецептам.<br>
Ресторан привлекает уютной атмосферой и красивыми видами за окнами на деревья и природу. Меню создаётся по лучшим рецептам, которые держатся в секрете. Вот какие кулинарные творения завоевали сердца посетителей:<br>
•	Тунец с соусом из облепихи и апельсина (от 890 рублей)<br>
•	Маринованные белые грибы (от 1100 рублей)<br>
•	Дальневосточная креветка с кавказским соусом (780 рублей)<br>
•	Маринованные огурцы с добавлением елового джина (от 750 рублей)<br>
•	Салат с яйцами, морошкой и форелью (от 750 рублей)<br>
•	Мурманский кальмар с травами (от 720 рублей)<br>
•	Оливье с карельской форелью и икрой (750 рублей)<br>
•	Котлеты из мяса оленя с брусникой и картофелем (1300 рублей)<br>
•	Салат с гребешком и креветкой из Дальнего востока (1200 рублей)<br>
•	Утиная грудка с соусом велюте и персиком (890 рублей)<br>
•	Вареники с лисичками, картофелем и пармезаном (от 700 рублей) за порцию<br>
•	Карельская уха на сливках (720 рублей)<br>

Кроме вышеописанных шедевров, можно попробовать и традиционную русскую кухню. Любители пиццы, картофеля, пиццы, супов и мяса смогут окунуться в домашнюю атмосферу ресторана, заказав следующие знакомые блюда:<br>
•	Картофель (жареный с добавлением трав и специй и пюре) от 200 рублей<br>
•	Пицца (сырная, Маргарита, Пепперони, с грибами) от 720 рублей<br>
•	Сыры (от 390 рублей)<br>
•	Хлеб (от 80 рублей)<br>
•	Стейки из говядины (от 1500 рублей)<br>
•	Борщ и бульона от 400 рублей<br>
•	Печёные овощи (от 680 рублей)<br>
Ресторан «Кружево» предлагает и свою импровизацию знакомых блюд, которые есть в каждой семье. Заботливые повара и разработчики меню всегда знают, чем удивить посетителей. Поэтому даже тем, кто заказывает привычные лакомства, будет, чему удивиться. Ведь в меню представлены очень вкусные версии привычных праздничных деликатесов:<br>
•	Котлеты из индейки с пюре<br>
•	Домашние пельмени со сметаной и начинками на выбор<br>
•	Цыплёнок с муссом из картофеля<br>
•	Оливье с языком и другие<br>
Тем, кто хочет проникнуться атмосферой севера, стоит попробовать вишнёвый или брусничный соус. Они прекрасно сочетаются с гарнирами и стейками. Даже жареная картошка обретёт с ними не обычный вкус. А любителям десертов ресторан предлагает необычное сочетание рикотты с облепиховым муссом. Есть и другие, не менее интересные сладости, ассортимент которых меняется перед каждым сезоном.<br>
Ресторан находится в посёлке Рантуэ, дом 77 корпус 1.</p>
</div>
                <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
                    <h3 class="mb-4">Ресторан Саари Черные Камни</h3>
<img class="col-md-12 ftco-animate" src="images/articles/1304.webp" alt="Ресторан Саари Черные Камни">
 <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
     </div>
     </div>
<div class="col-md-12 heading-section ftco-animate">
                <p class="color-black"align="justify">Ресторан имеет финское название, которое переводится как «остров». Идея его создания была вдохновлена красотой озеро Янисъярви. С любой точки заведения открывается потрясающий вид на зеркальную гладь и живописные берега. Зал вмещает до 2500 человек, где часто проходят свадебные церемонии, банкеты и большие праздники.
Ресторан «Saari» находится на территории курортного комплекса «Чёрные камни». Здесь туристы бронируют номер в гостинице или отдельный коттедж. На территории комплекса располагаются музеи, несколько гостиниц, ресторанов, спортивных площадок, детские игровые комплексы и многое другое. Меню создано в европейских и скандинавских традициях, но некоторые компоненты характерны для карельской кухни.<br>
К ним относятся:<br>
•	Дичь<br>
•	Форель<br>
•	Утка<br>
•	Грибы<br>
•	Кабан<br>
•	Олень и другие<br>
Тем, что мечтает окунуться в гастрономическую атмосферу Карелии, рекомендуется попробовать следующие деликатесы и редкости:<br>
•	Сырная тарелка Киркка с добавлением варенья из малины, клюквы, брусники, белых грибов<br>
•	Сало «Карьяласки»<br>
•	Уха «Янис» с форелью и сливками<br>
•	Судак по-карельски<br>
•	Пельмени с мясом кабана и оленя<br>
•	Жаркое «Мейликки»<br>
•	Бифштекс из оленины и другие<br>
Летом туристам доступна открытая площадка с видом на озеро. Здесь делают эффектные снимки в морской тематике. Интерьер ресторана выполнен в строгом стиле с преобладанием тёмных тонов. В нём есть яркая комната для игрового досуга детей.<br>
Комплекс «Чёрные камни» находится в Республике Карелия, г. Сортавала, п. Киркколахти. </p>
</div>
<h3 class="mb-4">Ресторан Точка на Карте</h3>
<div class="col-md-12 heading-section ftco-animate">
                <p class="color-black"align="justify">Он входит в состав сетевых отелей, расположенных в Приозёрске и Сортавале. Один из ресторанов ценится за то, что выходит окнами на Ладожское озеро. Именно там можно увидеть и запечатлеть живописные виды. В 2022 и 2023 году заведения получили премии и награды на престижных конкурсах. <br>
                Отель Точка на карте Сортавала, где находится один из лучших ресторанов Карелии, расположен с видом на озеро Пюяралампи. И, хотя в нём купаться нельзя, посетителям достаточно красивого вида и вкусной еды. В приоритете заведения местная кухня.<br>
                Точное меню ресторанов держится в секрете, но некоторые, в том числе и сезонные блюда регулярно появляются на официальном сайте. В основе кухни лежат традиционные старинные рецепты Карелии с добавлением ягод, рыбы и мяса. Наиболее интересные среди них это:<br>
                •	Сугудай из окуня<br>
•	Утка со сливой и полбой<br>
•	Пирог с телятиной и сметаной с добавлением соуса<br>
•	Пулоты из трески с картофельным муссом и многое другое<br>
В меню «Точки на карте» используются свежие северные ягоды такие, как морошка, черника, княженика и многое другое, натуральное мясо и уникальные секреты приготовления, которые передавались карельцами из поколения в поколение. Многие из них настолько своеобразны, что повторить их невозможно. </p>
</div>
<h3 class="mb-4">Рестораны в Рускеале</h3>
<div class="col-md-12 heading-section ftco-animate">
                <p class="color-black"align="justify">Ознакомиться с многообразной природой Карелии можно, посетив не только озёра, но и горные склоны, леса. На месте бывшего мраморного карьера расположен уникальный парк Рускеале. Здесь можно не только увидеть горы с высоты птичьего полёта, но и попробовать изыски местной кухни в нескольких ресторанах. Среди них наиболее интересные:<br>
                •	Кафе-магазин «Акуловка»<br>
•	«Лето»<br>
•	«Апельсин»<br>
•	«Русколка»<br>
Все они уступают по вместимости и дизайнерским решениям ресторанам, но кормят в них не хуже. В кафе горного парка «Рускеале» представлены традиционные блюда карельской кухни, которые стоит попробовать туристам. Их ассортимент регулярно меняется, но неизменным остаётся вкус и оригинальность рецептов.<br>
В фермерском кафе-магазине «Акуловка» продают калитки с ягодами, картофелем и рыбой. Из горячих блюд наиболее интересна сливочная уха из красной рыбы лохикейтто. В кафе представлены пельмени с разными начинками: рыбой, курицей и индейкой. Ассортимент напитков мало отличается от того, что представлено в обычных фермерских магазинах. В «Акуловке» можно попробовать натуральный квас, правда, из-за крепости его не рекомендуют пить водителям и детям. При этом тарелка ухи стоит около 200 рублей за большую порцию.<br>
Русколка – кафе с деликатесами местной кухни. В нём представлены пельмени с разными начинками, уха с красной рыбой, калитки, расстегаи, оладьи, сыр, мороженое. Из напитков представлены горячий кофе, чай, различные виды газировок. В заведении используется самообслуживание, что помогает приобрести еду удобно и быстро.<br>
Кафе «Апельсин» сделано в ярком дизайне. Зелёные и оранжевые стульчики напоминают цитрусы по цвету. Меню мало чем отличается от других ресторанов, но в заведении можно попробовать оригинальный карельский морс из северных ягод, шведские фрикадельки с картофелем и брусникой, форель под сливочным соусом и жаркое с добавлением красной рыбы. В ассортименте представлена финская уха и пельмени с форелью.  Похожее меню имеет и кафе «Лето».<br>
В парке «Рускеала» можно попробовать карельские блюда по более низким ценам, чем в ресторанно-гостиничных комплексах. Оно имеет свои особенности и по вкусу отличается от привычных супов, борщей, пирожков и пельменей.</p>
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
    "url": "https://sonniyzaliv.ru/restorany-sortavala",
    "name": "Рестораны в Сортавала  | Сонный Залив Сортавала",
    "description": "Рестораны Сортавала и заведения питания Ресторан, Густав Винтер Сортавала,  Дача Винтера, усадьба Винтера, Кафе Дом Берга отзывы, Ресторан Кружево Сортавала меню и цены, Ресторан Саари Черные Камни,  Ресторан Точка на Карте, Рестораны в Рускеале Кафе-магазин «Акуловка», Русколка – кафе",
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
