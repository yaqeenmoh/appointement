<?php

namespace App\Http\Controllers\Admin;

use App\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreAppointmentsRequest;
use App\Http\Requests\Admin\UpdateAppointmentsRequest;

class AppointmentsController extends Controller
{
    /**
     * Display a listing of Appointment.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('appointment_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('appointment_delete')) {
                return abort(401);
            }
            $appointments = Appointment::onlyTrashed()->get();
        } else {
            $appointments = Appointment::all();
        }

        return view('admin.appointments.index', compact('appointments'));
    }

    /**
     * Show the form for creating new Appointment.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('appointment_create')) {
            return abort(401);
        }
        
        $clients = \App\Client::get()->pluck('first_name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $employees = \App\Employee::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        return view('admin.appointments.create', compact('clients', 'employees'));
    }

    /**
     * Store a newly created Appointment in storage.
     *
     * @param  \App\Http\Requests\StoreAppointmentsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAppointmentsRequest $request)
    {
        if (! Gate::allows('appointment_create')) {
            return abort(401);
        }
        $appointment = Appointment::create($request->all());



        return redirect()->route('admin.appointments.index');
    }


    /**
     * Show the form for editing Appointment.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('appointment_edit')) {
            return abort(401);
        }
        
        $clients = \App\Client::get()->pluck('first_name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $employees = \App\Employee::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        $appointment = Appointment::findOrFail($id);

        return view('admin.appointments.edit', compact('appointment', 'clients', 'employees'));
    }

    /**
     * Update Appointment in storage.
     *
     * @param  \App\Http\Requests\UpdateAppointmentsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAppointmentsRequest $request, $id)
    {
        if (! Gate::allows('appointment_edit')) {
            return abort(401);
        }
        $appointment = Appointment::findOrFail($id);
        $appointment->update($request->all());



        return redirect()->route('admin.appointments.index');
    }


    /**
     * Display Appointment.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('appointment_view')) {
            return abort(401);
        }
        $appointment = Appointment::findOrFail($id);

        return view('admin.appointments.show', compact('appointment'));
    }


    /**
     * Remove Appointment from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('appointment_delete')) {
            return abort(401);
        }
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();

        return redirect()->route('admin.appointments.index');
    }

    /**
     * Delete all selected Appointment at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('appointment_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Appointment::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Appointment from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('appointment_delete')) {
            return abort(401);
        }
        $appointment = Appointment::onlyTrashed()->findOrFail($id);
        $appointment->restore();

        return redirect()->route('admin.appointments.index');
    }

    /**
     * Permanently delete Appointment from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('appointment_delete')) {
            return abort(401);
        }
        $appointment = Appointment::onlyTrashed()->findOrFail($id);
        $appointment->forceDelete();

        return redirect()->route('admin.appointments.index');
    }
}
