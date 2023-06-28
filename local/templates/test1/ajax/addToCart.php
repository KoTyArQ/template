<? require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include.php"); ?>
<?
if (CModule::IncludeModule("sale") && CModule::IncludeModule("catalog")) {
    if (isset($_POST['PRODUCT_ID']) && isset($_POST['QUANTITY'])) {
        $PRODUCT_ID = intval($_POST['PRODUCT_ID']);
        $QUANTITY = intval($_POST['QUANTITY']);
        Add2BasketByProductID(
            $PRODUCT_ID,
            $QUANTITY,
            false
        );
    } else {
        echo "Нет параметров ";
    }
} else {
    echo "Не подключены модули";
}
?>