<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\estudiante;
use App\Models\grado;
use App\Models\docente;
use App\Models\trimestre;
use App\Models\seccion;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class menuController 
{
    public function countEstudiantes() {
		$count = Estudiante::all()->count();
		$count2 = Estudiante::all()->where('activo', 0)->count();
	    $data = array('count' => $count, 'NoActive' => $count2);
		return $data;
    }

    public function countGrados() {
		$count = Grado::all()->count();
	    $data = array('count' => $count);
		return $data;
    }

    public function countDocentes() {
		$count = Docente::all()->count();
	    $data = array('count' => $count);
		return $data;
    }

    public function countTrimestres() {
		$count = Trimestre::all()->count();
	    $data = array('count' => $count);
		return $data;
    }

    public function countSecciones() {
		$count = Seccion::all()->count();
	    $data = array('count' => $count);
		return $data;
    }

	public function Trimestres(){
        $trimestres = trimestre::where('ano',Carbon::now()->year)->get();
        return $trimestres;
	}

	public function TrimestresActual(){
		$trimestre = trimestre::all()->last();
        return $trimestre;
	}

	public function Estudiantes(){
        $Estudiantes = Estudiante::all();
        return $Estudiantes;
	}
}
