<?php 
include("include/config.php");

if(isset($_POST['email']) && !empty($_POST['email']))
{
    if(isset($_POST['pass']) && !empty($_POST['pass']))
    {
        $emailname = addslashes($_POST['email']);  
        $password = addslashes($_POST['pass']);  

        // Fetch the user record from the database
        $result = $qm->getRecord("adminuser", "*", "email = '$emailname'");
      
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_array($result);
            
            // Simple password match (NO HASH)
            if($password == $row['password']) {
                $_SESSION['admin_info'] = "true";
                $_SESSION['id'] = $row['id'];
                $_SESSION['username'] = $row['username']; 
                $_SESSION['email'] = $row['email'];

                header("location:dashboard.php"); 
                exit;
            } else {
                $_SESSION['alert_msg'] = "<div class='msg_error'>Please check Password.</div>";
                header("location:index.php");
                exit;
            }
        } else {
            $_SESSION['alert_msg'] = "<div class='msg_error'>Please check email or Password.</div>";
            header("location:index.php");
            exit;
        }  
    }  
}
?>
