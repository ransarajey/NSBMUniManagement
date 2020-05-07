<?php			
require_once "config.php";
require_once "functions.php";
$user = new login_registration_class();

				if(isset($_POST['submit'])){
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
                                // header('Location: ../../events.php');
							}else{
								echo "<script>alert('Error!');</script>";
							}
					
                    }}


?>