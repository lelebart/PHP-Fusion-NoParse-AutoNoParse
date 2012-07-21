<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright (C) 2002 - 2011 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Type: BBcode
| Name: !AutoNoParse
| Version: 1.02
| Author: Valerio Vendrame (lelebart)
+--------------------------------------------------------+
| Filename: !autonoparse_bbcode_include.php
| Author: Valerio Vendrame (lelebart)
+--------------------------------------------------------+
| This program is released as free software under the
| Affero GPL license. You can redistribute it and/or
| modify it under the terms of this license which you
| can read by viewing the included agpl.txt or online
| at www.gnu.org/licenses/agpl.html. Removal of this
| copyright header is strictly prohibited without
| written permission from the original author(s).
+--------------------------------------------------------*/
if (!defined("IN_FUSION")) { die("Access Denied"); }

if (!defined("NOPARSE")) {
	$noparse_th  = "<style type=\"text/css\">";
	$noparse_th .= "/*<![CDATA[*/";
	$noparse_th .= ".noparse {";
	$noparse_th .= "border: 1xp solid #dedede;";
//	$noparse_th .= "background-color:#cccccc;";
	$noparse_th .= "background-color:#f8f8f8;";
//	$noparse_th .= "font-family:\"dejavu sans mono\",\"monaco\",\"lucida console\",\"courier new\",monospace;";
	$noparse_th .= "font-family:Monaco,\"Courier New\",\"DejaVu Sans Mono\",\"Bitstream Vera Sans\";";
//	$noparse_th .= "padding:1px 3px 1px 3px;";
	$noparse_th .= "padding:1px 5px 1px 5px;";
	$noparse_th .= "}";
	$noparse_th .= "/*]]>*/";
	$noparse_th .= "</style>";
	if (funtion_exists("add_to_head")) { add_to_head($noparse_th); }
	unset($noparse_th);
	define("NOPARSE",true);
}

if (!function_exists("deparsesmileys")) {
	function deparsesmileys($message) {
		global $smiley_cache;
		if (!$smiley_cache) { cache_smileys(); }
		if (is_array($smiley_cache) && count($smiley_cache)) {
			foreach ($smiley_cache as $smiley) {
				$smiley_code = $smiley['smiley_code'];
				$smiley_image = preg_quote("<img src='".get_image("smiley_".$smiley['smiley_text'])."' alt='".$smiley['smiley_text']."' style='vertical-align:middle;' />");
				//$smiley_image = "<img src='".get_image("smiley_".$smiley['smiley_text'])."' alt='".$smiley['smiley_text']."' style='vertical-align:middle;' />";
				$message = preg_replace("#{$smiley_image}#si", $smiley_code, $message);
				//$message = str_replace($smiley_image, $smiley_code, $message);
				//var_dump($smiley_code, $smiley_image);
			}
		}
		$repalce = array('[' => '&#91;',
						']' => '&#93;',
						'(' => '&#40;',
						')' => '&#41;',
						'{' => '&#123;',
						'|' => '&#124;', //v1.01 add
						'}' => '&#125;', //v1.01 fix
						'<' => '&#60;',
						'>' => '&#62;',
						':' => '&#58;',
						'.' => '&#46;',
						'\,' => '&#44;',
						'\$' => '&#36;');
		$message = strtr($message, $repalce); 
		return $message;
	}
}
$text = preg_replace('#\[code\](.*?)\[/code\]#sie', "'[code]'.deparsesmileys('\\1').'[/code]'", $text);
$text = preg_replace('#\[php\](.*?)\[/php\]#sie', "'[php]'.deparsesmileys('\\1').'[/php]'", $text);
$text = preg_replace('#\[geshi\](.*?)\[/geshi\]#sie', "'[geshi]'.deparsesmileys('\\1').'[/geshi]'", $text);
$text = preg_replace('#\[geshi=(.*?)\](.*?)\[/geshi\]#sie', "'[geshi=\\1]'.deparsesmileys('\\2').'[/geshi]'", $text); //1.02 add
$text = preg_replace('#\[chili\](.*?)\[/chili\]#sie', "'[chili]'.deparsesmileys('\\1').'[/chili]'", $text); //1.02 add
$text = preg_replace('#\[chili=(.*?)\](.*?)\[/chili\]#sie', "'[chili=\\1]'.deparsesmileys('\\2').'[/chili]'", $text); //1.02 add
$text = preg_replace('#\[noparse\](.*?)\[/noparse\]#sie', "'[noparse]'.deparsesmileys('\\1').'[/noparse]'", $text);
$text = preg_replace('#\[tt\](.*?)\[/tt\]#sie', "'[tt]'.deparsesmileys('\\1').'[/tt]'", $text); //1.02 add
?>
