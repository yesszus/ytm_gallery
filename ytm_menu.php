<?php

$lan_file = e_PLUGIN."ytm_gallery/languages/".e_LANGUAGE.".php";
require_once(file_exists($lan_file) ? $lan_file :  e_PLUGIN."ytm_gallery/languages/English.php");

$query  = "
SELECT random_menu, static_menu, menu_width, menu_height, title_menu, active FROM ".MPREFIX."er_ytm_gallery yg
LEFT JOIN ".MPREFIX."er_ytm_gallery_movies gm ON yg.static_menu = gm.movie_code
WHERE id = '1'";

$result = mysql_query($query);

while ($row = mysql_fetch_array($result,MYSQL_ASSOC)) {
$random           = $row['random_menu'];
$static_id        = $row['static_menu'];
$film_width       = $row['menu_width'];
$film_height      = $row['menu_height'];
$film_menu        = $row['title_menu'];
$static_check     = $row['active'];
}

$show = "1";

if ($random == "1") {

            $classes = e_CLASS_REGEXP;
            $classes = str_replace("(^|,)(", "", $classes);
            $classes = str_replace(")(,|$)", "", $classes);
            $classes = (explode("|",$classes));


            $qspec_i = 0;
            foreach($classes as $class) {
            $qspec = $class;
            if (!$qspec_i == 0) {$pre_qspecq = "OR";}
            $qspecq .= "$pre_qspecq cat_auth = '$qspec' ";
            $qspec_i++;
            }
            $auth_spec .=  "($qspecq)";

      $query02  = "SELECT movie_code, movie_category, cat_id, cat_auth FROM ".MPREFIX."er_ytm_gallery_movies ym
                  LEFT JOIN ".MPREFIX."er_ytm_gallery_category yc ON ym.movie_category = yc.cat_id
                  WHERE $auth_spec AND active = '1' AND input_status = '1' ORDER BY RAND() LIMIT 0,1";
                  
      $res02 = mysql_query($query02);

      if (mysql_num_rows($res02) >= 1) {
      $film_id = mysql_result($res02, 0);
      }else{
      $show = "0";}

}

if ($random == "0") {

      $film_id = $static_id;

      if ($film_id == "") {$show = "0";}
      if (!$static_check == "1") {$show = "0";}
}

if ($show == "0") {

$ytm_text .= LAN_YTM_MENU;

}else{

$ytm_text = "
<center><!--<br><a href='e107_plugins/ytm_gallery/ytm.php'>M&#233;g T&#246;bb Vide&#243;</a><br>--><br>
<!--<object width='$film_width' height='$film_height'>
<param name='movie' value='http://www.youtube.com/v/$film_id?fs=1&amp;hl=hu_HU&amp;rel=0'></param>
<param name='allowscriptaccess' value='never'></param>
<param name='allowFullScreen' value='true'></param>
<param name='allowNetworking' value='internal' />

<embed src='http://www.youtube.com/v/$film_id?fs=1&amp;hl=hu_HU&amp;rel=0' type='application/x-shockwave-flash' allowscriptaccess='never' allowNetworking='internal' allowfullscreen='true' width='$film_width' height='$film_height'></embed>
</object>-->

<iframe src='//www.youtube.com/embed/$film_id?hl=hu_HU&hd=%%use_hq_vids%%&rel=0&autoplay=%%player_autoplay%%&color2=0x%%player_bgcolor%%&showsearch=0&showinfo=0&iv_load_policy=3&modestbranding=1' width='100%' width='$film_width' height='$film_height' frameborder='0'></iframe>

<br><br>
</center>
";
}

$ns -> tablerender($film_menu, $ytm_text);
?>