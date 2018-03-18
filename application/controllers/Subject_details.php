<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Subject_details extends CI_controller{
	
	public function __construct(){
		
		parent::__construct();
		$this->load->model('subject_model');
	}
	// start subject details list
	function subject_details_list(){
		
		// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("Subject Details", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}	
		if(! $this->session->userdata('username'))
		{
			$this->check_isvalidated();
		}
		else{
			
			$data['subject_details_list'] = $this->subject_model->subject_details_list();
			$this->load->view('subject_details_list', $data);
		}
	}
	// end subject details list
	// start validation subject details
	function validate_subject_details(){
		
		// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("Subject Details", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}	
		if(! $this->session->userdata('username'))
		{
			$this->check_isvalidated();
		}
		else{ 
			
			$this->load->library('form_validation');
			$this->form_validation->set_rules('subject_name', 'subject name', 'trim|required|callback_check_duplicate_subject_name|xss_clean');
			$this->form_validation->set_rules('subject_code', 'subject code', 'trim|required|callback_check_duplicate_subject_code|xss_clean');
			if($this->form_validation->run() == FALSE){
				
			   $data['subject_details_list'] = $this->subject_model->subject_details_list();
			   $this->load->view('subject_details_list', $data);
				
			}
			else{
				if($query = $this->subject_model->add_subject_details()){
					
					$data['subject_details_list'] = $this->subject_model->subject_details_list();
					$this->session->set_flashdata('success_msg', 'Subject details added successfully!');
			        $this->load->view('subject_details_list', $data);
				}
			}
		
		}
		
	}
	// End validation subject details
	
	//start Edit subject details
	function edit_subject_details(){
	
	// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("Subject Details", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}	
		if(! $this->session->userdata('username'))
		{
			$this->check_isvalidated();
		}
		else{
			
			$data['get_subject_details'] = $this->subject_model->get_subject_details($this->input->get('id'));
			$this->load->view('edit_subject_details', $data);
		}
		
	}
	//End Edit subject details
	
	// start edit validation subject details
	function edit_validation_subject_details(){
		
		// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("Subject Details", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}	
		if(! $this->session->userdata('username'))
		{
			$this->check_isvalidated();
		}
		else{
			
			$this->load->library('form_validation');
			$this->form_validation->set_rules('subject_name', 'subject name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('subject_code', 'subject code', 'trim|required|xss_clean');
			if($this->form_validation->run() == FALSE){
				
			   $data['subject_details_list'] = $this->subject_model->subject_details_list();
			   $this->load->view('subject_details_list', $data);
				
			}
			else{
				if($query = $this->subject_model->edit_subject_details($this->input->post('id'))){
					
					$data['subject_details_list'] = $this->subject_model->subject_details_list();
					$this->session->set_flashdata('success_msg', 'Subject details Edited successfully!');
			        $this->load->view('subject_details_list', $data);
				}
			}
		
		}
		
	}
	// End edit validation subject details
	
	//delete subject details
	function delete(){
		
		// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("Subject Details", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}	
		if(! $this->session->userdata('username'))
		{
			$this->check_isvalidated();
		}
		else{
			if($this->subject_model->delete($this->input->get('id')))
			{				
				$this->session->set_flashdata('success_msg', 'Subject Details Deleted Successfully!');
			    redirect('subject_details/subject_details_list');
			}
		}
	}
	
	//check duplicate subject name
	function check_duplicate_subject_name($key){
		
		$is_exist = $this->subject_model->check_duplicate_subject_name($key);
		
		if($is_exist==1){
			
			$this->form_validation->set_message('check_duplicate_subject_name', 'Subject Name already Exist');  
        	return false;
		}
		else{
			
			return true;
		}
		
	}
	
	//check duplicate subject code
	function check_duplicate_subject_code($key){
		
		$is_exist = $this->subject_model->check_duplicate_subject_code($key);
		
		if($is_exist==1){
			
			$this->form_validation->set_message('check_duplicate_subject_code', 'Subject Code already Exist');  
        	return false;
		}
		else{
			
			return true;
		}
		
	}
	
	//start ajax  check_subject_year
	function ajax_check_subject_year(){
		
		$data = $this->subject_model->ajax_check_subject_year($this->input->get('subject_id'));
		foreach($data->result() as $subject){
			
			$subject_name = $subject->Subject_name;
		}
		echo $subject_name;
		
	}
	//end ajax check_academic_year
	
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

