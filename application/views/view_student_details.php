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
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - View Student Details</h4>
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
							<h6 class="panel-title">View Student Details</h6>
							<div class="heading-elements">
								<button type="button" class="btn btn-default btn-xs heading-btn"><i class="icon-file-check position-left"></i> Save</button>
								<button type="button" class="btn btn-default btn-xs heading-btn"><i class="icon-printer position-left"></i> Print</button>
		                	</div>
						</div>

						<div class="panel-body no-padding-bottom">
                        <?php foreach($view_student_details->result() as $row){ ?>
							<div class="row">
								<div class="col-md-4">
                                <div class="table-responsive">
								<table class="table">
									<thead>
										<tr>
											<th><strong>Register no</strong></th>
											<th><strong>:</strong>&nbsp;&nbsp;<?php echo $row->Student_register_no; ?></th>
										</tr>
									</thead>
									<tbody>
                                    	<tr>
											<th><strong>Roll No</strong></th>
											<th><strong>:</strong>&nbsp;&nbsp;<?php echo $row->Student_roll_no; ?></th>
										</tr>
                                        <tr>
											<td><strong>Name</strong></td>
											<td><strong>:</strong>&nbsp;&nbsp; <?php echo $row->Student_first_name.'&nbsp;'.$row->Student_middle_name.'&nbsp;'.$row->Student_last_name; ?></td>
										</tr>
                                        <tr>
											<td><strong>Joining date</strong></td>
											<td><strong>:</strong>&nbsp;&nbsp; <?php echo date('d--m-Y', strtotime($row->Student_join_date)); ?></td>
										</tr>
										
										<tr>
											<td><strong>Class</strong></td>
											<td><strong>:</strong>&nbsp;&nbsp; <?php echo $row->Class_name; ?></td>
										</tr>
                                        <tr>
											<td><strong>Academic</strong></td>
											<td><strong>:</strong>&nbsp;&nbsp; <?php echo $row->Academic_name; ?></td>
										</tr>
                                        <tr>
											<td><strong>Date of birth</strong></td>
											<td><strong>:</strong>&nbsp;&nbsp; <?php echo date('d-m-Y', strtotime($row->Student_date_of_birth)); ?></td>
										</tr>
                                         <tr>
											<td><strong>Gender</strong></td>
											<td><strong>:</strong>&nbsp;&nbsp; <?php echo $row->Student_gender; ?></td>
										</tr>
                                        <tr>
											<td><strong>Birth place</strong></td>
											<td><strong>:</strong>&nbsp;&nbsp; <?php echo $row->Student_birth_place; ?></td>
										</tr>
                                         <tr>
											<td><strong>Blood group</strong></td>
											<td><strong>:</strong>&nbsp;&nbsp; <?php echo $row->Student_blood_group; ?></td>
										</tr>
                                        <tr>
											<td><strong>Mother tongue</strong></td>
											<td><strong>:</strong>&nbsp;&nbsp; <?php echo $row->Student_mother_tongue; ?></td>
										</tr>
									</tbody>
								</table>
							</div> 
                                </div>
                                <div class="col-md-4">
                                <div class="table-responsive">
								<table class="table">
									<thead>
                                         <tr>
											<th><strong>Category</strong></th>
											<th><strong>:</strong>&nbsp;&nbsp; <?php echo $row->Student_cat_name; ?></th>
										</tr>
									</thead>
									<tbody>
                                        <tr>
											<td><strong>Religion</strong></td>
											<td><strong>:</strong>&nbsp;&nbsp; <?php echo $row->	Student_religion; ?></td>
										</tr>
										
                                        <tr>
											<td><strong>Present address</strong></td>
											<td><strong>:</strong>&nbsp;&nbsp; <?php echo $row->Student_present_address; ?></td>
										</tr>
                                        <tr>
											<td><strong>Permanent address</strong></td>
											<td><strong>:</strong>&nbsp;&nbsp; <?php echo $row->Student_permanent_address; ?></td>
										</tr>
                                         <tr>
											<td><strong>Phone</strong></td>
											<td><strong>:</strong>&nbsp;&nbsp; <?php echo $row->Student_phone; ?></td>
										</tr>
                                        <tr>
											<td><strong>E-mail</strong></td>
											<td><strong>:</strong>&nbsp;&nbsp; <?php echo $row->Student_email; ?></td>
										</tr>
                                        <tr>
											<td><strong>Nationality</strong></td>
											<td><strong>:</strong>&nbsp;&nbsp; <?php echo $row->Student_nationalaty; ?></td>
										</tr>
                                        
                                        <tr>
											<td><strong>City</strong></td>
											<td><strong>:</strong>&nbsp;&nbsp; <?php echo $row->Student_city; ?></td>
										</tr>
                                        <tr>
											<td><strong>Pincode</strong></td>
											<td><strong>:</strong>&nbsp;&nbsp; <?php echo $row->Student_pincode; ?></td>
										</tr>
                                        <tr>
											<td><strong>State</strong></td>
											<td><strong>:</strong>&nbsp;&nbsp; <?php echo $row->Student_state; ?></td>
										</tr>
                                        <tr>
											<td><strong>County</strong></td>
											<td><strong>:</strong>&nbsp;&nbsp; <?php echo $row->	Student_county; ?></td>
										</tr>
                                        
									</tbody>
								</table>
							</div> 
                                </div>
                                
                                
								<div class="col-md-4">
									<div align="center">
                                    <img src="<?php echo base_url(); ?>uploads/student_profile/<?php echo $row->Student_profile; ?>" class="content-group mt-10" alt="" style="width: 220px;">	   							</div>
                                  
							</div>
						</div>
                        <h5><strong>Parents Details</strong>:-</h5>
                        <div class="row">
								<div class="col-sm-6 content-group">
                                <div class="table-responsive">
								<table class="table">
									<thead>
										<tr>
											<th><strong>Father name</strong></th>
											<th><strong>:</strong>&nbsp;&nbsp;<?php echo $row->Student_father_name; ?></th>
										</tr>
									</thead>
									<tbody>
										
                                        <tr>
											<th><strong>Father mobile</strong></th>
											<th><strong>:</strong>&nbsp;&nbsp;<?php echo $row->Student_father_mobile; ?></th>
										</tr>
                                        <tr>
											<td><strong>Father occupation</strong></td>
											<td><strong>:</strong>&nbsp;&nbsp; <?php echo $row->Student_father_occupation; ?></td>
										</tr>
                                        <tr>
											<td><strong>Father education</strong></td>
											<td><strong>:</strong>&nbsp;&nbsp; <?php echo $row->Student_father_education; ?></td>
										</tr>
										<tr>
											<td><strong>Father income</strong></td>
											<td><strong>:</strong>&nbsp;&nbsp; <?php echo $row->Student_father_income; ?></td>
										</tr>
                                        
									</tbody>
								</table>
							</div> 
                                </div>
                                <div class="col-sm-6 content-group">
                                <div class="table-responsive">
								<table class="table">
									<thead>
										<tr>
											<th><strong>Mother name</strong></th>
											<th><strong>:</strong>&nbsp;&nbsp;<?php echo $row->Student_mother_name; ?></th>
										</tr>
									</thead>
									<tbody>
                                        <tr>
											<td><strong>Mother mobile</strong></td>
											<td><strong>:</strong>&nbsp;&nbsp; <?php echo $row->Student_mother_mobile; ?></td>
										</tr>
                                        <tr>
											<td><strong>Mother occupation</strong></td>
											<td><strong>:</strong>&nbsp;&nbsp; <?php echo $row->Student_mother_occupation; ?></td>
										</tr>
									</tbody>
								</table>
							</div> 
                           </div>
                              
						</div>
                        <h5><strong>Guardian Details</strong>:-</h5>
                        <div class="row">
								<div class="col-sm-6 content-group">
                                <div class="table-responsive">
								<table class="table">
									<thead>
										<tr>
											<th><strong>Name</strong></th>
											<th><strong>:</strong>&nbsp;&nbsp;<?php echo $row->Student_guardian_name; ?></th>
										</tr>
									</thead>
									<tbody>
										
                                        <tr>
											<th><strong>Relationship</strong></th>
											<th><strong>:</strong>&nbsp;&nbsp;<?php echo $row->Student_guardian_relationship; ?></th>
										</tr>
                                        <tr>
											<td><strong>education</strong></td>
											<td><strong>:</strong>&nbsp;&nbsp; <?php echo $row->Student_guardian_education; ?></td>
										</tr>
                                        <tr>
											<td><strong>occupation</strong></td>
											<td><strong>:</strong>&nbsp;&nbsp; <?php echo $row->Student_guardian_occupation; ?></td>
										</tr>
										<tr>
											<td><strong>income</strong></td>
											<td><strong>:</strong>&nbsp;&nbsp; <?php echo $row->Student_guardian_income; ?></td>
										</tr>
                                        
									</tbody>
								</table>
							</div> 
                                </div>
                                <div class="col-sm-6 content-group">
                                <div class="table-responsive">
								<table class="table">
									<thead>
										<tr>
											<th><strong>Address</strong></th>
											<th><strong>:</strong>&nbsp;&nbsp;<?php echo $row->Student_guardian_address; ?></th>
										</tr>
									</thead>
									<tbody>
                                    
                                        <tr>
											<td><strong>Mobile</strong></td>
											<td><strong>:</strong>&nbsp;&nbsp; <?php echo $row->Student_guardian_mobile; ?></td>
										</tr>
                                         <tr>
											<td><strong>E-mail</strong></td>
											<td><strong>:</strong>&nbsp;&nbsp; <?php echo $row->Student_guardian_email; ?></td>
										</tr> 
                                        <tr>
											<td><strong>City</strong></td>
											<td><strong>:</strong>&nbsp;&nbsp; <?php echo $row->Student_guardian_city; ?></td>
										</tr>
                                         <tr>
											<td><strong>Country</strong></td>
											<td><strong>:</strong>&nbsp;&nbsp; <?php echo $row->Student_guardian_country; ?></td>
										</tr>
                                       
									</tbody>
								</table>
							</div> 
                           </div>
                              
						</div>
                        
                        
                        <h5><strong>Previous Qualification Details</strong>:-</h5>
                        <div class="row">
							<div class="col-sm-12 content-group">
                                <div class="table-responsive">
								<table class="table">
									<thead>
										<tr>
											<th><strong>School Name</strong></th>
											<th><strong>:</strong>&nbsp;&nbsp;<?php echo $row->Student_pre_sch_name; ?></th>
										</tr>
									</thead>
									<tbody>
                                        <tr>
											<th><strong>Address</strong></th>
											<th><strong>:</strong>&nbsp;&nbsp;<?php echo $row->Student_pre_sch_address; ?></th>
										</tr>
                                        <tr>
											<td><strong>Qualification</strong></td>
											<td><strong>:</strong>&nbsp;&nbsp; <?php echo $row->Student_pre_sch_qualification; ?></td>
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
