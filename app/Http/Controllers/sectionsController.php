<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatesectionsRequest;
use App\Http\Requests\UpdatesectionsRequest;
use App\Repositories\sectionsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class sectionsController extends AppBaseController
{
    /** @var  sectionsRepository */
    private $sectionsRepository;

    public function __construct(sectionsRepository $sectionsRepo)
    {
        $this->sectionsRepository = $sectionsRepo;
    }

    /**
     * Display a listing of the sections.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->sectionsRepository->pushCriteria(new RequestCriteria($request));
        $sections = $this->sectionsRepository->all();

        return view('sections.index')
            ->with('sections', $sections);
    }

    /**
     * Show the form for creating a new sections.
     *
     * @return Response
     */
    public function create()
    {
        return view('sections.create');
    }

    /**
     * Store a newly created sections in storage.
     *
     * @param CreatesectionsRequest $request
     *
     * @return Response
     */
    public function store(CreatesectionsRequest $request)
    {
        $input = $request->all();

        $sections = $this->sectionsRepository->create($input);

        Flash::success('Sections saved successfully.');

        return redirect(route('sections.index'));
    }

    /**
     * Display the specified sections.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $sections = $this->sectionsRepository->findWithoutFail($id);

        if (empty($sections)) {
            Flash::error('Sections not found');

            return redirect(route('sections.index'));
        }

        return view('sections.show')->with('sections', $sections);
    }

    /**
     * Show the form for editing the specified sections.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $sections = $this->sectionsRepository->findWithoutFail($id);

        if (empty($sections)) {
            Flash::error('Sections not found');

            return redirect(route('sections.index'));
        }

        return view('sections.edit')->with('sections', $sections);
    }

    /**
     * Update the specified sections in storage.
     *
     * @param  int              $id
     * @param UpdatesectionsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatesectionsRequest $request)
    {
        $sections = $this->sectionsRepository->findWithoutFail($id);

        if (empty($sections)) {
            Flash::error('Sections not found');

            return redirect(route('sections.index'));
        }

        $sections = $this->sectionsRepository->update($request->all(), $id);

        Flash::success('Sections updated successfully.');

        return redirect(route('sections.index'));
    }

    /**
     * Remove the specified sections from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $sections = $this->sectionsRepository->findWithoutFail($id);

        if (empty($sections)) {
            Flash::error('Sections not found');

            return redirect(route('sections.index'));
        }

        $this->sectionsRepository->delete($id);

        Flash::success('Sections deleted successfully.');

        return redirect(route('sections.index'));
    }
}
