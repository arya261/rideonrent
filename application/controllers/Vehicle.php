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
     }

     public function process(){
      $data=$_POST;
      print_r($data);
      exit();
      $this->db->insert("checkout",$data);
     }
}