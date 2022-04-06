<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StoreModel extends CI_Model {

	
	public function add_store_model(){
		$data['category_id'] = $this->input->post('category',true);
		$data['store_name'] = $this->input->post('store_name',true);
		$data['store_description'] = $this->input->post('store_description',true);
		$data['store_address'] = $this->input->post('store_address',true);
		$data['city'] = $this->input->post('city',true);
		$data['country'] = $this->input->post('country',true);
		$data['state'] = $this->input->post('state',true);
		$data['zip_code'] = $this->input->post('zip',true);
		$data['sell_global'] = $this->input->post('sell_globally',true);
		$data['store_status'] = 1;
		$data['admin_approve'] = 1;
		$data['merchant_id'] = $this->session->userdata('selected_merchant_id');

		$generatedNum = $this->generateStoreNumber();

			$data["store_num"] = "s".$generatedNum;
	//	$data['country'] = $this->input->post('country',true);
		

		
		$this->db->insert('tbl_stores',$data);	
		return true;
	}
	public function get_all_store($limit=null){
		if($limit){
		$data = $this->db->select('*')
			->from('tbl_stores')
			->order_by('id','desc')
			->limit($limit)
			->get()
			->result();
			return $data;
		}
		else{
			$data = $this->db->select('*')
			->from('tbl_stores')
			->order_by('id','desc')
			
			->get()
			->result();
			return $data;
		}
	}

	public function get_single_store($store_id){
		if($store_id){
		$data = $this->db->select('*')
			->from('tbl_stores')
			->where('id',$store_id)
			
			->get()
			->row();
			return $data;
		}
		
	}

	
	public function get_all_store_products(){
		$data = $this->db->select('*')
			->from('tbl_brand')
			->order_by('brand_id','desc')
			->get()
			->result();
			return $data;
	}

	public function set_status_store(){
		$data = $this->db->select('*')
			->from('tbl_product')
			->order_by('pro_id','desc')
			->get()
			->result();
			return $data;
	}

	public function update_store_model($store_id){
		$data['merchant_id'] = $this->session->userdata('selected_merchant_id');
		$data['store_name'] = $this->input->post('store_name',true);
		$data['store_description'] = $this->input->post('store_description',true);
		$data['category_id'] = $this->input->post('category',true);
		$data['store_address'] = $this->input->post('store_address',true);
		$data['city'] = $this->input->post('city',true);
		$data['state'] = $this->input->post('state',true);
		$data['zip_code'] = $this->input->post('zip',true);
		$data['country'] = $this->input->post('country',true);
		$data['sell_global'] = $this->input->post('sell_globally',true);
		
		$this->db->where('id',$store_id);
		$this->db->update('tbl_stores',$data);
		return true;
		
	}
	public function delete_store_model($product_id){
		$product_image = $this->edit_product_model($product_id);
		unlink($product_image->pro_image);
		$this->db->where('pro_id', $product_id);
		$this->db->delete('tbl_product');
	}
	

	public function generateStoreNumber(){
		$generateStoreNum = mt_rand(111111,999999);

		$sql = "SELECT * FROM tbl_stores WHERE store_num = ? ";

        $query = $this->db->query($sql, array($generateStoreNum));
       

        if($query->num_rows() == 1) {

	            generateStoreNumber();         
			
		}
           
            else{
                return $generateStoreNum; 
            }

        }

		public function change_store_status($status, $id){

			$sql = "UPDATE tbl_stores SET store_status = '$status'  WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			if($query){
		   
			return true;
		}
		else{
			return false;
		}
		}

		public function change_admin_approve($approve, $id){

			$sql = "UPDATE tbl_stores SET admin_approve = '$approve'  WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			if($query){
		   
			return true;
		}
		else{
			return false;
		}
		}
}
