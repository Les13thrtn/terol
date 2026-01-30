<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
    die();

if (strtolower($APPLICATION->GetCurPage()) != $APPLICATION->GetCurPage())
    LocalRedirect(strtolower($APPLICATION->GetCurPage())."/", false, '301 Moved Permanently');




if ( strpos($_SERVER['HTTP_HOST'] ?? '', ':443') !== false) {
    header('Location: https://skyview.ru' . $_SERVER['REQUEST_URI'], true, 301);
    exit;
}







use Bitrix\Main\Page\Asset;

define("IS_INDEX_PAGE", CSite::InDir('/index.php'));

define("IS_404_PAGE", defined("ERROR_404"));

if (IS_INDEX_PAGE)
    $cssPage = "index.min.css";

if (IS_404_PAGE)
    $cssPage404 = "404.min.css";

// Asset::getInstance()->addJs("https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js");

switch ($APPLICATION->GetDirProperty("page")) {
    case 'apartments_gallery':
        $cssPage = "apartments-gallery.min.css";
        break;
    case 'contacts':
        $cssPage = "contacts.min.css";
        break;
    case 'environments':
        $cssPage = "environments.min.css";
        break;
    case 'events':
        $cssPage = "events.min.css";
        break;
    case 'for_life':
        $cssPage = "for-life.min.css";
        break;
    case 'gallery':
        $cssPage = "gallery.min.css";
        break;
    case 'dynamics':
        $cssPage = "dynamics.min.css";
        break;
    case 'kellers':
        $cssPage = "keller.min.css";
        break;
    case 'parking':
        $cssPage = "parking.min.css";
        break;
    case 'project':
        $cssPage = "project.min.css";
        break;
    case 'parking_new':
        $cssPage = "parking.min.css";
        break;
}

//Metrucs
//$scriptHead    = '';
//$scriptBody    = '';
//$scriptBodyEnd = '';
$arSelect = array("ID", "NAME", "PREVIEW_TEXT", "DETAIL_TEXT", "PROPERTY_BODY_END");
$arFilter = array("IBLOCK_ID" => 'METRICS_IBLOCK_ID', "ACTIVE" => "Y");
$resMetrics = CIBlockElement::GetList(false, $arFilter, false, array("nPageSize" => 1), $arSelect)->Fetch();
$scriptHead = $resMetrics['PREVIEW_TEXT'];
$scriptBody = $resMetrics['DETAIL_TEXT'];
$scriptBodyEnd = $resMetrics['PROPERTY_BODY_END_VALUE']['TEXT'];

