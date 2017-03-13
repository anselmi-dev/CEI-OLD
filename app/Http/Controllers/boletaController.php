<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateboletaRequest;
use App\Http\Requests\UpdateboletaRequest;
use App\Repositories\boletaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\boleta;
use File;
use Flash;

use App\Models\estudiante;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class boletaController extends AppBaseController
{
    /** @var  boletaRepository */
    private $boletaRepository;

    public function __construct(boletaRepository $boletaRepo)
    {
        $this->boletaRepository = $boletaRepo;
    }

    /**
     * Store a newly created boleta in storage.
     *
     * @param CreateboletaRequest $request
     *
     * @return Response
     */
    public function store(CreateboletaRequest $request)
    {
        $estudiante = estudiante::find($request->estudiante_id);
    
        $path = "/ano/$request->ano_id/trimestre/$request->trimestre_id/estudiante/$request->estudiante_id/{$this->clean($estudiante->nombre)}.".File::extension($request->file('url')->getClientOriginalName());

        \Storage::disk('boleta')->put($path, \File::get($request->file('url')));
        $boleta = new boleta(['url' => $path,'estudiante_id' => $request->estudiante_id,'trimestre_id'=> $request->trimestre_id,'ano_id' => $request->ano_id]);

        $input = $request->all();
        
        $boleta = $this->boletaRepository->create($boleta->toArray());

        Flash::success('Boleta saved successfully.');

        return redirect(route('estudiantes.index'));
    }

    public function destroy($id){

        $boleta = $this->boletaRepository->findWithoutFail($id);

        if (empty($boleta)) {
            Flash::error('Boleta not found');
        }

        $this->boletaRepository->delete($id);

        Flash::success('boleta deleted successfully.');

        return redirect(route('estudiantes.index'));
    }


    function clean($name) {
        $name = str_replace(' ', '-', $name); // Replaces all spaces with hyphens.

        return preg_replace('/[^A-Za-z0-9\-]/', '', $name); // Removes special chars.
    }



}
