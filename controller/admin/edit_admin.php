<?php
include('../../model/db.php');
$userId = $_GET['id'];
echo $userId;
$error = "";

$dbobj = new db();
$conobj = $dbobj->OpenCon();

$id = "";
$name = "";
$dob = "";
$nid = "";
$email = "";
$contact = "";
$password = "";
$qualification = "";
$experience = "";
$image_url = "";

if (isset($userId)) {
    $userInfo = $dbobj->GetUser($conobj, 'admin_account', $userId);

    $id = $userInfo['id'];
    $name = $userInfo['name'];
    $dob = $userInfo['dob'];
    $nid = $userInfo['nid'];
    $email = $userInfo['email'];
    $contact = $userInfo['contact'];
    $password = $userInfo['password'];
    $qualification = $userInfo['qualification'];
    $experience = $userInfo['experience'];
    $image_url = $userInfo['image_url'];
}

if (isset($_POST['submit'])) {

    $dotPos = strpos($_POST["email"], ".");
    $atPos = strpos($_POST["email"], "@");
    if (strlen($_POST["email"]) == 0 || strlen($_POST["cno"]) == 0  || strlen($_POST["nid"])==0 ) {
        $error = "All fields are mandatory!";
    } else if (strlen($_POST["cno"]) != 11) {
        $error = "Contact number must be 11 character";
    } else if(strlen($_POST["nid"]) != 10){
        $error = "NID number must be 10 character";
    } else if ($atPos > $dotPos) {
        $error = "Invalid Email";
    } else {

        $addUserQuery = $dbobj->UpdateUser($conobj, 'admin_account', $id, $_POST["email"], $_POST["cno"],
            $_POST["nid"], $image_url, date("Y-m-d"));

        $dbobj->CloseCon($conobj);

        if ($addUserQuery) {
            header("location: show_all.php");
        } else {
            $error = "Update failed";
        }
    }
}
?>