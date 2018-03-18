<?php 
class Student_model extends CI_Model{
	
	public function __construct(){
		
		parent:: __construct();
		
	}
	
	public function student_details_list(){
		
		$this->db->select('student_details.*, class_details.Class_id, class_details.Class_name, academic_details.Academic_id, academic_details.Academic_name');
		$this->db->from('student_details');
		$this->db->join('class_details', 'class_details.Class_id = student_details.Student_class_id', 'Left');
		$this->db->join('academic_details', 'academic_details.Academic_id = student_details.Student_academic_id', 'Left');
		$query = $this->db->get();
		return $query;
		
	}
	
	public function get_student_details($id){
		
		$this->db->select('student_details.*, class_details.Class_id, class_details.Class_name, academic_details.Academic_id, academic_details.Academic_name, student_catagery.Student_cat_id, student_catagery.Student_cat_name');
		$this->db->from('student_details');
		$this->db->join('class_details', 'class_details.Class_id = student_details.Student_class_id', 'Left');
		$this->db->join('academic_details', 'academic_details.Academic_id = student_details.Student_academic_id', 'Left');
		$this->db->join('student_catagery', 'student_catagery.Student_cat_id = student_details.Student_category_id', 'Left');
		$this->db->where('Student_id', $id);
		$this->db->limit(1);
		$query = $this->db->get();
		return $query;
	}
	
	
	function add_student_details()
	{
		$middle_name=''; $last_name=''; $blood_group=''; $permanent_address=''; $father_name=''; $father_mobile=''; $father_job=''; $father_education=''; $father_income=''; $mother_name=''; $mother_mobile=''; $mother_job=''; $gud_name=''; $gud_relation=''; $gud_job=''; $gud_education=''; $gud_income=''; $gud_address=''; $gud_mobile=''; $gud_email=''; $gud_city=''; $gud_country=''; $school_name=''; $school_qualification=''; $school_address='';
	    $last_name=''; 
		if($this->input->post('middle_name')!=null){ $middle_name = $this->input->post('middle_name'); } 
		if($this->input->post('last_name')!=null){ $last_name = $this->input->post('last_name'); }
		if($this->input->post('blood_group')!=null){ $blood_group = $this->input->post('blood_group'); }
		if($this->input->post('permanent_address')!=null){ $permanent_address = $this->input->post('permanent_address'); }
		if($this->input->post('father_name')!=null){ $father_name = $this->input->post('father_name'); }
		if($this->input->post('father_mobile')!=null){ $father_mobile = $this->input->post('father_mobile'); }
		if($this->input->post('father_job')!=null){ $father_job = $this->input->post('father_job'); }
		if($this->input->post('father_education')!=null){ $father_education = $this->input->post('father_education'); }
		if($this->input->post('father_income')!=null){ $father_income = $this->input->post('father_income'); }
		if($this->input->post('mother_name')!=null){ $mother_name = $this->input->post('mother_name'); }
		if($this->input->post('mother_mobile')!=null){ $mother_mobile = $this->input->post('mother_mobile'); }
		if($this->input->post('mother_job')!=null){ $mother_job = $this->input->post('mother_job'); }
		if($this->input->post('gud_name')!=null){ $gud_name = $this->input->post('gud_name'); }
		if($this->input->post('gud_relation')!=null){ $gud_relation = $this->input->post('gud_relation'); }
		if($this->input->post('gud_job')!=null){ $gud_job = $this->input->post('gud_job'); }
		if($this->input->post('gud_education')!=null){ $gud_education = $this->input->post('gud_education'); }
		if($this->input->post('gud_income')!=null){ $gud_income = $this->input->post('gud_income'); }
		if($this->input->post('gud_address')!=null){ $gud_address = $this->input->post('gud_address'); }
		if($this->input->post('gud_mobile')!=null){ $gud_mobile = $this->input->post('gud_mobile'); }
		if($this->input->post('gud_email')!=null){ $gud_email = $this->input->post('gud_email'); }
		if($this->input->post('gud_city')!=null){ $gud_city = $this->input->post('gud_city'); }
		if($this->input->post('gud_country')!=null){ $gud_country = $this->input->post('gud_country'); }
		if($this->input->post('school_name')!=null){ $school_name = $this->input->post('school_name'); }
		if($this->input->post('school_qualification')!=null){ $school_qualification = $this->input->post('school_qualification'); }
		if($this->input->post('school_address')!=null){ $school_address = $this->input->post('school_address'); }
		$user_data = array(
			'Student_register_no' => $this->input->post('register_no'),
			'Student_join_date' => date('Y-m-d', strtotime($this->input->post('joining_date'))),
			'Student_class_id' => $this->input->post('class_name'),
			'Student_academic_id' => $this->input->post('academic_name'),
			'Student_roll_no' => $this->input->post('roll_no'),
			'Student_first_name' => $this->input->post('first_name'),
			'Student_middle_name' => $middle_name,
			'Student_last_name' => $last_name,
			'Student_date_of_birth' =>  date('Y-m-d', strtotime($this->input->post('dob'))),
			'Student_gender' => $this->input->post('gender'),
			'Student_blood_group' => $blood_group,
			'Student_birth_place' => $this->input->post('birth_place'),
			'Student_nationalaty' => $this->input->post('nationality'),
			'Student_mother_tongue' => $this->input->post('mother_tongue'),
			'Student_category_id' => $this->input->post('cat_name'),
			'Student_religion' => $this->input->post('religion'),
			'Student_permanent_address' => $this->input->post('present_address'),
			'Student_present_address' => $permanent_address,
			'Student_city' => $this->input->post('con_city'),
			'Student_pincode' => $this->input->post('con_pin'),
			'Student_county' => $this->input->post('country'),
			'Student_state' => $this->input->post('state'),
			'Student_phone' => $this->input->post('con_mobile'),
			'Student_email' => $this->input->post('con_email'),
			'Student_father_name' => $father_name,
			'Student_father_mobile' => $father_mobile,
			'Student_father_education' => $father_education,
			'Student_father_occupation' => $father_job,
			'Student_father_income' => $father_income,
			'Student_mother_name' => $mother_name,
			'Student_mother_mobile' => $mother_mobile,
			'Student_mother_occupation' => $mother_job,
			'Student_guardian_name' => $gud_name,
			'Student_guardian_relationship' => $gud_relation,
			'Student_guardian_education' => $gud_education,
			'Student_guardian_occupation' => $gud_job,
			'Student_guardian_income' => $gud_income,
			'Student_guardian_address' => $gud_address,
			'Student_guardian_city' => $gud_city,
			'Student_guardian_country' => $gud_country,
			'Student_guardian_mobile' => $gud_mobile,
			'Student_guardian_email' => $gud_email,
			'Student_pre_sch_name' => $school_name,
			'Student_pre_sch_address' => $school_address,
			'Student_pre_sch_qualification' => $school_qualification,
		);	
		$this->db->set('Student_create_dt_time', 'NOW()', FALSE);	
		$insert=$this->db->insert('student_details', $user_data);
		$this->db->last_query();			
		return true;		
	}
	
	
	function upload_file($file_extension)
	{		
		$this->db->select_max('Student_id', 'max_id');
		$query = $this->db->get('student_details'); 
		$res2 = $query->result_array();
        $max_id = $res2[0]['max_id'];		
		
		$file_name='student_pic'.$max_id.$file_extension;	

		$data=array('Student_profile'=>$file_name);
		$this->db->where('Student_id',$max_id);
		$this->db->update('student_details',$data);
		//echo $this->db->last_query(); exit();
		return $file_name;
	}
	
