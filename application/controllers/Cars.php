<?php 
	class Cars extends CI_Controller
	{
	    public function home(){
	    	$data['cars']= $this->Car_model->get_cars();
	    	$this->load->view('templates/user/header');
			$this->load->view('cars/home', $data);
			$this->load->view('templates/user/footer');

	    }

	    public function carinfo($id= NULL){
	    	$data['car'] = $this->Car_model->get_cars($id);
	    	if (empty($data['car'])) {
	    		show_404();
	    	}

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

	    	$this->load->view('templates/user/header');
			$this->load->view('cars/car-info', $data);
			$this->load->view('templates/user/footer');

	    }
	}

 ?>