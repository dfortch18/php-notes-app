<?php

class NotesController
{
    public function allNotes()
    {
        $notes = Note::getByUser($_SESSION['user']->id);

        require 'views/notes/all-notes.php';
    }

    public function addNote()
    {
        require_once 'views/notes/create.php';
    }

    public function addNoteProcess()
    {
        $title = isset($_POST['title']) ? $_POST['title'] : false;
        $description = isset($_POST['description']) ? $_POST['description'] : false;

        $validationErrors = [];

        if (validateString($title) != '') {
            $validationErrors['title'] = validateString($title);
        }

        if (empty($description)) {
            $validationErrors['description'] = 'El campo no puede estar vacío';
        }

        if (count($validationErrors) > 0) {
            $_SESSION['add_note_errors'] = $validationErrors;
            $_SESSION['add_note_old_fields'] = ['title' => $_POST['title'], 'description' => $_POST['description']];

            return redirectTo(route('notes.add'));
        }

        $user_id = $_SESSION['user']->id;

        $note = new Note;
        $note->title = $title;
        $note->description = $description;
        $note->user_id = $user_id;
        $note->save();

        setFlashMessage('success_message', 'Note added successfully.');

        redirectTo(route('notes'));
    }

    public function deleteNote()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : false;

        if (empty($id)) {
            setFlashMessage('error_message', 'Id parameter missing.');

            return redirectTo(route('notes'));
        }

        Note::deleteOne($id);

        setFlashMessage('success_message', 'Note deleted successfully.');

        redirectTo(route('notes'));
    }
}