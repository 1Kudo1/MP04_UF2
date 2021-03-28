		<?php
			include "header.php";

			print_r($_POST);
			print_r($_FILES);

			if (!empty($_POST)) {

				echo "<div>";

				$numeroRandom = strval(rand(10000,99999));
				$nombreArchivo = $_FILES["archivo"]["name"];
				$extension = substr($nombreArchivo, strpos($nombreArchivo, "."));
				$archivo = "files/".date("Y").date("m").date("d").$numeroRandom.$extension;

				$rutaDestino = $archivo;
				$linkDescarga = $_SERVER["HTTP_ORIGIN"]."/uytransfer/$rutaDestino";

				if ($_POST["nombre"] == "") {

                    $nombre = "Oye tú!!!";
                } else {

                    $nombre = $_POST["nombre"];
                }

                if ($_FILES["archivo"]["size"] > 10000000) {
                        echo "
                            <div class=\"img\">
                                <img src='images/mal.png'/>
                                <h1>El archivo supera el tamaño permitido</h1>
                            </div>
                        ";
                } else if ($extension != ".pdf" && $extension != ".PNG" && $extension != ".jpg" && $extension != ".rar" && $extension != ".zip") {
                	 echo "
                        <div>
                            <img src='images/mal.png'/>
                            <h1>El formato del archivo no es correcto, estos son los formatos de archivo permitidos:</h1>
                            <h2>PDF, PNG, JPG, RAR, ZIP</h2>
                        </div>
                        ";
                }				

				if ($_FILES["archivo"]["error"] == 0) {
					if (move_uploaded_file($_FILES["archivo"]["tmp_name"],$archivo)) {
                            if (array_key_exists("pormail", $_POST)) {
                                if (str_contains($_POST["email"], '@')) {
                                    if (empty($_POST["mensaje"])) {
                                    	ini_set('SMTP', 'smtp.gmail.com');
                                    	ini_set('smtp_port','587');
                                        mail($_POST["email"], "UyTransfer", 'Sorpresa!! Alguien ha compartido contigo un archivo: $linkDescarga');
                                    }else {
                                    	ini_set('SMTP', 'smtp.gmail.com');
                                    	ini_set('smtp_port','587');
                                    	ini_set('sendmail_from', 'uytransfer@gmail.com');
                                        mail($_POST["email"], "UyTransfer", $_POST["mensaje"],'Este es tu link: $linkDescarga');
                                    }
									echo "
				                		<div>
				                			<img src='images/bien.png'/>
				                			<h1>Archivo enviado correctamente</h1>
				                		</div>
				                	";

									echo "<h3>Hola $nombre, usa éste link para compartir tu archivo</h3>";

									echo "<h3><a href=\"$rutaDestino\">$linkDescarga</a></h3>";
								}else {
                                    header("Location: http://localhost/EX1/index.php?error_mail=1",false);
                                }
                            }else {
                            	echo "
				                		<div>
				                			<img src='images/bien.png'/>
				                			<h1>Archivo enviado correctamente</h1>
				                		</div>
				                	";

									echo "<h3>Hola $nombre, usa éste link para compartir tu archivo</h3>";

									echo "<h3><a href=\"$rutaDestino\">$linkDescarga</a></h3>";
								}
					}else {
                            echo "
                                <div class=\"img\">
                                	<img src='images/mal.png'/>
                                	<h1>Error, archivo no enviado</h1>
                                    <h3>Lo siento ".$nombre.", el archivo no se ha podido enviar.</h3>
                                </div>
                            ";
                    }
						
				}		

			}

			echo "</div>";
		?>

	</body>
</html>	