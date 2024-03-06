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
        <section class="card">
            <div class="card-body">
                <h1>About</h1>
                <p>
                    Adipisicing lorem laudantium fuga excepturi iste earum? Architecto et sint exercitationem nihil voluptatum? Quae dolores sint fugiat inventore soluta ad Tenetur minima odit qui fugit eveniet minima? Repellat nobis harum quia placeat eveniet fugit voluptatem Pariatur maiores molestiae est quas.
                </p>
            </div>
        </section>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>