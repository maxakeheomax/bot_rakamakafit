<? $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}"; ?>
<!-- feedback-block -->
<div class="feedback-block">
    <div class="feedback-block__title">Понравилась статья? Поделись с друзьями!</div>
    <div class="feedback-block__social-buttons">
        <div class="feedback-block__social-buttons__button"><a href="https://vk.com/share.php?url=<?= $actual_link ?>"><img src="<?= SITE_TEMPLATE_PATH ?>/assets/vk-color.svg" alt="vk"></a></div>
        <div class="feedback-block__social-buttons__button"><a href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode($actual_link) ?>"><img src="<?= SITE_TEMPLATE_PATH ?>/assets/fb-color.svg" alt="fb"></a></div>
        <div class="feedback-block__social-buttons__button"><a href="http://twitter.com/share?url=<?= urlencode($actual_link) ?>"><img src="<?= SITE_TEMPLATE_PATH ?>/assets/twt-color.svg" alt="twt"></a></div>
        <div class="feedback-block__social-buttons__button"><img src="" alt=""></div>
    </div>
</div>
<!-- end of feedback-block -->