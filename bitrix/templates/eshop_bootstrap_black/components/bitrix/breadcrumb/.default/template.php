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

$strReturn .= '<div class="breadcrumbs">
<div class="breadcrumbs-content">';

$itemSize = count($arResult);
for($index = 0; $index < $itemSize; $index++)
{
	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);

	if($arResult[$index]["LINK"] <> "" && $index != $itemSize-1)
	{
		$strReturn .= '
		<div class="breadcrumbs__separator"> / </div>
		<div class="breadcrumbs__item">
			<a href="'.$arResult[$index]["LINK"].'" title="'.$title.'" itemprop="url">'.$title.'</a>
		</div>';
	}
	else
	{
		$strReturn .= '
		<div class="breadcrumbs__separator"> / </div>
		<div class="breadcrumbs__item active">'.$title.'</div>';
	}
}

$strReturn .= '</div></div>';

return $strReturn;
