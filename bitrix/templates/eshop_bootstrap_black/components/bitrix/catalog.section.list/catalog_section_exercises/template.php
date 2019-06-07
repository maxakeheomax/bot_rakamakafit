<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
$current_section = $arResult['SECTION'];
// echo '<pre>'; var_dump($arResult); echo '</pre>';
?>




<div class="container-fluid exercises-promo-block">
	<div class="row xercises-promo-block_row">
		<div class="col-md-6 exercises-promo-block__left-side">
			<div class="exercises-promo-block__left-side__title"><?= $current_section['NAME'] ?></div>
			<div class="exercises-promo-block__left-side__desc"><?= $current_section['DESCRIPTION'] ?></div>
			<a href="/trainings/exercises/<?= $current_section['CODE'] ?>">
				<div class="exercises-promo-block__left-side__button">
					<span class="exercises-promo-block__left-side__button__text">примеры упражнений</span>
				</div>
			</a>
		</div>
		<div class="col-md-6 exercises-promo-block__right-side">
			<div class="img-block">
				<a href=""> <img class="img-block__eye-button" src="<?= SITE_TEMPLATE_PATH ?>/assets/eye-button.svg" alt=""></a>
				<img class="img-block__exercise-pic" src="<?= CFile::GetPath($current_section['PICTURE']) ?>" alt="">
				<div class="exercises-promo-block__right-side__tabs">
					<ul>
						<? foreach($arResult['SECTIONS'] as $section): ?>
						<a href="/trainings/exercises/<?= $section['CODE'] ?>">
							<li><?= $section['NAME'] ?></li>
						</a>
						<? endforeach; ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<?
$TOP_DEPTH = $arResult["SECTION"]["DEPTH_LEVEL"];
$CURRENT_DEPTH = $TOP_DEPTH;

	

