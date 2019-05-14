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
   <form class="form-inline" action="/action_page.php">
    <input id="search_txt" name="search_txt" class="form-control mr-sm-2" type="text" placeholder="Search">
    <input onclick="searchu()" class="btn btn-success" type="button" value="Search" />
  </form>

<div class="d-flex justify-content-end">
<a href="logout.php"  class="btn btn-primary" style="color: White;margin-left: 350px">Logout</a>
</div>
</nav>


</div>

<h1 class="text-primary text-uppercase text-center">Manage Employees</h1>


<div class="d-flex justify-content-end ">
<!-- Button to Open the Modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  Register New Employee
</button>
</div>
<div id="result">
  
</div>

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
        <span id="emp_error" class="validu"></span>
        </div>

        <div class="form-group">
        <label>Role</label>
        <select name="txtRole" id="txtRole" class="form-control" >
          <option>Select Role</option>
          <option>Admin</option>
          <option>Driver</option>
        </select>
        <span id="role_error" class="validu"></span>
        </div>

        <div class="form-group">
        <label>Profile Photo</label>
        <input type="text" name="txtFile" id="txtFile" class="form-control" />
        <span id="dp_error" class="validu"></span>
        </div>

        <div class="form-group">
        <label>Email</label>
        <input type="text" name="txtEmail" id="txtEmail" class="form-control" />
        <span id="email_error" class="validu"></span>
        </div>

        <div class="form-group">
        <label>Current Address</label>
        <input type="text" name="txtAddress" id="txtAddress" class="form-control" />
        <span id="address_error" class="validu"></span>
        </div>

        <div class="form-group">
        <label>ID Card Number</label>
        <input type="text" name="txtNic" id="txtNic" class="form-control" />
        <span id="nic_error" class="validu"></span>
        </div>

        <div class="form-group">
        <label>Phone Number</label>
        <input type="text" name="txtPhone" id="txtPhone" class="form-control" />
        <span id="phone_error" class="validu"></span>
        </div>

        <div class="form-group">
        <label>Password</label>
        <input type="password" name="txtPass" id="txtPass" class="form-control" />
        <span id="pass_error" class="validu"></span>
        </div>



      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" onclick="addRecord()" class="btn btn-success">Register User</button>
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
        <input type="text" name="update_txtPhone" id="update_txtPhone" class="form-control" autocomplete="off"/>
        </div>

        <div class="form-group">
        <label>Password</label>
        <input type="password" name="update_txtPass" id="update_txtPass" class="form-control" autocomplete="off" />
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


