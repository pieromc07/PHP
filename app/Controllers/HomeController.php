<?php

namespace App\Controllers;

class HomeController extends Controller
{
  /**
   * Mostrar la página de inicio.
   * 
   * @return void
   */
  public function index(): void
  {
    $this->view('home');
  }

  /**
   * Mostrar la página de error 404.
   * 
   * @return void
   */
  public function error404(): void
  {
    $this->view('404');
  }
}
