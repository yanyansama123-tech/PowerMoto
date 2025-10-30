<?php 
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
include("config.php");
								
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
<meta name="description" content="Philip and Aurea Apartment">
<meta name="keywords" content="">
<meta name="author" content="Unicoder">
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
                        <h2 class="page-name float-left text-white text-uppercase mt-1 mb-0"><b>Property Detail</b></h2>
                    </div>
                    <div class="col-md-6">
                        <nav aria-label="breadcrumb" class="float-left float-md-right">
                            <ol class="breadcrumb bg-transparent m-0 p-0">
                                <li class="breadcrumb-item text-white"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Property Detail</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div> -->
         <!--	Banner   --->

		
        <div class="full-row">
            <div class="container">
                <div class="row">
				
					<?php
						$id=$_REQUEST['pid']; 
						$query=mysqli_query($con,"SELECT * from `property` WHERE pid='$id'");
						while($row=mysqli_fetch_array($query))
						{
					  ?>
				  

                    <div class="col-lg-8">

                        <div class="row">
                            <div class="col-md-12">
                                <div id="single-property" style="width:1200px; height:700px; margin:30px auto 50px;"> 
                                    <!-- Slide 1-->
                                    <div class="ls-slide" data-ls="duration:7500; transition2d:5; kenburnszoom:in; kenburnsscale:1.2;"> <img width="1920" height="1080" src="admin/property/<?php echo $row['19'];?>" class="ls-bg" alt="" /> </div>
                                    
                                    <!-- Slide 2-->
                                    <div class="ls-slide" data-ls="duration:7500; transition2d:5; kenburnszoom:in; kenburnsscale:1.2;"> <img width="1920" height="1080" src="admin/property/<?php echo $row['20'];?>" class="ls-bg" alt="" /> </div>
                                    
                                    <!-- Slide 3-->
                                    <div class="ls-slide" data-ls="duration:7500; transition2d:5; kenburnszoom:in; kenburnsscale:1.2;"> <img width="1920" height="1080" src="admin/property/<?php echo $row['21'];?>" class="ls-bg" alt="" /> </div>
									
									<!-- Slide 4-->
									<div class="ls-slide" data-ls="duration:7500; transition2d:5; kenburnszoom:in; kenburnsscale:1.2;"> <img width="1920" height="1080" src="admin/property/<?php echo $row['22'];?>" class="ls-bg" alt="" /> </div>
									
									<!-- Slide 5-->
									<div class="ls-slide" data-ls="duration:7500; transition2d:5; kenburnszoom:in; kenburnsscale:1.2;"> <img width="1920" height="1080" src="admin/property/<?php echo $row['23'];?>" class="ls-bg" alt="" /> </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h2 class="font-weight-bold mb-0" style="color:#444;font-size:2.1rem;">Single Room <?php echo $row['1']; ?></h2>
                                    <div class="bg-primary text-white px-4 py-2 rounded-pill shadow-sm" style="font-size:1rem;font-weight:600;box-shadow:0 2px 8px rgba(0,0,0,0.08);">For <?php echo $row['5'];?></div>
							</div>
                                <div class="mb-4" style="background: linear-gradient(90deg,#2d3546 0%,#49546a 100%); border-radius: 14px; padding: 1.2rem 2rem; color: #fff; font-size: 2rem; font-weight: 700;">
                                    <div class="d-flex flex-column">
                                        <span style="font-size:2rem;font-weight:800;letter-spacing:1px;">₱<?php echo number_format($row['14']);?></span>
                                        <span style="font-size:1rem;font-weight:400;opacity:0.85;">Monthly Rent</span>
                            </div>
                        </div>
                                <div class="row mb-4 g-3">
                                <div class="col-md-3 col-6">
                                        <div class="bg-white text-center p-4 rounded shadow-sm" style="border:1.5px solid #f0f0f0;">
                                            <i class="fas fa-vector-square text-primary mb-2" style="font-size:2rem;"></i>
                                            <div style="font-weight:700;font-size:1.2rem;"><?php echo $row['12'];?> sqm</div>
                                            <div style="font-size:0.98rem;color:#888;">Size</div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-6">
                                        <div class="bg-white text-center p-4 rounded shadow-sm" style="border:1.5px solid #f0f0f0;">
                                            <i class="fas fa-users text-primary mb-2" style="font-size:2rem;"></i>
                                            <div style="font-weight:700;font-size:1.2rem;"><?php echo $row['13'];?> Person</div>
                                            <div style="font-size:0.98rem;color:#888;">Capacity</div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-6">
                                        <div class="bg-white text-center p-4 rounded shadow-sm" style="border:1.5px solid #f0f0f0;">
                                            <i class="fas fa-bath text-primary mb-2" style="font-size:2rem;"></i>
                                            <div style="font-weight:700;font-size:1.2rem;">Shared Bath</div>
                                            <div style="font-size:0.98rem;color:#888;">Bathroom</div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-6">
                                        <div class="bg-white text-center p-4 rounded shadow-sm" style="border:1.5px solid #f0f0f0;">
                                            <i class="fas fa-building text-primary mb-2" style="font-size:2rem;"></i>
                                            <div style="font-weight:700;font-size:1.2rem;"><?php echo $row['11'];?></div>
                                            <div style="font-size:0.98rem;color:#888;">Floor</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6 mb-2 mb-md-0">
                                        <button onclick="<?php echo isset($_SESSION['uemail']) ? 'toReqTour()' : 'toLogin()'; ?>" class="btn w-100" style="background:#474c54;color:#fff;font-weight:600;font-size:1.1rem;border:none;">Request a tour</button>
                                    </div>
                                    <div class="col-md-6">
                                        <button onclick="toContact()" id="myContact" class="btn w-100" style="background:#474c54;color:#fff;font-weight:600;font-size:1.1rem;border:none;">Contact Us</button>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-12">
                                        <?php if(isset($_SESSION['uemail'])) {
                            $uid = $_SESSION['uid'];
                            $check_rented = mysqli_query($con, "SELECT house_rented FROM user WHERE uid = $uid");
                            $user_data = mysqli_fetch_assoc($check_rented);
                            $check_pending = mysqli_query($con, "SELECT r.*, r.admin_remarks, r.admin_action_date, p.title 
                                                               FROM room_requests r 
                                                               JOIN property p ON r.property_id = p.pid 
                                                               WHERE r.user_id = $uid 
                                                               AND (r.status = 'Pending' OR 
                                                                   (r.status IN ('Approved', 'Declined') AND r.property_id = " . $_GET['pid'] . "))
                                                               ORDER BY r.request_date DESC
                                                               LIMIT 1");
                            $pending_request = mysqli_fetch_assoc($check_pending);
                        ?>
                        <?php if ($user_data['house_rented']): ?>
                                                <button class="btn btn-secondary w-100" disabled title="You already have a rented room">Request Room</button>
                            <?php elseif ($pending_request): ?>
                                <?php if ($pending_request['status'] == 'Pending'): ?>
                                                    <button class="btn btn-warning w-100" disabled title="You have a pending request">
                                        Pending Request for <?php echo $pending_request['title']; ?>
                                    </button>
                                <?php elseif ($pending_request['status'] == 'Approved'): ?>
                                    <div class="alert alert-success">
                                        <strong>Request Approved!</strong><br>
                                        <?php if ($pending_request['admin_remarks']): ?>
                                            <small>Admin Remarks: <?php echo $pending_request['admin_remarks']; ?></small>
                                        <?php endif; ?>
                                        <div class="text-muted mt-1">
                                            <small>Approved on: <?php echo date('M d, Y', strtotime($pending_request['admin_action_date'])); ?></small>
                                        </div>
                                    </div>
                                <?php elseif ($pending_request['status'] == 'Declined'): ?>
                                    <div class="alert alert-danger">
                                        <strong>Request Declined</strong><br>
                                        <?php if ($pending_request['admin_remarks']): ?>
                                            <small class="d-block mb-2">Reason: <?php echo $pending_request['admin_remarks']; ?></small>
                                        <?php endif; ?>
                                        <div class="text-muted mb-2">
                                            <small>Declined on: <?php echo date('M d, Y', strtotime($pending_request['admin_action_date'])); ?></small>
                                        </div>
                                        <button onclick="openRequestModal(<?php echo $_GET['pid']; ?>, '<?php echo $pending_request['title']; ?>')" 
                                                class="btn btn-sm btn-primary">Request Again</button>
                                    </div>
                                <?php endif; ?>
                            <?php else: ?>
                                <button onclick="openRequestModal(<?php echo $_GET['pid']; ?>, '<?php echo $row['title']; ?>')" 
                                                        class="btn w-100" style="background:#474c54;color:#fff;font-weight:600;font-size:1.1rem;border:none;">Request Room</button>
                            <?php endif; ?>
                        <?php } else { ?>
                                            <button onclick="toLogin()" class="btn w-100 mb-2" style="background:#474c54;color:#fff;font-weight:600;font-size:1.1rem;border:none;">Request a Room</button>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Room Request Modal -->
                        <div class="modal fade" id="roomRequestModal" tabindex="-1" role="dialog" aria-labelledby="roomRequestModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="roomRequestModalLabel">Request Room</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form id="roomRequestForm" method="post" action="submit_room_request.php">
                                        <div class="modal-body">
                                            <input type="hidden" name="property_id" id="property_id">
                                            <input type="hidden" name="user_id" value="<?php echo isset($_SESSION['uid']) ? $_SESSION['uid'] : ''; ?>">
                                            
                                            <div class="form-group">
                                                <label>Room</label>
                                                <input type="text" class="form-control" id="room_title" readonly>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Desired Start Date</label>
                                                <input type="date" class="form-control" name="desired_start_date" required 
                                                    min="<?php echo date('Y-m-d'); ?>">
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Message (Optional)</label>
                                                <textarea class="form-control" name="message" rows="3" 
                                                    placeholder="Any specific requirements or questions?"></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Submit Request</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <script>
                        function openRequestModal(propertyId, title) {
                            document.getElementById('property_id').value = propertyId;
                            document.getElementById('room_title').value = title;
                            $('#roomRequestModal').modal('show');
                        }
                        </script>

                        <div class="property-details">
                            <!--
                            <div class="bg-gray property-quantity px-4 pt-4 w-100">
                                <ul>
                                    <li><span class="text-secondary"><?php echo $row['12'];?></span> Sqft</li>
                                    <li><span class="text-secondary"><?php echo $row['6'];?></span> Bedroom</li>
                                    <li><span class="text-secondary"><?php echo $row['7'];?></span> Bathroom</li>
                                    <li><span class="text-secondary"><?php echo $row['8'];?></span> Balcony</li>
                                    <li><span class="text-secondary"><?php echo $row['10'];?></span> Hall</li>
                                    <li><span class="text-secondary"><?php echo $row['9'];?></span> Kitchen</li>
                                </ul>
                            </div>
                            -->
                            <!-- <h4 class="text-secondary my-4">Description</h4>
                            <p><?php echo $row['2'];?></p> -->
                            <!--
                            <h5 class="mt-5 mb-4 text-secondary">Property Summary</h5>
                            <div  class="table-striped font-14 pb-2">
                                <table class="w-100">
                                    <tbody>
                                        <tr>
                                            <td>BHK :</td>
                                            <td class="text-capitalize"><?php echo $row['4'];?></td>
                                            <td>Property Type :</td>
                                            <td class="text-capitalize"><?php echo $row['3'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Floor :</td>
                                            <td class="text-capitalize"><?php echo $row['11'];?></td>
                                            <td>Total Floor :</td>
                                            <td class="text-capitalize"><?php echo $row['28'];?></td>
                                        </tr>
                                        <tr>
                                            <td>City :</td>
                                            <td class="text-capitalize"><?php echo $row['15'];?></td>
                                            <td>State :</td>
                                            <td class="text-capitalize"><?php echo $row['16'];?></td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                            -->
							<!--
                            <h5 class="mt-5 mb-4 text-secondary">Floor Plans</h5>
                            <div class="accordion" id="accordionExample">
                                <button class="bg-gray hover-bg-primary hover-text-white text-ordinary py-3 px-4 mb-1 w-100 text-left rounded position-relative" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"> Floor Plans </button>
                                <div id="collapseOne" class="collapse show p-4" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <img src="admin/property/<?php echo $row['25'];?>" alt="Not Available"> </div>
                            </div>
                            -->

                            
                        </div>
                    </div>
					
					
					
                    <div class="col-lg-4">
                        <!-- <h4 class="double-down-line-left text-secondary position-relative pb-4 mb-4 mt-md-50">Send Message</h4>
                        <form method="post" action="#">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Enter Name">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Enter Email">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Enter Phone">
                                    </div>
                                </div>
								<div class="col-md-12">
                                    <div class="form-group">
										<textarea class="form-control" placeholder="Enter Message"></textarea>
                                    </div>
                                </div>
								
                                <div class="col-md-12">
                                    <div class="form-group mt-4">
                                        <button type="submit" class="btn btn-primary w-100">Search Property</button>
                                    </div>
                                </div>
                            </div>
                        </form> -->

                        <?php

                            if ($row['5'] != "rent") {
                                
                            

                        ?>
                        <h4 class="double-down-line-left text-secondary position-relative pb-4 my-4">Instalment Calculator</h4>
                        <form class="d-inline-block w-100" action="calc.php" method="post">
                            <label class="sr-only">Property Amount</label>
                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">$</div>
                                </div>
                                <input type="text" class="form-control" name="amount" value="<?php echo $row['14']?>" required >
                                
                            </div>
                            <label class="sr-only">Month</label>
                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                </div>
                                <input type="text" class="form-control" name="month" placeholder="Duration Year" required>
                            </div>
                            <label class="sr-only">Interest Rate</label>
                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">%</div>
                                </div>
                                <input type="text" class="form-control" name="interest" placeholder="Interest Rate" required>
                            </div>
                            <button type="submit" value="submit" name="calc" class="btn btn-danger mt-4">Calclute Instalment</button>
                        </form>

                        <?php } ?>
                        <h4 class="double-down-line-left text-secondary position-relative pb-4 mb-4 mt-5">Featured Property</h4>
                        <ul class="property_list_widget">
							
                            <?php 
                            $query=mysqli_query($con,"SELECT * FROM `property` WHERE isFeatured = 1 and status = 'available' ORDER BY date DESC LIMIT 3");
                                    while($row=mysqli_fetch_array($query))
                                    {
                            ?>
                            <li> <img src="admin/property/<?php echo $row['19'];?>" alt="pimage">
                                <h6 class="text-secondary hover-text-primary text-capitalize"><a href="propertydetail.php?pid=<?php echo $row['0'];?>"><?php echo $row['1'];?></a></h6>
                                <!-- <span class="font-14"><i class="fas fa-map-marker-alt icon-primary icon-small"></i> <?php echo $row['14'];?></span> -->
                                
                            </li>
                            <?php } ?>

                        </ul>

                        <div class="sidebar-widget mt-5">
                            <h4 class="double-down-line-left text-secondary position-relative pb-4 mb-4">Recently Added Property</h4>
                            <ul class="property_list_widget">
							
								<?php 
								$query=mysqli_query($con,"SELECT * FROM `property` WHERE status = 'available' ORDER BY date DESC LIMIT 7");
										while($row=mysqli_fetch_array($query))
										{
								?>
                                <li> <img src="admin/property/<?php echo $row['19'];?>" alt="pimage">
                                    <h6 class="text-secondary hover-text-primary text-capitalize"><a href="propertydetail.php?pid=<?php echo $row['0'];?>"><?php echo $row['1'];?></a></h6>
                                    <!-- <span class="font-14"><i class="fas fa-map-marker-alt icon-primary icon-small"></i> <?php echo $row['14'];?></span> -->
                                    
                                </li>
                                <?php } ?>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>

         <!--	Footer   start-->
		<?php include("include/footer.php");?>
		<!--	Footer   start-->
        
        
        <!-- Scroll to top --> 
        <a href="#" class="bg-secondary text-white hover-text-secondary" id="scroll"><i class="fas fa-angle-up"></i></a> 
        <!-- End Scroll To top --> 
    </div>
</div>
<!-- Wrapper End --> 

<section>
    <div>
        
    </div>
</section>

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
<script>
    function toLogin() {
        window.location.href = 'login.php';
    }

    function toReqTour() {
        window.location.href = 'schedule.php';
    }

    function toContact() {
        window.location.href = 'contact.php';
    }

</script>

<style>
.property-quantity {
    border-radius: 8px;
    margin-bottom: 30px;
}

.property-info {
    padding: 15px 10px;
}

.property-info i {
    font-size: 24px;
}

.property-info h6 {
    margin: 10px 0 5px;
    font-weight: 600;
}

.property-info span {
    font-size: 13px;
}

.alert {
    margin-top: 15px;
    margin-bottom: 15px;
    padding: 15px;
    border-radius: 4px;
}
.alert-success {
    background-color: #d4edda;
    border-color: #c3e6cb;
    color: #155724;
}
.alert-danger {
    background-color: #f8d7da;
    border-color: #f5c6cb;
    color: #721c24;
}
.alert small {
    display: block;
    margin-top: 5px;
    opacity: 0.8;
}
.property_list_widget {
    list-style: none;
    padding-left: 0;
    margin-bottom: 2.5rem;
}
.property_list_widget li {
    display: flex;
    align-items: center;
    margin-bottom: 1.1rem;
    font-family: 'Muli', 'Comfortaa', Arial, sans-serif;
    font-size: 1.08rem;
    color: #222;
}
.property_list_widget img {
    width: 56px;
    height: 56px;
    object-fit: cover;
    border-radius: 8px;
    margin-right: 1rem;
    background: #f5f5f5;
    border: 1px solid #eee;
}
.property_list_widget h6 {
    margin: 0;
    font-size: 1.08rem;
    font-weight: 500;
    color: #222;
    font-family: 'Muli', 'Comfortaa', Arial, sans-serif;
}
.sidebar-widget h4,
.double-down-line-left.text-secondary.position-relative.pb-4.mb-4,
.double-down-line-left.text-secondary.position-relative.pb-4.my-4,
.double-down-line-left.text-secondary.position-relative.pb-4.mt-5 {
    font-family: 'Muli', 'Comfortaa', Arial, sans-serif;
    font-size: 1.45rem;
    font-weight: 700;
    color: #222;
    margin-bottom: 1.2rem;
    border: none !important;
    padding-bottom: 0 !important;
    position: static !important;
}
.double-down-line-left::before,
.double-down-line-left::after {
    display: none !important;
}
</style>

</body>

</html>