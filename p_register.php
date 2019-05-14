<?php

?>
<!DOCTYPE html>
<html>
<head>
	<title>TIS-Registration</title>
	<script src="jquery-3.2.1.min.js"></script>

	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="login.css">
  <link rel="stylesheet" href="validu.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>




<section class="conatiner-fluid bg">
<div>
<h1>Topographical Information System</h1>
</div>
  <section class="row justify-content-center">
    <section class="col-12 col-sm-6 col-md-3">
      <form class="form-container" method="post">
  <div class="form-group">
  <h1>SIGN UP</h1>
    <label for="exampleInputEmail1">Username</label>
    <input type="text" id="txtName" name="txtName" class="form-control" aria-describedby="emailHelp" placeholder="Enter username">
  </div>
   <div class="form-group">
    <label for="exampleInputPassword1">Email Address</label>
    <input type="text" id="txtEmail" name="txtEmail" class="form-control" placeholder="Enter Email Address">
  </div>
  <div class="form-group">
  	<select id="role" class="form-control">
  		<option>Select Role</option>
  		<option>Public</option>
  	</select>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" id="txtPass" name="txtPass" class="form-control" placeholder="Password">
  </div>
 
  <input type="button" onclick="register()" value="Sign Up" class="btn btn-primary btn-block"/>
  <a href="login.php">Go Back to Login</a>
</form>
    </section>
  </section>
</section>


</body>
</html>



<script type="text/javascript">
	

function register()
{
	var user=$('#txtName').val();
	var email=$('#txtEmail').val();
	var pass=$('#txtPass').val();
	var role=$('#role').val();

  $.ajax({
    url:"insu.php",
    type:"post",
    data:{user:user,email:email,role:role,pass:pass},
    success:function(data,status)
    {  
      alert("Success");
      window.open("login.php");

    }
  });




}

</script>