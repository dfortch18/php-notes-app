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
        <div class="row">
            <div class="col-md-12">
                <?php include 'views/partials/message.php' ?>
            </div>
            <?php if (!empty($notes)): ?>
                <?php foreach ($notes as $note): ?>
                    <div class="col-md-3">
                        <div class="card h-100">
                            <div class="card-body">
                                <h4 class="card-title d-flex mb-0 justify-content-between align-items-center">
                                    <?= $note->title ?> <a href="/notes/edit/{{_id}}"><i class="fas fa-edit"></i></a>
                                </h4>
                                <small class="mb-4"><?= date('Y/m/d', strtotime($note->created_at)) ?></small>
                                <p><?= $note->description ?></p>
                                <!-- DELETE REQUEST -->
                                <form action="<?= route('notes.delete')."&id=$note->id" ?>" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger btn-block btn-sm">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="card mx-auto">
                    <div class="card-body">
                        <h1>Hello <?php echo $_SESSION['user']->name; ?></h1>
                        <p clsss="lead">There are not Notes yet.</p>
                        <a href="<?= route('notes.add') ?>" class="btn btn-success btn-block">Create One!</a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>