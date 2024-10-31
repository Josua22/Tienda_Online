


<?php include("../../Template/Header.php"); ?>



	<br/>

	<div class="card">
	<div class="card-header">
		<form action="index.php" method="post">

			<a name="" id="" class="btn btn-success" 
			href="Crear.php" role="button">
				Agregar
			</a>

			<a name="" id="" class="btn btn-primary" 
			href="index.php" role="button">
				Refrescar
			</a>

			<input name="buscar" id="buscar" class="btn btn-dark" type="submit" value = "Buscar">
												
			<input type="text" name="search" id="search"
			 placeholder="Buscar por descripción">
		
		</form>
		</div>
		<div class="card-body">
			<div class="table-responsive-sm">
				<table class="table">
					<thead>
						<tr>
							<th scope="col">ID</th>
							<th scope="col">Descripcion</th>
							<th scope="col">Acciones</th>
						</tr>
					</thead>
					<tbody>

					<?php 

					try {
						include("../../DataBase.php"); //mysqli_connect("localhost","josua","1234","aeropuerto_db");

						if (isset($_POST["buscar"])) {

							/////////////////////////////////////////
							////////////Method Delete into/////////// 
							////////////the method filter////////////
							/////////////////////////////////////////

							if (isset($_GET["userid"])) {
							
							$id = $_GET["userid"];
								
							$sql = "DELETE FROM estado WHERE id_estado = $id";
					
							$Delete = mysqli_query($conn, $sql);
					
							if ($Delete) {
								echo "<script> alert( Archivo Eleminado )</script>";
							}else {
								echo "<script> alert( Error )</script>";
							}
						}

							/////////////////////////////////////////
							////////////Method filter///////////////
							////////////////////////////////////////

							$filter = $_POST['search'];

							$query = "SELECT * From estado where desc_estado = '$filter'";
							$result = mysqli_query($conn, $query);
							$num = 0;

							if (mysqli_num_rows($result) > 0) {


								while ($lista_t_estado = mysqli_fetch_array($result)) {?>
									
									
								
									<tr class="">
										<td scope="row"><?php echo $lista_t_estado ['id_estado'] ?></td>
										<td><?php echo $lista_t_estado ['desc_estado'] ?></td>
										<td>
										<form action="Editar.php?update=<?php echo $lista_t_estado ['id_estado'] ?>" method="post" enctype=multipart/form-data>
												<input  name="btneditar" id="btneditar" class="btn btn-info" type="submit" value="Editar">
																
											</form>
											<form action="index.php?Empleadoid=<?php echo $lista_t_estado ['id_estado'] ?>" method="post" enctype=multipart/form-data>
												<input name="btnborrar" id="btnborrar" class="btn btn-danger" type="submit" value = "Borrar">
																
											</form>
											</td>
									</tr>

								<?php 
							$num++;}
							echo "Cantidad: ". $num;
								}else{
									echo "0 resultados";
								}

							

							$conn -> close();
							


						}elseif (!isset($_POST['search'])) {

							/////////////////////////////////////////
							////////////Method Delete///////////////
							////////////////////////////////////////

							if (isset($_GET["userid"])) {
							
								$id = $_GET["userid"];
									
								$sql = "DELETE FROM estado WHERE id_estado = $id";
						
								$Delete = mysqli_query($conn, $sql);
						
								if ($Delete) {
									echo "<script> alert( Archivo Eleminado )</script>";
								}else {
									echo "<script> alert( Error )</script>";
								}
							}

							/////////////////////////////////////////
							////////////Method Select all////////////
							/////////////////////////////////////////
						

							$query = "SELECT * From estado";
							$result = mysqli_query($conn, $query);
							$num = 0;

							if (mysqli_num_rows($result) > 0) {


								while ($lista_t_estado = mysqli_fetch_array($result)) {?>
									
									
								
									<tr class="">
										<td scope="row"><?php echo $lista_t_estado ['id_estado'] ?></td>
										<td><?php echo $lista_t_estado ['desc_estado'] ?></td>
										<td>
										<form action="Editar.php?update=<?php echo $lista_t_estado ['id_estado'] ?>" method="post" enctype=multipart/form-data>
												<input  name="btneditar" id="btneditar" class="btn btn-info" type="submit" value="Editar">
																
											</form>
											<form action="index.php?userid=<?php echo $lista_t_estado ['id_estado'] ?>" method="post" enctype=multipart/form-data>
												<input name="btnborrar" id="btnborrar" class="btn btn-danger" type="submit" value = "Borrar">
																
											</form>
											</td>
									</tr>

								<?php 
							$num++;}
							echo "Cantidad: ". $num;
								}else{
									echo "0 resultados";
								}

								

						$conn -> close();
						}
							
					} catch (Exception $ex) {
						echo $ex -> getMessage();
					}
					
				
						
					?>

					
					

					</tbody>
				</table>
			</div>
		</div>
	</div>

	<script>

	

	</script>


	
	

 <?php include("../../Template/footer.php"); ?>