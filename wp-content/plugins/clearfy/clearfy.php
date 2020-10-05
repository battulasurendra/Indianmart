<?php
	/**
	 * Plugin Name: Webcraftic Clearfy - disable unused features
	 * Plugin URI: https://wordpress.org/plugins/clearfy/
	 * Description: Disables unused Wordpress features, improves performance and increases SEO rankings, using Clearfy, which makes WordPress very easy.
	 * Author: Webcraftic <wordpress.webraftic@gmail.com>
	 * Version: 1.1.7
	 * Text Domain: clearfy
	 * Domain Path: /languages/
	 */

	if( defined('WBCR_CLEARFY_PLUGIN_ACTIVE') ) {
		return;
	}
	define('WBCR_CLEARFY_PLUGIN_ACTIVE', true);

	define('WBCR_CLR_PLUGIN_DIR', dirname(__FILE__));
	define('WBCR_CLR_PLUGIN_BASE', plugin_basename(__FILE__));
	define('WBCR_CLR_PLUGIN_URL', plugins_url(null, __FILE__));

	

	// creating a plugin via the factory
	require_once(WBCR_CLR_PLUGIN_DIR . '/libs/factory/core/boot.php');

	add_action('plugins_loaded', 'wbcr_clearfy_plugin_init');

	function wbcr_clearfy_plugin_init()
	{
		global $wbcr_clearfy_plugin;

		// Localization plugin
		load_plugin_textdomain('clearfy', false, dirname(WBCR_CLR_PLUGIN_BASE) . '/languages/');

		$wbcr_clearfy_plugin = new Factory326_Plugin(__FILE__, array(
			'name' => 'wbcr_clearfy',
			'title' => __('Clearfy', 'clearfy'),
			'version' => '1.1.7',
			'host' => 'wordpress.org',
			'url' => 'https://wordpress.org/plugins/clearfy/',
			'assembly' => 'free',
			'updates' => WBCR_CLR_PLUGIN_DIR . '/updates/'
		));

		// requires factory modules
		$wbcr_clearfy_plugin->load(array(
			array('libs/factory/bootstrap', 'factory_bootstrap_330', 'admin'),
			array('libs/factory/forms', 'factory_forms_329', 'admin'),
			array('libs/factory/notices', 'factory_notices_323', 'admin'),
			array('libs/factory/pages', 'factory_pages_322', 'admin'),
			array('libs/factory/clearfy', 'factory_clearfy_101', 'all'),
		));

		require(WBCR_CLR_PLUGIN_DIR . '/includes/functions.php');

		// loading other files
		if( is_admin() ) {
			require(WBCR_CLR_PLUGIN_DIR . '/admin/boot.php');
		}

		require(WBCR_CLR_PLUGIN_DIR . '/includes/classes/class.configurate-code-clean.php');
		require(WBCR_CLR_PLUGIN_DIR . '/includes/classes/class.configurate-privacy.php');
		require(WBCR_CLR_PLUGIN_DIR . '/includes/classes/class.configurate-security.php');
		require(WBCR_CLR_PLUGIN_DIR . '/includes/classes/class.configurate-seo.php');
		require(WBCR_CLR_PLUGIN_DIR . '/includes/classes/class.configurate-advanced.php');

		new WbcrClearfy_ConfigCodeClean($wbcr_clearfy_plugin);
		new WbcrClearfy_ConfigPrivacy($wbcr_clearfy_plugin);
		new WbcrClearfy_ConfigSecurity($wbcr_clearfy_plugin);
		new WbcrClearfy_ConfigSeo($wbcr_clearfy_plugin);
		new WbcrClearfy_ConfigAdvanced($wbcr_clearfy_plugin);

		/**
		 * Include plugin components
		 */
		$wbcr_clearfy_plugin->loadAddons(array(
			'updates_manager' => WBCR_CLR_PLUGIN_DIR . '/components/updates-manager/webcraftic-updates-manager.php',
			'comments_plus' => WBCR_CLR_PLUGIN_DIR . '/components/comments-plus/comments-plus.php',
			'gonzales' => WBCR_CLR_PLUGIN_DIR . '/components/assets-manager/gonzales.php'
		));
	}

	/**
	 * Activates the plugin.
	 *
	 * TThe activation hook has to be registered before loading the plugin.
	 * The deactivateion hook can be registered in any place (currently in the file plugin.class.php).
	 */
	/*function wbcr_clearfy_plugin_activation()
	{
		if( !current_user_can('activate_plugins') ) {
			wp_die(__('You do not have sufficient permissions to activate plugins for this site.'));
		}

		wbcr_clearfy_plugin_init();

		global $wbcr_clearfy_plugin;
		$wbcr_clearfy_plugin->activate();
	}

	register_activation_hook(__FILE__, 'wbcr_clearfy_plugin_activation');*/