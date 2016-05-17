<!DOCTYPE HTML>
<?php
require_once("connsql.php");//
$sql = "SELECT * FROM contribution WHERE contributionID='".$_GET["ID"]."'";
$record = mysql_query($sql);
$row = mysql_fetch_assoc($record);
?>
<html>  
<head>
<title>審核通過畫面</title>
<meta http-equiv="Content-Language" content="zh-tw">
<meta http-equiv="Content-Type" content="text/html"; charset="UTF-8">
<style>
p{
display:inline-block;
margin:auto 21.45%;
}

li {
display:inline-block;
}
body{
	background-color:antiquewhite;
}

</style>
<script language="javascript">
function check_form() {	
  return confirm("確定送出?");
  }
  </script>
</head>
<body>
<h1 align="center" ><? echo $row["Title"];?></h1>
<div align="center">
<iframe  align="center" src="yesno-src.php?ID=<?echo $_GET["ID"]?>" height="300px" width="900px"  name="iframe" scrolling="yes"></iframe>
</div>
<!--<table border="2" align="center" width="900" height="300">
<td>
<?
echo $row["Title"]."</br>";
echo $row["Content"];//顯示文章內容
?>
</td>
</table>-->
<br>

<p>
<li>
<form method="GET" name="pass" action="pass.php" onsubmit="return check_form()">
    <input type="submit" value="通過">
    <input type="hidden" name="ID" value="<?echo $_GET["ID"]?>">
</form>
</li>
<li>
<form method="GET" name="passout" action="passout.php" onsubmit="return check_form()">
    <input type="submit" value="不通過">
    <input type="button" value="返回" onclick="history.back()">
    <input type="hidden" name="ID" value="<?echo $_GET["ID"]?>">
</form>
</li>
</p>

</body>
</html>