	function edit_student_details($id)
	{
		$middle_name=''; $last_name=''; $blood_group=''; $permanent_address=''; $father_name=''; $father_mobile=''; $father_job=''; $father_education=''; $father_income=''; $mother_name=''; $mother_mobile=''; $mother_job=''; $gud_name=''; $gud_relation=''; $gud_job=''; $gud_education=''; $gud_income=''; $gud_address=''; $gud_mobile=''; $gud_email=''; $gud_city=''; $gud_country=''; $school_name=''; $school_qualification=''; $school_address='';
	    $last_name=''; 
		if($this->input->post('middle_name')!=null){ $middle_name = $this->input->post('middle_name'); } 
		if($this->input->post('last_name')!=null){ $last_name = $this->input->post('last_name'); }
		if($this->input->post('blood_group')!=null){ $blood_group = $this->input->post('blood_group'); }
		if($this->input->post('permanent_address')!=null){ $permanent_address = $this->input->post('permanent_address'); }
		if($this->input->post('father_name')!=null){ $father_name = $this->input->post('father_name'); }
		if($this->input->post('father_mobile')!=null){ $father_mobile = $this->input->post('father_mobile'); }
		if($this->input->post('father_job')!=null){ $father_job = $this->input->post('father_job'); }
		if($this->input->post('father_education')!=null){ $father_education = $this->input->post('father_education'); }
		if($this->input->post('father_income')!=null){ $father_income = $this->input->post('father_income'); }
		if($this->input->post('mother_name')!=null){ $mother_name = $this->input->post('mother_name'); }
		if($this->input->post('mother_mobile')!=null){ $mother_mobile = $this->input->post('mother_mobile'); }
		if($this->input->post('mother_job')!=null){ $mother_job = $this->input->post('mother_job'); }
		if($this->input->post('gud_name')!=null){ $gud_name = $this->input->post('gud_name'); }
		if($this->input->post('gud_relation')!=null){ $gud_relation = $this->input->post('gud_relation'); }
		if($this->input->post('gud_job')!=null){ $gud_job = $this->input->post('gud_job'); }
		if($this->input->post('gud_education')!=null){ $gud_education = $this->input->post('gud_education'); }
		if($this->input->post('gud_income')!=null){ $gud_income = $this->input->post('gud_income'); }
		if($this->input->post('gud_address')!=null){ $gud_address = $this->input->post('gud_address'); }
		if($this->input->post('gud_mobile')!=null){ $gud_mobile = $this->input->post('gud_mobile'); }
		if($this->input->post('gud_email')!=null){ $gud_email = $this->input->post('gud_email'); }
		if($this->input->post('gud_city')!=null){ $gud_city = $this->input->post('gud_city'); }
		if($this->input->post('gud_country')!=null){ $gud_country = $this->input->post('gud_country'); }
		if($this->input->post('school_name')!=null){ $school_name = $this->input->post('school_name'); }
		if($this->input->post('school_qualification')!=null){ $school_qualification = $this->input->post('school_qualification'); }
		if($this->input->post('school_address')!=null){ $school_address = $this->input->post('school_address'); }
		$user_data = array(
			'Student_register_no' => $this->input->post('register_no'),
			'Student_join_date' => date('Y-m-d', strtotime($this->input->post('joining_date'))),
			'Student_class_id' => $this->input->post('class_name'),
			'Student_acadamic_id' => $this->input->post('acadamic_name'),
			'Student_roll_no' => $this->input->post('roll_no'),
			'Student_first_name' => $this->input->post('first_name'),
			'Student_middle_name' => $middle_name,
			'Student_last_name' => $last_name,
			'Student_date_of_birth' =>  date('Y-m-d', strtotime($this->input->post('dob'))),
			'Student_gender' => $this->input->post('gender'),
			'Student_blood_group' => $blood_group,
			'Student_birth_place' => $this->input->post('birth_place'),
			'Student_nationalaty' => $this->input->post('nationality'),
			'Student_mother_tongue' => $this->input->post('mother_tongue'),
			'Student_category_id' => $this->input->post('cat_name'),
			'Student_religion' => $this->input->post('religion'),
			'Student_permanent_address' => $permanent_address,
			'Student_present_address' => $this->input->post('present_address'),
			'Student_city' => $this->input->post('con_city'),
			'Student_pincode' => $this->input->post('con_pin'),
			'Student_county' => $this->input->post('country'),
			'Student_state' => $this->input->post('state'),
			'Student_phone' => $this->input->post('con_mobile'),
			'Student_email' => $this->input->post('con_email'),
			'Student_father_name' => $father_name,
			'Student_father_mobile' => $father_mobile,
			'Student_father_education' => $father_education,
			'Student_father_occupation' => $father_job,
			'Student_father_income' => $father_income,
			'Student_mother_name' => $mother_name,
			'Student_mother_mobile' => $mother_mobile,
			'Student_mother_occupation' => $mother_job,
			'Student_guardian_name' => $gud_name,
			'Student_guardian_relationship' => $gud_relation,
			'Student_guardian_education' => $gud_education,
			'Student_guardian_occupation' => $gud_job,
			'Student_guardian_income' => $gud_income,
			'Student_guardian_address' => $gud_address,
			'Student_guardian_city' => $gud_city,
			'Student_guardian_country' => $gud_country,
			'Student_guardian_mobile' => $gud_mobile,
			'Student_guardian_email' => $gud_email,
			'Student_pre_sch_name' => $school_name,
			'Student_pre_sch_address' => $school_address,
			'Student_pre_sch_qualification' => $school_qualification,
		);	
		$this->db->set('Student_create_dt_time', 'NOW()', FALSE);	
		$this->db->where('Student_id', $id);
		$insert=$this->db->update('student_details', $user_data);
		//echo $this->db->last_query(); exit;			
		return true;		
	}
	
