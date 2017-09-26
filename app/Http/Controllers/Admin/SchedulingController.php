<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Scheduling;

class SchedulingController extends Controller
{
    public function index()
    {
        $schedulings = Scheduling::all();
        return view('admin.scheduling.index', compact('schedulings'));
    }

    public function create()
    {
        $doctors =  \App\Doctor::all();
        $patients = \App\Patient::all();

        return view('admin.scheduling.create', compact('doctors', 'patients'));
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => "Campo ':attribute' é obrigatório.",
            'max' => "Campo ':attribute' permiti um número máximo de :max caracteres.",
        ];
        $correct_names = [
            'id_doctor' => 'Médico',
            'id_patient' => 'Paciente',
            'date' => 'Data',
            'horary' => 'Horário',
        ];

        $this->validate($request, [
            'id_doctor' => 'required',
            'id_patient' => 'required',
            'date' => 'required',
            'horary' => 'required',
        ], $messages, $correct_names);

        $scheduling = Scheduling::create([
            'id_doctor' => $request->id_doctor,
            'id_patient' => $request->id_patient,
            'date' => \helpers::dateBrToEn($request->date),
            'horary' => $request->horary,
            'specialty' => $request->specialty
        ]);

        return redirect()->route('admin.scheduling.index')->with([
            'status_type' => 'success',
            'status' => 'Consulta cadastrada com sucesso!',
        ]);
    }

    public function edit($id)
    {
        $doctors =  \App\Doctor::all();
        $patients = \App\Patient::all(); 

        $scheduling = Scheduling::find($id);

        return view('admin.scheduling.edit', compact('scheduling', 'doctors', 'patients'));
    }

    public function update(Request $request, $id)
    {
        $messages = [
            'required' => "Campo ':attribute' é obrigatório.",
            'max' => "Campo ':attribute' permiti um numero máximo de :max caracteres.",
        ];
         $correct_names = [
            'id_doctor' => 'Médico',
            'id_patient' => 'Paciente',
            'date' => 'Data',
            'horary' => 'Horário',
        ];

         $this->validate($request, [
            'id_doctor' => 'required',
            'id_patient' => 'required',
            'date' => 'required',
            'horary' => 'required',
        ], $messages, $correct_names);

        $scheduling = Scheduling::find($id);

        $scheduling->id_doctor = $request->id_doctor;
        $scheduling->id_patient = $request->id_patient;
        $scheduling->date = \helpers::dateBrToEn($request->date);
        $scheduling->horary = $request->horary;
        $scheduling->specialty = $request->specialty;

        $scheduling->save();

        return redirect()->route('admin.scheduling.index')->with([
            'status_type' => 'success',
            'status' => 'Atualizações salvas com sucesso!',
        ]);
    }

    public function delete($id)
    {
        $scheduling = Scheduling::find($id);
        
        return view('admin.scheduling.delete', compact('scheduling'));
    }

    public function destroy($id, Request $request)
    {
        $scheduling = Scheduling::find($id);

        $scheduling->deleted_reason = $request->reason;
        $scheduling->deleted_user = \Auth::user()->id;
        $scheduling->save();

        if ($scheduling->delete()) {
            return redirect()->route('admin.scheduling.index')->with('status', 'Consulta removida com sucesso.');
        }
    }
}
