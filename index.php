<?php
include ('app/config.php');
include ('layout/sesion.php');

include ('layout/parte1.php'); 
include ('app/controllers/usuario/listado_de_usuarios.php');
include ('app/controllers/roles/listado_de_roles.php');

?>

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">Bienvenido a JEY Software GT - <?php echo $rol_sesion;?></h1>
          </div><!-- /.col -->
         
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        Clemcito
        <br>
        <br>

        <div class="row">
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">

                <?php 
                  $contador_usuarios = 0;
                  foreach($datos_usuarios as $dato_usuario){
                    $contador_usuarios = $contador_usuarios + 1;
                  }
                ?>
                <h3><?php echo $contador_usuarios?></h3>

                <p>Usuarios Registrados</p>
              </div>
              <a href="<?php echo $URL;?>/usuarios/create.php">
                <div class="icon">
                <i class="fas fa-user-plus"></i>
              </div>
              </a>
              <a href="<?php echo $URL;?>/usuarios" class="small-box-footer">Mas informacion <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>


          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">

                <?php 
                  $contador_roles = 0;
                  foreach($datos_roles as $dato_rol){
                    $contador_roles = $contador_roles + 1;
                  }
                ?>
                <h3><?php echo $contador_roles?></h3>

                <p>Roles Registrados</p>
              </div>
              <a href="<?php echo $URL;?>/roles/create.php">
                <div class="icon">
                <i class="fas fa-user-plus"></i>
              </div>
              </a>
              <a href="<?php echo $URL;?>/roles" class="small-box-footer">Mas informacion <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
         
          <!-- ./col -->
        </div>

        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include ('layout/parte2.php'); ?>

