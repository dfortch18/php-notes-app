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
        <div class="card card-body p-5 mt-4">
            <h1 class="display-4">Notes App with PHP</h1>
            <p class="lead">A simple App to manage Notes developed with <strong>PHP</strong> and <strong>MYSQL</strong></p>
            <hr class="my-4" />
            <p>veniam voluptatibus aliquid unde sit Libero veniam similique ex reiciendis
                doloribus! Deleniti sunt cum ad est atque. Esse earum
            </p>
            <?php if (!isset($_SESSION['user'])): ?>
                <div>
                    <a href="<?= route('register') ?>" class="btn btn-primary">Register</a>
                </div>
            <?php endif; ?>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>