<?php
session_start();
require "assets/php/config.php";
require_once "assets/php/functions.php";
$user = new login_registration_class();
if($user->getsession()){
	header('Location: menu.php');
	exit();
}
?>

<?php
					if($_SERVER['REQUEST_METHOD'] == "POST"){
						$userEmail	  = $_POST['email'];
						$userPassword = $_POST['password'];

						if(empty($userEmail) or empty($userPassword)){
							echo "<p style='color:red;text-align:center;'>Field must not be empty.</p>";
						}else{
							$userPassword = md5($userPassword);
							$login = $user->userLogin($userEmail, $userPassword);
							if($login){
								header('Location: menu.php');
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
    <title>Login - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Archivo+Black">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/card-3-column-animation-shadows-images.css">
    <link rel="stylesheet" href="assets/css/Contact-Form-Clean.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
</head>

<body class="bg-gradient-primary" style="background-color: rgb(21,91,159);">
    <div class="container" style="margin-top: 51px;">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center"><img src="assets/img/nsbmlogo.png" style="width: 189px;"></div>
                                    <form class="user" method="post">
                                        <div class="form-group"><input class="form-control form-control-user" type="email"  aria-describedby="emailHelp" placeholder="Enter Email Address..." name="email" style="margin-top: 13px;"></div>
                                        <div class="form-group"><input class="form-control form-control-user" type="password"  placeholder="Password" name="password"></div>
                                        <div class="form-group">
                                            
                                        </div><button class="btn btn-primary btn-block text-white btn-user" type="submit" style="background-color: rgb(58,181,74);">Login</button></form>
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
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>