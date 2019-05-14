<!DOCTYPE html>
<html>
<head>
	<title></title>
    <script src="jquery-3.2.1.min.js"></script>
    <script>
    

$(document).ready(function(e) {
    
	$("#txtSearch").keyup(function(e) {
		var txt = $("#txtSearch").val();
		$.ajax({
			
			url:"fetch_live.php",
			type:"POST",
			data:{"search":txt},
			beforeSend: function()
			{
			$("#tbldata").html("<tr><td>Loading data please wait</td></tr>");
			},	
			success: function(res)
			{
				$("#tbldata").html(res);	
			}
			});
	});

});
 
	</script>
</head>
<body>
<input type="text" placeholder="Search by Name" id="txtSearch" name="txtSearch"/>
<input type="button" id="btn" name="btn" value="Search" />
<span id="gujup"></span>
<div id="result">
	<table id="tbldata">
		
	</table>
</div>
</body>
</html>