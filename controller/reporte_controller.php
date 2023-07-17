<?php

require "../model/Report_model.php";
$report= new Report();


switch($_REQUEST['op']){
    //listar datos de bancos
    case 'listar_ban':
        $data = $report -> listar_bancos();
        $list = Array();
        for($i=0; $i<count($data); $i++){
         $list[] = array(
             "0"=>$data[$i]['COD'],
             "1"=>$data[$i]['DES'],
             "2"=>$data[$i]['NROCTA'],
             "3"=>$data[$i]['DESABR']
             
         );
        }
        $resultados = array(
         "sEcho" => 1,
         "iTotalRecords" => count($list),
         "iTotalDisplayRecords" => count($list),
         "aaData"=>$list
        );
        echo json_encode($resultados);

     break;
     case 'saldoDis':
            $lista = $report->saldoDisponible();
                $data[] = array(
                    'bcp_m_s'=>$lista[0]['saldodis'],
                    'bbva_m_s'=>$lista[1]['saldodis'],
                    'bcp_m_d'=>$lista[2]['saldodis'],
                    'bcp_o_s'=>$lista[3]['saldodis'],
                    'bcp_o_d'=>$lista[4]['saldodis'],
                    'bcp_v_s'=>$lista[5]['saldodis'],
                    'bbva_v_s'=>$lista[6]['saldodis'],
                    'caja_s'=>$lista[7]['saldodis'],
                    'caja_d'=>$lista[8]['saldodis'],
                   // 'cta_total'=>'bcp_m_s'+ 'bbva_m_s'+'bcp_o_s'+'bcp_v_s'+'bbva_v_s'+ 'caja_s'
                    ); 
                    echo json_encode($data); 
    break;
    }
?>
