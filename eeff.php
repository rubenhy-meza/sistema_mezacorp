<?php

require "config/conexion.php";
 if(isset($_SESSION['id'])){
   // $_SESSION['message']='existe una session en curso!!!' . $_SESSION["nombre"].'!!' ;
?>

<?php include ("include/head.php")?>

<body id="page-top" class="sidebar-toggled">
    <?php
if(isset($_SESSION['message'])){
       echo' <div class="alert alert-success warning alert-dismissible fade show" role="alert">
       '.$_SESSION['message'].'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
        unset($_SESSION['message']);
       }
?>
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
                    <!-- Content Row -->
                   
                     <button class="unstyled-button m-0 font-weight-bold text-primary p-2"  id="example-one" 
                       data-text-swap="+ Ver saldos" data-text-original="- Ocultar saldos">+ Ver saldos</button>
                        <script>
                            $("#example-one").on("click", function() {
                              var el = $(this);
                              $('#versal').css('display','block');  
                             
                             el.text() == el.data("text-swap")  ? el.text(el.data("text-original") ): el.text(el.data("text-swap"));
                             if( el.text() ==  el.data("text-swap") )
                             {$('#versal').css('display','none');}  
                           });
                        </script>
                     <div id="versal"  style="display:none;" >  
                     <div class="row" >
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-3 " >
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body p-2" >
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                               <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"> CUENTA MEZACORP</div>
                                               <div class="h6 mb-0  text-gray-800 small" > Disponible  Soles BCP:  <span class="font-weight-bold"  id='bcp_m_s'></span></div>
                                               <div class="h6 mb-0  text-gray-800 small" > Disponible  Soles BBVA:  <span class="font-weight-bold"   id='bbva_m_s'></span></div>
                                                <div class="h6 mb-0  text-gray-800 small" >Disponible   Dolares BCP:  <span class="font-weight-bold"  id='bcp_m_d'></span></div>
                                       </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-3">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body p-2">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            CUENTA OMA</div>
                                            <div class="h6 mb-0  text-gray-800 small" >Disponible  Soles: <span class="font-weight-bold" id='bcp_o_s'></span></div>
                                            <div class="h6 mb-0  text-gray-800 small" >Disponible  Dolares: <span class="font-weight-bold" id='bcp_o_d'></span> </div>
                                            
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-3">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body p-2">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">CUENTA VICTOR MEZA
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"></div>
                                                </div>
                                                <div class="col">
                                                <div class="h6 mb-0 small text-gray-800" >Disponible BCP  Soles: <span class="font-weight-bold" id='bcp_v_s'></span> </div>
                                                <div class="h6 mb-0 small text-gray-800" >Disponible BBVA Soles:  <span class="font-weight-bold" id='bbva_v_s'></span></div>                                      
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-3">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body p-2">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                              CUENTA CAJA CHICA</div>
                                            
                                             <div class="h6 mb-0 small text-gray-800" >Disponible  Soles: <span class="font-weight-bold" id='caja_s'></span> </div>
                                             <div class="h6 mb-0 small text-gray-800" >Disponible  Dolares: <span class="font-weight-bold" id='caja_d'></span> </div>                                      
                                             <div class="h6 mb-0 small text-gray-800" >Disponible Total : <span class="font-weight-bold" id='cta_total'></span> </div>                                      
                                             
                                            
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                     </div>
                     </div>
                      <!-- Content Row -->

                     <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-2 ">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-2 d-flex flex-row align-items-center justify-content-between  ">
                                    <h6 class="m-0 font-weight-bold text-primary ">Lista Movimientos</h6>
                                    <div class="dropdown no-arrow ">
                                       <a class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal_search"> 
                                       <i class="fas fa-search fa-sm fa-fw text-blue-400"></i>
                                       </a>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                            <div class="table-responsive">
                                <small style="font-size: 12px;">
                                <table class="table table-bordered hover" id="DataTable_mov"   width="100%" cellspacing="0" >
                                    <thead >
                                        <tr> 
                                             <th>#</th>
                                             <th>Detalle de Operacion</th>
                                            <th>Cuenta</th>
                                            <th>Fecha Reg </th> 
                                            <th>Monto</th>                                   
                                            <th>Accion</th>                                        
                                        </tr>
                                    </thead>
                                   
                                    <tbody>   
                                    </tbody>
                                </table></small>
                            </div>
                                </div>
                            </div>
                        </div>
                        <!--modal add movimeinto-->

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-2 d-flex flex-row align-items-center justify-content-between ">
                                    <h6 class="m-0 font-weight-bold text-primary">Reguistar Movimiento</h6>      
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                 <div class="modal-body">
                                   <form  method="POST" id="form_create_mov" onsubmit="event.preventDefault();crear_movimiento();">  
            <div class="row">
                <DIV id="MSG"></DIV>
                <DIV id="MSG1"></DIV>
            <div class="col-md-4"> 
               <div class="mb-3">
                         <label for="prio" class="form-label"> Movimiento</label>
                         <div class="form-check">
                             <input class="form-check-input " name='tipo_in' type="checkbox" value="" id="defaultCheck1" checked >
                            <label class="form-check-label" for="defaultCheck1">Ingreso</label>
                        </div>
                        <div class="form-check">
                             <input class="form-check-input " name='tipo_sa' type="checkbox" value="" id="defaultCheck2" >
                            <label class="form-check-label" for="defaultCheck2">Salida</label>
                        </div>
                        <input type="hidden" class="form-control" id="movimiento" name="id_mov" value="1"  >
                     </div>
              </div>
               <div class="col-md-4"> 
                    <div class="mb-3">
                         <label for="prio" class="form-label">Moneda</label>
                      
                         <input type="hidden" class="form-control" id="id_mon" name="id_mon"  value='1' >
                        
                        <div class="form-check">
                             <input class="form-check-input " name='tipo_s' type="checkbox" value="" id="defaultChecks"checked >
                            <label class="form-check-label" for="defaultChecks">Soles</label>
                        </div>
                        <div class="form-check">
                             <input class="form-check-input " name='tipo_d' type="checkbox" value="" id="defaultCheckd" >
                            <label class="form-check-label" for="defaultCheckd">Dolares</label>
                        </div>
                    </div>
               </div>
               <div class="col-md-4" > 
                    <div class="mb-3">
                         <label for="id_mot" class="form-label">Motivo</label>
                         <input type="hidden" class="form-control" id="id_mot" name="id_mot"  value='1' >
                         <select class="form-select form-control" aria-label="Default select " id="motivo" >
                         <option value="0">Seleccionar</option>
                         <option selected value="1">Ventas</option>
                             <option value="2">Compras</option>
                             <option value="3">Gastos</option>
                             <option value="4">Cta_Cta</option>
                             <option value="5">Devoluciones</option >
                            </select>
                        
                    </div>
               </div>
              
           </div>
           <div class="row">
              <div class="col-md-6"> 
                 <div class="mb-3">
                         
                     </div>
                 </div>
              <div class="col-md-6"> 
                  <div class="mb-3" hidden>
                      <label for="recipient-name" class="col-form-label">Fecha</label>
                      <input type="date" class="form-control" nname="fecha"  value = "<?php echo ( date('d/m/Y h:i:s'))?>">
                  </div> 
              </div>
           </div>
           <div class="row">
               <div class="col-md-6 "> 
                     <div class="mb-3">
                            <label for="monto" class="col-form-label">Ingrese Monto</label>
                        <input type="number" class="form-control"  id='monto'name="monto" autofocus step="0.01" >
                    </div>
                    <div class="error-message">
                            <label for="monto" class="col-form-label">Ingrese Monto en numeros</label>
                    </div>
               </div>
               <div class="col-md-6"> 
                     <div class="mb-3">
                         <label for="prio" class="form-label">Bancos</label>
                         <select class="form-select form-control" aria-label="Default select CAJA" id="ban" >
                             <option >Selecionar </option>
                             <option  value="1">BCP MEZACORP</option>
                             <option value="2">BCP OMA</option>
                             <option value="3">BCP VICTOR MEZA</option>
                             <option value="4">BBVA VICTOR MEZA</option>
                             <option value="5">BBVA MEZACORP</option>
                             <option value="6">CAJA</option>
                            </select>
                            
                        <input type="hidden" class="form-control" id="id_ban" name="id_ban"   >
                     </div>
              </div>
           </div>
           <div class="mb-3">
           <div class="mb-3">
             <div class="row small">
            <div class="col-md-4">
                        <div class="form-check">
                             <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="Deposito op:" >
                             <label class="form-check-label" for="exampleRadios1">
                              Depositos
                            </label>
                        </div>
            </div>
            <div class="col-md-4">
                 <div class="form-check">
                      <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="Tarjeta">
                      <label class="form-check-label" for="exampleRadios2">
                           Tarjeta C/D
                      </label>
                </div>
            </div>
            <div class="col-md-4">
                  <div class="form-check">
                      <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="Efectivo ventas dia " >
                      <label class="form-check-label" for="exampleRadios3">
                       Pagos Efectivo
                     </label>
                 </div>
            </div>
           </div>
           </div>

           </div>
          <div class="mb-3">
            <label for="det" class="col-form-label">Detalle</label>
            <textarea class="form-control" id="det" name="detalle" value="">Ventas yape</textarea>
          </div>
          
          
         
             <div class="d-grid gap-2 ">
               <button type="submit" class='btn btn-success ' name='btn_addmov' value='Guardar'><i class="fa-regular fa-floppy-disk"></i> Guardar</button>
             </div>
        
          </form>
          <?php
              if(isset($_SESSION['success'])){
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                }
                if(isset($_SESSION['erro'])){
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                }
                ?>
        </div>



                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i> Direct
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> Social
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-info"></i> Referral
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-6 mb-4">

                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Projects</h6>
                                </div>
                                <div class="card-body">
                                    <h4 class="small font-weight-bold">Server Migration <span
                                            class="float-right">30%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 30%"
                                            aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Sales Tracking <span
                                            class="float-right">40%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 40%"
                                            aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Customer Database <span
                                            class="float-right">60%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar" role="progressbar" style="width: 60%"
                                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Payout Details <span
                                            class="float-right">80%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 80%"
                                            aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Account Setup <span
                                            class="float-right">Complete!</span></h4>
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%"
                                            aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Color System -->
                            <div class="row">
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-primary text-white shadow">
                                        <div class="card-body">
                                            Primary
                                            <div class="text-white-50 small">#4e73df</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-success text-white shadow">
                                        <div class="card-body">
                                            Success
                                            <div class="text-white-50 small">#1cc88a</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-info text-white shadow">
                                        <div class="card-body">
                                            Info
                                            <div class="text-white-50 small">#36b9cc</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-warning text-white shadow">
                                        <div class="card-body">
                                            Warning
                                            <div class="text-white-50 small">#f6c23e</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-danger text-white shadow">
                                        <div class="card-body">
                                            Danger
                                            <div class="text-white-50 small">#e74a3b</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-secondary text-white shadow">
                                        <div class="card-body">
                                            Secondary
                                            <div class="text-white-50 small">#858796</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-light text-black shadow">
                                        <div class="card-body">
                                            Light
                                            <div class="text-black-50 small">#f8f9fc</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-dark text-white shadow">
                                        <div class="card-body">
                                            Dark
                                            <div class="text-white-50 small">#5a5c69</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-6 mb-4">

                            <!-- Illustrations -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Illustrations</h6>
                                </div>
                                <div class="card-body">
                                    <div class="text-center">
                                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                                            src="img/undraw_posting_photo.svg" alt="...">
                                    </div>
                                    <p>Add some quality, svg illustrations to your project courtesy of <a
                                            target="_blank" rel="nofollow" href="https://undraw.co/">unDraw</a>, a
                                        constantly updated collection of beautiful svg images that you can use
                                        completely free and without attribution!</p>
                                    <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on
                                        unDraw &rarr;</a>
                                </div>
                            </div>

                            <!-- Approach -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Development Approach</h6>
                                </div>
                                <div class="card-body">
                                    <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce
                                        CSS bloat and poor page performance. Custom CSS classes are used to create
                                        custom components and custom utility classes.</p>
                                    <p class="mb-0">Before working with this theme, you should become familiar with the
                                        Bootstrap framework, especially the utility classes.</p>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
            <script>
                var ban = document.getElementById('ban');      
               var mot = document.getElementById('motivo');
               if(ban){
                  ban.addEventListener('change',function(){
                     $('#id_ban').val(this.options[ban.selectedIndex].value);
                  });
                }
             if(mot) {    
                  mot.addEventListener('change',function(){
                   $('#id_mot').val(this.options[mot.selectedIndex].value);
                   //console.log(mot.value);
                   var motivo = mot.value;                               
                    if(motivo == 1){ $('#movimiento').val('1') ;}
                    if(motivo == 2){ $('#movimiento').val('2') ;}
                    if(motivo == 3){ $('#movimiento').val('2') ; }
                    if(motivo==4){
                        document.getElementById("MSG").innerHTML =
                        '<div class="alert alert-warning alert-dismissible fade show" role="alert"> Revisar Movimiento entrada o salida !!.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';   
                    }
                });
            }     
            </script>

<?php include ('include/footer.php');
}else{
    header("Location:login.php");
}?>

