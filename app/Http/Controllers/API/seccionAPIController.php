<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateseccionAPIRequest;
use App\Http\Requests\API\UpdateseccionAPIRequest;
use App\Models\seccion;
use App\Repositories\seccionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class seccionController
 * @package App\Http\Controllers\API
 */

class seccionAPIController extends AppBaseController
{
    /** @var  seccionRepository */
    private $seccionRepository;

    public function __construct(seccionRepository $seccionRepo)
    {
        $this->seccionRepository = $seccionRepo;
    }

    /**
     * Display a listing of the seccion.
     * GET|HEAD /seccions
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->seccionRepository->pushCriteria(new RequestCriteria($request));
        $this->seccionRepository->pushCriteria(new LimitOffsetCriteria($request));
        $seccions = $this->seccionRepository->all();

        return $this->sendResponse($seccions->toArray(), 'Seccions retrieved successfully');
    }

    /**
     * Store a newly created seccion in storage.
     * POST /seccions
     *
     * @param CreateseccionAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateseccionAPIRequest $request)
    {
        $input = $request->all();

        $seccions = $this->seccionRepository->create($input);

        return $this->sendResponse($seccions->toArray(), 'Seccion saved successfully');
    }

    /**
     * Display the specified seccion.
     * GET|HEAD /seccions/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var seccion $seccion */
        $seccion = $this->seccionRepository->findWithoutFail($id);

        if (empty($seccion)) {
            return $this->sendError('Seccion not found');
        }

        return $this->sendResponse($seccion->toArray(), 'Seccion retrieved successfully');
    }

    /**
     * Update the specified seccion in storage.
     * PUT/PATCH /seccions/{id}
     *
     * @param  int $id
     * @param UpdateseccionAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateseccionAPIRequest $request)
    {
        $input = $request->all();

        /** @var seccion $seccion */
        $seccion = $this->seccionRepository->findWithoutFail($id);

        if (empty($seccion)) {
            return $this->sendError('Seccion not found');
        }

        $seccion = $this->seccionRepository->update($input, $id);

        return $this->sendResponse($seccion->toArray(), 'seccion updated successfully');
    }

    /**
     * Remove the specified seccion from storage.
     * DELETE /seccions/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var seccion $seccion */
        $seccion = $this->seccionRepository->findWithoutFail($id);

        if (empty($seccion)) {
            return $this->sendError('Seccion not found');
        }

        $seccion->delete();

        return $this->sendResponse($id, 'Seccion deleted successfully');
    }
}
