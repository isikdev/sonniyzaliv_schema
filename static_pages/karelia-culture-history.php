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

    $title = 'Культура и история Карелии | Сонный Залив Сортавала';
    $descr = 'Выставка Карелия в фотографиях, Дворцы и замки Ленобласти, Исторические места Лодейного Поля, История Карелии, Карельская колыбелька, Музей деревянного зодчества в Карелии, Музей народной культуры Карелии, Наскальные рисунки Карелии, Полярный цирк, Русская баня в Карелии';
    $keywords = 'История Карелии, Выставка Карелия в фотографиях, Дворцы и замки Ленобласти, Исторические места Лодейного Поля,  Карельская колыбелька, Музей деревянного зодчества в Карелии, Музей народной культуры Карелии, Наскальные рисунки Карелии, Полярный цирк, Русская баня в Карелии';

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

    <link rel="canonical" href="https://sonniyzaliv.ru/karelia-culture-history"/>

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
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/articles/700back.webp');" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate pb-5 text-center" style="margin-top: 100px;">
              <h1 id="act-form" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Карелия. Туризм Культура и история Карелии</h1>
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
                    <h2 class="mb-4">Культура и история Карелии</h2>
                    <p>Информация, которая будет Вам полезна при выборе места для отдыха</p>
                </div>
            </div>
            <div class="col-md-12 heading-section ftco-animate">
                <p class="color-black">Около 8 тысяч лет до нашей эры территория Карелии освободилась ото льда. В послеледниковое время здесь стали появляться первые поселенцы, об их жизни рассказывают древние наскальные рисунки — петроглифы.<br>

В X–XI вв. южная часть Карелии попала в сферу влияния древнерусского государства, стали возникать славянские поселения, было принято христианство.<br>

В XVII в. Корела отошла к Швеции и была возвращена России только в 1721 году, после поражения шведов в Северной войне.<br>

Северная война (1700–1721 гг.) дала мощный толчок промышленному развитию Карелии. В этот период активно развивалась металлургия, было построено несколько новых заводов.<br>

В 1917–18 гг. в Карелии установилась советская власть. С ее установлением КАССР превратилась в республику с развитой многоотраслевой промышленностью.<br>

В 1940 году Карелия приобретает новый статус — Карело-Финской ССР и становится шестнадцатой союзной республикой.<br>

В период Великой Отечественной войны 2/3 территории республики, на долю которых приходилось 83% промышленного производства, были оккупированы.<br>

В послевоенные годы в Карелии проводилось восстановление народного хозяйства края. Уже в 50-х гг. XX в. усилилось машиностроение и энергетика. Край становится ведущим в области химической переработки древесины.<br>

За успехи, достигнутые в развитии народного хозяйства и социально-культурного строительства, республика награждена орденами: Ленина, Октябрьской Революции, Дружбы народов.<br>

В 1991 году решением народных депутатов утверждено новое название края — Республика Карелия.</p>
<?php echo $initNews; ?><!--вывод Блог ленты  -->

                   <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
                   <h2 class="mb-4"> Выставка «Карелия в фотографиях»</h2>
                    </div>
                   <div class="row d-flex pt-3 pb-5">
                    <img class="col-md-12 ftco-animate" src="images/articles/701.webp" alt="История Карелии">
                </div>


                <p class="color-black">Весной 2021 года на Старом Арбате Москвы была организована фотовыставка, посвященная достопримечательностям Карелии. Она стала частью программы Дней Карелии в столице России. <br>
