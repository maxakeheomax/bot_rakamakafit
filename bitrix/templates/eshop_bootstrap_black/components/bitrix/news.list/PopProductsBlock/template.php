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

//debug($items);
?>

<div class="pop-products-block">
    <div class="pop-products-block__title">
        <p class="pop-products-block__title__name">Популярные товары</p>
        <!-- <div ><a href="/catalog" class="pop-products-block__title__link-to-all">все</a></div> -->
    </div>
    <div class="pop-products-block__items">
        <?foreach ($items as $arItem):?>
            <?dump($arItem['PROPERTIES']['POPULAR']['VALUE'])?>
            <?
            $arTorPreds = CCatalogSKU::getOffersList($arItem['ID'], 0, array('ACTIVE' => 'Y'), array('NAME'), array("CODE"=>array('HEIGHT', 'WIDTH')));
            foreach ($arTorPreds as $arTorPred){

                $ar_res = CPrice::GetBasePrice(array_keys($arTorPred)[0]);
                $arTorPreds = CCatalogSKU::getOffersList($arItem['ID'], 0, array('ACTIVE' => 'Y'), array('NAME'), array("CODE"=>array('HEIGHT', 'WIDTH')));
                foreach ($arTorPreds as $arTorPred){
                    $url = '/catalog/?action=ADD2BASKET&amp;id='.array_keys($arTorPred)[0];
                }
            }
            ?>
        <!-- cycle start -->
        <div class="pop-products-block__item">
            <div class="pop-products-block__item__img-block">
                <img src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>" alt="">
            </div>
            <div class="pop-products-block__item__title"><span class="title-span"><?=$arItem['NAME']?></span></div>
            <div class="pop-products-block__item__prices">
                <div class="pop-products-block__item__price"><?=$ar_res['PRICE']?>₽</div>
                <!--div class="pop-products-block__item__old-price">7980 ₽</div-->
                <a href="<?=$url?>"><div class="pop-products-block__item-cart"></div></a>
            </div>
        </div>
        <!-- cycle end -->
        <?endforeach;?>


    </div>
</div>