<?php 
class Institution_model extends CI_Model{
	
	public function institution_details_list(){
		
		$this->db->select('*');
		$this->db->from('instution_details');
		$this->db->order_by('Instution_id', 'DESC');
		$query = $this->db->get();
		return $query;
		
	}
	
	public function institution_list(){
		
		$this->db->select('Instution_id,Instution_code');
		$this->db->from('instution_details');
		$this->db->where('Instution_status', 'A');
		$query = $this->db->get();
		return $query;
	}
	
	public function get_institution_details($id){
		
		$this->db->select('*');
		$this->db->from('instution_details');
		$this->db->where('Instution_id', $id);
		$this->db->limit(1);
		$query = $this->db->get();
		return $query;
	}
	
	
	function add_institution_details()
	{
		$fax=''; 
		if($this->input->post('fax')!=null){ $fax = $this->input->post('ins_fax'); } 
		$user_data = array(
			'Instution_code' => $this->input->post('ins_code'),
			'Instution_name' => $this->input->post('ins_name'),
			'Instution_email' => $this->input->post('ins_email'),
			'Instution_mobile' => $this->input->post('ins_mobile'),
			'Instution_address' => $this->input->post('ins_address'),
			'Instution_fax' => $fax,
			'Instution_city' => $this->input->post('ins_city'),
			'Instution_pin' => $this->input->post('ins_pin'),
			'Instution_country' => $this->input->post('ins_country'),
			'Instution_state' => $this->input->post('ins_state'),
		);	
		$this->db->set('Instution_create_dt_time', 'NOW()', FALSE);	
		$insert=$this->db->insert('instution_details', $user_data);
		//echo $this->db->last_query();	exit;		
		return true;		
	}

	function edit_institution_details($id)
	{
		$fax=''; 
		if($this->input->post('fax')!=null){ $fax = $this->input->post('ins_fax'); } 
		$user_data = array(
			'Instution_code' => $this->input->post('ins_code'),
			'Instution_name' => $this->input->post('ins_name'),
			'Instution_email' => $this->input->post('ins_email'),
			'Instution_mobile' => $this->input->post('ins_mobile'),
			'Instution_address' => $this->input->post('ins_address'),
			'Instution_fax' => $fax,
			'Instution_city' => $this->input->post('ins_city'),
			'Instution_pin' => $this->input->post('ins_pin'),
			'Instution_country' => $this->input->post('ins_country'),
			'Instution_state' => $this->input->post('ins_state'),
		);	
		$this->db->set('Instution_create_dt_time', 'NOW()', FALSE);		
		$this->db->where('Instution_id', $id);
		$insert=$this->db->update('instution_details', $user_data);
		//echo $this->db->last_query(); exit;			
		return true;		
	}
	
	function approve()
	{
		$data=array('Instution_status'=>'A');
		$this->db->where('Instution_id',$this->input->get('id'));
		$this->db->update('instution_details',$data);
		return true;	 
	} 
	function deny()
	{
		$data=array('Instution_status'=>'D');
		$this->db->where('Instution_id',$this->input->get('id'));
		$this->db->update('instution_details',$data);
		return true;	 
	}
	function delete($id)
	{	
	  $this->db->where('Instution_id',$id);  
	  $this->db->delete('instution_details'); 
	  return true;
	}
	
	function check_institution_code($ins_code)
	{
		$this->db->select('Instution_code');
        $this->db->from('instution_details'); 		
		$this->db->where('Instution_code',$ins_code); 
        $query = $this->db->get(); 

        if ($query->num_rows() > 0) //if message exists
	   {
	   	return 1;
	   }
	   else
	   {
	   	 return 0;
	   }       	 
	}
	
}