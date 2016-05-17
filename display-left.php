<html>  
<head>
<meta http-equiv="Content-Language" content="zh-tw">
<meta http-equiv="Content-Type" content="text/html"; charset="UTF-8">
<style>
body{background-color:white;}
</style>
<body>
<?
require_once("connsql.php");//
$sql = "SELECT * FROM contribution WHERE contributionID='".$_GET["ID"]."'";
$record = mysql_query($sql);
$row = mysql_fetch_assoc($record);


echo'<h1>'.$row["Title"].'</h1>';
echo $row["Content"];
?>
</body>
</html>