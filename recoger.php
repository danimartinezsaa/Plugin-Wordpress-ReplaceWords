<?php
$palabra1=$_POST['palabra_inicio'];
$palabra2=$_POST['palabra_mostrar'];

//traemos la variable global wpdb para conectarnos a la base de datos
global $wpdb;
//traemos el charset para que los caracteres sean los de nuestro idioma
$charset_collate = $wpdb->get_charset_collate();
// creamos la sentencia sql
$sql ="INSERT INTO wp5_plugindani VALUES($palabra1,$palabra2);";
//Importamos el upgrade.php para usar el dbDelta
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
//Ejecutamos el sql
dbDelta( $sql );
?>