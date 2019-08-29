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
$iblock = GetIBlock($arResult['ITEMS'][0]['IBLOCK_ID']);
$items = $arResult['ITEMS'];
?>

<div class="in-the-know-form-block">
    <div class="in-the-know-form-block__title">Хочешь быть в курсе</div>
    <div class="in-the-know-form-block__desc">cамых интересный новостей, получать еженедельно вкусные рецепты, советы по питанию и тренировкам от меня лично?</div>
    <form class="in-the-know-form-block__form" action="/forms_ajax.php" method="post">
        <input type="hidden" name="action" value="news">
        <input type="hidden" name="url" value="<?=$APPLICATION->GetCurPage();?>">
        <div class="in-the-know-form-block__form__input-wrapper">
            <label>
                <input name="name" class="in-the-know-form-block__form__input" type="text" required pattern="\W+\S+" placeholder='Имя'>
            </label>
            <label>
                <input name="email" class="in-the-know-form-block__form__input" type="email" required pattern="\S+@[a-z]+.[a-z]+" placeholder='Email'>
            </label>
            <button class="in-the-know-form-block__form__submit" type="submit">подписаться</button>
        </div>
        <div class="in-the-know-form-block__form__input-checkbox-wrapper">
            <input  class="in-the-know-form-block__form__checkbox" type="checkbox" name="" id="in-the-know-form-checkbox">
            <label for="in-the-know-form-checkbox"></label>
            <p class="in-the-know-form-block__form__checkbox-desc">Я согласен с обработкой персональных данных</p>
        </div>
    </form>
</div>