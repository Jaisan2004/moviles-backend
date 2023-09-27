<?php
require_once "ConDB.php";
class ModelUsers{

    static public function createUser($data){   
       
        $cantMail=self::getMail($data["usu_correo_electronico"]);
        $cantCedu=self::getCedula($data["usu_cedula"]);
        if ($cantMail==0){
            if ($cantCedu == 0){               
                $query= "INSERT INTO usuario (`usu_cedula`, `usu_nombre`, `usu_apellido`, `usu_edad`, `usu_fecha_nacimiento`, `usu_correo_electronico`, `usu_contraseña`, `usu_identifier`, `usu_key`, `usu_estatus`)
                 VALUES (:usu_cedula, :usu_nombre, :usu_apellido, :usu_edad, :usu_fecha_nacimiento, :usu_correo_electronico, :usu_contraseña, :usu_identifier, :usu_key, :usu_estatus);";            
                $status=1;
                $statement  = Connection::conecction()->prepare($query);
                $statement->bindParam(":usu_cedula", ($data["usu_cedula"]),PDO::PARAM_INT);
                $statement->bindParam(":usu_nombre", ($data["usu_nombre"]),PDO::PARAM_STR);
                $statement->bindParam(":usu_apellido",  ($data["usu_apellido"]),PDO::PARAM_STR);
                $statement->bindParam(":usu_edad", $data["usu_edad"],PDO::PARAM_INT);
                $statement->bindParam(":usu_fecha_nacimiento", $data["usu_fecha_nacimiento"],PDO::PARAM_STR);
                $statement->bindParam(":usu_correo_electronico", $data["usu_correo_electronico"],PDO::PARAM_STR);
                $statement->bindParam(":usu_contraseña", $data["usu_contraseña"],PDO::PARAM_STR);
                $statement->bindParam(":usu_identifier", $data["usu_identifier"],PDO::PARAM_STR);
                $statement->bindParam(":usu_key", $data["usu_key"],PDO::PARAM_STR);       
                $statement->bindParam(":usu_estatus", $status, PDO::PARAM_INT); 
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

    static private function getMail($correo){
        $query="SELECT usu_correo_electronico FROM usuario WHERE usu_correo_electronico='$correo'";        
        $statement  = Connection::conecction()->prepare($query);
          $statement->execute();
          $result=$statement->rowCount();               
          return $result;
    }
    static private function getCedula($cedula){
        $query="SELECT usu_cedula FROM usuario WHERE usu_cedula='$cedula'";        
        $statement  = Connection::conecction()->prepare($query);
          $statement->execute();
          $result=$statement->rowCount();               
          return $result;
    }

    // static public function getUsers($param){
    //     $param =  is_numeric($param) ? $param : 0;
    //     $query ="SELECT usuario.usu_id, usuario.usu_usuario, usuario.usu_mail, usuario.rol_id, usu_dateUpdate,
    //     rol.rol_id, rol.rol_descripcion
    //     FROM usuario
    //     INNER JOIN rol ON usuario.rol_id = rol.rol_id";
    //      $query .= ($param > 0) ? " WHERE usuario.usu_id ='$param' AND " : "";
    //      $query .= ($param > 0) ? " usu_status ='1';" : " and usu_status ='1';";
    //      //echo $query;
    //       $statement  = Connection::conecction()->prepare($query);
    //        $statement->execute();
    //        $result=$statement->fetchAll(PDO::FETCH_ASSOC);         
    //        return $result;
    // }

    // static public function login($data){
    //    //print_r($data);
    //     $user = $data['usu_mail'];
    //     $pss = ($data['usu_contra']);
    //     //echo $pss;

    //     if(!empty($user) && !empty($pss)){
    //         $query="SELECT usu_identifier, usu_key, usu_id  FROM usuario WHERE usu_mail='$user' and usu_contra='$pss'";
    //        // echo $query;
    //         $statement  = Connection::conecction()->prepare($query);
    //         $statement->execute();
    //         $result=$statement->fetchAll(PDO::FETCH_ASSOC); 
    //         return $result;
    //     }else{
    //         throw new Exception(LOGIN_FIELDS_MISSING);
    //     }

    // }

    // static public function getUsersAuth(){        
    //     $query="";
    //     $query= "SELECT usu_identifier, usu_key, usu_id FROM usuario WHERE usu_status ='1';" ;
    //     $statement  = Connection::conecction()->prepare($query);
    //     $statement->execute();
    //     $result=$statement->fetchAll(PDO::FETCH_ASSOC);         
    //     return $result;
    // }

}
?>