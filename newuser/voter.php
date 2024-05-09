
<!-- database connection ................. -->
 
<?php
   $serverName="localhost";
   $dbUsername="root";
   $dbPassword="";
   $dbName="election";
   
  $con = mysqli_connect($serverName,$dbUsername,$dbPassword,$dbName);
if (mysqli_connect_error())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  
  }
?>
<!-- database connection ................. -->



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Voter Registration Form</title>
 
   
  <link rel="stylesheet" href="voter.css">
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
</head>
<body>
  <div class="container">
    <div class="title">Registration for Voter</div>
    <div class="content">
      <form  id="myForm" action="includes/signup.inc.php" method="post">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" name="uname" placeholder="Enter your name" required>
          </div>
          <div class="input-box">
            <span class="details">ID Number</span>
            <input type="text" name="idnum" placeholder="Enter your ID number" required>
          </div>
          <div class="input-box">
            <span class="details">Date of Birth</span>
            <input type="date" name="birthday" required>
          </div>
          <div class="input-box">
            <span class="details">Gender</span>
            <select name="Gender" id="Gender" class="form-control" required>
              <option value="">Select gender</option>
              <option value="male">Male</option>
              <option value="female">Female</option>
            </select>
          </div>
          <?php
     $serverName="localhost";
     $dbUsername="root";
     $dbPassword="";
     $dbName="election";
     
    $con = mysqli_connect($serverName,$dbUsername,$dbPassword,$dbName);
        
          $electoralDistrict  = '';
          $sql = "SELECT electoralDistrict FROM  electorial_polling_gramaniladari GROUP BY electoralDistrict ORDER BY electoralDistrict ASC";
          $result = mysqli_query($con, $sql);
          while($row = mysqli_fetch_array($result))
          {
          $electoralDistrict  .= '<option value="'.$row["electoralDistrict"].'">'.$row["electoralDistrict"].'</option>';
          }
    ?>
          <div class="input-box">
            <span class="details">Electoral District</span>
            <select name="electoralDistrict" id="electoralDistrict" class="form-control action" >
              <option value="">Select Electoral District</option>
              <?php echo $electoralDistrict; ?>
            </select>
          </div>
          <div class="input-box">
            <span class="details">Polling Division</span>
            <select name="pollingDivision" id="pollingDivision" class="form-control action" >
              <option value="">Select Polling Division</option>
            </select>
          </div>
          <div class="input-box">
            <span class="details">Gramaniladari Division</span>
            <select name="gdivision" id="gdivision" class="form-control" >
              <option value="">Select Gramaniladari Division</option>
            </select>
          </div>
        </div>
        <div class="button">
          
          <input type="reset" value="Clear" class="btn" >
          <input type="submit" name="submit" value="Submit" class="btn " >
        </div>
  
  <div class="form-row">
  <div class="form-group select-boxes col-md-6" class="form-control">
  <?php
 
     $serverName="localhost";
     $dbUsername="root";
     $dbPassword="";
     $dbName="election";
     
    $con = mysqli_connect($serverName,$dbUsername,$dbPassword,$dbName);
          
          $electoralDistrict  = '';
          $sql = "SELECT electoralDistrict FROM  electorial_polling_gramaniladari GROUP BY electoralDistrict ORDER BY electoralDistrict ASC";
          $result = mysqli_query($con, $sql);
          while($row = mysqli_fetch_array($result))
          {
          $electoralDistrict  .= '<option value="'.$row["electoralDistrict"].'">'.$row["electoralDistrict"].'</option>';
          }
    ?>
    </form>
    </div>
  </div>
 <script>
$(document).ready(function(){
 $('.action').change(function(){
  if($(this).val() != '')
  {
   var action = $(this).attr("id");
   var query = $(this).val();
   var result = '';
   if(action == "electoralDistrict")
   {
    result = 'pollingDivision';
   }
   else
   {
    result = 'gdivision';
   }
   $.ajax({
    url:"fetchdata.php",
    method:"POST",
    data:{action:action, query:query},
    success:function(data){
     $('#'+result).html(data);
    }
   })
  }
 });
});
</script>

