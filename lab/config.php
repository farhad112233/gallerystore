<?php
 define("SIT_TITLE", "image gallery");
 define("HOME_URL", "http://localhost/26");
 define("TIME_FORMAT", "d f Y H:i:s");
 define("HOME_DIR",dirname(__DIR__));


 ini_set("display_errors", "on");
 error_reporting(E_ALL);

////  data base config ///
$dbHost="localhost";
$dbName="imge";
$dbUser="root";
$dbPas="";
$db=new mysqli($dbHost,$dbUser,$dbPas,$dbName);
if($db->connect_error){
	printf("connect failed: %s\n",$db->connect_error);
	exit;
}
$db->query("SET NAMES UTF8;");
// $db->tableQues="ques";
// $db->tableAnswer="answer";







// echo "first line  ";
//  echo(date("d-F-Y H:i:s","2020-10-10 20:18:0"));
//  echo " last_line ";
?>