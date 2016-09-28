<?php
if(!empty($_GET['mod']) == "a") {
	include_once("view/select.modal.php");
}
else {
	include_once("view/home.php");
}
?>