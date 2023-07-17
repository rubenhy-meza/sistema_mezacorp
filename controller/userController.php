<?php
require "../model/Usuarios.php";
$com = new Usuarios();

switch($_REQUEST['op']){
     case 'create_user':
        if(isset($_POST["btn_adduser"])){
         
             $id = $_POST["cod"];
             $nom_user = $_POST["nom_user"];
             $ape = $_POST["ape"];
             $user = $_POST["user"];
            // $fecha =  $_POST["fecha"];
             $pass= $_POST["pass"]; 
             $nivel = $_POST["nivel"];
            $com->insertUser($id,$nom_user,$ape,$user,$pass,$nivel);
            
         //echo  "Registro satisfactorio !!!";
          
      
        header("location:../eeff.php");
        }
     break;
     case 'login_user':
      if(isset($_POST['user'])){
         $user=$_POST['user'];
         $pass=$_POST['pass'];
         $data =  $com->login_user($user);
         if($data > 0){
             $pass_bd = $data[0]['PWD'];
             $pass_c = sha1($pass);
             if($pass_bd===$pass_c){
              
                 $_SESSION['nombre']=$data[0]['USUARIO'];
                 $_SESSION['id']=$data[0]['COD'];
                 $_SESSION['nom_user']=$data[0]['NOMUSR'];
                
                 $_SESSION['tipo_usuario']=$data[0]['NIVEL'];
                 
                   if(isset($_SESSION['id'])){

                      if($_SESSION['tipo_usuario']==1){

                    // header("Location:../eeff.php");
                     $_SESSION["estado"]="verificado";
                     echo json_encode(1) ;

                      }else if ($_SESSION['tipo_usuario']==2){
                   //  header("Location:../tabla_compras.php");
                    $_SESSION["estado"]="verificado";
                    echo json_encode(2) ;
                     }
                 }   
             }else{ $_SESSION["estado"]="no_pass";
               //header("Location:../login.php");
              // echo "false" ;
               echo json_encode(3) ;
             }
         }else{
            $_SESSION["estado"]="no_user";
           // header("Location:login.php");
           //echo "false" ;
           echo json_encode(4) ;
         }
          
      }
   break;
     case 'addEmpleado':
      //print_r($_POST);exit;
       $numdoc = $_POST['numdoc_e'];
       $apemat = $_POST['apellidos_m'];
       $apepat = $_POST['apellidos_p'];
       $nombres = $_POST['nombres_e'];
       $codcargo = $_POST['cargo_e'];
       $fechanac = $_POST['fechanac_e'];
       $sexo = $_POST['sexo_e'];
       $correo = $_POST['correo_e'];
       $cel = $_POST['celular_e'];
       $estado = $_POST['estado_e'];
       $sueldo = $_POST['sueldo_e'];
       $asig_fam= $_POST['hijo_e'];
       $direccion= $_POST['direccion_e'];
       $nro_cta= $_POST['num_cta_e'];
       $com->insertEmpleado($numdoc,$apepat,$apemat,$nombres,$codcargo,$fechanac,$sexo,$estado,$sueldo,$correo,$cel,$asig_fam,$direccion,$nro_cta);
     break;
    case 'listarEmpleado':
        // print_r($_POST);exit;
        $data = $com ->listarEmpleado();
        $list = Array();
       for($i=0; $i<count($data); $i++){
        $list[]=array (
            "Codigo"=>$data[$i]['CODPER'],
            "Apellidos"=>$data[$i]["CONCAT(clipropersonal.APEPAT,' ',clipropersonal.APEMAT)"],
            "Nombres"=>$data[$i]['NOMBRES'], 
            "Cargo"=>$data[$i]['DES'],
            "FechaNac"=>$data[$i]['FECNAC'],
            "Sexo"=>$data[$i]["SEXO"],
            "FechaIng"=>$data[$i]['FINGRESO'],
            "Sueldo"=>$data[$i]['SUELDO'] ,
            "Correo"=>$data[$i]['CORREO'] ,
            "Telefono"=>$data[$i]['TELEFONO'] ,
            "Des"=>$data[$i]['descri'] ,
       );
       }
       $resultados = array(
        "data"=>$list
       );
       //echo json_encode($list);
       echo(json_encode($resultados));
    break;
     case 'busqueduser':
        if(isset($_POST['CODPER'])){
            if(!empty($_POST['CODPER'])){
            $data = $com->busquedaEmpleado($_POST['CODPER']);
            //if(mysqli_num_rows($lista)==1){
             $lista[] = array(
             "Codigo"=>$data[0]['CODPER'],
            "Apellido_p"=>$data[0]["APEPAT"],
            "Apellido_m"=>$data[0]["APEMAT"],
            "Nombres"=>$data[0]['NOMBRES'], 
            "Cargo"=>$data[0]['DES'],
            "FechaNac"=>$data[0]['FECNAC'],
            "Sexo"=>$data[0]["SEXO"],
            "FechaIng"=>$data[0]['FINGRESO'],
            "Sueldo"=>$data[0]['SUELDO'] ,
            "Correo"=>$data[0]['CORREO'] ,
            "Telefono"=>$data[0]['TELEFONO'] ,
            "Des"=>$data[0]['descri'] ,
            "Est"=>$data[0]['ESTADO'] ,
            "Codcar"=>$data[0]['CODCAR'] ,
            "Nrocta"=>$data[0]['NRO_CTA'] ,
            "Asig_fam"=>$data[0]['ASIG_FAM'] ,
            "Dir"=>$data[0]['DIRECCION'] ,
            "Numdoc"=>$data[0]['NRODOC'] 
                    ); 
                    echo json_encode($lista);
           
          }
        }
     break;
     case 'updateEmpleado':
          //print_r($_POST);exit;
          if(isset($_POST["codigo_u"])){
            if(!empty($_POST['apellido_p_u']) && !empty($_POST['apellido_m_u'])){
                $CODPER = $_POST['codigo_u'];//no modificar oculto
                $NRODOC = $_POST['numdoc_e_u'];//
                $APEPAT = $_POST['apellido_p_u'];//
                $APEMAT = $_POST['apellido_m_u'];//
                $NOMBRES= $_POST['nombres_e_u'];//
                $CODCAR = $_POST['cargo_e_u'];//
                $FECNAC= $_POST['fechanac_e_u'];//
                $SEXO = $_POST['sexo_e_u'];//
                $ESTADO = $_POST['est_e_u'];//
                $SUELDO =  $_POST['sueldo_e_u'];//
                $CORREO= $_POST['correo_e_u']; //   
                $TELEFONO= $_POST['celular_e_u']; // 
                $ASIG_FAM =  $_POST['hijo_e_u'];//
                $DIRECCION= $_POST['direccion_e_u']; //   
                $NRO_CTA= $_POST['numcta_e_u']; // 
                //$FSALIDA= $_POST[fsalida_e_u]; //     
               $com->updateEmpleado($CODPER,$NRODOC,$APEPAT,$APEMAT,$NOMBRES,$CODCAR,$FECNAC,$SEXO,$ESTADO,$SUELDO,$CORREO,$TELEFONO,$ASIG_FAM,$DIRECCION,$NRO_CTA);
               echo 'actualizacion satisfactorio!!!';
            }
             else{
                echo 'error al actualizar';
            }
        }
        break;
}
?>