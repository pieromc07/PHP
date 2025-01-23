<?php

namespace App\Controllers;

class LoginController extends Controller
{
  /**
   * Mostar formulario de inicio de sesión.
   * 
   * @return void
   */
  public function showLoginForm(): void
  {
    $this->view('auth/login');
  }


  /**
   * Verificar si esta logueado.
   * 
   * @return bool
   */
  public function isLogged(): bool
  {
    if (session_status() == PHP_SESSION_NONE) {
      session_start();
    }

    if (isset($_SESSION['id_user'])) {
      return true;
    } else {
      return false;
    }
  }
}