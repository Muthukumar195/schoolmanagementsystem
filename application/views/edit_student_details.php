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
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Edit Student</h4>
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
							<h5 class="panel-title"><i class="icon-pencil6"></i>&nbsp;<strong>Edit Student Details</strong></h5>
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
                             <?php echo form_open_multipart('student/validate_edit_student_details'); ?>
                             <span style="color:red; "><?php echo validation_errors(); ?></span> 
                             <?php foreach($get_student_details->result() as $row){ ?>
                           <div class="tabbable">
                                <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                                    <li class="active"><a href="#justified-right-icon-tab1" data-toggle="tab">Official Details <i class="icon-user-tie position-right"></i></a></li>
                                    <li><a href="#justified-right-icon-tab2" data-toggle="tab">Contact Details <i class="icon-phone2 position-right"></i></a></li>
                                    <li><a href="#justified-right-icon-tab3" data-toggle="tab">Parent's Details <i class="icon-man-woman position-right"></i></a></li>
                                    <li><a href="#justified-right-icon-tab4" data-toggle="tab">Guardian's Details <i class="icon-users2 position-right"></i></a></li>             
                                    <li><a href="#justified-right-icon-tab5" data-toggle="tab">Previous Qualification <i class="icon-user-check position-right"></i></a></li>
                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane active" id="justified-right-icon-tab1">
                                        <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                               <label>Register Number:</label>
												<?php
                                                $data1 = array(
                                                'name'    => 'register_no',
                                                'id'	  => 'register_no',
                                                'value'   => $row->Student_register_no,
                                                'placeholder' => 'Enter Register Number',
                                                'class'   => 'form-control text-capitalize text-semibold'
                                                );
                                                echo form_input($data1);
                                                 ?>
                                                 <span id="alert_reg_no" style="color:#F00;"></span>
                                                 <input type="hidden" name="id" value="<?php echo $row->Student_id ?>">
                                            </div>
                                         </div>
                                         <div class="col-md-6">
                                            <div class="form-group">
                                               <label>Joining Date:</label>
                                                <div class="input-group">
                                                <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                                <?php
                                                $data2 = array(
                                                'name'    => 'joining_date',
                                                'id'	  => 'joining_date',
                                                'value'   => $row->Student_join_date,
                                                'placeholder' => 'Joining Date',
                                                'class'   => 'form-control pickadate-accessibility text-semibold'
                                                );
                                                echo form_input($data2);
                                                 ?>
                                                </div>
                                            </div>
                                          </div>
                                          </div> 
                                          
                                          <div class="row">
                                          <div class="col-md-4">
                                              <div class="form-group">
                                              <label>Roll No:</label>
												<?php
                                                $data3 = array(
                                                'name'    => 'roll_no',
                                                'id'	  => 'roll_no',
                                                'value'   => $row->Student_roll_no,
                                                'placeholder' => 'Enter Roll no',
                                                'class'   => 'form-control text-capitalize text-semibold'
                                                );
                                                echo form_input($data3);
                                                 ?>
                                              </div>
                                            </div>
                                          <div class="col-md-4"> 
                                            <div class="form-group">
                                               <label>Course Name:</label>
												<?php 
                                                $option_cor[''] = "Select Course Name";
                                                foreach($course_list->result() as $course){
                                                    
                                                    $option_cor[$course->Course_id] = $course->Course_name;
                                                }
                                                echo form_dropdown('course_name', $option_cor, $row->Student_course_id, 'class="select form-control" id="course_id"');
                                                ?>
                                             </div>
                                           </div>
                                           <div class="col-md-4">
                                             <div class="form-group">
                                               <label>Batch:</label>
                                                 <?php 
                                                $option_bat[''] = "Select Batch Name";
                                                foreach($batch_list->result() as $batch){
                                                    
                                                    $option_bat[$batch->Batch_id] = $batch->Batch_name;
                                                }
                                                echo form_dropdown('batch_name', $option_bat, $row->Student_batch_id, 'class="select form-control" id="batch_id"');
                                                ?>
                                              </div>
                                            </div>
                                            
                                            </div>
                                            <div class="row">
                                            <div class="col-md-4">
                                              <div class="form-group">
                                                 <label>First Name:</label>
                                                 <?php
													$data4 = array(
													'name'    => 'first_name',
													'id'	  => 'first_name',
													'value'   => $row->Student_first_name,
													'placeholder' => 'Enter First name',
													'class'   => 'form-control text-capitalize text-semibold'
													);
													echo form_input($data4);
												?>
                                              </div>
                                            </div>
                                            <div class="col-md-4">
                                              <div class="form-group">
                                                    <label>Middle Name:</label>
                                                     <?php
													$data5 = array(
													'name'    => 'middle_name',
													'id'	  => 'middle_name',
													'value'   => $row->Student_middle_name,
													'placeholder' => 'Enter Middle name',
													'class'   => 'form-control text-capitalize text-semibold'
													);
													echo form_input($data5);
													 ?>
                                              </div>
                                            </div>
                                            <div class="col-md-4">
                                              <div class="form-group">
                                                    <label>Last Name:</label>
                                                    <?php
													$data6 = array(
													'name'    => 'last_name',
													'id'	  => 'last_name',
													'value'   => $row->Student_last_name,
													'placeholder' => 'Enter Last name',
													'class'   => 'form-control text-capitalize text-semibold'
													);
													echo form_input($data6);
													 ?>
                                              </div>
                                            </div>
                                            </div>
                                            <div class="row">									
                                            <div class="col-md-4">
                                              <div class="form-group">
                                                    <label>Date Of Birth:</label>
                                                    <div class="input-group">
                                                    <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                                    <?php
													$data7 = array(
													'name'    => 'dob',
													'id'	  => 'dob',
													'value'   => $row->Student_date_of_birth,
													'placeholder' => 'Date of birth',
													'class'   => 'form-control pickadate-accessibility text-semibold'
													);
													echo form_input($data7);
													 ?>
                                                    </div>
                                               </div>    
                                             </div>
                                             <div class="col-md-4">
                                               <div class="form-group">
                                                    <label>Gender:</label>
                                                    <?php
													$option_gen[''] = "Select Gender";
													$option_gen = array(
													''      => "Select Gender",
													'Male'    => 'Male',
													'Female'  => 'Female',
													);
													echo form_dropdown('gender', $option_gen, $row->Student_gender, 'class="select form-control"');
													 ?>
                                               </div>		
                                             </div>
                                             <div class="col-md-4">
                                               <div class="form-group">
                                                    <label>Blood Group:</label>
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
													echo form_dropdown('blood_group', $option, $row->Student_blood_group, 'class="select form-control"');
													 ?>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Birth Place:</label>
                                                     <?php
													$data9 = array(
													'name'    => 'birth_place',
													'id'	  => 'birth_place',
													'value'   => $row->Student_birth_place,
													'placeholder' => 'Enter Birth place',
													'class'   => 'form-control text-capitalize text-semibold'
													);
													echo form_input($data9);
													 ?>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Nationality:</label>
                                                    <?php
													$data10 = array(
													'name'    => 'nationality',
													'id'	  => 'nationality',
													'value'   => $row->Student_nationalaty,
													'placeholder' => 'Enter Nationality',
													'class'   => 'form-control text-capitalize text-semibold'
													);
													echo form_input($data10);
													 ?>
                                                </div>    
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Mother Tongue:</label>
                                                     <?php
													$data11 = array(
													'name'    => 'mother_tongue',
													'id'	  => 'mother_tongue',
													'value'   => $row->Student_mother_tongue,
													'placeholder' => 'Enter Mother tongue',
													'class'   => 'form-control text-capitalize text-semibold'
													);
													echo form_input($data11);
													 ?>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                   <label>Category:</label>
													<?php 
                                                    $option_cat[''] = "Select Category Name";
                                                    foreach($student_category_list->result() as $category){
                                                        
                                                        $option_cat[$category->Student_cat_id] = $category->Student_cat_name;
                                                    }
                                                    echo form_dropdown('cat_name', $option_cat, $row->Student_category_id, 'class="select form-control"');
                                                    ?>
                                                </div>    
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Religion:</label>
                                                    <?php
													$data12 = array(
													'name'    => 'religion',
													'id'	  => 'religion',
													'value'   => $row->Student_religion,
													'placeholder' => 'Enter Religion',
													'class'   => 'form-control text-capitalize text-semibold'
													);
													echo form_input($data12);
													 ?>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                <label class="control-label">Student Photo:</label>
                                                <a href="<?php echo base_url(); ?>uploads/student_profile/<?php echo $row->Student_profile; ?>" style=" float:right;     margin-bottom: -50px;"  target="_blank">
					                        <img src="<?php echo base_url(); ?>uploads/student_profile/<?php echo $row->Student_profile; ?>" alt="" class="img-rounded img-preview">
				                        </a>
                                                <input type="file" name="student_profile" id="student_photo" class="form-control">
                                                </div>
                                            </div>
                                         </div> 
                                         <div style="text-align: -webkit-right;">
                                            <button type="submit" class="btn btn-info">Save</button>
                                         </div>
                                    </div>

                                    <div class="tab-pane" id="justified-right-icon-tab2">
                                    
                                        <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label>Present Address:</label>
											   <?php
                                                $data13 = array(
                                                'name'    => 'present_address',
                                                'id'	  => 'present_address',
                                                'value'   => $row->Student_present_address,
                                                'placeholder' => 'Enter Present Address',
                                                'class'   => 'form-control text-capitalize text-semibold',
                                                'rows'   => '4'
                                                );
                                                echo form_textarea($data13);
                                                 ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label>Permanent Address:</label>
                                            <?php
											$data14 = array(
											'name'    => 'permanent_address',
											'id'	  => 'permanent_address',
											'value'   => $row->Student_permanent_address,
											'placeholder' => 'Enter Permanent Address',
											'class'   => 'form-control text-capitalize text-semibold',
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
                                                <label>Mobile:</label>
                                                <?php
												$data15 = array(
												'name'    => 'con_mobile',
												'id'	  => 'con_mobile',
												'value'   => $row->Student_phone,
												'placeholder' => 'Enter Mobile',
												'class'   => 'form-control text-capitalize text-semibold'
												);
												echo form_input($data15);
												 ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>E-mail:</label>
                                                <?php
												$data16 = array(
												'name'    => 'con_email',
												'id'	  => 'con_email',
												'value'   => $row->Student_email,
												'placeholder' => 'Enter E-mail',
												'class'   => 'form-control  text-semibold'
												);
												echo form_input($data16);
												 ?>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label>City:</label>
                                            <?php
											$data17 = array(
											'name'    => 'con_city',
											'id'	  => 'con_city',
											'value'   => $row->Student_city,
											'placeholder' => 'Enter City',
											'class'   => 'form-control text-capitalize text-semibold'
											);
											echo form_input($data17);
											 ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label>Pin:</label>
                                            <?php
											$data18 = array(
											'name'    => 'con_pin',
											'id'	  => 'con_pin',
											'value'   => $row->Student_pincode,
											'placeholder' => 'Enter Pin no',
											'class'   => 'form-control text-capitalize text-semibold'
											);
											echo form_input($data18);
											 ?>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label>Country:</label>
                                                <?php echo form_dropdown('country', '',$row->Student_county,'id="country" class="form-control"'); ?>
                                            </div>
                                         </div>
                                         <div class="col-md-6">
                                            <div class="form-group">
                                            <label>State:</label>
                                                <?php echo form_dropdown('state', '',$row->Student_state,'id="state" class="form-control"'); ?>
                                            </div>
                                        </div>
                                        </div>
                                        <div style="text-align: -webkit-right;">
                                            <button type="submit" class="btn btn-info">Save </button>
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="justified-right-icon-tab3">
                                    <h6>Father Detailes</h6>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Name:</label>
                                                 <?php
													$data21 = array(
													'name'    => 'father_name',
													'id'	  => 'father_name',
													'value'   => $row->Student_father_name,
													'placeholder' => 'Enter Father Name',
													'class'   => 'form-control text-capitalize text-semibold'
													);
													echo form_input($data21);
													 ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Mobile:</label>
                                                 <?php
												$data22 = array(
												'name'    => 'father_mobile',
												'id'	  => 'father_mobile',
												'value'   => $row->Student_father_mobile,
												'placeholder' => 'Enter mobile no',
												'class'   => 'form-control text-capitalize text-semibold'
												);
												echo form_input($data22);
												 ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Job:</label>
                                                 <?php
													$data22 = array(
													'name'    => 'father_job',
													'id'	  => 'father_job',
													'value'   => $row->Student_father_occupation,
													'placeholder' => 'Enter job title',
													'class'   => 'form-control text-capitalize text-semibold'
													);
													echo form_input($data22);
													 ?>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Education:</label>
                                                <?php
													$data23 = array(
													'name'    => 'father_education',
													'id'	  => 'father_education',
													'value'   => $row->Student_father_education,
													'placeholder' => 'Enter Education',
													'class'   => 'form-control text-capitalize text-semibold'
													);
													echo form_input($data23);
													 ?>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                            <label>Income:</label>
                                              <?php
											$data24 = array(
											'name'    => 'father_income',
											'id'	  => 'father_income',
											'value'   => $row->Student_father_income,
											'placeholder' => 'Enter Income',
											'class'   => 'form-control text-capitalize text-semibold'
											);
											echo form_input($data24);
											 ?>
                                            </div>
                                         </div>
                                    </div>
                                    <h6>Mother Detailes:</h6>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Name:</label>
                                                <?php
												$data25 = array(
												'name'    => 'mother_name',
												'id'	  => 'mother_name',
												'value'   => $row->Student_mother_name,
												'placeholder' => 'Enter Name',
												'class'   => 'form-control text-capitalize text-semibold'
												);
												echo form_input($data25);
												 ?>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Mobile:</label>
                                                <?php
													$data26 = array(
													'name'    => 'mother_mobile',
													'id'	  => 'mother_mobile',
													'value'   => $row->Student_mother_mobile,
													'placeholder' => 'Enter Mobile',
													'class'   => 'form-control text-capitalize text-semibold'
													);
													echo form_input($data26);
													 ?>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Job:</label>
                                                <?php
												$data27 = array(
												'name'    => 'mother_job',
												'id'	  => 'mother_job',
												'value'   => $row->Student_mother_occupation,
												'placeholder' => 'Enter job',
												'class'   => 'form-control text-capitalize text-semibold'
												);
												echo form_input($data27);
												 ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="text-align: -webkit-right;">
                                        <button type="submit" class="btn btn-info">Save </button>
                                    </div>
                                    </div>

                                    <div class="tab-pane" id="justified-right-icon-tab4">
                                   <!-- <div class="form_group">
                                        <label for="reg_input_name" class="">Guardian Available</label>
                                        <input  name="guardianavailable" id="checkbox1" type="checkbox">
                                    </div>-->

                                    <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Guardian's Name:</label>
                                            <?php
											$data28 = array(
											'name'    => 'gud_name',
											'id'	  => 'gud_name',
											'value'   => $row->Student_guardian_name,
											'placeholder' => 'Enter Guardian Name',
											'class'   => 'form-control text-capitalize text-semibold'
											);
											echo form_input($data28);
											 ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Guardian's Relation:</label>
                                             <?php
											$data30 = array(
											'name'    => 'gud_relation',
											'id'	  => 'gud_relation',
											'value'   => $row->Student_guardian_relationship,
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
                                            <label>Guardian's Job:</label>
                                            <?php
											$data31 = array(
											'name'    => 'gud_job',
											'id'	  => 'gud_job',
											'value'   => $row->Student_guardian_occupation,
											'placeholder' => 'Enter a Guardian job',
											'class'   => 'form-control text-capitalize text-semibold'
											);
											echo form_input($data31);
											 ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Guardian's Education:</label>
                                             <?php
											$data32= array(
											'name'    => 'gud_education',
											'id'	  => 'gud_education',
											'value'   => $row->Student_guardian_education,
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
                                            <label>Guardian's Income:</label>
                                            <?php
											$data33 = array(
											'name'    => 'gud_income',
											'id'	  => 'gud_income',
											'value'   => $row->Student_guardian_income,
											'placeholder' => 'Enter Guardian income',
											'class'   => 'form-control text-capitalize text-semibold'
											);
											echo form_input($data33);
											 ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                        <label>Guardian's Address:</label>
                                        <?php
											$data34 = array(
											'name'    => 'gud_address',
											'id'	  => 'gud_address',
											'value'   => $row->Student_guardian_address,
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
                                            <label>Mobile:</label>
                                            <?php
											$data35 = array(
											'name'    => 'gud_mobile',
											'id'	  => 'gud_mobile',
											'value'   => $row->Student_guardian_mobile,
											'placeholder' => 'Enter Guardian Mobile no',
											'class'   => 'form-control text-capitalize text-semibold'
											);
											echo form_input($data35);
											 ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>E-mail:</label>
                                            <?php
											$data36 = array(
											'name'    => 'gud_email',
											'id'	  => 'gud_email',
											'value'   => $row->Student_guardian_email,
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
                                            <label>City:</label>
                                             <?php
											$data37 = array(
											'name'    => 'gud_city',
											'id'	  => 'gud_city',
											'value'   => $row->Student_guardian_city,
											'placeholder' => 'Enter Guardian City',
											'class'   => 'form-control text-capitalize text-semibold'
											);
											echo form_input($data37);
											 ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Country:</label>
                                             <?php echo form_dropdown('gud_country', '',$row->Student_guardian_country,'id="country2" class="form-control"'); ?>
                                        </div>
                                    </div>
                                    </div>
                                    <div style="text-align: -webkit-right;">
                                        <button type="submit" class="btn btn-info">Save </button>
                                    </div>
                                    </div>
                                    
                                    <div class="tab-pane" id="justified-right-icon-tab5">
                                        <div class="row">
                                        <div class="col-md-6">
                                           <div class="form-group">
                                             <label>School Name</label>
                                             <?php
												$data39 = array(
												'name'    => 'school_name',
												'id'	  => 'school_name',
												'value'   => $row->Student_pre_sch_name,
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
											'value'   => $row->Student_pre_sch_qualification,
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
										'value'   => $row->Student_pre_sch_address,
										'placeholder' => 'Enter School Address',
										'class'   => 'form-control text-capitalize text-semibold',
										);
										echo form_textarea($data41);
										 ?>                                       
                                      </div>
                                      <div style="text-align: -webkit-right;">
                                         <button type="save" class="btn btn-info">Save </button>
                                      </div>
                                    </div>
                                </div>
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
include("validation/add_student_details.php");  
include("include/footer.php");
?>

<script type="text/javascript">
	$(document).ready(function(){
		$('#course_id').change(function(){
			var course_id = $('#course_id').val();
			$.ajax({
				type : "GET",
				url  : "<?php echo base_url(); ?>/index.php/student/check_student_batch",
				data :{"course_id" : course_id},
				success : function(data){
					jQuery("#batch_id").html(data);
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
