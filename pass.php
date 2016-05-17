<?
require_once("connsql.php");

//寫入資料庫
$sql="update Contribution set AuditingResult = '通過' where ContributionID ='".$_GET["ID"]."'";
mysql_query($sql);
$sql="update Contribution set AuditingDate = now() where ContributionID ='".$_GET["ID"]."'";
mysql_query($sql);
?>
<script language="javascript">
alert("審稿完成");
window.location.href = "manager_login.php";
</script>