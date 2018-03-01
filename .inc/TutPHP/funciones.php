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

function getConfigDb () {
    echo '<h3>Leyendo Configuración:</h3>';

    $config = new Config();
    $postgr = $config->getConfig("db");
    echo '<b>[db]</b><br>';
    foreach ($postgr as $indice=>$actual)
        echo $indice . " = " . $actual . "<br>";
       
    return $postgr;
}

function pruebas_postgresql($configdb) {
// http://php.net/manual/es/book.pgsql.php
    echo '<h3>Pruebas con PostgreSql:</h3>';
    $dsn = 'host=' . $configdb['host'] . ' dbname=' . $configdb['dbname']
         . ' user=' . $configdb['user'] . ' password=' . $configdb['password'];
    $table = $configdb['table'];
    echo 'Dsn: ' . $dsn . '<br>';
    echo 'Tabla: ' . $table . '<br>';
     // Conectando y seleccionado la base de datos  
    $dbconn = pg_connect($dsn)
        or die('No se ha podido conectar: ' . pg_last_error());

    // Realizando una consulta SQL
    $query = 'SELECT * FROM ' . $table;
    $result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());

    // Imprimiendo los resultados en HTML
    echo "<table>\n";
    // Nombres de las columnas:
    $num_cols = pg_num_fields($result);
    $col_num = 0;
    echo "\t<tr>\n";
    // Aqusest bucle funciona pero dona el warning: PHP Warning:  pg_field_name(): Bad field offset specified
    // while ($col_name = pg_field_name($result, $col_num++)) { 
    while ($col_num < $num_cols) {
        $col_name = pg_field_name($result, $col_num++);
        echo "\t\t<th>$col_name</th>\n";   
    }
    echo "\t</tr>\n";
    // Valores de las columnas    
    while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
        echo "\t<tr>\n";
        foreach ($line as $col_value) {
            echo "\t\t<td>$col_value</td>\n";
        }
        echo "\t</tr>\n";
    }
    echo "</table>\n";

    // Liberando el conjunto de resultados
    pg_free_result($result);

    // Cerrando la conexión
    pg_close($dbconn);    
}
?>
