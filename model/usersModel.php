<?php
require_once "ConDB.php";
class ModelUsers{

    static public function createUser($data){   
       
        $cantusu_mail=self::getusu_mail($data["usu_mail"]);
        $cantCedu=self::getUsuario($data["usu_usuario"]);
        if ($cantusu_mail==0){
            if ($cantCedu == 0){               
                $query= "INSERT INTO usuario (usu_id, usu_nombre, usu_apellido, usu_cedula, usu_mail, usu_usuario, usu_password, usu_identifier, usu_key, usu_estado) VALUES (NULL, :usu_nombre, :usu_apellido, :usu_cedula, :usu_mail, :usu_usuario, :usu_password, :usu_identifier, :usu_key, :usu_estado);";            
                $status="1";
                $statement  = Connection::conecction()->prepare($query);
                $statement->bindParam(":usu_nombre", $data["usu_nombre"],PDO::PARAM_STR);
                $statement->bindParam(":usu_apellido", $data["usu_apellido"],PDO::PARAM_STR);
                $statement->bindParam(":usu_cedula", $data["usu_cedula"],PDO::PARAM_STR);
                $statement->bindParam(":usu_mail",  $data["usu_mail"],PDO::PARAM_STR);
                $statement->bindParam(":usu_usuario", $data["usu_usuario"],PDO::PARAM_STR);
                $statement->bindParam(":usu_password", $data["usu_password"],PDO::PARAM_STR);
                $statement->bindParam(":usu_identifier", $data["usu_identifier"],PDO::PARAM_STR);
                $statement->bindParam(":usu_key", $data["usu_key"],PDO::PARAM_STR);   
                $statement->bindParam(":usu_estado", $status,PDO::PARAM_STR);   
                $mesage = $statement->execute() ? "ok" : Connection::conecction()->errorInfo();
                $statement->closeCursor();
                $statement= null;
                $query = "";

                
               
            }else{
                $mesage ="La Cedula ya fue ingresada";
            }    
        }else{
            $mesage ="Correo ya existe";
        }
        return $mesage; 
    }

    static private function getusu_mail($correo){
        $query="SELECT usu_mail FROM usuario WHERE usu_mail='$correo'";        
        $statement  = Connection::conecction()->prepare($query);
          $statement->execute();
          $result=$statement->rowCount();               
          return $result;
    }
    static private function getUsuario($usu_usuario){
        $query="SELECT usu_usuario FROM usuario WHERE usu_usuario='$usu_usuario'";        
        $statement  = Connection::conecction()->prepare($query);
          $statement->execute();
          $result=$statement->rowCount();               
          return $result;
    }

    // static public function getUsers($param){
    //     $param =  is_numeric($param) ? $param : 0;
    //     $query ="SELECT usu_usuario.usu_id, usu_usuario.usu_usu_usuario, usu_usuario.usu_usu_mail, usu_usuario.rol_id, usu_dateUpdate,
    //     rol.rol_id, rol.rol_descripcion
    //     FROM usu_usuario
    //     INNER JOIN rol ON usu_usuario.rol_id = rol.rol_id";
    //      $query .= ($param > 0) ? " WHERE usu_usuario.usu_id ='$param' AND " : "";
    //      $query .= ($param > 0) ? " usu_status ='1';" : " and usu_status ='1';";
    //      //echo $query;
    //       $statement  = Connection::conecction()->prepare($query);
    //        $statement->execute();
    //        $result=$statement->fetchAll(PDO::FETCH_ASSOC);         
    //        return $result;
    // }

    static public function login($data){
       //print_r($data);
        $user = $data['usu_usu_mail'];
        $pss = ($data['usu_contra']);
        //echo $pss;

        if(!empty($user) && !empty($pss)){
            $query="SELECT usu_usu_identifier, usu_key, usu_id  FROM usu_usuario WHERE usu_usu_mail='$user' and usu_contra='$pss'";
           // echo $query;
            $statement  = Connection::conecction()->prepare($query);
            $statement->execute();
            $result=$statement->fetchAll(PDO::FETCH_ASSOC); 
            return $result;
        }else{
            throw new Exception(LOGIN_FIELDS_MISSING);
        }

    }

    static public function getUsersAuth(){        
        $query="";
        $query= "SELECT usu_identifier, usu_key, usu_id FROM usuario WHERE usu_estado ='1';" ;
        $statement  = Connection::conecction()->prepare($query);
        $statement->execute();
        $result=$statement->fetchAll(PDO::FETCH_ASSOC);         
        return $result;
    }

}
?>