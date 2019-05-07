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

<div class="how-start-block">

    <div class="how-start-block__content">
        <div class="how-start-block__item">
            <div class="how-start-block__item__number">1</div>
            <div class="how-start-wprapper-block">
                <div class="how-start-block__item__title">Самые эффективные тренировки</div>
                <div class="how-start-block__item__desc">Авторский курс видео-упражнений для максимально достижения результата. Ты хочешь похудеть или набрать массу? У тебя варикоз, диастаз или болят колени? Все это мы учтем!
                </div>
            </div>
        </div>
        <div class="how-start-block__item">
            <div class="how-start-block__item__number">2</div>
            <div class="how-start-wprapper-block">
                <div class="how-start-block__item__title">Разумное питание</div>
                <div class="how-start-block__item__desc">Рацион на каждый день с учетом твоих индивидуальных предпочтений. Доступно целых 5 программ: стандартная, диабетик, вегетарианец, веган, без лактозы. Бонусом я поделюсь с тобой базой вкусных и полезных рецептов.</div>
            </div>
        </div>
        <div class="how-start-block__item">
            <div class="how-start-block__item__number">3</div>
            <div class="how-start-wprapper-block">
                <div class="how-start-block__item__title">Результат, которого ждешь</div>
                <div class="how-start-block__item__desc">В личном кабинете ты сможешь добавлять отчеты о своих изменениях. Это позволит отслеживать результаты и развивать дисциплину.</div>
            </div>
        </div>

    </div>

</div>

