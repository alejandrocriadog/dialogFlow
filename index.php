<?php

    $method = $_SERVER['REQUEST_METHOD'];

    //Process only when method is POST
    if($method == "POST")
    {
        $requestBody = file_get_contents('php://input');
        $json = json_decode($requestBody);

        $text = $json->queryResult->parameters->any;

        switch($text) {
            case 'Adios':
                $speech = "Adios, encantado!";
                break;

            case 'Hasta luego':
                $speech = "Hasta luego!";
                break;

            default: 
                $speech = "Lo siento no te he entendido!";
                break;
        }

        $response = new \stdClass();
        $response->speech = $speech;
        $response->displayText = $speech;
        $response->source = "webhook";
        echo json_encode($response);
    }
    else
    {
        echo "Method not allowed";
    }

?>