<?php

class ControllerReserva{
    private $_method;
    private $_complement;
    private $_data;
    private $ruta;
    
    function __construct($method,$complement,$data)
	{
        //print_r($complement);
        $this->_method = $method;
        $this->_complement = ($complement==null) || ($complement=='/') ? 0: $complement;
        $this->_data = $data !=0 ? $data : "";
        
    }
    public function index(){
        switch ($this->_method) {
            case 'GET':
                $reserva = ModelReserva::getReservas($this->_data);
                $json = array(
                    "response:"=>$reserva
                );
                echo json_encode($json,true);
                return;
            case 'POST':               
                $reserva = ModelReserva::createReserva($this->_data);
                $json = array(
                    "response:"=>$reserva
                );
                echo json_encode($json,true);
                return;
            case 'PUT':               
                $reserva = ModelReserva::updateReserva($this->_data);
                $json = array(
                    "response:"=>$reserva
                );
                echo json_encode($json,true);
                return;
            case 'DELETE':               
                $reserva = ModelReserva::deleteReserva($this->_data);
                $json = array(
                    "response:"=>$reserva
                );
                echo json_encode($json,true);
                return;
            default :
                $json = array(
                    "ruta:"=>"not found"
                );
                echo json_encode($json,true);
                return;
        }        
    }
    
}

?>