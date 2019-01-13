<style type="text/css"> 

form {
    padding: 1em;
    border: 1px solid #CCC;
    border-radius: 2em;
}

input:focus, textarea:focus {
    border-color: #000;
}

button {
    /* Este margen extra representa aproximadamente el mismo espacio que el espacio
       entre los labels y sus campos de texto */
    margin-left: .5em;
    margin-top: .5em;
}

</style> 


<div class="wrap">
 <h1>Opciones</h1>
 <p>Inserte la palabara que desee sustituir en sus post</p>
 <form action="http://3.17.132.252/wp5/wp-content/plugins/plugin-dani/recoger.php" method="post">
  <p>Palabra a sustituir: <input type="text" name="palabra_inicio"/></p>
  <p>Palabra a mostrar: <input type="text" name="palabra_mostrar"/></p>
  <button type="submit">Guardar</button>
</form>
</div>

