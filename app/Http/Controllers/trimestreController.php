<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatetrimestreRequest;
use App\Http\Requests\UpdatetrimestreRequest;
use App\Repositories\trimestreRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class trimestreController extends AppBaseController
{
    /** @var  trimestreRepository */
    private $trimestreRepository;

    public function __construct(trimestreRepository $trimestreRepo)
    {
        $this->trimestreRepository = $trimestreRepo;
    }

    /**
     * Display a listing of the trimestre.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->trimestreRepository->pushCriteria(new RequestCriteria($request));
        $trimestres = $this->trimestreRepository->all();

        return view('trimestres.index')
            ->with('trimestres', $trimestres);
    }

    /**
     * Show the form for creating a new trimestre.
     *
     * @return Response
     */
    public function create()
    {
        return view('trimestres.create');
    }

    /**
     * Store a newly created trimestre in storage.
     *
     * @param CreatetrimestreRequest $request
     *
     * @return Response
     */
    public function store(CreatetrimestreRequest $request)
    {
        $input = $request->all();

        $trimestre = $this->trimestreRepository->create($input);

        Flash::success('Trimestre creado exitosamente.');

        return redirect(route('trimestres.index'));
    }

    /**
     * Display the specified trimestre.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $trimestre = $this->trimestreRepository->findWithoutFail($id);

        if (empty($trimestre)) {
            Flash::error('Trimestre no encontrado');

            return redirect(route('trimestres.index'));
        }

        return view('trimestres.show')->with('trimestre', $trimestre);
    }

    /**
     * Show the form for editing the specified trimestre.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $trimestre = $this->trimestreRepository->findWithoutFail($id);

        if (empty($trimestre)) {
            Flash::error('Trimestre no encontrado');

            return redirect(route('trimestres.index'));
        }

        return view('trimestres.edit')->with('trimestre', $trimestre);
    }

    /**
     * Update the specified trimestre in storage.
     *
     * @param  int              $id
     * @param UpdatetrimestreRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatetrimestreRequest $request)
    {
        $trimestre = $this->trimestreRepository->findWithoutFail($id);

        if (empty($trimestre)) {
            Flash::error('Trimestre no encontrado');

            return redirect(route('trimestres.index'));
        }

        $trimestre = $this->trimestreRepository->update($request->all(), $id);

        Flash::success('Trimestre actualizado exitosamente.');

        return redirect(route('trimestres.index'));
    }

    /**
     * Remove the specified trimestre from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $trimestre = $this->trimestreRepository->findWithoutFail($id);

        if (empty($trimestre)) {
            Flash::error('Trimestre no encontrado');

            return redirect(route('trimestres.index'));
        }

        $this->trimestreRepository->delete($id);

        Flash::success('Trimestre eliminado exitosamente.');

        return redirect(route('trimestres.index'));
    }
}