$arrUriTitles = [
    '/search/tower-d/floor-6/flat-d16/',
    '/search/tower-b/floor-20/flat-b75/',
    '/search/tower-a/floor-18/flat-a69/',
    '/search/tower-b/floor-18/flat-b71/',
    '/search/tower-a/floor-15/flat-a58/',
    '/search/tower-a/floor-17/flat-a66/',
    '/search/tower-a/floor-17/flat-a65/',
    '/search/tower-d/floor-5/flat-d9/',
    '/search/tower-d/floor-5/flat-d8/',
    '/search/tower-d/floor-5/flat-d7/',
    '/search/tower-a/floor-5/flat-a12/',
    '/search/tower-b/floor-5/flat-b10/',
    '/search/tower-c/floor-11/flat-c42/',
    '/search/tower-d/floor-5/flat-d10/',
    '/search/tower-a/floor-4/flat-a5/',
    '/search/tower-a/floor-16/flat-a64/',
    '/search/tower-a/floor-18/flat-a70/',
    '/search/tower-a/floor-4/flat-a6/',
    '/search/tower-c/floor-18/flat-c69/',
    '/search/tower-a/floor-6/flat-a16/',
    '/search/tower-a/floor-6/flat-a15/',
    '/search/tower-a/floor-6/flat-a13/',
    '/search/tower-d/floor-14/flat-d55/',
    '/search/tower-d/floor-14/flat-d56/',
    '/search/tower-b/floor-12/flat-b47/',
    '/search/tower-b/floor-4/flat-b6/',
    '/search/tower-b/floor-4/flat-b5/',
    '/search/tower-b/floor-4/flat-b2/',
    '/search/tower-b/floor-4/flat-b1/',
    '/search/tower-b/floor-5/flat-b7/',
    '/search/tower-d/floor-16/flat-d62/',
    '/search/tower-b/floor-16/flat-b64/',
    '/search/tower-d/floor-18/flat-d71/',
    '/search/tower-a/floor-14/flat-a53/',
    '/search/tower-a/floor-14/flat-a54/',
    '/search/tower-a/floor-14/flat-a55/',
    '/search/tower-a/floor-14/flat-a56/',
    '/search/tower-c/floor-5/flat-c7/',
    '/search/tower-c/floor-5/flat-c8/',
    '/search/tower-a/floor-10/flat-a35/',
    '/search/tower-a/floor-10/flat-a39/',
    '/search/tower-a/floor-10/flat-a38/',
    '/search/tower-b/floor-13/flat-b52/',
    '/search/tower-c/floor-12/flat-c48/',
    '/search/tower-a/floor-7/flat-a23/',
    '/search/tower-a/floor-7/flat-a21/',
    '/search/tower-c/floor-6/flat-c13/',
    '/search/tower-c/floor-6/flat-c18/',
    '/search/tower-b/floor-18/flat-b69/',
    '/search/tower-a/floor-13/flat-a49/',
    '/search/tower-a/floor-13/flat-a51/',
    '/search/tower-a/floor-9/flat-a30/',
    '/search/tower-a/floor-9/flat-a33/',
    '/search/tower-d/floor-4/flat-d2/',
    '/search/tower-d/floor-4/flat-d4/',
    '/search/tower-d/floor-8/flat-d26/',
    '/search/tower-d/floor-8/flat-d27/',
    '/search/tower-a/floor-13/flat-a52/',
    '/search/tower-c/floor-15/flat-c57/',
    '/search/tower-b/floor-10/flat-b37/',
    '/search/tower-d/floor-12/flat-d47/',
    '/search/tower-d/floor-11/flat-d42/',
    '/search/tower-c/floor-9/flat-c34/',
    '/search/tower-c/floor-9/flat-c30/',
    '/search/tower-d/floor-12/flat-d45/',
    '/search/tower-b/floor-17/flat-b65/',
    '/search/tower-a/floor-8/flat-a27/',
    '/search/tower-c/floor-7/flat-c20/',
    '/search/tower-c/floor-7/flat-c23/',
    '/search/tower-a/floor-8/flat-a29/',
    '/search/tower-b/floor-17/flat-b68/',
    '/search/tower-a/floor-11/flat-a44/',
    '/search/tower-a/floor-11/flat-a41/',
    '/search/tower-a/floor-11/flat-a43/',
    '/search/tower-c/floor-13/flat-c50/',
    '/search/tower-a/floor-19/flat-a73/',
    '/search/tower-a/floor-19/flat-a74/',
    '/search/tower-d/floor-6/flat-d14/',
    '/search/tower-a/floor-15/flat-a59/',
    '/search/tower-b/floor-6/flat-b15/',
    '/search/tower-c/floor-17/flat-c68/',
    '/search/tower-d/floor-9/flat-d33/',
    '/search/tower-a/floor-12/flat-a45/',
    '/search/tower-b/floor-11/flat-b43/',
    '/search/tower-a/floor-5/flat-a7/',
    '/search/tower-c/floor-14/flat-c55/',
    '/search/tower-c/floor-14/flat-c53/',
    '/search/tower-c/floor-4/flat-c6/',
    '/search/tower-c/floor-4/flat-c5/',
];
?>
<?
$LastModified_unix = 1294844676; // время последнего изменения страницы
$LastModified = gmdate('D, d M Y H:i:s') . ' GMT';
$IfModifiedSince = false;
if (isset($_ENV['HTTP_IF_MODIFIED_SINCE']))
    $IfModifiedSince = strtotime(substr($_ENV['HTTP_IF_MODIFIED_SINCE'], 5));
if (isset($_SERVER['HTTP_IF_MODIFIED_SINCE']))
    $IfModifiedSince = strtotime(substr($_SERVER['HTTP_IF_MODIFIED_SINCE'], 5));
if ($IfModifiedSince && $IfModifiedSince >= $LastModified_unix) {
    header($_SERVER['SERVER_PROTOCOL'] . ' 304 Not Modified');
    exit;
}
header('Last-Modified: ' . $LastModified);
?>

<!DOCTYPE html>
<html lang="<?= 'LANGUAGE_CODE' ?>">

