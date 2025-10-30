<?php 
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
include("config.php");
if(!isset($_SESSION['uemail']))
{
	header("location:login.php");
}

////// code


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
        <div class="" style="background-image:url('');">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                    </div>
                    <div class="col-md-6">
                        <nav aria-label="breadcrumb" class="float-left float-md-right">
                            <ol class="breadcrumb bg-transparent m-0 p-0">
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
         <!--	Banner   --->
		 
		 
		<!--	Submit property   -->
        <div class="full-row" style="background: #f5f6fa; min-height: 90vh; display: flex; align-items: center;">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="card p-5 shadow-lg" style="background: #fff; border-radius: 18px; border: none;">
                            <div class="row align-items-center">
                                <div class="col-lg-6 col-md-12 mb-4 mb-lg-0">
                                    <form action="SentimentDraft.php" method="post">
                                        <h3 class="mb-4" style="font-weight:700; color:#000000;">Feedback Form</h3>
                                        <?php 
                                            if(isset($_GET['message'])) { echo $_GET['message']; }
                                            if(isset($_GET['error'])) { echo $_GET['error']; }
                                        ?>
                                        <div class="form-group">
                                            <textarea class="form-control" name="content" rows="8" placeholder="Enter Your Feedback..." style="border-radius:10px;"></textarea>
                                        </div>
                                        <input type="submit" class="btn btn-info mt-3 px-4 py-2 feedback-btn-dark" name="insert" value="Send Feedback" style="border-radius:8px;font-weight:600;">
                                    </form>
                                </div>
                                <div class="col-lg-1 d-none d-lg-block"></div>
                                <div class="col-lg-5 col-md-12 text-center">
                                    <?php 
                                        $uid=$_SESSION['uid'];
                                        $query=mysqli_query($con,"SELECT * FROM user WHERE uid=$uid");
                                        while($row=mysqli_fetch_array($query))
                                        {
                                    ?>
                                    <div class="user-info d-flex flex-column align-items-center">
                                        <img src="admin/user/<?php echo $row['6'];?>" alt="userimage" class="rounded-circle shadow mb-3" style="width:220px;height:220px;object-fit:cover;border:4px solid #ececec;">
                                        <div class="font-18 mt-2 text-left w-100">
                                            <div class="mb-1 text-capitalize"><b>Name:</b> <?php echo $row['1'];?></div>
                                            <div class="mb-1"><b>Email:</b> <?php echo $row['2'];?></div>
                                            <div class="mb-1"><b>Contact:</b> <?php echo $row['3'];?></div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <style>
        .card {
            box-shadow: 0 2px 16px rgba(44,62,80,0.07);
            border-radius: 18px;
            border: none;
        }
        .user-info .font-18 {
            font-size: 1.1rem;
            color: #222;
            margin-top: 1.2rem;
        }
        .user-info img {
            background: #f5f5f5;
        }
        @media (max-width: 991.98px) {
            .card { padding: 2rem 1rem; }
            .user-info img { width: 90px; height: 90px; }
        }
        .feedback-btn-dark {
            background: rgb(40, 41, 41) !important;
            border: none !important;
            color: #fff !important;
        }
        </style>
	<!--	Submit property   -->
      
        
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