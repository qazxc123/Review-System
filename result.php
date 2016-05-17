<? 
require_once("connsql.php");
//".$_GET["ID"].";

$sql = "select count(title),title,URL 
from queryresult
where sentenceID like '".$_GET["ID"]."%'
group by URL 
order by count(title) desc
LIMIT 3";
$record = mysql_query($sql);
?>
<html>
<head>
<title>判斷統計結果</title>
<meta http-equiv="Content-Language" content="zh-tw">
<meta http-equiv="Content-Type" content="text/html"; charset="UTF-8">
<style>
table ,tr,th,td{border:1px solid black;}
th,td{width:500px;}
body{
	background-color:#E0FFFF;
}
</style>
</head>
<body>
<h1 align="center" ><font size="10" >文章判斷統計結果</font></h1>
<?
  echo'<table align="center">';
  echo'<tr>';
  echo'<th align="center">'.'網址'.'</th>'.'<th align="center">'.'出現次數'.'</th>';
  echo'</tr>';
  while($row = mysql_fetch_assoc($record))
  {
  echo'<tr>';
  echo'<td align="center">'.$row['title'].'<BR>'.$row['URL'].'</td>'.'<td align="center">'.$row['count(title)'].'</td>';
  echo'</tr>';
  echo "<br/>";
    
  }mysql_close();
echo'</table>'; 
echo'<br>';
echo '<div align="center">';
echo '<td border="0" align="center"><input type="button" value="返回" onclick="history.back()"></td>';
echo '</div>'; 
?>


</body>
</html>