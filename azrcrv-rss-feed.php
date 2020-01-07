<?php
/**
 * ------------------------------------------------------------------------------
 * Plugin Name: RSS Feed
 * Description: Provides opposite rss feed to that configured in ClassicPress
 * Version: 1.0.1
 * Author: azurecurve
 * Author URI: https://development.azurecurve.co.uk/classicpress-plugins/
 * Plugin URI: https://development.azurecurve.co.uk/classicpress-plugins/rss-feed
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

/**
 * Setup actions and filters.
 *
 * @since 1.0.0
 *
 */
// add actions
add_action('init', 'azrcrv_rssf_init_rss_feed');
add_action('admin_menu', 'azrcrv_rssf_create_admin_menu');

// add filters
add_filter('plugin_action_links', 'azrcrv_rssf_add_plugin_action_link', 10, 2);

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
		$settings_link = '<a href="'.get_bloginfo('wpurl').'/wp-admin/admin.php?page=azrcrv-rssf">'.esc_html__('Settings' ,'rss-feed').'</a>';
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
		<h2><?php echo esc_html(get_admin_page_title()); ?></h2>

		<?php esc_html_e('<p>This plugin provides opposite rss feed to that configured in ClassicPress; e.g. if ClassicPress is configured for summary then an alternative feed called detail will be created, or if ClassicPress is configured for a detailed feed then an alternative feed called summary is created.</p>

		<p>Once active, both summary and detail feeds cab be access using the following paths:', 'rss-feed');

		if (get_option('rss_use_excerpt')){
			echo '<ul><li><li><a href="'.esc_url(site_url()).'/feed">'.esc_url(site_url()).'/feed</a></li><a href="'.esc_url(site_url()).'/feed/detail">'.esc_url(site_url()).'/feed/detail</a></li></ul></p>';
		}else{
			echo '<ul><li><a href="'.esc_url(site_url()).'/feed/summary">'.esc_url(site_url()).'/feed/summary</a></li><li><a href="'.esc_url(site_url()).'/feed">'.esc_url(site_url()).'/feed</a></li></ul></p>';
		}
	?>
	</div>
	<?php
}

?>