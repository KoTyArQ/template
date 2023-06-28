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
<? if (0 < $arResult["SECTIONS_COUNT"]): ?>
	<main class="maincontent">
		<div class="page-wrapper">
			<div class="container">
				<h1 class="page-title">Каталог</h1>
				<div class="main-categories">
					<ul class="main-categories__сol">
						<li class="main-categories__space-item"></li>
						<? foreach ($arResult['SECTIONS'] as $arSection):
							$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
							$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);
							?>
							<li id="<? echo $this->GetEditAreaId($arSection['ID']); ?>" class="main-categories__item">
								<a class="main-categories__item-inner" href="<? echo $arSection['SECTION_PAGE_URL']; ?>">
									<div class="main-categories__img-wrap">
										<img class="main-categories__img" src="<? echo $arSection['PICTURE']['SRC']; ?>"
											alt="<? echo $arSection['PICTURE']['TITLE']; ?>">
									</div>
									<div class="main-categories__info">
										<h2 class="main-categories__name">
											<? echo $arSection['NAME']; ?>
										</h2>
										<svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
											<path
												d="M21.4979 23.505L27.4614 17.5414L27.4668 17.5307L27.4999 17.497C27.6266 17.3679 27.6983 17.1947 27.7 17.0139V17.0111V17.0111C27.7 16.9202 27.6816 16.8303 27.646 16.7468L27.646 16.7468L27.6447 16.7435C27.6112 16.6623 27.5622 16.5884 27.5005 16.5259L27.4752 16.5003L27.4698 16.4911L21.4979 10.5193C21.366 10.3928 21.19 10.3229 21.0072 10.3244C20.8237 10.326 20.6481 10.3997 20.5183 10.5294C20.3885 10.6592 20.3149 10.8348 20.3133 11.0183C20.3117 11.2011 20.3817 11.3772 20.5081 11.509L24.7981 15.799L25.3103 16.3111H24.586H5C4.81435 16.3111 4.6363 16.3849 4.50502 16.5162C4.37375 16.6474 4.3 16.8255 4.3 17.0111C4.3 17.1968 4.37375 17.3748 4.50502 17.5061C4.6363 17.6374 4.81435 17.7111 5 17.7111H24.586H25.31L24.7982 18.2232L20.5082 22.5152C20.3817 22.6471 20.3117 22.8232 20.3133 23.0059C20.3149 23.1895 20.3885 23.365 20.5183 23.4948C20.6481 23.6246 20.8237 23.6982 21.0072 23.6998C21.19 23.7014 21.366 23.6315 21.4979 23.505Z">
											</path>
										</svg>
									</div>
									<span class="main-categories__count">
										<? echo $arSection["ELEMENT_CNT"]; ?>
									</span>
								</a>
							</li>
						<? endforeach; ?>

					</ul>
				</div>
			</div>
		</div>
	</main>
<? endif; ?>