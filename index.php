<?php
/*
      Plugin Name: WP-CopyRightPro
      Plugin URI: http://puydi.net/blog/wp-copyrightpro-plug-in-para-wordpress/
      Description: WP-CopyRightPro is a plug-in that prevents the copying of texts and images from your blog, if you install this plug-in, your content of wordpress will be protected.
      Version: 2.0
      Author: Andres Felipe Perea V.
      Author URI: http://puydi.net/
*/

/*
Copyright 2009  PUYDI, IN  (http://www.puydi.net/)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details: http://www.gnu.org/licenses/gpl.txt
*/

/* INSTALL AND UNISTALL PLUG-IN */
function copyproinstall() {
	global $wpdb;
 
	$sql = 'CREATE TABLE `wp_copyrightpro` (
			`copy_click` VARCHAR( 1 ) NOT NULL ,
			`copy_selection` VARCHAR( 1 ) NOT NULL ,
			`copy_iframe` VARCHAR( 1 ) NOT NULL ,
			`copy_drop` VARCHAR( 1 ) NOT NULL
			) ENGINE = MYISAM DEFAULT CHARSET=utf8';
 
	$wpdb->query($sql);
	$wpdb->query('INSERT INTO `'.wp_copyrightpro.'` SET copy_click = "y", copy_selection = "y", copy_iframe = "n", copy_drop = "y"');
}

function copyprouninstall() {
	global $wpdb;
 
	$sql = "DROP TABLE `wp_copyrightpro`";
	$wpdb->query($sql);
}


/* FUNCIONES DE PROTECCION */ 
function copyrighthead(){
include ('script.htm');
}

function copyrightpuydi(){
echo '<small>This site is protected by <a href="http://puydi.net/blog/wp-copyrightpro-plug-in-para-wordpress/">WP-CopyRightPro</a></small>';
}

/* PANEL DE CONTROL */

function update_copypro($clickpro, $selecpro, $iframepro, $droppro){
global $wpdb;
	if($clickpro==""){
	$clickpro="n";
	}
	if($selecpro==""){
	$selecpro="n";
	}
	if($iframepro==""){
	$iframepro="n";
	}
	if($droppro==""){
	$droppro="n";
	}
$wpdb->query("UPDATE wp_copyrightpro SET copy_click = '$clickpro', copy_selection = '$selecpro', copy_iframe = '$iframepro', copy_drop = '$droppro'");
}

function panel_copypro() {
	include ('panel.php');
}

function about_copypro() {
	include ('about.html');
}

function config_copypro() {
	add_menu_page('CopyRightPro Panel', 'CopyRightPro', 'administrator', 'wp-copyrightpro/panel.php', 'panel_copypro', plugins_url('wp-copyrightpro/images/Computer.gif'));
	add_submenu_page( 'wp-copyrightpro/panel.php', 'About CopyRighPro', 'About', 'administrator', 'about-copyrightpro', 'about_copypro');
}

/* Añadir comando wordpress */
register_activation_hook(__FILE__,'copyproinstall'); //gancho para instalar
register_deactivation_hook(__FILE__,'copyprouninstall'); //gancho para desinstalar

add_action('admin_menu','config_copypro');
add_action('wp_head','copyrighthead');
add_action('wp_footer','copyrightpuydi');

?>
