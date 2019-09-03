<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");
// define("HIDE_SIDEBAR", true);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("Страница не найдена");?>

	<div class="bx-404-container">
		<div class="bx-404-block"><img src="<?=SITE_DIR?>images/404.png" alt=""></div>
		<div class="bx-404-text-block">Неправильно набран адрес, <br>или такой страницы на сайте больше не существует.</div>
		<div class="">Вернитесь на <a href="<?=SITE_DIR?>">главную</a> или воспользуйтесь картой сайта.</div>
	</div>
	<style>
		.bx-404-block {
			margin-top: 100px;
    		margin-bottom: 66px;
		}
		.bx-404-container {
			width: 100%;
   			margin: 0 auto;
    		text-align: center;
		}
		.bx-404-text-block {
			font-size: 20px;
    		font-family: "Open Sans", "Helvetica Neue", Arial, Helvetica, sans-serif;
    		padding-bottom: 20px;
		}
	</style>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>