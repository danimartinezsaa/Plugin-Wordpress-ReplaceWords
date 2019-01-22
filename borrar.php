<?php

require_once('../../../wp-load.php');

//Recoge la palabra del formulario de menu.php y borra su fila de la tabla
function insert(){
    //Palabras del menú
    $palabra=$_POST['palabra_borrar'];

    global $wpdb;
    //Nombre de la tabla
    $table_name = $wpdb->prefix . 'plugindani';

    //Dorrar fila
    $wpdb->delete( $table_name, array( 'palabra1' => $palabra ) );

    //url del menú
    $url = "http://" . $_SERVER["HTTP_HOST"] . "/wp5/wp-admin/admin.php?page=plugin-dani%2Fmenu.php";
    //volvemos al menú
    header('Location: '.$url);
}

insert()

?>