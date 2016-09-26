<?php

require_once("../../class2.php");

if (e_LANGUAGE != "English" && file_exists(e_PLUGIN . "ytm_gallery/languages/" . e_LANGUAGE . ".php"))
{
    include_once(e_PLUGIN . "ytm_gallery/languages/" . e_LANGUAGE . ".php");
}
else
{
    include_once(e_PLUGIN . "ytm_gallery/languages/English.php");
}

$main_movie = $_GET['movie'];
$sub_movie  = $_GET['commentmovie'];
$imp_movie  = $_GET['prev_import'];

if ($main_movie){$title_bar = LAN_YTM_MOVIE_PREFS_35; $show_movie_id = $main_movie;}
if ($sub_movie) {$title_bar = LAN_YTM_SUBM_PREFS_61;  $show_movie_id = $sub_movie;}
if ($imp_movie) {$title_bar = LAN_YTM_IMPO_PREFS_31;  $show_movie_id = $imp_movie;}
?>




<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
      <title><?echo $title_bar?></title>

<?// get stylesheet, code used from header template e107
echo "<!-- *CSS* -->\n";

if (isset($eplug_css) && $eplug_css) {
	echo "\n<!-- eplug_css -->\n";
	echo "<link rel='stylesheet' href='{$eplug_css}' type='text/css' />\n";
}

echo "<!-- Theme css -->\n";
if(defined("PREVIEWTHEME")) {
	echo "<link rel='stylesheet' href='".PREVIEWTHEME."style.css' type='text/css' />\n";
} else {
	$css_default = "all";
	if (isset($theme_css_php) && $theme_css_php) {
		echo "<link rel='stylesheet' href='".THEME_ABS."theme-css.php' type='text/css' />\n";
	} else {
		if(isset($pref['themecss']) && $pref['themecss'] && file_exists(THEME.$pref['themecss']))
		{
			// Support for print and handheld media.
			if(file_exists(THEME."style_mobile.css")){
            	echo "<link rel='stylesheet' href='".THEME_ABS."style_mobile.css' type='text/css' media='handheld' />\n";
				$css_default = "screen";
			}
			if(file_exists(THEME."style_print.css")){
            	echo "<link rel='stylesheet' href='".THEME_ABS."style_print.css' type='text/css' media='print' />\n";
                $css_default = "screen";
			}
			echo "<link rel='stylesheet' href='".THEME_ABS."{$pref['themecss']}' type='text/css' media='{$css_default}' />\n";


		}
		else
		{
			// Support for print and handheld media.
			if(file_exists(THEME."style_mobile.css")){
            	echo "<link rel='stylesheet' href='".THEME_ABS."style_mobile.css' type='text/css' media='handheld' />\n";
                $css_default = "screen";
			}
			if(file_exists(THEME."style_print.css")){
            	echo "<link rel='stylesheet' href='".THEME_ABS."style_print.css' type='text/css' media='print' />\n";
                $css_default = "screen";
			}
			echo "<link rel='stylesheet' href='".THEME_ABS."style.css' type='text/css' media='{$css_default}' />\n";
		}
		if (!isset($no_core_css) || !$no_core_css) {
			echo "<link rel='stylesheet' href='".e_FILE_ABS."e107.css' type='text/css' />\n";
		}
	}
}
?>
</head>
<body>
<?
$query10  = "
SELECT * FROM ".MPREFIX."er_ytm_gallery_movies gm
LEFT JOIN ".MPREFIX."er_ytm_gallery_category gg ON gm.movie_category = gg.cat_id
WHERE movie_id = '$show_movie_id'";

$result10 = mysql_query($query10);
$row10    = mysql_fetch_array($result10,MYSQL_ASSOC);

$c_movie_title    = $row10['movie_title'];
$c_movie_category = $row10['cat_name'];
$c_movie_user     = $row10['input_user'];
$c_movie_comment  = $row10['input_comment'];
$c_movie_mail     = $row10['input_email'];
$c_movie_time     = $row10['timestamp'];
$c_movie_code     = $row10['movie_code'];
$c_movie_id       = $row10['movie_id'];

if ($c_movie_category == "") {$c_movie_category = "<i>". LAN_YTM_SUBM_PREFS_60 ."</i>";}
if ($c_movie_comment == "") {$c_movie_comment = "<i>". LAN_YTM_SUBM_PREFS_16 ."</i>";}
if ($c_movie_mail == "") {$c_movie_mail = LAN_YTM_SUBM_PREFS_17;}else{$c_movie_mail = "<a href='mailto:$c_movie_mail?subject=". LAN_YTM_SUBM_PREFS_26 .": $c_movie_title'>$c_movie_mail</a>";}

echo "<img src='".e_PLUGIN."ytm_gallery/images/icon_32.gif' border='0' />";

echo "<center>";

echo "<b>". LAN_YTM_SUBM_PREFS_2 ."</b>";
echo "<br />";
echo $c_movie_title;
echo "<br /><br />";

echo "<b>". LAN_YTM_SUBM_PREFS_14 ."</b>";
echo "<br />";
echo $c_movie_category;
echo "<br /><br />";

echo "<b>". LAN_YTM_SUBM_PREFS_5 ."</b>";
echo "<br />";
echo $c_movie_user;
echo "<br />";
echo "<i>$c_movie_mail</i>";
echo "<br /><br />";

echo "<b>". LAN_YTM_SUBM_PREFS_12 ."</b>";
echo "<br />";
echo $c_movie_time;
echo "<br /><br />";

echo "<b>". LAN_YTM_SUBM_PREFS_13 ."</b>";
echo "<br />";
echo $c_movie_comment;
echo "<br /><br />";
?>
<object width="400" height="280">
<param name="movie" value="http://www.youtube.com/v/<?echo $c_movie_code?>?fs=1&amp;hl=hu_HU&amp;rel=0"></param>
<param name="allowscriptaccess" value="never"></param>
<param name="allowFullScreen" value="true"></param>
<param name="allowNetworking" value="internal">

<embed src="http://www.youtube.com/v/<?echo $c_movie_code?>?fs=1&amp;hl=hu_HU&amp;rel=0" type="application/x-shockwave-flash" width="400" height="280" allowscriptaccess="never" allowNetworking="internal" allowfullscreen="true"></embed>
</object>
<?
echo "</center>";
?>
</body>
</html>