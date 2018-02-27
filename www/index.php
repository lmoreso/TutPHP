<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    include('../.inc/TutPHP/funciones.php');
?>
<html>
    <?php
        hacer_encabezado("Tutorial PHP");
    ?>

    <body>
        <h1>Tutorial PHP</h1>
        
        <?php
        variables_sistema($_SERVER, '$_SERVER')
        ?>
        
        <h3>Ver si se está utilizando IE: </h3>
        <h4>Mezclando HTML y PHP: </h4>
        <?php
        if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== FALSE) {
        ?>
        <p>Está usando Internet Explorer</p>
        <?php
        } else {
        ?>
        <p>No está usando Internet Explorer</p>
        <?php
        }
        ?>
        
        <?php
        echo '<h4>Sólo PHP: </h4>';
        if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== FALSE) {
            echo '<p>Está usando Internet Explorer</p>';
        } else {
            echo '<p>No está usando Internet Explorer</p>';
        }

        echo ' 
        <h3>Ejemplo de Formulario:</h3>
        <form action="accion.php" method="post">
         <p>Su nombre: <input type="text" name="nombre" /></p>
         <p>Su edad: <input type="text" name="edad" /></p>
         <p><input type="submit" /></p>
        </form>
        ';        
        
        pruebas_arrays();
        
        pruebas_postgresql();
        
        echo '<br><h3>Llamada a phpinfo():</h3>';
        phpinfo();       
        ?>
        
    </body>
</html>
