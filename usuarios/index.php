<?php
include ('../app/config.php');
include ('../layout/sesion.php');


include ('../layout/parte1.php'); 
include('../app/controllers/usuario/listado_de_usuarios.php');

?>

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">Listado de usuario</h1>
          </div><!-- /.col -->
         
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">

            <!-- Contenido -->
            <div class="row">
                <div class="col-md-8">
                    <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Usuarios Registrados</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="display: block;">
                <table class="table table-bordered table-striped table-hover table-sm">
                    <tr>
                        <th>No</th>
                        <th>Nombre y apellido</th>
                        <th>Email</th>
                    </tr>
                    <body>
                      <?php
                      
                      foreach ($datos_usuarios as $datos_usuarios){?>
                        
                        <tr>
                            <td><?php echo $datos_usuarios['id_usuario'];?></td>
                            <td><?php echo $datos_usuarios['nombres'];?></td>
                            <td><?php echo $datos_usuarios['email'];?></td>
                        </tr>
                      <?php  
                      }
                      ?>
                    </body>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
                </div>
                    
            </div>

        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include ('../layout/parte2.php'); ?>

