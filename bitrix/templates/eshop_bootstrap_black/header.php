<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile($_SERVER["DOCUMENT_ROOT"]."/bitrix/templates/".SITE_TEMPLATE_ID."/header.php");
CJSCore::Init(array("fx"));
$curPage = $APPLICATION->GetCurPage(true);
$theme = COption::GetOptionString("main", "wizard_eshop_bootstrap_theme_id", "blue", SITE_ID);
global $arParams;
?>
<!DOCTYPE html>
<html xml:lang="<?=LANGUAGE_ID?>" lang="<?=LANGUAGE_ID?>">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, width=device-width">
    <link rel="shortcut icon" type="image/x-icon" href="<?=htmlspecialcharsbx(SITE_DIR)?>favicon.ico" />
    <?$APPLICATION->ShowHead();?>
    
    <?
    //////////////////// CUSTOM CSS
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH."/libs/owl.carousel2/dist/assets/owl.carousel.min.css", true);
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH."/libs/owl.carousel2/dist/assets/owl.theme.default.min.css", true);
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH."/libs/slick-1.8.1/slick/slick-theme.css", true);
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH."/libs/slick-1.8.1/slick/slick.css", true);
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH."/libs/all.css", true);
    //////////////////// CUSTOM JS
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/libs/jquery.min.js");
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/libs/owl.carousel2/dist/owl.carousel.min.js");
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/libs/slick-1.8.1/slick/slick.min.js");

    ?>
    <title><?$APPLICATION->ShowTitle()?></title>
</head>
<body class="bx-background-image bx-theme-<?=$theme?>" <?=$APPLICATION->ShowProperty("backgroundImage")?>>
<div id="panel"><?$APPLICATION->ShowPanel();?></div>
<?$APPLICATION->IncludeComponent("bitrix:eshop.banner", "", array());?>
<div class="bx-wrapper" id="bx_eshop_wrap">
    <div class="page_wrapper">
        <div class="page_content">
            <header class="header">
                <nav class="header__nav-bar">
                    <div class="header__nav-bar__logo">
                        <a href="/">
                            <img src="<?= SITE_TEMPLATE_PATH ?>/assets/logo.png" alt="logo" class="header__nav-bar__logo-img">
                        </a>
                    </div>
                    <div class="header__nav-bar-block">
                        <ul class="header__nav-bar__navs">
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:menu",
                            "top_menu",
                            Array(
                                "ROOT_MENU_TYPE" => "top", 
                                "MAX_LEVEL" => "3", 
                                "CHILD_MENU_TYPE" => "left", 
                                "USE_EXT" => "Y" 
                            )
                        );?>
                    </div>
                    <div class="header__nav-bar__login-button">
                        <span class="header__nav-bar__login-button__text">
                        
                        <? if($USER->IsAuthorized()): ?>
                            <a href="/personal/"> Личный кабинет </a>
                        <? else:?>
                            <a href="/login/?login=yes&backurl=<?= $APPLICATION->GetCurUri() ?>"> Вход </a>
                        <?endif;?>
                       
                        </span>
                    </div>
                </nav>	
                <nav class="header__inner-nav-bar">
                    <div class="header__inner-nav-bar-block">
                        <ul class="header__inner-nav-bar__navs header__inner-nav-bar__navs--black-text">
                            <li class="header__inner-nav-bar__navs-item"><a href="#" class="header__inner-nav-bar__navs-item__link inner-nav-bar__navs-item__link--active">Все товары</a></li>
                            <li class="header__inner-nav-bar__navs-item"><a href="#" class="header__inner-nav-bar__navs-item__link">Фитнес ленты</a></li>
                            <li class="header__inner-nav-bar__navs-item"><a href="#" class="header__inner-nav-bar__navs-item__link">Фитбол</a></li>
                            <li class="header__inner-nav-bar__navs-item"><a href="#" class="header__inner-nav-bar__navs-item__link">Наборы</a></li>
                            <li class="header__inner-nav-bar__navs-item"><a href="#" class="header__inner-nav-bar__navs-item__link">Питание</a></li>
                            <li class="header__inner-nav-bar__navs-item"><a href="#" class="header__inner-nav-bar__navs-item__link">Дневник тренировок</a></li>
                        </ul>			
                    </div>
                    <div class="header__nav-bar__cart-block">
                        <a href="/personal/cart/" class="header__nav-bar__cart-block-link">	
                            <img src="<?= SITE_TEMPLATE_PATH ?>/assets/cart.svg" alt="" class="header__nav-bar__cart-block__cart-icon">
                            <span class="header__nav-bar__cart-block__cart-text">Корзина</span>
                            <span class="header__nav-bar__cart-block__items-counter"><?= $arResult['NUM_PRODUCTS'] > 0 ? $arResult['NUM_PRODUCTS'] : "" ?></span>
                        </a>
                    </div>                        
                </nav>
            </header>
  
            <div class="aside-block">
                <div class="aside-block__shedule">
                    <p class="aside-block__shedule-text">График работы</p>
                    <img src="<?= SITE_TEMPLATE_PATH ?>/assets/calendar.svg" alt="calendar" class="aside-block__shedule-logo">
                </div>
                <div class="aside-block__icons">
                    <a href="#" class="aside-block__icons_link"><img src="<?= SITE_TEMPLATE_PATH ?>/assets/vk.svg" alt="" class="aside-block__icons-item"></a>
                    <a href="#" class="aside-block__icons_link"><img src="<?= SITE_TEMPLATE_PATH ?>/assets/ytb.svg" alt="" class="aside-block__icons-item"></a>
                    <a href="#" class="aside-block__icons_link"><img src="<?= SITE_TEMPLATE_PATH ?>/assets/inst.svg" alt="" class="aside-block__icons-item"></a>
                </div>
            </div>
