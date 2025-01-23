<?php

namespace App\Models;

class User extends Model
{

  /**
   * tabla de la base de datos
   * 
   * @var string
   */
  protected $table = 'users';

  /**
   * Atributos de la tabla
   * 
   * @var array
   */
  protected $attributes = [
    'id' => null,
    'name' => null,
    'age' => null,
  ];

  /**
   * Reglas de validación
   * 
   * @var array
   */
  protected $rules = [
    'name' => 'required',
    'age' => 'required|numeric',
  ];
}
