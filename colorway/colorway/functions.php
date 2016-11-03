<?php
ob_start();
include_once get_template_directory() . '/functions/inkthemes-functions.php';
include_once get_template_directory() . '/functions/admin-functions.php';
include_once get_template_directory() . '/functions/admin-interface.php';
include_once get_template_directory() . '/functions/theme-options.php';
include_once get_template_directory() . '/functions/themes-page.php';
//get the theme option from options array
function inkthemes_get_option($name) {
    $options = get_option('inkthemes_options');
    if (isset($options[$name]))
        return $options[$name];
}
// Save all option in single array
function inkthemes_save_option($option) {
    return update_option('inkthemes_options', $option);
}
//update theme option
function inkthemes_update_option($name, $value) {
    $options = get_option('inkthemes_options');
    $options[$name] = $value;
    return update_option('inkthemes_options', $options);
}
//delete theme option
function inkthemes_delete_option($name) {
    $options = get_option('inkthemes_options');
    unset($options[$name]);
    return update_option('inkthemes_options', $options);
}
$inkthemes_backup_data = get_option('inkthemes_backup_data');
if (!$inkthemes_backup_data) {
    $colorway_options = get_option('colorway');
    $inkthemes_options = get_option('inkthemes_options');
    if (!empty($colorway_options) && empty($inkthemes_options)) {
        foreach ($colorway_options as $key => $val) {
            inkthemes_update_option($key, $val);
        }
        update_option('inkthemes_backup_data', '1');
    } elseif (!empty($inkthemes_options)) {
        foreach ($colorway_options as $key => $val) {
            $previous_value = inkthemes_get_option($key);
            if ($previous_value == '') {
                inkthemes_update_option($key, $val);
            }
        }
        update_option('inkthemes_backup_data', '1');
    } elseif (empty($colorway_options) && empty($inkthemes_options)) {
        update_option('inkthemes_backup_data', '1');
    }
}
/* ----------------------------------------------------------------------------------- */
/* Styles Enqueue */
/* ----------------------------------------------------------------------------------- */
function inkthemes_add_stylesheet() {
    if (!is_admin()) {
		wp_enqueue_style('inkthemes_reset_stylesheet', get_template_directory_uri() . "/css/reset.css", '', '', 'all');
		wp_enqueue_style('inkthemes_responsive_stylesheet', get_template_directory_uri() . "/css/960_24_col_responsive.css", '', '', 'all');
        wp_enqueue_style('inkthemes_stylesheet', get_template_directory_uri() . "/style.css", '', '', 'all');
        wp_enqueue_style('inkthemes_superfish', get_template_directory_uri() . "/css/superfish.css", '', '', 'all');
        wp_enqueue_style('inkthemes-media', get_template_directory_uri() . "/css/media.css", '', '', 'all');
    }
}
add_action('init', 'inkthemes_add_stylesheet');
/* ----------------------------------------------------------------------------------- */
/* jQuery Enqueue */
/* ---------------------------------------------------------------------------------- */
function inkthemes_wp_enqueue_scripts() {
    if (!is_admin()) {
        wp_enqueue_script('jquery');
        wp_enqueue_script('inkthemes_sfish', get_template_directory_uri() . "/js/superfish.js", array('jquery'));
        wp_enqueue_script('inkthemes_tipsy', get_template_directory_uri() . '/js/jquery.tipsy.js', array('jquery'));
        wp_enqueue_script('inkthemes-responsive-menu-2', get_template_directory_uri() . '/js/menu/jquery.meanmenu.2.0.min.js', array('jquery'));
        wp_enqueue_script('inkthemes-responsive-menu-2-options', get_template_directory_uri() . '/js/menu/jquery.meanmenu.options.js', array('jquery'));
        wp_enqueue_script('inkthemes_custom', get_template_directory_uri() . '/js/custom.js', array('jquery'));
    } elseif (is_admin()) {
        
    }
}
add_action('wp_enqueue_scripts', 'inkthemes_wp_enqueue_scripts');
/**
 * Enqueues the javascript for comment replys 
 * 
 * */
function inkthemes_enqueue_scripts() {
    if (is_singular() and get_site_option('thread_comments')) {
        wp_print_scripts('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'inkthemes_enqueue_scripts');
//Front Page Rename
$get_status = inkthemes_get_option('re_nm');
$get_file_ac = get_template_directory() . '/front-page.php';
$get_file_dl = get_template_directory() . '/front-page-hold.php';
//True Part
if ($get_status === 'off' && file_exists($get_file_ac)) {
    rename("$get_file_ac", "$get_file_dl");
}
//False Part
if ($get_status === 'on' && file_exists($get_file_dl)) {
    rename("$get_file_dl", "$get_file_ac");
}
/**
 * Load plugin notification file
 */
require_once(get_template_directory() . '/functions/plugin-activation.php');
require_once(get_template_directory() . '/functions/inkthemes-plugin-notify.php');
add_action('tgmpa_register', 'inkthemes_plugins_notify');
ob_clean();
?>