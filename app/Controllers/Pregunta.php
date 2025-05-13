<?php

namespace App\Controllers;

use App\Models\PreguntaModel;
use CodeIgniter\RESTful\ResourceController;

class Pregunta extends ResourceController
{
    public function siguiente($id = null)
    {
        $model = new PreguntaModel();

        // Si se pasa un ID, trae la siguiente pregunta
        if ($id !== null) {
            $pregunta = $model->where('id >', $id)->orderBy('id', 'asc')->first();
        } else {
            // Primer pregunta si no hay ID
            $pregunta = $model->orderBy('id', 'asc')->first();
        }

        if (!$pregunta) {
            return $this->respond(['fin' => true]);
        }

        // Formatear para frontend
        return $this->respond([
            'id' => $pregunta['id'],
            'texto' => $pregunta['texto'],
            'opciones' => [
                $pregunta['opcion_1'],
                $pregunta['opcion_2'],
                $pregunta['opcion_3'],
                $pregunta['opcion_4'],
            ],
            'correcta' => $pregunta['respuesta_correcta'] - 1, // 0-indexed
        ]);
    }
}
