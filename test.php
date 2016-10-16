<?php

require_once("BulkSMS.php");


$obj = new BulkSMS('user', 'pass','http://smsbulk.eg.mobizone.mobi/BSMS/BSendAPI?');

//message body , language , recipient , sender
$obj->sendSMS('لقد تم الجز', 'ar' , 201281264677 ,'E7gezly');

?>
