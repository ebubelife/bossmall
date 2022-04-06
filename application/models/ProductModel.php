<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductModel extends CI_Model {
	
	
	public function add_product_model($product_image){
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
		$data['store_id'] = $this->input->post('store_name',true);
		$getStoreDetails = $this->getStoreDetails($data['store_id']);
		$data['merchant_id'] = $getStoreDetails->merchant_id;
		$generatedNum = $this->generateProductNumber();
		$data["prod_num"] = "p".$generatedNum;

		
		$this->db->insert('tbl_product',$data);	
	}

	public function generateProductNumber(){
		$generateStoreNum = mt_rand(111111,999999);
		$sql = "SELECT * FROM tbl_product WHERE prod_num = ? ";
        $query = $this->db->query($sql, array($generateStoreNum));
       
        if($query->num_rows() == 1) {

			generateProductNumber();         
			
		}
           
            else{
                return $generateStoreNum; 
            }

        }


	
	public function get_all_product_limit($limit){
		$data = $this->db->select('*')
			->from('tbl_product')
			->where('trash',0)
			->order_by('pro_id','desc')
			->limit($limit)
			->get()
			->result();
			return $data;
	}

	public function get_all_products_store($store_id){
		$multiClause = array('store_id'=>$store_id, 'trash' => 0);
		$data = $this->db->select('*')
			->from('tbl_product')
			->where($multiClause)
			->order_by('pro_id','desc')
			->get()
			->result();
			return $data;
	}


	public function get_all_top_product(){
		$multiClause = array('top_product'=>1, 'trash' => 0);
		$data = $this->db->select('*')
			->from('tbl_product')
			->order_by('pro_id','desc')
			->where($multiClause)
			->limit("4")
			->get()
			->result();
			return $data;
	}
	public function get_all_category(){
		$data = $this->db->select('*')
			->from('tbl_category')
			->order_by('category_id','desc')
			->get()
			->result();
			return $data;
	}
	public function get_all_sub_category(){
		$data = $this->db->select('*')
			->from('tbl_sub_category')
			->order_by('sub_cat_id','desc')
			->get()
			->result();
			return $data;
	}
	public function get_all_brand(){
		$data = $this->db->select('*')
			->from('tbl_brand')
			->order_by('brand_id','desc')
			->get()
			->result();
			return $data;
	}
	public function get_all_product(){
	
		//$multiClause = array('trash'=>'tbl_products.store_id', 'tbl_stores.store_status' => 1,'tbl_stores.admin_approve' => 1);
	
	
		$data = $this->db->select('*')
			->from('tbl_product')
			->where('trash',0)
			//->join('tbl_stores', 'tbl_stores.id = tbl_product.store_id AND tbl_stores.admin_approve = 1 AND  tbl_stores.store_status = 1')
						
			->order_by('pro_id','desc')
			->get()
			->result();
			return $data;
	}

	public function get_all_products_filter($limit){
	
		//$multiClause = array('trash'=>'tbl_products.store_id', 'tbl_stores.store_status' => 1,'tbl_stores.admin_approve' => 1);
	
	
		$data = $this->db->select('*')
			->from('tbl_product')
			->where('trash',0)
			
		//	->join('tbl_stores', 'tbl_stores.id = tbl_product.store_id AND tbl_stores.admin_approve = 1 AND  tbl_stores.store_status = 1')
						
			->order_by('pro_id','desc')
			->limit($limit)
		
			->get()
			->result();
			return $data;
	}

	public function get_store_products_filter($store_id,$limit){
           $filter_array = array('trash'=>0,'store_id'=>$store_id);

		$data = $this->db->select('*')
		->from('tbl_product')
		->where($filter_array)					
		->order_by('pro_id','desc')
		->limit($limit)
		->get()
		->result();
		return $data;

	}

	public function get_cat_products_filter($cat_id,$limit){
		$filter_array = array('trash'=>0,'pro_cat'=>$cat_id);

	 $data = $this->db->select('*')
	 ->from('tbl_product')
	 ->where($filter_array)					
	 ->order_by('pro_id','desc')
	 ->limit($limit)
	 ->get()
	 ->result();
	 return $data;

 }

	public function edit_product_model($product_id){
		$data = $this->db->select('*')
			->from('tbl_product')
			->order_by('pro_id','desc')
			->where('pro_id',$product_id)
			->get()
			->row();
			return $data;
	}
	public function update_product_model($product_image){
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
		$data['store_id'] = $this->input->post('store_name',true);

		$getStoreDetails = $this->getStoreDetails($data['store_id']);
		$data['merchant_id'] = $getStoreDetails->merchant_id;
		$this->db->where('pro_id',$product_id);
		$this->db->update('tbl_product',$data);

		
		
	}
	public function delete_product_model($product_id){
		$product_image = $this->edit_product_model($product_id);
		$data['trash'] = 1;
		unlink($product_image->pro_image);
		$this->db->where('pro_id', $product_id);
		$this->db->update('tbl_product',$data);
	}

	public function getStoreDetails($store_id){

		$data = $this->db->select('*')
		->from('tbl_stores')
	
		->where('id',$store_id)
		->get()
		->row();
		return $data;

	}
	

}
