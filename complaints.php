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
                    <li class="nav-item" role="presentation"><a class="nav-link" href="studyrooms.php"><i class="fas fa-warehouse" style="color: rgb(87,98,113);"></i><span style="color: rgb(87,98,113);">Study Rooms</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="events.php"><i class="fas fa-calendar-check" style="color: rgb(87,98,113);"></i><span style="color: rgb(87,98,113);">Events</span></a></li>
                    <li class="nav-item" role="presentation"></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="shuttles.php"><i class="fas fa-bus" style="color: rgb(87,98,113);"></i><span style="color: rgb(87,98,113);">Shuttles</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="complaints.php"><i class="fas fa-question-circle" style="color: rgb(87,98,113);"></i><span style="color: rgb(87,98,113);">Complaints</span></a></li>
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
            <h3 class="text-dark mb-1">Complaints</h3>
            <div class="row">
                <div class="col">
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 font-weight-bold" style="color: rgb(58,181,74);">Assign complaints</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                            <form class="form-inline" method="post" action="assets/php/assignComplaint.php">                
                                            <table class="table dataTable my-0" id="dataTable">
                                            <thead>
                                                    <tr>
                                                        <th>Complaint No</th>
                                                        <th>Complaint</th>
                                                        <th>Assigned To</th> 
                                                        <th>&nbsp; &nbsp;Actions</th>
                                                    </tr>
                                                </thead>
                                                
                                                <tbody>
                                                
                                                <?php 
            
                                                        global $conn;
                                                    
                                                        $query = $conn->query("select * from complaints");
                                                        
                                                    
                                                        $i=0;
                                                        while($rows = $query->fetch_assoc()){
                                                        $i++;
                                                        
                                                        $complaintID = $rows['complaintID'];
                                                        $complaintText = $rows['complaintText'];
                                                        $complaintAssignedTo = $rows['complaintAssignedTo'];
                                                        ?>
                                                        <tr>
                                                            
                                                            <td><?php echo $rows['complaintID'];?></td>
                                                            <td><textarea disabled><?php echo $rows['complaintText'];?></textarea></td>
                                                            <td>
                                                            <div class="form-group">
                                                            
                                                            <div><input class="form-control" type="hidden" name="assignComplaint" value="<?php echo $complaintID;?>" ></div>
                                                            <select  class="form-control" name="assignedTo" >
                                                        
                                                                            <?php
                                                                            if($complaintAssignedTo==''):
                                                                            ?>  
                                                                             <option disabled selected value="">Select an official</option>
                                                                          <?php else: ?>                            
                                                                              <option disabled selected value="<?php echo $complaintAssignedTo;?>">Currently Assigned To:<?php echo $complaintAssignedTo;?></option>
                                                                            <?php endif; ?>
                                                                              <option value="Dean of FOC">Dean of FOC</option>
                                                                              <option value="Management of FOC">Management of FOC</option>

                                                            </select>
                                                            </div>
                                                            <td><button class="btn btn-success btn-circle ml-1" type="submit"><i class="fas fa-check text-white"></i></button> </td>
                                                            
                                                            </td>
                                                            
                                                            
                                                            </tr><?php } ?>
                                                            
                                                </tbody>
                                            </table></form>
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