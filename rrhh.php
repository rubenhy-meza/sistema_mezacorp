<?php 
//require "db.php";   
require "config/conexion.php";
 if(isset($_SESSION['id'])){   
?>
<?php include ("include/head.php")?>
<script>
    $(document).ready(function()
		{
            $("input[name=flexRadioDefault]").change(function () {	 
			console.log($(this).val());
			});
            $("input[name=flexRadioDefault1]").change(function () {	 
			console.log($(this).val());
			});
		 });
</script>

<body id="page-top" class="sidebar-toggled">

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

                <!-- Begin Page Content -->
                <div class="container-fluid">
                   <div class="row">
                    
                        <!-- DISPONIBLE CORRIENTE-->
                        
                         <!-- FIN DISPONIBLE-->
                        <!--  LISTA POR COBRAR -->
                        <div class="col-md-6">
                            <div class="card shadow mb-4">
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold ">Lista de Colaboradores</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Acciones:</div>
                                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#Modaladdempleado">Agregar Empleado</a>
                                            <a class="dropdown-item" href="#">Imprimir</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">..</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                <div class="table-responsive">
                                
                                <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th></th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Cargo</th>
                <th>Salario</th>
                
            </tr>
        </thead>
        
    </table>
                            </div>
                                </div>
                            </div>
                        </div>
                        <!-- FIN ÑISTA POR COBRAR -->
                        <div class="col-md-6">
                            
                            </div>
                     </div> <!--FIN ROW-->
                      <!-- inicio tabla gastos fijo-->
                       <div class="row">
                            <div class="col-md-6">
                            <div class="title p-2"> Lista de Creditos P- Mensuales</div>
                               <div class="card">
                                  
                                  <div class="card-header">
                                  <div class="row">
                                                   <div class="col-md-1"><h6 class="m-0 font-weight-bold ">#</h6></div>
                                                   <div class="col-md-5"><h6 class="m-0 font-weight-bold ">Concepto </h6></div>
                                                   <div class="col-md-3"><h6 class="m-0 font-weight-bold ">Fecha de Pago</h6></div>
                                                   <div class="col-md-3">Monto</div>
                                              </div>
                                             </div>
                                  <div class="card-body">
                                       <div class=" mb-2">
                                            <!-- Card Header - Accordion -->
                                           <a href="#collapseCardExample" class="d-block card-header py-2" data-toggle="collapse"
                                               role="button" aria-expanded="false" aria-controls="collapseCardExample">
                                               <div class="row">
                                                   <div class="col-md-1"><h6 class="m-0 font-weight-bold ">1</h6></div>
                                                   <div class="col-md-5"><h6 class="m-0 font-weight-bold ">prestamo local-zotano mezacorp 2 </h6></div>
                                                   <div class="col-md-3"><h6 class="m-0 font-weight-bold ">01/07/2023</h6></div>
                                                   <div class="col-md-3" id="sal1">   S/ 9,504.78</div>
                                              </div>
                                           </a>
                                               <!-- Card Content - Collapse -->
                                          <div class="collapse" id="collapseCardExample">
                                               <div class="card-body">
                                                 Pendiente por pagar S/ 748,223.60
                                                         <strong>(114 cuotas pendientes)</strong> 
                                                         Nº de crédito: 100-194-00000006992766
                                              </div>
                                          </div>
                                      </div>
                                      <div class=" mb-2">
                                                <!-- Card Header - Accordion -->
                                           <a href="#collapseCardExample2" class="d-block card-header py-2" data-toggle="collapse"
                                                 role="button" aria-expanded="false" aria-controls="collapseCardExample2">
                                              <div class="row">
                                                     <div class="col-md-1"><h6 class="m-0 font-weight-bold ">2</h6></div>
                                                     <div class="col-md-5"><h6 class="m-0 font-weight-bold "> prestamo local mezacorp 1  #1129</h6></div>
                                                     <div class="col-md-3"><h6 class="m-0 font-weight-bold ">20/07/2023</h6></div>
                                                   <div class="col-md-3" id="sal2">   S/ 9,471.51</div>
                                             </div>
                                           </a>
                                                   <!-- Card Content - Collapse -->
                                           <div class="collapse" id="collapseCardExample2">
                                                 <div class="card-body">
                                                      Pendiente por pagar S/ 28491.30
                                                         <strong>(3 cuotas pendientes)</strong> 
                                                         Nº de crédito: 100-194-00000004744280
                                                 </div>
                                           </div>
                                      </div>  
                                      <div class=" mb-2">
                                                <!-- Card Header - Accordion -->
                                           <a href="#collapseCardExample3" class="d-block card-header py-2" data-toggle="collapse"
                                                 role="button" aria-expanded="false" aria-controls="collapseCardExample3">
                                              <div class="row">
                                                     <div class="col-md-1"><h6 class="m-0 font-weight-bold ">3</h6></div>
                                                     <div class="col-md-5"><h6 class="m-0 font-weight-bold "> prestamo jaime costruccion</h6></div>
                                                     <div class="col-md-3"><h6 class="m-0 font-weight-bold ">05/07/2023</h6></div>
                                                   <div class="col-md-3" id="sal3">   S/ 3,520.46</div>
                                             </div>
                                           </a>
                                                   <!-- Card Content - Collapse -->
                                           <div class="collapse" id="collapseCardExample3">
                                                 <div class="card-body">
                                                      Pendiente por pagar S/ 53010.00
                                                         <strong>(19 cuotas pendientes)</strong> 
                                                         Nº de crédito:100-191-00000006686694
                                                 </div>
                                           </div>
                                      </div>
                                      <div class=" mb-2">
                                                <!-- Card Header - Accordion -->
                                           <a href="#collapseCardExample4" class="d-block card-header py-2" data-toggle="collapse"
                                                 role="button" aria-expanded="false" aria-controls="collapseCardExample4">
                                              <div class="row">
                                                     <div class="col-md-1"><h6 class="m-0 font-weight-bold ">4</h6></div>
                                                     <div class="col-md-5"><h6 class="m-0 font-weight-bold ">  Reactiva 1 OMA</h6></div>
                                                     <div class="col-md-3"><h6 class="m-0 font-weight-bold "></h6></div>
                                                   <div class="col-md-3" id="sal4">   S/ 0.00</div>
                                             </div>
                                           </a>
                                                   <!-- Card Content - Collapse -->
                                           <div class="collapse" id="collapseCardExample4">
                                                 <div class="card-body">
                                                      Pagado
                                                         <strong>(0 cuotas pendientes)</strong> 
                                                         Nº de crédito:100-191-00000006656354
                                                 </div>
                                           </div>
                                      </div>
                                      <div class=" mb-2">
                                                <!-- Card Header - Accordion -->
                                           <a href="#collapseCardExample5" class="d-block card-header py-2" data-toggle="collapse"
                                                 role="button" aria-expanded="false" aria-controls="collapseCardExample5">
                                              <div class="row">
                                                     <div class="col-md-1"><h6 class="m-0 font-weight-bold ">5</h6></div>
                                                     <div class="col-md-5"><h6 class="m-0 font-weight-bold ">  Reactiva 2 OMA</h6></div>
                                                     <div class="col-md-3"><h6 class="m-0 font-weight-bold ">04/07/2023</h6></div>
                                                   <div class="col-md-3" id="sal5">   S/ 2,482.19</div>
                                             </div>
                                           </a>
                                                   <!-- Card Content - Collapse -->
                                           <div class="collapse" id="collapseCardExample5">
                                                 <div class="card-body">
                                                      Pendiente por pagar S/ 7402.20
                                                         <strong>(3 cuotas pendientes)</strong> 
                                                         Nº de crédito:100-191-00000006830604
                                                 </div>
                                           </div>
                                      </div>
                                      <div class=" mb-2">
                                                <!-- Card Header - Accordion -->
                                           <a href="#collapseCardExample6" class="d-block card-header py-2" data-toggle="collapse"
                                                 role="button" aria-expanded="false" aria-controls="collapseCardExample6">
                                              <div class="row">
                                                     <div class="col-md-1"><h6 class="m-0 font-weight-bold ">6</h6></div>
                                                     <div class="col-md-5"><h6 class="m-0 font-weight-bold ">Reactiva 1 VICTOR MEZA</h6></div>
                                                     <div class="col-md-3"><h6 class="m-0 font-weight-bold "></h6></div>
                                                   <div class="col-md-3" id="sal6">   S/ 0.0</div>
                                             </div>
                                           </a>
                                                   <!-- Card Content - Collapse -->
                                           <div class="collapse" id="collapseCardExample6">
                                                 <div class="card-body">
                                                      Pagado
                                                         <strong>(0 cuotas pendientes)</strong> 
                                                         Nº de crédito:100-191-00000006699261
                                                 </div>
                                           </div>
                                      </div>
                                      <div class=" mb-2">
                                                <!-- Card Header - Accordion -->
                                           <a href="#collapseCardExample7" class="d-block card-header py-2" data-toggle="collapse"
                                                 role="button" aria-expanded="false" aria-controls="collapseCardExample7">
                                              <div class="row">
                                                     <div class="col-md-1"><h6 class="m-0 font-weight-bold ">7</h6></div>
                                                     <div class="col-md-5"><h6 class="m-0 font-weight-bold ">Reactiva 2 VICTOR MEZA</h6></div>
                                                     <div class="col-md-3"><h6 class="m-0 font-weight-bold ">13/07/2023</h6></div>
                                                   <div class="col-md-3" id="sal7">   S/ 2,978.99</div>
                                             </div>
                                           </a>
                                                   <!-- Card Content - Collapse -->
                                           <div class="collapse" id="collapseCardExample7">
                                                 <div class="card-body">
                                                      Pendiente por pagar S/ 5926.20
                                                         <strong>(2 cuotas pendientes)</strong> 
                                                         Nº de crédito:100-191-00000006802202
                                                 </div>
                                           </div>
                                      </div>
                                      <div class=" mb-2">
                                                <!-- Card Header - Accordion -->
                                           <a href="#collapseCardExample8" class="d-block card-header py-2" data-toggle="collapse"
                                                 role="button" aria-expanded="false" aria-controls="collapseCardExample8">
                                              <div class="row">
                                                     <div class="col-md-1"><h6 class="m-0 font-weight-bold ">8</h6></div>
                                                     <div class="col-md-5"><h6 class="m-0 font-weight-bold ">Linea credito BBVA</h6></div>
                                                     <div class="col-md-3"><h6 class="m-0 font-weight-bold ">13/07/2023</h6></div>
                                                   <div class="col-md-3" id="sal8" data-value="">   S/ 9,978.99</div>
                                             </div>
                                           </a>
                                                   <!-- Card Content - Collapse -->
                                           <div class="collapse" id="collapseCardExample8">
                                                 <div class="card-body">
                                                      Pendiente por pagar S/ 98201.93
                                                         <strong>(11 cuotas pendientes)</strong> 
                                                         Nº de crédito:XXX-XXX-XXXXXXX
                                                 </div>
                                           </div>
                                      </div>
                                  </div>
                                  <div class="card-footer">
                                  <div class="d-flex flex-row-reverse">
                                           
                                                   <div class="col-md-3"><h6 class="m-0 font-weight-bold ">S/ 37,936.26</h6></div>
                                                   <div class="col-md-5"><h6 class="m-0 font-weight-bold">Total credito por pagar</h6></div>
                                              </div>
                                  </div>
                              </div>
                          </div>
                      <div class="col-md-6">
                          <div class="card">
                              <div class="card-header"> Gastos Fijos</div>
                              <div class="card-body">
                              <div class="accordion accordion-flush " id="accordionFlushExample">
                              <ul class="list-group">
                                  <li class="list-group-item " aria-disabled="true">
                                      <div class="accordion-item">
                                         <h2 class="accordion-header " id="flush-headingOne">
                                              <div class="row"> 
                                                     <div class="col-sm-1"><h6 class=" font-weight-bold ">1</h6></div>
                                                     <div class="col-sm-4"><h6 class=" font-weight-bold ">pago reactiva</h6></div>
                                                     <div class="col-sm-3"><h6 class=" font-weight-bold ">23/11/2022</h6></div>
                                                     <div class="col-sm-3"><h6 class=" font-weight-bold ">1623.56</h6></div>
                                                     <div class="col-sm-1">
                                                      <button class="accordion-button collapsed p-1" type="button" data-bs-toggle="collapse"
                                                       data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne"> </button>
                                                    </div>
                                               </div>
                                          </h2>
                                          <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                              <div class="accordion-body">
                                                   <div class="card">
                                                      <div class="card-body">
                                                            <h5 class="card-title">Detalle:</h5>
                                                             <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
   
                                                       </div>
                                                 </div>
                                              </div>
                                          </div>
                                      </div>
                                  </li>
                                  <li class="list-group-item"> 
                                      <div class="accordion-item ">
                                          <h2 class="accordion-header " id="flush-headingOne1">
                                             <div class="row"> 
                                                     <div class="col-sm-1"><h6 class=" font-weight-bold ">2</h6></div>
                                                     <div class="col-sm-4"><h6 class=" font-weight-bold ">pago reactiva 2</h6></div>
                                                     <div class="col-sm-3"><h6 class=" font-weight-bold ">15/12/2022</h6></div>
                                                     <div class="col-sm-3"><h6 class=" font-weight-bold ">1623.56</h6></div>
                                                     <div class="col-sm-1">
                                                          <button class="accordion-button collapsed p-1" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne1" aria-expanded="false" aria-controls="flush-collapseOne1"> 
                                                          </button>
                                                     </div>
                                             </div>
                                          </h2>
                                          <div id="flush-collapseOne1" class="accordion-collapse collapse" aria-labelledby="flush-headingOne1" data-bs-parent="#accordionFlushExample">
                                              <div class="accordion-body">
                                                    Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the first item's accordion body.
                                              </div>
                                          </div>
                                      </div>
                                    </li>
                               </ul> 
                              </div>
                             </div>
                           </div>
                      </div>
                              
    
                              </div>
                           </div>
                     </div>
                     <!--  fin gastos fijos-->
                   
                    
                   </div>
                   
                   </div>
                </div>
                <!-- /.container-fluid -->
                <!--inico modal agregar empleado-->
 <div class="modal fade" id="Modaladdempleado" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Formulario Empleado</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form acction="" id="form_add_empleado" name="form_add_empleado" method="POST" onsubmit="event.preventDefault();guardarEmpleado();">
            <div class="row " >
                <div class="col-md-4">
                  <div class="mb-3">
                  <label for="recipient-name" class="col-form-label">Apellido Paterno:</label>
                          <input type="text" class="form-control" id="recipient-name" name="apellidos_p" require>
                       
                   </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Apellido Materno:</label>
                       <input type="text" class="form-control" id="recipient-name" name="apellidos_m"require>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Nombres:</label>
                          <input type="text" class="form-control" id="recipient-name" name="nombres_e" require>
                    </div>
                </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                  <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Direccion:</label>
                          <input type="text" class="form-control" id="recipient-name" name="direccion_e" >
                       
                   </div>
                </div>
                <div class="col-md-3">
                  
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">DNI:</label>
                          <input type="text" class="form-control" id="numdoc" name="numdoc_e" require>
                    </div>
                
                </div>
                <div class="col-md-3">
                    <div class="mb-3"><label for="recipient-name" class="col-form-label">Tiene hijos?:</label>
                       <select class="form-select form-select" aria-label=".form-select example" id="hijo_e" name="hijo_e" >
                                <option selected value="">Seleccione:</option>
                                 <option  value="1">Si</option>
                                 <option  value='0'>No</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row " >
                <div class="col-md-4">
                  <div class="mb-3">
                       <label for="recipient-name" class="col-form-label">Cargo:</label>
                       
                       <select class="form-select form-select" aria-label=".form-select example" name="cargo_e" require>
                                 <option selected>Selecionar cargo</option>
                                <?php 
                                include('db.php');
                                $sql = "SELECT * FROM tabcar" ;
                                $data = mysqli_query($conn,$sql);
                                while($row= $data -> fetch_assoc())
                                 {
                                  ?>
                                   <option value="<?php echo $row['COD']; ?>"><?php echo $row['DES']; ?></option>
                                <?php
                                }
                                ?>
                        </select>
                   </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Fecha Nacimiento:</label>
                          <input type="date" class="form-control" id="recipient-name" name="fechanac_e"require>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3"><label for="recipient-name" class="col-form-label">Sexo:</label>
                       <div class="row">
                        <div class="col-md-3"> 
                            <div class="form-check">
                                <input  class="form-check-input" type="radio"  value="Masculino" name="sexo_em" id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1"> M</label>
                            </div>
                         </div>
                        <div class="col-md-3">
                             <div class="form-check">
                                   <input class="form-check-input" type="radio" value="Femenino" name="sexo_em" id="flexRadioDefault2" >
                                 <label class="form-check-label" for="flexRadioDefault2">F</label>
                             </div>
                        </div>
                    </div>
                          <input type="text" class="form-control" id="check_gen" name="sexo_e" require hidden>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Correo:</label>
                          <input type="text" class="form-control" id="recipient-name" name="correo_e" >
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Celular:</label>
                          <input type="text" class="form-control" id="recipient-name" name="celular_e" require>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        
                          <input type="text" class="form-control" id="check_st" name="estado_e" value="1" hidden require>
                         
                        
                    </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                     <div class="mb-3">
                          <label for="recipient-name" class="col-form-label">Sueldo:</label>
                          <input type="number" class="form-control" id="recipient-name" name="sueldo_e">
                    </div>
                </div>
                <div class="col-md-4">
                <div class="mb-3">
                          <label for="recipient-name" class="col-form-label">Nro Cuenta:</label>
                          <input type="text" class="form-control" id="num_cta" name="num_cta_e" placeholder="BCP-123456987">
                    </div>
                </div>
                

            </div>
         
        
      </div>
      <div class="modal-footer">
      <input type="hidden" class="form-control" id="recipient-name" name="action" value="addEmpleado">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary"  id="boton_form_rrhh">Guardar</button>
      </div>
      </form>
    </div>
  </div>
</div>
  <!-- fin modal agregar-->
<!-- inicio modal update empleado-->
<div class="modal fade" id="Modaladdempleado_u" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Actulizar Datos Empleado</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form acction="" id="form_add_empleado_u" name="form_add_empleado_u" method="POST" onsubmit="event.preventDefault();updateEmpleado();">
            <div class="row " >
                <div class="col-md-4">
                  <div class="mb-3">
                  <label for="recipient-name" class="col-form-label">Apellido Paterno:</label>
                          <input type="text" class="form-control" id="apellido_p_u" name="apellido_p_u" require>
                          <input type="text" class="form-control" id="codigo_u" name="codigo_u" hidden>
                   </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Apellido Materno:</label>
                       <input type="text" class="form-control" id="apellido_m_u" name="apellido_m_u"require>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Nombres:</label>
                          <input type="text" class="form-control" id="nombres_e_u" name="nombres_e_u" require>
                    </div>
                </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                  <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Direccion:</label>
                          <input type="text" class="form-control" id="direccion_e_u" name="direccion_e_u" >
                       
                   </div>
                </div>
                <div class="col-md-3">
                  
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">DNI:</label>
                          <input type="text" class="form-control" id="numdoc_e_u" name="numdoc_e_u" require>
                    </div>
                
                </div>
                <div class="col-md-3">
                    <div class="mb-3"><label for="recipient-name" class="col-form-label">Tiene hijos?:</label>
                       <select class="form-select form-select" aria-label=".form-select example" id="hijo_e_u" name="hijo_e_u" >
                                <option selected value="">Seleccione:</option>
                                 <option  value="1">Si</option>
                                 <option  value='0'>No</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row " >
                <div class="col-md-4">
                  <div class="mb-3">
                       <label for="recipient-name" class="col-form-label">Cargo:</label>
                       <select class="form-select form-select" aria-label=".form-select example" id="cargo_e_u" name="cargo_e_u" require>
                                 <option selected>Selecionar cargo</option>
                                <?php 
                                include('db.php');
                                $sql = "SELECT * FROM tabcar" ;
                                $data = mysqli_query($conn,$sql);
                                while($row= $data -> fetch_assoc())
                                 {
                                  ?>
                                   <option value="<?php echo $row['COD']; ?>"><?php echo $row['DES']; ?></option>
                                <?php
                                }
                                ?>
                        </select>
                   </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Fecha Nacimiento:</label>
                          <input type="date" class="form-control" id="fechanac_e_u" name="fechanac_e_u"require>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3"><label for="recipient-name" class="col-form-label">Sexo:</label>
                       <select class="form-select form-select" aria-label=".form-select example" id="sexo_e_u" name="sexo_e_u" require>
                                <option selected value="">Seleccione:</option>
                                 <option  value="Masculino">Masculino</option>
                                 <option  value='Femenino'>Femenino</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Correo:</label>
                          <input type="text" class="form-control" id="correo_e_u" name="correo_e_u" >
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Celular:</label>
                          <input type="text" class="form-control" id="celular_e_u" name="celular_e_u" require>
                    </div>
                </div>
                <div class="col-md-3">
                    
                    <div class="mb-3"><label for="recipient-name" class="col-form-label">Situacion:</label>
                       <select class="form-select form-select" aria-label=".form-select example" id="est_e_u" name="est_e_u" require>
                                <option selected value="">Seleccione:</option>
                                 <option  value="0">Activo</option>
                                 <option  value='1'>Desactivado</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                     <div class="mb-3">
                          <label for="recipient-name" class="col-form-label">Sueldo:</label>
                          <input type="number" class="form-control" id="sueldo_e_u" name="sueldo_e_u">
                    </div>
                </div>
                <div class="col-md-4"hidden>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Fecha Salida:</label>
                          <input type="date" class="form-control" id="fsalida_e_u" nname="fsalida_e_u"  value="0000-00-00" >
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">NRO Cuenta:</label>
                          <input type="text" class="form-control" id="numcta_e_u" name="numcta_e_u" >
                    </div>
                </div>
            </div>
      </div>
      <div class="modal-footer">
      <input type="hidden" class="form-control" id="recipient-name" name="action" value="updateEmpleado">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary"  id="boton_form_rrhh">Update</button>
      </div>
      </form>
    </div>
  </div>
</div>
  <!-- fin modal update empleado-->

  <!-- modal pago empleado-->
 <div class="modal fade" id="Pago_empleado" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <form> 
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel"> Generar Pago Empleado <?php  ?></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
       <div class="modal-body">
        <small>
              <div class="row"> 
                     <input type="text" class="form-control" id="id_e_p" name ="id_e_p" style="width:200px;height:30px" hidden>
                   <div class="col-md-6">
                     <div class="card">
                       <div class="card-body">
                          <div class=" row">
                            <label for="nom_e_p" class="col-sm-4 col-form-label" style="font-weight: bold;">Nombres:</label>
                            <div class="col-sm-8">
                               <input type="text" readonly class="form-control-plaintext" id="nom_e_p" name = "nom_e_p"  >
                            </div>
                          </div>
                          <div class=" row">
                            <label for="ape_e_p" class="col-sm-4 col-form-label" style="font-weight: bold;">Apellidos:</label>
                             <div class="col-sm-8">
                                <input type="text" readonly class="form-control-plaintext" id="ape_e_p"name = "ape_e_p"  >
                             </div>
                          </div>
                          <div class=" row">
                            <label for="dni_e_p" class="col-sm-4 col-form-label" style="font-weight: bold;">DNI:</label>
                             <div class="col-sm-8">
                              <input type="text" readonly class="form-control-plaintext"  id="dni_e_p" name = "dni_e_p"  >
                            </div>
                          </div>
                          <div class=" row">
                            <label for="fecha_nac_e_p" class="col-sm-4 col-form-label" style="font-weight: bold;">Fecha Nac:</label>
                             <div class="col-sm-8">
                               <input type="text" readonly class="form-control-plaintext"  id="fecha_nac_e_p"name = "fecha_nac_e_p"  >
                             </div>
                          </div>
                          <div class=" row">
                            <label for="hijos_e_p" class="col-sm-4 col-form-label" style="font-weight: bold;">Hijos:</label>
                            <div class="col-sm-8">
                             <input type="text" readonly class="form-control-plaintext"  id="hijos_e_p"name = "hijos_e_p"   >
                            </div>
                          </div>
                             <div class=" row">
                               <label for="dir_e_p" class="col-sm-4 col-form-label" style="font-weight: bold;">Direccion:</label>
                               <div class="col-sm-8">
                                 <input type="text" readonly class="form-control-plaintext"  id="dir_e_p"name = "dir_e_p"   >
                               </div>
                           </div>
                       </div>
                     </div>
                 </div>
                  <div class="col-md-6">
                     <div class="card">
                       <div class="card-body">
                          <div class=" row">
                              <label for="car_e_p" class="col-sm-4 col-form-label" style="font-weight: bold;">Cargo:</label>
                             <div class="col-sm-8">
                               <input type="text" readonly class="form-control-plaintext" id="car_e_p" name = "car_e_p" value="adminsitrados" >
                             </div>
                          </div>
                          <div class=" row">
                            <label for="sueldo_e_p" class="col-sm-6 col-form-label" style="font-weight: bold;">Sueldo Computable:</label>
                             <div class="col-sm-6">
                                <input type="number" readonly class="form-control-plaintext" id="sueldo_e_pago" name = "sueldo_e_pago"  >
                             </div>
                          </div>
                          <div class=" row">
                            <label for="AFP_e_p" class="col-sm-4 col-form-label" style="font-weight: bold;">AFP:</label>
                             <div class="col-sm-8">
                              <input type="text" readonly class="form-control-plaintext"  id="AFP_e_p"name = "AFP_e_p" value="PRIMA"  >
                            </div>
                          </div>
                          <div class=" row">
                            <label for="fecha_in_e_p" class="col-sm-4 col-form-label" style="font-weight: bold;">Fecha Ing:</label>
                             <div class="col-sm-8">
                               <input type="text" readonly class="form-control-plaintext"  id="fecha_in_e_p"name = "fecha_in_e_p" value="17/05/1990"  >
                             </div>
                          </div>
                          <div class=" row">
                            <label for="cta_e_p" class="col-sm-4 col-form-label" style="font-weight: bold;">NRO CTA:</label>
                            <div class="col-sm-8">
                             <input type="text" readonly class="form-control-plaintext"  id="cta_e_p"name = "cta_e_p" value="1942148453044"  >
                            </div>
                          </div>
                            <div class=" row">
                               <label for="per_e_p" class="col-sm-6 col-form-label" style="font-weight: bold;">Per. de Pago:</label>
                                <div class="col-sm-6">
                                <input type="text" readonly class="form-control-plaintext"  id="per_e_p"name = "per_e_p" value="mensual"  >
                               </div>
                           </div>
                       </div>
                     </div>
                  </div>
            </div>
           <div class="row">
               
                    
                      
                         <div class="col-md-4 p-3">
                               <div class="mb-2">
                                  <div class=" row">
                                    <label for="nom_e_p" class="col-sm-6 col-form-label" style="font-weight: bold;">Dias laborados:</label>
                                    <div class="col-sm-6">
                                        <input type="number" class="form-control" id="dias_e_p"name = "dias_e_p" value='0'>
                                    </div>
                                  </div>
                               </div>
                               <div class="mb-2">
                                  <div class=" row">
                                      <label for="nom_e_p" class="col-sm-6 col-form-label" style="font-weight: bold;">H. extras :</label>
                                     <div class="col-sm-6">
                                         <input type="number" class="form-control" id="hes_e_p"name = "hes_e_p" value='0'>
                                     </div>
                                  </div>
                              </div>
                              <div class="mb-2">
                                  <div class=" row">
                                      <label for="nom_e_p" class="col-sm-6 col-form-label" style="font-weight: bold;">H. extras x2:</label>
                                     <div class="col-sm-6">
                                         <input type="number" class="form-control" id="hesx2_e_p"name = "hesx2_e_p" value='0'>
                                     </div>
                                  </div>
                              </div>
                              <div class="mb-2">
                              <div class=" row">
                                      <label for="nom_e_p" class="col-sm-6 col-form-label" style="font-weight: bold;">Asig. Fam:</label>
                                     <div class="col-sm-6">
                                         <input type="number" class="form-control" id="asifam_e_p"name = "asifam_e_p" value='0'>
                                     </div>
                                  </div>
                             </div> 
                              
                        </div>
                        
                        <div class="col-md-4 p-3"> 
                           <div class="mb-2">
                                 <div class=" row">
                                      <label for="nom_e_p" class="col-sm-6 col-form-label" style="font-weight: bold;">AFP/ONP:</label>
                                     <div class="col-sm-6">
                                         <input type="number" class="form-control" id="AFP_e_p"name = "AFP_e_p" value='0'>
                                     </div>
                                  </div>
                                 
                             </div>
                           <div class="mb-2">
                                <div class=" row">
                                      <label for="nom_e_p" class="col-sm-6 col-form-label" style="font-weight: bold;">Faltas:</label>
                                     <div class="col-sm-6">
                                     <input type="number" class="form-control" id="faltas_e_p"name = "faltas_e_p">
                                     </div>
                                  </div>
                             
                             
                           </div>
                           <div class="mb-2">
                            
                            <label for="ret_e_p" class="col-form-label">Retenciones 5ta cat:</label>
                             <input type="text" class="form-control" id="ret_e_p"name = "ret_e_p">
                           </div>
                           <div class="mb-2">
                              <div class=" row">
                                      <label for="nom_e_p" class="col-sm-6 col-form-label" style="font-weight: bold;">Adelantos:</label>
                                     <div class="col-sm-6">
                                     <input type="number" class="form-control" id="ade_e_p"name = "ade_e_p">
                                     </div>
                                  </div>
                               <label for="ade_e_p" class="col-form-label"></label>
                              
                           </div>
                        </div>
                        <div class="col-md-4 p-3">   
                        <div class="mb-2">
                          
                              <label for="tr_e_p" class="col-form-label">Total de remuneraciones :</label>
                              <input type="text" class="form-control" id="tr_e_p"name = "tr_e_p">
                           </div>
                           <div class="mb-2">
                               <label for="td_e_p" class="col-form-label">Total de descuentos :</label>
                               <input type="text" class="form-control" id="td_e_p"name = "td_e_p">
                           </div>
                           <div class="mb-2">
                           <div class=" row">
                                      <label for="nom_e_p" class="col-sm-6 col-form-label" style="font-weight: bold;">Seguro salud:</label>
                                     <div class="col-sm-6">
                                     <input type="text" class="form-control" id="ae_e_p"name = "ae_e_p">
                                     </div>
                                  </div>
                             
                           </div>
                        </div>
           </div>
          </small>   
       </div><!--fin DIV MODAL BODY-->
       <div class="modal-footer">
            <div class="row">
               <div class="col-md-8">
                 <div class="input-group mb-6">
                    <span class="input-group-text" id="basic-addon3">Neto a Pagar : </span>
                    <input type="text" class="form-control" id="total_e_p"name = "total_e_p" aria-describedby="basic-addon3">
                 </div>
               </div> 
           </div>
           <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
           <button type="button" class="btn btn-primary">Pagar</button>
      </div>
      </form>
    </div>
    </div>
</div>
<!--fin modal pago empleado-->
</div>
<?php include ('include/footer.php');
}else{
    header("Location:login.php");
}?>
