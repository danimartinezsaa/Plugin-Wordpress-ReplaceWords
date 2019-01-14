<?php

require_once('../../../wp-load.php');

function insert(){
    
    $palabra1=$_POST['palabra_inicio'];
    $palabra2=$_POST['palabra_mostrar'];

    global $wpdb;
    $table_name = $wpdb->prefix . 'plugindani';

    $wpdb->insert( 
    	$table_name, 
    	array( 
    		'palabra1' => $palabra1, 
    		'palabra2' => $palabra2
    		)
    );
    $url = "http://" . $_SERVER["HTTP_HOST"] . "/wp5/wp-admin/admin.php?page=plugin-dani%2Fmenu.php";

    header('Location: '.$url);
}

insert()

?>