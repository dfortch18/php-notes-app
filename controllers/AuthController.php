<?php

require_once 'models/User.php';

class AuthController
{
    public function login()
    {
        require_once 'views/auth/login.php';
    }

    public function loginProcess()
    {
        $email = isset($_POST['email']) ? $_POST['email'] : false;
        $password = isset($_POST['password']) ? $_POST['password'] : false;

        $validationErrors = [];

        if (validateEmail($email) != '') {
            $validationErrors['email'] = validateEmail($email);
        }

        if (empty($password)) {
            $validationErrors['password'] = 'The field must not be empty';
        }

        if (count($validationErrors) > 0) {
            $_SESSION['login_errors'] = $validationErrors;
            $_SESSION['login_old_fields'] = ['email' => $_POST['email']];

            return redirectTo(route('login'));
        }

        $user = User::getByEmail($email);
        
        if ($user == null) {
            $validationErrors['email'] = 'Invalid credentials';
            $validationErrors['password'] = 'Invalid credentials';
        }

        if (password_verify($password, $user->hash) == false) {
            $validationErrors['email'] = 'Invalid credentials';
            $validationErrors['password'] = 'Invalid credentials';
        } else {
            $_SESSION['user'] = $user;

            return redirectTo(route('notes'));
        }

        if (count($validationErrors) > 0) {
            $_SESSION['login_errors'] = $validationErrors;
            $_SESSION['login_old_fields'] = ['email' => $_POST['email']];

            redirectTo(route('login'));
        }
    }

    public function register()
    {
        require_once 'views/auth/register.php';
    }

    public function registerProcess()
    {
        $name = isset($_POST['name']) ? $_POST['name'] : false;
        $email = isset($_POST['email']) ? $_POST['email'] : false;
        $password = isset($_POST['password']) ? $_POST['password'] : false;
        $confirm_password = isset($_POST['confirm_password']) ? $_POST['confirm_password'] : false;

        $validationErrors = [];

        if (validateString($name) != '') {
            $validationErrors['name'] = validateString($name);
        }

        if (validateEmail($email) != '') {
            $validationErrors['email'] = validateEmail($email);
        }

        if (validateMinLength($password, 6) != '') {
            $validationErrors['password'] = validateMinLength($password, 6);
        } else {
            if ($password != $confirm_password) {
                $validationErrors['password'] = 'Password does not match confirmation';
            }
        }

        $userExists = User::getByEmail($email);

        if ($userExists != null) {
            $validationErrors['email'] = 'The email is already taken';
        }

        if (count($validationErrors) > 0) {
            $_SESSION['register_errors'] = $validationErrors;
            $_SESSION['register_old_fields'] = ['name' => $_POST['name'], 'email' => $_POST['email']];

            return redirectTo(route('register'));
        }

        try {
            $user = new User;
            $user->name = $name;
            $user->email = $email;
            $user->hash = password_hash($password, PASSWORD_BCRYPT);
            $user->save();

            setFlashMessage('success_message', 'You have registered successfully.');

            redirectTo(route('login'));
        } catch (Exception $e) {
            setFlashMessage('error_message', 'Error: '.$e->getMessage());

            redirectTo(route('register'));
        }
    }

    public function logout()
    {
        $_SESSION['user'] = null;

        setFlashMessage('success_message', 'You have successfully logged out.');

        redirectTo(route('login'));
    }
}