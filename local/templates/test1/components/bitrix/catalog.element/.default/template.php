<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();

use Bitrix\Main\Localization\Loc;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CatalogSectionComponent $component
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $componentPath
 * @var string $templateFolder
 */
$this->setFrameMode(true);
?>
<main class="maincontent">
	<div class="page-wrapper">
		<div class="container">
			<div class="page-item-card maincontent__content js-page-item-card">
				<div class="page-item-card__img item-card-img">
					<div class="page-item-card__img-sticky">
						<div class="item-card-img__sale">

						</div>

						<div class="item-card-img__picture js-popup-image js-img-container" itemscope=""
							itemtype="https://schema.org/ImageObject" style="position: relative; overflow: hidden;">
							<img loading="lazy" src="<?= $arResult['DETAIL_PICTURE']['SRC'] ?>"
								alt="Журнальный столик Moroso Tea Maria" itemprop="contentUrl">
							<img role="presentation" alt="" src="<?= $arResult['PREVIEW_PICTURE']['SRC'] ?>"
								class="zoomImg"
								style="position: absolute; top: -265.422px; left: -6.76265px; opacity: 0; width: 600px; height: 800px; border: none; max-width: none; max-height: none;">
						</div>
						<div class="item-card-img__slider-wrap">
							<span
								class="item-card-img__slider-btn js-slider-prev swiper-button-disabled swiper-button-lock"
								tabindex="-1" role="button" aria-label="Previous slide"
								aria-controls="swiper-wrapper-33d744d58a8ac5de" aria-disabled="true">
								<svg width="32" height="33" viewBox="0 0 32 33" fill="none"
									xmlns="http://www.w3.org/2000/svg">
									<path
										d="M4 17.7466C4.00201 17.4876 4.10456 17.2395 4.286 17.0546L4.292 17.0426L10.292 11.0426C10.4806 10.8604 10.7332 10.7596 10.9954 10.7619C11.2576 10.7642 11.5084 10.8694 11.6938 11.0548C11.8792 11.2402 11.9844 11.491 11.9867 11.7532C11.989 12.0154 11.8882 12.268 11.706 12.4566L7.414 16.7506L27 16.7506C27.2652 16.7506 27.5196 16.856 27.7071 17.0435C27.8946 17.231 28 17.4854 28 17.7506C28 18.0158 27.8946 18.2702 27.7071 18.4577C27.5196 18.6452 27.2652 18.7506 27 18.7506L7.414 18.7506L11.706 23.0426C11.8882 23.2312 11.989 23.4838 11.9867 23.746C11.9844 24.0082 11.8792 24.259 11.6938 24.4444C11.5084 24.6298 11.2576 24.735 10.9954 24.7373C10.7332 24.7395 10.4806 24.6388 10.292 24.4566L4.292 18.4566L4.286 18.4466C4.19698 18.3564 4.12633 18.2497 4.078 18.1326C4.02652 18.0118 3.99999 17.8819 4 17.7506V17.7466Z"
										fill="black"></path>
								</svg>
							</span>

							<div
								class="item-card-img__slider swiper js-slider swiper-initialized swiper-horizontal swiper-pointer-events swiper-backface-hidden">
								<ul class="item-card-img__slideshow swiper-wrapper" id="swiper-wrapper-33d744d58a8ac5de"
									aria-live="polite" style="transform: translate3d(0px, 0px, 0px);">
									<li class="item-card-img__item swiper-slide active swiper-slide-active"
										style="margin-right: 20px;" role="group" aria-label="1 / 2">
										<img loading="lazy" class="js-images"
											src="<?= $arResult['PREVIEW_PICTURE']['SRC'] ?>"
											alt="Журнальный столик Moroso Tea Maria" itemprop="contentUrl">
									</li>
									<li class="item-card-img__item swiper-slide swiper-slide-next"
										style="margin-right: 20px;" role="group" aria-label="2 / 2">
										<img loading="lazy" class="js-images"
											src="<?= $arResult['PREVIEW_PICTURE']['SRC'] ?>"
											alt="Журнальный столик Moroso Tea Maria" itemprop="contentUrl">
									</li>
								</ul>
								<span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
							</div>

							<span
								class="item-card-img__slider-btn js-slider-next swiper-button-disabled swiper-button-lock"
								tabindex="-1" role="button" aria-label="Next slide"
								aria-controls="swiper-wrapper-33d744d58a8ac5de" aria-disabled="true">
								<svg width="32" height="33" viewBox="0 0 32 33" fill="none"
									xmlns="http://www.w3.org/2000/svg">
									<path
										d="M28 17.7651C27.998 18.0241 27.8954 18.2723 27.714 18.4571L27.708 18.4691L21.708 24.4691C21.5194 24.6513 21.2668 24.7521 21.0046 24.7498C20.7424 24.7475 20.4916 24.6424 20.3062 24.4569C20.1208 24.2715 20.0156 24.0207 20.0133 23.7585C20.011 23.4963 20.1118 23.2437 20.294 23.0551L24.586 18.7611H5C4.73478 18.7611 4.48043 18.6558 4.29289 18.4682C4.10536 18.2807 4 18.0263 4 17.7611C4 17.4959 4.10536 17.2416 4.29289 17.054C4.48043 16.8665 4.73478 16.7611 5 16.7611H24.586L20.294 12.4691C20.1118 12.2805 20.011 12.0279 20.0133 11.7657C20.0156 11.5035 20.1208 11.2527 20.3062 11.0673C20.4916 10.8819 20.7424 10.7767 21.0046 10.7745C21.2668 10.7722 21.5194 10.873 21.708 11.0551L27.708 17.0551L27.714 17.0651C27.803 17.1553 27.8737 17.262 27.922 17.3791C27.9735 17.4999 28 17.6298 28 17.7611V17.7651Z"
										fill="black"></path>
								</svg>
							</span>
						</div>
					</div>
				</div>
				<div class="page-item-card__info">
					<div class="page-item-card__info-top">
						<span class="page-item-card__articul">Код товара <span data-js-item-code="">
								<?= $arResult['PROPERTIES']['ARTNUMBER']['VALUE'] ?>
							</span></span>
						<div class="page-item-card__rating">
							<div class="page-item-card__stars">
								<svg class="page-item-card__star" width="14" height="15" viewBox="0 0 14 15" fill="none"
									xmlns="http://www.w3.org/2000/svg">
									<path
										d="M6.3079 1.82447C6.56454 1.2097 7.4355 1.2097 7.69214 1.82447L8.87395 4.65552C8.97651 4.90122 9.20164 5.07412 9.46547 5.10983L12.6209 5.5369C13.2711 5.6249 13.5028 6.44639 12.9945 6.86121L10.5746 8.83597C10.3531 9.01671 10.2536 9.30763 10.318 9.58614L11.0907 12.925C11.2458 13.5952 10.4922 14.1032 9.92915 13.708L7.43088 11.9546C7.17231 11.7731 6.82773 11.7731 6.56916 11.9546L4.07085 13.708C3.50781 14.1032 2.75422 13.5952 2.90929 12.9251L3.6819 9.58613C3.74634 9.30763 3.64687 9.01671 3.42539 8.83597L1.00549 6.8612C0.497164 6.44638 0.728909 5.6249 1.37908 5.53691L4.53457 5.10983C4.7984 5.07412 5.02353 4.90122 5.12609 4.65552L6.3079 1.82447Z"
										stroke="#8AB2CE" stroke-width="1.4" stroke-miterlimit="3.3292"
										stroke-linecap="round" stroke-linejoin="round"></path>
								</svg>
								<svg class="page-item-card__star" width="14" height="15" viewBox="0 0 14 15" fill="none"
									xmlns="http://www.w3.org/2000/svg">
									<path
										d="M6.3079 1.82447C6.56454 1.2097 7.4355 1.2097 7.69214 1.82447L8.87395 4.65552C8.97651 4.90122 9.20164 5.07412 9.46547 5.10983L12.6209 5.5369C13.2711 5.6249 13.5028 6.44639 12.9945 6.86121L10.5746 8.83597C10.3531 9.01671 10.2536 9.30763 10.318 9.58614L11.0907 12.925C11.2458 13.5952 10.4922 14.1032 9.92915 13.708L7.43088 11.9546C7.17231 11.7731 6.82773 11.7731 6.56916 11.9546L4.07085 13.708C3.50781 14.1032 2.75422 13.5952 2.90929 12.9251L3.6819 9.58613C3.74634 9.30763 3.64687 9.01671 3.42539 8.83597L1.00549 6.8612C0.497164 6.44638 0.728909 5.6249 1.37908 5.53691L4.53457 5.10983C4.7984 5.07412 5.02353 4.90122 5.12609 4.65552L6.3079 1.82447Z"
										stroke="#8AB2CE" stroke-width="1.4" stroke-miterlimit="3.3292"
										stroke-linecap="round" stroke-linejoin="round"></path>
								</svg>
								<svg class="page-item-card__star" width="14" height="15" viewBox="0 0 14 15" fill="none"
									xmlns="http://www.w3.org/2000/svg">
									<path
										d="M6.3079 1.82447C6.56454 1.2097 7.4355 1.2097 7.69214 1.82447L8.87395 4.65552C8.97651 4.90122 9.20164 5.07412 9.46547 5.10983L12.6209 5.5369C13.2711 5.6249 13.5028 6.44639 12.9945 6.86121L10.5746 8.83597C10.3531 9.01671 10.2536 9.30763 10.318 9.58614L11.0907 12.925C11.2458 13.5952 10.4922 14.1032 9.92915 13.708L7.43088 11.9546C7.17231 11.7731 6.82773 11.7731 6.56916 11.9546L4.07085 13.708C3.50781 14.1032 2.75422 13.5952 2.90929 12.9251L3.6819 9.58613C3.74634 9.30763 3.64687 9.01671 3.42539 8.83597L1.00549 6.8612C0.497164 6.44638 0.728909 5.6249 1.37908 5.53691L4.53457 5.10983C4.7984 5.07412 5.02353 4.90122 5.12609 4.65552L6.3079 1.82447Z"
										stroke="#8AB2CE" stroke-width="1.4" stroke-miterlimit="3.3292"
										stroke-linecap="round" stroke-linejoin="round"></path>
								</svg>
								<svg class="page-item-card__star" width="14" height="15" viewBox="0 0 14 15" fill="none"
									xmlns="http://www.w3.org/2000/svg">
									<path
										d="M6.3079 1.82447C6.56454 1.2097 7.4355 1.2097 7.69214 1.82447L8.87395 4.65552C8.97651 4.90122 9.20164 5.07412 9.46547 5.10983L12.6209 5.5369C13.2711 5.6249 13.5028 6.44639 12.9945 6.86121L10.5746 8.83597C10.3531 9.01671 10.2536 9.30763 10.318 9.58614L11.0907 12.925C11.2458 13.5952 10.4922 14.1032 9.92915 13.708L7.43088 11.9546C7.17231 11.7731 6.82773 11.7731 6.56916 11.9546L4.07085 13.708C3.50781 14.1032 2.75422 13.5952 2.90929 12.9251L3.6819 9.58613C3.74634 9.30763 3.64687 9.01671 3.42539 8.83597L1.00549 6.8612C0.497164 6.44638 0.728909 5.6249 1.37908 5.53691L4.53457 5.10983C4.7984 5.07412 5.02353 4.90122 5.12609 4.65552L6.3079 1.82447Z"
										stroke="#8AB2CE" stroke-width="1.4" stroke-miterlimit="3.3292"
										stroke-linecap="round" stroke-linejoin="round"></path>
								</svg>
								<svg class="page-item-card__star" width="14" height="15" viewBox="0 0 14 15" fill="none"
									xmlns="http://www.w3.org/2000/svg">
									<path
										d="M6.3079 1.82447C6.56454 1.2097 7.4355 1.2097 7.69214 1.82447L8.87395 4.65552C8.97651 4.90122 9.20164 5.07412 9.46547 5.10983L12.6209 5.5369C13.2711 5.6249 13.5028 6.44639 12.9945 6.86121L10.5746 8.83597C10.3531 9.01671 10.2536 9.30763 10.318 9.58614L11.0907 12.925C11.2458 13.5952 10.4922 14.1032 9.92915 13.708L7.43088 11.9546C7.17231 11.7731 6.82773 11.7731 6.56916 11.9546L4.07085 13.708C3.50781 14.1032 2.75422 13.5952 2.90929 12.9251L3.6819 9.58613C3.74634 9.30763 3.64687 9.01671 3.42539 8.83597L1.00549 6.8612C0.497164 6.44638 0.728909 5.6249 1.37908 5.53691L4.53457 5.10983C4.7984 5.07412 5.02353 4.90122 5.12609 4.65552L6.3079 1.82447Z"
										stroke="#8AB2CE" stroke-width="1.4" stroke-miterlimit="3.3292"
										stroke-linecap="round" stroke-linejoin="round"></path>
								</svg>
							</div>
							<span>0</span>
						</div>
					</div>
					<h1 class="page-item-card__title">
						<?= $arResult['NAME'] ?>
					</h1>
					<div>
						<button onclick="add2basket(<?= $arResult['ID']; ?>)"
							class="page-item-card__application js-popup-application-open">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
								class="bi bi-cart4" viewBox="0 0 16 16">
								<path
									d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
							</svg>
							<span>
								<?= $arResult['PROPERTIES']['PRICE']['VALUE'] ?>
								<?= $arResult['PROPERTIES']['PRICECURRENCY']['VALUE'] ?>

							</span>
						</button>
