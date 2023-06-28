<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/**
 * @global CMain $APPLICATION
 */

global $APPLICATION;

//delayed function must return a string
if(empty($arResult))
	return "";

$strReturn = '';

//we can't use $APPLICATION->SetAdditionalCSS() here because we are inside the buffered function GetNavChain()
$css = $APPLICATION->GetCSSArray();
if(!is_array($css) || !in_array("/bitrix/css/main/font-awesome.css", $css))
{
	$strReturn .= '<link href="'.CUtil::GetAdditionalFileURL("/bitrix/css/main/font-awesome.css").'" type="text/css" rel="stylesheet" />'."\n";
}

$strReturn .= '<div class="breadcrumb__item" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">';

$itemSize = count($arResult);
for($index = 0; $index < $itemSize; $index++)
{
	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);
	$arrow = ($index > 0? '<svg class="breadcrumb__arrow" viewBox="0 0 13 14" xmlns="http://www.w3.org/2000/svg"><path d="M11.375 7.41224C11.3742 7.51747 11.3325 7.61827 11.2588 7.69337L11.2564 7.69824L8.81888 10.1357C8.74226 10.2097 8.63964 10.2507 8.53312 10.2498C8.4266 10.2488 8.32471 10.2061 8.24939 10.1308C8.17406 10.0555 8.13134 9.95358 8.13041 9.84706C8.12949 9.74054 8.17044 9.63792 8.24444 9.5613L9.98806 7.81687H2.03125C1.92351 7.81687 1.82017 7.77407 1.74399 7.69788C1.6678 7.62169 1.625 7.51836 1.625 7.41062C1.625 7.30287 1.6678 7.19954 1.74399 7.12336C1.82017 7.04717 1.92351 7.00437 2.03125 7.00437H9.98806L8.24444 5.26074C8.17044 5.18412 8.12949 5.0815 8.13041 4.97499C8.13134 4.86847 8.17406 4.76658 8.24939 4.69125C8.32471 4.61593 8.4266 4.57321 8.53312 4.57228C8.63964 4.57136 8.74226 4.6123 8.81888 4.6863L11.2564 7.1238L11.2588 7.12787C11.295 7.16451 11.3237 7.20784 11.3433 7.25543C11.3642 7.30449 11.375 7.35728 11.375 7.41062V7.41224Z"></path></svg>' : '');

	if($arResult[$index]["LINK"] <> "" && $index != $itemSize-1)
	{
		$strReturn .= '
			<div class="breadcrumb__item" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
				'.$arrow.'
				<a class="breadcrumb__link" href="'.$arResult[$index]["LINK"].'" title="'.$title.'" itemprop="item">
					<span itemprop="name">'.$title.'</span>
				</a>
				<meta itemprop="position" content="'.($index + 1).'" />

			</div>';
	}
	else
	{
		$strReturn .= '
			<div class="breadcrumb__item">
				'.$arrow.'
				<span>'.$title.'</span>
			</div>';
	}
}

$strReturn .= '<div style="clear:both"></div></div>';

return $strReturn;
