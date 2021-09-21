<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */

$link = mysqli_connect("localhost", "root", "", "registration");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$name = mysqli_real_escape_string($link, $_REQUEST['user']);
$password = mysqli_real_escape_string($link, $_REQUEST['pass']);
$conpassword = mysqli_real_escape_string($link, $_REQUEST['conpass']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);

if($password!=$conpassword)
{
echo "Please Check your password again!";
}

else
{
 
// attempt insert query execution
$sql = "INSERT INTO username (userName, pass, conpass, email) VALUES ('$name', '$password', '$conpassword','$email')";
if(mysqli_query($link, $sql)){
	
    //echo "You are successfully Registered! ";
header("Location: confirmation.html");
die();
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

}


 
// close connection
mysqli_close($link);
?>


