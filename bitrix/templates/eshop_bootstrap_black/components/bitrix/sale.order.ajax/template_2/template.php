<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main,
	Bitrix\Main\Localization\Loc;

/**
 * @var array $arParams
 * @var array $arResult
 * @var CMain $APPLICATION
 * @var CUser $USER
 * @var SaleOrderAjax $component
 * @var string $templateFolder
 */

$context = Main\Application::getInstance()->getContext();
$request = $context->getRequest();

if (empty($arParams['TEMPLATE_THEME']))
{
	$arParams['TEMPLATE_THEME'] = Main\ModuleManager::isModuleInstalled('bitrix.eshop') ? 'site' : 'blue';
}

if ($arParams['TEMPLATE_THEME'] === 'site')
{
	$templateId = Main\Config\Option::get('main', 'wizard_template_id', 'eshop_bootstrap', $component->getSiteId());
	$templateId = preg_match('/^eshop_adapt/', $templateId) ? 'eshop_adapt' : $templateId;
	$arParams['TEMPLATE_THEME'] = Main\Config\Option::get('main', 'wizard_'.$templateId.'_theme_id', 'blue', $component->getSiteId());
}

if (!empty($arParams['TEMPLATE_THEME']))
{
	if (!is_file(Main\Application::getDocumentRoot().'/bitrix/css/main/themes/'.$arParams['TEMPLATE_THEME'].'/style.css'))
	{
		$arParams['TEMPLATE_THEME'] = 'blue';
	}
}

$arParams['ALLOW_USER_PROFILES'] = $arParams['ALLOW_USER_PROFILES'] === 'Y' ? 'Y' : 'N';
$arParams['SKIP_USELESS_BLOCK'] = $arParams['SKIP_USELESS_BLOCK'] === 'N' ? 'N' : 'Y';

if (!isset($arParams['SHOW_ORDER_BUTTON']))
{
	$arParams['SHOW_ORDER_BUTTON'] = 'final_step';
}

$arParams['HIDE_ORDER_DESCRIPTION'] = isset($arParams['HIDE_ORDER_DESCRIPTION']) && $arParams['HIDE_ORDER_DESCRIPTION'] === 'Y' ? 'Y' : 'N';
$arParams['SHOW_TOTAL_ORDER_BUTTON'] = $arParams['SHOW_TOTAL_ORDER_BUTTON'] === 'Y' ? 'Y' : 'N';
$arParams['SHOW_PAY_SYSTEM_LIST_NAMES'] = $arParams['SHOW_PAY_SYSTEM_LIST_NAMES'] === 'N' ? 'N' : 'Y';
$arParams['SHOW_PAY_SYSTEM_INFO_NAME'] = $arParams['SHOW_PAY_SYSTEM_INFO_NAME'] === 'N' ? 'N' : 'Y';
$arParams['SHOW_DELIVERY_LIST_NAMES'] = $arParams['SHOW_DELIVERY_LIST_NAMES'] === 'N' ? 'N' : 'Y';
$arParams['SHOW_DELIVERY_INFO_NAME'] = $arParams['SHOW_DELIVERY_INFO_NAME'] === 'N' ? 'N' : 'Y';
$arParams['SHOW_DELIVERY_PARENT_NAMES'] = $arParams['SHOW_DELIVERY_PARENT_NAMES'] === 'N' ? 'N' : 'Y';
$arParams['SHOW_STORES_IMAGES'] = $arParams['SHOW_STORES_IMAGES'] === 'N' ? 'N' : 'Y';

if (!isset($arParams['BASKET_POSITION']) || !in_array($arParams['BASKET_POSITION'], array('before', 'after')))
{
	$arParams['BASKET_POSITION'] = 'after';
}

$arParams['EMPTY_BASKET_HINT_PATH'] = isset($arParams['EMPTY_BASKET_HINT_PATH']) ? (string)$arParams['EMPTY_BASKET_HINT_PATH'] : '/';
$arParams['SHOW_BASKET_HEADERS'] = $arParams['SHOW_BASKET_HEADERS'] === 'Y' ? 'Y' : 'N';
$arParams['HIDE_DETAIL_PAGE_URL'] = isset($arParams['HIDE_DETAIL_PAGE_URL']) && $arParams['HIDE_DETAIL_PAGE_URL'] === 'Y' ? 'Y' : 'N';
$arParams['DELIVERY_FADE_EXTRA_SERVICES'] = $arParams['DELIVERY_FADE_EXTRA_SERVICES'] === 'Y' ? 'Y' : 'N';
$arParams['SHOW_COUPONS_BASKET'] = $arParams['SHOW_COUPONS_BASKET'] === 'N' ? 'N' : 'Y';
$arParams['SHOW_COUPONS_DELIVERY'] = $arParams['SHOW_COUPONS_DELIVERY'] === 'N' ? 'N' : 'Y';
$arParams['SHOW_COUPONS_PAY_SYSTEM'] = $arParams['SHOW_COUPONS_PAY_SYSTEM'] === 'Y' ? 'Y' : 'N';
$arParams['SHOW_NEAREST_PICKUP'] = $arParams['SHOW_NEAREST_PICKUP'] === 'Y' ? 'Y' : 'N';
$arParams['DELIVERIES_PER_PAGE'] = isset($arParams['DELIVERIES_PER_PAGE']) ? intval($arParams['DELIVERIES_PER_PAGE']) : 9;
$arParams['PAY_SYSTEMS_PER_PAGE'] = isset($arParams['PAY_SYSTEMS_PER_PAGE']) ? intval($arParams['PAY_SYSTEMS_PER_PAGE']) : 9;
$arParams['PICKUPS_PER_PAGE'] = isset($arParams['PICKUPS_PER_PAGE']) ? intval($arParams['PICKUPS_PER_PAGE']) : 5;
$arParams['SHOW_PICKUP_MAP'] = $arParams['SHOW_PICKUP_MAP'] === 'N' ? 'N' : 'Y';
$arParams['SHOW_MAP_IN_PROPS'] = $arParams['SHOW_MAP_IN_PROPS'] === 'Y' ? 'Y' : 'N';
$arParams['USE_YM_GOALS'] = $arParams['USE_YM_GOALS'] === 'Y' ? 'Y' : 'N';
$arParams['USE_ENHANCED_ECOMMERCE'] = isset($arParams['USE_ENHANCED_ECOMMERCE']) && $arParams['USE_ENHANCED_ECOMMERCE'] === 'Y' ? 'Y' : 'N';
$arParams['DATA_LAYER_NAME'] = isset($arParams['DATA_LAYER_NAME']) ? trim($arParams['DATA_LAYER_NAME']) : 'dataLayer';
$arParams['BRAND_PROPERTY'] = isset($arParams['BRAND_PROPERTY']) ? trim($arParams['BRAND_PROPERTY']) : '';

