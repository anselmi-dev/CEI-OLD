<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\grado;

class gradosController 
{
    public function Grados() {
		return  Grado::all();
    }
}
