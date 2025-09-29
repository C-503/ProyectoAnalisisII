<?php
include ('../app/config.php');
include ('../layout/sesion.php');
include ('../layout/parte1.php'); 

include ('../app/controllers/ventas/listado_de_ventas.php');
include('../app/controllers/almacen/listado_de_productos.php');




?>

<?php

if(isset($_SESSION['mensaje6'])) {
    $respuesta = $_SESSION['mensaje6']; ?>
    <script>
        Swal.fire({
         title: "JEY GT",
         text: "Producto no registrado en el carrito",
        icon: "error"
   });
</script>

<?php
  unset($_SESSION['mensaje6']);

}

?>



 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">Ventas</h1>
          </div><!-- /.col -->
         
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">                  
        
      <div class="row">
          <div class="col-md-12">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <?php 
                    $contador_de_ventas = 0;
                    foreach($datos_ventas as $dato_ventas){
                        $contador_de_ventas = $contador_de_ventas + 1;
                    }
                ?>
                <h3 class="card-title">Venta nro  
                    <input type="text" style="text-align: center" value="<?php echo $contador_de_ventas + 1;?>" disabled> </h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                
                <b>Carrito </b>

                <button type="button" class="btn btn-primary" data-toggle="modal" 
                                    data-target="#modal-buscar-producto">
                                    <i class="fa fa-search"></i>
                                    Buscar Producto
                                </button>
                                 <!-- Modal para visualizar proveedores -->
                                 <div class="modal fade" id="modal-buscar-producto">
                                    <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header" style="background-color: #0155b6ff; color: black;" >
                                        <h4 class="modal-title">Buscar del Producto</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">

                                           <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                        <th><center>No</center></th>
                        <th><center>Codigo</center></th>
                        <th><center>Categoria</center></th>
                        <th><center>Nombre</center></th>
                        <th><center>Descripcion</center></th>
                        <th><center>Stock</center></th>
                        <th><center>Precio Venta</center></th>
                        <th><center>imagen</center></th>
                        <th><center>Seleccionar</center></th>
                  </tr>
                  </thead>
                   <tbody>
                      <?php
                      
                        $contador = 0;
                      foreach ($datos_productos as $dato_productos){ 
                        $id_producto = $dato_productos['id_producto'];
                        ?>

                        <tr>
                            <td><?php echo $contador = $contador + 1;?></td>
                            <td><?php echo $dato_productos['codigo'];?></td>
                            <td><?php echo $dato_productos['nombre_categoria'];?></td>
                            <td><?php echo $dato_productos['nombre'];?></td>
                            <td><?php echo $dato_productos['descripcion'];?></td>
                            <td><?php echo $dato_productos['stock'];?></td>
                            <td><?php echo $dato_productos['precio_venta'];?></td>
                            <td>
                                <img src="<?php echo $URL."/almacen/img_productos/".$dato_productos['imagen'];?>" width="100" alt="">
                            </td>

                            <td>
                                <button href="" class="btn btn-info" id="btn_seleccionar<?php echo $id_producto;?>" >
                                    Seleccionar
                      </button>
                      <script>
                        $('#btn_seleccionar<?php echo $id_producto;?>').click(function(){

                           var id_producto = "<?php echo $id_producto?>";
                            $('#id_producto').val(id_producto);

                            var producto = "<?php echo $dato_productos['nombre']?>";
                            $('#producto_v').val(producto);

                            var detalle = "<?php echo $dato_productos['descripcion']?>";
                            $('#detalle_v').val(detalle);

                            var precio_Unitario = "<?php echo $dato_productos['precio_venta']?>";
                            $('#precio_v').val(precio_Unitario);

                            $('#cantidad_v').focus();


                           // $('#modal-buscar-producto').modal('hide');

                        });
                      </script>
                            </td>
                            



                        </tr>
                        
                      <?php  
                      }
                      ?>
                    </tbody>
                
                </table>
                      
                        <div class="row">
                            <div class="col-md-3">
                                <div class="font-group">
                                    <input type="text" id="id_producto" class="form-control" hidden>  
                                    <label for="">Producto</label>
                                    <input type="text" id="producto_v" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="font-group">
                                    <label for="">Detalle</label>
                                    <input type="text" id="detalle_v" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="font-group">
                                    <label for="">Cantidad</label>
                                    <input type="number" id="cantidad_v" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="font-group">
                                    <label for="">Precio Unitario</label>
                                    <input type="text" id="precio_v" class="form-control" disabled>
                                </div>
                            </div>
                        </div> 

                        <br>

                        <button style="float: right" id="btn_registrar_carrito" class="btn btn-primary">Registrar</button>
                        <div id="respuesta_carrito"></div>
                        <script>
                        $('#btn_registrar_carrito').click(function(){

                            var nro_venta = '<?php echo $contador_de_ventas + 1;?>';
                            var id_producto = $('#id_producto').val();
                            var cantidad = $('#cantidad_v').val();

                            if(id_producto == ""){

                              alert("Debe seleccionar un producto");


                            }else if(cantidad == ""){

                              alert("Debe ingresar una cantidad valida");
                            }else{
                              var url = "../app/controllers/ventas/registrar_carrito.php";
                                        $.get(url, {nro_venta:nro_venta,id_producto:id_producto,cantidad:cantidad}, function(datos){
                                            $('#respuesta_carrito').html(datos);
                                        });
                            }

                            

                        });
                        </script>
                        <br><br>

                 </div>
                                
                                        </div>
                                        
                                    </div>
                                    <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <br><br>
                               
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-sm table-hover">
                                <thead>
                                    <tr>
                                        <th style="background-color: #e7e7e7;text-align: center"><center>Nro</center></th>
                                        <th style="background-color: #e7e7e7;text-align: center"><center>Producto</center></th>
                                        <th style="background-color: #e7e7e7;text-align: center"><center>Detalle</center></th>
                                        <th style="background-color: #e7e7e7;text-align: center"><center>Cantidad</center></th>
                                        <th style="background-color: #e7e7e7;text-align: center"><center>Precio Unitario</center></th>
                                        <th style="background-color: #e7e7e7;text-align: center"><center>Precio Subtotal</center></th>
                                        <th style="background-color: #e7e7e7;text-align: center"><center>Accion</center></th>
                                    </tr>
                                </thead>
                               
                                <tbody>



                                    

                                    

                                    <tr>
                                        <td colspan="5" style="text-align: right; font-weight: bold;">Total:</td>
                                        <td style="text-align: center; font-weight: bold;">35.00</td>
                                        <td></td>
                                    </tr>

                                </tbody>

                               </table>
                                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Datos del Cliente </h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                
                asdf
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
                     


        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include ('../layout/parte2.php'); ?>



