<link rel="stylesheet" href="css/estilo.css">

<title>prueba JR Jeisson Ramirez Bravo</title>
	
<header><h1>Prueba tecnica JR Jeisson ramirez B. </h1></header>


<!--conexion bd-->
<?php
         $servername = "localhost";
         $username = "root";
         $password = "";
         $database = "peliculas";
         $mysqli= new mysqli($servername,$username,$password,$database);  
    
 ?> 


<form action=""  method="post">  <!--registro de datos-->
<table class="usuario">
    <tr>
    <td><label for="usuario">Agregar Nueva pelicula </label></td>
    </tr>
    <tr>
    <td><label for="pelicula"> Nombre de la pelicula: </label><br><input type="text" name="nombrePelicula" placeholder="Ingrese la pelicula" required></td> 
    <td><label for="año"> Año de publicacion: </label><br><input type="year"  name="año" placeholder="Ingresar el año" ></td>   
    <td><label for="director"> Director: </label><br><input type="text" name="director" placeholder="Ingresar Director" ></td> 
    <td><label for="codigo"> Actor: </label><br><input type="text"  name="actores" placeholder="Ingresar Actor" required></td>
   </tr>
   <tr>
    <td><label for="produccion"> Produccion: </label><br><input type="text" name="productores" placeholder="Ingrese produccion" required></td> 
    <td><label for="nombre">Duracion: </label><br><input type="time"  name="duracion"placeholder="Ingresar la duracion" ></td>  
    <td><label for="director"> Genero: </label><br><input type="text" name="generos" placeholder="Ingresar el genero" ></td>     
   </tr>
   <tr>
    <td><br><button name="agregar" type="submit">Agregar</button><br><br></td>
    </tr>  
</table>
</form>

<h4><br> Peliculas Registradas : *Edita los registros en la casilla correspondiente* <br><br></h4><br>

 <table border="1" class="datos"> <!--mostrar  tabla de datos guardados-->
 <thead>
 <tr>
 <td>#</td>
 <td>Nombre</td> 
 <td>Año</td>
 <td>Director</td>
 <td>Actores</td>
 <td>Produccion</td>
 <td>Duracion</td>
 <td>Genero</td>
 <td>Editar</td>
 <td>Eliminar</td>
 </tr>
 </thead>

 <?php
 $consultaDatos=$mysqli->query("SELECT * FROM  registro ");
 ?>

 <tbody>
 <?php
 $conteo='0';
 while($extraerDatos=$consultaDatos->fetch_array()){
 ?>
 <tr>
 <td><?php echo $conteo++; ?></td>
 <form action="" method="post" class="datosM">
    <td><input  style="text-align:center;" name="nombrePelicula" type="text"  value="<?php echo $extraerDatos['nombrePelicula']; ?>"></td>
    <td><input  style="text-align:center;" name="año"   type="year"   value=" <?php echo $extraerDatos['año']; ?>" ></td>
    <td><input  style="text-align:center;" name="director" type="text"   value=" <?php echo $extraerDatos['director']; ?>" ></td>
    <td><input  style="text-align:center;" name="actores"   type="text" value="<?php echo $extraerDatos['actores']; ?>" ></td>
    <td><input  style="text-align:center;" name="productores"   type="text" value="<?php echo $extraerDatos['productores']; ?>" ></td>
    <td><input  style="text-align:center;" name="duracion"   type="time" value="<?php echo $extraerDatos['duracion']; ?>" ></td>
    <td><input  style="text-align:center;" name="generos"   type="text" value="<?php echo $extraerDatos['generos']; ?>" ></td>
    <td>            
            <button name="editar" type="submit" >Editar</button>
            <input name="id" type="hidden" readonly value="<?php echo $extraerDatos['id']; ?>"><br>
    </td>
 </form>
 <td >
    <form action="" method="post">    
        <input name="id" type="hidden" readonly value="<?php echo $extraerDatos['id']; ?>"><br> 
        <button name="eliminar" type="submit">Eliminar</button> 
        <br>
     
            
    </form>
 </td>
 </tr>


 <?php
 }
 /// Agregar registro
 if(isset($_POST['agregar'])){
    $idEditar=$_POST['id'];
     $nombrePelicula=$_POST['nombrePelicula'];
     $año=$_POST['año'];
     $director=$_POST['director'];
     $actores=$_POST['actores'];
     $productores=$_POST['productores'];
     $duracion=$_POST['duracion'];
     $generos=$_POST['generos'];


    $mysqli->query("INSERT INTO registro (nombrePelicula,año,director,actores,productores,duracion,generos)VALUES('$nombrePelicula','$año','$director','$actores','$productores','$duracion','$generos') ");
    echo '<script language="javascript">alert("Registro Ingresado");
    window.location.href="prueba.php"</script>';
}
/// END

 /// Editar registro
 if(isset($_POST['editar'])){
     $idEditar=$_POST['id'];
     $nombrePelicula=$_POST['nombrePelicula'];
     $año=$_POST['año'];
     $director=$_POST['director'];
     $actores=$_POST['actores'];
     $productores=$_POST['productores'];
     $duracion=$_POST['duracion'];
     $generos=$_POST['generos'];

     $mysqli->query("UPDATE registro SET nombrePelicula='$nombrePelicula',año='$año',director='$director',actores='$actores',productores='$productores',duracion='$duracion',generos='$generos' WHERE id='$idEditar' ");
     echo '<script language="javascript">alert("Registro Actualizado");
     window.location.href="prueba.php"</script>';
 }
 /// END
 
  /// Eliminar registro
  if(isset($_POST['eliminar'])){
    $idEliminar=$_POST['id'];

    $mysqli->query("DELETE FROM registro WHERE id='$idEliminar' ");
    echo '<script language="javascript">alert("Registro Eliminado");
    window.location.href="prueba.php"</script>';
}
/// END
 ?>
 </tbody>
 </table><!--tabla de datos  guardados  fin-->
