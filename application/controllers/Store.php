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
		$this->load->model("InvoiceModel");
		$this->load->model("StoreModel");
		$this->load->model("MerchantModel");
	}


    public function add_store_form(){

        $data['all_cat'] = $this->ProductModel->get_all_category();
		//$data["banks"]= $banks;
		$data['all_cat'] = $this->CategoryModel->get_all_category();
		$data['main_content'] = $this->load->view('back/add_store',$data,true);
		$this->load->view('back/adminpanel',$data);

    }

	public function show_store_list(){
		$data['all_stores'] = $this->StoreModel->get_all_store(10);
		$data['main_content'] = $this->load->view('back/store_list',$data,true);
		$this->load->view('back/adminpanel',$data);
	}


}

    ?>