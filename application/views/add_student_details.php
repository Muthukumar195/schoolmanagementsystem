<!-- --><?php include("include/header.php"); ?>
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
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Student</span> - Admission</h4>
						</div>

						<div class="heading-elements">

							<!--<div class="heading-btn-group">
								<a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
								<a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
								<a href="#" class="btn btn-link btn-float has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
							</div>-->
						</div>
					</div>
				</div>
				<!-- /page header -->

				<!-- Content area -->
				<div class="content">
					<!-- Basic setup -->
		            <div class="panel panel-white">
						<div class="panel-heading">
							<h6 class="panel-title">Student Admission</h6>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload"></a></li>
			                		<li><a data-action="close"></a></li>
			                	</ul>
		                	</div>
						</div>
                        <div >
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
                        </div>
						 <?php echo form_open_multipart('student/validate_student_details', array('class'=>'stepy-validation', 'name'=>'student_admission')); ?>
                             <span style="color:red; "><?php echo validation_errors(); ?></span> 
							<fieldset title="1">
								<legend class="text-semibold">Personal Details</legend>
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label>Register Number</label>
                                             <span class="req">*</span>
                                            <?php
											$data1 = array(
											'name'    => 'register_no',
											'id'	  => 'register_no',
											'value'   => '',
											'placeholder' => 'Enter Register Number',
											'class'   => 'form-control text-capitalize text-semibold required'
											);
											echo form_input($data1);
											 ?>
                                             <span id="alert_reg_no" style="color:#F00;"></span>
                                        </div>
                                     </div>
                                     <div class="col-md-4">
										<div class="form-group">
											<label>Joining Date</label>
                                             <span class="req">*</span>
											<div class="input-group">
											<span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                            <?php
											$data2 = array(
											'name'    => 'joining_date',
											'id'	  => 'joining_date',
											'value'   => '',
											'placeholder' => 'Joining Date',
											'class'   => 'form-control pickadate-accessibility text-semibold required'
											);
											echo form_input($data2);
											 ?>
										    </div>
										</div>
									</div>
                                    <div class="col-md-4">
										<div class="form-group">
											<label>Roll No</label>
                                             <span class="req">*</span>
                                            <?php
											$data3 = array(
											'name'    => 'roll_no',
											'id'	  => 'roll_no',
											'value'   => '',
											'placeholder' => 'Enter Roll no',
											'class'   => 'form-control text-capitalize text-semibold required'
											);
											echo form_input($data3);
											 ?>
										</div>
									</div>  
                                  </div> 
                                  <div class="row">         
                                     <div class="col-md-4"> 
                                        <div class="form-group">
                                            <label>Class Name</label>
                                            <span class="req">*</span>
                                            <?php 
											$option_cor[''] = "Select class Name";
											foreach($class_list->result() as $class){
												
												$option_cor[$class->Class_id] = $class->Class_name;
											}
											echo form_dropdown('class_name', $option_cor, '', 'class="form-control select required" id="class_id"');
											?>
										</div>
									</div>

									<div class="col-md-4">
										<div class="form-group">
											<label>Academic Year</label>
                                            <span class="req">*</span>
											 <?php 
											$option_bat[''] = "Select Academic Year";
											foreach($academic_list->result() as $academic){
												
												$option_bat[$academic->Academic_id] = $academic->Academic_name;
											}
											echo form_dropdown('academic_name', $option_bat, '', 'class="select form-control required" id="academic_id"');
											?>
										</div>
									</div>
                                    <div class="col-md-4">
									     <div class="form-group">
											<label>Category</label>
                                             <span class="req">*</span>
											<?php 
											$option_cat[''] = "Select Category Name";
											foreach($student_category_list->result() as $category){
												
												$option_cat[$category->Student_cat_id] = $category->Student_cat_name;
											}
											echo form_dropdown('cat_name', $option_cat, '', 'class="select form-control required" id="cat_id"');
											?>
										</div>    
									</div>
								</div>
                                <div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label>First Name</label>
                                             <span class="req">*</span>
                                            <?php
											$data4 = array(
											'name'    => 'first_name',
											'id'	  => 'first_name',
											'value'   => '',
											'placeholder' => 'Enter First name',
											'class'   => 'form-control text-capitalize text-semibold required'
											);
											echo form_input($data4);
											 ?>
		                                </div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Middle Name</label>
                                            <?php
											$data5 = array(
											'name'    => 'middle_name',
											'id'	  => 'middle_name',
											'value'   => '',
											'placeholder' => 'Enter Middle name',
											'class'   => 'form-control text-capitalize text-semibold'
											);
											echo form_input($data5);
											 ?>
	                                    </div>
									</div>
                                    <div class="col-md-4">
										<div class="form-group">
											<label>Last Name</label>
                                             <span class="req">*</span>
                                            <?php
											$data6 = array(
											'name'    => 'last_name',
											'id'	  => 'last_name',
											'value'   => '',
											'placeholder' => 'Enter Last name',
											'class'   => 'form-control text-capitalize text-semibold required'
											);
											echo form_input($data6);
											 ?>
		                                </div>
									</div>
								</div>
                                <div class="row">
                                <div class="col-md-4">
									     <div class="form-group">
											<label>Date Of Birth</label>
                                             <span class="req">*</span>
											<div class="input-group">
											<span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                            <?php
											$data7 = array(
											'name'    => 'dob',
											'id'	  => 'dob',
											'value'   => '',
											'placeholder' => 'Date of birth',
											'class'   => 'form-control pickadate-accessibility text-semibold required'
											);
											echo form_input($data7);
											 ?>
										    </div>
										</div>    
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Gender</label>
                                             <span class="req">*</span>
                                            <?php
											$option[''] = "Select Gender";
											$option = array(
											''      => "Select Gender",
											'Male'    => 'Male',
											'Female'  => 'Female',
											);
											echo form_dropdown('gender', $option, '', 'class="select form-control required" id="gender_id"');
											 ?>
										</div>		
									</div>
                                    <div class="col-md-4">
										<div class="form-group">
											<label>Blood Group</label>
                                            <?php
											$option = array(
											''      => "Select Blood Group",
											'A+'    => 'A+',
											'A-'    => 'A-',
											'B+'    => 'B+',
											'B-'    => 'B-',
											'AB+'   => 'AB+',
											'AB-'   => 'AB-',
											'O+'    => 'O+',
											'O-'    => 'O-',
											);
											echo form_dropdown('blood_group', $option, '', 'class="select form-control"');
											 ?>
										</div>
									</div>
								 </div>
                                 <div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label>Birth Place</label>
                                             <span class="req">*</span>
                                            <?php
											$data9 = array(
											'name'    => 'birth_place',
											'id'	  => 'birth_place',
											'value'   => '',
											'placeholder' => 'Enter Birth place',
											'class'   => 'form-control text-capitalize text-semibold required'
											);
											echo form_input($data9);
											 ?>
		                                </div>
									</div>

									<div class="col-md-4">
									     <div class="form-group">
											<label>Nationality</label>
                                             <span class="req">*</span>
                                            <?php
											$data10 = array(
											'name'    => 'nationality',
											'id'	  => 'nationality',
											'value'   => '',
											'placeholder' => 'Enter Nationality',
											'class'   => 'form-control text-capitalize text-semibold required'
											);
											echo form_input($data10);
											 ?>
										</div>    
									</div>
                                    <div class="col-md-4">
										<div class="form-group">
											<label>Mother Tongue</label>
                                             <span class="req">*</span>
                                            <?php
											$data11 = array(
											'name'    => 'mother_tongue',
											'id'	  => 'mother_tongue',
											'value'   => '',
											'placeholder' => 'Enter Mother tongue',
											'class'   => 'form-control text-capitalize text-semibold required'
											);
											echo form_input($data11);
											 ?>
		                                </div>
									</div>
                                </div>
                                <div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Religion</label>
                                             <span class="req">*</span>
                                            <?php
											$data12 = array(
											'name'    => 'religion',
											'id'	  => 'religion',
											'value'   => '',
											'placeholder' => 'Enter Religion',
											'class'   => 'form-control text-capitalize text-semibold required'
											);
											echo form_input($data12);
											 ?>
		                                </div>
									</div>
									 <div class="col-md-6">
                                         <div class="form-group">
										<label class="control-label">Student Photo</label>
										<input type="file" name="student_profile" id="student_photo" class="form-control">						
									     </div>
                                    </div>
                                </div>
                                
								
							</fieldset>

							<fieldset title="2">
								<legend class="text-semibold">Contact Details</legend>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Present Address</label>
                                             <span class="req">*</span>
                                            <?php
											$data13 = array(
											'name'    => 'present_address',
											'id'	  => 'present_address',
											'value'   => '',
											'placeholder' => 'Enter Present Address',
											'class'   => 'form-control text-capitalize text-semibold required',
											'rows'   => '4'
											);
											echo form_textarea($data13);
											 ?>
		                                </div>
                                    </div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Permanent Address</label>
                                            <?php
											$data14 = array(
											'name'    => 'permanent_address',
											'id'	  => 'permanent_address',
											'value'   => '',
											'placeholder' => 'Enter Permanent Address',
											'class'   => 'form-control text-capitalize text-semibold ',
											'rows'   => '4'
											);
											echo form_textarea($data14);
											 ?>
		                                </div>
									</div>
                                  </div>   
                                  <div class="row">
									<div class="col-md-6">
		                                <div class="form-group">
											<label>Mobile</label>
                                             <span class="req">*</span>
                                            <?php
											$data15 = array(
											'name'    => 'con_mobile',
											'id'	  => 'con_mobile',
											'value'   => '',
											'onkeyup' => 'checkInt(this)',
											'placeholder' => 'Enter Mobile',
											'class'   => 'form-control text-capitalize text-semibold required'
											);
											echo form_input($data15);
											 ?>
		                                </div>
									</div>
                                    <div class="col-md-6">
		                                <div class="form-group">
											<label>E-mail</label>
                                             <span class="req">*</span>
                                            <?php
											$data16 = array(
											'name'    => 'con_email',
											'id'	  => 'con_email',
											'value'   => '',
											'placeholder' => 'Enter E-mail',
											'class'   => 'form-control  text-semibold required'
											);
											echo form_input($data16);
											 ?>
		                                </div>
									</div>
								  </div>
                                  
                                  <div class="row">
									<div class="col-md-6">
		                                <div class="form-group">
											<label>City</label>
                                             <span class="req">*</span>
                                            <?php
											$data17 = array(
											'name'    => 'con_city',
											'id'	  => 'con_city',
											'value'   => '',
											'placeholder' => 'Enter City',
											'class'   => 'form-control text-capitalize text-semibold required'
											);
											echo form_input($data17);
											 ?>
		                                </div>
									</div>
                                    <div class="col-md-6">
		                                <div class="form-group">
											<label>Pin</label>
                                             <span class="req">*</span>
                                            <?php
											$data18 = array(
											'name'    => 'con_pin',
											'id'	  => 'con_pin',
											'value'   => '',
											'onkeyup' => 'checkInt(this)',
											'placeholder' => 'Enter Pin no',
											'class'   => 'form-control text-capitalize text-semibold required'
											);
											echo form_input($data18);
											 ?>
		                                </div>
									</div>
								  </div>
                                  <div class="row">
									<div class="col-md-6">
		                                <div class="form-group">
                                        <span id="con">
											<label>Country</label>
                                       	  	 <span class="req">*</span>
                                            <?php
											echo form_dropdown('country', '','','class="form-control required" id="country"');
											 ?>
                                        </span>     
		                                </div>
									</div>
                                    <div class="col-md-6">
		                                <div class="form-group">
											<label>State</label>
                                        	 <span class="req">*</span>
                                           <?php
											echo form_dropdown('state', '','','id="state" class="form-control required"');
											 ?>
		                                </div>
									</div>
								  </div>
                                 
							</fieldset>

							<fieldset title="3">
								<legend class="text-semibold">Parent's Details</legend>
								<h6 class="panel-title"><span class="text-semibold">Father Details:-</span></h6>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
										    <label>Name</label>
                                             <span class="req">*</span>
                                            <?php
											$data21 = array(
											'name'    => 'father_name',
											'id'	  => 'father_name',
											'value'   => '',
											'placeholder' => 'Enter Father Name',
											'class'   => 'form-control text-capitalize text-semibold required'
											);
											echo form_input($data21);
											 ?>
	                                    </div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Mobile</label>
                                             <span class="req">*</span>
                                            <?php
											$data22 = array(
											'name'    => 'father_mobile',
											'id'	  => 'father_mobile',
											'value'   => '',
											'onkeyup' => 'checkInt(this)',
											'placeholder' => 'Enter mobile no',
											'class'   => 'form-control text-capitalize text-semibold required'
											);
											echo form_input($data22);
											 ?>
	                                    </div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
										    <label>Job</label>
                                            <?php
											$data22 = array(
											'name'    => 'father_job',
											'id'	  => 'father_job',
											'value'   => '',
											'placeholder' => 'Enter job title',
											'class'   => 'form-control text-capitalize text-semibold'
											);
											echo form_input($data22);
											 ?>
	                                    </div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Education</label>
                                            <?php
											$data23 = array(
											'name'    => 'father_education',
											'id'	  => 'father_education',
											'value'   => '',
											'placeholder' => 'Enter Education',
											'class'   => 'form-control text-capitalize text-semibold'
											);
											echo form_input($data23);
											 ?>
	                                    </div>
									</div>
                                    <div class="col-md-4">
										<div class="form-group">
										    <label>Income</label>
                                            <?php
											$data24 = array(
											'name'    => 'father_income',
											'id'	  => 'father_income',
											'value'   => '',
											'onkeyup' => 'checkInt(this)',
											'placeholder' => 'Enter Income',
											'class'   => 'form-control text-capitalize text-semibold'
											);
											echo form_input($data24);
											 ?>
	                                    </div>
									</div>
								</div>
                                <h6 class="panel-title"><span class="text-semibold">Mother Details:-</span></h6>
                                <div class="row">
                                    <div class="col-md-4">
										<div class="form-group">
										    <label>Name</label>
                                             <span class="req">*</span>
                                            <?php
											$data25 = array(
											'name'    => 'mother_name',
											'id'	  => 'mother_name',
											'value'   => '',
											'placeholder' => 'Enter Name',
											'class'   => 'form-control text-capitalize text-semibold required'
											);
											echo form_input($data25);
											 ?>
	                                    </div>
									</div>
                                    <div class="col-md-4">
										<div class="form-group">
											<label>Mobile</label>
                                             <span class="req">*</span>
                                            <?php
											$data26 = array(
											'name'    => 'mother_mobile',
											'id'	  => 'mother_mobile',
											'value'   => '',
											'onkeyup' => 'checkInt(this)',
											'placeholder' => 'Enter Mobile',
											'class'   => 'form-control text-capitalize text-semibold required'
											);
											echo form_input($data26);
											 ?>
	                                    </div>
									</div>
                                    <div class="col-md-4">
										<div class="form-group">
										    <label>Job</label>
                                            <?php
											$data27 = array(
											'name'    => 'mother_job',
											'id'	  => 'mother_job',
											'value'   => '',
											'placeholder' => 'Enter job',
											'class'   => 'form-control text-capitalize text-semibold'
											);
											echo form_input($data27);
											 ?>
	                                    </div>
									</div>
                                </div>
                              
							</fieldset>
                            
                            <fieldset title="4">
								<legend class="text-semibold">Guardian's Details</legend>
                               	 <div class="form_group">
                                    <label for="reg_input_name" class="">Guardian Not Available</label>
                                	<input  name="guardianavailable" id="checkbox1" type="checkbox" class="checked_guardian" onChange="show()">
                                 </div>
							<div class="answer">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
										    <label>Guardian's Name</label>
                                            <?php
											$data28 = array(
											'name'    => 'gud_name',
											'id'	  => 'gud_name',
											'value'   => '',
											'placeholder' => 'Enter Guardian Name',
											'class'   => 'form-control text-capitalize text-semibold'
											);
											echo form_input($data28);
											 ?>
	                                    </div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Guardian's Relation</label>
                                            <?php
											$data30 = array(
											'name'    => 'gud_relation',
											'id'	  => 'gud_relation',
											'value'   => '',
											'placeholder' => 'Enter Guardian relation',
											'class'   => 'form-control text-capitalize text-semibold'
											);
											echo form_input($data30);
											 ?>
	                                    </div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
										    <label>Guardian's Job</label>
                                            <?php
											$data31 = array(
											'name'    => 'gud_job',
											'id'	  => 'gud_job',
											'value'   => '',
											'placeholder' => 'Enter a Guardian job',
											'class'   => 'form-control text-capitalize text-semibold'
											);
											echo form_input($data31);
											 ?>
	                                    </div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Guardian's Education</label>
                                            <?php
											$data32= array(
											'name'    => 'gud_education',
											'id'	  => 'gud_education',
											'value'   => '',
											'placeholder' => 'Enter Guardian education',
											'class'   => 'form-control text-capitalize text-semibold'
											);
											echo form_input($data32);
											 ?>
	                                    </div>
									</div>
								</div>
                                <div class="row">
									<div class="col-md-6">
										<div class="form-group">
										    <label>Guardian's Income</label>
                                            <?php
											$data33 = array(
											'name'    => 'gud_income',
											'id'	  => 'gud_income',
											'value'   => '',
											'onkeyup' => 'checkInt(this)',
											'placeholder' => 'Enter Guardian income',
											'class'   => 'form-control text-capitalize text-semibold'
											);
											echo form_input($data33);
											 ?>
	                                    </div>
									</div>
                                    <div class="col-md-6">
										<div class="form-group">
										    <label>Guardian's Address</label>
                                            <?php
											$data34 = array(
											'name'    => 'gud_address',
											'id'	  => 'gud_address',
											'value'   => '',
											'placeholder' => 'Enter Guardian address',
											'class'   => 'form-control text-capitalize text-semibold',
											'rows'   => '4'
											);
											echo form_textarea($data34);
											 ?>
	                                    </div>
									</div>
                                </div>
                                
                                <div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Mobile</label>
                                            <?php
											$data35 = array(
											'name'    => 'gud_mobile',
											'id'	  => 'gud_mobile',
											'value'   => '',
											'onkeyup' => 'checkInt(this)',
											'placeholder' => 'Enter Guardian Mobile no',
											'class'   => 'form-control text-capitalize text-semibold'
											);
											echo form_input($data35);
											 ?>
	                                    </div>
									</div><div class="col-md-6">
										<div class="form-group">
										    <label>E-mail</label>
                                            <?php
											$data36 = array(
											'name'    => 'gud_email',
											'id'	  => 'gud_email',
											'value'   => '',
											'placeholder' => 'Enter Guardian E-mail',
											'class'   => 'form-control  text-semibold'
											);
											echo form_input($data36);
											 ?>
	                                    </div>
									</div>
								</div>
                                <div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>City</label>
                                            <?php
											$data37 = array(
											'name'    => 'gud_city',
											'id'	  => 'gud_city',
											'value'   => '',
											'placeholder' => 'Enter Guardian City',
											'class'   => 'form-control text-capitalize text-semibold'
											);
											echo form_input($data37);
											 ?>
	                                    </div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
										    <label>Country</label>
                                            <?php
											
											echo form_dropdown('gud_country', '','','id="country2" class="form-control"');
											 ?>
	                                    </div>
									</div>
								</div>
								</div>
							</fieldset>
                            
                            <fieldset title="5">
                            	<legend class="text-semibold">Previous Qualification</legend>
                                 
                                <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                         <label>School Name</label>
                                         <?php
											$data39 = array(
											'name'    => 'school_name',
											'id'	  => 'school_name',
											'value'   => '',
											'placeholder' => 'Enter school name',
											'class'   => 'form-control text-capitalize text-semibold'
											);
											echo form_input($data39);
											 ?>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                        <label>Qualification</label>
                                        <?php
											$data40 = array(
											'name'    => 'school_qualification',
											'id'	  => 'school_qualification',
											'value'   => '',
											'placeholder' => 'Enter  Qualification',
											'class'   => 'form-control text-capitalize text-semibold'
											);
											echo form_input($data40);
											 ?>
                                       </div>
                                     </div>
                                  </div>
                                <div class="form-group">
                                    <label>School Address</label>  
                                    <?php
										$data41 = array(
										'name'    => 'school_address',
										'id'	  => 'school_address',
										'value'   => '',
										'placeholder' => 'Enter School Address',
										'class'   => 'form-control text-capitalize text-semibold',
										);
										echo form_textarea($data41);
										 ?>                                  
                                </div>
                            </fieldset>

							<button type="submit" class="btn btn-primary stepy-finish">Submit <i class="icon-check position-right"></i></button>
						</form>
		            </div>
		            <!-- /basic setup -->
                    

 <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/country.js"></script>
