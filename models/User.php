<?php

class User extends Model
{
    public $name;
    public $email;
    public $hash;

    public function save()
    {
        $sql = "INSERT INTO users (name, email, hash) VALUES ('$this->name', '$this->email', '$this->hash')";

        $result = User::getConnection()->query($sql);

        if ($result == true) {
            $new = User::get(User::getConnection()->insert_id);
            $this->id = $new->id;
            $this->created_at = $new->created_at;
            $this->updated_at = $new->updated_at;
        }
    }

    public static function getAll()
    {
        $sql = "SELECT (id, name, email, created_at, updated_at) FROM users";

        $fetch_result = User::getConnection()->query($sql);

        $users = [];

        if ($fetch_result->num_rows > 0) {
            while ($record = $fetch_result->fetch_assoc()) {
                $user = User::recordToEntity($record);

                array_push($users, $user);
            }
        }

        return $users;
    }

    public static function get($id)
    {
        $sql = "SELECT * FROM users WHERE id = '$id' LIMIT 1";

        $fetch_result = User::getConnection()->query($sql);

        $user = null;

        if ($fetch_result->num_rows == 1) {
            $record = $fetch_result->fetch_assoc();

            $user = User::recordToEntity($record);
        }

        return $user;
    }

    public static function getByEmail($email)
    {
        $sql = "SELECT * FROM users WHERE email = '$email' LIMIT 1";

        $fetch_result = User::getConnection()->query($sql);

        $user = null;

        if ($fetch_result->num_rows == 1) {
            $record = $fetch_result->fetch_assoc();

            $user = User::recordToEntity($record);
        }

        return $user;
    }

    private static function recordToEntity($record)
    {
        $user = new User;
        $user->id = $record['id'];
        $user->name = $record['name'];
        $user->email = $record['email'];
        $user->hash = $record['hash'];
        $user->created_at = $record['created_at'];
        $user->updated_at = $record['updated_at'];

        return $user;
    }
}
