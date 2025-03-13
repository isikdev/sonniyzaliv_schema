<?php
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

    $title = 'Договор публичной оферты';
?>

<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?php echo $title; ?></title>

      <link rel="canonical" href="https://sonniyzaliv.ru/agreement"/>

      <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="css/aos.css">

    <!-- Font Awesome -->
    <link href="css/font-awesome.min.css" rel="stylesheet">

    <!-- Favicon -->
    <link rel="shortcut icon" href="https://sonniyzaliv.ru/favicon.ico" type="image/x-icon">
    <link href="favicon.ico" rel="icon" type="image/x-icon">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/flaticon.css?v=3.4">
    <link rel="stylesheet" href="css/mistral.css">
    <link rel="stylesheet" href="css/monotype_corsiva.css">
    <link rel="stylesheet" href="css/icomoon.css?v=3.4">
    <link rel="stylesheet" href="css/style.min.css?v=5.2">

    <meta name="yandex-verification" content="077ed0cb5ca007c0" />
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
                  </ul>
              </nav>
          </div>
      </section>
  </header>
  <main role="main">
  <section class="ftco-section services-section bg-dark">
      <div class="container">
          <div class="row no-gutters align-items-end justify-content-center pt-5 pb-5">
              <div class="col-md-9 ftco-animate pb-5 text-center">
                  <h1 class="mb-3 bread" style="color: antiquewhite;">Договор публичной оферты</h1>
                  <p class="breadcrumbs pt-5" style="font-weight: bold"><span class="mr-2"><a href="/">Главная <i class="ion-ios-arrow-forward"></i></a></span><span>Договор оферты</span></p>
              </div>
          </div>
      </div>
    </section>
     <section class="ftco-section services-section bg-light">
      <div class="container">
          <div class="row no-gutters align-items-end justify-content-center">
              <div class="col-md-9 ftco-animate pb-5" style="color: black">
                  <p><b>1.&nbsp;&nbsp;&nbsp;&nbsp; Общие положения</b></p>

                  <p style="margin-left: 30px">1.1.&nbsp;&nbsp;&nbsp;&nbsp; Настоящий Договор является официальным предложением (публичной офертой)
                     ИП Носко Александр Александрович ИНН 920453015066 (в дальнейшем
                     «Исполнитель») для
                     полностью дееспособного физического (далее – «Заказчик»), которое примет
                     настоящее предложение, на указанных ниже условиях.</p>

                  <p style="margin-left: 30px">1.2.&nbsp;&nbsp;&nbsp;&nbsp; В соответствии с пунктом 2 статьи 437 Гражданского Кодекса Российской
                      Федерации (ГК РФ), в случае принятия изложенных ниже условий и оплаты услуг
                      юридическое или физическое лицо, производящее акцепт этой оферты, становится
                      Заказчиком (в соответствии с пунктом 3 статьи 438 ГК РФ акцепт оферты равносилен
                      заключению Договора на условиях, изложенных в оферте).</p>

                  <p style="margin-left: 30px">1.3.&nbsp;&nbsp;&nbsp;&nbsp; Моментом полного и безоговорочного принятия Заказчиком предложения Исполнителя
                      заключить Договор оферты (акцептом оферты) считается факт получения оплаты за бронирование.
                      Текст настоящего Договора-оферты (далее по тексту – «Договор»)
                      расположен по адресу https://sonniyzaliv.ru/agreement. Осуществляя акцепт Договора в порядке,
                      определенном п. 1.3 Договора, Заказчик подтверждает, что он ознакомлен, согласен,
                      полностью и безоговорочно принимает все условия Договора в том виде, в каком они
                      изложены в тексте Договора, в том числе в приложениях к Договору, являющихся его
                      неотъемлемой частью.</p>

                  <p style="margin-left: 30px">1.4.&nbsp;&nbsp;&nbsp;&nbsp; Заказчик согласен, что акцепт Договора в порядке, указанном в п. 1.2 Договора
                      является заключением Договора на условиях, изложенных в нем.</p>

                  <p style="margin-left: 30px">1.5.&nbsp;&nbsp;&nbsp;&nbsp; Договор не может быть отозван.</p>

                  <p style="margin-left: 30px">1.6.&nbsp;&nbsp;&nbsp;&nbsp; Договор не требует скрепления печатями и/или подписания Заказчиком и
                      Исполнителем (далее по тексту - Стороны) и сохраняет при этом юридическую силу.</p>

                  <p><b>2.&nbsp;&nbsp;&nbsp;&nbsp;Предмет договора</b></p>

                  <p style="margin-left: 30px">2.1.&nbsp;&nbsp;&nbsp;&nbsp; Предметом настоящего Договора является возмездное оказание Исполнителем электронных
                      услуг гарантированного электронного Бронирования проживания (резервирование проживания в объекте размещения по цене определенной на сайте https://sonniyzaliv.ru) в объекте размещения,
                      выбранном заказчиком, согласно тарифам, выбранным заказчиком в модуле бронирования сайта https://sonniyzaliv.ru  в соответствии с условиями изложенными в описании тарифа и настоящего Договора.
                      Услуга бронирования является оказанной Исполнителем в полном объеме в момент получения Заказчиком электронного бронирования</p>

                  <p style="margin-left: 30px">2.2.&nbsp;&nbsp;&nbsp;&nbsp; Заказчик полностью принимает условия Договора и оплачивает услуги
                      Исполнителя в соответствии с условиями настоящего Договора.</p>
                 <p style="margin-left: 30px">2.3.&nbsp;&nbsp;&nbsp;&nbsp; Исполнитель гарантирует достоверность данных об объекте размещения представленного на сайте в модуле бронирования (описание, фотографии, актуальность стоимости проживания в конткретную дату проживания).</p>

                  <p><b>3.&nbsp;&nbsp;&nbsp;&nbsp;Оплата Услуг</b></p>

                  <p style="margin-left: 30px">3.1.&nbsp;&nbsp;&nbsp;&nbsp; Стоимость услуг по Договору определяется в соответствии с действующими ценами и
                      прописана на сайте https://sonniyzaliv.ru/ Стоимость услуги может быть изменена
                      Исполнителем по согласованию с Заказчиком</p>

                  <p style="margin-left: 30px">3.2.&nbsp;&nbsp;&nbsp;&nbsp; Способы оплаты услуги указаны при оформлении платежа</p>

                  <p><b>4.&nbsp;&nbsp;&nbsp;&nbsp;Интеллектуальная собственность</b></p>

                  <p style="margin-left: 30px">4.1.&nbsp;&nbsp;&nbsp;&nbsp; Вся текстовая информация и графические изображения, находящиеся на сайте
                      https://sonniyzaliv.ru/ являются собственностью Исполнителя.</p>

                  <p><b>5.&nbsp;&nbsp;&nbsp;&nbsp;Особые условия и ответственность сторон</b></p>

                  <p style="margin-left: 30px">5.1.&nbsp;&nbsp;&nbsp;&nbsp; Исполнитель несет ответственность за своевременность предоставляемых услуг при
                      выполнении Заказчиком установленных требований и правил, размещенных на сайте
                      https://sonniyzaliv.ru/.</p>

                  <p style="margin-left: 30px">5.2.&nbsp;&nbsp;&nbsp;&nbsp; Исполнитель освобождается от ответственности за нарушение условий Договора,
                      если такое нарушение вызвано действием обстоятельств непреодолимой силы (форс-мажор),
                      включая: действия органов государственной власти, пожар, наводнение, землетрясение, другие
                      стихийные действия, отсутствие электроэнергии, забастовки, гражданские волнения,
                      беспорядки, любые иные обстоятельства, не ограничиваясь перечисленным, которые могут
                      повлиять на выполнение Исполнителем Договора.</p>

                  <p style="margin-left: 30px">5.3.&nbsp;&nbsp;&nbsp;&nbsp; Исполнитель не несет ответственности за качество каналов связи общего
                      пользования или служб, предоставляющих доступ Заказчика к его услугам.</p>

                  <p><b>6.&nbsp;&nbsp;&nbsp;&nbsp;Конфиденциальность и защита персональной информации</b></p>

                  <p style="margin-left: 30px">6.1.&nbsp;&nbsp;&nbsp;&nbsp; Исполнитель обязуется не разглашать полученную от Заказчика информацию.</p>

                  <p style="margin-left: 30px">6.2.&nbsp;&nbsp;&nbsp;&nbsp; Не считается нарушением обязательств разглашение информации в
                      соответствии с обоснованными и применимыми требованиями закона.</p>

                  <p style="margin-left: 30px">6.3.&nbsp;&nbsp;&nbsp;&nbsp; Исполнитель получает информацию об IP-адресе посетителя Сайта
                      https://sonniyzaliv.ru/. Данная информация не используется для установления личности
                      посетителя.</p>

                  <p style="margin-left: 30px">6.4.&nbsp;&nbsp;&nbsp;&nbsp; Исполнитель не несет ответственности за сведения, предоставленные Заказчиком
                      на сайте в общедоступной форме.</p>

                  <p><b>7.&nbsp;&nbsp;&nbsp;&nbsp;Порядок рассмотрения претензий и споров</b></p>

                  <p style="margin-left: 30px">7.1.&nbsp;&nbsp;&nbsp;&nbsp; Претензии Заказчика по предоставляемым услугам принимаются Исполнителем к
                      рассмотрению по электронной почте в течение 2 (рабочих) дней с момента возникновения
                      спорной ситуации.</p>

                  <p style="margin-left: 30px">7.2.&nbsp;&nbsp;&nbsp;&nbsp; При рассмотрении спорных ситуаций Исполнитель вправе запросить у
                      Заказчика всю интересующую документацию относительно рассматриваемого
                      мероприятия. В случае не предоставления Заказчиком документов в течение 1
                      рабочего дня после дня требования, претензия рассмотрению Исполнителем не
                      подлежит.</p>

                  <p style="margin-left: 30px">7.3.&nbsp;&nbsp;&nbsp;&nbsp; Исполнитель и Заказчик, принимая во внимания характер оказываемой услуги,
                      обязуются в случае возникновения споров и разногласий, связанных с оказанием услуг,
                      применять досудебный порядок урегулирования спора. В случае невозможности
                      урегулирования спора в досудебном порядке стороны вправе обратиться в суд.</p>

                  <p><b>8.&nbsp;&nbsp;&nbsp;&nbsp;Прочие условия</b></p>

                  <p style="margin-left: 30px">8.1.&nbsp;&nbsp;&nbsp;&nbsp; Заказчик обладает всеми правами и полномочиями, необходимыми для
                      заключения и исполнения Договора.</p>

                  <p style="margin-left: 30px">8.2.&nbsp;&nbsp;&nbsp;&nbsp; Заказчик вправе в одностороннем порядке отказаться от услуг
                      Исполнителя согласно п. 9.</p>

                  <p style="margin-left: 30px">8.3.&nbsp;&nbsp;&nbsp;&nbsp; Исполнитель оставляет за собой право изменять или дополнять любые из условий
                      настоящего Договора в любое время, опубликовывая все изменения на своем сайте.</p>

                  <p style="margin-left: 30px">8.4.&nbsp;&nbsp;&nbsp;&nbsp; По всем вопросам, не урегулированным настоящим Договором, стороны
                      руководствуются действующим законодательством Российской Федерации.</p>

                  <p id="cancel" style="margin-left: 30px">8.5.&nbsp;&nbsp;&nbsp;&nbsp; Признание судом недействительности какого-либо положения настоящего
                      Договора и правил не влечет за собой недействительность остальных положений.</p>

                  <p><b>9.&nbsp;&nbsp;&nbsp;&nbsp;Отмена бронирования и возврат средств</b></p>

                  <p style="margin-left: 30px">-&nbsp;&nbsp;&nbsp;&nbsp; При отмене бронирования объекта размещения, заказчик имеет право вернуть полную сумму оплаты за услугу бронирования, если факт отмены производится не менее чем за 14 суток до даты заезда указанного в бронировании.
                      При отмене бронирования менее чем за 14 суток до заезда, денежные средства, оплаченные за услугу электронного бронирования, подлежат возврату в размере стоимости превышающей стоимость одной ночи проживания указанной в бронировании. Денежные средства, равные стоимости одной ночи проживания согласно тарифу бронирования, будут удержаны Исполнителем в качестве оплаты за предоставленную услугу при отмене Заказчиком услуги бронирования в случае если до даты заезда остается мене 14 суток</p>

                  <p><b>10.&nbsp;&nbsp;&nbsp;&nbsp;Реквизиты исполнителя</b></p>

                  <p style="margin-left: 30px">-&nbsp;&nbsp;&nbsp;&nbsp; ИП Носко Александр Александрович</p>

                  <p style="margin-left: 30px">-&nbsp;&nbsp;&nbsp;&nbsp; ИНН 920453015066</p>

                  <p><b>11.&nbsp;&nbsp;&nbsp;&nbsp;Контактные данные</b></p>

                  <p style="margin-left: 30px">-&nbsp;&nbsp;&nbsp;&nbsp; г. Сортавала, поселок Нукутталахти, ул. Центральная 52</p>

                  <p style="margin-left: 30px">-&nbsp;&nbsp;&nbsp;&nbsp; тел. +79811878002</p>
              </div>
          </div>
      </div>
    </section>

  <div class="btn-back-to-top bg0-hov" id="myBtn">
      <span class="symbol-btn-back-to-top">
          <i class="fa fa-angle-double-up" aria-hidden="true"></i>
      </span>
  </div>
  </main>

  <footer class="ftco-footer bg-bottom" style="background-image: url(images/footer-bg.webp);">
      <div class="container">
          <div class="row mb-5">
              <div class="col-md">
                  <div class="ftco-footer-widget mb-4">
                      <h2 class="ftco-heading-2">Возникли вопросы?</h2>
                      <p>Звоните нам по указанным на сайте телефонам, пишите на почту и следите за новостями на официальных страницах соц. сетей</p>
                      <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                          <li class="ftco-animate"><a href="https://instagram.com/sonniy_zaliv_sortavala?utm_medium=copy_link" target="_blank"><span class="icon-instagram"></span></a></li>
                          <li class="ftco-animate"><a href="https://www.youtube.com/channel/UC3VGSE6WgQujUXpLhHTjH7A" target="_blank"><span class="icon-youtube"></span></a></li>
                          <li class="ftco-animate"><a href="https://wa.me/79811878002" target="_blank"><span class="icon-whatsapp"></span></a></li>
                          <li class="ftco-animate"><a href="https://www.avito.ru/sortavala/doma_dachi_kottedzhi/kottedzh_80_m_na_uchastke_125_sot._2154093436" target="_blank"><img style="width: inherit;margin: 13px 0;padding: 4px;" src="/icons/avito.svg"></a></li>
                      </ul>
                  </div>
              </div>
              <div class="col-md">
                  <div class="ftco-footer-widget mb-4 ml-md-5">
                      <h2 class="ftco-heading-2">Информация</h2>
                      <ul class="list-unstyled">
                          <li><a href="/policy" class="py-2 d-block">Политика конфиденциальности</a></li>
                          <li><a href="/agreement" class="py-2 d-block">Договор оферты</a></li>
                          <li><a href="/taksi" class="py-2 d-block">Такси Сортавала</a></li>
                          <li><a href="/relaks" class="py-2 d-block">Кафе "Релакс"</a></li>
                      </ul>
                  </div>
              </div>
              <div class="col-md">
                  <div class="ftco-footer-widget mb-4">
                      <h2 class="ftco-heading-2">Контактная информация</h2>
                      <div class="block-23 mb-3">
                          <ul>
                              <li><span class="icon icon-map-marker"></span><span class="text">Россия, Республика Карелия, Сортавальское городское поселение, п. Нукутталахти, ул. Центральная, д. 52</span></li>
                              <li><span class="icon icon-phone_iphone"></span><a href="tel://+79811878002"><span class="text">+7 (981) 187-80-02</span></a></li>
                              <li><span class="icon icon-envelope-o"></span><a href="mailto:sonniyzaliv@yandex.ru"><span class="text">sonniyzaliv@yandex.ru</span></a></li>
                          </ul>
                      </div>
                  </div>
              </div>
          </div>

          <div class="row">
              <div class="col-md-12 text-center">
                  <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> Все права защищены | Сонный залив</p>
                  <p><img src="images/pay.png" alt="Visa, MasterCard, МИР" title="Visa, MasterCard, МИР"></img></p>
                  <p><a href="http://info.paymaster.ru/" target="_blank"><img src="/images/banners/paymaster.png" alt="PayMaster | Прием платежей"></a></p>
                  <p><iframe src="https://yandex.ru/sprav/widget/rating-badge/222502182716" width="150" height="50" frameborder="0"></iframe></p>
              </div>
          </div>
      </div>
  </footer>

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

  <script defer src="js/jquery.min.js"></script>
  <script defer src="js/jquery-migrate-3.0.1.min.js"></script>
  <script defer src="js/popper.min.js"></script>
  <script defer src="js/bootstrap.min.js"></script>
  <script defer src="js/jquery.easing.1.3.js"></script>
  <script defer src="js/jquery.waypoints.min.js"></script>
  <script defer src="js/jquery.stellar.min.js"></script>

  <!-- blockUI -->
  <script defer src="js/jquery.blockUI.js"></script>

  <script defer type="text/javascript" src="js/t-datepicker.js?v=5.2"></script>

  <script defer src="js/swiper.js" type="text/javascript"></script>
  <script defer src="js/swiper.min.js" type="text/javascript"></script>
  <script defer src="js/swiper-custom.js?v=5.1" type="text/javascript"></script>

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
  <script defer src="js/main.min.js?v=5.2"></script>

  <script defer src="js/wow.min.js"></script>

  <script>
      var dates = [];
      var oneDayRange = [];

      dates = <?php echo json_encode($dates) ?>;
      oneDayRange = <?php echo json_encode($oneDayRange) ?>;
  </script>

  <!-- other scripts -->
  <script defer src="js/script.min.js?v=5.2"></script>

  <script defer src="js/cbpFWTabs.js"></script>

  <script type="application/ld+json">{
    "@context": "https://schema.org",
    "@type": "WebPage",
    "url": "https://sonniyzaliv.ru/agreement",
    "name": "Договор публичной оферты",
    "description": "",
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

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-3HP381QVQQ"></script>
  <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-3HP381QVQQ');
  </script>

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
