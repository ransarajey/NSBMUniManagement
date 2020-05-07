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
    $eventID = $_GET['eventID'];
    $query = "DELETE FROM events WHERE eventID = $eventID"; 

    if (mysqli_query($conn, $query)) {
        mysqli_close($conn);
        header('Location: ../../events.php');
        exit;
    } else {
        echo "Error deleting record";
    }
	
?>

