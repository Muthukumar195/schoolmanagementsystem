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
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Enquiry Details</h4>
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
						<!--Start Table--> 
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Enquiry Details List</h5>
							<div class="heading-elements">
								<ul class="icons-list">
                                <a href="add_enquiry_details"><button type="button" class=" text-right btn bg-violet btn-labeled"><b><i class="icon-add"></i></b>Add Enquiry Details</button></a>
                               
			                		<li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload"></a></li>
			                		<li><a data-action="close"></a></li>
			                	</ul>
		                	</div>
						</div>

						<!--<div class="panel-body">-->
                             <?php if($this->session->flashdata('failear_msg')){?>
                                    <div class="alert alert-danger alert-styled-left alert-bordered">
										<button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
										<span class="text-semibold"><?php echo $this->session->flashdata('failear_msg'); ?></span>
                                    </div>
                                <?php } ?>
                                <?php if($this->session->flashdata('success_msg')){?>
                                   <div class="alert alert-success alert-styled-left alert-arrow-left alert-bordered">
										<button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
										<span class="text-semibold"> <?php echo $this->session->flashdata('success_msg'); ?></span>
								    </div>
                                <?php } ?>
						<!--</div>-->

						<table class="table datatable-responsive">
							<thead>
								<tr>
                                <th>Sno</th>
                                <th>Enquiry No</th>
                                <th>Student Name</th>
                                <th>Class</th>
                                <th>Father Name</th>
                                <th>Mobile</th>
                                <th>Address</th>
                                <th class="text-center">Actions</th>
					            </tr>
							</thead>
							<tbody>
                            <?php 
							$sno=1;
							foreach($enquiry_details_list->result() as $row){ ?>
								<tr>
                                	<td><?php echo $sno; ?></td>
					                <td><?php echo $row->Enq_no; ?></td>
					                <td><?php echo $row->Enq_student_name; ?></td>
					                <td><?php echo $row->Class_name; ?></td>
					                <td><?php echo $row->Enq_father_name; ?></td>
					                <td><?php echo $row->Enq_mobile; ?></td>
                                    <td><?php echo $row->Enq_email; ?></td>
									<td class="text-center">
										<ul class="icons-list">
                                        <!-- <li><a href="view_institution_details?id=<?php //echo $row->Enq_id; ?>"><i class="icon-file-eye"></i></a></li>-->
											<li class="dropdown">
												<a href="#" class="dropdown-toggle" data-toggle="dropdown">
													<i class="icon-menu9"></i>
												</a>
												
												<ul class="dropdown-menu dropdown-menu-right">
													<li><a href="edit_enquiry_details?id=<?php echo $row->Enq_id; ?>" class="text-info"><i class="icon-pen6"></i> Edit</a></li>
													
													<li><a href="delete?id=<?php echo $row->Enq_id; ?>" onclick="return confirm('Are you sure you want to delete?')"><i class="icon-trash"></i> Delete</a></li>
												</ul>
											</li>
										</ul>
									</td>
					            </tr>
					            <?php $sno++; } ?>
							</tbody>
							<tfoot>
							    <th>Sno</th>
                                <th>Enquiry No</th>
                                <th>Student Name</th>
                                <th>Class</th>
                                <th>Father Name</th>
                                <th>Mobile</th>
                                <th>Address</th>
                                <th class="text-center">Actions</th>

							</tfoot>
						</table>
					</div>
                    
                <!--End Table--> 

<?php 
include("include/main_js.php");
include("include/footer.php");
?>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/datatables_responsive.js"></script>
