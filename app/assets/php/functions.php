<?php
class login_registration_class{
	public function __construct(){
		$db = new databaseConnection();
    }


    //student Login
    public function userLogin($userEmail, $userPassword){
        global $conn;
        $sql = "SELECT * FROM students WHERE studentEmail='$userEmail' and studentPassword='$userPassword'";
        $result = $conn->query($sql);
        $userdata = $result->fetch_assoc();
        $count = $result->num_rows;
        if($count == 1){
            session_start();
            $_SESSION['userLogin'] = true; 
            $_SESSION['userName'] = $userdata['studentName']; 
            $_SESSION['userEmail'] = $userdata['studentEmail']; 
            $_SESSION['userBatch'] = $userdata['studentBatch']; 
            $_SESSION['userDP'] = $userdata['studentDP']; 
            // $_SESSION['adminDP'] = $userdata['userDP']; 
            //$_SESSION['login_msg'] = "Login Success"; 
            return true;
        }else{
            return false;
        }
    }

    public function getSession(){
		return @$_SESSION['userLogin'];
    }
    
    public function userLogout(){
    $_SESSION['adminLogin'] = false;
    unset($_SESSION['userName']);
		unset($_SESSION['userLogin']); 
		unset($_SESSION['userEmail']);
    unset($_SESSION['userBatch']);
    unset($_SESSION['userDP']);
		
		session_destroy();
	}
};
?>