<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>


<?
if($arResult['SECTION']["DEPTH_LEVEL"] === 0):
//  echo '<pre>'; var_dump($arResult["SECTIONS"]); echo '</pre>';
?>

<!-- exercises-tabs-block -->
<div class="product-catalog exercises-tabs-block">
	<div class="exercises-tabs-block__title">Категории товаров</div>
	<div class="exercises-tabs-block__tabs">
	<?	
	foreach($arResult["SECTIONS"] as $arSection):
			if($arSection["DEPTH_LEVEL"] == 1):
			$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_EDIT"));
			$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_DELETE"), array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM')));
			?>
			
			<a href="<?= $arSection['SECTION_PAGE_URL']?>"><div class="exercises-tabs-block__tabs__item " style="background-image:url('<?= $arSection['PICTURE']['SRC'] ?>'); background-size: cover;"><p><?= $section['NAME'] ?></p></div></a>					
			<?
		endif;
	endforeach;
?>
	</div>
</div>
<?endif;?>
