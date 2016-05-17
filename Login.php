<?
require_once("connsql.php");
session_start();

if(isset($_POST["account"]) && isset($_POST["password"])) {		
    //查詢
    $sql = "SELECT * FROM user WHERE Account like 'u%' and Account='".$_POST["account"]."'";
    $record = mysql_query($sql); 
    $row = mysql_fetch_assoc($record); 
    $account = $row["Account"];//取出帳號
    $password = $row["Password"];//取出密碼  
    if($_POST["account"]==$account&&$_POST["password"]==$password) {  //比對輸入帳密與資料庫帳密
     $_SESSION["account"] = $account;//指定SESSION
	 $_SESSION["password"] = $password;//指定SESSION	 
	 if(isset($_COOKIE["account"])) {
	   setcookie("account", $_POST["account"], time()+3600); //有效時間
	   setcookie("password", $_POST["password"], time()+3600);//有效時間
	 }
	  header("Location: user_login.php"); 
	 }
	 
    
	else { 
	//查詢-----
    $sql = "SELECT * FROM user WHERE Account like 'm%' and Account='".$_POST["account"]."'"; 
    $record = mysql_query($sql);
    $row = mysql_fetch_assoc($record);
    $account = $row["Account"];
    $password = $row["Password"];
    if($_POST["account"]==$account&&$_POST["password"]==$password) {
     $_SESSION["account"] = $account;
	 $_SESSION["password"] = $password;	 
	 if(isset($_COOKIE["account"])) {
	   setcookie("account", $_POST["account"], time()+3600);
	   setcookie("password", $_POST["password"], time()+3600);
	   }
      header("Location: manager_login.php");
	  }
	  else{
	  header("Location:index.php?loginFail=true");
	  }
      
    }
	
	
	if($_POST["account"]==""&& $_POST["password"]=="") {
     header("Location:index.php?loginFail=true");
	}
}	
  
?>