Работы карельских фотографов  знакомили москвичей и гостей столицы с красотой родной природы, историческими местами. На снимках предстали остров Кижи, Валаам, горный парк «Рускеала», водопады Юканкоски, Кивач, Ладога и Онега, острова Кузова, гора Воттоваара. <br>
Каждая фотография имела QR-код, имеющий подробную информацию о туристическом  объекте. Можно было узнать, как до него добраться, когда лучше достопримечательность посетить. Гости выставки открыли для себя Карелию, удивительную, загадочную, завораживающую. И находится эта волшебная страна совсем недалеко, всего на расстоянии часа полета от Москвы. <br>
Туризм в республике хорошо развит. В любое время года можно забронировать номер   комфортабельного отеля или снять коттедж у озера, посмотреть достопримечательности или отдохнуть в тишине сосновых лесов, поохотиться или порыбачить, сплавиться по бурной речке или погреться в банном чане, поплавать в прозрачных водах ладожского озера.<br>
Карелия – земля тысячи озер, вековых сосен, уникальных достопримечательностей. Побывав здесь один раз, туристы возвращаются сюда вновь.
<br>            </p>
                <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
                   <h2 class="mb-4">Дворцы и замки Ленобласти</h2>
                    </div>
            <div class="row d-flex pt-3 pb-5">
                    <img class="col-md-12 ftco-animate" src="images/articles/702.webp" alt="замки Ленобласти ">
                </div>



 <p align="justify">
Царские дворцы, исторические крепости Ленобласти помнят события былых времен. <br>
●	Крепость «Орешек»<br>
Постройка XVI века. остров посреди Невы. Крепость возвышается там, где река впадает в Ладогу. Русская твердыня помнит времена захвата шведов, правления Петра Великого.  события Великой Отечественной, когда около полутора лет советские войска держали здесь оборону, не давая сомкнуться кольцу блокады Ленинграда.<br>
●	Выборгский замок<br>
Расположен на Замковом острове. С башни Святого Олафа  открывается впечатляющий вид на Выборг, построенный в 1293 году шведами. Музей-заповедник, на территории которого устраиваются рыцарские турниры, мастер-классы, экспозиции, посвященные русско-финской войне, природе Карельского перешейка, переносят гостей на несколько веков назад. <br>
●	Староладожская крепость<br>
Памятник архитектуры конца IX века с круглыми башнями, бастионами стоит на берегу реки Волхов. Крепостные стены семиметровой толщины, 12-метровая башня поражают воображение. Музей хранит экспонаты прошлых столетий, предметы каменного века.  Георгиевская церковь XII века обладает самым древним изображением Георгия Победоносца.<br>
Это всего лишь крупинки в плеяде прекрасных крепостей, дворцов,  замков, которыми щедро заселена земля Ленобласти.

<br></p>

<div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
<h3 class="mb-4">Исторические места Лодейного Поля</h3>
 </div>

<img class="col-md-12 ftco-animate" src="images/articles/703.webp" alt="Лодейное поле">

<p class="color-black">Старинный населенный пункт Карелии находится на берегу Свири, он является колыбелью Балтийского флота. Петр I  заложил здесь Олонецкую верфь.<br>
●	Памятник Петру I <br>
Визитная карточка города, именно его видят гости, прибывшие по водному пути.  Установлен памятник у домика Петра, где он останавливался во время посещения верфи.<br>
●	Александро-Свирский монастырь<br>
 Монастырь XV века – место святое. Православный монах стал знаменит благодаря дару исцеления. На богомолье сюда приезжали царские особы Федор Иоаннович, Борис Годунов.<br>
●	Краеведческий музей<br>
В экспозиции музея 17 тыс. экспонатов, представляющих почти все эпохи от древних времен до наших дней. Туристов привлекает экспозиция, посвященная корабельному прошлому города, собрание картин русских художников Поленова и Зенкова, коллекция оятской керамики. старинных монет.<br>
</p>




<div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
<h3 class="mb-4">История Карелии</h3>
 </div>

<img class="col-md-12 ftco-animate" src="images/articles/704.webp" alt="История Карелии">

        <p align="justify">История возникновения Карелии уходит к VII-VI векам до нашей эры. Древние люди кормились  рыбой и дичью. В I веке до н.э. на этих богатых землях появились переселенцы – карелы, вепсы, саамцы, славяне. Стали возделывать земли, добывали соль, занимались рыболовством.<br>
