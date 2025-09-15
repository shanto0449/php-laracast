<?php

use Core\Database;
use Core\App;

$config = require base_path('config.php');

$db = App::resolve(Database::class);
$currentUserId = 1;


$note = $db->query("SELECT * FROM notes where  id = :id", [

    'id' => $_GET['id']
])->findOrFail();

authorize($note['user_id'] === $currentUserId);

view('notes/show.view.php', [
    'heading' => 'Note',
    'note' => $note
]);

