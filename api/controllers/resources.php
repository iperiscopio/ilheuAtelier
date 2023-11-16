<?php

    require("models/resources.php");
    print_r("resources controller");

    $resource = new Resources();

    if ($_SERVER["REQUEST_METHOD"] === "GET") {   
        print_r($id);

        if (empty($id)) {

            http_response_code(405);
            die('{"message": "Method Not Allowed"}');
            
        } else if (!empty($id)) {

            http_response_code(202);

            echo json_encode($resource->getResource($id));
        }
    } else {

        http_response_code(405);
        die('{"message": "Method Not Allowed"}');
    }
