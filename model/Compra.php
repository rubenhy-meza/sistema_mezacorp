<?php
require "../config/conexion.php";
class Compra{
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
   //funciones crud compra
   function obtenerCompra($id)
   { $query = " SELECT fac_compra.id,fac_compra.id_clipro,fac_compra.id_situ,fac_compra.num_doc, clipro.NRODOC,clipro.RAZSOC, fac_compra.fecha,fac_compra.plazo, fac_compra.fecha_pago,CONCAT (tabmon.DESABR,' ',fac_compra.total),CONCAT (tabmon.DESABR,' ',fac_compra.saldo),CONCAT (tabmon.DESABR,' ',fac_compra.saldopen),sucursales.nom_suc
     ,fac_compra.id_mon ,fac_compra.saldopen , fac_compra.obs,fac_compra.id_suc,fac_compra.id_doc,fac_compra.total  FROM fac_compra
    INNER JOIN clipro ON fac_compra.id_clipro=clipro.CODIGO 
     
    
    INNER JOIN tabmon ON fac_compra.id_mon=tabmon.COD
    INNER JOIN sucursales ON fac_compra.id_suc = sucursales.id_suc
     WHERE id='$id' OR num_doc='$id'";
    $data = $this->ejecutar($query,0);
    return $data;
  }
  function busquedaCli_pro($ruc)
  {
   $query = "SELECT * FROM clipro WHERE NRODOC='$ruc'";
   $data = $this->ejecutar($query,0);
   return $data;
 }
 function busquedaMov($id)
  {
   $query = "SELECT * FROM movcaj WHERE id='$id'";
   $data = $this->ejecutar($query,0);
   return $data;
 }
  function eliminarCompraId($id)
  {
   $query = "DELETE  FROM fac_compra WHERE id = '$id'";
   $data = $this->ejecutar($query,0);
   
 }

     function listar_compra()
     {
        $sentencia = "SELECT fac_compra.id_doc,fac_compra.id,fac_compra.obs,fac_compra.num_doc, clipro.RAZSOC, fac_compra.fecha, fac_compra.fecha_pago,CONCAT (tabmon.DESABR,' ',fac_compra.total),CONCAT (tabmon.DESABR,' ',fac_compra.saldopen) ,situacion.nombre_situ,sucursales.nom_suc
        FROM fac_compra
        INNER JOIN clipro ON fac_compra.id_clipro=clipro.CODIGO 
        INNER JOIN situacion ON fac_compra.id_situ=situacion.id_situ
        INNER JOIN tabmon ON fac_compra.id_mon=tabmon.COD
        INNER JOIN sucursales ON fac_compra.id_suc = sucursales.id_suc 
        ORDER BY fac_compra.fecha DESC ";
        $data = $this->ejecutar($sentencia,0);
        return $data;
     }
  
    function insertCompra($id_clipro,$num_doc,$fecha,$fecha_pago,$total,$id_situ,$obs,$id_suc,$id_mon, $plazo,$id_doc ,$saldo_pen)
      {
        $sentencia = "INSERT fac_compra(id_clipro,num_doc,fecha,fecha_pago,total,id_situ,obs,id_suc,id_mon,plazo,id_doc,saldopen) VALUES('$id_clipro','$num_doc','$fecha','$fecha_pago','$total','$id_situ','$obs','$id_suc','$id_mon', '$plazo','$id_doc','$saldo_pen')";
         $this->ejecutar($sentencia,1);
      }


