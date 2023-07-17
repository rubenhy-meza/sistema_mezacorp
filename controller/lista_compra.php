<?php
require "../model/Compra.php";
$com = new Compra();

switch($_REQUEST['op']){
    case 'create_com':
       if(isset($_POST["btn_addcom"])){
        if( !empty($_POST['id_clipro']) && !empty($_POST['num_doc']) && !empty($_POST['fecha'])&& 
        !empty($_POST['fecha_pago']) && !empty($_POST['total']) && !empty($_POST['id_situ'])
        && !empty($_POST['obs']) && !empty($_POST['id_suc']) && !empty($_POST['id_mon'])){
            $id_clipro = $_POST["id_clipro"];
            
            $num_doc = $_POST["num_doc"];
            $fecha = $_POST["fecha"];
            $fecha_pago = $_POST["fecha_pago"];
            $total = $_POST["total"];
            $id_situ = $_POST["id_situ"];
            $obs = $_POST["obs"];
            $id_suc =  $_POST["id_suc"];
            $id_mon = $_POST["id_mon"];
            $plazo = $_POST["plazo"];  
            $id_doc = $_POST["id_doc"]; 
            $saldo_pen = $_POST["total"];       
           $com->insertCompra($id_clipro,$num_doc,$fecha,$fecha_pago,$total,$id_situ,$obs,$id_suc,$id_mon, $plazo,$id_doc,$saldo_pen );
           $_SESSION['success'] = "Registro satisfactorio !!!".$num_doc;
        }
         else{
            $_SESSION['error'] = "Campos incompletos !!!";
        }
       
       header("location:../tabla_compras.php");
       }
    break;
    case 'listar_com':
       $data = $com -> listar_compra();
     
       $list = Array();
       for($i=0; $i<count($data); $i++){
        $list[] = array(
            "0"=>$data[$i]['id'],
            "1"=>$data[$i]['num_doc'],
            "2"=>$data[$i]['RAZSOC'],
            "3"=>$data[$i]['fecha'],
            "4"=>$data[$i]['fecha_pago'],
            "5"=>$data[$i]["CONCAT (tabmon.DESABR,' ',fac_compra.total)"],
            "6"=>'<strong>'.$data[$i]["CONCAT (tabmon.DESABR,' ',fac_compra.saldopen)"].'</strong> ',
            
            "7"=>$data[$i]['obs'],
            "8"=>$data[$i]['nom_suc'] ,
            "9"=> '<a class="btn btn-success btn-circle btn-sm" id="btn_fac_p" data-bs-toggle="modal" data-bs-target="#modalPago"
            onclick="buscarNumdoc('.$data[$i]['id'].');" ><i class="fas fa-pager"></i></a>
            <a  class=" btn btn-danger btn-circle btn-sm" id="btn_fac_p" onclick="eliminarCompra('.$data[$i]['id'].",'".$data[$i]['num_doc']."'".');"> 
            <i class="fas fa-trash"></i></a>
            <a  class=" btn btn-info btn-circle btn-sm"data-bs-target="#exampleModalToggle3" data-bs-toggle="modal" onclick="buscarNumdoc('.$data[$i]['id'].",'".$data[$i]['num_doc']."'".');"> 
            <i class="fas fa-edit"></i></a>',
            "10"=>$data[$i]['id_doc'],
            "11"=>$data[$i]['nombre_situ']
        );
       }
       $resultados = array(
        "sEcho" => 1,
        "iTotalRecords" => count($list),
        "iTotalDisplayRecords" => count($list),
        
        "aaData"=>$list
       );//print_r($resultados);exit;
       
       echo json_encode($resultados);
    break;
    case 'obtenercompra_numdoc'://optencio dedatos fac_compra
        if(isset($_POST['id'])){
            $lista = $com->obtenerCompra($_POST['id']);
            $data[] = array(
            'id'=>$lista[0]['id'],
            'num_doc'=>$lista[0]['num_doc'],
            'id_clipro'=>$lista[0]['RAZSOC'],
            'fecha'=>$lista[0]['fecha'],
            'plazo'=>$lista[0]['plazo'],
            'fecha_pago'=>$lista[0]['fecha_pago'],
            'total'=>$lista[0]["CONCAT (tabmon.DESABR,' ',fac_compra.total)"],
            'total_u'=>$lista[0]["total"],
            'saldopen'=>$lista[0]["CONCAT (tabmon.DESABR,' ',fac_compra.saldo)"],
            'saldo'=>$lista[0]["CONCAT (tabmon.DESABR,' ',fac_compra.saldopen)"],
            'id_situ'=>$lista[0]['id_situ'],
            'id_suc'=>$lista[0]['nom_suc'],
            'saldo_a_pagar'=>$lista[0]['saldopen'],
            'id_mon'=>$lista[0]['id_mon'],
            'obs'=>$lista[0]['obs'],
            'id_prov'=>$lista[0]['id_clipro'],
            'nro_doc'=>$lista[0]['NRODOC'],
            'id_sucu'=>$lista[0]['id_suc'],
            'id_doc'=>$lista[0]['id_doc']
            );
            echo json_encode($data); 
        }
        if(isset($_POST['num_doc'])){
            $lista = $com->obtenerCompra($_POST['num_doc']);
            $data[] = array(
            'id'=>$lista[0]['id'],
            'num_doc'=>$lista[0]['num_doc'],
            'id_clipro'=>$lista[0]['RAZSOC'],
            'fecha'=>$lista[0]['fecha'],
            'plazo'=>$lista[0]['plazo'],
            'fecha_pago'=>$lista[0]['fecha_pago'],
            'total'=>$lista[0]["CONCAT (tabmon.DESABR,' ',fac_compra.total)"],
            'total_u'=>$lista[0]["total"],
            'saldopen'=>$lista[0]["CONCAT (tabmon.DESABR,' ',fac_compra.saldo)"],
            'saldo'=>$lista[0]["CONCAT (tabmon.DESABR,' ',fac_compra.saldopen)"],
            'id_situ'=>$lista[0]['id_situ'],
            'id_suc'=>$lista[0]['nom_suc'],
            'saldo_a_pagar'=>$lista[0]['saldopen'],
            'id_mon'=>$lista[0]['id_mon'],
            'obs'=>$lista[0]['obs'],
            'id_prov'=>$lista[0]['id_clipro'],
            'nro_doc'=>$lista[0]['NRODOC'],
            'id_sucu'=>$lista[0]['id_suc'],
            'id_doc'=>$lista[0]['id_doc']
            );
            echo json_encode($data); 
        }

    break;
    case 'updateCompra':
            if(isset($_POST["id_u"])){
                if(!empty($_POST['id_u']) && !empty($_POST['num_doc_u']) && !empty($_POST['fecha_u'])&& 
                !empty($_POST['fecha_pago_u']) && !empty($_POST['total_u']) && !empty($_POST['id_clipro_u'])
                && !empty($_POST['obs_u']) && !empty($_POST['id_suc_u']) && !empty($_POST['sel_mon_u'])){
                    $id = $_POST["id_u"];//no modificar oculto
                    $id_clipro = $_POST["id_clipro_u"];//
                    $num_doc = $_POST["num_doc_u"];//
                    $fecha = $_POST["fecha_u"];//
                    $id_doc= $_POST["id_doc_u"];//
                    $fecha_pago = $_POST["fecha_pago_u"];//
                    $total = $_POST["total_u"];//
                    $id_situ = $_POST["id_situ_u"];//
                    $obs = $_POST["obs_u"];//
                    $id_suc =  $_POST["id_suc_u"];//
                    $id_mon = $_POST["sel_mon_u"]; //       
                   $com->updateCompra ($id,$id_clipro,$num_doc,$fecha,$fecha_pago,$total,$id_situ,$obs,$id_suc,$id_mon,$id_doc);
                   echo 1;
                }
                 else{
                    echo 0;
                }
            }    
     break;
    case 'eliminarCompra':
        if(isset($_POST['id'])){
            $com->eliminarCompraId($_POST["id"]);    
        }
    break; 
    case 'busquedaruc':
        if(isset($_POST['ruc'])){
            
            $lista = $com->busquedaCli_pro($_POST['ruc']);
            if($lista == 0){
                   echo json_encode(0);
            }else{
                $data[] = array(
                    'id'=>$lista[0]['CODIGO'],
                    'id_clipro'=>$lista[0]['RAZSOC'],
                    'ruc'=>$lista[0]['NRODOC'],
                    'dir'=>$lista[0]['DIRECC']
                    ); 
             echo json_encode($data);  
                } 
        }
    break;
     case 'busquedamov':
        if(isset($_POST['id'])){
            if(!empty($_POST['id'])){
            $lista = $com->busquedaMov($_POST['id']);
                $data[] = array(
                    'id'=>$lista[0]['id'],
                    'fecha'=>$lista[0]['fecha'],
                    'detalle'=>$lista[0]['detalle'],
                    'id_mon'=>$lista[0]['id_mon'],
                    'id_mov'=>$lista[0]['id_mov'],
                    'id_mot'=>$lista[0]['id_mot'],
                    'monto'=>$lista[0]['monto'],
                    'id_ban'=>$lista[0]['id_ban']
                    ); 
                    echo json_encode($data);
          }
        }
    break;
      case 'create_mov':
       // print_r($_POST);exit;
        //if(isset($_POST["btn_addmov"])){
            if(isset($_POST["id_mot"])){
            $id_mot = $_POST["id_mot"];
             $monto = $_POST["monto"];
             $id_mov = $_POST["id_mov"];
             $detalle = $_POST["detalle"];
            // $fecha =  $_POST["fecha"];
             $id_mon = $_POST["id_mon"]; 
             $id_ban = $_POST["id_ban"];
            $com->insertMov($detalle,$id_mov,$id_mon,$monto,$id_ban,$id_mot);
        }
        break;

        case 'search_mov':
    
              $com->searchMov($_POST['from_date'],$_POST['to_date']);
         
         
        break;

       case 'update_movimiento':
       // print_r($_POST);exit;
        if(isset($_POST["id"])){
            if(!empty($_POST['sel_mov_e']) && !empty($_POST['sel_mot_e'])&& 
            !empty($_POST['montoe']) && !empty($_POST['fechae']) && !empty($_POST['sel_ban_e']) && !empty($_POST['detallee'])){
                $id = $_POST["id"];
                $id_mov = $_POST["sel_mov_e"];
                $id_mot = $_POST["sel_mot_e"];
                $id_mon= $_POST["sel_mon_e"];
                $monto = $_POST["montoe"];
                $id_ban = $_POST["sel_ban_e"];
                $fecha= $_POST["fechae"];
                $detalle = $_POST["detallee"];     
               $com->update_movimiento($id,$fecha,$detalle,$id_mon,$id_mov,$monto,$id_ban,$id_mot);
            }

        }  
      break;
     case 'listar_mov':
         $datos = $com -> listar_mov();
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

     break;
     case 'eliminarMov':
        if(isset($_POST['id'])){
            $com->eliminarMovId($_POST["id"]);
                
        }
    break;
    //creando registros d pago
    case 'create_pago':
        if(isset($_POST["btn_addpago"])){
           //  optencion de variable de validaion
            $saldo_pagar= $_POST["saldo_doc_pago"];
            $saldo_pagado = $_POST["pagado_doc_pago"];

            $numdoc = $_POST["num_doc_pago"];
             $referencia = $_POST["referencia_pago"];
             $importe = $_POST["importe_pago"];
             $moneda = $_POST["mon_doc_pago"];
             
             $id_mon = $_POST["id_mon_pago"]; 
             $id_met = $_POST["id_met"];
             $id_ban = $_POST["id_ban"];
             if( $importe<= $saldo_pagar && $moneda == $id_mon  ){//se hace pago
                $com->insertPago($numdoc,$referencia,$id_mon,$importe,$id_met,$id_ban);
               
                echo  "Registro satisfactorio !!!";
                header("location:../tabla_compras.php");
             }else{
                echo"revisar importe o tipo de moneda";
             }
        }
    break;
     case 'saldoporPagar':
            //print_r($_GET);exit;
            $datos = $com -> saldoporPagar();
            $li = Array();
            
                $li[] = array(

                    "saldo_d_m"=>$datos[0]['saldopen'],
                    "saldo_s_m"=>$datos[1]['saldopen'],
                    "saldo_d_o"=>$datos[2]['saldopen'],
                    "saldo_s_o"=>$datos[3]['saldopen']);
            

            echo  json_encode($li);
    break;
}
?>