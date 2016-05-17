<?
//資料庫主機定
$db_host = "localhost";
$db_table = "abc";
$db_username = "root";
$db_password = "root";
//設定連線資料
if (!@mysql_connect($db_host, $db_username, $db_password))
die("資料連結失敗");
if(!@mysql_select_db($db_table))
die("資料庫選擇失敗");
//設定字元集與連線校對
mysql_query("SET NAMES'UTF8'");
?>