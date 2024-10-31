


<!doctype html>
<html lang="en">

<head>
  <title>Matcha Health CR</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
	integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

  <!-- JQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Link de iconos bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
	

</head>

<body>
  <header>

  <?php
        $servidor = "localhost"; // 127.0.0.1
        $DataBase = "matcha_db";
        $User = "root";
        $Pass = "";

        $conn_header = mysqli_connect("$servidor","$User","$Pass","$DataBase");


        $sql_contador = "SELECT * from carrito";
        $query_contador = mysqli_query($conn_header, $sql_contador);
        $cont = 0;

        if(mysqli_num_rows($query_contador) > 0){
          
          while ($lista_t_carrito = mysqli_fetch_array($query_contador)) {
           $cont++;
          }
        }
        ?>

	<!-- place navbar here -->
	<h1 align="center">Matcha Health CR </h1>

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="http://localhost/Pryecto_web/index.php">Comprar</a>
   <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Proyecto
          </a>
          <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                    <li><a class="dropdown-item" href="https://curriculum-me.rf.gd/Login.php">Login</a></li>
					<li><a class="dropdown-item" href="https://curriculum-me.rf.gd/Seccion/TiposEmpleados/index.php">Tipo de empleado</a></li>
					<li><a class="dropdown-item" href="https://curriculum-me.rf.gd/Seccion/Usuarios/index.php">Usuarios</a></li>
					<li><a class="dropdown-item" href="https://curriculum-me.rf.gd/Seccion/Vuelos/index.php">Vuelos</a></li>
				
          </ul>
        </li>
        <li id="Drop_Info" class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Información
          </a>
          <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
					<li><a id="info1" class="dropdown-item" href="#">Información de contacto</a></li>
					<li><a id="info2" class="dropdown-item" href="#">Educación</a></li>
					<li><a id="info3" class="dropdown-item" href="#">Habilidades</a></li>
			
          </ul>
        </li>        
        <a class="navbar-brand" href="http://localhost/Pryecto_web/Carrito_Compras.php"><i class="bi bi-bag-fill" title="Carrito de comprás"><?php echo $cont ?></i></a>

      </ul>
    </div>
  </div>
</nav>

	
  </header>

  

  
  <main class="container">