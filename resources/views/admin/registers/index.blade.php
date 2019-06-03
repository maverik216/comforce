@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.registers.title')</h3>
    <p>
        <a href="{{ route('admin.register.create') }}" class="btn btn-success">@lang('global.app_add_new')</a>
    </p>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($registers) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>

                        <th>@lang('global.registers.fields.student')</th>
                        <th>@lang('global.registers.fields.cycle')</th>
                        <th>@lang('global.registers.fields.subjects')</th>
                        <th>&nbsp;</th>

                    </tr>
                </thead>
                
                <tbody>
                    @if (count($registers) > 0)
                        @foreach ($registers as $register)
                            <tr data-entry-id="{{ $register->id }}">
                                <td></td>

                                <td>{{ $register->user->name }}</td>
                                <td>{{ $register->cycle->name }}</td>
                                <td>{{ count($register->subject) }}</td>
                                
                                <td>
                                    <a href="{{ route('admin.register.subjects',[$register->id]) }}" class="btn btn-xs btn-info">@lang('global.subjects.title')</a>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.register.destroy', $register->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                </td>

                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="9">@lang('global.app_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop
