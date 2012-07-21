<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright (C) 2002 - 2011 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Type: BBcode
| Name: NoParse
| Version: 1.02
| Author: Valerio Vendrame (lelebart)
+--------------------------------------------------------+
| Filename: noparse_bbcode_include_var.php
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

$text = preg_replace('#\[noparse\](.*?)\[/noparse\]#sie', "'<tt class=\'noparse\'>\\1</tt>'", $text);
$text = preg_replace('#\[tt\](.*?)\[/tt\]#sie', "'<tt class=\'noparse\'>\\1</tt>'", $text);
?>
