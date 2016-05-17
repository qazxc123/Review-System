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

?>
<html>
<head><title>文章比對</title>
<meta http-equiv="Language" content="zh-tw">
<meta http-equiv="content type" content="text/html" charset="UTF-8">
<style>
a{text-decoration:none;}
a:visited{color:blue;}

body{background:white;}
#style1{background-color:white;  position:fixed;   top:0px; margin:auto; opacity:0.9;}
.none{background-color:white; height:50px;}

#row:hover{background-color:#DDDDDD;}
#row2:hover{background-color:#FFFFBB;}
#row3:hover{background-color:#CCDDFF;}
</style>

</head>
<body>
<div id="style1">
<p><a href="#1" class="no1">文章一</a><a href="#2" class="no2">文章二</a><a href="#3" class="no3">文章三</a></p>
</div>
<a name="1"></a>
<div class="none"></div>
<div id="row">
<?
$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL, $row["URL"]);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_USERAGENT, "Google Bot");
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
$output = curl_exec($ch);
curl_close($ch);
$output = strip_tags($output,'<style></style><script></script>');
echo $output;                                                                                     
?>
</div>
<hr>
<div id="row2"><a name="2"></a>
<div class="none"></div>
<?
$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL, $row2["URL"]);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_USERAGENT, "Google Bot");
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
$output = curl_exec($ch);
curl_close($ch);
$output = strip_tags($output,'<style></style><script></script>');
echo $output;    
?>
</div>
<hr>
<div id="row3"><a name="3"></a>
<div class="none"></div>
<?
$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL, $row3["URL"]);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_USERAGENT, "Google Bot");
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
$output = curl_exec($ch);
curl_close($ch);
$output = strip_tags($output,'<style></style><script></script>');
echo $output;    
?>
</div>

<p align="center"><input type="button" value="返回" onclick="history.back()"></P>
</body>
</html>