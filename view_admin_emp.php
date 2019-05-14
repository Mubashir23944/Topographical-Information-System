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
	<title>TIS-View Employees</title>
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
    <form class="form-inline" action="/action_page.php">
    <input id="search_txt" name="search_txt" class="form-control mr-sm-2" type="text" placeholder="Search">
    <input onclick="searchu()" class="btn btn-success" type="button" value="Search" />
  </form>
  <div class="d-flex justify-content-end">
<a href="logout.php" style="margin-left: 350px" class="btn btn-primary" style="color: White;">Logout</a>
</div>


</nav>
</div>

<h1 class="text-primary text-uppercase text-center">Manage Employees</h1>



<div id="records_contant">
	<table id="tblData" class="table table-bordered table-striped">
		
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
        <label>Name</label>
        <input type="text" name="txtName" id="txtName" class="form-control" />
        </div>

        <div class="form-group">
        <label>Role</label>
        <input type="text" name="txtRole" id="txtRole" class="form-control" />
        </div>

        <div class="form-group">
        <label>Profile Photo</label>
        <input type="text" name="txtFile" id="txtFile" class="form-control" />
        </div>

        <div class="form-group">
        <label>Email</label>
        <input type="text" name="txtEmail" id="txtEmail" class="form-control" />
        </div>

        <div class="form-group">
        <label>Current Address</label>
        <input type="text" name="txtAddress" id="txtAddress" class="form-control" />
        </div>

        <div class="form-group">
        <label>ID Card Number</label>
        <input type="text" name="txtNic" id="txtNic" class="form-control" />
        </div>

        <div class="form-group">
        <label>Phone Number</label>
        <input type="text" name="txtPhone" id="txtPhone" class="form-control" />
        </div>

        <div class="form-group">
        <label>Password</label>
        <input type="password" name="txtPass" id="txtPass" class="form-control" />
        </div>



      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" onclick="addRecord()" class="btn btn-success" data-dismiss="modal">Register User</button>
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
        <label>Employee ID</label>
        <input type="text" name="update_id" id="update_id" class="form-control" />
        </div>

        <div class="form-group">
        <label>Name</label>
        <input type="text" name="update_txtName" id="update_txtName" class="form-control" />
        </div>

        <div class="form-group">
        <label>Role</label>
        <input type="text" name="update_txtRole" id="update_txtRole" class="form-control" />
        </div>

        <div class="form-group">
        <label>Profile Photo</label>
        <input type="text" name="update_txtFile" id="update_txtFile" class="form-control" />
        </div>

        <div class="form-group">
        <label>Email</label>
        <input type="text" name="update_txtEmail" id="update_txtEmail" class="form-control" />
        </div>

        <div class="form-group">
        <label>Current Address</label>
        <input type="text" name="update_txtAddress" id="update_txtAddress" class="form-control" />
        </div>

        <div class="form-group">
        <label>ID Card Number</label>
        <input type="text" name="update_txtNic" id="update_txtNic" class="form-control" />
        </div>

        <div class="form-group">
        <label>Phone Number</label>
        <input type="text" name="update_txtPhone" id="update_txtPhone" class="form-control" />
        </div>

        <div class="form-group">
        <label>Password</label>
        <input type="password" name="update_txtPass" id="update_txtPass" class="form-control" />
        </div>



      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" onclick="updateuserdetail()" class="btn btn-success" data-dismiss="modal">Update</button>
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
  $('#search_txt').keyup(function(){
    var txt=$(this).val();
    if(txt==""){
      readRecords();
    }


  });

});

//Search Function
function searchu(){
  var searchBox=$('#search_txt').val();
  if(searchBox!=""){
    $.ajax({
      url:"search.php",
      type:"post",
      data:{serch:searchBox},
      success:function(data){
        $('#tblData').html(data);
      }
    });
  }
  else{
  readRecords();
  }
}


//Fetch Records
function readRecords()
{
	var readrecord="readrecord";
	$.ajax({
		url:"admin_insu.php",
		type:"post",
		data:{readrecord:readrecord},
		success:function(data,status)
		{
			$('#tblData').html(data);

		}
	});
}









</script>


</body>
</html>