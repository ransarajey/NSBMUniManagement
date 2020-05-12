<?php			
require_once "config.php";
require_once "functions.php";
$user = new login_registration_class();

			
					if($_SERVER['REQUEST_METHOD'] == "POST"){
						$complaint   = $_POST['complaint'];
                        
						
							$sendComplaint = $user->sendComplaint($complaint);
							if($sendComplaint){
                                header('Location: ../../complaints.php');
							}else{
								echo "<script>alert('Error!');</script>";
							}
					
					}


							
				?>