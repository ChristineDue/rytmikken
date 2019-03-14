<?php
/**
 *
 * This is the root file of the ASD Fullwidth Element Sizer WordPress plugin.
 *
 * @package        WordPress
 * @subpackage     ASD_Fullwidth_Element_Sizer
 * Plugin Name:    ASD Fullwidth Element Sizer
 * Plugin URI:     https://artisansitedesigns.com/
 * Description:    The easy solution for making images or other HTML elements full window width! Just apply the CSS class "fullwidth-element".
 * Author:         Michael H Fahey
 * Author URI:     https://artisansitedesigns.com/staff/michael-h-fahey/
 * Text Domain:    asd_fullwidth_element_sizer
 * License:        GPL3
 * Version:        2.201902051
 *
 * ASD Products is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * any later version.
 *
 * ASD Products is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with ASD Products. If not, see
 * https://www.gnu.org/licenses/gpl.html
 */

$asd_fullwidth_element_sizer_file_data = get_file_data( __FILE__, array( 'Version' => 'Version' ) );
$asd_fullwidth_element_sizer_version   = $asd_fullwidth_element_sizer_file_data['Version'];

if ( ! defined( 'ABSPATH' ) ) {
	die( '' );
}

if ( ! defined( 'ASD_FULLWIDTH_ELEMENT_SIZER_DIR' ) ) {
	define( 'ASD_FULLWIDTH_ELEMENT_SIZER_DIR', plugin_dir_path( __FILE__ ) );
}

if ( ! defined( 'ASD_FULLWIDTH_ELEMENT_SIZER_URL' ) ) {
	define( 'ASD_FULLWIDTH_ELEMENT_SIZER_URL', plugin_dir_url( __FILE__ ) );
}

require_once 'includes/asd-admin-menu/asd-admin-menu.php';

/** ----------------------------------------------------------------------------
 *   Function asd_fullwidth_element_sizer_enqueues()
 *   Hooks into wp_enqueue_scripts action
 *  --------------------------------------------------------------------------*/
function asd_fullwidth_element_sizer_enqueues() {
	wp_enqueue_script( 'jquery' );

	global $asd_fullwidth_element_sizer_version;
	wp_enqueue_script( 'asd-fullwidth-element-sizer-js', ASD_FULLWIDTH_ELEMENT_SIZER_URL . 'js/asd-fullwidth-element-sizer.js', array(), $asd_fullwidth_element_sizer_version, 'true' );
	wp_enqueue_style( 'asd-fullwidth-element-sizer-css', ASD_FULLWIDTH_ELEMENT_SIZER_URL . 'css/asd-fullwidth-element-sizer.css', array(), $asd_fullwidth_element_sizer_version );
}
add_action( 'wp_enqueue_scripts', 'asd_fullwidth_element_sizer_enqueues' );



/** ----------------------------------------------------------------------------
 *   Function function asd_fullwidth_element_sizer_plugin_action_links()
 *   Adds links to the Dashboard Plugin page for this plugin.
 *  ----------------------------------------------------------------------------
 *
 *   @param Array $actions -  Returned as an array of html links.
 */
function asd_fullwidth_element_sizer_plugin_action_links( $actions ) {
	if ( is_plugin_active( plugin_basename( __FILE__ ) ) ) {
		$actions[0] = '<a target="_blank" href="https://artisansitedesigns.com/">Help</a>';
		/* $actions[1] = '<a href="' . admin_url() . '">' .  'Settings'  . '</a>';  */
	}
	return apply_filters( 'asd_fullwidth_element_sizer_actions', $actions );
}
add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'asd_fullwidth_element_sizer_plugin_action_links' );


