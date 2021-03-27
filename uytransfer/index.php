		<?php
			include "header.php";
		?>

		<nav>
			<h1>Uy!Transfer</h1>
			<a href="upload.php">Enviar archivo</a>
			<a href="">|</a>
			<a href="">Mis últimos archivos</a>
		</nav>

		<form name="subir" action="upload.php" method="post" enctype="multipart/form-data">
			<p class="formulario"><input size="50" type="text" name="nombre" placeholder="Tu nombre"></p>
			<p class="formulario"><input type="file" name="archivo"></p>
			<p class="formulario"><input type="checkbox" name="pormail"> Quiero enviar el link de descarga por email</p>
			<p class="formulario"><input size="50" type="mail" name="email" placeholder="Email del destinatario"></p>
			<p class="formulario"><textarea style="width: 320px" name="mensaje" placeholder="Escribe tu mensaje"></textarea></p>
			<p class="formulario"><button type="subir">Enviar</button></p>
		</form>


	</body>
</html>	