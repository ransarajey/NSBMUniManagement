

<?php			
require_once "config.php";
require_once "functions.php";
$user = new login_registration_class();

			
					if($_SERVER['REQUEST_METHOD'] == "POST"){
						$stuID   = $_POST['registerID'];
                        $stuName = $_POST['registerName'];
						$stuEmail = $_POST['registerEmail'];
						$stuBatch=$_POST['registerBatch'];
						$passwordtemp = uniqid();
						$password = md5($passwordtemp);


						$msg = "";
                        $image = $_FILES['registerDP']['name'];
                        $target = "../images/".basename($image);
                  
                 
                        if (move_uploaded_file($_FILES['registerDP']['tmp_name'], $target)) {
                            $msg = "Image uploaded successfully";
                        }else{
                            $msg = "Failed to upload image";
                        }

						
							$addStudent = $user->addStudent($stuID,$stuName,$stuEmail,$stuBatch,$password,$image);
							if($addStudent){
													
							$recipient = $stuEmail;
							$subject = "Your NSBM Student Account has been created!";
							$sender = "codebrigadelk@gmail.com";
							$body = "Your NSBM account has been created. \n Use the following credentials when you sign in to the app. \n Email: $stuEmail \n Password:$passwordtemp";
							mail( $recipient, $subject, $body, "From: $sender" ) or die ("Mail could not be sent.");
                                echo "<script>alert('Student added  successfully!');</script>";
                                header('Location: ../../addstudents.php');
							}else{
								echo "<script>alert('Error!');</script>";
							}
					
					}


							
				?>