<?php
//fetchdata.php
if(isset($_POST["action"]))
{
    $serverName="localhost";
    $dbUsername="root";
    $dbPassword="";
    $dbName="election1";
    
   $con = mysqli_connect($serverName,$dbUsername,$dbPassword,$dbName);
 $output = '';
 if($_POST["action"] == "electoralDistrict")
 {
  $query = "SELECT pollingDivision FROM  electorial_polling_gramaniladari WHERE electoralDistrict = '".$_POST["query"]."' GROUP BY pollingDivision";
  $result = mysqli_query($con, $query);
  $output .= '<option value="">Select pollingDivision</option>';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '<option value="'.$row["pollingDivision"].'">'.$row["pollingDivision"].'</option>';
  }
 }
 if($_POST["action"] == "pollingDivision")
 {
  $query = "SELECT gdivision FROM  electorial_polling_gramaniladari WHERE pollingDivision = '".$_POST["query"]."'";
  $result = mysqli_query($con, $query);
  $output .= '<option value="">Select gdivision</option>';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '<option value="'.$row["gdivision"].'">'.$row["gdivision"].'</option>';
  }
 }
 echo $output;
}
?>
