<?php
        require ('config.php');
session_start();
if(!isset($_SESSION['username']))
{
  header('location:login.php');
}


?>

<!DOCTYPE html>
<html>
<head>
  <title>TIS-Manage Pickups</title>
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


  <div class="d-flex justify-content-end">
<a href="logout.php" style="margin-left: 1370px" class="btn btn-primary" style="background-color: darkgrey; color: White;">Logout</a>
</div>


</nav></div>


<h1 class="text-primary text-uppercase text-center">View Your Pickups</h1>




<div id="records_contant">
  <table id="tblpickups" class="table table-bordered table-striped">
    
  </table>
</div>




<!--Update Modal-->
<div class="modal" id="update_user_modal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Update Pickup Status</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        
        <div class="form-group">
        <label>Location ID</label>
        <select id="driverStatus" name="driverStatus" class="form-control">
          <option>Completed</option>
          <option>Not Completed</option>
        </select>
        </div>

      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" onclick="updateStatus()" class="btn btn-success" data-dismiss="modal">Update</button>
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
    url:"driverCode.php",
    type:"post",
    data:{readrecord:readrecord},
    success:function(data,status)
    {
      $('#tblpickups').html(data);

    }
  });
}

function GetPickupDetails(id)
{
  $('#hidden_user_id').val(id);
  $.post("pickupCode.php",{id:id},function(data,status){
    var user=JSON.parse(data);
    $('#driverStatus').val(user.pickup_status);
   

  }


    );
  $('#update_user_modal').modal("show");
}


function updateStatus(){
    var statu=$('#driverStatus').val();
    var hidden_user_id=$('#hidden_user_id').val();

  $.post("driverCode.php",{hidden_user_id:hidden_user_id,statu:statu},
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