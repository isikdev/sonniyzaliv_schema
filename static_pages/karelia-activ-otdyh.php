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

    $title = 'Активный отдых в Карелии | Сонный Залив Сортавала';
    $descr = 'Активный отдых в Карелии, Велопрокат в Карелии, Горные лыжи в Карелии, Зимний отдых в Карелии, Кайтсерфинг в Карелии, Каноэ в Карелии, Каякинг в Карелии, Мотоспорт в Карелии, Парасейлинг в Карелии, Пеший туризм в Карелии, Рыбалка в Карелии, Сноуборд в Карелии, Туры на собачьих упряжках в Карелии';
    $keywords = 'Велопрокат в Карелии, Горные лыжи в Карелии, Зимний отдых в Карелии, Кайтсерфинг в Карелии, Каноэ в Карелии, Каякинг в Карелии, Мотоспорт в Карелии, Парасейлинг в Карелии, Пеший туризм в Карелии, Рыбалка в Карелии, Сноуборд в Карелии, Туры на собачьих упряжках в Карелии, Активный отдых в Карелии';

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

    <link rel="canonical" href="https://sonniyzaliv.ru/karelia-activ-otdyh"/>

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
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/articles/601.webp');" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate pb-5 text-center" style="margin-top: 100px;">
              <h1 id="act-form" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Активный отдых в Карелии</h1>
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
                    <h2 class="mb-4"> Активный отдых в Карелии</h2>
                    <p>Информация, которая будет Вам полезна при выборе места для отдыха</p>
                </div>
            </div>
            <div class="col-md-12 heading-section ftco-animate">
                <p class="color-black">Наш край является идеальным местом отдыха не только для тех людей, которые ищут покоя в единении с природой. Здесь невероятно красивые пейзажи, которые так и манят любителей активного отдыха. Вы даже можете составить свою собственную уникальную программу экстремального отдыха в этом Ладожском, озерном крае</p>

                   <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
                   <h2 class="mb-4"> Велопрокат в Карелии</h2>
                    </div>
                   <div class="row d-flex pt-3 pb-5">
                    <img class="col-md-12 ftco-animate" src="images/articles/601.webp" alt="Велопрокат в Карелии">
                </div>


                <p class="color-black">Северо-запад России привлекает любителей велоспорта со всей страны обзорными вершинами, живописными водопадами, а также маршрутами, которые проходят по лесной местности. Добираться до этих мест пешком очень затруднительно. И далеко не каждая машина способна туда проехать. Остается один вариант. А именно велосипед. На нем вы можете объехать подавляющее большинство местных достопримечательностей. Возможно, в этой велопрогулке по региону вы найдете новых друзей. Потому, как давно уже доказано, велосипедные прогулки объединяют людей. Арендовать велосипед можно в парк-отелях. Однако необходимо учитывать следующие важные факторы:<br>
•В сезон спрос на аренду велосипедов может быть выше предложения<br>

• По всем вопросам стоит обращаться в отдел бронирования баз и гостевых домов.<br>
• нужно будет заполнить договор на аренду байка. Возможно, будет необходим залог или гарантия банковской картой.<br>
</p>
<?php echo $initNews; ?><!--вывод Блог ленты  -->
                <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
                   <h2 class="mb-4">Лыжный отдых в Карелии</h2>
                    </div>
            <div class="row d-flex pt-3 pb-5">
                    <img class="col-md-12 ftco-animate" src="images/articles/602.webp" alt="Лыжи в Карелии">
                </div>



 <p align="justify">
Горнолыжный сезон на севере Ленинградской области и на Ладожских побережьях начинается достаточно рано. Потому как необходимое для этого количество осадков выпадает уже в самом начале ноября. Высота сугробов в с первыми снегопадами уже достигает пятидесяти сантиметров минимум. А если снегопады случаются обильными, что в этом крае озер и лесов далеко не редкое явления, то она может достигать одного метра.
Но сразу отметим, что не стоит ожидать от Ладожских берегов такого же катания, как в курорте Домбай.
<br></p>

<div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
<h3 class="mb-4">Зимний отдых в Карелии</h3>
 </div>

