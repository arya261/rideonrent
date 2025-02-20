<?php


class booking extends CI_controller{

    public function index(){
        $booking=$this->db->query("SELECT B.*,S.customer_name,V.model,V.make FROM booking B LEFT OUTER JOIN customer S ON B.customer_id=S.customer_id LEFT OUTER JOIN vehicle V ON V.vehicle_id=B.vehicle_id")->result();
        // print_r($booking);
        $data["booking"]=$booking;




        $this->load->view("booking/list",$data);


    }
    public function update_status($booking_id,$status){
        $booking_array= [
            "status"=>$status  
        ];
        
        $vehicle_id=$this->db->query("SELECT V.vehicle_id FROM vehicle V LEFT OUTER JOIN booking B ON B.vehicle_id=V.vehicle_id")->row()->vehicle_id;
        $vehicle_array=[
            'status'=>"BOOKED"
        ];
        $this->db->update("booking",$booking_array,array('booking_id'=>$booking_id));
        $this->db->update("vehicle",$vehicle_array,array('vehicle_id'=>$vehicle_id));
        $result['status'] =1;
        $result['message']='updated successfully';
        echo json_encode($result);
        
    }

}
?>