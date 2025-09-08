<?php
require base_path('Validator.php');
$config = require base_path('config.php');
$db = new Database($config['database']);

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $body = $_POST['body'] ?? '';

    if (! Validator::string($body, 1, 255)) {
        $errors['body'] = 'A body of 1 to 255 characters is required';
    }

    if (empty($errors)) {
        $db->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)', [
            'body' => $body,
            'user_id' => 1
        ]);
    }
}

view('notes/create.view.php', [
    'heading' => 'Create a new note',
    'errors' => $errors
]);
