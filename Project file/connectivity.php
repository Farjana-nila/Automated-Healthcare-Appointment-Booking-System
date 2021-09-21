<?php



$link = mysqli_connect("localhost", "root", "", "registration");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
$name = mysqli_real_escape_string($link, $_REQUEST['user']);
$password = mysqli_real_escape_string($link, $_REQUEST['pass']);

//$ID = $_POST['user'];
//$Password = $_POST['pass'];

session_start();   //starting the session for user profile page
if(!empty($name))   //checking the 'user' name which is 
//from Sign-In.html, is it empty or have some text
{
	$sql = "SELECT *  FROM username where userName = '$name' AND pass = '$password'";

$query=mysqli_query($link, $sql);

if(mysqli_query($link, $sql))
{
$row = mysqli_fetch_array($query);//or die(mysqli_error());
	if(!empty($row['userName']) AND !empty($row['pass']))
	{
		$_SESSION['userName'] = $row['pass'];
		echo "SUCCESSFULLY LOGIN TO USER PROFILE PAGE...";
header("Location: welcome.html");
die();
	}
else
	{
echo "SORRY... YOU ENTERD WRONG ID AND PASSWORD... PLEASE RETRY...";
	}

}


}


else{
echo "SORRY... FILL BOTH USERNAME AND PASSWORD... ";
}


?>

