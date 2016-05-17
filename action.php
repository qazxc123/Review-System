<?php
error_reporting(0);
header ("Content-Type: text/html; charset=utf-8");//php 編碼設定
require_once("connsql.php");
session_start();//12-10
 
$title = mysql_escape_string($_POST["title"]);
$textblock = mysql_escape_string($_POST["textBlock"]);
 
//--------------------------------------------------insert
$sql="insert into Contribution (Title,content,ID,date) values(";//使用escape
$sql .="'".$title."',";//標題
$sql .="'".$textblock."',";//內容
$sql .= "'u12345',"; //"'".$_SESSION["account"]."'," 12-10
$sql .="now())";//日期
mysql_query($sql);
//-------------------------------------------------Split()

$sql = "SELECT max(ContributionID) FROM Contribution";
$record = mysql_query($sql);
$row = mysql_fetch_assoc($record);


$string = $_POST["textBlock"];
mb_regex_encoding('utf-8');
mb_internal_encoding('utf-8');
$string = mb_split("[，。()?:!，。）（？：！]",$string);
//$count = count($string);

$i=1;
foreach($string as $split){ //for($i=0;$i<$count;$i++)
$sql="insert into sentence(ContributionID,SentenceContent,SentenceID) values('";
$sql .=$row["max(ContributionID)"]."',";//
$sql .="'".$split."',";
$sql .="'".$row["max(ContributionID)"]."-".$i."')";
mysql_query($sql);
$i++;
}

/*for($i=0;$i<$count;$i++)
{
echo $string[$i]."<BR>";
}*/

//-----------------------------------------------API()

ini_set("max_execution_time","6000");
function searchWeb( $query ){
    $acctKey = 's0sjwRT2ro3Jxgs1DTeivoYOONRFKkXSrQY65UkSStQ'; //金鑰
    $query = urlencode($query);//Url編碼
    $Uri = 'https://api.datamarket.azure.com/Bing/Search/v1/Web?'.'$format=json&Query=%27'.$query.'%27';
    $auth = base64_encode("$acctKey:$acctKey");//加密
    $opts = array(
        'http' => array(
            'request_fulluri' => true,	
            'ignore_errors' => true,//false
            'header' => "Authorization: Basic $auth"
        )
    );
    $context = stream_context_create($opts);
    $response = file_get_contents($Uri, 0, $context);
    $ob = json_decode($response);
    return $ob->d->results;
}
$i=1;
foreach($string as $split){//+mysql_escape_string
$data = searchWeb($split);
    foreach($data as $v) {
    $sql="insert into queryresult(Title,URL,SentenceID) values('";
    $sql.=$v->Title."',";
    $sql.="'".$v->Url."',";
    $sql.="'".$row["max(ContributionID)"]."-".$i."')";	
    mysql_query($sql);
             }
			 $i++;
}



?>
<script language="javascript">
alert("投稿完成");
window.location.href = "user_login.php";
</script>

