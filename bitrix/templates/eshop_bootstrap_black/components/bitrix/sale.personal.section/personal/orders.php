<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
use Bitrix\Main\Localization\Loc;
if (strlen($arParams["MAIN_CHAIN_NAME"]) > 0)
{
	$APPLICATION->AddChainItem(htmlspecialcharsbx($arParams["MAIN_CHAIN_NAME"]), $arResult['SEF_FOLDER']);
}

$theme = Bitrix\Main\Config\Option::get("main", "wizard_eshop_bootstrap_theme_id", "blue", SITE_ID);

$availablePages = array();

if ($arParams['SHOW_PRIVATE_PAGE'] === 'Y')
{
	$availablePages[] = array(
		"path" => $arResult['PATH_TO_PRIVATE'],
		"name" => Loc::getMessage("SPS_PERSONAL_PAGE_NAME"),
		"icon" => '<i class="fa fa-user-secret"></i>'
	);
}

if ($arParams['SHOW_ACCOUNT_PAGE'] === 'Y')
{
	$availablePages[] = array(
		"path" => $arResult['PATH_TO_ACCOUNT'],
		"name" => Loc::getMessage("SPS_ACCOUNT_PAGE_NAME"),
		"icon" => '<i class="fa fa-credit-card"></i>'
	);
}

if ($arParams['SHOW_ORDER_PAGE'] === 'Y')
{
	$availablePages[] = array(
		"path" => $arResult['PATH_TO_ORDERS'],
		"name" => Loc::getMessage("SPS_ORDER_PAGE_NAME"),
		"icon" => '<i class="fa fa-calculator"></i>'
	);
}

if ($arParams['SHOW_ORDER_PAGE'] === 'Y')
{

	$delimeter = ($arParams['SEF_MODE'] === 'Y') ? "?" : "&";
	$availablePages[] = array(
		"path" => $arResult['PATH_TO_ORDERS'].$delimeter."filter_history=Y",
		"name" => Loc::getMessage("SPS_ORDER_PAGE_HISTORY"),
		"icon" => '<i class="fa fa-list-alt"></i>'
	);
}

if ($arParams['SHOW_SUBSCRIBE_PAGE'] === 'Y')
{
	$availablePages[] = array(
		"path" => $arResult['PATH_TO_SUBSCRIBE'],
		"name" => Loc::getMessage("SPS_SUBSCRIBE_PAGE_NAME"),
		"icon" => '<i class="fa fa-envelope"></i>'
	);
}
/**/
/*if ($arParams['SHOW_CONTACT_PAGE'] === 'Y')
{
	$availablePages[] = array(
		"path" => $arParams['PATH_TO_CONTACT'],
		"name" => Loc::getMessage("SPS_CONTACT_PAGE_NAME"),
		"icon" => '<i class="fa fa-info-circle"></i>'
	);
}

if ($arParams['SHOW_PROFILE_PAGE'] === 'Y')
{
	$availablePages[] = array(
		"path" => $arResult['PATH_TO_PROFILE'],
		"name" => Loc::getMessage("SPS_PROFILE_PAGE_NAME"),
		"icon" => '<i class="fa fa-list-ol"></i>'
	);
}

if ($arParams['SHOW_BASKET_PAGE'] === 'Y')
{
	$availablePages[] = array(
		"path" => $arParams['PATH_TO_BASKET'],
		"name" => Loc::getMessage("SPS_BASKET_PAGE_NAME"),
		"icon" => '<i class="fa fa-shopping-cart"></i>'
	);
}*/
/**/
$customPagesList = CUtil::JsObjectToPhp($arParams['~CUSTOM_PAGES']);
if ($customPagesList)
{
	foreach ($customPagesList as $page)
	{
		$availablePages[] = array(
			"path" => $page[0],
			"name" => $page[1],
			"icon" => (strlen($page[2])) ? '<i class="fa '.htmlspecialcharsbx($page[2]).'"></i>' : ""
		);
	}
}

