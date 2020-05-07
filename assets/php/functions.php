<?php
class login_registration_class{
	public function __construct(){
		$db = new databaseConnection();
    }

	/**
	---------------------------------
	All functions for admin
	---------------------------------
	**/
//admin login
public function adminLogin($adminEmail, $adminPassword){
    global $conn;
    $sql = "SELECT userEmail,userName,userDP FROM users WHERE userEmail='$adminEmail' and userPassword='$adminPassword'";
    $result = $conn->query($sql);
    $userdata = $result->fetch_assoc();
    $count = $result->num_rows;
    if($count == 1){
        session_start();
        $_SESSION['adminLogin'] = true; 
        $_SESSION['adminEmail'] = $userdata['userEmail']; 
        $_SESSION['adminName'] = $userdata['userName']; 
        $_SESSION['adminDP'] = $userdata['userDP']; 
        //$_SESSION['login_msg'] = "Login Success"; 
        return true;
    }else{
        return false;
    }
}

	//Session Unset for Admin info //Log out option
	public function AdminLogout(){
		$_SESSION['adminLogin'] = false;
		unset($_SESSION['adminEmail']); 
		unset($_SESSION['adminName']);
		unset($_SESSION['adminLogin']);
		
		//session_destroy();
	}
	public function getSession(){
		return @$_SESSION['adminLogin'];
	}

    //Ends admin related function 
    

    	/**
	---------------------------------
	All functions for lectures
	---------------------------------
    **/
    //add new lecture
	public function addLectures($lectureDate,$lectureFrom,$lectureTo,$lectureName,$lectureLecturer,$batch){
		global $conn;
	
		$in_sql = "INSERT INTO lectures (lectureBatch,lectureDate,lectureFrom,lectureTo,lectureName,lectureLecturer) VALUES ('$batch','$lectureDate','$lectureFrom','$lectureTo','$lectureName','$lectureLecturer') ";
		
			$conn->query($in_sql);
			return true;
		
	}

	//assign hall to lecture
	public function assignHall($selectedHall,$hallAssignLec){
		global $conn;
	
		$in_sql = "UPDATE lectures SET lectureHall='$selectedHall' WHERE lectureID=$hallAssignLec";
		
			$conn->query($in_sql);
			return true;
		
	}
	
	public function updateLectures($updatelectureID,$updatelectureDate,$updatelectureFrom,$updatelectureTo,$updatelectureName,$updatelectureLecturer){
		global $conn;
	
		$in_sql = "Update lectures SET lectureDate='$updatelectureDate', lectureFrom = '$updatelectureFrom',lectureTo = '$updatelectureTo', lectureName='$updatelectureName', lectureLecturer='$updatelectureLecturer' WHERE lectureID='$updatelectureID'  ";
		
		$conn->query($in_sql);
		return true;
		
	}


	/**
	---------------------------------
	All functions for studyrooms
	---------------------------------
    **/
	public function reserveStudyRooms($studyRoomName,$studentID,$bookingTime){
			global $conn;
	
			$in_sql = "insert into studyroomsreservations (reservationStudyRoom,reservationStudentID,reservationPeriod) VALUES ('$studyRoomName','$studentID','$bookingTime') ";
			$in_sql2 = "Update studyrooms SET studyRoomAvailability='0'WHERE studyRoomName='$studyRoomName'  ";
		
			$conn->query($in_sql);
			$conn->query($in_sql2);
			return true;
		
	}

	public function updateStudyRooms($studyRoomName){
		global $conn;

		$in_sql2 = "Update studyrooms SET studyRoomAvailability='1'WHERE studyRoomName='$studyRoomName'  ";
	
		$conn->query($in_sql2);
		return true;
	
}

// 	public function countStudyRooms($availability){
// 		global $conn;

// 		$query2 = $conn->query("select * from studyrooms where studyRoomAvailability='$availability'");
                                                              
// 		while($rows2 = $query2->fetch_assoc())
// 				{ $studyRoomCount = $studyRoomCount+1;  }
// 		return $studyRoomCount;

// }



	/**
	---------------------------------
	All functions for events
	---------------------------------
	**/
	
	public function addEvents($eventDate,$eventFrom,$eventTo,$eventName,$image,$club){
		global $conn;
	
		$in_sql = "INSERT INTO events (eventClub,eventDate,eventFrom,eventTo,eventName,eventImage) VALUES ('$club','$eventDate','$eventFrom','$eventTo','$eventName','$image') ";
		
			$conn->query($in_sql);
			return true;
		
	}

	public function updateEvents($updateeventID,$updateeventDate,$updateeventFrom,$updateeventTo,$updateeventName,$image){
		global $conn;
	
		$in_sql = "Update events SET eventDate='$updateeventDate', eventFrom = '$updateeventFrom',eventTo = '$updateeventTo', eventName='$updateeventName' WHERE eventID='$updateeventID'  ";
		$conn->query($in_sql);

		if($image != null){
		$in_sql2 = "Update events SET eventImage='$image' WHERE eventID='$updateeventID'  ";
		$conn->query($in_sql2);
		}
		return true;
		
	}


};
?>



