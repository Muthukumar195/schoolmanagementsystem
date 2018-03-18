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
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Class Details</h4>
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
                  <div class="row">
						<div class="col-md-6">
                        	<!--start Form-->
                        <div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title"><i class="icon-add"></i>&nbsp;<strong>Add Class</strong></h5>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload"></a></li>
			                		<li><a data-action="close"></a></li>
			                	</ul>
		                	</div>
						</div>

						<div class="panel-body">
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
							 <?php echo form_open_multipart('class_details/validate_class_details', array('class'=>'form-horizontal')); ?>
                             <strong class="text-danger"><?php echo validation_errors(); ?></strong>
								<fieldset class="content-group">
                                    <div class="form-group">
										<label>Class Name</label>
                                         <span class="req">*</span>
											 <?php 
											$data1 = array(
												'name'        => 'class_name',
												'id'          => 'class_name',
												'value'       => '',
												'class'       => 'form-control text-semibold',
												'placeholder' => 'Enter Class Name',											
											);
											echo form_input($data1);
											?>
									</div>
									<div class="form-group">
										<label >Description</label>
											 <?php 
											$data1 = array(
												'name'        => 'description',
												'id'          => 'description',
												'value'       => '',
												'class'       => 'form-control text-semibold',
												'rows'        => 4,
												'placeholder' => 'Enter description',											
											);
											echo form_textarea($data1);
											?>
									</div>
                                    <div class="form-group">
										<label>Class Code</label>
                                         <span class="req">*</span>
                                            <?php 
											$data1 = array(
												'name'        => 'class_code',
												'id'          => 'class_code',
												'value'       => '',
												'class'       => 'form-control text-capitalize text-semibold',
												'placeholder' => 'Enter Class Code',											
											);
											echo form_input($data1);
											?>
									</div>
                                    <div class="text-center">
											<button type="submit" class="btn bg-teal-400">Save</button>
                                            <input type="reset" class="btn btn-default" value="Cancel" onClick="javascript: document.location.href='user_details_list'" >
									</div>
							</form>
						</div>
					</div>
					<!--End form-->
						</div>
                        <div class="col-md-6">
							
                            <div class="panel panel-flat">
                            <div class="panel-heading">
                                <h5 class="panel-title">Class Details List</h5>
                                <div class="heading-elements">
                                    <ul class="icons-list">
                                    <!--<a href="add_user_details"><button type="button" class=" text-right btn bg-violet btn-labeled"><b><i class="icon-add"></i></b> Ad</button></a>-->
                                   
                                        <li><a data-action="collapse"></a></li>
                                        <li><a data-action="reload"></a></li>
                                        <li><a data-action="close"></a></li>
                                    </ul>
                                </div>
                            </div>
    
                            <!--<div class="panel-body">
                               
                            </div>-->
    
                            <table class="table datatable-responsive">
                                <thead>
                                    <tr>
                                        <th>Sno</th>
                                        <th>Class name</th>
                                        <th>Class Code</th>
                                        <th>Class Description</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $sno=1;
                                foreach($class_details_list->result() as $row){ ?>
                                    <tr>
                                        <td><?php echo $sno; ?></td>
                                        <td><?php echo $row->Class_name; ?></td>
                                        <td><?php echo $row->Class_code; ?></td>
                                        <td><?php echo $row->Class_description; ?></td>
                                       
                                        <td class="text-center">
                                            <ul class="icons-list">
                                                <li class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                        <i class="icon-menu9"></i>
                                                    </a>
    
                                                    <ul class="dropdown-menu dropdown-menu-right">
                                                        <li><a href="edit_class_details?id=<?php echo $row->Class_id; ?>" class="text-info"><i class="icon-pen6"></i> Edit</a></li>
                                                        <li><a href="delete?id=<?php echo $row->Class_id; ?>" onclick="return confirm('Are you sure you want to delete?')"><i class="icon-trash"></i> Delete</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <?php $sno++; } ?>
                                </tbody>
                                <tfoot>
                                    <th>Sno</th>
                                    <th>Class name</th>
                                    <th>Class Code</th>
                                    <th>Class Description</th>
                                    <th class="text-center">Actions</th>
                                </tfoot>
                            </table>
                        </div>

						</div>
					</div>
                <!--End Table--> 

<?php 
include("include/main_js.php");
include("validation/add_class_details.php");
include("include/footer.php");
?>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/datatables_responsive.js"></script>

 