<head itemscope itemtype="http://schema.org/WPHeader">
    <meta charset="utf-8">
	<!--<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
	<meta http-equiv="Pragma" content="no-cache" />
	<meta http-equiv="Expires" content="0" />-->
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <? /*<meta name="keywords" content>
    <meta name="description" content>*/ ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="format-detection" content="telephone=no">
    <meta name="yandex-verification" content="7434d43f0bcddf24">
    <meta name="copyright" lang="ru" content="Премиальный жилой комплекс «Sky View»">
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <link rel="preload" href="<?= SITE_TEMPLATE_PATH ?>/fonts/Montserrat-Bold.woff2" as="font" type="font/woff2"
          crossorigin>
    <link rel="preload" href="<?= SITE_TEMPLATE_PATH ?>/fonts/Montserrat-Medium.woff2" as="font" type="font/woff2"
          crossorigin>
    <link rel="preload" href="<?= SITE_TEMPLATE_PATH ?>/fonts/Montserrat-Regular.woff2" as="font" type="font/woff2"
          crossorigin>
    <link rel="preload" href="<?= SITE_TEMPLATE_PATH ?>/fonts/SourceSerifPro-ExtraLight.woff2" as="font"
          type="font/woff2" crossorigin>
    <link rel="preload" href="<?= SITE_TEMPLATE_PATH ?>/fonts/SourceSerifPro-Light.woff2" as="font" type="font/woff2"
          crossorigin>
    <link rel="preload" href="<?= SITE_TEMPLATE_PATH ?>/fonts/SourceSerifPro-Regular.woff2" as="font" type="font/woff2"
          crossorigin>


    <link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/css/app.min.css?v=1620718713635">
    <link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/css/new-style.css?v=711">
