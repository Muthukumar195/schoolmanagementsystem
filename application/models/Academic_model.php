<?php 

class Academic_model extends CI_model{
	
	public function academic_details_list(){
		
		$this->db->select('academic_details.*, class_details.Class_id, class_details.Class_name');
		$this->db->from('academic_details');
		$this->db->join('class_details', 'class_details.Class_id = academic_details.Academic_class_id', 'left');
		$this->db->order_by('Academic_id', 'DESC');
		$query = $this->db->get();
		return $query;
	}
	//academic active list 
	public function academic_list(){
		
		$this->db->select('*');
		$this->db->from('academic_details');
		$this->db->where('Academic_status', "A");
		$query = $this->db->get();
		return $query;
	}
	public function add_academic_details(){
		
		$user_data = array(
			'Academic_name' => $this->input->post('academic_name'),
			'Academic_class_id' => $this->input->post('class_name'),
			'Academic_start' => date('Y-m-d', strtotime($this->input->post('academic_start'))),
			'Academic_end' => date('Y-m-d', strtotime($this->input->post('academic_end'))),
		);
		$this->db->set('academic_create_dt_time', 'NOW()', FALSE);
		$insert = $this->db->insert('academic_details', $user_data);
		return true;
	}
	public function edit_academic_details($id){
		
		$edit_data = array(
			'Academic_name' => $this->input->post('academic_name'),
			'Academic_class_id' => $this->input->post('class_name'),
			'Academic_start' => date('Y-m-d', strtotime($this->input->post('academic_start'))),
			'Academic_end' =>  date('Y-m-d', strtotime($this->input->post('academic_end'))),
		);
		$this->db->where('Academic_id', $id);
		$this->db->set('academic_create_dt_time', 'NOW()', FALSE);
		$insert = $this->db->update('academic_details', $edit_data);
		//echo $this->db->last_query(); exit;
		return true;
	}
	public function get_academic_details($id){
		
		$this->db->select('academic_details.*, class_details.Class_id, class_details.Class_name');
		$this->db->from('academic_details');
		$this->db->join('class_details', 'class_details.Class_id = academic_details.Academic_class_id', 'left');
		$this->db->where('Academic_id', $id);
		$query = $this->db->get();
		//echo $this->db->last_query(); exit;
		return $query;
		
	}
	
	public function delete($id)
	{
	  $this->db->where('Academic_id',$id);  
	  $this->db->delete('academic_details'); 
	  return true;
	}
	
	public function check_duplicate_academic_name($academic_name){
		
		$this->db->select('Academic_name');
		$this->db->from('academic_details');
		$this->db->where('Academic_name', $academic_name);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			
			return 1;
		}
		else{
			return 0;
		}
	}
	
	function check_academic_year($Class_id){
		
		$this->db->select('*');
		$this->db->from('academic_details');
		$this->db->where('Academic_class_id', $Class_id);
		$query = $this->db->get();
		return $query;
	}
	
	function ajax_check_academic_year($academic_id){
		
		$this->db->select('Academic_id,Academic_start,Academic_end');
		$this->db->from('academic_details');
		$this->db->where('Academic_id', $academic_id);
		$query = $this->db->get();
		return $query;
	}
	
}
