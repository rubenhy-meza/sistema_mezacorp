<?php
include('db.php');


if(isset($_GET['id'])){
    $id=$_GET['id'];
    $query="SELECT tabfac_pedido.NUMDOC, clipro.RAZSOC,tg_tabven.DES , tabfac.FECHA,tabfac_pedido.FENTREGA ,tabfac_pedido.HENTREGA,tabfac_pedido.CODESTADO,tabfac_pedido.PRIORIDAD,tabfac_pedido.DETALLE FROM tabfac,tg_tabven ,tabfac_pedido, clipro ,tab_estados WHERE tabfac_pedido.NUMDOC=tabfac.NUMDOC AND tg_tabven.COD=tabfac.CODVEN AND tabfac_pedido.CODESTADO=tab_estados.COD AND tabfac.CODIGO=clipro.CODIGO AND tabfac_pedido.NUMDOC='$id' ";
    $data_ped =mysqli_query($conn,$query);
    if(mysqli_num_rows($data_ped)==1){
       $row=mysqli_fetch_array($data_ped);
  //    $numdoc=$row['numdoc']; $fentrega=$row['fentrega']; $nhentrega=$row['hentrega']; $estado=$row['estado'];
   //     $prio=$row['prio']; $nven=$row['ven']; $descri=$row['descri'] ;
    }
   // $_SESSION['message']='edit!!!';
    //$_SESSION['message_type']='danger';
    //header('Location:index.php');
   // $row=mysqli_num_rows($data_ped);
    //$row=mysqli_fetch_array($data_ped);
   
}
?>
<?php include ("include/head.php")?>

<body >
<div class="container p-4">
<div class='card card-body'>
                 <form action="save_ped.php" method="POST">
             
                    <div class="mb-3">
                      <label for="nomcli" class="form-label">Cliente </label>
                     <input type="text" class="form-control" disabled id="nomcli" name="nomcli" value="<?php echo $row['RAZSOC'] ?>">
                    </div>
                    <div class="mb-3">
                      <label for="numfac" class="form-label">N° factura</label>
                     <input type="text"  class="form-control"  id="numfac" name="numfac" value="<?php echo $row["NUMDOC"] ?>">
                    </div>
                   <div class="row">
                     <div class="col-md-6">
                         <div class="mb-3">
                            <label for="fentrega" class="form-label">Fecha Entrega</label>
                            <input type="date" class="form-control" id="fentrega" name="fentrega" value="<?php echo $row["FENTREGA"] ?>">
                        </div>
                     </div>
                    <div class="col-md-6">
                          <div class="mb-3">
                             <label for="hentrega" class="form-label">Hora de Entrega</label>
                             <input type="time" class="form-control" id="hentrega" name="hentrega" value="<?php echo $row["HENTREGA"] ?>">
                          </div> 
                    </div>
                 </div>
                 <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="estado" class="form-label">Estado</label>
                            <input type="text" class="form-control" id="estado" name="estado" value="<?php echo $row["CODESTADO"] ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                         <div class="mb-3">
                             <label for="prio" class="form-label">Prioridad</label>
                            <input type="text" class="form-control" id="prio" name="prio" value="<?php echo $row["PRIORIDAD"] ?>">
                         </div>
                    </div>
                 </div>
                 <div class="mb-3">
                      <label for="ven" class="form-label">Vendedor</label>
                     <input type="text"  DISABLED class="form-control" id="ven" name="ven" value="<?php echo $row["DES"] ?>">
                 </div>
                 <div class="mb-3">
                     <label for="desc" class="form-label">Descripcion</label>
                     <textarea class="form-control" id="desc"  name ="descri"rows="3" value="<?php echo $row["DETALLE"] ?>"></textarea>
                 </div>


                    <input type="submit" class='btn btn-success btn-' name='save' value='update'>
                    <a href="tables.php" class='btn btn-success btn-'>cancelar</a>
                    <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal" class='btn btn-success btn-'>cancelar</a>
                </form>
             </div>

    
    
    
   
             </div>
             <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
       <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modificar Pedido</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>
      
      <div class="modal-body">
      <form action="save_ped.php" method="POST">
                 
                    <div class="mb-3">
                      <label for="nomcli" class="form-label">Cliente </label>
                     <input type="text" class="form-control" disabled id="nomcli" name="nomcli" value="<?php echo $row['RAZSOC'] ?>">
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                         <div class="mb-3">
                            <label for="numfac" class="form-label">N° Factura</label>
                            <input  DISABLED type="text" class="form-control" id="numfac" name="numfac" value="<?php echo $row["NUMDOC"] ?>">
                         </div>
                       </div>
                      <div class="col-md-6">
                          <div class="mb-3">
                             <label for="vendedor" class="form-label">Vendedor</label>
                             <input disabled type="text" class="form-control" id="vendedor" name="hentrega" value="<?php echo $row["DES"] ?>">
                          </div> 
                      </div>
                   </div>
                    
                   <div class="row">
                      <div class="col-md-6">
                         <div class="mb-3">
                            <label for="fentrega" class="form-label">Fecha Entrega</label>
                            <input type="date" class="form-control" id="fentrega" name="fentrega" value="<?php echo $row["FENTREGA"] ?>">
                         </div>
                       </div>
                      <div class="col-md-6">
                          <div class="mb-3">
                             <label for="hentrega" class="form-label">Hora de Entrega</label>
                             <input type="time" class="form-control" id="hentrega" name="hentrega" value="<?php echo $row["HENTREGA"] ?>">
                          </div> 
                      </div>
                   </div>
                 <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="estado" class="form-label">Estado</label>
                            <input type="text" class="form-control" id="estado" name="estado" value="<?php echo $row["CODESTADO"] ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                         <div class="mb-3">
                             <label for="prio" class="form-label">Prioridad</label>
                            <input type="text" class="form-control" id="prio" name="prio" value="<?php echo $row["PRIORIDAD"] ?>">
                         </div>
                    </div>
                 </div>
                
                 <div class="mb-3">
                     <label for="desc" class="form-label">Descripcion</label>
                     <textarea class="form-control" id="desc"  name ="descri"rows="3" value="<?php echo $row["DETALLE"] ?>"></textarea>
                 </div>
                 <div class="modal-footer">
               <input type="submit" class='btn btn-success btn-' name='save' value='update'>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
                </form>
      </div>
      
    </div>
  </div>
</div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>


