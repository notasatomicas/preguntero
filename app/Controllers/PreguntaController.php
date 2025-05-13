<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PreguntaModel;

class PreguntaController extends BaseController
{
    public function formulario()
    {
        return view('plantilla', [
            'title' => 'Cargar pregunta',
            'main'  => view('cargar_pregunta')
        ]);
    }


    public function guardar()
    {
        $data = $this->request->getPost();

        $pregunta = [
            'texto'              => $data['texto_pregunta'],
            'opcion_1'           => $data['resp1'],
            'opcion_2'           => $data['resp2'],
            'opcion_3'           => $data['resp3'],
            'opcion_4'           => $data['resp4'],
            'respuesta_correcta' => $data['respuesta_correcta'] ?? null,
        ];

        $model = new \App\Models\PreguntaModel();
        $model->insert($pregunta);

        return $this->response->setJSON([
            'status' => 'ok',
            'message' => 'Pregunta agregada correctamente.'
        ]);
    }
}
