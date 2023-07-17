
  $("input[name='exampleRadios']").on( 'change', function() {
    if( $(this).is(':checked') ) {
        $('#det').val($('input:radio[name=exampleRadios]:checked').val());
    }   
    });
    $("input[name='tipo_SC']").on( 'change', function() {
      if( $(this).is(':checked') ) {
             $('#id_monC').val(1);
             $('#id_monu').val(1);
             $('#id_mon_pago').val(1);

           $("input[name='tipo_DC']").prop("checked", false);
          } 
    });
    $("input[name='tipo_DC']").on( 'change', function() {
      if( $(this).is(':checked') ) {
             $('#id_monC').val(2);
             $('#id_monu').val(2);
             $('#id_mon_pago').val(2);

            $("input[name='tipo_SC']").prop("checked", false);
         }   
       });
   
function format(d) {
  // `d` is the original data object for the row
  return (
      '<table cellpadding="10px" cellspacing="0" border="0" style="padding-left:50px;" width="100%">' +
      '<tr>' +
      '<td><strong>Cumpleaños:</strong></td>' +
      '<td>' +d.FechaNac + '</td>' +'<td></td>' +'<td></td>' +'<td></td>' +
      '<td>'+'<a class="btn btn-success  btn-sm" data-bs-toggle="modal" data-bs-target="#Modaladdempleado_u" onclick="buscarEmpleado('+d.Codigo+')"><i class="fas "></i>Editar</a>'+'</td>' +
      '</tr>' +
      '<tr>' +
         '<td><strong>Telefonos:</strong></td>' +
         '<td>' + d.Telefono +' &nbsp;&nbsp;<strong>   E-mail:</strong> '+ d.Correo +'</td>' +'<td></td>' +'<td></td>' +'<td></td>' +
          '<td>'+'<a class="btn btn-info  btn-sm" data-bs-toggle="modal" data-bs-target="#Pago_empleado" onclick="buscarEmpleado('+d.Codigo+')"><i class="fas "></i>Pagar</a>'+'</td>' +
      '</tr>' +
      '<tr>' +
        '<td><strong>fecha de Ingreso:</strong></td>' +
        '<td>'+d.FechaIng+' &nbsp;&nbsp;<strong>  Estado:</strong> '+ d.Des +'</td>' +'<td></td>' +'<td></td>' +'<td></td>' +
        '<td>'+'<a class="btn btn-warning  btn-sm" data-bs-toggle="modal" data-bs-target="#Liquidar_empleado" oonclick="buscarEmpleado('+d.Codigo+')"><i class="fas "></i>Liquidar</a>'+'</td>' +
        '</tr>' +
      '</table>'
  );
}
$(document).ready(function () {//cargar datos empleado en datatables
  var table = $('#example').DataTable({
      ajax: 'controller/userController.php?op=listarEmpleado',
      columns: [
          {
              className: 'dt-control',
              orderable: false,
              data: null,
              defaultContent: '',
          },
          { data: 'Nombres' },
          { data: 'Apellidos' },
          { data: 'Cargo' },
          { data: 'Sueldo' } 
      ],
      order: [[1, 'asc']],
  });
  // Add event listener for opening and closing details
  $('#example tbody').on('click', 'td.dt-control', function () {
      var tr = $(this).closest('tr');
      var row = table.row(tr);
      if (row.child.isShown()) {
          // This row is already open - close it
          row.child.hide();
          tr.removeClass('shown');
      } else {
          // Open this row
          row.child(format(row.data())).show();
          tr.addClass('shown');
      }
  });
  // CAPTURAR EVENTOCHECK
  $(document).on('change','input[type="radio"]' ,function(e) {
    if(this.id=="flexRadioDefault3") {
        if(this.checked) $('#check_st').val(this.value);
        else $('#check_st').val("");
    }
    if(this.id=="flexRadioDefault4") {
        if(this.checked) $('#check_st').val(this.value);
        else $('#check_st').val("");
    }
    if(this.id=="flexRadioDefault1") {
      if(this.checked) $('#check_gen').val(this.value);
      else $('#check_gen').val("");
  }
  if(this.id=="flexRadioDefault2") {
      if(this.checked) $('#check_gen').val(this.value);
      else $('#check_gen').val("");
  }
});
});
  ///fin codigo datatbles +
  //buscar empleado
  function buscarEmpleado(id){
    parametros={"CODPER":id }
  $.ajax({
    data:parametros,
    url:'controller/userController.php?op=busqueduser',
    type:'POST',
    beforeSend: function(){},
    success:function(response){
      console.log(response);
     data = $.parseJSON(response);
       if (data.length>0) {
           $('#codigo_u').val(data[0]['Codigo']);
           $('#apellido_p_u').val(data[0]['Apellido_p']);
           $('#apellido_m_u').val(data[0]['Apellido_m']);
           $('#nombres_e_u').val(data[0]['Nombres']);
           $("#cargo_e_u option[value="+ data[0]['Codcar'] +"]").attr("selected",true);
           $("#sexo_e_u option[value="+ data[0]['Sexo'] +"]").attr("selected",true);
           $("#est_e_u option[value="+ data[0]['Est'] +"]").attr("selected",true);
           $("#hijo_e_u option[value="+ data[0]['Asig_fam'] +"]").attr("selected",true);
           $('#numdoc_e_u').val(data[0]['Numdoc']);
          $('#correo_e_u').val(data[0]['Correo']);
          $('#fechanac_e_u').val(data[0]['FechaNac']);
          $('#celular_e_u').val(data[0]['Telefono']);
          $('#sueldo_e_u').val(data[0]['Sueldo']);
          $('#direccion_e_u').val(data[0]['Dir']);
          $('#numcta_e_u').val(data[0]['Nrocta']);
          //cargamos datos para hacer el pago
          $('#id_e_p').val(data[0]['Codigo']);
           $('#ape_e_p').val(data[0]['Apellido_p']);
          // $('#apellido_m_u').val(data[0]['Apellido_m']);
           $('#nom_e_p').val(data[0]['Nombres']);
           $("#car_e_p").val( data[0]['Cargo'] );
          // $("#sexo_e_u option[value="+ data[0]['Sexo'] +"]").attr("selected",true);
           $("#fecha_in_e_p").val(data[0]['FechaIng'] );
           $("#hijos_e_p").val(data[0]['Asig_fam'] );
           $('#dni_e_p').val(data[0]['Numdoc']);
         // $('#correo_e_u').val(data[0]['Correo']);
          $('#fecha_nac_e_p').val(data[0]['FechaNac']);
         // $('#celular_e_u').val(data[0]['Telefono']);
          $('#sueldo_e_pago').val(data[0]['Sueldo']);
          $('#dir_e_p').val(data[0]['Dir']);
          $('#cta_e_p').val(data[0]['Nrocta']);
       }
    }
  });
    
  }
 function guardarEmpleado(){
  console.log($("#form_add_empleado").serialize());
   $.ajax({
      data:$("#form_add_empleado").serialize(),
      url:'controller/userController.php?op=addEmpleado',
      type:'POST',
      async:true,
      beforeSend: function(){},
      success:function(response){
        console.log(response);
        Swal.fire(
              'Agregado!',
             'Se ha Guardado correctamente',
             'success'
        );
    // location.href ="rrhh.php";
      }
   });
 }

 function updateEmpleado(){
    $.ajax({
      data:$("#form_add_empleado_u").serialize(),
      url:'controller/userController.php?op=updateEmpleado',
     type:'POST',
     async:true,
     beforeSend: function(){},
    success:function(response){
    //console.log(response);
       Swal.fire(
              'Actualizado!',
             'Se ha Actualizado  los datos correctamente',
             'success'
      );
      //table.ajax.reload();
     location.href ="rrhh.php";
    }
  });
 }
 $("#check_vaca").on('change', function() {
  
});
function myFunction()
    {
      var numberA = document.getElementById("Außendurchmesser");
      var numberB = document.getElementById("Innendurchmesser");
      var numberC  = document.getElementById("Dicke");
      if(numberA.value=="" || numberB.value=="" || numberC.value=="")return;
      var a = numberA.value;
      var b = numberB.value;
      var c = numberC.value;
      a = parseFloat(a.replace(",","."));
      b = parseFloat(b.replace(",","."));
      c = parseFloat(c.replace(",","."));

      result = Math.PI * (Math.pow(a/2,2) - Math.pow(b/2,2))/c/1000;
      result = result.toFixed(2)
            // here the output with be first change to String, then the point 
            // will be replaced by a comma--> for german version
            result = result.toString();
            result=result.replace(".",",");
            // now the output is with comma.

      var demoP=document.getElementById("output");
      demoP.innerHTML="La longitud restante de su bobina de canto es "+result+" m. ";

    }
    