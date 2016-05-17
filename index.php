<html>
<head>
<meta http-equiv="Content-Language" content="zh-tw">
<meta http-equiv="Content-Type" content="text/html";charset="UTF-8">
<title>登入</title>
<?php if(isset($_GET["loginFail"])) {?>
  <script language="javascript">
    alert("帳號或密碼有誤"+"\n"+"   請重新輸入!");
  </script>
<?php } ?>
<style>
body{
	background: #CCEEFF;
	margin:100px auto;
}
</style>

</head>

<body>

   
<form method="POST" action="Login.php">
	
	<b><p align="center"><font face="標楷體" size="60" >審稿輔助應用</font></p></b>
	<br>
	<b><p align="center"><font face="標楷體" size="5">帳號 </font><input type="text" name="account"  size="24" ></p></b>
	<b><p align="center"><font face="標楷體" size="5">密碼 </font><input type="password" name="password"  size="24"></p></b>
	<p align="center"><input type="submit" value="登入" name="Login">
</form>
</body>
<!---->
</html>