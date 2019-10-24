<ul class="timeline timeline-inverse">
    @foreach($trayectoria as $alumnos)
        @foreach($alumnos['inscripciones'] as $inscripcion)
            @if($inscripcion['pase']==null)
                @include('inscripciones.componentes.trayectoria_inscripcion',['inscripcion'=>$inscripcion])
            @else
                @include('inscripciones.componentes.trayectoria_pase',['inscripcion'=>$inscripcion])
            @endif
        @endforeach
    @endforeach
</ul>
