<?php
require ('config.php');
session_start();
if(!isset($_SESSION['username']))
{
  header('location:login.php');
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>TIS-Manage Pickups</title>
	<script src="jquery-3.2.1.min.js"></script>

	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="validu.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</head>
<body>
<div id="container">



<div>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand" href="dashboard.php"><?php echo $_SESSION['username']; ?></a>

   <ul class="navbar-nav">
   
   <li class="nav-item">
      <a class="nav-link" href="view_emp.php">Manage Employees</a>
    </li>
    <li class="nav-item">
<a class="nav-link" href="manage_pickups.php">Manage Pickups</a>
    </li>
    <li class="nav-item">
<a class="nav-link" href="manage_location.php">Manage Locations</a>
    </li>
    <li class="nav-item">
<a class="nav-link" href="manage_trucks.php">Manage Trucks</a>
    </li>
      <li class="nav-item">
<a class="nav-link" href="super_complainList.php">View Complaints</a>
    </li>


  </ul>




  <div class="d-flex justify-content-end">
<a href="logout.php"  class="btn btn-primary" style="color: White;margin-left: 650px">Logout</a>
</div>

</nav>


</div>

<h1 class="text-primary text-uppercase text-center">Manage Pickups</h1>


<div class="d-flex justify-content-end ">
<!-- Button to Open the Modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  Assign Pickups
 
</button>
</div>


<div id="records_contant">
	<table id="tblpickups" class="table table-bordered table-striped">
		
	</table>
</div>


<!--Modal Start-->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Assign Pickups</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        
    <!--Fetch Driver Name Code-->
        <div class="form-group">
        <label>Driver Name</label>
        <select id="driverName" class="form-control">
        <option>Select Driver</option>
        <?php
$drivu=mysqli_query($con,"select * from tbl_registration where emp_role='Driver'");
while($getDriver=mysqli_fetch_array($drivu))
{
  ?>
            <option><?php echo $getDriver['emp_name']; ?></option>

  <?php
}
        ?>
        </select>
        <span id="dselect_error" class="validu"></span>
        </div>

     <!--Fetch Truck Name Code-->

        <div class="form-group">
        <label>Truck Name</label>
<select id="truckName" class="form-control">
        <option>Select Truck</option>
        <?php
$truck=mysqli_query($con,"select * from tbl_truck where truck_status='Available'");
while($getTruck=mysqli_fetch_array($truck))
{
  ?>
            <option><?php echo $getTruck['truck_name']; ?></option>


  <?php
}

        ?>

        </select>  
        <span id="tselect_error" class="validu"></span>
         </div>
    <!--Fetch Location Name Code-->
        <div class="form-group">
        <label>Location Name</label>
        <select id="locName" class="form-control">
        <option>Select Location</option>
        <?php
$loc=mysqli_query($con,"select * from tbl_location");
while($getLoc=mysqli_fetch_array($loc))
{
  ?>
            <option><?php echo $getLoc['loc_name']; ?></option>


  <?php
}

        ?>

        </select> 
        <span id="lselect_error" class="validu"></span>
        </div>           

        <div class="form-group">
        <label>Pickup Date</label>
        <input type="datetime-local" name="pickupDate" id="pickupDate" class="form-control" />
        <span id="date_error" class="validu"></span>
        </div>

        <div class="form-group">
        <label>Pickup Status</label>
        <select name="pickupStatus" id="pickupStatus" class="form-control">
          <option>Select Status</option>
          <option>Completed</option>
          <option>Not-Completed</option>
        </select>
        <span id="pselect_error" class="validu"></span>
        </div>

      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" onclick="addPickup()" class="btn btn-success">Register User</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

      </div>

    </div>
  </div>
</div>



<!--Update Modal-->
<div class="modal" id="update_user_modal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Update Location Details</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        
        <div class="form-group">
        <label>Employee Name</label>
        <select id="update_emp" name="update_emp" class="from-control">
        <?php
        $updater=mysqli_query($con,"select emp_name from tbl_registration where emp_role='Driver'");
        while ($gattu=mysqli_fetch_array($updater)) 
        {
        ?>
        <option><?php echo $gattu['emp_name'] ; ?></option>



        <?php
        }
        ?>
        	
        </select>
        </div>

      <div class="form-group">
        <label>Truck Name</label>
        <select id="update_truck" name="update_truck" class="from-control">
        <?php
        $trucku=mysqli_query($con,"select truck_id,truck_name from tbl_truck");
        while ($tukku=mysqli_fetch_array($trucku)) 
        {
        ?>
        <option><?php echo $tukku['truck_name'] ; ?></option>



        <?php
        }
        ?>
        	
        </select>
        </div>


        <div class="form-group">
        <label>Location Name</label>
        <select id="upadte_location" class="form-control">
        <option>Select Location</option>
        <?php
$loc=mysqli_query($con,"select * from tbl_location");
while($getLoc=mysqli_fetch_array($loc))
{
	?>
	        	<option><?php echo $getLoc['loc_name']; ?></option>


	<?php
}

        ?>

        </select> 
        </div>

        <div class="form-group">
        <label>Latitute of Location</label>
        <input type="text" name="update_lat" id="update_lat" class="form-control" />
        </div>

        <div class="form-group">
        <label>Longitude of Location</label>
        <input type="text" name="update_lng" id="update_lng" class="form-control" />
        </div>

        <div class="form-group">
        <label>Pickup Date</label>
        <input type="datetime-local" name="update_date" id="update_date" class="form-control" />
        </div>

      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" onclick="updatePickupDetail()" class="btn btn-success" data-dismiss="modal">Update</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <input type="hidden" id="hidden_user_id" name="hidden_user_id" />

      </div>

      

    </div>
  </div>
</div>

</div>

<script type="text/javascript">

$(document).ready(function()
{
	readRecords();
 

});



//Fetch Records
function readRecords()
{
	var readrecord="readrecord";
	$.ajax({
		url:"pickupCode.php",
		type:"post",
		data:{readrecord:readrecord},
		success:function(data,status)
		{
			$('#tblpickups').html(data);

		}
	});
}



	//Add Record function
function addPickup()
{
	var driverName=$('#driverName').val();
	var truckName=$('#truckName').val();
	var locName=$('#locName').val();
	var pickupDate=$('#pickupDate').val();
	var pickupStatus=$('#pickupStatus').val();

   if(driverName == "Select Driver")
  {
    document.getElementById('dselect_error').innerHTML="Please select a driver!";
    return false;

  }
  if(truckName == "Select Truck")
  {
    document.getElementById('tselect_error').innerHTML="Please select a truck!";
    return false;

  }
  if(locName == "Select Location")
  {
    document.getElementById('lselect_error').innerHTML="Please select a location!";
    return false;
  }
  if(pickupDate == "")
  {
    document.getElementById('date_error').innerHTML="Please select a date!";
    return false;

  }
  if(pickupStatus == "Select Status")
  {
    document.getElementById('pselect_error').innerHTML="Please select a status";
    return false;
  }

  else
  {
    $.ajax({
    url:"pickupCode.php",
    type:"post",
    data:{driverName:driverName,truckName:truckName,locName:locName,pickupDate:pickupDate,pickupStatus:pickupStatus},
    success:function(data,status)
    {  
      readRecords();

    }
  });
  }



	
}

//Delete function
function DeletePickup(deleteid)
{
	var conf= confirm("Are you sure?");
	if(conf==true)
	{
		$.ajax({
			url:"pickupCode.php",
			type:"post",
			data:{deleteid:deleteid},
			success:function(data,status)
			{
				readRecords();
			}
		});
	}
}



//Get Truck Data
function GetTruckDetails(id)
{
	$('#hidden_user_id').val(id);
	$.post("pickupCode.php",{id:id},function(data,status){
		var user=JSON.parse(data);
		$('#update_emp').val(user.emp_name);
		$('#update_truck').val(user.truck_name);
		$('#upadte_location').val(user.loc_name);
		$('#update_lat').val(user.lat);
		$('#update_lng').val(user.lng);
		$('#update_date').val(user.pickup_date);
 //alert(user.lat);

	}


		);
	$('#update_user_modal').modal("show");
}


//Update Truck Details

function updatePickupDetail()
{
	var empName=$('#update_emp').val();
	var truckName=$('#update_truck').val();
	var locationName=$('#upadte_location').val();
	var lattu=$('#lat').val();
	var lngu=$('#lng').val();
	var datu=$('#update_date').val();


 // alert(lattu);

 //  truckName=document.getElementById("truckName").value;
 //   alert(truckName);


	var hidden_user_id=$('#hidden_user_id').val();



	$.post("pickupCode.php",{hidden_user_id:hidden_user_id,empName:empName,truckName:truckName,locationName:locationName,lattu:lattu,lngu:lngu,datu:datu},
		function(data,status)
		{
			$('#update_user_modal').modal("hide");
			readRecords();
		}
		);
}

</script>

</body>
</html>