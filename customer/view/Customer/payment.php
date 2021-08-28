<?php



session_start();


	if(!isset($_COOKIE['user'])){  
		header("location: ../../home.html");
    }
  
if(isset($_SESSION["valid"]) && $_SESSION["valid"]=="yes"){
		$uname = $_SESSION['uname']; 
		$data=array();
if($_SERVER['REQUEST_METHOD'] == "POST"){


	$sql="update `user` SET `payment method`= '".$_REQUEST["payment"]."' ,`payment no`= '".$_REQUEST["num"]."' WHERE `uname` = '$uname'";
	$conn = mysqli_connect("localhost", "root", "","cred");
	$result = mysqli_query($conn, $sql)or die(mysqli_error($conn));
	$c=mysqli_affected_rows($conn);
	echo "<br/>";
echo " Payment method updated";

}
}

?>



<form action="payment.php" name="fm" method="post">

<html lang="en">

<head>
    <title>Add Payment Method</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .fakeimg {
            height: 200px;
            background: #aaa;
        }
    </style>
</head>

<body>

    <body>

        <div class="jumbotron text-center" style="margin-bottom:0">
            <h1>Welcome to</h1>
            <h2>Airline Ticket Reservation System </h2>
            <p>Add Payment Method</p>

            <ul class="nav justify-content-center">

                <nav class="navbar navbar-expand-sm bg-dark navbar-dark">

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
              <span class="navbar-toggler-icon"></span>
            </button>
                    <div class="collapse navbar-collapse" id="collapsibleNavbar">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="customerhomepage.html">Back</a>
                            </li>
                            
                        </ul>
                    </div>
                </nav>
            </ul>
        </div>
        <div class="container" style="margin-top:30px">
  <div class="row">
    <div class="col-sm-4">
<form>
        <!-- insert the page content here -->
<table>

<tr> 
<input type="radio" id="Bkash" name="payment" value="Bkash">
<label for="Bkash">Bkash</label><br>
<input type="radio" id="Visa" name="payment" value="Visa">
<label for="Visa">Visa</label><br>
</tr> 
<tr> 
  <td> Card/Bkash No : </td>
  <td><input type="text" name="num"></td>
</tr> 
<tr> 
  <td><input type="submit" name="sbt" value="submit" /> </td>

