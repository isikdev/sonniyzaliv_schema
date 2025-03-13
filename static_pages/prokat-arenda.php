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

    $title = 'Прокат и аренда Карелия  | Сонный Залив Сортавала';
    $descr = 'Прокат инвентаря и снаряжения для рыбалки в Карелии зимой У плотника База отдыха Салокюля База отдыха в Карелии Лумиваара Прокат сап досок в Карелии – аренда SUP board SUP серфинг в Kilpolansaari Гостевой дом Паасо База отдыха Салокюля Прокат туристического снаряжения для отдыха в Карелии ООО Карелов Мир Кемпинг и прокат байдарок, каяков на Ладожском озере';
    $keywords = 'Прокат и аренда Прокат инвентаря и снаряжения для рыбалки в Карелии зимой У плотника База отдыха Салокюля База отдыха в Карелии Лумиваара Прокат сап досок в Карелии – аренда SUP board SUP серфинг в Kilpolansaari Гостевой дом Паасо База отдыха Салокюля Прокат туристического снаряжения для отдыха в Карелии ООО Карелов Мир Кемпинг и прокат байдарок, каяков на Ладожском озере';

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

    <link rel="canonical" href="https://sonniyzaliv.ru/prokat-arenda"/>

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
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/articles/900back.webp');" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate pb-5 text-center" style="margin-top: 100px;">
              <h1 id="act-form" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Прокат и аренда</h1>
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
                    <h2 class="mb-4">Прокат и аренда</h2>
                    <p>Информация, которая будет Вам полезна при выборе места для отдыха</p>
                </div>
            </div>

            <div class="col-md-12 heading-section ftco-animate">
                <p class="color-black">Прокат инвентаря и снаряжения для рыбалки в Карелии зимой
На Онежском озере твердый лед, на котором можно рыбачить и не провалиться, устанавливается к новогодним праздникам. Однако в некоторых районах зимняя рыбалка начинается уже в конце ноября. <br>
Собираясь заняться подледным ловом, первым делом надо запастись недорогим навигатором с картами глубин или скачать нужное приложение на смартфон. Тяжелые и довольно объемные рыболовные снасти не обязательно тащить  с собой, особенно если добираетесь до места на самолете или на поезде. Бур, шарабан, даже непромокаемые теплые сапоги можно взять на прокат, не говоря уже об удочках. <br> </p>

<img class="col-md-12 ftco-animate" src="images/articles/1101.webp" alt="Прокат Карелия ">
 <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
     </div>
     <?php echo $initNews; ?><!--вывод Блог ленты  -->
                 <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
<h3 class="mb-4">«У плотника» Кондопожский район, Карелия </h3>
</div>
  <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
<p class="color-black"align="justify">Арендуйте недорогие теплые домики на базе, возьмите на прокат инвентарь рыбака. Дома подготовлены к зиме, созданы все условия, чтобы подготовиться к выходу на лед, отогреться и выспаться с мороза, приготовить пищу, заказать баню. Надо мокрую одежду и отсыревшую обувь до утра высушить. Ведь нет ничего лучше горячего чая и кофе, вкусной ухи после того, как целый день погулял на холоде.
Стандартный набор рыбака – бур, ящик с 4 отделениями для приманки, водонепроницаемые высокие сапоги на толстой подошве, комплект снастей  (телескопическую удочку, черпак-шумовку, катушку, леску, багор), блесну Аляска, самоспасатель на тонком льду – на базе можно взять за 500 рублей.
Есть снегоходы. По желанию могут доставить на перспективное место. </p>
</div>
                <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
                    <h3 class="mb-4">База отдыха «Салокюля» Хутор Салокюля, Ланденпохский район, Карелия</h3>
<div class="col-md-12 heading-section ftco-animate">
                <p class="color-black"align="justify">
Точка находится в 200 километрах от Северной столицы на живописном берегу Ладоги. Уникальная природа, суровые ледники, обдуваемые суровыми ветрами, уникальное озеро – восхищаться этими красивыми местами можно бесконечно. Название финское, оно означает глухую лесную деревушку. Шале «Тимонсаари», небольшие семейные домики, 2 глэмпинга  принимают гостей круглый год.
Дома построены в стиле деревенского жилья, в интерьере много предметов  карельской старины. Печь-камин, электрообогреватель, электроплита и другая бытовая техника для приготовления пищи и спокойного сна скрасят отдых. Есть горячая вода.
Зимой здесь можно заняться подледным ловом, заранее заказав необходимый инвентарь на базе. <br>
Цены указаны за сутки:Ледобур – 300 р Ящик, оснащенный всем необходимым – 500 р Жерлицы – 350<br> </p>
</div>
<h3 class="mb-4">База отдыха в Карелии «ЛУМИВААРА» Территория национального парка «Ладожские шхеры»</h3>
<div class="col-md-12 heading-section ftco-animate">
                <p class="color-black"align="justify">