<!-- Modal  edit mov-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Actualizar Movimeinto  : </span></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="" method="POST" id="form_update_movimiento" onsubmit="event.preventDefault();update_movimiento();">  
            <div class="row">
            <div class="col-md-4"> 
               <div class="mb-3">
               <input type="hidden" class="form-control"  id='id_edit_mov' name="id" >
                         <label for="prio" class="form-label" > Movimiento</label>
                         <select class="form-select form-control" aria-label="Default select " id="sel_mov_e" name="sel_mov_e" >
                         <option value="0">Seleccionar</option>
                         <option  value="1">Ingreso</option>
                             <option value="2">Salida</option> 
                            </select>
                         
              </div></div>
               <div class="col-md-4"> 
                    <div class="mb-3">
                         <label for="prio" class="form-label">Moneda</label>
                         <select class="form-select form-control" aria-label="Default select " id="sel_mon_e" name="sel_mon_e">
                         <option value="0">Seleccionar</option>
                         <option  value="1">Soles</option>
                             <option value="2">Dolares</option> 
                            </select>
                    </div>
               </div>
               <div class="col-md-4" > 
                    <div class="mb-3">
                         <label for="id_mot" class="form-label">Motivo</label>
                         <select class="form-select form-control" aria-label="Default select " id="sel_mot_e"name="sel_mot_e" >
                         <option value="0">Seleccionar</option>
                         <option  value="1">Ventas</option>
                             <option value="2">Compras</option>
                             <option value="3">Gastos</option>
                             <option value="4">Cta_Cta</option>
                             <option  value="5">Devoluciones</option >
                            </select>
                    </div>
               </div>
           </div>
           <div class="row">
              <div class="col-md-6"> 
                 <div class="mb-3">
                         
                     </div>
                 </div>
              <div class="col-md-6"> 
                  <div class="mb-3">
                      <label for="recipient-name" class="col-form-label">Fecha</label>
                      <input type="text" class="form-control" name="fechae" id="fechae" value="<?php echo ( date('d/m/Y h:i:s'))?>">
                  </div> 
              </div>
           </div>
           <div class="row">
               <div class="col-md-6"> 
                     <div class="mb-3">
                            <label for="monto" class="col-form-label">Ingrese Monto</label>
                        <input type="double" class="form-control"  id='montoe'name="montoe" autofocus>
                    </div>
               </div>
               <div class="col-md-6"> 
               <div class="mb-3">
                         <label for="prio" class="form-label">Bancos</label>
                         <select class="form-select form-control" aria-label="Default select CAJA" id="sel_ban_e" name="sel_ban_e">
                             <option >Selecionar </option>
                             <option  value="1">BCP MEZACORP</option>
                             <option value="2">BCP OMA</option>
                             <option value="3">BCP VICTOR MEZA</option>
                             <option value="4">BBVA VICTOR MEZA</option>
                             <option value="5">BBVA MEZACORP</option>
                             <option value="6">CAJA</option>
                            </select>
                     </div>
              </div>
           </div>
          <div class="mb-3">
            <label for="det" class="col-form-label">Detalle</label>
            <textarea class="form-control" id="dete" name="detallee" value="">Ventas yape</textarea>
          </div>
          
          
          <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <input type="submit" class='btn btn-success btn-' name='btn_addmov' value='Guardar'>
          </div>
          </form>
      </div>
    </div>
  </div>