      function updateCompra($id,$id_clipro,$num_doc,$fecha,$fecha_pago,$total,$id_situ,$obs,$id_suc,$id_mon,$id_doc)
      {
        $sentencia = "UPDATE fac_compra SET id_clipro='$id_clipro', num_doc='$num_doc', fecha='$fecha', fecha_pago='$fecha_pago',
        total='$total', id_situ='$id_situ', obs='$obs', id_suc='$id_suc', id_mon='$id_mon', id_doc='$id_doc'
        WHERE id = $id";
         $this->ejecutar($sentencia,1);
      }
      // funciones crud movimientos
     function insertMov($detalle,$id_mov,$id_mon,$monto,$id_ban,$id_mot)
       {
          $sentencia = "INSERT movcaj(detalle,id_mon,id_mov,monto,id_ban,id_mot) VALUES('$detalle','$id_mon','$id_mov','$monto','$id_ban','$id_mot')";
           $this->ejecutar($sentencia,1);
       }
       //funcnionado en archivo chart_gastos.php obsoleto por limit 169
     function listar_mov(){
        $sentencia = "SELECT 
        movcaj.id, fecha,tabban.DES,movimiento_caja.nom_mov,movcaj.detalle,CONCAT(tabmon.DESABR ,' ',movcaj.monto)
               FROM movcaj
               /*INNER JOIN sucursales ON movcaj.id_suc=sucursales.id_suc*/
               INNER JOIN tabmon ON movcaj.id_mon=tabmon.COD
                INNER JOIN tabban ON movcaj.id_ban = tabban.COD
               INNER JOIN movimiento_caja ON movcaj.id_mov=movimiento_caja.id_mov ORDER BY id DESC LIMIT 1000";
        $data = $this->ejecutar($sentencia,0);
        return $data;
     }
     //buscar movimientos por fechas

     function searchMov($from_date,$to_date){

          $sentencia = "SELECT 
          movcaj.id, fecha,tabban.DES,movimiento_caja.nom_mov,movcaj.detalle,CONCAT(tabmon.DESABR ,' ',movcaj.monto)
             FROM movcaj
             INNER JOIN tabmon ON movcaj.id_mon=tabmon.COD
              INNER JOIN tabban ON movcaj.id_ban = tabban.COD
             INNER JOIN movimiento_caja ON movcaj.id_mov=movimiento_caja.id_mov 
             WHERE fecha BETWEEN '$from_date' AND '$to_date' 
             ORDER BY id DESC  ; ";
          $data = $this->ejecutar($sentencia,0);

        return $data;

     }

     function eliminarMovId($id)
    {
      $query = "DELETE  FROM movcaj WHERE id = '$id'";
      $data = $this->ejecutar($query,0); 
    }
    function update_movimiento($id,$fecha,$detalle,$id_mon,$id_mov,$monto,$id_ban,$id_mot)
    {
      $sentencia = "UPDATE movcaj SET fecha='$fecha', detalle='$detalle', id_mon='$id_mon',
      id_mov='$id_mov', monto='$monto', id_ban='$id_ban', id_mot='$id_mot'
      WHERE id = $id";
       $this->ejecutar($sentencia,1);
    }
   
    // funciones adduser
    
       //insertando reguistro pago
       function insertPago($numdoc,$referencia,$id_mon,$importe,$id_met,$id_ban)
       {
          $sentencia = " CALL SP_INSERTAR_PAGO('$numdoc','$importe','$id_met','$id_mon','$referencia','$id_ban')";
           $this->ejecutar($sentencia,1);
       }
       function estado_cuenta($id_suc)
       {
          $sentencia = "SELECT SUM(total)AS totaldeuda FROM `fac_compra` WHERE id_suc='$id_suc' AND id_situ<3";
          $data = $this->ejecutar($query,1); 
       }
      ///saldo cuentas por pagar
      function saldoporPagar()
       {
          $sentencia = "SELECT SUM(saldopen) AS saldopen FROM fac_compra WHERE id_suc = 1  AND id_situ = 1 AND id_mon = 2 
          UNION  SELECT SUM(saldopen) AS saldopen FROM fac_compra WHERE id_suc = 1   AND id_mon = 1
         UNION  SELECT SUM(saldopen)  AS saldopen FROM fac_compra WHERE id_suc = 2  AND id_situ = 1 AND id_mon = 2
         UNION  SELECT SUM(saldopen) AS saldopen FROM fac_compra WHERE id_suc = 2  AND id_mon = 1 " ;
         
        $data = $this->ejecutar($sentencia,0); 
        return $data;
       }
       


}
?>