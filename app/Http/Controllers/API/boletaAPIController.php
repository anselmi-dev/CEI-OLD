<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateboletaAPIRequest;
use App\Http\Requests\API\UpdateboletaAPIRequest;
use App\Models\boleta;
use App\Repositories\boletaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class boletaController
 * @package App\Http\Controllers\API
 */

class boletaAPIController extends AppBaseController
{
    /** @var  boletaRepository */
    private $boletaRepository;

    public function __construct(boletaRepository $boletaRepo)
    {
        $this->boletaRepository = $boletaRepo;
    }

    /**
     * Display a listing of the boleta.
     * GET|HEAD /boletas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->boletaRepository->pushCriteria(new RequestCriteria($request));
        $this->boletaRepository->pushCriteria(new LimitOffsetCriteria($request));
        $boletas = $this->boletaRepository->all();

        return $this->sendResponse($boletas->toArray(), 'Boletas retrieved successfully');
    }

    /**
     * Store a newly created boleta in storage.
     * POST /boletas
     *
     * @param CreateboletaAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateboletaAPIRequest $request)
    {
        $input = $request->all();

        $boletas = $this->boletaRepository->create($input);

        return $this->sendResponse($boletas->toArray(), 'Boleta saved successfully');
    }

    /**
     * Display the specified boleta.
     * GET|HEAD /boletas/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var boleta $boleta */
        $boleta = $this->boletaRepository->findWithoutFail($id);

        if (empty($boleta)) {
            return $this->sendError('Boleta not found');
        }

        return $this->sendResponse($boleta->toArray(), 'Boleta retrieved successfully');
    }

    /**
     * Update the specified boleta in storage.
     * PUT/PATCH /boletas/{id}
     *
     * @param  int $id
     * @param UpdateboletaAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateboletaAPIRequest $request)
    {
        $input = $request->all();

        /** @var boleta $boleta */
        $boleta = $this->boletaRepository->findWithoutFail($id);

        if (empty($boleta)) {
            return $this->sendError('Boleta not found');
        }

        $boleta = $this->boletaRepository->update($input, $id);

        return $this->sendResponse($boleta->toArray(), 'boleta updated successfully');
    }

    /**
     * Remove the specified boleta from storage.
     * DELETE /boletas/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var boleta $boleta */
        $boleta = $this->boletaRepository->findWithoutFail($id);

        if (empty($boleta)) {
            return $this->sendError('Boleta not found');
        }

        $boleta->delete();

        return $this->sendResponse($id, 'Boleta deleted successfully');
    }
}
