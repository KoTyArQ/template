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
$this->setFrameMode(true);
?>
<div class="page-news contaner js-news-container">
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
    
	<article class="page-news__item card-news" id="bx_3218110189_41057">
            <a class="card-news__inner" href="<?=$arItem["DETAIL_PAGE_URL"] ?>">
                <div class="card-news__img"><img src="<?php 
				if ($arItem["PREVIEW_PICTURE"])
				{
					?><?=$arItem["PREVIEW_PICTURE"]["SRC"]?>
					<?
				}
				else
				{
					?>https://placehold.co/725x515
					<?
				}
				?>" alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>">
                </div>
                <div class="card-news__info">
                    <div class="card-news__title">
                        <span style="-webkit-box-orient: vertical"><?=$arItem["NAME"] ?></span>
                    </div>
                    <div><?=$arItem["PREVIEW_TEXT"]?></div>
                                        <time class="card-news__date" datetime="<?=$arItem["ACTIVE_FROM"] ?>">
                        <svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M4.375 0.078125C4.72018 0.078125 5 0.357947 5 0.703125V1.32812H10V0.703125C10 0.357947 10.2798 0.078125 10.625 0.078125C10.9702 0.078125 11.25 0.357947 11.25 0.703125V1.32812H11.875C13.2557 1.32812 14.375 2.44741 14.375 3.82812V11.9531C14.375 13.3338 13.2557 14.4531 11.875 14.4531H3.125C1.74429 14.4531 0.625 13.3338 0.625 11.9531V3.82812C0.625 2.44741 1.74429 1.32812 3.125 1.32812H3.75V0.703125C3.75 0.357947 4.02982 0.078125 4.375 0.078125ZM3.125 2.57812C2.43464 2.57812 1.875 3.13777 1.875 3.82812V4.45312H13.125V3.82812C13.125 3.13777 12.5654 2.57812 11.875 2.57812H3.125ZM13.125 5.70312H1.875V11.9531C1.875 12.6435 2.43464 13.2031 3.125 13.2031H11.875C12.5654 13.2031 13.125 12.6435 13.125 11.9531V5.70312ZM3.4375 8.20312C3.4375 7.85795 3.71732 7.57812 4.0625 7.57812H4.6875C5.03268 7.57812 5.3125 7.85795 5.3125 8.20312C5.3125 8.5483 5.03268 8.82812 4.6875 8.82812H4.0625C3.71732 8.82812 3.4375 8.5483 3.4375 8.20312ZM6.5625 8.20312C6.5625 7.85795 6.84232 7.57812 7.1875 7.57812H7.8125C8.15768 7.57812 8.4375 7.85795 8.4375 8.20312C8.4375 8.5483 8.15768 8.82812 7.8125 8.82812H7.1875C6.84232 8.82812 6.5625 8.5483 6.5625 8.20312ZM9.6875 8.20312C9.6875 7.85795 9.96732 7.57812 10.3125 7.57812H10.9375C11.2827 7.57812 11.5625 7.85795 11.5625 8.20312C11.5625 8.5483 11.2827 8.82812 10.9375 8.82812H10.3125C9.96732 8.82812 9.6875 8.5483 9.6875 8.20312ZM3.4375 10.7031C3.4375 10.3579 3.71732 10.0781 4.0625 10.0781H4.6875C5.03268 10.0781 5.3125 10.3579 5.3125 10.7031C5.3125 11.0483 5.03268 11.3281 4.6875 11.3281H4.0625C3.71732 11.3281 3.4375 11.0483 3.4375 10.7031ZM6.5625 10.7031C6.5625 10.3579 6.84232 10.0781 7.1875 10.0781H7.8125C8.15768 10.0781 8.4375 10.3579 8.4375 10.7031C8.4375 11.0483 8.15768 11.3281 7.8125 11.3281H7.1875C6.84232 11.3281 6.5625 11.0483 6.5625 10.7031ZM9.6875 10.7031C9.6875 10.3579 9.96732 10.0781 10.3125 10.0781H10.9375C11.2827 10.0781 11.5625 10.3579 11.5625 10.7031C11.5625 11.0483 11.2827 11.3281 10.9375 11.3281H10.3125C9.96732 11.3281 9.6875 11.0483 9.6875 10.7031Z" fill="#999999"></path>
                        </svg>
                        <?=$arItem["ACTIVE_FROM"] ?>                    </time>
                </div>
                <span class="card-news__arrow">
                    <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M21 12.9549C20.9985 13.1492 20.9216 13.3353 20.7855 13.4739L20.781 13.4829L16.281 17.9829C16.1395 18.1196 15.9501 18.1952 15.7534 18.1935C15.5568 18.1917 15.3687 18.1129 15.2296 17.9738C15.0906 17.8348 15.0117 17.6466 15.01 17.45C15.0083 17.2534 15.0839 17.0639 15.2205 16.9224L18.4395 13.7019H3.75C3.55109 13.7019 3.36032 13.6229 3.21967 13.4823C3.07902 13.3416 3 13.1509 3 12.9519C3 12.753 3.07902 12.5623 3.21967 12.4216C3.36032 12.281 3.55109 12.2019 3.75 12.2019H18.4395L15.2205 8.98295C15.0839 8.8415 15.0083 8.65204 15.01 8.4554C15.0117 8.25875 15.0906 8.07064 15.2296 7.93158C15.3687 7.79253 15.5568 7.71365 15.7534 7.71194C15.9501 7.71023 16.1395 7.78583 16.281 7.92245L20.781 12.4224L20.7855 12.4299C20.8523 12.4976 20.9052 12.5776 20.9415 12.6654C20.9801 12.756 21 12.8535 21 12.9519V12.9549Z" fill="#414756"></path>
                    </svg>
                </span>
            </a>
        </article>
<?endforeach;?>
</div>
