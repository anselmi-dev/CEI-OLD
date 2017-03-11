<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{

    /**
     * Display a listing of the boleta.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        return view('boletas.create');
    }

    /**
     * Show the form for creating a new trimestre.
     *
     * @return Response
     */
    public function create()
    {
        return view('boletas.fileimput');
    }

    public function store(Request $request)
    {
        $file = $request->file('file');
        $datos_id = explode('_', $request->input('estudiante'), 3);
           //$nombre = $file->getClientOriginalName();
        $dir = $request->input('año').'/'.$request->input('trimestre').'/'.$datos_id[0].'/'.$datos_id[1].'/boleta_'.$request->input('estudiante').'.'.$file->guessExtension();
        \Storage::disk('boleta')->put($dir, \File::get($file));
        return view('boletas.create');
	}

}