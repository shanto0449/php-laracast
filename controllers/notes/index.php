<?php
$config = require 'config.php';

$db = new Database($config['database']);
$heading = "My Notes";
// $notes = $db->query("SELECT * FROM notes WHERE user_id = :user_id", ['user_id' => 1])->statement->fetchAll();

$notes = $db ->query('select * from notes where user_id = 1')->get();
require 'views/notes/index.view.php';