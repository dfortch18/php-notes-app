<?php

class Note extends Model
{
    public $title;
    public $description;
    public $user_id;

    public function save()
    {
        $sql = "INSERT INTO notes (title, description, user_id) VALUES ('$this->title', '$this->description', $this->user_id)";

        $result = Note::getConnection()->query($sql);

        if ($result == true) {
            if ($result == true) {
                $new = Note::get(Note::getConnection()->insert_id);
                $this->id = $new->id;
                $this->created_at = $new->created_at;
                $this->updated_at = $new->updated_at;
            }
        }
    }

    public static function getAll()
    {
        $sql = "SELECT * FROM notes";

        $fetch_result = Note::getConnection()->query($sql);

        $notes = [];

        if ($fetch_result->num_rows > 0) {
            while ($record = $fetch_result->fetch_assoc()) {
                $note = Note::recordToEntity($record);

                array_push($notes, $note);
            }
        }

        return $notes;
    }

    public static function get($id)
    {
        $sql = "SELECT * FROM notes WHERE id = '$id' LIMIT 1";

        $fetch_result = Note::getConnection()->query($sql);

        $note = null;

        if ($fetch_result->num_rows == 1) {
            $record = $fetch_result->fetch_assoc();

            $note = Note::recordToEntity($record);
        }

        return $note;
    }

    public static function getByUser($userId)
    {
        $sql = "SELECT * FROM notes WHERE user_id = $userId";

        $fetch_result = Note::getConnection()->query($sql);

        $notes = [];

        if ($fetch_result->num_rows > 0) {
            while ($record = $fetch_result->fetch_assoc()) {
                $note = Note::recordToEntity($record);

                array_push($notes, $note);
            }
        }

        return $notes;
    }

    public static function deleteOne($id)
    {
        $sql = "DELETE FROM notes WHERE id = $id";

        return Note::getConnection()->query($sql);
    }

    private static function recordToEntity($record)
    {
        $note = new Note;
        $note->id = $record['id'];
        $note->title = $record['title'];
        $note->description = $record['description'];
        $note->created_at = $record['created_at'];
        $note->updated_at = $record['updated_at'];

        return $note;
    }
}