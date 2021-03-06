<!--  Three Fields, Recovery Password, New Password and Confirm Password-->
<!-- 3. THIS IS WHERE THEY ENTER RECOVERY PASSWORD AND NEW PASSWORD AND CONFIRM Password
        SENDS THEM TO passwordUpdate.php IN FORM-->

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Trash Tracker</title>
    <link rel="icon" href="../../images/trashtracker.png"/>
    <!--BOOTSTRAP-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--CSS-->
    <link rel="stylesheet" href="../../css/stylesheet.css" >
    <!--CSS MEDIA QUERY-->
    <link rel="stylesheet" href="../../css/stylesheet2.css">
    <!-- ICONS https://material.io/icons/#ic_cloud-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
<!--LOGIN-->
<div class="container-fluid" id="id" style="background-color:#b4b4b4;"><!--container-fuild-->
  <div class="row" style="padding: 0 15px"><!--ROW-->
    <div class="col" style="background-color:#FFFFFF; margin: 5px; text-align:center; padding: 15px;"><!--LOGO-->
      <h1>
      <a href="../index.php">
            <img src="../../images/trashtracker.png" width="100px">
        </a>
          Welcome to Trash Tracker
      </h1>
    </div><!--LOGO-->
 </div><!--ROW-->
</div><!--container-fuild-->
<!--.GENERAL INFO-->

<!--NEW PASSWORD-->
<div class="container" style="background-color:#b4b4b4; margin-top: 20px;  
                              padding: 20px; width: 80%;">
 <div class="card border-dark mb-3" style="max-width: auto;">
  <div class="card-header"><h4 class="img_center">Create New Password</h4></div>
  <div class="card-body text-dark">
    <h5 class="card-title"><h5>Let's update your password!</h5>
    <p class="card-text"><p> *** Please check your email for a temporary password to update your settings</p>
    <form action = "passwordUpdate.php" method = "post">
    <div>
    <span style = "color: #ff0000;">
      <?php 
        $reasons = array("update" => "Your Recovery Password is Incorrect</br>", "match" => "Your Passwords do not match</br>", "blank" => "You have left one or more fields blank</br>");
                    if($_GET["updateFailed"] == true) echo $reasons[$_GET["reason"]];
      ?>
    </span>
    </div>
      <div class="form-group">
         <label for="Recovery">Enter Email</label>
         <input type="text" class="form-control" name="recoveryEmail" id="recoveryEmail" 
                aria-describedby="recovery" placeholder="Enter Email">
      </div>

     <div class="form-group">
        <label for="Recovery">Enter Recovery Password</label>
        <input type="password" class="form-control" name="recoveryPassword" id="recoveryPassword" 
               aria-describedby="recovery" placeholder="Enter Recovery Password">
     </div>

     <div class="form-group">
        <label for="Recovery">Enter New Password</label>
        <input type="password" class="form-control" name="newPassword" id="newPassword" 
               aria-describedby="recovery" placeholder="Enter new password">
     </div>

     <div class="form-group">
        <label for="Recovery">Confirm New Password</label>
        <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" 
               aria-describedby="recovery" placeholder="Confirm Password">
     </div>

     <p class="img_center">
     	 <input type = "submit" name = "submit" class="btn btn-sm btn-success" value = "Update Password"/>
    </p>

    </form>
    </div>
 </div><!--.row-->
</div><!--.container-->

<footer><!--FOOTER CONTAINER-->
<nav class="navbar fixed-bottom navbar-expand navbar-light bg-light"><!--START BOTTOM NAVBAR-->

          <a class="nav-link" href="contact">Contact Us</a>
          |
          <a class="nav-link" href="">Privacy and Policy</a>
      </div>
  </nav><!--END BOTTOM NAVBAR-->
</footer><!--.FOOTER-->

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 </body>
</html>