	function edit_upload_file($file_extension)
	{
		$this->db->select_max('Student_id', 'max_id');
		$query = $this->db->get('student_details'); 
		$res2 = $query->result_array();
        $max_id = $this->input->post('id');		
		
		$file_name='student_pic'.$max_id.$file_extension;	

		$data=array('Student_profile'=>$file_name);
		$this->db->where('Student_id',$max_id);
		$this->db->update('student_details',$data);
		//echo $this->db->last_query(); exit();
		return $file_name;
	}
	
	function approve()
	{
		$data=array('Student_status'=>'A');
		$this->db->where('Student_id',$this->input->get('id'));
		$this->db->update(' student_details',$data);
		return true;	 
	} 
	function deny()
	{
		$data=array('Student_status'=>'D');
		$this->db->where('Student_id',$this->input->get('id'));
		$this->db->update(' student_details',$data);
		return true;	 
	}
	function delete($id)
	{	
	  $this->db->where('Student_id',$id);  
	  $this->db->delete(' student_details'); 
	  return true;
	}
	
	function check_register($reg_no)
	{
		$this->db->select('Student_register_no');
        $this->db->from('student_details'); 		
		$this->db->where('Student_register_no',$reg_no); 
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
	
	function ajax_check_register($reg_no)
	{
		$this->db->select('Student_register_no');
        $this->db->from('student_details'); 		
		$this->db->where('Student_register_no',$reg_no); 
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