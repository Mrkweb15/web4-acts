<?php
    require_once 'crud.php';
    session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $table = "users";
        $username = $_POST['username'];
        $password = $_POST['password'];
        $data = [
            "username" => $_POST['username'],
            "password" => password_hash(password: $_POST['password'],algo: PASSWORD_DEFAULT)
        ];
    
        $crud = new CRUD();
        $login = $crud->read($table, $data);

        if(!Empty($login)){
            foreach ($login as $login){
                if (password_verify($password, $login['password'])){
                    $_SESSION['login'] =[
                        'username' => $login['username'],
                        'password' => $login['password']
                    ];

                    Header("Location: index.php");
                } 
            }
            
        } else {
            //$_SESSION['error'] = "Faild, try Again";
            Header("Location: Login.php");
        }

        $_SESSION['username'];
    }
?>