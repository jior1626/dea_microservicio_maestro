<?php
// Datos de usuario proporcionados
$usuario = "USR_DEA_UME";
$contrasena = "C9%y687pO5Wb";

// Convertir los datos del usuario a base64 para el JSON de autenticación
$usuarioBase64 = base64_encode($usuario);

// Generar una cadena hexadecimal de 40 caracteres aleatoria
$cadenaHex = bin2hex(random_bytes(20)); // 20 bytes * 2 caracteres por byte = 40 caracteres

// Obtener la fecha y hora actual en el formato especificado
$fechaHora = (new DateTime())->format("Y-m-d\\TH:i:s");

// Concatenar los datos para formar la llave
$llaveConcatenada = $cadenaHex . $fechaHora . base64_encode($contrasena);

// Codificar la llave con SHA256, convertir a mayúsculas y luego a Base64
$llaveSHA256 = hash('sha256', $llaveConcatenada);
$llaveMayusculas = strtoupper($llaveSHA256);
$llaveBase64 = base64_encode($llaveMayusculas);

// Construir la estructura JSON completa
$jsonEstructura = [
    "info" => [
        "action" => "inicioSesion",
        "usuario" => $usuario,
        "contra" => $contrasena, // Asegúrate de no exponer contraseñas en producción
    ],
    "autenticacion" => [
        "fecha" => $fechaHora,
        "usuario" => $usuarioBase64,
        "llave" => $llaveBase64,
        "cadena" => $cadenaHex,
    ]
];

// Mostrar el JSON completo formateado
echo json_encode($jsonEstructura, JSON_PRETTY_PRINT);
