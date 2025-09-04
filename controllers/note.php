<?php
$config = require 'config.php';

$db = new Database($config['database']);
$heading = "Note";
$currentUserId = 1; 

$id = $_GET['id'];

$note = $db->query("SELECT * FROM notes where  id = :id", [
 
    'id' => $_GET['id']
])->findOrFail();


if ($note['user_id'] !== $currentUserId) {
    abort(Response::FORBIDDEN);
}
require 'views/note.view.php';
