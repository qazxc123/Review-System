<?php
require_once("connsql.php");//經過connsql即設定編碼UTF8()
?>
<html>
<head>
<title>查詢畫面</title>
<meta http-equiv="Content-Language" content="zh-tw">
<meta http-equiv="Content-Type" content="text/html"; charset="UTF-8">
<style>
table ,tr,th,td{border:1px solid black;}
th,td{width:250px;}
body{
	background-color:#CCEEFF;
	font-family: 標楷體;

	
}
</style>
</head>
<body>
<p align="center"><font size = "20" style="border:solid">查詢</font></p>

<?
$record = mysql_query("select Title,date,AuditingResult from contribution order by contributionID "); 
  echo'<table align="center" frame="box">';
  echo'<tr>';
  echo'<th align="center">'.文章名稱.'</th>'.'<th align="center">'.日期.'</th>'.'<th align="center">'.審核結果.'</th>';
  echo'</tr>';
  while($row = mysql_fetch_assoc($record))
  {
  echo'<tr>';
  echo'<td align="center">'.$row['Title'].'</td>'
      .'<td align="center">'.$row['date'].'</td>'
	  .'<td align="center">'.$row['AuditingResult'].'</td>';
echo'</tr>';
  echo "<br />";
    
  }mysql_close();
echo'</table>';  
  echo '<div align="center">';
  echo'<td border="0" align="center"><input  type="button" value="返回" onclick="history.back()"></td>';
  echo '</div>';

?>

<!--<p align="center"><input  type="button" value="返回" onclick="history.back()"></p>-->
</body>
</html>