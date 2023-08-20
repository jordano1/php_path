<?php
$config = require 'config.php';
$db = new Database($config['database']);
// fix this
$heading = 'notes';

$notes = $db->query('select * from notes where user_id = 2')->fetchAll();

require "views/notes.view.php";
