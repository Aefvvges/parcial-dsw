<?php
    //Mensajes de error
    $msg_nombre = '';
    $msg_correo = '';
    $msg_contrasena = '';
    $msg_contrasena_conf = '';
    $msg_edad = '';
    $msg_telefono = '';

    //Datos
    $nombre = '';
    $correo = '';
    $contrasena = '';
    $contrasena_conf = '';
    $edad = '';
    $telefono = '';

    if (isset($_POST['btn-enviar'])){
        
        //Validar nombre                  
        if (!isset($_POST['nombre'])) {           
            $msg_nombre = 'El campo no existe';
        } else {
            $nombre = trim($_POST['nombre']); 
            if ($nombre === '') {                
                $msg_nombre = 'Ingrese un nombre, por favor.';
            } elseif(strlen($nombre) < 6 || strlen($nombre) > 12) {
                $msg_nombre = 'Ingrese un nombre entre 6 y 12 caracteres';
            }            
        }

        //Validar email               
        if (!isset($_POST['correo'])) {           
            $msg_correo = 'El campo no existe';
        } else {
            $correo = trim($_POST['correo']); 
            if ($correo === '') {               
                $msg_correo = 'Ingrese un correo, por favor.';
            } elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
                $msg_correo = 'Ingrese un correo válido.';
            }            
        }

        //Validar contraseña               
        if (!isset($_POST['contrasena'])) {            
            $msg_contrasena = 'El campo no existe';
        } else {
            $contrasena = trim($_POST['contrasena']);  
            if ($contrasena === '') {                
                $msg_contrasena = 'Ingrese una contraseña, por favor.';                
            } elseif(strlen($contrasena) < 8) {
                $msg_contrasena = 'Ingrese una contraseña de más de 8 caracteres';
            }  
            //Validar confirmacion contraseña                       
            if (!isset($_POST['contrasena_conf'])) {              
                $msg_contrasena_conf = 'El campo no existe';
            } else {
                $contrasena_conf = trim($_POST['contrasena_conf']);
                if ($contrasena_conf === '') {               
                    $msg_contrasena_conf = 'Ingrese de nuevo la contraseña, por favor.';
                } elseif($contrasena !== $contrasena_conf) {
                    $msg_contrasena_conf = 'Las contraseñas no coinciden';
                }            
            }            
        }

        //Validar edad
        if (!isset($_POST['edad'])) {                      
            $msg_edad = 'El campo no existe';
        } else {
            $edad = trim($_POST['edad']);  
            if ($edad === '') {                
                $msg_edad = 'Ingrese una edad, por favor.';
            } elseif((int)$edad < 18) {
            $msg_edad = 'Ingrese una edad valida';
            }            
        }

        //Validar telefono               {               
        $msg_telefono = 'Ingrese un correo, por favor.';
        if (!is_numeric($telefono)) {
        $msg_telefono = 'Ingrese un correo válido.';
        }

    }

    //mensaje de correcto
    $msg_correcto = '';

    //Arreglo con los errores
    $errores = [$msg_nombre, $msg_correo, $msg_contrasena, $msg_contrasena_conf, $msg_edad];
    if (isset($_POST['btn-enviar']) && !array_filter($errores)) {
        $msg_correcto = '¡Formulario enviado correctamente!';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parcial</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="msg-correcto"></div>
    <h1>Examen Desarrollo de Sistemas Web</h1>
    <div class="msg-correcto"><?=$msg_correcto?></div>
    <form action="" method="post" class="form-1">
        <h3>Ingrese sus datos</h3>
        <input type="text" name="nombre" placeholder="Nombre" value="<?=htmlspecialchars($nombre)?>">
        <div class="msg-error"><?=$msg_nombre?></div>
        <input type="email" name="correo" placeholder="Email" value="<?=htmlspecialchars($correo)?>">
        <div class="msg-error"><?=$msg_correo?></div>
        <input type="password" name="contrasena" placeholder="Contraseña">
        <div class="msg-error"><?=$msg_contrasena?></div>
        <input type="password" name="contrasena_conf" placeholder="Contraseña">
        <div class="msg-error"><?=$msg_contrasena_conf?></div>
        <input type="number" name="edad" placeholder="Edad" value="<?=htmlspecialchars($edad)?>">
        <div class="msg-error"><?=$msg_edad?></div>
        <input type="tel" name="telefono" placeholder="Teléfono" value="<?=htmlspecialchars($telefono)?>">
        <div class="msg-error"><?=$msg_edad?></div>
        <button type="submit" class="btn-enviar" name="btn-enviar">Enviar</button>
    </form>
</body>
</html>