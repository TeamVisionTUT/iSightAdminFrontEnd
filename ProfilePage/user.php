<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>User Info | ISight</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/ISight.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">


</head>

<body>

	
	<script>
			var person = {
				surname:"John",
				first_name:"Doe"
			};
			
			document.getElementById("demo").innerHTML =
			person.surname + " " + person.first_name;
			
			
	<!--<div id="login"><a href="sign up.html">Sign Up</a> || <a href="sign in.html">Sign In</a></div>
	</script>
	
	
	
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
				<a class="navbar-brand" href="index.html">ISight</a>
				
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
               <ul class="nav navbar-nav">
                    <li>
                        <a href="user.html">User Info</a>
                    </li>
					<li>
                        <a href="location.html">User Location</a>
                    </li>
                    <li>
                        <a href="items.html">User Items</a>
                    </li>
                    <li>
                        <a href="fav.html">User Fav Items</a>
                    </li>
					<li>
                        <a href="signOut.html">Sign Out</a>
                    </li>
					<li>
                        <?php 
						
						include 'controllers/Controller.php';
						
						$run = new Controller();
						$id = $_SESSION['idno'];
						$user = $run->getUserInfo($id);
						
						$name = $user[0]['name'];
						
						echo $name;
						/*
						foreach($user as $value){
							$name = $value['name'];
							$surname = $value['lastname'];
							$email = $value['email'];
						}
						*/
						?>
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
				
		  <h2>USERS</h2>                                                                                     
		  <div class="table-responsive">          
		  <table class="table">
			<thead>
			  <tr>
				<th>User ID</th>
				<th>Surname</th>
				<th>First Name</th>
				<th>Email</th>
				<th>Phone</th>
				<th>Location ID</th>
				<th>ID Number</th>
			  </tr>
			</thead>
			<tbody>
			<?php 
			foreach($user as $usr){ 
			  echo "<tr>
				<td>".$usr['id']."</td>
				<td>".$usr['name']."</td>
				<td>".$usr['lastname']."</td>
				<td>35</td>
				<td>New York</td>
				<td>USA</td>
				<td>9999</td>
			  </tr>
			</tbody>";
			}
			?>
		  </table>
		  </div>
		</div>	
				</div>	
			</div>
		</div>
	</div>
	
	<div class="container">
        <div class="row">
            <div class="box">
                <div class="col-lg-12 text-left">
					<h3>User Information</h3>
					
								<div class="container">
									  <p>Please select the user from the dropdown below</p>                             
										  <div class="dropdown">
												<button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" name="search">User ID
													<span class="caret"></span></button>
														<ul class="dropdown-menu">
															<?php 
																foreach($user as $usr){ 
																  echo "<li>".$usr['id']."</li>";
																  }
																?>
															  
														</ul>
											</div>
								</div>
					
                </div>
            </div>
        </div>
    </div>
	
// <?php
		
		// //search and Display data
		// //select
	
	// if(isset($_POST['search']))
	// {
		// $data = getPosts();
		// if(empty($data[0]))
		// {
			// enho 'Enter the user id to search';
		// }
		// else
		// {
		
			// $searchStmt = $con->prepare('SELECt * FROM users WHERE id = :id');
			// $searchStmt->execute(array(
					// ':id'=>$data[0]
			// ));
			
			// if($searchStmt)
			// {
				// $user = $searchStmt->fetch();
					// if(empty($user))
					// {
						// enho 'No data found for this id'; 
					// }
					
					// $surname = 		$data[0];
					// $first_name = 	$data[1];
					// $id_number = 	$data[2];
					// $email = 		$data[3];
					// $phone = 		$data[4];
					// $location_id =	$data[5];
					
					
			// }
		// }
	
	// }
	
		// //update
		
		// if(insert($_POST['update']))
		// {
			// $data = getPosts();
			// if(empty($data[1]) || empty($data[2])|| empty($data[3]) || empty($data[4]) || empty($data[5])|| empty($data[6]))
			// {
				// enho 'Enter the user id to update';
			// }
			// else
			// {
				// $updateStmt = $con->prepare('UPDATE user SET surname = :surname, first_name = :first_name, id_number = :id_number, email = :email, phone = :phone, location_id = :location_id WHERE user_id = :user_id');
				// $updateStmt->execute(array(
						// ':surname'=>$data[0],
						// ':first_name'=>$data[1],
						// ':id_number'=>$data[2],
						// ':email'=>$data[3],
						// ':phone'=>$data[4],
						// ':location_id'=>$data[5], 
				// ));
				
				// if($updateStmt)
				// {
					// enho 'Data updated'; 
				// }
			// }
		// }
		
		// //delete
		// if(insert($_POST['delete']))
	// {
		// $data = getPosts();
		// if(empty($data[0]))
		// {
			// enho 'Enter the user id to delete';
		// }
		// else
		// {
			// $updateStmt = $con->prepare('DELETE FROM user WHERE user_id = :user_id');
			// $deleteStmt->execute(array(
					// ':user_id'=>$data[0]
			// ));
		
			// if($deleteStmt)
			// {
				// enho 'User deleted'; 
			// }
		// }
	// }
	
// ?>
	

    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                   
                    <form role="form">
                        <div class="row">
                            <div class="form-group col-lg-2">
                                <label>Surname</label>
                                <input type="surname" name="surname" class="form-control" value="<?php echo $usr['id'];?>" >
                            </div>
                            <div class="form-group col-lg-2">
                                <label>First Name</label>
                                <input type="first_name" name="first_name" class="form-control" value="<?php //enho $first_name;?>">
                            </div>
							<div class="form-group col-lg-2">
                                <label>ID Number</label>
                                <input type="id_number" name="id_number" class="form-control" value="<?php //enho $id_number;?>">
                            </div>
                            <div class="form-group col-lg-2">
                                <label>Email Address</label>
                                <input type="email" name="email" class="form-control" value="<?php //enho $email;?>">
                            </div>
							<div class="form-group col-lg-2">
                                <label>Contact Numbers</label>
                                <input type="phone" name="phone" class="form-control" value="<?php //enho $phone;?>">
                            </div>
							<div class="form-group col-lg-2">
                                <label>Location ID</label>
                                <input type="location_id" name="location_id" class="form-control" value="<?php //enho $location_id;?>">
                            </div>
							
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>


    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12 text-center">
				
					<div class="form-group col-lg-12">
                    <input type="hidden" name="save" value="contact">
                    <button type="submit" class="btn btn-default" name = "add">Add User</button>
                    </div>
					
					<div class="form-group col-lg-12">
                    <input type="hidden" name="save" value="contact">
                    <button type="submit" class="btn btn-default" name = "delete">Delete User</button>
                    </div>
					
					<div class="form-group col-lg-12">
                    <input type="hidden" name="save" value="contact">
                    <button type="submit" class="btn btn-default" name = "update">Update User</button>
                    </div>
			
				</div>
			</div>
		</div>	
	</div>
    <!-- /.container -->

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>Copyright &copy ISight<br />
						Design &amp development by TeamVisionTUT<br />
					</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
