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

    $title = 'Природа и достопримечательности Карелии  | Сонный Залив Сортавала';
    $descr = 'Природа и достопримечательности Карелии, Озеро в Приозерске озеро Вуокса, Остров Валаам, Парк Ваккосалми в Сортавала (официальный сайт), Парк Отель Кружево, Парк Сортавала, Пороги Лосево, Приозерск рестораны, Сонный залив, Северное сияние в Сортавале, Сеть отелей Точка на Карте, Ягоды, которые растут в Карелии, ягода княженика, ягода морошка';
    $keywords = 'Красивая Природа и достопримечательности Карелии, Озеро в Приозерске озеро Вуокса, Остров Валаам, Парк Ваккосалми в Сортавала (официальный сайт), Парк Отель Кружево, Парк Сортавала, Пороги Лосево, Приозерск рестораны, Сонный залив, Северное сияние в Сортавале, Сеть отелей Точка на Карте, Ягоды, которые растут в Карелии, ягода княженика, ягода морошка';

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

    <link rel="canonical" href="https://sonniyzaliv.ru/priroda-i-dostoprim"/>

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
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/articles/14back.webp');" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate pb-5 text-center" style="margin-top: 100px;">
              <h1 id="act-form" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Природа и достопримечательности Карелии</h1>
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
                    <h2 class="mb-4">Природа и достопримечательности Карелии</h2>
                    <p>Информация, которая будет Вам полезна при выборе места для отдыха</p>
                </div>
            </div>

            <div class="col-md-12 heading-section ftco-animate">
                <p class="color-black"align="justify">В этой республике смешались все краски природы. Описать их парой фраз нельзя. Для кого-то Карелия – это реки, озёра, леса и горные ландшафты, для кого-то – лесные ягоды, снег среди огромных сосен. Каждый находит что-то своё в её многообразии. Попробуем рассмотреть этот уникальный клад природы с разных сторон, чтобы каждый нашёл в нём что-то близкое своему сердцу.<br> </p>
                 <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
<h3 class="mb-4">Озеро в Приозерске</h3>
</div>
<img class="col-md-12 ftco-animate" src="images/articles/1401.webp" alt="Озеро в Приозерске">
 <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
     </div>
     </div>

  <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
<p class="color-black"align="justify">Главной достопримечательностью этого города является озеро-река. Самый необычный водоём Карелии, берёт начало от о. Сайма в Финляндии. Воды проходят Ладожское озеро, пороги Лосева, затем образуют озеро Вуокса. В нём насчитывается более сотни островов, а максимальная глубина составляет 25 метров. <br>
Ежегодно туристы приезжают на водоём, чтобы искупаться. У берегов максимальная глубина составляет 1,5 метра. Дно состоит из песка, редко попадаются камни. Вокруг пляжей растут огромные сосны и покоятся крупные валуны. Песочная отмель находится и на острове Каменистом. Остальные острова имеют труднодоступные берега, поэтому к ним не добраться. <br>
С берегов можно увидеть деревянный храм Андрея Первозданного, построенный на скале. Едут к нему на пароме, но он впускает посетителей он только по церковным праздникам.<br>
Летом около озера заполняются пляжи. Днём средняя температура воды составляет 19 °C, но может повышаться до 22. Лучший сезон для купания – с июня по октябрь. Даже несмотря на понижение температуры воздуха вода остаётся тёплой.<br>
</p>
</div>
<?php echo $initNews; ?><!--вывод Блог ленты  -->
                <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
                    <h3 class="mb-4">Остров Валаам</h3>
<img class="col-md-12 ftco-animate" src="images/articles/1402.webp" alt="Остров Валаам">
 <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
     </div>

<p class="color-black"align="justify">Так называют архипелаг, объединяющий более 49 островов на Ладожском озере. Никто точно не знает, откуда он взял необычное имя. Есть версии, что Валаам назвали в честь пророка из Библии, Велеса или Валаала – скандинавского божества.<br>
Известность острову принёс Мужской монастырь, построенный в XV веке. Туристов привлекает не только он, но и множество уникальных церковных построек, в том числе и Спасо-Преображенский собор, скиты, обители монахов. Немаловажную роль играет природа, которая становится особенно живописной осенью, когда листья меняют окраску.<br>
На Валааме нет привычных развлечений. Доступ на некоторые религиозные объекты закрыт для туристов. На острове слушают хор Валаамского монастыря, прогуливаются по Аптекарскому саду, где растёт более 20 сортов яблок. Посетителями доступны храмы Сергия и Германа Валаамских и те объекты, где не живут монашествующие. В некоторые из них разрешено пройти только мужчинам. Миряне располагаются в Паломническом доме. Трапезничают в кафе «Валаамский паломник», «Трапеза в старом саду» и «У певчего поля». Помимо еды, в них продают натуральное монастырское мороженое, калитки, уху, супы и другие изыски местной кухни.<br>
От Сортавалы добираются до Валаама за 50 минут, из Петрозаводска поездка занимает больше часа. Лучшее отдыхать на Валааме летом или зимой, когда погода остановится. Весной и осенью на озере часто случаются штормы, сильная качка.<br></p>
</div>
                <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
                    <h3 class="mb-4">Парк Ваккосалми в Сортавала (официальный сайт)</h3>

