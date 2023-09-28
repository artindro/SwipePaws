<?php

        include 'conexion_be.php';

        $nombre_completo = $_POST['nombre_completo'];
        $correo = $_POST['correo'];
        $usuario = $_POST['usuario'];
        $contrasena = $_POST['contrasena'];
        //encriptar contraseña
       # $contrasena = hash('sha512', $contrasena);#

        $query ="INSERT INTO `usuarios`(`id`, `nombre_completo`, `correo`, `usuario`, `contrasena`) VALUES ('','$nombre_completo','$correo','$usuario','$contrasena')";

        //verificacion de correo no se repita

        $verificar_correo =mysqli_query($conexion, "SELECT * FROM usuarios WHERE  correo='$correo' ");

        if (mysqli_num_rows($verificar_correo) > 0){
            echo '
                <script>
                    alert ("este CORREO ya existe, intenta con otro diferente");
                    window.location = "../index.php";
                </script>
            ';
        exit();
        }

        //verificacion de usuario no se repita

        $verificar_usuario =mysqli_query($conexion, "SELECT * FROM usuarios WHERE  usuario='$usuario' ");

        if (mysqli_num_rows($verificar_usuario) > 0){
            echo '
                <script>
                    alert ("este USUARIO ya existe, intenta con otro diferente");
                    window.location = "../index.php";
                </script>
            ';
        exit();
        }

        $ejecutar = mysqli_query($conexion, $query);

         if ($ejecutar){
                echo '
                    <script>
                        alert("usuario registrado");
                        window.location = "../index.php";
                    </script>
                 ';
        } else{
                 echo '
                     <script>
                        alert("Intentalo denuevo");
                        window.location = "../index.php";
                     </script>
                 ';

            }

        mysqli_close($conexion);
?>