<html>
<head>
<title>投稿畫面</title>                             
<meta http-equiv="Content-Language" content="zh-tw">
<meta http-equiv="Content-Type" content="text/html"; charset="UTF-8">
<style>
body{
	background-color:#CCEEFF;
	font-family: 標楷體;
}
#a1{
	position:relative;
	left:40px;
}
</style>
<script language="javascript"><!--增加空值錯誤訊息-->
function check_form() {
	if(document.input.title.value ==""){
		alert("請輸入標題!");
		return false;
	}
	if(document.input.textBlock.value ==""){
		alert("文章內容不可空白，請輸入文章內容!");
		return false;
	}
	
  return confirm("確定送出?");
  }
  </script>
</head>

<body>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="http://more.handlino.com/javascripts/moretext-1.2.js" type="text/javascript"></script>

<table  align="center"  width="50%" height="700">
<td>
<p  align="center"><font face="標楷體" size = "20" style="border:solid">投稿</font></p>

<form align="center" name="input" method="POST" action="action.php" onsubmit="return check_form();"> 
<p id="a1" align="left"><font face="標楷體" size="5">標題</font><input type="text" name="title" size="60"></input></p>
<p id="a1" align="left"><font face="標楷體" size="5">內容</font></p>
<p align="center"><textarea cols=87 rows=20  name="textBlock" class="lipsum(20,20)"></textarea><br> 
<p align="center"><input type="submit" id="go" value="送出">&nbsp;&nbsp;&nbsp;
<input type="button" id="back" value="取消" onclick="history.back()"></p>
</form>
</td>
</table>
</body>
</html>