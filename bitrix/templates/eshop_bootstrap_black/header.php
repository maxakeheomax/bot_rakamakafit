<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile($_SERVER["DOCUMENT_ROOT"]."/bitrix/templates/".SITE_TEMPLATE_ID."/header.php");
CJSCore::Init(array("fx"));
$curPage = $APPLICATION->GetCurPage(true);
$theme = COption::GetOptionString("main", "wizard_eshop_bootstrap_theme_id", "blue", SITE_ID);
global $arParams;
if (!CModule::IncludeModule("sale")) return;
require_once($_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php');
?>
<!DOCTYPE html>
<html xml:lang="<?=LANGUAGE_ID?>" lang="<?=LANGUAGE_ID?>">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!-- <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, width=device-width"> -->
    <link rel="shortcut icon" type="image/x-icon" href="<?=htmlspecialcharsbx(SITE_DIR)?>favicon.ico?20" />
    <?$APPLICATION->ShowHead();?>
    
    <?
    //////////////////// CUSTOM CSS
    //  var_dump( !$APPLICATION->GetCurUri("", false)=="/personal/order/make/" );
    
    
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH."/libs/owl.carousel2/dist/assets/owl.carousel.min.css", true);
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH."/libs/owl.carousel2/dist/assets/owl.theme.default.min.css", true);
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH."/libs/slick-1.8.1/slick/slick-theme.css", true);
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH."/libs/slick-1.8.1/slick/slick.css", true);
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH."/libs/all.css", true);
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH."/libs/ion.rangeSlider-master/css/ion.rangeSlider.min.css", true);
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH."/mobile.css", true);
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH."/libs/bootstrap-4.3.1-dist/css/bootstrap-grid.min.css", true);
?>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

<?  //////////////////// CUSTOM JS
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/libs/jquery.min.js");
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/libs/owl.carousel2/dist/owl.carousel.min.js");
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/libs/slick-1.8.1/slick/slick.min.js");
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/libs/hc-sticky-master/docs/hc-sticky.js");
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/libs/ion.rangeSlider-master/js/ion.rangeSlider.min.js");
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/libs/bootstrap-4.3.1-dist/js/bootstrap.min.js");

    ?>
    <title><?$APPLICATION->ShowTitle()?></title>
</head>
<body class="bx-background-image bx-theme-<?=$theme?>" <?=$APPLICATION->ShowProperty("backgroundImage")?>>
	<!-- popUp-gift-block -->
	<div class="popUp popUp-gift hidden-block">
		<div class="blur-block"></div>	
		<div class="wrapper-block">

			<div class="popUp-gift__form-block">
				<div class="close-button"></div>
				<div class="promo-form-block__title">Не уходи без подарка!</div>
				<div class="popUp-gift__form-block_desc">Я хочу подарить тебе книжку с рецептами очень вкусных десертов, которые совершенно не повредят твоей фигуре!</div>
				<form class="" action="/forms_ajax.php" method="post">
                    <input type="hidden" name="action" value="popup">
                    <input type="hidden" name="url" value="<?=$APPLICATION->GetCurPage();?>">
					<div class="">
						<label >
							<input name="email" class="promo-form-block__form__input" type="email" required pattern="\S+@[a-z]+.[a-z]+" placeholder='Email'>
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
		</div>
    </div>
    
    <div class="popUp pickup_map-popUp hidden-block" id="popUp_pvz">
        <div class="blur-block"></div>
        <div class="wrapper-block">
            <div class="close-button"></div>
                <!-- <div class="left-side">
                    <div class="img-block"></div>
                </div> -->
            <div class="right-side">
                <div class="map-block" id="map" style="background:red;">
                </div>
            </div>
        </div>
    </div>


	<script>
		// $(document).ready(function(){
		// 	 function ShowPopUp(delay_time){setInterval(function(){
		// 		if($('.popUp').css('display') == 'block'){
		// 			return false
		// 		}else{						
		// 			$('body').css('overflow-y','hidden');
		// 			$('.page_content, .page_wrapper').css('filter', 'blur(10px)');
		// 			$('.popUp').fadeIn();
		// 		}
		// 	}, delay_time);
		// 	}

        //     // ShowPopUp(15000);

		// 	$('.close-button').click(function(){
		// 		$('body').css('overflow-y','inherit');
		// 		$('.page_content, .page_wrapper').css('filter', 'none')
		// 		$('.popUp').fadeOut();
		// 	});
		// });

	</script>
	<!-- end of popUp-gift-block -->
