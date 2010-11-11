<?php
/*
      Plugin Name: WP-CopyRightPro
      Plugin URI: http://wp-copyrightpro.com/
      Description: WP-CopyRightPro is a plug-in that prevents the copying of texts and images from your blog, if you install this plug-in, your content of wordpress will be protected.
      Version: 2.6
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

/*Validar Version*/
function validar_version(){
	$version_copyright="2.6";
global $wpdb;
	$fivesdrafts = $wpdb->get_results("SELECT*FROM `".$wpdb->prefix."copyrightpro` WHERE `Option`='version'");
	foreach ($fivesdrafts as $fivesdraft) {
			$result[0]=$fivesdraft->Value;
	}
	if($result[0]!=$version_copyright){
		$version="x";
	}else{
		$version="ok";
	}
	return $version;
}

function update_basecopy(){
	copyprouninstall();
	copyproinstall();
}
	

/* INSTALL AND UNISTALL PLUG-IN */
function copyproinstall() {
	global $wpdb;
 
	$sql = 'CREATE TABLE `'.$wpdb->prefix.'copyrightpro` (
			`Option` VARCHAR( 20 ) NOT NULL ,
			`Value` VARCHAR( 20 ) NOT NULL
			) ENGINE = MYISAM DEFAULT CHARSET=utf8';
 
	$wpdb->query($sql);
	$wpdb->query('INSERT INTO `'.$wpdb->prefix.'copyrightpro` (`Option`, `Value`) VALUES 
	(\'copy_click\', \'y\'),(\'copy_selection\', \'y\'),(\'copy_iframe\', \'n\'),(\'copy_drop\', \'y\'), (\'copy_link\', \'n\'), (\'version\', \'2.6\')');
}

function copyprouninstall() {
	global $wpdb;
 
	$sql = "DROP TABLE `".$wpdb->prefix."copyrightpro`";
	$wpdb->query($sql);
}


/* FUNCIONES DE PROTECCION */ 
function copyrighthead(){
include ('script.htm');
}

function copyrightpuydi(){
echo '<small>This site is protected by <a href="http://wp-copyrightpro.com/">WP-CopyRightPro</a></small>';
}

/* PANEL DE CONTROL */

function update_options($option, $value){
	global $wpdb;
	$wpdb->query("UPDATE ".$wpdb->prefix."copyrightpro SET Value = '$value' WHERE `Option`='$option'");
}


function update_copypro($clickpro, $selecpro, $iframepro, $droppro){
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
$update=update_options('copy_click', $clickpro);
$update=update_options('copy_selection', $selecpro);
$update=update_options('copy_iframe', $iframepro);
$update=update_options('copy_drop', $droppro);
}

function update_link($link){
	if($link==""){
	$link="n";
	}
	$update=update_options('copy_link', $link);
}

function panel_copypro() {
	include ('panel.php');
}

function config_copypro() {
	add_menu_page('Wp-CopyRightPro Panel', 'Wp-CopyrightPro', 'administrator', 'wp-copyrightpro/panel.php', 'panel_copypro', plugins_url('wp-copyrightpro/images/Computer.gif'));
}

/*Imagen Panel de control*/
function img_panelcopy($option){
	global $wpdb;
	$fivesdrafts = $wpdb->get_results("SELECT*FROM `".$wpdb->prefix."copyrightpro` WHERE `Option`='$option'");
	foreach ($fivesdrafts as $fivesdraft) {
			$result[0]=$fivesdraft->Value;
	}
	return $result[0];
}

/* Añadir comando wordpress */
register_activation_hook(__FILE__,'copyproinstall'); //gancho para instalar
register_deactivation_hook(__FILE__,'copyprouninstall'); //gancho para desinstalar

add_action('admin_menu','config_copypro');
add_action('wp_head','copyrighthead');

/*Link FOOTER*/
$link_copyfooter=img_panelcopy('copy_link');
if ($link_copyfooter=="y"){
add_action('wp_footer','copyrightpuydi');
}
?>