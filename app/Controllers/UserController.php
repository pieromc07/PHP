<?php

namespace App\Controllers;

use App\Models\User;

class UserController extends Controller
{
  /**
   * Mostrar la lista de usuarios.
   * 
   * @return void
   */
  public function index(): void
  {
    $users = (new User())->all();

    $this->view('users/index', compact('users'));
  }

  /**
   * Mostrar el formulario para crear un usuario.
   * 
   * @return void
   */
  public function create(): void
  {
    $this->view('users/create');
  }

  /**
   * Almacenar un usuario en la base de datos.
   * 
   * @return void
   */
  public function store(): void
  {

    $user = new User();
    $errors = $user->validate($_POST);
    if (!empty($errors)) {
      $this->view('users/create', compact('errors'));
      return;
    }
    $name = $_POST['name'];
    $age = $_POST['age'];

    $user->create([
      'name' => $name,
      'age' => $age,
    ]);
    $this->redirect('users');
  }

  /**
   * Mostar un usuario específico.
   * 
   * @param int $id
   * @return void
   */
  public function show(int $id): void
  {
    $user = (new User())->find(['id' => $id]);
    $this->view('users/show', compact('user'));
  }

  /**
   * Mostrar el formulario para editar un usuario.
   * 
   * @param int $id
   * @return void
   */
  public function edit(int $id): void
  {
    $user = (new User())->find(['id' => $id]);
    $this->view('users/edit', compact('user'));
  }

  /**
   * Actualizar un usuario en la base de datos.
   * 
   * @param int $id
   * @return void
   */
  public function update(int $id): void
  {
    $name = $_POST['name'];
    $age = $_POST['age'];

    $user = new User();
    $user->update([
      'name' => $name,
      'age' => $age,
    ], ['id' => $id]);
    $this->redirect('users');
  }

  /**
   * Eliminar un usuario de la base de datos.
   * 
   * @param int $id
   * @return void
   */
  public function destroy(int $id): void
  {
    $user = new User();
    $user->delete(['id' => $id]);
    $this->redirect('users');
  }
}
