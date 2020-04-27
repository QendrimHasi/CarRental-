<?php 
	class Admins extends CI_Controller
	{

	
	    public function login()
	    { 
	    	if($this->session->userdata('admin_logged')){
	    		redirect('Admins/welcome');
	    	}else{

		    	$this->form_validation->set_rules('username','Username','required');
		        $this->form_validation->set_rules('password','Password','required');
		        if ($this->form_validation->run()==false) {
		        	$this->load->view('templates/admin/header');
		        	$this->load->view('admins/login');
		        	$this->load->view('templates/admin/footer');
		        }else{
		        	$username=$this->input->post('username');
		        	$pass= md5($this->input->post('password'));
		        	$admin_id=$this->Admin_model->login($username,$pass);

		        	if ($admin_id) {
		        		$admin_data=array(
		        				'admin_id'=>$admin_id,
		        				'admin_username'=>$username,
		        				'admin_logged'=>true
		        		);

		        	if ($this->session->userdata('loggedin')) {
	    					$this->session->unset_userdata('loggedin');
	    					$this->session->unset_userdata('username');
	    					$this->session->unset_userdata('user_id');
	    				}
		        	$this->session->set_userdata($admin_data);

		        	$this->session->set_flashdata('admin_loggedin','You are now logged in');
		        	redirect('Admins/welcome');
		        	}else{

		        	//message
		        	$this->session->set_flashdata('login_faild','Log in is invalid');
		        	redirect('Admins/login');
		        	}

		        }
		    }
	    }

	    public function register(){
	    	if($this->session->userdata('admin_logged')){
	    	 $this->form_validation->set_rules('email','Email','required|callback_check_email_exists');
	        $this->form_validation->set_rules('username','Username','required|callback_check_username_exists');
	        $this->form_validation->set_rules('password','Password','required');
	        $this->form_validation->set_rules('confirm','Confirm password','required|matches[password]');
	        if ($this->form_validation->run()==FALSE) {
	        	$this->load->view('templates/admin/header');
	        	$this->load->view('admins/register');
	        	$this->load->view('templates/admin/footer');
	        	
	        }else {
	        	//enc pass
	        	$enc_pass=md5($this->input->post('password'));
	        	$this->Admin_model->register($enc_pass);

	        	//message
	        	$this->session->set_flashdata('admin_registered','The new Admin is successfully registered');
	        	redirect('Admins/welcome');
	        }
	        }else {
	    		redirect('Admins/login');
	    	}
	    }

	    public function handovercar(){
	    	if ($this->session->userdata('admin_logged')) {

	    		$currentdate=date('Y').'-'.date('m').'-'.date("d");

	    		$data['reservations']=$this->Reservation_model->getreservationforhandover($currentdate);
	    		$this->load->view('templates/admin/header');
	        	$this->load->view('admins/hand_over',$data);
	        	$this->load->view('templates/admin/footer');
	    		
	    	}else{
	    		redirect('Admins/login');
	    	}
	    }
	    public function receivecar(){
	    	if ($this->session->userdata('admin_logged')) {

	    		 $currentdate=date('Y').'-'.date('m').'-'.date('d');
	    		//$currentdate=strtotime('now');

	    		$data['reservations']=$this->Reservation_model->getreservationforreceive($currentdate);
	    		$this->load->view('templates/admin/header');
	        	$this->load->view('admins/receive_car',$data);
	        	$this->load->view('templates/admin/footer');
	    		
	    	}else{
	    		redirect('Admins/login');
	    	}
	    }

	    public function activity(){
	    	if ($this->session->userdata('admin_logged')) {
	    		$data['cars']=$this->Car_model->get_cars();
	    		$this->load->view('templates/admin/header');
	        	$this->load->view('admins/activity',$data);
	        	$this->load->view('templates/admin/footer');	
	    	}else{
	    		redirect('Admins/login');
	    	}
	    }

	    public function activate($id){
	    	if ($this->session->userdata('admin_logged')) {
	    		if ($id==null) {
	    			show_404();
	    		}else{
	    			$this->Car_model->activate($id);
	    			redirect('Admins/activity');
	    		}	
	    	}else{
	    		redirect('Admins/login');
	    	}
	    }
	    public function deactivate($id){
	    	if ($this->session->userdata('admin_logged')) {
	    		if ($id==null) {
	    			show_404();
	    		}else{
	    			$this->Car_model->deactivate($id);
	    			redirect('Admins/activity');
	    		}	
	    	}else{
	    		redirect('Admins/login');
	    	}
	    }

	    public function handover($id){
	    	if ($this->session->userdata('admin_logged')) {
	    		if ($id==null) {
	    			show_404();
	    		}else{
	    			$this->Reservation_model->handover($id);
	    			redirect('Admins/handovercar');
	    		}
	    	}else{
	    		redirect('Admins/login');
	    	}
	    }

	    public function receive($id){
	    	if ($this->session->userdata('admin_logged')) {
	    		if ($id==null) {
	    			show_404();
	    		}else{
	    			$this->Reservation_model->receive($id);
	    			redirect('Admins/receivecar');
	    		}
	    	}else{
	    		redirect('Admins/login');
	    	}
	    }


	    //check if username exist
	     function check_username_exists($username){
	    	$this->form_validation->set_message('check_username_exists','That username is taken');
	    	if ($this->Admin_model->check_username_exists($username)) {
	    		return true;
	    	}else {
	    		return FALSE;
	    	}
	    }

	     function check_email_exists($email){
	    	$this->form_validation->set_message('check_email_exists','That email is taken');
	    	if ($this->Admin_model->check_email_exists($email)) {
	    		return true;
	    	}else {
	    		return FALSE;
	    	}
	    }
	    public function addCar(){
	    	if($this->session->userdata('admin_logged')){
			    $this->form_validation->set_rules('brandid','Brand','required');
			    $this->form_validation->set_rules('car_type','Car type','required');
			    $this->form_validation->set_rules('build','Build','required');
		        $this->form_validation->set_rules('transmission','Transmission','required');
		        $this->form_validation->set_rules('fuel','Fuel','required');
		        $this->form_validation->set_rules('engine','Engine','required');
		        $this->form_validation->set_rules('max_speed','Max speed','required');
		        $this->form_validation->set_rules('price','Price','required');

	    		$data['brands']=$this->Car_model->get_brands();

	    		if ($this->form_validation->run()==FALSE) {
	        	
	    		$this->load->view('templates/admin/header');
	       		$this->load->view('admins/add-car',$data);
	       		$this->load->view('templates/admin/footer');
	        	

	        }else{
	        	$config = array(
			        'upload_path'     => "./assets/images/cars",
			        'allowed_types' => "gif|jpg|png|jpeg|pdf",
			        'overwrite' => false,
			        'encrypt_name' => TRUE,
			        'max_size' => "5120000",
			        'max_height' => "5000",
			        'max_width' => "5000"
			        );

	        	$this->load->library('upload',$config);

	        	if (!$this->upload->do_upload('userfile')) {
	        		$errors=array('error'=>$this->upload->display_errors());
	        		$post_image='noimage.jpg';
	        		$this->session->set_flashdata('image_error','The image was to large');
	        		redirect('Admins/addCar');
	        	}else{
	        		$data=array('upload_data'=> $this->upload->data());
	        		//$post_image=$_FILES['userfile']['name'];
	        		$file_info=$this->upload->data();
	        		$post_image=$file_info['file_name'];
	        	}

	        	$this->Car_model->addCar($post_image);
	        	$this->session->set_flashdata('Car_registered','The new Car is successfully registered');
	        	redirect('Admins/addCar');
	        }

	    	}else {
	    		redirect('Admins/login');
	    	}
	    	
	    }

	    public function carlist(){
	    	if($this->session->userdata('admin_logged')){

	    		$data['cars']= $this->Car_model->get_cars();
	    		$this->load->view('templates/admin/header');
	       		$this->load->view('admins/car-list',$data);
	       		$this->load->view('templates/admin/footer');
	    	}else {
	    		redirect('Admins/login');
	    	}
	    	
	    }

	    public function welcome(){
	    	if($this->session->userdata('admin_logged')){
	    		$this->load->view('templates/admin/header');
	       		$this->load->view('admins/welcome');
	       		$this->load->view('templates/admin/footer');
	    	}else {
	    		redirect('Admins/login');
	    	}
	    	
	    }
	    public function delete($id=null){
	    	if($this->session->userdata('admin_logged')){

	    		$car=$this->Car_model->get_cars($id);
	    		$currentdate =date('Y').'-'.date('m').'-'.date('d');
	    		if ($this->Reservation_model->checkforreservation($currentdate,$id)) {
	    			if(unlink(FCPATH."assets/images/cars/".$car['image'])){
	    		 	$this->Reservation_model->delete($id);
	    		 	$this->Car_model->delete($id);
	    	 		$this->session->set_flashdata('Car_deletetd','The Car is successfully deleted');
	    	 		redirect('Admins/carlist');
	    			}else{
	    				$this->session->set_flashdata('image','The image was not found.');
	    	 			redirect('Admins/carlist');
	    			}
	    		}else{
	    			$this->session->set_flashdata('reservation_error','You cant delete this car becose he is reverved.');
	    	 		redirect('Admins/carlist');
	    		}
	    		

	    	 }else {
	    		redirect('Admins/login');
	    	}
	    	
	    }



	     public function logout(){
	    	$this->session->unset_userdata('admin_logged');
	    	$this->session->unset_userdata('admin_username');
	    	$this->session->unset_userdata('admin_id');
	    	$this->session->set_flashdata('admin_loggedout','You are now logged out');
	       	redirect('Admins/login');

	    }
	}

 ?>