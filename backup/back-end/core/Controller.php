<?php
namespace Core;

class Controller
{
    public function view($view, $data = [])
    {
        extract($data);
        require "../app/views/$view.php";
    }

    public function model($model)
    {
        $modelClass = "App\\models\\$model";
        return new $modelClass;
    }
}
