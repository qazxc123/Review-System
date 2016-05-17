<?php
require_once("connsql.php");
?>
<html>
<head> 
<title>審稿</title>
<meta http-equiv="Content-Language" content="zh-tw">
<meta http-equiv="Content-Type" content="text/html"; charset="UTF-8">
<style>
a{text-decoration:none;
}
table ,tr,th,td{border:1px solid black;}
th,td{width:250px;}
body{
	background-color:#E8CCFF;
	font-family: 標楷體;
}
</style>
</head>

<body>
<p align="center"><font  size = "20"; style="border:solid">未審核文章</font></p>
<?
$record = mysql_query("select user.ID,user.email,contribution.date,contribution.title,contributionID from user,contribution where user.ID = contribution.ID AND AuditingResult IS NULL order by contributionID"); 
  echo'<table align="center">';
  echo'<tr>';
  echo'<th align="center">'.'作者'.'</th>'.'<th align="center">'.文章.'</th>'.'<th align="center">'.Email.'</th>'.'<th align="center">'.投稿日期.'</th>';
  echo'</tr>';
  while($row = mysql_fetch_assoc($record))
  {
 
  echo'<tr>';
  echo'<td align="center">'.$row['ID'].'</td>'                
      .'<td align="center"><a href="display.php?ID='.$row['contributionID'].'">'.$row['title'].'</a></td>'//文章標題-連結到審核畫面
	  .'<td align="center">'.$row['email'].'</td>'
	  .'<td align="center">'.$row['date'].'</td>';
  echo'</tr>';
  echo "<br>";
    
	
  }mysql_close();
echo'</table>';  
echo "</br>";
  echo '<div align="center">';
  echo'<td border="0" align="center"><input  type="button" value="返回" onclick="history.back()"></td>';
  echo '</div>';

?>
</body>

</html>