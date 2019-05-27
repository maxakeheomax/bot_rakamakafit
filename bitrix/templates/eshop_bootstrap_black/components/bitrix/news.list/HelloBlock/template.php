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

<div class="hello-block">
    <div class="hello-block__content">
        <div class="hello-block__content__hello">
            <div class="hello-block__content__hello__img">
                <img src="<?= SITE_TEMPLATE_PATH ?>/assets/hello-img.jpg" alt="">
            </div>

            <div class="hello-block__content__hello__desc">
                <div class="hello-block__content__hello__desc__title">
                    <p class="hello-block__content__hello__desc__title__main">Привет! Меня зовут Настя, я рада нашему знакомству!</p>
                </div>
                <div class="hello-block__content__hello__text">
                    <p>Хм..тут надо сказать пару слов о себе, да? Тогда начну с того, что по первому образованию я журналист. Второе образование –колледж фитнеса и бодибилдинга им. Бена Вейдера по специальности тренер и нутрициолог.

                        После рождения дочки я, как большинство девушек, мечтала скорее прийти в форму, но возможности ходить в тренажерный зал не было. Эффективно заниматься дома без громоздкого и дорогостоящего «железа» мне помогли эспандеры.

                        Спустя некоторое время я начала вести свой блог в Instagram, в котором рассказывала, как прийти в форму не выходя из дома, провела более 6 бесплатных марафонов трансформации тела, выпустила свое фирменное оборудование – яркие фитнес ленты и эспандеры RAKAMAKAFIT. Меня мотивирует любовь к своему делу и ваши потрясающие результаты!

                        В программу тренировок и питания RAKAMAKAFIT ONLINE я вложила всю свою душу и знания! Буду рада видеть тебя в своей команде спортивных и жизнерадостных!</p>
                    <div class="hello-block__content__hello__text__link-wrapper">
                        <a class="hello-block__content__hello__text__link" href="#" class="link">Читай мой блог в <span class="underline-block">инстаграмме</span></a>
                        <img src="<?= SITE_TEMPLATE_PATH ?>/assets/hello-block-inst.svg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>