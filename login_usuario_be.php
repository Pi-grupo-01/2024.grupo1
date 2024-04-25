<?php 

   session_start();
   include 'conexion_be.php';

   $correo = $_POST['correo'];
   $contrasena = $_POST['contrasena'];
   $contrasena = hash('sha512', $contrasena);


   $validar_login = mysqli_query($conexion, "select * from usuarios where correo='$correo'
   and contrasena='$contrasena'");

   if(mysqli_num_rows($validar_login) > 0){
    $_SESSION['usuario'] = $correo;
      header("location: bienvenida.php");
      exit();
   }else{
    echo '
    <script>
       alert("usuario no existente, verifique los datos ingresados");
       window.location = "index.php";
    </script>
    ';
    exit();
   }

?>