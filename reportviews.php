<?php
require "config/conexion.php";


   
//require "config/conexion.php";
 if(isset($_SESSION['id'])){
  

    
?>

<?php include ("include/head.php")?>

<body id="page-top" class="sidebar-toggled" >

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
                           <div class="col-md-6">
                             <div class="card shadow mb-4">
                               
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold ">Compras Mensuales</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Imprimir</a>
                                            <a class="dropdown-item" href="#">Enviar por correo</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">..</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                
                                    <div class="chart-bar">
                                        <canvas id="myBarChart"></canvas>
                                       
                                        <script src='js/demo/chart-bar-demo.js'></script>
                                    </div>
                                    <hr>
                                    Styling for the bar chart can be found in the
                                    <code>/js/demo/chart-bar-demo.js</code> file.
                                </div>
                                   
                                         
                             </div>
                           </div>
                           <!-- FIN DISPONIBLE-->
                           <div class="col-md-6">
                               <div class="card">
                                  <div class="card-header"> Gastos Mensuales</div>
                                     <div class="card-body">
                                        <div class="chart-bar">
                                          <canvas id="myBarChartgastos"></canvas>
                                       
                                           <script src='js/demo/chart-pie-demo.js'></script>
                                        </div>
                                         <hr>
                                        Styling for the bar chart can be found in the
                                        <code>/js/demo/chart-bar-demo.js</code> file.
                                    </div>
                                 </div>
                               </div>
                          </div>
                      
                      <div class="row">
                           <!--  LISTA POR COBRAR -->
                           <div class="col-md-6">
                               <div class="card shadow mb-4">
                                   <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold ">Ventas Mensuales</h6>
                                     <div class="dropdown no-arrow">
                                         <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                         </a>
                                         <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Imprimir</a>
                                            <a class="dropdown-item" href="#">Enviar por correo</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">..</a>
                                         </div>
                                    </div>
                                  </div>
                               
                                    <!-- Card Body -->                     
                                   <!-- inicochart VENTAS-->
                                   <div class="card-body">
                                      <div class="chart-bar">
                                        <canvas id="myBarChartventas"></canvas>
                                       
                                         <script src='js/demo/chart-ventas-demo.js'></script>
                                      </div>
                                      <hr>
                                      Styling for the bar chart can be found in the
                                      <code>/js/demo/chart-bar-demo.js</code> file.
                                   </div>
                                  <!-- fin chaRt VENTAS--> 
                               </div>
                          </div>
                         
                           <div class="col-md-6">
                                 <div class="card shadow mb-4">
                                   <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                      <h6 class="m-0 font-weight-bold ">Ventas con medios de Pago</h6>
                                         <div class="dropdown no-arrow">
                                           <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                             </a>
                                             <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                                aria-labelledby="dropdownMenuLink">
                                               <div class="dropdown-header">AÑO: <?php echo date("Y") ?></div>
                                               <a class="dropdown-item "  onclick="mostrarventasDonames(1)">Enero</a>
                                               <a class="dropdown-item" onclick="mostrarventasDonames(2)">Febrero</a>
                                               <a class="dropdown-item" onclick="mostrarventasDonames(3)">Marzo</a>
                                               <a class="dropdown-item" onclick="mostrarventasDonames(4)">Abril</a>
                                               <a class="dropdown-item" onclick="mostrarventasDonames(5)">Mayo</a>
                                               <a class="dropdown-item" onclick="mostrarventasDonames(6)">Junio</a>
                                               <a class="dropdown-item" onclick="mostrarventasDonames(7)" >Julio</a>
                                               <a class="dropdown-item" onclick="mostrarventasDonames(8)">Agosto</a>
                                               <a class="dropdown-item" onclick="mostrarventasDonames(9)">Septiembre</a>
                                               <a class="dropdown-item" onclick="mostrarventasDonames(10)">Octubre</a>
                                               <a class="dropdown-item" onclick="mostrarventasDonames(11)">Noviembre</a>
                                               <a class="dropdown-item" onclick="mostrarventasDonames(12)">Diciembre</a>
                                           
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" >..</a>
                                            </div>
                                          </div>
                                   </div>
                                     <!-- Card Body -->                     
                                      <!-- inicochart VENTAS-->
                                   <div class="card-body">
                                      <div class="chart-bar">
                                        <canvas id="donaChartventas"></canvas>
                                       
                                         <script src='js/demo/chart-dona-demo.js'></script>
                                      </div>
                                      <hr>
                                       Styling for the bar chart can be found in the
                                      <code>/js/demo/chart-bar-demo.js</code> file.
                                      </div>
                                   </div>
                                        <!-- fin chaRt VENTAS-->
                                 </div>
                            </div>
                       </div>
                      <!--FIN ROW-->
                    
                    
                    </div>
                   
                  </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content
          <script src="js/demo/chart-bar-demo.js"></script>
          -->
            
                
            

<?php include ('include/footer.php');
}else{
    header("Location:login.php");
}?>
