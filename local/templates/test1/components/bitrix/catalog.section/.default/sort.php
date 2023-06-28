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
	<?php 
		if (!CModule::IncludeModule('iblock')) {
			ShowError('Модуль «Информационные блоки» не установлен');
		}
		
		// какие поля элементов инфоблока выбираем
		$arSelect = array(
			'ID',
			'CODE',
			'NAME',
			'PREVIEW_TEXT',
		);
		// условия выборки элементов инфоблока
		$arFilter = array(
			'IBLOCK_ID' => 5,             // идентификатор инфоблока
			'IBLOCK_ACTIVE' => 'Y',       // инфоблок должен быть активным
			'SECTION_ID' => 16,           // идентификатор раздела инфоблока
			'INCLUDE_SUBSECTIONS' => 'Y', // включая элементы из подразделов
			'SECTION_ACTIVE' => 'Y',      // разделы элементов должны быть активными
			'ACTIVE' => 'Y',              // только активные элементы
			'ACTIVE_DATE' => 'Y',         // активные элементы с учетом даты
		);
		// сортировка элементов
		$arSort = array(
			'SORT' => 'ASC'
		);
		// постраничная навигация
		$arNavParams = array(
			'nPageSize' => 2,   // количество элементов на странице
			'bShowAll' => true, // показывать ссылку «Все элементы»?
		);
		// выполняем запрос к базе данных
		$dbResult = CIBlockElement::GetList(
			$arSort,
			$arFilter,
			false,
			$arNavParams,
			$arSelect
		);
		
		ob_start(); // начинаем буферизацию вывода
		$APPLICATION->IncludeComponent(
			'bitrix:system.pagenavigation',
			'',
			array(
				'NAV_TITLE'   => 'Элементы', // поясняющий текст для постраничной навигации
				'NAV_RESULT'  => $dbResult,  // результаты выборки из базы данных
				'SHOW_ALWAYS' => false       // показывать постраничную навигацию всегда?
			)
		);
		$navString = ob_get_clean(); // завершаем буферизацию вывода
		
		
		
		?>
	<main class="maincontent">
		<div class="page-wrapper">
			<div class="container">
				<h1 class="page-title page-title--small-bottom">
					<?= $arResult['NAME'] ?>
					<?php
				$sort = $_GET['sorting'];
				?>
				<div class="sorting js-sorting">
					<div class="sorting__item">
						<span class="sorting__name"> Сортировать по:</span>
						<select id="sort-item" class=" selectoption selectpicker show-tick sorting__list js-sorting-list">
							<option <?php if ($sort == 'price_asc')

										echo "selected class='is-active'";

									?> value="?sorting=price_asc">
								<span>Цена повышение</span>
							</option>
							<option <?php if ($sort == 'price_desc')
										echo "selected class='is-active'" ?> value="?sorting=price_desc">
								<span>Цена понижение</span>
							</option>
							<option <?php if ($sort == 'time')
										echo "selected class='is-active'";

									?> value="?sorting=time">
								<span>По дате добавления</span>
							</option>
						</select>
						<?php

						switch ($sort) {
							case "price_asc":
								$arParams['ELEMENT_SORT_FIELD'] = "catalog_PRICE_1";
								$arParams['ELEMENT_SORT_ORDER'] = "asc";
								break;
							case "price_desc":
								$arParams['ELEMENT_SORT_FIELD'] = "catalog_PRICE_1";
								$arParams['ELEMENT_SORT_ORDER'] = "desc";
								break;
							case "time":
								$arParams['ELEMENT_SORT_FIELD'] = "timestamp_x";
								$arParams['ELEMENT_SORT_ORDER'] = "desc";
								break;
						}

						?>
						<style>
							.selectoption option {
								display: -ms-flexbox;
								display: flex;
								-ms-flex-pack: justify;
								justify-content: space-between;
								-ms-flex-align: center;
								align-items: center;
								min-height: 42px;
								padding: 0 20px;
								border: 1px solid #d6d6d6;
								background: #fff;
							}
						</style>
					</div>
					<div class="sorting__count">
					

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

							<?php
							while ($ob = $res->GetNextElement()) {
								$arElement = $ob->GetFields();

								$arProps = $ob->GetProperties();
								echo "<pre>";


								echo "</pre>";

								$this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arElement["IBLOCK_ID"], "ELEMENT_EDIT"));
								$this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arElement["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCS_ELEMENT_DELETE_CONFIRM')));
								$img_path = CFile::GetPath($arElement["PREVIEW_PICTURE"]);

								?>

								<li id="<?= $this->GetEditAreaId($arElement['ID']); ?>" class=" catalog__item">
									<div class="catalog__item-top">
										<div class="catalog__only-wrapper">

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
										<img src="<?= $img_path ?>" alt="<?= $arItem["PREVIEW_PICTURE"]["ALT"] ?>">
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
												<span class="catalog__info-value">
													<?= $arProps["ARTNUMBER"]["VALUE"] ?>
												</span>
											</div>
											<div class="catalog__info-item">
												<span class="catalog__info-title">Материал</span>
												<span class="catalog__info-value">
													<?= $arProps["MATERIAL"]["VALUE"] ?>
												</span>
											</div>
											<div class="catalog__info-item">
												<span class="catalog__info-title">Страна </span>
												<span class="catalog__info-value">
													<?= $arProps["MANUFACTURER"]["VALUE"] ?>
												</span>
											</div>

										</div>


									</div>
								</li>
								<?
							}
							; ?>
						</ul>

						<div class="catalog__bottom">
							<?php
							// выводим постраничную навигацию
							echo $navString;
							?>
						</div>
					</div>
				</div>
			</div>

		</div>
		</div>
	</main>
