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

    $title = 'Острова Карелии  | Сонный Залив Сортавала';
    $descr = 'Острова Карелии Остров Валаам База Остров Сортавала Карелия Острова Валаама Скитский остров Скит Всех Святых Остров Пуатсари Московскому острову Смоленский скит Остров Тулолансаари Гранит на Ладоге';
    $keywords = 'Посмотреть Острова Карелии Поездка на Остров Валаам База Остров Сортавала Карелия Острова Валаама Скитский остров Скит Всех Святых Остров Пуатсари Московскому острову Смоленский скит Остров Тулолансаари Гранит на Ладоге';

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

    <link rel="canonical" href="https://sonniyzaliv.ru/ostrova-karelii"/>

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
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/articles/12back.webp');" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate pb-5 text-center" style="margin-top: 100px;">
              <h1 id="act-form" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Острова Карелии</h1>
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
                    <h2 class="mb-4">Острова Карелии</h2>
                    <p>Информация, которая будет Вам полезна при выборе места для отдыха</p>
                </div>
            </div>

            <div class="col-md-12 heading-section ftco-animate">
                <p class="color-black">Карелия – островное государство. Жемчужиной этого прекрасного государства называют самый большой остров на севере Ладожского озера – Валаам.<br> </p>

<img class="col-md-12 ftco-animate" src="images/articles/1201.webp" alt="Острова Карелии Валаам ">
 <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
     </div>
    <?php echo $initNews; ?><!--вывод Блог ленты  -->
                 <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
<h3 class="mb-4">Остров Валаам </h3>
</div>
  <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
<p class="color-black"align="justify">Это тихий уютный остров в составе одноименного архипелага. Он известен необычной   красотой северной природы, интересной историей, потрясающей архитектурой и удивительной духовностью.  Подплывая к нему по воде, видим живописную бухту, скалистые каменные берега, покрытые мхом, под огромными соснами папоротники небывалой величины.<br>
Многовековые сосны наполняют воздух целительной силой. Красивые памятники архитектуры гармонично вписываются в природный ландшафт. Святость и любовь к миру поселились на острове во благо живущим здесь и прибывающим на эту благословенную землю. Интерес верующих и неверующих вызывают православная история, прекрасная архитектура острова. <br>
В настоящее время на острове действует Свято-Преображенский мужской монастырь, который с XV века стал центром христианской веры на Русском Севере. Он стоит на месте захоронения первых проповедников православия на Валааме. Во время крещения Руси остров был освящен Андреем Первозванным <br>
Архитектурный комплекс, которым сегодня любуемся, выстроен гораздо позже – в XIX веке. Средневековые строения на острове не сохранились. Часть была разрушена во время финской войны 1940 года. Первая мировая война, набеги шведов тоже опустошили святые места.<br>
В 1989 году сюда прибыли первые православные поселенцы и с этого момента началось восстановление.  Монастырь получил независимый статус и подчиняется непосредственно Синоду. В обители хранятся мощи живших здесь святых старцев.<br>
Перед туристами на острове встают красивые храмы, скиты, божественные сады. Экскурсии обычно начинаются с Центральной усадьбы монастыря, затем продолжаются в Никольскиом ските – Северном Иерусалиме,  Воскресенском ските. Популярны на острове пешие прогулки. Много экскурсий организуются на водном транспорте, они тоже высаживаются  на остров.<br>
Живописная монастырская бухта принимает метеоры с туристами. Белоснежный пятиглавый Свято-Преобоаженский собор с голубыми куполами, высокой колокольней виден уже далеко на подходе к острову. На территории  есть уютные красивые часовни, прекрасные яблоневые сады, выращенные на суровой каменистой земле заботливыми руками монахов. С колокольни открываются завораживающие виды Монастырской бухты.<br>
Стоит посетить Никольский скит, купола которого видны здесь с любой точки воды и суши. К нему ведет мост. От причала надо подняться по 60 гранитным ступеням. <br>
Воскресенский (Красный) скит возвышается над бухтой. Посетите храм, зайдите в «кувуклию». Он во всем повторяет часовню в Иерусалиме, в котором хранится Гроб Господень. <br>
Знаменскую часовню часто называют Царской. Построенная во второй половине XIX века, она освящена в честь иконы Божией матери. Здание из мрамора и гранита – настоящее произведение искусства, архитектурный памятник, украшенный резьбой, позолотой. В часовне находится икона пресвятой Богородицы. На задней стене изображен лик святого Александра Невского.<br>
Самая молодая – часовня Ксении Петербургской – из мрамора, с великолепными иконами в мозаике.  Поклонитесь святым, почувствуйте особую атмосферу места.<br>
Памятник апостолу Андрею Первозванному сооружен  к 1025-летия Крещения Руси. По преданию, апостол посетил остров в первом веке от Рождества Христова и обратил местных жителей в христианство. Язычники  убрали капища – места жертвоприношения богам – и  приняли новую религию. <br>
Можно посетить Водопроводный дом, Конюшенный дом, Смоляной завод, прогуляться по Пихтовой аллее, полюбоваться красотой Верхнего сада. Садов на острове целых три. От хвойного аромата здесь кружится голова. Интересно пройтись по тропе водоноса и представить, как трудно было подниматься по нему с полным бидоном. <br>
Все самое интересное на этом крошечном острове можно посмотреть за один день. Если приехали на 3-4 дня, будет предостаточно времени погулять по многочисленным тропам и посетить некоторые острова архипелага, увидеть своеобразную красоту северной карельской природы, познакомиться с жизнью скитов, почувствовать особую атмосферу островного государства.<br>

