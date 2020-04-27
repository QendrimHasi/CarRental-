<?php 

	class User_model extends CI_Model
	{

	    public function register($enc_pass)
	    {
	        $data=array(
	        	'email' =>$this->input->post('email'),
	        	'username' =>$this->input->post('username'),
	        	'password' =>$enc_pass
	        );


	        return $this->db->insert('users',$data);


	    }
	     public function login($username,$password)
	    {
	       $this->db->where('username',$username);
	       $this->db->where('password',$password);

	       $result= $this->db->get('users');
	       if ($result->num_rows() == 1) {
	       		return $result->row(0)->userid;
	       }else{
	       	return false;
	       }


	    }

	    public function change_password($id,$password){
	    	$this->db->where('userid', $id);  
			$this->db->update('users', array('password'=>$password));
	    }



	    public function check_username_exists($username){
	    	$query= $this->db->get_where('users',array('username'=>$username));
	    	if (empty($query->row_array())) {
	    		return true;
	    	}else {
	    		return false;
	    	}
	    }
	    public function check_email_exists($email){
	    	$query= $this->db->get_where('users',array('email'=>$email));
	    	if (empty($query->row_array())) {
	    		return true;
	    	}else {
	    		return false;
	    	}
	    }

	    public function check_password($userid,$password){
	    	$query= $this->db->get_where('users',array('userid'=>$userid,'password'=>$password));
	    	if ($query->num_rows() == 1) {
	       		return true;
	       }else{
	       	return false;
	       }
	    }
	}
 ?>