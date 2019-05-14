<!DOCTYPE html>
<html>
<head>
	<title>TIS-Login</title>
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
<label>Username</label>
<input type="text" id="username" name="username">

<label>Password</label>
<input type="text" id="password" name="password">
<button type="button" onclick="login()" class="btn btn-primary">Login</button>
</div>


</body>
</html>

<script type="text/javascript">
	
function login()
{
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
                           else if(test.match("")){

                           		window.location = "p_dashboard.php";
                           	
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