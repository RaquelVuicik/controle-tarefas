<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    public function index()
    {
        return User::get();
    }

    public function store(Request $request)
    {
        $dados = $request->all();
        $user = User::create($dados);

        return response()->json($user, Response::HTTP_CREATED);
    }

    public function show(int $id)
    {
        $user = User::findOrFail($id);

        return response()->json($user);
    }

    public function update(Request $request, int $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->nivel_permissao = $request->input('nivel_permissao');
        $user->save();

        return response()->json($user);
    }

    public function destroy(int $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json($user);
    }
}
