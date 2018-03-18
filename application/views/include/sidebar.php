<div class="sidebar sidebar-main sidebar-fixed">
				<div class="sidebar-content">

					<!-- User menu -->
					<div class="sidebar-user">
						<div class="category-content">
							<div class="media">
								<a href="#" class="media-left"><img src="<?php echo base_url(); ?>uploads/admin_profile/<?php echo $this->session->userdata('profile'); ?>" class="img-circle img-sm" alt="<?php echo $this->session->userdata('profile'); ?>"></a>
								<div class="media-body">
									<h5 class="media-heading text-semibold"><?php echo $this->session->userdata('user_full_name'); ?></h5>
									<div class="text-size-mini text-muted">
										 &nbsp; School Management 
                                   </div>
								</div>

								<div class="media-right media-middle">
									<ul class="icons-list">
										<li>
											<a href="#"><i class="icon-cog3"></i></a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<!-- /user menu -->
					<!-- Main navigation -->
					<div class="sidebar-category sidebar-category-visible">
						<div class="category-content no-padding">
							<ul class="navigation navigation-main navigation-accordion">
                               <?php
								// start for check user rights
								$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));
								$ses_username = $this->session->userdata('username');                    
								// end for check user rights
							   ?>
								<!-- Main -->
								<li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
								<li <?php if($page_name=="dashboard"){ echo 'class="active"'; } ?>><?php echo anchor('project_main/dashboard', '<i class="icon-home4"></i> <span>Dashboard</span>'); ?></li>
                                
                                <!-- Academic -->
								<li>
									<a href="#"><i class="icon-graduation2"></i> <span>Academic</span></a>
                                    <ul>
                                     <?php if((in_array('Class Details',$user_typ_ary)==true)||$ses_username=="admin"){ ?>
										<li <?php if(($page_name=="class_details_list")||($page_name=="validate_class_details")||($page_name=="edit_validate_class_details")||($page_name=="edit_class_details")){ echo 'class="active"'; }?>>
										 <?php echo anchor('class_details/class_details_list', 'Add Class', ''); ?>
                                         </li>
                                     <?php } //check for class ?>
                                      <?php if((in_array('Subject Details',$user_typ_ary)==true)||$ses_username=="admin"){ ?>
										<li <?php if(($page_name=="subject_details_list")||($page_name=="validate_subject_details")||($page_name=="edit_validation_subject_details")||($page_name=="edit_subject_details")){ echo 'class="active"'; }?>>
										<?php echo anchor('subject_details/subject_details_list', 'Add Subject', ''); ?>
                                         </li>
                                     <?php } //check for subject ?>
                                   
                                     <?php if((in_array('Subject Allocation',$user_typ_ary)==true)||$ses_username=="admin"){ ?>
                                     <li <?php if(($page_name=="subject_allocation_list")||($page_name=="validate_subject_allocation_details")||($page_name=="edit_subject_allocation_details")||($page_name=="edit_validate_subject_allocation")){ echo 'class="active"'; }?>>
                                     <?php echo anchor('subject_allocation/subject_allocation_list', 'Subject Allocation', ''); ?>
                                     </li>
                                     <?php } //check for Subject allocation ?>
									</ul>
								</li>
								
								<!-- /academic -->
								<li>
									<a href="#"><i class="icon-users2"></i> <span>Student</span></a>
									<ul>
                                     <?php if((in_array('Student Category',$user_typ_ary)==true)||$ses_username=="admin"){ ?>
										<li <?php if(($page_name=='student_category_details_list')||($page_name=="validate_student_category_details")||($page_name=="edit_student_category_details")||($page_name=="edit_validate_student_category_details")||($page_name=="student_category_details_list")){ echo 'class="active"'; }?>>
										<?php echo anchor('student_category/student_category_details_list', 'Student Category', ''); ?>
                                         </li>
                                     <?php } //check for Student category ?>
                                     <?php if((in_array('Student Admission',$user_typ_ary)==true)||$ses_username=="admin"){ ?>
										<li <?php if(($page_name=='add_student_details')||($page_name=="validate_student_details")){ echo 'class="active"'; }?>>
										<?php echo anchor('student/add_student_details', 'Student Admission', ''); ?>
                                         </li>
                                     <?php } //check for Student Admission ?>
                                      <?php if((in_array('Student Details',$user_typ_ary)==true)||$ses_username=="admin"){ ?>
										<li <?php if(($page_name=='student_details_list')||($page_name=="edit_student_details")||($page_name=="view_student_details")){ echo 'class="active"'; }?>>
										<?php echo anchor('student/student_details_list', 'Student List', ''); ?>
                                         </li>
                                     <?php }//check for Student details list ?>
									</ul>
                                   
								</li>
								<!-- /student -->
                                <li>
									<a href="#"><i class="icon-cash"></i> <span>Finance</span></a>
									<ul>
                                     <?php if((in_array('Fees Details',$user_typ_ary)==true)||$ses_username=="admin"){ ?>
										<li <?php if(($page_name=='fees_details_list')||($page_name=='validation_fees_details')||($page_name=='edit_fees_details')||($page_name=='edit_validate_fees_details')){ echo 'class="active"'; }?>>
										<?php echo anchor('fees_details/fees_details_list', 'Class Fees', ''); ?>
                                         </li>
                                     <?php } //check for Fees Details ?>
									</ul>
                                   
								</li>
								<!-- /finance -->
                                <!--Employee-->
                                <li>
									<a href="#"><i class="icon-users4"></i> <span>Employee Management</span></a>
									<ul>
                                     <?php if((in_array('Employee Department',$user_typ_ary)==true)||$ses_username=="admin"){ ?>
										<li <?php if(($page_name=='employee_department_details_list')||($page_name=="edit_employee_department_details")||($page_name=="validate_employee_department_details")||($page_name=="validate_edit_employee_department")){ echo 'class="active"'; }?>>
										<?php echo anchor('employee_department/employee_department_details_list', 'Add Department', ''); ?>
                                         </li>
                                     <?php } //check for employee_department?>
                                     <?php if((in_array('Employee Designation',$user_typ_ary)==true)||$ses_username=="admin"){ ?>
										<li <?php if(($page_name=='employee_designation_details_list')||($page_name=="edit_employee_designation_details")||($page_name=="validate_employee_designation_details")||($page_name=="validate_edit_employee_designation")){ echo 'class="active"'; }?>>
										<?php echo anchor('employee_designation/employee_designation_details_list', 'Add Designation', ''); ?>
                                         </li>
                                     <?php } //check for employee_Designation?>
                                     <?php if((in_array('Add Employee',$user_typ_ary)==true)||$ses_username=="admin"){ ?>
										<li <?php if(($page_name=='add_employee_details')||($page_name=="edit_employee_details")||($page_name=="validate_employee_details")||($page_name=="validate_edit_employee_details")){ echo 'class="active"'; }?>>
										<?php echo anchor('employee/add_employee_details', 'Add Employee', ''); ?>
                                         </li>
                                     <?php } //check for employee_Details?>
                                     <?php if((in_array('Employee Details',$user_typ_ary)==true)||$ses_username=="admin"){ ?>
										<li <?php if(($page_name=='employee_details_list')||($page_name=="edit_employee_details")||($page_name=="validate_edit_employee_details")||($page_name=="view_employee_details")){ echo 'class="active"'; }?>>
										<?php echo anchor('employee/employee_details_list', 'Employee List', ''); ?>
                                         </li>
                                     <?php } //check for employee_Details?>
									</ul>
								</li>
                                <!--Employee-->
                                
                                 <li>
									<a href="#"><i class="icon-cog52"></i> <span>Settings</span></a>
									<ul>
                                     <?php if((in_array('Institution Details',$user_typ_ary)==true)||$ses_username=="admin"){ ?>
										<li <?php if(($page_name=='institution_details_list')||($page_name=='add_institution_details')||($page_name=='validate_institution_details')||($page_name=='edit_institution_details')||($page_name=='view_institution_details')){ echo 'class="active"'; }?>>
										<?php echo anchor('institution/institution_details_list', 'Institution Details', ''); ?>
                                         </li>
                                     <?php } //check for Setting Details ?>
                                       <?php if((in_array('Academic Details',$user_typ_ary)==true)||$ses_username=="admin"){ ?>
										<li <?php if(($page_name=="academic_details_list")||($page_name=="validate_academic_details")||($page_name=="edit_validate_academic_details")||($page_name=="edit_academic_details")){ echo 'class="active"'; }?>>
										<?php echo anchor('academic/academic_details_list', 'Academic Year', ''); ?>
                                         </li>
                                     <?php } //check for academic ?>
                                      <?php if((in_array('Enquiry Details',$user_typ_ary)==true)||$ses_username=="admin"){ ?>
										<li <?php if(($page_name=="enquiry_details_list")||($page_name=="add_enquiry_details")||($page_name=="edit_enquiry_details")||($page_name=="edit_validate_enquiry_details")||($page_name=="validate_enquiry_details")){ echo 'class="active"'; }?>>
										<?php echo anchor('enquiry/enquiry_details_list', 'Enquiry', ''); ?>
                                         </li>
                                     <?php } //check for enquiry ?>
                                     <!-- user details -->
                                        <li>
                                            <a href="#"><!--<i class=" icon-user"></i>--> <span>User Details</span></a>
                                            <ul>
                                             <?php if((in_array('User Rights',$user_typ_ary)==true)||$ses_username=="admin"){ ?>
                                                <li <?php if(($page_name=='user_rights_details_list')||($page_name=='add_user_rights_details')||($page_name=='edit_user_rights_details')){ echo 'class="active"'; }?>>
                                                <?php echo anchor('user_rights_details/user_rights_details_list', 'User Rights', ''); ?>
                                                 </li>
                                             <?php } //check for user rights ?>
                                             
                                             <?php if((in_array('User',$user_typ_ary)==true)||$ses_username=="admin"){ ?>
                                                <li <?php if(($page_name=='user_details_list')||($page_name=="add_user_details")||($page_name=="edit_user_details")){ echo 'class="active"'; }?>>
                                                 <?php echo anchor('user_details/user_details_list', 'User'); ?>
                                                 </li>
                                             <?php } //check for user rights ?>
                                            </ul>
                                        </li>
                                        <!-- /user details -->
									</ul>
                                   
								</li>
								<!-- /setting -->
								
           
							</ul>
						</div>
					</div>
					<!-- /main navigation -->

				</div>
			</div>
            
        