<?php
global $con;
session_start();
include("config.php");
$error="";
$msg="";
if(isset($_REQUEST['login']))
{
	$email=$_REQUEST['email'];
	$pass=$_REQUEST['pass'];
	$pass= sha1($pass);
	
	if(!empty($email) && !empty($pass))
	{
		$sql = "SELECT * FROM user where uemail='$email' && upass='$pass'";
		$result=mysqli_query($con, $sql);
		$row=mysqli_fetch_array($result);
		   if($row){
			   
				$_SESSION['uid']=$row['uid'];
				$_SESSION['uemail']=$email;
				$_SESSION['house_rented']=$row['house_rented'];
				header("location:index.php");
				
		   }
		   else{
			   $error = "<p class='alert alert-warning'>Email or Password doesnot match!</p> ";
		   }
	}else{
		$error = "<p class='alert alert-warning'>Please Fill all the fields</p>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Meta Tags -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="shortcut icon" href="images/favicon.ico">

<!--	Fonts
	========================================================-->
<link href="https://fonts.googleapis.com/css?family=Muli:400,400i,500,600,700&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Comfortaa:400,700" rel="stylesheet">

<!--	Css Link
	========================================================-->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-slider.css">
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="css/layerslider.css">
<link rel="stylesheet" type="text/css" href="css/color.css">
<link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="fonts/flaticon/flaticon.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/login.css">

<style>
/* Custom Login Redesign */
.loginbox-custom {
  display: flex;
  max-width: 820px;
  min-height: 420px;
  box-shadow: 0 8px 32px 0 rgba(31,38,135,0.15);
  border-radius: 14px;
  overflow: hidden;
  margin: 3rem auto;
  background: #fff;
}
.loginbox-custom .login-left {
  position: relative;
  width: 50%;
  min-height: 420px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: flex-start;
  padding: 40px 30px;
  color: #fff;
  background: url('images/banner/cover.jpg') center center/cover no-repeat;
  overflow: hidden;
}
.loginbox-custom .login-left::before {
  content: '';
  position: absolute;
  top: 0; left: 0; right: 0; bottom: 0;
  background: rgba(30, 41, 59, 0.45);
  backdrop-filter: blur(1px);
  z-index: 1;
}
.loginbox-custom .login-left-content {
  position: relative;
  z-index: 2;
}
.loginbox-custom .login-left-content h2 {
  font-size: 2rem;
  font-weight: 700;
  margin-bottom: 10px;
}
.loginbox-custom .login-left-content p {
  font-size: 1.1rem;
  font-weight: 400;
  max-width: 320px;
}
.loginbox-custom .login-right {
  width: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  background: #fff;
}
.loginbox-custom .login-right-wrap {
  width: 100%;
  max-width: 320px;
}
.loginbox-custom .login-right-wrap h1 {
  font-size: 1.7rem;
  font-weight: 600;
  text-align: center;
  margin-bottom: 8px;
}
.loginbox-custom .form-control {
  height: 44px;
  font-size: 1rem;
  margin-bottom: 18px;
}
.loginbox-custom .btn-primary {
  background:rgb(40, 41, 41);
  border: none;
  height: 44px;
  font-size: 1.1rem;
  font-weight: 600;
}
.loginbox-custom .signup-link {
  text-align: center;
  margin-top: 22px;
  font-size: 1rem;
  color: #888;
}
.loginbox-custom .signup-link a {
  color: #2196f3;
  text-decoration: none;
}
@media (max-width: 900px) {
  .loginbox-custom { flex-direction: column; min-height: unset; }
  .loginbox-custom .login-left, .loginbox-custom .login-right { width: 100%; min-height: 220px; }
}
</style>

<!--	Title
	=========================================================-->
	<title>PowerMoto Building</title>

</head>
<body>

<!--	Page Loader
=============================================================
<div class="page-loader position-fixed z-index-9999 w-100 bg-white vh-100">
	<div class="d-flex justify-content-center y-middle position-relative">
	  <div class="spinner-border" role="status">
		<span class="sr-only">Loading...</span>
	  </div>
	</div>
</div>
--> 


<div id="page-wrapper">
    <div class="row"> 
        <!--	Header start  -->
		<?php include("include/header.php");?>
        <!--	Header end  -->
        
        <!--	Banner   --->
        <!-- <div class="banner-full-row page-banner" style="background-image:url('images/breadcromb.jpg');">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="page-name float-left text-white text-uppercase mt-1 mb-0"><b>Login</b></h2>
                    </div>
                    <div class="col-md-6">
                        <nav aria-label="breadcrumb" class="float-left float-md-right">
                            <ol class="breadcrumb bg-transparent m-0 p-0">
                                <li class="breadcrumb-item text-white"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Login</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div> -->
         <!--	Banner   --->
		 
		 
		 
        <div class="page-wrappers login-body full-row bg-gray">
            <div class="login-wrapper">
                <div class="container">
                    <div class="loginbox-custom">
                        <!-- Left Side with Image and Welcome Text -->
                        <div class="login-left">
                          <div class="login-left-content">
                            <h2>Welcome Back</h2>
                            <p>Please log in using your personal information to stay connected with us.</p>
                          </div>
                        </div>
                        <!-- Right Side with Login Form -->
                        <div class="login-right">
                            <div class="login-right-wrap">
                                <h1>LOGIN</h1>
                                <form method="post">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="pass" class="form-control" placeholder="Password" required>
                                    </div>
                                
                                    <button class="btn btn-primary w-100" name="login" value="Login" type="submit">Log In</button>
                                </form>
                                <?php echo $error; ?><?php echo $msg; ?>
                                <div class="signup-link">
                                    Don't have an account? <a href="register.php">Signup</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	<!--	login  -->
        
        
        <!--	Footer   start-->
		<?php include("include/footer.php");?>
		<!--	Footer   start-->
        
        <!-- Scroll to top --> 
        <a href="#" class="bg-secondary text-white hover-text-secondary" id="scroll"><i class="fas fa-angle-up"></i></a> 
        <!-- End Scroll To top --> 
    </div>
</div>
<!-- Wrapper End --> 

<!--	Js Link
============================================================--> 
<script src="js/jquery.min.js"></script> 
<!--jQuery Layer Slider --> 
<script src="js/greensock.js"></script> 
<script src="js/layerslider.transitions.js"></script> 
<script src="js/layerslider.kreaturamedia.jquery.js"></script> 
<!--jQuery Layer Slider --> 
<script src="js/popper.min.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/owl.carousel.min.js"></script> 
<script src="js/tmpl.js"></script> 
<script src="js/jquery.dependClass-0.1.js"></script> 
<script src="js/draggable-0.1.js"></script> 
<script src="js/jquery.slider.js"></script> 
<script src="js/wow.js"></script> 
<script src="js/custom.js"></script>
</body>
</html>