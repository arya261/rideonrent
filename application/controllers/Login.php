<?php


class Login extends CI_Controller {

	public function index()
	{
		$this->load->view("login");
	}
	public function process(){
		$this->load->library('session');
		$data = $_POST;
		$password = $data['password'];
		$email=$data['email'];
	
		 $result =$this->db->query("SELECT * FROM login WHERE email= '$email'")->result();
		 $obj = '';
		 if(!empty ($result) )
		 {
			foreach ($result as $row)
			{
				$obj = $row;
			}
		 }
		 $db_password = $obj->password;
		 $type = $obj->type;
		 $login_email = $obj->email;
		 $login_id = $obj->login_id;
		 
		 
		if ($password == $db_password) {
			$session_array =[
				'login_id'		=>$login_id,
				'login_email'	=>$login_email
			];
			// print_r($session_array);exit();
			$this->session->set_userdata($session_array);
			if($type =='CUSTOMER'){
				redirect('customer/dashboard',$data);
			}else if($type == 'admin'){
				$this->load->view("dashboard",$data);
			}
			else{
				redirect("employee",$data);
			}
		} else {
   		 echo "login failed";
		}
	}
}