</div>
<!-- modal busqueda por fecha-->
<div class="modal fade bd-example-modal-xl" id="exampleModal_search" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="myLargeModalLabel">Buscar Movimiento  por rango de Fecha  </span></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <form action="" method="POST" id="form_search_movimiento" onsubmit = "event.preventDefault();search_movimiento();">  
                     <div class="row">
                                
                                <div class="col-md-4">
                                    
                                    <div class="form-group">
                                        <label><b> Del Dia</b></label>
                                        <input type="date" name="from_date" value="" class="form-control" id="from_date" >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label><b> Hasta  el Dia</b></label>
                                        <input type="date" name="to_date" value="" class="form-control"  id="to_date" >
                                        
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                    <label></label><br>
                                  <div class="p-2">
                                  <input type="submit" class='btn btn-success btn-' name='btn_search_mov' value='Buscar'>
                                  </div>
                                    
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <!-- iniicio tbale busqueda-->
                                     <div class="card-body">
                            <div class="table-responsive">
                                <small>
                                <table class="table table-bordered" id="DataTable_mov_search" width="100%" cellspacing="0" >
                                    <thead >
                                        <tr> 
                                             <th>#</th>
                                             <th>Detalle de Operacion</th>
                                            <th>Cuenta</th>
                                            <th>Fecha Reguistro </th> 
                                            <th>Mon</th>  
                                            <th>Monto</th>                                  
                                                                                  
                                        </tr>
                                    </thead id=''>
                                   
                                    <tbody id='tcuerposearch'>   
                                    </tbody>
                                </table></small>
                            </div>
                                </div>
                            </div>
                        </div>
                                   <!-- fin tbale busqueda-->
                                  
                              </div>
                            </div>
       </form>
      </div>
    </div>
  </div>
</div>
<!-- fin modal busqueda-->