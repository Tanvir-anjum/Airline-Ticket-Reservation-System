<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
$uname =  $_REQUEST['uname']; // example
$conn = mysqli_connect("localhost", "root", "","cred");
$sql= "select * from customer where uname='".$_REQUEST["uname"]."' and password='".$_REQUEST["pass"]."' and type='customer'";
$result = mysqli_query($conn, $sql)or die(mysqli_error($conn));

$flag=0;
session_start();
$count = mysqli_num_rows($result);
    if($count == 1) {
       $_SESSION["valid"]="yes";
       $_SESSION["uname"]= $uname;
       setcookie('user', $uname, time()+36000 , '/');
       $flag=1;
       }

    if($flag==0){
	    echo "<p style='color:red'> Wrong credentials</p>";
    }
    if($flag==1){
       header("Location:../../../view/Customer/customerhomepage.html");
    }
}
?>


<form action="loginCustomer.php" method="post" onsubmit="return validate">
    <html lang="en">

    <head>
        <title>Customer Login</title>
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
                <p>Customer</p>

                <ul class="nav justify-content-center">

                    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">

                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#collapsibleNavbar">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="collapsibleNavbar">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="../../../home.html">Home Page</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link"
                                        href="../../../controller/Customer/signupcontroller/signupCustomer.php">Sign
                                        Up</a>
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
                                    <td> User Name : </td>
                                    <td> <input type="text" name="uname" id="uname"></td>
                                    <td class="error" id="unameError"></td>
                                </tr>
                                <tr>
                                    <td> Password : </td>
                                    <td> <input type="password" name="pass" id="pass"></td>
                                    <td class="error" id="passError"></td>
                                </tr>
                                <td> <input type="submit" name="sbt" value="submit" /></td>
                            </table>

                        </form>
                    </div>


                </div>
                <script>
                function validate() {
                    var varname = document.getElementById('uname').value;
                    var varpass = document.getElementById('pass').value;

                    var nameError = document.getElementById('unameError');
                    var passError = document.getElementById('passError');

                    if (varname.trim() == "") {
                        nameError.innerHTML = "Username field is empty";
                        return false;
                    }
                    if (varpass.trim() == "") {
                        passError.innerHTML = "Password field is empty";
                        nameError.innerHTML = "";
                        return false;
                    } else {
                        return true;
                    }
                }
                </script>
        </body>