С возникновением Киевской Руси в XI веке Карелия стала частью Новгородской земли.
В разное время Корельской землей владели литовцы, шведы, русские. Пик расцвета края происходит во время царствования Петра Великого. Именно тогда здесь появились 4 горных завода, железо шло на обеспечение русской армии во время Северной войны со шведами. Был основан Петрозаводск. Развивалась лесная промышленность, материалы лесопилок пошли на экспорт. <br>
В XIX - начале XX века Карельская железная руда, древесина были важны для экономики Российского государства. Было налажен морской путь, построена железная дорога до Мурманска. <br>
В 1925 году образовалась советская Республика Карелия. Затем последовала принудительная коллективизация, реконструкция лесопильных заводов, зародилось мебельное производство, был создан целлюлозно-бумажный комбинат, модернизирован завод лесной техники. Здесь производили лучшее в союзе лыжное снаряжения для спортсменов, добывался гранит, кварц, шпат. <br>
1939 год ознаменовался войной с Финляндией. Перед Второй мировой войной Советскому Союзу надо было отодвинуть советско-финскую границу на 90 км от Ленинграда, установить военные базы. Война длилась всего 3 месяца, но потери были огромные.  Был подписан мирный договор, образована Карело-Финская ССР.<br>
В годы ВОВ западные территории были оккупированы немцами и финнами, шли ожесточенные бои за Петрозаводск.<br>
После распада СССР Карелия вошла в состав России. Основным источником дохода региона являются деревообрабатывающие комбинаты, металлургические заводы. <br>
Активно развивается туризм. Уникальные достопримечательности, красивые пейзажи Карелии, турбазы на берегу озер, места уединенного отдыха, охота, рыбалка привлекают сюда все больше туристов. <br>
</p>

 <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
<h3 class="mb-4">Карельская колыбелька</h3>
 </div>
  <img class="col-md-12 ftco-animate" src="images/articles/705.webp" alt="Колыбелька  Карелии">


<p align="justify">Только в Карельской избе можно увидеть колыбельку – люльку для новорожденного,  по-карельски «кяткюдъ». Колыбелька делается из осины, сшивается ивовыми прутьями. В ней нет ни единого гвоздика или болтика. <br>
Такое устройство с помощью деревянного крюка цепляли к длинному березовому колу, воткнутому в железное кольцо под потолком. Колыбелька на веревках раскачивалась сверху вниз или в стороны. Для удобства раскачивания сбоку привязывали веревку в виде петли. В эту петлю няня поддевала ногу – люлька раскачивалась.<br>
В изголовье обязательно клали «комель» от веника, которым женщина парилась в баньке после родов, обожженный камешек, а сверху подвешивали медвежий коготь. Обычай строго соблюдался, чтоб ничего дурного к младенцу не пристало. Колыбельку не  оставляли пустой, клали в него веник или сапог матери – иначе нечисть может подложить свое паршивое дите.<br>
Конечно, в современной квартире березовый кол уже не увидишь, но плетеные колыбельки по-прежнему популярны.<br>
</p>


 <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
<h3 class="mb-4">Музей деревянного зодчества в Карелии</h3>
 </div>
  <img class="col-md-12 ftco-animate" src="images/articles/706.webp" alt="Кижи в Карелии">
<p align="justify">
Ансамбль деревянного зодчества «Кижи» на Онеге – уникальный музей под открытым небом, посвященный культуре Русского Севера. Кижский погост входит в Список всемирного культурного наследия ЮНЕСКО.<br>
Захватывающая картина пейзажа, шум волн Онеги, овечки, гуляющие на лужайке, приковывают внимание гостей острова с первых мгновений. <br>
●	Церковь Преображения Господня <br>
Если смотреть снизу вверх, она похожа пирамиду, с высоты напоминает крест.  В деревянном храме с 22 главками, построенном без единого гвоздя, можно посмотреть  старинные иконы XVI - XVII веков. Экскурсоводы расскажут о необычном процессе строительства церкви, смелых инженерных решениях.<br>
●	Заонежская деревня<br>
В деревня никто не проживает. Здесь туристов встречают самые настоящие русские терема с богатым внешним убранством. Внутри можно посмотреть традиционный  интерьер дома XIX – XX вв. <br>
●	Деревни Ямка и Васильево на острове Кижи<br>
Здесь живут сотрудники музея. Домики украшенные резными наличниками, на окнах белеют вышитые занавески, живописные виды переносят в особую атмосферу Северной деревни.
На остров надо ехать в феврале-марте или летом. <br>
</p>
 <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
