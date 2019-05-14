<?php

require ('config.php');

extract($_POST);


//Fetch Record Query

if(isset($_POST['readrecord']))
{
  $data='<table class="table table-bordered table-striped">
  <tr>
  <th>Employee ID</th>
  <th>Name</th>
  <th>Role</th>
  <th>Photo</th>
  <th>Email</th>
  <th>Current Address</th>
  <th>Id Card Number</th>
  <th>Phone Number</th>
  <th>Password</th>
 
  </tr>';
  $fetch=mysqli_query($con,"select * from tbl_registration");

  if (mysqli_num_rows($fetch)>0) {
    $number=1;
  
  while ($rows=mysqli_fetch_array($fetch)) {
  $data.='<tr>
<td>'.$number.'</td>
<td>'.$rows[1].'</td>
<td>'.$rows[2].'</td>
<td>'.$rows[3].'</td>
<td>'.$rows[4].'</td>
<td>'.$rows[5].'</td>
<td>'.$rows[6].'</td>
<td>'.$rows[7].'</td>
<td>'.$rows[8].'</td>

</tr>';
$number++;
  
}
}
$data.='</table>';
echo $data;

}




?>