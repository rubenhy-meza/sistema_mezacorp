<?php
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
    if (isset($_GET['from_date']) && isset($_GET['to_date'])) {    
       $from_date = $_GET['from_date'];
       $to_date = $_GET['to_date'];  
      $sql = $conexion->prepare("SELECT 
      movcaj.id, fecha,tabban.DES,movimiento_caja.nom_mov,movcaj.detalle,tabmon.DESABR, movcaj.monto
             FROM movcaj
            
             INNER JOIN tabmon ON movcaj.id_mon=tabmon.COD
              INNER JOIN tabban ON movcaj.id_ban = tabban.COD
             INNER JOIN movimiento_caja ON movcaj.id_mov=movimiento_caja.id_mov WHERE fecha BETWEEN '$from_date' AND '$to_date' ORDER BY id ");
      $sql -> execute(); 
      $results = $sql -> fetchAll(PDO::FETCH_OBJ); 
      if($sql -> rowCount() > 0)   { 
        foreach($results as $result) { 
        echo "<tr>
        <td>".$result -> id."</td>
        <td>".$result -> detalle."</td>
        <td>".$result -> DES."</td>
        <td>".$result -> fecha."</td>
        <td>".$result -> DESABR."</td>
        <td>".$result -> monto."</td>
        </tr>";
        
           }
         }
      exit();
    }
    else{      
      $sql = $conexion->prepare("SELECT 
      movcaj.id, fecha,tabban.DES,movimiento_caja.nom_mov,movcaj.detalle,CONCAT(tabmon.DESABR ,' ',movcaj.monto)
             FROM movcaj
             /*INNER JOIN sucursales ON movcaj.id_suc=sucursales.id_suc*/
             INNER JOIN tabmon ON movcaj.id_mon=tabmon.COD
              INNER JOIN tabban ON movcaj.id_ban = tabban.COD
             INNER JOIN movimiento_caja ON movcaj.id_mov=movimiento_caja.id_mov ORDER BY id DESC LIMIT 1000");
      $sql->execute();
      $sql->setFetchMode(PDO::FETCH_ASSOC);
      header("HTTP/1.1 200 OK");
      $datos= $sql->fetchAll();
     // echo json_encode($datos);

      $li = Array();
      for($i = 0 ; $i<count($datos); $i++){
         
          if($datos[$i]["nom_mov"] =="Ingreso"){
              
              $li[] = array(

                  "0"=>$datos[$i]['id'],
                  "1"=>$datos[$i]['detalle'],
                  "2"=>$datos[$i]['DES'],
                  "3"=>$datos[$i]['fecha'],
                  "4"=>'<div class="data_m"><strong><span class="data_movI">+ </span>'.$datos[$i]["CONCAT(tabmon.DESABR ,' ',movcaj.monto)"].'</strong></div> ',
                  "5"=> '<a disabled data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-success btn-circle btn-sm"
                       onclick = "get_movimiento('.$datos[$i]['id'].');"> <i class="fas fa-edit"></i></a>
                       <a  class=" btn btn-danger btn-circle btn-sm" onclick="eliminarMov('.$datos[$i]['id'].');"> 
                      <i class="fas fa-trash"></i></a>'
              );
              
          } else {
              $li[] = array(
                  "0"=>$datos[$i]['id'],
                  "1"=>$datos[$i]['detalle'],
                  "2"=>$datos[$i]['DES'],
                  "3"=>$datos[$i]['fecha'],
                  "4"=>'<div class="data_m"><strong><span class="data_movS">- </span>'.$datos[$i]["CONCAT(tabmon.DESABR ,' ',movcaj.monto)"].'</strong></div> ',
                  "5"=> '<a data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-success btn-circle btn-sm"
                      onclick = "get_movimiento('.$datos[$i]['id'].');"> <i class="fas fa-edit"></i></a>
                      <a  class=" btn btn-danger btn-circle btn-sm" onclick="eliminarMov('.$datos[$i]['id'].');"> 
                      <i class="fas fa-trash"></i></a>'
              );
          }
     
      } 
      $resultados = array(
       "sEcho" => 1,
       "iTotalRecords" => count($li),
       "iTotalDisplayRecords" => count($li),
       "aaData"=> $li
      );
      //var_dump($datos);
     //echo ($resultados);
     echo json_encode($resultados);
      exit();
    }
}
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $input = $_POST;		
    $sql = "INSERT INTO articulos (descripcion, precio, stock) VALUES (:descripcion, :precio, :stock)";		  
    $resultado = $conexion->prepare($sql);
    bindAllValues($resultado, $input);
    $resultado->execute();
    $id = $conexion->lastInsertId();
    if($id){
      $input['id'] = $id;
      header("HTTP/1.1 200 OK");
      echo json_encode($input);
      exit();
    }
}
if ($_SERVER['REQUEST_METHOD'] == 'PUT'){
    $input = $_GET;	
    $id = $input['id'];
    $campos = getParams($input);
    $sql = "UPDATE articulos SET $campos WHERE id='$id'";
    $resultado = $conexion->prepare($sql);
    bindAllValues($resultado, $input);
    $resultado->execute();
    header("HTTP/1.1 200 OK");
    exit();
}
if ($_SERVER['REQUEST_METHOD'] == 'DELETE'){
  $id = $_GET['id'];
  $resultado = $conexion->prepare("DELETE FROM articulos where id=:id");
  $resultado->bindValue(':id', $id);
  $resultado->execute();
  header("HTTP/1.1 200 OK");
  exit();
}
header("HTTP/1.1 400 Peticion HTTP inexistente");
?>