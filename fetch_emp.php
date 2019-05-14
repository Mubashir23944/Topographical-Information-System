<?php
require ('config.php');

if(@$_POST['requiest']){
	$request=$_POST['request'];
$fetch=mysqli_query($con,"select * from tbl_registration where emp_name='$request'");
while ($rows=mysqli_fetch_array($fetch)) {
	?>
<tr>
<td><?php echo $rows[0] ?></td>
<td><?php echo $rows[1] ?></td>
<td><?php echo $rows[2] ?></td>
<td><?php echo $rows[3] ?></td>
<td><?php echo $rows[4] ?></td>
<td><?php echo $rows[5] ?></td>
<td><?php echo $rows[6] ?></td>
<td><?php echo $rows[7] ?></td>
<td><?php echo $rows[8] ?></td>
</tr>


	<?php
}
}
?>