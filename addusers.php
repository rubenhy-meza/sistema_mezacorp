



<?php 
require "config/conexion.php";
//require "config/conexion.php";
 if(isset($_SESSION['id'])){   
?>
<?php include ("include/head.php")?>
<script>
    $(document).ready(function()
		{
            $("input[name=flexRadioDefault]").change(function () {	 
			console.log($(this).val());
			});
            $("input[name=flexRadioDefault1]").change(function () {	 
			console.log($(this).val());
			});
		 });
</script>

<body id="page-top" class="sidebar-toggled">

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
                        <div class="card-body">
                           <ul class="nav nav-tabs" id="myTab" role="tablist">
                              <li class="nav-item" role="presentation">
                              <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Inicio</button>
                              </li>
                              <li class="nav-item" role="presentation">
                              <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Perfil</button>
                              </li>
                               <li class="nav-item" role="presentation">
                              <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Contacto</button>
                              </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">.a..</div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">..base64_encode.</div>
                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...cc</div>
                         </div>
                      </div> 
                      <div class="row">
                 
                      </div>
        
                  </div>
<?php include ('include/footer.php');
}else{
    header("Location:login.php");
}?>
