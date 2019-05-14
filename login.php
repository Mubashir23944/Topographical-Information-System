<?php
session_start();

//if(isset($_SESSION['username']))
//{
//		header('location:dashboard.php');

//}


?>
<!DOCTYPE html>
<html>
<head>
	<title>TIS-Login</title>
	<script src="jquery-3.2.1.min.js"></script>

	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="validu.css">
  <link rel="stylesheet" type="text/css" href="login.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script>
/*$(document).ready(function() {
    $('#btnLog').click(function()
	{
		var username=$('#username').val();
		var password=$('#password').val();
		if($.trim(username).length>0 && $.trim(password).length>0)
		{
			$.ajax({
				url:"loginCode.php",
				type:"POST",
				data:{username:username,password:password},
				beforeSend: function(){
					$('#btnLog').val("Loading");
					},
				success:function(data)
				{
					if(data)
					{
						$('body').load("dashboard.php").hide().fadeIn(1500);
						
					}
					else
					{
						$('#btnLog').val("Login");
						$('#error').text("Incorrect email or password");
					}
				}
				
			});
			
		}
		else
		{
			return false;
		}
	});
});*/


function login_fn(){
                
                var test="";
                
                var parameters = "username="+document.getElementById("username").value+
                                  "&password="+document.getElementById("password").value;
               
        
                var xhttp = new  XMLHttpRequest();
                 
              
                   xhttp.onreadystatechange = function(){
                       
                       if(xhttp.readyState == 4 && xhttp.status == 200){
                           
                           test = xhttp.responseText.trim();

                           

                           if(test.match("super_ad")){

                           		window.location = "dashboard.php";

                           }

                           else if(test.match("admin")){

                           		window.location = "admin_dashboard.php";

                           }

                           else if(test.match("driver")){

                           		window.location = "driver_view.php";
                           	
                           }
                           else if (test.match("")) 
                           {
                           	window.location="p_dashboard.php";
                           }

                           else{

                           }
     
                           
                       }
                   }; 
                  
                   xhttp.open("POST",'loginCode.php',false);
                   xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                   xhttp.send(parameters);
                     
            }


</script>
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
  <h1>LOGIN</h1>
    <label for="exampleInputEmail1">Username</label>
    <input type="text" id="username" name="username" class="form-control" aria-describedby="emailHelp" placeholder="Enter username">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" id="password" name="password" class="form-control" placeholder="Password">
  </div>
  <span id="error_message"></span>
 
  <input type="button" onclick="login_fn()" name="btnLog" id="btnLog" value="Login" class="btn btn-primary btn-block"/>
  <a href="p_register.php">New User Sign Up</a>
</form>
		</section>
	</section>
</section>




















</body>

</html>