<?php
require ('config.php');

extract($_POST);




//Fetch Record Query

if(isset($_POST['readrecord']))
{
	$data='<table class="table table-bordered table-striped">
	<tr>
		<th>Pickup ID</th>
	<th>Employee Name</th>
	<th>Truck Name</th>
	<th>Location Name</th>
	<th>Pickup Date</th>
	<th>Pickup Status</th>
	<th>Edit Action</th>
	<th>Delete Action</th>
	</tr>';
	$fetch=mysqli_query($con,"select p.pickup_id, r.emp_name, t.truck_name,l.loc_name,p.lat,p.lng,p.pickup_date,p.pickup_status  from tbl_pickup p 
inner join tbl_registration  r on r.emp_id = p.emp_id
inner join tbl_truck  t on t.truck_id = p.truck_id
inner join tbl_location l   on l.loc_id = p.loc_id
");

	if (mysqli_num_rows($fetch)>0) {
		$number=1;
	

	while ($rows=mysqli_fetch_array($fetch)) {
	$data.='<tr>
<td>'.$number.'</td>
<td>'.$rows[1].'</td>
<td>'.$rows[2].'</td>
<td>'.$rows[3].'</td>
<td>'.$rows[6].'</td>
<td>'.$rows[7].'</td>
<td><button onclick="GetTruckDetails('.$rows['pickup_id'].')" class="btn btn-warning">Edit</button></td>

<td><button onclick="DeletePickup('.$rows['pickup_id'].')"  class="btn btn-danger">Delete</button></td>
</tr>';
$number++;
	
}
}
$data.='</table>';
echo $data;

}







//InsertRecord Query

if(isset($_POST['driverName']) && isset($_POST['truckName']) && isset($_POST['locName']) && isset($_POST['pickupDate']) && isset($_POST['pickupStatus']))

	
		$insertPickup=mysqli_query($con,"insert into tbl_pickup(emp_id,truck_id,loc_id,lat,lng,pickup_date,pickup_status) values ((select emp_id from tbl_registration where emp_name='$driverName'),(select truck_id from tbl_truck where truck_name='$truckName'),(select loc_id from tbl_location where loc_name='$locName'),(select lat from tbl_location where loc_name='$locName'),(select lng from tbl_location where loc_name='$locName'),'$pickupDate','$pickupStatus')");




//Delete Record Query

if(isset($_POST['deleteid']))
{
	$userid=$_POST['deleteid'];
	$deletequery=mysqli_query($con,"delete from tbl_pickup where pickup_id='$userid'");
}


//Filling fields query

if (isset($_POST['id']) && isset($_POST['id'])!="") 
{
	
	$pick_id=$_POST['id'];
	$query="select r.emp_name, t.truck_name,l.loc_name,p.lat,p.lng,p.pickup_date,p.pickup_status  from tbl_pickup p 
inner join tbl_registration  r on r.emp_id = p.emp_id
inner join tbl_truck  t on t.truck_id = p.truck_id
inner join tbl_location l   on l.loc_id = p.loc_id where p.pickup_id='$pick_id'";
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
		$empName=$_POST['empName'];
		$upLocName=$_POST['locationName'];
		$updatetruck=$_POST['truckName'];
		$updatelat=$_POST['lattu'];
		$updatelng=$_POST['lngu'];
		$updatedate=$_POST['datu'];
		

	//	$updu=mysqli_query($con,"update tbl_pickup set emp_id='$tname',truck_number='$tnumber',truck_status='$tstatus' where truck_id='$hidden_user_id'");


		$updu=mysqli_query($con,"update tbl_pickup set emp_id=(SELECT emp_id from tbl_registration where emp_name='$empName'),truck_id=(SELECT truck_id from tbl_truck where truck_name='$updatetruck'),loc_id=(SELECT loc_id from tbl_location where loc_name='$upLocName'),pickup_date='$updatedate' where pickup_id='$hidden_user_id'");

	}



?>



