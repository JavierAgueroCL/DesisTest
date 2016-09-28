<?php
include("includes/base.conf.php");
include("includes/functions.php");

//empty($_GET['m']) ? $m = "login" : $m = $_GET['m'];
if(!empty($_GET['mod'])) { get_modal($_GET['mod']); }
else { include_once("view/home.php"); }
?>