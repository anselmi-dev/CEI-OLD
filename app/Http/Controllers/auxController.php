<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateauxRequest;
use App\Http\Requests\UpdateauxRequest;
use App\Repositories\auxRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class auxController extends AppBaseController
{
    /** @var  auxRepository */
    private $auxRepository;

    public function __construct(auxRepository $auxRepo)
    {
        $this->auxRepository = $auxRepo;
    }

    /**
     * Display a listing of the aux.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->auxRepository->pushCriteria(new RequestCriteria($request));
        $auxes = $this->auxRepository->all();

        return $auxes;
    }

    /**
     * Show the form for creating a new aux.
     *
     * @return Response
     */
    public function create()
    {
        return view('auxes.create');
    }

    /**
     * Store a newly created aux in storage.
     *
     * @param CreateauxRequest $request
     *
     * @return Response
     */
    public function store(CreateauxRequest $request)
    {
        $input = $request->all();

        $aux = $this->auxRepository->create($input);

        Flash::success('Aux saved successfully.');

        return redirect(route('auxes.index'));
    }

    /**
     * Display the specified aux.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $aux = $this->auxRepository->findWithoutFail($id);

        if (empty($aux)) {
            Flash::error('Aux not found');

            return redirect(route('auxes.index'));
        }

        return view('auxes.show')->with('aux', $aux);
    }

    /**
     * Show the form for editing the specified aux.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $aux = $this->auxRepository->findWithoutFail($id);

        if (empty($aux)) {
            Flash::error('Aux not found');

            return redirect(route('auxes.index'));
        }

        return view('auxes.edit')->with('aux', $aux);
    }

    /**
     * Update the specified aux in storage.
     *
     * @param  int              $id
     * @param UpdateauxRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateauxRequest $request)
    {
        $aux = $this->auxRepository->findWithoutFail($id);

        if (empty($aux)) {
            Flash::error('Aux not found');

            return redirect(route('auxes.index'));
        }

        $aux = $this->auxRepository->update($request->all(), $id);

        Flash::success('Aux updated successfully.');

        return redirect(route('auxes.index'));
    }

    /**
     * Remove the specified aux from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $aux = $this->auxRepository->findWithoutFail($id);

        if (empty($aux)) {
            Flash::error('Aux not found');

            return redirect(route('auxes.index'));
        }

        $this->auxRepository->delete($id);

        Flash::success('Aux deleted successfully.');

        return redirect(route('auxes.index'));
    }
}
