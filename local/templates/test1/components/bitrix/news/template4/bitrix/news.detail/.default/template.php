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

<main class="maincontent">
	<div class="page-wrapper">
		<div class="container maincontent__width">
			<div class="maincontent__content">


				<div itemscope="" itemtype="http://schema.org/Article">
					<h1 itemprop="headline" class="page-title"><?=$arResult["NAME"] ?></h1>

					<div style="display: none;">Автор: <span itemprop="author">3 Кита</span></div>
					<div style="display: none;" itemprop="publisher" itemscope="" itemtype="https://schema.org/Organization">
						<div itemprop="logo" itemscope="" itemtype="https://schema.org/ImageObject">
							<img itemprop="url image" src="https://www.3kita.ru/upload/iblock/473/47311e716e965b9b6af275dbb09cd3d8.jpg" style="display:none;">
							<meta itemprop="width" content="64">
							<meta itemprop="height" content="64">
						</div>
						<meta itemprop="name" content="3 Кита">
						<meta itemprop="telephone" content="8 (495) 723-82-82">
						<meta itemprop="address" content="РФ, Московская обл. , Одинцовский ГО, р.п. Новоивановское, ул. Луговая, д.1">
					</div>

					<div class="page-detail">
						<div class="page-detail__content">
							<div class="page-detail__img"><img src="<?php 
							if ($arItem["PREVIEW_PICTURE"])
				{
					?>
					<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>
					<?
				}
				else
				{
					?>https://placehold.co/725x515
					<?
				} ?>" alt="<?=$arResult["DETAIL_PICTURE"]["ALT"] ?>">
							</div>

							<div style="display: none;" itemscope="" itemprop="image" itemtype="http://schema.org/ImageObject">
								<img itemprop="url contentUrl" src="<?=$arResult["DETAIL_PICTURE"]["SRC"] ?>" alt="<?=$arResult["DETAIL_PICTURE"]["ALT"] ?>">
								<meta itemprop="url" content="<?=$arResult["DETAIL_PICTURE"]["SRC"] ?>">
								<meta itemprop="width" content="968">
								<meta itemprop="height" content="504">
							</div>

							<div itemprop="articleBody" class="page-detail__container elem-text">
							<?=$arResult["DETAIL_TEXT"] ?><br>
								<br>
							</div>
						</div>
					</div>