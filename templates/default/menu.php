<?php

define('TK_SM_TEMPLATE_ROOT', plugin_dir_path(__FILE__));
define('TK_SM_TEMPLATE_URL', plugin_dir_url(__FILE__));

$is_logged = is_user_logged_in();
$additional_class = $is_logged ? '' : 's_login_form';
$author = null;

?>
<div class="s_user_menu">
    <div class="s_user_menu__trigger">
        <?php if ($is_logged) {
            if (defined('BP_PLUGIN_DIR')) {
                $author = new BP_Core_User(get_current_user_id());
            } else {
                $current_user_id = get_current_user_id();
                $user_info = get_userdata($current_user_id);
                $author = (object)array('avatar_thumb' => '<img src="'
                    . get_avatar_url($current_user_id)
                    . '" class="avatar avatar-50">',
                    'fullname' => "{$user_info->last_name} {$user_info->first_name}"
                );
            }
            ?>
            <div class="s_user_menu__trigger__name"><?php echo $author->fullname; ?></div>
            <?php echo $author->avatar_thumb; ?>
        <?php } else { ?>
            <div class="s_user_menu__trigger__name"><?php echo __('Log In'); ?></div>
            <img src="<?php echo TK_SM_TEMPLATE_URL . 'images/login-avatar.png'; ?>" class="avatar avatar-50">
        <?php } ?>
    </div>
    <div class="s_user_menu__content <?php echo $additional_class; ?>">
        <?php if ($is_logged) {
            foreach ($menu_items as $menu_item) {
                if ($menu_item->url !== '#') {
                    ?>
                    <a href="<?php echo $menu_item->url ?>" class="s_user_menu__content__link">
                        <?php echo $menu_item->title ?>
                    </a>
                    <?php
                } else {
                    ?>
                    <div class="s_user_menu__content__line"></div>
                    <?php
                }
            }
        } else {
            require_once(TK_SM_TEMPLATE_ROOT . 'login-form.php');
        } ?>
    </div>
</div>
