<?
CModule::IncludeModule("iblock");
$sections_db = \CIBlockSection::GetList([], ['IBLOCK_ID' => '15']);
// $aMenuLinks = [];
// echo '<pre>'; var_dump($sections_db->Fetch(),$sections_db->Fetch(),$sections_db->Fetch(),$sections_db->Fetch(),$sections_db->Fetch(),$sections_db->Fetch(),$sections_db->Fetch(),$sections_db->Fetch(),$sections_db->Fetch(),$sections_db->Fetch(),$sections_db->Fetch(),$sections_db->Fetch(),$sections_db->Fetch(),$sections_db->Fetch(),$sections_db->Fetch(),$sections_db->Fetch(),$sections_db->Fetch(),$sections_db->Fetch(),$sections_db->Fetch()); die;
// while($section = $sections_db->Fetch()){
// 	if($section['DEPTH_LEVEL'] === "1")
// 	$aMenuLinks[] = [
// 		$section['NAME'], 
// 		'catalog/'.$section['CODE'].'/', 
// 		[],
// 		[],
// 		''
// 	];
// }
$aMenuLinks = [
	[
		"Фитнес ленты",
		"catalog/fitnes_lenty/",
		[],
		[],
		""
	],
	[
		"Эспандеры",
		"catalog/espandery/",
		[],
		[],
		""
	],
	[
		"Фитбол",
		"catalog/fitbol/",
		[],
		[],
		""
	],
	[
		"Наборы",
		"catalog/nabory/",
		[],
		[],
		""
	],
	// [
	// 	"Питание",
	// 	"catalog/pitanie/",
	// 	[],
	// 	[],
	// 	""
	// ],
	[
		"Дневник тренировок",
		"catalog/drugoe/",
		[],
		[],
		""
	],
];
?>