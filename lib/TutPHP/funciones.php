<?php

//función de encabezado y colocación del titulo
function hacer_encabezado($titulo)
{
  $encabezado="
    <head>
        <meta charset='UTF-8'>
        <title>$titulo</title>
    </head>
    ";
  echo $encabezado;
}

function variables_sistema($var_sis, $nom_var) {
    echo "<h3>Ver las variables del sistema ($nom_var):</h3>";
    echo '<h4>Todas de golpe:</h4>';
    var_dump($var_sis); 
    
    echo '<h4>Recorrerlas una a una:</h4>';
    foreach ($var_sis as $indice=>$valor)
        echo '<br><b>' . $indice . "</b>: " . $valor ;
    
    if ($nom_var == '$_SERVER') {
        echo '<h4>Acceso directo a una variable:</h4>';        
        echo '<br><b>HTTP_USER_AGENT:</b> ' . $_SERVER['HTTP_USER_AGENT'];
        echo '<br><b>DOCUMENT_ROOT:</b> ' . $_SERVER['DOCUMENT_ROOT'];
    }
    
}

function pruebas_arrays() {
    echo '<h3>Pruebas con arrays:</h3>';
    $vertebrats = array ("Lagartija", "Perro", "Gato", "Ratón");
    array_push($vertebrats, "Gorrión", "Paloma", "Oso");
    $insectos = array ("Hormiga", "Mosquito", "Araña", "Libélula");
    $animales = array_merge($vertebrats, $insectos);
    foreach ($animales as $actual)
            echo $actual . " | ";  
    echo '<h4>Arrays asociativos</h4>';
    $estadios_futbol = array("Barcelona"=> "Nou Camp",
        "Real Madrid" => "Santiago Bernabeu",
        "Valencia" => "Mestalla",
        "Real Sociedad" => "Anoeta");
    foreach ($estadios_futbol as $indice=>$actual)
            echo $indice . " -- " . $actual . " | ";
   
}

function pruebas_postgresql() {
    echo '<h3>Pruebas con PostgreSql:</h3>';
    
    
}
?>
