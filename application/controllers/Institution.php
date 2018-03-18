<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Institution extends CI_controller{
	
	public function __construct(){
		
		parent::__construct();
		$this->load->model('institution_model');
	}
	//Institution Details list
	function institution_details_list(){
		
		// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("Institution Details", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}	
		if(! $this->session->userdata('username'))
		{
			$this->check_isvalidated();
		}
		else{
			
			$data['institution_details_list'] = $this->institution_model->institution_details_list();
			$this->load->view('institution_details_list', $data);
		}
	}
	
	//add Institution details
	function add_institution_details(){
		
		// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("Institution Details", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}	
		if(! $this->session->userdata('username'))
		{
			$this->check_isvalidated();
		}
		else{
			
			$this->load->view('add_institution_details');
		}
	}
	
	// start validate_institution_details
    public function validate_institution_details()
    { 
    	// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("Institution Details", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
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
	   		$this->form_validation->set_rules('ins_code', 'Institution Code', 'trim|required|callback_check_institution_code|xss_clean');
	   		$this->form_validation->set_rules('ins_name', 'Institution name', 'trim|required|xss_clean');
	   		$this->form_validation->set_rules('ins_email', 'Institution e-mail', 'trim|required|xss_clean');
	   		$this->form_validation->set_rules('ins_mobile', 'Institution mobile', 'trim|required|xss_clean');
			$this->form_validation->set_rules('ins_address', 'Institution address', 'trim|required|xss_clean');
			$this->form_validation->set_rules('ins_city', 'Institution city', 'trim|required|xss_clean');
			$this->form_validation->set_rules('ins_pin', 'Institution pin', 'trim|required|xss_clean');
			$this->form_validation->set_rules('ins_country', 'Institution country', 'trim|required|xss_clean');
			$this->form_validation->set_rules('ins_state', 'Institution state', 'trim|required|xss_clean');
			if($this->form_validation->run() == FALSE)
	   		{
				$this->load->view('add_institution_details'); 	
			}
			else
			{
				if($query = $this->institution_model->add_institution_details())
				{
					$this->session->set_flashdata('success_msg', 'Institution details added successfully!');					
					redirect('institution/add_institution_details');		
				}	
			}
		}
	 }
    
	// end validate_institution_details
	
	//start Edit institution Details
	function edit_institution_details(){
		
		// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("Institution Details", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}	
		if(! $this->session->userdata('username'))
		{
			$this->check_isvalidated();
		}
		else{
			$data['get_institution_details']  = $this->institution_model->get_institution_details($this->input->get('id'));
		    $this->load->view('edit_institution_details', $data);
		}
		
	}
	//End Edit employee Details
	
	//start validate_edit_institution details
	 public function edit_validate_institution_details()
    { 
    	// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("Institution Details", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
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
	   		$this->form_validation->set_rules('ins_code', 'Institution Code', 'trim|required|xss_clean');
	   		$this->form_validation->set_rules('ins_name', 'Institution name', 'trim|required|xss_clean');
	   		$this->form_validation->set_rules('ins_email', 'Institution e-mail', 'trim|required|xss_clean');
	   		$this->form_validation->set_rules('ins_mobile', 'Institution mobile', 'trim|required|xss_clean');
			$this->form_validation->set_rules('ins_address', 'Institution address', 'trim|required|xss_clean');
			$this->form_validation->set_rules('ins_city', 'Institution city', 'trim|required|xss_clean');
			$this->form_validation->set_rules('ins_pin', 'Institution pin', 'trim|required|xss_clean');
			$this->form_validation->set_rules('ins_country', 'Institution country', 'trim|required|xss_clean');
			$this->form_validation->set_rules('ins_state', 'Institution state', 'trim|required|xss_clean');
			if($this->form_validation->run() == FALSE)
	   		{
				$data['get_institution_details']  = $this->institution_model->get_institution_details($this->input->post('id'));
		        $this->load->view('edit_institution_details', $data); 	
			}
			else
			{ 
				if($query = $this->institution_model->edit_institution_details($this->input->post('id')))
				{ 
					$this->session->set_flashdata('success_msg', 'Institution details Edited successfully!');
				}
				redirect('institution/institution_details_list');
			}
		}
    }
	
	//end validate_edit_institution details
	
	// start approve institution
    function approve()
    {
    	// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("Institution Details", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}
    	if(! $this->session->userdata('username')){
			
			$this->check_isvalidated();
		}
		else
		{
			if($this->institution_model->approve())
			{				
				$this->session->set_flashdata('success_msg', 'Institution Status Changed successfully!');
			}
			redirect('institution/institution_details_list');						
		}
    }
	// end approver institution

	// start deny institution
    function deny()
    {
    	// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("Institution Details", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
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
				$this->session->set_flashdata('success_msg', 'Institution Status Changed successfully!');
			}
			redirect('institution/institution_details_list');						
		}
    }
	// end deny institution

	// start delete institution details
	public function delete()
	{
		// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("Institution Details", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
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
				$this->session->set_flashdata('success_msg', 'Institution Details Deleted Successfully!');
			}
			redirect('institution/institution_details_list');
									
		}
	}
	// end delete institution details
	
	//start view institution details:
	function view_institution_details(){
		
		// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("Institution Details", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}
		if(! $this->session->userdata('username')){
			/*$this->index();*/
			$this->check_isvalidated();
		}
		else
		{
			$data['view_institution_details']  = $this->institution_model->get_institution_details($this->input->get('id'));
			$this->load->view('view_institution_details', $data);
			
		}
	}
	//end  view Institution Details details:
	
	// start check institution code exist
    function check_institution_code($key)
    {    
        $is_exist = $this->institution_model->check_institution_code($key); 

        if ($is_exist==1) 
		{
        	$this->form_validation->set_message('check_institution_code', 'Institution Code already Exist');  
        	return false;
    	} 
		else 
		{
        	return true;
    	}

    }
    // end check  employee code exist
	
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

