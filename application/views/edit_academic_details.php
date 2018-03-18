<?php include("include/header.php"); ?>
<!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/country.js"></script>
 <select id="country2" name="country2" class="form-control"></select>
<script language="javascript">
populateCountries("country2");
</script>-->
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
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Academic Details</h4>
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
							<h5 class="panel-title"><i class="icon-pencil6"></i>&nbsp;<strong>Edit Academic Details</strong></h5>
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
							 <?php echo form_open_multipart('academic/edit_validate_academic_details', array('class'=>'form-horizontal')); ?>
                             <span style="color:red; "><?php echo validation_errors(); ?></span> 
                             	<?php foreach($get_academic_details->result() as $row){ ?>
								<fieldset class="content-group">
									<div class="form-group">
										<label>Academic Name</label>
										<div>
                                            <?php 
											$data1 = array(
												'name'        => 'academic_name',
												'id'          => 'academic_name',
												'value'       => $row->Academic_name,
												'class'       => 'form-control text-capitalize text-semibold',
												'placeholder' => 'Enter Academic Name',											
											);
											echo form_input($data1);
											?>
                                            <input type="hidden" name="id" value="<?php echo $row->Academic_id; ?>">
										</div>
									</div>                    
                                    <div class="form-group">
										<label>Class name</label>
										<div>
                                        <?php
										$option[''] = "Select Class Name";
										foreach($class_list->result() as $class){
											
											$option[$class->Class_id] = $class->Class_name;
										}
										echo form_dropdown('class_name', $option, $row->Academic_class_id, 'class="form-control" id="id="class_name""');
										?>
										</div>
									</div>
									<div class="form-group">
										<label>Academic Start</label>
										<div>
                                          <div class="input-group">
                                             <span class="input-group-addon">
                                               <i class="icon-calendar22">
                                               </i>
                                             </span>
                                             <div data-date-format="yyyy-m-dd" >
                                             <?php 
											 $data2 = array(
											 	'name'    => 'academic_start',
												'id'      => 'academic_start',
												'value'   => $row->Academic_start,
												'class'   => 'form-control pickadate-accessibility',
												'data-date-format'=>'yyyy-m-dd',
												'placeholder'=> 'Select Start date',
											 );
											 echo form_input($data2);
											 ?>
                                             </div>
                                           </div>
                                             
										</div>
									</div>
                                  
                                    <div class="form-group">
										<label>Academic End</label>
										<div>
                                             <div class="input-group">
                                             <span class="input-group-addon">
                                               <i class="icon-calendar22">
                                               </i>
                                             </span>
											  <?php 
											 $data2 = array(
											 	'name'    => 'academic_end',
												'id'      => 'academic_end',
												'value'   => $row->Academic_end,
												'class'   => 'form-control pickadate-accessibility',
												'placeholder'=> 'Select End date',
											 );
											 echo form_input($data2);
											 ?>
                                           </div>
										</div>
									</div>
                                    <div class="text-center">
											<button type="submit" class="btn bg-teal-400">Save</button>
                                            <input type="reset" class="btn btn-default" value="Cancel" onClick="javascript: document.location.href='academic_details_list'" >
									</div>
                                    <?php } ?>
							</form>
						</div>
					</div>
					<!--End form-->
						</div>
                        <div class="col-md-6">
							
                            <div class="panel panel-flat">
                            <div class="panel-heading">
                                <h5 class="panel-title">Academic Details List</h5>
                                <div class="heading-elements">
                                    <ul class="icons-list">
                                    <!--<a href="add_user_details"><button type="button" class=" text-right btn bg-violet btn-labeled"><b><i class="icon-add"></i></b> Ad</button></a>-->
                                   
                                        <li><a data-action="collapse"></a></li>
                                        <li><a data-action="reload"></a></li>
                                        <li><a data-action="close"></a></li>
                                    </ul>
                                </div>
                            </div>
    
                           <!-- <div class="panel-body">
                            </div>-->
    
                            <table class="table datatable-responsive">
                                <thead>
                                    <tr>
                                        <th>Sno</th>
                                        <th>Academic name</th>
                                        <th>Class Name</th>
                                        <th>Academic Start</th>
                                        <th>Academic End</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $sno=1;
                                foreach($get_academic_details->result() as $row){ ?>
                                    <tr>
                                        <td><?php echo $sno; ?></td>
                                        <td><?php echo $row->Academic_name; ?></td>
                                        <td><?php echo $row->Class_name; ?></td>
                                        <td><?php echo date('d-m-Y', strtotime($row->Academic_start)); ?></td>
                                        <td><?php echo date('d-m-Y', strtotime($row->Academic_end)); ?></td>
                                        <td class="text-center">
                                            <ul class="icons-list">
                                                <li class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                        <i class="icon-menu9"></i>
                                                    </a>
    
                                                    <ul class="dropdown-menu dropdown-menu-right">
                                                        <li><a href="edit_class_details?id=<?php echo $row->Academic_id; ?>" class="text-info"><i class="icon-pen6"></i> Edit</a></li>
                                                        <li><a href="delete?id=<?php echo $row->Academic_id; ?>" onclick="return confirm('Are you sure you want to delete?')"><i class="icon-trash"></i> Delete</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <?php $sno++; } ?>
                                </tbody>
                                <tfoot>
                                  <th>Sno</th>
                                        <th>Academic name</th>
                                        <th>Class Name</th>
                                        <th>Academic Start</th>
                                        <th>Academic End</th>
                                        <th class="text-center">Actions</th>
                                </tfoot>
                            </table>
                        </div>

						</div>
					</div>
                    
                    
                <!--End Table--> 

<?php 
include("include/main_js.php");
include("validation/validation_academic_details.php");
include("include/footer.php");
?>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/datatables_responsive.js"></script>
