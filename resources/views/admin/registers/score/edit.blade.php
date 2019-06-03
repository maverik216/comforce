@extends('layouts.app')

@section('content')
    <p>
        <a href="{{ route('admin.register.subjects', $register->id) }}" class="btn btn-success">@lang('global.app_back_to_list')</a>
    </p>
    <h2 class="page-title">@lang('global.registers.fields.student'): {{ $register->user->name}}</h2>
    <h3 class="page-title">@lang('global.registers.fields.cycle'): {{ $register->cycle->name}}</h3>
    <h3 class="page-title">@lang('global.registers.fields.subject'): {{ $subject->name}}</h3>
    
    
    {!! Form::model($register, ['method' => 'PUT', 'route' => ['admin.register.updatescore', $register->id]]) !!}
    {!! Form::hidden('subject', $subject->id) !!}
    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.registers.fields.score')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-lg-3 col-xs-12 form-group">
                    {!! Form::label('scorer1', 'Corte 1*', ['class' => 'control-label']) !!}
                    {!! Form::text('scorer1', old('scorer1')?old('scorer1'):$subject->pivot->scorer1, ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('scorer1'))
                        <p class="help-block">
                            {{ $errors->first('scorer1') }}
                        </p>
                    @endif
                </div>
                <div class="col-lg-3 col-xs-12 form-group">
                    {!! Form::label('scorer2', 'Corte 2*', ['class' => 'control-label']) !!}
                    {!! Form::text('scorer2', old('scorer2')?old('scorer2'):$subject->pivot->scorer2, ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('scorer2'))
                        <p class="help-block">
                            {{ $errors->first('scorer2') }}
                        </p>
                    @endif
                </div>
                <div class="col-lg-3 col-xs-12 form-group">
                    {!! Form::label('scorer3', 'Corte 3*', ['class' => 'control-label']) !!}
                    {!! Form::text('scorer3', old('scorer3')?old('scorer3'):$subject->pivot->scorer3, ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('scorer3'))
                        <p class="help-block">
                            {{ $errors->first('scorer3') }}
                        </p>
                    @endif
                </div>
                <div class="col-lg-3 col-xs-12 form-group">
                    {!! Form::label('final_score', 'Final', ['class' => 'control-label']) !!}
                    {!! Form::text('final_score', old('final_score')?old('final_score'):$subject->pivot->final_score, ['class' => 'form-control', 'readonly' => 'readonly', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('final_score'))
                        <p class="help-block">
                            {{ $errors->first('final_score') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('global.app_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

