@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.process.title')</h3>
    
    {!! Form::model($process, ['method' => 'PUT', 'route' => ['admin.processes.update3', $process->id], 'files' => true]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_edit')
        </div>

        <div class="panel-body">
        <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('start', 'Fechaasdfasfdsa Inicio*', ['class' => 'control-label']) !!}
                    {!! Form::file('file'); !!}
                    <p class="help-block"></p>
                    @if($errors->has('start'))
                        <p class="help-block">
                            {{ $errors->first('start') }}
                        </p>
                    @endif
                </div>
            </div> 
            
        </div>
    </div>

    {!! Form::submit(trans('global.app_upload'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