<div class="col-md-12 heading-section ftco-animate">
                <p class="color-black"align="justify">Одно из любимых мест жителей и гостей Карелии, где любуются первозданной природой, её красками. В нём не найти аттракционов. Главной достопримечательностью парка является нетронутая флора и гора Судак, напоминающая рыбу.<br>
                    Образовалась она более 2 млрд лет назад из-за землетрясения. На вершину добираются по ступенькам, чтобы с высоты птичьего полёта полюбоваться Ладогой. Многим нравится наблюдать с этой точки за старинным поездом «Рускеальским экспрессом», добавляющим особый колорит атмосфере.<br>
                    Ещё одним интересным местом парка стала беседка для поцелуев. Именно там обожают фотографироваться влюблённые и молодожёны. Издали она кажется ажурной кружевной и нежно вписывается в пейзажи с высокими деревьями.<br>
                    А своё название парк получил благодаря заливу Вакколахти, который находится совсем рядом. Он располагается между озером Айранне и протоком Вакко, открывая красивые панорамы на воду. Именно сюда стремятся приехать не только туристы, но и профессиональные фотографы, чтобы создать уникальные кадры для конкурсов и портфолио.<br>
                    Парк находится в Сортавале на улице Парковая 1.</p>
</div>
                <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
                    <h3 class="mb-4">Парк Отель Кружево</h3>
     </div>
<div class="col-md-12 heading-section ftco-animate">
                <p class="color-black"align="justify"В Ладожском озере много островов. На одном из самых крупных Риеккалансаари находится парк-отель «Кружево», в 15 минутах езды от центра Сортавала. <br>
                    Комплекс занимает 5,5 гектара с сохранением природного ландшафта. Огромные ели, сосны и другие хвойные деревья составляют основную территорию парка. Между ними располагаются 6 таунхаусов, высотой в 2 этажа, 7 одноэтажных коттеджей и ресторан, принимающий всех желающих. Домашняя атмосфера, кружевной дизайн, изысканные блюда, возможность сделать фотосессию на фоне зимней природы привлекают молодожёнов и тех, кто мечтает о комфортном, красивом отдыхе. Блюда готовят в печи. Каждое из них знакомит посетителей с изысками карельской кухни.<br>

На территории парка расположены дорожки, лавочки, фотозоны. Есть пирс, на котором удобно ловить рыбу, горнолыжные трассы, зимний каток, баня.<br>
В каждом номере предусмотрены:<br>
•	Интернет<br>
•	Гостиная с панорамными окнами<br>
•	Двуспальная широкая кровать<br>
•	Необходимая техника, в том числе и стиральная машина, кофемашина<br>
•	Система отопления и охлаждения<br>
•	Ванная и санузлы<br>
•	Парковка<br>
Здесь туристы заказывают экскурсии, в том числе и катание на катере, поездки на Валаам, пешие и индивидуальные прогулки, созданные по маршруту, выбранному посетителями.</p>
</div>
</div>
   <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
<h3 class="mb-4">Парк Сортавала</h3>
<img class="col-md-12 ftco-animate" src="images/articles/1403.webp" alt="Парк Сортавала">
 <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
     </div>
<div class="col-md-12 heading-section ftco-animate">
                <p class="color-black"align="justify">Другое название Рускеала. На этом месте когда-то была каменоломня, но сегодня горный парк вошёл в список культурного наследия страны. Здесь раскрывается природа Карелии с её валунами, отвесными скалами, водоёмами и лесами. Название парка переводится с карельского как «рыжий». Местность получила своё название благодаря водоёмам, рекам и водопадам, имеющим ржавый оттенок. Раньше здесь добывали мрамор, но потом каньоны затопило водой.<br>
