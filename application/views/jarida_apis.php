<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Jarida APIs</title>

<link rel="stylesheet" href="<?php echo base_url();?>css/reports.css">
<style type="text/css">
table {
	margin: 0 auto;
}
table tr td {
    text-align: left;
    padding:10px;
    border-top: 1px solid #ffffff;
    border-bottom:1px solid #e0e0e0;
    border-left: 1px solid #e0e0e0;
    
    background: #fafafa;
    background: -webkit-gradient(linear, left top, left bottom, from(#fbfbfb), to(#fafafa));
    background: -moz-linear-gradient(top,  #fbfbfb,  #fafafa);
}

.info {
	text-align: right;
	margin-right: 210px;
}
</style>

</style>
</head>
<body>
</br>
<center><h1>Welcome to Jarida APIs'</h1></center>

<center><p>This page contains all the API's done including results on each selection.</p></center>
<form>
	<table style="text-align: left;">
		<tr>
			<td><a href="<?php echo site_url('mobile/login/u/fenicfelix/p/1234/format/json');?>">Login</a></td>
			<td> : Perform login operations</td>
		</tr>
		<tr>
			<td><a href="<?php echo site_url('mobile/register');?>">Register User</a></td>
			<td> : Register readers and print out 'y' or 'n' depending on the result</td>
		</tr>
		<tr>
			<td><a href="<?php echo site_url('mobile/magazines');?>">All Magazines</a></td>
			<td> : Get all registered and published magazines</td>
		</tr>
		<tr>
			<td><a href="<?php echo site_url('mobile/magazine/id/2');?>">Magazine Details</a></td>
			<td> : Get a specific magazine. Requires a magazine_id input</td>
		</tr>
		<tr>
			<td><a href="<?php echo site_url('mobile/magazineRanges/limit/10/offset/0');?>">Magazines with page range</a></td>
			<td> : Get all registered and published magazines within a range that you specify</td>
		</tr>
		<tr>
			<td><a href="<?php echo site_url('mobile/issues');?>">Magazine Issues</a></td>
			<td> : Get all published issues.</td>
		</tr>
		<tr>
			<td><a href="<?php echo site_url('mobile/magazineIssues/magazine_id/2/limit/10/offset/0');?>">Specific Magazine Issues</a></td>
			<td> : Get all issues in a specific magazine within a specified range.</td>
		</tr>
		<tr>
			<td><a href="<?php echo site_url('mobile/issue/id/1');?>">Specific Issue Details</a></td>
			<td> : Get details of a specific magazine issue</td>
			<!-- <li><a id="ajax" href="<?php echo site_url('api/example/users/format/json');?>">Users</a> - get it in JSON (AJAX request)</li> -->
		</tr>
		<tr>
			<td><a href="<?php echo site_url('mobile/issuePages/id/7');?>">Specific Issue Pages</a></td>
			<td> : Get pages of a specific issue</td>
			<!-- <li><a id="ajax" href="<?php echo site_url('api/example/users/format/json');?>">Users</a> - get it in JSON (AJAX request)</li> -->
		</tr>
		<tr>
			<td><a href="<?php echo site_url('mobile/pageRanges/id/7/limit/8/offset/0');?>">Issues with page range</a></td>
			<td> : Get all registered and published issue pages within a range that you specify</td>
		</tr>
		</br>
		</br>
		<tr>
			<td><a href="<?php echo site_url('mobile/status');?>">Get user status</a></td>
			<td> : Get registered user status</td>
		</tr>
		<tr>
			<td><a href="<?php echo site_url('mobile/nationality');?>">Get nationality</a></td>
			<td> : Get registered countries</td>
		</tr>
		<tr>
			<td><a href="<?php echo site_url('mobile/gender');?>">Get gender</a></td>
			<td> : Get registered gender</td>
		</tr>
		<tr>
			<td><a href="<?php echo site_url('mobile/salutations');?>">Get salutation</a></td>
			<td> : Get salutation</td>
		</tr>
	</table>
</form>


<div class="info"><p><br />Page rendered in {elapsed_time} seconds</p></div>

<!-- <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script> -->
<script src="<?php echo site_url();?>js/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(function(){
	// Bind a click event to the 'ajax' object id
	$("#ajax").bind("click", function( evt ){
		// Javascript needs totake over. So stop the browser from redirecting the page
		evt.preventDefault();
		// AJAX request to get the data
		$.ajax({
			// URL from the link that was clicked on
			url: $(this).attr("href"),
			// Success function. the 'data' parameter is an array of objects that can be looped over
			success: function(data, textStatus, jqXHR){
				alert('Successful AJAX request!');
			}, 
			// Failed to load request. This could be caused by any number of problems like server issues, bad links, etc. 
			error: function(jqXHR, textStatus, errorThrown){
				alert('Oh no! A problem with the AJAX request!');
			}
		});
	});
});
</script>

</body>
</html>