<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main;
use Bitrix\Main\Localization\Loc;

\Bitrix\Main\UI\Extension::load("ui.fonts.ruble");

/**
 * @var array $arParams
 * @var array $arResult
 * @var string $templateFolder
 * @var string $templateName
 * @var CMain $APPLICATION
 * @var CBitrixBasketComponent $component
 * @var CBitrixComponentTemplate $this
 * @var array $giftParameters
 */

$documentRoot = Main\Application::getDocumentRoot();
?>
<?
if (empty($arParams['TEMPLATE_THEME'])) {
	$arParams['TEMPLATE_THEME'] = Main\ModuleManager::isModuleInstalled('bitrix.eshop') ? 'site' : 'blue';
}

if ($arParams['TEMPLATE_THEME'] === 'site') {
	$templateId = Main\Config\Option::get('main', 'wizard_template_id', 'eshop_bootstrap', $component->getSiteId());
	$templateId = preg_match('/^eshop_adapt/', $templateId) ? 'eshop_adapt' : $templateId;
	$arParams['TEMPLATE_THEME'] = Main\Config\Option::get('main', 'wizard_' . $templateId . '_theme_id', 'blue', $component->getSiteId());
}

if (!empty($arParams['TEMPLATE_THEME'])) {
	if (!is_file($documentRoot . '/bitrix/css/main/themes/' . $arParams['TEMPLATE_THEME'] . '/style.css')) {
		$arParams['TEMPLATE_THEME'] = 'blue';
	}
}

if (!isset($arParams['DISPLAY_MODE']) || !in_array($arParams['DISPLAY_MODE'], array('extended', 'compact'))) {
	$arParams['DISPLAY_MODE'] = 'extended';
}

$arParams['USE_DYNAMIC_SCROLL'] = isset($arParams['USE_DYNAMIC_SCROLL']) && $arParams['USE_DYNAMIC_SCROLL'] === 'N' ? 'N' : 'Y';
$arParams['SHOW_FILTER'] = isset($arParams['SHOW_FILTER']) && $arParams['SHOW_FILTER'] === 'N' ? 'N' : 'Y';

$arParams['PRICE_DISPLAY_MODE'] = isset($arParams['PRICE_DISPLAY_MODE']) && $arParams['PRICE_DISPLAY_MODE'] === 'N' ? 'N' : 'Y';

if (!isset($arParams['TOTAL_BLOCK_DISPLAY']) || !is_array($arParams['TOTAL_BLOCK_DISPLAY'])) {
	$arParams['TOTAL_BLOCK_DISPLAY'] = array('top');
}

if (empty($arParams['PRODUCT_BLOCKS_ORDER'])) {
	$arParams['PRODUCT_BLOCKS_ORDER'] = 'props,sku,columns';
}

if (is_string($arParams['PRODUCT_BLOCKS_ORDER'])) {
	$arParams['PRODUCT_BLOCKS_ORDER'] = explode(',', $arParams['PRODUCT_BLOCKS_ORDER']);
}

$arParams['USE_PRICE_ANIMATION'] = isset($arParams['USE_PRICE_ANIMATION']) && $arParams['USE_PRICE_ANIMATION'] === 'N' ? 'N' : 'Y';
$arParams['EMPTY_BASKET_HINT_PATH'] = isset($arParams['EMPTY_BASKET_HINT_PATH']) ? (string) $arParams['EMPTY_BASKET_HINT_PATH'] : '/';
$arParams['USE_ENHANCED_ECOMMERCE'] = isset($arParams['USE_ENHANCED_ECOMMERCE']) && $arParams['USE_ENHANCED_ECOMMERCE'] === 'Y' ? 'Y' : 'N';
$arParams['DATA_LAYER_NAME'] = isset($arParams['DATA_LAYER_NAME']) ? trim($arParams['DATA_LAYER_NAME']) : 'dataLayer';
$arParams['BRAND_PROPERTY'] = isset($arParams['BRAND_PROPERTY']) ? trim($arParams['BRAND_PROPERTY']) : '';

