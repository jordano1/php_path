<?php

class Database
{
    public $connection;

    // config is a config file with the host, port, db name, and charset, it will pass those values which are required to connect to the databse
    // then optional parameters required are the user and password values ALWAYS in this order.
    // we create the DSN call by making a http_
    public function __construct($config, $username = 'root', $password = 'T0pt3am12!')
    {
        $dsn = 'mysql:' . http_build_query($config, '', ';'); //we prepend mysql as it is required in this order mysql:host=localhost;port=3306;... etc

        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }
    // this is a function you can call that will retrieve records from the database through a sql statement you call yourself
    public function query($query, $params = [])
    {
        $statement = $this->connection->prepare($query);

        $statement->execute($params);

        return $statement;
    }
}
