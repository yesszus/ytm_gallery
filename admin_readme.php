<?php

require_once("../../class2.php");

$lan_file = e_PLUGIN."ytm_gallery/languages/".e_LANGUAGE.".php";
require_once(file_exists($lan_file) ? $lan_file :  e_PLUGIN."ytm_gallery/languages/English.php");

require_once(e_ADMIN."auth.php");
$caption     = LAN_YTM_README;
$text 	 = LAN_YTM_README_0;

$ns -> tablerender($caption, $text);
require_once(e_ADMIN."footer.php");
?>