<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\seccion;

class seccionsController 
{
    public function Seccions() {
		return  Seccions::all();
    }
}
