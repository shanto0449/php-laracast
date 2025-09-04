<?php
$config = require 'config.php';

$db = new Database($config['database']);
$heading = "Notes";
$notes = $db->query("SELECT * FROM notes WHERE user_id = :user_id", ['user_id' => 1])->statement->fetchAll();
require 'views/notes.view.php';