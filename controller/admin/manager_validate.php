<?php
$dotPos=strpos($_REQUEST["email"],".");
$atPos=strpos($_REQUEST["email"],"@");
if(strlen($_REQUEST["uname"])==0 || strlen($_REQUEST["pass"])==0 || strlen($_REQUEST["email"])==0){
	echo "All fields are mandatory!";
}
else if($_REQUEST["pass"]!=$_REQUEST["confpass"]){
	echo "Passwords must match";
}
else if($atPos>$dotPos){
	echo "Invalid Email";
}
else{
    $formdata = array(
        'name'=> $_REQUEST["uname"],
        'password'=> $_REQUEST["pass"],
        'email'=>$_REQUEST["email"],
        'type'=> 'Airport Manager'
    );

    $existingdata = file_get_contents('../controller/cred.json');
    $tempJSONdata = json_decode($existingdata);
    $tempJSONdata[] =$formdata;
//Convert updated array to JSON
    $jsondata = json_encode($tempJSONdata, JSON_PRETTY_PRINT);

//write json data into file
    if(file_put_contents("../controller/cred.json", $jsondata)) {
//        echo "Data successfully saved <br>";
    } else {
        echo "Data store fail.";
    }
}
echo "<br/>";
echo "Success";
header( "refresh:2;url=../view/index.php" );
?>