<?php

namespace App\Models;

use Core\MyDatabase;
use Core\MyValidator;

class Model
{
  /**
   * tabla de la base de datos
   * 
   * @var string
   */
  protected $table;

  /**
   * Atributos de la tabla
   * 
   * @var array
   */
  protected $attributes = [];

  /**
   * Reglas de validación
   * 
   * @var array
   */
  protected $rules = [];

  /**
   * Obtener todos los registros de la tabla.
   * 
   * @return array
   */
  public function all(): array
  {
    $db = new MyDatabase();
    return $db->all($this->table);
  }

  /**
   * Obtener un registro por su id.
   * 
   * @param int $id
   * @return array
   */
  public function find(array $where): array
  {
    $db = new MyDatabase();
    return $db->findBy($this->table, $where);
  }

  /**
   * Crear un nuevo registro.
   * 
   * @param array $data
   * @return bool
   */
  public function create(array $data): bool
  {
    $db = new MyDatabase();
    return $db->insert($this->table, $data);
  }

  /**
   * Actualizar un registro por su id.
   * 
   * @param int $id
   * @param array $data
   * @return bool
   */
  public function update(array $data, array $where): bool
  {
    $db = new MyDatabase();
    return $db->update($this->table, $data, $where);
  }

  /**
   * Eliminar un registro por su id.
   * 
   * @param int $id
   * @return bool
   */
  public function delete(array $where): bool
  {
    $db = new MyDatabase();
    return $db->delete($this->table, $where);
  }

  /**
   * Validar los datos.
   * 
   * @param array $data
   * @return array
   */
  public function validate(array $data): array
  {
    $validator = new MyValidator();
    return $validator->validate($data, $this->rules);
  }
}
