<?php
include('db.php');

if(isset($_GET['id'])){
    $id=$_GET['id'];
    $query="UPDATE  tabfac_pedido SET  CODESTADO='4' WHERE NUMDOC='$id'";
    $result =mysqli_query($conn,$query);
    //echo $query;
     
    if(!$result){
        die('fail!!!');
       
    }
    //echo $query;
    $_SESSION['message']='PEDIDO archivado!!!';
    $_SESSION['message_type']='danger';
    header('Location:tables.php');
}




?>