

<?php			
require_once "config.php";
require_once "functions.php";
$user = new login_registration_class();

				if(isset($_POST['add'])){
					if($_SERVER['REQUEST_METHOD'] == "POST"){
						$lectureDate   = $_POST['addLectureDate'];
                        $lectureFrom = $_POST['addLectureFrom'];
						$lectureTo = $_POST['addLectureTo'];
						$lectureName=$_POST['addLectureName'];
                        $lectureLecturer = $_POST['addLectureLecturer'];
                        $batch = $_POST['addLectureBatch'];
						
							$addLecture = $user->addLectures($lectureDate,$lectureFrom,$lectureTo,$lectureName,$lectureLecturer,$batch);
							if($addLecture){
                                echo "<script>alert('Lecture added  successfully!');</script>";
                                header('Location: ../../lectures.php');
							}else{
								echo "<script>alert('Error!');</script>";
							}
					
					}}


					$update = false;
					$id = 0;
					$editlecDate = '';
					$editlecFrom = '';
					$editlecTo = '';
					$editlecName = '';
					$editlecLecturer = '';
					$editlecHall = '';
					if (isset($_GET['edit'])){

						global $conn;
												
						$lecID = $_GET['edit'];
						$update = true;
						$query = $conn->query("SELECT * FROM lectures WHERE lectureID = '$lecID'"); 
						
						
						
							$row = $query->fetch_assoc();
							$editlecID = $row['lectureID'];
							$editlecDate = $row['lectureDate'];
							$editlecFrom = $row['lectureFrom'];
							$editlecTo = $row['lectureTo'];
							$editlecName = $row['lectureName'];
							$editlecLecturer = $row['lectureLecturer'];
							$editlecHall = $row['lectureHall'];
						}

						if(isset($_POST['update'])){
							$updatelectureID = $_POST['id'];
							$updatelectureDate   = $_POST['addLectureDate'];
							$updatelectureFrom = $_POST['addLectureFrom'];
							$updatelectureTo = $_POST['addLectureTo'];
							$updatelectureName=$_POST['addLectureName'];
							$updatelectureLecturer = $_POST['addLectureLecturer'];

							// $update = $conn->query("Update lectures SET lectureDate='$updatelectureDate', lectureFrom = '$updatelectureTo', lectureName='$updatelectureName', lectureLecturer='$updatelectureLecturer' WHERE lectureID=$updatelectureID ");
							// header('Location: ../../lectures.php');
							$updateLecture = $user->updateLectures($updatelectureID,$updatelectureDate,$updatelectureFrom,$updatelectureTo,$updatelectureName,$updatelectureLecturer);
							if($updateLecture){
                                echo "<script>alert('Lecture added  successfully!');</script>";
                                header('Location: ../../lectures.php');
							}else{
								echo "<script>alert('Error!');</script>";
							}
						}
							
				?>