<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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


?>

<div class="article-page-content">
	<div class="article-left-column">
		<div class="article-title-block__title">

		<!-- main sider -->
			<div class="article-slider owl-carousel middle-slider owl-theme">
				<? foreach($arResult['PROPERTIES']['PICTURES']['VALUE'] as $image_id): ?>
					<div class="owl-carousel__slider-item" style="background: url('<?= CFile::GetPath( $image_id )?>');background-size: 100% 100%; ">
					</div>
				<? endforeach;?>
			</div>

			<!-- article title block -->
			<div class="article-title-block">
				<div class="article-title-block__title"><?= $arResult['NAME'] ?></div>
				<div class="article-title-block__slogan">
					<?= $arResult['PROPERTIES']['TEXT_INTRO']['~VALUE']['TEXT'] ?>
				</div>
				<!-- block-separation -->
				<div class="block-separation">	</div>						
			</div>
			<!-- end of block-separation -->
		</div>
		<!-- end article title block -->

		<!-- article-main-block -->
		<div class="article-main-block">
			<?= $arResult['DETAIL_TEXT'] ?>
		</div>
		<!-- end of article-main-block -->


		<? CMain::IncludeFile(SITE_DIR.'include/share.php'); ?>
		

</div>

	<div class="article-right-column">
		<!-- article-navigation-block -->
		<div class="article-navigation-block">
			<div class="article-navigation-block__title">Разделы</div>
			<ul class="exercises-list-block__exercises-list">
				<?foreach ($arResult["SECTIONS"] as $key => $section): ?>
					<li><a href="/trainings/articles/<?= $section['CODE'] ?>"><span><?= $section['NAME'] ?></span></a></li>
				<? endforeach; ?>
			</ul>
		</div>
		<!-- end of article-navigation-block -->

		<!-- same articles block -->

		<div class="same-articles-block">	
			<div class="same-articles-block__title">Похожие статьи</div>
			<? foreach ($arResult["SIMILAR"]  as $key => $element):?>
			<? //echo '<pre>'; var_dump($element);?> 
				<a href="/trainings/articles/<?= $element['CODE'] ?>">
					<div class="article special-offer-block__item">
						<img src="<?= CFile::GetPath($element['PREVIEW_PICTURE']) ?>" alt="">
						<div class="special-offer-block__item__title"><?= $element['NAME'] ?></div>
						<div class="special-offer-block__item__desc"><?= $element['PREVIEW_TEXT'] ?></div>
					</div>
				</a>
			<? endforeach; ?>
		</div> 	
		<!-- end of same articles block  -->
	</div>
</div>
<? CMain::IncludeFile(SITE_DIR.'include/subscribe_form_yelow.php'); ?>