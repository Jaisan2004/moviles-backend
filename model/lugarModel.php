<?php
require_once "ConDB.php";
class ModelLugar{

    static public function createLugar($data){   
        $cantPlaca = self::verifLugar($data["lug_nombre"], 0);
        if($cantPlaca==0){
            $query = "INSERT INTO lugares values('',:lug_nombre,:lug_capacidad,:tip_id, :est_id)";
            $statement  = Connection::conecction()->prepare($query);
            $statement->bindParam(":lug_nombre", $data["lug_nombre"],PDO::PARAM_STR);
            $statement->bindParam(":lug_capacidad", $data["lug_capacidad"],PDO::PARAM_STR);
            $statement->bindParam(":tip_id", $data["tip_id"],PDO::PARAM_STR);
            $statement->bindParam(":est_id", $data["est_id"],PDO::PARAM_STR);
            $mesage = $statement->execute() ? "todo ok, se creo el lugar" : Connection::conecction()->errorInfo();
            $statement->closeCursor();
        }else{
            $mesage = "Ya se ha registrado un lugar con ese nombre";
        }  
        return $mesage;
    }

    static public function updateLugar($data){   
        $cantPlaca = self::verifLugar($data["lug_nombre"], $data["id_lugar"]);
        if($cantPlaca==0){
                $query = "UPDATE lugares set lug_nombre= :lug_nombre, lug_capacidad= :lug_capacidad, tip_id= :tip_id,est_id=:est_id WHERE id_lugar= :id_lugar;";
                $statement  = Connection::conecction()->prepare($query);
                $statement->bindParam(":lug_nombre", $data["lug_nombre"],PDO::PARAM_STR);
                $statement->bindParam(":lug_capacidad", $data["lug_capacidad"],PDO::PARAM_STR);
                $statement->bindParam(":tip_id", $data["tip_id"],PDO::PARAM_STR);
                $statement->bindParam(":est_id", $data["est_id"],PDO::PARAM_STR);
                $statement->bindParam(":id_lugar", $data["id_lugar"],PDO::PARAM_STR);
                $mesage = $statement->execute() ? "todo ok, se modifico el vehiculo" : Connection::conecction()->errorInfo();
                $statement->closeCursor();
        }else{
            $mesage = "Ya se ha registrado un lugar con ese nombre";
        }  
        return $mesage;
    }

    static public function deleteLugar($data){   

        $query = "DELETE FROM lugares WHERE id_lugar= :id_lugar;";
        $statement  = Connection::conecction()->prepare($query);
        $statement->bindParam(":id_lugar",  $data["id_lugar"],PDO::PARAM_STR);
        $mesage = $statement->execute() ? "se elimino lugar" : Connection::conecction()->errorInfo();
        $statement->closeCursor();

        return $mesage;
    }


    static public function getLugar(){
        $query = "SELECT * FROM lugares";
        $statement  = Connection::conecction()->prepare($query);
        $statement->execute();
        $result=$statement->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    } 
    static public function verifLugar($nombre, $id){
        $query ="SELECT lug_nombre
        FROM lugares
        WHERE lug_nombre = '$nombre'";
        $query .= ($id > 0) ? " AND id_lugar <>'$id';" : ";";
          $statement  = Connection::conecction()->prepare($query);
          $statement->execute();
          $result=$statement->rowCount();
          return $result;
        
    } 
     
        
}
?>