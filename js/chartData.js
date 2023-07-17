init();
function init(){
        
    getDataChart();
   
}
var id_mot=2;
var id_mon=2;
function getDataChart(){

 /* let urlcompraA = 'controller/chartController.php?op=DataComD'
            fetch(urlcompraA)
          .then( response => response.json() )
       .then( datos => console.log(datos) )
        .catch( error => console.log(error) )

*/
       
let urlgastos= 'controller/chartController.php?op=DataVenS'
fetch(urlgastos)
  .then( response => response.json() )
  .then( datos => console.log(datos) )
  // .then( datos => mostrargastos(datos) )
   .catch( error => console.log(error) )
       $.ajax({
          //data:parametros,
          url:'controller/chartController.php?op=DataVenD',
          type:'POST',
          beforeSend: function(){},
          success:function(response){
           console.log(response);
             // data = $.parseJSON(response);
              //   if (data.length>0) {
             
               //  }
          }
        });
       
}