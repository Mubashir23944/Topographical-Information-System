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

<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    


	<title>TIS-Admin Dashboard</title>
    <script src="jquery-3.2.1.min.js"></script>
    <script>
    $(document).ready(function(e) {
        $('#btnRegistration').click(function(e){
			var edata=$('#frmdata').serialize();
			$.ajax({
				url:"insertEmpCode.php",
				type:"POST",
				data:edata,
				success: function(res)
				{
					alert(res);
				}
				
				});
			
			
			});
		
    });
    
    </script>
	
</head>
<body>

<div>




<div>
<!-- Grey with black text -->
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand" href="admin_dashboard.php"><?php echo $_SESSION['username']; ?></a>

   <ul class="navbar-nav">
   
    <li class="nav-item">
      <a class="nav-link" href="view_admin_emp.php">View Employees</a>
    </li>
    <li class="nav-item">
<a class="nav-link" href="admin_manage_pickups.php">Manage Pickups</a>
    </li>
    <li class="nav-item">
<a class="nav-link" href="admin_manage_location.php">Manage Locations</a>
    </li>
    <li class="nav-item">
<a class="nav-link" href="admin_manage_trucks.php">Manage Trucks</a>
    </li>
      <li class="nav-item">
<a class="nav-link" href="complainList.php">View Complaints</a>
    </li>

  </ul>
  <div class="d-flex justify-content-end">
<a href="logout.php" style="margin-left: 650px" class="btn btn-primary" style="background-color: darkgrey; color: White;">Logout</a>
</div>


</nav></div>


<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="Cap.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="cap3.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="Capture1.png" class="d-block w-100" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


</div>

</body>
</html>