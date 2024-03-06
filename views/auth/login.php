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
            <?php include 'views/partials/message.php' ?> 

            <div class="col-md-4 mx-auto">
                <div class="card mt-5 rounded">
                    <div class="card-header text-center pt-5">
                        <h1 class="h4">
                            Account Login
                        </h1>
                    </div>
                    <img class="rounded-circle mx-auto d-block logo m-4 img-fluid" src="<?= asset('logo.png') ?>" alt="Logo" width="150px" />
                    <div class="card-body">
                        <form action="<?= route('login.process') ?>" method="POST">
                            <div class="mb-3">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control <?= showIsInvalidClass('login_errors', 'email') ?>" name="email" placeholder="Email" value="<?= isset($_SESSION['login_old_fields']['email']) ? $_SESSION['login_old_fields']['email'] : '' ?>" autofocus />
                                <p class="<?= isset($_SESSION['login_errors']['email']) ? 'invalid-feedback' : '' ?>"><?= isset($_SESSION['login_errors']) ? $_SESSION['login_errors']['email'] : '' ?></p>
                            </div>
                            <div class="mb-3">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control <?= showIsInvalidClass('login_errors', 'password') ?>" name="password" placeholder="Password" />
                                <p class="<?= isset($_SESSION['login_errors']['password']) ? 'invalid-feedback' : '' ?>"><?= isset($_SESSION['login_errors']['password']) ? $_SESSION['login_errors']['password'] : '' ?></p>
                            </div>
                            <button class="btn btn-success btn-block">
                                Login
                            </button>
                        </form>
                    </div>

                    <p class="text-center">Don't Have an Account? <a href="<?= route('register') ?>" class="text-info">Register</a></p>
                </div>
            </div>
        </div>
    </main>

    <?php if (isset($_SESSION)) unset($_SESSION['login_errors']);
    unset($_SESSION['login_old_fields']); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>