Лумиваара  слово финское, переводится как «Снежная гора». Да, настоящие снежные заносы ждут отдыхающих зимой на берегу. Напомним, надо купить входной билет в национальный парк, чтобы путешествовать себе в удовольствие. Здесь рай для рыбаков.
На базе отдыха можно арендовать необходимое снаряжение. В комплекте  ледоруб, сумка рыболова.<br>
Стоимость проката символическая – всего 200 р.<br>
Приглашаем начинающих, кто никогда не рыбачил  в здешних местах. Подскажем, посоветуем, поможем. Начав таким образом, человек обязательно увлечется этим увлекательным видом отдыха и еще не раз захочет посетить наши края.
Бывалым рыбакам тоже есть что у нас взять. Зачем тащить за сотни километров тяжелое снаряжение, если можно все необходимое взять на прокат.
Рыбы здесь много, стоит попробовать подледный лов щуки. Иногда новичкам даже везет больше. Рыбалка не очень удачна лишь с середины декабря до половины февраля. Это время здесь называют глухозимьем, когда рыба уходит в глубину и мало двигается из-за нехватки кислорода.</p>
</div>
<h3 class="mb-4">Прокат сап досок в Карелии – аренда SUP board</h3>
<div class="col-md-12 heading-section ftco-animate">
                <p class="color-black"align="justify">Возьмите в аренду SUP- board, займитесь спортом, улучшайте свое здоровье. Укрепите мышцы, спину, сердце, следите за осанкой, не заметите, как похудеете. Прокат сапов и катание с необходимой экипировкой подходит даже для пожилых людей, т.к. это не травмоопасный вид спорта.<br>
Сап-серфинг  снижает опасность стресса, способствует нормализации давления, повышает тонус, поднимает настроение.<br>
</div>
<h3 class="mb-4">SUP серфинг в Kilpolansaari Республика Карелия, остров Кильпола</h3>
<div class="col-md-12 heading-section ftco-animate">
                <p class="color-black"align="justify">До туристического комплекса от ж/д станции Кузнечное ехать полчаса. Добраться можно на такси. На въезде в Карелию есть погранпост.
Ладожское озеро, знаменитые шхеры являются идеальным местом для прогулок. Тихие спокойные проливы, завораживающие отвесные скалы с внешней стороны шхер завораживают.
На прокат можно взять сап-доску, страховочный лиш, рулевой плавник, весло.
●	Аренда посуточная:
будни – 1 200 р
выходные – 1 500 р
Доп. спасательный жилет – 200 р
Чехол для телефона – 200 р
<br>
</div>
<img class="col-md-12 ftco-animate" src="images/articles/1102.webp" alt="Прокат Карелия ">
 <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
     </div>
                 <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
<h3 class="mb-4">Гостевой дом «ПААСО» г. Сортавала, Республика Карелия</h3> </div>
<div class="col-md-12 heading-section ftco-animate">
                <p class="color-black"align="justify">Возьмите сап-борд в аренду и наслаждайтесь тишиной водоема, загорайте вдали от берега, раскачиваясь на волнах. Можно прокатиться по реке Тохмайоки и пройти пороги  «Ваоавмакомако», подняться на озеро Кармаланьярви, встретить Рускеальский Экспресс и сделать незабываемые фото. Также можно выйти на просторы Ладоги.
Прокат сапа – 500 р/час, 900 р/ 2 часа, 1 200 р/ 3 часа, 2 500 р на весь день.
</p>
</div>

                <p class="color-black">Выбрать даты для аренды индивидуального дома можно по кнопке ниже</p>
            </div>
            <div class="row d-flex">
                <div class="conf-btn" style="padding-top: 5px;"><a href="#" <?/*id="reserve1" */?> data-tl-booking-open="true" class="btn btn-primary py-3 px-4 ftco-animate"><i class="ion-ios-calendar"></i> Забронировать</a></div>



        </div>
                 <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
