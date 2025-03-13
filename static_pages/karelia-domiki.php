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

    $title = 'Карельские домики и отдых на природе  | Сонный Залив Сортавала';
    $descr = 'Карельские домики и отдых на природе, Воттоваара - как добраться, Фото с рыбалки у нас, Где искать нашу базу отдыха и домики в Карелии на карте + инструкция, Аренда коттеджа в Карелии на берегу озера, Почему советуем снять домик в Карелии на берегу озера у нас, Снять дом в Карелии на новый год, Аренда коттеджа в Карелии с камином и кондиционером';
    $keywords = 'Снять Карельские домики и отдых на природе, Воттоваара - как добраться, Фото с рыбалки у нас, Где искать нашу базу отдыха и домики в Карелии на карте + инструкция, Аренда коттеджа в Карелии на берегу озера, Почему советуем снять домик в Карелии на берегу озера у нас, Снять дом в Карелии на новый год, Аренда коттеджа в Карелии с камином и кондиционером';

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

    <link rel="canonical" href="https://sonniyzaliv.ru/karelia-domiki"/>
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
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/articles/15back.webp');" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate pb-5 text-center" style="margin-top: 100px;">
              <h1 id="act-form" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Карельские домики и отдых на природе</h1>
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
                    <h2 class="mb-4">Карельские домики и отдых на природе</h2>
                    <p>Информация, которая будет Вам полезна при выборе места для отдыха</p>
                </div>
            </div>

            <div class="col-md-12 heading-section ftco-animate">
                <p class="color-black"align="justify">В них останавливаются те, кто ценит комфорт, уют и хочет отдохнуть «как дома». Большинство из коттеджей сконструированы с учётом особенностей природы, ландшафта. В номерах есть всё необходимое, а дизайн комнат продуман до мелочей. Вот где отдыхают, чтобы познать красоту карельского гостеприимства.<br> </p>
                 <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
<h3 class="mb-4">Воттоваара - как добраться до горы не разбив машину и ...</h3>
</div>
<img class="col-md-12 ftco-animate" src="images/articles/1501.webp" alt="Воттоваара">
 <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
     </div>
     </div>

  <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
<p class="color-black"align="justify"Об этой горе слагали страшные сказки, но подняться на неё не сложно. Воттоваара находится недалеко от посёлка Гимолы. Здесь нанимают гида, чтобы отправиться на вершину. Из Петрозаводска добираются поездом до станции «Гимольская» или на автомобиле (300 км от города). Если вы путешествуете без гида, обязательно возьмите карту и навигатор. <br>
 Первые 5 км от посёлка дорога ровная. Дальше появляются лужи, осложняющие путешествие. Вода в них не высыхает. В дожди глубина составляет 60 см и более. Размеры от 5 до 19 метров и больше. Далее следует несколько мостиков из дерева и автостоянка. Говорят, что при подъёме на гору самовозгораются машины, но научных доказательств данного явления нет. <br>
Следующая остановка находится около Смерть-горы. Её путают с Воттоваара, но они разные. Первая получила название из-за гибели множества солдат, защищающих Россию от фашистов. Там же находится обелиск погибшим героям. Дорога до нужной вершины идёт в другом направлении. На Воттоваару поднимаются на автомобиле, если нет грязи. Добраться до вершины в слякотный день за рулём невозможно, поэтому рекомендуется оставить машину у подножья и подниматься пешком.<br>
Для подъёма есть ступеньки. По пути встречается болото, поэтому туристы надевают сапоги и поднимаются дальше по кочкам. Опасность представляют гадюки, комары. На вершине лежат огромные камни. Вокруг гигантских обломков располагаются деревья странной формы, словно поломанные рукой великана. Есть и птицы. Многие разломы смотрятся странно. Ни одно землетрясение не создаст такие ровные линии. Неудивительно, что о горе так много слухов, но она интересна тем, кто верит в сверхъестественное или хочет побывать в необычном месте.<br>
</p>
</div>
<?php echo $initNews; ?><!--вывод Блог ленты  -->
                <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
                    <h3 class="mb-4">Фото с рыбалки у нас</h3>
<img class="col-md-12 ftco-animate" src="images/articles/1502.webp" alt="Фото рыбалки Карелия">
 <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
     </div>