if ($arParams['USE_GIFTS'] === 'Y') {
	$arParams['GIFTS_BLOCK_TITLE'] = isset($arParams['GIFTS_BLOCK_TITLE']) ? trim((string) $arParams['GIFTS_BLOCK_TITLE']) : Loc::getMessage('SBB_GIFTS_BLOCK_TITLE');

	CBitrixComponent::includeComponentClass('bitrix:sale.products.gift.basket');

	$giftParameters = array(
		'SHOW_PRICE_COUNT' => 1,
		'PRODUCT_SUBSCRIPTION' => 'N',
		'PRODUCT_ID_VARIABLE' => 'id',
		'USE_PRODUCT_QUANTITY' => 'N',
		'ACTION_VARIABLE' => 'actionGift',
		'ADD_PROPERTIES_TO_BASKET' => 'Y',
		'PARTIAL_PRODUCT_PROPERTIES' => 'Y',

		'BASKET_URL' => $APPLICATION->GetCurPage(),
		'APPLIED_DISCOUNT_LIST' => $arResult['APPLIED_DISCOUNT_LIST'],
		'FULL_DISCOUNT_LIST' => $arResult['FULL_DISCOUNT_LIST'],

		'TEMPLATE_THEME' => $arParams['TEMPLATE_THEME'],
		'PRICE_VAT_INCLUDE' => $arParams['PRICE_VAT_SHOW_VALUE'],
		'CACHE_GROUPS' => $arParams['CACHE_GROUPS'],

		'BLOCK_TITLE' => $arParams['GIFTS_BLOCK_TITLE'],
		'HIDE_BLOCK_TITLE' => $arParams['GIFTS_HIDE_BLOCK_TITLE'],
		'TEXT_LABEL_GIFT' => $arParams['GIFTS_TEXT_LABEL_GIFT'],

		'DETAIL_URL' => isset($arParams['GIFTS_DETAIL_URL']) ? $arParams['GIFTS_DETAIL_URL'] : null,
		'PRODUCT_QUANTITY_VARIABLE' => $arParams['GIFTS_PRODUCT_QUANTITY_VARIABLE'],
		'PRODUCT_PROPS_VARIABLE' => $arParams['GIFTS_PRODUCT_PROPS_VARIABLE'],
		'SHOW_OLD_PRICE' => $arParams['GIFTS_SHOW_OLD_PRICE'],
		'SHOW_DISCOUNT_PERCENT' => $arParams['GIFTS_SHOW_DISCOUNT_PERCENT'],
		'DISCOUNT_PERCENT_POSITION' => $arParams['DISCOUNT_PERCENT_POSITION'],
		'MESS_BTN_BUY' => $arParams['GIFTS_MESS_BTN_BUY'],
		'MESS_BTN_DETAIL' => $arParams['GIFTS_MESS_BTN_DETAIL'],
		'CONVERT_CURRENCY' => $arParams['GIFTS_CONVERT_CURRENCY'],
		'HIDE_NOT_AVAILABLE' => $arParams['GIFTS_HIDE_NOT_AVAILABLE'],

		'PRODUCT_ROW_VARIANTS' => '',
		'PAGE_ELEMENT_COUNT' => 0,
		'DEFERRED_PRODUCT_ROW_VARIANTS' => \Bitrix\Main\Web\Json::encode(
			SaleProductsGiftBasketComponent::predictRowVariants(
				$arParams['GIFTS_PAGE_ELEMENT_COUNT'],
				$arParams['GIFTS_PAGE_ELEMENT_COUNT']
			)
		),
		'DEFERRED_PAGE_ELEMENT_COUNT' => $arParams['GIFTS_PAGE_ELEMENT_COUNT'],

		'ADD_TO_BASKET_ACTION' => 'BUY',
		'PRODUCT_DISPLAY_MODE' => 'Y',
		'PRODUCT_BLOCKS_ORDER' => isset($arParams['GIFTS_PRODUCT_BLOCKS_ORDER']) ? $arParams['GIFTS_PRODUCT_BLOCKS_ORDER'] : '',
		'SHOW_SLIDER' => isset($arParams['GIFTS_SHOW_SLIDER']) ? $arParams['GIFTS_SHOW_SLIDER'] : '',
		'SLIDER_INTERVAL' => isset($arParams['GIFTS_SLIDER_INTERVAL']) ? $arParams['GIFTS_SLIDER_INTERVAL'] : '',
		'SLIDER_PROGRESS' => isset($arParams['GIFTS_SLIDER_PROGRESS']) ? $arParams['GIFTS_SLIDER_PROGRESS'] : '',
		'LABEL_PROP_POSITION' => $arParams['LABEL_PROP_POSITION'],

		'USE_ENHANCED_ECOMMERCE' => $arParams['USE_ENHANCED_ECOMMERCE'],
		'DATA_LAYER_NAME' => $arParams['DATA_LAYER_NAME'],
		'BRAND_PROPERTY' => $arParams['BRAND_PROPERTY']
	);
}

