<?php
require 'functions.php';

// require 'router.php';


class Database
{
    public function query($query)
    {
        $dsn      = "mysql:host=localhost;port=3306;dbname=myapp;charset=utf8mb4";
        $user     = 'root';
        $password = 'T0pt3am12!';

        $pdo = new PDO($dsn, $user, $password);

        $statement = $pdo->prepare($query);

        $statement->execute();
        return $posts = $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}
$query = "SELECT * FROM posts WHERE ID > 1";
$db    = new Database();
$posts = $db->query($query);


foreach ($posts as $post) {
    echo "<li>" . $post['title'] . "</li>";
}