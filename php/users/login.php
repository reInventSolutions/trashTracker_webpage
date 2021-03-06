<!-- 
    #######################################################
    FILENAME: login.php
    OVERVIEW: PHP page for Trash Tracker login credentials.
    PURPOSE: Will check users email and password and direct
    to account.php if credentials are in the database, if 
    not will display error. 
    #######################################################
-->
<?php include "../../../DB/dbinfo.php"; ?>
<html>
<html lang="en">
<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Trash Tracker</title>
    <link rel="icon" href="../../images/trashtracker.png"/>
    <!--BOOTSTRAP-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--CSS-->
    <link rel="stylesheet" href="../css/stylesheet.css" >
    <!--CSS MEDIA QUERY-->
    <link rel="stylesheet" href="../css/stylesheet2.css">
    <!-- ICONS https://material.io/icons/#ic_cloud-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>

<?php
  session_start();
  $connection = mysqli_connect($DBservername, $DBusername, $DBpassword);
  @mysqli_select_db($connection, $DBname);

     if($connection){
          $password = $_POST['userPassword'];//input password
          $email = $_POST['userEmail'];

		      $loginFailed = false;

          $userLogin = "SELECT password, email, ID, name FROM Users WHERE email = '$email'";
          $result = @mysqli_query($connection, $userLogin);
          $row = mysqli_fetch_row($result);
          $pass = $row[0]; //database password
          $mail = $row[1]; //database email
          $id = $row[2]; //database userID
          $name = $row[3]; //database name

          $_SESSION["name"] = $name;

          $getAddress = "SELECT UsernameID, Address, St, City, Zip, House FROM Houses WHERE UsernameID ='$id'";

          $addressResult = @mysqli_query($connection, $getAddress);
          $row2 = mysqli_fetch_row($addressResult);
          $userid = $row2[0];
          $address = $row2[1];
          $state = $row2[2];
          $city = $row2[3];
          $zip = $row2[4];
		  $house = $row2[5];

          $getNextPup = "SELECT NextPickup FROM Routes WHERE RouteNumber =
		  (SELECT RouteNum
		  FROM Houses
		  WHERE House ='$house')";

		  $numOfMonths = "SELECT DISTINCT (Wk) FROM Weights ORDER BY Wk DESC LIMIT 1";
		  $upperFloor = mysqli_query($connection, $numOfMonths);//HIGHEST MONTH AVAIL
		  $row = mysqli_fetch_row($upperFloor);
          $highWeek = $row[0];
		 
		  $low = $highWeek - 4;
		  $up = $highWeek;
		  
		  
          $pupResult = @mysqli_query($connection, $getNextPup);
          $puprow = mysqli_fetch_row($pupResult);
          $pickup = $puprow[0];

          $_SESSION["NextPickup"] = $pickup;

          $_SESSION["Address"] = $address;
          $_SESSION["St"] = $state;
          $_SESSION["City"] = $city;
          $_SESSION["Zip"] = $zip;
          $_SESSION["House"] = $house;
		  $_SESSION["Email"] = $mail;
		  $_SESSION["GraphLow"] = 14;
		  $_SESSION["GraphUp"] = 19;

		// Testing this code
		if ($password == ''){
		 $loginFailed = true;
		 die(header("Location: ../index.php?loginFailed=true&reason=blank"));
		}
	 	else if ($email == ''){
		 $loginFailed = true;
		 die(header("Location: ../index.php?loginFailed=true&reason=blank"));
		}
		//End of testing
		//IF ID TOKEN GIVEN IS == PASSWORD IN DB
		else if($id == $password ){
            header("Location: signup.php");//make changes here
            exit();
		}
        else if((password_verify($password, $pass) && $mail == $email)&&($id !== $pass)){
              $_SESSION[logged_in] = true;
              header("Location: ../splash.php");//make chages here
            exit();
        }
		else{
		 $loginFailed = true;
		 die(header("Location: ../index.php?loginFailed=true&reason=password"));
        }
        }
      else{
        header("Location: ../index.php");//make changes here
      exit();
        }

     mysqli_close($connection);
  ?>

  </body>

  <!--
    SCOTTY CARDWELL
    3/2/2018
  -->
</html>
