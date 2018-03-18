<?php include("include/header.php"); ?>

	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main sidebar -->
			<?php include("include/sidebar.php"); ?>
			<!-- /main sidebar -->


			    <!-- Main content -->
			<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header page-header-default">
					<div class="page-header-content">
						<div class="page-title">
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - View Institution Details</h4>
						</div>

						<!--<div class="heading-elements">
							<div class="heading-btn-group">
								<a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
								<a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
								<a href="#" class="btn btn-link btn-float has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
							</div>
						</div>-->
					</div>
					
				</div> 
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">
                  <div class="panel panel-white">
						<div class="panel-heading">
							<h6 class="panel-title">View Institution Details</h6>
							<div class="heading-elements">
								<button type="button" class="btn btn-default btn-xs heading-btn"><i class="icon-file-check position-left"></i> Save</button>
								<button type="button" class="btn btn-default btn-xs heading-btn"><i class="icon-printer position-left"></i> Print</button>
		                	</div>
						</div>

						<div class="panel-body no-padding-bottom">
                        <?php foreach($view_institution_details->result() as $row){ ?>
							<div class="row">
								<div class="col-md-12">
                                <div class="table-responsive">
								<table class="table">
									<thead>
										<tr>
											<th><strong>Institution code</strong></th>
											<th><strong>:</strong>&nbsp;&nbsp;<?php echo $row->Instution_code; ?></th>
										</tr>
									</thead>
									<tbody>
                                        <tr>
											<td><strong>Institution name</strong></td>
											<td><strong>:</strong>&nbsp;&nbsp; <?php echo $row->Instution_name; ?></td>
										</tr>
										
										<tr>
											<td><strong>Email</strong></td>
											<td><strong>:</strong>&nbsp;&nbsp; <?php echo $row->Instution_email; ?></td>
										</tr>
                                        <tr>
											<td><strong>Mobile</strong></td>
											<td><strong>:</strong>&nbsp;&nbsp; <?php echo $row->Instution_mobile; ?></td>
										</tr>
                                         <tr>
											<td><strong>Fax</strong></td>
											<td><strong>:</strong>&nbsp;&nbsp; <?php echo $row->Instution_fax; ?></td>
										</tr>
                                        <tr>
											<td><strong>Address</strong></td>
											<td><strong>:</strong>&nbsp;&nbsp; <?php echo $row->Instution_address.'<br>'.$row->Instution_city.' - '.$row->Instution_pin.'<br>'.$row->Instution_state.'<br>'.$row->Instution_country; ?></td>
										</tr>
									</tbody>
								</table>
							</div> 
                                </div>
						</div>
                        
                    <?php } ?>
					</div>
                    
                    
                <!--End Table--> 

<?php 
include("include/main_js.php");
include("include/footer.php");
?>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/datatables_responsive.js"></script>
