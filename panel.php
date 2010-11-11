<?php
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
*/



/*update protection*/
if($_POST['updatecopy']=="y"){
$updatecopy=update_copypro($_POST['click'], $_POST['selec'], $_POST['iframe'], $_POST['drop']);
}

if($_POST['link']=="y"){
$updatelink=update_link($_POST['copy_link']);
}

if($_POST['updatebase']=="y"){
	update_basecopy();
}

/* cambiar imagen*/
$copyclick=img_panelcopy('copy_click');
$copyselection=img_panelcopy('copy_selection');
$copyiframe=img_panelcopy('copy_iframe');
$copydrop=img_panelcopy('copy_drop');
$copylink=img_panelcopy('copy_link');

$nuncopy=0;
$porcent_pro=25;
if ($copyclick=="y"){
$nuncopy=$porcent_pro+$nuncopy;
}

if ($copyselection=="y"){
$nuncopy=$porcent_pro+$nuncopy;
}

if ($copyiframe=="y"){
$nuncopy=$porcent_pro+$nuncopy;
}

if ($copydrop=="y"){
$nuncopy=$porcent_pro+$nuncopy;
}

if($nuncopy=="0"){
	$nuncopy="0%";
	$nuncopy2="";
	$nuncopy3="Wp-CopyRightPro Is Disable";
}else{
	$nuncopy="$nuncopy%";
	$nuncopy2="$nuncopy";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link type="text/css" href="<?php echo plugins_url('wp-copyrightpro/style.css');?>" rel="stylesheet">

</head>
<body>
<div class="wrap">
<?php $version=validar_version();?>
<div class="version" <?php if ($version=="ok"){?>style="display:none;"<?php }?>>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>?page=<?php echo plugin_basename(__FILE__); ?>" method="post">
<input type="hidden" name="updatebase" id="checkbox5" value="y" />
PLEASE UPDATE DATABASE OF WP-COPYRIGHPRO<input type="submit" name="button" value="Update" class="button-secundary" />
</form>
</div>
<div class="titulo_panel"><a href="http://wp-copyrightpro.com/" title="Wp-CopyRightPro" target="_blank"><img src="<?php echo plugins_url('wp-copyrightpro/images/logo.png');?>" /></a></div>

<div class="contenedor_izquierdo">
<!-- Menu Configuracion-->
<div class="widefat" id="contenedor_panel">
<div class="sombra_panel">
<h3>Wp-CopyRightPro Options</h3>
</div>

<!--Barra de estado-->
<div class="estado_contenedor">
<?=$nuncopy3?>
<div class="porcentaje_proteccion" style="width:<?=$nuncopy?>;"><?=$nuncopy2?></div>
</div>
<!--Barra de estado-->

<form id="form1" name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>?page=<?php echo plugin_basename(__FILE__); ?>"><div align="left"><center>
<table width="98%" border="0" cellspacing="0">
<tr>
<td>
<p align="justify">WP-CopyRightPro is a plug-in that prevents the copying of texts and images from your blog, if you install this plug-in, your content of wordpress will be protected.</p>
<p align="left"><strong>Please select the protections to activate in your Wordpress.</strong><br />
  <input type="checkbox" name="click" id="checkbox" value="y" <?php if ($copyclick=="y"){?>checked<?php }?> />
  Disable right click on your Wordpress.<br />
  <input type="checkbox" name="selec" id="checkbox2" value="y" <?php if ($copyselection=="y"){?>checked<?php }?> />
  Disable selection of text.<br />
  <input type="checkbox" name="iframe" id="checkbox3" value="y" <?php if ($copyiframe=="y"){?>checked<?php }?> />
  Protects from iframes.<br />
  <input type="checkbox" name="drop" id="checkbox4" value="y" <?php if ($copydrop=="y"){?>checked<?php }?> />
  Protects from drag and drop images.
  <input type="hidden" name="updatecopy" id="checkbox5" value="y" />
  </p>
  <p align="left">
  <label>
  <input type="submit" name="button" id="button" value="Update Options" class="button-primary" />
  </label>
  </p></td>
   </tr>
   </table>
  </center>
    </div>
  </form>
</div>
<!-- Fin Menu Configuracion-->

<div class="widefat" id="contenedor_about">
<div class="sombra_panel">
<h3>About Wp-CopyRightPro</h3>
</div>
<div class="contenido">
  <p align="justify"><strong>Wp-CopyrightPro</strong> is a plug-in developed by <a href="http://wp-copyrightpro.com/" target="_blank" title="Wp-CopyRightPro.Com">Wp-CopyRightPro.Com</a>.    in order to minimize the copying of your website content. This is not a   complete solution, but it will avoid 90% of attempts to copy its   contents.</p>
  <p align="justify"><strong>Wp-CopyRightPro is bad for the SEO?</strong><br />
    This plug-in is developed in PHP and javascript, for this reason   the plug-in does not affect search engines, it only affects the user's   browser that tries to copy your content.</p>
  <p align="justify"><strong>Wp-CopyrightPro detects the hotlink?</strong><br />
    When activating 100% of the protections, in less than a week,   Wp-CopyRightPro can reveal sites that are using your images, just by   logging into Google.com images section type this (site:yoursite.com) and   google will show the sites that are using your images.</p>
  <p align="center"><strong>To see the plug-in in action you can enter <a href="http://quehayparahacer.com/" target="_blank">here</a>.<br />
For questions, suggestions, please enter our Official Site <a href="http://wp-copyrightpro.com/" target="_blank" title="Wp-CopyRightPro.Com">here</a>.</strong>
  </p>
</div>
</div>
</div>


<!-- *****************************************-->
<div class="contenedor_derecho">
<!-- Menu donaciones-->
<div class="widefat" id="contenedor_donacion">
<div class="sombra_panel">
<h3>Give us a cup of coffee.</h3>
</div>
<div class="contenido"> <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_donations&amp;business=5TS4C2GX9WUR6&amp;lc=ES&amp;item_name=puydi&amp;item_number=wpcopyrightpro&amp;currency_code=USD&amp;bn=PP%2dDonationsBF%3abtn_donateCC_LG%2egif%3aNonHosted" target="_blank"><img src="<?php echo plugins_url('wp-copyrightpro/images/gimme-coffee.png');?>" width="120" height="120" alt="Coffee" title="Donate" /></a>If you value our work and the plugin's been helpful to you, give us a   cup of coffee, and we will gladly continue working at night and provide   you with better support. Any kind of contribution would be highly appreciated. Thanks!
<a class="button-secondary" href="https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=5TS4C2GX9WUR6&lc=ES&item_name=puydi&item_number=wpcopyrightpro&currency_code=USD&bn=PP%2dDonationsBF%3abtn_donateCC_LG%2egif%3aNonHosted" target="_blank" title="Donate">Donate</a>
</div>
</div>
<!-- Fin Menu donaciones-->

<!-- Menu calificar-->
<div class="widefat" id="contenedor_calificar">
<div class="sombra_panel">
<h3>Do you like this Plugin?</h3>
</div>
<div class="contenido">
This plugin is primarily developed, maintained, supported and documented by Wp-Copyrightpro.com with a lot of love & effort.<br>
<ul>
<li style="background:url(<?php echo plugins_url('wp-copyrightpro/images/icon-rating.png');?>) no-repeat scroll 16px 50% transparent; padding-left: 38px; text-decoration: none;"><a href="http://wordpress.org/extend/plugins/wp-copyrightpro/" target="_blank">Give it a good rating on WordPress.org</a></li>
<li style="background:url(<?php echo plugins_url('wp-copyrightpro/images/icon-paypal.gif');?>) no-repeat scroll 16px 50% transparent; padding-left: 38px; text-decoration: none;"><a href="https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=5TS4C2GX9WUR6&lc=ES&item_name=puydi&item_number=wpcopyrightpro&currency_code=USD&bn=PP%2dDonationsBF%3abtn_donateCC_LG%2egif%3aNonHosted" target="_blank">Donate the work via paypal</a></li>
</ul>
</div>
</div>
<!-- Fin Menu calificar-->

<!-- Menu link-->
<div class="widefat" id="contenedor_calificar">
<div class="sombra_panel">
<h3>Tell The World!</h3>
</div>
<div class="contenido">
Proudly tell the world, ¡your content is protected! 
<form action="<?php echo $_SERVER['PHP_SELF']; ?>?page=<?php echo plugin_basename(__FILE__); ?>" method="post">
<input name="link" type="hidden" value="y" />
<input name="copy_link" id="copy_link" type="checkbox" value="y" <?php if ($copylink=="y"){?>checked<?php }?> />Places a message in your blog's footer<br>
<input type="submit" name="button" id="button_link" value="Update Options" class="button-secundary" />
</form>
</div>
</div>
<!-- Fin Menu link-->
</div>

</div>
</body>
</html>