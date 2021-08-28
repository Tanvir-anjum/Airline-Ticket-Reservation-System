<?php

session_start();
if(!isset($_COOKIE['user'])){  
    header("location: ../../home.html");
}

$cred=array();

$sql="SELECT * FROM `flight` WHERE 1";
	$conn = mysqli_connect("localhost", "root", "","cred");
	$result = mysqli_query($conn, $sql)or die(mysqli_error($conn));
	$c=mysqli_affected_rows($conn);
$flag=0;
$result = $conn->query($sql);

if(isset($_SESSION["valid"]) && $_SESSION["valid"]=="yes"){

		$data=array();
		
		
		$conn = mysqli_connect("localhost", "root", "","cred");
		$sql="select * from flight where 1";

		$result = mysqli_query($conn, $sql)or die(mysqli_error($conn));
		while($row = mysqli_fetch_assoc($result)) {

            $temp["Flight ID"]=$row["Flight ID"];
			$temp["From"]=$row["Source"];
			$temp["To"]=$row["Destination"];
			$temp["Date"]=$row["Date"];
			$temp["Departure"]=$row["Departure"];
			$temp["Price"]=$row["Price"];
     		$data[]=$temp;
			
        }
    }
    
?>

<html lang="en">

<head>
    <title>Available Flights</title>
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

    #s1 {
        float: right;
        margin-top: 5px;
    }
    </style>
</head>


<body>

    <body>

        <div class="jumbotron text-center" style="margin-bottom:0">
            <h1>Welcome to</h1>
            <h2>Airline Ticket Reservation System </h2>
            <h4>Available Flights</h4><br><br>
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
                                    <a class="nav-link" href="profile.php">My Profile</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="flights.php">Available Flights</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="purchased.php">Previous Purchase History</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="logout.php">Log Out</a>
                                </li>
                            </ul>
                        </div>

                    </nav>
                    <style>
                    table,
                    th,
                    td {
                        border: 3px solid black;
                    }

                    table.center {
                        margin-left: auto;
                        margin-right: auto;
                    }
                    </style>

                    <input type="text" placeholder="Source or Destination" id="s1" onkeyup="return search()">
                    <form action="submit.php" method="post">

                        <div id="div1">
                            <table id="myTable" class="Center" width="90%">

                                <tr>
                                    <th>Flight ID</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Date</th>
                                    <th>Departure</th>
                                    <th>Price</th>

                                </tr>

                                <?php
          foreach($data as $v){
            ?>
                                <tr>
                                <tr class="Flight_row">
                                    <td align="center"><?php echo $v["Flight ID"];?></span></td>
                                    <td align="center"><?php echo $v["From"];?></span></td>
                                    <td align="center"><?php echo $v["To"];?></span></td>
                                    <td align="center"><?php echo $v["Date"];?></span></td>
                                    <td align="center"><?php echo $v["Departure"];?></span></td>
                                    <td align="center"><?php echo $v["Price"];?></span></td>

                                </tr>

                                <?php
            }
        
        ?>

                            </table>
                        </div>
                </div>



        </div>
        <div class="jumbotron text-center" style="margin-bottom:0">


        </div>
        </div>
        <script>
        function search() {
            var search = document.getElementById("s1").value;

            if (search.length > 0) {
                var xhttp = new XMLHttpRequest();

                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById('div1').innerHTML = this.responseText;
                    }
                };

                xhttp.open("GET", "searchAvailable.php?key=" + search, true);
                xhttp.send();
            }

        }
        </script>
    </body>

</html>