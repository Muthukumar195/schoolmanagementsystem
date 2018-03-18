<?php 
class Fees_details_model extends CI_model{
	
	public function fees_details_list(){
		
		$this->db->select('fees_details.*, class_details.Class_id, class_details.Class_name, academic_details.Academic_id, academic_details.Academic_name, academic_details.Academic_start, academic_details.Academic_end');
		$this->db->from('fees_details');
		$this->db->join('class_details', 'class_details.Class_id = fees_details.Fees_class_id', 'Left');
		$this->db->join('academic_details', 'academic_details.Academic_id = fees_details.Fees_academic_id', 'Left');
		$this->db->order_by('Fees_id', 'DESC');
		$query = $this->db->get();
		//echo $this->db->last_query(); exit;
		return $query;
	}
	
	public function get_fees_details($id){
		
		$this->db->select('fees_details.*, class_details.Class_id, class_details.Class_name, academic_details.Academic_id, academic_details.Academic_name, academic_details.Academic_start, academic_details.Academic_end');
		$this->db->from('fees_details');
		$this->db->join('class_details', 'class_details.Class_id = fees_details.Fees_class_id', 'Left');
		$this->db->join('academic_details', 'academic_details.Academic_id = fees_details.Fees_academic_id', 'Left');
		$this->db->where('Fees_id', $id);
		$query = $this->db->get();
		//echo $this->db->last_query(); exit;
		return $query;
	}
	
	function add_fees_details()
	{
		$user_data = array(
			'Fees_class_id' => $this->input->post('class_id'),
			'Fees_academic_id' => $this->input->post('academic_id'),
			'Fees_amount' => $this->input->post('fees_amount'),
		);	
		$this->db->set('Fees_create_dt_time', 'NOW()', FALSE);	
		$insert=$this->db->insert('fees_details', $user_data);
		//echo $this->db->last_query();	exit;		
		return true;		
	}
	
	function edit_fees_details($id)
	{
		$user_data = array(
			'Fees_class_id' => $this->input->post('class_id'),
			'Fees_academic_id' => $this->input->post('academic_id'),
			'Fees_amount' => $this->input->post('fees_amount'),
		);	
		$this->db->set('Fees_create_dt_time', 'NOW()', FALSE);		
		$this->db->where('Fees_id', $id);
		$insert=$this->db->update('fees_details', $user_data);
		//echo $this->db->last_query(); exit;			
		return true;		
	}
	
	function approve()
	{
		$data=array('Fees_status'=>'A');
		$this->db->where('Fees_id',$this->input->get('id'));
		$this->db->update('fees_details',$data);
		return true;	 
	} 
	function deny()
	{
		$data=array('Fees_status'=>'D');
		$this->db->where('Fees_id',$this->input->get('id'));
		$this->db->update('fees_details',$data);
		return true;	 
	}
	function delete($id)
	{	
	  $this->db->where('Fees_id',$id);  
	  $this->db->delete('fees_details'); 
	  return true;
	}
}


?>