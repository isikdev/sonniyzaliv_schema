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

    $title = 'Карельские достопримечательности | Сонный Залив Сортавала';
    $descr = 'Валаам острова, Веревочный парк в Карелии, Видлица достопримечательности, Достопримечательности Карелии, Достопримечательности Лодейного Поля, Киркколахти зоопарк, Ладожская орнитологическая станция, Лодейнопольский историко-краеведческий музей, Зоопарк в Карелии Рускеала (рядом с Мраморным Сортавала, цена и расписание), Зоопарк в Карелии (рядом с Мраморным Сортавала), Зоопарк черные камни Карелия (официальный сайт)';
    $keywords = 'Достопримечательности Карелии,Валаам острова, Зоопарк черные камни Карелия (официальный сайт) Видлица достопримечательности, , Достопримечательности Лодейного Поля, Киркколахти зоопарк, Ладожская орнитологическая станция, Лодейнопольский историко-краеведческий музей, Зоопарк в Карелии Рускеала (рядом с Мраморным Сортавала, цена и расписание), Зоопарк в Карелии (рядом с Мраморным Сортавала), Зоопарк черные камни Карелия (официальный сайт)';

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

    <link rel="canonical" href="https://sonniyzaliv.ru/karelia-dostoprim"/>

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
   <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/monastyr-shery/3.webp');" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate pb-5 text-center" style="margin-top: 100px;">
              <h1 id="act-form" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Карельские достопримечательности</h1>
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
                    <h2 class="mb-4"> Карельские достопримечательности</h2>
                    <p>Информация, которая будет Вам полезна при выборе места для отдыха</p>
                </div>
            </div>
            <div class="col-md-12 heading-section ftco-animate">

                <p class="color-black">Карелию по праву можно назвать музеем под открытым небом. Сотни озер, уникальные леса, Ладожские Шхеры. Его как будто создала сама мать-природа.
Здесь переплелись судьбы многих народов. Поэтому богата карельская земля не только природными, но и культурными сокровищами. Посетив местные музеи, которых здесь очень много, вы сможете узнать историю этого уникального региона, а шедевры деревянного зодчества совершенно точно не оставят вас равнодушными.
</p>
                <div class="row d-flex pt-3 pb-5">
                    <img class="col-md-12 ftco-animate" src="images/articles/401s.webp" alt="Пейзаж Карелия">
                </div>
   <?php echo $initNews; ?><!--вывод Блог ленты  -->
                 <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
                    <h3 class="mb-4"> Валаам священный остров</h3>
                </div>
                                <div class="row d-flex pt-3 pb-5">
                    <img class="col-md-12 ftco-animate" src="images/articles/401.webp" alt="Валаам">
                </div>
                <p align="justify">Валаам представляет собой церковный комплекс, местом расположения которого являются несколько островов.  Валлам знаменит прежде всего своим монастырским хозяйством.
Если верить информации, которая была получена в ходе исторических исследований, первыми поселенцами в этих краях были финно-угорские племена. Позднее эту территорию заселили племена карелов. Первыми христианами, которые ступили на эту землю, стали Сергий и Герман. Именно им они и считаются создателями братства монахов.
Если верить древней легенде, еще задолго до этих событий, самим апостолом Андреем Первозванным был здесь был установлен крест, сделанный из камня.   Собственно, это и символизирует основание монастыря. При этом у специалистов в области исторической науки отсутствует какое-либо единое мнение по поводу даты образования обители.
История острова ознаменовалась множеством разных событий.<br>
Захват земель шведами.<br>
Возрождение монастыря и прилегающих к нему построек.<br>
Посещение монастыря императором Александром Первым.<br>
Начало возведения Спасо-Преображенского собора в 1889 году.<br>
Пребывание Валаама в составе Финляндии в период с 1811 по 1917 годы.<br>
Пребывание Валаама до 1940 года в составе Финляндии.<br>

Потому как Валаам – это острова, посетить Валаам можно на метеоре или на небольших частных катерах. По причине частых штормов многие рейсы на Валаам отменяются уже в конце лета. А когда наступают первые заморозки Валаамские острова становятся полностью отрезанными от цивилизации.</p>

            <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
 <a href="https://wa.me/79811878002"style="font-family:times new roman;color:red;font-size:32px">Клик Whatsapp - заказ катера "День в день" на сегодня или на любую более позднюю дату с 09:00 до 20:00. Заказ экскурсии</a> </div>

 <p align="center">Выбрать даты для аренды дома в Сортавала можно по кнопке ниже</p>

            <div class="row d-flex">
                <div class="conf-btn" style="padding-top: 5px;"><a href="#" <?/*id="reserve1" */?> data-tl-booking-open="true" class="btn btn-primary py-3 px-4 ftco-animate"><i class="ion-ios-calendar"></i> Забронировать</a></div>
            </div>
    </div>
                 <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
                    <h3 class="mb-4"> Веревочный парк в Карелии</h3>
                </div>
                                 <div class="row d-flex pt-3 pb-5">
                <img class="col-md-12 ftco-animate" src="images/articles/402.webp" alt="Веревочный парк">
                </div>


     <p align="justify">Здесь чрезвычайно увлекательно отдохнут мальчишки и девчонки,  а также их родители. Основная отличительная особенность - пруд, в котором плавает форель. Увидеть рыб с высоты можно в момент прохождения главной трассы. Потому что она проходит непосредственно над водоемом.
