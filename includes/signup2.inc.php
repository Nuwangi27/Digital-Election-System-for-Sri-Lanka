<?php
$serverName="localhost";
$dbUsername="root";
$dbPassword="";
$dbName="election";

$conn = new mysqli($serverName,$dbUsername,$dbPassword,$dbName);

if($conn->connect_error){

    die("Connection failed:".$conn->connect_error);
}
$cfullname=$_POST["cfullname"];
$ciname=$_POST["ciname"];
$cidnum=$_POST["cidnum"];
$cpnumber=$_POST["cpnumb"];
$cbirthday=$_POST["cbirthday"];
$cage=$_POST["cage"];
$cparty=$_POST["cparty"];
$cvotenumber=$_POST["cvotenumber"];
$cvotereferencenum=$_POST["cvotereferencenum"];
$cgender=$_POST["cgender"];


$sql="INSERT INTO candidate(cfullname,ciname,cidnum,cpnumb,cbirthday,cage,cparty,cvotenumber,cvotereferencenum,cgender) VALUES('".$cfullname."','".$ciname."','".$cidnum."','".$cpnumber."','".$cbirthday."','".$cage."','".$cparty."','".$cvotenumber."','".$cvotereferencenum."','".$cgender."');";
if($conn->query($sql)=== TRUE){
   header("location:../popup.php");
   exit(); 
} else{
   echo "ERROR".$sql."<br>".$conn->error;
}
$conn->close();

?>
