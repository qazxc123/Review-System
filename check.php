<? 
//Error_reporting(0);
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
<meta charset="UTF-8">
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
<p><a href="#1" class="no1">文章一|</a><a href="#2" class="no2">文章二|</a><a href="#3" class="no3">文章三</a></p>
</div>
<a name="1"></a>
<div class="none"></div>
<div id="row">
<p><a href="<?echo $row['URL'];?>" target="_blank"></a></p>
<?
ini_set("max_execution_time","6000");
function check($url){
if(false == (file_get_contents($url))){
   $opts = array('http'=>array('header' => "User-Agent:MyAgent/1.0\r\n"));
   $context = stream_context_create($opts);
   $header = file_get_contents($url,false,$context);
   $header = strip_tags($header,'<style></style><script></script>'); 
   $header = mb_convert_encoding($header,"UTF-8",big5);
   echo $header;
}

else{
	$header = file_get_contents($url);
	$header = strip_tags($header,'<style></style><script></script>');
	echo $header;
   }     
}
$url = $row['URL'];
check($url);                                                                                        
?>
</div>
<hr>
<div id="row2"><a name="2"></a>
<div class="none"></div>
<p><a href="<?echo $row2['URL'];?>" target="_blank"></a></p>
<?
ini_set("max_execution_time","6000");
$url2 = $row2['URL'];
check($url2);
?>
</div>
<hr>
<div id="row3"><a name="3"></a>
<div class="none"></div>
<p><a href="<?echo $row3['URL'];?>" target="_blank"></a></p>
<?
ini_set("max_execution_time","6000");
$url3 = $row3['URL'];
check($url3);
?>
</div>

<p align="center"><input type="button" value="返回" onclick="history.back()"></P>
</body>
</html>