Любителям острых ощущений понравится полёт на зиплайне. По прозрачной глади легко путешествовать на лодке. Вода спокойная, прозрачная и не бывает бурной. Подводникам удобно посмотреть на старые самосвалы и затопленные краны. <br>
В Мраморном каньоне снимали клипы и фильмы. В самом парке проходят концерты, праздники. А в ресторанах можно попробовать форель в молоке, местную уху и другие деликатесы, в том числе и калитки с ягодами, ягодные морсы.<br>
Каждый метр Рускеала уникален. Здесь снимают кино, в том числе и мистического содержания, а природные ландшафты помогают создать уникальные снимки. А из Сортавала за час добираются до парка на ретро-поезде Рускеальский экспресс, фотографируя по пути романтичные виды, да и у него самого запоминающийся дизайн и старинный гудок. Поезд пользуется таким большим спросом, что билеты на него лучше планировать заранее.<br>
</p></div>
</div>
   <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
<h3 class="mb-4">Пороги Лосево</h3>
<div class="col-md-12 heading-section ftco-animate">
                <p class="color-black"align="justify">Необычное место, где собираются любители водного экстрима. Именно здесь в 1818 году образовалась река Бурная, образованная искусственно. Управленцы того времени решили соединить два озера Суходольское и Ладожское. В результате баланс нарушился и на месте высохшей протоки образовался первый пролог Лосево. Любые попытки его восстановить и сделать прежним не увенчались успехом. Бурную короткую реку нельзя было изменить. Так образовались пороги Лосево, привлекающие внимание любителей водного туризма. Вода под железнодорожным мостом, проложенным сверху, всегда остаётся бурной.<br>
Рядом с ним расположена база отдыха, где любители экстрима арендуют лодку для катания. Сплавы организуют группами, есть возможность воспользоваться услугами инструктора. На базе есть парковка, беседки, туалеты, и душ. Обязательно предоставляются спасательный жилет и шлем. Купаться здесь не рекомендуется не только из-за опасного течения, но и из-за обломков старых железнодорожных мостов. Но, несмотря на опасность, поток экстремалов не уменьшается. Многие приезжают покататься на лодках целыми семьями.<br></p>
</div>
</div>
   <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
<h3 class="mb-4">Приозерск рестораны</h3>
<div class="col-md-12 heading-section ftco-animate">
                <p class="color-black"align="justify">Этот город стал центром притяжения гурманов. Только здесь наслаждаются кухней Карелии, аналогов которой не существует нигде в мире. Вот какие заведения покорили сердца туристов.<br>
        Точка на карте. Ресторан, расположенный на территории гостиничного комплекса с видом на Ладожское озеро. Деревянный интерьер создаёт уютную атмосферу, а виды на озеро завораживают. Меню создано по традициям карельской кухни. Даже привычные блюда подают с местным колоритом, например, моцареллу с грушей и кедровым орехом. Здесь пробуют голубцы с дичью, фирменный суп, пельмени.<br>
Капитан Морган. Ресторан в морском дизайне, где продуют как традиционные, так и карельские изыски, в том числе и уху, голубцы и другие блюда.<br>
Генацвале. Настоящий подарок для ценителей грузинской кухни. Здесь продаются хинкали, баклажаны, шашлыки, различные варианты приготовления мяса и многое другое. <br>
Велес удивляет не только старинным стилем, но и славянской кухней. В меню представлена традиционная российская еда, приготовленная по старинным рецептам.<br>
Каждое из заведений отличается своей уникальной атмосферой и гастрономическими изысками. </p>
</div>
</div>
   <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
<h3 class="mb-4">Сонный залив</h3>
<div class="col-md-12 heading-section ftco-animate">
                <p class="color-black"align="justify">
Так называется место отдыха, расположенное в посёлке Нукутталахти на берегу Ладожского озера. Местом локации стал остров вулканического происхождения. Базу выбирают для рыбалки, пляжного отдыха, посещения других достопримечательностей республики. Любой желающий выберет коттедж с видом на озеро, лес и окунётся в атмосферу природы, предавшись любимым занятиям.<br>
Для туристов построены небольшие домики, вместительностью до 6-7 человек и больше без учёта детей. В них есть купель, сауна, интернет, телевизор, стиральная машина и всё необходимое. Каждый домик имеет уникальное название, например, «Лунный залив», «Чёрная жемчужина», «Черника в заливе». Для автолюбителей предусмотрены места для парковки. <br>
Дома «Сонный залив» созданы для семейного отдыха на природе. Тут можно не только любоваться природой и готовить овощи на гриле, но и арендовать лодки, кататься по озеру, ловить рыбу. Место предполагает отдых вдали от больших городов, чтобы каждый смог проникнуться природой, набраться сил и испытать море положительных эмоций.<br>
</p>
</div>
   <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
