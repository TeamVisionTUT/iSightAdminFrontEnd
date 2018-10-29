<?php

//$id = 0;
$location_id = 0;
$street_address = "";
$city = "";
$post_code = "";
$country = "";
$edit_state = false;


$connect = mysqli_connect('localhost', 'root', '','isightdata');

	function getposts()
	{
		$posts = array();
		$posts[0] = $_POST["location_id"]; 
		$posts[1] = $_POST["street_address"]; 
		$posts[2] = $_POST["city"]; 
		$posts[3] = $_POST["post_code"]; 
		$posts[4] = $_POST["country"]; 
		return $posts;
	}	
	
	//search
	if(isset($_POST['search']))
	{
		$data = getposts();
		$search_Query = "SELECT * FROM location where location_id = $data[0]";
		
		$search_Result = mysqli_query($connect, $search_Query);
		
		if($search_Result)
		{
			if(mysqli_num_rows($search_Result))
			{
				while($row = mysqli_fetch_array($search_Result))
				{
					$street_address = $row['street_address'];
					$city = $row['city'];
					$post_code = $row['post_code'];
					$country = $row['country'];
					
				}
			}
			else
			{
				echo 'no data found'; 
			}
			
		}
		else{
			echo 'Result Error';
		}
	
	}
	
	//isert
	
	if(isset($_POST['insert'])){
		
	
		$street_address = $_POST["street_address"]; 
		$city = $_POST["city"]; 
		$post_code = $_POST["post_code"]; 
		$country = $_POST["country"]; 
			
		$insert_Query = "INSERT INTO location(street_address,city,post_code,country) VALUES('$street_address','$city','$post_code','$country')";
		
		$search_Result = mysqli_query($connect, $insert_Query);
		}

	
	//update 
	
	if(isset($_POST['update']))
	{
		 
		$location_id = mysql_real_escape_string($_POST["location_id"]);
		$street_address = mysql_real_escape_string($_POST["street_address"]);
		$city = mysql_real_escape_string($_POST["city"]); 
		$post_code = mysql_real_escape_string($_POST["post_code"]); 
		$country = mysql_real_escape_string($_POST["country"]); 
		
		$update_Query = "UPDATE location SET location_id = '$location_id' , street_address = '$street_address' , city='$city', post_code= '$post_code', country = '$country' where location_id='$location_id'";
		mysqli_query($connect, $update_Query);
	
	}
	
	//delete
	
	if(isset($_POST['delete']))
	{
		//$id = $_['delete'];
		$id = $_POST["location_id"]; 
			
		$delete_Query = "DELETE FROM location where location_id = '$location_id'";
		
		mysqli_query($connect, $delete_Query);
	}


?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>User Location | ISight</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/ISight.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

</head>

<body>

    <div class="brand">ISight</div>


    <!-- Navigation -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
                <a class="navbar-brand" href="index.html">Isight</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
                     <li>
                        <a href="user.php">User Info</a>
                    </li>
					<li>
                        <a href="location.php">User Location</a>
                    </li>
                    <li>
                        <a href="items.php">User Items</a>
                    </li>
                    <li>
                        <a href="fav.php">User Fav Items</a>
                    </li>
					<li>
                      <a href="signOut.html">Sign Out</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <div class="container">
        <div class="row">
            <div class="box">
                <div class="col-lg-12 text-left">
					<h3>User Location</h3>
	
	  				<p>Please select the location ID from the combobox below</p>
							<select width:200px;>
				
								<option value = "lastname">Location1</option>
								<option value = "lastname">Location2</option>
								<option value = "lastname">Location3</option>
								<option value = "lastname">Location4</option>
								<option value = "lastname">Location5</option>
								<option value = "lastname">Location1</option>
								<option value = "lastname">Location2</option>
								<option value = "lastname">Location3</option>
								<option value = "lastname">Location4</option>
								<option value = "lastname">Location5</option>
							</select>
				</div>
			</div>
		</div>
	</div>
    <!-- /.container -->
	
	 <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                   
                    <form role="form"  action="" method="post">
                      
						<div class="col-lg-12 text-center">
				
							<input name="location_id" placeholder ="location_id" value = "<?php echo $location_id;?>">
                            <input name="street_address" placeholder ="street_address"  value = "<?php echo $street_address;?>">
                            <input name="city" placeholder="city"  value = "<?php echo $city;?>">
                            <input name="post_code" placeholder = "post_code" value ="<?php echo $post_code;?>">
                            <input name="country"  placeholder = "country" value ="<?php echo $country;?>"><br><br><br>
								
						
								
							<button type="submit"  name = "search">find location</button>
						 
							<button type="submit"  name="insert">Add Location</button>
						 
							<button type="submit"  name="delete">Delete location</button>
						
							<button type="submit"  name="update">Update location</button>
              
						</div>
                    </form>
                </div>
            </div>
        </div>

    </div>
	 <!--div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12 text-center">
				
					<div class="form-group col-lg-12">
					<button type="submit" class="btn btn-default" name = "search">find</button>
                 
                    <button type="submit"  name="method" value="insert">Add Location</button>
                    </div>
					<div class="form-group col-lg-12">
                   
                    <button type="submit"  name="method" value="delete">Delete location</button>
                    </div>
					<div class="form-group col-lg-12">
        
                    <button type="submit"  name="method" value="update">Update location</button>
                    </div>
				</div>
			</div>
		</div>	
	</div-->
	
   
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>Copyright &copy ISight<br />
						Design &amp development by TeamVisionTUT<br />
				
                </div>
            </div>
        </div>
    </footer>
	
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

	<!-- Script for order number and button disable -->
	<script src="js/rental.js"></script>
	
	<!-- Display car make and model -->
	<script src="js/cars.js"></script>
</body>

</html>
