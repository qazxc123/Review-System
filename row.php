<?php
require_once("connsql.php");//�g�Lconnsql�Y�]�w�s�Xbig5()
$sql = "SELECT * FROM contribution WHERE contributionID";
$record = mysql_query($sql);
$row = mysql_fetch_assoc($record);


echo $row['contributionID'];
?>