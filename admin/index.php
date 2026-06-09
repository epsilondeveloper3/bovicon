<!doctype html>
<?php include("include/config.php");?>

<html lang="en">

<head>
    <meta charset="utf-8">
    <?php include('include/head.php')?>

</head>

<body class="login-area">

    <!-- Preloader -->
    <?php include('include/loder.php')?>
    <!-- /Preloader -->

    <!-- ======================================
    ******* Page Wrapper Area Start **********
    ======================================= -->
    <div class="main-content- h-100vh">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center">
                <div class="col-sm-10 col-md-7 col-lg-5">
                    <!-- Middle Box -->
                    <div class="middle-box">
                        <div class="card-body">
                            <div class="log-header-area card p-4 mb-4 text-center">
                                <h5>Welcome Back !</h5>
                                <p class="mb-0">Sign in to continue.</p>
                            </div>

                            <div class="card">
                                <div class="card-body p-4">
                                    <form method="Post" action="loginAuth.php">
                                        <div class="form-group mb-3">
                                            <label class="text-muted" for="emailaddress">Email address</label>
                                            <input class="form-control" type="email" name="email" id="emailaddress"
                                                placeholder="Enter your email">
                                        </div>

                                        <div class="form-group mb-3">
                                            <label class="text-muted" for="password">Password</label>
                                            <input class="form-control" type="password" name="pass" id="password"
                                                placeholder="Enter your password">
                                        </div>

                                        <div class="form-group mb-3">
                                            <button class="btn btn-primary btn-lg w-100" type="submit">Sign Up</button>
                                        </div>

                                        <div class="text-center">
                                            <span class="me-1">Don't have an account?</span>
                                            <a class="fw-bold" href="register.php">Sign up</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ======================================
    ********* Page Wrapper Area End ***********
    ======================================= -->

    <!-- Must needed plugins to the run this Template -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/default-assets/setting.js"></script>
    <script src="js/default-assets/scrool-bar.js"></script>
    <script src="js/todo-list.js"></script>

    <!-- Active JS -->
    <script src="js/default-assets/active.js"></script>

</body>

</html>