<?php

abstract class Model {

    public $id;
    public $created_at;
    public $updated_at;

    protected const DATABASE_HOST = 'localhost';

    protected const DATABASE_USER = 'root';

    protected const DATABASE_PASSWORD = '';

    protected const DATABASE_NAME = 'notes-app';

    protected static function getConnection()
    {
        $conn =  mysqli_connect(Model::DATABASE_HOST, Model::DATABASE_USER, Model::DATABASE_PASSWORD, Model::DATABASE_NAME);

        if ($conn->connect_error) {
            die('Failed to connect: '.$conn->connect_error);
        }
        return $conn;
    }
}