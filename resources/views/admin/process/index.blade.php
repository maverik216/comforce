@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.process.title')</h3>
    @can('requester_manage')
    <p>
        <a href="{{ route('admin.processes.create') }}" class="btn btn-success">@lang('global.app_add_new')</a>
    </p>
    @endcan 

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($processes) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>

                        
                        <th>@lang('global.process.fields.process_id')</th>
                        <th>@lang('global.process.fields.description')</th>
                        <th>@lang('global.process.fields.document')</th>
                        <th>@lang('global.process.fields.status')</th>
                        <th>@lang('global.process.approved')</th>
                        <th>@lang('global.process.fields.date')</th>
                        <th>&nbsp;</th>

                    </tr>
                </thead>
                
                <tbody>
                    @if (count($processes) > 0)
                        @foreach ($processes as $process)
                            <tr data-entry-id="{{ $process->id }}">
                                <td></td>

                                <td>{{ $process->process_id }}</td>
                                <td>{{ $process->description }}</td>
                                <td>
                                    @if ( $process->document !== "" && $process->document !== null  )                          
                                        <a href="{{ URL::to('uploads/'.$process->document) }}" ><i class="fa fa-book" ></i></a>
                                    @endif

                                </td>
                                <td>
                                        <span class="label label-info label-many">{{ $process->status->name}}</span>
                                </td>
                                <td>
                                    @if ( $process->approved == 1)                          
                                    <span class="label label-danger label-many">@lang('global.process.approved')</span>
                                    @else
                                    <span class="label label-info label-many">@lang('global.process.unapproved')</span>
                                    @endif
                                </td>
                                <td>
                                    {{$process->created_at->format('Y-m-d')}}
                                </td>
                            </td>
                            <td>
                                <!-- <a href="{{ route('admin.processes.view',[$process->id]) }}" class="btn btn-xs btn-success">@lang('global.app_view')</a> -->
                                <!-- <a href="{{ route('admin.processes.edit',[$process->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a> -->
                                
                                @can('approver_manage')
                                @if ( $process->status->role_id == 3 && $process->status->id != 5)                          
                                <a href="{{ route('admin.processes.next',[$process->id]) }}" class="btn btn-xs btn-warning">@lang('global.process.process')</a>
                                @endif
                                @endcan
                                @can('requester_manage')
                                @if ( $process->status->role_id == 2  && $process->status->id != 5)                          
                                <a href="{{ route('admin.processes.next',[$process->id]) }}" class="btn btn-xs btn-warning">@lang('global.process.process')</a>
                                @endif
                                @endcan
                                    @can('users_manage')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.processes.destroy', $process->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
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
@can('requester_manage')
@section('javascript') 
    <script>
        window.route_mass_crud_entries_destroy = '{{ route('admin.processes.mass_destroy') }}';
    </script>
@endsection
@endcan