<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'title'  => 'Inicio - Preguntero',
            'navbar' => view('partials/navbar'),
            'main'   => view('partials/main'),
            'footer' => view('partials/footer'),
        ];

        return view('plantilla', $data);
    }
}
