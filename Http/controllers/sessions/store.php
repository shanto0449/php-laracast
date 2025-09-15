<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

if (!Validator::email(($email))) {
    $errors['email'] = "Email is not valid";
}

if (!Validator::string($password, 7, 255)) {
    $errors['password'] = "Password provide a valid password";
}

if (!empty($errors)) {
    view('sessions/create.view.php', [
        'errors' => $errors
    ]);
    exit();
}

if (!empty($errors)) {
    view('registration/create.view.php', [
        'errors' => $errors
    ]);
    exit();
}



$user = $db->query('select * from users where email = :email', [
    'email' => $email,
])->find();

if ($user) {
    if (password_verify($password, $user['password'])) {
        login([
            'email' => $email,
        ]);
        header('location: /');
        exit();
    }
}

return view('sessions/create.view.php', [
    'errors' => [
        'email' => 'No user with that email address or invalid password',
        'password' => 'Invalid password'

    ]
]);
