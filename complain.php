<!DOCTYPE html>
<html>
<head>
	<title>TIS-Complaints</title>
	<script src="jquery-3.2.1.min.js"></script>

	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="validu.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>


<div>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand" href="p_dashboard.php">Home</a>
    <a class="navbar-brand" href="complain.php">Register Complains</a>
    <div class="d-flex justify-content-end">
<a href="logout.php" class="btn btn-primary" style="margin-left: 1170px; color: White;">Logout</a>
</div>


</nav>


</div>







<section class="conatiner-fluid">

  <section class="row justify-content-center">
    <section class="col-12 col-sm-6 col-md-3">
      <form class="form-container" method="post">
  <div class="form-group">
  <h1>LET YOUR WORDS BE HEARD</h1>
    <label for="exampleInputEmail1">Username</label>
    <input type="text" id="txtName" name="txtName" class="form-control">
    <span id="user_error" class="validu"></span>
  </div>
   <div class="form-group">
    <label for="exampleInputPassword1">Email Address</label>
    <input type="text" id="txtEmail" name="txtEmail" class="form-control">
    <span id="email_error" class="validu"></span>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">What do you have to say?</label>
    <textarea id="txtcomp" style="height: 200px;" name="txtcomp" class="form-control"></textarea>
    <span id="comp_error" class="validu"></span>
  </div>
 
  <input type="button" onclick="complain()" value="Submit" class="btn btn-primary btn-block"/>
</form>
    </section>
  </section>
</section>


</body>
</html>

<script type="text/javascript">
	
	function complain()
	{
      var correct_email=/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})+$/;
		var user=$('#txtName').val();
	var email=$('#txtEmail').val();
	var comp=$('#txtcomp').val();

  if(user=="")
  {
    document.getElementById('user_error').innerHTML="This field is required";
    return false;
  }
  if(user.length<3)
  {
    document.getElementById('user_error').innerHTML="Username is too short";
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

  if(comp=="")
  {
    document.getElementById('comp_error').innerHTML="This field is required";
    return false;
  }
  if(comp.length<10)
  {
    document.getElementById('user_error').innerHTML="Message too short";
    return false;
  }
  else{
     $.ajax({
    url:"complainCode.php",
    type:"post",
    data:{user:user,email:email,comp:comp},
    success:function(data,status)
    {  
      alert("Success");

    }
  });
  }





 
	}


</script>

