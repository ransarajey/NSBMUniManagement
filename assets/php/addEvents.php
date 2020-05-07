<?php			
require_once "config.php";
require_once "functions.php";
$user = new login_registration_class();

				if(isset($_POST['add'])){
					if($_SERVER['REQUEST_METHOD'] == "POST"){
						$eventDate   = $_POST['addEventDate'];
                        $eventFrom = $_POST['addEventFrom'];
						$eventTo = $_POST['addEventTo'];
						$eventName=$_POST['addEventName'];
                        $club = $_POST['addEventClub'];
                        $msg = "";
                        $image = $_FILES['addEventFlyer']['name'];
                        $target = "../images/".basename($image);
                  
                 
                        if (move_uploaded_file($_FILES['addEventFlyer']['tmp_name'], $target)) {
                            $msg = "Image uploaded successfully";
                        }else{
                            $msg = "Failed to upload image";
                        }


						
							$addEvent = $user->addEvents($eventDate,$eventFrom,$eventTo,$eventName,$image,$club);
							if($addEvent){
                                echo "<script>alert('Event added  successfully!');</script>";
                                header('Location: ../../events.php');
							}else{
								echo "<script>alert('Error!');</script>";
							}
					
                    }}


                    $update = false;
					$id = 0;
					$editevDate = '';
					$editevFrom = '';
					$editevTo = '';
					$editevName = '';
					$editevImage = '';
					$editevHall = '';
					if (isset($_GET['edit'])){

						global $conn;
												
						$evID = $_GET['edit'];
						$update = true;
						$query = $conn->query("SELECT * FROM events WHERE eventID = '$evID'"); 
						
						
						
							$row = $query->fetch_assoc();
							$editevID = $row['eventID'];
							$editevDate = $row['eventDate'];
							$editevFrom = $row['eventFrom'];
							$editevTo = $row['eventTo'];
                            $editevName = $row['eventName'];
                            $editevImage = $row['eventImage'];
							$editevHall = $row['eventHall'];
						}

						if(isset($_POST['update'])){
							$updateeventID = $_POST['id'];
							$updateeventDate   = $_POST['addEventDate'];
							$updateeventFrom = $_POST['addEventFrom'];
							$updateeventTo = $_POST['addEventTo'];
                            $updateeventName=$_POST['addEventName'];
                            

                            $msg = "";
                            $image = $_FILES['addEventFlyer']['name'];
                            $target = "../images/".basename($image);
                    
                    
                            if (move_uploaded_file($_FILES['addEventFlyer']['tmp_name'], $target)) {
                                $msg = "Image uploaded successfully";
                            }else{
                                $msg = "Failed to upload image";
                            }

							

							// $update = $conn->query("Update events SET eventDate='$updateeventDate', eventFrom = '$updateeventTo', eventName='$updateeventName', eventeventr='$updateeventeventr' WHERE eventID=$updateeventID ");
							// header('Location: ../../events.php');
							$updateEvent = $user->updateEvents($updateeventID,$updateeventDate,$updateeventFrom,$updateeventTo,$updateeventName,$image);
							if($updateEvent){
                                echo "<script>alert('event added  successfully!');</script>";
                                header('Location: ../../events.php');
							}else{
								echo "<script>alert('Error!');</script>";
							}
						}


?>