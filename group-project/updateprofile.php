<html>
<head>
    <title>Update Profile</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
</head>
<body class="sub">
<nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar=header">
                <a class="navbar-brand" href="#" style="background-color:rgba(59, 53, 50, 0.151);">KPOP Stan Nation</a>
            </div>
            <ul class="nav navbar-nav">
              <li class="active"><a href="index.php">Home</a></li>
              <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Account<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="login.php">Log in</a></li>
                  <li><a href="signup.php">Sign Up</a></li>
                  <li><a href="updateprofile.php">Update Profile</a></li>
                  <li><a href="logout.php">Log Out</a></li>
                </ul>
              </li>
              <li><a href="kpopgroupsfam.php">Famous Kpop Groups</a></li>
              <li><a href="kpopgroupsnew.php">Newer Kpop Groups</a></li>
              <li><a href="recsongs.php">Recommended Songs</a></li>
              <li><a href="musicvideoliveperf.php">Music Videos</a></li>
              <li><a href="news.php">News</a></li>
              <li><a href="historyofkpop.php">History of KPOP</a></li>
              <li><a href="aboutus.php">About Us</a></li>
              <li><a href="contactus.php">Contact Us</a></li>
            </ul>
        </div>
    </nav>
    <?php session_start(); ?>
    <form method="POST" action="updateprofile.php">
        <label>Password:</label>
        <input type="password" name="password">
        <input type="submit" value="Update"></br>
    </form>
</body>
</hmtl>

<?php
//import credentials for db
require_once  'loginDB.php';

//connect to db
$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

//check if username exists
if(isset($_POST['password'])) 
{
	//Get data from POST object
	//$id = $_POST['id'];
	$username = $_SESSION['username'];
    $password = $_POST['password'];
    $password = password_hash($password, PASSWORD_DEFAULT);
	
	//echo $isbn.'<br>';
    $oldUserName = $_SESSION['username'];
	$query = "UPDATE customer set password='$password' where username = '$oldUserName'";
	
	$result = $conn->query($query); 
	if(!$result) die($conn->error);
	
//	header("Location: viewRecord.php");//this will return you to the view all page
	
	
	echo "You have changed your password!";
	
}



?>