if (empty($availablePages))
{
	ShowError(Loc::getMessage("SPS_ERROR_NOT_CHOSEN_ELEMENT"));
}
else
{
	?>
	<?
	$rsUser = CUser::GetByID($USER->GetID());
	$arUser = $rsUser->Fetch();
	?>
	<!-- end of header block -->
	<!-- 	breadcrumbs block -->
	<div class="breadcrumbs">
		<div class="breadcrumbs-content">
			<div class="breadcrumbs__item">Главная </div>
			<div class="breadcrumbs__separator"> / </div>
			<div class="breadcrumbs__item">Мой кабинет </div>
		</div>
	</div>
	<!-- 	end of breadcrumbs block -->

	<!-- personal-cabinet block -->
	<div class="personal-cabinet-block">
		<div class="personal-cabinet-block__title-block">
			<div class="up-hello-block__left-side__title">Мой кабинет</div>
		</div>
		<div class="personal-cabinet-block__content">
			<div class="personal-cabinet-block__navbar-block">
				<div class="personal-cabinet-block__title">Привет, <?=$arUser['NAME']?>!</div>
				<ul class="personal-cabinet__navbar">
					<?foreach ($availablePages as $item=>$blockElement):?>
						<li>
							<a <?=($item == 0)? 'class="personal-cabinet__navbar_link__active"' : '' ?> href="<?=$blockElement['path']?>"><?=$blockElement['name']?></a>
						</li>
					<?endforeach;?>
				</ul>
			</div>

			<?$APPLICATION->IncludeComponent(
				"bitrix:sale.personal.order.list",
				"",
				array(
					"PATH_TO_DETAIL" => $arResult["PATH_TO_ORDER_DETAIL"],
					"PATH_TO_CANCEL" => $arResult["PATH_TO_ORDER_CANCEL"],
					"PATH_TO_CATALOG" => $arParams["PATH_TO_CATALOG"],
					"PATH_TO_COPY" => $arResult["PATH_TO_ORDER_COPY"],
					"PATH_TO_BASKET" => $arParams["PATH_TO_BASKET"],
					"PATH_TO_PAYMENT" => $arParams["PATH_TO_PAYMENT"],
					"SAVE_IN_SESSION" => $arParams["SAVE_IN_SESSION"],
					"ORDERS_PER_PAGE" => $arParams["ORDERS_PER_PAGE"],
					"SET_TITLE" =>$arParams["SET_TITLE"],
					"ID" => $arResult["VARIABLES"]["ID"],
					"NAV_TEMPLATE" => $arParams["NAV_TEMPLATE"],
					"ACTIVE_DATE_FORMAT" => $arParams["ACTIVE_DATE_FORMAT"],
					"HISTORIC_STATUSES" => $arParams["ORDER_HISTORIC_STATUSES"],
					"ALLOW_INNER" => $arParams["ALLOW_INNER"],
					"ONLY_INNER_FULL" => $arParams["ONLY_INNER_FULL"],
					"CACHE_TYPE" => $arParams["CACHE_TYPE"],
					"CACHE_TIME" => $arParams["CACHE_TIME"],
					"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
					"DEFAULT_SORT" => $arParams["ORDER_DEFAULT_SORT"],
					"RESTRICT_CHANGE_PAYSYSTEM" => $arParams["ORDER_RESTRICT_CHANGE_PAYSYSTEM"],
					"REFRESH_PRICES" => $arParams["ORDER_REFRESH_PRICES"],
				),
				$component
			);?>
		</div>
	</div>

	<?
}
?>

<?
if ($arParams['SHOW_ORDER_PAGE'] !== 'Y')
{
	LocalRedirect($arParams['SEF_FOLDER']);
}	

if (strlen($arParams["MAIN_CHAIN_NAME"]) > 0)
{
	$APPLICATION->AddChainItem(htmlspecialcharsbx($arParams["MAIN_CHAIN_NAME"]), $arResult['SEF_FOLDER']);
}

$APPLICATION->AddChainItem(Loc::getMessage("SPS_CHAIN_ORDERS"), $arResult['PATH_TO_ORDERS']);

?>