</p>
<img class="col-md-12 ftco-animate" src="images/articles/1202.webp" alt="Острова Карелии Валаам ">
 <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
     </div>

<p class="color-black"align="justify">Остров Пуатсари привлекает маленьким скитом, восстановленным Александром II, небольшой церквушкой святых Германа и Сергия. Это живописный уголок, где мало народу, здесь ощущаешь покой и умиротворение.<br>
 От Смоленского скита переходят вброд к Московскому острову, на котором расположен Коневский скит. Мостов здесь давно нет.  Летом вода редко бывает по пояс.</p>
<img class="col-md-12 ftco-animate" src="images/articles/1203.webp" alt="Острова Карелии Валаам ">
 <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
     </div>

</p>

</div>
                <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
                    <h3 class="mb-4">База Остров Сортавала Карелия</h3>
<div class="col-md-12 heading-section ftco-animate">
                <p class="color-black"align="justify">«Остров» – это гостевые дома на острове Риеккалансаари на берегу Ладожского побережья. В гостеприимной базе можно отлично отдохнуть. Хвойный лес здесь подступает прямо к берегу, комфортные современные дома со всеми удобствами, оснащенные всем необходимым, хороши для спокойного отдыха в стороне от шумных мегаполисов и поселений. <br>
                Находится база в 10 минутах езды на машине от центра города Сортавала, но ничто не напоминает о близости города, не слышно городского шума, нет никаких человейников. Сюда приезжают для уединенного отдыха в тишине. Поэтому на базе не приветствуются шумные компании.
Созданы условия для неспешных прогулок вдоль озера, активного отдыха  для любителей водных прогулок, серфинга, рыбалки.<br>
Коттедж можно арендовать и на один день, и на длительное время. <br>
Сортавала – ближайший город от острова Валаам. Находится он в 40 км от острова. Зимой из Валаама до Сортавалы нетрудно добраться по льду на машине. До 1918 года город назывался Сердоболь. «Сортавала» означает «власть черта». По одной из версий, именно сюда бежала нечистая сила, изгнанная с острова монахами.<br>
Такое расположение базы отдыха «Остров» удобна для путешественников, направляющихся на Валаам. Здесь можно переночевать и рано утром отправиться к своей цели водным транспортом. <br>
Размещение в Доме паломника или Доме художника максимально комфортное. Есть спальни с двуспальными и односпальными кроватями, дополнительные места на диване в гостиной.
На кухне есть необходимая техника для приготовления пищи и сервировки. Продукты можно купить в магазине на базе или заказать доставку. <br>
Для отдыхающих организован комфортный досуг, есть аренда спортивного снаряжения, прогулочных лодок, удочек для рыбаков. Зимой можно взять на прокат снаряжение для подледного лова, лыжи и т.п.<br>
</p>
</div>
<h3 class="mb-4">Острова Валаам</h3>
<div class="col-md-12 heading-section ftco-animate">
                <p class="color-black"align="justify">
