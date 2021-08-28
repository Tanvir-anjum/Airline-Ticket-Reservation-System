<?php
include('../../model/db.php');
$id = $_GET['id'];
if ($id) {
    $dbobj = new db();
    $conobj = $dbobj->OpenCon();
    $addUserQuery = $dbobj->DeleteFlight($conobj, 'flight', $id);
    $dbobj->CloseCon($conobj);
    var_dump($addUserQuery);
    if ($addUserQuery) {
        header("location: ../../view/admin/show_allflights.php");
    } else {
        echo "Delete failed";
    }
}
?>