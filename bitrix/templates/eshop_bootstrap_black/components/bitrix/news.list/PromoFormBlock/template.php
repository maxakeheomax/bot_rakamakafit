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
?>

<div class="promo-form-block">
    <div class="promo-form-block__title">Получи ТОП-5 упражнений для прокачки ягодиц <span class="promo-form-block__title_underline-block">прямо сейчас</span></div>
    <form class="promo-form-block__form" action="#">
        <div class="promo-form-block__form__input-wrapper">
            <label name="mail">
                <input class="promo-form-block__form__input" type="email" required pattern="\S+@[a-z]+.[a-z]+" placeholder='Email'>
            </label>
            <button class="promo-form-block__form__submit" type="submit">получить</button>
        </div>
        <div class="promo-form-block__form__input-checkbox-wrapper">
            <input  class="promo-form-block__form__checbox"  type="checkbox" name="" id="promo-checkbox">
            <label for="promo-checkbox"></label>
            <p class="promo-form-block__form__checbox-desc">Я согласен с обработкой персональных данных</p>
        </div>
    </form>
</div>