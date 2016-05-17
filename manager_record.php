<?php
require_once("connsql.php");//經過connsql即設定編碼UTF8()
?>
<html>
<head> <title>紀錄</title>
<meta http-equiv="Content-Language" content="zh-tw">
<meta http-equiv="Content-Type" content="text/html"; charset="UTF-8">
<style>
table ,tr,th,td{border:1px solid black;}
th,td{width:250px;}
body{
	background-color:#E8CCFF;
	font-family: 標楷體;
}
</style>
</head>

<body>
<!--<p align="center"><font  size = "20"; style="border:solid">紀錄</font></p>-->
<?
$record = mysql_query("select user.ID,user.email,contribution.date,contribution.title from user,contribution where user.ID = contribution.ID order by contributionID "); 
echo '<p align="center"><font  size = "20"; style="border:solid">紀錄</font></p>';
  echo'<table align="center">';
  echo'<tr>';
  echo'<th align="center">'.'作者'.'</th>'.'<th align="center">'.文章.'</th>'.'<th align="center">'.Email.'</th>'.'<th align="center">'.投稿日期.'</th>';
  echo'</tr>';
  while($row = mysql_fetch_assoc($record))
  {
  echo'<tr>';
  echo'<td align="center">'.$row['ID'].'</td>'
      .'<td align="center">'.$row['title'].'</td>'
	  .'<td align="center">'.$row['email'].'</td>'
	  .'<td align="center">'.$row['date'].'</td>';
echo'</tr>';
  echo "<br />";
    
  }mysql_close();
echo'</table>';  
echo"</br>";
  echo '<div align="center">';
  echo'<td border="0" align="center"><input  type="button" value="返回" onclick="history.back()"></td>';
  echo '</div>';

?>
</body>

</html>