<p class="color-black">Такое словосочетание как «зимняя сказка» звучит достаточно банально. Но только не в отношении такого красивейшего места как заснеженный финский край. Потому что зима здесь действительно сказочная.
Само собой разумеется, что у нас случаются сильные заморозки. Все-таки это север России. Но заморозки здесь чаще всего бывают кратковременными. В то время как в Сибири они могут держаться до тридцати суток.
Вообще, неожиданные погодные явления случаются в Приладожье достаточно часто. Причем как зимой, так и летом. Ладожское озеро создает особый микроклимат. Ярко выраженный «континентальный» с знойным, но коротким летом и сильными снежными зимами. Причина заключается в том, что здесь встречаются большие массы холодного и сухого воздуха со стороны Арктики и массы теплого влажного воздуха со стороны Ладоги. Снежные метели и заносы на Ладоге - это частое явление.
Говоря о зимнем отдыхе как в южной, центральной так с северной части республики нельзя не упомянуть о рыбалке. Этот процесс заводит, интригует, он уникален. И речь, в этом случае, идет далеко не только о специфичности рыболовных принадлежностей. Тут дело в самой атмосфере. Солнце, играющее среди кристаллов снега, вода. И рыба, которая плавает где-то глубоко. Вытащить её - это задача далеко не из простых. Отличное времяпровождение для больших и маленьких любителей зимних развлечений.</p>



<div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
<h3 class="mb-4">Кайт-серфинг в Карелии</h3>
 </div>
  <div class="row d-flex pt-3 pb-5">
                    <img class="col-md-12 ftco-animate" src="images/articles/603.webp" alt="Кайт-серфинг в Карелии">
                </div>

<p align="justify">Изначально совершенно непонятый, новый для нас, однако на текущий момент времени, можно сказать родной кайт-серфинг, становится достаточно распространенным явлением в местах где много озер и заснеженных рек . Скорость на кайте может достигать сотни километров в час. Так что это развлечение не для слабаков и трусов. Нужно быть выносливым и сильным. Причем как телом, так и духом. При взгляде на человека, который все же набрался смелости и занялся кайт-серфинг невольно вырывается возглас восхищения.
Опасность порвать стропы – это ничто в сравнении с умопомрачительным драйвом.
</p>

<div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
<h3 class="mb-4">Каноэ в Карелии</h3>
 </div>

<img class="col-md-12 ftco-animate" src="images/articles/604.webp" alt="Каякинг в Карелии">

        <p align="justify">Каякинг — это сплав по рекам или плавание по озерам на легкой и очень маневренной лодке — каяке. Само название заставляет усмехнуться. Да и занятие это само по себе может показаться достаточно забавным. Однако, мы рекомендуем этим заниматься после того как  вами  пройдена предварительная подготовка.
Как утверждают инструкторы, новых ощущений будет хоть отбавляй. Одним из наиболее интересных способов добавить адреналина - это сплав к старой плотине. После того как вы рассмотрите ее со всех сторон и сфотографируетесь на ее фоне во всех возможных ракурсах путь ваш будет лежать на ближайший остров. Который, кстати говоря, полностью необитаемым. Там вас тоже будет ожидать интересное приключение.</p>

 <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
<h3 class="mb-4">Мотоспорт в Карелии</h3>
 </div>
<img class="col-md-12 ftco-animate" src="images/articles/605.webp" alt="Мотоспорт в Карелии">

<p align="justify"> Для того чтобы провести выходные с драйвом и пользой в Карелии природой  созданы абсолютно все условия. Почва здесь в основном песчаная, что существенным образом снижает степень риска получения мотоциклистом травм. Множество грунтовых дорог и тропинок создает трассы в левах на горах и склонах вдоль озер.
Когда-то территория, по которой проходит трасса, принадлежала Минобороны Российской Федерации. Военные были против мотоспорта. К вопросу подключился глава республики и был найден компромисс с военными для запуска мототрасс</p>


 <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
<h3 class="mb-4">Парасейлинг в Карелии</h3>
 </div>
  <img class="col-md-12 ftco-animate" src="images/articles/606.webp" alt="Парасейлинг в Карелии">
<p align="justify">
Парасейлинг в Приладожье – это увлекательное приключение, которое позволяет вам испытать неземные ощущения, паря над живописными пейзажами этого красивого региона. При помощи специального параплана вы сможете подняться в небо и насладиться великолепными видами на озера, леса и горы. Это отличная возможность для тех, кто ищет активный отдых и адреналин. Независимо от вашего уровня подготовки, опытные инструкторы помогут вам освоить технику парасейлинга и научат основам безопасности. Не упустите шанс испытать свободу полета и ощутить всю красоту зеленых елей и озер с высоты птичьего полета.</p>
 <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
<h3 class="mb-4">Пеший туризм в Карелии</h3>
 </div>
