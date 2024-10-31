<?php include("../../Template/Header.php"); ?>

<?php 
		try {

			include("../../DataBase.php");

				if (isset($_POST["submit"])) {
					
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

					//validación de archivo como imagen
					if(in_array($ext,$allowedTypes)){
						if(move_uploaded_file($tmpName, $targetpath)){
							$sql = "INSERT INTO producto VALUES ( null , '$imagen', '$descripcion', '$precio' )";

							$query = mysqli_query($conn_header, $sql);

							if ($query) {
								echo "<script> alert( 'Archivo Agregado' )</script>";
								header("location:index.php");
								exit();
							}else {
								echo "<script> alert( 'Error' )</script>";
							}
						}else{
							echo "<script>
							alert('Archivo no agregado')
							</script>";
						}
					}else{
						echo "<script>
							alert('Extencion de archivo incorrecto. Solo se permiten archivos jpg,png,gif')
							</script>";
					}

					

					
				}

		} catch (Exception $ex) {
			echo $ex -> getMessage($sql);
		}
	
	?>

	<br/>

	<div class="card">
		<div class="card-header">
			Crear Estados
		</div>
		<div class="card-body">
			<form action="Crear.php" class="needs-validation" method="post" enctype=multipart/form-data novalidate>

				<div class="mb-3">
				  <label for="imagen" class="form-label">Agregar Imagen</label>
				  <input type="file"
					class="form-control" name="imagen" id="imagen" aria-describedby="helpId" placeholder="Agregar Imagen" required>
					<div class="valid-feedback">
							<span id="Descripcion-error">Información correcta!!</span>
							</div>
							<div class="invalid-feedback">
							<span id="Descripcion-error">La Archivo es requerida!!</span>
							</div>

                <label for="Descripcion" class="form-label">Descripción del producto</label>
				  <input type="text"
					class="form-control" name="Descripcion" id="Descripcion" aria-describedby="helpId" placeholder="Descripcion del estado" required>
					<div class="valid-feedback">
							<span id="Descripcion-error">Información correcta!!</span>
							</div>
							<div class="invalid-feedback">
							<span id="Descripcion-error">La descripción es requerida!!</span>
							</div>
                
                <label for="precio" class="form-label">Precio del producto</label>
				  <input type="number"
					class="form-control" name="precio" id="precio" aria-describedby="helpId" placeholder="Precio del estado" required>
					<div class="valid-feedback">
							<span id="Descripcion-error">Información correcta!!</span>
							</div>
							<div class="invalid-feedback">
							<span id="Descripcion-error">La descripción es requerida!!</span>
							</div>

                
				</div>

				<button type="submit" name="submit" class="btn btn-success">Agregar</button>
				<a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
			</form>
		</div>
	</div>

	<script>
		
	
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