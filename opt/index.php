<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Опт");
?>
<? $APPLICATION->IncludeComponent(
    "bitrix:breadcrumb",
    "",
    array(
        "PATH" => "",
        "SITE_ID" => SITE_ID,
        "START_FROM" => 0
    )
); ?>
<!-- banner-block -->
<div class="banner-block" style="background:url(<?= SITE_TEMPLATE_PATH ?>/assets/wholesale-top-banner.jpg); background-size:cover">
    <h1>Зарабатывай с нами <br>от 280 000 рублей* в месяц!</h1>
</div>
<!-- end of banner block -->

<!--  text-block -->
<div class="big-width-block center-block">
    <h2>#RAKAMAKAFIT - бренд №1 по продажам фитнес резинок и эспандеров в России и СНГ </h2>
    <span>Наша миссия - дать женщинам простое в обращении, легкое, недорогое и качественное оборудование для того, чтобы быть в отличной форме вне зависимости от обстоятельств. Мы активно сотрудничаем со звездами и известными блоггерами. Более 9000 счастливых обладательниц наборов #RAKAMAKAFIT, более 900 реальных отзывов в Инстаграм.</span>
    <div class="owl-carousel middle-slider owl-theme owl-loaded owl-drag">
        <div class="owl-carousel__slider-item">
            <div class="img-container" style="background:url(<?= SITE_TEMPLATE_PATH ?>/assets/fake-slider.jpg);background-size: cover;"></div>
        </div>
        <div class="owl-carousel__slider-item">
            <div class="img-container" style="background:url(<?= SITE_TEMPLATE_PATH ?>/assets/fake-slider.jpg);background-size: cover;"></div>
        </div>
        <div class="owl-carousel__slider-item">
            <div class="img-container" style="background:url(<?= SITE_TEMPLATE_PATH ?>/assets/fake-slider.jpg);background-size: cover;"></div>
        </div>
        <div class="owl-carousel__slider-item">
            <div class="img-container" style="background:url(<?= SITE_TEMPLATE_PATH ?>/assets/fake-slider.jpg);background-size: cover;"></div>
        </div>
        <div class="owl-carousel__slider-item">
            <div class="img-container" style="background:url(<?= SITE_TEMPLATE_PATH ?>/assets/fake-slider.jpg);background-size: cover;"></div>
        </div>
        <div class="owl-carousel__slider-item">
            <div class="img-container" style="background:url(<?= SITE_TEMPLATE_PATH ?>/assets/fake-slider.jpg);background-size: cover;"></div>
        </div>

    </div>
    <!-- end of  text-block -->
</div>

<!--in-the-know-form-block -->
<div class="wholesale in-the-know-form-block">
    <div class="in-the-know-form-block__title">Получи на e-mail расчет своего ежемесячного заработка</div>
    <div class="in-the-know-form-block__desc">Эспандеры и ленты RAKAMAKAFIT изготовлены из 100% натурального латекса. Он безвреден для аллергиков, детишек и животных. Я сама - мама, и для меня очень важно, чтобы все оборудование было безопасным для моего ребенка.</div>
    <form class="in-the-know-form-block__form" action="#">
        <div class="in-the-know-form-block__form__input-wrapper">
            <label class="full-width" name="name">
                <input class="in-the-know-form-block__form__input" type="text" required pattern="[A-Za-zА-Яа-яЁё]" placeholder='ФИО'>
            </label>
        </div>
        <div class="in-the-know-form-block__form__input-wrapper">
            <label name="mail">
                <input class="in-the-know-form-block__form__input" type="email" required pattern="\S+@[a-z]+.[a-z]+" placeholder='Email'>
            </label>
            <label name="phone">
                <input class="in-the-know-form-block__form__input " type="text" required pattern="([+]\d{11}|\d{11})" placeholder='Телефон'>
            </label>

        </div>
        <div class="in-the-know-form-block__form__input-wrapper">
            <label name="name">
                <input class="in-the-know-form-block__form__input" type="text" placeholder='Набор фитнес лент'>
            </label>
            <label name="mail">
                <input class="in-the-know-form-block__form__input" type="email" placeholder='Количество'>
            </label>

        </div>
        <div class="in-the-know-form-block__form__input-checkbox-wrapper">
            <p class="in-the-know-form-block__form__checkbox-desc">Нажимая на кнопку, вы даете согласие на <a class="how-start-block__help-link" href="#">обработку персональных данных</a>.</p>
            <button class="in-the-know-form-block__form__submit" type="submit">получить прайс</button>
        </div>

    </form>
