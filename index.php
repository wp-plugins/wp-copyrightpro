<?php
/*
      Plugin Name: WP-CopyRightPro
      Plugin URI: http://wp-copyrightpro.com/
      Description: WP-CopyRightPro is a plug-in that prevents the copying of texts and images from your blog, if you install this plug-in, your content of wordpress will be protected.
      Version: 2.5
      Author: Andres Felipe Perea V.
      Author URI: http://wp-copyrightpro.com/
*/

/*
	This plug-in was developed by Andrés Perea.
	Copyright 2010  Wp-copyrightPro, IN  (http://wp-copyrightpro.com/)
	
	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation; either version 2 of the License, or
	(at your option) any later version.
	
	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details: http://www.gnu.org/licenses/gpl.txt
	
	FOR MORE INFO: info@wp-copyrightpro.com
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

eval(base64_decode('JGNwcmY9J1puVnVZM1JwYjI0Z1kyOXdlWEpwWjJoMGNIVjVaR2tvS1hzTkNtVmphRzhnSnp4emJXRnNiRDVVYUdseklITnBkR1VnYVhNZ2NISnZkR1ZqZEdWa0lHSjVJRHhoSUdoeVpXWTlJbWgwZEhBNkx5OTNjQzFqYjNCNWNtbG5hSFJ3Y204dVkyOXRMeUkrVjFBdFEyOXdlVkpwWjJoMFVISnZQQzloUGp3dmMyMWhiR3crSnp0OSc7DQpldmFsKGJhc2U2NF9kZWNvZGUoJ1pYWmhiQ2hpWVhObE5qUmZaR1ZqYjJSbEtDUmpjSEptS1NrNycpKTs='));
$inc_crp='YWRkX2FjdGlvbignYWRtaW5fbWVudScsJ2NvbmZpZ19jb3B5cHJvJyk7DQphZGRfYWN0aW9uKCd3cF9oZWFkJywnY29weXJpZ2h0aGVhZCcpOw0KYWRkX2FjdGlvbignd3BfZm9vdGVyJywnY29weXJpZ2h0cHV5ZGknKTs=';

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

eval(base64_decode('ZXZhbChiYXNlNjRfZGVjb2RlKCRpbmNfY3JwKSk7'));
?>