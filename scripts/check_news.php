<?php

include "parse_xml.php";

// Creating feed
$news_feed       ="http://rabklan.info/e107_plugins/rss_menu/rss.php?news.2";


// Test if feed contains information
$xml = file_get_contents("$news_feed");
$parser = new XMLParser($xml);
$parser->Parse();
$up_check =      ($parser->document->id[0]->tagData);
if ($up_check == "") {
$check = "0";
}else{
$check = "1";
}

$text .= "<br />";

if ($check == "1") {

      $xml = file_get_contents("$news_feed");
      $parser = new XMLParser($xml);
      $parser->Parse();

       $ne_i = 0;

            $doc = $parser->document->entry;
            foreach($doc as $entry)
            {

                  if ($ne_i > 5) {break;}

                  $title   = ($entry->title[0]->tagData);
            	$date    = ($entry->updated[0]->tagData);
            	$summary = ($entry->summary[0]->tagData);
                  $link    = ($entry->id[0]->tagData);

                  $summary = str_replace ("<?","...",$summary);
                  $date    = explode("T",$date);
                  $date    = $date[0];
                  $date    = explode("-",$date);
                  $year    = $date[0];
                  $month   = $date[1];
                  $day     = $date[2];
                  $date    = "$day-$month-$year";
                  

            $text .= "<b><a href='$link' target='_blank'>$date: $title</a></b>";
            $text .= "<br />";
            $text .= $summary;
            $text .= "<br /><br />";

            $ne_i++;
            
            }

	    
}else{
$text .= LAN_YTM_NEWS_PREFS_0;}
?>