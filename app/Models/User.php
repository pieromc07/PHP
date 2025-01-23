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
   * Llave primaria
   * 
   * @var string
   */
  protected $primaryKey = 'id';

  /**
   * Atributos de la tabla
   * 
   * @var array
   */
  protected $attributes = [
    'name' => null,
    'age' => null,
  ];

  /**
   * Reglas de validación
   * 
   * @var array
   */
  protected $rules = [
    'name' => 'required|min:2',
    'age' => 'required|numeric',
  ];
}
