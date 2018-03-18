<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Academic extends CI_controller{
	
	public function __construct(){
		
		parent::__construct();
		$this->load->model('academic_model');
		$this->load->model('class_model');
	}
	
	function academic_details_list(){
		
		// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("Academic_year", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}	
		if(! $this->session->userdata('username'))
		{
			$this->check_isvalidated();
		}
		else{
			$data['class_list'] = $this->class_model->class_list();
			$data['academic_details_list'] = $this->academic_model->academic_details_list();
			$this->load->view('academic_details_list', $data);
		}
	}
	
	//start academic_year form validation 
	 function validate_academic_details(){
		 
		// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("Academic", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}	
		if(! $this->session->userdata('username'))
		{
			$this->check_isvalidated();
		}
		else{
			
			$this->load->library('form_validation');
			$this->form_validation->set_rules('academic_name', 'Academic Name', 'trim|required|callback_check_duplicate_academic_name|xss_clean');
			$this->form_validation->set_rules('class_name', 'Class Name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('academic_start', 'Start Date', 'trim|required|xss_clean');
			$this->form_validation->set_rules('academic_end', 'End Date', 'trim|required|xss_clean');
			if($this->form_validation->run() == FALSE){
				$data['class_list'] = $this->class_model->class_list();
				$data['academic_details_list'] = $this->academic_model->academic_details_list();
			    $this->load->view('academic_details_list', $data);
			}
			else{
				
				if($query = $this->academic_model->add_academic_details()){
					$data['class_list'] = $this->class_model->class_list();
					$data['academic_details_list'] = $this->academic_model->academic_details_list();
					$this->session->set_flashdata('success_msg', 'Academic details added successfully!');
			        $this->load->view('academic_details_list', $data);
				}
			}
		}
	 }
	 
	 
	//start Edit academic details
	function edit_academic_details(){
	
	// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("Academic", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}	
		if(! $this->session->userdata('username'))
		{
			$this->check_isvalidated();
		}
		else{
			$data['class_list'] = $this->class_model->class_list();
			$data['get_academic_details'] = $this->academic_model->get_academic_details($this->input->get('id'));
			$this->load->view('edit_academic_details', $data);
		}
	}
	//End Edit academic details
	
	// start edit validation academic details
	function edit_validate_academic_details(){
		
		// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("Academic", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}	
		if(! $this->session->userdata('username'))
		{
			$this->check_isvalidated();
		}
		else{
			
			$this->load->library('form_validation');
			$this->form_validation->set_rules('academic_name', 'academic Name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('class_name', 'Class Name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('academic_start', 'Start Date', 'trim|required|xss_clean');
			$this->form_validation->set_rules('academic_end', 'End Date', 'trim|required|xss_clean');
			if($this->form_validation->run() == FALSE){
			    $data['class_list'] = $this->class_model->class_list();
				$data['academic_details_list'] = $this->academic_model->academic_details_list();
			    $this->load->view('academic_details_list', $data);
			}
			else{
				if($query = $this->academic_model->edit_academic_details($this->input->post('id'))){
					
					$this->session->set_flashdata('success_msg', 'Academic details Edited successfully!');
			        $data['class_list'] = $this->class_model->class_list();
				    $data['academic_details_list'] = $this->academic_model->academic_details_list();
			        $this->load->view('academic_details_list', $data);
				}
			}
		
		}
		
	}
	// End edit validation academic details
	
	//delete academic details
	function delete(){
		
		// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("Academic", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}	
		if(! $this->session->userdata('username'))
		{
			$this->check_isvalidated();
		}
		else{
			if($this->academic_model->delete($this->input->get('id')))
			{				
				$this->session->set_flashdata('success_msg', 'Academic Details Deleted Successfully!');
			    redirect('academic/academic_details_list');
			}
		}
	}
	
	//check duplicate academic name
	function check_duplicate_academic_name($key){
		
		$is_exist = $this->academic_model->check_duplicate_academic_name($key);
		
		if($is_exist==1){
			
			$this->form_validation->set_message('check_duplicate_academic_name', 'Academic Name already Exist');  
        	return false;
		}
		else{
			
			return true;
		}
		
	}
	
	//start ajax class id match from academic table
	function check_academic_year(){
		
		$data = $this->academic_model->check_academic_year($this->input->get('class_id'));
		$select_academic = '<option>Select academic Name</option>';
		foreach($data->result() as $academic){
			
			$select_academic .= '<option value="'.$academic->Academic_id.'">'.$academic->Academic_name.'</option>';
		}
		echo $select_academic;
		
	}
	//end ajax class id match from academic table
	
	//start ajax  check_academic_year
	function ajax_check_academic_year(){
		
		$data = $this->academic_model->ajax_check_academic_year($this->input->get('academic_id'));
		foreach($data->result() as $academic){
			
			$academic_year = date('d-m-Y', strtotime($academic->Academic_start)).' To '.date('d-m-Y', strtotime($academic->Academic_end));
		}
		echo $academic_year;
		
	}
	//end ajax check_academic_year
	
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

