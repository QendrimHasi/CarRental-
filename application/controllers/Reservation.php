<?php 
use \Stripe\Stripe;
use \Stripe\Charge;
use \Stripe\Customer;


	class Reservation extends CI_Controller
	{
	      public function reserve(){
	    	if($this->session->userdata('loggedin')){
		    	$this->form_validation->set_rules('datefrom','Date from','required');
		        $this->form_validation->set_rules('dateto','Date to','required');

		        $car=$this->input->post('car[]');
				$data['car'] = $this->Car_model->get_cars($car[0]);
				$id=$car[0];

				
	    	$data['year']=date('Y');
	    	//first Month
	    	$data['currentmonthname']=date('F');
	    	$data['currentmonth']=date('m');

	    	$d=new DateTime(date('Y').'-'.date('M').'-'.date("d"));
	    	$d->modify('first day of this month');
	    	$counter=(int)$d->format('N');
	    	$data['firstmonthcounter']=$counter-1;

	    	$startday=date('Y').'-'.date('m').'-'.$d->format('d');
	    	$data['reservations']= $this->Reservation_model->get_reservation($startday,$id);

	    	$d->modify('last day of this month');
	    	$data['cmlastday']=$d->format('d');

	    	//Second Month
	    	$nextmonth=mktime(0, 0, 0, date("m")+1, date("d"),date("Y"));
	    	$nextmname= date("F", $nextmonth);
	    	$data['nextmonthname']=$nextmname;
	    	$month=(int)date('m')+1;
	    	$data['nextmonth']=$month;

	    	$d=new DateTime(date("Y").'-'.$month.'-'.date("d"));
	    	$d->modify('first day of this month');
	    	$data['secondmonthcounter']=$d->format('N')-1;


	    	$d->modify('last day of this month');
	    	$data['nmlastday']=$d->format('d');
		        if ($this->form_validation->run()==FALSE) {
			    	if (empty($data['car'])) {
			    		show_404();
			    	}
			    	$this->load->view('templates/user/header');
					$this->load->view('cars/car-info', $data);
					$this->load->view('templates/user/footer');
				}else{
					$datefrom=$this->input->post('datefrom');
					$dateto=$this->input->post('dateto');
					$amount=0;
					if($dateto<$datefrom){

						$this->session->set_flashdata('date','Date to cant be lover than Date from');

						redirect('home/'.$car[0]);
					}else{
						if($this->Reservation_model->checkdate($datefrom,$dateto,$car[0])){

						$this->session->set_flashdata('date_error','This date is taken please try another date');
						redirect('home/'.$car[0]);
						}else{
							$datetime1 = new DateTime("".$datefrom);
							$datetime2 = new DateTime("".$dateto);
							$difference = $datetime1->diff($datetime2);
							$days=$difference->days;
							$days++;

							$amount=$days*$car[1];
							
							

							if($this->Reservation_model->reserve($amount)){

								$this->session->set_flashdata('user_reserved','You have successfully reserved this car now please make your payment');

								redirect('Users/payment');
							}
						}


						
						}
					
					}
		     }else{
		     	redirect('Users/login');
		     }

	    }
	    public function payment(){
	    	$reservation=$this->input->post('reservation[]');

	    	$token=$_POST['stripeToken'];
	    	if (isset($token)) {
	    			try{
	    		require_once('vendor/autoload.php');
	    		Stripe::setApiKey('sk_test_7NBbh4jchkilEWARAzhh7X7H001Wkodtfj');
	    		//die("".$_POST['stripeamount']);
	    		$amount="".$reservation[1]."00";
	    		$charge = Charge::create(
	    			array(
	    				"amount"=>$amount,
	    				"currency"=>"EUR",
	    				"source"=>$token,
	    				"description"=>"Payment"
	    			)
	    		);
	    		$this->Reservation_model->pay();
	    		$this->session->set_flashdata('payment_success','You have successfully reserved and payd the car');
	    		 redirect('Users/payment');

		    	}catch(\Stripe\Error\Card $e){
		    		$error=$e->getMessage();
		    		echo $error;
		    	}
	    	}
	    	
	    }

}

 ?>