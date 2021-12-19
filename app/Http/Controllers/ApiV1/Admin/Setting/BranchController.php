<?php

namespace App\Http\Controllers\ApiV1\Admin\Setting;

use App\Models\ApiV1\Admin\Setting\Branch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BranchController extends Controller
{
    public function index()
    {
        $branches = Branch::all();

        return response()->json([
            'branches' => $branches
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'kor_name' => 'required|max:255',
            'street1' => 'max:255',
            'street2' => 'max:255',
            'city' => 'max:255',
            'state' => 'max:255',
            'country' => 'max:255',
            'kor_address' => 'required|max:255',
            'zipcode' => 'numeric',
            'phone' => 'max:255',
            'fax' => 'max:255',
            'reg_number' => 'max:255',
            'vat_reg_number' => 'max:255',
            'email' => 'email|max:255',
            'code' => 'required|max:10|uniques:branches',
            'description' => 'max:255'
        ]);
        
        $branch = new Branch;
        $branch->name = $request->name;
        $branch->kor_name = $request->kor_name;
        $branch->street1 = $request->street1;
        $branch->street2 = $request->street2;
        $branch->city = $request->city;
        $branch->state = $request->state;
        $branch->country = $request->country;
        $branch->kor_address = $request->kor_address;
        $branch->zipcode = $request->zipcode;
        $branch->phone = $request->phone;
        $branch->fax = $request->fax;
        $branch->reg_number = $request->reg_number;
        $branch->vat_reg_number = $request->vat_reg_number;
        $branch->email = $request->email;
        $branch->code = $request->code;
        $branch->is_active = $request->is_active;
        $branch->description = $request->description;
        $branch->save();

        return response()->json([
            "success" => true,
            "message" => "Branch created successfully.",
            "branch" => $branch
        ]);
    }

    public function show($id)
    {
        return response()->json([
            "branch" => Branch::findOrFail($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $branch = Branch::findOrFail($id);

        $request->validate([
            'name' => 'required|max:255',
            'kor_name' => 'required|max:255',
            'street1' => 'max:255',
            'street2' => 'max:255',
            'city' => 'max:255',
            'state' => 'max:255',
            'country' => 'max:255',
            'kor_address' => 'required|max:255',
            'zipcode' => 'max:255',
            'phone' => 'max:255',
            'fax' => 'max:255',
            'reg_number' => 'max:255',
            'vat_reg_number' => 'max:255',
            'email' => 'email:rfc,dns|max:255',
            'code' => 'required|max:10|unique:branches,code,'.$branch->id,
            'description' => 'max:255'
        ]);

        $branch->name = $request->name;
        $branch->kor_name = $request->kor_name;
        $branch->street1 = $request->street1;
        $branch->street2 = $request->street2;
        $branch->city = $request->city;
        $branch->state = $request->state;
        $branch->country = $request->country;
        $branch->kor_address = $request->kor_address;
        $branch->zipcode = $request->zipcode;
        $branch->phone = $request->phone;
        $branch->fax = $request->fax;
        $branch->reg_number = $request->reg_number;
        $branch->vat_reg_number = $request->vat_reg_number;
        $branch->email = $request->email;
        $branch->code = $request->code;
        $branch->is_active = $request->is_active;
        $branch->description = $request->description;
        $branch->save();

        return response()->json([
            "success" => true,
            "message" => "Branch updated successfully.",
            "branch" => $branch
        ]);
    }
}
