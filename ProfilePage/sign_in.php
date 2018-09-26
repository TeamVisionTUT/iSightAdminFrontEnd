<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sign in | ISight</title>

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
                <a class="navbar-brand" href="index.html">ISight</a>
				
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
                    <li>
                        <a href="index.html">Home</a>
                    </li>
                    <li>
                        <a href="about.html">About Us</a>
                    </li>
                    <li>
                        <a href="contact.html">Contact Us</a>
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
                <div class="col-lg-12 text-center">
					<h3>Please enter your login details or click "sign up" to create an account</h3>
					<form name="form" class="modal-content animate" action=""  method="get">
						<p> 
						<!--
						<input type="radio" name="gender" id="cust" onclick="checkButton()" checked /> Customer
						<input type="radio" name="gender" id="admin" onclick="checkButton()" /> Administrator<br>
						
						-->
						</p>
						<label><h2 class="intro-text text-center"><b>Email Address: 
						</b></h2></label>
						<input type="text" placeholder="Enter Email Address" name="reg_id"pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,3}$"required 
						title="please enter email in the following format: me@example.com" "placeholder="me@example.com" /><br />
					
						<label><h2 class="intro-text text-center"><b>Password: 
						</b></h2></label>
						<input type="password" placeholder="Enter Password" name="password" required/>
						<p><a href = "index.html"><input type="submit" value="SIGN IN" name="sub"></a>
							
						</button></p>
						<p>Not registered? <a href="sign up.html">Click here!</a></p>
						<p><span class="psw">Forgotten your password? <a href="password reset.html" >Click here to receive your password</a>
						</span></p>
					</form>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container -->
<?php
include 'controllers/userController.php';

$run = new UserController();

	if(isset($_GET['reg_id']) && isset($_GET['password'])){
		$username = $_GET['reg_id'];
		$password = $_GET['password'];
		
		$run->login($username, $password);
	}

?>
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

	<?php
	
	?>
	
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	
	<!-- Login -->
	<script src="js/sign in.js"></script>
</body>

</html>