</div>
<!--  text-block -->
<div class="big-width-block center-block">
    <h2>#RAKAMAKAFIT - бренд №1 в Инстаграм</h2>
    <span>
        ★ Бесплатная доставка по Москве для оптовых клиентов.
        <br>
        ★ Более 9000 счастливых обладательниц наборов #RAKAMAKAFIT, более 900 реальных отзывов в Инстаграм.
        <br>
        ★ Активное сотрудничество со звездами и известными блоггерами
        <br>
        ★ RAKAMAKAFIT – это модно! Нас знают по всему миру: от США до Эфиопии.
        <br>
        ★ Гарантия качества продукции. Все материалы абсолютно безопасны и отличаются высокой прочностью.
        <br>
        ★ Быстрая и надежная доставка в любой уголок России.
    </span>
    <div class="owl-carousel middle-slider owl-theme owl-loaded owl-drag">
        <div class="owl-carousel__slider-item">
            <div class="img-container" style="background:url(<?= SITE_TEMPLATE_PATH ?>/assets/block2-1.jpg);background-size: cover;"></div>
        </div>
        <div class="owl-carousel__slider-item">
            <div class="img-container" style="background:url(<?= SITE_TEMPLATE_PATH ?>/assets/block2-2.jpg);background-size: cover;"></div>
        </div>
    </div>
</div>

<!-- end of  text-block -->
</div>
<!-- CEO-text-block -->
<div class=" wholesale big-block ceo-text-block">
    <div class="ceo-text-block__content">
        <div class="ceo-text-block__title">Активное продвижение в Инстаграм</div>
        <div class="tabs">
            <ul>
                <a class="ceo-text-blocke__tab" id="@RAKAMAKA.FIT">
                    <li>
                        @RAKAMAKA.FIT
                    </li>
                </a>
                <a class="ceo-text-blocke__tab active" id="@WORKOUT_MASHA">
                    <li>
                        @WORKOUT_MASHA
                    </li>
                </a>
                <a class="ceo-text-blocke__tab" id="@SANZHLENA_ZOZH">
                    <li>
                        @SANZHLENA_ZOZH
                    </li>
                </a>
            </ul>
        </div>

        <div class="img-link-block hidden-block" id="@RAKAMAKA.FIT">
            <div class="img-container" style="background:url(<?= SITE_TEMPLATE_PATH ?>/assets/inst_img.jpg);background-size: cover;"></div>
            <a href="#"><button class="in-the-know-form-block__form__submit" type="submit">перейти</button></a>
        </div>

        <div class="img-link-block " id="@WORKOUT_MASHA">
            <div class="img-container" style="background:url(<?= SITE_TEMPLATE_PATH ?>/assets/fake-slider.jpg);background-size: cover;"></div>
            <a href="#"><button class="in-the-know-form-block__form__submit" type="submit">перейти</button></a>
        </div>

        <div class="img-link-block hidden-block" id="@SANZHLENA_ZOZH">
            <div class="img-container" style="background:url(<?= SITE_TEMPLATE_PATH ?>/assets/inst_img.jpg);background-size: cover;"></div>
            <a href="#"><button class="in-the-know-form-block__form__submit" type="submit">перейти</button></a>
        </div>
    </div>
</div>

<!-- end of CEO-text-block -->
<div class="big-width-block center-block" id="text-block">
    <h2>Собственное производство #RAKAMAKAFIT</h2>
    <span>Заглянем в наше самое сокровенное место - на фабрику Rakamakafit. Эспандеры RAKAMAKAFIT сделаны из двухслойного латекса высокого качества. Их просто невозможно порвать! </span>
    <div class="owl-carousel owl-theme">
        <div class="owl-carousel__slider-item">
            <div class="img-container" style="background:url(<?= SITE_TEMPLATE_PATH ?>/assets/fabrika1.jpg);background-size: cover;"></div>
        </div>
        <div class="owl-carousel__slider-item">
            <div class="img-container" style="background:url(<?= SITE_TEMPLATE_PATH ?>/assets/fabrika2.jpg);background-size: cover;"></div>
        </div>
        <div class="owl-carousel__slider-item">
            <div class="img-container" style="background:url(<?= SITE_TEMPLATE_PATH ?>/assets/fabrika3.jpg);background-size: cover;"></div>
        </div>



    </div>
</div>
<!-- footer -->

<script>
    function toggleTabs(clickBlock, toggleBlock) {
        $(clickBlock).click(function(e) {
            let a
            let b = $(this).attr('id');
            e.preventDefault();

            $(clickBlock).removeClass('active');
            $(this).addClass('active');

            $(toggleBlock).each(function() {
                a = $(this).attr('id');
                if (b === a) {
                    $(toggleBlock).addClass('hidden-block');
                    $(this).removeClass('hidden-block');
                }
            });
        });
    }
    toggleTabs('.ceo-text-blocke__tab', '.img-link-block');

    $('.owl-carousel').owlCarousel({
        items: 1,
        lazyLoad: true,
        loop: true,
        margin: 10,
        smartSpeed: 800,
        dots: true,
        nav: true,
        navText: [`<img src="<?= SITE_TEMPLATE_PATH ?>/assets/nav-arrow-left.svg">`,
            `<img src="<?= SITE_TEMPLATE_PATH ?>/assets/nav-arrow-right.svg">`
        ],
    });
</script>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>