<?php
include('../../model/db.php');

$error = "";

if (strlen($_REQUEST["from"]) == 0
    || strlen($_REQUEST["to"]) == 0
    || strlen($_REQUEST["time"]) == 0
    || strlen($_REQUEST["date"]) == 0
    || strlen($_REQUEST["price"]) == 0) {
    $error = "All fields are mandatory!";
} else {
    $dbobj = new db();
    $conobj = $dbobj->OpenCon();

    $addFlightQuery = $dbobj->AddFlight($conobj, 'flight', $_POST["from"],
        $_POST["to"], $_POST["time"], $_POST["date"], $_POST["price"]);

    $dbobj->CloseCon($conobj);
    if ($addFlightQuery) {
//        header("location: adminhome.php");
        echo "Success";
    } else {
        $error = "Flight adding failed";
    }
}
?>
