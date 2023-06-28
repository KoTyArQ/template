<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
?>
<?
$this->setFrameMode(true);
?>

<div class="maincontent-brands-more__list">
		<?	foreach ($arResult['SECTIONS'] as &$arSection)
			{
				$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
				$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);
				?>
				
									<a class="maincontent-brands-more__item" href="<?= $arSection['SECTION_PAGE_URL'];?>">
							<div class="maincontent-brands-more__item-text"><?= $arSection['NAME'] ?></div>
							<div class="maincontent-brands-more__item-count"><?=$arSection["ELEMENT_CNT"]?></div>
						</a>
				
								<?
			}
			?>
			</div>