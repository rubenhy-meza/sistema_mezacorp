<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
         <div class="modal-header">
             <h5 class="modal-title" id="exampleModalLabel">Agregar movimiento</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
        <div class="modal-body">
         <form action="controller/lista_compra.php?op=create_mov" method="POST">  
            <div class="row">
               <div class="col-md-6"> 
                    <div class="mb-3">
                         <label for="prio" class="form-label">Cuenta</label>
                         <select class="form-select form-control" aria-label="Default select example" id="suc" onchange="obtdata();">
                             <option selected>Selecionar </option>
                             <option value="1">Mezacorp</option>
                             <option value="2">Oma</option>
                              <option value="3">Victor Meza</option>
                              <option value="4">Caja chica</option>
                            </select>
                        <input type="list" class="form-control" id="id_suc" name="id_suc" value="" hidden>
                     </div>
               </div>
               <div class="col-md-6"> 
               <div class="mb-3">
                         <label for="prio" class="form-label">Tipo Movimieto</label>
                         <select class="form-select form-control" aria-label="Default select example" id="mov" onchange="obtdata();">
                             <option selected>Selecionar </option>
                             <option value="1">Ventas</option>
                             <option value="2">Compras</option>
                              <option value="3">Gastos</option>
                              <option value="4">Cuenta-Cuenta</option>
                            </select>
                        <input type="list" class="form-control" id="movimiento" name="id_mov" value=""hidden >
                     </div>
              </div>
           </div>
           <div class="row">
              <div class="col-md-6"> 
                 <div class="mb-3">
                         <label for="prio" class="form-label">Moneda</label>
                         <select class="form-select form-control" aria-label="Default select soles" id="moneda" onchange="obtdata();">
                         
                             <option value="1">Soles</option>
                             <option value="2">Dolares</option>
                              <option value="3">Euro</option>
                            </select>
                        <input type="list" class="form-control" id="id_mon" name="id_mon" value="1" hidden>
                     </div>
                 </div>
              <div class="col-md-6"> 
                  <div class="mb-3">
                      <label for="recipient-name" class="col-form-label">Fecha</label>
                      <input type="date" class="form-control" name="fecha">
                  </div> 
              </div>
           </div>
          
          <div class="mb-3">
            <label for="det" class="col-form-label">Detalle</label>
            <textarea class="form-control" id="det" name="detalle" value="">Ventas</textarea>
          </div>
          
          <div class="mb-3">
            <label for="monto" class="col-form-label">Monto</label>
            <input type="text" class="form-control"  id='monto'name="monto" autofocus>
          </div>
          </form>
        </div>
        <div class="modal-footer">
        <button  type="button"  class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button  type="submit" class="btn btn-primary"  name="btn_addmov">Guardar</button>
        </div>
    </div>
  </div>
</div>
<?php include ('include/footer.php');?>