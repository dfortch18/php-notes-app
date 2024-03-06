<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= asset('/vendor/bootstrap/bootstrap.min.css') ?>">
    <title>Notes App<?php echo (isset($title) ? " | $title" : '') ?></title>
</head>

<body>

    <?php include 'views/partials/navigation.php' ?>

    <main class="container p-5">
        <div class="col-md-4 mx-auto">
            <div class="card">
                <div class="card-header text-center">
                    <h3>New Note</h3>
                </div>
                <div class="card-body text-right">
                    <form action="<?php route('notes.add.process') ?>" method="POST">
                        <div class="mb-3">
                            <label for="title">Title:</label>
                            <input type="text" name="title" class="form-control <?= showIsInvalidClass('add_note', 'title') ?>" placeholder="Title" value="<?= getOldField('add_note', 'title') ?>" autofocus />
                            <p class="<?= getInvalidFeedback('add_note', 'title') != '' ? 'invalid-feedback' : '' ?>"><?= getInvalidFeedback('add_note', 'title') ?></p>
                        </div>
                        <div class="mb-3">
                            <label for="description">Description:</label>
                            <textarea name="description" class="form-control <?= showIsInvalidClass('add_note', 'title') ?>" value="<?= getOldField('add_note', 'description') ?>" placeholder="Description"></textarea>
                            <p class="<?= getInvalidFeedback('add_note', 'description') != '' ? 'invalid-feedback' : '' ?>"><?= getInvalidFeedback('add_note', 'description') ?></p>
                        </div>
                        <button class="btn btn-primary w-100" type="submit">
                            Save
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <?php if (isset($_SESSION)) unset($_SESSION['add_note_errors']); unset($_SESSION['add_note_old_fields']); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>