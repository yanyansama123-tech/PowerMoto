<?php 
include("config.php");
$error="";
$msg="";
if(isset($_POST['send']))
{
	$name=$_POST['name'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$subject=$_POST['subject'];
	$message=$_POST['message'];
	
	if(!empty($name) && !empty($email) && !empty($phone) && !empty($subject) && !empty($message))
	{
		
		$sql="INSERT INTO contact (name,email,phone,subject,message) VALUES ('$name','$email','$phone','$subject','$message')";
		   $result=mysqli_query($con, $sql);
		   if($result){
			   $msg = "<p class='alert alert-success'>Message Send Successfully</p> ";
		   }
		   else{
			   $error = "<p class='alert alert-warning'>Message Not Send Successfully</p> ";
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
<link href="https://fonts.googleapis.com/css?family=Muli:400,400i,500,600,700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Comfortaa:400,700" rel="stylesheet">

<!--	Css Link
	========================================================-->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-slider.css">
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="css/layerslider.css">
<link rel="stylesheet" type="text/css" href="css/color.css" id="color-change">
<link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="fonts/flaticon/flaticon.css">
<link rel="stylesheet" type="text/css" href="css/style.css">

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
        
        <!--	Banner -->
        <!-- <div class="banner-full-row page-banner" style="background-image:url('images/breadcromb.jpg');">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="page-name float-left text-white text-uppercase mt-1 mb-0"><b>Contact</b></h2>
                    </div>
                    <div class="col-md-6">
                        <nav aria-label="breadcrumb" class="float-left float-md-right">
                            <ol class="breadcrumb bg-transparent m-0 p-0">
                                <li class="breadcrumb-item text-white"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Contact</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div> -->
        <!--	Banner -->

        <!-- Contact Information -->
        <div class="full-row" style="background: #fff; min-height: 100vh; display: flex; align-items: center; justify-content: center;">
            <div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
                <div class="row w-100 justify-content-center align-items-center">
                    <div class="col-lg-8 mx-auto">
                        <div class="card p-5 shadow-lg" style="background: #fff; border-radius: 18px; border: none; color: #222;">
                            <h2 class="text-center mb-5" style="color: #222; font-size: 2.5rem; font-weight: 600;">Send Message</h2>
                            <?php echo $msg; ?><?php echo $error; ?>
                            <form class="w-100" action="#" method="post">
                                <div class="row mb-4">
                                    <div class="form-group col-md-6 mb-4">
                                        <label for="name" style="color:#222;font-weight:600;">Your Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Enter your name" style="background: #fff; color: #222; border: 1px solid #bbb;">
                                    </div>
                                    <div class="form-group col-md-6 mb-4">
                                        <label for="email" style="color:#222;font-weight:600;">Email Address</label>
                                        <input type="text" name="email" class="form-control" placeholder="Enter your email" style="background: #fff; color: #222; border: 1px solid #bbb;">
                                    </div>
                                    <div class="form-group col-md-6 mb-4">
                                        <label for="phone" style="color:#222;font-weight:600;">Phone</label>
                                        <input type="text" name="phone" class="form-control" placeholder="Enter your phone" maxlength="10" style="background: #fff; color: #222; border: 1px solid #bbb;">
                                    </div>
                                    <div class="form-group col-md-6 mb-4">
                                        <label for="subject" style="color:#222;font-weight:600;">Subject</label>
                                        <input type="text" name="subject" class="form-control" placeholder="Enter subject" style="background: #fff; color: #222; border: 1px solid #bbb;">
                                    </div>
                                    <div class="form-group col-12 mb-4">
                                        <label for="message" style="color:#222;font-weight:600;">Message</label>
                                        <textarea name="message" class="form-control" rows="5" placeholder="Type your message here..." style="background: #fff; color: #222; border: 1px solid #bbb;"></textarea>
                                    </div>
                                </div>
                                <button type="submit" value="send message" name="send" class="btn d-block mx-auto mt-3" style="background: linear-gradient(90deg, #434a54 0%, #7b8794 100%); color: #fff; font-size: 1.1rem; font-weight: 700; border-radius: 16px; padding: 0.7rem 2.5rem; border: none;">Send Message</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact Information -->
        
        <!--	Map -->
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3670.6706528554723!2d121.08038989999999!3d14.556474799999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c79ec55c3e15%3A0xf6cd7f755ed6def2!2sTeodora%20Compound!5e1!3m2!1sfil!2sph!4v1752757165070!5m2!1sfil!2sph" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
		<!--	Map -->
        
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
<script src="js/jquery.cookie.js"></script> 
<script src="js/custom.js"></script>  

</body>
</html>