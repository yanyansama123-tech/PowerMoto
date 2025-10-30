<?php
global $con;
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
include("config.php");
include('start-bot.php');
								
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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

<!--	Page Loader  -->
<!--<div class="page-loader position-fixed z-index-9999 w-100 bg-white vh-100">
	<div class="d-flex justify-content-center y-middle position-relative">
	  <div class="spinner-border" role="status">
		<span class="sr-only">Loading...</span>
	  </div>
	</div>
</div>  -->
<!--	Page Loader  -->

<div id="page-wrapper">
    <div class="row"> 
        <!--	Header start  -->
		<?php include("include/header.php");?>
        <!--	Header end  -->
		
        <!--	Banner Start   -->
        <div class="overlay-black w-100 slider-banner1 position-relative" style="background-image: url('images/banner/cover.jpg'); background-size: cover; background-position: center center; background-repeat: no-repeat; min-height: 90vh; display: flex; align-items: center;">
            <div class="container h-100 d-flex flex-column justify-content-center align-items-center" style="z-index:2;">
                <div class="row w-100 justify-content-center align-items-center" style="height:100%;">
                    <div class="col-lg-10 mx-auto text-center">
                        <h1 class="mb-4 font-weight-bold" style="font-size:5rem; color:#fff; text-shadow:0 4px 24px rgba(0,0,0,0.3);">Discover Your <br> New Home</h1>
                        <p class="lead mb-5" style="color:#e0e0e0; font-size:1.5rem; max-width:700px; margin:0 auto;"></p>
                        <div class="d-flex justify-content-center gap-3 flex-wrap">
                            <a href="property.php" class="btn btn-lg btn-white font-weight-bold px-5 py-3 mr-3" style="font-size:1.25rem; border-radius:2.5rem; box-shadow:0 2px 8px rgba(0,0,0,0.08);">Explore Rooms</a>
                            <a href="contact.php" class="btn btn-lg btn-outline-light font-weight-bold px-5 py-3" style="font-size:1.25rem; border-radius:2.5rem; border:2px solid #fff;">Contact Us</a>
                        </div>
                        <div class="mt-5">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--	Banner End  -->

        <!--	Text Block One
		======================================================-->
        <div class="full-row bg-gray">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="text-secondary text-center mb-5"></h2>
                    </div>
                </div>
                <div class="text-box-one">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-md-6">
                            <div class="p-4 text-center hover-bg-white hover-shadow rounded mb-4 transation-3s">
                                <h4 class="text-secondary hover-text-primary py-3 m-0"><a href="#">Over View</a></h4>
                                <p>Find it. Apply for it. Pay for it—all in one place. Enjoy the easiest way to rent with the biggest online network at your fingertips.</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
		<!-----  Our Services  ---->
		
        <!--	Recent Properties  -->
        
		<!--	Recent Properties  -->
        
        <!--	Why Choose Us -->
        <div class="full-row living" style="background: url('images/main-bg.jpg') center center/cover no-repeat; min-height: 60vh; display: flex; align-items: center; justify-content: center;">
            <div class="container d-flex justify-content-center align-items-center" style="min-height: 60vh;">
                <div class="row w-100 justify-content-center align-items-center">
                    <div class="col-md-10 col-lg-8 mx-auto">
                        <div class="text-center text-white p-4" style="background: transparent;">
                            <h3 class="pb-4 mb-3" style="color: #fff; font-size: 2.5rem; font-weight: 700;">The Home You Deserve Us</h3>
                            <ul class="list-unstyled" style="color: #fff;">
                                <li class="mb-4">
                                    <h5 style="font-size: 1.5rem; font-weight: 600;">Highly Rated & Trusted</h5>
                                    <p>Recognized by clients and industry experts, we’re known for delivering outstanding service with integrity and care.</p>
                                </li>
                                <li class="mb-4">
                                    <h5 style="font-size: 1.5rem; font-weight: 600;">Experience Quality</h5>
                                    <p>Quality is our promise. We go beyond expectations to ensure reliable, top-tier results every time.</p>
                                </li>
                                <li class="mb-4">
                                    <h5 style="font-size: 1.5rem; font-weight: 600;">Expert Team</h5>
                                    <p>With years of experience, our dedicated team offers personalized solutions, delivered with professionalism and heart.</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<!--	why choose us -->
		
		<!-- How It Work (Modernized) -->
        <div class="full-row py-5 bg-white">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center mb-5">
                        <h2 class="text-dark font-weight-bold mb-2" style="font-size:2.5rem;">Our Process</h2>
                    </div>
                </div>
                <div class="row justify-content-center align-items-start position-relative modern-how-steps">
                    <div class="col-md-4 d-flex flex-column align-items-center mb-4 mb-md-0">
                        <div class="how-step-card shadow-sm bg-white rounded p-4 text-center position-relative">
                            <div class="how-step-number bg-primary text-white rounded-circle d-flex align-items-center justify-content-center mb-3" style="width:44px;height:44px;font-size:1.2rem;position:absolute;top:-22px;left:50%;transform:translateX(-50%);">1</div>
                            <div class="how-step-icon mb-3"></div>
                            <h5 class="font-weight-bold text-dark mb-3">Discussion</h5>
                            <p class="text-muted mb-0">We start by understanding your needs through an in-depth discussion. This helps us align our approach with your goals for a tailored experience.</p>
                        </div>
                    </div>
                    <div class="how-step-connector d-none d-md-block"></div>
                    <div class="col-md-4 d-flex flex-column align-items-center mb-4 mb-md-0">
                        <div class="how-step-card shadow-sm bg-white rounded p-4 text-center position-relative">
                            <div class="how-step-number bg-primary text-white rounded-circle d-flex align-items-center justify-content-center mb-3" style="width:44px;height:44px;font-size:1.2rem;position:absolute;top:-22px;left:50%;transform:translateX(-50%);">2</div>
                            <div class="how-step-icon mb-3"></div>
                            <h5 class="font-weight-bold text-dark mb-3">Files Review</h5>
                            <p class="text-muted mb-0">Next, we conduct a thorough review of all relevant files to ensure every detail is considered. This step guarantees accuracy and a complete understanding of your requirements.</p>
                        </div>
                    </div>
                    <div class="how-step-connector d-none d-md-block"></div>
                    <div class="col-md-4 d-flex flex-column align-items-center">
                        <div class="how-step-card shadow-sm bg-white rounded p-4 text-center position-relative">
                            <div class="how-step-number bg-primary text-white rounded-circle d-flex align-items-center justify-content-center mb-3" style="width:44px;height:44px;font-size:1.2rem;position:absolute;top:-22px;left:50%;transform:translateX(-50%);">3</div>
                            <div class="how-step-icon mb-3"></div>
                            <h5 class="font-weight-bold text-dark mb-3">Acquire</h5>
                            <p class="text-muted mb-0">Once everything is confirmed, you can confidently acquire our services. We handle the rest, ensuring a smooth and efficient process from start to finish.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End How It Work (Modernized) -->
        
        <!--	Achievement
        ============================================================-->
        <div class="full-row py-5" style="background: #f4f6fa;">
            <div class="container">
                <div class="fact-counter">
                    <div class="row justify-content-center align-items-center text-center" style="gap: 2rem;">
                        <div class="col-md-4 mb-4 mb-md-0">
                            <div class="count wow mb-3" data-wow-duration="300ms" style="font-size: 2.8rem; color: #2563eb; font-weight: 700;">
                                <?php
                                    $query=mysqli_query($con,"SELECT count(pid) FROM property where stype='rent'");
                                    while($row=mysqli_fetch_array($query))
                                    {
                                ?>
                                <span class="count-num" data-speed="3000" data-stop="<?php 
                                    $total = $row[0];
                                    echo $total;?>">0</span>
                                <?php } ?>
                            </div>
                            <div class="h5" style="color: #222; font-family: 'Comfortaa', 'Muli', sans-serif; font-weight: 600;">Room Available</div>
                        </div>
                        <div class="col-md-4 mb-4 mb-md-0">
                            <div class="count wow mb-3" data-wow-duration="300ms" style="font-size: 2.8rem; color: #2563eb; font-weight: 700;">
                                <?php
                                    $query=mysqli_query($con,"SELECT count(uid) FROM user");
                                    while($row=mysqli_fetch_array($query))
                                    {
                                ?>
                                <span class="count-num" data-speed="3000" data-stop="<?php 
                                    $total = $row[0];
                                    echo $total;?>">0</span>
                                <?php } ?>
                            </div>
                            <div class="h5" style="color: #222; font-family: 'Comfortaa', 'Muli', sans-serif; font-weight: 600;">Registered Users</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!--	Popular Place -->
        <!-- <div class="full-row bg-gray">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="text-secondary double-down-line text-center mb-5">Popular Places</h2></div>
                </div>
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-md-6 col-lg-3 pb-1">
                            <div class="overflow-hidden position-relative overlay-secondary hover-zoomer mx-n13 z-index-9"> <img src="images/thumbnail4/1.jpg" alt="">
                                <div class="text-white xy-center z-index-9 position-absolute text-center w-100">
									<?php
										$query=mysqli_query($con,"SELECT count(state), property.* FROM property where city='Olisphis'");
											while($row=mysqli_fetch_array($query))
												{
										?>
                                    <h4 class="hover-text-primary text-capitalize"><a href="stateproperty.php?id=<?php echo $row['17']?>"><?php echo $row['state'];?></a></h4>
                                    <span><?php 
												$total = $row[0];
												echo $total;?> Properties Listed</span> </div>
									<?php } ?>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 pb-1">
                            <div class="overflow-hidden position-relative overlay-secondary hover-zoomer mx-n13 z-index-9"> <img src="images/thumbnail4/2.jpg" alt="">
                                <div class="text-white xy-center z-index-9 position-absolute text-center w-100">
									<?php
										$query=mysqli_query($con,"SELECT count(state), property.* FROM property where city='Awrerton'");
											while($row=mysqli_fetch_array($query))
												{
										?>
                                    <h4 class="hover-text-primary text-capitalize"><a href="stateproperty.php?id=<?php echo $row['17']?>"><?php echo $row['state'];?></a></h4>
                                    <span><?php 
												$total = $row[0];
												echo $total;?> Properties Listed</span> </div>
									<?php } ?>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 pb-1">
                            <div class="overflow-hidden position-relative overlay-secondary hover-zoomer mx-n13 z-index-9"> <img src="images/thumbnail4/3.jpg" alt="">
                                <div class="text-white xy-center z-index-9 position-absolute text-center w-100">
                                    <?php
										$query=mysqli_query($con,"SELECT count(state), property.* FROM property where city='Floson'");
											while($row=mysqli_fetch_array($query))
												{
										?>
                                    <h4 class="hover-text-primary text-capitalize"><a href="stateproperty.php?id=<?php echo $row['17']?>"><?php echo $row['state'];?></a></h4>
                                    <span><?php 
												$total = $row[0];
												echo $total;?> Properties Listed</span> </div>
									<?php } ?>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 pb-1">
                            <div class="overflow-hidden position-relative overlay-secondary hover-zoomer mx-n13 z-index-9"> <img src="images/thumbnail4/4.jpg" alt="">
                                <div class="text-white xy-center z-index-9 position-absolute text-center w-100">
                                    <?php
										$query=mysqli_query($con,"SELECT count(state), property.* FROM property where city='Ulmore'");
											while($row=mysqli_fetch_array($query))
												{
										?>
                                    <h4 class="hover-text-primary text-capitalize"><a href="stateproperty.php?id=<?php echo $row['17']?>"><?php echo $row['state'];?></a></h4>
                                    <span><?php 
												$total = $row[0];
												echo $total;?> Properties Listed</span> </div>
									<?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!--	Popular Places -->
		
		<!-- Testimonial (Modernized) -->
<div class="full-row bg-white py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="text-center mb-5">
                    <h2 class="text-dark font-weight-bold mb-2" style="font-size:2.2rem;"> Client Reviews</h2>
                </div>
                <div class="row g-4 justify-content-center">
                    <?php
                        $query=mysqli_query($con,"select feedback.*, user.* from feedback,user where feedback.uid=user.uid and feedback.status='1'");
                        while($row=mysqli_fetch_array($query))
                        {
                            $initials = strtoupper(substr($row['uname'],0,1));
                    ?>
                    <div class="col-md-6 col-lg-4 d-flex align-items-stretch">
                        <div class="review-card bg-white border rounded shadow-sm p-4 d-flex flex-column w-100">
                            <div class="d-flex align-items-center mb-3">
                                <div class="review-avatar d-flex align-items-center justify-content-center mr-3" style="width:48px;height:48px;border-radius:50%;background:#5b6dfa;color:#fff;font-size:1.5rem;font-weight:700;">
                                    <?php echo $initials; ?>
                                </div>
                                <div>
                                    <span class="font-weight-bold text-dark" style="font-size:1.1rem;">Verified Renter</span><br>
                                    <span class="text-muted" style="font-size:0.95rem;"> <?php echo $row['utype']; ?> </span>
                                </div>
                                <span class="ml-auto" style="color:#4ade80;font-size:1.2rem;"><i class="fas fa-recycle"></i></span>
                            </div>
                            <div class="mb-2">
                                <span style="color:#ffc107;font-size:1.2rem;">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </span>
                            </div>
                            <div class="flex-grow-1">
                                <p class="mb-0 text-dark" style="font-size:1.08rem;line-height:1.5;"><b><?php echo $row['2']; ?></b></p>
                            </div>
                        </div>
                    </div>
                    <?php }  ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Testimonial (Modernized) -->
		
		<!--	Footer   start-->
		<?php include("include/footer.php");?>
		<!--	Footer   start-->


        <!-- Scroll to top --> 
        <a href="#" class="bg-primary text-white hover-text-secondary" id="scroll"><i class="fas fa-angle-up"></i></a> 
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
<script src="js/YouTubePopUp.jquery.js"></script> 
<script src="js/validate.js"></script> 
<script src="js/jquery.cookie.js"></script> 
<script src="js/custom.js"></script>
</body>

</html>