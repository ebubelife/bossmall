<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* Product Controller
*/
class Merchant extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		if(!isset($this->session->userid) && ($this->session->userstatus !=1)){
			redirect('Login');
		}
		$data = array();
		$this->load->model("ProductModel");
		$this->load->model("MerchantModel");
		$this->load->library("banks");
		$this->load->helper('cookie');
	}
	public function add_merchant_form(){

	
		$banks = $this->banks->return_banks();
		$data["banks"]= $banks;

		//echo json_encode($banks);
	//	$data['all_sub_cat'] = $this->ProductModel->get_all_sub_category();
		$data['main_content'] = $this->load->view('back/add_merchant',$data,true);
		$this->load->view('back/adminpanel',$data);
	}

	public function merchant_list(){

	  
		$data['all_merchants'] = $this->MerchantModel->get_all_merchants();
		$data['main_content'] = $this->load->view('back/merchant_list',$data,true);
		$this->load->view('back/adminpanel',$data);

	}

	public function add_merchant(){

		
		$new_store = $this->MerchantModel->add_merchant_model();

		if($new_store){
		$this->session->set_flashdata("flash_msg","<font class='success'>Store Added Successfully</font>");
		redirect('merchant-list');
		}else{
			$this->session->set_flashdata("flash_msg","<font class='error'>An error occured</font>");
			redirect("add-merchant");
		}
	}

	public function search_user_string(){

		$search_string = json_decode($_POST["p_data"]);

	    $check_user = $this->MerchantModel->search_merchant_model($search_string);

		//echo "ggg";
		echo json_encode($check_user);

	}

	public function add_cookie_id(){

		$id = json_decode($_POST["p_data"]);

	
	
	
		$this->session->set_userdata("selected_merchant_id",$id);
		
		echo $this->session->userdata('selected_merchant_id');

	}
	
	
}

?>