<p class="color-black"align="justify">Рыбная природа Карелии разнообразна. Щука, налим, судак, – далеко не полный список того, что привлекает рыболовов в холодный край. Специального разрешения на ловлю в Ладожском озере не требуется, но в сезон нереста рыбалка частично запрещена. Кроме того, в Ладоге не разрешается использовать электрошок или сеть, так что любителями порыбачить вооружаются удочками.<br>
На берегу базы отдыха ловят рыбу, но не все разновидности. Помните, что незаконный вылов форели, лосося грозит штрафами вплоть до запрета заниматься подобной деятельностью. Зато на Ладожском озере ловят налима, щуку, сазана, иногда форель.<br>
Весной увеличивается шанс поймать плотву. Она собирается ближе к берегам и становится активной. Тем, кто приезжает летом, стоит рассчитывать на окуней. Они получаются особенно вкусными, если из зажарить или приготовить на гриле. Осень время судака и щуки. К этому времени они набирают жир и вес. Зимой не стоит выходить на тонкий лёд, особенно там, где он не замерзает. В холодное время года удача улыбается любителям донных рыб.<br>
Самой популярной у рыбаков становится корюшка. Она ловится на крючок и обитает недалеко от берега. Если вы забыли приобрести рыболовные снасти, у нас их можно взять напрокат и найти наживку. Это сделает рыбалку интересной и поможет вернуться в номер с богатым уловом, приготовив трофеи для себя и близких. Свежая, озёрная рыбка обретает особенный вкус, если её замариновать и запечь на гриле с хрустящей корочкой.<br>
Наши гости поймали много вкусных и крупных особей, сфотографировав их для родных и друзей. Многие из них даже соревнуются между собой размерами трофеев. Мы делаем всё, чтобы ваша рыбалка принесла удовольствие и пользу.</p>
</div>
                <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
                    <h3 class="mb-4">Где искать нашу базу отдыха и домики в Карелии на карте + инструкция</h3>
<img class="col-md-12 ftco-animate" src="images/articles/1503.webp" alt="Фото рыбалки Карелия">
 <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
     </div>

<div class="col-md-12 heading-section ftco-animate">
                <p class="color-black"align="justify">Дома для отдыха «Сонный залив» располагаются в посёлке Нукутталахти на берегу Ладожского озера. Удобное местоположение позволяет быстро добраться к карельским достопримечательностям, выбрав подходящий тип отдыха от рыбалки до пляжа. В 4 километрах находится центр Сортавала и в 37 км от парка Рускеала. До базы добираются на личном автомобиле, такси, расположенном на ЖД вокзале. <br>
Небольшие коттеджи, построенные на берегу озера, вписываются в окружающий ландшафт, создавая уютную домашнюю атмосферу. В них удобно расположиться семьёй или большой компанией, в том числе и с детьми. Каждый домик имеет уникальное название и дизайн.<br>
               В них есть всё, что нужно для комфортного времяпровождения:<br>
               •	Кровати <br>
•	Интернет<br>
•	Телевизор<br>
•	Душ<br>
•	Холодильник<br>
•	Стиральная машина<br>
•	Плита<br>
•	Мангал для мяса и рыбы<br>

             В некоторых домах предусмотрены тёплый пол и кондиционер, что сделает проживание комфортным. В некоторых домиках есть купель и сауна. Каждый посетитель может оставить автомобиль в припаркованном месте. При желании гости арендуют лодку, сауну, баню или купель.<br>
             Заказать у нас домик нет ничего проще. Достаточно выбрать дату заезда, указать количество человек, в том числе и с детьми, на сколько дней вы собираетесь остановиться. На сайте вам откроются доступные варианты и названия домов. Просмотрев фотографии, вы детально ознакомитесь с каждым из них. Под снимком указаны преимущества номера и то, что в нём есть. Если останутся вопросы, задайте их нашему консультанту в чате.<br>
Мы находимся по адресу: Россия, Республика Карелия, Сортавальское городское поселение, п. Нукутталахти, ул. Центральная. На сайте указаны контактные данные, в том числе и адрес электронной почты, страницы в социальных сетях. </p>
</div>
                <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
                    <h3 class="mb-4">Аренда коттеджа в Карелии на берегу озера</h3>
                    <img class="col-md-12 ftco-animate" src="images/articles/1504.webp" alt="Аренда коттеджа Карелия">
 <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
     </div>
     </div>
