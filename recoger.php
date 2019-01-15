<?php

require_once('../../../wp-load.php');


//Recoge las palabras del formulario de menu.php y las inserta en la tabla.
function insert(){
    //Palabras del menú
    $palabra1=$_POST['palabra_inicio'];
    $palabra2=$_POST['palabra_mostrar'];

    global $wpdb;
    //Nombre de la tabla
    $table_name = $wpdb->prefix . 'plugindani';

    //Inserción en la tabla
    $wpdb->insert( 
    	$table_name, 
    	array( 
    		'palabra1' => $palabra1, 
    		'palabra2' => $palabra2
    		)
    );

    //url del menú
    $url = "http://" . $_SERVER["HTTP_HOST"] . "/wp5/wp-admin/admin.php?page=plugin-dani%2Fmenu.php";
    //volvemos al menú
    header('Location: '.$url);
}

insert()

?>