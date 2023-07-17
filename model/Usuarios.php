<?php
require "../config/conexion.php";
class Usuarios{
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
function listarEmpleado()
     {
        $sentencia = " SELECT clipropersonal.CODPER,CONCAT(clipropersonal.APEPAT,' ',clipropersonal.APEMAT),clipropersonal.NOMBRES,tabcar.DES,clipropersonal.FECNAC,clipropersonal.SEXO
        ,clipropersonal.FINGRESO,clipropersonal.SUELDO,clipropersonal.CORREO,clipropersonal.TELEFONO, tabest.descri
          FROM clipropersonal
         INNER JOIN tabcar  ON clipropersonal.CODCAR=tabcar.COD
         INNER JOIN tabest  ON clipropersonal.ESTADO=tabest.cod ";
        $data = $this->ejecutar($sentencia,0);
        return $data;
     }

 function insertEmpleado($numdoc,$apepat,$apemat,$nombres,$codcargo,$fechanac,$sexo,$estado,$sueldo,$correo,$cel,$asig_fam,$direccion,$nro_cta)
     {
        $sentencia = "INSERT clipropersonal(NRODOC,APEPAT,APEMAT,NOMBRES,CODCAR,FECNAC,SEXO,ESTADO,SUELDO,CORREO,TELEFONO,ASIG_FAM,DIRECCION,NRO_CTA) VALUES('$numdoc','$apepat','$apemat','$nombres','$codcargo','$fechanac','$sexo','$estado','$sueldo','$correo','$cel','$asig_fam','$direccion','$nro_cta')";
         $this->ejecutar($sentencia,1);
     }
 function insertUser($id,$nom_user,$ape,$user,$pass,$nivel)
       {
          $sentencia = "INSERT tabusr(COD,NOMUSR,APEUSR,USUARIO,PWD,NIVEL) VALUES('$id','$nom_user','$ape','$user',SHA1('$pass'),'$nivel')";
           $this->ejecutar($sentencia,1);
       }
   function busquedaEmpleado($id){
    $sentencia = " SELECT c.CODPER,c.APEPAT,c.APEMAT,c.NOMBRES,tabcar.DES,c.FECNAC,c.SEXO,
    c.ESTADO,c.FINGRESO,c.SUELDO,c.CORREO,c.TELEFONO, tabest.descri,CODCAR,NRODOC,DIRECCION,ASIG_FAM,NRO_CTA
      FROM clipropersonal c
     INNER JOIN tabcar  ON c.CODCAR=tabcar.COD
     INNER JOIN tabest  ON c.ESTADO=tabest.cod 
     WHERE CODPER='$id'";
    $data = $this->ejecutar($sentencia,0);
    return $data;
   }
   function updateEmpleado ($CODPER,$NRODOC,$APEPAT,$APEMAT,$NOMBRES,$CODCAR,$FECNAC,$SEXO,$ESTADO,$SUELDO,$CORREO,$TELEFONO,$ASIG_FAM,$DIRECCION,$NRO_CTA)
      {
        $sentencia = "UPDATE clipropersonal SET NRODOC='$NRODOC', APEPAT='$APEPAT', APEMAT='$APEMAT', NOMBRES='$NOMBRES',
        CODCAR='$CODCAR', FECNAC='$FECNAC', SEXO='$SEXO', ESTADO='$ESTADO', SUELDO='$SUELDO', CORREO='$CORREO', TELEFONO='$TELEFONO',
        ASIG_FAM='$ASIG_FAM',DIRECCION ='$DIRECCION', NRO_CTA='$NRO_CTA'
        WHERE CODPER = $CODPER";
        
         $this->ejecutar($sentencia,1);
      }
      function login_user($user){
        $sentencia = "SELECT COD,USUARIO,NOMUSR,APEUSR ,NIVEL,PWD FROM tabusr WHERE  USUARIO='$user'";
        $data = $this->ejecutar($sentencia,0);
        return $data;
       }


     
    
     

}
?>