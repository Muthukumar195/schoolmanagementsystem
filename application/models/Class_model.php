<?php 

class Class_model extends CI_model{
	
	public function class_details_list(){
		
		$this->db->select('*');
		$this->db->from('class_details');
		$this->db->order_by('Class_id', 'DESC');
		$query = $this->db->get();
		return $query;
	}
	//class active list 
	public function class_list(){
		
		$this->db->select('*');
		$this->db->from('class_details');
		$this->db->where('Class_status', "A");
		$query = $this->db->get();
		return $query;
	}
	public function add_class_details(){
		
		$user_data = array(
			'Class_name' => $this->input->post('class_name'),
			'Class_description' => $this->input->post('description'),
			'Class_code' => $this->input->post('class_code'),
		);
		$this->db->set('Class_create_dt_time', 'NOW()', FALSE);
		$insert = $this->db->insert('class_details', $user_data);
		return true;
	}
	public function edit_class_details($id){
		
		$edit_data = array(
			'Class_name' => $this->input->post('class_name'),
			'Class_description' => $this->input->post('description'),
			'Class_code' => $this->input->post('class_code'),
		);
		$this->db->where('Class_id', $id);
		$this->db->set('Class_create_dt_time', 'NOW()', FALSE);
		$insert = $this->db->update('class_details', $edit_data);
		return true;
	}
	
	public function get_class_details($id){
		
		$this->db->select('*');
		$this->db->from('class_details');
		$this->db->where('Class_id', $id);
		$query = $this->db->get();
		return $query;
		
	}
	
	public function delete($id)
	{
	  $this->db->where('Class_id',$id);  
	  $this->db->delete('class_details'); 
	  return true;
	}
	
	public function check_duplicate_class_name($class_name){
		
		$this->db->select('Class_name');
		$this->db->from('class_details');
		$this->db->where('Class_name', $class_name);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			
			return 1;
		}
		else{
			return 0;
		}
	}
	
	public function check_duplicate_class_code($class_code){
		
		$this->db->select('Class_code');
		$this->db->from('class_details');
		$this->db->where('Class_code', $class_code);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			
			return 1;
		}
		else{
			return 0;
		}
	}
	
	function ajax_check_class_name($class_id){
		
		$this->db->select('Class_id,Class_name');
		$this->db->from('class_details');
		$this->db->where('Class_id', $class_id);
		$query = $this->db->get();
		//echo $this->db->last_query(); exit;
		return $query;
		
	}
	
}
