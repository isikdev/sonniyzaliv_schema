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

    $title = 'Отдых в Сортвале базы и дома обзор  | Сонный Залив Сортавала';
    $descr = 'Отдых в Сортавале, Шале Клевер на берегу Ладоги, Дом Полярная станция под ключ в Карелии, Отдых в Сортавала на берегу Ладожского озера, Отдых в Карелии Сортавала домики на берегу озера, База отдыха Лунный залив, Гостевой дом Нордикхаус, Гостевые Домики у Озера, Гостевой дом в Вуорио';
    $keywords = 'Дома для отдыха в Сортавала, Отдых в Сортавале, Шале Клевер на берегу Ладоги, Дом Полярная станция под ключ в Карелии, Отдых в Сортавала на берегу Ладожского озера, Отдых в Карелии Сортавала домики на берегу озера, База отдыха Лунный залив, Гостевой дом Нордикхаус, Гостевые Домики у Озера, Гостевой дом в Вуорио
';

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

    <link rel="canonical" href="https://sonniyzaliv.ru/karelia-otdyh-sortavala"/>
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
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/articles/900back.webp');" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate pb-5 text-center" style="margin-top: 100px;">
              <h1 id="act-form" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Отдых в Сортавале Карелия</h1>
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
                    <h2 class="mb-4">Шале «Клевер» на берегу Ладоги</h2>
                    <p>Информация, которая будет Вам полезна при выборе места для отдыха</p>
                </div>
            </div>
                    <img class="col-md-12 ftco-animate" src="images/articles/1001.webp" alt="Шале Клевер">
            <div class="col-md-12 heading-section ftco-animate">
                <p class="color-black">Шале «Клевер» на берегу Ладоги
Посёлок Нукутталахти, Сортавальский район, Республика Карелия<br>

Нужна смена обстановки, кратковременный уединенный отдых вдали от шумных городов – интересным вариантом для вас может стать Шале Клёвер. Приезжают сюда, чтобы пожить в спокойном ритме, послушать шум вековых сосен, подышать свежим воздухом, полюбоваться необъятными просторами водной глади Ладоги. А какие здесь получаются фотографии!   <br>
Шале находится на севере Риеккалансаари, самого большого острова Ладожского озера. Остров внушительных размеров – 12 км в длину, 6 км в ширину. Здесь можно увидеть высокие скалы, мрачные ущелья, равнины с пашнями и лугами, заболоченные ложбины,  озера, населенные пункты.  <br>
Его еще иногда называют греческим или островом Белой куропатки. По одной из версий, первым жителем острова был грек. Вторая версия названия острова сводится к слову riekko - белая куропатка.  А клевер шелковым ковром стелется всюду. Риеккалансаари входит в перечень особо ценных природных объектов.<br>
Шале Клевер – последний жилой пункт по пути из Сортавала, дальше нет ни души – 500 метров до Ладоги. <br> </p>
               <img class="col-md-12 ftco-animate" src="images/articles/1002.webp" alt="Шале Клевер">
            <div class="col-md-12 heading-section ftco-animate">
                <p class="color-black">
В любое время года к услугам гостей просторный бревенчатый дом, внутренний двор, частная парковка. Заезды с 15:00.<br>
В доме 5 спален разной площади, просторная гостиная, телевизор и библиотека, оборудованная по последнему слову техники кухня, 3 ванные комнаты, душ, терраса. Во внутреннем дворе есть зона барбекю, баня. <br>
Среди любителей активного отдыха популярны пешие походы по лесу, верховая езда. Рыбакам гарантирован хороший улов. До пляжа идти минут 10 по лесной тропинке.<br>
Шале расположено вдали от населенных пунктов: расстояние до центра – чуть больше 2 км, до Рускеалы, водопадов 26 км, до Лахденпохья – 38 км,  до Питкяранты – все 40. До аэропорта Бесовец – 177,5 км.<br> </p>
               <img class="col-md-12 ftco-animate" src="images/articles/1003.webp" alt="Шале Клевер">
 <div class="col-md-12 heading-section ftco-animate">
                <p class="color-black">С мая по октябрь предлагаются поездки на о. Валаам. Есть свой причал в поселке, экскурсионная  катер  забирает прямо с острова. В программе посещение  Валаама, «Центральная усадьба», «Никольский скит».<br>
