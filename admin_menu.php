<?php

   $menutitle  = LAN_YTM_OPMENU_PREFS;

   $butname[]  = LAN_YTM_OPMENU_PREFS_0;
   $butlink[]  = "admin_config.php";
   $butid[]    = "main_config";

   $butname[]  = LAN_YTM_OPMENU_PREFS_2;
   $butlink[]  = "admin_config_category.php";
   $butid[]    = "category_config";

   $butname[]  = LAN_YTM_OPMENU_PREFS_1;
   $butlink[]  = "admin_config_movie.php";
   $butid[]    = "movie_config";

   $butname[]  = LAN_YTM_OPMENU_PREFS_3;
   $butlink[]  = "admin_config_submit.php";
   $butid[]    = "submit_config";

/*   $butname[]  = LAN_YTM_OPMENU_PREFS_4;
   $butlink[]  = "admin_config_import.php";
   $butid[]    = "import_config";

   $butname[]  = LAN_YTM_OPMENU_PREFS_5;
   $butlink[]  = "admin_check_update.php";
   $butid[]    = "check_update";
   
   $butname[]  = LAN_YTM_OPMENU_PREFS_6;
   $butlink[]  = "admin_news.php";
   $butid[]    = "check_news";  */
   
   $butname[]  = LAN_YTM_OPMENU_PREFS_7;
   $butlink[]  = "admin_readme.php";
   $butid[]    = "admin_readme";


   global $pageid;
   for ($i=0; $i<count($butname); $i++) {
      $var[$butid[$i]]['text'] = $butname[$i];
      $var[$butid[$i]]['link'] = $butlink[$i];
   };

   show_admin_menu($menutitle, $pageid, $var);
?>