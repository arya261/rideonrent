<?php
class checkin extends ci_controller{
    public function index(){
        $checkout=$this->db->query("SELECT C.*,S.customer_name FROM checkout C LEFT OUTER JOIN customer S ON C.customer_id=S.customer_id" )->result();
        // print_r($checkout);exit();
        $data['checkout']=$checkout;
        $this->load->view("checkin/list", $data);


    }
    public function add(){
        $data["mode"]= "add";
        $this->load->view("checkin/form",$data);
    }
}
