<?php 
class Student_category_model extends CI_model{
	
	public function student_category_details_list(){
		
		$this->db->select('*');
		$this->db->from('student_catagery');
		$this->db->order_by('Student_cat_id', 'DESC');
		$query = $this->db->get();
		return $query;
	}
	//Course active list 
	public function student_category_list(){
		
		$this->db->select('*');
		$this->db->from('student_catagery');
		$this->db->where('Student_status', "A");
		$query = $this->db->get();
		return $query;
	}
	public function add_student_category_details(){
		
		$user_data = array(
		   'Student_cat_name' => $this->input->post('category_name'),
		);
		$this->db->set('Student_create_dt_time', 'NOW()', FALSE);
		$insert = $this->db->insert('student_catagery', $user_data);
		return true;
	}
	public function edit_student_category_details($id){
		
		$edit_data = array(
			'Student_cat_name' => $this->input->post('category_name'),
		);
		$this->db->where('Student_cat_id', $id);
		$this->db->set('Student_create_dt_time', 'NOW()', FALSE);
		$insert = $this->db->update('student_catagery', $edit_data);
		return true;
	}
	
	public function get_student_category_details($id){
		
		$this->db->select('*');
		$this->db->from('student_catagery');
		$this->db->where('Student_cat_id', $id);
		$query = $this->db->get();
		return $query;
		
	}
	
	public function delete($id)
	{
	  $this->db->where('Student_cat_id',$id);  
	  $this->db->delete('student_catagery'); 
	  return true;
	}
	
	public function check_duplicate_category_name($Student_cat_name){
		
		$this->db->select('Student_cat_name');
		$this->db->from('student_catagery');
		$this->db->where('Student_cat_name', $Student_cat_name);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			
			return 1;
		}
		else{
			return 0;
		}
	}
	
}
