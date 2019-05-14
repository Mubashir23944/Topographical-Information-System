<?php
include 'config.php';

$id=$_POST['delete_id'];
$delete=mysqli_query($con,"delete from tbl_registration where emp_id='$id'");
?>