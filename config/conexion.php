<?php
require_once "global.php";
session_start();
class conexion{
   
var $cnx;
function __construc(){}

function conectarDB(){
        
   // session_start();
        $this->cnx=mysqli_connect(SERVIDOR,USERNAME,PASS,DATABASE);
        $this->cnx->query("SET lc_time_names = 'es_ES'");
        
        if(!$this->cnx){
            echo "error al conectar database";
            $_SESSION['message']='conexion fallida a mysql!!!';
            $_SESSION['message_type']='danger';

            //header("location:/admin/404.html");
        }
       
}

function ejecutarQuery($query,$op)
{  
    $rpta = mysqli_query($this->cnx,$query);
    if($op == 0){
       // while($row = mysqli_fetch_array($rpta)){
         //   $datos[] = $row;
       // }
        while( $resultado = mysqli_fetch_assoc($rpta)){
            $datos[] = $resultado;
        }
    }
     else {
              $datos[] = "";
    }
   $registros = isset($datos) ? $datos:NULL;

   if($registros){
    return $registros;
   }
}
 function desconectarDB(){
   mysqli_close($this->cnx);
   
  }
}
?>