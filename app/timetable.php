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
                        <div class="dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><img class="border rounded-circle img-profile" src="assets/img/download.jpg" style="width: 48px;"><span class="mr-2 text-gray-600 small" style="margin-left: 9px;"><?php echo $userName; ?>></span></a>
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
            <div>
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="text-primary m-0 font-weight-bold">Upcoming Lectures</h6>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <ul class="nav nav-tabs card-header-tabs" role="tablist">
                                <li class="nav-item"><a class="nav-link active" id="item-1-1-tab" data-toggle="tab" role="tab" aria-controls="item-1-1" aria-selected="true" href="#item-1-1" style="font-size: 13px;color: rgb(57,181,74);">Today</a></li>
                                <li class="nav-item"><a class="nav-link" id="item-1-2-tab" data-toggle="tab" role="tab" aria-controls="item-1-2" aria-selected="false" href="#item-1-2" style="font-size: 13px;color: rgb(57,181,74);">Tomorrow</a></li>
                            </ul>
                        </div>
                        <div class="card-body" style="padding: 0px;">
                            <div id="nav-tabContent" class="tab-content">
                                <div id="item-1-1" class="tab-pane fade show active" role="tabpanel" aria-labelledby="item-1-1-tab" style="margin-right: -19px;margin-left: -17px;">
                                    <section>
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-auto col-sm-12 col-md-12 col-lg-4 col-xl-4" style="padding: 0px;padding-top: 15px;padding-bottom: 15px;padding-right: 15px;padding-left: 15px;">
                                                    <div class="bg-light border rounded shadow card" data-bs-hover-animate="pulse">
                                                        <div class="card-body" style="padding: 2px;"><a class="btn btn-outline-primary active text-left" role="button" style="font-weight: bold;font-family: Nunito, sans-serif;font-size: 13px;color: rgb(55,55,55);font-style: normal;">Human Computer Interaction</a>
                                                            <div
                                                                class="table-responsive">
                                                                <table class="table">
                                                                    <thead>
                                                                        <tr></tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td style="font-size: 13px;">09:00<br></td>
                                                                            <td style="font-size: 13px;">12:00<br></td>
                                                                            <td style="font-size: 13px;">Mrs.Pavithra Subashini</td>
                                                                            <td style="font-size: 13px;">C2 001</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                </section>
                            </div>
                            <div id="item-1-2" class="tab-pane fade" role="tabpanel" aria-labelledby="item-1-2-tab"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    </div>
    </div>

    <div class="footer">
        <ul>
          <a href="timetable.php"><li class="active">
            <i class="fas fa-calendar-alt"></i>
          </li></a>
          <a href="shuttles.php"><li>
            <i class="fas fa-bus-alt"></i>
          </li></a>
          <a href="studyrooms.php"><li>
            <i class="fas fa-chalkboard"></i>
          </li></a>
          <a href="events.php"><li>
            <i class="fas fa-calendar-check"></i>
          </li></a>
          <a href="complaints.php"><li>
            <i class="fas fa-question-circle"></i>
          </li></a>
        </ul>
      </div>
    </div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>