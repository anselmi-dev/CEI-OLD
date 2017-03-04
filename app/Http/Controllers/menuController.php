<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\estudiante;
class menuController extends Controller
{
    public function Estudiantes() {
		$count = Estudiante::all()->count();
			$data = [
		    { count: $count }
		]
		return $data;
    }
}
