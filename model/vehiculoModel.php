<?php
require_once "ConDB.php";
class ModelVehiculo{

    static public function createVehiculo($data){   
        $cantPlaca = self::verifVehiculosPlaca($data["veh_placa"], 0);
        $cantUsuario = self::verifVehiculosUsuario($data["usu_id"], 0);
        if($cantPlaca==0){
            if($cantUsuario==0){
                $query = "INSERT INTO vehiculo values('',:veh_marca,:veh_color,:veh_modelo,:veh_placa,:veh_foto, :usu_id)";
                $statement  = Connection::conecction()->prepare($query);
                $statement->bindParam(":veh_marca", $data["veh_marca"],PDO::PARAM_STR);
                $statement->bindParam(":veh_color", $data["veh_color"],PDO::PARAM_STR);
                $statement->bindParam(":veh_modelo", $data["veh_modelo"],PDO::PARAM_STR);
                $statement->bindParam(":veh_placa", $data["veh_placa"],PDO::PARAM_STR);
                $statement->bindParam(":veh_foto",  $data["veh_foto"],PDO::PARAM_STR);
                $statement->bindParam(":usu_id", $data["usu_id"],PDO::PARAM_STR); 
                $mesage = $statement->execute() ? "todo ok, se creo el vehiculo" : Connection::conecction()->errorInfo();
                $statement->closeCursor();
            }else{
                $mesage = "Solo se puede crear un vehiculo por cuenta";
            }
        }else{
            $mesage = "Ya se ha registrado un vehiculo con esta placa";
        }  
        return $mesage;
    }

    static public function updateVehiculo($data){   
        $cantPlaca = self::verifVehiculosPlaca($data["veh_placa"], $data["veh_id"]);
        $cantUsuario = self::verifVehiculosUsuario($data["usu_id"], $data["veh_id"]);
        if($cantPlaca==0){
            if($cantUsuario==0){
                $query = "UPDATE vehiculo set veh_marca= :veh_marca, veh_color= :veh_color, veh_modelo= :veh_modelo,veh_placa=:veh_placa,veh_foto=:veh_foto WHERE veh_id= :veh_id;";
                $statement  = Connection::conecction()->prepare($query);
                $statement->bindParam(":veh_marca", $data["veh_marca"],PDO::PARAM_STR);
                $statement->bindParam(":veh_color", $data["veh_color"],PDO::PARAM_STR);
                $statement->bindParam(":veh_modelo", $data["veh_modelo"],PDO::PARAM_STR);
                $statement->bindParam(":veh_placa", $data["veh_placa"],PDO::PARAM_STR);
                $statement->bindParam(":veh_foto",  $data["veh_foto"],PDO::PARAM_STR);
                $statement->bindParam(":veh_id",  $data["veh_id"],PDO::PARAM_STR);
                $mesage = $statement->execute() ? "todo ok, se modifico el vehiculo" : Connection::conecction()->errorInfo();
                $statement->closeCursor();
            }
        }else{
            $mesage = "Ya se ha registrado un vehiculo con esta placa";
        }  
        return $mesage;
    }

    static public function deleteVehiculo($data){   

        $query = "DELETE FROM vehiculo WHERE veh_id= :veh_id;";
        $statement  = Connection::conecction()->prepare($query);
        $statement->bindParam(":veh_id",  $data["veh_id"],PDO::PARAM_STR);
        $mesage = $statement->execute() ? "se elimino el carro" : Connection::conecction()->errorInfo();
        $statement->closeCursor();

        return $mesage;
    }


    static public function getVehiculos($data){
        $query = "SELECT * FROM vehiculo WHERE veh_id= :veh_id;";
        $statement  = Connection::conecction()->prepare($query);
        $statement->bindParam(":veh_id",  $data["veh_id"],PDO::PARAM_STR);
        $statement->execute();
        $result=$statement->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    } 
    static public function verifVehiculosPlaca($placa, $id){
        $query ="SELECT veh_placa, usu_id        
        FROM vehiculo
        WHERE veh_placa = '$placa'";
        $query .= ($id > 0) ? " AND veh_id <>'$id';" : ";";
          $statement  = Connection::conecction()->prepare($query);
          $statement->execute();
          $result=$statement->rowCount();         
          return $result;
    } 
    static public function verifVehiculosUsuario($usu_id, $id){
        $query ="SELECT usu_id
        FROM vehiculo
        WHERE usu_id = '$usu_id'";
        $query .= ($id > 0) ? " AND veh_id <>'$id';" : ";";
          $statement  = Connection::conecction()->prepare($query);
          $statement->execute();
          $result=$statement->rowCount();
          return $result;
        
    } 
     
        
}
?>