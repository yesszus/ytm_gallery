
// USAGE: [yt=width,height]WeN8SvkU0Tw[/yt]

$lan_file = e_PLUGIN."ytm_gallery/languages/".e_LANGUAGE.".php";
require_once(file_exists($lan_file) ? $lan_file :  e_PLUGIN."ytm_gallery/languages/English.php");



$ytmovie_path   = $code_text;

$parm_array     = explode(",",$parm);

$width_type     = strpos($parm_array[0], "%") !== FALSE ? "%" : "";
$height_type    = strpos($parm_array[1], "%") !== FALSE ? "%" : "";

$width_value    = ereg_replace("[^0-9]","",$parm_array[0]);
$height_value   = ereg_replace("[^0-9]","",$parm_array[1]);

$width_value    = $width_value  ? $width_value.$width_type   : "200";
$height_value   = $height_value ? $height_value.$height_type : "200";

return "<object width='$width_value' height='$height_value'>
<param name='movie' value='http://www.youtube.com/v/$ytmovie_path?fs=1&amp;hl=hu_HU&amp;rel=0'></param>
<param name='allowscriptaccess' value='never'></param>
<param name='allowFullScreen' value='true'></param>
<param name='allowNetworking' value='internal' />
<embed src='http://www.youtube.com/v/$ytmovie_path?fs=1&amp;hl=hu_HU&amp;rel=0' type='application/x-shockwave-flash' width='$width_value' height='$height_value' allowscriptaccess='never' allowNetworking='internal' allowfullscreen='true'></embed>
</object>";