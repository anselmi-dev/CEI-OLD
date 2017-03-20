<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateauxesRequest;
use App\Http\Requests\UpdateauxesRequest;
use App\Repositories\auxesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class auxesController extends AppBaseController
{
    /** @var  auxesRepository */
    private $auxesRepository;

    public function __construct(auxesRepository $auxesRepo)
    {
        $this->auxesRepository = $auxesRepo;
    }

    /**
     * Display a listing of the auxes.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->auxesRepository->pushCriteria(new RequestCriteria($request));
        $auxes = $this->auxesRepository->all();

        return view('auxes.index')
            ->with('auxes', $auxes);
    }

    /**
     * Show the form for creating a new auxes.
     *
     * @return Response
     */
    public function create()
    {
        return view('auxes.create');
    }

    /**
     * Store a newly created auxes in storage.
     *
     * @param CreateauxesRequest $request
     *
     * @return Response
     */
    public function store(CreateauxesRequest $request)
    {
        $input = $request->all();

        $auxes = $this->auxesRepository->create($input);

        Flash::success('Auxes saved successfully.');

        return redirect(route('auxes.index'));
    }

    /**
     * Display the specified auxes.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $auxes = $this->auxesRepository->findWithoutFail($id);

        if (empty($auxes)) {
            Flash::error('Auxes not found');

            return redirect(route('auxes.index'));
        }

        return view('auxes.show')->with('auxes', $auxes);
    }

    /**
     * Show the form for editing the specified auxes.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $auxes = $this->auxesRepository->findWithoutFail($id);

        if (empty($auxes)) {
            Flash::error('Auxes not found');

            return redirect(route('auxes.index'));
        }

        return view('auxes.edit')->with('auxes', $auxes);
    }

    /**
     * Update the specified auxes in storage.
     *
     * @param  int              $id
     * @param UpdateauxesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateauxesRequest $request)
    {
        $auxes = $this->auxesRepository->findWithoutFail($id);

        if (empty($auxes)) {
            Flash::error('Auxes not found');

            return redirect(route('auxes.index'));
        }

        $auxes = $this->auxesRepository->update($request->all(), $id);

        Flash::success('Auxes updated successfully.');

        return redirect(route('auxes.index'));
    }

    /**
     * Remove the specified auxes from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $auxes = $this->auxesRepository->findWithoutFail($id);

        if (empty($auxes)) {
            Flash::error('Auxes not found');

            return redirect(route('auxes.index'));
        }

        $this->auxesRepository->delete($id);

        Flash::success('Auxes deleted successfully.');

        return redirect(route('auxes.index'));
    }
}
