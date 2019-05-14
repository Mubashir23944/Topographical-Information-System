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
	<title>Complain List</title>
		<script src="jquery-3.2.1.min.js"></script>

	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

<div id="container">
<div>
<!-- Grey with black text -->
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand" href="admin_dashboard.php"><?php echo $_SESSION['username']; ?></a>

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
<a href="logout.php" style="margin-left: 640px" class="btn btn-primary" style="color: White;">Logout</a>
</div>


</nav>
</div>
<h1 class="text-primary text-uppercase text-center">List of Complaints</h1>




<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">View Complain</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p id="txtComp"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<div id="records_contant">
	<table id="tblData" class="table table-bordered table-striped">
		
	</table>
</div>
	
</div>

</body>
</html>

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
		url:"listCode.php",
		type:"post",
		data:{readrecord:readrecord},
		success:function(data,status)
		{
			$('#tblData').html(data);

		}
	});
}

function viewComplain(id){
	$.ajax({
		url:"listCode.php",
		type:"post",
		data:{id:id},
		success:function(data,status)
		{
			$('#txtComp').html(data);

		}
	});
	
	$('#myModal').modal("show");
}





</script>