<?php

require "../model/chart.php";
$report= new chartReport();


switch($_REQUEST['op']){
    //codigo de busuqeda
    //moneda  idmon= soles-1 dolares-2
    // tipo de movimiento  idmot= 1-ventas 2-compras 3-gastos 5-devoluciones
    
     case 'DataComS':
       // print_r($_POST);exit;
       $data = $report -> datosChart(1,2);
        echo json_encode($data);
     break;
     case 'DataComD':
         $data = $report -> datosChart(2,2);
         echo json_encode($data);
      break;
      case 'DataGasS':
        // print_r($_POST);exit;
        $data = $report -> datosChart(1,3);
         echo json_encode($data);
      break;
      case 'DataGasD':
          $data = $report -> datosChart(2,3);
          echo json_encode($data);
       break;
       case 'DataVenS':
        // print_r($_POST);exit;
        $data = $report -> datosChart(1,1);
         echo json_encode($data);
      break;
      case 'DataVenD':
          $data = $report -> datosChart(2,1);
          echo json_encode($data);
       break;
      case 'DataVen':
         $data = $report -> datosDona();
         echo json_encode($data);
      break;
      case 'DataVenMes':
          //print_r($_POST);exit;
         //$data = $report -> datosDonaMes($_POST['MONTH(fecha)']);
         $data = $report -> datosDonaMes($_POST['MONTH(fecha)']);
         echo json_encode($data);
      break;

    }
  
?>
