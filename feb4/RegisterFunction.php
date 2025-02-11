<?php
    require_once 'crud.php';

    // class register extends CRUD{
    //     Protected $table;
    //     protected $data = [
    //         'username',
    //         'password',
    //         'fname',
    //         'mname',
    //         'lname',
    //         'nickname',
    //         'skin_tone',
    //         'age',
    //         'sex'
    //     ];

    //     public function __construct($username, $password,)
    // }

    session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $table = "users";
        $data = [
            "username" => $_POST['username'],
            "password" => password_hash(password: $_POST['password'],algo: PASSWORD_DEFAULT),
            "fname" => $_POST['fname'],
            "mname" => $_POST['mname'],
            "lname" => $_POST['lname'],
            "nickname" => $_POST['nickname'],
            "skin_tone" => $_POST['skintone'],
            "age" => $_POST['age'],
            "sex" => $_POST['sex']
        ];



        $crud = new CRUD();
        // $crud->create($table, $data);

        if ($crud->create($table, $data)){
            $_SESSION['success'] = "Registration Complete";
        } else {
            $_SESSION['error'] = "Faild, try Again";
        }

        header('Location: Login.php');
        exit();


    }
?>