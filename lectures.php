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
    <?php require_once "assets/php/addLectures.php"; ?>
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-text mx-3"><img src="assets/img/nsbmlogo.png" style="height: 69px;"></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="dashboard.php"><i class="fas fa-chart-pie" style="color: rgb(87,98,113);"></i><span style="color: rgb(87,98,113);">Dashboard</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="lectures.php"><i class="fas fa-calendar-plus" style="color: rgb(87,98,113);"></i><span style="color: rgb(87,98,113);">Lectures</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="studyrooms.php"><i class="fas fa-warehouse" style="color: rgb(87,98,113);"></i><span style="color: rgb(87,98,113);">Study Rooms</span></a></li>
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
            <h3 class="text-dark mb-1">Lectures</h3>
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs" role="tablist">
                        <li class="nav-item"><a class="nav-link active" id="item-1-1-tab" data-toggle="tab" role="tab" aria-controls="item-1-1" aria-selected="true" href="#item-1-1">18.1</a></li>
                        <li class="nav-item"><a class="nav-link" id="item-1-2-tab" data-toggle="tab" role="tab" aria-controls="item-1-2" aria-selected="false" href="#item-1-2">19.1</a></li>
                       
                    </ul>
                </div>
                <div style="margin-top: 17px;"></div>
                <div id="nav-tabContent" class="tab-content">
                    <div id="item-1-1" class="tab-pane fade show active" role="tabpanel" aria-labelledby="item-1-1-tab">
                        <div class="row">
                            <div class="col">
                                <div class="card shadow">
                                    <div class="card-header py-3">
                                        <p class="text-primary m-0 font-weight-bold" style="color: rgb(58,181,74);">Edit Lectures</p>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                            <!-- 18.1 Table -->
                                            <table class="table dataTable my-0" id="dataTable">
                                            <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>From</th>
                                                        <th>To</th>
                                                        <th>Lecture</th>
                                                        <th>Lecturer</th>
                                                        <th>Hall</th>
                                                        <th>Actions</th>
                                                    </tr> </thead>
                                                    <tbody>
                                                    <?php 
            
                                                        global $conn;
                                                    
                                                        $query = $conn->query("select lectureID,lectureDate, lectureFrom, lectureTo, lectureName, lectureLecturer,lectureHall from lectures where lectureBatch='18.1' AND lectureDate >= DATE(NOW()) ORDER BY lectureDate,lectureFrom ");
                           
                                                    
			                                            $i=0;
				                                        while($rows = $query->fetch_assoc()){
                                                        $i++;
                                                        
                                                        $lecID = $rows['lectureID'];
                                                        $lecHall = $rows['lectureHall'];
                                                        $nullHall = "<strong>Not Assigned Yet</strong>";
			                                            ?>
			                                            <tr>
			                                            	
			                                            	<td><?php echo $rows['lectureDate'];?></td>
			                                            	<td><?php echo $rows['lectureFrom'];?></td>
                                                            <td><?php echo $rows['lectureTo'];?></td>
                                                            <td><?php echo $rows['lectureName'];?></td>
                                                            <td><?php echo $rows['lectureLecturer'];?></td>
                                                            <td><?php if (isset($lecHall)) {echo $lecHall;} else {echo $nullHall;} ?></td>
                                                            
                                                            <td><a href="lectures.php?edit=<?php echo $rows['lectureID'];?> "  class="btn btn-success btn-circle ml-1" ><i class="fas fa-edit text-white"></i></a>
                                                            <a href="assets/php/deleteLecture.php?lectureID=<?php echo $rows['lectureID'];?> " class="btn btn-danger btn-circle ml-1"><i class="far fa-calendar-minus text-white"></a>
                                                            </td>
			                                                </tr>
			                                                <?php } ?>
                                                            </tbody>
                                                <tfoot>
                                                    <tr></tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 22px;">
                            <div class="col">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                    <!-- 18.1  add/update lectures -->

                                    <?php
                                        if($update==true):
                                    ?>  
                                                            <h6 class="text-primary font-weight-bold m-0">Update Lectures</h6>
                                      <?php else: ?>                            
                                                            <h6 class="text-primary font-weight-bold m-0">Add Lectures</h6>
                                            <?php endif; ?>
                                        
                                    </div>
                                    <div class="card-body">
                                             <div class="form-group">
                                            <form method="post" action="assets/php/addLectures.php">
                                                <input type="hidden" name="id" value= "<?php echo $editlecID; ?>">
                                                <div class="form-row">
                                                    <div><input class="form-control" type="hidden" name="addLectureBatch" value="18.1" ></div>
                                                    <div class="col"><label>Date</label><input class="form-control" type="date" name="addLectureDate" value="<?php echo $editlecDate?>" ></div>
                                                </div>
                                                <div class="form-row" style="margin-top: 17px;">
                                                    <div class="col"><label>From</label><input class="form-control" type="time" name="addLectureFrom" value="<?php echo $editlecFrom?>"></div>
                                                    <div class="col"><label>To</label><input class="form-control" type="time" name="addLectureTo" required="" value="<?php echo $editlecTo?>"></div>
                                                </div>
                                                <div class="form-row" style="margin-top: 17px;">
                                                    <div class="col"><label>Lecture</label><input class="form-control" type="text" name="addLectureName"  required="" value="<?php echo $editlecName?>"></div>
                                                </div>
                                                <div class="form-row" style="margin-top: 17px;">
                                                    <div class="col"><label>Lecturer</label><input class="form-control" type="text" name="addLectureLecturer" required="" value="<?php echo $editlecLecturer?>"></div>
                                                </div>
                                                <div class="form-row" style="margin-top: 17px;">
                                                    <div class="col">
                                                        <div id="btnwrapperleft"><button class="btn btn-danger btn-icon-split" type="reset"><span class="text-white-50 icon"><i class="fas fa-trash"></i></span><span class="text-white text">Clear</span></button></div>
                                                    </div>
                                                    <div class="col">
                                                        <?php
                                                            if($update==true):
                                                        ?>  
                                                                                <div id="btnwrapperright"><button name="update" class="btn btn-success btn-icon-split" type="submit"><span class="text-white-50 icon"><i class="fas fa-check"></i></span><span class="text-white text">Update</span></button></div>
                                                            <?php else: ?>                            
                                                        <div id="btnwrapperright"><button class="btn btn-success btn-icon-split" name="add" type="submit"><span class="text-white-50 icon"><i class="fas fa-check"></i></span><span class="text-white text">Add</span></button></div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                    <!-- 18.1  hall assign lectures -->
                                        <h6 class="text-primary font-weight-bold m-0">Allocate Lecture Halls</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            
                                            <form class="form-inline" method="post" action="assets/php/assignHall.php">                
                                            <table class="table dataTable my-0" id="dataTable">
                                            <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Time</th>
                                                        <th>Lecture</th>
                                                        <th>Lecturer</th>
                                                        <th>Hall</th>
                                                        <th>&nbsp; &nbsp;Assign</th>
                                                    </tr>
                                                </thead>
                                                
                                                <tbody>
                                                
                                                <?php 
            
                                                        global $conn;
                                                    
                                                        $query = $conn->query("select lectureID,lectureDate, lectureFrom , lectureTo, lectureName, lectureLecturer,lectureHall from lectures where lectureBatch='18.1' AND lectureDate >= DATE(NOW()) AND lectureHall IS NULL ORDER BY lectureDate,lectureFrom");
                                                        
                                                    
                                                        $i=0;
                                                        while($rows = $query->fetch_assoc()){
                                                        $i++;
                                                        
                                                        $hallAssignLec = $rows['lectureID'];
                                                        $lecDate = $rows['lectureDate'];
                                                        $lecFrom = $rows['lectureFrom'];
                                                        $lecTo = $rows['lectureTo'];
                                                        ?>
                                                        <tr>
                                                            
                                                            <td><?php echo $rows['lectureDate'];?></td>
                                                            <td><?php echo $rows['lectureFrom'];?></br><?php echo $rows['lectureTo'];?></td>
                                                            <td><?php echo $rows['lectureName'];?></td>
                                                            <td><?php echo $rows['lectureLecturer'];?></td> 
                                                            <td>
                                                            <div class="form-group">
                                                            
                                                            <div><input class="form-control" type="hidden" name="hallAssignLec" value="<?php echo $hallAssignLec;?>" ></div>
                                                            <select  class="form-control" name="selectedHall" >
                                                            <?php
                                                                $query2 = $conn->query("select reservHall from hallview where reservDate='$lecDate' AND reservFrom<'$lecTo' AND reservTo>'$lecFrom'");
                                                                $hall01 = "C001";
                                                                $hall02 = "C002";
                                                                $hall03 = "C003";
                                                                $hall04 = "C004";
                                                                $hall05 = "C005";
                                                                while($rows2 = $query2->fetch_assoc())
                                                                        { 
                                                                            if ($rows2['reservHall']=="C001"){
                                                                                $hall01 = "none";
                                                                            } elseif ($rows2['reservHall']=="C002"){
                                                                                $hall02 = "none";
                                                                            } elseif ($rows2['reservHall']=="C003"){
                                                                                $hall03 = "none";
                                                                            } elseif ($rows2['reservHall']=="C004"){
                                                                                $hall04 = "none";
                                                                            } elseif ($rows2['reservHall']=="C005"){
                                                                                $hall04 = "none";
                                                                            }

                                                                        }
                                                                            ?>
                                                                              <option disabled selected value> Select a hall</option>
                                                                              <option value="<?php echo $hall01;?>" style="display:<?php echo $hall01;?>"><?php echo $hall01;?></option> 
                                                                              <option value="<?php echo $hall02;?>" style="display:<?php echo $hall02;?>"><?php echo $hall02;?></option> 
                                                                              <option value="<?php echo $hall03;?>" style="display:<?php echo $hall03;?>"><?php echo $hall03;?></option> 
                                                                              <option value="<?php echo $hall04;?>" style="display:<?php echo $hall04;?>"><?php echo $hall04;?></option> 
                                                                              <option value="<?php echo $hall05;?>" style="display:<?php echo $hall05;?>"><?php echo $hall05;?></option> 

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
                    <div id="item-1-2" class="tab-pane fade" role="tabpanel" aria-labelledby="item-1-2-tab">
                  <!-- 19.1 goes here -->
                  <div class="row">
                            <div class="col">
                                <div class="card shadow">
                                    <div class="card-header py-3">
                                        <p class="text-primary m-0 font-weight-bold" style="color: rgb(58,181,74);">Edit Lectures</p>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                            <!-- 19.1 Table -->
                                            <table class="table dataTable my-0" id="dataTable">
                                            <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>From</th>
                                                        <th>To</th>
                                                        <th>Lecture</th>
                                                        <th>Lecturer</th>
                                                        <th>Hall</th>
                                                        <th>Actions</th>
                                                    </tr> </thead>
                                                    <tbody>
                                                    <?php 
            
                                                        global $conn;
                                                    
                                                        $query = $conn->query("select lectureID,lectureDate, lectureFrom, lectureTo, lectureName, lectureLecturer,lectureHall from lectures where lectureBatch='19.1' AND lectureDate >= DATE(NOW()) ORDER BY lectureDate,lectureFrom ");
                           
                                                    
			                                            $i=0;
				                                        while($rows = $query->fetch_assoc()){
                                                        $i++;
                                                        
                                                        $lecID = $rows['lectureID'];
                                                        $lecHall = $rows['lectureHall'];
                                                        $nullHall = "<strong>Not Assigned Yet</strong>";
			                                            ?>
			                                            <tr>
			                                            	
			                                            	<td><?php echo $rows['lectureDate'];?></td>
			                                            	<td><?php echo $rows['lectureFrom'];?></td>
                                                            <td><?php echo $rows['lectureTo'];?></td>
                                                            <td><?php echo $rows['lectureName'];?></td>
                                                            <td><?php echo $rows['lectureLecturer'];?></td>
                                                            <td><?php if (isset($lecHall)) {echo $lecHall;} else {echo $nullHall;} ?></td>
                                                            
                                                            <td><a href="lectures.php?edit=<?php echo $rows['lectureID'];?> "  class="btn btn-success btn-circle ml-1" ><i class="fas fa-edit text-white"></i></a>
                                                            <a href="assets/php/deleteLecture.php?lectureID=<?php echo $rows['lectureID'];?> " class="btn btn-danger btn-circle ml-1"><i class="far fa-calendar-minus text-white"></a>
                                                            </td>
			                                                </tr>
			                                                <?php } ?>
                                                            </tbody>
                                                <tfoot>
                                                    <tr></tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 22px;">
                            <div class="col">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                    <!-- 19.1  add/update lectures -->

                                    <?php
                                        if($update==true):
                                    ?>  
                                                            <h6 class="text-primary font-weight-bold m-0">Update Lectures</h6>
                                      <?php else: ?>                            
                                                            <h6 class="text-primary font-weight-bold m-0">Add Lectures</h6>
                                            <?php endif; ?>
                                        
                                    </div>
                                    <div class="card-body">
                                                                               <div class="form-group">
                                            <form method="post" action="assets/php/addLectures.php">
                                                <input type="hidden" name="id" value= "<?php echo $editlecID; ?>">
                                                <div class="form-row">
                                                    <div><input class="form-control" type="hidden" name="addLectureBatch" value="19.1" ></div>
                                                    <div class="col"><label>Date</label><input class="form-control" type="date" name="addLectureDate" value="<?php echo $editlecDate?>" ></div>
                                                </div>
                                                <div class="form-row" style="margin-top: 17px;">
                                                    <div class="col"><label>From</label><input class="form-control" type="time" name="addLectureFrom" value="<?php echo $editlecFrom?>"></div>
                                                    <div class="col"><label>To</label><input class="form-control" type="time" name="addLectureTo" required="" value="<?php echo $editlecTo?>"></div>
                                                </div>
                                                <div class="form-row" style="margin-top: 17px;">
                                                    <div class="col"><label>Lecture</label><input class="form-control" type="text" name="addLectureName"  required="" value="<?php echo $editlecName?>"></div>
                                                </div>
                                                <div class="form-row" style="margin-top: 17px;">
                                                    <div class="col"><label>Lecturer</label><input class="form-control" type="text" name="addLectureLecturer" required="" value="<?php echo $editlecLecturer?>"></div>
                                                </div>
                                                <div class="form-row" style="margin-top: 17px;">
                                                    <div class="col">
                                                        <div id="btnwrapperleft"><button class="btn btn-danger btn-icon-split" type="reset"><span class="text-white-50 icon"><i class="fas fa-trash"></i></span><span class="text-white text">Clear</span></button></div>
                                                    </div>
                                                    <div class="col">
                                                        <?php
                                                            if($update==true):
                                                        ?>  
                                                                                <div id="btnwrapperright"><button name="update" class="btn btn-success btn-icon-split" type="submit"><span class="text-white-50 icon"><i class="fas fa-check"></i></span><span class="text-white text">Update</span></button></div>
                                                            <?php else: ?>                            
                                                        <div id="btnwrapperright"><button class="btn btn-success btn-icon-split" name="add" type="submit"><span class="text-white-50 icon"><i class="fas fa-check"></i></span><span class="text-white text">Add</span></button></div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                    <!-- 19.1  hall assign lectures -->
                                        <h6 class="text-primary font-weight-bold m-0">Allocate Lecture Halls</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            
                                            <form class="form-inline" method="post" action="assets/php/assignHall.php">                
                                            <table class="table dataTable my-0" id="dataTable">
                                            <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Time</th>
                                                        <th>Lecture</th>
                                                        <th>Lecturer</th>
                                                        <th>Hall</th>
                                                        <th>&nbsp; &nbsp;Assign</th>
                                                    </tr>
                                                </thead>
                                                
                                                <tbody>
                                                
                                                <?php 
            
                                                        global $conn;
                                                    
                                                        $query = $conn->query("select lectureID,lectureDate, lectureFrom , lectureTo, lectureName, lectureLecturer,lectureHall from lectures where lectureBatch='19.1' AND lectureDate >= DATE(NOW()) AND lectureHall IS NULL ORDER BY lectureDate,lectureFrom");
                                                        
                                                    
                                                        $i=0;
                                                        while($rows = $query->fetch_assoc()){
                                                        $i++;
                                                        
                                                        $hallAssignLec = $rows['lectureID'];
                                                        $lecDate = $rows['lectureDate'];
                                                        $lecFrom = $rows['lectureFrom'];
                                                        $lecTo = $rows['lectureTo'];
                                                        ?>
                                                        <tr>
                                                            
                                                            <td><?php echo $rows['lectureDate'];?></td>
                                                            <td><?php echo $rows['lectureFrom'];?></br><?php echo $rows['lectureTo'];?></td>
                                                            <td><?php echo $rows['lectureName'];?></td>
                                                            <td><?php echo $rows['lectureLecturer'];?></td> 
                                                            <td>
                                                            <div class="form-group">
                                                            
                                                            <div><input class="form-control" type="hidden" name="hallAssignLec" value="<?php echo $hallAssignLec;?>" ></div>
                                                            <select  class="form-control" name="selectedHall" >
                                                            <?php
                                                                $query2 = $conn->query("select reservHall from hallview where reservDate='$lecDate' AND reservFrom<'$lecTo' AND reservTo>'$lecFrom'");
                                                                $hall01 = "C001";
                                                                $hall02 = "C002";
                                                                $hall03 = "C003";
                                                                $hall04 = "C004";
                                                                $hall05 = "C005";
                                                                while($rows2 = $query2->fetch_assoc())
                                                                        { 
                                                                            if ($rows2['reserveHall']=="C001"){
                                                                                $hall01 = "none";
                                                                            } elseif ($rows2['reservHall']=="C002"){
                                                                                $hall02 = "none";
                                                                            } elseif ($rows2['reservHall']=="C003"){
                                                                                $hall03 = "none";
                                                                            } elseif ($rows2['reservHall']=="C004"){
                                                                                $hall04 = "none";
                                                                            } elseif ($rows2['reservHall']=="C005"){
                                                                                $hall04 = "none";
                                                                            }

                                                                        }
                                                                            ?>
                                                                              <option disabled selected value> Select a hall</option>
                                                                              <option value="<?php echo $hall01;?>" style="display:<?php echo $hall01;?>"><?php echo $hall01;?></option> 
                                                                              <option value="<?php echo $hall02;?>" style="display:<?php echo $hall02;?>"><?php echo $hall02;?></option> 
                                                                              <option value="<?php echo $hall03;?>" style="display:<?php echo $hall03;?>"><?php echo $hall03;?></option> 
                                                                              <option value="<?php echo $hall04;?>" style="display:<?php echo $hall04;?>"><?php echo $hall04;?></option> 
                                                                              <option value="<?php echo $hall05;?>" style="display:<?php echo $hall05;?>"><?php echo $hall05;?></option> 

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