<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2></h2>
    </div>
    <div class="modal-body">
      <p>Товар был успешно добавлен в корзину</p>

    </div>
  </div>

</div>

<script>

</script>

						<button class="btn-like" data-action="add2favorite" data-productid="41020">
							<img class="favorite"
								src="/local/templates/main/components/bitrix/catalog.section/.default/svg/favorite.svg"
								alt="">
						</button>
					</div>

					<div class="item-card-tabs js-tabs">
						<div class="item-card-tabs__header page-item-card__tabs swiper-container">
							<button class="item-card-tabs__btn js-tab-btn active">Информация</button>
						</div>

						<div class="item-card-tabs__content page-item-card__content js-tab-content active">
							<div class="item-card-info page-item-card__character">
								<div class="item-card-info__list">

									<div class="item-card-info__item">
										<dt>
											<?= $arResult['PROPERTIES']['SIZE']['NAME'] ?>
										</dt>
										<span></span>
										<dd>
											<?= $arResult['PROPERTIES']['SIZE']['VALUE'] ?>
										</dd>
									</div>
									<div class="item-card-info__item">
										<dt>
											<?= $arResult['PROPERTIES']['MANUFACTURER']['NAME'] ?>
										</dt>
										<span></span>
										<dd>
											<?= $arResult['PROPERTIES']['MANUFACTURER']['VALUE'] ?>
										</dd>
									</div>
									<div class="item-card-info__item">
										<dt>
											<?= $arResult['PROPERTIES']['MATERIAL']['NAME'] ?>
										</dt>
										<span></span>
										<dd>
											<?= $arResult['PROPERTIES']['MATERIAL']['VALUE'] ?>
										</dd>
									</div>
									<div class="item-card-info__item">
										<dt>Описание</dt>
										<span></span>
										<div class="item-card-info page-item-card__character">
											<?= $arResult['DETAIL_TEXT'] ?>
										</div>
									</div>
							</div>
							</div>
						</div>
					</div>

					<div class="item-card-tabs__content page-item-card__content js-tab-content">
						<div class="item-card-info page-item-card__character">
							СТОЛ ЖУРНАЛЬНЫЙ TIA MARIA H.32 Ø 120; код S126255;СТОЛ ЖУРНАЛЬНЫЙ TIA
							MARIA&nbsp;&nbsp;H.40 Ø 90;
							код S126256;СТОЛ ЖУРНАЛЬНЫЙ TIA MARIA H.50 Ø.60; код S126257 </div>
					</div>
				</div>
			</div>
</main>
