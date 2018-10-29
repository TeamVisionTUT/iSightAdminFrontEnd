<?php

$connect = mysqli_connect("localhost", "root","","isightdata");

$output = '';

if(isset($_POST['user_id']))
{
	if($_POST['user_id'] != ' ')
	{
		$sql = "SELECT * FROM user WHERE user_id = '".$_POST["user_id"]."'";
	}
	else
	{
		$sql = "SELECT * FROM user";
	}

	$result  = mysqli_query($connect, $sql);
	
	while($row = mysqli_fetch_array($result))
	{
		$output .= '<div class="col-md-3"><div style="border:1px solid #ccc; padding:20px; margin-bottom:20px;">'.$row["first_name"].'</div"></div">';
	}
	echo $output;
}

?>