<h3 class="mb-4">База отдыха «Салокюля» Хутор Салокюля, Ланденпохский район, Республика Карелия</h3> </div>
<div class="col-md-12 heading-section ftco-animate">
                <p class="color-black"align="justify">На турбазе доступна аренда SUP-досок. Водные прогулки  откроют красоту Приладожья и знаменитых шхер совершенно по-иному. Отдохнете душой, может, освоите новый для себя вид спорта, займетесь йогой на воде или попутешествуете.
●	Стоимость проката для проживающих на турбазе – 1500 руб./сутки, 750 руб./2 часа; не проживающих – дороже.
●	В комплекте доска, весло и другой инвентарь по требованию.

</p>
</div>
                 <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
<h3 class="mb-4">Прокат туристического снаряжения для отдыха в Карелии ООО Карелов Мир г. Петрозаводск</h3> </div>
<div class="col-md-12 heading-section ftco-animate">
                <p class="color-black"align="justify">Команда «Карелов Мир» занимается организацией активного отдыха в Карелии. Предлагает как стандартные программы, так и эксклюзивные маршруты. Имеет большую базу снаряжения, необходимого для организации туров и корпоративного отдыха. Здесь помогут со снаряжением, подскажут, дадут добрый совет и предоставят персонал.<br>
Стоимость аренды плавсредств за сутки:<br>
●	Рафты различной модификации и вместимости – от 1 800  до 3 300 р<br>
●	Катамараны – от 900  до 3 500 р в зависимости от модели и количества мест.<br>
●	Байдарки надувные – 1 400 р<br>
●	Комплекты весел, жилеты, каски<br>
●	Гидрокостюмы – от 1 200 рублей за 3 суток.<br>
●	Лодочные моторы – 1 800 – 5 000 р. При аренде моторов требуется оставлять залог в зависимости от их стоимости (20-50 тыс.) <br>
 Дополнительное снаряжение: палатки от 350 р, спальники от 250, коврики, гермомешки от 50, электростанция от 1 000.

</p>
</div>
<img class="col-md-12 ftco-animate" src="images/articles/1103.webp" alt="Прокат Карелия ">
 <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
     </div>
                 <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
<h3 class="mb-4">Кемпинг и прокат байдарок, каяков на Ладожском озере Лахденпохья, Карелия</h3> </div>
<div class="col-md-12 heading-section ftco-animate">
                <p class="color-black"align="justify">В кемпинге действует сервис проката спортивного инвентаря. Предлагается широкий выбор байдарок, каяков.
 При этом каяк можно арендовать в этом кемпинге, а сдать на другой точке проката. Вернуться обратно  удобно на такси. Можно также участвовать в групповых сплавах.<br>
●	Каяк можно взять за 2 200 р/ день. Большой, с вместительным грузовым отсеком, рассчитанный на двоих, будет удобен в многодневных походах. В праздники наблюдается наплыв отдыхающих и прокат дороже, уже 2 600 р за тот же каяк.<br>
●	Почти такой же двухместный каяк можно арендовать и за 2 000 р. Будет он ничем не хуже, только чуть поменьше, без грузового помещения, зато легкий, на хорошем ходу. Для длительных путешествий не подойдет, в однодневном будет незаменим<br>
●	Одноместный, маневренный и легкий, подойдет опытным гребцам. Стоит он 2 000 р/сутки.<br>
●	В  наличии также другое снаряжение: палатки, спальные мешки и т.п.<br>
Пункт проката предлагает туры на один день, также продолжительные походы по Ладоге. Вас ждут потрясающие пейзажи и впечатления среди людей интересных и увлеченных.

</p>
</div>
                 <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
<h3 class="mb-4">Прокат лыж и спортивного инвентаря в база отдыха «Лумиваара»</h3> </div>
<div class="col-md-12 heading-section ftco-animate">
                <p class="color-black"align="justify">Зимний отдых на базе можно разнообразить катанием на лыжах, банане. Особенно если приехали с детьми. Игры на свежем воздухе бодрят, заряжают энергией и силой.
Обычно катаются на льду или лесной дороге, маршруты заранее расчищают от снега.<br>
Стоимость лыж на прокат – 500 р; ватрушек – 500; можно и детские клюшки с шайбой за символическую цену найти (50 р/ час).</p>
</div>
                      <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
<h3 class="mb-4">Стоимость проката снегоходов в Карелии и туров ООО "Карелов Мир" г. Петрозаводск </h3> </div>
<div class="col-md-12 heading-section ftco-animate">
                <p class="color-black"align="justify">Прокат снегоходов от 15 000 рублей в день<br>
