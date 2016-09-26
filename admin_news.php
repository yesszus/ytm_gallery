<?php

require_once("../../class2.php");
require_once(e_HANDLER."userclass_class.php");

if (!getperms("P"))
{
    header("location:" . e_HTTP . "index.php");
    exit;
}
require_once(e_ADMIN . "auth.php");

$lan_file = e_PLUGIN."ytm_gallery/languages/".e_LANGUAGE.".php";
require_once(file_exists($lan_file) ? $lan_file :  e_PLUGIN."ytm_gallery/languages/English.php");


include ("./scripts/check_news.php");

$ns -> tablerender(LAN_YTM_NEWS_PREFS, $text);
require_once(e_ADMIN."footer.php");
?>