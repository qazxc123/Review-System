<?
session_start();
//將SESSION資料清除，導回index.php
unset($_SESSION["account"]);
header("Location:index.php");
?>