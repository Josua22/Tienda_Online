<?php include("../../Template/Header.php"); ?>

<?php 
		try {

			require("../../DataBase.php");

				if (isset($_POST["submit"])) {

					$id = $_POST['id'];

					$imagen = $_FILES['imagen']['name'];
					
					//informacion de la extencion del archivo
					$ext = pathinfo($imagen, PATHINFO_EXTENSION);

					//extenciones permitidas
					$allowedTypes = array("jpg","jpeg","png","gif");

					//Template del archivo
					$tmpName = $_FILES["imagen"]["tmp_name"];

					//agregar archivo al folder imagenes del pryecto
					$targetpath = '../../Imagenes/'.$imagen;

					$descripcion = $_POST["Descripcion"];
                    $precio = $_POST["precio"];

					$sql = "UPDATE producto set imagen = '$imagen' , desc_producto = '$nombre', precio = '$precio'
					where id_producto = '$id'";

					$query = mysqli_query($conn, $sql);

					if ($query) {
						echo "<script> alert( 'Archivo Agregado' )</script>";
						header("location:index.php");
						exit();
					}else {
						echo "<script> alert( 'Error' )</script>";
					}
				}

		} catch (Exception $ex) {
			echo $ex -> getMessage($sql);
		}
	
	?>

	<br/>

	<div class="card">
		<div class="card-header">
			Editar Estado
		</div>
		<div class="card-body">
			<form action="Editar.php" class="needs-validation" method="post" enctype=multipart/form-data novalidate>

			<?php 
		
					try{
						
					include("../../DataBase.php");
									
					$idupdate = $_GET['update'];

						$sql_Select = "SELECT * FROM producto where id_producto = '$idupdate'";

						$run = mysqli_query($conn, $sql_Select);

						while ($row = mysqli_fetch_array($run)) {
				?>

                <input type="text" value="<?php echo $row['id_producto'] ?>"
					class="form-control" name="id" id="id" aria-describedby="helpId" placeholder="ID del producto" required>
			
                    <div class="mb-3">
				  <label for="imagen" class="form-label">Ediar ímagen</label>
				  <input type="file" value="../../Imagenes/.<?php echo $row['imagen'] ?>"
					class="form-control" name="imagen" id="imagen" aria-describedby="helpId" placeholder="Agregar Imagen" required>
					<div class="valid-feedback">
							<span id="Descripcion-error">Información correcta!!</span>
							</div>
							<div class="invalid-feedback">
							<span id="Descripcion-error">La Archivo es requerida!!</span>
							</div>

                <label for="Descripcion" class="form-label">Descripción del producto</label>
				  <input type="text" value="<?php echo $row['desc_producto']?>"
					class="form-control" name="Descripcion" id="Descripcion" aria-describedby="helpId" placeholder="Descripcion del estado" required>
					<div class="valid-feedback">
							<span id="Descripcion-error">Información correcta!!</span>
							</div>
							<div class="invalid-feedback">
							<span id="Descripcion-error">La descripción es requerida!!</span>
							</div>
                
                <label for="precio" class="form-label">Precio del producto</label>
				  <input type="number" value="<?php echo $row['precio'] ?>"
					class="form-control" name="precio" id="precio" aria-describedby="helpId" placeholder="Precio del estado" required>
					<div class="valid-feedback">
							<span id="Descripcion-error">Información correcta!!</span>
							</div>
							<div class="invalid-feedback">
							<span id="Descripcion-error">El precio es requerido!!</span>
							</div>

                
				</div>


				<button type="submit" name="submit" class="btn btn-success">Agregar</button>
				<a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
			</form>
			<?php 
				}

	
			
		}catch (Exception $ex) {
			echo $ex -> getMessage($sql);
		}

		?>
		</div>
	</div>

	<script>
		
		$("#id").hide();
		
	
			// Example starter JavaScript for disabling form submissions if there are invalid fields
			(function () {
			'use strict'
	
			// Fetch all the forms we want to apply custom Bootstrap validation styles to
			var forms = document.querySelectorAll('.needs-validation')
	
			// Loop over them and prevent submission
			Array.prototype.slice.call(forms)
				.forEach(function (form) {
				form.addEventListener('submit', function (event) {
					if (!form.checkValidity()) {
					event.preventDefault()
					event.stopPropagation()
					}
	
					form.classList.add('was-validated')
				}, false)
				})
			})()
	
		</script>


 <?php include("../../Template/footer.php"); ?>
