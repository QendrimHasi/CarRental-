<?php 

	class Reservation_model extends CI_Model
	{
	    public function reserve($amount){
	    	 $car=$this->input->post('car[]');
	    	$data=array(
	    			'userid'=>$this->session->userdata('user_id'),
	    			'carid'=>$car[0],
	    			'date_from'=>$this->input->post('datefrom'),
	    			'date_to'=>$this->input->post('dateto'),
	    			'amount'=>$amount
	    	);

	    	 return $this->db->insert('reservation',$data);
	    }

	    public function pay(){
	    	$reservation=$this->input->post('reservation[]');
	    	$this->db->set('payment', 1); 
			$this->db->where('rid',$reservation[0]); 
			$this->db->update('reservation');
	    }

	    public function checkdate($datefrom,$dateto,$id){
	    	
	    	$sql="SELECT * FROM `reservation` WHERE carid=".$id." and ((date_from <= '".$datefrom."' and date_to >= '".$dateto."') OR (date_from > '".$datefrom."' and date_to < '".$dateto."') OR (date_from > '".$datefrom."' and (date_to = '".$dateto."' or (date_to > '".$dateto."' and date_from < '".$dateto."' ) )) OR ((date_from = '".$datefrom."' or (date_from<'".$datefrom."' and date_to> '".$datefrom."')) and date_to < '".$dateto."'))";
	    	 $query = $this->db->query($sql);

	    	 if ($query->num_rows() >= 1) {
	       		return true;
	       }else{
	       	return false;
	       }

	    }


	    public function get_reservation($date,$carid){
	    	$sql="SELECT * FROM `reservation` WHERE date_from >= '".$date."' and carid=".$carid;
	    	$query =$this->db->query($sql);
	    	return $query->result_array();
	    }

	   	public function getcarsforpayment($userid){
	    	$this->db->join('cars','cars.carid=reservation.carid');
	    	$this->db->join('brands','brands.brandid=cars.brandid');
	    	$payment=0;
	    	$query =$this->db->get_where('reservation',array('userid'=>$userid,'payment'=>$payment));
	    	return $query->result_array();

	    }
	    public function getreservationforticket($rid){
	    	$this->db->join('cars','cars.carid=reservation.carid');
	    	$this->db->join('brands','brands.brandid=cars.brandid');
	    	$this->db->join('users','users.userid=reservation.userid');
	    	$this->db->where('rid',$rid);
	    	$result= $this->db->get('reservation');
	    	return $result->result_array();
		}

	    public function getreservationforhandover($date){
	    	$this->db->join('cars','cars.carid=reservation.carid');
	    	$this->db->join('brands','brands.brandid=cars.brandid');
	    	$this->db->join('users','users.userid=reservation.userid');
	    	$this->db->where('payment',1);
	    	$this->db->where('carkey',0);
	    	$this->db->where('date_to >=',$date);

	    	$result= $this->db->get('reservation');

	    	return $result->result_array();
		}
		public function getreservationforreceive($date){
	    	$this->db->join('cars','cars.carid=reservation.carid');
	    	$this->db->join('brands','brands.brandid=cars.brandid');
	    	$this->db->join('users','users.userid=reservation.userid');
	    	$this->db->where('payment',1);
	    	$this->db->where('carkey',1);
	    	$this->db->where('date_to <=',$date);

	    	$result= $this->db->get('reservation');

	    	return $result->result_array();


		}

	    public function getmyreservations($userid){
	    	$this->db->join('cars','cars.carid=reservation.carid');
	    	$this->db->join('brands','brands.brandid=cars.brandid');
	    	$this->db->where('userid',$userid);
	    	$this->db->where('payment',1);
	    	$this->db->where('carkey',0);

	    	$result= $this->db->get('reservation');

	    	return $result->result_array();

	    }

	    public function usingcars($userid){
	    	$this->db->join('cars','cars.carid=reservation.carid');
	    	$this->db->join('brands','brands.brandid=cars.brandid');
	    	$this->db->where('userid',$userid);
	    	$this->db->where('payment',1);
	    	$this->db->where('carkey',1);

	    	$result= $this->db->get('reservation');

	    	return $result->result_array();

	    }

	    public function usedcars($userid){
	    	$this->db->group_by('cars.carid');
	    	$this->db->join('cars','cars.carid=reservation.carid');
	    	$this->db->join('brands','brands.brandid=cars.brandid');
	    	$this->db->where('userid',$userid);
	    	$this->db->where('payment',1);
	    	$this->db->where('carkey',2);


	    	$result= $this->db->get('reservation');

	    	return $result->result_array();

	    }

	    public function handover($id){
	    	$this->db->where('rid', $id);  
			$this->db->update('reservation', array('carkey'=>1));
	    }
	    public function receive($id){
	    	$this->db->where('rid', $id);  
			$this->db->update('reservation', array('carkey'=>2));
	    }

	    public function checkforreservation($date,$carid){
	    	$query=$this->db->get_where('reservation',array('date_to>'=>$date,'carid'=>$carid));
	    	if (empty($query->row_array())) {
	    		return true;
	    	}else {
	    		return false;
	    	}
	    }

	    public function delete($id)
	    {
	        $this->db->where('carid',$id);
	        $this->db->delete('reservation');
	        return true;
	    }
	}

 ?>