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

		</div>
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
			<a href="#">
				<div class="article special-offer-block__item">
					<img src="assets/offer-3.jpg" alt="">
					<div class="special-offer-block__item__title">Новогодний набор с лентами</div>
					<div class="special-offer-block__item__desc">Таким образом рамки и место обучения кадров позволяет оценить значение дальнейших направлений развития.</div>
				</div>
			</a>
			<a href="#">
				<div class="article special-offer-block__item">
					<img src="assets/offer-3.jpg" alt="">
					<div class="special-offer-block__item__title">Новогодний набор с лентами</div>
					<div class="special-offer-block__item__desc">Таким образом рамки и место обучения кадров позволяет оценить значение дальнейших направлений развития.</div>
				</div>
			</a>
		</div> 	
		<!-- end of same articles block  -->
	</div>
</div>