<!--    <link data-page-transition-css rel="stylesheet" href="--><?php //= SITE_TEMPLATE_PATH ?><!--/css/plan.min.css">-->
    <?
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/swiper-bundle.min.css");
    ?>


    <?= !empty($cssPage) ? '<link data-page-transition-css rel="stylesheet" href="' . SITE_TEMPLATE_PATH . '/css/' . $cssPage . '">' : null; ?>
    <?= !empty($cssPage404) ? '<link rel="stylesheet" href="' . SITE_TEMPLATE_PATH . '/css/' . $cssPage404 . '">' : null; ?>
    <?
    //$APPLICATION->ShowHead()
    //    $APPLICATION->ShowMeta("robots");
    //$APPLICATION->ShowMeta("keywords");
    //    $APPLICATION->ShowMeta("description");
    $APPLICATION->ShowLink("canonical");
    $APPLICATION->ShowCSS();
    $APPLICATION->ShowHeadStrings();
    $APPLICATION->ShowHeadScripts();
    // Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/3.4.jquery.min.js");
    // Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/custom.js");
    // Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jquery.maskedinput.js");
    ?>
    <meta name="robots" content="index, follow">
    <title itemprop="headline"><? $APPLICATION->ShowTitle() ?></title>
    <meta name="description" content="<? $APPLICATION->ShowProperty("description"); ?>">
    <meta name="test" content="<?= $LastModified ?>">
    <?= $scriptHead ? $scriptHead : ''; ?>
    <meta property="og:title" content="<? $APPLICATION->ShowTitle() ?>">
    <meta property="og:description" content="<? $APPLICATION->ShowProperty("description"); ?>">
    <meta property="og:image" content="https://skyview.ru/upload/logo_sky.png">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://skyview.ru<?= $APPLICATION->GetCurDir(); ?>">
    <meta property="og:site_name" content="skyview">
    <link rel="canonical" href="<?= $APPLICATION->GetCurDir(); ?>">
    <link rel="apple-touch-icon" href="touch-icon-iphone.png">
    <link rel="apple-touch-icon" sizes="76x76" href="touch-icon-ipad.png">
    <link rel="apple-touch-icon" sizes="120x120" href="touch-icon-iphone-retina.png">
    <link rel="apple-touch-icon" sizes="152x152" href="touch-icon-ipad-retina.png">
	<script data-skip-moving="true" src="/local/templates/skyview/js/3.4.jquery.min.js"></script>
	<script data-skip-moving="true" src="/local/templates/skyview/js/custom.js"></script>
    <style>

        <? if (CSite::InDir('/gallery/')) : ?>@media screen and (min-width: 1025px) {
            .section_page-menu .page-menu {
                margin-top: -9.8rem !important;
                margin-bottom: -15rem !important;
            }
        }

        <? endif; ?>

        .feedback-mod__tel-label {
            font-size: 14px;
        }

        .filter__item+.filter__item {
            margin-top: 3rem;
        }

        .header__new-left,
        .header__new-right,
        .header .header__new-menu ,
        .header__new-right .header__contacts {
            display: flex;
            align-items: center;
            gap: 2rem;
            flex: unset;
        }


        .header__new-menu a {
            margin: 0;
        }

        .header__new-right .header__phones {
            flex-direction: row;
            align-items: center;
            gap: 2rem;
        }

        .header__new-right .header__info {
            align-items: center;
            flex-direction: row-reverse;
            gap: 2rem;
        }

        .header__new-right .btn-small,
        .header__new-right .header__socials {
            margin: 0;
        }

        .header__logotype {
            -webkit-transform: unset;
        -ms-transform: unset;
        transform: unset;
        }

        .feedback-mod__error-text {
            margin: 1rem 0;
            color: #18263B;
            text-align: center;
            font-family: Montserrat;
            font-size: 1.25rem;
            font-weight: 500;
            line-height: 150%;
        }

        .feedback-mod__error-text span  {
            color: rgba(0, 30, 97, 0.50);

        }

        .feedback-mod__error-btn {
            margin-bottom: 1rem;
            padding: 1.25rem 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            color: #FFF;
            text-align: center;
            font-family: Montserrat;
            font-size: 1.25rem;
            font-weight: 300;
            border: 1px solid rgba(0, 30, 97, 0.25);
            cursor: pointer;
        }

        .feedback-mod__error-btn.-blue {
            color: #fff;
            background: #001E61;
        }

        .feedback-mod__error-btn.-white {
            background: #FFF;
            color: #001E61;
        }

        .feedback-mod__tel-wrap {
            position: relative;
        }

        .feedback-mod__warning {
           position: absolute;
           top: 135%;
           left: 0;
            padding: 1rem 1.5rem;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #FFF;
            font-family: "Source Serif Pro";
            font-size: 1.25rem;
            font-weight: 400;
            background: #001E61;
            pointer-events: none;
        }

        .feedback-mod__warning span {
            position: relative;
            z-index: 2;
        }

        .feedback-mod__warning:before {
            content: '';
            position: absolute;
            top: -1rem;
            left: calc(50% - 1rem);
            width: 2rem;
            height: 2rem;
            transform: rotate(45deg);
            background: #001E61;
            z-index: 1;
        }
        .section_page-menu .page-menu {
            padding: 2rem 0 0;
            margin: 0;
            margin-top: -6rem;
            display: flex;
            align-items: center;
            flex-direction: row;
            justify-content: space-around;
            width: 100%;
            height: fit-content;
            min-height: fit-content;
            border: none;
        }

        .apartments__done {
            text-align: center;
            font-size: 4.5rem;
            font-weight: 700;
            padding: 1rem 0;
            color: #2f4a73;
        }
        @media screen and (min-width: 1025px) {
            .page-menu__link,
            h1.page-menu__link {
                margin-bottom: 1.7rem !important;
            }
        }
        

       @media screen and (max-width:1480px) {
            .header__new-left,
            .header__new-right,
            .header .header__new-menu ,
            .header__new-right .header__contacts  {
                gap: 1rem;
            }

            .header__new-menu a,
            .header__contacts .phone-contacts {
                font-size: 10px;
            }
            .inner.--mob {
                align-items: center;
            }

            .section_page-menu .page-menu {
                flex-wrap: wrap;
                gap: 1rem;
            }
        }

        @media screen and (max-width:1000px) {
            .section_page-menu .page-menu {
                flex-direction: column;
                gap: unset;
                margin: 0;
            }
        }


        @media screen and (max-width: 600px) {
            .filter__item+.filter__item {
                margin-top: 1.2rem;
            }
             .page-controls__top.--fixed {
                bottom: 4rem;
            }
        }
    </style>
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
        (function(m,e,t,r,i,k,a){
            m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
            m[i].l=1*new Date();
            for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
            k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)
        })(window, document,'script','https://mc.yandex.ru/metrika/tag.js', 'ym');

        ym(83598052, 'init', {webvisor:true, clickmap:true, accurateTrackBounce:true, trackLinks:true});
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/83598052" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            setTimeout(function(){

                !function(e,n,t,a,r,c,s){c=n.createElement(t),s=n.getElementsByTagName(t)[0],c.async=1,c.src="https://containers.programmatica.com/tag.js",s.parentNode.insertBefore(c,s),c.addEventListener("load",function(){new e[r](a)})}(window,document,"script","147","sTag");

            }, 3500);
        });
    </script>


    <?/*
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-203926253-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){window.dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-203926253-1');
    </script>
    */?>

    
