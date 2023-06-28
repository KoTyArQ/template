<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Профиль");
?><main class="maincontent">
<div class="page-wrapper">
	<div class="container">
		 <?$APPLICATION->IncludeComponent(
	"bitrix:sale.personal.section", 
	"bootstrap_v4", 
	array(
		"COMPONENT_TEMPLATE" => "bootstrap_v4",
		"SHOW_ACCOUNT_PAGE" => "N",
		"SHOW_ORDER_PAGE" => "Y",
		"SHOW_PRIVATE_PAGE" => "Y",
		"SHOW_PROFILE_PAGE" => "N",
		"SHOW_SUBSCRIBE_PAGE" => "N",
		"SHOW_CONTACT_PAGE" => "N",
		"SHOW_BASKET_PAGE" => "Y",
		"CUSTOM_PAGES" => "",
		"PATH_TO_PAYMENT" => "/profile/order/payment/",
		"PATH_TO_CONTACT" => "/about/contacts/",
		"PATH_TO_BASKET" => "/profile/cart/",
		"PATH_TO_CATALOG" => "/catalog/",
		"SEF_MODE" => "N",
		"SHOW_ACCOUNT_COMPONENT" => "Y",
		"SHOW_ACCOUNT_PAY_COMPONENT" => "Y",
		"ACCOUNT_PAYMENT_SELL_CURRENCY" => "RUB",
		"ACCOUNT_PAYMENT_ELIMINATED_PAY_SYSTEMS" => array(
			0 => "0",
		),
		"ACCOUNT_PAYMENT_SELL_SHOW_FIXED_VALUES" => "Y",
		"ACCOUNT_PAYMENT_SELL_TOTAL" => array(
			0 => "100",
			1 => "200",
			2 => "500",
			3 => "1000",
			4 => "5000",
			5 => "",
		),
		"ACCOUNT_PAYMENT_SELL_USER_INPUT" => "Y",
		"SAVE_IN_SESSION" => "Y",
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"CUSTOM_SELECT_PROPS" => array(
		),
		"ORDER_HIDE_USER_INFO" => array(
			0 => "0",
		),
		"ORDER_HISTORIC_STATUSES" => array(
			0 => "F",
		),
		"ORDER_RESTRICT_CHANGE_PAYSYSTEM" => array(
			0 => "0",
		),
		"ORDER_DEFAULT_SORT" => "STATUS",
		"ORDER_REFRESH_PRICES" => "N",
		"ORDER_DISALLOW_CANCEL" => "N",
		"ALLOW_INNER" => "N",
		"ONLY_INNER_FULL" => "N",
		"NAV_TEMPLATE" => "",
		"ORDERS_PER_PAGE" => "20",
		"SEND_INFO_PRIVATE" => "N",
		"CHECK_RIGHTS_PRIVATE" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600",
		"CACHE_GROUPS" => "Y",
		"MAIN_CHAIN_NAME" => "Мой кабинет",
		"SET_TITLE" => "Y",
		"USE_AJAX_LOCATIONS_PROFILE" => "N",
		"COMPATIBLE_LOCATION_MODE_PROFILE" => "N",
		"PROFILES_PER_PAGE" => "20"
	),
	false
);?><br>
	</div>
</div>
 </main><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>