<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\estudiante;

class estudiantesController
{
    public function Estudiantes() {
		return  Estudiante::all();
    }
}