На сегодняшний день здесь имеется две трассы. Первая предназначается для детей от пяти до семи лет. Состоит она из 7 спортивных этапов, каждый из которых можно пройти без какого-либо труда. Если ребенок в здесь впервые, мы рекомендуем попробовать силы на ней.
Вторая предназначается для ребят, возраст которых более 7 лет. Она включает в себя одиннадцать этапов. Максимальная длина сорок два метра с пролетом над водой. Каждый из этапов очень интересен и отличается своеобразием. Для семейного прохождения следует выбирать именно ее.
Можно устроить на ней соревнования, а также сфотографироваться. Снаряжение фирменное и проходит проверку каждый день. Страховка уникальная, непрерывная. Возможность ее случайного отстегивания исключена.</p>
        <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
                    <h3 class="mb-4"> Видлица достопримечательности</h3>
                </div>
            <div class="row d-flex pt-3 pb-5">
                <img class="col-md-12 ftco-animate" src="images/articles/403.webp" alt="Видлица достопримечательности">
            </div>


        <p align="justify">  Это село на берегу речки  Новзема, расстояние до Ладоги досюда всего лишь 1.5 км, расстояние до Олонца - сорок километров. Со всех сторон это село окружено необычайно красивыми лесами. Жители хранят здешнюю культуру. Здесь есть замечательный религиозный объект - храм в честь святого великомученика Георгия Победоносца, который был воссоздан на основе древних чертежей. Братское захоронение участников Великой Отечественной Войны. На данный момент в братской могиле, расположенной в левой части мемориала, захоронены 1350 воинов 7-й армии Карельского фронта, погибших в годы Великой Отечественной войны.Среди них - солдаты и офицеры частей Южной (Олонецкой) оперативной группы, павшие в оборонительных боях на рубеже рек Видлица и Тулокса в конце июня - начале сентября 1941 года.Памятник установлен в 1974 году. Автор проекта - скульптор Л. Ф. Ланкинен </p>
           <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
                    <h3 class="mb-4"> Достопримечательности Карелии</h3>
                </div>
          <p align="justify">Говоря о местных достопримечательностях, нельзя не отметить каскад из нескольких водопадов, имеющий гранитные выступы, окруженные соснами. В советские времена на этих водопадах снималось очень много художественных фильмов, которые впоследствии получили статус культовым. Например, фильм «А зори здесь тихие».
При наличии у вас такого желания, вы сможете отправиться по экологическому маршруту «Аллея сказок».  Однако сразу же необходимо отметить, что это путешествие оплачивается отдельно.  В ходе путешествия вам встретятся скульптуры героев сказок, которые сделаны из древесных пород, а также домик тетушки Совы.
Если вы решили провести свой отпуск в Карелии, то вам однозначно стоит прогуляться по тайным тропкам земли Калевала. </p>
     <div class="row d-flex pt-3 pb-5">
                <img class="col-md-12 ftco-animate" src="images/articles/404.webp" alt="Веревочный парк">
            </div>
   <p align="justify"> Здесь можно полюбоваться отвесными скалами.  В период с конца весны до середины осени работает пункт проката лодок.
Обязательно посетите пещеры «Рускеалы». Этот туристический маршрут, который был открыт семь лет назад, просто поражает своей красотой. Особый интерес представляет колонный зал. Стены подсвечиваются, что создает поистине волшебную атмосферу.
После экскурсии можно перекусить в уютном кафе или же приобрести сувениры, которые мастера изготавливают из таких разновидностей материалов как лен, камен, а также древесные породы.</p>
       <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
                    <h3 class="mb-4"> Достопримечательности Лодейного Поля</h3>
                </div>
     <div class="row d-flex pt-3 pb-5">
                <img class="col-md-12 ftco-animate" src="images/articles/405.webp" alt="Веревочный парк">
            </div>
      <p align="justify">Очень много зданий, а также сооружений, которые имели очень большое значение для истории, оказались полностью уничтоженными, разрушенными в результате бомбардировок, а также авианалетов. Однако очень многое и уцелело, было восстановлено после войны.
