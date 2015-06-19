<?php
function htmlcode($orimessage)
{
$message= preg_replace("/\r\n|\r|\n/", ' ', $orimessage);
$s = array ("<", ">");
$z = array ("&lt;","&gt;");
$final = str_replace($s, $z, $message);
$message=trim(str_replace("\\n", "<br/>", $final));
return htmlspecialchars(stripslashes($message), ENT_QUOTES, "UTF-8");
}

function htmlcode_nolink($orimessage){
$message= preg_replace("/\r\n|\r|\n/", ' ', $orimessage);
$s = array ("<", ">");
$z = array ("&lt;","&gt;");
$final = str_replace($s, $z, $message);
return stripslashes($final);
}
?>
