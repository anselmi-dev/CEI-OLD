<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\estudiante;
use App\Models\grado;
use App\Models\docente;
use App\Models\boleta;
use App\Models\trimestre;
use App\Models\seccion;
use App\Models\ano;
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

    public function countAños() {
		$count = Ano::all()->count();
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

    public function countBoletas() {
		$count = Boleta::all()->count();
	    $data = array('count' => $count);
		return $data;
    }

	public function Trimestres(){
        $trimestres = trimestre::all();
        return $trimestres;
	}

	public function AnoActual(){
		
        return ano::where('ano',Carbon::now()->year)->first();
	}
	public function Anos()
	{
        return ano::all();
		
	}
	public function Secciones()
	{
		
        return seccion::all();
	}

	public function Estudiantes(){
        $Estudiantes = Estudiante::all();
        return $Estudiantes;
	}
	public function Docentes(){
		
        return docente::all();
	}

	public function eje($seccion_id,$trimestre_id){
		return  Boleta::where([
	    	['trimestre_id', '=', $trimestre_id],
	    	['seccion_id', '=', $seccion_id],
		])->get();
        
	}

	public function ExisteAno(){
        if( Ano::first() ){
			return true;
		}
		return false;
	}
}
