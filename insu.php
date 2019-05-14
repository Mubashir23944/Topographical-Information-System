<?php
require ('config.php');

extract($_POST);


//Fetch Record Query

if(isset($_POST['readrecord']))
{
	$data='<table class="table table-bordered table-striped">
	<tr>
	<th>Employee ID</th>
	<th>Name</th>
	<th>Role</th>
	<th>Photo</th>
	<th>Email</th>
	<th>Current Address</th>
	<th>Id Card Number</th>
	<th>Phone Number</th>
	<th>Password</th>
	<th>Edit Action</th>
	<th>Delete Action</th>
	</tr>';
	$fetch=mysqli_query($con,"select * from tbl_registration");

	if (mysqli_num_rows($fetch)>0) {
		$number=1;
	
	while ($rows=mysqli_fetch_array($fetch)) {
	$data.='<tr>
<td>'.$number.'</td>
<td>'.$rows[1].'</td>
<td>'.$rows[2].'</td>
<td>'.$rows[3].'</td>
<td>'.$rows[4].'</td>
<td>'.$rows[5].'</td>
<td>'.$rows[6].'</td>
<td>'.$rows[7].'</td>
<td>'.$rows[8].'</td>
<td><button onclick="GetUserDetails('.$rows['emp_id'].')" class="btn btn-warning">Edit</button></td>

<td><button onclick="DeleteUser('.$rows['emp_id'].')"  class="btn btn-danger">Delete</button></td>
</tr>';
$number++;
	
}
}
$data.='</table>';
echo $data;

}




//Search Code

if(@$_POST['serch'])
{
$searcha=@$_POST['serch'];
$search_query=mysqli_query($con,"select * from tbl_registration where emp_name like '$searcha'");
if(mysqli_num_rows($search_query)>0){
	$data='<table class="table table-bordered table-striped">
	<tr>
	<th>Employee ID</th>
	<th>Name</th>
	<th>Role</th>
	<th>Photo</th>
	<th>Email</th>
	<th>Current Address</th>
	<th>Id Card Number</th>
	<th>Phone Number</th>
	<th>Password</th>
	<th>Edit Action</th>
	<th>Delete Action</th>
	</tr>';
	while ($rows=mysqli_fetch_array($search_query)) {
			$data.='<tr>
<td>'.$rows[0].'</td>
<td>'.$rows[1].'</td>
<td>'.$rows[2].'</td>
<td>'.$rows[3].'</td>
<td>'.$rows[4].'</td>
<td>'.$rows[5].'</td>
<td>'.$rows[6].'</td>
<td>'.$rows[7].'</td>
<td>'.$rows[8].'</td>
<td><button onclick="GetUserDetails('.$rows['emp_id'].')" class="btn btn-warning">Edit</button></td>

<td><button onclick="DeleteUser('.$rows['emp_id'].')"  class="btn btn-danger">Delete</button></td>
</tr>';
	}
}
$data.='</table>';
echo $data;
}

//InsertRecord Query

if(isset($_POST['name']) && isset($_POST['role']) && isset($_POST['dp']) && isset($_POST['email']) && isset($_POST['address']) && isset($_POST['nic']) && isset($_POST['phone']) && isset($_POST['pass']))

	
		$insert=mysqli_query($con,"insert into tbl_registration(emp_name,emp_role,emp_image,emp_email,emp_address,emp_id_number,emp_phone,emp_password) values ('$name','$role','$dp','$email','$address','$nic','$phone','$pass')");



	//InsertRecord Query Public

if(isset($_POST['user']) && isset($_POST['email']) && isset($_POST['role']) && isset($_POST['pass']))

	
		$insert=mysqli_query($con,"insert into tbl_registration(emp_name,emp_email,emp_role,emp_password) values ('$user','$email','$role','$pass')");





//Delete Record Query

if(isset($_POST['deleteid']))
{
	$userid=$_POST['deleteid'];
	$deletequery=mysqli_query($con,"delete from tbl_registration where emp_id='$userid'");
}


//Filling Fields Query

if (isset($_POST['id']) && isset($_POST['id'])!="") 
{
	
	$user_id=$_POST['id'];
	$query="select * from tbl_registration where emp_id='$user_id'";
	if(!$result=mysqli_query($con,$query)){
		exit(mysqli_error());
	}
	$response=array();
	if (mysqli_num_rows($result)>0) {
		while ($row=mysqli_fetch_assoc($result)) {
			$response=$row;
		}
	}
	else{
		$response['status']=200;
		$response['message']='Data not found!';
	}
	echo json_encode($response);
}
else{
		$response['status']=200;
		$response['message']='Invalid Request!';
	}




//Update Record
	if(isset($_POST['hidden_user_id']))
	{
		$hidden_user_id=$_POST['hidden_user_id'];
		$uname=$_POST['emp_name'];
		$urole=$_POST['emp_role'];
		$uimg=$_POST['emp_image'];
		$uemail=$_POST['emp_email'];
		$uaddress=$_POST['emp_address'];
		$unic=$_POST['emp_id_number'];
		$uphone=$_POST['emp_phone'];
		$upass=$_POST['emp_password'];


		$updu=mysqli_query($con,"update tbl_registration set emp_name='$uname',emp_role='$urole',emp_image='$uimg',emp_email='$uemail',emp_address='$uaddress',emp_id_number='$unic',emp_phone='$uphone',emp_password='$upass' where emp_id='$hidden_user_id'");

	}












?>