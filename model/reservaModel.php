<?php
require_once "ConDB.php";
class ModelReserva{

    static public function createReserva($data){   
        $cantReser = self::verifReserva($data["lug_id"], 0);
        if($cantReser==0){
            $query = "INSERT INTO reserva values('',:usu_id,:lug_id)";
            $statement  = Connection::conecction()->prepare($query);
            $statement->bindParam(":usu_id", $data["usu_id"],PDO::PARAM_STR);
            $statement->bindParam(":lug_id", $data["lug_id"],PDO::PARAM_STR);
            $mesage = $statement->execute() ? "todo ok, se creo la reserve" : Connection::conecction()->errorInfo();
            $statement->closeCursor();
        }else{
            $mesage = "Ya se ha reservado el lugar";
        }  
        return $mesage;
    }

    static public function updateReserva($data){   
        $cantReser = self::verifReserva($data["lug_id"], $data["resev_id"]);
        if($cantReser==0){
                $query = "UPDATE reserva set lug_id= :lug_id WHERE resev_id= :resev_id;";
                $statement  = Connection::conecction()->prepare($query);
                $statement->bindParam(":lug_id", $data["lug_id"],PDO::PARAM_STR);
                $statement->bindParam(":resev_id", $data["resev_id"],PDO::PARAM_STR);
                $mesage = $statement->execute() ? "todo ok, ya se actualizo la reserva" : Connection::conecction()->errorInfo();
                $statement->closeCursor();
        }else{
            $mesage = "Ya se ha reservado el lugar";
        }  
        return $mesage;
    }

    static public function deleteReserva($data){   

        $query = "DELETE FROM reserva WHERE resev_id= :resev_id;";
        $statement  = Connection::conecction()->prepare($query);
        $statement->bindParam(":resev_id",  $data["resev_id"],PDO::PARAM_STR);
        $mesage = $statement->execute() ? "se elimino la reserva" : Connection::conecction()->errorInfo();
        $statement->closeCursor();

        return $mesage;
    }


    static public function getReservas($data){
        $query = "SELECT re.resev_id,usu.usu_nombre, lu.lug_nombre FROM reserva as re INNER JOIN usuario as usu on usu.usu_id =re.usu_id INNER join lugares as lu on lu.id_lugar = re.resev_id WHERE usu.usu_id= :usu_id";
        $statement  = Connection::conecction()->prepare($query);
        $statement->bindParam(":usu_id", $data["usu_id"],PDO::PARAM_STR);
        $statement->execute();
        $result=$statement->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    } 
    static public function verifReserva($id_lugar, $id){
        $query ="SELECT re.resev_id, lu.lug_nombre, lu.est_id
        FROM reserva as re INNER JOIN lugares as lu on re.lug_id = lu.id_lugar
        WHERE lu.est_id <> '1' and lu.id_lugar= '$id_lugar'";
        $query .= ($id > 0) ? " AND re.resev_id <>'$id';" : ";";
          $statement  = Connection::conecction()->prepare($query);
          $statement->execute();
          $result=$statement->rowCount();
          return $result;
        
    } 
     
        
}
?>