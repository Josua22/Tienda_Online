<?php include("Template/Header.php") ?>

<?php

try{
    
  include("DataBase.php");

  //drop all entire shopping car
  if(isset($_REQUEST['vaciar'])){
    session_destroy();
    header("location:Carrito_Compras.php");
								exit();
  }

  //delete just one item
  if(isset($_REQUEST['item'])){

    $producto = $_REQUEST['item'];
    unset($_SESSION['carrito'][$producto]);
    header("location:Carrito_Compras.php");
								exit();
  }

}catch(Exception $ex){

  echo $ex -> getMessage($query) ;
}

?>

<section class="h-100 h-custom" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card">
          <div class="card-body p-4">

            <div class="row">

              <div class="col-lg-7">
                <h5 class="mb-3"><a href="index.php" class="text-body"><i
                      class="fas fa-long-arrow-alt-left me-2"></i><- Continuar Comprando</a></h5>
                <hr>

                <div class="d-flex justify-content-between align-items-center mb-4">
                  <div>
                    <p class="mb-1">Carrito de Comprás</p>
                    <p class="mb-0">Items agregado a la comprás</p>
                  </div>
                  <div>
                    <p class="mb-0"><span class="text-muted">Sort by:</span> <a href="#!"
                        class="text-body">price <i class="fas fa-angle-down mt-1"></i></a></p>
                  </div>
                </div>      
                        <div class="card mb-3 mb-lg-0">
                          <!-- <div class="card-body">
                            <div class="d-flex justify-content-between">
                              <div class="d-flex flex-row align-items-center"> -->
                                <div class="card-body">
                                  <div class="table-responsive-sm">
                                  <table class="table">     
                                      
                                     
                                      <?php
                                          /////////////////////////////////////////
                                          ////////////Method Select all////////////
                                          /////////////////////////////////////////
                                    
                                          try{

                                            include("DataBase.php");
                                           
                                              $num = 0;
                                              $precio_producto = 0;
                                              $sub_total = 0;
                                              $envio = 2000;
                                              $precio_total = 0;
                                              $precio_final = 0.0;

                                              if(isset($_SESSION["carrito"])){
                                                ?>
                                                <thead>
                                                  <tr>
                                                    <th scope="col">Descripción</th>
                                                    <th scope="col">Cantidad</th>
                                                    <th scope="col">Precio Unitario</th>
                                                    <th scope="col">Precio Total</th>
                                                    <th scope="col">Acción</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                foreach($_SESSION["carrito"] as $indice => $arreglo){
                                                  
                                                  $precio_producto = $arreglo["precio"] * $arreglo["cantidad"];
                                                    
                                                  $sub_total += $precio_producto;

                                                  ?>
                                                  
                                                  <tr class="col-6">  
                                                  
                                                    <td scope="row">
                                                      <div style="width: 80px;">
                                                        <h5 class="mb-0" ><?php echo $indice?></h5>
                                                      </div>
                                                    </td>
                                                  <?php
                                                    foreach($arreglo as $key => $value){?>

                                                          <td scope="row">
                                                            <div style="width: 80px;">
                                                              <h5 class="mb-0"><?php echo $value?></h5>
                                                            </div>
                                                          </td>
                                                    <?php
                                                  }
                                                  $num++;?>
                                                  <td scope="row">
                                                      <div style="width: 80px;">
                                                        <h5 class="mb-0" ><?php echo $precio_producto?></h5>
                                                      </div>
                                                    </td>
                                                    <td scope="row">
                                                      <div style="width: 80px;">
                                                      <form action="Carrito_Compras.php?item=<?php echo $indice?>" method="post" enctype=multipart/form-data>
                                                        <button onclick="return confirm('Seguro que deséa eliminar el ítem?')" name="Eliminar_item" title="Eliminar_item" id="Eliminar_item" class="btn btn-light" type="submit" >
                                                          <i class="bi bi-trash-fill"></i> Eliminar
                                                        </button>
                                                      </form> 
                                                      </div>
                                                    </td>
                                                  </tr>
                                                  <?php
                                                  
                                                }?>

                                                </tbody> 
                                                <form action="Carrito_Compras.php?vaciar=true" method="post" enctype=multipart/form-data>
                                                  <button name="vaciar_carrito" title="vaciar" id="vaciar_carrito" class="btn btn-light" type="submit" >
                                                    <i class="bi bi-bag"></i> Vaciar
                                                  </button>
                                                </form> 
                                                <?php
                                                      
                                              }else{
                                                      echo "<div class='alert alert-primary' role='alert'>No hay producto en el carrito...! </div>";
                                              }
                                              
                                              echo "<div class='alert alert-primary' role='alert'>Cantidad de productos en el carrito: $num </div>";
                                             
                                            }catch (Exception $ex) {
                                              echo $ex -> getMessage();
                                            }
                                            ?>
                                            
                                            <form action="index.php" method="post" enctype=multipart/form-data>
                                              <button href="" name="comprar" title="Comprar" id="comprar" class="btn btn-light" type="submit" >
                                                <i class="bi bi-bag"></i> Comprar
                                              </button>
                                            </form>  
                                    </table>
                                    <div class='alert alert-primary' role='alert'>Precio total: <?php echo $sub_total ?></div>
                                    </div>
                              </div>
                            <!-- </div>
                          </div>
                            
                        </div> -->
                      </div>
                    </div>
                        

              <div class="col-lg-5">

                <div class="card bg-secondary text-white rounded-3">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                      <h5 class="mb-0">Card details</h5>
                    </div>

                    <form class="mt-4">

                      <div id="paypal-button-container"></div>
                      
                    </form>

                  </div>
                </div>

              </div>
              

            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php include("Template/footer.php"); ?>