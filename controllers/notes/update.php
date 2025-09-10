<?php
use Core\Database;
use Core\App;
use Core\Validator;

$config = require base_path('config.php');

$db = App::resolve(Database::class);
$currentUserId = 1;


$note = $db->query("SELECT * FROM notes where  id = :id", [

    'id' => $_POST['id']
])->findOrFail();

authorize($note['user_id'] === $currentUserId);
$errors = [];

if (! Validator::string($_POST['body'], 1, 255)) {
        $errors['body'] = 'A body of 1 to 255 characters is required';
    }

if(count($errors)){
    return view('notes/edit.view.php', [
        'heading' => 'Edit Note',
        'errors' => $errors,
        'note' => $note
    ]);
}

$db->query('UPDATE notes SET body = :body WHERE id = :id', [
    'body' => $_POST['body'],
    'id' => $note['id']
]);

header('Location: /notes');
die();
