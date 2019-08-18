$(document).ready(function() {
    $(".remove-item").click(function() {
        $target = $(this).closest(".personal-cabinet-block__content__page-item");
        $.get('/bitrix/templates/eshop_bootstrap_black/components/bitrix/sale.personal.section/personal/bitrix/main.profile/.default/ajax.php',
            function(data) {
                $target.slideUp('slow', function(){ $target.remove(); });
            }
        )
    })
});