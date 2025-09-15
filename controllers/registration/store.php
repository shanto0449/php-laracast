<?php

use Core\Validator;
use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];
if (!Validator::email(($email))) {
    $errors['email'] = "Email is not valid";
}
if (!Validator::string($password, 7, 255)) {
    $errors['password'] = "Password must be at least 7 characters";
}
if (!empty($errors)) {
    view('registration/create.view.php', [
        'errors' => $errors
    ]);
    exit();
}


$user = $db->query('select * from users where email = :email', [
    'email' => $email
])->find();

if($user){
    header('location: /');
}else{
    $db->query('insert into users(email, password) values(:email, :password)', [
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT)
    ]);

    login($user);
    header('location: /');
    exit();
}