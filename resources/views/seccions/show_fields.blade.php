<div class="table-responsive">
<table class="table">
    <caption></caption>
    <thead>
        <tr>
            <th> id </th>
            <th> Nombre </th>
            <th> Correo </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($seccion->estudiantes as $estudiante )
            <tr>
                <td >{{ $estudiante->id }} </td>
                <td >{{ $estudiante->nombre }} {{ $estudiante->apellido }}</td>
                <td >{{ $estudiante->email }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
