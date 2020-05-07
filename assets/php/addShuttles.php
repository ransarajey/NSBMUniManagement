<?php			
require_once "config.php";
require_once "functions.php";
$user = new login_registration_class();

				if(isset($_POST['add'])){
					if($_SERVER['REQUEST_METHOD'] == "POST"){
						$shuttleFrom   = $_POST['addShuttleFrom'];
                        $shuttleTime = $_POST['addShuttleTime'];
						$shuttleNo = $_POST['addShuttleBus'];
					
                        $msg = "";
                        $image = $_FILES['addShuttleIcon']['name'];
                        $target = "../shuttleicons/".basename($image);
                  
                 
                        if (move_uploaded_file($_FILES['addShuttleIcon']['tmp_name'], $target)) {
                            $msg = "Image uploaded successfully";
                        }else{
                            $msg = "Failed to upload image";
                        }


						
							$addShuttle = $user->addShuttle($shuttleFrom,$shuttleTime,$shuttleNo,$image);
							if($addShuttle){
                                echo "<script>alert('Shuttle added  successfully!');</script>";
                                header('Location: ../../shuttles.php');
							}else{
								echo "<script>alert('Error!');</script>";
							}
					
                    }}


                    $update = false;
					$id = 0;
					$editshID='';
					$editshTime = '';
					$editshNo = '';
					$editshIcon = '';
					if (isset($_GET['edit'])){

						global $conn;
												
						$shID = $_GET['edit'];
						$update = true;
						$query = $conn->query("SELECT * FROM shuttles  WHERE shuttleID = '$shID'"); 
						
						
						
							$row = $query->fetch_assoc();
							$editshID = $row['shuttleID'];
							$editshTime = $row['shuttleTime'];
							$editshNo = $row['shuttleNo'];
							$editshIcon = $row['shuttleIcon'];
						}

						if(isset($_POST['update'])){
							$updateshID = $_POST['id'];
							$updateshTime   = $_POST['addShuttleTime'];
							$updateshNo = $_POST['addShuttleBus'];
						                                                 

                            $msg = "";
                            $image = $_FILES['addShuttleIcon']['name'];
                            $target = "../shuttleicons/".basename($image);
                    
                    
                            if (move_uploaded_file($_FILES['addShuttleIcon']['tmp_name'], $target)) {
                                $msg = "Image uploaded successfully";
                            }else{
                                $msg = "Failed to upload image";
                            }

							

							// $update = $conn->query("Update events SET eventDate='$updateeventDate', eventFrom = '$updateeventTo', eventName='$updateeventName', eventeventr='$updateeventeventr' WHERE eventID=$updateeventID ");
							// header('Location: ../../events.php');
							$updateShuttle = $user->updateShuttles($updateshID,$updateshTime,$updateshNo,$image);
							if($updateShuttle){
                                echo "<script>alert('event added  successfully!');</script>";
                                header('Location: ../../shuttles.php');
							}else{
								echo "<script>alert('Error!');</script>";
							}
						}


?>