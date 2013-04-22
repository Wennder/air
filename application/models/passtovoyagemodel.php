<?php 
    class passtovoyagemodel extends CI_Model{
        public function selectVoyage(){
            return $this->db->get_where('voyage', array('deleted'=>0))->result();
        }
        
        public function getPass($myIdVoyage){
            return $this->db->select('*')->from('passenger')->join('pass_to_voyage', 'pass_to_voyage.passenger = passenger.id')->where('voyage ='.$myIdVoyage)->get()->result();
        }
    }
?>
