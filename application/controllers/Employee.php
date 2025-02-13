<?php

class Employee extends CI_Controller {

    public function index()
    {
        
        $this->load->view("employee/employee_dashboard");
       
    }
    public function list() {
        $employees=$this->db->query("SELECT * FROM employee E LEFT OUTER JOIN login A ON A.login_id=E.login_id")->result();
        $data['employees']=$employees;
        $this->load->view("employee/emp_list",$data);
    }   
    function add(){
        $data["mode"]='add';
        $this->load->view("employee/emp_form",$data);
    }
    function edit($emp_id){
        $employees=$this->db->query("SELECT * FROM employee E LEFT OUTER JOIN adress A ON A.adress_id=E.adress_id LEFT OUTER JOIN login L ON L.login_id=E.login_id ")->result();
        // print_r($employees);
        $data["mode"]="edit";
        $data["employees"]=$employees;
        // echo '<pre>'; print_r($employees); exit();
        $this->load->view("employee/emp_form",$data);
    }


    
    public function process(){
        $data=$_POST;
        $mode=$data['mode']; 
        //insertion///////////////////////////////////////
        if($mode== 'add'){
        $login_array=[
            "email"=>$data['email'],
            "password"=>$data['password'],
            "type"=>'EMPLOYEE'
        ];
        $this->db->insert("login",$login_array);
        $login_id=$this->db->insert_id();
        $adress_array=[
            "country"=>$data['country'],
            "state"=>$data['state'],
            "district"=>$data['district'],
            "zip_code"=>$data['zip_code'],
            "adress_number"=>$data['adress_number'],
            "street"=>$data['street']
        ];
        $this->db->insert("adress",$adress_array);
        $adress_id=$this->db->insert_id();
        $employee_array=[
            "emp_name"=>$data['fullname'],
            "login_id"=>$login_id,
            "DOB"=>$data['DOB'],
            "gender"=>$data['gender'],
            "phone_number"=>$data['phone_number'],
            "adress_id"=>$adress_id,
            "salary"=>$data['salary'],
            "salary_type" =>$data['salary_type'],
            "department"=>$data['department']
            
        ];
        $this->db->insert("employee",$employee_array);
        $result=$this->db->insert_id();
        if($result){ 
            // $this->load->view("employee/emp_list");
            redirect("employee/list");
        }
        //updation////////////////////////////////////
    }else{
        $login_id       =$data['login_id'];
        $address_id     =$data['address_id'];
        $emp_id         =$data['emp_id'];
        $login_array=[
            "email"=>$data['email'],
            "password"=>$data['password'],
            "type"=>'EMPLOYEE'
        ];
        $this->db->update("login",$login_array,array("login_id"=>$login_id));
        $adress_array=[
            "country"=>$data['country'],
            "state"=>$data['state'],
            "district"=>$data['district'],
            "zip_code"=>$data['zip_code'],
            "adress_number"=>$data['adress_number'],
            "street"=>$data['street']
        ];
        $this->db->update("adress",$adress_array,array('adress_id'=>$address_id));
        $employee_array=[
            "emp_name"=>$data['fullname'],
            "DOB"=>$data['DOB'],
            "gender"=>$data['gender'],
            "phone_number"=>$data['phone_number'],
            "salary"=>$data['salary'],
            "salary_type" =>$data['salary_type'],
            "department"=>$data['department']
            
        ];
        $this->db->update("employee",$employee_array,array('emp_id'=>$emp_id));

    


        }
            redirect("employee/list");
    }
}
    
