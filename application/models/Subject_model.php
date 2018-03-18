<?php 

class Subject_model extends CI_model{
	
	public function subject_details_list(){
		
		$this->db->select('*');
		$this->db->from('subject_details');
		$this->db->order_by('Subject_id', 'DESC');
		$query = $this->db->get();
		return $query;
	}
	//class active list 
	public function subject_list(){
		
		$this->db->select('*');
		$this->db->from('subject_details');
		$this->db->where('Subject_status', "A");
		$query = $this->db->get();
		return $query;
	}
	public function add_subject_details(){
		
		$user_data = array(
			'Subject_name' => $this->input->post('subject_name'),
			'Subject_code' => $this->input->post('subject_code'),
		);
		$this->db->set('Subject_create_dt_time', 'NOW()', FALSE);
		$insert = $this->db->insert('subject_details', $user_data);
		return true;
	}
	public function edit_subject_details($id){
		
		$edit_data = array(
			'Subject_name' => $this->input->post('subject_name'),
			'Subject_code' => $this->input->post('subject_code'),
		);
		$this->db->where('Subject_id', $id);
		$this->db->set('Subject_create_dt_time', 'NOW()', FALSE);
		$insert = $this->db->update('subject_details', $edit_data);
		return true;
	}
	
	public function get_subject_details($id){
		
		$this->db->select('*');
		$this->db->from('subject_details');
		$this->db->where('Subject_id', $id);
		$query = $this->db->get();
		return $query;
		
	}
	
	public function delete($id)
	{
	  $this->db->where('Subject_id',$id);  
	  $this->db->delete('subject_details'); 
	  return true;
	}
	
	public function check_duplicate_subject_name($subject_name){
		
		$this->db->select('Subject_name');
		$this->db->from('subject_details');
		$this->db->where('Subject_name', $subject_name);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			
			return 1;
		}
		else{
			return 0;
		}
	}
	
	public function check_duplicate_subject_code($subject_code){
		
		$this->db->select('Subject_code');
		$this->db->from('subject_details');
		$this->db->where('Subject_code', $subject_code);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			
			return 1;
		}
		else{
			return 0;
		}
	}
	
	function ajax_check_subject_year($subject_id){
		
		$this->db->select('Subject_id,Subject_name');
		$this->db->from('subject_details');
		$this->db->where('Subject_id', $subject_id);
		$query = $this->db->get();
		return $query;
	}
	
}
