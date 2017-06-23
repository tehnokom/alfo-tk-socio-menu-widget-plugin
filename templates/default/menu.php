<?php
$author = new BP_Core_User(get_current_user_id());

?>
<div class="s_user_menu">
    <div class="s_user_menu__trigger">
        <div class="s_user_menu__trigger__name"><?php echo $author->fullname; ?></div>
        <?php echo $author->avatar_thumb; ?>
        <!--<img src="" alt="" class="s_user_menu__trigger__photo"/>-->
    </div>
    <div class="s_user_menu__content">
        <a href="<?php echo $author->user_url ?>notifications/" class="s_user_menu__content__link">Уведомления</a>
        <div class="s_user_menu__content__line"></div>
        <a href="/helpo" class="s_user_menu__content__link">Помощь</a>
        <div class="s_user_menu__content__line"></div>
        <a href="<?php echo $author->user_url ?>settings/" class="s_user_menu__content__link">Настройки</a>
        <a href="<?php echo wp_logout_url(); ?>" class="s_user_menu__content__link">Выйти</a>
    </div>
</div>