$useDefaultMessages = !isset($arParams['USE_CUSTOM_MAIN_MESSAGES']) || $arParams['USE_CUSTOM_MAIN_MESSAGES'] != 'Y';

if ($useDefaultMessages || !isset($arParams['MESS_AUTH_BLOCK_NAME']))
{
	$arParams['MESS_AUTH_BLOCK_NAME'] = Loc::getMessage('AUTH_BLOCK_NAME_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_REG_BLOCK_NAME']))
{
	$arParams['MESS_REG_BLOCK_NAME'] = Loc::getMessage('REG_BLOCK_NAME_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_BASKET_BLOCK_NAME']))
{
	$arParams['MESS_BASKET_BLOCK_NAME'] = Loc::getMessage('BASKET_BLOCK_NAME_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_REGION_BLOCK_NAME']))
{
	$arParams['MESS_REGION_BLOCK_NAME'] = Loc::getMessage('REGION_BLOCK_NAME_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_PAYMENT_BLOCK_NAME']))
{
	$arParams['MESS_PAYMENT_BLOCK_NAME'] = Loc::getMessage('PAYMENT_BLOCK_NAME_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_DELIVERY_BLOCK_NAME']))
{
	$arParams['MESS_DELIVERY_BLOCK_NAME'] = Loc::getMessage('DELIVERY_BLOCK_NAME_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_BUYER_BLOCK_NAME']))
{
	$arParams['MESS_BUYER_BLOCK_NAME'] = Loc::getMessage('BUYER_BLOCK_NAME_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_BACK']))
{
	$arParams['MESS_BACK'] = Loc::getMessage('BACK_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_FURTHER']))
{
	$arParams['MESS_FURTHER'] = Loc::getMessage('FURTHER_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_EDIT']))
{
	$arParams['MESS_EDIT'] = Loc::getMessage('EDIT_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_ORDER']))
{
	$arParams['MESS_ORDER'] = $arParams['~MESS_ORDER'] = Loc::getMessage('ORDER_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_PRICE']))
{
	$arParams['MESS_PRICE'] = Loc::getMessage('PRICE_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_PERIOD']))
{
	$arParams['MESS_PERIOD'] = Loc::getMessage('PERIOD_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_NAV_BACK']))
{
	$arParams['MESS_NAV_BACK'] = Loc::getMessage('NAV_BACK_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_NAV_FORWARD']))
{
	$arParams['MESS_NAV_FORWARD'] = Loc::getMessage('NAV_FORWARD_DEFAULT');
}

$useDefaultMessages = !isset($arParams['USE_CUSTOM_ADDITIONAL_MESSAGES']) || $arParams['USE_CUSTOM_ADDITIONAL_MESSAGES'] != 'Y';

if ($useDefaultMessages || !isset($arParams['MESS_PRICE_FREE']))
{
	$arParams['MESS_PRICE_FREE'] = Loc::getMessage('PRICE_FREE_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_ECONOMY']))
{
	$arParams['MESS_ECONOMY'] = Loc::getMessage('ECONOMY_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_REGISTRATION_REFERENCE']))
{
	$arParams['MESS_REGISTRATION_REFERENCE'] = Loc::getMessage('REGISTRATION_REFERENCE_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_AUTH_REFERENCE_1']))
{
	$arParams['MESS_AUTH_REFERENCE_1'] = Loc::getMessage('AUTH_REFERENCE_1_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_AUTH_REFERENCE_2']))
{
	$arParams['MESS_AUTH_REFERENCE_2'] = Loc::getMessage('AUTH_REFERENCE_2_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_AUTH_REFERENCE_3']))
{
	$arParams['MESS_AUTH_REFERENCE_3'] = Loc::getMessage('AUTH_REFERENCE_3_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_ADDITIONAL_PROPS']))
{
	$arParams['MESS_ADDITIONAL_PROPS'] = Loc::getMessage('ADDITIONAL_PROPS_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_USE_COUPON']))
{
	$arParams['MESS_USE_COUPON'] = Loc::getMessage('USE_COUPON_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_COUPON']))
{
	$arParams['MESS_COUPON'] = Loc::getMessage('COUPON_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_PERSON_TYPE']))
{
	$arParams['MESS_PERSON_TYPE'] = Loc::getMessage('PERSON_TYPE_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_SELECT_PROFILE']))
{
	$arParams['MESS_SELECT_PROFILE'] = Loc::getMessage('SELECT_PROFILE_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_REGION_REFERENCE']))
{
	$arParams['MESS_REGION_REFERENCE'] = Loc::getMessage('REGION_REFERENCE_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_PICKUP_LIST']))
{
	$arParams['MESS_PICKUP_LIST'] = Loc::getMessage('PICKUP_LIST_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_NEAREST_PICKUP_LIST']))
{
	$arParams['MESS_NEAREST_PICKUP_LIST'] = Loc::getMessage('NEAREST_PICKUP_LIST_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_SELECT_PICKUP']))
{
	$arParams['MESS_SELECT_PICKUP'] = Loc::getMessage('SELECT_PICKUP_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_INNER_PS_BALANCE']))
{
	$arParams['MESS_INNER_PS_BALANCE'] = Loc::getMessage('INNER_PS_BALANCE_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_ORDER_DESC']))
{
	$arParams['MESS_ORDER_DESC'] = Loc::getMessage('ORDER_DESC_DEFAULT');
}

$useDefaultMessages = !isset($arParams['USE_CUSTOM_ERROR_MESSAGES']) || $arParams['USE_CUSTOM_ERROR_MESSAGES'] != 'Y';

