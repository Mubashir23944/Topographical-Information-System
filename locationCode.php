<?php
require ('config.php');

extract($_POST);



//Fetch Record Query

if(isset($_POST['readrecord']))
{
	$data='<table class="table table-bordered table-striped">
	<tr>
	<th>Location ID</th>
	<th>Location Name</th>
	<th>Latitute</th>
	<th>Longitude</th>
	<th>Edit Action</th>
	<th>Delete Action</th>
	</tr>';
	$fetch=mysqli_query($con,"select * from tbl_location");

	if (mysqli_num_rows($fetch)>0) {
		$number=1;
	
	while ($rows=mysqli_fetch_array($fetch)) {
	$data.='<tr>
<td>'.$number.'</td>
<td>'.$rows[1].'</td>
<td>'.$rows[2].'</td>
<td>'.$rows[3].'</td>

<td><button onclick="GetLocationDetails('.$rows['loc_id'].')" class="btn btn-warning">Edit</button></td>

<td><button onclick="DeleteLocation('.$rows['loc_id'].')"  class="btn btn-danger">Delete</button></td>
</tr>';
$number++;
	
}
}
$data.='</table>';
echo $data;

}

//Insert Truck Query


if(isset($_POST['locName']) && isset($_POST['lat']) && isset($_POST['lng'])){

			$insertLocation=mysqli_query($con,"insert into tbl_location(loc_name,lat,lng) values ('$locName','$lat','$lng')");

}


//Delete Record Query

if(isset($_POST['deleteid']))
{
	$userid=$_POST['deleteid'];
	$deletequery=mysqli_query($con,"delete from tbl_location where loc_id='$userid'");
}

//Fields filling Query

if (isset($_POST['id']) && isset($_POST['id'])!="") 
{
	
	$user_id=$_POST['id'];
	$query="select * from tbl_location where loc_id='$user_id'";
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
		$lname=$_POST['loc_name'];
		$lat=$_POST['lat'];
		$lng=$_POST['lng'];
		

		$updateLoc=mysqli_query($con,"update tbl_location set loc_name='$lname',lat='$lat',lng='$lng' where loc_id='$hidden_user_id'");

	}


?>