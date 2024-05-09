
<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
   
    <link rel="stylesheet" href="candidate.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <div class="title">Registration for Candidate</div>
    <div class="content">
      <form action="includes/signup2.inc.php" method="post">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text"name="" placeholder="Enter your name" >
          </div>
          <div class="input-box">
            <span class="details">Initial With Name</span>
            <input type="text" name="ciname"placeholder="Enter your initial with name" >
          </div>
          <div class="input-box">
            <span class="details">ID Number</span>
            <input type="text"name="cidnum" placeholder="Enter your id number" >
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text"name="cpnumb" placeholder="Enter your number" >
          </div>
          <div class="input-box">
            <span class="details">Date of Birth</span>
            <input type="date" id="birthday" name="cbirthday"> 
          </div>
            
            <div class="input-box">
                <span class="details">Age</span>
                <input type="text"name="cage" placeholder="Enter your Age" >
              </div>
              <div class="input-box">
                <span class="details">Party</span>
                <input type="text"name="cparty" placeholder="Enter your Party" >
              </div>
              <div class="input-box">
                <span class="details">Candidate image</span>
                <input type="file" id="image" name="image" required>
                
              </div>
              <div class="input-box">
                <span class="details">Vote Reference Number</span>
                <input type="text"name="cvotereferencenum" placeholder="Enter your Vote Reference Number" >
              </div>
             
              <div class="input-box">
              <span class="details"name="cgender">Gender</span>
    
                <select>
                    <option>male</option>
                    <option>female</option>
                </select>
                
        </div>
          
                <div class="button">
                    
   
                <input type="button"id="clr" value="clear ">
                   <input type="submit" value="register">
        </div>

        
      </form>
    </div>
  </div>

</body>

</html>
