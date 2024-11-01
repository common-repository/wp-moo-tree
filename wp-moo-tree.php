<?php
/*
 *Plugin Name: Wordpress MooTools Tree Creator
 *Plugin URI: http://aryanduntley.com/wordpressplugins/mootree
 *Description: Generates file, geneology, etc., trees via custom post types.
 *Version: 1.1.0
 *Author: Aryan Duntley
 *Author URI: http://aryanduntley.com/
 *License: GPLv2 or later
 *
 *
 * Thanks, appreciation and credit goes to the mootools developers, to the mootree
 * developers and to the developers of milkbox, the mootools
 * 
 * mootools url (http://mootools.net/) team: http://mootools.net/developers
 * mootree url (https://sites.google.com/a/mindplay.dk/mootree/Home) team: Rasmus Schultz - http://www.mindplay.dk
 * milkbox url (http://reghellin.com/milkbox/) team:  Luca Reghellin - milkbox@reghellin.com
 *
 *
 *
 * This plugin has been developped and tested with Wordpress Version 3.4.2
 *
 * Copyright 2012  Aryan Duntley (email : dunar21@yahoo.com)
 *
 *  This program is free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  If you have not received a copy of the GNU General Public License
 *  along with this program; Write to the Free Software
 *  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA,
 *  Or visit : http://www.gnu.org/copyleft/gpl.html
 *
*/


if(!defined('MYSITE_WPTOUCH_PLUGIN')){
define( 'MYSITE_WPTOUCH_PLUGIN',  __FILE__ );
}
include ("mootreeAdmin.php");
add_action( 'admin_menu', 'add_my_mootree' );
function add_my_mootree (){
	add_submenu_page( 'options-general.php', 'WP Moo Tree Instructions', 'WP Moo Tree', 'manage_options', 'wp-moo-tree-dimad', 'mootree_adminpage');
}
function tree_scripts_plug() {
	if(!is_admin()){
	
		wp_register_script( 'mootools', 'http://ajax.googleapis.com/ajax/libs/mootools/1.4.5/mootools-yui-compressed.js', array());
		wp_register_script( 'thsplugscript', plugins_url( 'jis/plug_cust.js', __FILE__ ), array('jquery'));
		wp_register_script( 'mootree', plugins_url( 'jis/mootree.js', __FILE__ ), array('mootools'));
		wp_register_script( 'milkbox_lightbox', plugins_url( 'jis/milkbox-yc.js', __FILE__ ), array('mootools'));
		wp_register_script( 'mootools_more', plugins_url( 'jis/mootools-more.js', __FILE__ ), array('mootools'));
		//wp_enqueue_script('mootools');
		//wp_enqueue_script('mootree');
		wp_enqueue_script('thsplugscript');
		
		wp_register_style('mootree_style', plugins_url( 'cis/mootree.css', __FILE__ ));
		wp_register_style('plugin_sty', plugins_url( 'cis/style.css', __FILE__ ));
		wp_register_style('milkbox_sty', plugins_url( 'cis/milkbox/milkbox.css', __FILE__ ));	
		//wp_enqueue_style('mootree_style');
		//wp_enqueue_style('plugin_sty');
		
		$file_for_moo = plugins_url('imgs/', __FILE__);
		$tran_arr = array( 'thefile' => $file_for_moo );
		wp_localize_script( 'mootree', 'moo_file', $tran_arr );
	}
}    


function treetype_styles() {
	wp_enqueue_style('mt_metabox_style', plugins_url( 'cis/metabox.css', __FILE__));	
}
add_action('admin_print_styles', 'treetype_styles');


add_action('wp_enqueue_scripts', 'tree_scripts_plug');



// Post type Blocks
include("tree-type.php");
include("tree-shortcode.php");
// END // Post type Blocks

function nother_wptouch_create_object() {
	
	//add_shortcode( 'sponsorlist', 'sponsorlist_F' );
	add_shortcode( 'moo_tree', 'make_tree' );
}
// Shortcode Action Hook
add_action( 'plugins_loaded', 'nother_wptouch_create_object' );
// END // Shortcode Action Hook

?>