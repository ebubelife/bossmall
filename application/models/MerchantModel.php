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


}

?>