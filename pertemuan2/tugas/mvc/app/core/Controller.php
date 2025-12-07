<?php

class Controller
{
    // controller view methodnya
    public function view($view, $data = [])
    {
        // make view data available as variables (e.g. $users, $judul)
        if (is_array($data) && !empty($data)) {
            extract($data);
        }

        // require view using an absolute path relative to this file
        require_once __DIR__ . '/../views/' . $view . '.php';
    }


    public function model($model)
    {
        // require model using an absolute path relative to this file
        require_once __DIR__ . '/../models/' . $model . '.php';
        return new $model;
    }
}