if ($useDefaultMessages || !isset($arParams['MESS_PRELOAD_ORDER_TITLE']))
{
	$arParams['MESS_PRELOAD_ORDER_TITLE'] = Loc::getMessage('PRELOAD_ORDER_TITLE_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_SUCCESS_PRELOAD_TEXT']))
{
	$arParams['MESS_SUCCESS_PRELOAD_TEXT'] = Loc::getMessage('SUCCESS_PRELOAD_TEXT_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_FAIL_PRELOAD_TEXT']))
{
	$arParams['MESS_FAIL_PRELOAD_TEXT'] = Loc::getMessage('FAIL_PRELOAD_TEXT_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_DELIVERY_CALC_ERROR_TITLE']))
{
	$arParams['MESS_DELIVERY_CALC_ERROR_TITLE'] = Loc::getMessage('DELIVERY_CALC_ERROR_TITLE_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_DELIVERY_CALC_ERROR_TEXT']))
{
	$arParams['MESS_DELIVERY_CALC_ERROR_TEXT'] = Loc::getMessage('DELIVERY_CALC_ERROR_TEXT_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_PAY_SYSTEM_PAYABLE_ERROR']))
{
	$arParams['MESS_PAY_SYSTEM_PAYABLE_ERROR'] = Loc::getMessage('PAY_SYSTEM_PAYABLE_ERROR_DEFAULT');
}

$scheme = $request->isHttps() ? 'https' : 'http';

switch (LANGUAGE_ID)
{
	case 'ru':
		$locale = 'ru-RU'; break;
	case 'ua':
		$locale = 'ru-UA'; break;
	case 'tk':
		$locale = 'tr-TR'; break;
	default:
		$locale = 'en-US'; break;
}

$this->addExternalCss('/bitrix/css/main/bootstrap.css');
$APPLICATION->SetAdditionalCSS('/bitrix/css/main/themes/'.$arParams['TEMPLATE_THEME'].'/style.css', true);
$APPLICATION->SetAdditionalCSS($templateFolder.'/style.css', true);
$this->addExternalJs($templateFolder.'/order_ajax.js');
\Bitrix\Sale\PropertyValueCollection::initJs();
$this->addExternalJs($templateFolder.'/script.js');
?>
	<NOSCRIPT>
		<div style="color:red"><?=Loc::getMessage('SOA_NO_JS')?></div>
	</NOSCRIPT>
<?

