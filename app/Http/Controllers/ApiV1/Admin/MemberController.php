<?php

namespace App\Http\Controllers\ApiV1\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Hash;

class MemberController extends Controller
{
    public function index() 
    {
        $users = User::all();

        return response()->json([
            "users" => $users,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'kor_name' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'gender' => 'required',
            'position' => 'required',
            'kor_position' => 'required',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required '
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->kor_name = $request->kor_name;
        $user->gender = $request->gender;
        $user->email = $request->email;
        $user->position = $request->position;
        $user->kor_position = $request->name;
        $user->mobile = $request->mobile;
        $user->tel = $request->tel;
        $user->join_date = $request->join_date;
        $user->resignation_date = $request->resigination;
        $user->is_active = $request->is_active;
        $user->branch_id = 1;
        $user->department_id = 1;
        $user->position_id = 1;
        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json([
            'success' => true,
            'message' => $user->name.'has created successfully.',
            "member" => $user,
        ]);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        ]);

        if (!empty($request->password)) {
            $request->validate([
                'password' => 'required|string|min:6|confirmed',
                'password_confirmation' => 'required'
            ]);
        }

        if (!empty($request->password)) {
            $request->validate([
                'password' => 'required|string|min:6|confirmed',
                'password_confirmation' => 'required'
            ]);

            $user->password = Hash::make($request->password);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return response()->json([
            'result' => 'success',
            'message' => $user->name.'has updated successfully.',
            'user' => $user,
        ]);
    }

    public function show($id) 
    {
        $user = User::findOrFail($id);

        return response()->json([
            "user" => $user,
        ]);
    }

    public function getRoles($id)
    {
        $user = User::findOrFail($id);
        $roles = $user->getRoleNames();

        return response()->json([
            "memberRoles" => $roles
        ]);
    }

    public function getPermissions($id)
    {
        $user = User::findOrFail($id);
        $permissions = $user->getPermissionNames();

        return response()->json([
            "memberPermissions" => $permissions
        ]);
    }

    public function asyncRoles(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->syncRoles($request->roles);

        return response()->json([
            "result" => "success",
            "message" => "Roles has updated successfully"
        ]);
    }

    public function asyncPermissions(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->syncPermissions($request->permissions);

        return response()->json([
            "result" => "success",
            "message" => "Permissions has updated successfully"
        ]);
    }
}