Дом хорош для семейного отдыха не только летом. Зимой остров утопает в снегу. Вечнозеленые гигантские сосны на фоне белого снега смотрятся потрясающе. Дома тепло, особый уют создают бревенчатые стены, особый хвойный дух. Кто-то приезжает сюда на новый год, чтобы побывать в очаровательной зимней сказке северной карельской природы.<br>
Рейтинг 4,8 из 5<br>
Дом вдали от населенных пунктов: расстояние до центра – чуть больше 2 км, до Рускеалы, водопадов 26 км, до Лахденпохья – 38 км,  до Питкяранты – все 40. До аэропорта Бесовец – 177,5 км.<br> </p>
               <img class="col-md-12 ftco-animate" src="images/articles/1004.webp" alt="Шале Клевер">
 <div class="col-md-12 heading-section ftco-animate">
                <p class="color-black">
Отзывы о Клевере положительные. Из плюсов отмечают  тепло, чистоту дома, наличие посудомоечной и  стиральной машины, большую территорию, хорошую жаркую баню. Из минусов – дороговизну аренды, дополнительную плату за все, что вне дома (велосипеды, баня).<br>
Если нравится тишина, то отдых точно понравится. Большой деревянный дом у леса, баня, поляна под шашлыки, детская площадка – все создано для семейного отдыха или небольшой дружной компании. В 15 минутах через лес – берег Ладожского озера. Хозяин Шале обязательно проводит до места, расскажет историю края. <br>
«Невероятная красота природы, тишина и покой завораживают. Видно, что дом построен с любовью», – пишут отдыхающие.<br></p>

<?php echo $initNews; ?><!--вывод Блог ленты  -->
                <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
                    <h2 class="mb-4">Дома «Полярная станция» под ключ в Карелии</h2>
                 </div>


<img class="col-md-12 ftco-animate" src="images/articles/1005.webp" alt="Полярная Станиция Серый дом ">

 <div class="col-md-12 heading-section ftco-animate">
<p class="color-black">«Полярная станция в Сонном заливе – синий дом 160 м2 и серый дом 176 м2 на участке 18 соток»
Дом с сауной, Сортавальское г.п., п. Нукутталахти, Центральная ул.<br>

«Полярная станция» п. Нукутталахти – одна из самых красивых новых домов для отдыха острова Риеккалансаари. Просторные коттеджи из бруса у опушки леса выстроены на возвышенности, откуда открывается потрясающий вид ладожских просторов.<br> </p>

<img class="col-md-12 ftco-animate" src="images/articles/1006.webp" alt="Полярная Станиция Серый дом ">
 <div class="col-md-12 heading-section ftco-animate">
<p class="color-black">
Очаровательный синий дом и дымчато-серый с панорамными окнами зимой среди снегов действительно будут напоминать затерявшуюся среди льдов и сугробов полярную станцию. До центра Сортавала 4 км по грунтовой дороге, знаменитого горного парка Рускеала – 37. Километры соснового бора за домом, ни единого населенного пункта поблизости. Для ищущих уединения жителей мегаполисов здесь рай земной, тишина и покой. <br> </p>
<img class="col-md-12 ftco-animate" src="images/articles/1007.webp" alt="Полярная Станиция Серый дом ">
 <div class="col-md-12 heading-section ftco-animate">
<p class="color-black">

●	Оба дома рассчитаны для комфортного проживания 6 человек. 3 спальни в каждом (по 2 двуспальные кровати, 2 полуторки). При необходимости можно разложить 2 дивана, есть детская кроватка-манеж, раскладушка для детей. Имеются 2 санузла, сауна.<br>

●	От 21 000 р за сутки. Цена зависит от даты и количества гостей<br>
●	Во дворе гриль-домик, мангал, обеденный стол, детская площадка.<br></p>
<img class="col-md-12 ftco-animate" src="images/articles/1008.webp" alt="Полярная Станиция Серый дом ">
 <div class="col-md-12 heading-section ftco-animate">
<p class="color-black">

Дома свежие, 2024 года постройки. До берега всего 200 м.<br>
В доме большая гостиная с зоной отдыха, санузел с душевой, сауна.<br>

●	Кухня оборудована современной бытовой техникой, можно готовить, есть посуда для сервировки – всегда под рукой.<br>
С балкона открывается шикарный вид на залив.<br></p>
<img class="col-md-12 ftco-animate" src="images/articles/1009.webp" alt="Полярная Станиция Серый дом ">
 <div class="col-md-12 heading-section ftco-animate">
