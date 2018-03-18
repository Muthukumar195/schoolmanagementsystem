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
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Edit Enquiry Details</h4>
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
                
                		<!--start Form-->
                        <div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title"><i class="icon-pencil6"></i>&nbsp;<strong>Edit Enquiry Details</strong></h5>
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
							 <?php echo form_open_multipart('enquiry/edit_validate_enquiry_details', array('class'=>'form-horizontal')); ?>
                             <span style="color:red; "><?php echo validation_errors(); ?></span> 
								<fieldset class="content-group">
                                <?php  foreach($get_enquiry_details->result() as $row){ ?>
									<div class="form-group">
										<label class="control-label col-lg-2">Enquiry No :</label>
										<div class="col-lg-10">
                                            <?php 
											$data1 = array(
												'name'        => 'enq_no',
												'id'          => 'enq_no',
												'value'       => $row->Enq_no,
												'class'       => 'form-control text-capitalize text-semibold',
												'readonly'    => 'readonly',											
											);
											echo form_input($data1);
											?>
                                            <input type="hidden" name="id" value="<?php echo $row->Enq_id; ?>">
                                            <span id="alert_emp_code" style="color:#F00;"></span>
										</div>
									</div>
                                    
									<div class="form-group">
										<label class="control-label col-lg-2">Enquiry Student Name<span class="req">*</span> :</label>
										<div class="col-lg-10">
											<?php 
											$data1 = array(
												'name'        => 'enq_st_name',
												'id'          => 'enq_st_name',
												'value'       => $row->Enq_student_name,
												'class'       => 'form-control text-semibold',
												'placeholder' => 'Enter Student Name',											
											);
											echo form_input($data1);
											?>
										</div>
									</div>
                                    <div class="form-group">
										<label class="control-label col-lg-2">Enquiry Student Class<span class="req">*</span> :</label>
										<div class="col-lg-10">
											<?php 
											$option_class[''] = "Select Class name";
											foreach($class_list->result() as $class){
												
												$option_class[$class->Class_id] = $class->Class_name;
											}
											echo form_dropdown('class_id', $option_class, $row->Enq_student_class_id, 'class="form-control" id="class_id""');
											?>
										</div>
									</div>
                                    <div class="form-group">
										<label class="control-label col-lg-2">Gender<span class="req">*</span> :</label>
										<div class="col-lg-10">
											<?php 
											$gender = array(
											''      => 'Select Gender',
											'Male'  => 'Male',
											'Female'=> 'Female'
											);
											echo form_dropdown('gender', $gender, $row->Enq_student_gender, 'class="form-control" id="gender"');
											?>
										</div>
									</div>
                                    <div class="form-group">
										<label class="control-label col-lg-2">Date of Birth<span class="req">*</span> :</label>
										<div class="col-lg-10">
                                          <div class="input-group">
                                           <span class="input-group-addon"><i class="icon-calendar22"></i></span>
											<?php 
											$data1 = array(
												'name'        => 'enq_dob',
												'id'          => 'enq_dob',
												'value'       => $row->Enq_student_dob,
												'class'       => 'form-control text-semibold pickadate-accessibility',
												'placeholder' => 'Select Date of Birth'											
											);
											echo form_input($data1);
											?>
                                            </div>
										</div>
									</div>
                                    
                                     <div class="form-group">
										<label class="control-label col-lg-2">Father Name<span class="req">*</span> :</label>
										<div class="col-lg-10">
											<?php 
											$data1 = array(
												'name'        => 'enq_father_name',
												'id'          => 'enq_father_name',
												'value'       => $row->Enq_father_name,
												'class'       => 'form-control text-semibold',
												'placeholder' => 'Enter Father Name',											
											);
											echo form_input($data1);
											?>
										</div>
									</div>
                                    
                                     <div class="form-group">
										<label class="control-label col-lg-2">Address<span class="req">*</span> :</label>
										<div class="col-lg-10">
											<?php 
											$data1 = array(
												'name'        => 'enq_address',
												'id'          => 'enq_address',
												'value'       => $row->Enq_address,
												'rows'        => '4',
												'class'       => 'form-control text-semibold',
												'placeholder' => 'Enter Address',											
											);
											echo form_textarea($data1);
											?>
										</div>
									</div>
                                   
                                    <div class="form-group">
										<label class="control-label col-lg-2">Mobile<span class="req">*</span> :</label>
										<div class="col-lg-10">
											<?php 
											$data1 = array(
												'name'        => 'enq_mobile',
												'id'          => 'enq_mobile',
												'value'       => $row->Enq_mobile,
												'class'       => 'form-control text-semibold',
												'placeholder' => 'Enter Mobile no',											
											);
											echo form_input($data1);
											?>
										</div>
									</div>
                                    <div class="form-group">
										<label class="control-label col-lg-2">E-mail<span class="req">*</span> :</label>
										<div class="col-lg-10">
											<?php 
											$data1 = array(
												'name'        => 'enq_email',
												'id'          => 'enq_email',
												'value'       => $row->Enq_email,
												'class'       => 'form-control text-semibold',
												'placeholder' => 'Enter E-mail',											
											);
											echo form_input($data1);
											?>
										</div>
									</div>
                                 <div class="text-center">
											<button type="submit" class="btn bg-teal-400">Save</button>
                                            <input type="reset" class="btn btn-default" value="Cancel" onClick="javascript: document.location.href='enquiry_details_list'" >
									</div>
                    			<?php } ?>
                          </form>  
						</div>
					</div>
                    
					<!--End form-->
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/country.js"></script>
<script language="javascript">
 populateCountries("country", "state");
 populateCountries("country2");
</script>

                    
<?php
include("include/main_js.php");
include("validation/validate_add_enquiry_details.php"); 
include("include/footer.php");
?>
<script type="text/javascript">
	$(document).ready(function(){
		$('#employee_code').change(function(){
			var employee_code = $('#employee_code').val();
			/*alert(employee_code);*/
			$.ajax({
				type : "GET",
				url  : "<?php echo base_url(); ?>/index.php/employee/ajax_check_employee_code",
				data :{"employee_code" : employee_code},
				success : function(data){
					jQuery("#alert_emp_code").html(data);
					/*alert(data);*/
				}
			});
			
		});	
	});
</script>
