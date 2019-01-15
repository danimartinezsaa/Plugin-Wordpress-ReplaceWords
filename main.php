<?php

/*
Plugin Name: Plugin Dani
Plugin URI:  http://mydanimartinez.com
Description: Plugin creado en clase de SXE
Version:     1.0a
Author:      Daniel Martínez
Author URI:  http://mydanimartinez.com
License:     GPL2 etc
License URI: http://license.es
*/

//Accion para crear una tabla cuando se activa el plugin
function tabla($post_ID) {

    global $wpdb;
    $charset_collate = $wpdb->get_charset_collate();

    // le añado el prefijo a la tabla.
    $table_name = $wpdb->prefix . 'plugindani';

    // creamos la sentencia sql
    $sql ="CREATE TABLE IF NOT EXISTS $table_name (
        palabra1 varchar(80),
        palabra2 varchar(80),
        PRIMARY KEY(palabra1)
    ) $charset_collate;";

    //Importamos el upgrade.php para usar el dbDelta
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    //Ejecutamos el sql
    dbDelta( $sql );
    return $post_ID;
}

add_action('activate_plugin-dani/main.php', 'tabla');


//Menú de opciones
function mimenu()
{
    add_menu_page(
        'Menú', //Título de la página
        'Plugin Dani', //Título que sale en el menú de Wordpress
        'manage_options', //Requerido para que aparezca
        plugin_dir_path(__FILE__) . '/menu.php' //Archivo del menú
    );
}

add_action( 'admin_menu', 'mimenu' );


//Función para sustituir las palabras
function sustituir( $text ) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'plugindani';
    $results1 = $wpdb->get_results( "SELECT palabra1 FROM $table_name", OBJECT );
    $results2 = $wpdb->get_results( "SELECT palabra2 FROM $table_name", OBJECT );
	
    $search = array();
    $replace= array();
    
	for($i=0;$i<count($results1); $i++) {
        array_push($search,$results1[$i]->palabra1);
        array_push($replace,$results2[$i]->palabra2);
	};

	return str_replace( $search, $replace, $text );
}

add_filter( 'the_content', 'sustituir' );

?>