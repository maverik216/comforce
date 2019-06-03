@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')

    {{-- <h3 class="page-title">@lang('global.registers.title')</h3> --}}
    <p>
        <a href="{{ route('admin.register.index') }}" class="btn btn-success">@lang('global.app_back_to_list')</a>
    </p>
    <h2 class="page-title">@lang('global.registers.fields.student'): {{ $register->user->name}}</h2>
    <h3 class="page-title">@lang('global.registers.fields.cycle'): {{ $register->cycle->name}}</h3>
    

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($register->subject) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>

                        <th>@lang('global.registers.fields.subject')</th>
                        <th>@lang('global.registers.fields.description')</th>
                        <th>@lang('global.registers.fields.schedule')</th>
                        <th>&nbsp;</th>

                    </tr>
                </thead>
                
                <tbody>
                    @if (count($register->subject) > 0)
                        @foreach ($register->subject as $subject)
                            <tr data-entry-id="{{ $subject->id }}">
                                <td></td>

                                <td>{{ $subject->name }}</td>
                                <td>{{ $subject->description }}</td>
                                <td>{{ $subject->description }}</td>
                                <td>
                                    <a href="{{ route('admin.register.score',[$subject->id]) }}" class="btn btn-xs btn-danger">@lang('global.registers.fields.score')</a>
                                   
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
