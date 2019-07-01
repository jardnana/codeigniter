<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends CI_Controller {

	public function index()
	{

		$data = array();
		$this->db->select('*');
		$data['booking_details'] = $this->db->get('booking_details')->result();
		$this->load->view('book_list',$data);

		
		 
	}

	public function getVals()
	{
		$str = '';
		$keyword = $this->input->post('book_type');
		if($keyword == 'domestic')
		{
			$str .= '<option value = "Hyderabad">Hyderabad</option>';
			$str .= '<option value = "Banaglore">Banaglore</option>';
			$str .= '<option value = "Goa">Goa</option>';
			$str .= '<option value = "Delhi">Delhi</option>';
		}
		else
		{
			$str .= '<option value = "India">India</option>';
			$str .= '<option value = "USA">USA</option>';
			$str .= '<option value = "UK">UK</option>';
			$str .= '<option value = "Austraila">Austraila</option>';
		}
		echo $str;
	}

	public function book($id = null)
	{
		$data['book_data'] = array('booking_id'=>'','book_type'=>'','book_city'=>'','form_date'=>date('Y-m-d'),'to_date'=>'Y-m-d','book_class'=>'','price'=>0,'image'=>'');
		if($id)
		{
			$this->db->select('*');
			$this->db->where('booking_id',$id);
			 $result = $this->db->get('booking_details')->row_array();
			if($result){$data['book_data'] = $result; }	 
		}
		
		$this->load->view('booking_panel',$data);
	}

	public function saveBooking()
	{
		if($this->input->post())
		{
			$data = array();
			$book_id = $this->input->post('book_id');
			$data['customer_id'] = 1;
			if($book_id){}
			else{$data['order_id'] = rand(10000,99999);}
			$data['book_type'] = $this->input->post('book_type');
			if($data['book_type'] == 'domestic')
			{
				$data['book_city'] = $this->input->post('d_book_city');
			}
			else if($data['book_type'] == 'international')
			{
				$data['book_city'] = $this->input->post('i_book_city');
			}
			else
			{
				$data['book_city'] =  '';
			}
			
			$data['form_date'] = date('Y-m-d',strtotime($this->input->post('fromdate')));
			$data['to_date'] = date('Y-m-d',strtotime($this->input->post('todate')));
			$data['book_class'] = $this->input->post('book_class');
			$data['price'] = $this->input->post('book_price');
			
			if($_FILES)
			{
			 

				$upload_dir = $_SERVER['DOCUMENT_ROOT'] . "/codeigniter/upload_file/";
				$tmp_name = $_FILES['book_image']['name'];
		        $moved = move_uploaded_file($tmp_name, "$upload_dir");
		        $data['image'] = $tmp_name;
			}
			 
			 
			 if($data)
			 {
				 if($book_id)
				 {
				 	$this->db->set($data);
				 	$this->db->where('booking_id',$book_id);
				 	$result = $this->db->update('booking_details');
				 }
				 else
				 {
				 	$data['insert_date']  = date('Y-m-d H:i:s');
					$this->db->set($data);
				 	$result = $this->db->insert('booking_details');
				 }

				 if($result)
				 {
				 	redirect(base_url('index.php/booking'));
				 }
			 }
			 else
			 {

			 }
			 

			 

		}
	}
 
 

 	 






}
