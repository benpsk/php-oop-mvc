<?php

namespace App\Controllers;

use App\Models\User;

class UserController
{
  public function index()
  {
    $users = User::all();
    include '../app/Views/user/index.php';
  }

  public function create()
  {
    include '../app/Views/user/create.php';
  }

  public function store()
  {
    User::create($_POST);
    header('Location: /users');
  }

  public function edit($id)
  {
    $user = User::find($id);
    include '../app/Views/user/edit.php';
  }

  public function update($id)
  {
    User::update($id, $_POST);
    header('Location: /users');
  }

  public function delete($id)
  {
    User::delete($id);
    header('Location: /users');
  }
}
