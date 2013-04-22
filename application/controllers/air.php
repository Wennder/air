<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Air extends CI_Controller{            //чтобы поставить контроллер по умолчанию в папке config В файле route в строке $route['default_controller'] = "default"; меняем дефаулт на air
    public function index(){
            $this->load->helper('url');
            $this->load->view('common/header');
            $this->load->view('mainView');
            $this->load->view('common/footer');
    }
    
    // ==============================Задание 1======================================
    
    public function pass_to_voyage(){
        $this->load->model('passtovoyagemodel');

        $myResult = $this->passtovoyagemodel->selectVoyage();
        
        $this->load->view('common/header');
        $this->load->view('voyageSelect', array('voyageSelect'=>$myResult));
        $this->load->view('common/footer');
        
    }
    
    public function qwerty(){
        $this->load->model('passtovoyagemodel');
        $this->load->library('input');
        $myIdVoyage = $this->input->get_post('myIdVoyage');
        $response = $this->passtovoyagemodel->getPass($myIdVoyage);
        
        echo json_encode($response);
    }
    // ------------------------------Авиакомпании-----------------------------------
    
    public function airlineView(){
        $this->load->database();                //при автоматическом подключении бд необходимость в этой строке отпадает
        $query = $this->db->query('SELECT * FROM airline WHERE deleted=0');
        $result = $query->result();
        
        $this->load->view('common/header');
        $this->load->view('airlineView', array('airlineView'=>$result));
        echo $this->db->last_query(); 
        $this->load->view('common/footer');
    }
    
    public function addAirline(){
        $query = $this->db->query("INSERT INTO airline (name) VALUES (".$this->db->escape($_REQUEST["name"]).")");
        
        $this->airlineView();
    }
    
    public function removeAirline($a){
        $query = $this->db->query("UPDATE airline SET deleted=1 WHERE id=$a");
        
        $this->airlineView();
    }
    
     // ------------------------------Самолеты-----------------------------------
    
    public function airplaneView(){
       // $data['airplane'] = $this->db->get('airplane');  альтернатива 'SELECT * FROM airplane'
       // $data['airplane'] = $this->db->get_where('airplane', array('deleted'=>'0'))->result(); // альтернатива 'SELECT * FROM airplane WHERE deleted=0'
        
        $data['airplane'] = $this->db->select('airplane.id, type, seats, name')->from('airplane')->join('airline','airplane.airline = airline.id')->where('airplane.deleted = 0')->order_by('id', 'asc')->get()->result();
        
        $data['airline'] = $this->db->select('*')->from('airline')->where('airline.deleted = 0')->get()->result();
        
        $this->load->view('common/header');
        $this->load->view('airplaneView', $data);
        
        $this->load->view('common/footer');
    }
    
    public function addAirplane(){
        $query = $this->db->query("INSERT INTO airplane (type, seats, airline) VALUES (".$this->db->escape($_REQUEST['type']).", ".$this->db->escape($_REQUEST['seats']).", ".$this->db->escape($_REQUEST['myIdAirplane']).")");
        
        $this->airplaneView();
    }
    
    public function removeAirplane($a){
        $query = $this->db->query("UPDATE airplane SET deleted=1 WHERE id=$a");
        
        $this->airplaneView();
    }
    
    public function addAirplaneAjax(){
        $seats = $_REQUEST['seats'];
        $type = $_REQUEST['type'];
        $airline = $_REQUEST['myIdAirplane'];
        $this->load->model('airplaneModel');
        $response = $this->airplaneModel->addAirplane($type, $seats, $airline);
        
        echo json_encode($response);
        
    }
    
    public function removeAirplaneAjax($id){
        $this->load->model('airplaneModel');
        echo json_encode($this->airplaneModel->removeAirplane($id));
    }
    
       // ------------------------------Рейсы-----------------------------------
    
    public function voyageView(){
        $query = $this->db->query('SELECT * FROM voyage WHERE deleted=0');
        $result = $query->result();
        
        $this->load->view('common/header');
        $this->load->view('voyageView', array('voyageView'=>$result));
        $this->load->view('common/footer');
    }
    
    }  
?>
