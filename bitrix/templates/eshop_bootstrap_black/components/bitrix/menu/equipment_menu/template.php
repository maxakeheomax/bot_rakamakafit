<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$theme = COption::GetOptionString("main", "wizard_eshop_bootstrap_theme_id", "blue", SITE_ID);
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

if (empty($arResult))
	return;
?>
<ul class="header__inner-nav-bar__navs header__inner-nav-bar__navs--black-text">
	<li class="header__inner-nav-bar__navs-item"><a href="/catalog/" class="header__inner-nav-bar__navs-item__link inner-nav-bar__navs-item__link--active">Все товары</a></li>
	<? foreach ($arResult as $itemIdex => $arItem) : ?>
		<? if ($arItem["DEPTH_LEVEL"] == "1") : ?>
			<li class="header__inner-nav-bar__navs-item">
				<a href="<?= htmlspecialcharsbx($arItem["LINK"]) ?>" class="header__inner-nav-bar__navs-item__link <?= ($arItem["SELECTED"]) ? "nav-bar__navs-item__link--active" : ""; ?>"><?= htmlspecialcharsbx($arItem["TEXT"]) ?></a>
			</li>
		<? endif ?>
	<? endforeach; ?>
</ul>