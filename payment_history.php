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
$error='';
$msg='';
if(isset($_POST['insert']))
{
	$name=$_POST['name'];
	$phone=$_POST['phone'];

	$content=$_POST['content'];
	
	$uid=$_SESSION['uid'];
	
	if(!empty($name) && !empty($phone) && !empty($content))
	{
		
		$sql="INSERT INTO feedback (uid,fdescription,status) VALUES ('$uid','$content','0')";
		   $result=mysqli_query($con, $sql);
		   if($result){
			   $msg = "<p class='alert alert-success'>Feedback Send Successfully</p> ";
		   }
		   else{
			   $error = "<p class='alert alert-warning'>Feedback Not Send Successfully</p> ";
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
                        <h2 class="page-name float-left text-white text-uppercase mt-1 mb-0"><b></b></h2>
                    </div>
                    <div class="col-md-6">
                        <nav aria-label="breadcrumb" class="float-left float-md-right">
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
                        <h2 class="text-secondary  text-center">Payment History</h2>
                    </div>
                </div>
                <table id="payment-table" class="items-list col-lg-12 table-hover" style="border-collapse:inherit;">
                    <thead>
                    <tr class="bg-dark">
                        <th class="text-white font-weight-bolder">Date Paid</th>
                        <th class="text-white font-weight-bolder">Invoice</th>
                        <th class="text-white font-weight-bolder">Amount</th>
                        <th class="text-white font-weight-bolder">Mode</th>
                        <th class="text-white font-weight-bolder">Coverage Period</th>
                        <th class="text-white font-weight-bolder">Payment For</th>
                        <th class="text-white font-weight-bolder">Status</th>
                        <th class="text-white font-weight-bolder">Remarks</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $uid=$_SESSION['uid'];
                    $query = mysqli_query($con,"SELECT * FROM payment WHERE uid='$uid' ORDER BY payment_date DESC");
                    while($row = mysqli_fetch_array($query))
                    {?>
                    <tr>
                        <td><?php echo date("M d, Y H:i",strtotime($row['payment_date'])); ?></td>
                        <td><?php echo $row['invoice_number']; ?></td>
                        <td class="text-success">₱<?php echo number_format($row['amount'],2); ?></td>
                        <td><?php echo $row['mode_of_payment']; ?></td>
                        <td><?php echo date("M d, Y",strtotime($row['coverage_start'])) . ' - ' . 
                        date("M d, Y",strtotime($row['coverage_end'])); ?></td>
                        <td><?php echo $row['payment_for']; ?></td>
                        <td>
                            <span class="badge badge-<?php echo $row['payment_status'] == 'Confirmed' ? 
                            'success' : ($row['payment_status'] == 'Late' ? 'danger' : 'warning'); ?>">
                                <?php echo $row['payment_status']; ?>
                            </span>
                        </td>
                        <td><?php echo $row['remarks']; ?></td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>

                <!-- Add DataTables CSS -->
                <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
                <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.bootstrap4.min.css">

                <!-- Add DataTables JS -->
                <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
                <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
                <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
                <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.bootstrap4.min.js"></script>

                <script>
                    $(document).ready(function() {
                        $('#payment-table').DataTable({
                            "order": [[ 0, "desc" ]],
                            "pageLength": 10,
                            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                            "language": {
                                "lengthMenu": "Show _MENU_ entries",
                                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                                "search": "Search:",
                                "paginate": {
                                    "first": "First",
                                    "last": "Last",
                                    "next": "Next",
                                    "previous": "Previous"
                                }
                            }
                        });
                    });
                </script>
            </div>
        </div>
        <!--    Submit Property   -->

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