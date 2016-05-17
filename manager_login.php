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
<title>管理者</title>
<meta http-equiv="Content-Language" content="zh-tw">
<meta http-equiv="Content-Type" content="text/html"; charset="UTF-8">
<style>
body{
	background-color:#E8CCFF;
	font-family: 標楷體;
}
a:link {
    color: #003C9D;
}
a:visited {
    color: #C10066;
}
a:hover {
    color: #00DDDD;
}
a:active {
    color: #8B4513;
}
</style>
</head>

<body>
<p align="center"><font  size = "20"; style="border:solid">歡迎使用</font></p>



<div align="center">
<p>
 
 <?php echo $row["ID"];?>    

</p>
</div>
  
  <table align = "center" border = "1" >
  <tr>
  <td>  <a href="manager_center.php" style="text-decoration:none"> <font size="6">審稿</font></a> </td>
  </tr>
  <br>
    <table align = "center" border = "1" > 
	<tr>
	<td> <a href="manager_record.php" style="text-decoration:none"> <font size="6">紀錄</font></a> </td>
	</tr>
	<br>
	 <table align = "center" border = "1" >
	 <tr>
    <td> <a href="logout.php" style="text-decoration:none"> <font size="6">登出</font></a> </td>
	</tr>
	<br>
	</body>
</html>	

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	