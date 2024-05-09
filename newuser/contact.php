<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=">
  <link rel="stylesheet" href="contact.css">
 
  <title>Responsive Contact Us </title>
  <script src="https://kit.fontawesome.com/c32adfdcda.js" crossorigin="anonymous"></script>
    <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">

       
</head>

<body>
<dir class ="logo">
        <img src="logo.png">
    </dir>


    <nav>
        <label class="logo1">V<span>Lanka</span></label>
            <ul>
        <li ><a href="index.php"> Home</a></li>
        <li ><a href="about.php"> About </a></li>
        <li class ="active"> <a href="contact.php">  Contact</a></li>
        <li> <a href="resulthome2.php">Election Results</a></li>
        
     
           </ul>
     </nav>



     <section>
    <div class="section-header">
      <div class="container">
      <form action="includes/contact.inc.php" method="post">
        <h2>Contact Us</h2>
        <p> Contact our election team directly for all your election-related queries, feedback, and assistance. Find our contact information, including email, phone, and address details, on this page. We are here to address your concerns, provide information on voting procedures, and ensure a smooth and transparent electoral process.</p>
      </div>
    </div>
    
    <div class="container">
      <div class="row">
        
        <div class="contact-info">
          <div class="contact-info-item">
            <div class="contact-info-icon">
              <i class="fas fa-home"></i>
            </div>
            
            <div class="contact-info-content">
              <h4>Address</h4>
              <p>461 ,<br/> Boralla, <br/>colombo</p>
            </div>
          </div>
          
          <div class="contact-info-item">
            <div class="contact-info-icon">
              <i class="fas fa-phone"></i>
            </div>
            
            <div class="contact-info-content">
              <h4>Phone</h4>
              <p>+94 123456789</p>
            </div>
          </div>
          
          <div class="contact-info-item">
            <div class="contact-info-icon">
              <i class="fas fa-envelope"></i>
            </div>
            
            <div class="contact-info-content">
              <h4>Email</h4>
             <p>xyz@gmail.com</p>
            </div>
          </div>
        </div>
        
        <div class="contact-form">
          <form action="" id="contact-form">
            <h2>Send Message</h2>
            <div class="input-box">
              <input type="text" required="true" name="f_name">
              <span>Full Name</span>
            </div>
            
            <div class="input-box">
              <input type="email" required="true" name="f_Email">
              <span>Email</span>
            </div>
            
            <div class="input-box">
              <textarea required="true" name="f_Message"></textarea>
              <span>Type your Message...</span>
            </div>
            
            <div class="input-box">
            <input type="submit" name="submit" value="Submit"> 
         
            </div>
          </form>
        </div>
        
      </div>
    </div>
  </section>
  
</body>
</html>






