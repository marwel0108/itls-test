<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UserController extends Controller
{

    public function getAll()
    {
        return response()->json(User::all());
    }

    public function read(Request $request, $id)
    {
        return response()->json(User::where('active', 1)
            ->where('id', $id)
            ->first());
    }


    public function create(Request $request)
    {
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password'))
        ]);

        return response()->json([
            'msg' => 'Usuario creado satisfactoriamente'
        ], 200);
    }

    public function update(Request $request, $id)
    {

        $data = $request->all();

        if ($request->input('password') != null) {

            $data['password'] = Hash::make($data['password']);
        }

        User::where('active', 1)
            ->where('id', $id)
            ->update($data);

        return response()->json([
            'msg' => 'Usuario actualizado satisfactoriamente'
        ]);
    }

    public function delete(Request $request, $id)
    {
        User::where('active', 1)
            ->where('id', $id)
            ->update([
                'active' => 0
            ]);

        return response()->json([
            'msg' => 'Usuario eliminado satisfactoriamente'
        ]);
    }
}
