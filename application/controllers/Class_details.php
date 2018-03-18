<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Class_details extends CI_controller{
	
	public function __construct(){
		
		parent::__construct();
		$this->load->model('class_model');
	}
	// start Class details list
	function class_details_list(){
		
		// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("Class", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}	
		if(! $this->session->userdata('username'))
		{
			$this->check_isvalidated();
		}
		else{
			
			$data['class_details_list'] = $this->class_model->class_details_list();
			$this->load->view('class_details_list', $data);
		}
	}
	// end Class details list
	// start validation class details
	function validate_class_details(){
		
		// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("Class", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}	
		if(! $this->session->userdata('username'))
		{
			$this->check_isvalidated();
		}
		else{ 
			
			$this->load->library('form_validation');
			$this->form_validation->set_rules('class_name', 'Class name', 'trim|required|callback_check_duplicate_class_name|xss_clean');
			//$this->form_validation->set_rules('description', 'Class description', 'trim|required|xss_clean');
			$this->form_validation->set_rules('class_code', 'Class code', 'trim|required|callback_check_duplicate_class_code|xss_clean');
			if($this->form_validation->run() == FALSE){
				
			   $data['class_details_list'] = $this->class_model->class_details_list();
			   $this->load->view('class_details_list', $data);
				
			}
			else{
				if($query = $this->class_model->add_class_details()){
					
					$data['class_details_list'] = $this->class_model->class_details_list();
					$this->session->set_flashdata('success_msg', 'Class details added successfully!');
			        $this->load->view('class_details_list', $data);
				}
			}
		
		}
		
	}
	// End validation Class details
	
	//start Edit Class details
	function edit_class_details(){
	
	// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("Class", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}	
		if(! $this->session->userdata('username'))
		{
			$this->check_isvalidated();
		}
		else{
			
			$data['get_class_details'] = $this->class_model->get_class_details($this->input->get('id'));
			$this->load->view('edit_class_details', $data);
		}
		
	}
	//End Edit class details
	
	// start edit validation Class details
	function edit_validation_class_details(){
		
		// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("Class", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}	
		if(! $this->session->userdata('username'))
		{
			$this->check_isvalidated();
		}
		else{
			
			$this->load->library('form_validation');
			$this->form_validation->set_rules('class_name', 'Class name', 'trim|required|xss_clean');
			//$this->form_validation->set_rules('description', 'Class description', 'trim|required|xss_clean');
			$this->form_validation->set_rules('class_code', 'Class code', 'trim|required|xss_clean');
			if($this->form_validation->run() == FALSE){
				
			   $data['class_details_list'] = $this->class_model->class_details_list();
			   $this->load->view('class_details_list', $data);
				
			}
			else{
				if($query = $this->class_model->edit_class_details($this->input->post('id'))){
					
					$data['class_details_list'] = $this->class_model->class_details_list();
					$this->session->set_flashdata('success_msg', 'Class details Edited successfully!');
			        $this->load->view('class_details_list', $data);
				}
			}
		
		}
		
	}
	// End edit validation class details
	
	//delete class details
	function delete(){
		
		// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("Class", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}	
		if(! $this->session->userdata('username'))
		{
			$this->check_isvalidated();
		}
		else{
			if($this->class_model->delete($this->input->get('id')))
			{				
				$this->session->set_flashdata('success_msg', 'Class Details Deleted Successfully!');
			    redirect('class_details/class_details_list');
			}
		}
	}
	
	//check duplicate class name
	function check_duplicate_class_name($key){
		
		$is_exist = $this->class_model->check_duplicate_class_name($key);
		
		if($is_exist==1){
			
			$this->form_validation->set_message('check_duplicate_class_name', 'Class Name already Exist');  
        	return false;
		}
		else{
			
			return true;
		}
		
	}
	
	//check duplicate class code
	function check_duplicate_class_code($key){
		
		$is_exist = $this->class_model->check_duplicate_class_code($key);
		
		if($is_exist==1){
			
			$this->form_validation->set_message('check_duplicate_class_code', 'class Code already Exist');  
        	return false;
		}
		else{
			
			return true;
		}
		
	}
	
	//start ajax check class name
	function ajax_check_class_name(){
		
		$data = $this->class_model->ajax_check_class_name($this->input->get('class_id'));
		foreach($data->result() as $class){
			$class_name = $class->Class_name;
		}
		echo $class_name; exit;
	}
	// end  ajax check employee name
	
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

