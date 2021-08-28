<!DOCTYPE html>
<html lang="en">

<head>
    <title>Profile</title>
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
            <ul class="nav justify-content-center">

                <div class="sticky-top">
                    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">

                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#collapsibleNavbar">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="collapsibleNavbar">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="customerhomepage.html">Back</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="flights.php">Available Flights</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="logout.php">Log Out</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <form>


                        <?php
session_start();
//print_r($GLOBALS);
$file=fopen("pictures/images.txt","r") or die("file error");
$proPicURL="";
while($c=fgets($file)){
	//echo $c."<br/>";
	$ar=explode("-",$c);
	if($_SESSION["uname"]==$ar[0]){
		$proPicURL=$ar[1];
	}
}
//echo $proPicURL;
if(isset($_SESSION["valid"]) && $_SESSION["valid"]=="yes"){?>
                        <img src="<?php echo $proPicURL;?>" width="100px" height="100px" /><br /><br />
                        Hello: <?php echo $_SESSION["uname"]; ?>
                        <br /><br /><br /><br />
                        <a href="editprofile.php">Edit Info</a><br />
                        <a href="picture.php">Change Photo</a><br />
                        <?php
}
else{
	header("Location:../logout.php");
}
?>
                        <table>

                        </table>

                    </form>
                </div>
        </div>

        </div>
    </body>