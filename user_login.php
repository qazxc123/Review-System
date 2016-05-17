<?php 
require_once("connsql.php");
session_start();
  //查詢登入會員資料
 $sql = "SELECT * FROM User WHERE account='".$_SESSION["account"]."'";
 $record = mysql_query($sql);
 $row = mysql_fetch_assoc($record);
 
  ?>
<html>
<head>
<title>使用者</title>	
<meta http-equiv="Content-Language" content="zh-tw">
<meta http-equiv="Content-Type" content="text/html"; charset="UTF-8">
<style>
body{
	background-color:#CCEEFF;
	margin:100px auto;
}
a{
     text-decoration:none;
}
a:link{
	color:#3A0088;
}
a:visited{
	color:#C10066;
}
a:hover{
	color:#FFFF33;
}
a:active{
	color:#66FFFF;
}
</style>
</head>
<body>
<div align="center">

<b><font face="標楷體" size = "20"; style="border:solid">歡迎使用</font></b>

</div>

<div align="center">
<p>
<?php echo $row["ID"];?>	   
</p>
</div>
  <br>
  <table align = "center" border = "1" >
  <tr>
  <td>  <b><a href="user_center.php" style=""> <font face="標楷體" size="6" >投稿</font></a></b> </td>
  </tr>
  <br>
    <table align = "center" border = "1" > 
	<tr>
	<td> <b><a href="user_record.php" style="text-decoration:none"> <font face="標楷體" size="6">查詢</font></a></b> </td>
	</tr>
	<br>
	 <table align = "center" border = "1" >
	 <tr>
    <td> <b><a href="logout.php" style="text-decoration:none"> <font  face="標楷體" size="6">登出</font></a></b> </td>
	</tr>
	<br>
</body>
</html>	