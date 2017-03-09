<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateestudianteRequest;
use App\Http\Requests\UpdateestudianteRequest;
use App\Repositories\estudianteRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\seccion;
use App\Models\trimestre;
use Carbon\Carbon;

class estudianteController extends AppBaseController
{
    /** @var  estudianteRepository */
    private $estudianteRepository;

    public function __construct(estudianteRepository $estudianteRepo)
    {
        $this->estudianteRepository = $estudianteRepo;
    }

    /**
     * Display a listing of the docente.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->estudianteRepository->pushCriteria(new RequestCriteria($request));
        $estudiantes = $this->estudianteRepository->all();
        return view('estudiantes.index')
            ->with('estudiantes', $estudiantes);
    }

    /**
     * Display a listing of the estudiante.
     *
     * @param Request $request
     * @return Response
     */
    public function listar(Request $request,$id)
    {
        $seccion = seccion::find($id);
        $tri = trimestre::where('ano',Carbon::now()->year)->get();
        return view('estudiantes.index')
            ->with('estudiantes', $seccion->estudiante)->with('trimestres',$tri);
    }

    /**
     * Show the form for creating a new estudiante.
     *
     * @return Response
     */
    public function create()
    {
        $secciones = seccion::all();

        return view('estudiantes.create')->with('secciones',$secciones);
    }

    /**
     * Store a newly created estudiante in storage.
     *
     * @param CreateestudianteRequest $request
     *
     * @return Response
     */
    public function store(CreateestudianteRequest $request)
    {
        $input = $request->all();

        $estudiante = $this->estudianteRepository->create($input);
        
        $estudiante->seccion()->associate($request->input('seccion'));
        $estudiante->save();

        Flash::success('Estudiante creado exitosamente.');

        return redirect(route('estudiantes.index'));
    }

    /**
     * Display the specified estudiante.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $estudiante = $this->estudianteRepository->findWithoutFail($id);

        if (empty($estudiante)) {
            Flash::error('Estudiante no encontrado');

            return redirect(route('estudiantes.index'));
        }

        return view('estudiantes.show')->with('estudiante', $estudiante);
    }

    /**
     * Show the form for editing the specified estudiante.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $estudiante = $this->estudianteRepository->findWithoutFail($id);

        $secciones = seccion::all();

        if (empty($estudiante)) {
            Flash::error('Estudiante no encontrado');
            return redirect(route('estudiantes.index'));
        }

        return view('estudiantes.edit')->with('estudiante', $estudiante)->with('secciones',$secciones);
    }

    /**
     * Update the specified estudiante in storage.
     *
     * @param  int              $id
     * @param UpdateestudianteRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateestudianteRequest $request)
    {
        
        $estudiante = $this->estudianteRepository->findWithoutFail($id);

        if (empty($estudiante)) {
            Flash::error('Estudiante no encontrado');

            return redirect(route('estudiantes.index'));
        }
        $seccion = $request->input('seccion');
        $estudiante = $this->estudianteRepository->update($request->only('nombre',
        'apellido',
        'fechaNacimiento',
        'email',
        'sexo'), $id);
        $estudiante->seccion()->associate($seccion[0]);
        $estudiante->save();
        Flash::success('Estudiante actualizado exitosamente.');

        return redirect(route('estudiantes.index'));
    }

    /**
     * Remove the specified estudiante from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $estudiante = $this->estudianteRepository->findWithoutFail($id);

        if (empty($estudiante)) {
            Flash::error('Estudiante no encontrado');

            return redirect(route('estudiantes.index'));
        }

        $this->estudianteRepository->delete($id);

        Flash::success('Estudiante eliminado exitosamente.');

        return redirect(route('estudiantes.index'));
    }
}