К дошедшим до наших дней достопримечательностям Лодейного поля можно отнести памятник Петру Великому, который на сегодняшний день считается символом города. Собственно, он его основал.
В сквере Корабелов 2020 г. был построен  дом Петра I. Изначально планировалось воссоздать копию того, дома, к котором Император останавливался в одна тысяча семьсот втором году. Однако по причине отсутствия его описания пришлось остановиться на реконструкции. Но по тому же образцу было возведено еще одно здание — домик царя в Коломенском (Москва). Его и взяли за основу.</p>
     <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
                    <h3 class="mb-4">  Ладожская орнитологическая станция</h3>
                </div>
        <div class="row d-flex pt-3 pb-5">
                <img class="col-md-12 ftco-animate" src="images/articles/406.webp" alt="Орнитологическая станция">
            </div>
     <p align="justify">В центральной части заповедника, где раньше располагался населенный пункт Гумбарицы теперь находится Ладожская орнитологическая станция. Где ученые в соответствующей области, а также волонтеры занимаются изучением поведения, а также физиологии перелетных птиц. Как правило, для этой цели ими применяется такая методика как кольцевание. Пернатым на лапы надевается небольшое алюминиевое колечко, на которой указана специальная цифровая информация. Благодаря такой методике можно легко отличить нужную птицу из подобных, определить ее половую принадлежность, а также заводчика. Кольцо для нее это все равно что удостоверение личности для человека.</p>
<div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
                    <h3 class="mb-4">  Лодейнопольский историко-краеведческий музей</h3>
                </div>
        <p align="justify">Экспонаты рассказывают о том, как Петр I создавал здесь Балтийский флот. Корабли очень многих знаменитых морских путешественников были построены именно здесь.</p>
    <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
                    <h3 class="mb-4">  Зоопарк в Карелии Киркколахти зоопарк</h3>
                </div>
         <p align="justify">Крупнейший зоопрак на северо-западе. Строительство было начато в 2011 г., а первого обитателя - это была пума, привезли в 2016 г. С тех пор число обитателей увеличивается ежегодно. Зимой можно арендовать финские сани. Летом действует аренда электросамокатов.

Это уникальное комбинированное сочетание парка развлечений и научного центра. Здесь можно не только увидеть различные виды зверей, но и узнать много интересного о них. Уникальность этого заведения состоит в том, что его основная цель – сохранение дикой природы и образование людей о важности бережного отношения к окружающей среде.
Входной билет для взрослых стоит всего 300 р, для детей 200 р, семейный обойдется всего в 700 р. Заведение открыто каждый день, с понедельника по воскресенье, с 10:00 до 19:00.
Это место окружает лес. Его месторасположение -  сохраненный природный ландшафт, обладающий следующими отличительными особенностями:<br>
•	естественность рельефа земли, <br>
•	нетронутые деревья,<br>
•	искусственные водоемы.<br>
Здесь обитают олени, пони.  Подавляющее большинство из них можно покормить, а также погладить при наличии у вас такого желания.
Зоопарк черные камни Карелия yаходится на расстоянии 278 километров от города Петрозаводска. Название происходит от туристической базы, на территории которой он расположен. Общая площадь почти 10 Га. Около ворот имеется огромных размеров парковка. На входе продают корм для животных. Еще здесь продаются сувениры работы здешних мастеров.
Как именно идти, и куда именно идти вы решаете самостоятельно. Можно заказать экскурсовода, а можно прогуливаться самим. Здесь можно встретить верблюдов, пеккари, страусов, косуль, зубров, оленей, пуму, тигров, сов, ястребов, белок, енотов, страуса по имени Жора, лошадей, альпака, ланей, муфлонов, а также лам. И этот список  далеко не полный.</p>












            <div class="row d-flex">
                <div class="conf-btn" style="padding-top: 5px;"><a href="#" <?/*id="reserve1" */?> data-tl-booking-open="true" class="btn btn-primary py-3 px-4 ftco-animate"><i class="ion-ios-calendar"></i> Забронировать</a></div>
            </div>
          <div class="row justify-content-center pb-4">
                <div class="col-md-12 heading-section text-center ftco-animate">
                <p>Всегда есть выбор где остановиться, чтобы отдохнуть в Карелии. Останавливайтесь в наших домах.</p>
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
    "url": "https://sonniyzaliv.ru/karelia-dostoprim",
    "name": "Карельские достопримечательности | Сонный Залив Сортавала",
    "description": "Валаам острова, Веревочный парк в Карелии, Видлица достопримечательности, Достопримечательности Карелии, Достопримечательности Лодейного Поля, Киркколахти зоопарк, Ладожская орнитологическая станция, Лодейнопольский историко-краеведческий музей, Зоопарк в Карелии Рускеала (рядом с Мраморным Сортавала, цена и расписание), Зоопарк в Карелии (рядом с Мраморным Сортавала), Зоопарк черные камни Карелия (официальный сайт)",
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
