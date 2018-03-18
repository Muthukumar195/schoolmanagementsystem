<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Student_category extends CI_controller{
	
	public function __construct(){
		
		parent::__construct();
		$this->load->model('student_category_model');
	}
	// start student_category details list
	function student_category_details_list(){
		
		// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("Course", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}	
		if(! $this->session->userdata('username'))
		{
			$this->check_isvalidated();
		}
		else{
			
			$data['student_category_details_list'] = $this->student_category_model->student_category_details_list();
			$this->load->view('student_category_details_list', $data);
		}
	}
	// end student_category details list
	// start validation student_category details
	function validate_student_category_details(){
		
		// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("Course", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}	
		if(! $this->session->userdata('username'))
		{
			$this->check_isvalidated();
		}
		else{
			
			$this->load->library('form_validation');
			$this->form_validation->set_rules('category_name', 'Category name', 'trim|required|callback_check_duplicate_category_name|xss_clean');
			if($this->form_validation->run() == FALSE){
			   $data['student_category_details_list'] = $this->student_category_model->student_category_details_list();
			   $this->load->view('student_category_details_list', $data);
				
			}
			else{
				if($query = $this->student_category_model->add_student_category_details()){
					
					$data['student_category_details_list'] = $this->student_category_model->student_category_details_list();
					$this->session->set_flashdata('success_msg', 'Student category details added successfully!');
			        $this->load->view('student_category_details_list', $data);
				}
			}
		
		}
		
	}
	// End validation student_category details
	
	//start Edit course details
	function edit_student_category_details(){
	
	// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("Course", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}	
		if(! $this->session->userdata('username'))
		{
			$this->check_isvalidated();
		}
		else{
			
			$data['get_student_category_details'] = $this->student_category_model->get_student_category_details($this->input->get('id'));
			$this->load->view('edit_student_category_details', $data);
		}
		
	}
	//End Edit student_category details
	
	// start edit validation student_category details
	function edit_validate_student_category_details(){
		
		// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("Course", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}	
		if(! $this->session->userdata('username'))
		{
			$this->check_isvalidated();
		}
		else{
			
			$this->load->library('form_validation');
			$this->form_validation->set_rules('category_name', 'Category name', 'trim|required|xss_clean');
			if($this->form_validation->run() == FALSE){
				
			   $data['student_category_details_list'] = $this->student_category_model->student_category_details_list();
			   $this->load->view('student_category_details_list', $data);
				
			}
			else{
				if($query = $this->student_category_model->edit_student_category_details($this->input->post('id'))){
					
					$data['student_category_details_list'] = $this->student_category_model->student_category_details_list();
					$this->session->set_flashdata('success_msg', 'Student category details Edited successfully!');
			        $this->load->view('student_category_details_list', $data);
				}
			}
		
		}
		
	}
	// End edit validation student_category details
	
	//delete student_category details
	function delete(){
		
		// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("Course", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}	
		if(! $this->session->userdata('username'))
		{
			$this->check_isvalidated();
		}
		else{
			if($this->student_category_model->delete($this->input->get('id')))
			{				
				$this->session->set_flashdata('success_msg', 'Student category Details Deleted Successfully!');
			    redirect('student_category/student_category_details_list');
			}
		}
	}
	
	//check duplicate course name
	function check_duplicate_category_name($key){
		
		$is_exist = $this->student_category_model->check_duplicate_category_name($key);
		
		if($is_exist==1){
			
			$this->form_validation->set_message('check_duplicate_category_name', 'Course Name already Exist');  
        	return false;
		}
		else{
			
			return true;
		}
		
	}

	
	//check User rights
	  function check_user_rights()
    {
        $this->session->set_flashdata('failear_msg', 'Access Denied');		
		redirect('project_main');			
    }
	//check session validation
	function check_isvalidated()
	{
        if(! $this->session->userdata('username'))
        {	
        	$this->session->set_flashdata('failear_msg', 'Login Required');		
			redirect('project_main');			
        }		
		
    }
}

