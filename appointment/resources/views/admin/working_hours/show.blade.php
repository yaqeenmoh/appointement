@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.working-hours.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.working-hours.fields.employee')</th>
                            <td field-key='employee'>{{ $working_hour->employee->name ?? '' }}</td>
<td field-key='email'>{{ isset($working_hour->employee) ? $working_hour->employee->email : '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.working-hours.fields.date')</th>
                            <td field-key='date'>{{ $working_hour->date }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.working-hours.fields.start-time')</th>
                            <td field-key='start_time'>{{ $working_hour->start_time }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.working-hours.fields.end-time')</th>
                            <td field-key='end_time'>{{ $working_hour->end_time }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.working_hours.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop

@section('javascript')
    @parent

    <script src="{{ url('adminlte/plugins/datetimepicker/moment-with-locales.min.js') }}"></script>
    <script src="{{ url('adminlte/plugins/datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
    <script>
        $(function(){
            moment.updateLocale('{{ App::getLocale() }}', {
                week: { dow: 1 } // Monday is the first day of the week
            });
            
            $('.date').datetimepicker({
                format: "{{ config('app.date_format_moment') }}",
                locale: "{{ App::getLocale() }}",
            });
            
            $('.timepicker').datetimepicker({
                format: "{{ config('app.time_format_moment') }}",
            });
            
        });
    </script>
            
@stop
