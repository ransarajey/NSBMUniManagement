<?php
ob_start ();
session_start();
require "assets/php/config.php";
require_once "assets/php/functions.php";
$user = new login_registration_class();
if($user->getsession()){
	header('Location: dashboard.php');
	exit();
}
?>

<?php
					if($_SERVER['REQUEST_METHOD'] == "POST"){
						$userEmail	  = $_POST['loginEmail'];
						$userPassword = $_POST['loginPassword'];

						if(empty($userEmail) or empty($userPassword)){
							echo "<p style='color:red;text-align:center;'>Field must not be empty.</p>";
						}else{
							$userPassword = md5($userPassword);
							$login = $user->adminLogin($userEmail, $userPassword);
							if($login){
								header('Location: dashboard.php');
							}else{
                                echo "<p style='color:red;text-align:center'>Incorrect Student ID or password</p>";
                                
                                
							}
						}
					}
				?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>NSBM Admin</title>
    <meta name="description" content="This NSBM - University Management System was designed and developed by the Team Code Brigade for the project of &quot;Intergrated Project&quot; module.">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/fav.png">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/custom.css">
</head>

<body class="bg-gradient-primary">
    <div class="container" style="margin-top: 84px;">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-flex">
                                <div class="flex-grow-1 bg-login-image" style="background-image: url(&quot;assets/img/nsbmcover.png&quot;);"></div>
                            </div>
                            <div class="col-lg-6">
                                <div><img src="assets/img/nsbmlogo.png" style="margin-top: 14px;"></div>
                                <div class="p-5">
                                    <div class="text-center"></div>
                                    <form class="user" method="post">
                                        <div class="form-group"><input class="form-control form-control-user" type="email" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..." name="loginEmail" required=""></div>
                                        <div class="form-group"><input class="form-control form-control-user" type="password" id="exampleInputPassword" placeholder="Password" name="loginPassword" required="" minlength="8"></div>
                                        <div class="form-group">
                                        </div><button class="btn btn-primary btn-block text-white btn-user" type="submit" style="background-color: rgb(58,181,74);">Login</button>
                                        <hr>
                                    </form>
                                    <div class="text-center"><a class="small" href="resetpassword.php" style="color: rgb(58,181,74);">Forgot Password?</a></div>
                                    <div class="text-center"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>
    <script>
         $(document).ready(function(){
             setInterval(_initTimer, 1000);
         });
         function _initTimer(){
             $.ajax({
                 url: 'assets/php/dateTime.php',
                 success: function(data) {
                    
                     data = data.split(':');
                     $('#year').html(data[0]);
                     $('#month').html(data[1]);
                     $('#date').html(data[2]);
                     $('#day').html(data[3]);
                     $('#hrs').html(data[4]);
                     $('#mins').html(data[5]);
                     $('#secs').html(data[6]);
                     $('#ampm').html(data[7]);
                 }
             });
         }
        </script>
</body>

</html>

<?php ob_end_flush() ; ?>