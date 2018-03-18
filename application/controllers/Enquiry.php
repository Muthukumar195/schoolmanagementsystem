<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Enquiry extends CI_controller{
	
	public function __construct(){
		
		parent::__construct();
		$this->load->model('enquiry_model');
		$this->load->model('class_model');
	}
	//Enquiry Details list
	function enquiry_details_list(){
		
		// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("Enquiry Details", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}	
		if(! $this->session->userdata('username'))
		{
			$this->check_isvalidated();
		}
		else{
			
			$data['enquiry_details_list'] = $this->enquiry_model->enquiry_details_list();
			$this->load->view('enquiry_details_list', $data);
		}
	}
	
	//add enquiry details
	function add_enquiry_details(){
		
		// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("Enquiry Details", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}	
		if(! $this->session->userdata('username'))
		{
			$this->check_isvalidated();
		}
		else{
			$data['enq_max_id'] = $this->enquiry_model->enquiry_details_max_id();
			$data['class_list'] = $this->class_model->class_list();
			$this->load->view('add_enquiry_details', $data);
		}
	}
	
	// start validate_Enquiry_details
    public function validate_enquiry_details()
    { 
    	// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("Enquiry Details", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
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
	   		$this->form_validation->set_rules('enq_no', 'Enquiry Code', 'trim|required|xss_clean');
	   		$this->form_validation->set_rules('enq_st_name', 'Student name', 'trim|required|xss_clean');
	   		$this->form_validation->set_rules('class_id', 'Class', 'trim|required|xss_clean');
	   		$this->form_validation->set_rules('gender', 'Gender', 'trim|required|xss_clean');
			$this->form_validation->set_rules('enq_dob', 'Date of birth', 'trim|required|xss_clean');
			$this->form_validation->set_rules('enq_father_name', 'Father name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('enq_address', 'Address', 'trim|required|xss_clean');
			$this->form_validation->set_rules('enq_mobile', 'Mobile no', 'trim|required|xss_clean');
			$this->form_validation->set_rules('enq_email', 'E-mail', 'trim|required|xss_clean');
			if($this->form_validation->run() == FALSE)
	   		{
				$data['enq_max_id'] = $this->enquiry_model->enquiry_details_max_id();
			    $data['class_list'] = $this->class_model->class_list();
				$this->load->view('add_enquiry_details', $data); 	
			}
			else
			{
				if($query = $this->enquiry_model->add_enquiry_details())
				{
					$this->session->set_flashdata('success_msg', 'Enquiry details added successfully!');					
					redirect('enquiry/add_enquiry_details');		
				}	
			}
		}
	 }
    
	// end validate_enquiry_details
	
	//start Edit enquiry Details
	function edit_enquiry_details(){
		
		// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("Enquiry Details", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}	
		if(! $this->session->userdata('username'))
		{
			$this->check_isvalidated();
		}
		else{
			 $data['class_list'] = $this->class_model->class_list();
			$data['get_enquiry_details']  = $this->enquiry_model->get_enquiry_details($this->input->get('id'));
		    $this->load->view('edit_enquiry_details', $data);
		}
		
	}
	//End Edit enquiry Details
	
	//start validate_edit_enquiry details
	 public function edit_validate_enquiry_details()
    { 
    	// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("Enquiry Details", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
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
	   		$this->form_validation->set_rules('enq_no', 'Enquiry Code', 'trim|required|xss_clean');
	   		$this->form_validation->set_rules('enq_st_name', 'Student name', 'trim|required|xss_clean');
	   		$this->form_validation->set_rules('class_id', 'Class', 'trim|required|xss_clean');
	   		$this->form_validation->set_rules('gender', 'Gender', 'trim|required|xss_clean');
			$this->form_validation->set_rules('enq_dob', 'Date of birth', 'trim|required|xss_clean');
			$this->form_validation->set_rules('enq_father_name', 'Father name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('enq_address', 'Address', 'trim|required|xss_clean');
			$this->form_validation->set_rules('enq_mobile', 'Mobile no', 'trim|required|xss_clean');
			$this->form_validation->set_rules('enq_email', 'E-mail', 'trim|required|xss_clean');
			if($this->form_validation->run() == FALSE)
	   		{
				$data['enq_max_id'] = $this->enquiry_model->enquiry_details_max_id();
			    $data['class_list'] = $this->class_model->class_list();
				$this->load->view('edit_enquiry_details', $data); 	
			}
			else
			{ 
				if($query = $this->enquiry_model->edit_enquiry_details($this->input->post('id')))
				{ 
					$this->session->set_flashdata('success_msg', 'Enquiry details Edited successfully!');
				}
				redirect('enquiry/enquiry_details_list');
			}
		}
    }
	
	//end validate_edit_Enquiry details
	
	// start approve Enquiry
    function approve()
    {
    	// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("Enquiry Details", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}
    	if(! $this->session->userdata('username')){
			
			$this->check_isvalidated();
		}
		else
		{
			if($this->enquiry_model->approve())
			{				
				$this->session->set_flashdata('success_msg', 'Enquiry Status Changed successfully!');
			}
			redirect('enquiry/enquiry_details_list');						
		}
    }
	// end approver Enquiry

	// start deny enquiry
    function deny()
    {
    	// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("Enquiry Details", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}
    	if(! $this->session->userdata('username')){
			/*$this->index();*/
			$this->check_isvalidated();
		}
		else
		{
			if($this->institution_model->deny())
			{				
				$this->session->set_flashdata('success_msg', 'Enquiry Status Changed successfully!');
			}
			redirect('enquiry/enquiry_details_list');						
		}
    }
	// end deny enquiry

	// start delete Enquiry details
	public function delete()
	{
		// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("Enquiry Details", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}
		if(! $this->session->userdata('username')){
			/*$this->index();*/
			$this->check_isvalidated();
		}
		else
		{
			if($this->institution_model->delete($this->input->get('id')))
			{				
				$this->session->set_flashdata('success_msg', 'Enquiry Details Deleted Successfully!');
			}
			redirect('enquiry/enquiry_details_list');	
									
		}
	}
	// end delete Enquiry details
	
	
	
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

