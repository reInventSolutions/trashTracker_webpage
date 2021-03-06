<!-- 
    #######################################################
    FILENAME: signup.php
    OVERVIEW: PHP page for Trash Tracker's new users.
    PURPOSE: Will allow users to input ID token, name, email
    and password. If ID token is in the database and  sign 
    up is successful redirect to index.php.
    If not will display error. 
    Update and Return button calls register.php to validate 
    ID token.
    #######################################################
-->
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
<!--REGISTER-->
<div class="container-fluid" id="id" style="background-color:#b4b4b4;"><!--container-fuild-->
  <div class="row" style="padding: 0 15px"><!--ROW-->
    <div class="col" style="background-color:#FFFFFF; margin: 5px; text-align:center; padding: 15px;"><!--LOGO-->
      <h1>
      <a href="../index.php">
            <img src="../../images/trashtracker.png" width="100px">
        </a>        Welcome to Trash Tracker     
      </h1>
    </div><!--LOGO-->    
 </div><!--ROW-->
</div><!--container-fuild-->

<!--SIGN UP-->
<div class="container" style="background-color:#b4b4b4; margin-top: 20px;  
                              padding: 20px; width: 80%;">
  <div class="card border-dark mb-3" style="max-width: auto;">
  <div class="card-header"><h4 class="img_center">Registering to Trash Tracker</h4></div>
  <div class="card-body text-dark">
    <h5 class="card-title">Happy to see you sign up today!</h5>
    <p class="card-text">   
	<div>
    <!--<form name="userLogin">-->
	<form action = "register.php" method = "post">
		  <div>
	  <span style = "color: #ff0000;">
	  <?php $reasons = array("tokenIDinvalid" => "Invalid Token </br>", "blank" => "You have left one or more fields blank</br>"); if($_GET["updateFailed"] == true) echo $reasons[$_GET["reason"]]; ?>
	  </span>
	  </div>
      <div class="form-group">
        <label for="InputID"><b class="name">ID TOKEN</b></label>
        <input type="text" class="form-control" name="tokenId" id="tokenId" aria-describedby="token" placeholder="Enter ID">
      </div>
        <label for="inputName"><b class="name">Name</b></label>
        <input type="name" class="form-control" name="name" id= "name" aria-describedby="name" placeholder="Enter Name">
      <div class="form-group">
        <label for="inputEmail"><b class="name">Email</b></label>
        <input type="email" class="form-control" name="email" id= "email" aria-describedby="email" placeholder="Enter Email">
    </div>
    <div class="form-group">
        <label for="inputUpdatePW"><b class="name">New Password</b></label>
        <input type="password" class="form-control" name="password" id= "password" aria-describedby="updatepassword" placeholder="New Password">
    </div>
    <br/>
     <p class="img_center">
	  <input type = "submit" name = "submit" class="btn btn-sm btn-success" value = "Update and Return"/> <br>
     </p>
    </form>
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

<!--
    DENISE THUY VY NGUYEN
    2/1/2018
-->