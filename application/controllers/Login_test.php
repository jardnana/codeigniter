<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_test extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('Login_test_model');
    }

	public function index()
	{
		$this->load->view('test/login');
	}

	public function add_details()
	{
		 $this->load->library('form_validation');
    	 $this->form_validation->set_rules('category', 'category', 'required');
    	 $this->form_validation->set_rules('product', 'product', 'required');
    	 $this->form_validation->set_rules('price', 'price', 'required');
    	 $this->form_validation->set_rules('quantity', 'quantity', 'required');
    	 $data['cat'] = $this->Login_test_model->get_cat();
   		 if ($this->form_validation->run() == false) {
		  $this->load->view('test/add',$data);
		}else{
			//echo "<pre>";print_r(APPPATH);die;
			//Image Uploading

			$config['upload_path'] = APPPATH.'upload_file/';
		    $config['allowed_types'] = 'gif|jpg|png';
		    $config['overwrite'] = TRUE;
		    $config['encrypt_name'] = FALSE;
		    $config['remove_spaces'] = TRUE;

		    if ( ! is_dir($config['upload_path']) ) die("THE UPLOAD DIRECTORY DOES NOT EXIST");
		    $this->load->library('upload', $config);
		    if ( ! $this->upload->do_upload('image')) {
		    	print_r( $this->upload->data());
		        echo 'error';die;
		    } else {
		    	$image_path = base_url().'application/upload_file/'.$_FILES['image']['name'];
		    }
			$data = array(
				'category'   => $this->input->post('category'), 
				'product'    => $this->input->post('product'), 
				'price'      => $this->input->post('price'), 
				'quantity'   => $this->input->post('quantity'), 
				'created_date' => date('Y-m-d H:i:s'),
				'img_path'   => $image_path,
				);
			$this->Login_test_model->add_data($data);
			redirect('Login_test/get_details');
		}
	}

	public function Get_product()
	{
		$selected = $this->uri->segment(3);
		$data['product'] = $this->Login_test_model->get_product($selected);
		echo json_encode($data['product']);

	}

	public function delete_details()
	{
		$id = $this->uri->segment(3);
		$this->Login_test_model->delete_data($id);
		redirect('Login_test/get_details');
	}

	public function edit_details()
	{
		 $this->load->library('form_validation');
    	 $this->form_validation->set_rules('category', 'category', 'required');
    	 $this->form_validation->set_rules('product', 'product', 'required');
    	 $this->form_validation->set_rules('price', 'price', 'required');
    	 $this->form_validation->set_rules('quantity', 'quantity', 'required');
    	 $id = $this->uri->segment(3);
    	 $data['cat'] = $this->Login_test_model->get_cat();
    	 $data['product_details'] = $this->Login_test_model->get_details_by_id($id);
    	 $data['product'] = $this->Login_test_model->get_product($data['product_details'][0]['category']);
    	 
    	 $data['product_details'] = $this->Login_test_model->get_details_by_id($id);
   		 if ($this->form_validation->run() == false) {
		  $this->load->view('test/edit',$data);
		}else{
			if(isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])){
				$config['upload_path'] = APPPATH.'upload_file/';
			    $config['allowed_types'] = 'gif|jpg|png';
			    $config['overwrite'] = TRUE;
			    $config['encrypt_name'] = FALSE;
			    $config['remove_spaces'] = TRUE;

			    if ( ! is_dir($config['upload_path']) ) die("THE UPLOAD DIRECTORY DOES NOT EXIST");
			    $this->load->library('upload', $config);
			    if ( ! $this->upload->do_upload('image')) {
			    	print_r( $this->upload->data());
			        echo 'error';die;
			    } else {
			    	$image_path = base_url().'application/upload_file/'.$_FILES['image']['name'];
			    }
			}else{
				$image_path = $data['product_details'][0]['img_path'];
			}
			
			$data = array(
				'category'   => $this->input->post('category'), 
				'product'    => $this->input->post('product'), 
				'price'      => $this->input->post('price'), 
				'quantity'   => $this->input->post('quantity'), 
				'created_date' => date('Y-m-d H:i:s'),
				'img_path'   => $image_path,
				);
			$this->Login_test_model->edit_data($data,$id);
			redirect('Login_test/get_details');
		}
	}


	public function get_details(){
		$data['product_details'] = $this->Login_test_model->get_details();
		$this->load->view('test/product_details',$data);
	}

	public function validate_user()
	{
		$username = $this->input->post('username');
		$Password = $this->input->post('Password');
		$result = $this->Login_test_model->validate_user($username,$Password);
		if(isset($result) && !empty($result)){
			$data['product_details'] = $this->Login_test_model->get_details();
			$this->load->view('test/product_details',$data);
		}else{
			$_SESSION['login'] = 0;
			redirect('Login_test');
		}
	}
}
?>