</head>

<body id="body">

<!-- RuTarget -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        setTimeout(function(){
            (function(w, d, s, p) { var f = d.getElementsByTagName(s)[0], j = d.createElement(s); j.async = true; j.src = '//cdn.rutarget.ru/static/tag/tag.js'; f.parentNode.insertBefore(j, f); w[p] = {rtgNoSync: false, rtgSyncFrame: true}; })(window, document, 'script', '_rtgParams');
        }, 3500);
    });
</script>
<!-- /RuTarget -->

<!-- RuTarget -->
<?
$url = $_SERVER['REQUEST_URI'];
$url = explode('?', $url);
$url = $url[0];
if($url == "/environments/") {
    ?>
    <script type="text/javascript">
        var _rutarget = window._rutarget || [];
        _rutarget.push({'event': 'thankYou', 'conv_id': 'environments'});
    </script>
    <?
}
else if($url == "/search/" or $url == "/search/parametrical/" or $url == "/parking/" or $url == "/kellers/") {
    ?>
    <script type="text/javascript">
        var _rutarget = window._rutarget || [];
        _rutarget.push({'event': 'thankYou', 'conv_id': 'search'});
    </script>
    <?
}
else if($url == "/contacts/") {
    ?>
    <script type="text/javascript">
        var _rutarget = window._rutarget || [];
        _rutarget.push({'event': 'thankYou', 'conv_id': 'contacts'});
    </script>
    <?
}
else {
    ?>
    <script type="text/javascript">
        var _rutarget = window._rutarget || [];
        _rutarget.push({'event': 'otherPage'});
    </script>
    <?
}
?>
<!-- /RuTarget -->

<?= $scriptBody ? $scriptBody : ''; ?>
<? if ($USER->IsAuthorized()) : ?>
    <div id="admin_panel"><? $APPLICATION->ShowPanel(); ?></div>
