<?php
;
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
			$temp["id"]=$row["id"];
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
    <title>Previous Purchased Tickets</title>
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
            <h4>Previous Purchase History</h4><br><br>
            <ul class="nav justify-content-center">

              <div class="sticky-top">   <nav class="navbar navbar-expand-sm bg-dark navbar-dark">

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
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
table, th, td {
  border: 3px solid black;
}
table.center {
  margin-left: auto;
  margin-right: auto;
}
</style>
<table id="myTable" class="Center" width="60%">
        <tr >
		<th>ID</th>
          <th>Name</th>
          <th>From</th>
          <th>To</th>
          <th>Date</th>

        </tr>

        <?php
          foreach($data as $v){?>
              <tr>
			  
              <tr class="Flight_row">
			  <td align="center"><?php echo $v["id"];?></a</span></td>
              <td align="center"><?php echo $v["uname"];?></a</span></td>
              <td align="center"><?php echo $v["source"];?></span></td>
              <td align="center"><?php echo $v["destination"];?></span></td>
              <td align="center"><?php echo $v["date"];?></span></td>
        <?php
            }
        
        ?>
      </table>
      </div>

      <script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>

            </div>
            <div class="jumbotron text-center" style="margin-bottom:0">
  Quick Search : 

<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search by From" title="Type ID"><br>
	  
</div>
        </div>

</body>

</html>