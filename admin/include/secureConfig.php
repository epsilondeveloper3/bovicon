<?php
	require("include/config.php");
	if(!isset($_SESSION['admin_info']) || $_SESSION['admin_info']=="") {
		header("location:index");
		exit;
	}
?>