<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
  die();
use Bitrix\Main\UI\Extension;

Extension::load('ui.bootstrap4');
?>
<!-- Служебный код, необходим для защиты подключения этого файла без подключения ядра -->

<!DOCTYPE html>
<html lang="ru">

<head>
  <title>
    <? $APPLICATION->ShowTitle(); ?>
  </title>
  <!-- Отображение заголовка страницы -->
  <? $APPLICATION->ShowHead(); ?>
  <!--  Вывод в шаблоне сайта основных полей тега head (мета-теги Content-Type, robots, keywords, description; стили CSS; скрипты) -->
  <link href="<?= SITE_TEMPLATE_PATH ?>/css/styles.css" rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">

  <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">
    <link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"
/>

<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>


</head>

<body id="page-top">
  <div id="panel">
    <? $APPLICATION->ShowPanel(); ?>
    <!-- Отображение административной панели внизу страницы -->
  </div>
  <header>
    <div class="header__inner">
      <? $APPLICATION->IncludeComponent(
        "bitrix:main.include",
        ".default",
        array(
          "AREA_FILE_SHOW" => "file",
          "PATH" => SITE_TEMPLATE_PATH . "/include/address.php",
          "EDIT_TEMPLATE" => "",
          "COMPONENT_TEMPLATE" => ".default",
          "AREA_FILE_SUFFIX" => "inc",
          "AREA_FILE_RECURSIVE" => "Y"
        ),
        false
      ); ?>

      <div class="header__menu container">
        <div class="elem-logo">
          <a class="elem-logo__link" href="/">
            <? $APPLICATION->IncludeComponent(
              "bitrix:main.include",
              ".default",
              array(
                "AREA_FILE_SHOW" => "file",
                "PATH" => SITE_TEMPLATE_PATH . "/include/company_name.php",
                "EDIT_TEMPLATE" => "",
                "COMPONENT_TEMPLATE" => ".default",
                "AREA_FILE_SUFFIX" => "inc",
                "AREA_FILE_RECURSIVE" => "Y"
              ),
              false
            ); ?>
          </a>
          <!-- <span class="elem-logo__slogan">Крупнейший мебельный&nbsp;центр&nbsp;Европы</span> -->
        </div>

        <? $APPLICATION->IncludeComponent(
          "bitrix:menu",
          "template1",
          array(
            "ROOT_MENU_TYPE" => "top",
            "MAX_LEVEL" => "3",
            "CHILD_MENU_TYPE" => "top",
            "USE_EXT" => "Y",
            "COMPONENT_TEMPLATE" => "template1",
            "MENU_CACHE_TYPE" => "N",
            "MENU_CACHE_TIME" => "3600",
            "MENU_CACHE_USE_GROUPS" => "Y",
            "MENU_CACHE_GET_VARS" => array(
            ),
            "DELAY" => "N",
            "ALLOW_MULTI_SELECT" => "N"
          ),
          false
        ); ?>

        <div class="header__icons">
          <button class="btn btn-search js-popup-search-open">
            <svg class="icon icon--search" aria-hidden="true">
              <use xlink:href="/local/templates/main/assets/images/sprite.svg#search"></use>
            </svg>
          </button>
          <!--start-->
          <div id="bid">
            <? $APPLICATION->IncludeComponent(
	"bitrix:sale.basket.basket.line", 
	".default", 
	array(
		"HIDE_ON_BASKET_PAGES" => "Y",
		"PATH_TO_BASKET" => SITE_DIR."profile/cart/",
		"PATH_TO_ORDER" => SITE_DIR."profile/order/make/",
		"PATH_TO_PERSONAL" => SITE_DIR."profile/",
		"PATH_TO_PROFILE" => SITE_DIR."profile/",
		"PATH_TO_REGISTER" => SITE_DIR."login/",
		"POSITION_FIXED" => "N",
		"POSITION_HORIZONTAL" => "right",
		"POSITION_VERTICAL" => "top",
		"SHOW_AUTHOR" => "Y",
		"SHOW_DELAY" => "N",
		"SHOW_EMPTY_VALUES" => "Y",
		"SHOW_IMAGE" => "Y",
		"SHOW_NOTAVAIL" => "N",
		"SHOW_NUM_PRODUCTS" => "Y",
		"SHOW_PERSONAL_LINK" => "Y",
		"SHOW_PRICE" => "Y",
		"SHOW_PRODUCTS" => "N",
		"SHOW_SUMMARY" => "Y",
		"SHOW_TOTAL_PRICE" => "Y",
		"COMPONENT_TEMPLATE" => ".default",
		"PATH_TO_AUTHORIZE" => "",
		"SHOW_REGISTRATION" => "Y",
		"MAX_IMAGE_SIZE" => "70"
	),
	false,
	array(
		"ACTIVE_COMPONENT" => "Y"
	)
); ?>
          </div>

          <!--end-->
              
        </div>
      </div>
    </div>
  </header>

