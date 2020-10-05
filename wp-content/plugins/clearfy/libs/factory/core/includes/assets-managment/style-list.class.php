<?php
	/**
	 * The file contains a class to manage style assets.
	 *
	 * @author Paul Kashtanoff <paul@byonepress.com>
	 * @copyright (c) 2013, OnePress Ltd
	 *
	 * @package factory-core
	 * @since 1.0.0
	 */

	/**
	 * Style List
	 *
	 * @since 1.0.0
	 */
	class Factory326_StyleList extends Factory326_AssetsList {

		public function connect($source = 'wordpress')
		{

			// register all global required scripts
			if( !empty($this->required[$source]) ) {

				foreach($this->required[$source] as $style) {
					if( 'wordpress' === $source ) {
						wp_enqueue_style($style);
					} elseif( 'bootstrap' === $source ) {
						$this->plugin->bootstrap->enqueueStyle($style);
					}
				}
			}

			if( $source == 'bootstrap' ) {
				return;
			}

			// register all other styles
			foreach($this->all as $style) {
				wp_enqueue_style(md5($style), $style, array(), $this->plugin->version);
			}
		}
	}