<h3 class="mb-4">Музей народной культуры Карелии</h3>
 </div>
<p align="justify">●	Этнографический музей Карельской культуры в городе Кондопога
Это место, где можно узнать много интересного о культуре и традициях карельского народа. Он расположен на берегу озера Лача. Здесь собраны предметы быта, ремесел, одежда, украшения.
В музее проходят выставки, мероприятия, мастер-классы, связанные с карельской культурой.<br>
●	Этнографический музей Керети<br>
Музей расположен в одноименном городке у озера Лама. Здесь собрана коллекция, отражающая жизнь и традиции керетского народа, живущего на северо-западе Карелии. Это украшенные резным орнаментом дома, хозяйственные постройки, уличные мастерские, предметы быта, фольклорные костюмы. Проводятся демонстрации занятий ручными техниками, дегустация местных блюд, музыкальные представления.<br>
 </p>
 <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
<h3 class="mb-4">Наскальные рисунки Карелии</h3>
 </div>
<p align="justify">На восточном побережье Онеги можно увидеть наскальные рисунки – петроглифы. Это наскальные памятники первобытной Карелии. Датируются учеными III веком до н.э.<br>
Петроглифы разбросаны на скалах полуострова Бесов Нос, Кочковновалок, мысах Пери Нос, Кладовец, Отдельные группы есть на островах Гурий, Карецкий Нос.<br>
В 2021 году Онежские петроглифы внесены в список ЮНЕСКО.
<br></p>
 <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
<h3 class="mb-4">Полярный цирк</h3>
 </div>
<p align="justify">●	Цирк Раслака <br>
Цирки Раслака – уникальные горные образования. Их иногда называют «Цирк Рамзая», в честь ученого Вильгельма Рамзая, открывшем для мировой науки горный массив Левозерские тундры. <br>
В заказнике различают Восточный и  Западный цирк. Оба цирка ледникового  происхождения. Их отвесные стены достигают 250 метров (1075м и 972 м над уровнем моря). Восточный цирк имеет значительно меньшие отвесы, на некоторые позиции можно подняться без снаряжения для скалолазания.<br>
Подъем не из легких. Зато виды открываются такие, что снимать можно бесконечно! На Кольском полуострове даже летом в тени лежит снег. Он окрашен красными водорослями, разноцветными лишайниками. Вода в озере почти черная, с глубоким синим отливом. На самом деле она прозрачная, на дне синеет донный лед. Картина воистину инопланетная!<br>
</p>
 <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
<h3 class="mb-4">Русская баня в Карелии</h3>
 </div>
<p align="justify">В Карелии популярны русские бани. Особенно хороша баня зимой и поздней осенью, когда обязательно надо погреться после охоты или рыбалки в парилке, чтобы не подхватить простуду. Пар доставляет немало удовольствия и положительных эмоций, поднимает тонус. Простуду, насморк и усталость после охоты или рыбалки в прохладное время как рукой снимает.<br>
К бане обязательно прилагается березовый или дубовый веник с душистыми травами, сибирский чан и горячий чай с карельскими травами.<br>
Банный чан стоит на печи под открытым небом. Температура в ней поддерживается в районе 36-40 градусов. Тепло идет снизу и равномерно распределяется по всей воде. Тело в тепле, а голова в холоде. Особо острые ощущения получаешь в чаше зимой, когда над головой кружат снежинки.
Обязательно попарьтесь в баньке с чаном. окунитесь в прохладных водах озера – отдохнете и увезете с собой приятные воспоминания об этом чудесном крае с удивительными традициями<br>
</p>



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
    "@type": "WebPage",
    "url": "https://sonniyzaliv.ru/karelia-culture-history",
    "name": "Культура и история Карелии | Сонный Залив Сортавала",
    "description": "Выставка Карелия в фотографиях, Дворцы и замки Ленобласти, Исторические места Лодейного Поля, История Карелии, Карельская колыбелька, Музей деревянного зодчества в Карелии, Музей народной культуры Карелии, Наскальные рисунки Карелии, Полярный цирк, Русская баня в Карелии",
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
