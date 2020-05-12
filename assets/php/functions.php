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
	
		//assign hall to event
		public function assignHallEvent($selectedHall,$hallAssignEvent){
			global $conn;
		
			$in_sql = "UPDATE events SET eventHall='$selectedHall' WHERE eventID=$hallAssignEvent";
			
				$conn->query($in_sql);
				return true;
			
		}

			/**
	---------------------------------
	All functions for shuttles
	---------------------------------
	**/

	public function addShuttle($shuttleFrom,$shuttleTime,$shuttleNo,$image){
		global $conn;
	
		$in_sql = "INSERT INTO shuttles (shuttleFrom,shuttleTime,shuttleNo,shuttleIcon) VALUES ('$shuttleFrom','$shuttleTime','$shuttleNo','$image') ";
		
			$conn->query($in_sql);
			return true;
		}

		public function updateShuttles($updateshID,$updateshTime,$updateshNo,$image){
			global $conn;
		
			$in_sql = "Update shuttles SET shuttleTime='$updateshTime', shuttleNo = '$updateshNo' WHERE shuttleID='$updateshID'  ";
			$conn->query($in_sql);
	
			if($image != null){
			$in_sql2 = "Update shuttles SET shuttleIcon='$image' WHERE shuttleID='$updateshID'  ";
			$conn->query($in_sql2);
			}
			return true;
			
		}

					/**
	---------------------------------
	All functions for complaints
	---------------------------------
	**/
	public function assignComplaint($selectedHall,$hallAssignEvent){
		global $conn;
		$to = "";
	
		$in_sql = "UPDATE complaints SET complaintAssignedTo='$selectedHall' WHERE complaintID='$hallAssignEvent'";
		$conn->query($in_sql);

		$in_sql2 = "select complaintText from complaints where complaintID='$hallAssignEvent'";
		$query=$conn->query($in_sql2);
	
		
		$i=0;
		while($rows = $query->fetch_assoc()){
		$i++;
	
		$complaintText = $rows['complaintText'];


		}
		
		if($selectedHall=="Dean of FOC")
		{
			$to="ransarajey@gmail.com";
		}else {
			$to="ransaractcki@gmail.com";
		}
		$subject = "New Complaint Assigned to You";
		$txt = "Complaint is:$complaintText";
		$headers = "From: webmaster@example.com";

		mail($to,$subject,$txt,$headers);

			return true;
		
	}

	
					/**
	---------------------------------
	All functions for students
	---------------------------------
	**/

	public function addStudent($stuID,$stuName,$stuEmail,$stuBatch,$password,$image){
		global $conn;
		
		$in_sql = "INSERT INTO students (studentID,studentName,studentEmail,studentBatch,studentPassword,studentDP) VALUES ('$stuID','$stuName','$stuEmail','$stuBatch','$password','$image') ";
		$conn->query($in_sql);
		return true;
		
	}

};
?>