●	В наличии снегоходы: <br>
BRP SKI-DOO Touring, 120 л.с., 4-тактный – резвый, для опытных водителей<br>
BRP SKI-DOO Touring / BRP LYNX ADVENTURE, 60 л.с., 4 тактный – тихий и легкий.<br></p>
</div>
<img class="col-md-12 ftco-animate" src="images/articles/1104.webp" alt="Прокат Карелия ">
 <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
     </div>
                 <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
<h3 class="mb-4">«Точка на карте. Лодейное поле» Видлица</h3> </div>
<div class="col-md-12 heading-section ftco-animate">
                <p class="color-black"align="justify">Центр активного отдыха в Сортавала предлагает туры на снегоходах по авторским маршрутам:<br>
●	Финская деревня <br>
60 минут по лесной дороге до бывшего финского поселения подарят незабываемые впечатления. Зимний лес удивительно красив. Получите удовольствие и огромный заряд энергии. Стоимость маршрута на 1 человека 8 000 р; на двоих – 10 000 р. Можно с инструктором.<br>
●	Лесная сказка<br>
Предлагается 2-часовое путешествие по сказочному зимнему лесу до дальнего лесного озера. Побываете в настоящей зимней сказке, получите море позитива и эмоций. Стоимость тура для 1 человека 11 000 р; для двоих – 13 000 р.  В праздничные дни немного дороже.<br>
●	Заснеженные дюны <br>
10 км по побережью открытого Ладожского озера. Проводится получасовой инструктаж. Можно прокатиться с инструктором. Тур стоит 8 000 р для одного, 10 000 для двоих. <br>
●	Устье реки <br>
2 часа проката по зимнему сосновому бору до Ладоги. Знакомство с историей Карелии, легендами и преданиями. Получите большое количество впечатлений, прекрасные фотографии на память. <br>
●	Просторы Свири <br>
Короткое 3-километровое путешествие по снегам Карельских лесов до берега реки Свирь. Маршрут хорош для неопытных водителей, дорога прямая. Зато фотографии будут  бесподобные. Стоимость тура для одного человека – 2 500 р; на двоих – 3 500 р. Детский снегоход – 1 100 р/ 15 минут.<br>
●	Жемчужина Карелии <br>
Часовое путешествие по берегу Ладоги, завораживающие пейзажи, обелиск морякам-героям. Бескрайние просторы озера, вековые сосны стеной у берега удивительно хороши. Приобщение к истории края, страны.<br>
●	Кексгольмский бор<br>
2-часовое путешествие по берегу озера и старому бору до маленького, изумительной красоты лесного озерца. Стоимость такая же: 8 000-10 000 р для одного; 11 000-13 000 р для двоих.</p>
</div>
                      <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
<h3 class="mb-4">Сообщество туроператоров «Большая страна» Республика Карелия </h3> </div>
<div class="col-md-12 heading-section ftco-animate">
                <p class="color-black"align="justify">Предлагаются туры на снегоходах:<br>
●	Самый лучший Новый Год<br>
Приглашение встретить Новый год в необычной обстановке, устроить сафари по Карелии на снегоходах. Сказочный зимний лес, скованные льдом озера и развлечения на природе.<br>
Стоимость тура – 95 700 р.<br>
●	Зимний водопад Кивач<br>
Водопад не замерзает даже зимой. Картина потрясающая. Завораживающая красота, шум падающей воды дарят необъяснимые ощущения, заряжают энергией и силой.<br>
●	Снегоходное сафари<br>
Ветер в ушах свистит,  снежный лес быстро остается позади, и вот оно – Сямозеро, скованное льдами, но прекрасное.
Обязательно проводится инструктаж по технике безопасности. Возможен тренировочный прокат с инструктором.</p>
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
    "url": "https://sonniyzaliv.ru/prokat-arenda",
    "name": "Прокат и аренда Карелия  | Сонный Залив Сортавала",
    "description": "Прокат инвентаря и снаряжения для рыбалки в Карелии зимой У плотника База отдыха Салокюля База отдыха в Карелии Лумиваара Прокат сап досок в Карелии – аренда SUP board SUP серфинг в Kilpolansaari Гостевой дом Паасо База отдыха Салокюля Прокат туристического снаряжения для отдыха в Карелии ООО Карелов Мир Кемпинг и прокат байдарок, каяков на Ладожском озере",
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
