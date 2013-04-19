<?php
    class airplanemodel extends CI_Model{
        public function addAirplane($type, $seats, $airline){
            $this->db->insert('airplane', array('type'=>$type, 'seats'=>$seats, 'airline'=>$airline));
            
            $response = new stdClass();
            $response->id = $this->db->insert_id();
            $response->success = true;
            $response->type = $type;
            $response->seats = $seats;
            $response->airline = $airline;
            return $response;
        }
        
        public function removeAirplane($id){
            $this->db->where(array('id'=>$id))->update('airplane', array('deleted'=>1));
            
            $response = new stdClass();
            $response->success = true;
            return $response;
        }
    }
?>
