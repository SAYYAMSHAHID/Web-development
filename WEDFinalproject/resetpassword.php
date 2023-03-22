
<?php
// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the username and password entered by the user
    $username = $_POST["username"];
    
    // Connect to the database
    $dbservername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "ecom";
    $conn = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbname);

    // Check if the username address exists in the database
    $sql = "SELECT id FROM admin_users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        // Hash the password
       
        // Update the password in the database
        $sql = "UPDATE admin_users SET password = '987654' WHERE username = '$username'";
        mysqli_query($conn, $sql);

        // Show a success message
        
        echo "The password for the admin $username has been updated.";
    } else {
        // Show an error message
        echo "The admin $username is not registered in our system.";
    }

    // Close the database connection
    mysqli_close($conn);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reset</title>
    <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="javascript.js">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>
   body{
	   background-image:url('images/background.jpg');
	   background-repeat:no-repeat;
	   background-attachment:fixed;
	    background-size:100% 100%;
   }
   </style>
<header>
        <div class="nav">
            <input type="checkbox" id="nav-check">
            <div class="nav-header">
              <div class="nav-title">
                <a href="index.php"><img src="alpha_67.png"></a>
              </div>
            </div>
            <div class="nav-btn">
              <label for="nav-check">
                <span></span>
                <span></span>
                <span></span>
              </label>
            </div>
            
            <div class="nav-links">
              <a href="index.php" >Home</a>
              <a href="mobile.php" >Products</a>
              <a href="about us.php" >About</a>
              <a href="contact us.php" >Contact</a>
              <a href="account.php" >Account</a>
            </div>
          </div>
</header>
    </div>
</div>
</div>
<!-- HTML form for the forget password page -->


<body >
<a href="account.php">GO BACK </a>
<div class="login-form " colour: "white">
<form action="resetpassword.php" method="post">
    <br>
    <input type="text" name="username" placeholder="username">
    
    <br>
    <input type="submit" value="Reset">
</form>
</div>
  
</body>
<!----------footer------>
<footer class="footer-section">
    <div class="container">
        <div class="footer-cta pt-5 pb-5">
            <div class="row">
                <div class="col-xl-4 col-md-4 mb-30">
                    <div class="single-cta">
                        <i class="fa fa-map-marker"></i>
                        <div class="cta-text">
                            <h4>Find us</h4>
                            <span>Lahore, Punjab ,Pakistan</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4 mb-30">
                    <div class="single-cta">
                        <i class="fa fa-phone"></i>
                        <div class="cta-text">
                            <h4>Call us</h4>
                            <span>+92 336 505 5392</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4 mb-30">
                    <div class="single-cta">
                        <i class="fa fa-envelope-open-o"></i>
                        <div class="cta-text">
                            <h4>Mail us</h4>
                            <span>Subhan.asif5055@gmail.com</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-content pt-5 pb-5">
            <div class="row">
                <div class="col-xl-4 col-lg-4 mb-50">
                    <div class="footer-widget">
                        <div class="footer-logo">
                            <a href="index.php"><img src="alpha_67.png" class="img-fluid" alt="logo"></a>
                        </div>
                        <div class="footer-text">
                            <p>This website totally for buying mobile and mobile accessories and its can provides all type of smart phone newly and coming soon model. .</p>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <ul class="social-icons">
                                <h4>Follow us</h4>
                              <li><a class="facebook" href="#"><i class="fa fa-facebook circle"></i></a></li>
                              <li><a class="twitter" href="#"><i class="fa fa-twitter circle"></i></a></li>
                              <li><a class="instagram" href="#"><i class="fa fa-instagram circle"></i></a></li>
                              <li><a class="linkedin" href="#"><i class="fa fa-linkedin circle"></i></a></li>   
                            </ul>
                          </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
                    <div class="footer-widget">
                        <div class="footer-widget-heading">
                            <h3>Useful Links</h3>
                        </div>
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Account</a></li>
                            <li><a href="#">About us</a></li>
                            <li><a href="#">Contact us</a></li>
                        </ul>
                    <div class="footer-widget-heading">
                        <h3>Our Locations</h3>
                    </div>
                    <ul>
                        <li><a href="#">Islamabad</a></li>
                        <li><a href="#">Karachi</a></li>
                        <li><a href="#">Okara</a></li>
                        <li><a href="#">Multan</a></li>
                    </ul>
                </div>
                </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 text-center text-lg-left">
                    <div class="copyright-text">
                        <p>Copyright &copy; 2022, All Right Reserved by Owner</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
</html>