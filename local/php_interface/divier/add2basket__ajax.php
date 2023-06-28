<? require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include.php"); ?>
<?
if (CModule::IncludeModule("sale") && CModule::IncludeModule("catalog")) {

    $PRODUCT_ID = intval($_POST['PRODUCT_ID']);
     Add2BasketByProductID( $PRODUCT_ID, $QUANTITY = 1, $arRewriteFields = array(), $arProductParams = false);
     $ex = $APPLICATION->GetException();
echo $ex->GetString();
} else {
    echo "Не подключены модули";
    $ex = $APPLICATION->GetException();
echo $ex->GetString();
}
?>