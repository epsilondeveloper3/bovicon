<?php
include("include/config.php");

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $redirect = isset($_GET['redirect']) ? $_GET['redirect'] : 'dashboard.php';
    mysqli_query($con, "UPDATE admin_notifications SET is_read = 1 WHERE id = $id");
    header("Location: $redirect");
    exit;
}

header('Location: dashboard.php');
exit;
?>