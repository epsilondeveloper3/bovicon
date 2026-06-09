<?php
if(isset($_SESSION['alert_msg'])){
	echo $_SESSION['alert_msg'];
}
	$_SESSION['alert_msg'] = "";
?>