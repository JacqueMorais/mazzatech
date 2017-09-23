<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Scheduling;

class SchedulingController extends Controller
{
    public function index()
    {
        $schedulings = Scheduling::all();
        return view('admin.scheduling.index', compact('schedulings'));
    }

    public function create()
    {
        return view('admin.scheduling.create');
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => "Campo ':attribute' é obrigatório.",
            'max' => "Campo ':attribute' permiti um número máximo de :max caracteres.",
        ];
        $correct_names = [
            'date' => 'Data',
            'horary' => 'Horário',
        ];

        $this->validate($request, [
            'date' => 'required|date',
            'horary' => 'required',
        ], $messages, $correct_names);

        $scheduling = Scheduling::create([
            'date' => $request->date,
            'horary' => $request->horary,
            'specialty' => $request->specialty
        ]);

        return redirect()->route('admin.scheduling.index')->with([
            'status_type' => 'success',
            'status' => 'Consulta cadastrada com sucesso!',
        ]);
    }

    public function update(Request $request, $id)
    {
        $messages = [
            'required' => "Campo ':attribute' é obrigatório.",
            'max' => "Campo ':attribute' permiti um numero máximo de :max caracteres.",
        ];
        $correct_names = [
            'date' => 'Data',
            'horary' => 'Horário',
        ];

        $this->validate($request, [
            'date' => 'required|date',
            'horary' => 'required',
        ], $messages, $correct_names);

        $scheduling = Scheduling::find($id);

        $scheduling->date => $request->date;
        $scheduling->horary => $request->horary;
        $scheduling->specialty => $request->specialty;

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
