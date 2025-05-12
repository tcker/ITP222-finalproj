<?php

namespace App\Controllers;

use App\Models\User;

class HomeController
{
    public function index()
    {
        echo "Welcome to the PHP MVC!";
    }

    public function users()
    {
        $user = new User();
        $users = $user->getAll();

        header('Content-Type: application/json');
        echo json_encode($users);
    }
}
