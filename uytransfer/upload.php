		<?php
			include "header.php"

			print_r($_POST);
			print_r($_FILES);

			if (!empty($_POST)) {

				$nombre = $_POST["nombre"];

				echo "<p>Hola $nombre</p>";

				if ($_FILES["archivo"]["error"] == 0) {

					$nombreArchivo = $_FILES["archivo"]["name"];

					echo "<p> Nombre del archivo: $nombreArchivo";

				} else {
					echo "<p>No funciona!</p>";
				}

				if(isset($_POST["pormail"])){
				echo "Se tiene que enviar un mail!";
				}

			} else {
				header("Location: index.php");
			}


		?>

	</body>
</html>	