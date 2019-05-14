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
	<title>TIS-Manage Location</title>
	<script src="jquery-3.2.1.min.js"></script>

	<meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="validu.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
<a href="logout.php"  class="btn btn-primary" style="color: White;margin-left: 550px">Logout</a>
</div>

</nav>


</div>

<h1 class="text-primary text-uppercase text-center">Manage Locations</h1>
<div class="d-flex justify-content-end ">
<!-- Button to Open the Modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  Add New Location
</button>
</div>

<div id="records_contant">
	<table id="tblLocation" class="table table-bordered table-striped">
		
	</table>
</div>

<!--Modal Start-->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Register New Locations</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        

        <div class="form-group">
        <label>Location Name</label>
        <input type="text" name="locName" id="locName" class="form-control" />
        <span id="lname_error" class="validu">
        </div>

        <div class="form-group">
        <label>Latitite of Location</label>
        <input type="text" name="lat" id="lat" class="form-control" />
        <span id="lat_error" class="validu">
        </div>

       <div class="form-group">
        <label>Longitude of Location</label>
        <input type="text" name="lng" id="lng" class="form-control" />
        <span id="lng_error" class="validu">
        </div>

        </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" onclick="addLocation()" class="btn btn-success">Register Location</button>
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
        <label>Location ID</label>
        <input type="text" readonly name="update_locId" id="update_locId" class="form-control" />
        </div>

        <div class="form-group">
        <label>Location Name</label>
        <input type="text" name="update_locName" id="update_locName" class="form-control" />
        </div>

        <div class="form-group">
        <label>Latitute of Location</label>
        <input type="text" name="update_lat" id="update_lat" class="form-control" />
        </div>

         <div class="form-group">
        <label>Longitude of Location</label>
        <input type="text" name="update_lng" id="update_lng" class="form-control" />
        </div>

      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" onclick="updateLocationDetail()" class="btn btn-success" data-dismiss="modal">Update</button>
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
		url:"locationCode.php",
		type:"post",
		data:{readrecord:readrecord},
		success:function(data,status)
		{
			$('#tblLocation').html(data);

		}
	});
}

//Add Truck Code
function addLocation()
{
  var correct_name=/^[A-Za-z\s]+$/;
  var correct_latlng=/^(?=.)-?((8[0-5]?)|([0-7]?[0-9]))?(?:\.[0-9]{1,20})?$/;
  var correct_latlng2=/^(?=.)-?((8[0-5]?)|([0-7]?[0-9]))?(?:\.[0-9]{1,20})?$/;
	var locName=$('#locName').val();
	var lat=$('#lat').val();
	var lng=$('#lng').val();

  if(locName=="")
  {
    document.getElementById('lname_error').innerHTML="This filed is required";
    return false;
  }
  if(locName.length<3)
  {
    document.getElementById('lname_error').innerHTML="Too short!";
    return false;
  }
  if(locName.length>20)
  {
    document.getElementById('lname_error').innerHTML="Too long!";
    return false;
  }
  if (locName!="") 
  {
    if (locName.match(correct_name)) {
      true;
    }
    else
    {
      document.getElementById('lname_error').innerHTML="Incorrect location!";
    return false;
    }
  }
  if(lat=="")
  {
    document.getElementById('lat_error').innerHTML="This field is required";
    return false;
  }
  if (lat!="") 
  {
    if (lat.match(correct_latlng)) {
      true;
    }
    else
    {
      document.getElementById('lat_error').innerHTML="Incorrect latitude!";
    return false;
    }
  }
  if(lng=="")
  {
    document.getElementById('lng_error').innerHTML="This field is required";
    return false;

  }

  else
  {
      $.ajax({
    url:"locationCode.php",
    type:"post",
    data:{locName:locName,lat:lat,lng:lng},
    success:function(data,status)
    {  
      readRecords();
      $('#myModal').modal("hide");

    }
  });
  }

}


//Delete Truck Code
function DeleteLocation(deleteid)
{
	var conf= confirm("Are you sure?");
	if(conf==true)
	{
		$.ajax({
			url:"locationCode.php",
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
function GetLocationDetails(id)
{
	$('#hidden_user_id').val(id);
	$.post("locationCode.php",{id:id},function(data,status){
		var user=JSON.parse(data);
		$('#update_locId').val(user.loc_id);
		$('#update_locName').val(user.loc_name);
		$('#update_lat').val(user.lat);
		$('#update_lng').val(user.lng);

		
	}


		);
	$('#update_user_modal').modal("show");
}

//Update Truck Details

function updateLocationDetail()
{
	var loc_name=$('#update_locName').val();
	var lat=$('#update_lat').val();
	var lng=$('#update_lng').val();
	

	var hidden_user_id=$('#hidden_user_id').val();

	$.post("locationCode.php",{hidden_user_id:hidden_user_id,loc_name:loc_name,lat:lat,lng:lng},
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