<?php include("../../Template/Header.php"); ?>

<?php 
		try {

			require("../../DataBase.php");

				if (isset($_POST["submit"]) && ($_POST["Descripcion"])) {
					
					$nombre = $_POST["Descripcion"];

					$sql = "INSERT INTO estado VALUES ( null , '$nombre')";

					$query = mysqli_query($conn, $sql);

					if ($query) {
						echo "<script> alert( Archivo Agregado )</script>";
						header("location:index.php");
						exit();
					}else {
						echo "<script> alert( Error )</script>";
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
				  <label for="Descripcion" class="form-label">Descripción del Esatdo</label>
				  <input type="text"
					class="form-control" name="Descripcion" id="Descripcion" aria-describedby="helpId" placeholder="Descripcion del estado" required>
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
		
		$("#Drop_Info").hide();
	
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
