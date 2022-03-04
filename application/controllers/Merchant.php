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
	}
	public function add_merchant_form(){

		 $banks = array(
			"Access Bank Plc",
			"Citibank Nigeria",
			"Coronation Merchant Bank",
			"Ecobank Nigeria Plc",
			"FBNQuest Merchant Bank",
			"Fidelity Bank Plc",
			"First Bank of Nigeria",
			"First City Monument Bank",
			"FSDH Merchant Bank",
			"Globus Bank",
			"Guaranty Trust Bank Plc",
			"Heritage Banking Company ",
			"Jaiz Bank Plc",
			"Keystone Bank",
			"Nova Merchant Bank",
			"Polaris Bank",
			"Providus Bank",
			"Rand Merchant Bank",
			"Stanbic IBTC Bank Plc",
			"Standard Chartered",
			"Sterling Bank Plc",
			"SunTrust Bank Nigeria ",
			"TAJBank",
			"Titan Trust Bank",
			"Union Bank of Nigeria Plc",
			"United Bank for Africa Plc",
			"Unity Bank Plc",
			"Wema Bank Plc",
			"Zenith Bank Plc",
		 );
		$data['all_cat'] = $this->ProductModel->get_all_category();
		$data["banks"]= $banks;
		$data['all_sub_cat'] = $this->ProductModel->get_all_sub_category();
		$data['main_content'] = $this->load->view('back/add_merchant',$data,true);
		$this->load->view('back/adminpanel',$data);
	}
	
	
}

?>