<?php
session_start();
require ('config.php');
if(isset($_POST['username']) && isset($_POST['password']))
{
	$user=$_POST['username'];
	$pass=$_POST['password'];
	
	$log=mysqli_query($con,"select * from tbl_registration where emp_name='$user' and emp_password='$pass'") or die("failure to query database".mysqli_error());
	$row=mysqli_num_rows($log);
	if($row>0)
	{
		$data=mysqli_fetch_array($log);
		$_SESSION['username']=$data['emp_name'];
		$_SESSION['role']=$data['emp_role'];
		$_SESSION['id']=$data['emp_id'];
		if($data['emp_role']=="super_ad")
		{
		//header("location:dashboard.php");

			echo $data['emp_role'];
		}
		if($data['emp_role']=="admin")
			{
			//header("location:admin_dashboard.php");

				echo $data['emp_role'];
		}
		if($data['emp_role']=="driver")
			{
			//header("location:driver_view.php");

				echo $data['emp_role'];
		}
		if ($data['emp_role']=="") {
			
		}
		
		
	}
	
	
}

?>