if (strlen($request->get('ORDER_ID')) > 0)
{
	include(Main\Application::getDocumentRoot().$templateFolder.'/confirm.php');
}
elseif ($arParams['DISABLE_BASKET_REDIRECT'] === 'Y' && $arResult['SHOW_EMPTY_BASKET'])
{
	include(Main\Application::getDocumentRoot().$templateFolder.'/empty.php');
}
else
{
	$hideDelivery = empty($arResult['DELIVERY']);
	?>
<div class="page_content bg-lightgray">
	<?$APPLICATION->IncludeComponent(
		"bitrix:breadcrumb",
		"",
		Array(
			"PATH" => "",
			"SITE_ID" => SITE_ID,
			"START_FROM" => 0
		)
	);?>


	<form style="display:none" action="<?=POST_FORM_ACTION_URI?>" method="POST" name="ORDER_FORM1" id="bx-soa-order-form" enctype="multipart/form-data">
		<?
		echo bitrix_sessid_post();

		if (strlen($arResult['PREPAY_ADIT_FIELDS']) > 0)
		{
			echo $arResult['PREPAY_ADIT_FIELDS'];
		}
		?>
		<input type="hidden" name="<?=$arParams['ACTION_VARIABLE']?>" value="saveOrderAjax">
		<input type="hidden" name="location_type" value="code">
		<input type="hidden" name="BUYER_STORE" id="BUYER_STORE" value="<?=$arResult['BUYER_STORE']?>">
		<div id="bx-soa-order" class="row bx-<?=$arParams['TEMPLATE_THEME']?>" style="opacity: 0">
			<!--	MAIN BLOCK	-->
			<div class="col-sm-9 bx-soa">
				<div id="bx-soa-main-notifications">
					<div class="alert alert-danger" style="display:none"></div>
					<div data-type="informer" style="display:none"></div>
				</div>
				<!--	AUTH BLOCK	-->
				<div id="bx-soa-auth" class="bx-soa-section bx-soa-auth" style="display:none">
					<div class="bx-soa-section-title-container">
						<h2 class="bx-soa-section-title col-sm-9">
							<span class="bx-soa-section-title-count"></span><?=$arParams['MESS_AUTH_BLOCK_NAME']?>
						</h2>
					</div>
					<div class="bx-soa-section-content container-fluid"></div>
				</div>

				<!--	DUPLICATE MOBILE ORDER SAVE BLOCK	-->
				<div id="bx-soa-total-mobile" style="margin-bottom: 6px;"></div>

				<!--	REGION BLOCK	-->
				<div id="bx-soa-region" data-visited="false" class="bx-soa-section bx-active">
					<div class="bx-soa-section-title-container">
						<h2 class="bx-soa-section-title col-sm-9">
							<span class="bx-soa-section-title-count"></span><?=$arParams['MESS_REGION_BLOCK_NAME']?>
						</h2>
						<div class="col-xs-12 col-sm-3 text-right"><a href="" class="bx-soa-editstep"><?=$arParams['MESS_EDIT']?></a></div>
					</div>
					<div class="bx-soa-section-content container-fluid"></div>
				</div>

				<? if ($arParams['BASKET_POSITION'] === 'before'): ?>
					<!--	BASKET ITEMS BLOCK	-->
					<div id="bx-soa-basket" data-visited="false" class="bx-soa-section bx-active">
						<div class="bx-soa-section-title-container">
							<h2 class="bx-soa-section-title col-sm-9">
								<span class="bx-soa-section-title-count"></span><?=$arParams['MESS_BASKET_BLOCK_NAME']?>
							</h2>
							<div class="col-xs-12 col-sm-3 text-right"><a href="javascript:void(0)" class="bx-soa-editstep"><?=$arParams['MESS_EDIT']?></a></div>
						</div>
						<div class="bx-soa-section-content container-fluid"></div>
					</div>
				<? endif ?>

				

				<? if ($arParams['DELIVERY_TO_PAYSYSTEM'] === 'p2d'): ?>
					<!--	PAY SYSTEMS BLOCK	-->
					<div id="bx-soa-paysystem" data-visited="false" class="bx-soa-section bx-active">
						<div class="bx-soa-section-title-container">
							<h2 class="bx-soa-section-title col-sm-9">
								<span class="bx-soa-section-title-count"></span><?=$arParams['MESS_PAYMENT_BLOCK_NAME']?>
							</h2>
							<div class="col-xs-12 col-sm-3 text-right"><a href="" class="bx-soa-editstep"><?=$arParams['MESS_EDIT']?></a></div>
						</div>
						<div class="bx-soa-section-content container-fluid"></div>
					</div>
					<!--	DELIVERY BLOCK	-->
					<div id="bx-soa-delivery" data-visited="false" class="bx-soa-section bx-active" <?=($hideDelivery ? 'style="display:none"' : '')?>>
						<div class="bx-soa-section-title-container">
							<h2 class="bx-soa-section-title col-sm-9">
								<span class="bx-soa-section-title-count"></span><?=$arParams['MESS_DELIVERY_BLOCK_NAME']?>
							</h2>
							<div class="col-xs-12 col-sm-3 text-right"><a href="" class="bx-soa-editstep"><?=$arParams['MESS_EDIT']?></a></div>
						</div>
						<div class="bx-soa-section-content container-fluid"></div>
					</div>
					<!--	PICKUP BLOCK	-->
					<div id="bx-soa-pickup" data-visited="false" class="bx-soa-section" style="display:none">
						<div class="bx-soa-section-title-container">
							<h2 class="bx-soa-section-title col-sm-9">
								<span class="bx-soa-section-title-count"></span>
							</h2>
							<div class="col-xs-12 col-sm-3 text-right"><a href="" class="bx-soa-editstep"><?=$arParams['MESS_EDIT']?></a></div>
						</div>
						<div class="bx-soa-section-content container-fluid"></div>
					</div>
				<? else: ?>
					<!--	DELIVERY BLOCK	-->
					<div id="bx-soa-delivery" data-visited="false" class="bx-soa-section bx-active" <?=($hideDelivery ? 'style="display:none"' : '')?>>
						<div class="bx-soa-section-title-container">
							<h2 class="bx-soa-section-title col-sm-9">
								<span class="bx-soa-section-title-count"></span><?=$arParams['MESS_DELIVERY_BLOCK_NAME']?>
							</h2>
							<div class="col-xs-12 col-sm-3 text-right"><a href="" class="bx-soa-editstep"><?=$arParams['MESS_EDIT']?></a></div>
						</div>
						<div class="bx-soa-section-content container-fluid"></div>
					</div>
					<!--	PICKUP BLOCK	-->
					<div id="bx-soa-pickup" data-visited="false" class="bx-soa-section" style="display:none">
						<div class="bx-soa-section-title-container">
							<h2 class="bx-soa-section-title col-sm-9">
								<span class="bx-soa-section-title-count"></span>
							</h2>
							<div class="col-xs-12 col-sm-3 text-right"><a href="" class="bx-soa-editstep"><?=$arParams['MESS_EDIT']?></a></div>
						</div>
						<div class="bx-soa-section-content container-fluid"></div>
					</div>
					<!--	PAY SYSTEMS BLOCK	-->
					<div id="bx-soa-paysystem" data-visited="false" class="bx-soa-section bx-active">
						<div class="bx-soa-section-title-container">
							<h2 class="bx-soa-section-title col-sm-9">
								<span class="bx-soa-section-title-count"></span><?=$arParams['MESS_PAYMENT_BLOCK_NAME']?>
							</h2>
							<div class="col-xs-12 col-sm-3 text-right"><a href="" class="bx-soa-editstep"><?=$arParams['MESS_EDIT']?></a></div>
						</div>
						<div class="bx-soa-section-content container-fluid"></div>
					</div>
				<? endif ?>
				<!--	BUYER PROPS BLOCK	-->
				<div id="bx-soa-properties" data-visited="false" class="bx-soa-section bx-active">
					<div class="bx-soa-section-title-container">
						<h2 class="bx-soa-section-title col-sm-9">
							<span class="bx-soa-section-title-count"></span><?=$arParams['MESS_BUYER_BLOCK_NAME']?>
						</h2>
						<div class="col-xs-12 col-sm-3 text-right"><a href="" class="bx-soa-editstep"><?=$arParams['MESS_EDIT']?></a></div>
					</div>
					<div class="bx-soa-section-content container-fluid"></div>
				</div>

				<? if ($arParams['BASKET_POSITION'] === 'after'): ?>
					<!--	BASKET ITEMS BLOCK	-->
					<div id="bx-soa-basket" data-visited="false" class="bx-soa-section bx-active">
						<div class="bx-soa-section-title-container">
							<h2 class="bx-soa-section-title col-sm-9">
								<span class="bx-soa-section-title-count"></span><?=$arParams['MESS_BASKET_BLOCK_NAME']?>
							</h2>
							<div class="col-xs-12 col-sm-3 text-right"><a href="javascript:void(0)" class="bx-soa-editstep"><?=$arParams['MESS_EDIT']?></a></div>
						</div>
						<div class="bx-soa-section-content container-fluid"></div>
					</div>
				<? endif ?>

				<!--	ORDER SAVE BLOCK	-->
				<div id="bx-soa-orderSave">
					<div class="checkbox">
						<?
						if ($arParams['USER_CONSENT'] === 'Y')
						{
							$APPLICATION->IncludeComponent(
								'bitrix:main.userconsent.request',
								'',
								array(
									'ID' => $arParams['USER_CONSENT_ID'],
									'IS_CHECKED' => $arParams['USER_CONSENT_IS_CHECKED'],
									'IS_LOADED' => $arParams['USER_CONSENT_IS_LOADED'],
									'AUTO_SAVE' => 'N',
									'SUBMIT_EVENT_NAME' => 'bx-soa-order-save',
									'REPLACE' => array(
										'button_caption' => isset($arParams['~MESS_ORDER']) ? $arParams['~MESS_ORDER'] : $arParams['MESS_ORDER'],
										'fields' => $arResult['USER_CONSENT_PROPERTY_DATA']
									)
								)
							);
						}
						?>
					</div>
					<a href="javascript:void(0)" style="margin: 10px 0" class="pull-right btn btn-default btn-lg hidden-xs" data-save-button="true">
						<?=$arParams['MESS_ORDER']?>
					</a>
				</div>

				<div style="display: none;">
					<div id='bx-soa-basket-hidden' class="bx-soa-section"></div>
					<div id='bx-soa-region-hidden' class="bx-soa-section"></div>
					<div id='bx-soa-paysystem-hidden' class="bx-soa-section"></div>
					<div id='bx-soa-delivery-hidden' class="bx-soa-section"></div>
					<div id='bx-soa-pickup-hidden' class="bx-soa-section"></div>
					<div id="bx-soa-properties-hidden" class="bx-soa-section"></div>
					<div id="bx-soa-auth-hidden" class="bx-soa-section">
						<div class="bx-soa-section-content container-fluid reg"></div>
					</div>
				</div>
			</div>

			<!--	SIDEBAR BLOCK	-->
			<div id="bx-soa-total" class="col-sm-3 bx-soa-sidebar">
				<div class="bx-soa-cart-total-ghost"></div>
				<div class="bx-soa-cart-total"></div>
			</div>
		</div>
	</form>
	
	<?//////////////////////////////////////////////////////////////////////////////////////?>

<form action="<?=POST_FORM_ACTION_URI?>" method="POST" name="ORDER_FORM" id="bx-soa-order-form" enctype="multipart/form-data">
	<input type="hidden" name="<?=$arParams['ACTION_VARIABLE']?>" value="saveOrderAjax">
	<input type="hidden" name="location_type" value="code">
	<input type="hidden" name="BUYER_STORE" id="BUYER_STORE" value="<?=$arResult['BUYER_STORE']?>">
	<input type="hidden" name="save" id="" value="yes">
	<input type="hidden" name="sessid" id="" value="<?= trim(bitrix_sessid_get(''), '=') ?>">
	
	<!-- cart block -->
	<div style="display" class="cart-block">	
		<div class="cart-block__title-block">
			<div class="up-hello-block__left-side__title">Оформление заказа</div>
		</div>
		<div class="cart-block__content">
			<div class="cart-block__cart-order-reg-list">
				<div class="cart-block__cart-items-list__item-wrapper list__item-wrapper-product-reg">
					<div class="cart-block__cart-order-reg-item">	
						<div class="cart-block__cart-order-reg-item__title-block">
							<div class="number_title-block">
								<div class="cart-block__cart-order-reg-item__title-block__block-number"><p>1</p></div>
								<div class="cart-block__cart-order-reg-item__title-block__title">Контактные данные</div>
							</div>
							<div class="cart-block__cart-order-reg-item__input-checkbox-wrapper">			
								<input  class="cart-block__cart-order-reg-item__checbox"  type="checkbox" name="" id="cart-block__cart-order-reg-item-checkbox">
								<label for="cart-block__cart-order-reg-item-checkbox">
								<p class="cart-block__cart-order-reg-item__checbox-desc">Заказать как юрлицо</p>
								</label>
							</div>
						</div>

						<div class="form-fields">
							<div class="text-input full-width">
								<input class="text-input__input" type="text" name="ORDER_PROP_1" id="FIO" placeholder=''><label class="text-input__label" for="FIO">Фамилия Имя Отчество</label>
							</div>
							<div class="input-wrapper">
								<div class="text-input">
									<input class="text-input__input" type="email" name="ORDER_PROP_2" id="email" pattern="\S+@[a-z]+.[a-z]+"><label class="text-input__label" for="email">Email</label>
								</div>
								<div class="text-input">
									<input class="text-input__input" type="text" name="ORDER_PROP_3" id="phone"  ><label class="text-input__label" for="phone">Телефон</label>
								</div>								
							</div>
						</div>

					</div>							
				</div>
				
				<div class="cart-block__cart-items-list__item-wrapper list__item-wrapper-product-reg ">
					<div class="cart-block__cart-order-reg-item">	
						<div class="cart-block__cart-order-reg-item__title-block">
							<div class="number_title-block">
								<div class="cart-block__cart-order-reg-item__title-block__block-number"><p>2</p></div>
								<div class="cart-block__cart-order-reg-item__title-block__title">Способ получения</div>
							</div>
						</div>
						<input type="hidden" name="DELIVERY_ID">
						<div  class="full-width-block-list">
							<div id="pickup" class="full-width-block-list-item delivery-select" data-value="3"> 
								<div class="left-side">
									<p class="item-title">Самовывоз</p>
									<p class="item-desc">Бесплатно</p>
								</div>
								<div class="right-side"><p class="item-option" id="popUp_call">Выбрать<br>  адрес получения</p></div> 
							</div>
							<div class="full-width-block-list-item delivery-select" data-value="2">
								<div class="left-side">
									<p class="item-title">Курьерская доставка</p>
									<p class="item-desc">От 1500 Р</p>
								</div>
								<div class="right-side"></div> 
							</div>
							<div class="full-width-block-list-item delivery-select" data-value="20">
								<div class="left-side">
									<p class="item-title">Транспортная компания</p>
									<p class="item-desc">От 350 Р</p>
								</div>
								<div class="right-side"></div> 
							</div>
							<div class="full-width-block-list-item delivery-select" data-value="18">
								<div class="left-side">
									<p class="item-title">Почта России</p>
									<p class="item-desc">В зависимости от адреса</p>
								</div>
								<div class="right-side"></div> 
							</div>
							
							<script>
								$('.delivery-select').click(function(){
									$('input[id="ID_DELIVERY_ID_'+val+'"]').closest('div').click();
									prices();
									var val = $(this).data('value');
									$('input[name="DELIVERY_ID"]').val(val);
								});
							</script>
						</div> 
					</div>							
				</div>
				

				<div id="adress_fields" class="cart-block__cart-items-list__item-wrapper list__item-wrapper-product-reg">
					<div class="cart-block__cart-order-reg-item">	
						<div class="cart-block__cart-order-reg-item__title-block">
							<div class="number_title-block">
								<div class="cart-block__cart-order-reg-item__title-block__block-number"><p>3</p></div>
								<div class="cart-block__cart-order-reg-item__title-block__title">Адрес получения</div>
							</div>
						</div>								
						<div class="form-fields delivery-fields-block">
							<div class="input-wrapper">
								<div class="text-input">
									<label class="cart-block__cart-order-reg-item__input">
										<select placeholder='Страна'>
										<option value="0">Страна</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
									</select>
								</label>
							</div>
							<div class="text-input">
								<label class="cart-block__cart-order-reg-item__input">
									<select placeholder='Город'>
									<option value="0">Город</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
								</select>
							</label>
						</div>

					</div>
					
					<div class="input-wrapper">
						<div class="text-input quarter">
							<input class="text-input__input" type="text" name="street" id="street"  placeholder=''><label class="text-input__label" for="street">Улица</label>
						</div>

						<div class="text-input quarter">
							<input class="text-input__input" type="text" name="" id="building"  placeholder=""><label class="text-input__label" for="building">Дом</label>
						</div>

						<div class="text-input quarter">
							<input class="text-input__input" type="text" name="" id="room"  placeholder=''><label class="text-input__label" for="room">Квартира/офис</label>
						</div>

						<div class="text-input quarter">
							<input class="text-input__input" type="text" name="ORDER_PROP_4" id="post_index"  placeholder=""><label class="text-input__label" for="post_index">Индекс</label>
						</div>

					</div>
				</div>

				<div class="form-fields pickup-fields-block hidden-block">
					<div class="input-wrapper">
						<div class="text-input">
							<input class="text-input__input" type="text" name="" id="country"><label class="text-input__label" for="country">Страна</label>
						</div>
						<div class="text-input">
							<input class="text-input__input" type="text" name="" id="city"  ><label class="text-input__label" for="city">Город</label>
						</div>

					</div>
					<div class="input-wrapper">
						<div class="text-input quarter">
							<input class="text-input__input" type="text" name="" id="street"  placeholder=''><label class="text-input__label" for="street">Улица</label>
						</div>

						<div class="text-input quarter">
							<input class="text-input__input" type="text" name="" id="building"  placeholder=""><label class="text-input__label" for="building">Дом</label>
						</div>

						<div class="text-input quarter">
							<input class="text-input__input" type="text" name="" id="room"  placeholder=''><label class="text-input__label" for="room">Квартира/офис</label>
						</div>

					</div>
				</div>
			</div>							
		</div>

		<div id="items-list" class="cart-block__cart-items-list__item-wrapper list__item-wrapper-product-reg ">
			<div class="cart-block__cart-order-reg-item">	
				<div class="cart-block__cart-order-reg-item__title-block">
					<div class="number_title-block">
						<div class="cart-block__cart-order-reg-item__title-block__block-number"><p>4</p></div>
						<div class="cart-block__cart-order-reg-item__title-block__title">Товары в заказе</div>
					</div>
				</div>

				<div class="full-width-block-list">
															
				</div> 
			</div>							
		</div>

		<div class="cart-block__cart-items-list__item-wrapper list__item-wrapper-product-reg ">
			<div class="cart-block__cart-order-reg-item">	
				<div class="cart-block__cart-order-reg-item__title-block">
					<div class="number_title-block">
						<div class="cart-block__cart-order-reg-item__title-block__block-number"><p>5</p></div>
						<div class="cart-block__cart-order-reg-item__title-block__title">Способ оплаты</div>
					</div>
				</div>
				
				<input type="hidden" name="PAY_SYSTEM_ID">
				<div class="full-width-block-list">
					<div class="full-width-block-list-item payment-select" data-value="3"> 
						<div class="left-side">
							<p class="item-title">Картой</p>
						</div>
						<div class="right-side">
							<div class="icon_block" style="background: url('assets/cash_icon.svg') no-repeat center"></div>
						</div> 
					</div>

					<div class="full-width-block-list-item payment-select" data-value="4">
						<div class="left-side">
							<p class="item-title">Платежной системой</p>
						</div>
						<div class="right-side">
							<div class="icon_block" style="background: url('assets/cash_icon.svg')no-repeat center"></div>
							<div class="icon_block" style="background: url('assets/cash_icon.svg')no-repeat center"></div>
							<div class="icon_block" style="background: url('assets/cash_icon.svg')no-repeat center"></div>
						</div> 
					</div>

					<div class="full-width-block-list-item payment-select" data-value="1">
						<div class="left-side">
							<p class="item-title">Наличными при получениями</p>
						</div>
						<div class="right-side">
							<div class="icon_block" style="background: url('assets/cash_icon.svg')no-repeat center"></div>
						</div> 
					</div>
					<script>
						$('.payment-select').click(function(){
							var val = $(this).data('value');
							$('input[name="PAY_SYSTEM_ID"]').val(val);
						});
					</script>
				</div> 
			</div>							
		</div>

	</div>
	<aside class="cart-block__cart-review">
		<div class="cart-block__cart-review__cart-items-counter-block">	
			<p>	В корзине <span class="items-counter"  id="cart_items_count">3</span> товара</p>
		</div>
		<div class="cart-block__cart-review__price_block">	
			<div class="cart-block__cart-review__product-price">
				<p class="cart-block__cart-review__price_name">Стоимость товаров</p>
				<div class="price b-font"><span id="cart_items_total">22 800</span>Р</div>
			</div>
			<div class="cart-block__cart-review__discount-block">
				<p class="cart-block__cart-review__price_name">Скидка</p>
				<div class="discount-price b-font"><span  id="cart_discount">520</span>Р</div>
			</div>
			<div class="cart-block__cart-review__total-price-block">	
				<p class="cart-block__cart-review__price_name">Итого к оплате</p>
				<div class="total-price"><span id="cart_total">22 280</span>Р</div>
			</div>
		</div>
		<script>
		</script>
		<button id='button_form_submit' type="submit" class="cart-block__cart-review__button" disabled="disabled">оформить заказ</button>
		<p class="product-block__description__credit_link"><a class="how-start-block__help-link" href="#">Купить в рассрочку</a></p>
		<p class="cart-block__cart-review__info-text">	Нажимая на кнопку, вы подтверждаете своё совершеннолетие, соглашаетесь на обработку персональных данных в соответствии с Условиями, а также с Условиями продажи.</p>
	</aside>
	
</div>
	</div>
					</form>

<script>
	$(document).ready(function(){

		$('.text-input__input').val('');

		$('.text-input__input').each(function(){
			if($(this).val() !== ""){
				$(this).closest('.text-input').addClass('focused');
			}
			$(this).focus(function(){
				$(this).closest('.text-input').addClass('focused');
			});
			$(this).blur(function() {
				if($(this).val() == ""){
					$(this).closest('.text-input').removeClass('focused');
				}
				else{
					return false
				}
			});
		});

		const form = $('.form-fields'); 
		form.not($('.pickup-fields-block')).find('.text-input__input').addClass('empty_field');

		function checkInput(){
			if($('#pickup').is('.active')) {
				form.not($('.delivery-fields-block')).find('.text-input__input').each(function(){

					if($(this).val() != ''){       
						$(this).removeClass('empty_field');
					}else {
						$(this).addClass('empty_field');
					}
				});
			} else {
				form.not($('.pickup-fields-block')).find('.text-input__input').each(function(){

					if($(this).val() != ''){       
						$(this).removeClass('empty_field');
					}else {
						$(this).addClass('empty_field');
					}
				});

			}
		}

		setInterval(function(){
			checkInput();
			const sizeEmpty = form.find('.empty_field').length;

			if(sizeEmpty > 0 ){

				$('.cart-block__cart-review__button').attr('disabled','disabled');

			} else {
				$('.cart-block__cart-review__button').removeAttr('disabled');
			}

		},500);







		$('.full-width-block-list-item').each(function(){
			$(this).click(function(){
				if($(this).hasClass('active')) {
					return false;
				}

				$('.full-width-block-list-item').removeClass('active');
				$(this).addClass('active');
				if($(this).is('#pickup')) {				
					$('.delivery-fields-block, .pickup-fields-block').toggleClass('hidden-block');
					$('.pickup-fields-block').find('.text-input__input').addClass('empty_field');
					$('.delivery-fields-block').find('.text-input__input').removeClass('empty_field');
				}
				else{
					$('.pickup-fields-block').addClass('hidden-block');
						$('.delivery-fields-block').removeClass('hidden-block');
					$('.pickup-fields-block').find('.text-input__input').removeClass('empty_field');
					$('.delivery-fields-block').find('.text-input__input').addClass('empty_field');
				}

					
			})

		})


		$('.cart-block__cart-review').hcSticky({
			top: 200,
			followScroll: false
		});

		$('#popUp_call').click(function(){
			$('body').css('overflow-y','hidden');
			$('.page_content').css('filter', 'blur(10px)');
			$('.popUp').fadeIn();
		});

		$('.close-button').click(function(){
			$('body').css('overflow-y','inherit');
				$('.page_content').css('filter', 'none')
				$('.popUp').fadeOut();
		})

		



	});
</script>
<?/////////////////////////////////////////////////////////////////////////?>
								

	<div id="bx-soa-saved-files" style="display:none"></div>
	<div id="bx-soa-soc-auth-services" style="display:none">
		<?
		$arServices = false;
		$arResult['ALLOW_SOCSERV_AUTHORIZATION'] = Main\Config\Option::get('main', 'allow_socserv_authorization', 'Y') != 'N' ? 'Y' : 'N';
		$arResult['FOR_INTRANET'] = false;

		if (Main\ModuleManager::isModuleInstalled('intranet') || Main\ModuleManager::isModuleInstalled('rest'))
			$arResult['FOR_INTRANET'] = true;

		if (Main\Loader::includeModule('socialservices') && $arResult['ALLOW_SOCSERV_AUTHORIZATION'] === 'Y')
		{
			$oAuthManager = new CSocServAuthManager();
			$arServices = $oAuthManager->GetActiveAuthServices(array(
				'BACKURL' => $this->arParams['~CURRENT_PAGE'],
				'FOR_INTRANET' => $arResult['FOR_INTRANET'],
			));

			if (!empty($arServices))
			{
				$APPLICATION->IncludeComponent(
					'bitrix:socserv.auth.form',
					'flat',
					array(
						'AUTH_SERVICES' => $arServices,
						'AUTH_URL' => $arParams['~CURRENT_PAGE'],
						'POST' => $arResult['POST'],
					),
					$component,
					array('HIDE_ICONS' => 'Y')
				);
			}
		}
		?>
	</div>

	<div style="display: none">
		<?
		// we need to have all styles for sale.location.selector.steps, but RestartBuffer() cuts off document head with styles in it
		$APPLICATION->IncludeComponent(
	"bitrix:sale.location.selector.steps", 
	".default", 
	array(
		"COMPONENT_TEMPLATE" => ".default",
		"ID" => "",
		"CODE" => "",
		"INPUT_NAME" => "LOCATION",
		"PROVIDE_LINK_BY" => "id",
		"PRESELECT_TREE_TRUNK" => "N",
		"PRECACHE_LAST_LEVEL" => "N",
		"FILTER_BY_SITE" => "N",
		"SHOW_DEFAULT_LOCATIONS" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"JS_CONTROL_GLOBAL_ID" => "",
		"JS_CALLBACK" => "",
		"SUPPRESS_ERRORS" => "N",
		"DISABLE_KEYBOARD_INPUT" => "N",
		"INITIALIZE_BY_GLOBAL_EVENT" => ""
	),
	false
);
		$APPLICATION->IncludeComponent(
			'bitrix:sale.location.selector.search',
			'.default',
			array(),
			false
		);
		?>
	</div>
	<?
	$signer = new Main\Security\Sign\Signer;
	$signedParams = $signer->sign(base64_encode(serialize($arParams)), 'sale.order.ajax');
	$messages = Loc::loadLanguageFile(__FILE__);
	?>
	<script>
		BX.message(<?=CUtil::PhpToJSObject($messages)?>);
		BX.Sale.OrderAjaxComponent.init({
			result: <?=CUtil::PhpToJSObject($arResult['JS_DATA'])?>,
			locations: <?=CUtil::PhpToJSObject($arResult['LOCATIONS'])?>,
			params: <?=CUtil::PhpToJSObject($arParams)?>,
			signedParamsString: '<?=CUtil::JSEscape($signedParams)?>',
			siteID: '<?=CUtil::JSEscape($component->getSiteId())?>',
			ajaxUrl: '<?=CUtil::JSEscape($component->getPath().'/ajax.php')?>',
			templateFolder: '<?=CUtil::JSEscape($templateFolder)?>',
			propertyValidation: true,
			showWarnings: true,
			pickUpMap: {
				defaultMapPosition: {
					lat: 55.76,
					lon: 37.64,
					zoom: 7
				},
				secureGeoLocation: false,
				geoLocationMaxTime: 5000,
				minToShowNearestBlock: 3,
				nearestPickUpsToShow: 3
			},
			propertyMap: {
				defaultMapPosition: {
					lat: 55.76,
					lon: 37.64,
					zoom: 7
				}
			},
			orderBlockId: 'bx-soa-order',
			authBlockId: 'bx-soa-auth',
			basketBlockId: 'bx-soa-basket',
			regionBlockId: 'bx-soa-region',
			paySystemBlockId: 'bx-soa-paysystem',
			deliveryBlockId: 'bx-soa-delivery',
			pickUpBlockId: 'bx-soa-pickup',
			propsBlockId: 'bx-soa-properties',
			totalBlockId: 'bx-soa-total'
		});
	</script>
	<script>
		<?
		// spike: for children of cities we place this prompt
		$city = \Bitrix\Sale\Location\TypeTable::getList(array('filter' => array('=CODE' => 'CITY'), 'select' => array('ID')))->fetch();
		?>
		BX.saleOrderAjax.init(<?=CUtil::PhpToJSObject(array(
			'source' => $component->getPath().'/get.php',
			'cityTypeId' => intval($city['ID']),
			'messages' => array(
				'otherLocation' => '--- '.Loc::getMessage('SOA_OTHER_LOCATION'),
				'moreInfoLocation' => '--- '.Loc::getMessage('SOA_NOT_SELECTED_ALT'), // spike: for children of cities we place this prompt
				'notFoundPrompt' => '<div class="-bx-popup-special-prompt">'.Loc::getMessage('SOA_LOCATION_NOT_FOUND').'.<br />'.Loc::getMessage('SOA_LOCATION_NOT_FOUND_PROMPT', array(
						'#ANCHOR#' => '<a href="javascript:void(0)" class="-bx-popup-set-mode-add-loc">',
						'#ANCHOR_END#' => '</a>'
					)).'</div>'
			)
		))?>);
	</script>
	<?
	if ($arParams['SHOW_PICKUP_MAP'] === 'Y' || $arParams['SHOW_MAP_IN_PROPS'] === 'Y')
	{
		if ($arParams['PICKUP_MAP_TYPE'] === 'yandex')
		{
			$this->addExternalJs($templateFolder.'/scripts/yandex_maps.js');
			?>
			<script src="<?=$scheme?>://api-maps.yandex.ru/2.1.50/?load=package.full&lang=<?=$locale?>"></script>
			<script>
				(function bx_ymaps_waiter(){
					if (typeof ymaps !== 'undefined' && BX.Sale && BX.Sale.OrderAjaxComponent)
						ymaps.ready(BX.proxy(BX.Sale.OrderAjaxComponent.initMaps, BX.Sale.OrderAjaxComponent));
					else
						setTimeout(bx_ymaps_waiter, 100);
				})();
			</script>
			<?
		}

		if ($arParams['PICKUP_MAP_TYPE'] === 'google')
		{
			$this->addExternalJs($templateFolder.'/scripts/google_maps.js');
			$apiKey = htmlspecialcharsbx(Main\Config\Option::get('fileman', 'google_map_api_key', ''));
			?>
			<script async defer
				src="<?=$scheme?>://maps.googleapis.com/maps/api/js?key=<?=$apiKey?>&callback=bx_gmaps_waiter">
			</script>
			<script>
				function bx_gmaps_waiter()
				{
					if (BX.Sale && BX.Sale.OrderAjaxComponent)
						BX.Sale.OrderAjaxComponent.initMaps();
					else
						setTimeout(bx_gmaps_waiter, 100);
				}
			</script>
			<?
		}
	}

	if ($arParams['USE_YM_GOALS'] === 'Y')
	{
		?>
		<script>
			(function bx_counter_waiter(i){
				i = i || 0;
				if (i > 50)
					return;

				if (typeof window['yaCounter<?=$arParams['YM_GOALS_COUNTER']?>'] !== 'undefined')
					BX.Sale.OrderAjaxComponent.reachGoal('initialization');
				else
					setTimeout(function(){bx_counter_waiter(++i)}, 100);
			})();
		</script>
		

		<?
	}
}
?>

