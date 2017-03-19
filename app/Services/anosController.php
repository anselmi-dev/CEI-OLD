<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\ano;

class anosController 
{
    public function Anos() {
		return  Ano::all();
    }

	public function AnoActual(){
        return Ano::orderBy('id', 'desc')->first()->id;
	}
}
