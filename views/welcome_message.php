<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Talde 5</title>

		<style type="text/css">

		::selection { background-color: #0174DF; color: white; }
		::-moz-selection { background-color: #0174DF; color: white; }

		body {
			background-image: url('../../img/fondo.jpg');
			background-color: #2E2E2E;
			margin: 40px;
			font: 15px/20px normal Helvetica, Arial, sans-serif;
			color: #4F5155;
		}

		a {
			color: #003399;
			background-color: transparent;
			font-weight: normal;
		}

		h1 {
			color: white;
			background-color: #0e81d0;
			border-bottom: 1px solid #D0D0D0;
			text-align: center;
			margin: 0 0 14px 0;
			padding: 14px 15px 10px 15px;
		}

		code {
			font-family: Consolas, Monaco, Courier New, Courier, monospace;
			font-size: 15px;
			background-color: #f9f9f9;
			border: 1px solid #D0D0D0;
			color: #002166;
			display: block;
			margin: 14px 0 14px 0;
			padding: 12px 10px 12px 10px;
		}

		/* ----------------------------------------------------------Bob animazioa------------------------------------------------------ */
		@-webkit-keyframes hvr-bob {
		  0% {
		    -webkit-transform: translateY(-8px);
		    transform: translateY(-8px);
		  }
		  50% {
		    -webkit-transform: translateY(-4px);
		    transform: translateY(-4px);
		  }
		  100% {
		    -webkit-transform: translateY(-8px);
		    transform: translateY(-8px);
		  }
		}
		@keyframes hvr-bob {
		  0% {
		    -webkit-transform: translateY(-8px);
		    transform: translateY(-8px);
		  }
		  50% {
		    -webkit-transform: translateY(-4px);
		    transform: translateY(-4px);
		  }
		  100% {
		    -webkit-transform: translateY(-8px);
		    transform: translateY(-8px);
		  }
		}
		@-webkit-keyframes hvr-bob-float {
		  100% {
		    -webkit-transform: translateY(-8px);
		    transform: translateY(-8px);
		  }
		}
		@keyframes hvr-bob-float {
		  100% {
		    -webkit-transform: translateY(-8px);
		    transform: translateY(-8px);
		  }
		}
		.hvr-bob {
		  display: inline-block;
		  vertical-align: middle;
		  -webkit-transform: perspective(1px) translateZ(0);
		  transform: perspective(1px) translateZ(0);
		  box-shadow: 0 0 1px transparent;
		}
		.hvr-bob:hover, .hvr-bob:focus, .hvr-bob:active {
		  -webkit-animation-name: hvr-bob-float, hvr-bob;
		  animation-name: hvr-bob-float, hvr-bob;
		  -webkit-animation-duration: .3s, 1.5s;
		  animation-duration: .3s, 1.5s;
		  -webkit-animation-delay: 0s, .3s;
		  animation-delay: 0s, .3s;
		  -webkit-animation-timing-function: ease-out, ease-in-out;
		  animation-timing-function: ease-out, ease-in-out;
		  -webkit-animation-iteration-count: 1, infinite;
		  animation-iteration-count: 1, infinite;
		  -webkit-animation-fill-mode: forwards;
		  animation-fill-mode: forwards;
		  -webkit-animation-direction: normal, alternate;
		  animation-direction: normal, alternate;
		}

		/* ----------------------------------------------------------RectangleOut animazioa------------------------------------------------------ */
			.hvr-rectangle-out {
			  display: inline-block;
			  vertical-align: middle;
			  -webkit-transform: perspective(1px) translateZ(0);
			  transform: perspective(1px) translateZ(0);
			  box-shadow: 0 0 1px transparent;
			  position: relative;
			  -webkit-transition-property: color;
			  transition-property: color;
			  -webkit-transition-duration: 0.3s;
			  transition-duration: 0.3s;
			}
			.hvr-rectangle-out:before {
			  content: "";
			  position: absolute;
			  z-index: -1;
			  top: 0;
			  left: 0;
			  right: 0;
			  bottom: 0;
			  background: #0174DF;
			  -webkit-transform: scale(0);
			  transform: scale(0);
			  -webkit-transition-property: transform;
			  transition-property: transform;
			  -webkit-transition-duration: 0.3s;
			  transition-duration: 0.3s;
			  -webkit-transition-timing-function: ease-out;
			  transition-timing-function: ease-out;
			}
			.hvr-rectangle-out:hover, .hvr-rectangle-out:focus, .hvr-rectangle-out:active {
			  color: white;
			}
			.hvr-rectangle-out:hover:before, .hvr-rectangle-out:focus:before, .hvr-rectangle-out:active:before {
			  -webkit-transform: scale(1);
			  transform: scale(1);
			}

		#body {
			background-color: #FFFFFF;
			text-align: center;
		}

		p.footer {
			text-align: center;
			color: #FFFFFF;
			font-size: 11px;
			border-top: 1px solid #D0D0D0;
			line-height: 48px;
			padding: 0 10px 0 10px;
			margin: 151px 0 0 0;
		}

		#container {
			background-color: #FFFFFF;
			margin: 10px;
			border: 1px solid #D0D0D0;
			box-shadow: 0 0 8px #D0D0D0;
		}

		</style>
	</head>

	<body>

		<div id="container">
			<h1>Ongi Etorri Talde5 Errubrika Proiektura!</h1>

			<div id="body">
				<p>Gure erronka, <strong>Errubrika</strong> sisteman oinarritutako aplikazio bat sortzea da, irakasleek ikasleak ebaluatzeko.</p>

				<p><strong>GitHub</strong> erabiliko dugu zihurtasun kopiak egiteko eta aplikazioaren bertsioen kontrola eramateko.</p>

				<p>Gure aplikazioan sartu nahi izatean hurrengo helbidean egin klik:</p>
					<code class="hvr-bob"><a class="hvr-rectangle-out" href="<?php echo base_url(); ?>index.php/Login/">localhost/CodeIgniter/index.php/Login</a></code>
			</div>
		</div>

		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>

		<div id="container">

		<h1>¡Bienvenidos al proyecto de Rúbricas de Talde5!</h1>

		<div id="body">
			<p>Nuestro reto consiste en crear una aplicación basada en el sistema de <strong>Rúbricas</strong> para que los profesores puedan evaluar a los alumnos.</p>

			<p>Utilizaremos <strong>GitHub</strong> para las copias de seguridad y para llevar un control de versiones de la aplicación.</p>

			<p>Si quieres entrar en nuestra aplicación haz clic aquí:</p>
				<code class="hvr-bob"><a class="hvr-rectangle-out" href="<?php echo base_url(); ?>index.php/Login/">localhost/CodeIgniter/index.php/Login</a></code>
		</div>
	</div>

	<p class="footer">Orrialdea <strong>{elapsed_time}</strong> segundutan sortuta dago. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Bertsioa <strong>' . CI_VERSION . '</strong>' : '' ?></p>

	</body>
</html>