<nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand" href="<?= route('index') ?>">Notes App</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor02">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link <?= $GLOBALS['current_route'] == ABOUT_ROUTE ? 'active' : '' ?>" href="<?= route('about') ?>">About</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <?php if (isset($_SESSION['user'])) : ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Notes
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item <?= $GLOBALS['current_route'] == NOTES_ROUTE ? 'active' : '' ?>" href="<?= route('notes') ?>">All Notes</a>
                            <a class="dropdown-item <?= $GLOBALS['current_route'] == ADD_NOTE_ROUTE ? 'active' : '' ?>" href="<?= route('notes.add') ?>">Add A Note</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?= route('logout') ?>">Logout</a>
                        </ul>
                    </li>
                <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link <?= $GLOBALS['current_route'] == LOGIN_ROUTE ? 'active' : '' ?>" href="<?= route('login') ?>">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $GLOBALS['current_route'] == REGISTER_ROUTE ? 'active' : '' ?>" href="<?= route('register') ?>">Register</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>