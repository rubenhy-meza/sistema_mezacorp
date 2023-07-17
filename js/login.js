function login_intro(){
    document.getElementById('pass').setAttribute( 'autocomplete', 'off' );
    var user=$("#user").val();
     var pass=$("#pass").val();
   
    parametros = {'user':user ,'pass':pass}
    $.ajax({
      data:parametros,
       url:'controller/userController.php?op=login_user',
      type:'POST',
      beforeSend: function(){},

      success:function(data){
        console.log(data);
        if(data == 1 ) {
           
           window.location.href = "eeff.php";
          }
         else if(data == 2 ) {
     
          window.location.href = "rrhh.php";
         }
        else if (data == 3 ){
     //Shake animation effect.
     //$('#box').shake();
      //$("#login").val('Login')
          $("#error_login").html("<span style='color:#cc0000'>Error: La Contraseña  es Incorrecta!!. </span> ");
      }
      else if (data == 4 ){
        //Shake animation effect.
        //$('#box').shake();
         //$("#login").val('Login')
             $("#error_login").html("<span style='color:#cc0000'>Error: No existe el nombre de usuario .</span> ");
         }
       },
      error: function(error){
       console.log(error);
       }

   });

  
}
