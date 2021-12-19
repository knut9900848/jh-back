<?php

namespace App\Http\Controllers\ApiV1\Admin\Setting;

use App\Models\ApiV1\Admin\Setting\Currency;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CurrencyController extends Controller
{
    public function index()
    {
        $currencies = Currency::all();

        return response()->json([
            'currencies' => $currencies
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'exchange_rate' => 'required|numeric',
            'description' => 'max:255'
        ]);
        
        $currency = new Currency;
        $currency->name = $request->name;
        $currency->exchange_rate = $request->exchange_rate;
        $currency->symbol = $request->symbol;
        $currency->country = $request->country;
        $currency->is_active = $request->is_active;
        $currency->description = $request->description;
        $currency->save();

        return response()->json([
            "success" => true,
            "message" => "New Currency created successfully.",
            "currency" => $currency
        ]);
    }

    public function show($id)
    {
        return response()->json([
            "currency" => Currency::findOrFail($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $currency = Currency::findOrFail($id);

        $request->validate([
            'name' => 'required|max:255',
            'exchange_rate' => 'required|numeric',
            'description' => 'max:255'
        ]);

        $currency->name = $request->name;
        $currency->exchange_rate = $request->exchange_rate;
        $currency->symbol = $request->symbol;
        $currency->country = $request->country;
        $currency->is_active = $request->is_active;
        $currency->description = $request->description;
        $currency->save();

        return response()->json([
            "success" => true,
            "message" => "Currency updated successfully.",
            "currency" => $currency
        ]);
    }
}
