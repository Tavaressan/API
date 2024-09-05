<?php
    namespace Professor\AulaN;

    class UserController {
        function getUsers() {
            return [
                [
                    'nome' => 'joao',
                    'idade' => 28,
                ],
                [
                    'nome' => 'maria',
                    'idade' => 27,
                ],
            ];
        }
        function insertUser() {
            $user = [
                'nome' => $data['nome'],
                "idade" => $data['idade'],
            ];

            return $user;

        }
        function updateUser() {
            
        }
        function deletetUser() {
            
        }

    }