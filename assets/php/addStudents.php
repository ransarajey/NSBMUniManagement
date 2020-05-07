

<?php			
require_once "config.php";
require_once "functions.php";
$user = new login_registration_class();

			
					if($_SERVER['REQUEST_METHOD'] == "POST"){
						$stuID   = $_POST['registerID'];
                        $stuName = $_POST['registerName'];
						$stuEmail = $_POST['registerEmail'];
						$stuBatch=$_POST['registerBatch'];
                
						
							$addStudent = $user->addStudent($stuID,$stuName,$stuEmail,$stuBatch);
							if($addStudent){
                                echo "<script>alert('Lecture added  successfully!');</script>";
                                header('Location: ../../addstudents.php');
							}else{
								echo "<script>alert('Error!');</script>";
							}
					
					}


							
				?>