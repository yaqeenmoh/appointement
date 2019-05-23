@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.appointment.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.appointment.fields.client')</th>
                            <td field-key='client'>{{ $appointment->client->first_name ?? '' }}</td>
<td field-key='last_name'>{{ isset($appointment->client) ? $appointment->client->last_name : '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.appointment.fields.employee')</th>
                            <td field-key='employee'>{{ $appointment->employee->name ?? '' }}</td>
<td field-key='phone'>{{ isset($appointment->employee) ? $appointment->employee->phone : '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.appointment.fields.start-time')</th>
                            <td field-key='start_time'>{{ $appointment->start_time }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.appointment.fields.end-time')</th>
                            <td field-key='end_time'>{{ $appointment->end_time }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.appointment.fields.comments')</th>
                            <td field-key='comments'>{!! $appointment->comments !!}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.appointments.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
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
            
            $('.timepicker').datetimepicker({
                format: "{{ config('app.time_format_moment') }}",
            });
            
        });
    </script>
            
@stop
