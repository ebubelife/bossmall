<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MerchantModel extends CI_Model {

    public function get_merchant($merchant_id){
		$data = $this->db->select('*')
						->from('tbl_merchants')
						->where('id',$merchant_id)
						->get()
						->row();
						return $data;
	}

	public function get_all_merchants(){
		$data = $this->db->select('*')
						->from('tbl_merchants')
						
						->get()
						->result();
						return $data;
	}


public function add_merchant_model(){
		$data['first_name'] = $this->input->post('merchant_fname',true);
		$data['last_name'] = $this->input->post('merchant_lname',true);
		$data['other_names'] = $this->input->post('merchant_othername',true);
		$data['email'] = $this->input->post('merchant_email',true);
		$data['phone'] = $this->input->post('merchant_phone',true);
		$data['whatsapp_phone'] = $this->input->post('merchant_whatsapp',true);
		$data['bank'] = $this->input->post('merchant_bank',true);
		$data['acc_name'] = $this->input->post('merchant_acc_name',true);
		$data['account_number'] = $this->input->post('merchant_acc_num',true);
		$data['password'] = $password = password_hash("12345", PASSWORD_DEFAULT);
		

		
		if($this->db->insert('tbl_merchants',$data))	

		return true;
		else
		return false;
	}

	public function search_merchant_model($search){
		$sql = "SELECT * FROM tbl_merchants WHERE first_name LIKE CONCAT('%',?,'%')";

		$query = $this->db->query($sql, array($search));


		
		if($query->num_rows() > 0){

			return $query->result_array();

			
		}
		
		else{
			return "Merchant Not Found!";
		}
		
	}


}

?>