<? endif; ?>
<div class="wrapper">
    <header class="header">
        <div class="container">
            <div class="inner --mob">

                <? if (
                    $APPLICATION->GetCurDir() == '/project/' ||
                    $APPLICATION->GetCurDir() == '/commercial-real-estate/' ||
                    $APPLICATION->GetCurDir() == '/auth/' ||
                    $APPLICATION->GetCurDir() == '/' ||
                    (stristr($APPLICATION->GetCurDir(), '/gallery/') !== FALSE && stristr($APPLICATION->GetCurDir(), '/search/gallery/') === FALSE) ||
                    stristr($APPLICATION->GetCurDir(), '/articles/') !== FALSE ||
                    in_array($_SERVER['REQUEST_URI'], $arrUriTitles)

                ) : ?>
                    <div class="header__burger">
                        <a href="#" class="burger" data-menu-open>
                            <span></span>
                            <span></span>
                            <span></span>
                        </a>
                    </div>
                    <div class="header__pagetitle">
                        <?= $APPLICATION->GetDirProperty("header_title"); ?>
                    </div>
                <? else : ?>
                    <div class="header__burger">
                        <a href="#" class="burger" data-menu-open>
                            <span></span>
                            <span></span>
                            <span></span>
                        </a>
                    </div>
                    <? if(stristr($APPLICATION->GetCurDir(), '/search/') !== false ): ?>
                    <div class="header__pagetitle" style="text-transform: capitalize;">
                        <?= $APPLICATION->GetDirProperty("header_title"); ?>
                    </div>
                    <? else:?>
                    <h1 class="header__pagetitle" style="text-transform: capitalize;">
                        <?= $APPLICATION->GetDirProperty("header_title"); ?>
                    </h1>
                    <? endif; ?>
                <? endif; ?>
                <div class="header__logotype">
                    <? if (!IS_INDEX_PAGE) : ?>
                        <a class="logotype" href="/">
                            <svg class="icon icon_logotype" width="67" height="145" viewbox="0 0 67 145">
                                <use xlink:href="#logotype"/>
                            </svg>
                        </a>
                    <? else : ?>
                        <span class="logotype">
                <svg class="icon icon_logotype" width="67" height="145" viewbox="0 0 67 145">
                  <use xlink:href="#logotype"/>
                </svg>
              </span>
                    <? endif; ?>
                </div>
                <a class="header__contacts__icon" href="tel:84956496639">
                    <svg width="12" height="16" viewBox="0 0 18 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.0999 20.1L14.8 16.2C14.5 15.6 13.6 15.4 13 15.8L11 17C8.49997 15.4 5.99996 11 5.79996 8.00004L7.79996 6.80004C8.49996 6.40004 8.69997 5.60004 8.39997 5.00004L6.09995 1.10004C5.79995 0.500043 4.89996 0.300049 4.29996 0.700049L2.19995 1.90005C-1.30005 3.90005 2.09995 12.3 3.69995 15.2C5.29995 18 11 25.2 14.4 23.2L16.5 22C17.2 21.5 17.3999 20.7 17.0999 20.1Z"
                              fill="#000"/>
                    </svg>
                </a>

                <div class="header__contacts">
                    <div class="header__phones">
                        <a class="phone-contacts" href="tel:84956496639">8 (495) 649-66-39</a>
                        <a class="btn-small  " href="<?= LANGUAGE_CODE == 'ru' ? '#feedback' : '#feedback_en' ?>"
                           data-popup="<?= LANGUAGE_CODE == 'ru' ? '#feedback' : '#feedback_en' ?>"><?= LANGUAGE_CODE == 'ru' ? 'Заказать звонок' : 'Callback' ?>
                        </a>
                    </div>
                    <div class="header__info">
                        <div class="header__inner">
                            <div class="header__language mob-hide">
                                <a href="#"
                                   data-lang="<?= LANGUAGE_CODE == 'ru' ? 'en' : 'ru' ?>"><?= LANGUAGE_CODE == 'ru' ? 'ENG' : 'RU' ?></a>
                            </div>
                            <div class="header__menu" data-jump-fix>
                                <!-- <a href="#" data-menu-open-link><?= LANGUAGE_CODE == 'ru' ? 'Меню' : 'Menu' ?></a> -->
                                <a href="#" class="burger" data-menu-open-link>
                                    <span style="margin-top: 2px"></span>
                                    <span></span>
                                    <span></span>
                                </a>
                            </div>
                        </div>
                        <div class="header__socials">
                            <a class="header__social --vk" href="https://vk.com/club211223890" target="_blank"></a>

                            <a class="header__social --telega" href="https://t.me/skyviewru" target="_blank"></a>

                            <div class="header__language mob-show">
                                <a href="#"
                                   data-lang="<?= LANGUAGE_CODE == 'ru' ? 'en' : 'ru' ?>"><?= LANGUAGE_CODE == 'ru' ? 'ENG' : 'RU' ?></a>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <div class="inner --desc">
                <div class="header__new-left">
                    <div class="header__new-menu">
                        <a href="/project/"><?= LANGUAGE_CODE == 'ru' ? 'Проект' : 'Project' ?></a>
                        <a href="/search/"><?= LANGUAGE_CODE == 'ru' ? 'Подобрать апартаменты' : 'Apartments selection' ?></a>
                        <a href="/for-life/"><?= LANGUAGE_CODE == 'ru' ? 'Все для жизни' : 'Amenities' ?></a>
                        <a href="/gallery/"><?= LANGUAGE_CODE == 'ru' ? 'Галерея' : 'Gallery' ?></a>
                    </div>
                </div>
                <div class="header__logotype">
                    <? if (!IS_INDEX_PAGE) : ?>
                        <a class="logotype" href="/">
                            <svg class="icon icon_logotype" width="67" height="145" viewbox="0 0 67 145">
                                <use xlink:href="#logotype"/>
                            </svg>
                        </a>
                    <? else : ?>
                        <span class="logotype">
                <svg class="icon icon_logotype" width="67" height="145" viewbox="0 0 67 145">
                  <use xlink:href="#logotype"/>
                </svg>
              </span>
                    <? endif; ?>
                </div>
                <div class="header__new-right">
                    <div class="header__contacts">
                        <div class="header__new-menu">
                            <a href="/contacts/"><?= LANGUAGE_CODE == 'ru' ? 'Контакты' : 'Contacts' ?></a>
                        </div>
                        <div class="header__phones">
                            <a class="phone-contacts" href="tel:84956496639">8 (495) 649-66-39</a>
                            <a class="btn-small  " href="<?= LANGUAGE_CODE == 'ru' ? '#feedback' : '#feedback_en' ?>"
                               data-popup="<?= LANGUAGE_CODE == 'ru' ? '#feedback' : '#feedback_en' ?>"><?= LANGUAGE_CODE == 'ru' ? 'Заказать звонок' : 'Callback' ?>
                            </a>
                        </div>
                        <div class="header__info">
                            <div class="header__inner">
                                <div class="header__language mob-hide">
                                    <a href="#"
                                       data-lang="<?= LANGUAGE_CODE == 'ru' ? 'en' : 'ru' ?>"><?= LANGUAGE_CODE == 'ru' ? 'ENG' : 'RU' ?></a>
                                </div>
                                <div class="header__menu" data-jump-fix>
                                    <!-- <a href="#" data-menu-open-link><?= LANGUAGE_CODE == 'ru' ? 'Меню' : 'Menu' ?></a> -->
                                    <a href="#" class="burger" data-menu-open-new-link>
                                        <span style="margin-top: 2px"></span>
                                        <span></span>
                                        <span></span>
                                    </a>
                                </div>
                            </div>
                            <div class="header__socials">
                                <a class="header__social --vk" href="https://vk.com/club211223890" target="_blank"></a>

                                <a class="header__social --telega" href="https://t.me/skyviewru" target="_blank"></a>

                                <div class="header__language mob-show">
                                    <a href="#"
                                       data-lang="<?= LANGUAGE_CODE == 'ru' ? 'en' : 'ru' ?>"><?= LANGUAGE_CODE == 'ru' ? 'ENG' : 'RU' ?></a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header><!-- header-->
    <div class="menu" data-menu>
        <button class="menu__close" data-menu-close>
            <svg class="icon icon_close" width="21" height="21" viewbox="0 0 21 21">
                <use xlink:href="#close"/>
            </svg>
        </button>
        <div class="menu__header">
            <div class="container">
                <svg class="icon icon_logotype" width="67" height="145" viewbox="0 0 67 145">
                    <use xlink:href="#logotype"/>
                </svg>
            </div>
        </div>
        <div class="menu__body">
            <div class="container" itemscope itemtype="http://schema.org/SiteNavigationElement">
                <div class="navigation" data-menu-list>
                    <? $APPLICATION->IncludeComponent(
                        "bitrix:menu",
                        ".default",
                        array(
                            "ALLOW_MULTI_SELECT" => "N",
                            "CHILD_MENU_TYPE" => "sec",
                            "DELAY" => "N",
                            "MAX_LEVEL" => "1",
                            "MENU_CACHE_GET_VARS" => array(
                            ),
                            "MENU_CACHE_TIME" => "3600",
                            "MENU_CACHE_TYPE" => "A",
                            "MENU_CACHE_USE_GROUPS" => "Y",
                            "ROOT_MENU_TYPE" => "top",
                            "USE_EXT" => "N",
                            "COMPONENT_TEMPLATE" => ".default",
                            "MENU_THEME" => "site",
                            "LANG" => strtoupper(LANGUAGE_CODE),
                            "COMPOSITE_FRAME_MODE" => "A",
                            "COMPOSITE_FRAME_TYPE" => "AUTO"
                        ),
                        false
                    ); ?>
                </div>
                <div class="header__box-general-info">
                    <a class="btn-small  " href="#feedback" data-popup="#feedback">
                        Заказать звонок
                    </a>
                    <div class="header__mode-hours">
                        <a class="phone-contacts" href="tel:84956496639">8 (495) 649-66-39</a>
                        <a href="mailto:info@skyview.ru">info@skyview.ru</a>
                        <p>г. Москва, Дружинниковская ул., 15А</p>
                        <p>открыт: <span>С 10:00 ДО 19:00 ЕЖЕДНЕВНО</span></p>

                    </div>
                </div>
            </div>
        </div>
    </div><!-- menu-->
    <? if ($APPLICATION->GetCurDir() !== '/') : ?>
        <div class="bread">
            <div class="container">
                <? $APPLICATION->IncludeComponent(
                    "bitrix:breadcrumb",
                    "breadcrumbs",
                    array(
                        "PATH" => "",
                        "SITE_ID" => "s1",
                        "START_FROM" => "0"
                    )
                ); ?>
            </div>
        </div>
    <? endif; ?>
    <main class="main">