<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreategradoRequest;
use App\Http\Requests\UpdategradoRequest;
use App\Repositories\gradoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\trimestre;
use Carbon\Carbon;

class gradoController extends AppBaseController
{
    /** @var  gradoRepository */
    private $gradoRepository;

    public function __construct(gradoRepository $gradoRepo)
    {
        $this->gradoRepository = $gradoRepo;
    }

    /**
     * Display a listing of the grado.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->gradoRepository->pushCriteria(new RequestCriteria($request));
        $grados = $this->gradoRepository->with(['trimestre'])->all();

        return view('grados.index')
            ->with('grados', $grados);
    }

    /**
     * Show the form for creating a new grado.
     *
     * @return Response
     */
    public function create()
    {
        return view('grados.create');
    }

    /**
     * Store a newly created grado in storage.
     *
     * @param CreategradoRequest $request
     *
     * @return Response
     */
    public function store(CreategradoRequest $request)
    {
        $input = $request->all();

        $grado = $this->gradoRepository->create($input);
        $trimestresid = trimestre::where('ano',Carbon::now()->year)->pluck('id');

        $grado->trimestre()->attach($trimestresid);

        Flash::success('Grado creado exitosamente.');

        return redirect(route('grados.index'));
    }

    /**
     * Display the specified grado.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $grado = $this->gradoRepository->findWithoutFail($id);

        if (empty($grado)) {
            Flash::error('Grado no encontrado');

            return redirect(route('grados.index'));
        }

        return view('grados.show')->with('grado', $grado);
    }

    /**
     * Show the form for editing the specified grado.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $grado = $this->gradoRepository->findWithoutFail($id);

        if (empty($grado)) {
            Flash::error('Grado no encontrado');

            return redirect(route('grados.index'));
        }

        return view('grados.edit')->with('grado', $grado);
    }

    /**
     * Update the specified grado in storage.
     *
     * @param  int              $id
     * @param UpdategradoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdategradoRequest $request)
    {
        $grado = $this->gradoRepository->findWithoutFail($id);

        if (empty($grado)) {
            Flash::error('Grado no encontrado');

            return redirect(route('grados.index'));
        }

        $grado = $this->gradoRepository->update($request->all(), $id);

        Flash::success('Grado actualizado exitosamente.');

        return redirect(route('grados.index'));
    }

    /**
     * Remove the specified grado from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $grado = $this->gradoRepository->findWithoutFail($id);

        if (empty($grado)) {
            Flash::error('Grado no encontrado');

            return redirect(route('grados.index'));
        }

        $this->gradoRepository->delete($id);

        Flash::success('Grado eliminado exitosamente.');

        return redirect(route('grados.index'));
    }
}
