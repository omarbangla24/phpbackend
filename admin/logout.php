<?php session_start();
$base_url="/dev/project/admin";
unset($_SESSION["uid"]);
unset($_SESSION["uname"]);
unset($_SESSION["urole"]);
session_destroy();

header("location:$base_url");
?>