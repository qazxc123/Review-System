<html>
<head>
<meta http-equiv="Content-Language" content="zh-tw">
<meta http-equiv="Content-Type" content="text/html"; charset="UTF-8">
<style>
body{background-color:white;}
</style>
</head>
<body>
<?
require_once("connsql.php");//
$sql = "SELECT * FROM contribution WHERE contributionID='".$_GET["ID"]."'";
$record = mysql_query($sql);
$row = mysql_fetch_assoc($record);

echo $row["Title"]."</br>";
echo $row["Content"];//顯示文章內容
?>
</body>
</html>