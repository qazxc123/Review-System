<?php
require_once("connsql.php");//
$sql = "SELECT * FROM contribution WHERE contributionID='".$_GET["ID"]."'";
$record = mysql_query($sql);
$row = mysql_fetch_assoc($record);
$_GET["ID"];
?>
<html>  
<head>
<title>審核頁面</title>
<meta http-equiv="Content-Language" content="zh-tw">
<meta http-equiv="Content-Type" content="text/html"; charset="UTF-8">
<style>
a{text-decoration:none;}
body{
	background-color:#FFB6C1;
}

table{
	background-color:white;
}
div{display:inline-block; position:relative; left:11.5%;}

#left{margin-right:15px;}

</style>
</head>
<body>
<p align="right" id="button">
<a  href="result.php?ID=<?echo $_GET["ID"]?>">文章判斷統計結果</a>
<a  href="check.php?ID=<?echo $_GET["ID"]?>" target="iframe">文章比對</a>
</p>
<p id="center">

<div id="left">
<iframe  align="right" src="display-left.php?ID=<?echo $_GET["ID"]?>" height="600px" width="500px"  name="iframeleft" scrolling="yes"></iframe>
</div>

<div id="right">
<iframe  align="right" src="display-right.php?ID=<?echo $_GET["ID"]?>" height="600px" width="500px"  name="iframe" scrolling="yes"></iframe>
</div>
</p>

<form action="yesno.php">
<p align="center" method="GET">
     <input type="submit" value="確定" ></input> &nbsp;
     <input type="button" value="返回" onclick="history.back()">
	 <input type="hidden" name="ID" value="<?echo $_GET["ID"]?>">
</p>
	 
</form>



</body>
</html>