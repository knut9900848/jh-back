<?php

namespace App\Http\Controllers\ApiV1\Admin\Setting;

use App\Models\ApiV1\Admin\Setting\Unit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UnitController extends Controller
{
    public function index()
    {
        $units = Unit::all();

        return response()->json([
            'units' => $units
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'max:255'
        ]);
        
        $unit = new Unit;
        $unit->name = $request->name;
        $unit->is_active = $request->is_active;
        $unit->description = $request->description;
        $unit->save();

        return response()->json([
            "success" => true,
            "message" => "New unit created successfully.",
            "unit" => $unit
        ]);
    }

    public function show($id)
    {
        return response()->json([
            "unit" => Unit::findOrFail($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $unit = Unit::findOrFail($id);

        $request->validate([
            'name' => 'required|max:255',
            'description' => 'max:255'
        ]);

        $unit->name = $request->name;
        $unit->is_active = $request->is_active;
        $unit->description = $request->description;
        $unit->save();

        return response()->json([
            "success" => true,
            "message" => "unit updated successfully.",
            "unit" => $unit
        ]);
    }
}
