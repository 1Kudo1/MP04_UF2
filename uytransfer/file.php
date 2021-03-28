<?php
	include "header.php";

	$numeroRandom = strval(rand(10000,99999));
	$nombreArchivo = $_FILES["archivo"]["name"];
	$extension = substr($nombreArchivo, strpos($nombreArchivo, "."));
	$archivo = "files/".date("Y").date("m").date("d").$numeroRandom.$extension;

	$rutaDestino = $archivo;
	$linkDescarga = $_SERVER["HTTP_ORIGIN"]."/uytransfer/$rutaDestino";

	$numlinks = 1;

	if (isset($_COOKIE["numlinks"])) {
		$numlinks = $_COOKIE["numlinks"];
		$numlinks++;
	}

	setcookie("numlinks", $numlinks, time() + 604800);

	setcookie("link$numlinks", $linkDescarga, time() + 604800);

	echo "<h1 class=\"titulo_files\">Archivos enviados recientemente</h1>";	

	if (isset($_COOKIE["numlinks"])) {
		$numlinks = $_COOKIE["numlinks"];

		while (isset($_COOKIE["link$numlinks"])) {

			$link = $_COOKIE["link$numlinks"];
			
			echo "<h3 class=\"files\"><a href=\"$linkDescarga\">$linkDescarga</a></h3>";

			$numlinks--;
		}
	}

?>