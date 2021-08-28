<?php
$cred=array();
$sql="SELECT * FROM `reserved` WHERE 1";
	$conn = mysqli_connect("localhost", "root", "","cred");
	$result = mysqli_query($conn, $sql)or die(mysqli_error($conn));
	$c=mysqli_affected_rows($conn);
$flag=0;
$result = $conn->query($sql);
session_start();
if(isset($_SESSION["valid"]) && $_SESSION["valid"]=="yes"){
		$uname = $_SESSION['uname']; 
		$data=array();
		
		
		$conn = mysqli_connect("localhost", "root", "","cred");
		$sql="select * from `purchased` WHERE `uname` = '$uname'";

		$result = mysqli_query($conn, $sql)or die(mysqli_error($conn));
		while($row = mysqli_fetch_assoc($result)) {

            $temp["uname"]=$row["uname"];
            $temp["source"]=$row["source"];
            $temp["destination"]=$row["destination"];
            $temp["date"]=$row["date"];
     		$data[]=$temp;
			
        }
    }
    
?>

<html lang="en">

<head>
    <title>Purchase Tickets</title>
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

<script>
function calculate() {
    num1 = document.getElementById("lquantity").value;
    num2 = document.getElementById("rquantity").value;
    num3 = document.getElementById("bquantity").value;
    document.getElementById("result").innerHTML = num1 * 2500 + num2 * 3500 + num3 * 4500;
}
</script>

<body>

    <body>

        <div class="jumbotron text-center" style="margin-bottom:0">
            <h1>Welcome to</h1>
            <h2>Airline Ticket Reservation System </h2>
            <h4>Purchase</h4><br><br>
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
                                    <a class="nav-link" href="profile.php">My Profile</a>
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

                    <form action="submit.php" method="post">
                        <table align="center" border="1">
                            <th>From</th>
                            <th>To</th>
                            <th>Price</th>
                            <th>QTY</th>
                            <tr>
                                <td>CTG</td>
                                <td>DHAKA</td>
                                <td>2500</td>
                                <td>
                                    <label for="quantity">No of tickets:</label>
                                    <input type="number" id="lquantity" name="quantity" min="1" max="5">
                                </td>
                            </tr>

                            <tr>
                                <td>DHAKA</td>
                                <td>CTG</td>
                                <td>3500</td>
                                <td>
                                    <label for="quantity">No of tickets:</label>
                                    <input type="number" id="rquantity" name="quantity" min="1" max="5">
                                </td>
                            </tr>

                            <tr>
                                <td>COX</td>
                                <td>DHAKA</td>
                                <td>4500</td>
                                <td>
                                    <label for="quantity">No of tickets:</label>
                                    <input type="number" id="bquantity" name="quantity" min="1" max="5">
                                </td>

                            </tr>
                            </tr>

                            <tr align="right">
                                <td colspan="2"><input type="button" onClick="calculate()" Value="calculate" />

                                    <p>Total amount : <br>
                                        <span id="result"></span>
                                    </p>
                                    <p>From : <br>
                                        <input type="Text" id="source" name="source">
                                    <p>To : <br>
                                        <input type="Text" id="destination" name="destination">
                                    <p>Total amount : <br>
                                        <input type="Text" id="amount" name="amount">


                                </td>


                                <td colspan="2">

                                    <input type="submit" name="order" value="Purchase">
                                </td>


                            </tr>

                        </table>
                        </table>
                </div>

        </div>
        <div class="jumbotron text-center" style="margin-bottom:0">

        </div>

    </body>

</html>