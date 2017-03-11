<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatetrimestreAPIRequest;
use App\Http\Requests\API\UpdatetrimestreAPIRequest;
use App\Models\trimestre;
use App\Repositories\trimestreRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class trimestreController
 * @package App\Http\Controllers\API
 */

class trimestreAPIController extends AppBaseController
{
    /** @var  trimestreRepository */
    private $trimestreRepository;

    public function __construct(trimestreRepository $trimestreRepo)
    {
        $this->trimestreRepository = $trimestreRepo;
    }

    /**
     * Display a listing of the trimestre.
     * GET|HEAD /trimestres
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->trimestreRepository->pushCriteria(new RequestCriteria($request));
        $this->trimestreRepository->pushCriteria(new LimitOffsetCriteria($request));
        $trimestres = $this->trimestreRepository->all();

        return $this->sendResponse($trimestres->toArray(), 'Trimestres retrieved successfully');
    }

    /**
     * Store a newly created trimestre in storage.
     * POST /trimestres
     *
     * @param CreatetrimestreAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatetrimestreAPIRequest $request)
    {
        $input = $request->all();

        $trimestres = $this->trimestreRepository->create($input);

        return $this->sendResponse($trimestres->toArray(), 'Trimestre saved successfully');
    }

    /**
     * Display the specified trimestre.
     * GET|HEAD /trimestres/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var trimestre $trimestre */
        $trimestre = $this->trimestreRepository->findWithoutFail($id);

        if (empty($trimestre)) {
            return $this->sendError('Trimestre not found');
        }

        return $this->sendResponse($trimestre->toArray(), 'Trimestre retrieved successfully');
    }

    /**
     * Update the specified trimestre in storage.
     * PUT/PATCH /trimestres/{id}
     *
     * @param  int $id
     * @param UpdatetrimestreAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatetrimestreAPIRequest $request)
    {
        $input = $request->all();

        /** @var trimestre $trimestre */
        $trimestre = $this->trimestreRepository->findWithoutFail($id);

        if (empty($trimestre)) {
            return $this->sendError('Trimestre not found');
        }

        $trimestre = $this->trimestreRepository->update($input, $id);

        return $this->sendResponse($trimestre->toArray(), 'trimestre updated successfully');
    }

    /**
     * Remove the specified trimestre from storage.
     * DELETE /trimestres/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var trimestre $trimestre */
        $trimestre = $this->trimestreRepository->findWithoutFail($id);

        if (empty($trimestre)) {
            return $this->sendError('Trimestre not found');
        }

        $trimestre->delete();

        return $this->sendResponse($id, 'Trimestre deleted successfully');
    }
}
