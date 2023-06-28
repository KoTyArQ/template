<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

$APPLICATION->AddHeadString('<link rel="stylesheet" href="'.$this->GetFolder().'/swiper.css">',false);

?>
<!-- Swiper -->
<div class="swiper-container">
<?if (isset($arResult['ITEMS']) && count($arResult['ITEMS'])){?>
	<div class="swiper-wrapper">
		<?foreach ($arResult['ITEMS'] as $arItems){?>
			<div class="swiper-slide">
				<?if (!empty($arItems['URL'])){?>
					<a href="<?=$arItems['URL']?>"><img src="<?=$arItems['PICTURE']?>"></a>
				<?} else {?>
					<img src="<?=$arItems['PICTURE']?>">
				<?}?>				
			</div>			
		<?}?>
	</div>
	<div class="swiper-pagination"></div>
<?}?>
</div>

<!-- Swiper JS -->
<script src="<?=$this->GetFolder()?>/swiper.min.js"></script>

<!-- Initialize Swiper -->
<script>
var swiper = new Swiper('.swiper-container', {
	pagination: {
		el: '.swiper-pagination',
	},
});
</script>