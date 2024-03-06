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
                <div class="card">
                    <div class="card-header pt-5">
                        <h4 class="text-center">
                            Account Register
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="<?= route('register') ?>" method="POST">
                            <div class="mb-3">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control <?= showIsInvalidClass('register_errors', 'name') ?>" name="name" placeholder="Name" value="<?= isset($_SESSION['register_old_fields']['name']) ? $_SESSION['register_old_fields']['name'] : '' ?>" />
                                <p class="<?= isset($_SESSION['register_errors']['name']) ? 'invalid-feedback' : '' ?>"><?= isset($_SESSION['register_errors']['name']) ? $_SESSION['register_errors']['name'] : '' ?></p>
                            </div>
                            <div class="mb-3">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control <?= showIsInvalidClass('register_errors', 'email') ?>" name="email" placeholder="Email" value="<?= isset($_SESSION['register_old_fields']['email']) ? $_SESSION['register_old_fields']['email'] : '' ?>" />
                                <p class="<?= isset($_SESSION['register_errors']['email']) ? 'invalid-feedback' : '' ?>"><?= isset($_SESSION['register_errors']['email']) ? $_SESSION['register_errors']['email'] : '' ?></p>
                            </div>
                            <div class="mb-3">
                                <label for="password">Password</label>
                                <input type="password" class="form-control <?= showIsInvalidClass('register_errors', 'password') ?>" name="password" placeholder="Password" />
                                <p class="<?= isset($_SESSION['register_errors']['password']) ? 'invalid-feedback' : '' ?>"><?= isset($_SESSION['register_errors']['password']) ? $_SESSION['register_errors']['password'] : '' ?></p>
                            </div>
                            <div class="mb-3">
                                <label for="confirm_password">Confirm Password:</label>
                                <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" />
                                <p class="<?= isset($_SESSION['register_errors']['confirm_password']) ? 'invalid-feedback' : '' ?>"><?= isset($_SESSION['register_errors']['confirm_password']) ? $_SESSION['register_errors']['confirm_password'] : '' ?></p>
                            </div>
                            <button class="btn btn-success btn-block">
                                Register
                            </button>
                        </form>
                    </div>
                    <p class="text-center">Already Have an Account?
                        <a href="<?= route('login') ?>" class="text-info">Login</a>
                    </p>
                </div>
            </div>
        </div>
    </main>

    <?php if (isset($_SESSION)) unset($_SESSION['register_errors']); unset($_SESSION['register_old_fields']); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>