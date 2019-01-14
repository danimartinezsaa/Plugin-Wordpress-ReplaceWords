<style type="text/css"> 
/*borde del formulario*/
form {
    padding: 1em;
    border: 1px solid #CCC;
    border-radius: 2em;
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

<!-- formulario que pide la palabra a reemplazar y la palabra que se muestra y envía los valores a recoger.php mediante post -->
<div class="wrap">
 <h1>Opciones</h1>
 <p>Inserte la palabara que desee sustituir en sus post</p>
 <form action="<?php $_SERVER["HTTP_HOST"]; ?>/wp5/wp-content/plugins/plugin-dani/recoger.php" method="post">
  <p>Palabra a sustituir: <input type="text" name="palabra_inicio"/></p>
  <p>Palabra a mostrar: <input type="text" name="palabra_mostrar"/></p>
  <button type="submit">Guardar</button>
</form>
</div>