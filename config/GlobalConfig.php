<?php

namespace Config;

class GlobalConfig
{
  /**
   * Configuración de la base de datos.
   * 
   * @var array
   */
  public static $db = [
    'driver' => 'mysql',
    'host' => 'localhost',
    'database' => 'test_db',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => ''
  ];
}
