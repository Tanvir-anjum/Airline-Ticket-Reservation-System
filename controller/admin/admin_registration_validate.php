<?php
include('../../model/db.php');

$error = "";

$dotPos = strpos($_POST["email"], ".");
$atPos = strpos($_POST["email"], "@");
if (strlen($_POST["uname"]) == 0 || strlen($_POST["pass"]) == 0 || strlen($_POST["email"]) == 0
    || strlen($_POST["dob"]) == 0 || strlen($_POST["nid"]) == 0 || strlen($_POST["cno"]) == 0
    || strlen($_POST["type"]) == 0 || strlen($_POST["exp"]) == 0) {
    $error = "All fields are mandatory!";
} else if (strlen($_POST["uname"]) < 1 || strlen($_POST["uname"]) > 6) {
    $error = "User name length must be between 1~6 character";
} else if (strlen($_POST["cno"]) != 11) {
    $error = "Contact number must be 11 character";
} else if (strlen($_POST["nid"]) != 10) {
    $error = "NID number must be 10 character";
} else if ($_POST["pass"] != $_POST["confpass"]) {
    $error = "Passwords must match";
} else if ($atPos > $dotPos) {
    $error = "Invalid Email";
} else {
    $dbobj = new db();
    $conobj = $dbobj->OpenCon();

    $addUserQuery = $dbobj->AddUser($conobj, 'admin_account', $_POST["uname"], $_POST["dob"],
        $_POST["nid"], $_POST["email"], $_POST["cno"], $_POST["pass"],
        $_POST["type"], $_POST["exp"], '/123.jpg', date("Y-m-d"));

    $dbobj->CloseCon($conobj);

    if ($addUserQuery) {
        //header("location: ../../view/admin/adminhome.php");
        echo "Success";
    } else {
        $error = "Admin adding failed";
    }
}
echo $error;
?>