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

//Accion para crear la tabla cuando se activa el plugin
function tabla($post_ID) {
  //traemos la variable global wpdb para conectarnos a la base de datos
  global $wpdb;
  //traemos el charset para que los caracteres sean los de nuestro idioma
  $charset_collate = $wpdb->get_charset_collate();

  // le añado el prefijo a la tabla
  $table_name = $wpdb->prefix . 'plugindani';

  // creamos la sentencia sql
  $sql = "CREATE TABLE IF NOT EXISTS $table_name (
   palabra1 text NOT NULL,
   palabra2 text NOT NULL,
   PRIMARY KEY (palabra1)
  ) $charset_collate;";

  //Importamos el upgrade.php para usar el dbDelta
  require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
  //Ejecutamos el sql
  dbDelta( $sql );
  return $post_ID;
}
//Acción cuando se activa wp-renyme...Hay que poner nombre y archivo .php
add_action('activate_plugin-dani/main.php', 'tabla');



//Menú de opciones
add_action( 'admin_menu', 'mimenu' );

function mimenu()
{
 add_menu_page(
 'Menú', //Título de la página
 'Plugin Dani', //Título que sale en el menú de Wordpress
 'manage_options', //Requerido para que aparezca
 plugin_dir_path(__FILE__) . '/menu.php' //Archivo del menú
 );
}


?>