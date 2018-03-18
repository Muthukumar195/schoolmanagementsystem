<?php 
class Subject_allocation_model extends CI_model{
	
	public function subject_allocation_list(){
		
		$this->db->select('subject_allocation_details.*, employee_details.Employee_id, employee_details.Employee_first_name, employee_details.Employee_middle_name, employee_details.Employee_last_name, class_details.Class_id, class_details.Class_name, academic_details.Academic_id, academic_details.Academic_name, academic_details.Academic_start, academic_details.Academic_end, subject_details.Subject_id, subject_details.Subject_name');
		$this->db->from('subject_allocation_details');
		$this->db->join('employee_details', 'employee_details.Employee_id = subject_allocation_details.Subject_allocation_employee_id', 'Left');
		$this->db->join('class_details', 'class_details.Class_id = subject_allocation_details.Subject_allocation_class_id', 'Left');
		$this->db->join('academic_details', 'academic_details.Academic_id = subject_allocation_details.Subject_allocation_academic_id', 'Left');
		$this->db->join('subject_details', 'subject_details.Subject_id = subject_allocation_details.Subject_allocation_subject_id', 'Left');
		$this->db->order_by('Subject_allocation_id', 'DESC');
		$query = $this->db->get();
		//echo $this->db->last_query(); exit;
		return $query;
	}
	
	public function get_subject_allocation_details($id){
		
		$this->db->select('subject_allocation_details.*, employee_details.Employee_id, employee_details.Employee_first_name, employee_details.Employee_middle_name, employee_details.Employee_last_name, class_details.Class_id, class_details.Class_name, academic_details.Academic_id, academic_details.Academic_name, academic_details.Academic_start, academic_details.Academic_end, subject_details.Subject_id, subject_details.Subject_name');
		$this->db->from('subject_allocation_details');
		$this->db->join('employee_details', 'employee_details.Employee_id = subject_allocation_details.Subject_allocation_employee_id', 'Left');
		$this->db->join('class_details', 'class_details.Class_id = subject_allocation_details.Subject_allocation_class_id', 'Left');
		$this->db->join('academic_details', 'academic_details.Academic_id = subject_allocation_details.Subject_allocation_academic_id', 'Left');
		$this->db->join('subject_details', 'subject_details.Subject_id = subject_allocation_details.Subject_allocation_subject_id', 'Left');
		$this->db->where('Subject_allocation_id', $id);
		$query = $this->db->get();
		//echo $this->db->last_query(); exit;
		return $query;
	}
	
	function add_subject_allocation()
	{
		$user_data = array(
			'Subject_allocation_employee_id' => $this->input->post('employee_id'),
			'Subject_allocation_class_id' => $this->input->post('class_id'),
			'Subject_allocation_academic_id' => $this->input->post('academic_id'),
			'Subject_allocation_subject_id' => $this->input->post('subject_id'),
		);	
		$this->db->set('Subject_allocation_create_dt_time', 'NOW()', FALSE);	
		$insert=$this->db->insert('subject_allocation_details', $user_data);
		//echo $this->db->last_query();	exit;		
		return true;		
	}
	
	function edit_subject_allocation_details($id)
	{
		$user_data = array(
			'Subject_allocation_employee_id' => $this->input->post('employee_id'),
			'Subject_allocation_class_id' => $this->input->post('class_id'),
			'Subject_allocation_academic_id' => $this->input->post('academic_id'),
			'Subject_allocation_subject_id' => $this->input->post('subject_id'),
		);	
		$this->db->set('Subject_allocation_create_dt_time', 'NOW()', FALSE);	
		$this->db->where('Subject_allocation_id', $id);
		$insert=$this->db->update('subject_allocation_details', $user_data);
		//echo $this->db->last_query(); exit;			
		return true;		
	}
	
	function approve()
	{
		$data=array('Subject_allocation_status'=>'A');
		$this->db->where('Subject_allocation_id',$this->input->get('id'));
		$this->db->update('subject_allocation_details',$data);
		return true;	 
	} 
	function deny()
	{
		$data=array('Subject_allocation_status'=>'D');
		$this->db->where('Subject_allocation_id',$this->input->get('id'));
		$this->db->update('subject_allocation_details',$data);
		return true;	 
	}
	function delete($id)
	{	
	  $this->db->where('Subject_allocation_id',$id);  
	  $this->db->delete('subject_allocation_details'); 
	  return true;
	}
}


?>