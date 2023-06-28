<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
	<div class="maincontent-news__top">
	<h2 class="maincontent-news__title">Новости и акции</h2>
	<a class="maincontent-news__link" href="<?=$arParams["IBLOCK_TYPE"] ?>">Смотреть все</a>
</div>
<div class="maincontent-news__slider swiper js-slider">
	<ul class="maincontent-news__list swiper-wrapper" id="swiper-wrapper-d8ac3a3f86155c54" aria-live="polite" style="transform: translate3d(0px, 0px, 0px); transition-duration: 0ms;">
		<? foreach ($arResult["ITEMS"] as $arItem) : ?>

			<?;

			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			?>

			<li class="maincontent-news__item swiper-slide" role="group" aria-label="1 / 20" style="width: 247.5px; margin-right: 40px;">
				<a class="maincontent-news__item-link" href="<?= $arItem["DETAIL_PAGE_URL"] ?>">
					<div class="maincontent-news__item-img">
						<img src="<?php if ($arItem["PREVIEW_PICTURE"])
				{
					?>
					<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>
					<?
				}
				else
				{
					?>https://placehold.co/725x515
					<?
				} ?>" alt="<?= $arItem["PREVIEW_PICTURE"]["ALT"] ?>">
					</div>
					<div class="maincontent-news__item-date">
						<?= $arItem["ACTIVE_FROM"] ?> </div>
					<div class="maincontent-news__item-title">
						<?= $arItem["NAME"] ?> </div>
				</a>
			</li>

			<span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>

		<? endforeach; ?>
	</ul>
</div>
<? if ($arParams["DISPLAY_BOTTOM_PAGER"]) : ?>
	<br /><?= $arResult["NAV_STRING"] ?>
<? endif; ?>