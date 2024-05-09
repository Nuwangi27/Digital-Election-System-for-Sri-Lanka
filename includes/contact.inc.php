

<?php
$serverName="localhost";
$dbUsername="root";
$dbPassword="";
$dbName="election";
$conn = new mysqli($serverName,$dbUsername,$dbPassword,$dbName);

if($conn->connect_error){

    die("Connection failed:".$conn->connect_error);
}


   $f_name=$_POST["f_name"];
 
   $f_Email=$_POST["f_Email"];

   $f_Message=$_POST["f_Message"];

  
 


 

   $query="INSERT INTO contactus(f_name,f_Email,f_Message) VALUES('".$f_name."','".$f_Email."','".$f_Message."');";
  
  
   if($conn->query($query)=== TRUE){
      header("location:../popup.php");
      exit(); 
   } else{
      echo "ERROR".$query."<br>".$conn->error;
   }
   $conn->close();

 ?>