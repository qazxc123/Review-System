<?php
require_once("connsql.php");//經過connsql即設定編碼big5()
$sql = "SELECT * FROM contribution WHERE contributionID";
$record = mysql_query($sql);
$row = mysql_fetch_assoc($record);


echo $row['contributionID'];
?>