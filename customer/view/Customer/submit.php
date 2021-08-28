<?php
session_start();
if(!isset($_COOKIE['user'])){  
    header("location: ../../home.html");
}

if(isset($_SESSION["valid"]) && $_SESSION["valid"]=="yes"){
		$uname = $_SESSION['uname']; 
$txt = date("Y/m/d");
echo $txt;

$sql="INSERT INTO `purchased`(`uname`, `source`, `destination`, `date`,`amount`) VALUES ('$uname','".$_REQUEST["source"]."','".$_REQUEST["destination"]."','$txt','".$_REQUEST["amount"]."')";

	$conn = mysqli_connect("localhost", "root", "","cred");
	$result = mysqli_query($conn, $sql)or die(mysqli_error($conn));
    $c=mysqli_affected_rows($conn);


    echo "<br/>";    
    echo "Purchased";
}
?>

