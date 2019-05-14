<?php
require ('config.php');

	$user=$_POST['username'];
	$role=$_POST['role'];
	$image=$_POST['file'];
	$email=$_POST['email'];
	$address=$_POST['address'];
	$nic=$_POST['nic'];
	$phone=$_POST['phone'];
	$pass=$_POST['password'];
	


		$insert=mysqli_query($con,"insert into tbl_registration(emp_name,emp_role,emp_image,emp_email,emp_address,emp_id_number,emp_phone,emp_password) values ('$user','$role','$image','$email','$address','$nic','$phone','$pass')");


if($insert>0)
{
	echo 'Employee Registered';
}
else{
	echo "Operation failed";
}

	






?>