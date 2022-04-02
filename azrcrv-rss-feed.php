<?php
/**
 * ------------------------------------------------------------------------------
 * Plugin Name: RSS Feed
 * Description: Provides opposite rss feed to that configured in ClassicPress
 * Version: 1.2.3
 * Author: azurecurve
 * Author URI: https://development.azurecurve.co.uk/classicpress-plugins/
 * Plugin URI: https://development.azurecurve.co.uk/classicpress-plugins/rss-feed/
 * Text Domain: rss-feed
 * Domain Path: /languages
 * ------------------------------------------------------------------------------
 * This is free software released under the terms of the General Public License,
 * version 2, or later. It is distributed WITHOUT ANY WARRANTY; without even the
 * implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. Full
 * text of the license is available at https://www.gnu.org/licenses/gpl-2.0.html.
 * ------------------------------------------------------------------------------
 */

// Prevent direct access.
if (!defined('ABSPATH')){
	die();
}

// include plugin menu
require_once(dirname( __FILE__).'/pluginmenu/menu.php');
add_action('admin_init', 'azrcrv_create_plugin_menu_rssf');

// include update client
require_once(dirname(__FILE__).'/libraries/updateclient/UpdateClient.class.php');

/**
 * Setup actions and filters.
 *
 * @since 1.0.0
 *
 */
// add actions
add_action('init', 'azrcrv_rssf_init_rss_feed');
add_action('admin_menu', 'azrcrv_rssf_create_admin_menu');
add_action('plugins_loaded', 'azrcrv_rssf_load_languages');

// add filters
add_filter('plugin_action_links', 'azrcrv_rssf_add_plugin_action_link', 10, 2);
add_filter('codepotent_update_manager_image_path', 'azrcrv_rssf_custom_image_path');
add_filter('codepotent_update_manager_image_url', 'azrcrv_rssf_custom_image_url');

/**
 * Load language files.
 *
 * @since 1.0.0
 *
 */
function azrcrv_rssf_load_languages() {
    $plugin_rel_path = basename(dirname(__FILE__)).'/languages';
    load_plugin_textdomain('rss-feed', false, $plugin_rel_path);
}

/**
 * initialise rss feed
 *
 * @since 1.0.0
 *
 */
function azrcrv_rssf_init_rss_feed(){
	
	if (get_option('rss_use_excerpt')){
		$rss_type = 'detail';
	}else{
		$rss_type = 'summary';
	}
	add_feed($rss_type, 'create_rss_feed');
	
	//Ensure the $wp_rewrite global is loaded
	global $wp_rewrite;
	//Call flush_rules() as a method of the $wp_rewrite object
	$wp_rewrite->flush_rules(false);
}

/**
 * Create alternate rss feed
 *
 * @since 1.0.0
 *
 */
function azrcrv_rssf_create_rss_feed(){
	load_template(plugin_dir_path(__FILE__).'templates/rss_feed2.php');
}

/**
 * Custom plugin image path.
 *
 * @since 1.2.0
 *
 */
function azrcrv_rssf_custom_image_path($path){
    if (strpos($path, 'azrcrv-rss-feed') !== false){
        $path = plugin_dir_path(__FILE__).'assets/pluginimages';
    }
    return $path;
}

/**
 * Custom plugin image url.
 *
 * @since 1.2.0
 *
 */
function azrcrv_rssf_custom_image_url($url){
    if (strpos($url, 'azrcrv-rss-feed') !== false){
        $url = plugin_dir_url(__FILE__).'assets/pluginimages';
    }
    return $url;
}

/**
 * Add RSS Feed action link on plugins page.
 *
 * @since 1.0.0
 *
 */
function azrcrv_rssf_add_plugin_action_link($links, $file){
	static $this_plugin;

	if (!$this_plugin){
		$this_plugin = plugin_basename(__FILE__);
	}

	if ($file == $this_plugin){
		$settings_link = '<a href="'.admin_url('admin.php?page=azrcrv-rssf').'"><img src="'.plugins_url('/pluginmenu/images/logo.svg', __FILE__).'" style="padding-top: 2px; margin-right: -5px; height: 16px; width: 16px;" alt="azurecurve" />'.esc_html__('Settings' ,'rss-feed').'</a>';
		array_unshift($links, $settings_link);
	}

	return $links;
}

/**
 * Add RSS Feed menu to plugin menu.
 *
 * @since 1.0.0
 *
 */
function azrcrv_rssf_create_admin_menu(){
	//global $admin_page_hooks;
	
	add_submenu_page("azrcrv-plugin-menu"
						,esc_html__("RSS Feed Settings", "rss-feed")
						,esc_html__("RSS Feed", "rss-feed")
						,'manage_options'
						,'azrcrv-rssf'
						,'azrcrv_rssf_settings');
}

/**
 * Display Settings page.
 *
 * @since 1.0.0
 *
 */
function azrcrv_rssf_settings(){
	if (!current_user_can('manage_options')){
		$error = new WP_Error('not_found', esc_html__('You do not have sufficient permissions to access this page.' , 'rss-feed'), array('response' => '200'));
		if(is_wp_error($error)){
			wp_die($error, '', $error->get_error_data());
		}
	}
	?>
	<div id="azrcrv-rssf-general" class="wrap">
		<h1>
			<?php
				echo '<a href="https://development.azurecurve.co.uk/classicpress-plugins/"><img src="'.plugins_url('/pluginmenu/images/logo.svg', __FILE__).'" style="padding-right: 6px; height: 20px; width: 20px;" alt="azurecurve" /></a>';
				esc_html_e(get_admin_page_title());
			?>
		</h1>

		<?php esc_html_e('This plugin provides opposite rss feed to that configured in ClassicPress; e.g. if ClassicPress is configured for summary then an alternative feed called detail will be created, or if ClassicPress is configured for a detailed feed then an alternative feed called summary is created. Once active, both summary and detail feeds can be access using the following paths:', 'rss-feed');

		if (get_option('rss_use_excerpt')){
			echo '<ul><li><li><a href="'.esc_url(site_url()).'/feed">'.esc_url(site_url()).'/feed</a></li><a href="'.esc_url(site_url()).'/feed/detail">'.esc_url(site_url()).'/feed/detail</a></li></ul>';
		}else{
			echo '<ul><li><a href="'.esc_url(site_url()).'/feed/summary">'.esc_url(site_url()).'/feed/summary</a></li><li><a href="'.esc_url(site_url()).'/feed">'.esc_url(site_url()).'/feed</a></li></ul>';
		}
	?>
	</div>
	<?php
}

?>