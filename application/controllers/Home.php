<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model("HomeModel");
		$this->load->model("CategoryModel");
		$this->load->library('pagination');
	}

	public function index(){
		$this->homepage();
	}
	public function productpage(){
		$data =array();
		$data['main_header'] = $this->load->view('front/main-header',$data,true);
		$data['slider'] = $this->load->view('front/advertise_top','',true);
		$data['recommended'] = "";
// Start pagination
		$config['base_url'] = base_url().'/Home/productpage/';
		$config['total_rows'] = $this->db->count_all("tbl_product");
		$config['per_page'] = 6;
		$config["full_tag_open"] = '<ul class="pagination">';
		$config["full_tag_close"] = '</ul>';	
		$config["first_link"] = "&laquo;";
		$config["first_tag_open"] = "<li>";
		$config["first_tag_close"] = "</li>";
		$config["last_link"] = "&raquo;";
		$config["last_tag_open"] = "<li>";
		$config["last_tag_close"] = "</li>";
		$config['next_link'] = '&gt;';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '<li>';
		$config['prev_link'] = '&lt;';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '<li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

		$this->pagination->initialize($config);
		$data['post_by_brand_id'] = $this->load->HomeModel->get_all_product_pagination($config['per_page'],$this->uri->segment(3));

// End pagination
		//$data['post_by_brand_id'] = $this->load->ProductModel->get_all_product();
		$data['feature'] = $this->load->view('front/product_list',$data,true);
		$data['category_brand'] = $this->load->view('front/category','',true);
		$this->load->view('front/index',$data);
	}
	public function homepage(){
		$data =array();
		$data['main_header'] = $this->load->view('front/main-header',$data,true);
		$categories = $this->CategoryModel->get_all_category();
		$data["categories"] = $categories;
		$data['slider'] = $this->load->view('front/slider','',true);
		$data['mobile_slider'] = $this->load->view('front/mobile_slider','',true);
		$data["section_title_one"] = "Featured Items";
		$data['important_offers'] = $this->load->view('front/important_offers','',true);
		$data['important_offers_2'] = $this->load->view('front/important_offers_2','',true);
		$data['full_intersect_banner'] = $this->load->view('front/full_intersect_banner','',true);
		$data['feature'] = $this->load->view('front/feature',$data,true);
		$data["section_title_two"] = "Popular Products";
		$data['best_selling'] = $this->load->view('front/best_selling',$data,true);
		$data['feature_on'] = true;
		$data['category_brand'] = $this->load->view('front/category','',true);
		$this->load->view('front/index',$data);
	}
	public function product_details($product_id){
	    
	    
		$data =array();
		$data['slider'] = $this->load->view('front/slider','',true);
		$data['mobile_slider'] = $this->load->view('front/mobile_slider','',true);
		$data['feature_on'] = false;
		$data["section_title_one"] = "Similar Items";
		$data['main_header'] = $this->load->view('front/main-header',$data,true);
		$data['recommended'] = $this->load->view('front/recommended','',true);
		$data['product_info'] = $this->HomeModel->get_product_by_id($product_id);
		$data['feature'] = $this->load->view('front/feature',$data,true);
		$data['product_details'] = $this->load->view('front/product_details',$data,true);
		$data['category_brand'] = $this->load->view('front/category','',true);
		$this->load->view('front/product_det_view',$data);
	}


	public function store_details($store_id){
		$data =array();
		$data['main_header'] = $this->load->view('front/main-header',$data,true);
		$data['slider'] = "";
		$data["section_title_one"] = "From Other Stores";
		//$data['recommended'] = $this->load->view('front/recommended','',true);
		//$data['product_info'] = $this->HomeModel->get_product_by_id($product_id);
		$data['store_info'] = $this->HomeModel->get_store_by_id($store_id);
		$data["section_title_one"] = "";
		$data['other_product'] = $this->load->view('front/other_product',$data,true);
		$data['feature'] = $this->load->view('front/feature',$data,true);
		$data['store_products'] = $this->load->view('front/store_products',$data,true);
		$data['category_brand'] = $this->load->view('front/category','',true);
		$data['store_header'] = $this->load->view('front/advertise_top',$data,true);
		
		$this->load->view('front/store_details',$data);
	}

	public function category_products($cat_id){
		$data =array();
		$data['main_header'] = $this->load->view('front/main-header',$data,true);
		$data['slider'] = "";
		$data["section_title_one"] = "From Other Stores";
		$data["section_title_one"] = "";
		$data['other_product'] = $this->load->view('front/other_product',$data,true);
		$data['feature'] = $this->load->view('front/feature',$data,true);
		$data['category_products'] = $this->load->view('front/category_products',$data,true);
		$data['category_brand'] = $this->load->view('front/category','',true);
		$data['store_header'] = $this->load->view('front/advertise_top',$data,true);
		
		$this->load->view('front/cat_products_page',$data);
	}

	public function show_post_by_brand_id($brand_id){
		$data =array();
		$data['slider'] = $this->load->view('front/advertise_top','',true);
		$data['recommended'] = "";
		$data['category_brand'] = $this->load->view('front/category','',true);
		$data['post_by_brand_id'] = $this->HomeModel->post_brand_by_id($brand_id);
		$data['feature'] = $this->load->view('front/product_list',$data,true);
		$this->load->view('front/index',$data);
	}
	public function show_post_by_sub_cat_id($sub_cat_id){
		
		$data['slider'] = $this->load->view('front/advertise_top','',true);
		$data['recommended'] = "";
		$data['category_brand'] = $this->load->view('front/category','',true);
		$data['post_by_brand_id'] = $this->HomeModel->post_sub_cat_by_id($sub_cat_id);
		$data['feature'] = $this->load->view('front/product_list',$data,true);
		$this->load->view('front/index',$data);
	}
	public function _404_page(){
		//$data['main_content'] = $this->load->view('front/404','',true);
		$this->load->view('front/404');
	}
	public function show_product_by_price_range(){
		$data = array();
		 $min_range = $this->input->post('amount1');
		 $max_range = $this->input->post('amount2');
		$data['slider'] = $this->load->view('front/advertise_top','',true);
		$data['recommended'] = "";
		$data['category_brand'] = $this->load->view('front/category','',true);
		$data['post_by_brand_id'] = $this->HomeModel->show_product_price_range($min_range,$max_range);
		$data['feature'] = $this->load->view('front/product_list',$data,true);
		$this->load->view('front/index',$data);

	}
	public function contact_page(){
		$data =array();
		$data['slider'] = "";
		$data['recommended'] = "";
		$data['main_content'] = $this->load->view('front/contact_page','',true);
		$data['category_brand'] = "";
		$this->load->view('front/index',$data);
	}
	public function insert_contact_info(){
			$this->form_validation->set_rules('contact_email', 'Email', 'required|valid_email');
		if($this->form_validation->run()){
		$this->ContactModel->insert_contact_data();
		$this->session->set_flashdata("flash_msg","<h3 class='alert alert-success text-center'>Message Send Successfully.</h3>");
           redirect('contact');
       }else{
       		$this->contact_page();
       }
	}

}
