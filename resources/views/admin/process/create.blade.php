@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.process.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.processes.store'], 'files' => true]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_create')
        </div>
        
        <div class="panel-body">
            
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('description', 'Descripción*', ['class' => 'control-label']) !!}
                    {!! Form::textarea('description', old('description'), ['class' => 'form-control', 'placeholder' => '', 'required' => '',  'rows' => 2, 'cols' => 40]) !!}
                    <p class="help-block"></p>
                    @if($errors->has('description'))
                        <p class="help-block">
                            {{ $errors->first('description') }}
                        </p>
                    @endif
                </div>
            </div>
           
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('state_id', 'Departamento*', ['class' => 'control-label']) !!}
                    {!! Form::select('state_id', $states, old('state_id'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('state_id'))
                        <p class="help-block">
                            {{ $errors->first('state_id') }}
                        </p>
                    @endif
                </div>
            </div>
            
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('city_id', 'Ciudad*', ['class' => 'control-label']) !!}
                    {!! Form::select('city_id', array(), old('city_id'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('city_id'))
                        <p class="help-block">
                            {{ $errors->first('city_id') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop


@section('javascript') 

<script>
$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    setTimeout(function(){$("#state_id").trigger('change')},500);
    $("#state_id").change(function(){
        var stateId = $(this).val();
        $.ajax({
            url: "{{ url('cities-by-state') }}" + "/" + stateId,
            type: "get",   
            data: {istate_id: stateId},         
            dataType: "json",
            success: function(data){   
                console.log(data)
                if(data.status != false){
                    var option = $("<option>Seleccione</option>");
                    $("#city_id").html(option);
                    $.each(data,function(idx, option){
                        var option = $("<option></option>")
                        .attr("value", option.id)                        
                        .text(option.name);
                        $("#city_id").append(option);
                    });
                }
            }
        });
    })

    
});
</script>
@endsection
  