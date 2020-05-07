<?php
	ob_start ();
	session_start();
	require "config.php";
	require_once "functions.php";
	$user = new login_registration_class();
	$adminEmail = $_SESSION['adminEmail'];
    $adminName = $_SESSION['adminName'];
    $adminDP = $_SESSION['adminDP'];
	if(!$user->getSession()){
		header('Location: index.php');
		exit();
	}
	
?>

<?php

					if($_SERVER['REQUEST_METHOD'] == "POST"){

                        $selectedHall   = $_POST['selectedHall'];
                        $hallAssignEvent   = $_POST['hallAssignEvent'];
                        						
							$assignHallEvent = $user->assignHallEvent($selectedHall,$hallAssignEvent);
							if($assignHallEvent){
                                echo "<script>alert('Hall has been assigned!');</script>";
                                header('Location: ../../events.php');
							}else{
								echo "<script>alert('Error!');</script>";
							}
						
					}
				?>