<?php
/*
      Plugin Name: WP-CopyRightPro
      Plugin URI: http://puydi.net/blog/wp-copyrightpro-plug-in-para-wordpress/
      Description: WP-CopyRightPro is a plug-in that prevents the copying of texts and images from your blog.
      Version: 1.1
      Author: Andres Felipe Perea V
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
   
function copyrighthead(){
include ('script.htm');
}
function copyrightpuydi(){
echo '<small>This site is protected by <a href="http://puydi.net/blog/wp-copyrightpro-plug-in-para-wordpress/">WP-CopyRightPro</a></small>';
}

/* Añadir comando wordpress */
add_action('wp_head','copyrighthead');
add_action('wp_footer','copyrightpuydi');

?>
