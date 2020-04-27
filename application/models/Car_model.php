<?php 
	class Car_model extends CI_Model
	{
	    public function __construct()
	    {
	        $this->load->database();
	    }

	    public function get_cars($id=null){ 
	    	if ($id==null) {
	    		$this->db->join('brands','brands.brandid=cars.brandid');
	   	    	$query =$this->db->get('cars');
	    		return $query->result_array();
	    	}
	    	$this->db->join('brands','brands.brandid=cars.brandid');
	    	$query =$this->db->get_where('cars',array('carid'=>$id));
	    	return $query->row_array();
	    }

	    public function activate($id){
	    	$this->db->where('carid', $id);  
			$this->db->update('cars', array('activity'=>0));
	    }
	    public function deactivate($id){
	    	$this->db->where('carid', $id);  
			$this->db->update('cars', array('activity'=>1));
	    }

		    public function delete($id)
	    {
	        $this->db->where('carid',$id);
	        $this->db->delete('cars');
	        return true;
	    }

	    public function addCar($post_image){
	    	$data=array(
	    			'brandid'=>$this->input->post('brandid'),
	    			'type'=>$this->input->post('car_type'),
	    			'build'=>$this->input->post('build'),
	    			'transmission'=>$this->input->post('transmission'),
	    			'fuel'=>$this->input->post('fuel'),
	    			'engine'=>$this->input->post('engine'),
	    			'max_speed'=>$this->input->post('max_speed'),
	    			'image'=>$post_image,
	    			'price_day'=>$this->input->post('price')
	    	);

	    	 return $this->db->insert('cars',$data);
	    }

	    public function get_brands(){
	    	$this->db->order_by('name');
	    	$query=$this->db->get('brands');
	    	return $query->result_array();
	    }
}

 ?>