\CJSCore::Init(array('fx', 'popup', 'ajax'));

// $this->addExternalCss('/bitrix/css/main/bootstrap.css');
$this->addExternalCss($templateFolder . '/themes/' . $arParams['TEMPLATE_THEME'] . '/style.css');

$this->addExternalJs($templateFolder . '/js/mustache.js');
$this->addExternalJs($templateFolder . '/js/action-pool.js');
$this->addExternalJs($templateFolder . '/js/filter.js');
$this->addExternalJs($templateFolder . '/js/component.js');

$mobileColumns = isset($arParams['COLUMNS_LIST_MOBILE'])
	? $arParams['COLUMNS_LIST_MOBILE']
	: $arParams['COLUMNS_LIST'];
$mobileColumns = array_fill_keys($mobileColumns, true);

$jsTemplates = new Main\IO\Directory($documentRoot . $templateFolder . '/js-templates');
/** @var Main\IO\File $jsTemplate */
foreach ($jsTemplates->getChildren() as $jsTemplate) {
	include($jsTemplate->getPath());
}

$displayModeClass = $arParams['DISPLAY_MODE'] === 'compact' ? ' basket-items-list-wrapper-compact' : '';

if (empty($arResult['ERROR_MESSAGE'])) {
	if ($arParams['USE_GIFTS'] === 'Y' && $arParams['GIFTS_PLACE'] === 'TOP') {
		?>
		<div data-entity="parent-container">
			<div class="catalog-block-header" data-entity="header" data-showed="false" style="display: none; opacity: 0;">
				<?= $arParams['GIFTS_BLOCK_TITLE'] ?>
			</div>
			<?
					$APPLICATION->IncludeComponent(
						'bitrix:sale.products.gift.basket',
						'.default',
						$giftParameters,
						$component
					);
					?>
		</div>
	<?
		}

		if ($arResult['BASKET_ITEM_MAX_COUNT_EXCEEDED']) {
			?>
		<div id="basket-item-message">
			<?= Loc::getMessage('SBB_BASKET_ITEM_MAX_COUNT_EXCEEDED', array('#PATH#' => $arParams['PATH_TO_BASKET'])) ?>
		</div>
	<?
		}
		?>
	<div id="basket-root" class="bx-basket bx-<?= $arParams['TEMPLATE_THEME'] ?> bx-step-opacity" style="opacity: 0;">
		<?
			if (
				$arParams['BASKET_WITH_ORDER_INTEGRATION'] !== 'Y'
				&& in_array('top', $arParams['TOTAL_BLOCK_DISPLAY'])
			) {
				?>

		<?
			}
			?>

		<div class="row" style="display: none;">
			<div class="col-xs-12">
				<div class="alert alert-warning alert-dismissable" id="basket-warning" style="display: none;">
					<span class="close" data-entity="basket-items-warning-notification-close">&times;</span>
					<div data-entity="basket-general-warnings"></div>
					<div data-entity="basket-item-warnings">
						<?= Loc::getMessage('SBB_BASKET_ITEM_WARNING') ?>
					</div>
				</div>
			</div>
		</div>
		<!-- style="display: none;" -->
		<!-- OLD CART BLOCK -->
		<div class="row" style="display: none;">
			<div class="col-xs-12">
				<div class="cart-block" id="basket-items-list-wrapper">
					<div class="cart-block__cart-items-list1 js_item_list" id="basket-items-list-container">
						<div class="basket-items-list-overlay" id="basket-items-list-overlay" style="display: none;"></div>
						<div class="basket-items-list" id="her basket-item-list">
							<div class="basket-search-not-found" id="basket-item-list-empty-result" style="display: none;">
								<div class="basket-search-not-found-icon"></div>
								<div class="basket-search-not-found-text">
									<?= Loc::getMessage('SBB_FILTER_EMPTY_RESULT') ?>
								</div>
							</div>
							<div class="cart-block__cart-items-list1">
								<table class="basket-items-list-table" id="basket-item-table"></table>


							</div>

						</div>
					</div>
					<div class="cart-block__cart-review_old" data-entity="basket-items-list-header">
						<div class="cart-block__cart-review__cart-items-counter-block">
							<a href="javascript:void(0)" class="basket-items-list-header-filter-item active" data-entity="basket-items-count" data-filter="all" style="display: none;"></a>
							<a href="javascript:void(0)" class="basket-items-list-header-filter-item" data-entity="basket-items-count" data-filter="similar" style="display: none;"></a>
							<a href="javascript:void(0)" class="basket-items-list-header-filter-item" data-entity="basket-items-count" data-filter="warning" style="display: none;"></a>
							<a href="javascript:void(0)" class="basket-items-list-header-filter-item" data-entity="basket-items-count" data-filter="delayed" style="display: none;"></a>
							<a href="javascript:void(0)" class="basket-items-list-header-filter-item" data-entity="basket-items-count" data-filter="not-available" style="display: none;"></a>
						</div>
						<div data-entity="basket-total-block"></div>
					</div>
				</div>
			</div>
		</div>
		<?
			if (
				$arParams['BASKET_WITH_ORDER_INTEGRATION'] !== 'Y'
				&& in_array('bottom', $arParams['TOTAL_BLOCK_DISPLAY'])
			) {
				?>

		<?
			}
			?>
	</div>
	<?
		if (!empty($arResult['CURRENCIES']) && Main\Loader::includeModule('currency')) {
			CJSCore::Init('currency');

			?>
		<script>
			BX.Currency.setCurrencies(<?= CUtil::PhpToJSObject($arResult['CURRENCIES'], false, true, true) ?>);
		</script>
	<?
		}

		$signer = new \Bitrix\Main\Security\Sign\Signer;
		$signedTemplate = $signer->sign($templateName, 'sale.basket.basket');
		$signedParams = $signer->sign(base64_encode(serialize($arParams)), 'sale.basket.basket');
		$messages = Loc::loadLanguageFile(__FILE__);
		?>
	<script>
		BX.message(<?= CUtil::PhpToJSObject($messages) ?>);
		BX.Sale.BasketComponent.init({
			result: <?= CUtil::PhpToJSObject($arResult, false, false, true) ?>,
			params: <?= CUtil::PhpToJSObject($arParams) ?>,
			template: '<?= CUtil::JSEscape($signedTemplate) ?>',
			signedParamsString: '<?= CUtil::JSEscape($signedParams) ?>',
			siteId: '<?= CUtil::JSEscape($component->getSiteId()) ?>',
			templateFolder: '<?= CUtil::JSEscape($templateFolder) ?>'
		});
	</script>
	<?
		if ($arParams['USE_GIFTS'] === 'Y' && $arParams['GIFTS_PLACE'] === 'BOTTOM') {
			?>
		<div data-entity="parent-container">
			<div class="catalog-block-header" data-entity="header" data-showed="false" style="display: none; opacity: 0;">
				<?= $arParams['GIFTS_BLOCK_TITLE'] ?>
			</div>
			<?/*
	            *
	            * Тут находится шаблон с "Выбирете подарок"
	            *
	        */ ?>
			<?/*
			$APPLICATION->IncludeComponent(
				'bitrix:sale.products.gift.basket',
				'.default',
				$giftParameters,
				$component
			);
			*/ ?>
		</div>
<?
	}
} elseif ($arResult['EMPTY_BASKET']) {
	include(Main\Application::getDocumentRoot() . $templateFolder . '/empty.php');
} else {
	ShowError($arResult['ERROR_MESSAGE']);
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>
<? if ($arResult['allSum'] != 0) : ?>
	<? $APPLICATION->IncludeComponent(
			"bitrix:breadcrumb",
			"",
			array(
				"PATH" => "",
				"SITE_ID" => SITE_ID,
				"START_FROM" => 0
			)
		); ?>

	<div class="cart-block">
		<div class="cart-block__title-block">
			<div class="up-hello-block__left-side__title">Корзина</div>
			<div class="cart-block__title-block__clear-button">
				<a href="/personal/cart/?BasketDelete=1">
					<p>очистить <i class="fa fa-times" aria-hidden="true"></i></p>
				</a>
			</div>
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
			$dbRes = \Bitrix\Sale\Basket::getList([
				'select' => ['*'],
				'filter' => [
					'=FUSER_ID' => \Bitrix\Sale\Fuser::getId(),
					'=ORDER_ID' => null,
					'=LID' => \Bitrix\Main\Context::getCurrent()->getSite(),
					'=CAN_BUY' => 'Y',
				]
			]);
			?>
		<div class="cart-block__content">
			<div class="cart-block__cart-items-list">
				<? while ($item = $dbRes->fetch()) : ?>
					<? $product = CCatalogSku::GetProductInfo($item['PRODUCT_ID']);
							$image = CIBlockElement::GetByID($product['ID'])->Fetch();
							if (!empty($image['PREVIEW_PICTURE'])) {
								$picture = CFile::GetPath($image['PREVIEW_PICTURE']);
							} else {
								$picture = CFile::GetPath($image['DETAIL_PICTURE']);
							}
							?>
					<div class="cart-block__cart-items-list__item-wrapper" id="<?= $item['ID'] ?>">
						<div class="cart-block__cart-items-list__item d-table">
							<div class="item__image d-table__cell">
								<img src="<?= $picture ?>" alt="">
							</div>
							<div class="cart-block__item__info d-table__cell">
								<a href="<?= $item['DETAIL_PAGE_URL'] ?>"><?= $item['NAME'] ?></a>
								<!-- <div class="cart-block__item__meta">160 гр.</div> -->
							</div>
							<div class="cart-block__item__quantity d-table__cell">
								<div class="number">
									<span class="minus">-</span>
									<input type="text" value="<?= intVal($item['QUANTITY']) ?>" size="5">
									<span class="plus">+</span>
								</div>
							</div>
							<div class="cart-block__item__price d-table__cell">
								<? if (intVal($item['DISCOUNT_PRICE'])) : ?>
									<p class="actual-price price"><span><?= number_format(intVal($item['QUANTITY']) * $item['PRICE'], 2, '.', ' '); ?></span> Р</p>
									<p class="old-price price"><span><?= number_format(intVal($item['QUANTITY']) * $item['PRICE'], 2, '.', ' '); ?> Р</span> </p>
									<p class="discount-price price">Скидка <span><?= number_format(intVal($item['QUANTITY']) * $item['PRICE'], 2, '.', ' '); ?> Р</span></p>
								<? else : ?>
									<p class="actual-price price"><span><?= number_format(intVal($item['QUANTITY']) * $item['PRICE'], 2, '.', ' '); ?></span> Р</p>
								<? endif ?>
							</div>
							<div class="cart-block__item__btns d-table__cell">
								<a href="	">
									<i class="fa fa-trash" aria-hidden="true"></i>
								</a>
							</div>
						</div>
					</div>
				<? endwhile; ?>
			</div>
			<div class="cart-block__cart-review cart-main">
				<div class="cart-block__cart-review__cart-items-counter-block">
					<p> В корзине <span class="items-counter"><?= $cnt ?></span> товар</p>
				</div>
				<div class="cart-block__cart-review__price_block">
					<div class="cart-block__cart-review__product-price">
						<p class="cart-block__cart-review__price_name">Стоимость товаров</p>
						<div class="price b-font"><span><?= number_format($basket->getBasePrice(), 2, '.', ' '); ?></span> Р</div>
					</div>
					<div class="cart-block__cart-review__discount-block">
						<p class="cart-block__cart-review__price_name">Скидка</p>
						<div class="discount-price b-font"><span><?= number_format($basket->getBasePrice() - $basket->getPrice(), 2, '.', ' '); ?></span> Р</div>
					</div>
					<div class="cart-block__cart-review__total-price-block">
						<p class="cart-block__cart-review__price_name">Итого к оплате</p>
						<div class="total-price"><span><?= number_format($basket->getPrice(), 2, '.', ' '); ?></span> Р</div>
					</div>
				</div>

				<a href="/personal/order/make/" class="cart-block__cart-review__button">оформить заказ</a>
				<p class="product-block__description__credit_link"><a class="how-start-block__help-link" href="#">Купить в рассрочку</a></p>


				<div class="footer__line"></div>

				<p> Есть промокод?</p>
				<div class="promocode-block">
					<label>
						<input name="promocode" class="promo-form-block__form__input" type="text" required="" placeholder="Введите промокод">
					</label>
					<button class="promo-form-block__form__submit" type="submit">применить</button>
				</div>
				<p class="cart-block__cart-review__info-text"></p>

			</div>
		</div>
	</div>


	<script>
		// $('.cart-block__cart-items-list .cart-block__cart-items-list__item-wrapper').remove();
		// $('.js_item_list table tr').each(function (id, element) {
		// 	var image = $(element).find('.basket-item-block-image img').attr('src');
		// 	var link = $(element).find('.basket-item-block-image a').attr('href');
		// 	var title = $(element).find('.basket-item-info-name-link span').text();
		// 	var actual_price = $($(element).find('.basket-item-price-current')[1]).text();
		// 	actual_price = actual_price.substring(0, actual_price.indexOf('руб'));
		// 	var old_price = $(element).find('.basket-item-price-old').text().substring(5);
		// 	old_price = old_price.substring(0, old_price.indexOf('руб'));
		// 	var discount = $(element).find('.basket-item-block-image a').text();
		// 	var count = $(element).find('.basket-item-amount-filed').data('value');
		// 	var id = $(element).data('id');
		// 	var one_item_price = $($(element).find('.basket-item-price-current-text')[0]).text();
		// 	one_item_price = one_item_price.substring(0, one_item_price.indexOf('руб'));
		// 	one_item_price = one_item_price.replace(/\s/g, '');
		// 	$('.cart-block__cart-items-list').append(
		// 		'<div class="cart-block__cart-items-list__item-wrapper" id="'+ id +'" data-one-item-price="'+ one_item_price +'">'
		// 		+'	<div class="cart-block__cart-items-list__item d-table">	'
		// 		+'		<div class="item__image d-table__cell">	<a href="'+link+'"> '		
		// 		+'			<img src="'+image+'" alt=""> </a>'					
		// 		+'		</div>	'
		// 		+'		<div class="cart-block__item__info d-table__cell">	'
		// 		+'			<a href="'+link+'">'+title+'</a>'
		// 		+'			<div class="cart-block__item__meta"></div>'
		// 		+'		</div>'
		// 		+'		<div class="cart-block__item__quantity d-table__cell">'
		// 		+'			<div class="number">'
		// 		+'				<span class="minus">-</span>'
		// 		+'				<input type="text" value="'+count+'" size="5">'
		// 		+'				<span class="plus">+</span>'
		// 		+'			</div>	'
		// 		+'		</div>'
		// 		+'		<div class="cart-block__item__price d-table__cell">	'
		// 		+'			<p class="actual-price price"><span>'+actual_price+'</span> Р</p>'
		// 		+'			<p class="old-price price"><span>'+old_price+'</span> '+ (old_price.trim() ? 'Р' : '') +'</p>'
		// 		+'			<p class="discount-price price">'+ (discount.trim() ? 'Скидка' : '') +' <span>'+discount+' '+ (discount.trim() ? 'Р' : '') +'</span></p>'
		// 		+'		</div>'
		// 		+'		<div class="cart-block__item__btns d-table__cell">	'
		// 		+'			<a href="#">'
		// 		+'				<i class="fa fa-trash" aria-hidden="true"></i>'
		// 		+'			</a>'
		// 		+'		</div>'
		// 		+'	</div>'
		// 		+'</div>'
		// 	);
		// });

		function price(data) {
			data = $.parseJSON(data);
			$(".total-price span").text(data['finish']);
			$(".discount-price span").text(data['discount']);
			$(".cart-block__cart-review .price span").text(data['total']);
			$(".items-counter").text(data['count']);
			$(".header__nav-bar__cart-block__cart-text span").text("(" + data['count'] + ")");
			$.each(data['items'], function(k, v) {
				$("#" + k).find(".price span").text(v);
			});
		}	
		$(document).ready(function() {
			$(".promo-form-block__form__submit").click(function() {
				$.post("/include/ajax/basket.php", {
					code: $(".promo-form-block__form__input").val(),
					ajaxaction: 'promo'
				}, function(data) {
					console.log(data)
					price(data);
				});
			})

			$('.minus').click(function(ev) {
				element = ev.currentTarget;
				var input = $(this).parent().find('input');

				id = $(element).closest('.cart-block__cart-items-list__item-wrapper').attr('id');
				count = parseInt(input.val()) - 1
				if (count < 1) {
					count = 1;
				}

				input.val(count);
				$.post("/include/ajax/basket.php", {
					countbasketid: id,
					count: count,
					ajaxaction: 'update'
				}, function(data) {
					console.log(data)
					price(data);
				});

				return false;
			});

			$('.plus').click(function(ev) {
				element = ev.currentTarget;
				var input = $(this).parent().find('input');

				id = $(element).closest('.cart-block__cart-items-list__item-wrapper').attr('id');
				count = parseInt(input.val()) + 1

				input.val(count);
				$.post("/include/ajax/basket.php", {
					countbasketid: id,
					count: count,
					ajaxaction: 'update'
				}, function(data) {
					console.log(data)
					price(data);
				});

				return false;
			});

			//basket-item-actions-remove visible-xs
			$('.cart-block__item__btns a').click(function(ev) {
				ev.preventDefault();
				element = ev.currentTarget;
				id = $(element).closest('.cart-block__cart-items-list__item-wrapper').attr('id');

				$.post("/include/ajax/basket.php", {
					countbasketid: id,
					ajaxaction: 'delete'
				}, function(data) {
					console.log(data)
				});
				$(element).closest('.cart-block__cart-items-list__item-wrapper').remove();


				if ($('.cart-block__cart-items-list__item-wrapper').length == 0) {
					window.location.href = '/personal/cart/?BasketDelete=1';
				}

			});

		});
	</script>
<? endif; ?>