<h3 class="mb-4">Северное сияние в Сортавале</h3>
<img class="col-md-12 ftco-animate" src="images/articles/1404.webp" alt="Северное сияние в Сортавала">
 <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
     </div>
     </div>
<div class="col-md-12 heading-section ftco-animate">
                <p class="color-black"align="justify">
Карелия славится не только своей уникальной природой, но и явлением, ежегодно собирающим тысячи туристов в отели Сортавала. В сезон северных сияний из Петрозаводска, Москвы и Санкт-Петербурга организуются особые экскурсии ради того, чтобы отдыхающие увидели красоту ночного неба и сфотографировали её на память.<br>
Северное сияние появляется в Сортавале можно с сентября по март, но для того, чтобы увидеть красоту природы, требуются особые условия:<br>
•	Небо чистое звёздное<br>
•	Ночь морозная<br>
•	Около места наблюдения не должно быть ярких источников света<br>
•	Время с 22 до 3 часов ночи<br>
В интернете ежедневно публикуются прогнозы, оценивающие вероятность его появления. Наблюдать рекомендуется с 10 часов вечера до 4 утра. Пик активности обычно приходится от 0 до 3 часов ночи. <br>
Чтобы увидеть редкое явление, потребуется тёплая одежда (ночные морозы в Карелии зимой могут достигать –40 °С), термос с горячим питьём, калорийная еда, чтобы не замёрзнуть в ожидании. Лицо желательно покрыть жирным кремом, чтобы избежать обморожения. Тем, кто хочет сфотографировать красоту звёздной ночи, специалисты советуют вооружиться профессиональной камерой, штативом, заряженными аккумуляторами. Лучше всего снимать сияние в режиме длинной выдержки.<br>
Другие места, где можно увидеть редкое северное явление - Национальный парк Паанаярви и Рускеала.<br>

</p>
</div>
</div>
   <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
<h3 class="mb-4">Сеть отелей точка на карте</h3>
<div class="col-md-12 heading-section ftco-animate">
                <p class="color-black"align="justify">Так называются 4 разных отеля, раскиданным по берегам Ладоги. Каждый из них сконструирован в соответствии с природным ландшафтом, позволяя отдохнуть со вкусом и сделать впечатляющие снимки. Несмотря на общее название, все они отличаются между собой по стилистическим решениям. Все отели состоят из нескольких коттеджей на территории охраняемой природной зоны.<br>
Вот где их можно найти:<br>
•	Лодейное поле (Ленинградская область)<br>
•	Приозёрск<br>
•	Село Видлица (Карелия)<br>
•	Сартавала посёлок Рюттю<br>
В Лодейном поле открывается красивый вид на поля и реку Свирь. Туристы располагаются в светлых деревянных коттеджах, а в обслуживание включены прокат снегоходов и спортивная площадка.<br>
В Приозерске домики расположены между высокими хвойными деревьями. Отдыхающие прогуливаются по берегам Ладоги, любуясь красивыми видами. В ресторане им представлена уникальная винная карта, фермерские деликатесы, верёвочный парк и панорамная баня.<br>
Похожая атмосфера царит в Видлице. Здесь тоже домики окружены огромными соснами, а в номерах можно услышать, как шумит прибой. В своём номере можно полюбоваться закатом, а в кафе насладится разнообразием рыбы и подарков леса.<br>
В Сортавале открываются более обширные виды на поля, лес и озеро. А ещё он находится совсем недалеко от парка Рускеала: в излюбленном месте туристов. И, конечно же, нельзя не упомянуть об особой панорамной сауне, расположенной на скале.</p>
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
    "url": "https://sonniyzaliv.ru/priroda-i-dostoprim",
    "name": "Природа и достопримечательности Карелии  | Сонный Залив Сортавала",
    "description": "Природа и достопримечательности Карелии, Озеро в Приозерске озеро Вуокса, Остров Валаам, Парк Ваккосалми в Сортавала (официальный сайт), Парк Отель Кружево, Парк Сортавала, Пороги Лосево, Приозерск рестораны, Сонный залив, Северное сияние в Сортавале, Сеть отелей Точка на Карте, Ягоды, которые растут в Карелии, ягода княженика, ягода морошка",
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
