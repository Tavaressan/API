<?php

    namespace Professor\AulaN;

    require_once '../vendor/autoload.php';

    $method = $_SERVER['REQUEST_METHOD'];
    $uri = $_SERVER['REQUEST_URI'];


    switch($method) {
        case "GET":
            switch ($uri) {
                case '/users':
                    http_response_code(200);
                    echo json_encode(
                        [
                            'status' => true,
                            'message' => 'success!'
                        ]
                    );    
                    break;
            }
        case "POST":
            switch ($uri) {
                case '/users':
                    $input = json_decode(file_get_contents('php://input'), true);
                    http_response_code(201);    
                    echo json_encode(
                        [
                            'status' => 'User created!',
                            'user' => $input
                        ]
                    );
                    break;
            }
        case "PUT":
            if ( preg_match('/\/users\/(\d+)/', $uri, $matches)) {
                $id = $matches[1];
                $input = json_decode(file_get_contents('php://input'), true);
                $users[$id] = $input;
                http_response_code(200);
                echo json_encode(
                    [
                        'status' => true,
                        'message' => 'User updated',
                        'users' => $input
                    ]
                );
                break;
            }
            
        case "DELETE":
            if ( preg_match('/\/users\/(\d+)/', $uri, $matches)) {

                $id = $matches[1];
                unset($users[$id]);
                http_response_code(204);
                echo json_encode(
                    [
                        'status' => true,
                        'message' => 'User deleted'
                    ]
                );
                break;

            }
        default:
            http_response_code(200);
            echo json_encode(
                [
                    'status' => true,
                    'message' => 'success!'
                ]
            );    
    }