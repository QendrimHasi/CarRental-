<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('loggedin')){
	    		redirect('home');
	    	}else{
				$this->load->view('templates/user/header');
				$this->load->view('welcome_message');
				$this->load->view('templates/user/footer');
			}
	}

	public function email(){
		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('subject','Subject','required');
		$this->form_validation->set_rules('message','Message','required');

		if ($this->form_validation->run()==FALSE) {
		    $this->load->view('templates/user/header');
			$this->load->view('welcome_message');
			$this->load->view('templates/user/footer');	
		    }else {
		    	
		    	$config['protocol'] = 'smtp';
				$config['smtp_host'] = 'ssl://smtp.googlemail.com';
				$config['smtp_port']    = '465';
				$config['smtp_timeout'] = '60';
				$config['smtp_user']    = 'qendrimhasi98@gmail.com';
				$config['smtp_pass']    = 'qendrim123456789';
				$config['charset']    = 'utf-8';
				$config['newline']    = "\r\n";
				$config['mailtype'] = 'text'; // or html
				$config['validation'] = false; // bool whether to validate email or not      

				$this->email->initialize($config);

		    	$name=$this->input->post('name');
		    	$from=$this->input->post('email');
		    	$subject=$this->input->post('subject');
		    	$message=$this->input->post('message');
		    	$this->email->to('qendrimhasi98@gmail.com');
				$this->email->from($from,'CarRental');
				$this->email->subject($subject);
				$this->email->message($message.'from '.$name);

				if($this->email->send()){
					$this->session->set_flashdata('email_send','Your email was sent successfully');
		    		redirect('');
				}else{
				   $this->session->set_flashdata('email_dontsend','Your email hasent been sent');
		    		redirect('');
				}

				$this->session->set_flashdata('email_send','Your email was sent successfully');
		    	redirect('');
		    }
	}
}
