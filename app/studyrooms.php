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
                        <div class="dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><img class="border rounded-circle img-profile" src="../assets/images/<?php echo $userDP; ?>" style="width: 48px;"><span class="mr-2 text-gray-600 small" style="margin-left: 9px;"><?php echo $userName; ?></span></a>
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
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="text-primary m-0 font-weight-bold">Study Room Availability</h6>
                </div>
                <div class="card-body">

                <?php
                                    global $conn;
                                    $query2 = $conn->query("select * from studyrooms");
                                    
                                    $C104 = 0;
                                    $C105 = 0;
                                    $C106 = 0;
                                    $C203 = 0;
                                    $C204 = 0;
                                    $C205 = 0;
                                    while($rows2 = $query2->fetch_assoc())
                                            {   if ($rows2['studyRoomName']=="C104" && $rows2['studyRoomAvailability']=='1')
                                                $C104 = 1;
                                             elseif ($rows2['studyRoomName']=="C105" && $rows2['studyRoomAvailability']=='1')
                                                $C105 = 1;
                                             elseif ($rows2['studyRoomName']=="C106" && $rows2['studyRoomAvailability']=='1')
                                                $C106 = 1;
                                             elseif ($rows2['studyRoomName']=="C203" && $rows2['studyRoomAvailability']=='1')
                                                $C203 = 1;
                                             elseif ($rows2['studyRoomName']=="C204" && $rows2['studyRoomAvailability']=='1')
                                                $C204 = 1;
                                            elseif ($rows2['studyRoomName']=="C205" && $rows2['studyRoomAvailability']=='1')
                                                $C205 = 1;}
                                                                                                                        
                                                ?>
                                                    
                                       


                    <div class="row">
                        <div class="col" style="margin: 2px;">
                        <?php   if($C104==1): ?>   <div style="background-color: #189665;padding: 18px;"><i class="fas fa-chalkboard d-flex justify-content-center align-items-center" style="font-size: 48px;color: rgb(255,255,255);"></i>
                        <?php else: ?>             <div style="background-color: #961818;padding: 18px;"><i class="fas fa-chalkboard d-flex justify-content-center align-items-center" style="font-size: 48px;color: rgb(255,255,255);"></i> 
                        <?php endif; ?>      
                                <h1 class="d-flex justify-content-center" style="color: rgb(255,255,255);">C104</h1>
                            </div>
                        </div>
                        <div class="col" style="margin: 2px;">
                        <?php   if($C105==1): ?>   <div style="background-color: #189665;padding: 18px;"><i class="fas fa-chalkboard d-flex justify-content-center align-items-center" style="font-size: 48px;color: rgb(255,255,255);"></i>
                        <?php else: ?>             <div style="background-color: #961818;padding: 18px;"><i class="fas fa-chalkboard d-flex justify-content-center align-items-center" style="font-size: 48px;color: rgb(255,255,255);"></i> 
                        <?php endif; ?>
                                <h1 class="d-flex justify-content-center" style="color: rgb(255,255,255);">C105</h1>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col" style="margin: 2px;">
                        <?php   if($C106==1): ?>   <div style="background-color: #189665;padding: 18px;"><i class="fas fa-chalkboard d-flex justify-content-center align-items-center" style="font-size: 48px;color: rgb(255,255,255);"></i>
                        <?php else: ?>             <div style="background-color: #961818;padding: 18px;"><i class="fas fa-chalkboard d-flex justify-content-center align-items-center" style="font-size: 48px;color: rgb(255,255,255);"></i> 
                        <?php endif; ?>

                                <h1 class="d-flex justify-content-center" style="color: rgb(255,255,255);">C106</h1>
                            </div>
                        </div>
                        <div class="col" style="margin: 2px;">
                        <?php   if($C203==1): ?>   <div style="background-color: #189665;padding: 18px;"><i class="fas fa-chalkboard d-flex justify-content-center align-items-center" style="font-size: 48px;color: rgb(255,255,255);"></i>
                        <?php else: ?>             <div style="background-color: #961818;padding: 18px;"><i class="fas fa-chalkboard d-flex justify-content-center align-items-center" style="font-size: 48px;color: rgb(255,255,255);"></i> 
                        <?php endif; ?>

                                <h1 class="d-flex justify-content-center" style="color: rgb(255,255,255);">C203</h1>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col" style="margin: 2px;">
                        <?php   if($C204==1): ?>   <div style="background-color: #189665;padding: 18px;"><i class="fas fa-chalkboard d-flex justify-content-center align-items-center" style="font-size: 48px;color: rgb(255,255,255);"></i>
                        <?php else: ?>             <div style="background-color: #961818;padding: 18px;"><i class="fas fa-chalkboard d-flex justify-content-center align-items-center" style="font-size: 48px;color: rgb(255,255,255);"></i> 
                        <?php endif; ?>

                                <h1 class="d-flex justify-content-center" style="color: rgb(255,255,255);">C204</h1>
                            </div>
                        </div>
                        <div class="col" style="margin: 2px;">
                        <?php   if($C205==1): ?>   <div style="background-color: #189665;padding: 18px;"><i class="fas fa-chalkboard d-flex justify-content-center align-items-center" style="font-size: 48px;color: rgb(255,255,255);"></i>
                        <?php else: ?>             <div style="background-color: #961818;padding: 18px;"><i class="fas fa-chalkboard d-flex justify-content-center align-items-center" style="font-size: 48px;color: rgb(255,255,255);"></i> 
                        <?php endif; ?>

                                <h1 class="d-flex justify-content-center" style="color: rgb(255,255,255);">C205</h1>
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
          <a href="timetable.php"><li>
            <i class="fas fa-calendar-alt"></i>
          </li></a>
          <a href="shuttles.php"><li >
            <i class="fas fa-bus-alt"></i>
          </li></a>
          <a href="studyrooms.php"><li class="active">
            <i class="fas fa-chalkboard"></i>
          </li></a>
          <a href="events.php"><li >
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