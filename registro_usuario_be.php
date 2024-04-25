<?php 

  include 'conexion_be.php';

  $nombre_completo = $_POST['nombre_completo'];
  $correo = $_POST['correo'];
  $usuario = $_POST['usuario'];
  $contrasena = $_POST['contrasena'];
  $contrasena = hash('sha512', $contrasena);

  $query = "insert into usuarios(nombre_completo, correo, usuario, contrasena) 
            values('$nombre_completo', '$correo', '$usuario', '$contrasena')";

  $verificar_correo = mysqli_query($conexion, "select * from usuarios where correo='$correo' ");
  
  if(mysqli_num_rows($verificar_correo) > 0){
    echo '
    <script>
       alert("este correo ya esta registrado, intenta con otro diferente");
       window.location = "index.php";
    </script>
    ';
    exit();
    mysqli_close($conexion);
  }

  $verificar_usuario = mysqli_query($conexion, "select * from usuarios where usuario='$usuario' ");
  
  if(mysqli_num_rows($verificar_usuario) > 0){
    echo '
    <script>
       alert("este usuario ya esta registrado, intenta con otro diferente");
       window.location = "index.php";
    </script>
    ';
    exit();
    mysqli_close($conexion);
  }
  
  $ejecutar = mysqli_query($conexion, $query);

  if($ejecutar){
    echo '
          <script>
               alert("usuario almacenado exitosamente");
               window.location = "index.php";
          </script>
    ';
  }else{
    echo '
    <script>
         alert("intentalo de nuevo, usuario no almacenado");
         window.location = "index.php";
    </script>
';

  }
 mysqli_close($conexion);
?>