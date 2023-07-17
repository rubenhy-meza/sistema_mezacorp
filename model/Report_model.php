<?php
require "../config/conexion.php";
class Report{
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

//funciones crud Repórt
function listar_bancos()
     {
        $sentencia = " SELECT tabban.COD, tabban.DES,NROCTA,tabmon.DESABR FROM tabban INNER JOIN tabmon ON tabban.TIPMON=tabmon.COD;" ;
        $data = $this->ejecutar($sentencia,0);
        return $data;
     }
     function listar_cargos()
     {
        $sentencia = "SELECT tabcar.DES FROM tabcar" ;
        $data = $this->ejecutar($sentencia,0);
        return $data;
        
     }

     function saldoDisponible()
     {
        $sentencia = "  SELECT ((SELECT SUM(monto) FROM movcaj WHERE id_ban=1 AND id_mov=1 AND id_mon=1) - (SELECT SUM(monto) FROM movcaj WHERE id_ban=1 AND id_mov=2 AND id_mon=1 )) AS saldodis -- bcp soles mezacorp
           UNION
       SELECT ((SELECT SUM(monto) FROM movcaj WHERE id_ban=5 AND id_mov=1 AND id_mon=1) - (SELECT SUM(monto) FROM movcaj WHERE id_ban=5 AND id_mov=2 AND id_mon=1 ))-- AS totalbbva5 -- bbva soles mezacorp
         UNION
       SELECT ((SELECT SUM(monto) FROM movcaj WHERE id_ban=1 AND id_mov=1 AND id_mon=2) - (SELECT SUM(monto) FROM movcaj WHERE id_ban=1 AND id_mov=2 AND id_mon=2 ))-- AS totalingd  -- bcp dolar mezacorp
       UNION
       SELECT ((SELECT SUM(monto) FROM movcaj WHERE id_ban=2 AND id_mov=1 AND id_mon=1) - (SELECT SUM(monto) FROM movcaj WHERE id_ban=2 AND id_mov=2 AND id_mon=1 )) --  AS totalbcp_s_oma
        UNION
        SELECT ((SELECT SUM(monto) FROM movcaj WHERE id_ban=2 AND id_mov=1 AND id_mon=2) - (SELECT SUM(monto) FROM movcaj WHERE id_ban=2 AND id_mov=2 AND id_mon=2 )) -- AS totalbcp_d_oma
         UNION
        SELECT ((SELECT SUM(monto) FROM movcaj WHERE id_ban=3 AND id_mov=1 AND id_mon=1) - (SELECT SUM(monto) FROM movcaj WHERE id_ban=3 AND id_mov=2 AND id_mon=1 ))-- AS totalbcp_s_vm
        UNION
       SELECT ((SELECT SUM(monto) FROM movcaj WHERE id_ban=4 AND id_mov=1 AND id_mon=1) - (SELECT SUM(monto) FROM movcaj WHERE id_ban=4 AND id_mov=2 AND id_mon=1 ))-- AS totalbbva_s_vm
        UNION
        SELECT ((SELECT SUM(monto) FROM movcaj WHERE id_ban=6 AND id_mov=1 AND id_mon=1) - (SELECT SUM(monto) FROM movcaj WHERE id_ban=6 AND id_mov=2 AND id_mon=1 )) -- AS total_s_caja
       UNION
        SELECT ((SELECT SUM(monto) FROM movcaj WHERE id_ban=6 AND id_mov=1 AND id_mon=2) - (SELECT SUM(monto) FROM movcaj WHERE id_ban=6 AND id_mov=2 AND id_mon=2 )) -- AS total_d_caja
        " ;
        $data = $this->ejecutar($sentencia,0);
        return $data;
        
     }
     
   }
?>