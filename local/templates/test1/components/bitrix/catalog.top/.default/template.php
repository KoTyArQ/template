<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CatalogTopComponent $component
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $componentPath
 * @var string $templateFolder
 */

$this->setFrameMode(true);
?>
<div class="maincontent-popular__wrapper js-slider-popular">
    <div class="maincontent-popular__top">
        <h2 class="maincontent-popular__title">Популярные товары</h2>
    </div>
	<div class="swiper js-slider swiper-initialized swiper-horizontal swiper-pointer-events swiper-backface-hidden" data-pagination="fraction" data-dskslides="" data-slides="">
		<div class="maincontent-popular__list swiper-wrapper" id="swiper-wrapper-10462b15245df4f70" aria-live="polite" style="transform: translate3d(0px, 0px, 0px);">
<? foreach ($arResult["ITEMS"] as $arItem) : ?>
	

			<div class="maincontent-popular__item card-product swiper-slide swiper-slide-active" role="group" aria-label="1 / 4" style="width: 356px; margin-right: 40px;">
				<a class="card-product__picture" href="<?= $arItem["DETAIL_PAGE_URL"] ?>">
					<img loading="lazy" class="card-product__img of-contain" src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>" alt="<?= $arItem["PREVIEW_PICTURE"]["ALT"] ?>" style="object-fit:contain;-o-object-fit:contain">
				</a>
				<h3 class="card-product__title">
					<a class="card-product__title-link" href="<?= $arItem["DETAIL_PAGE_URL"] ?>"><?= $arItem["NAME"] ?></a>
				</h3>
				<span class="card-product__article">Артикул <?= $arItem["DISPLAY_PROPERTIES"]["ARTNUMBER"]["VALUE"] ?></span>
			</div>

<? endforeach; ?>
</div>
	</div>
	</div>