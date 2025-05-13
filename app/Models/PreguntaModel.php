<?php

namespace App\Models;

use CodeIgniter\Model;

class PreguntaModel extends Model
{
    protected $table = 'preguntas';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'texto', 'respuesta_correcta', 'opcion_1', 'opcion_2', 'opcion_3', 'opcion_4'
    ];
}
