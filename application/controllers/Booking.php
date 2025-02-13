<?php


class booking extends CI_controller{

    public function index(){
        $booking=$this->db->query("SELECT B.*,S.customer_name,V.model,V.make FROM booking B LEFT OUTER JOIN customer S ON B.customer_id=S.customer_id LEFT OUTER JOIN vehicle V ON V.vehicle_id=B.vehicle_id")->result();
        // print_r($booking);
        $data["booking"]=$booking;




        $this->load->view("booking/list",$data);


    }

}