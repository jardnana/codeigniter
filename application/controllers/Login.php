<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		// New second page test
		$this->load->view('welcome_message');
	}
 
 	public function validateLogin()
 	{
		
		
		
 		if($this->input->post())
 		{
 			$user_name = $this->input->post('email');
 			$password = $this->input->post('password');

 			$this->db->select('user_id');
 			$this->db->where('username',$user_name);
 			$this->db->where('password',$password);
 			$resultData = $this->db->get('userDetails')->row();
 			if($resultData)
 			{
               echo 'success';
               // session_start();
               // $_SESSION["user_id"] = $resultData->user_id;

 			}
 			else
 			{
 				echo 'invalid';
 			}
 		}
 		else
 		{
 			echo 'empty';
 		}
 		
 	}






}
