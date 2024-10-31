<?php include("Template/Header.php"); ?>

<?php

try{

  
include("DataBase.php");

if (isset($_POST["btnborrar"])) {

  /////////////////////////////////////////
  ////////////Method Delete into/////////// 
  ////////////the method filter////////////
  /////////////////////////////////////////

  if (isset($_GET["EliminarId"])) {
  
  $id = $_GET["EliminarId"];
    
  $sql = "DELETE FROM carrito WHERE id_carrito = $id";

  $Delete = mysqli_query($conn, $sql);

  if ($Delete) {
    echo "<script> alert( 'Archivo Eleminado' )</script>";
    
  }else {
    echo "<script> alert( 'Error' )</script>";
  }
}
}

  if(isset($_POST["btneditar"])){

      $id = $_POST["id"];
      $Cantidad = $_POST["cantidad"];

      $sql = "UPDATE carrito set Cantidad_carrito = '$Cantidad'
      where id_carrito = '$id'";

      $query = mysqli_query($conn, $sql);

      if ($query) {
        echo "<script> alert( Archivo Agregado )</script>";
      }else {
        echo "<script> alert( Error )</script>";
      }
    
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
                <h5 class="mb-3"><a href="#!" class="text-body"><i
                      class="fas fa-long-arrow-alt-left me-2"></i>Continue shopping</a></h5>
                <hr>

                <div class="d-flex justify-content-between align-items-center mb-4">
                  <div>
                    <p class="mb-1">Shopping cart</p>
                    <p class="mb-0">You have  items in your cart</p>
                  </div>
                  <div>
                    <p class="mb-0"><span class="text-muted">Sort by:</span> <a href="#!"
                        class="text-body">price <i class="fas fa-angle-down mt-1"></i></a></p>
                  </div>
                </div>

                
                        

                        
                        <div class="card mb-3 mb-lg-0">
                          <div class="card-body">
                            <div class="d-flex justify-content-between">
                              <div class="d-flex flex-row align-items-center">
                                <div class="card-body">
                                  <div class="table-responsive-sm">
                                    <table class="table">
                                      <thead>
                                        <tr>
                                          <th scope="col">Imágen</th>
                                          <th scope="col">Descripción</th>
                                          <th scope="col">Cantidad</th>
                                          <th scope="col">Precio unitario</th>
                                          <th scope="col">Acción</th>
                                          <th scope="col">Precio Total</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                     
                                      <?php
                                          /////////////////////////////////////////
                                          ////////////Method Select all////////////
                                          /////////////////////////////////////////
                                    
                                          try{

                                            include("DataBase.php");
                                              $query = "SELECT * From carrito";
                                              $result = mysqli_query($conn, $query);
                                              $num = 0;
                                              $precio_producto = 0;
                                              $sub_total = 0;
                                              $envio = 2000;
                                              $precio_total = 0;

                                              if (mysqli_num_rows($result) > 0) {

                                                while ($lista_t_carrito = mysqli_fetch_array($result)) {?>

                                       <tr class="">  
                                        <td>
                                          <div>
                                            <img
                                              src="Imagenes/<?php echo $lista_t_carrito["imagen_carrito"]?>"
                                              class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;">
                                          </div>
                                        </td>
                                        <td scope="row">
                                            <div class="ms-3">
                                              <h5><?php echo $lista_t_carrito["desc_carrito"] ?></h5>
                                            </div>
                                        </td>
                                        <td scope="row">
                                          <div >
                                          <form action="Carrito_Compras.php" method="post" enctype=multipart/form-data>
                                          <input type="hidden" id="id" name="id" style="width: 50px;" value="<?php echo $lista_t_carrito["id_carrito"] ?>">
                                            <input type="number" id="cantidad" name="cantidad" style="width: 40px" min="1" value="<?php echo $lista_t_carrito['Cantidad_carrito'] ?>">
                                            <button onclick="return confirm('Seguro que deséa cambiar la cantidad')" name="btneditar" title="Refrescar" id="btneditar" class="btn btn-light" type="submit" >
                                              <a href="#" ><i class="bi bi-arrow-clockwise"></i></a>
                                            </button>
                                          </form>
                                             </div>
                                        </td>
                                        <td scope="row">
                                          <div style="width: 80px;">
                                            <h5 class="mb-0">¢<?php echo $lista_t_carrito["precio_carrito"]?></h5>
                                          </div>
                                        </td>
                                        <td scope="row">
                                          <form action="Carrito_Compras.php?EliminarId=<?php echo $lista_t_carrito ['id_carrito'] ?>" method="post" enctype=multipart/form-data>
                                            <button onclick="return confirm('Seguro que deséa elimiar la información')" name="btnborrar" title="Eliminar" id="btnborrar" class="btn btn-light" type="submit" >
                                              <a href="#" ><i class="bi bi-trash3-fill"></i></a>
                                            </button>
                                                </form>
                                          </td>

                                          <?php 
                                              $precio_producto = $lista_t_carrito["precio_carrito"] * $lista_t_carrito["Cantidad_carrito"] ; ?>

                                          <td scope="row">
                                          <div style="width: 80px;">
                                            <h5 class="mb-0">¢<?php echo $precio_producto?></h5>
                                          </div>
                                          </td>
                                         </tr>
                                          <?php
                        $num++;
                        $sub_total += $precio_producto;                      
                      }
                      $precio_total = $sub_total + $envio;
                    }else{
                      echo "<div class='alert alert-primary' role='alert'>No hay producto en el carrito...! </div>";
                    }
                      $conn -> close();
                  } catch (Exception $ex) {
                    echo $ex -> getMessage();
                  }
                  echo "<div class='alert alert-primary' role='alert'>Cantidad de productos en el carrito: $num </div>";
                  
                
                    
                  ?>
                                      <form action="Carrito_Compras.php?EliminarId=<?php echo $lista_t_carrito ['id_carrito'] ?>" method="post" enctype=multipart/form-data>
                                      <button onclick="return confirm('Seguro que deséa elimiar todas las compras')" name="btneliminar" title="Eliminar todo" id="btneliminar" class="btn btn-light" type="submit" >
                                      <i class="bi bi-trash3-fill"></i> Eliminar todo
                                      </button>
                                      </form>
                                    </tbody>
                                  </table>
                                </div>
                      </div>
                    </div>
                             
                            </div>
                          </div>
                        </div>
                        

              </div>
              <div class="col-lg-5">

                <div class="card bg-primary text-white rounded-3">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                      <h5 class="mb-0">Card details</h5>
                      <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-6.webp"
                        class="img-fluid rounded-3" style="width: 45px;" alt="Avatar">
                    </div>

                    <p class="small mb-2">Card type</p>
                    <a href="#!" type="submit" class="text-white"><i
                        class="fab fa-cc-mastercard fa-2x me-2"></i></a>
                    <a href="#!" type="submit" class="text-white"><i
                        class="fab fa-cc-visa fa-2x me-2"></i></a>
                    <a href="#!" type="submit" class="text-white"><i
                        class="fab fa-cc-amex fa-2x me-2"></i></a>
                    <a href="#!" type="submit" class="text-white"><i class="fab fa-cc-paypal fa-2x"></i></a>

                    <form class="mt-4">
                      <div data-mdb-input-init class="form-outline form-white mb-4">
                        <input type="text" id="typeName" class="form-control form-control-lg" siez="17"
                          placeholder="Cardholder's Name" />
                        <label class="form-label" for="typeName">Cardholder's Name</label>
                      </div>

                      <div data-mdb-input-init class="form-outline form-white mb-4">
                        <input type="text" id="typeText" class="form-control form-control-lg" siez="17"
                          placeholder="1234 5678 9012 3457" minlength="19" maxlength="19" />
                        <label class="form-label" for="typeText">Card Number</label>
                      </div>

                      <div class="row mb-4">
                        <div class="col-md-6">
                          <div data-mdb-input-init class="form-outline form-white">
                            <input type="text" id="typeExp" class="form-control form-control-lg"
                              placeholder="MM/YYYY" size="7" id="exp" minlength="7" maxlength="7" />
                            <label class="form-label" for="typeExp">Expiration</label>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div data-mdb-input-init class="form-outline form-white">
                            <input type="password" id="typeText" class="form-control form-control-lg"
                              placeholder="&#9679;&#9679;&#9679;" size="1" minlength="3" maxlength="3" />
                            <label class="form-label" for="typeText">Cvv</label>
                          </div>
                        </div>
                      </div>

                    </form>

                    <hr class="my-4">

                    

                    <div class="d-flex justify-content-between">
                      <p class="mb-2">Subtotal</p>
                      <p class="mb-2">¢<?php echo $sub_total ?></p>
                    </div>

                    <div class="d-flex justify-content-between">
                      <p class="mb-2">Envío</p>
                      <p id="envio" name="envio" class="mb-2">¢2000</p>
                    </div>

                    <div class="d-flex justify-content-between mb-4">
                      <p class="mb-2">Total(Incl. taxes)</p>
                      <p class="mb-2">¢<?php echo $precio_total ?></p>
                    </div>

                    <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-info btn-block btn-lg">
                      <div class="d-flex justify-content-between">
                        <span>¢<?php echo $precio_total ?> </span>
                        <span> Checkout <i class="fas fa-long-arrow-alt-right ms-2"></i></span>
                      </div>
                    </button>

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