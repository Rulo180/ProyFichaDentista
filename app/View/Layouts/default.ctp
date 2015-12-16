<?php

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		//echo $this->Html->css('cake.generic');
                echo $this->Html->css('estilos');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
                
                echo $this->Html->script('jquery-2.1.4'); // Include jQuery library
	?>
    
<!--        <script type="text/javascript"> $(document).ready(function () 
                { alert('JQuery is succesfully included'); }); 
        </script>-->
</head>
<body>
	<div id="frame">
		<div id="header">
		<div id="logo">
			<h1><a href="#">Atmosphere</a></h1>
                        
		</div>
		<div id="menu">
                    <ul class="desplegable">
				<li><a href="/ProyFichaDentista/Pacientes">Pacientes</a></li>
                                <li><a href="/ProyFichaDentista/Turnos">Turnos</a>
                                    <ul>
                                        <li><a href="/ProyFichaDentista/Turnos/buscar/1">Hoy</a></li>
                                        <li><a href="/ProyFichaDentista/Turnos/buscar/2">Semana</a></li>
                                        <li><a href="/ProyFichaDentista/Turnos/buscar/3">Mes</a></li>
                                        <li><a href="/ProyFichaDentista/Turnos/buscar/4">Año</a></li>
                                    </ul>
                                </li>
                                <li><a href="/ProyFichaDentista/FichaDentals">Fichas</a></li>
                                <li><a>Parámetros</a>
                                    <ul>
                                        <li><a href="/ProyFichaDentista/Prestacions">Prestaciones</a></li>
                                        <li><a href="/ProyFichaDentista/ObraSocials">Obras</a></li>
                                        <li><a href="/ProyFichaDentista/Dientes">Dientes</a></li>
                                        <li><a href="/ProyFichaDentista/Caras">Caras</a></li>
                                    </ul>
                                </li>
			</ul>
		</div>
                </div>
	<!-- end #header -->
                <div id ="container">       
                    <div id="content">

                            <?php echo $this->Session->flash(); ?>
                        
                        <div id="breadcrumbs"><?php echo $this->Breadcrumb->render(); ?> </div>
                        
                            <?php echo $this->fetch('content'); ?>
                    </div>
                    <div id="footer">

                            <p>
                                    <?php echo $cakeVersion; ?>
                            </p>
                    </div>
                </div>
	</div>
	<?php 
        echo $this->element('sql_dump');
        echo $this->Js->writeBuffer(); // Write cached scripts
        ?>
    
</body>
</html>
