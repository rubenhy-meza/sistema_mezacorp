init(); 
  $("input[name='tipo_in']").on( 'change', function() {
    if( $(this).is(':checked') ) {
        $('#movimiento').val(1);
        $('#movimientoe').val(1);
        $("input[name='tipo_sa']").prop("checked", false);
    } 
});
 $("input[name='tipo_sa']").on( 'change', function() {
  if( $(this).is(':checked') ) {
      $('#movimiento').val(2);
      $('#movimientoe').val(2);
      $("input[name='tipo_in']").prop("checked", false);
  }   
});
$("input[name='tipo_s']").on( 'change', function() {
  if( $(this).is(':checked') ) {
      $('#id_mon').val(1);
      $('#id_mone').val(1);
      $("input[name='tipo_d']").prop("checked", false);
  } 
});
$("input[name='tipo_d']").on( 'change', function() {
if( $(this).is(':checked') ) {
    $('#id_mon').val(2);
    $('#id_mone').val(1);
    $("input[name='tipo_s']").prop("checked", false);
}   
});
 function init(){
 
           getData();
           saldoDis();
           saldoporPagar();
  }

    function getData(){
   
                     cont=0
                    var d = new Date(); var month = d.getMonth()+1; var day = d.getDate(); 
                    var fecha = d.getFullYear() + '-' + (month<10 ? '0' : '') + month + '-' + (day<10 ? '0' : '') + day;
                    //console.log (fecha);

                    
           var tab_compras= $('#DataTable_com').DataTable({//tabla lista de compras
            language: {
              "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
              },
                 "order": [[ 3, "desc" ]],//ordenando desde la fila 3
                pageLength:10,
                responsive:true,
                processing :true,
                autoWidth: false,
                dom:'Bfrtlip',
                buttons:[
                  {  extend:'excelHtml5',
                        text:'<i class="fas fa-file-excel"></i>',
                    titleAttr:'Export excel',
                    className:'btn btn-success'
                  },
                  {  extend:'pdfHtml5',
                        text:'<i class="fas fa-file-pdf"></i>',
                    titleAttr:'Export a PDF',
                    className:'btn btn-danger'
                  },
                  {  extend:'print',
                        text:'<i class="fas fa-print"></i>',
                    titleAttr:'Imprimir',
                    className:'btn btn-info'
                  },
               
  
                ],
                ajax:{
                    url:"controller/lista_compra.php?op=listar_com" //consulta a controller db
                },
                columns: [
                  { "width": "3%" },
                  { "width": "8%" },
                  { "width": "18%" },
                  { "width": "8%" },
                  { "width": "8%" },
                  { "width": "8%" },
                  { "width": "8%" },
                  //{ "width": "8%" },
                  { "width": "22%" },
                  { "width": "7%" },
                  { "width": "10%" }
              ],
            }); 
             //estilo en datatables PARA FACTURAS PENDINETE DE PAGO
         tab_compras.on('init',function(){
           
            for(var i=0;i<tab_compras.rows().count();i++){
                var row=tab_compras.row(i);
                var estado=row.data()[11];
                var vencido=row.data()[4];
                var razsoc=row.data()[2];
                var numdoc=row.data()[1];
                var saldopen=row.data()[6];
                var nc=row.data()[10];
              //obener datos alerta de facturas por vencer ICONO DE  ALERTA!!
                if (vencido >=fecha && estado=="PENDIENTE"){

                  $(row.node()).css('background-color','LightCyan');
                }

                if (vencido <=fecha && estado=='PENDIENTE'){
                      cont+=1 
                           
                  $(row.node()).css('color','red');
                  $('#lista_alerta').after(` <div  class="message_fac_vencido"> <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3 ">
                  <div class="icon-circle bg-warning">
                  <i class="fas fa-exclamation-triangle text-white"></i>
                     </div>
                  </div>
                  <div>
                      <div class="small text-red-500" id="nom_cli_a">
                      Fecha de pago: `+ vencido +`</div>
                      <span class="small strong font-weight-bold"><strong>`+ razsoc+`</strong></span><br>
                      <span class="font-weight-bold">Documento N°:`+ numdoc+`</span><br>
                      <span class="font-weight-bold">Pendiente :`+ saldopen+`</span>
                  </div>
              </a></div>`);
               $('.message_fac_vencido').css('background-color','LightSalmon');//estilo FILA PENDIENTE

               Push.create(numdoc, { //llamamos al objeto push escrito en jquery	
                 body: razsoc, //ingresamos el texto recuperado de la petición ajax	
                  data:"Facturas vencidas",
                     timeout: 3000, //con este valor indica que despues de 4000 ms se cierre automaticamente el mensaje
                                onClick: function () { //al hacer click en la notificación se cerrará	
                                              window.focus();	
                                                this.close();			
                                                    }		
                 });	
                 Push.clear();
                }
             //console.log(row.data().node());    
                    }
                    $('#alert_mensaje').text('+'+cont);        
          });   
          //carga de datatable movimento de caja
          var tablemov= $('#DataTable_mov').DataTable({
            language: {
              "lengthMenu": "Mostrar _MENU_ registros",
              "zeroRecords": "No se encontraron resultados",
              "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
              "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
              "infoFiltered": "(filtrado de un total de _MAX_ registros)",
              "sSearch": "Buscar:",
              "oPaginate": {
                  "sFirst": "Primero",
                  "sLast":"Último",
                  "sNext":"Siguiente",
                  "sPrevious": "Anterior"
                  },
                 "sProcessing":"Procesando...",
               },
            pageLength:10,
            responsive:true,
            processing :true,
            autoWidth: false,
            dom:'Bfrtlip',
            
            buttons:[
              {  extend:'excelHtml5',
                    text:'<i class="fas fa-file-excel"></i>',
                titleAttr:'Export excel',
                className:'btn btn-success'
              },
              {  extend:'pdfHtml5',
                    text:'<i class="fas fa-file-pdf"></i>',
                titleAttr:'Export a PDF',
                className:'btn btn-danger'
              },
              {  extend:'print',
                    text:'<i class="fas fa-print"></i>',
                titleAttr:'Imprimir',
                className:'btn btn-info'
              }

            ], 
            order: [ 0, 'desc' ],
             ajax:{ url:"model/chart_gastos.php" },
              columns: [
                { "width": "5%" },
                { "width": "35%" },
                { "width": "15%" },
                { "width": "20%" },
                { "width": "15%" },
                { "width": "10%" }
            ],// datos para el llenado de datbla_movimientos cajas
               });//.ajax.reload();  

        }//fin obtener data facturas por vencer
            $('#DataTable_reportT').DataTable({
             // pageLength:10,
              responsive:true,
              processing :true,
              searchable: false,
              autoWidth: true,
              columns: [
                { "width": "5%" },
                { "width": "30%" },
                { "width": "10%" },
                { "width": "25%" },
                { "width": "30%" }
            ],
              ajax:{
                  url:"controller/reporte_controller.php?op=listar_ban"   
              }
          }); 

     function buscarNumdoc(id){
           parametros={"num_doc":id }
           $.ajax({
             data:parametros,
             url:'controller/lista_compra.php?op=obtenercompra_numdoc',
             type:'POST',
             beforeSend: function(){},
             success:function(response){
              data = $.parseJSON(response);
              console.log(data);
                if (data.length>0) {
                  //llenado de datos para modal pago
                  $('#num_doc_pago').val(data[0]['num_doc']);
                  $('#num_doc_pago_info').val(data[0]['num_doc']);
                    $('#cliente_pago').text(data[0]['id_clipro']);
                    $('#cliente_pago_info').text(data[0]['id_clipro']);
                   $('#det_numdoc').text(data[0]['num_doc']);
                   $('#saldo_pago').text(data[0]['saldo']);
                   $('#saldo_pago_info').text(data[0]['saldo']);
                   $('#pen_pago_info').text(data[0]['saldopen']);
                   $('#sucursal_info').text(data[0]['id_suc']);
                   $('#total_pago_info').text(data[0]['total']);
                   $('#estado_info').text(data[0]['id_situ']);
                    $('#pen_pago').text(data[0]['saldopen']);//total depagos realizados
                    $('#saldo_doc_pago').val(data[0]['saldo_a_pagar']);//saldo por pagar
                    $('#imp_doc_pago').val(data[0]['total']);//importe inical de documento
                    $('#total_pago').text(data[0]['total']); // total a pagar
                    $('#sucursal').text(data[0]['id_suc']);
                    $('#mon_doc_pago').val(data[0]['id_mon']);
                    //llenado de datos para  modal update
                    $('#id_u').val(data[0]['id']);
                     $('#ruc_cli_u').val(data[0]['nro_doc']);
                     $('#id_clipro_u').val(data[0]['id_prov']);
                      $('#nom_cli_u').val(data[0]['id_clipro']);
                     $('#num_doc_u').val(data[0]['num_doc']);
                     $('#fecha_u').val(data[0]['fecha']);
                     $('#fecha_pago_u').val(data[0]['fecha_pago']);
                     $('#total_u').val(data[0]['total_u']);
                     $('#obs_u').val(data[0]['obs']);id_situ_u
                     $("#id_situ_u option[value="+ data[0]['id_situ'] +"]").attr("selected",true);
                     $("#id_suc_u option[value="+ data[0]['id_sucu'] +"]").attr("selected",true);
                     $("#estado_compra_u option[value="+ data[0]['id_situ'] +"]").attr("selected",true);
                    $("#sel_mon_u option[value="+ data[0]['id_mon'] +"]").attr("selected",true);
                    $("#id_doc_u option[value="+ data[0]['id_doc'] +"]").attr("selected",true);
                }
             }
           });
          }
 function elimarCompra(id,num_doc){
          prm={"id":id}
          $.ajax({
              data:prm,
              url:'controller/lista_compra.php?op=eliminarCompra',
           type:'POST',
           beforeSend: function(){},
           success:function(response){
              Swal.fire(
                        'Eliminado!',
                       'Se ha eliminado correctamente N° Doc: '+num_doc,
                       'success'
                );
           }
          });
         }
 function updateCompra(){
               $.ajax({
                data:$("#form_update_compra").serialize(),
                url:'controller/lista_compra.php?op=updateCompra',
                type:'POST',
                beforeSend:function () { },
                success:function (response) { 
                 
                    if(response == 1){ 
                        Swal.fire({
                                     position: 'top-center',
                                    icon: 'success',
                                     title: 'Actualizado!!!',
                                 showConfirmButton: false,
                                 timer: 1000,
                                }); 
                                setTimeout(function(){
                                  $('#exampleModalToggle3').modal('hide')
                           },1050);
                      }else{
                        Swal.fire({
                                     position: 'top-center',
                                    icon: 'error',
                                     title: 'Error al Actualizar',
                                 showConfirmButton: false,
                                 timer: 2500
                                }); 
                          setTimeout(function(){
                                  $('#exampleModalToggle3').modal('hide')
                           },2050);
                    } 
                },
                error: function (xhr, textStatus, errorMessage) {

                  console.log("ERROR" + errorMessage + textStatus + xhr);
              }
               });
         }
 function eliminarCompra(id,num_doc){
            const swalWithBootstrapButtons = Swal.mixin({
               customClass: {
                         confirmButton: 'btn btn-success',
                         cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })
            swalWithBootstrapButtons.fire({
                 title: 'Estas seguro de eliminar  el Reguistro ?',
                 text: "Se eliminará de la base de datos Doc: "+ num_doc + " !!",
                 icon: 'warning',
                 showCancelButton: true,
                 confirmButtonText: 'Si, Eliminar!',
                  cancelButtonText: 'No, cancelar!',
                 reverseButtons: true
            }).then((result) => {
                       if (result.isConfirmed) {
                         elimarCompra(id,num_doc);
                        } else if ( result.dismiss === Swal.DismissReason.cancel) {
                           swalWithBootstrapButtons.fire(
                              'Cancelado',
                             'No se ha eliminado el Reguistro',
                             'error'
                            );
                        }
              })
         }

function eliminarMov(id){
  const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
              confirmButton: 'btn btn-success',
              cancelButton: 'btn btn-danger'
     },
     buttonsStyling: false
 })
 swalWithBootstrapButtons.fire({
      title: 'Eliminar  el Reguistro ?',
      text: "Se eliminará el Reguistro: "+ id + " !!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Si, Eliminar!',
       cancelButtonText: 'No, cancelar!',
      reverseButtons: true
 }).then((result) => {
            if (result.isConfirmed) {
              prm={"id":id}
              $.ajax({
                data:prm,
                 url:'controller/lista_compra.php?op=eliminarMov',
                type:'POST',
           success:function(response){
            saldoDis();
            var table=$('#DataTable_mov').DataTable();
             table.ajax.reload( null, false );
              Swal.fire({
                       title: 'Eliminado!',
                       text:'Se ha eliminado correctamente ID :'+id,
                       icon:'success',
                       showConfirmButton: false,
                       timer: 1000,
               } );
           }   
          }); 
             } else if ( result.dismiss === Swal.DismissReason.cancel) {
                swalWithBootstrapButtons.fire({
                  title: 'Cancelado',
                  text: 'No se ha eliminado el Reguistro',
                  icon: 'error',
                  showConfirmButton: false,
                       timer: 1000,
                }); 
             }    
   })
}  
 function update_movimiento(){
  $.ajax({
      data:$("#form_update_movimiento").serialize(),
      url:'controller/lista_compra.php?op=update_movimiento',
      type:'POST',
       beforeSend: function(){},
       success:function(response){
        saldoDis()
        var table=$('#DataTable_mov').DataTable();
       table.ajax.reload( null, false );
      Swal.fire({
        icon: 'Modificado!',
        title: 'Se ha actualizado correctamente ID :',
        showConfirmButton: false,
        icon:   'success',
         timer: 1000,}
        );
        $('#exampleModal').modal('hide')
   }
   
  });
}
/// FUNCION CREAR MOVIMIENTO
function crear_movimiento(){
  $.ajax({
      data:$("#form_create_mov").serialize(),
      url:'controller/lista_compra.php?op=create_mov',
      type:'POST',
       beforeSend: function(){},
       success:function(data){
        saldoDis()
       var table=$('#DataTable_mov').DataTable();
       table.ajax.reload( null, false );
       $('#det').val("Pago yape");
       $('#monto').val("");
       $('#monto').focus();
       $("input:radio[name=exampleRadios]:checked")[0].checked = false;
      Swal.fire({
                                    icon: 'success',
                                     title: 'Agregado!!!',
                                 showConfirmButton: false,
                                 timer: 1000,
      }
        );
   }
  });
}
//bucar movimiento por fecha
function search_movimiento(){
  
  var table = $('#DataTable_mov_search').DataTable();
       table.destroy();
      $('#DataTable_mov_search tbody tr').remove();
  $.ajax({ 
    data:$("#form_search_movimiento").serialize(),
    url:"model/chart_gastos.php" ,
    type:'GET',
     success:function(datos){
     $('#DataTable_mov_search').append(datos);
      new DataTable('#DataTable_mov_search');
     }
     
});

   
};
// obtener movimiento 
function get_movimiento(id){
  parametros={"id":id }
  $.ajax({
    data:parametros,
    url:'controller/lista_compra.php?op=busquedamov',
    type:'POST',
    beforeSend: function(){},
    success:function(response){
   //console.log(response);
     data = $.parseJSON(response);
       if (data.length>0) {
         $('#id_edit_mov').val(data[0]['id']);
           $('#fechae').val(data[0]['fecha']);
           $("#sel_mov_e option[value="+ data[0]['id_mov'] +"]").attr("selected",true);
           $("#sel_mon_e option[value="+ data[0]['id_mon'] +"]").attr("selected",true);
           $("#sel_mot_e option[value="+ data[0]['id_mot'] +"]").attr("selected",true);
           $("#sel_ban_e option[value="+ data[0]['id_ban'] +"]").attr("selected",true);
          $('#montoe').val(data[0]['monto']);
          $('#dete').val(data[0]['detalle']);
       }
    }
  });
}
//fin getmov
function getDataruc(){
  $("#error_ruc").remove();
     var ruc = $('#ruc').val();
     var valoresAceptados = /^[0-9]+$/;
  if (ruc.match(valoresAceptados) && ruc.length >= 7 && ruc.length <= 11){
      
       parametros={'ruc':ruc }
     $.ajax({
       data:parametros,
       url:'controller/lista_compra.php?op=busquedaruc',
       type:'POST',
       success:function(response){
          if (response == 0) {
            $("#mensaje_busqueda_ruc").append('<div class=" alert alert-danger d-flex align-items-center" role="alert" id="error_ruc"><svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg> <div> No existe este ruc en la base de datos contactarse 937537782 </div> </div>');
          }else{
            $("#exampleModalToggle").modal("hide");
              data = $.parseJSON(response);
              $('#id_clipro').val(data[0]['id']);
              $('#nom_cli').val(data[0]['id_clipro']);
              $('#ruc_cli').val(data[0]['ruc']);
              $('#dir').val(data[0]['dir']);
              
              $("#exampleModalToggle2").modal("show");
          }
        }, 
     });
  } else  { 
    $("#mensaje_busqueda_ruc").
    append('<div class="alert alert-warning d-flex align-items-center" role="alert" id="error_ruc"> <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg> <div>  Formato de Datos incorrectos!!. Por fabor revisar </div> </div>'); 
  }
}
function saldoDis(){

  $.ajax({
    url:'controller/reporte_controller.php?op=saldoDis',
    type:'POST',
    success:function(response){
  
     data = $.parseJSON(response);
       if (data.length>0) {
         $('#bcp_m_s').html(currencyFormatter({ currency: "PEN",  value:parseFloat(data[0]['bcp_m_s']) }));       
         $('#bbva_m_s').text(currencyFormatter({ currency: "PEN",  value:parseFloat(data[0]['bbva_m_s']) }));
           $('#bcp_m_d').text(currencyFormatter({ currency: "USD",  value:parseFloat(data[0]['bcp_m_d']) }));
           $('#bcp_o_s').text(currencyFormatter({ currency: "PEN",  value:parseFloat(data[0]['bcp_o_s']) }));
           $('#bcp_o_d').text(currencyFormatter({ currency: "USD",  value:parseFloat(data[0]['bcp_o_d']) }));
           $('#bcp_v_s').text(currencyFormatter({ currency: "PEN",  value:parseFloat(data[0]['bcp_v_s']) }));
           $('#bbva_v_s').text(currencyFormatter({ currency: "PEN",  value:parseFloat(data[0]['bbva_v_s']) }));
           $('#caja_s').text(currencyFormatter({ currency: "PEN",  value:parseFloat(data[0]['caja_s']) }));
           $('#caja_d').text(currencyFormatter({ currency: "USD",  value:parseFloat(data[0]['caja_d']) }));
         
          
          const value =  parseFloat(data[0]['bcp_m_s'])+ parseFloat(data[0]['bbva_m_s'])+parseFloat(data[0]['bcp_o_s'])+parseFloat(data[0]['bcp_v_s'])+
            parseFloat(data[0]['bbva_v_s'])+parseFloat(data[0]['caja_s'])
            

            const SOLES = currencyFormatter({ currency: "PEN",  value:value  });
           
            $('#cta_total').text(SOLES);
            
       }
    }
  });
 }
// funcion moneda soles
function currencyFormatter({ currency, value}) {
  const formatter = new Intl.NumberFormat('es-PE', {
    style: 'currency',
    minimumFractionDigits: 2,
    currency
  }) 
  return formatter.format(value)
}
function saldoporPagar(){

  $.ajax({
    url:'controller/lista_compra.php?op=saldoporPagar',
    type:'GET',
    success:function(response){
    data = $.parseJSON(response);
       if (data.length>0) {
        $('#c_m_d').text(currencyFormatter({ currency: "USD",  value:parseFloat(data[0]['saldo_d_m']) }));
        $('#c_m_s').text(currencyFormatter({ currency: "PEN",  value:parseFloat(data[0]['saldo_s_m']) }));  
        $('#c_o_d').text(currencyFormatter({ currency: "USD",  value:parseFloat(data[0]['saldo_d_o']) }));  
        $('#c_o_s').text(currencyFormatter({ currency: "PEN",  value:parseFloat(data[0]['saldo_s_o']) }));         
       }
    }
  });
 }
 //funcion login

///