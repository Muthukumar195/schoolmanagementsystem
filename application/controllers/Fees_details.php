<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Fees_details extends CI_controller{
	
	public function __construct(){
		
		parent::__construct();
		$this->load->model('fees_details_model');
		$this->load->model('class_model');
		$this->load->model('academic_model');
	}
	
	function fees_details_list(){
		
		// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("Fees Details", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
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
			$data['fees_details_list'] = $this->fees_details_model->fees_details_list();
			$this->load->view('fees_details_list', $data);
		}
	}
	//start add validate_fees_details 
	function validate_fees_details(){
		
		// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("Fees Details", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}	
		if(! $this->session->userdata('username'))
		{
			$this->check_isvalidated();
		}
		else{
			
			$this->load->library('form_validation');
			$this->form_validation->set_rules('class_id', 'Class Code', 'trim|required|xss_clean');
			$this->form_validation->set_rules('academic_id', 'Academic Year', 'trim|required|xss_clean');
			$this->form_validation->set_rules('fees_amount', 'Fees amount', 'trim|required|xss_clean');
			
			if($this->form_validation->run() == FALSE){
				
				$data['class_list'] = $this->class_model->class_list();
			    $data['academic_list'] = $this->academic_model->academic_list();
			    $data['fees_details_list'] = $this->fees_details_model->fees_details_list();
			    $this->load->view('fees_details_list', $data);
			}
			else{
				
				if($query = $this->fees_details_model->add_fees_details()){
					
				   $this->session->set_flashdata('success_msg', 'Fees Details details added successfully!');
				}
				redirect('fees_details/fees_details_list');
			}
		}
	}
	//end add validate_fees_details 
	
	//start Edit edit fees  Details
	function edit_fees_details(){
		
		// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("Fees Details", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
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
			$data['get_fees_details']  = $this->fees_details_model->get_fees_details($this->input->get('id'));
		    $this->load->view('edit_fees_details', $data);
		}
		
	}
	//End Edit fees Details
	
	//start edit_validate_fees  details
	 public function edit_validate_fees_details()
    { 
    	// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("Fees Details", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
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
	   		$this->form_validation->set_rules('class_id', 'Class Code', 'trim|required|xss_clean');
			$this->form_validation->set_rules('academic_id', 'Academic Year', 'trim|required|xss_clean');
			$this->form_validation->set_rules('fees_amount', 'Fees amount', 'trim|required|xss_clean');
			if($this->form_validation->run() == FALSE)
	   		{
				$data['class_list'] = $this->class_model->class_list();
			    $data['academic_list'] = $this->academic_model->academic_list();
			    $data['get_fees_details']  = $this->fees_details_model->get_fees_details($this->input->post('id'));
		        $this->load->view('edit_fees_details', $data);	
			}
			else
			{ 
				if($query = $this->fees_details_model->edit_fees_details($this->input->post('id'))){
					
				   $this->session->set_flashdata('success_msg', 'Fees Details details Edited successfully!');
				}
				redirect('fees_details/fees_details_list');
			}
		}
    }
	
	//end edit validation fees details
	
	// start approve fees_details
    function approve()
    {
    	// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("Fees Details", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}
    	if(! $this->session->userdata('username')){
			
			$this->check_isvalidated();
		}
		else
		{
			if($this->fees_details_model->approve())
			{				
				$this->session->set_flashdata('success_msg', 'Fees Status Changed successfully!');
			}
			redirect('fees_details/fees_details_list');						
		}
    }
	// end approver fees_details

	// start deny fees_details
    function deny()
    {
    	// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("Fees Details", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}
    	if(! $this->session->userdata('username')){
			/*$this->index();*/
			$this->check_isvalidated();
		}
		else
		{
			if($this->fees_details_model->deny())
			{				
				$this->session->set_flashdata('success_msg', 'Fees Status Changed successfully!');
			}
			redirect('fees_details/fees_details_list');					
		}
    }
	// end deny fees_details

	// start delete fees_details
	public function delete()
	{
		// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("Fees Details", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
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
				$this->session->set_flashdata('success_msg', 'Fees Details Deleted Successfully!');
				
			}
			redirect('fees_details/fees_details_list');	
									
		}
	}
	// end delete fees_details
	
	
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