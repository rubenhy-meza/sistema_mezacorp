<?php include ("include/head.php");
      include('config/conexion.php');

      if(isset($_SESSION['id'])){
  ?>
 <body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include ("include/adminControl.php")?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
             <div id="content">

                <!-- Topbar -->
                <?php include("include/actividad_nav.php");?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Total Pendientes</h1>
                    </div>
                    <div class="row">
                        <!-- card mezacorp -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Mezacorp (Soles)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800" id='c_m_s'></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-sun fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- car mezacorp -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Mezacorp(Dolares)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800" id='c_m_d'></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- card oma -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Oma (soles)
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"id='c_o_s'> </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-sun fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- card oma -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Oma (dolares)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800" id='c_o_d'></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <!-- DataTales Example  <a class="" data-bs-toggle="modal" data-bs-target="#exampleModal_search"> 
                                       
                                       </a>-->
                   <div class="card shadow mb-4">
                       <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Reguistro de Compras</h6>
                                     <div class="dropdown no-arrow">
                                       <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalToggle">
                                        <i class="fas fa-plus fa-sm fa-fw text-blue-400"></i>
                                       </button>
                                      
                                    </div>
                       </div>
                       <div class="card-body">
                            <div class="table-responsive"><small>
                                <table class="table table-bordered hover" id="DataTable_com" width="100%" cellspacing="0">
                                    <thead >
                                        <tr> 
                                            <th>#</th>
                                            <th>N° Doc</th>
                                            <th>Razon social</th>
                                            <th>Fecha Ing</th>
                                            <th>Vencimiento</th>
                                            <th>Importe</th>
                                            <th>Saldo Pendiente</th>
                                            
                                            <th>Obs</th> 
                                            <th>Sucursal</th>    
                                            <th>Acc</th>                                       
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr >
                                           <th>#</th>
                                            <th>N° Doc</th>
                                            <th>Razon social</th>
                                            <th>Fecha Ing</th>
                                            <th>Vencimiento</th>
                                            <th>Importe</th>
                                            <th>Saldo Pendiente</th>
                                            
                                             <th>Obs</th> 
                                            <th>Sucursal</th>    
                                            <th>Acc</th>                                          
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    </tbody>
                                </table></small>
                            </div>
                      </div>
                  </div>
                  </div>
               </div>
            </div>
         </div>
     </div>
                <!-- /.container-fluid -->
                <!-- modal ingresar ruc-->
 <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
              <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                         <div class="modal-header">
                               <h5 class="modal-title" id="exampleModalToggleLabel">INGRESE  N° RUC</h5>
                               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                         </div>
                         <div class="modal-body">
                               <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small validationCustom03 " placeholder="ingrese ..."
                                       aria-label="Search" aria-describedby="basic-addon2"  name="ruc" id="ruc" autofocus required>
                                    <div class="valid-feedback">
                                         Looks good!
                                    </div>
                                   <div class="input-group-append">
                                       <button class="btn btn-primary"  type="button"  onclick="getDataruc();" >
                                           <i class="fas fa-search fa-sm"></i>Buscar
                                       </button>
                                   </div>
                               </div>      
                          </div>            
                          <div class="modal-footer"> 
                            <div id="mensaje_busqueda_ruc"></div>
                          </div>
                   </div>
               </div>
</div>
              <!--  fin modal ingresar ruc-->
<!-- inicio create compra-->
 <small>
<div class="modal fade" id="exampleModalToggle2" tabindex="-1"  aria-labelledby="exampleModalToggleLabel2" aria-hidden="true">
   <div class="modal-dialog modal-lg">
     <div class="modal-content">
         <div class="modal-header">
             <h5 class="modal-title center" id="exampleModalLabel">Agregar Compras</h5>
             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>  
         </div> 
         <div class="modal-body">
            <form action="controller/lista_compra.php?op=create_com" method="POST">
                 <div class="row">
                    <div class="col-md-7">
                        <div class="mb-3" >
                            <label for="nomcli" class="form-label">NOMBRE PROVEEDOR </label>
                            <input type="text" class="form-control"  id="nom_cli" name="nom_cli" value="">
                         </div>
                    </div>
                    <div class="col-md-2">
                         <div class="mb-3"  >
                              <label for="nomcli" class="form-label">CODIGO </label>
                              <input type="text" class="form-control"  id="id_clipro" name="id_clipro" value="">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="estado" class="form-label">RUC.</label>
                            <input type="text" class="form-control" id="ruc_cli" name="ruc_cli" >
                        </div>
                    </div>
                 </div>
                <div class="row">
                    <div class="col-md-2">
                       <div class="mb-3">
                           <label for="id_mot" class="form-label">Tipo Doc</label>
                           <input type="list" class="form-control" id="id_motivo_com" name="id_doc"  value='1' hidden>
                           <select class="form-select form-control" aria-label="Default select " id="motivo_compra" >
                             <option selected value="1">1.Factura</option>
                             <option value="3">2.Boleta</option>
                             <option value="7">7.Nota de credito</option>
                             <option value="8">8.Nota de debito</option>
                             <option value="50">50.Letras de pago</option>
                             <option value="40">40.Nota de pedido</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                          <div class="mb-3">
                                 <label for="id_mot" class="form-label">N° Doc</label>
                                 <input type="list" class="form-control" id="num_doc" name="num_doc"   >
                          </div>
                    </div>
                    <div class="col-md-2">
                        <div class="mb-3">
                               <label for="prio" class="form-label">Moneda</label>
                               <input type="list" class="form-control" id="id_monC" name="id_mon"  value='1' hidden>
                               <div class="form-check">
                                      <input class="form-check-input " name='tipo_SC' type="checkbox" value="" id="defaultChecks"checked >
                                     <label class="form-check-label" for="defaultChecks">Soles</label>
                               </div>
                               <div class="form-check">
                                     <input class="form-check-input " name='tipo_DC' type="checkbox" value="" id="defaultCheckd" >
                                     <label class="form-check-label" for="defaultCheckd">Dolares</label>
                              </div>
                         </div>
                    </div>
                    <div class="col-md-4">
                         <div class="mb-3">
                               <label for="prio" class="form-label">Estado</label>
                               <select class="form-select form-control" aria-label="Default select example" id="estado_compra" >
                                  <option selected>Selecionar menu</option>
                                  <option selected  value="1">1.INGRESADO</option>
                                  <option value="2">2.OBSERVADO</option>
                                  <option value="3">3.PAGADO</option>
                                  <option value="4">4.APLICADO</option>
                                </select>
                                <input type="list" class="form-control" id="id_estado_com" name="id_situ" value="1" hidden>
                         </div>
                     </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                         <div class="mb-3">
                            <label for="fentrega" class="form-label">Fecha Doc.</label>
                            <input type="date" class="form-control" id="fecha" name="fecha" value="">
                         </div>
                     </div>
                    <div class="col-md-4">
                         <div class="mb-3">
                            <label for="fentrega" class="form-label">Fecha Vencimiento.</label>
                            <input type="date" class="form-control" id="fepago" name="fecha_pago" value="">
                         </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="estado" class="form-label">Total Doc.</label>
                            <input type="number" class="form-control" id="estado" name="total" value="" step="0.01">
                        </div>
                    </div>
                </div>
                <div class='row'>
                     <div class="col-md-6">
                        <div class="mb-5">
                             <label for="desc" class="form-label">Observaciones</label>
                             <textarea class="form-control" id="desc"  name ="obs" rows="3" >..</textarea>
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="mb-3">
                           <label for="id_suc" class="form-label">Sucursal</label>
                           <input type="list" class="form-control" id="id_suc" name="id_suc"  value='1' hidden>
                           <select class="form-select form-control" aria-label="Default select " id="suc_compra" > 
                             <option selected value="1">1.Mezacorp</option>
                             <option value="2">2.Oma</option>
                             <option value="3">3.Victor Meza</option>
                            </select>
                        </div>
                     </div>
                     <div class="col-md-3">
                         <div class="mb-3">
                            <label for="estado" class="form-label"> Dias Plazo</label>
                            <input type="text" class="form-control" id="plazo" name="plazo" value="30">
                         </div>
                     </div>
                </div>
        </div>
        <div class="modal-footer">
                    <input type="submit" class='btn btn-success btn-' name='btn_addcom' value='Guardar'>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>
         </form>  
    </div> 
  </div>
</div>
</small>
<!--///inicio modal  update compra-->
<small>
<div class="modal fade" id="exampleModalToggle3" tabindex="-1" aria-labelledby="exampleModalToggleLabel2" aria-hidden="true">
   <div class="modal-dialog modal-lg">
     <div class="modal-content">
         <div class="modal-header">
             <h5 class="modal-title center" id="exampleModalLabel">Actualizar Reguistro</h5>
             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>  
         </div> 
         <div class="modal-body"><!-- action="controller/lista_compra.php?op=updateCompra"-->
            <form  method="POST" id="form_update_compra" onsubmit="event.preventDefault();updateCompra();">
                 <div class="row">
                    <div class="col-md-7">
                        <div class="mb-3" >
                            <label for="nomcli" class="form-label">NOMBRE PROVEEDOR </label>
                            <input type="text" class="form-control" id="id_u" name="id_u"  value='' hidden>
                            <input type="text" class="form-control"  id="nom_cli_u" name="nom_cli_u" value="" disabled>
                         </div>
                    </div>
                    <div class="col-md-2">
                         <div class="mb-3"  >
                              <label for="nomcli" class="form-label">CODIGO </label>
                              <input type="text" class="form-control"  id="id_clipro_u" name="id_clipro_u" value="">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="estado" class="form-label">RUC.</label>
                            <input type="text" class="form-control" id="ruc_cli_u" name="ruc_cli_u" disabled>
                        </div>
                    </div>
                 </div>
                <div class="row">
                    <div class="col-md-2">
                       <div class="mb-3">
                           <label for="id_mot" class="form-label">Tipo Doc</label>
                           
                           <select class="form-select form-control" aria-label="Default select " id="id_doc_u" name="id_doc_u" >
                             <option selected value="1">1.Factura</option>
                             <option value="3">2.Boleta</option>
                             <option value="7">7.Nota de credito</option>
                             <option value="8">8.Nota de debito</option>
                             <option value="50">50.Letras de pago</option>
                             <option value="40">40.Nota de pedido</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                          <div class="mb-3">
                                 <label for="id_mot" class="form-label">N° Doc</label>
                                 <input type="list" class="form-control" id="num_doc_u" name="num_doc_u"   >
                          </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                        <div class="mb-3">
                         <label for="prio" class="form-label">Moneda</label>
                         <select class="form-select form-control" aria-label="Default select " id="sel_mon_u" name="sel_mon_u">
                         <option value="0">Seleccionar</option>
                         <option  value="1">Soles</option>
                             <option value="2">Dolares</option> 
                            </select>
                    </div>
                         </div>
                    </div>
                    <div class="col-md-4">
                         <div class="mb-3">
                               <label for="prio" class="form-label">Estado</label>
                               <select class="form-select form-control" aria-label="Default select example" id="id_situ_u" name="id_situ_u" >
                                  <option selected>Selecionar menu</option>
                                  <option selected  value="1">1.PENDIENTE</option>
                                  <option value="2">2.OBSERVADO</option>
                                  <option value="3">3.PAGADO</option>
                                  <option value="4">4.APLICADO</option>
                                </select>
                                
                         </div>
                     </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                         <div class="mb-3">
                            <label for="fentrega" class="form-label">Fecha Doc.</label>
                            <input type="date" class="form-control" id="fecha_u" name="fecha_u" value="">
                         </div>
                     </div>
                    <div class="col-md-4">
                         <div class="mb-3">
                            <label for="fentrega" class="form-label">Fecha Vencimiento.</label>
                            <input type="date" class="form-control" id="fecha_pago_u" name="fecha_pago_u" value="">
                         </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="estado" class="form-label">Total Doc.</label>
                            <input type="number" class="form-control" id="total_u" name="total_u" value="" step="0.01">
                        </div>
                    </div>
                </div>
                <div class='row'>
                     <div class="col-md-6">
                        <div class="mb-5">
                             <label for="desc" class="form-label">Observaciones</label>
                             <textarea class="form-control" id="obs_u"  name ="obs_u" rows="3" >..</textarea>
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="mb-3">
                           <label for="id_suc" class="form-label">Sucursal</label>
                           
                           <select class="form-select form-control" aria-label=" " id="id_suc_u" name="id_suc_u" > 
                             <option  value="1">1.Mezacorp</option>
                             <option value="2">2.Oma</option>
                             <option value="3">3.Victor Meza</option>
                            </select>
                        </div>
                     </div>
                     
                </div>
        </div>
        <div class="modal-footer">
                    <input type="submit" class='btn btn-success btn-' name='btn_update' value='Update' >
                    
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" oonclick="location.reload()">Cerrar</button>
        </div>
         </form>  
    </div> 
  </div>
</div>
</small>
<!--///modal  fin update compra-->
<!--///modal  modal pago-->
<div class="modal fade" id="modalPago" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header  ">
       <strong class=""> <h5 class="modal-title" id="exampleModalLabel "> Documento N° :<span id='det_numdoc'></span></h5></strong>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
    <form action="controller/lista_compra.php?op=create_pago" method="POST" class="needs-validation" >
        <input class="form-control" id="num_doc_pago" name="num_doc_pago" hidden></input>
        <input class="form-control" id="imp_doc_pago" name = "imp_doc_pago" hidden></input>
        <input class="form-control" id="pen_pago_info" name="pen_pago_info" hidden></input><!-- revisar -->
        <input class="form-control" id="saldo_doc_pago" name="saldo_doc_pago" hidden></input>
        <input class="form-control" id="mon_doc_pago" name="mon_doc_pago" hidden></input>
          <!--informacion de factura a pagar-->
          <ul class="list-group " >
                 <li class="list-group-item d-flex justify-content-between align-items-center">
                    <strong>Razon social :</strong>
                    <span class="badge bg-ligth rounded-pill text-secondary" id='cliente_pago'></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <strong> <label >Importe original :</strong>
                    <span class="badge bg-ligth rounded-pill text-secondary" id='total_pago'></span>
                </li>
                 <li class="list-group-item d-flex justify-content-between align-items-center"><strong> 
                    <label >Total pagado :</strong>
                     <span class="badge bg-ligth rounded-pill text-secondary" id='pen_pago' name="total_pagado"></span>


                </li><!--saldo a pagar-->
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <strong> <label >Saldo :</strong>
                     <span class="badge bg-ligth rounded-pill text-secondary" id='saldo_pago' name="saldo_pagar"></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                     <strong> <label >Facturado a :</strong>
                     <span class="badge bg-ligth rounded-pill text-secondary" id='sucursal' name="sucursal"></span>
                </li>
          </ul>
          <div class="row">
             <div class="col-6 mb-3">
               <strong> <label for="message-text" class="col-form-label">Importe a Pagar</label></strong>
                    <input  type ="number"class="form-control" id="importe_pago" name="importe_pago" required step="0.01"></input>
              </div>
             <div class="col-6 mb-3">
                   <strong> <label for="message-text" class="col-form-label">Referencia de Pago</label></strong>
                     <input class="form-control" id="referencia_pago" name ="referencia_pago" required></input>
             </div>
          </div>
          <!--fin de lista--->
          <div class="row">
              <div class="col-md-6">
                <input type="list" class="form-control" id="id_mon_pago" name="id_mon_pago"  value='1' hidden>
                <label for="prio" class="form-label">Moneda</label></div>
              <div class="col-md-6">
                <input type="list" class="form-control" id="id_met" name="id_met" value="1" hidden>
              <label for="prio" class="form-label">Metodo de Pago</label></div>
          </div>
          <div class="row">
               <div class="col-md-3">
                        <div class="mb-3">  
                               <div class="form-check">
                                      <input class="form-check-input " name='tipo_SC' type="checkbox" value="2" id="defaultChecks"checked >
                                     <label class="form-check-label" for="defaultChecks">Soles</label>
                               </div>
                         </div>
              </div>
              <div class="col-md-3">
                 <div class="md-3">
                     <div class="form-check">
                                     <input class="form-check-input " name='tipo_DC' type="checkbox" value="1" id="defaultCheckd" >
                                     <label class="form-check-label" for="defaultCheckd">Dolares</label>
                     </div>
                 </div>
              </div>
              <div class="col-md-4">
                         <div class="mb-2">
                               <select class="form-select form-control" aria-label="Default select example" id="metodo_pago" >                                
                                  <option selected  value="1">Deposito</option>
                                  <option value="2">Efectivo</option>
                                  <option value="3">Tarjeta</option>
                                  <option value="4">Nota de Credito</option>
                                </select>
                         </div>   
              </div>  
              <div class="mb-3">
                         <label for="prio" class="form-label">Bancos</label>
                         <select class="form-select form-control" aria-label="Default select CAJA" id="ban_com" >
                             <option >Selecionar </option>
                             <option  value="1">BCP MEZACORP</option>
                             <option value="2">BCP OMA</option>
                             <option value="3">BCP VICTOR MEZA</option>
                             <option value="4">BBVA VICTOR MEZA</option>
                             <option value="5">BBVA MEZACORP</option>
                             <option value="6">CAJA</option>
                             <option value="10">OTROS</option>
                            </select>
                            
                        <input type="hidden" class="form-control" id="id_banco" name="id_ban"   >
                     </div>    
                     <script>
                         
                var banco = document.getElementById('ban_com');      
                var metodo_pago = document.getElementById('metodo_pago');
               if(banco){
                  banco.addEventListener('change',function(){
                     $('#id_banco').val(this.options[banco.selectedIndex].value);
                  });
                }
                metodo_pago.addEventListener('change',function(){
                $('#id_met').val(this.options[metodo_pago.selectedIndex].value);
                  });

                 
                     </script>        
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class='btn btn-success btn-' name='btn_addpago' value='Guardar'>Pagar</button>
      </div>
    </form>
    </div>
  </div>
</div>
<!--final modal pago -->
 <!-- modal buscar documento-->
    <!-- modal ingresar DOCUMENTO-->
<div class="modal fade" id="exampleModalToggleB" aria-hidden="true" aria-labelledby="exampleModalToggleLabelB" tabindex="-1">
              <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                         <div class="modal-header">
                               <h5 class="modal-title" id="exampleModalToggleLabeB">Buscar por N° Documento</h5>
                               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                         </div>
                         <div class="modal-body">
                               <div class="input-group">
                                    <input type="text" style="text-transform:uppercase;"  class="form-control bg-light border-0 small validationCustom03 " placeholder="F00100053645"
                                       aria-label="Search" aria-describedby="basic-addon2"  name="doc_busqueda" id="doc_busqueda" autofocus required>
                                    <div class="valid-feedback">  
                                    </div>
                                   <div class="input-group-append">
                                       <button class="btn btn-primary"  type="button" data-bs-target="#exampleModalToggle4" data-bs-toggle="modal" onclick="buscarNumdoc( $('#doc_busqueda').val());" >
                                           <i class="fas fa-search fa-sm"></i>Buscar
                                       </button>
                                   </div>
                               </div>      
                          </div>            
                          <div class="modal-footer"> 
                           <small> <span>No considerar "-" ni espacios!!!</span></small>
                          </div>
                   </div>
               </div>
</div>
              <!--  fin modal ingresar n°documento-->
              <!-- inicio editar el documento-->

 <div class="modal fade" id="exampleModalToggle4" tabindex="-1" aria-labelledby="exampleModalToggleLabel4" aria-hidden="true">
         <div class="modal-dialog modal-lg">
            <div class="modal-content">
                 <div class="modal-header">
                       <h5 class="modal-title center" id="exampleModalLabel"> Informacion del Documento</h5>
                       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>  
                 </div> 
                 <div class="modal-body">
                    <ul class="list-group">
                       <li class="list-group-item d-flex justify-content-between align-items-center">
                         <strong>Razon social :</strong>
                         <span class="badge bg-ligth rounded-pill" id='cliente_pago_info'></span>
                       </li>
                       <li class="list-group-item d-flex justify-content-between align-items-center">
                               <strong> <label >Importe original :</strong>
                            <span class="badge bg-ligth rounded-pill" id='total_pago_info'></span>
                       </li>
                       <li class="list-group-item d-flex justify-content-between align-items-center"><strong> 
                              <label >Total pagado :</strong>
                           <span class="badge bg-ligth rounded-pill" id='pen_pago_info' name="total_pagado_info"></span>
                       </li><!--saldo a pagar-->
                       <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <strong> <label >Saldo Pendiente :</strong>
                               <span class="badge bg-ligth rounded-pill" id='saldo_pago_info' name="saldo_pagar_info"></span>
                       </li>
                       <li class="list-group-item d-flex justify-content-between align-items-center">
                                 <strong> <label >Facturado a :</strong>
                                  <span class="badge bg-ligth rounded-pill" id='sucursal_info' name="sucursal"></span>
                       </li>
                       <li class="list-group-item d-flex justify-content-between align-items-center">
                                 <strong> <label >Estado  :</strong>
                                  <span class="badge bg-ligth rounded-pill" id='estado_info' name="sucursal"></span>
                       </li>
                       <li class="list-group-item d-flex justify-content-between align-items-center">
                                 <strong> <label >Estado Sunat :</strong>
                                  <span class="badge bg-ligth rounded-pill" id='rptsunat_info' name="sucursal"></span>
                       </li>
                    </ul>
                 </div>
                 <div class="modal-footer">      
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                 </div>
             </div> 
          </div>
 </div>
 
 <!-- fin modales buscar documento-->


<script>
   

     var est_compra = document.getElementById('estado_compra');      
     var motivo_compra = document.getElementById('motivo_compra');
     var suc_compra = document.getElementById('suc_compra');
     
     if(motivo_compra){
          motivo_compra.addEventListener('change',function(){
          $('#id_motivo_com').val(this.options[motivo_compra.selectedIndex].value);
          });
       }
      if(est_compra) {    
         est_compra.addEventListener('change',function(){
            $('#id_estado_com').val(this.options[est_compra.selectedIndex].value);
          });
        }   
        if(suc_compra) {    
         suc_compra.addEventListener('change',function(){
            $('#id_suc').val(this.options[suc_compra.selectedIndex].value);
          });
        } 
         
        
        
</script>
  
        
         
            <?php include ('include/footer.php');
            }else{ header("Location:login.php"); }
            ?>
 </div> 