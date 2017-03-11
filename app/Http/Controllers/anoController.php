<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateanoRequest;
use App\Http\Requests\UpdateanoRequest;
use App\Repositories\anoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class anoController extends AppBaseController
{
    /** @var  anoRepository */
    private $anoRepository;

    public function __construct(anoRepository $anoRepo)
    {
        $this->anoRepository = $anoRepo;
    }

    /**
     * Display a listing of the ano.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->anoRepository->pushCriteria(new RequestCriteria($request));
        $anos = $this->anoRepository->all();

        return view('anos.index')
            ->with('anos', $anos);
    }

    /**
     * Show the form for creating a new ano.
     *
     * @return Response
     */
    public function create()
    {
        return view('anos.create');
    }

    /**
     * Store a newly created ano in storage.
     *
     * @param CreateanoRequest $request
     *
     * @return Response
     */
    public function store(CreateanoRequest $request)
    {
        $input = $request->all();

        $ano = $this->anoRepository->create($input);

        Flash::success('Ano saved successfully.');

        return redirect(route('anos.index'));
    }

    /**
     * Display the specified ano.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $ano = $this->anoRepository->findWithoutFail($id);

        if (empty($ano)) {
            Flash::error('Ano not found');

            return redirect(route('anos.index'));
        }

        return view('anos.show')->with('ano', $ano);
    }

    /**
     * Show the form for editing the specified ano.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $ano = $this->anoRepository->findWithoutFail($id);

        if (empty($ano)) {
            Flash::error('Ano not found');

            return redirect(route('anos.index'));
        }

        return view('anos.edit')->with('ano', $ano);
    }

    /**
     * Update the specified ano in storage.
     *
     * @param  int              $id
     * @param UpdateanoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateanoRequest $request)
    {
        $ano = $this->anoRepository->findWithoutFail($id);

        if (empty($ano)) {
            Flash::error('Ano not found');

            return redirect(route('anos.index'));
        }

        $ano = $this->anoRepository->update($request->all(), $id);

        Flash::success('Ano updated successfully.');

        return redirect(route('anos.index'));
    }

    /**
     * Remove the specified ano from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $ano = $this->anoRepository->findWithoutFail($id);

        if (empty($ano)) {
            Flash::error('Ano not found');

            return redirect(route('anos.index'));
        }

        $this->anoRepository->delete($id);

        Flash::success('Ano deleted successfully.');

        return redirect(route('anos.index'));
    }
}
