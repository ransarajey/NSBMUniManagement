<?php			
require_once "config.php";
require_once "functions.php";
$user = new login_registration_class();

				if(isset($_POST['booking'])){
					if($_SERVER['REQUEST_METHOD'] == "POST"){
						$studyRoomName   = $_POST['studyRoomName'];
                        $studentID= $_POST['bookSRStudentID'];
						$bookingTime = $_POST['reservationTime'];

							$reserveRoom = $user->reserveStudyRooms($studyRoomName,$studentID,$bookingTime);
							if($reserveRoom){
                                echo "<script>alert('Study Room Reserved!');</script>";
                                header('Location: ../../studyrooms.php');
							}else{
								echo "<script>alert('Error!');</script>";
							}
					
					}}


                    if(isset($_POST['release'])){
                        if($_SERVER['REQUEST_METHOD'] == "POST"){
                            $studyRoomName   = $_POST['releaseSRName'];
                                
                                $releaseRoom = $user->updateStudyRooms($studyRoomName);
                                if($releaseRoom){
                                    echo "<script>alert('Study Room Reserved!');</script>";
                                    header('Location: ../../studyrooms.php');
                                }else{
                                    echo "<script>alert('Error!');</script>";
                                }
                        
                        }}
						
							
				?>