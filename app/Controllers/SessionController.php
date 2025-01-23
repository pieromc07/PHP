<?php

namespace App\Controllers;

class SessionController extends Controller
{
  public function __construct()
  {
    parent::__construct();
    // Iniciar la sesión si no está iniciada
    if (session_status() === PHP_SESSION_NONE) {
      session_start();
    }
  }

  /**
   * Establece un valor en la sesión.
   *
   * @param string $key La clave para identificar el valor en la sesión.
   * @param mixed $value El valor a almacenar en la sesión.
   * @return void
   * @description Guarda un valor en la sesión asociado a una clave específica.
   */
  public static function set($key, $value): void
  {
    $_SESSION[$key] = $value;
  }

  /**
   * Obtiene un valor de la sesión.
   *
   * @param string $key La clave para identificar el valor en la sesión.
   * @param mixed $default Valor a devolver si la clave no existe (opcional).
   * @return mixed Retorna el valor asociado a la clave o el valor por defecto si no existe.
   * @description Recupera un valor de la sesión si existe, de lo contrario devuelve un valor por defecto.
   */
  public static function get($key, $default = null)
  {
    return $_SESSION[$key] ?? $default;
  }

  /**
   * Verifica si una clave existe en la sesión.
   *
   * @param string $key La clave a verificar en la sesión.
   * @return bool Retorna true si la clave existe en la sesión, false en caso contrario.
   * @description Comprueba si una clave específica está presente en la sesión.
   */
  public static function has($key): bool
  {
    return isset($_SESSION[$key]);
  }

  /**
   * Elimina un valor de la sesión.
   *
   * @param string $key La clave del valor a eliminar de la sesión.
   * @return void
   * @description Borra el valor asociado a una clave específica de la sesión.
   */
  public static function remove($key): void
  {
    unset($_SESSION[$key]);
  }

  /**
   * Destruye la sesión completa.
   *
   * @return void
   * @description Elimina todos los datos de la sesión y finaliza la sesión.
   */
  public static function destroy(): void
  {
    session_unset();
    session_destroy();
  }

  /**
   * Obtener todos los valores de la sesión.
   * 
   * @return array Retorna un array con todos los valores de la sesión.
   * @description Devuelve un array con todos los valores de la sesión.
   */
  public static function all(): array
  {
    return $_SESSION;
  }
}
