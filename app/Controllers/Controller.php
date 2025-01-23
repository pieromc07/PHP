<?php

namespace App\Controllers;

class Controller
{
  /**
   * Mostrar la vista.
   * 
   * @param string $view
   * @param array $data
   * @return void
   */
  public function view(string $view, array $data = []): void
  {
    extract($data);
    require_once "resources/views/{$view}.php";
  }

  /**
   * Redireccionar a una ruta.
   * 
   * @param string $route
   * @return void
   */
  public function redirect(string $route): void
  {
    header("Location: /{$route}");
  }

}
