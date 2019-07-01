<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_test_model extends CI_Model {
	function __construct() {
        parent::__construct();
        $this->load->database();
    }

	public function get_details()
	{
		$this->db->select('*');
		$this->db->from('tbl_product_details');
        $query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}

	public function get_cat()
	{
		$this->db->select('*');
		$this->db->from('tbl_cat');
        $query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}

	public function get_product($cat)
	{
		$this->db->select('*');
		$this->db->from('tbl_product');
		$this->db->where('category',$cat);
        $query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}


	public function get_details_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_product_details');
		$this->db->where('id',$id);
        $query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}

	public function add_data($data){
		$this->db->insert('tbl_product_details',$data);
		return 1;
	}
	public function edit_data($data,$id){
		$this->db->where('id',$id);
		$this->db->update('tbl_product_details',$data);
		return 1;
	}

	public function delete_data($id){
		$this->db->where('id',$id);
		$this->db->delete('tbl_product_details');
		return 1;
	}

	public function validate_user($username,$password)
	{
		$this->db->select('*');
		$this->db->from('tbl_user_login_details');
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
 
 	





}
?>