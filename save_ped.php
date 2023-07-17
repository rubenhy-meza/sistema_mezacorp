<?php
include("db.php");
if(isset($_POST['save'])){
   // $id=$_GET['id'];
   $numfac=$_POST['numfac'];
   $fentrega=$_POST['fentrega'];
   $hentrega=$_POST['hentrega'];
   $estado=$_POST['estado'];
   $prio=$_POST['prio'];
  // $ven=$_POST['ven'];
   $descri=$_POST['descri'];
   
   $query = "UPDATE  tabfac_pedido SET FENTREGA='$fentrega',HENTREGA='$hentrega',CODESTADO='$estado',PRIORIDAD='$prio',DETALLE='$descri' WHERE NUMDOC='$numfac'";
   $result = mysqli_query($conn,$query);
   echo $query;
  
  if(!$result){
    //echo error_reporting('E_ALL');
    die('EROOR');
  }

  //$_SESSION['message']='Pedido actualizado';
  //$_SESSION['message_type']='success';
  
header("Location:tables.php");
}




?>