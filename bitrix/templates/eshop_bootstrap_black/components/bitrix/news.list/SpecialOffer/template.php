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

<div class="special-offer-block">
    <div class="special-offer-block__title">
        <p class="special-offer-block__title__name">спецпредложения</p>
        <!-- <div ><a href="/catalog" class="pop-products-block__title__link-to-all">все</a></div> -->
    </div>
    <div class="special-offer-block__items">
        <?foreach ($items as $arItem):?>
            <?
            $description = substr($arItem['DETAIL_TEXT'], 0, 150).'...';
            $arTorPreds = CCatalogSKU::getOffersList($arItem['ID'], 0, array('ACTIVE' => 'Y'), array('NAME'), array("CODE"=>array('HEIGHT', 'WIDTH')));
            foreach ($arTorPreds as $arTorPred){

                $ar_res = CPrice::GetBasePrice(array_keys($arTorPred)[0]);
                $arTorPreds = CCatalogSKU::getOffersList($arItem['ID'], 0, array('ACTIVE' => 'Y'), array('NAME'), array("CODE"=>array('HEIGHT', 'WIDTH')));
                foreach ($arTorPreds as $arTorPred){
                    $url = '/catalog/?action=ADD2BASKET&amp;id='.array_keys($arTorPred)[0];
                }
            }
            ?>
            <div class="special-offer-block__item">
                <a href="<?=$arItem['DETAIL_PAGE_URL']?>"><img src="<?=CFile::GetPath($arItem['PREVIEW_PICTURE']['ID'])?>" alt=""></a>
                <a href="<?=$arItem['DETAIL_PAGE_URL']?>"><div class="special-offer-block__item__title"><?=$arItem['NAME']?></div></a>
                <div class="special-offer-block__item__desc"><?=strip_tags($description, "")?></div>
                <div class="special-offer-block__item__prices">
                    <div class="special-offer-block__item__price"><?=$ar_res['PRICE']?>₽</div>
                        <!--div class="special-offer-block__item__old-price">7980 ₽</div-->
                    <a href="<?=$url?>"><div class="pop-products-block__item-cart"></div></a>
                </div>
            </div>

        <?endforeach;?>

    </div>
</div>