<div class="col-md-12 heading-section ftco-animate">
                <p class="color-black"align="justify"Вы никогда не задумывались, почему все гостиницы и коттеджи Карелии имеют не больше 1-2 этажей? А домики стоят отдельно друг от друга на одной территории? Это связано с тем, что застройщики разрабатывали проекты, благодаря которым каждый будет чувствовать себя как дома. Вот несколько советов, как подобрать коттедж под своим потребности.<br>
С любовью к природе. Разработчики проектов домов задумывались не только о том, чтобы в каждом номере было всё необходимое, но и о природе. При строительстве специально были выбраны локации, чтобы вы могли любоваться озером или соснами, закатами и рассветами. При создании более высоких зданий такой эффект невозможно получить. Масштабные мегаполисы не дали бы наслаждаться природой. Вот почему все наши коттеджи содержат не больше 2 этажей.<br>
Разнообразие отдыха. Создавая дома, мы учитывали все потребности посетителей, объединив любителей пеших прогулок, созерцания на веранде и банных процедур в комфортные и красивые номера. В каждом доме есть всё, что нужно с расчётом на любые потребности. При этом в каждом коттедже есть комнаты разной вместимости, где располагаются как двое влюблённых, так и большая и дружная семья или компания.<br>
Почему интересно жить на берегу озера. Созерцание воды успокаивает нервы и восстанавливает силы. Вот почему люди на уровне интуиции ищут водоёмы, чтобы просто смотреть на них, а в тёплое время годы купаться. Коттедж на берегу озера позволяет прогуляться по берегу в любое время года и суток. Вы даже просто можете сидеть в кресле, пить чай и смотреть через окно на волны.<br>
Наши преимущества аренды. Арендуя коттедж у нас, вы обретаете несколько преимуществ. Во-первых, широкой ценовой диапазон. На сайте указана минимальная и максимальная стоимость суточной аренды. Во-вторых, гибкая система бронирования и оплаты. Если поездка срывается, деньги вернут за 2 недели до выбранной даты. Узнайте больше о наших преимуществах на главной странице сайта.<br>
</p>
</div>
</div>
   <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
<h3 class="mb-4">Почему советуем снять домик в Карелии на берегу озера у нас</h3>

<div class="col-md-12 heading-section ftco-animate">
                <p class="color-black"align="justify">Расположение и обустройство дома напрямую влияет на комфорт его обитателей. Мы учитываем все пожелания клиентов. Существует несколько причин, почему туристы выбирают нас. <br>
Вдали от шума. В Карелии непросто найти тихое место, близкое к крупным населённым пунктам и городам. База «Сонный залив» находится в удобной локации, где легко наслаждаться природой и одновременно получить доступ к важным объектам и достопримечательностям. <br>
Чистый воздух. Все домики «Сонного залива» построены на береговой линии Ладожского озера среди хвойных деревьев, которые очищают пространство. Вот почему здесь легче дышать, набираться сил. В поисках комфортного отдыха туристы устремляются сюда, чтобы прикоснуться к первозданной природе. Коттеджи базы сделаны из экологически чистых материалов.<br>
Комфортные номера. В каждом из них есть всё, что нужно для комфорта в современной обстановке. Техника, возможность приготовить еду, постирать одежду, насладится банными процедурами или воспользоваться интернетом, телевизором.<br>
Лодки напрокат. На них отправляются не только ловить рыбу, но и путешествовать по озеру. Есть причал для катера, где отправляются на экскурсии по воде. Туристы отправляются исследовать водное пространство, архипелаги и острова. Из базы отдыха удобно отправляться на Валаам или в другие места, в том числе и туда, где заметно северное сияние.<br>
Вежливый персонал. Мы выбираем только доброжелательных сотрудников, умеющих работать с людьми. Наши люди ответят на все вопросы, помогут разместиться и уладить неприятные ситуации, если они возникают.
</p></div>
</div>
   <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
