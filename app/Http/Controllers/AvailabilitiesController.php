<?php

namespace App\Http\Controllers;

Use App\Models\Availabilities;

class AvailabilitiesController extends Controller
{
    public function index()
    {
        return Availabilities::all();
    }

    public function show(Availabilitie $availabilitie)
    {
        return $availabilitie;
    }

    public function store(Request $request)
    {
        $availabilitie = Availabilities::create($request->all());

        return response()->json($availabilitie, 201);
    }

    public function update(Request $request, Availabilitie $availabilitie)
    {
        $availabilitie->update($request->all());

        return response()->json($availabilitie, 200);
    }

    public function delete(Availabilitie $availabilitie)
    {
        $availabilitie->delete();

        return response()->json(null, 204);
    }
}