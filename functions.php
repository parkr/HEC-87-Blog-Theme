<?php

include("../ari/functions.php");

function replace_thumbs($content){
	// Replace regular images with those generated by TimThumb
	$needle = "src=\"".get_bloginfo( 'siteurl' )."/";
	$dirs = explode("/", get_bloginfo('template_directory'), -1);
	$rep = "src=\"".implode("/", $dirs)."/hec-87/thumb.php?w=450&h=292&zc=1&q=90&src=";
	return preg_replace("/(jpg|jpeg|png|gif)\?\w=\d+/", "jpg", str_replace($needle, $rep, $content));
}
add_filter('the_content', 'replace_thumbs');

?>