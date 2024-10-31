
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
							<th scope="col">Imagen</th>
							<th scope="col">Descripción</th>
							<th scope="col">precio</th>
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
								
							$sql = "DELETE FROM producto WHERE id_producto = $id";
					
							$Delete = mysqli_query($conn, $sql);
					
							if ($Delete) {
								echo "<script> alert( 'Archivo Eleminado' )</script>";
							}else {
								echo "<script> alert( 'Error' )</script>";
							}
						}

							/////////////////////////////////////////
							////////////Method filter///////////////
							////////////////////////////////////////

							$filter = $_POST['search'];

							$query = "SELECT * From producto where desc_producto = '$filter'";
							$result = mysqli_query($conn, $query);
							$num = 0;

							if (mysqli_num_rows($result) > 0) {


								while ($lista_t_producto = mysqli_fetch_array($result)) {?>
									
									
								
									<tr class="">
										<td scope="row"><?php echo $lista_t_producto ['id_producto'] ?></td>
										<td><img src="../../Imagenes/<?php echo $lista_t_producto ['imagen'] ?>"/></td>
										<td scope="row"><?php echo $lista_t_producto ['desc_producto'] ?></td>
										<td scope="row"><?php echo $lista_t_producto ['precio'] ?></td>
										<td>
											<form action="index.php?Empleadoid=<?php echo $lista_t_producto ['id_producto'] ?>" method="post" enctype=multipart/form-data>
												<input name="btnborrar" id="btnborrar" class="btn btn-danger" type="submit" value = "Borrar"
												onclick="return confirm('Seguro que deséa elimiar la información')">
																
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
									
								$sql = "DELETE FROM producto WHERE id_producto = $id";
						
								$Delete = mysqli_query($conn, $sql);
						
								if ($Delete) {
									echo "<script> alert( 'Archivo Eleminado' )</script>";
								}else {
									echo "<script> alert( 'Error' )</script>";
								}
							}

							/////////////////////////////////////////
							////////////Method Select all////////////
							/////////////////////////////////////////
						

							$query = "SELECT * From producto";
							$result = mysqli_query($conn, $query);
							$num = 0;

							if (mysqli_num_rows($result) > 0) {


								while ($lista_t_producto = mysqli_fetch_array($result)) {?>
									
									
								
									<tr class="">
                                        <td scope="row"><?php echo $lista_t_producto ['id_producto'] ?></td>
										<td><img src="../../Imagenes/<?php echo $lista_t_producto ['imagen'] ?>"/></td>
										<td scope="row"><?php echo $lista_t_producto ['desc_producto'] ?></td>
										<td scope="row"><?php echo $lista_t_producto ['precio'] ?></td>
										<td>

											<form action="index.php?userid=<?php echo $lista_t_producto ['id_producto'] ?>" method="post" enctype=multipart/form-data>
												<input name="btnborrar" id="btnborrar" class="btn btn-danger" type="submit" value = "Borrar" 
												onclick="return confirm('Seguro que deséa elimiar la información')"/>
																
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