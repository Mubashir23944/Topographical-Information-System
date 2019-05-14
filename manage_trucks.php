<?php
session_start();
if(!isset($_SESSION['username']))
{
  header('location:login.php');
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>TIS-Manage Trucks</title>
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

<h1 class="text-primary text-uppercase text-center">Manage Trucks</h1>
<div class="d-flex justify-content-end ">
<!-- Button to Open the Modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  Register New Truck
</button>
</div>

<div id="records_contant">
	<table id="tblTruck" class="table table-bordered table-striped">
		
	</table>
</div>

<!--Modal Start-->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Register New Employees</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">


        <div class="form-group">
        <label>Truck Name</label>
        <input type="text" onchange="return valu()" name="truckName" id="truckName" class="form-control" />
        <span id="tname_error" class="validu">
        	
        </span>
        </div>

        <div class="form-group">
        <label>Truck Registration Number</label>
        <input type="text" name="truckNumber" id="truckNumber" class="form-control" />
        <span id="tnumber_error" class="validu"></span>
        </div>

        <div class="form-group">
        <label>Truck Availability Status</label>
        <select id="truckStatus" name="truckStatus">
            <option>Select Status</option>
        	<option>Available</option>
        	<option>Not Available</option>
        </select>
        <span id="tstatus_error" class="validu"></span>
        </div>

        </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" onclick="addTruck()" class="btn btn-success">Register Truck</button>
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
        <h4 class="modal-title">Update Employees Details</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        
        <div class="form-group">
        <label>Truck ID</label>
        <input type="text" readonly name="update_truckId" id="update_truckId" class="form-control" />
        </div>

        <div class="form-group">
        <label>Truck Name</label>
        <input type="text" name="update_truckName" id="update_truckName" class="form-control" />
        </div>

        <div class="form-group">
        <label>Truck Number</label>
        <input type="text" name="update_truckNumber" id="update_truckNumber" class="form-control" />
        </div>

         <div class="form-group">
        <label>Truck Availability Status</label>
        <select id="update_truckStatus" name="update_truckStatus">
        	<option>Available</option>
        	<option>Not Available</option>
        </select>
        </div>

      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" onclick="updateTruckDetail()" class="btn btn-success" data-dismiss="modal">Update</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <input type="hidden" id="hidden_user_id" name="hidden_user_id" />

      </div>

      

    </div>
  </div>
</div>

</div>

	

<script type="text/javascript">


//try
function valu()
{
	
	
}


$(document).ready(function()
{
	readRecords();

});

//Fetch Records
function readRecords()
{
	var readrecord="readrecord";
	$.ajax({
		url:"truckCode.php",
		type:"post",
		data:{readrecord:readrecord},
		success:function(data,status)
		{
			$('#tblTruck').html(data);

		}
	});
}

//Add Truck Code
function addTruck()
{
	var correct_name=/^[A-Za-z0-9\s]+$/;
	var correct_number=/^[A-Z]{3}[ -][0-9]{3}$/;
	var truckName=$('#truckName').val();
	var truckNumber=$('#truckNumber').val();
	var truckStatus=$('#truckStatus').val();

	if(truckName == "")
	{
		document.getElementById('tname_error').innerHTML="Truck name is required";
		return false;

	}
	if(truckName.length<3)
	{
		document.getElementById('tname_error').innerHTML="Truck Name is too short!";
		return false;

	}
	if(truckName.length>20)
	{
		document.getElementById('tname_error').innerHTML="Truck Name is to long!";
		return false;

	}
	if (truckName!="") 
	{
		if (truckName.match(correct_name)) {
			true;
		}
		else
		{
			document.getElementById('tname_error').innerHTML="Incorrect Truck Name!";
		return false;
		}
	}
	if(truckNumber == "")
	{
		document.getElementById('tnumber_error').innerHTML="Truck number is required";
		return false;
	}
	if (truckNumber!="") 
	{
		if (truckNumber.match(correct_number)) {
			true;
		}
		else
		{
			document.getElementById('tnumber_error').innerHTML="Incorrect truck number!";
		return false;
		}
	}
	if(truckStatus == "Select Status")
	{
		document.getElementById('tstatus_error').innerHTML="Truck status is required";
		return false;
	}
	


	else
	{
		$.ajax({
		url:"truckCode.php",
		type:"post",
		data:{truckName:truckName,truckNumber:truckNumber,truckStatus:truckStatus},
		success:function(data,status)
		{  
			readRecords();
			 $('#myModal').modal("hide");
		}
	});

	}

	
}

//Delete Truck Code
function DeleteTruck(deleteid)
{
	var conf= confirm("Are you sure?");
	if(conf==true)
	{
		$.ajax({
			url:"truckCode.php",
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
	$.post("truckCode.php",{id:id},function(data,status){
		var user=JSON.parse(data);
		$('#update_truckId').val(user.truck_id);
		$('#update_truckName').val(user.truck_name);
		$('#update_truckNumber').val(user.truck_number);
		$('#update_truckStatus').val(user.truck_status);
		
	}


		);
	$('#update_user_modal').modal("show");
}

//Update Truck Details

function updateTruckDetail()
{
	var truck_name=$('#update_truckName').val();
	var truck_number=$('#update_truckNumber').val();
	var truck_status=$('#update_truckStatus').val();
	

	var hidden_user_id=$('#hidden_user_id').val();

	$.post("truckCode.php",{hidden_user_id:hidden_user_id,truck_name:truck_name,truck_number:truck_number,truck_status:truck_status},
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