<script language="javascript">
 populateCountries("country", "state");
 populateCountries("country2");
</script>
                  
<?php
include("include/main_js.php");
//include("validation/add_student_details.php");
include("include/footer.php");
?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/validation/validate.min.js"></script>
<script type="text/javascript">
function checkInt(obj)
{
	if(obj.value*1 - obj.value*1!=0)
		{obj.value="";}
	
	if(obj.value.indexOf(" ",0)!=-1)
		{
		obj.value="";
		alert ("No Spaces Allowed");	
		obj.focus();
		obj.value="";
		}
}
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#class_id').change(function(){
			var class_id = $('#class_id').val();
			/*alert(class_id);*/
			$.ajax({
				type : "GET",
				url  : "<?php echo base_url(); ?>/index.php/academic/check_academic_year",
				data :{"class_id" : class_id},
				success : function(data){
					jQuery("#academic_id").html(data);
					/*alert(data);*/
				}
			});
			
		});	
	});
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#register_no').change(function(){
			var register_no = $('#register_no').val();
			/*alert(register_no);*/
			$.ajax({
				type : "GET",
				url  : "<?php echo base_url(); ?>/index.php/student/ajax_check_register",
				data :{"register_no" : register_no},
				success : function(data){
					jQuery("#alert_reg_no").html(data);
					/*alert(data);*/
				}
			});
			
		});	
	});
</script>
<script type="text/javascript">
function show()
{
    if($('.checked_guardian').is(":checked"))   
        $(".answer").hide(500);
    else
        $(".answer").show(500);
}
</script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/wizard_stepy.js"></script>