<h3 class="mb-4">Снять дом в Карелии на новый год</h3>
<div class="col-md-12 heading-section ftco-animate">
                <p class="color-black"align="justify">Зимой природа этих мест обретает особые краски. Контрастные силуэты хвойных деревьев становятся ещё острее на фоне снега. Вдали, как зеркало, отражает небо незамёрзшая гладь озёр. Днём романтичны прогулки на природе, а ночью северное сияние. Вот почему стоит снять дом в Карелии на Новый год.<br>
Увидеть настоящую зиму. Современный климат перестраивается, поэтому на юге нет снежинок. Уйти от сезона дождей, полюбоваться зимой, прочувствовать её красоту можно только в Карелии. Огромные сосны и ели с лапами снега, белоснежные простыни, растянувшиеся на много километров – то, что стоит увидеть хотя бы раз в жизни тем, кто живёт в неснежных уголках страны.<br>
Полюбоваться северным сиянием. В Карелии это явление видят при слабом, по сравнению с другими регионами, морозе. Тем, кто хочет проникнуться атмосферой зимы, стоит снять дом в Карелии на Новый год. И увидеть своими глазами явление, собирающее тысячи фотографов в звёздной ночи.<br>
Возможность попробовать изысканные деликатесы. Суровые условия, разнообразная природа веками заставляли карельцев выживать, употребляя дары леса и моря. В результате их кухня обрела особый колорит, который не повторил никто больше в мире. Наваристая уха с красной рыбой, калитки с северными ягодами, изысканные деликатесы из оленя, пельмени с рыбой можно попробовать только здесь. Увы, такие блюда не способны повторить даже шеф-повара из лучших ресторанов мира. В Новый год часто проходят фуршеты, дегустации местной кухни, не говоря о том, что на изыски распространяются скидки.
</p>
</div>
</div>
   <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
<h3 class="mb-4">Аренда коттеджа в Карелии с камином и кондиционером</h3>
                    <img class="col-md-12 ftco-animate" src="images/articles/1505.webp" alt="Аренда коттеджа в Карелии с камином и кондиционером<">
 <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
     </div>
     </div>
<div class="col-md-12 heading-section ftco-animate">
                <p class="color-black"align="justify">  Настоящая зима сурова, но никто этого не заметит, если снимет домик с камином, кондиционером и тёплым полом. Вот почему в Карелию рвутся те, кто хочет отдохнуть, окунувшись в атмосферу домашнего уюта. <br>
Кондиционер включается летом, когда за окнами жарко. Это комфортно для туриста, который плохо переносит зной. И, хотя дневная температура редко поднимается выше 20 °C, гость этого не ощущает. В каждом из наших коттеджей есть сплит-система, помогающая перенести палящие лучи летнего солнца.<br>
А как зимой? В это время года дневные морозы опускаются до -15 °C, а ночью становятся ещё крепче. Но посетители не ощущают этого, даже любуясь на звёзды из номера. В комнатеах используется особый утеплённый пол, по которому босиком ходят. Другие системы обогрева работают не хуже. В некоторых коттеджах есть камин. Он создаёт особо уютную атмосферу, позволяя чувствовать тепло зимой. Игрой огня любуются бесконечно. Узнайте, как арендовать апартаменты с камином на нашем сайте.
 </p>
</div>

                <p class="color-black"align="center">Выбрать даты для аренды индивидуального дома можно по кнопке ниже</p>
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
    "url": "https://sonniyzaliv.ru/karelia-domiki",
    "name": "Карельские домики и отдых на природе  | Сонный Залив Сортавала",
    "description": "Карельские домики и отдых на природе, Воттоваара - как добраться, Фото с рыбалки у нас, Где искать нашу базу отдыха и домики в Карелии на карте + инструкция, Аренда коттеджа в Карелии на берегу озера, Почему советуем снять домик в Карелии на берегу озера у нас, Снять дом в Карелии на новый год, Аренда коттеджа в Карелии с камином и кондиционером",
    "inLanguage": "ru-RU",
    "offers": {
        "@type": "Offer",
        "priceCurrency": "RUB",
        "availability": "https://schema.org/InStock"
    },
    "image": [
        "https://sonniyzaliv.ru/images/articles/1501.webp",
        "https://sonniyzaliv.ru/images/articles/1502.webp",
        "https://sonniyzaliv.ru/images/articles/1503.webp",
        "https://sonniyzaliv.ru/images/articles/1504.webp",
        "https://sonniyzaliv.ru/images/articles/1505.webp"
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
