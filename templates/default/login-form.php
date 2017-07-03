<?php
wp_login_form();

if (!empty($instance['forgot'])) {
    ?>
    <a href="<?php echo $instance['forgot']; ?>"><?php echo __('Lost Password'); ?></a>
    <?php
}

if (!empty($instance['register'])) {
    ?>
    <a href="<?php echo $instance['register']; ?>"><?php echo __('Register'); ?></a>
    <?php
}
?>