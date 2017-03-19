<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\trimestre;

class TrimestresController 
{
    public function Trimestres() {
		return  Trimestre::all();
    }
}
