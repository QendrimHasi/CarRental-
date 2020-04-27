<?php 

	class Users extends CI_Controller
	{

	    public function register()
	    {
	    	if($this->session->userdata('loggedin')){
	    		redirect('home');
	    	}else{
		        $this->form_validation->set_rules('email','Email','required|callback_check_email_exists');
		        $this->form_validation->set_rules('username','Username','required|callback_check_username_exists');
		        $this->form_validation->set_rules('password','Password','required');
		        $this->form_validation->set_rules('confirm','Confirm password','required|matches[password]');
		        if ($this->form_validation->run()==FALSE) {
		        	$this->load->view('templates/user/header');
		        	$this->load->view('users/register');
		        	$this->load->view('templates/user/footer');
		        	
		        }else {
		        	//enc pass
		        	$enc_pass=md5($this->input->post('password'));
		        	$this->User_model->register($enc_pass);

		        	//message
		        	$this->session->set_flashdata('user_registered','You where successfully registered');
		        	redirect('home');
		        }
		     }
	    }

	     function check_username_exists($username){
	    	$this->form_validation->set_message('check_username_exists','That username is taken');
	    	if ($this->User_model->check_username_exists($username)) {
	    		return true;
	    	}else {
	    		return FALSE;
	    	}
	    }

	     function check_email_exists($email){
	    	$this->form_validation->set_message('check_email_exists','That email is taken');
	    	if ($this->User_model->check_email_exists($email)) {
	    		return true;
	    	}else {
	    		return FALSE;
	    	}
	    }

	    public function login(){

	    	if($this->session->userdata('loggedin')){
	    		redirect('home');
	    	}else{
			    	$this->form_validation->set_rules('username','Username','required');
			        $this->form_validation->set_rules('password','Password','required');
			        if ($this->form_validation->run()==FALSE) {
			        	$this->load->view('templates/user/header');
			        	$this->load->view('users/login');
			        	$this->load->view('templates/user/footer');
			        	
			        }else{
			        	$username=$this->input->post('username');
			        	$pass= md5($this->input->post('password'));

			        	$user_id=$this->User_model->login($username,$pass);

			        	if ($user_id) {
			        		$user_data=array(
			        				'user_id'=>$user_id,
			        				'username'=>$username,
			        				'loggedin'=>true
			        		);

			        	if ($this->session->userdata('admin_logged')) {
	    						$this->session->unset_userdata('admin_logged');
	    						$this->session->unset_userdata('admin_username');
	    						$this->session->unset_userdata('admin_id');
	    				}
			        	$this->session->set_userdata($user_data);
			        	$this->session->set_flashdata('user_loggedin','You are now logged in');
			        	redirect('home');
			        	}else{
			        	$this->session->set_flashdata('login_faild','Log in is invalid');
			        	redirect('Users/login');
			        	}

			        }
			    }
	    }
	    public function welcome(){

	    	if($this->session->userdata('loggedin')){
	    		$data['username']=$this->session->userdata('username');
	    		$this->load->view('templates/user/header-profile');
			    $this->load->view('users/welcome',$data);
			    $this->load->view('templates/user/footer');
	    	}else{
	       			redirect('users/login');
			    }
	    }

	    public function payment(){

	    	if($this->session->userdata('loggedin')){
	    		$userid=$this->session->userdata('user_id');
	    		$data['cars']=$this->Reservation_model->getcarsforpayment($userid);

	    		$this->load->view('templates/user/header-profile');
			    $this->load->view('users/payment',$data);
			    $this->load->view('templates/user/footer');
	    	}else{
	       			redirect('users/login');
			    }
	    }


	    public function history(){
	    	if ($this->session->userdata('loggedin')) {
	    		$userid = $this->session->userdata('user_id');
	    		$data['reservedcars']=$this->Reservation_model->getmyreservations($userid);
	    		$data['usingcars']=$this->Reservation_model->usingcars($userid);
	    		$data['usedcars']=$this->Reservation_model->usedcars($userid);
	    		$this->load->view('templates/user/header-profile');
	    		$this->load->view('users/history',$data);
	    		$this->load->view('templates/user/footer');
	    	}
	    }

	    public function update(){
	    	if ($this->session->userdata('loggedin')) {
			    $this->form_validation->set_rules('oldpassword','Old Password','required');
			    $this->form_validation->set_rules('newpassword','New Password','required');
			    $this->form_validation->set_rules('confirm','Confirm password','required|matches[newpassword]');
		        if ($this->form_validation->run()==false) {
		        	$this->load->view('templates/user/header-profile');
	    			$this->load->view('users/change_password');
	    			$this->load->view('templates/user/footer');
		        }else{
		        	$userid=$this->session->userdata('user_id');
		        	$password= md5($this->input->post('oldpassword'));
		        	if ($this->User_model->check_password($userid,$password)) {
		        		$newpassword= md5($this->input->post('newpassword'));
		        		$this->User_model->change_password($userid,$newpassword);
		        		$this->session->set_flashdata('pass_success','You successfully change your password');
		        		redirect('users/update');
		        	}
		        	else {
		        		$this->session->set_flashdata('pass_incorrect','Incorrect Old Password');
		        		redirect('users/update');
		        	}
		        }
	
	    	}else{
	    		redirect('users/login');
	    	}
	    }

	    public function payticket($id){
	    	if ($this->session->userdata('loggedin')) {

	    		$data['reservations']=$this->Reservation_model->getreservationforticket($id);
	    		$this->load->view('templates/user/header-profile');
	    		$this->load->view('users/payticket',$data);
	    		$this->load->view('templates/user/footer');
	    	}else{
	    		redirect('users/login');
	    	}

	    }

	  

	    public function logout(){
	    	$this->session->unset_userdata('loggedin');
	    	$this->session->unset_userdata('username');
	    	$this->session->unset_userdata('user_id');
	    	$this->session->set_flashdata('user_loggedout','You are now logged out');
	       	redirect('users/login');

	    }
	}
 ?>