<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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

// $APPLICATION->AddHeadScript(__DIR__."/");

$iblock = GetIBlock($arResult['ITEMS'][0]['IBLOCK_ID']);
$item = $arResult['ITEMS'][ count($arResult['ITEMS'])-1 ];
$item_properties = CIBlockElement::GetByID($item['ID'])->GetNextElement()->GetProperties();
$item
?>

<div class="faq-block">
    <div class="faq-block__left-block">
        <div class="faq-block__left-block__title">F.A.Q</div>
        <div class="faq-block__left-block__arrow"><img src="<?= SITE_TEMPLATE_PATH ?>/assets/faq-arrow.svg" alt=""></div>
    </div>
    <div class="faq-block__right-block">
        <div class="faq-block__right-block__desc">Кликни, чтобы узнать ответы на часто задаваемые вопросы</div>
    </div>
</div>