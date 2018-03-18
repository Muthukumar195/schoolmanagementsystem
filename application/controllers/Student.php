<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Student extends CI_controller{
	
	public function __construct(){
		
		parent::__construct();
		$this->load->model('student_model');
		$this->load->model('class_model');
		$this->load->model('student_category_model');
		$this->load->model('academic_model');
	}
	
	function student_details_list(){
		
		// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("Student", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}	
		if(! $this->session->userdata('username'))
		{
			$this->check_isvalidated();
		}
		else{
			
			$data['student_details_list'] = $this->student_model->student_details_list();
			$this->load->view('student_details_list', $data);
		}
	}
	function add_student_details(){
		
		// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("Student", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}	
		if(! $this->session->userdata('username'))
		{
			$this->check_isvalidated();
		}
		else{
			
			$data['class_list'] = $this->class_model->class_list();
			$data['academic_list'] = $this->academic_model->academic_list();
			$data['student_category_list'] = $this->student_category_model->student_category_list();
		    $this->load->view('add_student_details', $data);
		}
	}
	
	// start add Student details in table
    public function validate_student_details()
    { 
    	// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("Student", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}
    	if(! $this->session->userdata('username'))
		{
			$this->check_isvalidated();
		}
		else
		{ 
	   		$this->load->library('form_validation');
	   		$this->form_validation->set_rules('register_no', 'Register Number', 'trim|required|callback_check_register|xss_clean');
	   		$this->form_validation->set_rules('joining_date', 'Joining Date', 'trim|required|xss_clean');
	   		$this->form_validation->set_rules('roll_no', 'Roll no', 'trim|required|xss_clean');
	   		$this->form_validation->set_rules('class_name', 'Student class', 'trim|required|xss_clean');
			$this->form_validation->set_rules('academic_name', 'Student academic', 'trim|required|xss_clean');
			$this->form_validation->set_rules('cat_name', 'Student Category', 'trim|required|xss_clean');
			$this->form_validation->set_rules('first_name', 'First name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('last_name', 'Last name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('dob', 'Date of birth', 'trim|required|xss_clean');
			$this->form_validation->set_rules('gender', 'Gender', 'trim|required|xss_clean');
			$this->form_validation->set_rules('birth_place', 'Birth Place', 'trim|required|xss_clean');
			$this->form_validation->set_rules('nationality', 'nationality', 'trim|required|xss_clean');
			$this->form_validation->set_rules('mother_tongue', 'Mother Tongue', 'trim|required|xss_clean');
			$this->form_validation->set_rules('religion', 'Religion', 'trim|required|xss_clean');
			$this->form_validation->set_rules('present_address', 'Present address', 'trim|required|xss_clean');
			$this->form_validation->set_rules('con_mobile', 'Mobile', 'trim|required|xss_clean');
			$this->form_validation->set_rules('con_email', 'E-mail', 'trim|required|xss_clean');
			$this->form_validation->set_rules('con_city', 'City', 'trim|required|xss_clean');
			$this->form_validation->set_rules('con_pin', 'Pin', 'trim|required|xss_clean');
			$this->form_validation->set_rules('country', 'County', 'trim|required|xss_clean');
			$this->form_validation->set_rules('state', 'State', 'trim|required|xss_clean');
			if($this->form_validation->run() == FALSE)
	   		{
				$data['class_list'] = $this->class_model->class_list();
			    $data['academic_list'] = $this->academic_model->academic_list();	
				$data['student_category_list'] = $this->student_category_model->student_category_list();
				$this->load->view('add_student_details', $data); 	
			}
			else
			{ 
				$this->load->helper('inflector');
				$config = array(
				/*'file_name'=>'ssssssssssss',*/
				'upload_path' => "./uploads/student_profile/",
				'allowed_types' => "gif|jpg|png|jpeg|pdf",
				'overwrite' => FALSE,
				'max_size' => "2048000" // Can be set to particular file size , here it is 2 MB(2048 Kb)
				/*'max_height' => "768",
				'max_width' => "1024"*/
				);
				$this->load->library('upload', $config);
				if($query = $this->student_model->add_student_details())
				{ 
					if($this->upload->do_upload('student_profile'))
					{ 
					$res = $this->upload->data();
					$file_path     = $res['file_path'];
					$file         = $res['full_path'];
					$file_ext     = $res['file_ext'];
					$final_file_name = $this->student_model->upload_file($file_ext); 
					rename($file, $file_path . $final_file_name); 
					}
					$this->session->set_flashdata('success_msg', 'Student details added successfully!');					
					redirect('student/add_student_details');
				}
			}
		}
    }
	// end add Student details in table
	
	
	//start Edit Student Details
	function edit_student_details(){
		
		// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("Student", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}	
		if(! $this->session->userdata('username'))
		{
			$this->check_isvalidated();
		}
		else{
			
			$data['class_list'] = $this->class_model->class_list();
			$data['academic_list'] = $this->academic_model->academic_list();
			$data['student_category_list'] = $this->student_category_model->student_category_list();
			$data['get_student_details']  = $this->student_model->get_student_details($this->input->get('id'));
		    $this->load->view('edit_student_details', $data);
		}
		
	}
	//End Edit Student Details
	
	//start validate_edit_student_details
	 public function validate_edit_student_details()
    { 
    	// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("Student", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}
    	if(! $this->session->userdata('username'))
		{
			$this->check_isvalidated();
		}
		else
		{ 
	   		$this->load->library('form_validation');
	   		$this->form_validation->set_rules('register_no', 'Register Number', 'trim|required|xss_clean');
	   		$this->form_validation->set_rules('joining_date', 'Joining Date', 'trim|required|xss_clean');
	   		$this->form_validation->set_rules('roll_no', 'Roll no', 'trim|required|xss_clean');
	   		$this->form_validation->set_rules('class_name', 'Student class', 'trim|required|xss_clean');
			$this->form_validation->set_rules('academic_name', 'Student academic', 'trim|required|xss_clean');
			$this->form_validation->set_rules('cat_name', 'Student Category', 'trim|required|xss_clean');
			$this->form_validation->set_rules('first_name', 'First name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('last_name', 'Last name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('dob', 'Date of birth', 'trim|required|xss_clean');
			$this->form_validation->set_rules('gender', 'Gender', 'trim|required|xss_clean');
			$this->form_validation->set_rules('birth_place', 'Birth Place', 'trim|required|xss_clean');
			$this->form_validation->set_rules('nationality', 'nationality', 'trim|required|xss_clean');
			$this->form_validation->set_rules('mother_tongue', 'Mother Tongue', 'trim|required|xss_clean');
			$this->form_validation->set_rules('religion', 'Religion', 'trim|required|xss_clean');
			$this->form_validation->set_rules('present_address', 'Present address', 'trim|required|xss_clean');
			$this->form_validation->set_rules('con_mobile', 'Mobile', 'trim|required|xss_clean');
			$this->form_validation->set_rules('con_email', 'E-mail', 'trim|required|xss_clean');
			$this->form_validation->set_rules('con_city', 'City', 'trim|required|xss_clean');
			$this->form_validation->set_rules('con_pin', 'Pin', 'trim|required|xss_clean');
			$this->form_validation->set_rules('country', 'County', 'trim|required|xss_clean');
			$this->form_validation->set_rules('state', 'State', 'trim|required|xss_clean');
			if($this->form_validation->run() == FALSE)
	   		{
				$data['class_list'] = $this->class_model->class_list();
			    $data['academic_list'] = $this->academic_model->academic_list();	
				$data['student_category_list'] = $this->student_category_model->student_category_list();
				$data['get_student_details']  = $this->student_model->get_student_details($this->input->post('id'));
				$this->load->view('edit_student_details', $data); 	
			}
			else
			{ 
				$this->load->helper('inflector');
				$config = array(
				/*'file_name'=>'ssssssssssss',*/
				'upload_path' => "./uploads/student_profile/",
				'allowed_types' => "gif|jpg|png|jpeg|pdf",
				'overwrite' => FALSE,
				'max_size' => "2048000" // Can be set to particular file size , here it is 2 MB(2048 Kb)
				/*'max_height' => "768",
				'max_width' => "1024"*/
				);
				$this->load->library('upload', $config);
				if($query = $this->student_model->edit_student_details($this->input->post('id')))
				{ 
					if($this->upload->do_upload('student_profile'))
					{ 
						@unlink(base_url().'uploads/student_profile/'.$this->input->post('student_profile'));
						$res = $this->upload->data();
						$file_path     = $res['file_path'];
						$file         = $res['full_path'];
						$file_ext     = $res['file_ext'];
						$final_file_name = $this->student_model->edit_upload_file($file_ext); 
						rename($file, $file_path . $final_file_name); 
					}
					$this->session->set_flashdata('success_msg', 'Student details added successfully!');					
					redirect('student/student_details_list');
				}
			}
		}
    }
	
	//end validate_edit_student_details
	
	// start approve Student
    function approve()
    {
    	// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("Student", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}
    	if(! $this->session->userdata('username')){
			
			$this->check_isvalidated();
		}
		else
		{
			if($this->student_model->approve())
			{				
				$this->session->set_flashdata('success_msg', 'Student Status Changed successfully!');
			}
			$data['student_details_list'] = $this->student_model->student_details_list();
			redirect('student/student_details_list', $data);						
		}
    }
	// end approver Student

	// start deny Student
    function deny()
    {
    	// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("Student", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}
    	if(! $this->session->userdata('username')){
			/*$this->index();*/
			$this->check_isvalidated();
		}
		else
		{
			if($this->student_model->deny())
			{				
				$this->session->set_flashdata('success_msg', 'Student Status Changed successfully!');
			}
			$data['student_details_list'] = $this->student_model->student_details_list();
			redirect('student/student_details_list', $data);						
		}
    }
	// end deny Student

	// start delete user details
	public function delete()
	{
		// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("Student", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}
		if(! $this->session->userdata('username')){
			/*$this->index();*/
			$this->check_isvalidated();
		}
		else
		{
			// start delete file			
			@unlink(base_url().'uploads/student_profile/'.$this->input->get('file_name'));
			// end delete file 
			if($this->student_model->delete($this->input->get('id')))
			{				
				$this->session->set_flashdata('success_msg', 'Student Details Deleted Successfully!');
				
			}
			$data['student_details_list'] = $this->student_model->student_details_list();
			redirect('student/student_details_list', $data);	
									
		}
	}
	// end delete user details
	
	//start view student details:
	
	function view_student_details(){
		
		// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("Student", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}
		if(! $this->session->userdata('username')){
			/*$this->index();*/
			$this->check_isvalidated();
		}
		else
		{
			$data['view_student_details']  = $this->student_model->get_student_details($this->input->get('id'));
			$this->load->view('view_student_details', $data);
			
		}
	}
	
	//end  view student details:
	
	// start check student register nymber exist
    function check_register($key)
    {    
        $is_exist = $this->student_model->check_register($key); 

        if ($is_exist==1) 
		{
        	$this->form_validation->set_message('check_register', 'Register Number already Exist');  
        	return false;
    	} 
		else 
		{
        	return true;
    	}

    }
    // end check  student register nymber exist
	
	
	//start ajax check register number alert
	function ajax_check_register(){
		
		$data = $this->student_model->ajax_check_register($this->input->get('register_no'));
		 if ($data==1) 
		{
		    echo 'Register Number already Exist';
    	}
	}
	//end  ajax check register number alert
	
	function check_user_rights()
	{
		$this->session->set_flashdata('failear_msg', 'Access Denied');		
		redirect('project_main');			
	}
	
	function check_isvalidated()
	{
        if(! $this->session->userdata('username'))
        {	
        	$this->session->set_flashdata('failear_msg', 'Login Required');		
			redirect('project_main');			
        }		
		
    }
}

