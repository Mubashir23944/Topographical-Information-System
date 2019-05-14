<?php
require ('config.php');
extract($_POST);

//Fetch Record Query

if(isset($_POST['readrecord']))
{
  $data='<table class="table table-bordered table-striped">
  <tr>
  <th>Complain Number</th>
  <th>Citizen Name</th>
  <th>Email Address</th>
  <th>Complain</th>
  <th>View Action</th>
  </tr>';
  $fetch=mysqli_query($con,"select * from tbl_complain");

  if (mysqli_num_rows($fetch)>0) {
    $number=1;
  
  while ($rows=mysqli_fetch_array($fetch)) {
  $data.='<tr>
<td>'.$number.'</td>
<td>'.$rows[1].'</td>
<td>'.$rows[2].'</td>
<td>'.$rows[3].'</td>
<td><input onclick=viewComplain('.$rows['c_id'].') id="btnView" type="button" value="View" class="btn btn-primary"/></td>
</tr>';
$number++;
  
}
}
$data.='</table>';
echo $data;

}


if(isset($_POST['id'])){
	$comp_id=$_POST['id'];
	$comp_query=mysqli_query($con,"select * from tbl_complain where c_id='$comp_id'");
		while ($compu=mysqli_fetch_array($comp_query)) {
			echo $compu['c_complain'];
		}
	
}







?>