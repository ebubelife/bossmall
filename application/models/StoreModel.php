<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StoreModel extends CI_Model {

	
	public function add_store_model($product_image){
		$data['pro_title'] = $this->input->post('pro_title',true);
		$data['pro_desc'] = $this->input->post('pro_desc',true);
		$data['pro_cat'] = $this->input->post('pro_cat',true);
		$data['pro_sub_cat'] = $this->input->post('pro_sub_cat',true);
		$data['pro_brand'] = $this->input->post('pro_brand',true);
		$data['pro_price'] = $this->input->post('pro_price',true);
		$data['pro_quantity'] = $this->input->post('pro_quantity',true);
		$data['pro_availability'] = $this->input->post('pro_availability',true);
		$data['pro_status'] = $this->input->post('pro_status',true);
		$data['pro_image'] = $product_image;
		$data['top_product'] = $this->input->post('top_product',true);

		
		$this->db->insert('tbl_stores',$data);	
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
	public function edit_store_model($product_id){
		$data = $this->db->select('*')
			->from('tbl_product')
			->order_by('pro_id','desc')
			->where('pro_id',$product_id)
			->get()
			->row();
			return $data;
	}
	public function update_store_model($product_image){
		$product_id = $this->input->post('pro_id',true);
		$data['pro_title'] = $this->input->post('pro_title',true);
		$data['pro_desc'] = $this->input->post('pro_desc',true);
		$data['pro_cat'] = $this->input->post('pro_cat',true);
		$data['pro_sub_cat'] = $this->input->post('pro_sub_cat',true);
		$data['pro_brand'] = $this->input->post('pro_brand',true);
		$data['pro_price'] = $this->input->post('pro_price',true);
		$data['pro_quantity'] = $this->input->post('pro_quantity',true);
		$data['pro_availability'] = $this->input->post('pro_availability',true);
		$data['pro_status'] = $this->input->post('pro_status',true);
		$data['pro_image'] = $product_image;
		$data['top_product'] = $this->input->post('top_product',true);
		$this->db->where('pro_id',$product_id);
		$this->db->update('tbl_product',$data);
		
	}
	public function delete_store_model($product_id){
		$product_image = $this->edit_product_model($product_id);
		unlink($product_image->pro_image);
		$this->db->where('pro_id', $product_id);
		$this->db->delete('tbl_product');
	}
	

}