<script>
	var price = 0;
	var price_total = 0;
	function prices() {
		this.price = 0; price_total = 0;
		console.log('asd')
		
		$('.bx-soa-cart-total div').each(function(index, element){
			if($(element).find('span').length > 1){
				switch ( $($(element).find('span')[0]).text() ) {
					case "Товаров на:":
						price=$($(element).find('span')[1]).text()
						if($(element).find('span')[2]){
							var price_dicount=$($(element).find('span')[2]).text();
							price = price.substring(0, (price.length - price_dicount.length)  );
							this.price = price.substring(0, price.length-5);
						}
						$('#cart_items_total').text(this.price);
						break;
					case "Итого:":
						price_total = $($(element).find('span')[1]).text()
						price_total = price_total.substring(0, price_total.length-5);
						$('#cart_total').text(price_total);
						var dicount = parseFloat($('#cart_total').text().replace(/\s/g, '') ) - parseFloat($('#cart_items_total').text().replace(/\s/g, '') );
						$('#cart_discount').text(dicount);
						break;
											
				}
			}
		});								
	}
	prices();

	var cart_items_count= $('#bx-soa-basket .bx-soa-section-content .bx-soa-item-table>div').length;
	$('#items-counter').text(cart_items_count);
	var items = $('#items-list .cart-block__cart-order-reg-item');
	$('#bx-soa-basket .bx-soa-section-content .bx-soa-item-table>div').each(function (index, element) {
		var image_url = $(element).find('.bx-soa-item-imgcontainer').css('background-image');				
		var title = $($(element).find('.bx-soa-item-title a')[0]).text();
		var title_link = $($(element).find('.bx-soa-item-title a')[0]).attr('href');
		var price = $($(element).find('.bx-price.all')[0]).text();
		price = price.substring(0, price.length-5);
		var discount = $($(element).find('.bx-price-old')[0]).text();
		discount = discount.substring(0, discount.length-5);
		var discount_value = parseFloat(parseFloat(price.replace(/\s/g, '') ) - parseFloat(discount.replace(/\s/g, '') )).toFixed(0);

		console.log(image_url.substring(4, image_url.length-2) );

		items.append(
			'<div class="cart-block__cart-items-list__item d-table">	'
			+'	<div class="item__image d-table__cell">						'
			+'		<img src="'+ image_url.substring(5, image_url.length-2) +'" alt="">					'
			+'	</div>	'
			+'	<div class="cart-block__item__info d-table__cell">	'
			+'		<a href="'+title_link+'">'+title+'</a>'
			+'		<div class="cart-block__item__meta">	160 гр.</div>'
			+'	</div>'

			+'	<div class="cart-block__item__price d-table__cell">	'
			+'		<p class="actual-price price"><span>'+price+'</span> Р</p>'
			+'		<p class="old-price price"><span>'+ (discount ? discount+' Р' : '') +' </span> </p>'
			+'		<p class="discount-price price">' + (!isNaN(discount_value) ? 'Скидка' : '') +'<span>'+ (!isNaN(discount_value) ? (discount_value * (-1) )+' P' : '') +'</span></p>'
			+'	</div>'
			+'</div>'
		);
	});
	$('#button_form_submit').click(function(e){
		e.preventDefault();
		$('form[name="ORDER_FORM"]').ajaxSubmit({
			url: '/personal/order/make/',
			success: function(data){
				window.location.replace(data.order.REDIRECT_URL);
			}
		});
	});
</script>
<script src="http://malsup.github.com/jquery.form.js"></script> 