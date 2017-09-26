<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Patient;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::all();
        return view('admin.patient.index', compact('patients'));
    }

    public function create()
    {
        return view('admin.patient.create');
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => "Campo ':attribute' é obrigatório.",
            'max' => "Campo ':attribute' permiti um número máximo de :max caracteres.",
        ];
        $correct_names = [
            'name' => 'Nome',
            'registration' => 'Convênio',
        ];

        $this->validate($request, [
            'name' => 'required|max:255',
            'cpf' => 'required|max:20',
            'registration' => 'required|max:50',
        ], $messages, $correct_names);

        $patient = Patient::create([
            'name' => $request->name,
            'cpf' => $request->cpf,
            'rg' => $request->rg,
            'registration' => $request->registration,
            'phone' => $request->phone,
            'address' => $request->address,
            'sex' => $request->sex,
            'birth' => \helpers::dateBrToEn($request->birth)
        ]);

        return redirect()->route('admin.patient.index')->with([
            'status_type' => 'success',
            'status' => 'Paciente cadastrado com sucesso!',
        ]);
    }

    public function edit($id)
    {
        $patient = Patient::find($id);

        return view('admin.patient.edit', compact('patient'));
    }

    public function update(Request $request, $id)
    {
        $messages = [
            'required' => "Campo ':attribute' é obrigatório.",
            'max' => "Campo ':attribute' permiti um numero máximo de :max caracteres.",
        ];
        $correct_names = [
            'name' => 'Nome',
            'registration' => 'Convênio',
        ];

         $this->validate($request, [
            'name' => 'required|max:255',
            'cpf' => 'required|max:20',
            'registration' => 'required|max:50',
        ], $messages, $correct_names);

        $patient = Patient::find($id);

        $patient->name = $request->name;
        $patient->cpf = $request->cpf;
        $patient->rg = $request->rg;
        $patient->registration = $request->registration;
        $patient->phone = $request->phone;
        $patient->address = $request->address;
        $patient->sex = $request->sex;
        $patient->birth = \helpers::dateBrToEn($request->birth);

        $patient->save();

        return redirect()->route('admin.patient.index')->with([
            'status_type' => 'success',
            'status' => 'Atualizações salvas com sucesso!',
        ]);
    }

    public function delete($id)
    {
        $patient = Patient::find($id);
        
        return view('admin.patient.delete', compact('patient'));
    }

    public function destroy($id, Request $request)
    {
        $patient = Patient::find($id);

        if($patient->schedulings){
            return redirect()->route('admin.patient.index')->with('status', 'Esse paciente possui agendamentos por isso não pode ser removido.');
        }

        $patient->deleted_reason = $request->reason;
        $patient->deleted_user = \Auth::user()->id;
        $patient->save();

        if ($patient->delete()) {
            return redirect()->route('admin.patient.index')->with('status', 'Paciente removido com sucesso.');
        }
    }
}
