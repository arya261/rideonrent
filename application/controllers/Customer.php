<?php
 class Customer extends CI_Controller{
     public function index(){
        $customers=$this->db->query("SELECT * FROM customer C LEFT OUTER JOIN adress A ON A.adress_id=C.adress_id")->result();
        $data['customers']=$customers;
        // echo '<pre>';
        // print_r($customers);
        // exit();
        $this->load->view("customer/list",$data);
     }
     public function dashboard()
     {
        $this->load->library('session');
        $login_id = $this->session->userdata("login_id");
        $customer_details   = $this->db->query("SELECT C.customer_name,C.customer_id FROM customer C LEFT OUTER JOIN login L ON L.login_id = C.login_id WHERE L.login_id=".$login_id)->result();
        foreach($customer_details as $c){
            $customer_id = $c->customer_id;
        }
        $booking=$this->db->query("SELECT B.*,V.make,V.model,V.daily_charge FROM booking B LEFT OUTER JOIN vehicle V ON V.vehicle_id=B.vehicle_id WHERE B.customer_id=".$customer_id)->result();
        $data["booking"]=$booking;
        $data['customer_details']   = $customer_details;
        $vehicle  =$this->db->query("SELECT V.make,V.model,V.vehicle_id,V.license_plate FROM vehicle V")->result();
            foreach($vehicle as $v){
                $v->vehicle_name   = $v->make." " .$v->model." " .$v->license_plate;
            }
        $data["vehicle"] = $vehicle;
        foreach($booking as $b){
            $from_date =  date('Y-m-d', strtotime($b->from_date));
            $to_date =  date('Y-m-d', strtotime($b->to_date));
            $datetime1 = new DateTime($from_date);
            $datetime2 = new DateTime($to_date);
            $interval = $datetime1->diff($datetime2);
            $date_difference =  $interval->days; 
            // echo $date_difference; exit();
            $b->booking_amount = $date_difference * $b->daily_charge;
        }
        // echo '<pre>'; print_r($booking); exit();
		$this->load->view("customer/dashboard",$data);

     }
     public function vehicle_availability(){
        $result['message']      = 'AVAILABLE';
        $result['status']       = 1;
        $vehicle_id             = $this->input->post('vehicle_id');
        $veh_status = $this->db->query("SELECT status FROM vehicle WHERE vehicle_id=".$vehicle_id)->row()->status;
        if($veh_status != 'AVAILABLE'){
            $result['message']      = 'NOT AVAILABLE';
            $result['status']       = 1;
            echo json_encode ($result);
            exit();
        }
        echo json_encode ($result);
     }
     function next_vehicle($vehicle_id =0){
         $min_vehicle_id = $this->db->query("SELECT MIN(vehicle_id) AS max_veh_id FROM vehicle")->row()->max_veh_id;
         if($vehicle_id==""){
            $vehicle_id=$min_vehicle_id;
         }
         $vehicle_id = $vehicle_id+1;
         $max_vehicle_id = $this->db->query("SELECT MAX(vehicle_id) AS max_veh_id FROM vehicle")->row()->max_veh_id;
        if($vehicle_id == $max_vehicle_id){
            $vehicle_id = $min_vehicle_id;
        }
        $result     = $this->db->query("SELECT * FROM vehicle WHERE vehicle_id = ".$vehicle_id)->result();
        // print_r($result);
        echo json_encode($result);
     }
     function vehicle_booking(){
        $this->load->library('session');
        $result['message']      = 'Booked succesfully';
        $result['status']       = 1;
        $login_id = $this->session->userdata("login_id");
        $customer_id    = $this->db->query("SELECT C.customer_id FROM customer C WHERE C.login_id=".$login_id)->row()->customer_id;
        $from_date      = $this->input->post('book_from_date');
        $to_date        = $this->input->post('book_to_date');
        $vehicle_id     = $this->input->post('vehicle_book_id');
        $booking_array=[
            'customer_id'   =>$customer_id,
            'vehicle_id'    =>$vehicle_id,
            'from_date'     =>$from_date,
            'to_date'       =>$to_date,
            'status'        => '0'

        ];
        // echo '<pre>'; print_r($booking_array);
        $this->db->insert('booking',$booking_array);
        echo json_encode ($result);
     }
 }