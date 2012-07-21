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
| Filename: !autonoparse_bbcode_include_var.php
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

$__BBCODE__[] = 
array(
"description"		=>	$locale['bb_autonoparse_description'],
"value"				=>	"!autonoparse",
"bbcode_start"		=>	"",
"bbcode_end"		=>	"",
"usage"				=>	$locale['bb_autonoparse_usage']
);
?>