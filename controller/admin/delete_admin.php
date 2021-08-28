<?php
include('../../model/db.php');
$id = $_GET['id'];

if ($id) {
    $dbobj = new db();
    $conobj = $dbobj->OpenCon();
    $addUserQuery = $dbobj->Deleteuser($conobj, 'admin_account', $id);
    $dbobj->CloseCon($conobj);
    if ($addUserQuery) {
        header("location: ../../view/admin/show_all.php");
    } else {
        $error = "Delete failed";
    }
}
?>