function searchu(){
  var searchBox=$('#search_txt').val();
  if(searchBox!=""){
    $.ajax({
      url:"insu.php",
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
		url:"insu.php",
		type:"post",
		data:{readrecord:readrecord},
		success:function(data,status)
		{
			$('#tblData').html(data);

		}
	});
}


//Add Record function
function addRecord()
{
  var correct_name=/^[A-Za-z\s]+$/;
  var correct_email=/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})+$/;
  var correct_address=/^[a-zA-Z0-9\s,'-]+$/;
  var correct_number=/^\d{8}$/;
  var correct_nic=/^S([0-9]{13})+$/;
  var paswd=  /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})$/;
	var name=$('#txtName').val();
	var role=$('#txtRole').val();
	var dp=$('#txtFile').val();
	var email=$('#txtEmail').val();
	var address=$('#txtAddress').val();
	var nic=$('#txtNic').val();
	var phone=$('#txtPhone').val();
	var pass=$('#txtPass').val();
  
  if(name=="")
  {
    document.getElementById('emp_error').innerHTML="This field is required";
    return false;
  }

  if(name.length<3)
  {
    document.getElementById('emp_error').innerHTML="Name is too short";
    return false;
  }

  if(name.length>20)
  {
    document.getElementById('emp_error').innerHTML="Name is too long";
    return false;
  }

  if(name!="")
  {
    if(name.match(correct_name))
    {
      true;
    }
    else
    {
     document.getElementById('emp_error').innerHTML="Incorrect Name";
    return false; 
    }
  }
   if(role=="Select Role")
  {
    document.getElementById('role_error').innerHTML="This field is required";
    return false;
  }
   if(dp=="")
  {
    document.getElementById('dp_error').innerHTML="This field is required";
    return false;
  }
   if(email=="")
  {
    document.getElementById('email_error').innerHTML="This field is required";
    return false;
  }

   if(email!="")
  {
    if(email.match(correct_email))
    {
      true;
    }
    else
    {
     document.getElementById('email_error').innerHTML="Incorrect Email";
    return false; 
    }
  }

   if(address=="")
  {
    document.getElementById('address_error').innerHTML="This field is required";
    return false;
  }

  if(address!="")
  {
    if(address.match(correct_address))
    {
      true;
    }
    else
    {
     document.getElementById('address_error').innerHTML="Incorrect Address";
    return false; 
    }
  }
   if(nic=="")
  {
    document.getElementById('nic_error').innerHTML="This field is required";
    return false;
  }

   if(nic!="")
  {
    if(nic.match(correct_nic))
    {
      true;
    }
    else
    {
     document.getElementById('nic_error').innerHTML="Incorrect ID Card Number";
    return false; 
    }
  }
   if(phone=="")
  {
    document.getElementById('phone_error').innerHTML="This field is required";
    return false;
  }

  if(phone!="")
  {
    if(phone.match(correct_number))
    {
      true;
    }
    else
    {
     document.getElementById('phone_error').innerHTML="Incorrect Phone Number";
    return false; 
    }
  }

   if(pass=="")
  {
    document.getElementById('pass_error').innerHTML="This field is required";
    return false;
  }

  if(pass.length<5)
  {
    document.getElementById('pass_error').innerHTML="Week Password";
    return false;
  }

  else
  {

  $.ajax({
    url:"insu.php",
    type:"post",
    data:{name:name,role:role,dp:dp,email:email,address:address,nic:nic,phone:phone,pass:pass},
    success:function(data,status)
    {  
      readRecords();
      $('#myModal').modal("hide");

    }
  });
  }

}

//Delete function
function DeleteUser(deleteid)
{
	var conf= confirm("Are you sure?");
	if(conf==true)
	{
		$.ajax({
			url:"insu.php",
			type:"post",
			data:{deleteid:deleteid},
			success:function(data,status)
			{
				readRecords();
			}
		});
	}
}






//Get Employee Data
function GetUserDetails(id)
{
	$('#hidden_user_id').val(id);
	$.post("insu.php",{id:id},function(data,status){
		var user=JSON.parse(data);
		$('#update_id').val(user.emp_id);
		$('#update_txtName').val(user.emp_name);
		$('#update_txtRole').val(user.emp_role);
		$('#update_txtFile').val(user.emp_image);
		$('#update_txtEmail').val(user.emp_email);
		$('#update_txtAddress').val(user.emp_address);
		$('#update_txtNic').val(user.emp_id_number);
		$('#update_txtPhone').val(user.emp_phone);
		$('#update_txtPass').val(user.emp_password);
	}


		);
	$('#update_user_modal').modal("show");
}




function updateuserdetail()
{
	var emp_name=$('#update_txtName').val();
	var emp_role=$('#update_txtRole').val();
	var emp_image=$('#update_txtFile').val();
	var emp_email=$('#update_txtEmail').val();
	var emp_address=$('#update_txtAddress').val();
	var emp_id_number=$('#update_txtNic').val();
	var emp_phone=$('#update_txtPhone').val();
	var emp_password=$('#update_txtPass').val();

	var hidden_user_id=$('#hidden_user_id').val();

	$.post("insu.php",{hidden_user_id:hidden_user_id,emp_name:emp_name,emp_role:emp_role,emp_image:emp_image,emp_email:emp_email,emp_address:emp_address,emp_id_number:emp_id_number,emp_phone:emp_phone,emp_password:emp_password},
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