<div id="panel"><?$APPLICATION->ShowPanel();?></div>
<?$APPLICATION->IncludeComponent("bitrix:eshop.banner", "", array());?>
<div class="bx-wrapper" id="bx_eshop_wrap">
    <div class="page_wrapper">
        <div class="page_content">
            <header class="header">
                <nav class="header__nav-bar">
                    <div class="header__nav-bar__logo">
                        <a href="/">
                            <img src="<?= SITE_TEMPLATE_PATH ?>/assets/logo-svg.svg" alt="logo" class="header__nav-bar__logo-img">
                        </a>
                    </div>
                    <div class="header__nav-bar-block">
                        <ul class="header__nav-bar__navs">
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:menu",
                            "top_menu",
                            Array(
                                "ROOT_MENU_TYPE" => "top", 
                                "CHILD_MENU_TYPE" => "left",
                                "MAX_LEVEL" => "3", 
                                "USE_EXT" => "Y" 
                            )
                        );?>
                    </div>
                     <? if($USER->IsAuthorized()): ?>
                     <a href="/personal/"><div class="header__nav-bar__login-button no_js">
                            <span class="header__nav-bar__login-button__text">Личный кабинет</span>
                        </div> </a>
                    <? else:?>
                        <a href="#"><div class="header__nav-bar__login-button">
                            <span class="header__nav-bar__login-button__text">Войти</span>
                        </div></a>                           
                    <?endif;?>
                </nav>	
                <nav class="header__inner-nav-bar">
                    <div class="header__inner-nav-bar-block">                        
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:menu",
                            "equipment_menu",
                            Array(
                                "ROOT_MENU_TYPE" => "subtop", 
                                //"CHILD_MENU_TYPE" => "left",
                                "MAX_LEVEL" => "3", 
                                "USE_EXT" => "Y" 
                            )
                        );?>
                    </div>

                    <?
                    $basket = \Bitrix\Sale\Basket::loadItemsForFUser(
                        \Bitrix\Sale\Fuser::getId(),
                        \Bitrix\Main\Context::getCurrent()->getSite()
                    );
                    $basketQntList = $basket->getQuantityList();
                    $cnt = 0;
                    foreach ($basketQntList as $val) {
                        $cnt += $val;
                    }
                   
                    ?>

                    <div class="header__nav-bar__cart-block">
                        <a href="/personal/cart/" class="header__nav-bar__cart-block-link">	
                            <img src="<?= SITE_TEMPLATE_PATH ?>/assets/cart.svg" alt="" class="header__nav-bar__cart-block__cart-icon">
                            <span class="header__nav-bar__cart-block__cart-text">Корзина <span><?=$cnt > 0? "(".$cnt.")" : ''?></span></span>
                            <span class="header__nav-bar__cart-block__items-counter"><?= $arResult['NUM_PRODUCTS'] > 0 ? $arResult['NUM_PRODUCTS'] : "" ?></span>
                        </a>
                    </div>                        
                </nav>
            </header>

            <header class="header-mobile">
                <div class="header__nav-bar__logo">
                    <a href="/">
                        <img src="<?= SITE_TEMPLATE_PATH ?>/assets/logo-svg.svg" alt="logo" class="header__nav-bar__logo-img">
                    </a>
                </div>
                <div class="header-right-side">
                    <div class="burger-menu header-right-side-item button-form-grey">меню <span class="burger-menu-icon"></span></div>
                    <div class="cart-mobile header-right-side-item button-form-grey">
                        <a href="/personal/cart/"><img src="<?= SITE_TEMPLATE_PATH ?>/assets/white-cart.svg" alt=""></a>
                    </div>
                    <div class="login-block header-right-side-item button-form-grey">
                        <a href="/personal"><img src="<?= SITE_TEMPLATE_PATH ?>/assets/white-login.svg" alt=""></a>
                    </div>
                </div>
            </header>
            <? if (!defined("HIDE_SIDEBAR")) : ?>
            <div class="aside-block" >
                <div class="aside-block__content">
                    <? CModule::IncludeModule("iblock");
                       $time = CIBlockElement::GetByID(749)->Fet;?>
                    <p class="aside-block__content__header"><?=$time['NAME']?></p>
                    <p class="aside-block__content__text"><?=$time['PREVIEW_TEXT']?></p>

                </div>
                <div class="aside-block__shedule">
                    <p class="aside-block__shedule-text">График работы</p>
                    <img src="<?= SITE_TEMPLATE_PATH ?>/assets/calendar.svg" alt="calendar" class="aside-block__shedule-logo">
                    <div class="hide-button"></div>
                </div>
              

                <!-- <div class="aside-block__icons"> -->
                    <!-- <a target="_blank" href="https://vk.com/rakamakafit" class="aside-block__icons_link"><img src="<?= SITE_TEMPLATE_PATH ?>/assets/vk.svg" alt="" class="aside-block__icons-item"></a> -->
                    <!-- <a target="_blank" href="https://www.youtube.com/channel/UCVZQTeZTLrz166tbN0bEGkg?sub_confirmation=1" class="aside-block__icons_link"><img src="<?= SITE_TEMPLATE_PATH ?>/assets/ytb.svg" alt="" class="aside-block__icons-item"></a> -->
                    <!-- <a target="_blank" href="https://www.instagram.com/rakamaka.fit/" class="aside-block__icons_link"><img src="<?= SITE_TEMPLATE_PATH ?>/assets/inst.svg" alt="" class="aside-block__icons-item"></a> -->
                <!-- </div> -->
            </div>
            <? endif ?>
