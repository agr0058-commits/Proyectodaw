<?php

namespace App\Http\Controllers;

use App\Models\Incident;
use App\Models\Client;
use Illuminate\Http\Request;

class IncidentController extends Controller
{
    public function index()
    {
        $incidents = Incident::with('client')->get();
        return view('incidents.index', compact('incidents'));
    }

    public function create()
    {
        $clients = Client::all();
        return view('incidents.create', compact('clients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_id'   => 'required|exists:clients,id',
            'title'       => 'required',
            'description' => 'nullable',
            'status'      => 'required|in:open,in_progress,closed',
        ]);

        Incident::create($request->all());

        return redirect()->route('incidents.index')->with('success', 'Incidencia creada.');
    }

    public function edit(Incident $incident)
    {
        $clients = Client::all();
        return view('incidents.edit', compact('incident', 'clients'));
    }

    public function update(Request $request, Incident $incident)
    {
        $request->validate([
            'client_id'   => 'required|exists:clients,id',
            'title'       => 'required',
            'description' => 'nullable',
            'status'      => 'required|in:open,in_progress,closed',
        ]);

        $incident->update($request->all());

        return redirect()->route('incidents.index')->with('success', 'Incidencia actualizada.');
    }

    public function destroy(Incident $incident)
    {
        $incident->delete();
        return redirect()->route('incidents.index')->with('success', 'Incidencia eliminada.');
    }
}
