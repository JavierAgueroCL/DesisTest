<?php
session_start();
//$_SESSION["yo"]="si";
//if($_SESSION["yo"]=="si"){
	include("includes/base.conf.php");
	include("includes/functions.php");


	if(!empty($_GET['mod'])) { get_modal($_GET['mod']); }
	else { include_once("view/home.php"); }
/*
	}
	else{
		echo "<h1>No Permitido</h1>";
		var_dump($_SESSION);
}
*/
?>
