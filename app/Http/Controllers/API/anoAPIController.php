<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateanoAPIRequest;
use App\Http\Requests\API\UpdateanoAPIRequest;
use App\Models\ano;
use App\Repositories\anoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class anoController
 * @package App\Http\Controllers\API
 */

class anoAPIController extends AppBaseController
{
    /** @var  anoRepository */
    private $anoRepository;

    public function __construct(anoRepository $anoRepo)
    {
        $this->anoRepository = $anoRepo;
    }

    /**
     * Display a listing of the ano.
     * GET|HEAD /anos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->anoRepository->pushCriteria(new RequestCriteria($request));
        $this->anoRepository->pushCriteria(new LimitOffsetCriteria($request));
        $anos = $this->anoRepository->all();

        return $this->sendResponse($anos->toArray(), 'Anos retrieved successfully');
    }

    /**
     * Store a newly created ano in storage.
     * POST /anos
     *
     * @param CreateanoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateanoAPIRequest $request)
    {
        $input = $request->all();

        $anos = $this->anoRepository->create($input);

        return $this->sendResponse($anos->toArray(), 'Ano saved successfully');
    }

    /**
     * Display the specified ano.
     * GET|HEAD /anos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ano $ano */
        $ano = $this->anoRepository->findWithoutFail($id);

        if (empty($ano)) {
            return $this->sendError('Ano not found');
        }

        return $this->sendResponse($ano->toArray(), 'Ano retrieved successfully');
    }

    /**
     * Update the specified ano in storage.
     * PUT/PATCH /anos/{id}
     *
     * @param  int $id
     * @param UpdateanoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateanoAPIRequest $request)
    {
        $input = $request->all();

        /** @var ano $ano */
        $ano = $this->anoRepository->findWithoutFail($id);

        if (empty($ano)) {
            return $this->sendError('Ano not found');
        }

        $ano = $this->anoRepository->update($input, $id);

        return $this->sendResponse($ano->toArray(), 'ano updated successfully');
    }

    /**
     * Remove the specified ano from storage.
     * DELETE /anos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ano $ano */
        $ano = $this->anoRepository->findWithoutFail($id);

        if (empty($ano)) {
            return $this->sendError('Ano not found');
        }

        $ano->delete();

        return $this->sendResponse($id, 'Ano deleted successfully');
    }
}
