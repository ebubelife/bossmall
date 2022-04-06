<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* Product Controller
*/
class Product extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		if(!isset($this->session->userid) && ($this->session->userstatus !=1)){
			redirect('Login');
		}
		$data = array();
		$this->load->model("ProductModel");
		$this->load->model("StoreModel");
	}
	public function add_product_form(){
		$data['all_cat'] = $this->ProductModel->get_all_category();
		$data['all_sub_cat'] = $this->ProductModel->get_all_sub_category();
		$data['stores'] = $this->StoreModel->get_all_store();
		$data['main_content'] = $this->load->view('back/add_product',$data,true);
		$this->load->view('back/adminpanel',$data);
	}
	public function show_product_list(){
		$data['all_product'] = $this->ProductModel->get_all_product();
		$data['main_content'] = $this->load->view('back/product_list',$data,true);
		$this->load->view('back/adminpanel',$data);
	}

	public function show_merchant_list(){
		$data['all_product'] = $this->ProductModel->get_all_product();
		$data['main_content'] = $this->load->view('back/merchant_list',$data,true);
		$this->load->view('back/adminpanel',$data);
	}
	public function insert_product(){
		$product_image= $this->upload_product_image();
		if($product_image==NULL){
			redirect("Product/add_product_form");
		}else{

		$image = $this->ProductModel->add_product_model($product_image);
	$this->session->set_flashdata("flash_msg","<font class='success'>Product Added Successfully</font>");
		redirect('product-list');
		}
	}
	public function edit_product($product_id){
		$data['all_product'] = $this->ProductModel->edit_product_model($product_id);
		$data['all_cat'] = $this->ProductModel->get_all_category();
		$data['all_sub_cat'] = $this->ProductModel->get_all_sub_category();
		$data['all_brand'] = $this->ProductModel->get_all_brand();
		$data['stores'] = $this->StoreModel->get_all_store();
		$data['main_content'] = $this->load->view('back/edit_product',$data,true);
		$this->load->view('back/adminpanel',$data);
		
	}
	private function upload_product_image(){
		$this->load->library('upload');
		$dataInfo = array(); 
		$files = $_FILES;
		$cpt = count($_FILES['pro_image']['name']);
		$imageUrl = ""; $imageArray = array(); $allImages = ""; $filename_one_url ="";
	
		$config = array(
			'upload_path' => "./uploads/",
			'allowed_types' => "gif|jpg|png|jpeg",
			'overwrite' => TRUE,
			'max_size' => "10485760", // Can be set to particular file size , here it is 2 MB(2048 Kb)
			//'max_height' => "768",
			//'max_width' => "1024"
			
			);

			

			for($i=0; $i<$cpt; $i++)
			{ 
				$config['file_name'] = $_FILES['pro_image']['name'][$i];
		
				$_FILES['pro_image']['name']= $files['pro_image']['name'][$i];
				$_FILES['pro_image']['type']= $files['pro_image']['type'][$i];
				$_FILES['pro_image']['tmp_name']= $files['pro_image']['tmp_name'][$i];
				$_FILES['pro_image']['error']= $files['pro_image']['error'][$i];
				$_FILES['pro_image']['size']= $files['pro_image']['size'][$i];    
		
				$this->upload->initialize($config);
				if($this->upload->do_upload('pro_image'))
				{
					$dataInfo[] = $this->upload->data();

					$filename = $dataInfo[$i]['file_name'];

					$filename_one = $dataInfo[0]['file_name'];

					// Initialize array
					$data['filenames'][] = $filename;

					

					$imageUrl = "uploads/".$filename;

					$filename_one_url = "uploads/".$filename_one;
					

					array_push($imageArray,$imageUrl);
				

				}

				else{
					$error = array('error' => $this->upload->display_errors());
					//$this->load->view('custom_view', $error);

				


					echo json_encode($error);
					$this->session->set_userdata('error_image',json_encode($error));


				}
				
		
			}

			$allImages = base64_encode(serialize($imageArray));

			return  $allImages;

			$this->session->set_userdata("all-images",$allImages);
		
	}
	public function update_product(){
		//$this->PrductModel->update_product_model();
		if(count(array_filter($_FILES['pro_image']['name']))==0){
			$product_image= $this->input->post('old_pro_image',true);
			$this->ProductModel->update_product_model($product_image);
			$this->session->set_flashdata("update_pro_msg","Product Updated Successfully");
			
			
			$product_id = $this->input->post('pro_id',true);
			redirect('product-list');
			
		}else{
			$product_id = $this->input->post('pro_id',true);
			$product_image = $this->upload_product_image();
			if($product_image==NULL){
				redirect('product-list');
			}else{
			$this->ProductModel->update_product_model($product_image);
		//	unlink($this->input->post('old_pro_image',true));
			$this->session->set_flashdata("update_pro_msg","Product Updated Successfully");
			redirect('product-list');
		}
			
		}

	}
	public function delete_product($product_id){
		$this->ProductModel->delete_product_model($product_id);
		$this->session->set_flashdata('product_delete','Product Deleted Successfully');
		redirect('product-list');
	}

	public function resizeImage($target,$w, $h){
		$wmax = 1024;
        $hmax = 768;
	}
	
	
}

?>