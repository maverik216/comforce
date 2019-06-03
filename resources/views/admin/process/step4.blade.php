@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.process.title')</h3>
    
    {!! Form::model($process, ['method' => 'PUT', 'route' => ['admin.processes.update4', $process->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_edit')
        </div>

        <div class="panel-body">
            <div class="col-xs-12 form-group">
                {!! Form::label('approved', 'Aprobar*', ['class' => 'control-label']) !!}
                {!! Form::label('approved', 'Si', ['class' => 'control-label']) !!}
                {!! Form::radio('approved', '1' , true)  !!}
                {!! Form::label('approved', 'No', ['class' => 'control-label']) !!}
                {!! Form::radio('approved', '0' , true)  !!}
                <p class="help-block"></p>
                @if($errors->has('approved'))
                    <p class="help-block">
                        {{ $errors->first('approved') }}
                    </p>
                @endif
            </div>
            <div class="row">
                <div id="boxcomment" class="col-xs-12 form-group hide">
                    {!! Form::label('comment', 'Comentarios', ['class' => 'control-label']) !!}
                    {!! Form::textarea('comment', old('comment'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('comment'))
                        <p class="help-block">
                            {{ $errors->first('comment') }}
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
