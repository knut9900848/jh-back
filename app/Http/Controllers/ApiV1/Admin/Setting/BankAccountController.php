<?php

namespace App\Http\Controllers\ApiV1\Admin\Setting;

use App\Models\ApiV1\Admin\Setting\BankAccount;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BankAccountController extends Controller
{
    public function index()
    {
        $bankAccounts = BankAccount::all();

        return response()->json([
            'bankAccounts' => $bankAccounts
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'kor_name' => 'required|max:255',
            'account_number' => 'required|max:255',
            'swift_code' => 'required|max:255',
            'address' => 'required|max:255',
            'is_active' => 'required'
        ]);

        $bankAccount = new BankAccount;

        $bankAccount->name = $request->name;
        $bankAccount->kor_name = $request->kor_name;
        $bankAccount->account_number = $request->account_number;
        $bankAccount->swift_code = $request->swift_code;
        $bankAccount->address = $request->address;
        $bankAccount->is_active = $request->is_active;
        $bankAccount->description = $request->description;
        $bankAccount->save();

        return response()->json([
            'success' => true,
            'message' => 'New Bank Account created successfully.',
            'bankAccount' => $bankAccount
        ]);
    }

    public function show($id)
    {
        $bankAccount = BankAccount::findOrFail($id);
        
        return response()->json([
            'success' => true,
            'bankAccount' => $bankAccount
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'kor_name' => 'required|max:255',
            'account_number' => 'required|max:255',
            'swift_code' => 'required|max:255',
            'address' => 'required|max:255',
            'is_active' => 'required'
        ]);
        
        $bankAccount = BankAccount::findOrFail($id);
        $bankAccount->name = $request->name;
        $bankAccount->kor_name = $request->kor_name;
        $bankAccount->account_number = $request->account_number;
        $bankAccount->swift_code = $request->swift_code;
        $bankAccount->address = $request->address;
        $bankAccount->is_active = $request->is_active;
        $bankAccount->description = $request->description;
        $bankAccount->save();

        return response()->json([
            'success' => true,
            'message' => 'Bank Account updated successfully.',
            'bankAccount' => $bankAccount
        ]);
    }
}