<p class="color-black">
●	Созданы условия для заезда с детьми.<br>
Теплые полы на первом этаже позволяют отдохнуть с комфортом даже зимой.<br>
●	Удобная и просторная парковка.<br>
Одним словом, заезжай и живи!  <br></p>


 <div>
      <div class="col-md-12 heading-section ftco-animate">
                <p class="color-black">Выбрать даты для аренды индивидуального дома можно по кнопке ниже</p>
            </div>
            <div class="row d-flex">
                <div class="conf-btn" style="padding-top: 5px;"><a href="#" <?/*id="reserve1" */?> data-tl-booking-open="true" class="btn btn-primary py-3 px-4 ftco-animate"><i class="ion-ios-calendar"></i> Забронировать</a></div>



        </div>



                   <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
                   <h2 class="mb-4">Отдых в Сортавала на берегу Ладожского озера</h2>
                    </div>

                    <img class="col-md-12 ftco-animate" src="images/articles/904.webp" alt="Сонный залив лунный залив">


                 <div class="col-md-12 heading-section ftco-animate">
<p class="color-black">
                Отдых на берегу Ладожского озера популярен в любое время года. Здесь очень красиво, на берегу и островах гостей принимают тысячи отелей, туристических баз. Планировать аренду необходимо заранее, свободные домики разлетаются как горячие пирожки задолго до открытия сезона.<br>
                На озере есть что посмотреть.  Уникальное явление – ладожские шхеры. Архипелаг, состоящий из 650 живописных скалистых островков, разделен проливами и растянут  по всему северному побережью озера.<br>
                Где-то это обычные карельские виды – камни в бурных протоках, берега, покрытые вечнозелеными лесами. Со стороны озера тянутся отвесные скалы, остроконечные мысы с одинокими соснами на голых  камнях. Это уникальный национальный парк под охраной государства. <br>
                Лучший вариант познакомиться с уникальным парком – отправиться в приключение по воде. Туристический центр Сортавала с мая до поздней осени предлагает экскурсии по Ладожским шхерам, остров Валаам. Эти поездки вы запомните на всю жизнь. Если повезет, застанете ладожскую нерпу, полюбуетесь незабываемыми видами заходящего солнца над озером, суетой чаек, насладитесь плеском воды в тишине. <br>
                Не упустите возможность побывать на жемчужине Ладожских шхер – Валааме. Летом туристы отмечают неземную красоту, спокойствие, благодать святых мест, аромат трав,  цветов, который  наполняет каждый уголок дивного острова.<br>
                2 часа незабываемой экскурсии за 2 000 р того стоят.<br>
                Экскурсии по таинственным местам силы Карелии предлагают самые разнообразные. Не только шхеры, это саамский каменный лабиринт, где  встретитесь с древними идолами, необитаемый остров Кильпола, на вершине которого загадаете заветное желание.<br>
                Доступны как групповые поездки, так и аренда индивидуального катера. Владельцы катеров свозят, проведут интересные экскурсии.<br>
                Можно снять отельный номер, а лучше арендовать коттедж или модульный домик у  берегу и наслаждаться тишиной, спокойствием, необъятными просторами Ладоги.<br></p>

                <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
                   <h2 class="mb-4">Отдых в Карелии Сортавала домики на берегу озера</h2>
                    </div>
            <div class="row d-flex pt-3 pb-5">
                    <img class="col-md-12 ftco-animate" src="images/articles/507.webp" alt="Гора Паассо ">
                </div>
                <div class="col-md-12 heading-section ftco-animate">
<p class="color-black">
                  Аренда домика у озера – самый привлекательный вид отдыха на Ладоге. Выбор широкий – от скромных домиков с уличным биотуалетом до просторных коттеджей со всеми удобствами.</p>

<div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
<h3 class="mb-4">База отдыха «Лунный залив»</h3>
 </div>

<img class="col-md-12 ftco-animate" src="images/articles/106.webp" alt="Лунный залив">

 <div class="col-md-12 heading-section ftco-animate">
<p class="color-black">п. Нукутталахти, ул. Центральная, 50-52
Прямо на берегу залива стоит новенький коттедж. Он большими панорамными окнами смотрит на озеро, как бы приглашая всю природу к себе в гости. Туристическая база удачно расположилась на большом острове Ладожских шхер. Ехать сюда из Сортавала всего 10 минут по грунтовой дороге, а на остров можно попасть только через  понтонный мост. <br>
Домик подходит для размеренного семейного отдыха, размещения с детьми, небольших душевных компаний.<br>
●	Дом новый, с минималистическим интерьером в скандинавском стиле, есть необходимая бытовая техника.<br>
●	В двухкомнатном коттедже 4 спальных места. При заезде большой семьей можно организовать дополнительно место на диване.<br>
Место очень красивое. Шикарные закаты над заливом можно наблюдать не выходя из  дома. Свой выход к пирсу, возможность арендовать лодку, рыбалка – то что нужно для отдыха вдали от мегаполисов.<br>
●	Купель с подогревом, баня у воды в пяти минутах, скрасят отдых у озера в промозглую осень и холодную весну.<br>
Комфортабельный 6-местный катер у причала ждет отдыхающих на водные прогулки по Ладожским шхерам.<br>
Стоимость зимой от 4500 руб, летом от 7500 рублей в сутки за дом.<br>

