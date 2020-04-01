<?php

	namespace factcli\models;

	class Outils{

		public static function headerHTML($titre)
		{
			echo '
		<!DOCTYPE html>
		<html lang="fr">
	  		<head>
	    		<meta  charset="utf-8">
	    		<title>'.$titre.'</title>
	   			<meta name="viewport" content="width=device-width, initial-scale=1.0">
	  		</head>

	  		<body>';
		}		

		public static function footerHTML()
		{
			echo "	</body>
				</html>";
		}
	}
?>