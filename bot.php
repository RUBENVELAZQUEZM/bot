<?php
$update = json_decode(file_get_contents("php://input"), true);


if (isset($update["message"])) {
    $mensaje = strtolower($update["message"]["text"]);
    $chat_id = $update["message"]["chat"]["id"];

    $productos = [
        "carne" => "Pasillo 1",
        "queso" => "Pasillo 1",
        "jamón" => "Pasillo 1",
        "leche" => "Pasillo 2",
        "yogurth" => "Pasillo 2",
        "cereal" => "Pasillo 2",
        "bebidas" => "Pasillo 3",
        "jugos" => "Pasillo 3",
        "pan" => "Pasillo 4",
        "pasteles" => "Pasillo 4",
        "tortas" => "Pasillo 4",
        "detergente" => "Pasillo 5",
        "lavaloza" => "Pasillo 5"
    ];

    if ($mensaje == "/start") {
        $respuesta = "¡Hola! Soy el bot del supermercado 🛒\nEscribe el nombre de un producto y te diré en qué pasillo lo encontrás.";
    } elseif (array_key_exists($mensaje, $productos)) {
        $respuesta = "Puedes encontrar ese producto en " . $productos[$mensaje] . ".";
    } else {
        $respuesta = "No entiendo la pregunta. 🤖\nPor favor, escribe solo el nombre de un producto.";
    }

    $token = "7355801774:AAEeRyN1CvQQC7GhWdXAzZrFotFGpumHzPU"; // 
    $url = "https://api.telegram.org/bot$token/sendMessage";
    $parametros = [
        "chat_id" => $chat_id,
        "text" => $respuesta
    ];

    file_get_contents($url . "?" . http_build_query($parametros));
}
?>
