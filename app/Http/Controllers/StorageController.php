<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

class StorageController extends AppBaseController
{

    public function index()
    {
        return view('estudiantes.fileUp');
    }

	public function store(Request $request)
	{
		$file = $request->file('file');
		$nombre = $file->getClientOriginalName();
		\Storage::disk('boleta')->put($nombre,  \File::get($file));
		return public_path();
	}
}
