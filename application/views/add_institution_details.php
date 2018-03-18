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
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Add Institution Details</h4>
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
							<h5 class="panel-title"><i class="icon-add"></i>&nbsp;<strong>Add Institution Details</strong></h5>
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
							 <?php echo form_open_multipart('institution/validate_institution_details', array('class'=>'form-horizontal')); ?>
                             <span style="color:red; "><?php echo validation_errors(); ?></span> 
								<fieldset class="content-group">
									<div class="form-group">
										<label class="control-label col-lg-2">Institution Code<span class="req">*</span> :</label>
										<div class="col-lg-10">
                                            <?php 
											$data1 = array(
												'name'        => 'ins_code',
												'id'          => 'ins_code',
												'value'       => '',
												'class'       => 'form-control text-capitalize text-semibold',
												'placeholder' => 'Enter Institution Code',											
											);
											echo form_input($data1);
											?>
                                            <span id="alert_emp_code" style="color:#F00;"></span>
										</div>
									</div>
                                    
									<div class="form-group">
										<label class="control-label col-lg-2">Institution Name<span class="req">*</span> :</label>
										<div class="col-lg-10">
											<?php 
											$data1 = array(
												'name'        => 'ins_name',
												'id'          => 'ins_name',
												'value'       => '',
												'class'       => 'form-control text-semibold',
												'placeholder' => 'Enter Institution Name',											
											);
											echo form_input($data1);
											?>
										</div>
									</div>
                                    <div class="form-group">
										<label class="control-label col-lg-2">Email<span class="req">*</span> :</label>
										<div class="col-lg-10">
											<?php 
											$data1 = array(
												'name'        => 'ins_email',
												'id'          => 'ins_email',
												'value'       => '',
												'class'       => 'form-control text-semibold',
												'placeholder' => 'Enter Institution Email',											
											);
											echo form_input($data1);
											?>
										</div>
									</div>
                                    <div class="form-group">
										<label class="control-label col-lg-2">Mobile<span class="req">*</span> :</label>
										<div class="col-lg-10">
											<?php 
											$data1 = array(
												'name'        => 'ins_mobile',
												'id'          => 'ins_mobile',
												'value'       => '',
												'class'       => 'form-control text-semibold',
												'placeholder' => 'Enter Institution mobile',											
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
												'name'        => 'ins_address',
												'id'          => 'ins_address',
												'value'       => '',
												'class'       => 'form-control text-semibold',
												'placeholder' => 'Enter Institution Address',											
											);
											echo form_input($data1);
											?>
										</div>
									</div>
                                    <div class="form-group">
										<label class="control-label col-lg-2">Fax<span class="req">*</span> :</label>
										<div class="col-lg-10">
											<?php 
											$data1 = array(
												'name'        => 'ins_fax',
												'id'          => 'ins_fax',
												'value'       => '',
												'class'       => 'form-control text-semibold',
												'placeholder' => 'Enter Institution Fax',											
											);
											echo form_input($data1);
											?>
										</div>
									</div>
                                    <div class="form-group">
										<label class="control-label col-lg-2">City<span class="req">*</span> :</label>
										<div class="col-lg-10">
											<?php 
											$data1 = array(
												'name'        => 'ins_city',
												'id'          => 'ins_city',
												'value'       => '',
												'class'       => 'form-control text-semibold',
												'placeholder' => 'Enter Institution City',											
											);
											echo form_input($data1);
											?>
										</div>
									</div>
                                    <div class="form-group">
										<label class="control-label col-lg-2">pin<span class="req">*</span> :</label>
										<div class="col-lg-10">
											<?php 
											$data1 = array(
												'name'        => 'ins_pin',
												'id'          => 'ins_pin',
												'value'       => '',
												'class'       => 'form-control text-semibold',
												'placeholder' => 'Enter Institution Pin',											
											);
											echo form_input($data1);
											?>
										</div>
									</div>
                                    <div class="form-group">
										<label class="control-label col-lg-2">Country<span class="req">*</span> :</label>
										<div class="col-lg-10">
											<?php 
											echo form_dropdown('ins_country', '','','class="form-control" id="country"');
											?>
										</div>
									</div>
                                    <div class="form-group">
										<label class="control-label col-lg-2">State<span class="req">*</span> :</label>
										<div class="col-lg-10">
											<?php 
											echo form_dropdown('ins_state', '','','class="form-control" id="state"');
											?>
										</div>
									</div>
                           
                                 <div class="text-center">
											<button type="submit" class="btn bg-teal-400">Save</button>
                                            <input type="reset" class="btn btn-default" value="Cancel" onClick="javascript: document.location.href='employee_details_list'" >
									</div>
                    
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
include("validation/validate_add_institution_details.php"); 
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
