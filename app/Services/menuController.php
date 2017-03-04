<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\estudiante;
use App\Models\grado;
use App\Models\docente;
use App\Models\trimestre;
use App\Models\seccion;
class menuController 
{
    public function Estudiantes() {
		$count = Estudiante::all()->count();
		$count2 = Estudiante::all()->where('activo', 0)->count();
	    $data = array('count' => $count, 'NoActive' => $count2);
		return $data;
    }

    public function Grados() {
		$count = Grado::all()->count();
	    $data = array('count' => $count);
		return $data;
    }

    public function Docentes() {
		$count = Docente::all()->count();
	    $data = array('count' => $count);
		return $data;
    }

    public function Trimestres() {
		$count = Trimestre::all()->count();
	    $data = array('count' => $count);
		return $data;
    }

    public function Secciones() {
		$count = Seccion::all()->count();
	    $data = array('count' => $count);
		return $data;
    }
}
