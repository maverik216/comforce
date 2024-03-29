@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.cycles.title')</h3>
    
    {!! Form::model($cycle, ['method' => 'PUT', 'route' => ['admin.cycles.update', $cycle->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', 'Nombre*', ['class' => 'control-label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('duration', 'Duration*', ['class' => 'control-label']) !!}
                    {!! Form::text('duration', old('duration'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('duration'))
                        <p class="help-block">
                            {{ $errors->first('duration') }}
                        </p>
                    @endif
                </div>
            </div>
            {{-- <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('password', 'Password', ['class' => 'control-label']) !!}
                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('password'))
                        <p class="help-block">
                            {{ $errors->first('password') }}
                        </p>
                    @endif
                </div>
            </div> --}}
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('carrers', 'Carrers*', ['class' => 'control-label']) !!}
                    {!! Form::select('carrers[]', $carrers, old('carrers')? old('roles') : $cycle->carrer->id, ['class' => 'form-control select2',  'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('carrers'))
                        <p class="help-block">
                            {{ $errors->first('carrers') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('global.app_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

