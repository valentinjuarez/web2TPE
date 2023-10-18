<?php

class AuthView {
    public function showLogin($error = null) {
       
        
        // Verificar si el usuario ya está autenticado
        if (isset($_SESSION['usuario'])) {
            // Si el usuario ya está autenticado, redirige a la página de administrador
            header("Location: " . URL_USER);
            exit();
        }

        require './templates/login.phtml';
    }
}

