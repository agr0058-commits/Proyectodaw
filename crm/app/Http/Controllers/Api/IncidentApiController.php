<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Incident;
use Illuminate\Http\Request;

class IncidentApiController extends Controller
{
    public function index()
    {
        return response()->json(Incident::all());
    }

    public function store(Request $request)
    {
        $incident = Incident::create($request->all());
        return response()->json($incident, 201);
    }

    public function show(Incident $incident)
    {
        return response()->json($incident);
    }

    public function update(Request $request, Incident $incident)
    {
        $incident->update($request->all());
        return response()->json($incident);
    }

    public function destroy(Incident $incident)
    {
        $incident->delete();
        return response()->json(null, 204);
    }
}