<? endif; ?>
<!-- сортировка -->
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
	<?php 
		if (!CModule::IncludeModule('iblock')) {
			ShowError('Модуль «Информационные блоки» не установлен');
		}
		
		// какие поля элементов инфоблока выбираем
		$arSelect = array(
			'ID',
			'CODE',
			'NAME',
			'PREVIEW_TEXT',
		);
		// условия выборки элементов инфоблока
		$arFilter = array(
			'IBLOCK_ID' => 5,             // идентификатор инфоблока
			'IBLOCK_ACTIVE' => 'Y',       // инфоблок должен быть активным
			'SECTION_ID' => 16,           // идентификатор раздела инфоблока
			'INCLUDE_SUBSECTIONS' => 'Y', // включая элементы из подразделов
			'SECTION_ACTIVE' => 'Y',      // разделы элементов должны быть активными
			'ACTIVE' => 'Y',              // только активные элементы
			'ACTIVE_DATE' => 'Y',         // активные элементы с учетом даты
		);
		// сортировка элементов
		$arSort = array(
			'SORT' => 'ASC'
		);
		// постраничная навигация
		$arNavParams = array(
			'nPageSize' => 2,   // количество элементов на странице
			'bShowAll' => true, // показывать ссылку «Все элементы»?
		);
		// выполняем запрос к базе данных
		$dbResult = CIBlockElement::GetList(
			$arSort,
			$arFilter,
			false,
			$arNavParams,
			$arSelect
		);
		
		ob_start(); // начинаем буферизацию вывода
		$APPLICATION->IncludeComponent(
			'bitrix:system.pagenavigation',
			'',
			array(
				'NAV_TITLE'   => 'Элементы', // поясняющий текст для постраничной навигации
				'NAV_RESULT'  => $dbResult,  // результаты выборки из базы данных
				'SHOW_ALWAYS' => false       // показывать постраничную навигацию всегда?
			)
		);
		$navString = ob_get_clean(); // завершаем буферизацию вывода
		
		
		
		?>
	<main class="maincontent">
		<div class="page-wrapper">
			<div class="container">
				<h1 class="page-title page-title--small-bottom">
					<?= $arResult['NAME'] ?>
				</h1>
				<?php
				$sort = $_GET['sort'];
				$method = $_GET['method'];
				?>
				<div class="sorting js-sorting">
					<div class="sorting__item">
						<span class="sorting__name"> Сортировать по:</span>
						<select id="sort-item" class=" selectoption selectpicker show-tick sorting__list js-sorting-list">
							<option value="<?=$arResult["SECTION_PAGE_URL"]?>?sort=name&method=asc" <?php if ($sort == 'name' && $method == 'asc')
								echo "selected class='is-active'";
							?>>

								<span>По названию</span>
							</option>
							<option <?php if ($sort == 'catalog_PRICE_1' && $method == 'asc')

								echo "selected class='is-active'";

							?> value="<?=$arResult["SECTION_PAGE_URL"]?>?sort=catalog_PRICE_1&method=asc">
								<span>Цена повышение</span>
							</option>
							<option <?php if ($sort == 'catalog_PRICE_1' && $method == 'desc')
								echo "selected class='is-active'" ?> value="<?=$arResult["SECTION_PAGE_URL"]?>?sort=catalog_PRICE_1&method=desc">
									<span>Цена понижение</span>
								</option>
								<option <?php if ($sort == 'timestamp_x' && $method == 'desc')
								echo "selected class='is-active'";

							?> value="<?=$arResult["SECTION_PAGE_URL"]?>?sort=timestamp_x&method=desc">
								<span>По дате добавления</span>
							</option>
						</select>
						<style>
							.selectoption option {
								display: -ms-flexbox;
								display: flex;
								-ms-flex-pack: justify;
								justify-content: space-between;
								-ms-flex-align: center;
								align-items: center;
								min-height: 42px;
								padding: 0 20px;
								border: 1px solid #d6d6d6;
								background: #fff;
							}
						</style>
					</div>
					<div class="sorting__count">
					

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

							<?foreach ($arResult['ITEMS'] as $arElement): ?>
							<?PHP
							
								$this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arElement["IBLOCK_ID"], "ELEMENT_EDIT"));
								$this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arElement["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCS_ELEMENT_DELETE_CONFIRM')));
								
?>
							<li id="<?= $this->GetEditAreaId($arElement['ID']); ?>" class=" catalog__item">
									<div class="catalog__item-top">
										<div class="catalog__only-wrapper">

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
										<img src="<?= $arElement["PREVIEW_PICTURE"]["SRC"] ?>" alt="<?= $arElement["PREVIEW_PICTURE"]["ALT"] ?>">
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
												<span class="catalog__info-value">
													<?= $arElement['PROPERTIES']["ARTNUMBER"]["VALUE"] ?>
												</span>
											</div>
											<div class="catalog__info-item">
												<span class="catalog__info-title">Материал</span>
												<span class="catalog__info-value">
													<?= $arElement['PROPERTIES']["MATERIAL"]["VALUE"] ?>
												</span>
											</div>
											<div class="catalog__info-item">
												<span class="catalog__info-title">Страна </span>
												<span class="catalog__info-value">
													<?= $arElement['PROPERTIES']["MANUFACTURER"]["VALUE"] ?>
												</span>
											</div>

										</div>


									</div>
								</li>
								<?endforeach;?>
						</ul>

						<div class="catalog__bottom">

						</div>
					</div>
				</div>
			</div>

		</div>
		</div>
	</main>
<? endif; ?>