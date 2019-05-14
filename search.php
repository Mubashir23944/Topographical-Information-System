<?php
require ('config.php');
//Search Code


$searcha=@$_POST['serch'];
$search_query=mysqli_query($con,"select * from tbl_registration where emp_name like '$searcha'");
if(mysqli_num_rows($search_query)>0){
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
	while ($rows=mysqli_fetch_array($search_query)) {
			$data.='<tr>
<td>'.$rows[0].'</td>
<td>'.$rows[1].'</td>
<td>'.$rows[2].'</td>
<td>'.$rows[3].'</td>
<td>'.$rows[4].'</td>
<td>'.$rows[5].'</td>
<td>'.$rows[6].'</td>
<td>'.$rows[7].'</td>
<td>'.$rows[8].'</td>

</tr>';
	}
}
$data.='</table>';
echo $data;




?>