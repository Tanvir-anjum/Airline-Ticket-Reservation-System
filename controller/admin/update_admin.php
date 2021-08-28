<?php
include('../../model/db.php');
$userId = $_SESSION['uname'];
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
    $uploadOk = 1;
    if ($_FILES['fileToUpload']['name'] != '') {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            $target_dir = "../../uploads/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $image_url = basename($_FILES["fileToUpload"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

            echo "File is an image - " . $check["mime"] . ".";
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
            $uploadOk = 1;

        } else {
            echo "File is not an image.";
        }
    }

    $dotPos = strpos($_POST["email"], ".");
    $atPos = strpos($_POST["email"], "@");
    if (strlen($_POST["email"]) == 0 || strlen($_POST["cno"]) == 0) {
        $error = "All fields are mandatory!";
    } else if (strlen($_POST["cno"]) != 11) {
        $error = "Contact number must be 11 character";
    } else if ($atPos > $dotPos) {
        $error = "Invalid Email";
    } else {

        $addUserQuery = $dbobj->UpdateUser($conobj, 'admin_account', $id, $_POST["email"], $_POST["cno"], $nid, $image_url, date("Y-m-d"));

        $dbobj->CloseCon($conobj);

        if ($addUserQuery) {
            header("location: view_admin_profile.php");
        } else {
            $error = "Update failed";
        }
    }
}
?>