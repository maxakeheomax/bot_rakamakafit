<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
$current_section = $arResult['SECTIONS'][0];
unset( $arResult['SECTIONS'][0] );
echo '<pre>'; var_dump($current_section); echo '</pre>';
?>




<div class="container-fluid exercises-promo-block">
	<div class="row xercises-promo-block_row">
		<div class="col-md-6 exercises-promo-block__left-side">
			<div class="exercises-promo-block__left-side__title"><?= $current_section['NAME'] ?></div>
			<div class="exercises-promo-block__left-side__desc"><?= $current_section ?>Мы собрали для тебя примеры самых убойных
				упражений с фитнес лентами на любую группу мышц</div>
			<a href="#">
				<div class="exercises-promo-block__left-side__button">
					<span class="exercises-promo-block__left-side__button__text">примеры упражнений</span>
				</div>
			</a>
		</div>
		<div class="col-md-6 exercises-promo-block__right-side">
			<div class="img-block">
				<a href="#"> <img class="img-block__eye-button" src="assets/eye-button.svg" alt=""></a>
				<img class="img-block__exercise-pic" src="assets/exercises-promo.jpg" alt="">
				<div class="exercises-promo-block__right-side__tabs">
					<ul>
						<a href="#">
							<li>спина</li>
						</a>
						<a href="#">
							<li>ягодицы</li>
						</a>
						<a href="#">
							<li>руки</li>
						</a>
						<a href="#">
							<li>плечи</li>
						</a>
						<a href="#">
							<li>ноги</li>
						</a>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<?
$TOP_DEPTH = $arResult["SECTION"]["DEPTH_LEVEL"];
$CURRENT_DEPTH = $TOP_DEPTH;

	
	// foreach($arResult["SECTIONS"] as $arSection):
	// 	$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_EDIT"));
	// 	$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_DELETE"), array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM')));
	// 	if($CURRENT_DEPTH < $arSection["DEPTH_LEVEL"])
	// 		echo "\n",str_repeat("\t", $arSection["DEPTH_LEVEL"]-$TOP_DEPTH),"<ul>";
	// 	elseif($CURRENT_DEPTH == $arSection["DEPTH_LEVEL"])
	// 		echo "</li>";
	// 	else
	// 	{
	// 		while($CURRENT_DEPTH > $arSection["DEPTH_LEVEL"])
	// 		{
	// 			echo "</li>";
	// 			echo "\n",str_repeat("\t", $CURRENT_DEPTH-$TOP_DEPTH),"</ul>","\n",str_repeat("\t", $CURRENT_DEPTH-$TOP_DEPTH-1);
	// 			$CURRENT_DEPTH--;
	// 		}
	// 		echo "\n",str_repeat("\t", $CURRENT_DEPTH-$TOP_DEPTH),"</li>";
	// 	}

	// 	echo "\n",str_repeat("\t", $arSection["DEPTH_LEVEL"]-$TOP_DEPTH);
	// 	?>
	<!-- // 	<li id="<?=$this->GetEditAreaId($arSection['ID']);?>">
	// 		<a href="<?=$arSection["SECTION_PAGE_URL"]?>">
	// 			<?=$arSection["NAME"]?>
	// 			(<?=$arSection["ELEMENT_CNT"]?>)
	// 		</a> -->
		<?
	// 	$CURRENT_DEPTH = $arSection["DEPTH_LEVEL"];
	// endforeach;
	// while($CURRENT_DEPTH > $TOP_DEPTH)
	// {
	// 	echo "</li>";
	// 	echo "\n",str_repeat("\t", $CURRENT_DEPTH-$TOP_DEPTH),"</ul>","\n",str_repeat("\t", $CURRENT_DEPTH-$TOP_DEPTH-1);
	// 	$CURRENT_DEPTH--;
	// }
	?>