<p align="justify">Пешие прогулки вдоль рек и долин по залитым солнцем лужайкам, всегда остается идеальным вариантом для групп, в состав которых входят дети. Наиболее популярными на текущий момент времени предлагаем следующие направления: <br>
• Сопохский бор - Железистые ключи.<br>
• Калевальский пеший тракт. В древние времена эти места были  густо населены людьми, которые исповедовали языческую культуру.<br>
• прогулка «В сказочном лесу». Данный путевой вариант считается экскурсионным. Он пролегает через сосновый бор к «Царь-порогу», который формируют воды р. Каменная она протекает по руслу из ледниковых валунов. Длина Царь-порога  двести метров, и слышно его по всей тропе. После него река образует еще несколько перепадов<br>
• маршрут «Тропа коробейников». Эта веселая дорога ориентирована главным образом на детей, потому как представляет деревянные мостки через лес. Однако есть вариант и для взрослых людей. Он длиннее.
В древние времена именно этими дорогами ходили люди, которые, выражаясь современным языком, занимались предпринимательской деятельностью.<br>
• Маршрут «Лувеньгские тундры». Это пешее приключение будет  проходить по береговой линии Белого моря, южной части возвышенности Лувеньгские тундры. Высота гор здесь, как правило, совсем небольшая. Она составляет минимум три метра и максимум четыреста метров над уровнем моря. Данный поиск новых фотографий отличается очень частой сменой ландшафтов. Сначала тропа пролегает через ельник, затем через заросли карельской березы, а затем через снежник и тундру, где растут только кустарники и мхи.<br>
• Паанаярви, подъем на  «Гору Кивакка». Этот национальный парк располагается на берегу озера, которое носит название Паанаярви, здесь находится гора Кивакка, на которой когда-то было просто огромное количество так называемых сейдов. Сейдом могло быть просто какой-то выдающееся место: каменные пирамиды, валуны «на ножках» и т. Самый большой их всех сейдом расположен практически на самой вершине горы, а помимо него там имеется несколько озер, котоыре образовались в тектонических впадинах. Данный путь отличается благоустроенностью – здесь имеются мостки через трудные ручьи, место для пикника. Длина всего участка составляет пять километров.<br>
• Паанаярви,  «Астерваярвская природная тропа». Данное приключение  проходит вдоль озера Астерваярви, просеки, некогда разделяющую территорию России от территории Финляндии, озера Паанаярви, которое собственно говоря и дало название маршруту. По дороге меняется несколько ландшафтов: лес, в котором растут орхидеи, бывший заливной луг, ныне болото. По дороге  есть места, где можно разжечь костер и передохнуть. Протяженность всего пути длится восемь с половиной километров. </p>
 <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
<h3 class="mb-4">Рыбалка в Карелии</h3>
 </div>
<p align="justify">В нашем северном крае имеется очень большое количество водоемов, рек озер, где можно ловить рыбу зимой и летом. Многие из них появились во время последнего  ледникового периода. В местных водоемах обитает богатая популяция сига, форели, щуки, налима, а также леща. Рыбы много, поскольку кормовая база внушительная.<br></p>
 <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
<h3 class="mb-4">Сноуборд в Карелии</h3>
 </div>
<p align="justify">У нас  есть все условия для любителей сноуборда, чтобы насладиться активным развлечением на горных склонах. Разнообразные горнолыжные курорты, такие как Лямпи, Рука, Паллас и Кивач, предлагают отличные трассы для сноубордистов всех уровней подготовки.</p>
 <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
<h3 class="mb-4">Туры на собачьих упряжках в Карелии</h3>
 </div>
<p align="justify">Туры на собачьих упряжках на берегах Ладоги предлагают уникальную возможность насладиться активным времяпровождением и прикоснуться к природе. Сидя на санях в такой поездке, туристы получают возможность управлять собачьей упряжкой и исследовать дикую и красивую местность.
Для Собак, температура ниже -20 градусов мороза привычна. А вот для человека — это уже холодно. На туре выдаётся специальная одежда. Тем не менее стоит помнить о том, что тур интересен для детей и взрослых и стоит съездить испытать новый опыт</p>



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
    "url": "https://sonniyzaliv.ru/karelia-activ-otdyh",
    "name": "Активный отдых в Карелии | Сонный Залив Сортавала",
    "description": "Активный отдых в Карелии, Велопрокат в Карелии, Горные лыжи в Карелии, Зимний отдых в Карелии, Кайтсерфинг в Карелии, Каноэ в Карелии, Каякинг в Карелии, Мотоспорт в Карелии, Парасейлинг в Карелии, Пеший туризм в Карелии, Рыбалка в Карелии, Сноуборд в Карелии, Туры на собачьих упряжках в Карелии",
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
