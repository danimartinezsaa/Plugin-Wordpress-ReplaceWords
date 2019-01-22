 <?php
    //Consulta para recibir las palabras a sustituir y las palabras por las que la sustituimos
    
    global $wpdb;
    $table_name = $wpdb->prefix . 'plugindani';
    $busqueda = $wpdb->get_results( "SELECT palabra1 FROM $table_name", OBJECT );
    $busqueda2 = $wpdb->get_results( "SELECT palabra2 FROM $table_name", OBJECT );
    
    //Array para, después, mostrar el resultado en una lista
    $search = array();
    $search2= array();
    
	for($i=0;$i<count($busqueda); $i++) {
        array_push($search,$busqueda[$i]->palabra1);
        array_push($search2,$busqueda2[$i]->palabra2);
        
	};
	
?>

<style type="text/css"> 
/*borde del formulario*/
form {
    padding: 1em;
    border: 1px solid #CCC;
    border-radius: 2em;
}

/*borde de la lista*/
.lista-plugin {
    padding: 1em;
    border: 1px solid #CCC;
    border-radius: 2em;
}

/*Margen elementos lista*/
ul li{
    margin-left:2em;
}

/*Efecto al seleccionar*/
input:focus, textarea:focus {
    border-color: #000;
}

/*Margen extra*/
button {
    margin-left: 16em;
    margin-top: 1em;
}
</style> 

<!--Formulario y lista para introducir y ver las palabras introducidas-->
<div class="wrap">
 <h1>Opciones</h1>
 <p>Inserte la palabara que desee sustituir en sus post</p>
 <!-- formulario que pide la palabra a reemplazar y la palabra que se muestra y envía los valores a recoger.php mediante post -->
 <form action="<?php $_SERVER["HTTP_HOST"]; ?>/wp5/wp-content/plugins/plugin-dani/recoger.php" method="post">
  <p>Palabra a sustituir: <input type="text" name="palabra_inicio"/></p>
  <p>Palabra a mostrar: <input type="text" name="palabra_mostrar"/></p>
  <button type="submit">Guardar</button>
 </form>
 <!--Lista para ver el contenido de la tabla-->
 <div class="lista-anadidos">
  <h2>Palabras añadidas:</h2>
  <ul class="lista-plugin">
   <?php
        //Mostramos el resultado de la consulta
        for($i=0;$i<count($search); $i++) {
            echo '<li type="circle">'.$search[$i].' -> '.$search2[$i].'</li>';
	    };  
	?>
  </ul>
 </div>
</div>
