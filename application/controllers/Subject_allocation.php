<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Subject_allocation extends CI_controller{
	
	public function __construct(){
		
		parent::__construct();
		$this->load->model('subject_allocation_model');
		$this->load->model('employee_model');
		$this->load->model('class_model');
		$this->load->model('academic_model');
		$this->load->model('subject_model');
	}
	
	function subject_allocation_list(){
		
		// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("Subject Allocation", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}	
		if(! $this->session->userdata('username'))
		{
			$this->check_isvalidated();
		}
		else{
			
			$data['employee_list'] = $this->employee_model->employee_list();
			$data['class_list'] = $this->class_model->class_list();
			$data['academic_list'] = $this->academic_model->academic_list();
			$data['subject_list'] = $this->subject_model->subject_list();
			$data['subject_allocation_list'] = $this->subject_allocation_model->subject_allocation_list();
			$this->load->view('subject_allocation_list', $data);
		}
	}
	//start add validate_subject_allocation_details 
	function validate_subject_allocation_details(){
		
		// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("Subject Allocation", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}	
		if(! $this->session->userdata('username'))
		{
			$this->check_isvalidated();
		}
		else{
			
			$this->load->library('form_validation');
			$this->form_validation->set_rules('employee_id', 'Employee Code', 'trim|required|xss_clean');
			$this->form_validation->set_rules('class_id', 'Class Code', 'trim|required|xss_clean');
			$this->form_validation->set_rules('academic_id', 'Academic Year', 'trim|required|xss_clean');
			$this->form_validation->set_rules('subject_id', 'Subject Code', 'trim|required|xss_clean');
			
			if($this->form_validation->run() == FALSE){
				
				$data['employee_list'] = $this->employee_model->employee_list();
				$data['class_list'] = $this->class_model->class_list();
				$data['academic_list'] = $this->academic_model->academic_list();
				$data['subject_list'] = $this->subject_model->subject_list();
				$data['subject_allocation_list'] = $this->subject_allocation_model->subject_allocation_list();
				$this->load->view('subject_allocation_list', $data);
			}
			else{
				
				if($query = $this->subject_allocation_model->add_subject_allocation()){
					
					$this->session->set_flashdata('success_msg', 'Subject Allocation details added successfully!');
					redirect('subject_allocation/subject_allocation_list');
				}
			}
		}
	}
	//end add validate_subject_allocation_details 
	
	//start Edit Subject Allocation Details
	function edit_subject_allocation_details(){
		
		// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("Subject Allocation", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}	
		if(! $this->session->userdata('username'))
		{
			$this->check_isvalidated();
		}
		else{
			
			$data['employee_list'] = $this->employee_model->employee_list();
			$data['class_list'] = $this->class_model->class_list();
			$data['academic_list'] = $this->academic_model->academic_list();
			$data['subject_list'] = $this->subject_model->subject_list();
			$data['get_subject_allocation_details']  = $this->subject_allocation_model->get_subject_allocation_details($this->input->get('id'));
		    $this->load->view('edit_subject_allocation_details', $data);
		}
		
	}
	//End Edit Subject Allocation Details
	
	//start edit_validate_subject_allocation details
	 public function edit_validate_subject_allocation()
    { 
    	// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("Subject Allocation", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
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
	   		$this->form_validation->set_rules('employee_id', 'Employee Code', 'trim|required|xss_clean');
			$this->form_validation->set_rules('class_id', 'Class Code', 'trim|required|xss_clean');
			$this->form_validation->set_rules('academic_id', 'Academic Year', 'trim|required|xss_clean');
			$this->form_validation->set_rules('subject_id', 'Subject Code', 'trim|required|xss_clean');
			if($this->form_validation->run() == FALSE)
	   		{
				$data['employee_list'] = $this->employee_model->employee_list();
				$data['class_list'] = $this->class_model->class_list();
				$data['academic_list'] = $this->academic_model->academic_list();
				$data['subject_list'] = $this->subject_model->subject_list();
				$data['get_subject_allocation_details']  = $this->subject_allocation_model->get_subject_allocation_details($this->input->post('id'));
				$this->load->view('edit_subject_allocation_details', $data);	
			}
			else
			{ 
				
				if($query = $this->subject_allocation_model->edit_subject_allocation_details($this->input->post('id')))
				{ 
					$this->session->set_flashdata('success_msg', 'Subject Allocation details Edited successfully!');					
					redirect('subject_allocation/subject_allocation_list');
				}
			}
		}
    }
	
	//end edit validation subject_allocation
	
	// start approve subject_allocation
    function approve()
    {
    	// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("Subject Allocation", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}
    	if(! $this->session->userdata('username')){
			
			$this->check_isvalidated();
		}
		else
		{
			if($this->subject_allocation_model->approve())
			{				
				$this->session->set_flashdata('success_msg', 'Subject Allocation Status Changed successfully!');
			}
			redirect('subject_allocation/subject_allocation_list');						
		}
    }
	// end approver employee

	// start deny employee
    function deny()
    {
    	// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("Subject Allocation", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}
    	if(! $this->session->userdata('username')){
			/*$this->index();*/
			$this->check_isvalidated();
		}
		else
		{
			if($this->subject_allocation_model->deny())
			{				
				$this->session->set_flashdata('success_msg', 'Subject Allocation Status Changed successfully!');
			}
			redirect('subject_allocation/subject_allocation_list');					
		}
    }
	// end deny employee

	// start delete employee details
	public function delete()
	{
		// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("Subject Allocation", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}
		if(! $this->session->userdata('username')){
			/*$this->index();*/
			$this->check_isvalidated();
		}
		else
		{
			
			if($this->subject_allocation_model->delete($this->input->get('id')))
			{				
				$this->session->set_flashdata('success_msg', 'Subject Allocation Details Deleted Successfully!');
				
			}
			redirect('subject_allocation/subject_allocation_list');	
									
		}
	}
	// end delete user details
	
	
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


?>