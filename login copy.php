<?php
include("db.php");

if($_POST){
    $user=$_POST['user'];
    $pass=$_POST['pass'];
    $sql="SELECT  COD,USUARIO,NOMUSR,APEUSR ,NIVEL,PWD FROM tabusr WHERE  USUARIO='$user'";
    $result = mysqli_query($conn,$sql);
   
    $num=$result->num_rows;
    if($num>0){
        $row=mysqli_fetch_array($result);
        //echo $row;
        $pass_bd = $row['PWD'];
        $pass_c = sha1($pass);
        if($pass_bd===$pass_c){
             
            $_SESSION['nombre']=$row['USUARIO'];
            $_SESSION['id']=$row['COD'];
            $_SESSION['nom_user']=$row['NOMUSR'];
           // $_SESSION['id']=$row['COD'];
            $_SESSION['tipo_usuario']=$row['NIVEL'];
            session_start();
          if(isset($_SESSION['id'])){
            if($_SESSION['tipo_usuario']==1){
                header("Location:eeff.php");
               }else if ($_SESSION['tipo_usuario']==2){
                header("Location:tabla_compras.php");
               }
          }   
        }else{
            echo"la contrasena o usuario no coincide";
        }
    }else{
        echo"no existe usuario";
       // header("Location:login.php");
    }
}


?>

<?php include ("include/head.php") ?>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Bienvenido ! </h1>
                                    </div>
                                    <form class="user" method="POST"  action="<?php echo $_SERVER['PHP_SELF'];?>">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="pass"
                                                id="exampleInputPassword" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck" name="rpass">
                                                <label class="custom-control-label" for="customCheck">Recordar
                                                    </label>
                                            </div>
                                        </div>
                                        <button type=" submit "  class="btn btn-primary btn-user btn-block">
                                            Ingresar
                                      </button>
                                        <hr>
                                        <a href="index.html" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                        <a href="index.php" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="#" disabled>Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="#" disabled>Create an Account! </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div><!--saber si hay una sesion<?php  //  print_r($_SESSION);?>-->

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>