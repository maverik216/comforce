@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.process.title')</h3>
    
    {!! Form::model($process, ['method' => 'PUT', 'route' => ['admin.processes.update2', $process->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_edit')
        </div>

        <div class="panel-body">
        <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('start', 'Fecha Inicio*', ['class' => 'control-label']) !!}
                    {!! Form::date('start', old('start'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('start'))
                        <p class="help-block">
                            {{ $errors->first('start') }}
                        </p>
                    @endif
                </div>
            </div> 
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('end', 'Feche Fin*', ['class' => 'control-label']) !!}
                    {!! Form::date('end', old('end'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('end'))
                        <p class="help-block">
                            {{ $errors->first('end') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('global.app_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop


@section('javascript') 

<script>
$(document).ready(function(){
    $("#start").change(function(){
        var start = $("#start").val();
        var now = new Date();
        var start = new Date(start + " 23:59:59");
        
        if(start < now){
            alert("La fecha de inicio no puede ser menor a hoy")
            $("#start").val("");
        }
    })
    $("#end").change(function(){
        var start = $("#start").val();
        var end = $("#end").val();
        var start = new Date(start + " 23:59:59");
        var end = new Date(end + " 23:59:59");
        
        if(start > end){
            alert("La fecha fin debe ser mayor a la fecha de inicio")
            $("#end").val("");
        }
    })
});
</script>
@endsection
