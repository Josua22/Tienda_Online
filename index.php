
<?php include("Template/Header.php"); ?>

<?php 

try {

    include("DataBase.php");

        if (isset($_POST["submit"])) {
            
            $imagen = $_POST['imagen'];
            $descripcion = $_POST["descripcion"];
            $cantidad = $_POST["cantidad"];
            $precio = $_POST["precio"];

            //Validacion de carrito, no se puede repetir producto
            $sql_cart = "SELECT * from carrito WHERE desc_carrito = '$descripcion'";
            $query_carrito = mysqli_query($conn, $sql_cart);

            if(mysqli_num_rows($query_carrito) > 0){
              echo "<div class='alert alert-primary' role='alert'>Producto ya fué agregadó al carrito...! </div>";
            }else{
              //insertar en tabla carrito
              $sql = "INSERT INTO carrito VALUES ( null , '$imagen', '$descripcion','$cantidad', '$precio' )";

              $query = mysqli_query($conn, $sql);

              if ($query) {
                  echo "<script> alert( 'Archivo Agregado' )</script>";
                  header("location:index.php");
                  exit();
              }else {
                  echo "<script> alert( 'Error' )</script>";
              }
            }

            

        }

} catch (Exception $ex) {
    echo $ex -> getMessage($sql);
}


?>

  <div class="album py-5 bg-light">
    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
      <?php 

        try {
          include("DataBase.php"); //mysqli_connect("localhost","josua","1234","aeropuerto_db");

          if (isset($_POST["buscar"])) {

            /////////////////////////////////////////
            ////////////Method filter///////////////
            ////////////////////////////////////////

            $filter = $_POST['search'];

            $query = "SELECT * From producto where desc_producto = '$filter'";
            $result = mysqli_query($conn, $query);
            $num = 0;

            if (mysqli_num_rows($result) > 0) {

              while ($lista_t_producto = mysqli_fetch_array($result)) {?>

                

                <div class="col">
                  <div class="card shadow-sm">
                    <img src="Imagenes/<?php echo $lista_t_producto ['imagen'] ?>" class="bd-placeholder-img card-img-top" width="100%" height="225" role="img" >

                    <div class="card-body">
                      <p class="card-text"><?php echo $lista_t_producto ['desc_producto'] ?></p>
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">

                        <form action="index.php" class="needs-validation" method="post" enctype=multipart/form-data novalidate>
                          <button type="button" class="btn btn-sm btn-outline-secondary">Agregar al carrito</button>
                        </form>
                          <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                        </div>
                        <small class="text-muted">Precio: <?php echo $lista_t_producto ['precio'] ?> cólones.</small>

                        
                        <input type="hidden" id="imagen" name="imagen" value="<?php echo $lista_t_producto ['imagen'] ?>">
                        <input type="hidden" id="descripcion" name="descripcion" value="<?php echo $lista_t_producto ['desc_producto'] ?>">
                        <input type="hidden" id="cantidad" name="cantidad" value="1">
                        <input type="hidden" id="precio" name="precio" value="<?php echo $lista_t_producto ['precio'] ?>">

                      </div>
                    </div>
                  </div>
                </div>
                <?php 
                $num++;}
                  //echo "Cantidad: ". $num;
              }else{
                echo "<div class='alert alert-primary' role='alert'>Producto no encontrado...! </div>";
              }
              $conn -> close();
    
            }elseif (!isset($_POST['search'])) {

            /////////////////////////////////////////
            ////////////Method Select all////////////
            /////////////////////////////////////////
          

            $query = "SELECT * From producto";
            $result = mysqli_query($conn, $query);
            $num = 0;

            if (mysqli_num_rows($result) > 0) {


              while ($lista_t_producto = mysqli_fetch_array($result)) {?>

                <form action="index.php" class="needs-validation" method="post" enctype=multipart/form-data novalidate>

                <div class="col">
                  <div class="card shadow-sm">
                    <img src="Imagenes/<?php echo $lista_t_producto ['imagen'] ?>" class="bd-placeholder-img card-img-top" width="100%" height="225" role="img" >

                    <div class="card-body">
                      <p class="card-text"><?php echo $lista_t_producto ['desc_producto'] ?></p>
                      <small class="text-muted" >Precio: <?php echo $lista_t_producto ['precio'] ?> cólones.</small>

                      <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                        <form action="index.php" class="needs-validation" method="post" enctype=multipart/form-data novalidate>
                          <button type="submit" name="submit" class="btn btn-sm btn-outline-secondary">Agregar</button>
                        </form>
                          <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                        </div>
                        
                        <input type="hidden" id="imagen" name="imagen" value="<?php echo $lista_t_producto ['imagen'] ?>">
                        <input type="hidden" id="descripcion" name="descripcion" value="<?php echo $lista_t_producto ['desc_producto'] ?>">
                        <input type="hidden" id="cantidad" name="cantidad" value="1">
                        <input type="hidden" id="precio" name="precio" value="<?php echo $lista_t_producto ['precio'] ?>">
                        
                      </div>
                    </div>
                  </div>
                </div>
                </form>
                <?php 
                $num++;
              }
              //echo "<div class='alert alert-primary' role='alert'>Cantidad de productos disponibles $num </div>";

              }else{
                echo "<div class='alert alert-primary' role='alert'>CNo se encontraron ítems para mostrar </div>";
              }

      

      $conn -> close();
    }
      
    } catch (Exception $ex) {
      echo $ex -> getMessage();
    }


  
?>
      </div>
    </div>
  </div>

  <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Album example</h1>
        <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
        <p>
          <a href="#" class="btn btn-primary my-2">Main call to action</a>
          <a href="#" class="btn btn-secondary my-2">Secondary action</a>
        </p>
      </div>
    </div>
  </section>

</main>

 <?php include("Template/footer.php"); ?>


 