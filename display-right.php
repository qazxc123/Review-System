<? 
require_once("connsql.php");
//".$_GET["ID"].";

$sql = "select count(title),title,URL 
from queryresult
where sentenceID like '".$_GET["ID"]."%'
group by URL 
order by count(title) desc
LIMIT 1";
$record = mysql_query($sql);
$row = mysql_fetch_assoc($record);//count(title)第一筆

$sql2 = "select count(title),title,URL 
from queryresult
where sentenceID like '".$_GET["ID"]."%'
group by URL 
order by count(title) desc
LIMIT 1,1";
$record2 = mysql_query($sql2);
$row2 = mysql_fetch_assoc($record2);//count(title)第二筆

$sql3 = "select count(title),title,URL 
from queryresult
where sentenceID like '".$_GET["ID"]."%'
group by URL 
order by count(title) desc
LIMIT 2,1";
$record3 = mysql_query($sql3);
$row3 = mysql_fetch_assoc($record3);//count(title)第三筆

//echo $row3["count(title)"],$row3["title"];


$sql4 = "select count(number)
from sentence
where sentenceID like '".$_GET["ID"]."%'";
$record4 = mysql_query($sql4);
$row4 = mysql_fetch_assoc($record4);//count(number)句子數量總數

$ans  = $row4["count(number)"] / $row["count(title)"];
$ans2 = $row4["count(number)"] / $row2["count(title)"];
$ans3 = $row4["count(number)"] / $row3["count(title)"];  
$ans4 = $row["count(title)"]+$row2["count(title)"]+$row3["count(title)"];
$ans4 = $row4["count(number)"];
?>
<html>  
<head>
<title>統計圓餅圖</title>
<meta http-equiv="Content-Language" content="zh-tw">
<meta http-equiv="Content-Type" content="text/html"; charset="UTF-8">
<style>
li{display:inline-block;
text-decoration:none;
}
body{
	background-color:white;
}
</style>
</head>
<body>
<h1>圓餅統計圖<h1>

<?
echo '<img src="http://chart.apis.google.com/chart?cht=p&chs=450x200&chco=00AAFF,7777CC,00FF00,AA0033&chd=t:'
.$ans.','.$ans2.','.$ans3.','.$ans4.'&chl='.$row["title"].'|'.$row2["title"].'|'.$row3["title"].'|其他網站"></a>';
//  $ans|$ans2|$ans3 $row,2,3["title"]|$row,2,3["URL"]
?>
</body>
</html>