</p>
</div>



<div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
<h3 class="mb-4">Гостевой дом «Нордикхаус»</h3>
 </div>
 <div class="col-md-12 heading-section ftco-animate">
<p class="color-black">Республика Карелия, Сортавала, урочище Оръятлахти<br>
Новые дома построены в 2023 году. Места красивейшие, вид на озеро прекрасный. За турбазой густой лес. <br>
●	Компактные, двухместные, с кухней, санузлом, душем, террасой, всеми удобствами домики у самого берега Ладоги. <br>
Турбаза расположена в 14 км от Сортавалы у залива Кирьявалахти.<br>
●	На первой береговой линии есть и более просторные дома для 4 человек с собственным выходом к озеру. В каждом полноценная кухня, душевая и туалет, стиральная машина, теплые полы, терраса с мебелью.<br>
●	Дополнительные опции:<br>
русская баня на берегу с поленницей дров, финская сауна;<br>
мангал с принадлежностями для шашлыка и пикника;<br>
по договоренности можно заказать рыбалку на озере, охоту в сезон, поход в лес за ягодами, тихую охоту по грибным местам со знатоком местности;<br>
Дома подходят для семейного отдыха, небольших скромных компаний.<br>
Стоимость проживания: от 4 990 рублей за двоих человек в сутки.<br>
</div>


 <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
<h3 class="mb-4">Гостевые Домики у Озера</h3>
 </div>
  <div class="col-md-12 heading-section ftco-animate">
<p class="color-black">Республика Карелия, Сортавала, микрорайон Гидрогородок<br>
Очень красивое место недалеко от Ладоги на берегу небольшого канала с выходом на озеро. Подходит для рыбалки, в водоеме водится щука и другая крупная рыба. Предоставляются весельные лодки и рыболовные снасти. Здесь много красивых уточек, которые совершенно не боятся людей и ведут себя как домашние. <br>
●	Уютные теплые домики по 40 квадратов с продуманной планировкой, где есть все необходимое для приготовления пищи, удобные спальные места, электрическая сауна.<br>
●	Просторная веранда для лета, мангал рядом с домом, казан для ухи – дополнительные опции для отдыха и размеренных бесед в компании друзей.<br>
Отзывы положительные. Гости отмечают чистоту, порядок и уют в теплых домиках, гостеприимство хозяев, отличную рыбалку, душевную атмосферу и красивую карельскую природу. Рекомендуют арендовать домик на недельку. <br>

</p>
 </div>

 <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
<h2 class="mb-4">Гостевой дом в Вуорио</h2>
 </div>
 <div class="col-md-12 heading-section ftco-animate">
<p class="color-black">Республика Карелия, Сортавала, поселок Вуорио<br>
Турбаза в 3 км от города Сортавала. Уютные отдельно стоящие дома, рассчитанные для  гостей от 4 до 6.<br>
●	В одноэтажном коттедже две спальни, гостиная, кухня, санузел, финская сауна. Современный интерьер в светлом скандинавском стиле, кухня с бытовой техникой, посудой для комфортного семейного отдыха, возможно проживание детей. Место живописное, спокойное.<br>
●	Есть мангал, автомобильная парковка. <br>
При желании можно заказать экскурсии к достопримечательностям Карелии, водные прогулки в комфортабельном катере по Ладожским шхерам, остров Валаам.<br>
Стоимость проживания: от 5 500 рублей для троих за сутки.<br>


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
    "url": "https://sonniyzaliv.ru/karelia-otdyh-sortavala",
    "name": "Отдых в Сортвале базы и дома обзор  | Сонный Залив Сортавала",
    "description": "Отдых в Сортавале, Шале Клевер на берегу Ладоги, Дом Полярная станция под ключ в Карелии, Отдых в Сортавала на берегу Ладожского озера, Отдых в Карелии Сортавала домики на берегу озера, База отдыха Лунный залив, Гостевой дом Нордикхаус, Гостевые Домики у Озера, Гостевой дом в Вуорио",
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
