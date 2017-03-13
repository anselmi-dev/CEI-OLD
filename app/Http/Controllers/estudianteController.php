<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateestudianteRequest;
use App\Http\Requests\UpdateestudianteRequest;
use App\Repositories\estudianteRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\estudiante;
use App\Models\grado;
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
        $estudiantes = $this->estudianteRepository->paginate(100);

        return view('estudiantes.index')
            ->with('estudiantes', $estudiantes)
            ->with('request',$request)
        ;
    }

    /**
     * Display a filter list of the estudiante.
     *
     * @param Request $request
     * @return Response
     */
    public function filter(Request $request)
    {
        $estudiantes = estudiante::
                                Nombre($request->input('nombre'))
                                ->Ano($request->ano_id)
                                ->Seccion($request->input('seccion_id'))->paginate(100);

        return view('estudiantes.index')
            ->with('estudiantes', $estudiantes)->with('request',$request);
    }

    /**
     * Display a filter list of the estudiante.
     *
     * @param Request $request
     * @return Response
     */
    public function boleta(Request $request)
    {
        return view('boletas.create')->with('request',$request);
    }

    /**
     * Display a filter list of the estudiante.
     *
     * @param Request $request
     * @return Response
     */
    public function promover(Request $request)
    {
        $estudiantes = estudiante::findMany($request->ids);

        if (!empty($estudiantes->toArray())) {

            if ($estudiantes[0]->ano_id != $request->ano_id) 
            {
                foreach ($estudiantes as $estudiante)
                {
                    $newestudiante = new estudiante($estudiante->toArray());
                    $newestudiante->ano_id = $request->ano_id;
                    $newestudiante->seccion_id = $request->seccion_id;
                    estudiante::create($newestudiante->toArray());
                }
                Flash::success('Estudiante creado exitosamente.');
            }
            else
                Flash::error('Crear nuevo año escolar');
        }else
            Flash::error('No seleccione');
        return redirect(route('estudiantes.index'));
    }

    /**
     * Show the form for creating a new estudiante.
     *
     * @return Response
     */
    public function create(Request $request)
    {   
        return view('estudiantes.create')
                ->with('request',$request);
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

        Flash::success('Estudiante creado exitosamente.');

        return redirect(route('estudiantes.index'))->with('request',$request);
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
        $estudiante = $this->estudianteRepository->update($request->all(), $id);
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
