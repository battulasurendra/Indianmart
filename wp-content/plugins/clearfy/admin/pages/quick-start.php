<?php
	
	/**
	 * The page Settings.
	 *
	 * @since 1.0.0
	 */
	class WbcrClr_QuickStartPage extends WbcrClr_Page {
		
		/**
		 * The id of the page in the admin menu.
		 *
		 * Mainly used to navigate between pages.
		 * @see FactoryPages322_AdminPage
		 *
		 * @since 1.0.0
		 * @var string
		 */
		public $id = "quick_start";
		
		public $page_menu_dashicon = 'dashicons-performance';
		
		public $page_menu_position = 100;
		
		public $internal = false;
		
		public $addLinkToPluginActions = true;
		
		//public $menuIcon = '\f321';
		
		public $type = 'page';
		
		public function __construct(Factory326_Plugin $plugin)
		{
			$this->menuTitle = __('Clearfy menu', 'clearfy');
			
			parent::__construct($plugin);
		}
		
		public function getMenuTitle()
		{
			return __('Quick start', 'clearfy');
		}
		
		/**
		 * Requests assets (js and css) for the page.
		 *
		 * @see FactoryPages322_AdminPage
		 *
		 * @since 1.0.0
		 * @return void
		 */
		public function assets($scripts, $styles)
		{
			parent::assets($scripts, $styles);
			
			$this->scripts->add(WBCR_CLR_PLUGIN_URL . '/admin/assets/js/general.js');
			
			$params = array(
				'ajaxurl' => admin_url('admin-ajax.php'),
				'ajax_nonce' => wp_create_nonce('wbcr_clearfy_ajax_quick_start_nonce'),
			);
			wp_localize_script('jquery', 'wbcr_clearfy_ajax', $params);
		}
		
		/**
		 * Shows the description above the options.
		 *
		 * @since 1.0.0
		 * @return void
		 */
		public function _showHeader()
		{
			?>
			<div class="wbcr-clearfy-header">
				<?php _e('On this page you can quickly configure the plug-in without going into details.', 'clearfy') ?>
			</div>
		<?php
		}
		
		/**
		 * Collects error and system error data
		 * @return string
		 */
		public function getDebugReport()
		{
			$run_time = number_format(microtime(true) - HMW_REQUEST_TIME, 3);
			$pps = number_format(1 / $run_time, 0);
			$memory_avail = ini_get('memory_limit');
			$memory_used = number_format(memory_get_usage(true) / (1024 * 1024), 2);
			$memory_peak = number_format(memory_get_peak_usage(true) / (1024 * 1024), 2);
			
			$debug = '';
			if( PHP_SAPI == 'cli' ) {
				// if run for command line, display some info
				$debug = PHP_EOL . "======================================================================================" . PHP_EOL . " Config: php " . phpversion() . " " . php_sapi_name() . " / zend engine " . zend_version() . PHP_EOL . " Load: {$memory_avail} (avail) / {$memory_used}M (used) / {$memory_peak}M (peak)" . "  | Time: {$run_time}s | {$pps} req/sec" . PHP_EOL . "  | Server Timezone: " . date_default_timezone_get() . "  | Agent: CLI" . PHP_EOL . "======================================================================================" . PHP_EOL;
			} else {
				// if not run from command line, only display if debug is enabled
				$debug = "" //<hr />"
					. "<div style=\"text-align: left;\">" . "<hr />" . " Config: " . "<br />" . " &nbsp;&nbsp; | php " . phpversion() . " " . php_sapi_name() . " / zend engine " . zend_version() . "<br />" . " &nbsp;&nbsp; | Server Timezone: " . date_default_timezone_get() . "<br />" . " Load: " . "<br />" . " &nbsp;&nbsp; | Memory: {$memory_avail} (avail) / {$memory_used}M (used) / {$memory_peak}M (peak)" . "<br />" . " &nbsp;&nbsp; | Time: {$run_time}s &nbsp;&nbsp; | {$pps} req/sec" . "<br />" . "Url: " . "<br />" . " &nbsp;&nbsp; |" . "<br />" . " &nbsp;&nbsp; | Agent: " . (@$_SERVER["HTTP_USER_AGENT"]) . "<br />" . "Version Control: " . "<br />" . " &nbsp;&nbsp; </div>" . "<br />";
			}
			
			$debug .= "Plugins<br>";
			$debug .= "=====================<br>";
			
			$plugins = get_plugins();
			
			foreach($plugins as $path => $plugin) {
				if( is_plugin_active($path) ) {
					$debug .= $plugin['Name'] . '<br>';
				}
			}
			
			return $debug;
		}
		
		/**
		 * Generates a report about the system and plug-in error
		 * @return string
		 */
		public function gererateReportAction()
		{
			require_once(WBCR_CLR_PLUGIN_DIR . '/includes/classes/class.zip-archive.php');
			
			$reposts_dir = WBCR_CLR_PLUGIN_DIR . '/reports';
			$reports_temp = $reposts_dir . '/temp';
			
			if( !file_exists($reposts_dir) ) {
				mkdir($reposts_dir, 0777, true);
			}
			
			if( !file_exists($reports_temp) ) {
				mkdir($reports_temp, 0777, true);
			}
			
			$file = fopen($reports_temp . '/site-info.html', 'w+');
			fputs($file, $this->getDebugReport());
			fclose($file);
			
			$download_file_name = 'webcraftic-clearfy-report-' . date('Y.m.d-H.i.s') . '.zip';
			$download_file_path = WBCR_CLR_PLUGIN_DIR . '/reports/' . $download_file_name;
			
			Wbcr_ExtendedZip::zipTree(WBCR_CLR_PLUGIN_DIR . '/reports/temp', $download_file_path, ZipArchive::CREATE);
			
			array_map('unlink', glob(WBCR_CLR_PLUGIN_DIR . "/reports/temp/*"));
			
			wp_redirect(WBCR_CLR_PLUGIN_URL . '/reports/' . $download_file_name);
			exit;
		}
		
		public function selected($mode_name)
		{
			$get_modes = get_option($this->plugin->pluginName . '_quick_modes');
			
			if( $mode_name == 'reset' ) {
				return ' wbcr-clearfy-mode-reset';
			}
			
			return is_array($get_modes) && in_array($mode_name, $get_modes)
				? ' wbcr-clearfy-active'
				: '';
		}
		
		public function showPageContent()
		{
			global $wbcr_clearfy_plugin;
			
			$allow_mods = apply_filters('wbcr_clearfy_allow_quick_mods', array(
				'reset' => array('title' => __('Reset all settings', 'clearfy'), 'icon' => 'dashicons-backup'),
				'recommended' => array('title' => __('Recommended Mode', 'clearfy'), 'icon' => 'dashicons-thumbs-up'),
				'clear_code' => array('title' => __('Code Clearing', 'clearfy'), 'icon' => 'dashicons-yes'),
				'defence' => array('title' => __('Security', 'clearfy'), 'icon' => 'dashicons-shield'),
				'seo_optimize' => array('title' => __('Seo optimization', 'clearfy'), 'icon' => 'dashicons-star-empty'),
				'remove_default_widgets' => array(
					'title' => __('Remove default Widgets', 'clearfy'),
					'icon' => 'dashicons-networking'
				),
			));
			?>
			<div class="wbcr-clearfy-layer"></div>
			<div class="wbcr-clearfy-confirm-popup">
				<h3><?php _e('Are you sure you want to enable the this options?', 'clearfy') ?></h3>
				
				<div class="wbcr-clearfy-reset-warning-message">
					<?php _e('After confirmation, all the settings of the plug-in will return to the default state. Make backup settings by copying data from the export field.', 'clearfy') ?>
				</div>
				<ul class="wbcr-clearfy-list-options"></ul>
				<div class="wbcr-clearfy-popup-buttons">
					<button class="wbcr-clearfy-popup-button-ok"><?php _e('Confirm', 'clearfy') ?></button>
					<button class="wbcr-clearfy-popup-button-cancel"><?php _e('Cancel', 'clearfy') ?></button>
				</div>
			</div>
			
			<div class="wbcr-content-section">
				<div id="wbcr-clearfy-quick-mode-board">
					<p><?php _e('This is the quick plug-in setup mode. Use it if you do not want to understand the settings or do not understand what settings you need to use.', 'clearfy') ?></p>
					<h4><?php _e('Select mode', 'clearfy') ?></h4>
					
					<p><?php _e('After selecting the mode, the plug-in automatically activates the necessary settings for the mode.', 'clearfy') ?></p>
					
					<div class="row">
						<?php foreach($allow_mods as $mode_name => $mode): ?>
							<?php
							$mode_title = is_array($mode)
								? $mode['title']
								: $mode;
							$mode_icon = is_array($mode) && $mode['icon']
								? $mode['icon']
								: null;
							?>
							
							<div class="col-sm-12">
								<?php
									$group = WbcrClr_Group::getInstance($mode_name);
									
									$filter_mode_options = array();
									foreach($group->getOptions() as $option) {
										$filter_mode_options[$option->getName()] = $option->getTitle();
									}
									
									$print_group_options = wbcr_get_escape_json($filter_mode_options);
								?>
								<div class="wbcr-clearfy-switch<?= $this->selected($mode_name) ?>" data-mode="<?= $mode_name ?>" data-mode-options="<?= $print_group_options ?>">
									<?php if( !empty($mode_icon) ): ?>
										<i class="dashicons <?= $mode_icon; ?>"></i>
										<!--<i class="fa <?= $mode_icon; ?>" aria-hidden="true"></i>-->
									<?php endif; ?>
									<span><?= $mode_title ?></span>
									
									<div class="wbcr-clearfy-switch-confirmation">
										<button class="wbcr-clearfy-button-activate-mode"><?php _e('Activate', 'clearfy'); ?></button>
										<button class="wbcr-clearfy-button-deativate-mode"><?php _e('Deactivate', 'clearfy'); ?></button>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
			<div class="wbcr-right-sidebar-section">
				<div class="row">
					<div class="col-sm-12">
						<div class="wbcr-clearfy-switch-success-message">
							<?php _e('Settings successfully updated!', 'clearfy') ?>
						</div>
						<div class="wbcr-clearfy-switch-error-message">
							<?php _e('During the setup, an unknown error occurred, please try again or contact the plug-in support.', 'clearfy') ?>
						</div>
					</div>
					<div class="col-sm-12">
						<div class="wbcr-clearfy-export-import-board wbcr-clearfy-board">
							<p>
								<label for="wbcr-clearfy-import-export">
									<strong><?php _e('Import/Export settings', 'clearfy') ?></strong>
								</label>
								<textarea id="wbcr-clearfy-import-export"><?= wbcr_get_export_options(); ?></textarea>
								<button class="button wbcr-clearfy-import-options-button"><?php _e('Import options', 'clearfy') ?></button>
							</p>
						</div>
					</div>
					<div class="col-sm-12">
						<div class="wbcr-clearfy-troubleshooting-board wbcr-clearfy-board">
							<h4><?php _e('Support', 'clearfy') ?></h4>
							
							<p><?php _e('If you faced with any issues, please follow the steps below to get quickly quality support:', 'clearfy') ?></p>
							<ol>
								<li>
									<p><?php _e('Generate a debug report which will contains inforamtion about your configuratin and installed plugins', 'clearfy') ?></p>
									
									<p>
										<a href="<?= admin_url('options-general.php?page=quick_start-' . $wbcr_clearfy_plugin->pluginName . '&action=gererate_report'); ?>" class="button"><?php _e('Generate Debug Report', 'clearfy') ?></a>
									</p>
								</li>
								<li>
									<p><?php _e('Send a message to <b>wordpress.webraftic@gmail.com</b> include the debug report into the message body.', 'clearfy'); ?></p>
								</li>
							</ol>
							<p style="margin-bottom: 0px;"><?php _e('We guarantee to respond you within 7 business day.', 'clearfy') ?></p>
						</div>
					</div>
				</div>
			</div>
		
		<?php
		}
	}
	
	FactoryPages322::register($wbcr_clearfy_plugin, 'WbcrClr_QuickStartPage');
