
<?php


require "../config/conexion.php";
class ChartReport{
    private $cnx;
    function __construct(){
      $this->cnx = new conexion();

    }
     function ejecutar($sentencia,$op)
     {
        $this->cnx->conectarDB();
        if($op == 0){
              $data = $this->cnx->ejecutarQuery($sentencia,$op);
              return $data;
              $this->cnx->desconectarDB();
        }
       else{
        $this->cnx->ejecutarQuery($sentencia,$op);
        $this->cnx->desconectarDB();
      }
     }
   
  
  function datosChart($id_mon,$id_mot)
  {
   $query = " SELECT MONTHNAME(m.fecha) AS Mes,
   SUM(m.monto) AS Total
      FROM movcaj m
      WHERE YEAR(m.fecha) =  YEAR(NOW())  AND id_mot='$id_mot' AND id_mon='$id_mon'
       GROUP BY Mes
     ORDER BY m.fecha ASC;";
   $data = $this->ejecutar($query,0);
   return $data;
   
 }
  
 function datosDonaMes($mes)
 {
  $query = " SELECT 
  SUM(monto) AS Total
     FROM movcaj 
     WHERE MONTH(fecha)='$mes' AND YEAR(fecha)= YEAR(NOW())  AND id_mot=1  AND detalle LIKE '%deposito%'
  UNION   SELECT 
  SUM(monto) AS Total
     FROM movcaj 
     WHERE MONTH(fecha)='$mes' AND YEAR(fecha)= YEAR(NOW())  AND id_mot=1  AND detalle LIKE '%TARJETA%'
     UNION   SELECT 
  SUM(monto) AS Total
     FROM movcaj 
     WHERE MONTH(fecha)='$mes' AND YEAR(fecha)= YEAR(NOW())  AND id_mot=1  AND detalle LIKE '%YAPE%'
     UNION   SELECT 
  SUM(monto) AS Total
     FROM movcaj 
     WHERE MONTH(fecha)='$mes' AND YEAR(fecha)= YEAR(NOW())  AND id_mot=1  AND detalle LIKE '%EFECTIVO%';";
  $data = $this->ejecutar($query,0);
  return $data;
  
}
function datosDona()
 {
  $query = "SELECT 
  SUM(monto) AS Total
     FROM movcaj 
     WHERE MONTH(fecha)=MONTH(NOW())   AND id_mot=1  AND detalle LIKE '%deposito%'
  UNION   SELECT 
  SUM(monto) AS Total
     FROM movcaj 
     WHERE MONTH(fecha)=MONTH(NOW())    AND id_mot=1  AND detalle LIKE '%TARJETA%'
     UNION   SELECT 
  SUM(monto) AS Total
     FROM movcaj 
     WHERE MONTH(fecha)=MONTH(NOW())   AND id_mot=1  AND detalle LIKE '%YAPE%'
     UNION   SELECT 
  SUM(monto) AS Total
     FROM movcaj 
     WHERE MONTH(fecha)=MONTH(NOW())   AND id_mot=1  AND detalle LIKE '%EFECTIV%';";
  $data = $this->ejecutar($query,0);
  return $data;
  
}


}
/*
include "db/parametros.php";
function permisos() {  
  if (isset($_SERVER['HTTP_ORIGIN'])) {
      header("Access-Control-Allow-Origin: *");
      header("Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS");
      header("Access-Control-Allow-Headers: Origin, Authorization, X-Requested-With, Content-Type, Accept");
      header('Access-Control-Allow-Credentials: true');      
    }  
  if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS'){
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))          
        header("Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS");
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        header("Access-Control-Allow-Headers: Origin, Authorization, X-Requested-With, Content-Type, Accept");
    exit(0);
  }
}
permisos();
$conexion =  Conectar($db);
if ($_SERVER['REQUEST_METHOD'] == 'GET'){
  if (isset($_GET['id'])) {      
    $sql = $conexion->prepare("SELECT * FROM mo where id=:id");
    $sql->bindValue(':id', $_GET['id']);
    $sql->execute();
    header("HTTP/1.1 200 OK");
    echo json_encode($sql->fetch(PDO::FETCH_ASSOC));
    exit();
  }
  else{      
    $sql = $conexion->prepare("  SELECT MONTHNAME(m.fecha) AS Mes,
    SUM(m.monto) AS Total
       FROM movcaj m
       WHERE YEAR(m.fecha) =  YEAR(NOW())  AND id_mot=1 AND id_mon=1
        GROUP BY Mes
      ORDER BY Mes ASC;");
    $sql->execute();
    $sql->setFetchMode(PDO::FETCH_ASSOC);
    header("HTTP/1.1 200 OK");
    echo json_encode( $sql->fetchAll());
    exit();
  }
}
*/
?>