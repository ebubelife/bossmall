<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* Product Controller
*/
class Store extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		if(!isset($this->session->userid) && ($this->session->userstatus !=1)){
			redirect('Login');
		}
		$data = array();
		$this->load->model("ProductModel");
		$this->load->model("MerchantModel");
		$this->load->model("InvoiceModel");
		$this->load->model("StoreModel");
		$this->load->model("MerchantModel");
		$this->load->library("countries");
	}


    public function add_store_form(){
		$all_merchants = $this->MerchantModel->get_all_merchants();
		$data['all_merchants'] = $all_merchants;

		//echo json_encode($all_merchants);

        $data['all_cat'] = $this->ProductModel->get_all_category();
		//$data["banks"]= $banks;
		$data["countries"] = $this->countries->return_countries();

	//	echo json_encode($this->countries->return_countries());
	//	$data['all_cat'] = $this->CategoryModel->get_all_category();

		
		$data['main_content'] = $this->load->view('back/add_store',$data,true);
		$this->load->view('back/adminpanel',$data);

    }

	public function update_details_store($store_id){

		
		$update_store = $this->StoreModel->update_store_model($store_id);

		if($update_store){
		$this->session->set_flashdata("flash_msg","<font class='success'>Store Updated Successfully</font>");
		redirect('store-list');
		}else{
			$this->session->set_flashdata("flash_msg","<font class='error'>An error occured</font>");
			redirect('update-store/'.$store_id);
		}
	}

	public function insert_store(){

		
		$new_store = $this->StoreModel->add_store_model();

		if($new_store){
		$this->session->set_flashdata("flash_msg","<font class='success'>Store Added Successfully</font>");
		redirect('store-list');
		}else{
			$this->session->set_flashdata("flash_msg","<font class='error'>An error occured</font>");
			redirect("new-store");
		}
	}

	public function change_store_status(){

		$status = $_POST["data"]; 
		$status = json_decode($status);
		$status_change = $this->StoreModel->change_store_status($status[0],$status[1]);

		
		   echo $status_change ;

	}

	
	public function change_admin_approve(){

		$approve = $_POST["data"]; 
		$approve = json_decode($approve);
		$status_change = $this->StoreModel->change_admin_approve($approve[0],$approve[1]);

		
		   echo $status_change ;

	}






	public function show_store_list(){
		$data['all_stores'] = $this->StoreModel->get_all_store(10);
		$data['main_content'] = $this->load->view('back/store_list',$data,true);
		$this->load->view('back/adminpanel',$data);
	}

	public function edit_store($store_id){
		//$data['all_product'] = $this->ProductModel->edit_product_model($product_id);
		//$data['all_cat'] = $this->ProductModel->get_all_category();
	//	$data['all_sub_cat'] = $this->ProductModel->get_all_sub_category();
	//	$data['all_brand'] = $this->ProductModel->get_all_brand();


		$data['all_cat'] = $this->ProductModel->get_all_category();
		//$data["banks"]= $banks;
		
     	$data["countries"] = $this->countries->return_countries();

		$data['stores'] = $this->StoreModel->get_single_store($store_id);
		$merchant = $this->merchantmodel->get_merchant($stores->merchant_id);

		$data["merchant"] = $merchant;

		
		$data['main_content'] = $this->load->view('back/edit_store',$data,true);
		$this->load->view('back/adminpanel',$data);
		
	}


}

    ?>