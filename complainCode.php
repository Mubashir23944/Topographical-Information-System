<?php
require ('config.php');

extract($_POST);


	//Complaint Query Public

if(isset($_POST['user']) && isset($_POST['email']) && isset($_POST['comp']))

	
		$insert=mysqli_query($con,"insert into tbl_complain(c_name,c_email,c_complain) values ('$user','$email','$comp')");



?>