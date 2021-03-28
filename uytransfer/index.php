		<?php
			include "header.php";
		?>

		<form name="subir" action="upload.php" method="post" enctype="multipart/form-data">
			<p class="formulario"><input size="50" type="text" name="nombre" placeholder="Tu nombre"></p>
			<p class="formulario"><input type="file" name="archivo"></p>
			<p class="formulario"><input type="checkbox" name="pormail"> Quiero enviar el link de descarga por email</p>
			<p class="formulario"><input size="50" type="mail" name="email" placeholder="Email del destinatario"></p>
			<?php
                if (str_contains($_SERVER["REQUEST_URI"], 'error_mail=1')) {
                    echo "<p style='color: red;'>Email no correcto</p>";
                }
            ?>
			<p class="formulario"><textarea style="width: 320px" name="mensaje" placeholder="Escribe tu mensaje"></textarea></p>
			<p class="formulario"><button type="subir">Enviar</button></p>
		</form>


	</body>
</html>	