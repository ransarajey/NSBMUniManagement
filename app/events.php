
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
            <div >
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="text-primary m-0 font-weight-bold">Upcoming Events</h6>
                    </div>
                    <div class="card">
                        <div class="card-body" style="padding: 0px;">
                        <div class="container">
                                            <div class="row">
                                                <div class="col-auto col-sm-12 col-md-12 col-lg-4 col-xl-4" style="padding: 0px;padding-top: 15px;padding-bottom: 15px;padding-right: 15px;padding-left: 15px;">
                                                


                                                <?php 
            
                                                    global $conn;
                                                
                                                    $query = $conn->query("select * from events where eventDate >= DATE(NOW()) ORDER BY eventDate,eventFrom ");
                                                
                                                    $i=0;
                                                    while($rows = $query->fetch_assoc()){
                                                    $i++;
                                                    
                                                    $evHall = $rows['eventHall'];
                                                    $nullHall = "N/A";
                                                
                                                    ?>
                                                    <table class="table">

                                                    <div class="bg-light border rounded shadow card" data-bs-hover-animate="pulse">
                                                        <div class="card-body" style="padding: 2px;"><a class="btn btn-outline-primary active text-left" role="button" style="font-weight: bold;font-family: Nunito, sans-serif;font-size: 13px;color: rgb(55,55,55);font-style: normal;"><?php echo $rows['eventName'];?></a>
                                                            
                                                                
                                                                    
                                                                    <tbody>
                                                                        <tr>
                                                                        <td style="font-size: 13px;"><img src="../assets/images/<?php echo $rows['eventImage'];?>" style="height: 183px;"></td>
        <td class="text-center d-flex justify-content-center align-items-center" style="font-size: 13px;margin-top: 14px;">
            <div class="col" style="padding-right: 0px;padding-left: 0px;"><i class="far fa-calendar-alt"></i></div>
            <div class="col"><span class="text-nowrap" style="padding-left: 7px;"><?php echo $rows['eventDate'];?></span></div><br></td>
        <td class="text-center d-flex justify-content-center align-items-center" style="font-size: 13px;margin-top: 14px;">
            <div class="col" style="padding-right: 0px;padding-left: 0px;"><i class="fas fa-clock d-flex justify-content-start"></i></div>
            <div class="col text-left d-flex justify-content-start" style="padding-left: 0px;padding-right: 24px;"><span class="text-nowrap text-left d-flex justify-content-start" style="padding-left: 7px;"><?php echo $rows['eventFrom'];?><br><?php echo $rows['eventTo'];?><br></span></div><br></td>
        <td class="text-center d-flex justify-content-center align-items-center"
            style="font-size: 13px;margin-top: 14px;">
            <div class="col" style="padding-right: 0px;padding-left: 0px;"><i class="fas fa-map-marker d-flex justify-content-start"></i></div>
            <div class="col" style="padding: 0px;padding-right: 30px;"><span class="text-nowrap" style="padding-left: 0px;"><?php if (isset($evHall)) {echo $evHall;} else {echo $nullHall;} ?></span></div><br></td>
                                                                        </tr>
                                                                    </tbody>  </table> <?php } ?>
                                                              
                                                               
                                                    
                                                </div>
                                            </div>
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
          <a href="shuttles.php"><li>
            <i class="fas fa-bus-alt"></i>
          </li></a>
          <a href="studyrooms.php"><li>
            <i class="fas fa-chalkboard"></i>
          </li></a>
          <a href="events.php"><li class="active">
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