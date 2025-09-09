<?php
use Core\Validator;
use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);

$errors = [];


    if (! Validator::string($_POST['body'], 1, 255)) {
        $errors['body'] = 'A body of 1 to 255 characters is required';
    }

    if(! empty($errors)){
        return view('notes/create.view.php', [
        'heading' => 'Create a new note',
        'errors' => $errors
    ]);


    }
  
    $db->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)', [
        'body' => $_POST['body'],
        'user_id' => 1
    ]);

    header('Location: /notes');
    die();
    
