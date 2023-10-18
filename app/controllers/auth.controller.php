<?php
require_once './app/views/auth.view.php';
require_once './app/models/user.model.php';
require_once './app/helpers/auth.helper.php';

class AuthController {
    private $view;
    private $model;

    function __construct() {
        $this->model = new UserModel();
        $this->view = new AuthView();
    }

    public function showLogin() {
        session_start();
        if (isset($_SESSION['usuario'])) {
            // Si el usuario ya está autenticado, redirige a la página de administrador
            header("Location: " . URL_USER);
            exit();
        }

        $this->view->showLogin();
    }

    public function auth() {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (empty($email) || empty($password)) {
            $this->view->showLogin('Faltan completar datos');
            return;
        }

        $user = $this->model->getByEmail($email);
        if ($user && password_verify($password, $user->password)) {
            // Iniciar sesión y almacenar el email del usuario
            session_start();
            $_SESSION['usuario'] = $email;

            header('Location: ' . URL_USER);
        } else {
            $this->view->showLogin('Usuario inválido');
        }
    }

    public function logout() {
        // Cerrar la sesión
        session_start();
        session_unset();
        session_destroy();
        header('Location: ' . BASE_URL);    
    }
}
   