Островов на территории архипелага более 50. Посещение некоторых входит в экскурсионную программу по Валааму.<br>
У  самого входа в Монастырскую бухту проплываете скит, что стоит на  крошечном Никольском острове. До монастыря остается 4 км. Он соединен с дорогой, ведущей к Валааму, деревянными мостами. Некогда он выполнял функцию таможенного досмотра, где монахи проверяли прибывающие суда. Не пропускали «бесовское», отбирали и ликвидировали табак и спиртные напитки, а нетрезвых отправляли на о. Пьяный и держали там до тех пор, пока не протрезвеют.<br>
На Скитский остров можно попасть по берегу Монастырской бухты через мост. Это второй по величине остров после Валаама. Посетите Скит Всех Святых, самый старый на архипелаге. Монахи в скиту соблюдают суровые законы. Три дня в неделю у них день сурового поста и молчания. Женщин сюда пускают только на ежегодный престольный праздник Всех святых. В понедельник и пятницу скит закрыт, это дни поста.<br>
Здесь увидите знаменитую сосну Шишкина и погуляете по аллее вековых дубов.<br>
Остров Пуатсари привлекает маленьким скитом, восстановленным Александром II, небольшой церквушкой святых Германа и Сергия. Это живописный уголок, где мало народу, здесь ощущаешь покой и умиротворение.<br>
От Смоленского скита переходят вброд к Московскому острову, на котором расположен Коневский скит. Мостов здесь давно нет.  Летом вода редко бывает по пояс.<br>

</p>
</div>
<h3 class="mb-4">Остров Тулолансаари</h3>
<div class="col-md-12 heading-section ftco-animate">
                <p class="color-black"align="justify"Это большой остров, уступающий по величине только Валааму. Здесь испокон веков добывали гранит, идущий на строительство памятников архитектуры Санкт-Петербурга. Красивый уголок природы полюбился художнику Н.К. Рериху. Он приехал на остров лечиться и создал несколько своих шедевров. Поэтому остров называют колыбелью искусства.<br>
На острове Тулолансаари есть богатые залежи кварцита, сланца, гранита очень красивых фактур и расцветок, встречаются самоцветы. По мнению ученых, запасов гранита здесь около 10 млн. кубометров. Возможно, добыча природного камня велась здесь еще во времена шведов в 17 веке. В 19 веке каменоломни принадлежали А.А.Баринову, который открыл в Северной столице камнерезные мастерские для изготовления изящных памятников и пьедесталов. <br>
Многие роскошные архитектурные памятники обеих российских столиц своим происхождением обязаны острову на севере Ладожского озера. Русский скульптор А.И. Теребенев долго искал материал для постаментов атлантам Эрмитажа и нашел совершенно случайно во время прогулки по острову. Гранит серого цвета с редким голубым отливом, добытый на горе Руотсенкаллио, отправился в Санкт-Петербург на строительство архитектурных шедевров.<br>
Гранит на Ладоге давно не добывают, каменоломни заброшены. но хорошо сохранились. Туристы любуются красивыми гранитными скалами, окруженными многовековыми соснами. Эти огромные деревья с красной древесиной благородного оттенка раньше использовались в строительстве судов.<br>
Чистый воздух, завораживающие закаты, красота природного ландшафта острова привлекают туристов со всего мира. Целебный воздух Тулолансаари, увлажненный и прохладный, способствовал оздоровлению великого художника Рериха, климат помогал в лечении легких. Особенно ему нравились захватывающие дух контрасты леса, камня и воды. Вдохновение дарили карельские легенды и предания. Художник считал, что северная природа и местные жители взращивают в нем чувство прекрасного.<br>
</p>
</div>

<img class="col-md-12 ftco-animate" src="images/articles/1204.webp" alt="Прокат Карелия ">
 <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
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
    "url": "https://sonniyzaliv.ru/ostrova-karelii",
    "name": "Острова Карелии  | Сонный Залив Сортавала",
    "description": "Острова Карелии Остров Валаам База Остров Сортавала Карелия Острова Валаама Скитский остров Скит Всех Святых Остров Пуатсари Московскому острову Смоленский скит Остров Тулолансаари Гранит на Ладоге",
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
