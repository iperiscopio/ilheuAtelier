<?php

    header("Content-Type: application/json");

    require("vendor/autoload.php");

    define("ROOT",
        rtrim(
            str_replace(
                "\\", "//", dirname($_SERVER["SCRIPT_NAME"])
            ),
            "/"
        )
    );

    $url_parts = explode("/", $_SERVER["REQUEST_URI"]);
    
    $controllers = [
        "accounts-manager",
        "backoffice",
        "captcha",
        "information",
        "login",
        "images-manager",
        "messages-manager",
        "projects",
        "projects-manager",
        "resources",
        "siteImages",
        "sendEmail"
    ];

    $controller = $url_parts[2];

    $id = !empty($url_parts[3]) ? $url_parts[3] : "";

    if( !in_array($controller, $controllers) ) {
        http_response_code(400);
        die('{"message": "rota inválida"}');
    }

    require("controllers/" . $controller . ".php");