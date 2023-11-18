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
    print_r("url_parts");
    print_r($url_parts);
    
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
    print_r($controllers);
    $DB_HOST = getenv('DB_HOST');
    $DB_NAME = getenv('DB_NAME');
    $DB_CHARSET = getenv('DB_CHARSET');
    $DB_USER = getenv('DB_USER');
    $DB_PASS = getenv('DB_PASS');
    print_r($DB_HOST);
    print_r($DB_NAME);
    print_r($DB_CHARSET);
    print_r($DB_USER);
    print_r($DB_PASS);
    $controller = $url_parts[2];

    $id = !empty($url_parts[3]) ? $url_parts[3] : "";
    print_r("url_parts[1]");
    print_r($url_parts[1]);
    print_r("url_parts[2]");
    print_r($url_parts[2]);
    print_r("url_parts[3]");
    print_r($url_parts[3]);

    if (!in_array($controller, $controllers)) {
        http_response_code(400);
        die('{"message": "rota inválida"}');
    }

    require("controllers/" . $controller . ".php");