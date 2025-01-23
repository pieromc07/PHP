<?php

namespace Core;

class MyValidator
{
  /**
   * Validar los datos.
   * 
   * @param array $data
   * @param array $rules
   * @return array
   */
  public function validate(array $data, array $rules): array
  {
    $errors = [];

    foreach ($rules as $field => $rule) {
      $rules = explode('|', $rule);

      foreach ($rules as $rule) {
        if ($rule === 'required' && empty($data[$field])) {
          $errors[$field] = 'El campo es requerido.';
        }

        if ($rule === 'email' && !filter_var($data[$field], FILTER_VALIDATE_EMAIL)) {
          $errors[$field] = 'El campo debe ser un email válido.';
        }

        if ($rule === 'numeric' && !is_numeric($data[$field])) {
          $errors[$field] = 'El campo debe ser un número.';
        }
        if ($rule === 'min:2' && strlen($data[$field]) < 2) {
          $errors[$field] = 'El campo debe tener al menos 2 caracteres.';
        }
      }
    }

    return $errors;
  }
}
