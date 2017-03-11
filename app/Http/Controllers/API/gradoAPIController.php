<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreategradoAPIRequest;
use App\Http\Requests\API\UpdategradoAPIRequest;
use App\Models\grado;
use App\Repositories\gradoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class gradoController
 * @package App\Http\Controllers\API
 */

class gradoAPIController extends AppBaseController
{
    /** @var  gradoRepository */
    private $gradoRepository;

    public function __construct(gradoRepository $gradoRepo)
    {
        $this->gradoRepository = $gradoRepo;
    }

    /**
     * Display a listing of the grado.
     * GET|HEAD /grados
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->gradoRepository->pushCriteria(new RequestCriteria($request));
        $this->gradoRepository->pushCriteria(new LimitOffsetCriteria($request));
        $grados = $this->gradoRepository->all();

        return $this->sendResponse($grados->toArray(), 'Grados retrieved successfully');
    }

    /**
     * Store a newly created grado in storage.
     * POST /grados
     *
     * @param CreategradoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreategradoAPIRequest $request)
    {
        $input = $request->all();

        $grados = $this->gradoRepository->create($input);

        return $this->sendResponse($grados->toArray(), 'Grado saved successfully');
    }

    /**
     * Display the specified grado.
     * GET|HEAD /grados/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var grado $grado */
        $grado = $this->gradoRepository->findWithoutFail($id);

        if (empty($grado)) {
            return $this->sendError('Grado not found');
        }

        return $this->sendResponse($grado->toArray(), 'Grado retrieved successfully');
    }

    /**
     * Update the specified grado in storage.
     * PUT/PATCH /grados/{id}
     *
     * @param  int $id
     * @param UpdategradoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdategradoAPIRequest $request)
    {
        $input = $request->all();

        /** @var grado $grado */
        $grado = $this->gradoRepository->findWithoutFail($id);

        if (empty($grado)) {
            return $this->sendError('Grado not found');
        }

        $grado = $this->gradoRepository->update($input, $id);

        return $this->sendResponse($grado->toArray(), 'grado updated successfully');
    }

    /**
     * Remove the specified grado from storage.
     * DELETE /grados/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var grado $grado */
        $grado = $this->gradoRepository->findWithoutFail($id);

        if (empty($grado)) {
            return $this->sendError('Grado not found');
        }

        $grado->delete();

        return $this->sendResponse($id, 'Grado deleted successfully');
    }
}
