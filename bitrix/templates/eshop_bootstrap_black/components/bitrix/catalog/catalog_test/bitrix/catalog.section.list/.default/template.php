<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>


<?
$TOP_DEPTH = $arResult["SECTION"]["DEPTH_LEVEL"];
$CURRENT_DEPTH = $TOP_DEPTH;
if($arResult["SECTION"]["DEPTH_LEVEL"] === 0):?>

<div class="product-catalog exercises-tabs-block">
	<div class="exercises-tabs-block__title">Категории товаров</div>
	<div class="exercises-tabs-block__tabs">
	<?foreach($arResult["SECTIONS"] as $arSection):
		if($arResult["SECTION"]["DEPTH_LEVEL"] < 2):
		$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_EDIT"));
		$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_DELETE"), array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM')));
		if($CURRENT_DEPTH < $arSection["DEPTH_LEVEL"])
			echo "\n",str_repeat("\t", $arSection["DEPTH_LEVEL"]-$TOP_DEPTH),"<ul>";
		elseif($CURRENT_DEPTH == $arSection["DEPTH_LEVEL"])
			echo "</li>";
		else
		{
			while($CURRENT_DEPTH > $arSection["DEPTH_LEVEL"])
			{
				echo "</li>";
				echo "\n",str_repeat("\t", $CURRENT_DEPTH-$TOP_DEPTH),"</ul>","\n",str_repeat("\t", $CURRENT_DEPTH-$TOP_DEPTH-1);
				$CURRENT_DEPTH--;
			}
			echo "\n",str_repeat("\t", $CURRENT_DEPTH-$TOP_DEPTH),"</li>";
		}

		echo "\n",str_repeat("\t", $arSection["DEPTH_LEVEL"]-$TOP_DEPTH);
		?>
		<li id="<?=$this->GetEditAreaId($arSection['ID']);?>">
			<a href="<?=$arSection["SECTION_PAGE_URL"]?>">
				<?=$arSection["NAME"]?>
				(<?=$arSection["ELEMENT_CNT"]?>)
			</a>
			<?
		$CURRENT_DEPTH = $arSection["DEPTH_LEVEL"];
		endif;
	endforeach;
	while($CURRENT_DEPTH > $TOP_DEPTH)
	{
		echo "</li>";
		echo "\n",str_repeat("\t", $CURRENT_DEPTH-$TOP_DEPTH),"</ul>","\n",str_repeat("\t", $CURRENT_DEPTH-$TOP_DEPTH-1);
		$CURRENT_DEPTH--;
	}?>
	</div>
</div>
<?endif;?>
