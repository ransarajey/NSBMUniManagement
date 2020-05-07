<?php
	ob_start ();
	session_start();
	require "assets/php/config.php";
	require_once "assets/php/functions.php";
	$user = new login_registration_class();
	$adminEmail = $_SESSION['adminEmail'];
    $adminName = $_SESSION['adminName'];
    $adminDP = $_SESSION['adminDP'];
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
    <title>NSBM Admin</title>
    <meta name="description" content="This NSBM - University Management System was designed and developed by the Team Code Brigade for the project of &quot;Intergrated Project&quot; module.">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/fav.png">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/custom.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-text mx-3"><img src="assets/img/nsbmlogo.png" style="height: 69px;"></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="dashboard.php"><i class="fas fa-chart-pie" style="color: rgb(87,98,113);"></i><span style="color: rgb(87,98,113);">Dashboard</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="lectures.php"><i class="fas fa-calendar-plus" style="color: rgb(87,98,113);"></i><span style="color: rgb(87,98,113);">Lectures</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="studyrooms.php"><i class="fas fa-warehouse" style="color: rgb(87,98,113);"></i><span style="color: rgb(87,98,113);">Study Rooms</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="events.php"><i class="fas fa-calendar-check" style="color: rgb(87,98,113);"></i><span style="color: rgb(87,98,113);">Events</span></a></li>
                    <li class="nav-item" role="presentation"></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="shuttles.php"><i class="fas fa-bus" style="color: rgb(87,98,113);"></i><span style="color: rgb(87,98,113);">Shuttles</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="complaints.php"><i class="fas fa-question-circle" style="color: rgb(87,98,113);"></i><span style="color: rgb(87,98,113);">Complaints</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="addstudents.php"><i class="fas fa-user-plus" style="color: rgb(87,98,113);"></i><span style="color: rgb(87,98,113);">Register Students</span></a></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button" style="background-color: rgb(58,181,74);"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
        <?php include "assets/php/headermenu.php";?>
        </div>
        </nav>
        <div class="container-fluid">
            <h3 class="text-dark mb-1">Study Rooms</h3>
            <div class="row">
                <div class="col">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="text-primary m-0 font-weight-bold">Study Room Availability</h6>
                        </div>
                        <div class="card-body">
                            <div class="row" style="margin-bottom: 16px;">
                                <div class="col">
                                <?php
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
                                                    
                                                   
                                        
                                                
                                
                                              
                                    
                                    <?php   if($C104==1): ?> <div id="btnwrappermiddle" style="background-color: #3ab54a;"><i class="fas fa-warehouse" style="color: rgb(255,255,255);font-size: 31px;"></i>   
                                    <?php else: ?> <div id="btnwrappermiddle" style="background-color: #e74a3b;"><i class="fas fa-warehouse" style="color: rgb(255,255,255);font-size: 31px;"></i>   
                                    <?php endif; ?>
                                    <h1 style="color: rgb(255,255,255);margin-top: 14px;margin-left: 11px;filter: blur(0px);font-weight: bold;">C104</h1>
                                    </div>
                                </div>
                                <div class="col">
                                <?php   if($C203==1): ?> <div id="btnwrappermiddle" style="background-color: #3ab54a;"><i class="fas fa-warehouse" style="color: rgb(255,255,255);font-size: 31px;"></i>   
                                    <?php else: ?> <div id="btnwrappermiddle" style="background-color: #e74a3b;"><i class="fas fa-warehouse" style="color: rgb(255,255,255);font-size: 31px;"></i>   
                                    <?php endif; ?>       
                                <h1 style="color: rgb(255,255,255);margin-top: 14px;margin-left: 11px;filter: blur(0px);font-weight: bold;">C203</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-bottom: 16px;">
                                <div class="col">
                                <?php   if($C105==1): ?> <div id="btnwrappermiddle" style="background-color: #3ab54a;"><i class="fas fa-warehouse" style="color: rgb(255,255,255);font-size: 31px;"></i>   
                                    <?php else: ?> <div id="btnwrappermiddle" style="background-color: #e74a3b;"><i class="fas fa-warehouse" style="color: rgb(255,255,255);font-size: 31px;"></i>   
                                    <?php endif; ?>
                                <h1 style="color: rgb(255,255,255);margin-top: 14px;margin-left: 11px;filter: blur(0px);font-weight: bold;">C105</h1>
                                    </div>
                                </div>
                                <div class="col">
                                <?php   if($C204==1): ?> <div id="btnwrappermiddle" style="background-color: #3ab54a;"><i class="fas fa-warehouse" style="color: rgb(255,255,255);font-size: 31px;"></i>   
                                    <?php else: ?> <div id="btnwrappermiddle" style="background-color: #e74a3b;"><i class="fas fa-warehouse" style="color: rgb(255,255,255);font-size: 31px;"></i>   
                                    <?php endif; ?>
                                <h1 style="color: rgb(255,255,255);margin-top: 14px;margin-left: 11px;filter: blur(0px);font-weight: bold;">C204</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">

                                <?php   if($C106==1): ?> <div id="btnwrappermiddle" style="background-color: #3ab54a;"><i class="fas fa-warehouse" style="color: rgb(255,255,255);font-size: 31px;"></i>   
                                    <?php else: ?> <div id="btnwrappermiddle" style="background-color: #e74a3b;"><i class="fas fa-warehouse" style="color: rgb(255,255,255);font-size: 31px;"></i>   
                                    <?php endif; ?>                                
                                    <h1 style="color: rgb(255,255,255);margin-top: 14px;margin-left: 11px;filter: blur(0px);font-weight: bold;">C106</h1>
                                    </div>
                                </div>
                                <div class="col">
                                <?php   if($C205==1): ?> <div id="btnwrappermiddle" style="background-color: #3ab54a;"><i class="fas fa-warehouse" style="color: rgb(255,255,255);font-size: 31px;"></i>   
                                    <?php else: ?> <div id="btnwrappermiddle" style="background-color: #e74a3b;"><i class="fas fa-warehouse" style="color: rgb(255,255,255);font-size: 31px;"></i>   
                                    <?php endif; ?>
                                <h1 style="color: rgb(255,255,255);margin-top: 14px;margin-left: 11px;filter: blur(0px);font-weight: bold;">C205</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="text-primary m-0 font-weight-bold">Book Study Room</h6>
                                </div>
                                <div class="card-body">
                                   
                                        <form method="post" action="assets/php/manageStudyRooms.php">
                                            <div class="form-row" style="margin-top: 17px;">
                                                <div class="col"><label>Select Study Room</label><form class="form-inline">
                                                    <div class="form-group">
                                                        <select name="studyRoomName"  class="form-control" >
                                                           <option disabled selected value> Select a Study Room</option>
                                                        
                                                            <?php
                                                                $query2 = $conn->query("select * from studyrooms where studyRoomAvailability='1'");
                                                               
                                                                while($rows2 = $query2->fetch_assoc())
                                                                        {  $sRName = $rows2['studyRoomName'];
                                                                                                                                                   
                                                                            ?>
                                                                              
                                                                              <option value="<?php echo $sRName;?>"><?php echo $sRName;?></option> 
                                                                    
                                                                            }
                                                            
                                                                            <?php } ?>

                                                        </select>
                                                    </div>
                                                    </div>
                                            </div>
                                            <div class="form-row" style="margin-top: 17px;">
                                                <div class="col"><label>Student ID</label><input class="form-control" type="text" name="bookSRStudentID" required=""></div>
                                            </div>
                                            <div class="form-row" style="margin-top: 17px;">
                                                <div class="col"><label>For</label><form class="form-inline">
                                                    <div class="form-group">
                                                        <select name="reservationTime" class="form-control" >
                                                            <option value="0.5">30 mins</option>
                                                            <option value="1">1 Hr</option>
                                                            <option value="2">2 Hrs</option>
                                                            <option value="3">3 Hrs</option>
                                                            <option value="4">4 Hrs</option>
                                                            <option value="5">5 Hrs</option>
                                                        </select>
                                                    </div>
                                                    </div>
                                            </div>
                                            <div class="form-row" style="margin-top: 17px;">
                                                <div class="col">
                                                    <div id="btnwrapperleft"><button class="btn btn-danger btn-icon-split" type="reset"><span class="text-white-50 icon"><i class="fas fa-trash"></i></span><span class="text-white text">Clear</span></button></div>
                                                </div>
                                                <div class="col">
                                                    <div id="btnwrapperright"><button class="btn btn-success btn-icon-split" name="booking" type="submit"><span class="text-white-50 icon"><i class="fas fa-check"></i></span><span class="text-white text">Book</span></button></div>
                                                </div>
                                            </div>
                                        </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="text-primary m-0 font-weight-bold">Release Study Room</h6>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <form method="post" action="assets/php/manageStudyRooms.php">
                                            <div class="form-row" style="margin-top: 17px;">
                                                <div class="col"><label>Select Study Room</label><form class="form-inline">
                                                    <div class="form-group">
                                                        <select name="releaseSRName" class="form-control" >
                                                        <?php
                                                                $query2 = $conn->query("select * from studyrooms where studyRoomAvailability='0'");
                                                               
                                                                while($rows2 = $query2->fetch_assoc())
                                                                        {  $sRName = $rows2['studyRoomName'];
                                                                                                                                                   
                                                                            ?>
                                                                              
                                                                              <option value="<?php echo $sRName;?>"><?php echo $sRName;?></option> 
                                                                    
                                                                            }
                                                            
                                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                   </div>
                                            </div>
                                            <div class="form-row" style="margin-top: 17px;">
                                                <div class="col">
                                                <div id="btnwrapperleft"><button class="btn btn-success btn-icon-split" name="release" type="submit"><span class="text-white-50 icon"><i class="fas fa-check"></i></span><span class="text-white text">Release</span></button></div>
                                                </div>
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
    </div>
    <footer class="bg-white sticky-footer">
        <div class="container my-auto">
            <div class="text-center my-auto copyright"><span>© &nbsp;2020 | &nbsp;Code Brigade</span></div>
        </div>
    </footer>
    </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>
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