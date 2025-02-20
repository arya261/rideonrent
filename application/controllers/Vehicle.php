<?php
class Vehicle extends CI_controller {
     public function index()
     {
      $vehicles = $this->db->query("SELECT * FROM vehicle")->result();
      $data['vehicles'] = $vehicles;
      // echo '<pre>'; print_r($vehicles);exit();
        $this->load->view('vehicle/list',$data);
     }
     public function add(){
          $data['mode']  = 'add';
          $this->load->view("vehicle/form",$data);

     }
     public function edit($vehicle_id){
          $vehicles = $this->db->query("SELECT * FROM vehicle WHERE vehicle_id=".$vehicle_id)->result();
          // print_r($vehicles);
          $data["mode"] = "edit";
          $data['vehicles'] = $vehicles;
          $this->load->view("vehicle/form",$data);
     }
     public function delete($vehicle_id){
          $this->db->where('vehicle_id',$vehicle_id);
          $query = $this->db->get('vehicle');
          $result = $query->row();
          

     
     $this->db->where('vehicle_id',$vehicle_id);
     $this->db->delete('vehicle');
     redirect('vehicle');
     }

     public function process(){
     $this->load->library('Custom_Upload');
     $this->custom_upload->do_upload('veh_image', './uploads/');
      $data=$_POST;
      $vehicle_id= $data['vehicle_id'];
      if($vehicle_id==''){
      $this->db->insert("vehicle",$data);
      }
      else{
          $this->db->update("vehicle",$data,array('vehicle_id'=>$vehicle_id));
      }
      redirect('vehicle');
      
     }
}