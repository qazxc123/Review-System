<?
session_start();
//�NSESSION��ƲM���A�ɦ^index.php
unset($_SESSION["account"]);
header("Location:index.php");
?>