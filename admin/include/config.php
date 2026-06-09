<?php
  if (session_status() === PHP_SESSION_NONE) {
      session_start();
  }
  include (__DIR__ . "/masterConfig.php");

  $con = mysqli_connect($host,$username,$password,$db);
  if ($con -> connect_errno) {
    echo "Failed to connect to MySQL: " . $con -> connect_error;
    exit();
  }

  include (__DIR__ . "/class/queryMaster.php");
  $qm = new queryMaster($con);

//  mysqli_query($con,"set name utf8");
  mysqli_set_charset($con,'utf8');

  header ('Content-Type: text/html; charset=utf-8');

  include (__DIR__ . "/rootMaster.php");
  include (__DIR__ . "/cusFunction.php");

  define("API_URL", "../SoniBookApi/");
  define("PROFILE_IMG_DIR", API_URL . "userProfile/");
  define("KYC_DOC_DIR", API_URL . "kycDoc/");

  date_default_timezone_set("Asia/Kolkata");
  $getDt = date("Y-m-d H:i:s");

  $page_title = "Home";
?>