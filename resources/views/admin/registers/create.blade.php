@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.registers.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.register.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_create')
        </div>
        
        <div class="panel-body">
            
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('cycles', 'Ciclo*', ['class' => 'control-label']) !!}
                    {!! Form::select('cycles', $carrers, old('roles'), ['class' => 'form-control select2',  'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('carrers'))
                        <p class="help-block">
                            {{ $errors->first('carrers') }}
                        </p>
                    @endif
                </div>
            </div>
            
            
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('users', 'Estudiantes*', ['class' => 'control-label']) !!}
                    {!! Form::select('users[]', $users, old('users'), ['class' => 'form-control select2', 'multiple' => 'multiple', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('users'))
                        <p class="help-block">
                            {{ $errors->first('users') }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="col-xs-12 form-group">
                {!! Form::label('value', 'Valor*', ['class' => 'control-label']) !!}
                {!! Form::text('value', old('value'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                <p class="help-block"></p>
                @if($errors->has('value'))
                    <p class="help-block">
                        {{ $errors->first('value') }}
                    </p>
                @endif
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

