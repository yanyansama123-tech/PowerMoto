<?php

use Google\Service\Adsense\Payment;

global $con;
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
include("config.php");
if(!isset($_SESSION['uemail']))
{
	header("location:login.php");
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
    <link rel="stylesheet" href="chatbot-deployment/static/style.css">
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
<title>Philip and Aurea Apartment</title>
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
        <div class="banner-full-row page-banner" style="background-image:url('images/breadcromb.jpg');">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="page-name float-left text-white text-uppercase mt-1 mb-0"><b>User Listed Room</b></h2>
                    </div>
                    <div class="col-md-6">
                        <nav aria-label="breadcrumb" class="float-left float-md-right">
                            <ol class="breadcrumb bg-transparent m-0 p-0">
                                <li class="breadcrumb-item text-white"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">User Listed Room</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
         <!--	Banner   --->
		 
		 
		<!--	Submit property   -->
        <div class="full-row bg-gray">
            <div class="container">
                    <div class="row mb-5">
						<div class="col-lg-12">
							<h2 class="text-secondary double-down-line text-center">My Room</h2>
							<?php 
								if(isset($_GET['msg']))	
								echo $_GET['msg'];	
							?>
                        </div>
					</div>
					<table class="items-list col-lg-12 table-hover" style="border-collapse:inherit;">
                        <thead>
                             <tr  class="bg-dark">
                                <th class="text-white font-weight-bolder">Room</th>
                                <th class="text-white font-weight-bolder">Type</th>
                                <th class="text-white font-weight-bolder">Lease Date</th>
                                <th class="text-white font-weight-bolder">Payment Status</th>
                                <th class="text-white font-weight-bolder">Coverage Period</th>
                                <th class="text-white font-weight-bolder">Amount Due</th>
                                <th class="text-white font-weight-bolder">Pay</th>
                             </tr>  
                        </thead>
                        <tbody>
                            <form action="pay.php" method="post">
                            <?php 
							$pid=$_SESSION['house_rented'];
                            $uid=$_SESSION['uid'];
                            
                            if ($pid) {
                                $query=mysqli_query($con,"SELECT * FROM property WHERE pid=$pid");
                                $paymentQuery = mysqli_query($con, "SELECT * FROM payment 
                                WHERE uid=$uid 
                                ORDER BY payment_date DESC 
                                LIMIT 1");
                                
                                $paymentRow = mysqli_fetch_array($paymentQuery);
                                while($row=mysqli_fetch_array($query))
                                {
                            ?>
                            <tr>
                                <input style="display: none;" value="<?php echo $row['14'] ?>" type="number" name="amount">
                                <?php
                                    $userquery=mysqli_query($con,"SELECT * FROM user WHERE house_rented=$pid");
                                    $rowuser=mysqli_fetch_assoc($userquery)
                                ?>
                                <input style="display: none;" value="<?php echo $rowuser['uid'] ?>" type="text" name="user">
                                <td style="width: 350px">
									<img src="admin/property/<?php echo $row['19'];?>" alt="pimage">
                                    <div class="property-info d-table">
                                        <h5 class="text-secondary text-capitalize"><a href="propertydetail.php?pid=<?php echo $row['0'];?>"><?php echo $row['1'];?></a></h5>
                                        <span class="font-14 text-capitalize"><i class="fas fa-map-marker-alt text-success font-13"></i>&nbsp; <?php echo $row['11'];?></span>
                                        <div class="price mt-3">
											<span class="text-success">₱&nbsp;<?php echo number_format($row['14'],2);?></span>
										</div>
                                    </div>
								</td>
                                <td class="text-capitalize">For <?php echo $row['stype'];?></td>
                                <td><?php echo $row['date'];?></td>
                                <td class="text-capitalize" style="text-align: center">
                                    <?php
                                    if (isset($paymentRow)) {
                                        $currentDate = new DateTime();
                                        $coverageEnd = new DateTime($paymentRow['coverage_end']);
                                        
                                        if ($currentDate > $coverageEnd) {
                                            echo '<span class="badge badge-danger">Payment Required</span>';
                                            $showPayButton = true;
                                        } else {
                                            echo '<span class="badge badge-success">Paid Until ' . $coverageEnd->format('M d, Y') . '</span>';
                                            $showPayButton = false;
                                        }
                                    } else {
                                        echo '<span class="badge badge-warning">First Payment Required <br><br>+ ₱' . number_format($row['14'],2) . '<br><br> 1 month advance 1 month deposit</span>';
                                        $showPayButton = true;
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if (isset($paymentRow)) {
                                        echo date("M d, Y",strtotime($paymentRow['coverage_start'])) . ' - ' . 
                                        date("M d, Y",strtotime($paymentRow['coverage_end']));
                                    } else {
                                        echo "No previous payments";
                                    }
                                    ?>
                                </td>
                                <td class="text-success">₱<?php 
                                    $amount = $row['14'];
                                    if (!isset($paymentRow)) {
                                        $amount *= 2; // First time payment (1 month advance + 1 month deposit)
                                    }
                                    echo number_format($amount,2);
                                ?></td>
                                <td>
                                    <?php if ($showPayButton): ?>
                                        <button type="submit" name='pay' class="btn btn-primary">Pay Now</button>
                                    <?php else: ?>
                                        <button type="button" class="btn btn-secondary" disabled>Paid</button>
                                    <?php endif; ?>
                                </td>
                            </tr>
							<?php } 
                            } else {
                                echo "<tr><td colspan='7' style='text-align: center;'>No data available</td></tr>";
                            }
                            ?>
                            </form>
                        </tbody>
                    </table>         
                    <div>
                        <p style="text-align: center; margin-top: 5rem">Note: If you are first time to pay, you are required to pay the 1 month advance and 1 month deposit.</p>
                    </div>   

                    <?php
                    // Display Rental Agreement if available
                    if(isset($_SESSION['uid'])) {
                        $uid = $_SESSION['uid'];
                        $sql = "SELECT ra.*, p.title as room_title 
                               FROM rental_agreements ra
                               JOIN property p ON ra.property_id = p.pid
                               WHERE ra.user_id = ? 
                               ORDER BY ra.generated_date DESC 
                               LIMIT 1";
                        $stmt = $con->prepare($sql);
                        $stmt->bind_param("i", $uid);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        
                        if($row = $result->fetch_assoc()) {
                            ?>
                            <div class="row mt-5">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Rental Agreement - <?php echo $row['room_title']; ?></h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tr>
                                                        <th>Start Date:</th>
                                                        <td><?php echo date('M d, Y', strtotime($row['start_date'])); ?></td>
                                                        <th>End Date:</th>
                                                        <td><?php echo date('M d, Y', strtotime($row['end_date'])); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Monthly Rent:</th>
                                                        <td>₱<?php echo number_format($row['monthly_rent'], 2); ?></td>
                                                        <th>Security Deposit:</th>
                                                        <td>₱<?php echo number_format($row['security_deposit'], 2); ?></td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="text-center mt-3">
                                                <a href="agreements/<?php echo $row['agreement_file']; ?>" 
                                                   class="btn btn-primary" target="_blank">
                                                    View Full Agreement
                                                </a>
                                                <a href="agreements/<?php echo $row['agreement_file']; ?>" 
                                                   class="btn btn-success" download>
                                                    Download Agreement
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
            </div>
        </div>
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