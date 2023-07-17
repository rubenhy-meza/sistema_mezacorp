/*
let urlgastos = 'http://192.168.0.200/admin/js/objects.txt'
fetch(urlgastos)
  .then( response => response.json() )
   .then( datos => mostrarPedido(datos) )
   .catch( error => console.log(error) )


  const  mostrarPedido=(datos)=>{
   // console.log(datos);
    let body=''
    for(let i=0;i<datos.length;i++){
        body+=` <tr> <td>${datos[i].NUMDOC}</td><td>${datos[i].FECHA}</td><td>${datos[i].DETALLE}</td><td>${datos[i].TIPDOC}</td></tr>`;
    }
    //document.getElementById('tabla_pedidos').innerHTML=body;
  }*/