<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
	die();
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
<? if ($arResult["ITEMS"]): ?>
	<main class="maincontent">
		<div class="page-wrapper">
			<div class="container">
				<h1 class="page-title page-title--small-bottom">Столы обеденные</h1>
				<div class="sorting js-sorting">
					<div class="sorting__item">
						<span class="sorting__name"> Сортировать по:</span>
						<div class="sorting__list js-sorting-list">
							<div class="sorting__list-title">
								<span class="is-active">Новинки</span>
								<span class="">популярности</span>
								<span class="">Сначала дорогие</span>
								<span class="">Сначала дешевые</span>
								<svg viewBox="0 0 8 5" xmlns="http://www.w3.org/2000/svg">
									<path d="M7 0.499023L4 3.50008L1 0.499023"></path>
								</svg>
							</div>
							<div class="sorting__list-wrapper js-sorting-wrapper">
								<a href="/catalog/stoly_i_stulya/stoly_zhurnalnye/?sort=date"
									class="sorting__list-item is-active">
									<span>Новинки</span>
									<svg viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" clip-rule="evenodd"
											d="M1.64652 5.8027C1.84178 5.60743 2.15837 5.60743 2.35363 5.8027L4.8285 8.27757L10.1318 2.97427C10.3271 2.77901 10.6436 2.77901 10.8389 2.97427C11.0342 3.16953 11.0342 3.48611 10.8389 3.68138L4.8285 9.69178L1.64652 6.5098C1.45126 6.31454 1.45126 5.99796 1.64652 5.8027Z">
										</path>
									</svg>
								</a>
								<a href="/catalog/stoly_i_stulya/stoly_zhurnalnye/?sort=pop" class="sorting__list-item">
									<span>популярности</span>
									<svg viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" clip-rule="evenodd"
											d="M1.64652 5.8027C1.84178 5.60743 2.15837 5.60743 2.35363 5.8027L4.8285 8.27757L10.1318 2.97427C10.3271 2.77901 10.6436 2.77901 10.8389 2.97427C11.0342 3.16953 11.0342 3.48611 10.8389 3.68138L4.8285 9.69178L1.64652 6.5098C1.45126 6.31454 1.45126 5.99796 1.64652 5.8027Z">
										</path>
									</svg>
								</a>
								<a href="/catalog/stoly_i_stulya/stoly_zhurnalnye/?sort=price-desc"
									class="sorting__list-item">
									<span>Сначала дорогие</span>
									<svg viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" clip-rule="evenodd"
											d="M1.64652 5.8027C1.84178 5.60743 2.15837 5.60743 2.35363 5.8027L4.8285 8.27757L10.1318 2.97427C10.3271 2.77901 10.6436 2.77901 10.8389 2.97427C11.0342 3.16953 11.0342 3.48611 10.8389 3.68138L4.8285 9.69178L1.64652 6.5098C1.45126 6.31454 1.45126 5.99796 1.64652 5.8027Z">
										</path>
									</svg>
								</a>
								<a href="/catalog/stoly_i_stulya/stoly_zhurnalnye/?sort=price-asc"
									class="sorting__list-item">
									<span>Сначала дешевые</span>
									<svg viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" clip-rule="evenodd"
											d="M1.64652 5.8027C1.84178 5.60743 2.15837 5.60743 2.35363 5.8027L4.8285 8.27757L10.1318 2.97427C10.3271 2.77901 10.6436 2.77901 10.8389 2.97427C11.0342 3.16953 11.0342 3.48611 10.8389 3.68138L4.8285 9.69178L1.64652 6.5098C1.45126 6.31454 1.45126 5.99796 1.64652 5.8027Z">
										</path>
									</svg>
								</a>
							</div>
						</div>
					</div>

					<div class="sorting__count">
						<span class="sorting__name">Товаров на странице:</span>
						<a href="/catalog/stoly_i_stulya/stoly_zhurnalnye/?limit=15" class="sorting__count-item is-active">
							<span>15</span>
						</a>
						<a href="/catalog/stoly_i_stulya/stoly_zhurnalnye/?limit=30" class="sorting__count-item">
							<span>30</span>
						</a>
						<a href="/catalog/stoly_i_stulya/stoly_zhurnalnye/?limit=60" class="sorting__count-item">
							<span>60</span>
						</a>
						<a href="/catalog/stoly_i_stulya/stoly_zhurnalnye/?limit=all" class="sorting__count-item">
							<span>все</span>
						</a>
					</div>

					<div class="sorting__filters-btn js-sorting-filter-btn">
						<svg viewBox="0 0 20 24" xmlns="http://www.w3.org/2000/svg">
							<path d="M2.5 16.5273H10.8333" stroke="white" stroke-width="2" stroke-linecap="round"></path>
							<path d="M8.33594 6.80566H16.6693" stroke="white" stroke-width="2" stroke-linecap="round">
							</path>
							<path
								d="M16.5026 16.5276C16.5026 18.2732 15.3189 19.4164 14.1693 19.4164C13.0197 19.4164 11.8359 18.2732 11.8359 16.5276C11.8359 14.7819 13.0197 13.6387 14.1693 13.6387C15.3189 13.6387 16.5026 14.7819 16.5026 16.5276Z"
								stroke="white" stroke-width="2"></path>
							<path
								d="M7.33073 6.80588C7.33073 8.55154 6.14699 9.69477 4.9974 9.69477C3.8478 9.69477 2.66406 8.55154 2.66406 6.80588C2.66406 5.06022 3.8478 3.91699 4.9974 3.91699C6.14699 3.91699 7.33073 5.06022 7.33073 6.80588Z"
								stroke="white" stroke-width="2"></path>
						</svg>
						<span>Фильтр</span>
					</div>
				</div>
				<div class="catalog">
					<div class="catalog__filter js-sorting-filter-popup"></div>
					<div class="catalog__content">
						<ul class="catalog__products js-container">
							<? foreach ($arResult["ITEMS"] as $arElement): ?>
								<?
								$this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
								$this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCS_ELEMENT_DELETE_CONFIRM')));
								?>

								<li id="<?= $this->GetEditAreaId($arElement['ID']); ?>" class=" catalog__item">
									<div class="catalog__item-top">
										<div class="catalog__only-wrapper">
											<span class="catalog__only-title">Только в ТК</span>
											<svg class="catalog__only-icon" viewBox="0 0 15 16"
												xmlns="http://www.w3.org/2000/svg">
												<path
													d="M6.92479 9.045C6.92479 8.67375 7.00729 8.36781 7.17229 8.12719C7.34417 7.87969 7.59167 7.61156 7.91479 7.32281C8.16229 7.10281 8.34448 6.91375 8.46135 6.75562C8.5851 6.59062 8.64698 6.405 8.64698 6.19875C8.64698 5.91 8.5301 5.67625 8.29635 5.4975C8.0626 5.31875 7.74979 5.22937 7.35792 5.22937C6.61542 5.22937 6.0551 5.49406 5.67698 6.02344L4.67667 5.37375C4.97229 4.96812 5.35385 4.65875 5.82135 4.44562C6.28885 4.22562 6.83885 4.11562 7.47135 4.11562C8.24135 4.11562 8.85323 4.28406 9.30698 4.62094C9.7676 4.95094 9.99792 5.40813 9.99792 5.9925C9.99792 6.27438 9.94979 6.52188 9.85354 6.735C9.76417 6.94813 9.65417 7.13031 9.52354 7.28156C9.39292 7.42594 9.22104 7.59438 9.00792 7.78688C8.74667 8.02063 8.55073 8.22688 8.4201 8.40563C8.29635 8.58438 8.23448 8.7975 8.23448 9.045H6.92479ZM7.58479 11.5097C7.34417 11.5097 7.14479 11.4341 6.98667 11.2828C6.83542 11.1247 6.75979 10.9322 6.75979 10.7053C6.75979 10.4784 6.83542 10.2894 6.98667 10.1381C7.14479 9.98688 7.34417 9.91125 7.58479 9.91125C7.81854 9.91125 8.01104 9.98688 8.16229 10.1381C8.32042 10.2894 8.39948 10.4784 8.39948 10.7053C8.39948 10.9322 8.32042 11.1247 8.16229 11.2828C8.01104 11.4341 7.81854 11.5097 7.58479 11.5097Z">
												</path>
												<path fill-rule="evenodd" clip-rule="evenodd"
													d="M7.5 2.27083C4.33587 2.27083 1.77083 4.83587 1.77083 8C1.77083 11.1641 4.33587 13.7292 7.5 13.7292C10.6641 13.7292 13.2292 11.1641 13.2292 8C13.2292 4.83587 10.6641 2.27083 7.5 2.27083ZM0.625 8C0.625 4.20304 3.70304 1.125 7.5 1.125C11.297 1.125 14.375 4.20304 14.375 8C14.375 11.797 11.297 14.875 7.5 14.875C3.70304 14.875 0.625 11.797 0.625 8Z">
												</path>
											</svg>
											<span class="catalog__only-text">Этот товар вы можете приобрести только
												в&nbsp;торговом комплексе «Три&nbsp;Кита»</span>
										</div>

										<div class="catalog__rate">
											<span class="catalog__rate-icons">
												<svg class="catalog__rate-icon" viewBox="0 0 16 17"
													xmlns="http://www.w3.org/2000/svg">
													<path
														d="M7.30821 2.82496C7.56484 2.21019 8.43581 2.21019 8.69244 2.82496L9.87426 5.65601C9.97682 5.9017 10.2019 6.07461 10.4658 6.11031L13.6212 6.53739C14.2714 6.62539 14.5032 7.44688 13.9948 7.86169L11.5749 9.83646C11.3534 10.0172 11.2539 10.3081 11.3184 10.5866L12.091 13.9255C12.2461 14.5957 11.4925 15.1037 10.9295 14.7085L8.43119 12.9551C8.17261 12.7736 7.82804 12.7736 7.56946 12.9551L5.07115 14.7085C4.50812 15.1037 3.75452 14.5957 3.9096 13.9256L4.68221 10.5866C4.74665 10.3081 4.64717 10.0172 4.4257 9.83646L2.00579 7.86169C1.49747 7.44687 1.72921 6.62539 2.37939 6.53739L5.53487 6.11031C5.7987 6.07461 6.02383 5.9017 6.12639 5.65601L7.30821 2.82496Z"
														stroke="#8AB2CE" stroke-width="1.6" stroke-miterlimit="3.3292"
														stroke-linecap="round" stroke-linejoin="round"></path>
												</svg>
												<svg class="catalog__rate-icon" viewBox="0 0 16 17"
													xmlns="http://www.w3.org/2000/svg">
													<path
														d="M7.30821 2.82496C7.56484 2.21019 8.43581 2.21019 8.69244 2.82496L9.87426 5.65601C9.97682 5.9017 10.2019 6.07461 10.4658 6.11031L13.6212 6.53739C14.2714 6.62539 14.5032 7.44688 13.9948 7.86169L11.5749 9.83646C11.3534 10.0172 11.2539 10.3081 11.3184 10.5866L12.091 13.9255C12.2461 14.5957 11.4925 15.1037 10.9295 14.7085L8.43119 12.9551C8.17261 12.7736 7.82804 12.7736 7.56946 12.9551L5.07115 14.7085C4.50812 15.1037 3.75452 14.5957 3.9096 13.9256L4.68221 10.5866C4.74665 10.3081 4.64717 10.0172 4.4257 9.83646L2.00579 7.86169C1.49747 7.44687 1.72921 6.62539 2.37939 6.53739L5.53487 6.11031C5.7987 6.07461 6.02383 5.9017 6.12639 5.65601L7.30821 2.82496Z"
														stroke="#8AB2CE" stroke-width="1.6" stroke-miterlimit="3.3292"
														stroke-linecap="round" stroke-linejoin="round"></path>
												</svg>
												<svg class="catalog__rate-icon" viewBox="0 0 16 17"
													xmlns="http://www.w3.org/2000/svg">
													<path
														d="M7.30821 2.82496C7.56484 2.21019 8.43581 2.21019 8.69244 2.82496L9.87426 5.65601C9.97682 5.9017 10.2019 6.07461 10.4658 6.11031L13.6212 6.53739C14.2714 6.62539 14.5032 7.44688 13.9948 7.86169L11.5749 9.83646C11.3534 10.0172 11.2539 10.3081 11.3184 10.5866L12.091 13.9255C12.2461 14.5957 11.4925 15.1037 10.9295 14.7085L8.43119 12.9551C8.17261 12.7736 7.82804 12.7736 7.56946 12.9551L5.07115 14.7085C4.50812 15.1037 3.75452 14.5957 3.9096 13.9256L4.68221 10.5866C4.74665 10.3081 4.64717 10.0172 4.4257 9.83646L2.00579 7.86169C1.49747 7.44687 1.72921 6.62539 2.37939 6.53739L5.53487 6.11031C5.7987 6.07461 6.02383 5.9017 6.12639 5.65601L7.30821 2.82496Z"
														stroke="#8AB2CE" stroke-width="1.6" stroke-miterlimit="3.3292"
														stroke-linecap="round" stroke-linejoin="round"></path>
												</svg>
												<svg class="catalog__rate-icon" viewBox="0 0 16 17"
													xmlns="http://www.w3.org/2000/svg">
													<path
														d="M7.30821 2.82496C7.56484 2.21019 8.43581 2.21019 8.69244 2.82496L9.87426 5.65601C9.97682 5.9017 10.2019 6.07461 10.4658 6.11031L13.6212 6.53739C14.2714 6.62539 14.5032 7.44688 13.9948 7.86169L11.5749 9.83646C11.3534 10.0172 11.2539 10.3081 11.3184 10.5866L12.091 13.9255C12.2461 14.5957 11.4925 15.1037 10.9295 14.7085L8.43119 12.9551C8.17261 12.7736 7.82804 12.7736 7.56946 12.9551L5.07115 14.7085C4.50812 15.1037 3.75452 14.5957 3.9096 13.9256L4.68221 10.5866C4.74665 10.3081 4.64717 10.0172 4.4257 9.83646L2.00579 7.86169C1.49747 7.44687 1.72921 6.62539 2.37939 6.53739L5.53487 6.11031C5.7987 6.07461 6.02383 5.9017 6.12639 5.65601L7.30821 2.82496Z"
														stroke="#8AB2CE" stroke-width="1.6" stroke-miterlimit="3.3292"
														stroke-linecap="round" stroke-linejoin="round"></path>
												</svg>
												<svg class="catalog__rate-icon" viewBox="0 0 16 17"
													xmlns="http://www.w3.org/2000/svg">
													<path
														d="M7.30821 2.82496C7.56484 2.21019 8.43581 2.21019 8.69244 2.82496L9.87426 5.65601C9.97682 5.9017 10.2019 6.07461 10.4658 6.11031L13.6212 6.53739C14.2714 6.62539 14.5032 7.44688 13.9948 7.86169L11.5749 9.83646C11.3534 10.0172 11.2539 10.3081 11.3184 10.5866L12.091 13.9255C12.2461 14.5957 11.4925 15.1037 10.9295 14.7085L8.43119 12.9551C8.17261 12.7736 7.82804 12.7736 7.56946 12.9551L5.07115 14.7085C4.50812 15.1037 3.75452 14.5957 3.9096 13.9256L4.68221 10.5866C4.74665 10.3081 4.64717 10.0172 4.4257 9.83646L2.00579 7.86169C1.49747 7.44687 1.72921 6.62539 2.37939 6.53739L5.53487 6.11031C5.7987 6.07461 6.02383 5.9017 6.12639 5.65601L7.30821 2.82496Z"
														stroke="#8AB2CE" stroke-width="1.6" stroke-miterlimit="3.3292"
														stroke-linecap="round" stroke-linejoin="round"></path>
												</svg>
											</span>
											<span class="catalog__rate-text">0</span>
										</div>
									</div>

									<a class="catalog__item-img" href="<?= $arElement["DETAIL_PAGE_URL"] ?>">
										<img src="<?= $arElement["PREVIEW_PICTURE"] ?>"
											alt="<?= $arElement["PREVIEW_PICTURE"]["ALT"] ?>">
									</a>

									<div class="catalog__item-content">
										<div class="catalog__price-wrapper">
											<button class="btn-like" data-action="add2favorite" data-productid="41020">
												<img class="favorite" alt="">
											</button>


										</div>

										<a class="catalog__item-title" href="<?= $arElement["DETAIL_PAGE_URL"] ?>"><span>
												<?= $arElement["NAME"] ?>
											</span></a>

										<div class="catalog__info">
											<div class="catalog__info-item">
												<span class="catalog__info-title">Код товара</span>
												<span class="catalog__info-value">0041020</span>
											</div>
											<div class="catalog__info-item">
												<span class="catalog__info-title">Материал</span>
												<span class="catalog__info-value">металл</span>
											</div>

										</div>


									</div>
								</li>
							<? endforeach; ?>
						</ul>
						<div class="catalog__bottom">
							<div class="pagination js-pagination">

								<span class="pagination__item js-pagination-item is-active">
									<span>1</span>
								</span>
								<a class="pagination__item js-pagination-item"
									href="/catalog/stoly_i_stulya/stoly_zhurnalnye/?PAGEN_1=2">
									<span>2</span>
								</a>
								<a class="pagination__item js-pagination-item"
									href="/catalog/stoly_i_stulya/stoly_zhurnalnye/?PAGEN_1=3">
									<span>3</span>
								</a>
								<a class="pagination__item js-pagination-item"
									href="/catalog/stoly_i_stulya/stoly_zhurnalnye/?PAGEN_1=4">
									<span>4</span>
								</a>
								<a class="pagination__item-next" href="/catalog/stoly_i_stulya/stoly_zhurnalnye/?PAGEN_1=2">
									<svg viewBox="0 0 6 8" xmlns="http://www.w3.org/2000/svg">
										<path d="M1 1.00098L4 3.99992L1 6.99886"></path>
									</svg>
									<span class="visuallyhidden">Следующая страница</span>
								</a>
							</div>
							<div class="sorting__count sorting__count--bottom">
								<span class="sorting__name">Товаров на странице:</span>
								<a href="/catalog/stoly_i_stulya/stoly_zhurnalnye/?limit=15"
									class="sorting__count-item is-active">
									<span>15</span>
								</a>
								<a href="/catalog/stoly_i_stulya/stoly_zhurnalnye/?limit=30" class="sorting__count-item">
									<span>30</span>
								</a>
								<a href="/catalog/stoly_i_stulya/stoly_zhurnalnye/?limit=60" class="sorting__count-item">
									<span>60</span>
								</a>
								<a href="/catalog/stoly_i_stulya/stoly_zhurnalnye/?limit=all" class="sorting__count-item">
									<span>все</span>
								</a>
							</div>
						</div>
					</div>
				</div>


				<? if ($arParams["DISPLAY_BOTTOM_PAGER"]): ?>
					<?= $arResult["NAV_STRING"] ?>
				<? endif ?>
			</div>
		</div>
	</main>
<? endif; ?>