<?php

class ControllerVehiculo{
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
                $vehiculo = ModelVehiculo::getVehiculos($this->_data);
                $json = array(
                    "response:"=>$vehiculo
                );
                echo json_encode($json,true);
                return;
            case 'POST':               
                $vehiculo = ModelVehiculo::createVehiculo($this->_data);
                $json = array(
                    "response:"=>$vehiculo
                );
                echo json_encode($json,true);
                return;
            case 'PUT':               
                $vehiculo = ModelVehiculo::updateVehiculo($this->_data);
                $json = array(
                    "response:"=>$vehiculo
                );
                echo json_encode($json,true);
                return;
            case 'DELETE':               
                $vehiculo = ModelVehiculo::deleteVehiculo($this->_data);
                $json = array(
                    "response:"=>$vehiculo
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