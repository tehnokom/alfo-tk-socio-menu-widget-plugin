<?php

/** This file is part of TKSocioMenu Widget Plugin project
 *
 * @desc TKSocioMenu Widget class
 * @package TKSocioMenu
 * @version 0.1a
 * @author Ravil Sarvaritdinov <ra9oaj@gmail.com>
 * @copyright 2017 KCFinder Project
 * @license http://opensource.org/licenses/GPL-3.0 GPLv3
 * @license http://opensource.org/licenses/LGPL-3.0 LGPLv3
 * @link https://github.com/tehnokom/alfo-tk-socio-menu-plugin
 */

class TK_Socio_Menu extends WP_Widget
{
    public function __construct()
    {
        $options = array('classname' => 'TK_Socio_Menu',
            'description' => __('The widget allows you to add menus to the social profile of the user', 'tkgp'));
        parent::__construct('tk_socio_menu', 'TK Socio Menu Widget', $options);
    }

    static function register_widget()
    {
        register_widget('TK_Socio_Menu');
    }

    public function form($instance)
    {
        $selected_menu_id = $instance['menu'];
        $select_id = $this->get_field_id('menu');
        $select_name = $this->get_field_name('menu');
        $forgot_id = $this->get_field_id('forgot');
        $forgot_name = $this->get_field_name('forgot');
        $register_id = $this->get_field_id('register');
        $register_name = $this->get_field_name('register');
        $menu_list = wp_get_nav_menus();
        ?>
        <label for="<?php echo $select_id; ?>"><?php echo __('Menu'); ?></label><br>
        <select id="<?php echo $select_id; ?>" name="<?php echo $select_name; ?>">
            <?php

            foreach ($menu_list as $menu) {
                $prop = intval($selected_menu_id) === intval($menu->term_id) ? 'selected="selected"' : '';
                ?>
                <option value="<?php echo $menu->term_id; ?>" <?php echo $prop; ?> >
                    <?php echo $menu->name; ?>
                </option>
                <?php
            }
            ?>
        </select>
        <hr>
        <label for="<?php echo $forgot_id; ?>"><?php echo __('Password recovery link', 'tksm'); ?>:</label><br>
        <input id="<?php echo $forgot_id; ?>" name="<?php echo $forgot_name; ?>" type="text"
               value="<?php echo $instance['forgot']; ?>"><br><br>
        <label for="<?php echo $register_id; ?>"><?php echo __('Link for registration', 'tksm'); ?>:</label><br>
        <input id="<?php echo $register_id; ?>" name="<?php echo $register_name; ?>" type="text"
               value="<?php echo $instance['register']; ?>">
        <?php
    }

    public function update($new_instance, $old_instance)
    {
        $settings['menu'] = $new_instance['menu'];
        if (!empty($new_instance['forgot'])) {
            $settings['forgot'] = esc_url($new_instance['forgot']);
        }

        if (!empty($new_instance['register'])) {
            $settings['register'] = esc_url($new_instance['register']);
        }


        return $settings;
    }

    public function widget($args, $instance)
    {
        $menu_items = self::getMenuItems(intval($instance['menu']));

        add_action('get_footer', array($this, 'load_js_css'));

        require_once(TK_SM_TEMPLATES_ROOT . 'default/menu.php');
    }

    public function load_js_css()
    {
        wp_register_style('tk_sm_template_css', TK_SM_TEMPLATES_URL . 'default/css/style.css');
        wp_enqueue_style('tk_sm_template_css');

        wp_register_script('tk_sm_template_js', TK_SM_TEMPLATES_URL . 'default/js/ui.js', array('jquery'));
        wp_enqueue_script('tk_sm_template_js');
    }

    private static function getMenuItems($menu_id)
    {
        $items = wp_cache_get("tksm_menu_items_{$menu_id}");

        if (!$items) {
            $items = wp_get_nav_menu_items($menu_id, array('output' => ARRAY_A));
            wp_cache_set("tksm_menu_items_{$menu_id}", $items);
        } else {
            $items = $items;
        }

        return $items;
    }
}

;