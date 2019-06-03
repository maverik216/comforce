@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.process.title')</h3>
    
    {!! Form::model($process, ['method' => 'PUT', 'route' => ['admin.processes.update5', $process->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_edit')
        </div>

        <div class="panel-body">
            <div class="col-xs-12 form-group">
                <p>
                    {!! Form::label('#', 'Num Proceso:' .$process->process_id, ['class' => 'control-label']) !!}
                </p>
                <p>
                    {!! Form::label('#', 'Descripcion:' . $process->description, ['class' => 'control-label']) !!}
                </p>
                <p>
                    {!! Form::label('#', 'Departamento:' . $process->city->state->name, ['class' => 'control-label']) !!}
                </p>
                <p>
                    {!! Form::label('#', 'Ciudad:' . $process->city->name, ['class' => 'control-label']) !!}
                </p>
                <p>
                    {!! Form::label('#', 'Inicio:' . $process->start, ['class' => 'control-label']) !!}
                </p>
                <p>
                    {!! Form::label('#', 'Fin:' . $process->end, ['class' => 'control-label']) !!}
                </p>
                <p>
                    {!! Form::label('#', 'Documento:' . $process->document, ['class' => 'control-label']) !!}
                </p>
                <p>
                    {!! Form::label('#', 'Aprobado: ' . ($process->document==0)?"No Aprobado":"Aprobado", ['class' => 'control-label']) !!}
                </p>
                
            </div>
            
            
        </div>
    </div>

    {!! Form::submit(trans('global.app_finish'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop


@section('javascript') 

<script>
$(document).ready(function(){
    $("input[name='approved']").change(function(){
        var approved = $(this).val();
        console.log(approved)
        if(approved == false){
            $("#boxcomment").removeClass("hide")
        }else{
            $("#boxcomment").addClass("hide")

        }
    })
});
</script>
@endsection
