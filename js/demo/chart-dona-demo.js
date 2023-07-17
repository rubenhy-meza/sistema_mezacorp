// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("donaChartventas");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["Depositos", "Tarjetas C./ D.", "Yape","Efectivo"],
    datasets: [{
     // data: [55, 30, 15,20],
      backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc','yellow'],
      hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});

    fetch('controller/chartController.php?op=DataVen')
    .then( response => response.json() )
    //.then( datos => console.log(datos) )
     .then( datos=> mostrarventasDona(datos)  )
     .catch( error => console.log(error) )

   const mostrarventasDona = (movcaj) =>{
    movcaj.forEach(element => {
      myPieChart.data['datasets'][0].data.push(element.Total)
      myPieChart.update()
      });
    //  console.log(myPieChart.data)
    } 
   function mostrarventasDonames(mes){

   parametros={"MONTH(fecha)":mes }
    $.ajax({
      data:parametros,
      url:'controller/chartController.php?op=DataVenMes',
      type:'POST',
      beforeSend: function(){},
      success:function(response){
       console.log(response);
         
  }
  });

}
