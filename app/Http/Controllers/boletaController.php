<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateboletaRequest;
use App\Http\Requests\UpdateboletaRequest;
use App\Repositories\boletaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Illuminate\Support\Facades\DB;
class boletaController extends AppBaseController
{
    /** @var  boletaRepository */
    private $boletaRepository;

    public function __construct(boletaRepository $boletaRepo)
    {
        $this->boletaRepository = $boletaRepo;
    }

    /**
     * Display a listing of the boleta.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->boletaRepository->pushCriteria(new RequestCriteria($request));
        $boletas = $this->boletaRepository->all();

        return view('boletas.index')
            ->with('boletas', $boletas);
    }

    /**
     * Show the form for creating a new boleta.
     *
     * @return Response
     */
    public function create()
    {
        return view('boletas.create');
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
        $input = $request->all();
        $boleta = $this->boletaRepository->create($input);
        DB::table('boleta_seccion')->insert(
            array('seccion_id' => $input['seccion_id'], 'boleta_id' => $boleta->id)
        );
        DB::table('boleta_estudiante')->insert(
            array('estudiante_id' => $input['estudiante_id'], 'boleta_id' => $boleta->id)
        );
        Flash::success('Boleta saved successfully.');

        return redirect(route('boletas.index'));
    }

    /**
     * Display the specified boleta.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $boleta = $this->boletaRepository->findWithoutFail($id);

        if (empty($boleta)) {
            Flash::error('Boleta not found');

            return redirect(route('boletas.index'));
        }

        return view('boletas.show')->with('boleta', $boleta);
    }

    /**
     * Show the form for editing the specified boleta.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $boleta = $this->boletaRepository->findWithoutFail($id);

        if (empty($boleta)) {
            Flash::error('Boleta not found');

            return redirect(route('boletas.index'));
        }

        return view('boletas.edit')->with('boleta', $boleta);
    }

    /**
     * Update the specified boleta in storage.
     *
     * @param  int              $id
     * @param UpdateboletaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateboletaRequest $request)
    {
        $boleta = $this->boletaRepository->findWithoutFail($id);

        if (empty($boleta)) {
            Flash::error('Boleta not found');

            return redirect(route('boletas.index'));
        }

        $boleta = $this->boletaRepository->update($request->all(), $id);

        Flash::success('Boleta updated successfully.');

        return redirect(route('boletas.index'));
    }

    /**
     * Remove the specified boleta from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $boleta = $this->boletaRepository->findWithoutFail($id);

        if (empty($boleta)) {
            Flash::error('Boleta not found');

            return redirect(route('boletas.index'));
        }

        $this->boletaRepository->delete($id);

        Flash::success('Boleta deleted successfully.');

        return redirect(route('boletas.index'));
    }
}
