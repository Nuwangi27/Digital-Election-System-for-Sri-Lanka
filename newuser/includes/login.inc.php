<?php 
session_start(); 
include "includes/dbh.inc.php";

if (isset($_POST['uid']) && isset($_POST['pwd'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uid = validate($_POST['uid']);
	$pwd = validate($_POST['pwd']);

	if (empty($uid)) {
		header("Location: login.php?error=User id is required");
	    exit();
	}else if(empty($pwd)){
        header("Location: login.php?error=Password is required");
	    exit();
   
	}else{
		$sql = "SELECT * FROM u_login WHERE userid='$uid' AND password='$pwd'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result)===1) {

      
			$row = mysqli_fetch_assoc($result);
            if ($row['userid'] === $uid && $row['password'] === $pwd) {

              
            	$_SESSION['userid'] = $row['userid'];
            	
            	header("Location: voter.php");
		        exit();
            }else{
				header("Location: login.php?error=Incorect User id or password");
		        exit();
			}
		}else{
			header("Location: login.php?error=Incorect User id or password");
	        exit();
		
	}}
}
	
else{
	header("Location: voter.php");
	exit();
}