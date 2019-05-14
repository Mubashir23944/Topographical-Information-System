<?php
require ('config.php');

extract($_POST);



//Fetch Record Query

if(isset($_POST['readrecord']))
{
	$data='<table class="table table-bordered table-striped">
	<tr>
	<th>Truck ID</th>
	<th>Truck Name</th>
	<th>Truck Number</th>
	<th>Truck Status</th>
	<th>Edit Action</th>
	<th>Delete Action</th>
	</tr>';
	$fetch=mysqli_query($con,"select * from tbl_truck");

	if (mysqli_num_rows($fetch)>0) {
		$number=1;
	
	while ($rows=mysqli_fetch_array($fetch)) {
	$data.='<tr>
<td>'.$number.'</td>
<td>'.$rows[1].'</td>
<td>'.$rows[2].'</td>
<td>'.$rows[3].'</td>

<td><button onclick="GetTruckDetails('.$rows['truck_id'].')" class="btn btn-warning">Edit</button></td>

<td><button onclick="DeleteTruck('.$rows['truck_id'].')"  class="btn btn-danger">Delete</button></td>
</tr>';
$number++;
	
}
}
$data.='</table>';
echo $data;

}



//Insert Truck Query


if(isset($_POST['truckName']) && isset($_POST['truckNumber']) && isset($_POST['truckStatus'])){

			$insertTruck=mysqli_query($con,"insert into tbl_truck(truck_name,truck_number,truck_status) values ('$truckName','$truckNumber','$truckStatus')");

}

//Delete Record Query

if(isset($_POST['deleteid']))
{
	$userid=$_POST['deleteid'];
	$deletequery=mysqli_query($con,"delete from tbl_truck where truck_id='$userid'");
}

//Fields filling Query

if (isset($_POST['id']) && isset($_POST['id'])!="") 
{
	
	$user_id=$_POST['id'];
	$query="select * from tbl_truck where truck_id='$user_id'";
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
		$tname=$_POST['truck_name'];
		$tnumber=$_POST['truck_number'];
		$tstatus=$_POST['truck_status'];
		

		$updu=mysqli_query($con,"update tbl_truck set truck_name='$tname',truck_number='$tnumber',truck_status='$tstatus' where truck_id='$hidden_user_id'");

	}


	
?>