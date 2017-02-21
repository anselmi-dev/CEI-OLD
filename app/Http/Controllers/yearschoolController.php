<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateyearschoolRequest;
use App\Http\Requests\UpdateyearschoolRequest;
use App\Repositories\yearschoolRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\sections;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class yearschoolController extends AppBaseController
{
    /** @var  yearschoolRepository */
    private $yearschoolRepository;

    public function __construct(yearschoolRepository $yearschoolRepo)
    {
        $this->yearschoolRepository = $yearschoolRepo;
    }

    /**
     * Display a listing of the yearschool.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->yearschoolRepository->pushCriteria(new RequestCriteria($request));
        $yearschools = $this->yearschoolRepository->all();

        $sections= sections::all();

        return view('yearschools.index')
            ->with(compact(['yearschools','sections']));
    }

    /**
     * Show the form for creating a new yearschool.
     *
     * @return Response
     */
    public function create()
    {
        return view('yearschools.create');
    }

    /**
     * Store a newly created yearschool in storage.
     *
     * @param CreateyearschoolRequest $request
     *
     * @return Response
     */
    public function store(CreateyearschoolRequest $request)
    {
        $input = $request->all();

        $yearschool = $this->yearschoolRepository->create($input);

        Flash::success('Yearschool saved successfully.');

        return redirect(route('yearschools.index'));
    }

    /**
     * Display the specified yearschool.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $yearschool = $this->yearschoolRepository->findWithoutFail($id);

        if (empty($yearschool)) {
            Flash::error('Yearschool not found');

            return redirect(route('yearschools.index'));
        }

        return view('yearschools.show')->with('yearschool', $yearschool);
    }

    /**
     * Show the form for editing the specified yearschool.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $yearschool = $this->yearschoolRepository->findWithoutFail($id);

        if (empty($yearschool)) {
            Flash::error('Yearschool not found');

            return redirect(route('yearschools.index'));
        }

        return view('yearschools.edit')->with('yearschool', $yearschool);
    }

    /**
     * Update the specified yearschool in storage.
     *
     * @param  int              $id
     * @param UpdateyearschoolRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateyearschoolRequest $request)
    {
        $yearschool = $this->yearschoolRepository->findWithoutFail($id);

        if (empty($yearschool)) {
            Flash::error('Yearschool not found');

            return redirect(route('yearschools.index'));
        }

        $yearschool = $this->yearschoolRepository->update($request->all(), $id);

        Flash::success('Yearschool updated successfully.');

        return redirect(route('yearschools.index'));
    }

    /**
     * Remove the specified yearschool from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $yearschool = $this->yearschoolRepository->findWithoutFail($id);

        if (empty($yearschool)) {
            Flash::error('Yearschool not found');

            return redirect(route('yearschools.index'));
        }

        $this->yearschoolRepository->delete($id);

        Flash::success('Yearschool deleted successfully.');

        return redirect(route('yearschools.index'));
    }
}
