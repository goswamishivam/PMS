<?php 

class loginmodel extends CI_Model{
	public function isvalidate($name,$password){
		$q=$this->db->where(['name'=>$name,'password'=>$password])
					->get('patient');


				if($q->num_rows())
				{
					return $q->row()->name;
				}
				else{
					return False;
				}

	}

	public function userdata(){
		$name=$this->session->userdata('name');
		$q=$this->db->select('firstname')
				->from('patient')
				->where(['name'=>$name])
				->get();
				return $q->result();
				
	}
}




 ?>