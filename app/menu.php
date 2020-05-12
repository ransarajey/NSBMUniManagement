<?php
	ob_start ();
	session_start();
	require "assets/php/config.php";
	require_once "assets/php/functions.php";
    $user = new login_registration_class();
    $userName = $_SESSION['userName'];
	$userEmail = $_SESSION['userEmail'];
    $userBatch = $_SESSION['userBatch'];
    $userDP = $_SESSION['userDP'];
	if(!$user->getSession()){
		header('Location: index.php');
		exit();
    }

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Table - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Archivo+Black">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/card-3-column-animation-shadows-images.css">
    <link rel="stylesheet" href="assets/css/Contact-Form-Clean.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div >
                        <div class="dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><img class="border rounded-circle img-profile" src="assets/img/download.jpg" style="width: 48px;"><span class="mr-2 text-gray-600 small" style="margin-left: 9px;"><?php echo $userName; ?></span></a>
                            <div
                                class="dropdown-menu shadow dropdown-menu-right animated--grow-in" role="menu"><a class="dropdown-item" role="presentation" href="logout.php"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Logout</a></div>
                    </div>
                    <ul class="nav navbar-nav flex-nowrap ml-auto">
                        <li class="nav-item dropdown no-arrow mx-1" role="presentation"></li>
                        <li class="nav-item dropdown no-arrow mx-1" role="presentation">
                            <div class="shadow dropdown-list dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown"></div>
                        </li>
                        <li class="nav-item dropdown no-arrow" role="presentation"></li>
                    </ul>
            </div>
            </nav>
            <div class="row" style="margin-top: 40px;">
                <div class="col">
                    <div id="btnwrappermiddle"><a class="btn btn-primary active border rounded" role="button" style="width: 141px;height: 138px;padding-top: 17px;background-color: rgb(239,71,111);" href="timetable.php"><i class="fas fa-calendar-alt" style="width: 108px;font-size: 61px;margin-top: 12px;"></i><span style="font-size: 11px;">My Timetable</span></a></div>
                </div>
                <div class="col">
                    <div id="btnwrappermiddle"><a class="btn btn-primary active border rounded" role="button" style="width: 141px;height: 138px;padding-top: 17px;background-color: rgb(255, 209, 102);" href="shuttles.php"><i class="fas fa-bus-alt" style="width: 108px;font-size: 61px;margin-top: 12px;"></i><span style="font-size: 11px;">Shuttles</span></a></div>
                </div>
            </div>
            <div class="row" style="margin-top: 40px;">
                <div class="col">
                    <div id="btnwrappermiddle"><a class="btn btn-primary active border rounded" role="button" style="width: 141px;height: 138px;padding-top: 17px;background-color: rgb(6, 214, 160);" href="studyrooms.php"><i class="fas fa-chalkboard" style="width: 108px;font-size: 61px;margin-top: 12px;"></i><span style="font-size: 11px;">Study Rooms</span></a></div>
                </div>
                <div class="col">
                    <div id="btnwrappermiddle"><a class="btn btn-primary active border rounded" role="button" style="width: 141px;height: 138px;padding-top: 17px;background-color: rgb(17, 138, 178);" href="events.php"><i class="fas fa-calendar-check" style="width: 108px;font-size: 61px;margin-top: 12px;"></i><span style="font-size: 11px;">Events</span></a></div>
                </div>
            </div>
            <div class="row" style="margin-top: 40px;">
                <div class="col">
                    <div id="btnwrappermiddle"><a class="btn btn-primary active border rounded" role="button" style="width: 141px;height: 138px;padding-top: 17px;background-color: rgb(117,117,117);" href="complaints.php"><i class="fas fa-question-circle" style="width: 108px;font-size: 61px;margin-top: 12px;"></i><span style="font-size: 11px;">Complaints</span></a></div>
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