<script>
  $(function () {
    $("#example1").DataTable({
        "pageLength": 5,
          language: {
              "emptyTable": "No hay información",
              "decimal": "",
              "info": "Mostrando _START_ a _END_ de _TOTAL_ Prodcutos",
              "infoEmpty": "Mostrando 0 to 0 of 0 Productos",
              "infoFiltered": "(Filtrado de _MAX_ total Productos)",
              "infoPostFix": "",
              "thousands": ",",
              "lengthMenu": "Mostrar _MENU_ Productos",
              "loadingRecords": "Cargando...",
              "processing": "Procesando...",
              "search": "Buscador:",
              "zeroRecords": "Sin resultados encontrados",
              "paginate": {
                  "first": "Primero",
                  "last": "Ultimo",
                  "next": "Siguiente",
                  "previous": "Anterior"
              }
             },
      "responsive": true, "lengthChange": true, "autoWidth": false,
       
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });




  $(function () {
    $("#example2").DataTable({
        "pageLength": 5,
          language: {
              "emptyTable": "No hay información",
              "decimal": "",
              "info": "Mostrando _START_ a _END_ de _TOTAL_ Proveedores",
              "infoEmpty": "Mostrando 0 to 0 of 0 Proveedores",
              "infoFiltered": "(Filtrado de _MAX_ total Proveedores)",
              "infoPostFix": "",
              "thousands": ",",
              "lengthMenu": "Mostrar _MENU_ Proveedores",
              "loadingRecords": "Cargando...",
              "processing": "Procesando...",
              "search": "Buscador:",
              "zeroRecords": "Sin resultados encontrados",
              "paginate": {
                  "first": "Primero",
                  "last": "Ultimo",
                  "next": "Siguiente",
                  "previous": "Anterior"
              }
             },
      "responsive": true, "lengthChange": true, "autoWidth": false,
       
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>



