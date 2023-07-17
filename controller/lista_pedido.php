<?php
require "../model/pedido.php";
$user= new pedido();

switch($_REQUEST['op']){
    case 'adduser':
       if(isset($_POST["adduser"])){
        if(!empty($_POST['cod'])&&!empty($_POST['user'])&&!empty($_POST['nombre'])
        &&!empty($_POST['apellido'])&&!empty($_POST['pass'])&&!empty($_POST['nivel'])){
            $cod=$POST['cod'];
            $user=$POST['user'];
            $nombre=$POST['nombre'];
            $apellido=$POST['apellido'];
            $pass=$POST['pass'];
            $nivel=$POST['nivel'];
            $user->adduser($cod,$user,$nombre,$apellido,$pass,$nivel);
        }
       }

     break;

}


?>