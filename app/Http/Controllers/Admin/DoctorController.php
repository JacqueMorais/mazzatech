<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Doctor;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::all();
        return view('admin.doctor.index', compact('doctors'));
    }

    public function create()
    {
        return view('admin.doctor.create');
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => "Campo ':attribute' é obrigatório.",
            'max' => "Campo ':attribute' permiti um número máximo de :max caracteres.",
        ];
        $correct_names = [
            'name' => 'Nome',
            'specialty' => 'Especialidade',
        ];

        $this->validate($request, [
            'name' => 'required|max:255',
            'specialty' => 'required|max:255',
            'crm' => 'required|max:50',
        ], $messages, $correct_names);

        $doctor = Doctor::create([
            'name' => $request->name,
            'specialty' => $request->specialty,
            'crm' => $request->crm,
            'address' => $request->address,
            'phone' => $request->phone
        ]);

        return redirect()->route('admin.doctor.index')->with([
            'status_type' => 'success',
            'status' => 'Médico cadastrado com sucesso!',
        ]);
    }

    public function edit($id)
    {
        $doctor = Doctor::find($id);

        return view('admin.doctor.edit', compact('doctor'));
    }

    public function update(Request $request, $id)
    {
        $messages = [
            'required' => "Campo ':attribute' é obrigatório.",
            'max' => "Campo ':attribute' permiti um numero máximo de :max caracteres.",
        ];
        $correct_names = [
            'name' => 'Nome',
            'specialty' => 'Especialidade',
        ];

        $this->validate($request, [
            'name' => 'required|max:255',
            'specialty' => 'required|max:255',
            'crm' => 'required|max:50',
        ], $messages, $correct_names);

        $doctor = Doctor::find($id);

        $doctor->name = $request->name;
        $doctor->specialty = $request->specialty;
        $doctor->crm = $request->crm;
        $doctor->address = $request->address;
        $doctor->phone = $request->phone;

        $doctor->save();

        return redirect()->route('admin.doctor.index')->with([
            'status_type' => 'success',
            'status' => 'Atualizações salvas com sucesso!',
        ]);
    }

    public function delete($id)
    {
        $doctor = Doctor::find($id);
        
        return view('admin.doctor.delete', compact('doctor'));
    }

    public function destroy($id, Request $request)
    {
        $doctor = Doctor::find($id);

        $doctor->deleted_reason = $request->reason;
        //$doctor->deleted_user = \Auth::user()->id;
        $doctor->save();

        if ($doctor->delete()) {
            return redirect()->route('admin.doctor.index')->with('status', 'Médico removido com sucesso.');
        }
    }
}

