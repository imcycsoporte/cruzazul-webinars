<?php

require('db.php');

if (isset($_POST['email'])) {
    $pago = $_POST['pago'];
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $empresa = $_POST['empresa'];
    $ubicacion = $_POST['ubicacion'];
    $tipo = $_POST['tipo'];
    $password = $_POST['password'];
    
    $digits = 3;
    $secuencial = str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);
    
    if ($codigo) {
        $membresia = "WEP";
    }
    
    if ($codigoimcyc) {
        $codigo = $codigoimcyc;
    }

    require_once __DIR__ . '/../../api/credenciales.php';
    if (wec_credenciales_existe($conn, $email)) {
        echo "yaexiste";
    } else {
        // Consulta preparada; la contraseña se guarda solo cifrada.
        $sinTextoPlano = '';
        foreach (['pago', 'nombre', 'email', 'telefono', 'empresa', 'ubicacion', 'tipo'] as $campo) ${$campo} = (string) (${$campo} ?? ''); // como antes: campos vacíos, no NULL
        $registro = $conn->prepare("INSERT INTO usuarios (pago, nombre, email, telefono, empresa, ubicacion, tipo, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $registro->bind_param('ssssssss', $pago, $nombre, $email, $telefono, $empresa, $ubicacion, $tipo, $sinTextoPlano);
        if ($registro->execute()) {
            wec_credenciales_guardar($conn, $registro->insert_id, $password);
            echo "usuario";

            $to = $email; // ya no se copia al correo del desarrollador anterior
            $subject = 'NUEVO REGISTRO GCC';
            $from = 'servicios@webinarsenconcreto.com';

            // To send HTML mail, the Content-type header must be set
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

            // Create email headers
            $headers .= 'From: '.$from."\r\n".
                'Reply-To: '.$from."\r\n" .
                'X-Mailer: PHP/' . phpversion();

            // Compose a simple HTML email message
            $message = '<html><body>';
            $message .= '<div style="width:700px;margin: 0 auto;">';
            $message .= '<div align="center"><img src="http://www.webinarsenconcreto.com//images/logo_imcyc.png" alt="Webinars en concreto" title="Wwebinars en concreto" style="width: 200px;" /></div>';
            $message .= '<h1 style="color:#0272A5;font-family: Arial, sans-serif;">Apreciable '.$nombre.'.</h1>';
            $message .= '<h1 style="color:#0272A5;font-family: Arial, sans-serif;">Correo electrónico: '.$email.'</h1>';
            $message .= '<p style="color:#333;font-size:18px;font-family: Arial, sans-serif;">Bienvenido a <b>GCC WEBINARS EN CONCRETO</b>!</p>';
            $message .= '<p style="color:#333;font-size:18px;font-family: Arial, sans-serif;">Se ha registrado exitosamente, ingrese y descubra todo un mundo de webinars y certificaciones sobre el mundo del concreto y del cemento.</p><hr>';
            $message .= '<p style="text-align:center;font-family: Arial, sans-serif;"><a href="http://gcc.webinarsenconcreto.com/" style="background:#333;color:#fff;padding:10px;display:block;text-decoration: none;">GCC.WEBINARSENCONCRETO.COM</a></p>';
            $message .= '</div>';
            $message .= '</body></html>';

            mail($to, $subject, $message, $headers);
            
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

    mysqli_close($conn);
}